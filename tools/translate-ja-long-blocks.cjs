"use strict";
/**
 * Translate long ja.json keys still in English (legal HTML blocks).
 * Usage: node tools/translate-ja-long-blocks.cjs
 */
const fs = require("fs");
const path = require("path");
const https = require("https");

const DELAY_MS = 400;
const MAX_CHUNK = 1200;

function sleep(ms) {
  return new Promise((r) => setTimeout(r, ms));
}

function flatten(obj, prefix, out) {
  if (typeof obj === "string") {
    out.push({ path: prefix, value: obj });
    return;
  }
  if (Array.isArray(obj)) {
    obj.forEach((v, i) => flatten(v, `${prefix}[${i}]`, out));
  } else if (obj && typeof obj === "object") {
    for (const k of Object.keys(obj)) {
      flatten(obj[k], prefix ? `${prefix}.${k}` : k, out);
    }
  }
}

function setDeep(obj, keyPath, value) {
  const parts = keyPath.replace(/\[(\d+)\]/g, ".$1").split(".").filter(Boolean);
  let cur = obj;
  for (let i = 0; i < parts.length - 1; i++) {
    const p = parts[i];
    if (cur[p] === undefined || typeof cur[p] !== "object") {
      cur[p] = /^\d+$/.test(parts[i + 1]) ? [] : {};
    }
    cur = cur[p];
  }
  cur[parts[parts.length - 1]] = value;
}

function maskHtml(s) {
  const tags = [];
  let idx = 0;
  return {
    masked: s.replace(/<[^>]+>/g, (m) => {
      tags.push(m);
      return `__H${idx++}__`;
    }),
    tags,
  };
}

function unmask(text, tags) {
  let out = text;
  for (let i = 0; i < tags.length; i++) {
    out = out.split(`__H${i}__`).join(tags[i]);
  }
  return out;
}

function gtx(text) {
  return new Promise((resolve, reject) => {
    const url =
      "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=ja&dt=t&q=" +
      encodeURIComponent(text);
    https
      .get(url, { headers: { "User-Agent": "Mozilla/5.0" } }, (res) => {
        let data = "";
        res.on("data", (c) => {
          data += c;
        });
        res.on("end", () => {
          try {
            resolve(JSON.parse(data)[0].map((x) => x[0]).join(""));
          } catch (e) {
            reject(e);
          }
        });
      })
      .on("error", reject);
  });
}

async function translateLong(value) {
  const { masked, tags } = maskHtml(value);
  const parts = [];
  for (let i = 0; i < masked.length; i += MAX_CHUNK) {
    parts.push(masked.slice(i, i + MAX_CHUNK));
  }
  const out = [];
  for (const part of parts) {
    let tr;
    for (let attempt = 0; attempt < 4; attempt++) {
      try {
        tr = await gtx(part);
        break;
      } catch (e) {
        await sleep(1000 * (attempt + 1));
        if (attempt === 3) throw e;
      }
    }
    out.push(tr);
    await sleep(DELAY_MS);
  }
  return unmask(out.join(""), tags);
}

async function main() {
  const root = path.join(__dirname, "..");
  const en = JSON.parse(fs.readFileSync(path.join(root, "locales", "en.json"), "utf8"));
  const jaPath = path.join(root, "locales", "ja.json");
  const ja = JSON.parse(fs.readFileSync(jaPath, "utf8"));

  const enFlat = [];
  flatten(en, "", enFlat);
  const jaFlat = [];
  flatten(ja, "", jaFlat);
  const jaMap = Object.fromEntries(jaFlat.map((x) => [x.path, x.value]));

  const pending = enFlat.filter(
    (l) => jaMap[l.path] === l.value && l.value.length > 200 && !l.path.includes("Link")
  );

  console.log(`Translating ${pending.length} long blocks`);
  let done = 0;
  for (let i = 0; i < pending.length; i++) {
    const leaf = pending[i];
    console.log(`  [${i + 1}/${pending.length}] ${leaf.path} (${leaf.value.length} chars)`);
    try {
      const tr = await translateLong(leaf.value);
      if (tr && tr !== leaf.value && !tr.includes("\uFFFD")) {
        setDeep(ja, leaf.path, tr);
        done++;
        fs.writeFileSync(jaPath, JSON.stringify(ja, null, 2) + "\n", "utf8");
      }
    } catch (e) {
      console.error(`    failed: ${e.message}`);
    }
  }

  fs.writeFileSync(jaPath, JSON.stringify(ja, null, 2) + "\n", "utf8");
  console.log(`Done: ${done}/${pending.length}`);
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});
