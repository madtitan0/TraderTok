"use strict";
/**
 * Translate locales/en.json homeFaq → locales/<locale>.json + tools/home-faq-translated/<locale>.homeFaq.json
 * Usage: node tools/translate-home-faq-locale.cjs ja
 */
const fs = require("fs");
const path = require("path");
const https = require("https");

const DELAY_MS = 280;
const MAX_CHUNK = 3500;

function sleep(ms) {
  return new Promise((r) => setTimeout(r, ms));
}

function maskHtml(s) {
  const tags = [];
  let idx = 0;
  const masked = s.replace(/<[^>]+>/g, (m) => {
    tags.push(m);
    return `__H${idx++}__`;
  });
  return { masked, tags };
}

function unmask(text, tags) {
  let out = text;
  for (let i = 0; i < tags.length; i++) {
    out = out.split(`__H${i}__`).join(tags[i]);
  }
  return out;
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

function gtx(text, to) {
  return new Promise((resolve, reject) => {
    const url =
      "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=" +
      encodeURIComponent(to) +
      "&dt=t&q=" +
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

async function translateString(value, to) {
  if (!value || !value.trim()) return value;
  const { masked, tags } = maskHtml(value);
  const parts = [];
  for (let i = 0; i < masked.length; i += MAX_CHUNK) {
    parts.push(masked.slice(i, i + MAX_CHUNK));
  }
  const out = [];
  for (const part of parts) {
    out.push(await gtx(part, to));
    await sleep(DELAY_MS);
  }
  return unmask(out.join(""), tags);
}

async function main() {
  const locale = process.argv[2] || "ja";
  const googleLang = locale === "es-419" ? "es" : locale;
  const root = path.join(__dirname, "..");
  const en = JSON.parse(fs.readFileSync(path.join(root, "locales", "en.json"), "utf8"));
  const jaPath = path.join(root, "locales", `${locale}.json`);
  const localeJson = JSON.parse(fs.readFileSync(jaPath, "utf8"));

  const source = JSON.parse(JSON.stringify(en.homeFaq));
  const leaves = [];
  flatten(source, "", leaves);

  console.log(`Translating homeFaq (${leaves.length} strings) → ${googleLang}`);

  let done = 0;
  for (let i = 0; i < leaves.length; i++) {
    const leaf = leaves[i];
    try {
      const tr = await translateString(leaf.value, googleLang);
      setDeep(source, leaf.path, tr);
      done++;
    } catch (e) {
      console.error(`  ${leaf.path}: ${e.message}`);
    }
    if ((i + 1) % 25 === 0) {
      console.log(`  ${i + 1}/${leaves.length}`);
    }
    await sleep(DELAY_MS);
  }

  localeJson.homeFaq = source;

  const partialDir = path.join(__dirname, "home-faq-translated");
  if (!fs.existsSync(partialDir)) fs.mkdirSync(partialDir, { recursive: true });
  const partialPath = path.join(partialDir, `${locale}.homeFaq.json`);
  fs.writeFileSync(partialPath, JSON.stringify(source, null, 2) + "\n", "utf8");
  fs.writeFileSync(jaPath, JSON.stringify(localeJson, null, 2) + "\n", "utf8");

  console.log(`Done: ${done}/${leaves.length} → ${partialPath} and locales/${locale}.json`);
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});
