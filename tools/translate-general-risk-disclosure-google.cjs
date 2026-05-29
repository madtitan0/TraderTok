"use strict";
/**
 * Fills generalRiskDisclosure.bodies.<locale>.json from .en.json via google-translate-api-x.
 * Usage: node tools/translate-general-risk-disclosure-google.cjs [vn|es-419|th|id|my|ph|pk|all]
 */
const fs = require("fs");
const path = require("path");
const { translate } = require("google-translate-api-x");

const TARGETS = {
  vn: "vi",
  "es-419": "es",
  th: "th",
  id: "id",
  my: "ms",
  ph: "tl",
  pk: "ur",
  ja: "ja",
};

const MAX_CHUNK = 4200;
const DELAY_MS = 180;

function sleep(ms) {
  return new Promise((r) => setTimeout(r, ms));
}

function maskHtml(s) {
  const tags = [];
  let idx = 0;
  const masked = s.replace(/<[^>]+>/g, (m) => {
    tags.push(m);
    return String.fromCharCode(0xe000 + idx++);
  });
  return { masked, tags };
}

function unmask(translated, tags) {
  let out = translated;
  for (let i = 0; i < tags.length; i++) {
    const ch = String.fromCharCode(0xe000 + i);
    out = out.split(ch).join(tags[i]);
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
      if (sp > i + maxLen * 0.25) end = sp;
    }
    const piece = s.slice(i, end).trim();
    if (piece) chunks.push(piece);
    i = end;
  }
  return chunks.length ? chunks : [""];
}

async function translateChunk(text, googleLang) {
  let lastErr;
  for (let attempt = 0; attempt < 5; attempt++) {
    try {
      const res = await translate(text, {
        from: "en",
        to: googleLang,
        forceBatch: true,
      });
      return res.text;
    } catch (e) {
      lastErr = e;
      await sleep(600 * (attempt + 1));
    }
  }
  throw lastErr;
}

async function translateMasked(masked, googleLang) {
  const parts = chunkString(masked, MAX_CHUNK);
  const out = [];
  for (const p of parts) {
    out.push(await translateChunk(p, googleLang));
    await sleep(DELAY_MS);
  }
  return out.join(" ");
}

async function translateLocale(locale, enObj) {
  const googleLang = TARGETS[locale];
  if (!googleLang) throw new Error("unknown locale: " + locale);
  const result = {};
  const keys = Object.keys(enObj);
  let n = 0;
  for (const k of keys) {
    n++;
    const v = enObj[k];
    if (typeof v !== "string") {
      result[k] = v;
      continue;
    }
    const { masked, tags } = maskHtml(v);
    try {
      let tr = await translateMasked(masked, googleLang);
      tr = unmask(tr, tags);
      result[k] = tr;
    } catch (e) {
      console.error(`[${locale}] key ${k}: ${e.message} — English fallback`);
      result[k] = v;
    }
    if (n % 8 === 0) console.log(`  ${locale}: ${n}/${keys.length}`);
    await sleep(DELAY_MS);
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
    "generalRiskDisclosure.bodies.en.json"
  );
  const en = JSON.parse(fs.readFileSync(enPath, "utf8"));
  const arg = (process.argv[2] || "all").toLowerCase();
  let locales = Object.keys(TARGETS);
  if (arg !== "all" && TARGETS[arg]) locales = [arg];
  else if (arg !== "all") {
    console.error(
      "Usage: node tools/translate-general-risk-disclosure-google.cjs [locale|all]"
    );
    process.exit(1);
  }

  for (const locale of locales) {
    console.log(
      "Translating general risk disclosure",
      locale,
      "→",
      TARGETS[locale]
    );
    const result = await translateLocale(locale, en);
    const outPath = path.join(
      root,
      "tools",
      "i18n-overrides",
      "bundles",
      `generalRiskDisclosure.bodies.${locale}.json`
    );
    fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
    console.log("wrote", outPath);
  }
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});
