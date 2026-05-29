"use strict";
/**
 * Translate locale keys that still match English, using MyMemory (fallback when Google is rate-limited).
 * Usage: node tools/fill-untranslated-locale-mymemory.cjs ja
 */
const fs = require("fs");
const path = require("path");
const https = require("https");

const TARGETS = {
  ja: "ja",
  pk: "ur",
  th: "th",
  vn: "vi",
  "es-419": "es",
  id: "id",
  my: "ms",
  ph: "tl",
};

const DELAY_MS = 500;

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
    return;
  }
  if (obj && typeof obj === "object") {
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

function fetchTranslation(text, toApi) {
  return new Promise((resolve) => {
    const url =
      "https://api.mymemory.translated.net/get?q=" +
      encodeURIComponent(text.slice(0, 480)) +
      "&langpair=en|" +
      toApi;
    https
      .get(url, (res) => {
        let data = "";
        res.on("data", (c) => {
          data += c;
        });
        res.on("end", () => {
          try {
            const j = JSON.parse(data);
            if (j.responseData && j.responseData.translatedText) {
              const out = String(j.responseData.translatedText);
              if (/MYMEMORY WARNING|USAGE LIMIT/i.test(out)) resolve(text);
              else resolve(out);
            } else resolve(text);
          } catch (e) {
            resolve(text);
          }
        });
      })
      .on("error", () => resolve(text));
  });
}

async function main() {
  const locale = process.argv[2] || "ja";
  const toApi = TARGETS[locale] || locale;
  const root = path.join(__dirname, "..");
  const en = JSON.parse(fs.readFileSync(path.join(root, "locales", "en.json"), "utf8"));
  const outPath = path.join(root, "locales", `${locale}.json`);
  const result = JSON.parse(fs.readFileSync(outPath, "utf8"));

  const enLeaves = [];
  flatten(en, "", enLeaves);
  const pending = enLeaves.filter((l) => {
    const parts = l.path.replace(/\[(\d+)\]/g, ".$1").split(".").filter(Boolean);
    let cur = result;
    try {
      for (const p of parts) cur = cur[p];
      return cur === l.value;
    } catch (e) {
      return true;
    }
  });

  console.log(`Filling ${pending.length} untranslated keys via MyMemory → ${toApi}`);

  let done = 0;
  for (const leaf of pending) {
    const tr = await fetchTranslation(leaf.value, toApi);
    if (tr !== leaf.value) {
      setDeep(result, leaf.path, tr);
      done++;
    }
    if ((done + 1) % 50 === 0) {
      fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
      console.log(`  progress ${done} translated`);
    }
    await sleep(DELAY_MS);
  }

  if (result.language) result.language.urdu = "اردو";
  if (result.language) result.language.japanese = "日本語";

  fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
  console.log(`Done: ${done}/${pending.length} newly translated`);
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});
