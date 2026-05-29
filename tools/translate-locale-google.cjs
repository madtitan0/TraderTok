"use strict";
/**
 * Deep-translates locales/en.json into locales/<locale>.json (one string per API call).
 *
 * Usage: node tools/translate-locale-google.cjs <locale> [googleLang] [resumeSkip]
 * Example: node tools/translate-locale-google.cjs ja
 */
const fs = require("fs");
const path = require("path");
const { translate } = require("google-translate-api-x");

const GOOGLE_LANG = {
  ja: "ja",
  pk: "ur",
  vn: "vi",
  "es-419": "es",
  th: "th",
  id: "id",
  my: "ms",
  ph: "fil",
};

const MAX_CHUNK = 4200;
const DELAY_MS = 450;
const CHECKPOINT_EVERY = 75;

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
        forceBatch: false,
      });
      return res.text;
    } catch (e) {
      lastErr = e;
      await sleep(600 * (attempt + 1));
    }
  }
  throw lastErr;
}

async function translateString(value, googleLang, keyPath) {
  if (!value || typeof value !== "string" || !value.trim()) return value;
  const { masked, tags } = maskHtml(value);
  const parts = chunkString(masked, MAX_CHUNK);
  const out = [];
  for (const p of parts) {
    out.push(await translateChunk(p, googleLang));
    await sleep(DELAY_MS);
  }
  return unmask(out.join(" "), tags);
}

async function main() {
  const locale = process.argv[2];
  if (!locale) {
    console.error("Usage: node tools/translate-locale-google.cjs <locale> [googleLang] [resumeSkip]");
    process.exit(1);
  }
  const googleLang = process.argv[3] || GOOGLE_LANG[locale] || locale;
  const resumeSkip = parseInt(process.argv[4] || "0", 10) || 0;
  const root = path.join(__dirname, "..");
  const enPath = path.join(root, "locales", "en.json");
  const outPath = path.join(root, "locales", `${locale}.json`);

  const en = JSON.parse(fs.readFileSync(enPath, "utf8"));
  const result = fs.existsSync(outPath)
    ? JSON.parse(fs.readFileSync(outPath, "utf8"))
    : JSON.parse(JSON.stringify(en));

  const leaves = [];
  flatten(en, "", leaves);
  console.log(
    `Translating ${leaves.length} strings → ${locale} (${googleLang}), skip first ${resumeSkip}`
  );

  let translated = 0;
  for (let i = 0; i < leaves.length; i++) {
    if (i < resumeSkip) continue;
    const leaf = leaves[i];
    const current = (() => {
      try {
        const parts = leaf.path.replace(/\[(\d+)\]/g, ".$1").split(".").filter(Boolean);
        let cur = result;
        for (const p of parts) cur = cur[p];
        return cur;
      } catch (e) {
        return leaf.value;
      }
    })();

    if (current !== leaf.value) {
      continue;
    }

    try {
      const tr = await translateString(leaf.value, googleLang, leaf.path);
      setDeep(result, leaf.path, tr);
      if (tr !== leaf.value) translated++;
    } catch (e) {
      console.error(`  [${i}] ${leaf.path}: ${e.message}`);
    }

    if ((i + 1) % 50 === 0) {
      console.log(`  ${i + 1}/${leaves.length} (${translated} translated this run)`);
    }
    if ((i + 1) % CHECKPOINT_EVERY === 0) {
      fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
      console.log(`  checkpoint ${i + 1}`);
    }
    await sleep(DELAY_MS);
  }

  if (result.language) {
    result.language.japanese = "日本語";
  }

  fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
  console.log(`Wrote ${outPath} (${translated} strings translated this run)`);
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});
