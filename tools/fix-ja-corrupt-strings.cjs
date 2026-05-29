"use strict";
/**
 * Re-translate ja.json keys that contain replacement chars (U+FFFD) from chunking errors.
 * Usage: node tools/fix-ja-corrupt-strings.cjs
 */
const fs = require("fs");
const path = require("path");
const https = require("https");

const DELAY_MS = 300;

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
      return `__HTML${idx++}__`;
    }),
    tags,
  };
}

function unmask(translated, tags) {
  let out = translated;
  for (let i = 0; i < tags.length; i++) {
    out = out.split(`__HTML${i}__`).join(tags[i]);
  }
  return out;
}

function gtxTranslate(text) {
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

async function translateUtf8Safe(text) {
  const { masked, tags } = maskHtml(text);
  const max = 3500;
  const parts = [];
  for (let i = 0; i < masked.length; i += max) {
    parts.push(masked.slice(i, i + max));
  }
  const out = [];
  for (const part of parts) {
    out.push(await gtxTranslate(part));
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
  const enMap = Object.fromEntries(enFlat.map((x) => [x.path, x.value]));

  const jaFlat = [];
  flatten(ja, "", jaFlat);
  const corrupt = jaFlat.filter((x) => x.value.includes("\uFFFD"));

  console.log(`Fixing ${corrupt.length} corrupt strings`);
  let fixed = 0;
  for (const item of corrupt) {
    const source = enMap[item.path];
    if (!source) continue;
    try {
      const tr = await translateUtf8Safe(source);
      if (!tr.includes("\uFFFD")) {
        setDeep(ja, item.path, tr);
        fixed++;
      }
    } catch (e) {
      console.error(item.path, e.message);
    }
    await sleep(DELAY_MS);
  }

  fs.writeFileSync(jaPath, JSON.stringify(ja, null, 2) + "\n", "utf8");
  console.log(`Fixed ${fixed}/${corrupt.length}`);
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});
