"use strict";
/**
 * Builds tools/i18n-overrides/bundles/termsConditions.bodies.<locale>.json from
 * termsConditions.bodies.en.json using MyMemory public API (free tier).
 * Preserves HTML tags via [BRK0] placeholders. Chunks text to ≤500 chars per request.
 *
 * Usage: node tools/translate-terms-bundles-mymemory.cjs [vn|es-419|th|id|my|ph|pk|all]
 */
const fs = require("fs");
const path = require("path");

const TARGETS = {
  vn: "vi",
  "es-419": "es",
  th: "th",
  id: "id",
  my: "ms",
  ph: "fil",
  pk: "ur",
};

const MAX_CHUNK = 480;
const DELAY_MS = 100;

function sleep(ms) {
  return new Promise((r) => setTimeout(r, ms));
}

function maskHtml(s) {
  const tags = [];
  const masked = s.replace(/<[^>]+>/g, (m) => {
    tags.push(m);
    return `[BRK${tags.length - 1}]`;
  });
  return { masked, tags };
}

function unmask(translated, tags) {
  let out = translated;
  for (let i = 0; i < tags.length; i++) {
    const re = new RegExp(`\\[BRK${i}\\]`, "g");
    out = out.replace(re, tags[i]);
  }
  return out;
}

function chunkString(s, maxLen) {
  const chunks = [];
  let i = 0;
  while (i < s.length) {
    let end = Math.min(i + maxLen, s.length);
    if (end < s.length) {
      const sp = s.lastIndexOf(" ", end);
      if (sp > i + maxLen * 0.3) end = sp;
    }
    const piece = s.slice(i, end).trim();
    if (piece) chunks.push(piece);
    i = end;
  }
  return chunks.length ? chunks : [""];
}

async function translateChunk(text, targetLang) {
  const url = `https://api.mymemory.translated.net/get?q=${encodeURIComponent(text)}&langpair=en|${targetLang}`;
  const res = await fetch(url);
  const j = await res.json();
  if (j.quotaFinished) {
    throw new Error("MyMemory quota finished — try again later or set MYMEMORY_EMAIL in env.");
  }
  if (j.responseStatus !== 200 || !j.responseData || !j.responseData.translatedText) {
    throw new Error(
      `MT failed: ${JSON.stringify(j).slice(0, 400)}`
    );
  }
  return j.responseData.translatedText;
}

async function translateMasked(masked, targetLang) {
  const parts = chunkString(masked, MAX_CHUNK);
  const out = [];
  for (const p of parts) {
    out.push(await translateChunk(p, targetLang));
    await sleep(DELAY_MS);
  }
  return out.join(" ");
}

async function translateLocale(locale, enObj) {
  const targetLang = TARGETS[locale];
  if (!targetLang) throw new Error("unknown locale: " + locale);
  const result = {};
  const keys = Object.keys(enObj);
  let n = 0;
  for (const k of keys) {
    n++;
    const v = enObj[k];
    const { masked, tags } = maskHtml(v);
    try {
      let tr = await translateMasked(masked, targetLang);
      tr = unmask(tr, tags);
      result[k] = tr;
    } catch (e) {
      console.error(`[${locale}] key ${k}: ${e.message} — using English fallback`);
      result[k] = v;
    }
    if (n % 15 === 0) {
      console.log(`  ${locale}: ${n}/${keys.length}`);
    }
  }
  return result;
}

async function main() {
  const root = path.join(__dirname, "..");
  const enPath = path.join(
    root,
    "tools",
    "i18n-overrides",
    "bundles",
    "termsConditions.bodies.en.json"
  );
  const en = JSON.parse(fs.readFileSync(enPath, "utf8"));
  const arg = (process.argv[2] || "all").toLowerCase();
  let locales = Object.keys(TARGETS);
  if (arg !== "all" && TARGETS[arg]) locales = [arg];
  else if (arg !== "all") {
    console.error("Usage: node tools/translate-terms-bundles-mymemory.cjs [locale|all]");
    process.exit(1);
  }

  for (const locale of locales) {
    console.log("Translating", locale, "→", TARGETS[locale]);
    const result = await translateLocale(locale, en);
    const outPath = path.join(
      root,
      "tools",
      "i18n-overrides",
      "bundles",
      `termsConditions.bodies.${locale}.json`
    );
    fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
    console.log("wrote", outPath);
  }
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});
