"use strict";
/**
 * Fill untranslated locale keys (where value still matches English) via Google gtx endpoint.
 * Usage: node tools/fill-untranslated-locale-gtx.cjs ja
 */
const fs = require("fs");
const path = require("path");
const https = require("https");

const DELAY_MS = 280;
const CHECKPOINT_EVERY = 50;
const MAX_CHUNK = 3800;
const MAX_RETRIES = 4;

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

function maskHtml(s) {
  const tags = [];
  let idx = 0;
  const masked = s.replace(/<[^>]+>/g, (m) => {
    tags.push(m);
    return `__HTML${idx++}__`;
  });
  return { masked, tags };
}

function unmask(translated, tags) {
  let out = translated;
  for (let i = 0; i < tags.length; i++) {
    out = out.split(`__HTML${i}__`).join(tags[i]);
  }
  return out;
}

function shouldPreserveEnglish(keyPath, value) {
  if (typeof value !== "string") return true;
  const key = keyPath.split(/[.[\]]/).filter(Boolean).pop() || "";
  if (key.endsWith("Link") || key.endsWith("Url") || key.endsWith("Href")) return true;
  if (/^\.\/?\?page=/.test(value)) return true;
  if (/^https?:\/\//.test(value)) return true;
  if (/^mailto:/.test(value)) return true;
  if (/^support@/.test(value)) return true;
  if (/^you@example\.com$/.test(value)) return true;
  if (/^\+?\d[\d\s-]{6,}$/.test(value.trim())) return true;
  if (value === "Apple Pay" || value === "Google Pay") return true;
  if (value === "iOS" || value === "FSC") return true;
  if (/^\d{2}:\d{2}\sGMT/.test(value)) return true;
  if (keyPath.startsWith("language.") && key !== "title") return true;
  return false;
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

function gtxTranslate(text, from, to) {
  return new Promise((resolve, reject) => {
    const q = encodeURIComponent(text);
    const url =
      "https://translate.googleapis.com/translate_a/single?client=gtx&sl=" +
      encodeURIComponent(from) +
      "&tl=" +
      encodeURIComponent(to) +
      "&dt=t&q=" +
      q;
    https
      .get(url, { headers: { "User-Agent": "Mozilla/5.0" } }, (res) => {
        let data = "";
        res.on("data", (c) => {
          data += c;
        });
        res.on("end", () => {
          if (res.statusCode === 429) {
            reject(new Error("Too Many Requests"));
            return;
          }
          try {
            const j = JSON.parse(data);
            if (!j || !j[0]) {
              reject(new Error("Invalid response"));
              return;
            }
            resolve(j[0].map((x) => x[0]).join(""));
          } catch (e) {
            reject(e);
          }
        });
      })
      .on("error", reject);
  });
}

async function translateString(value, to) {
  if (!value || typeof value !== "string" || !value.trim()) return value;
  const { masked, tags } = maskHtml(value);
  const parts = chunkString(masked, MAX_CHUNK);
  const out = [];
  for (const part of parts) {
    let lastErr;
    for (let attempt = 0; attempt < MAX_RETRIES; attempt++) {
      try {
        out.push(await gtxTranslate(part, "en", to));
        lastErr = null;
        break;
      } catch (e) {
        lastErr = e;
        await sleep(800 * (attempt + 1));
      }
    }
    if (lastErr) throw lastErr;
    await sleep(DELAY_MS);
  }
  return unmask(out.join(""), tags);
}

async function main() {
  const locale = process.argv[2] || "ja";
  const googleLang = locale === "es-419" ? "es" : locale;
  const root = path.join(__dirname, "..");
  const en = JSON.parse(fs.readFileSync(path.join(root, "locales", "en.json"), "utf8"));
  const outPath = path.join(root, "locales", `${locale}.json`);
  const result = JSON.parse(fs.readFileSync(outPath, "utf8"));

  const enLeaves = [];
  flatten(en, "", enLeaves);
  const pending = enLeaves.filter((l) => {
    if (shouldPreserveEnglish(l.path, l.value)) return false;
    try {
      const parts = l.path.replace(/\[(\d+)\]/g, ".$1").split(".").filter(Boolean);
      let cur = result;
      for (const p of parts) cur = cur[p];
      return cur === l.value;
    } catch (e) {
      return true;
    }
  });

  console.log(`Translating ${pending.length} pending keys → ${googleLang}`);

  let done = 0;
  let failed = 0;
  for (let i = 0; i < pending.length; i++) {
    const leaf = pending[i];
    try {
      const tr = await translateString(leaf.value, googleLang);
      if (tr && tr !== leaf.value) {
        setDeep(result, leaf.path, tr);
        done++;
      }
    } catch (e) {
      failed++;
      console.error(`  [${i + 1}] ${leaf.path}: ${e.message}`);
    }

    if ((i + 1) % 25 === 0) {
      console.log(`  ${i + 1}/${pending.length} (${done} translated, ${failed} failed)`);
    }
    if ((i + 1) % CHECKPOINT_EVERY === 0) {
      fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
      console.log(`  checkpoint saved`);
    }
    await sleep(DELAY_MS);
  }

  if (result.language) {
    result.language.urdu = "اردو";
    result.language.japanese = "日本語";
  }

  fs.writeFileSync(outPath, JSON.stringify(result, null, 2) + "\n", "utf8");
  console.log(`Done: ${done}/${pending.length} translated, ${failed} failed`);
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});
