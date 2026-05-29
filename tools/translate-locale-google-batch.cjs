"use strict";
/**
 * Fast batch translation of locales/en.json → locales/<locale>.json.
 * Groups leaf strings into ~3500-char batches (one API call per batch).
 *
 * Usage: node tools/translate-locale-google-batch.cjs ja
 */
const fs = require("fs");
const path = require("path");
const { translate } = require("google-translate-api-x");

const GOOGLE_LANG = {
  ja: "ja",
  pk: "ur",
  th: "th",
};

const BATCH_CHAR_LIMIT = 3500;
const DELAY_MS = 250;
const SEP = "\n⟦TT⟧\n";

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
      const p = prefix ? `${prefix}.${k}` : k;
      flatten(obj[k], p, out);
    }
  }
}

function setDeep(obj, keyPath, value) {
  const parts = keyPath.replace(/\[(\d+)\]/g, ".$1").split(".").filter(Boolean);
  let cur = obj;
  for (let i = 0; i < parts.length - 1; i++) {
    const p = parts[i];
    if (cur[p] === undefined || typeof cur[p] !== "object") cur[p] = {};
    cur = cur[p];
  }
  cur[parts[parts.length - 1]] = value;
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
    out = out.split(String.fromCharCode(0xe000 + i)).join(tags[i]);
  }
  return out;
}

function buildBatches(leaves) {
  const batches = [];
  let cur = [];
  let size = 0;
  for (const leaf of leaves) {
    const piece = leaf.masked.length + SEP.length;
    if (cur.length && size + piece > BATCH_CHAR_LIMIT) {
      batches.push(cur);
      cur = [];
      size = 0;
    }
    cur.push(leaf);
    size += piece;
  }
  if (cur.length) batches.push(cur);
  return batches;
}

async function translateBatch(text, googleLang) {
  for (let attempt = 0; attempt < 5; attempt++) {
    try {
      const res = await translate(text, {
        from: "en",
        to: googleLang,
        forceBatch: true,
      });
      return res.text;
    } catch (e) {
      await sleep(600 * (attempt + 1));
      if (attempt === 4) throw e;
    }
  }
}

async function main() {
  const locale = process.argv[2] || "ja";
  const googleLang = GOOGLE_LANG[locale] || locale;
  const root = path.join(__dirname, "..");
  const en = JSON.parse(
    fs.readFileSync(path.join(root, "locales", "en.json"), "utf8")
  );
  const outPath = path.join(root, "locales", `${locale}.json`);

  const leaves = [];
  flatten(en, "", leaves);
  const prepared = leaves.map((l) => {
    const { masked, tags } = maskHtml(l.value);
    return { ...l, masked, tags };
  });

  const batches = buildBatches(prepared);
  console.log(
    `Translating ${prepared.length} strings in ${batches.length} batches → ${googleLang}`
  );

  const result = JSON.parse(JSON.stringify(en));
  let done = 0;
  for (let bi = 0; bi < batches.length; bi++) {
    const batch = batches[bi];
    const joined = batch.map((b) => b.masked).join(SEP);
    let translated;
    try {
      translated = await translateBatch(joined, googleLang);
    } catch (e) {
      console.error(`Batch ${bi + 1} failed: ${e.message} — keeping English`);
      translated = joined;
    }
    const parts = translated.split(SEP);
    if (parts.length !== batch.length) {
      console.warn(
        `Batch ${bi + 1}: expected ${batch.length} parts, got ${parts.length} — using English for mismatches`
      );
    }
    batch.forEach((leaf, i) => {
      let val = parts[i] !== undefined ? parts[i] : leaf.value;
      val = unmask(val, leaf.tags);
      setDeep(result, leaf.path, val);
      done++;
    });
    if ((bi + 1) % 10 === 0 || bi === batches.length - 1) {
      fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
      console.log(`  checkpoint ${bi + 1}/${batches.length} (${done} strings)`);
    }
    await sleep(DELAY_MS);
  }

  fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
  console.log("Wrote", outPath);
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});
