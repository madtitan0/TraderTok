"use strict";
/**
 * One-off / repeatable: reads includes/terms-conditions.php and prints
 * tools/i18n-overrides/bundles/termsConditions.bodies.en.json
 * Keys: heroTitle + {lastH}_{p|li}{n} based on preceding data-i18n termsConditionsPage.h* span.
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const phpPath = path.join(root, "includes", "terms-conditions.php");
const outPath = path.join(
  root,
  "tools",
  "i18n-overrides",
  "bundles",
  "termsConditions.bodies.en.json"
);

let html = fs.readFileSync(phpPath, "utf8");
// Normalize newlines
html = html.replace(/\r\n/g, "\n");

/** @type {Record<string, string>} */
const out = {};
/** Document order of keys (excluding heroTitle) */
const orderedKeys = [];

// Hero title: first doc-page-hero-title span (may wrongly reference privacyPolicyPage)
const heroMatch = html.match(
  /<div class="doc-page-hero-title">\s*<span[^>]*>([^<]*)<\/span>/i
);
if (heroMatch) {
  out.heroTitle = heroMatch[1].trim();
}

let lastH = "h2";
/** @type {Record<string, number>} separate counters per section + kind (p vs li) */
const counters = {};

function nextKey(kind) {
  const ck = `${lastH}_${kind}`;
  const id = (counters[ck] = (counters[ck] || 0) + 1);
  return `${lastH}_${kind}${id}`;
}

// Walk document: split into tokens in order
const tokenRe =
  /(<span\s+data-i18n="termsConditionsPage\.(h\d+)"[^>]*>[\s\S]*?<\/span>)|(<p[^>]*class="doc-page-hero-subtitle"[^>]*>[\s\S]*?<\/p>)|(<ul[^>]*class="doc-page-hero-list"[^>]*>[\s\S]*?<\/ul>)/gi;

let m;
while ((m = tokenRe.exec(html)) !== null) {
  if (m[2]) {
    lastH = m[2];
    continue;
  }
  if (m[3]) {
    const inner = m[3]
      .replace(/^<p\s+class="doc-page-hero-subtitle"[^>]*>/i, "")
      .replace(/<\/p>\s*$/i, "")
      .trim();
    if (!inner) continue;
    const k = nextKey("p");
    out[k] = inner.replace(/\s+/g, " ").trim();
    orderedKeys.push(k);
    continue;
  }
  if (m[4]) {
    const ul = m[4];
    const liRe = /<li[^>]*>([\s\S]*?)<\/li>/gi;
    let lm;
    while ((lm = liRe.exec(ul)) !== null) {
      const inner = lm[1].trim().replace(/\s+/g, " ");
      if (!inner) continue;
      const k = nextKey("li");
      out[k] = inner;
      orderedKeys.push(k);
    }
  }
}

const allKeys =
  out.heroTitle !== undefined ? ["heroTitle", ...orderedKeys] : [...orderedKeys];

const lines = ["{"];
for (let i = 0; i < allKeys.length; i++) {
  const k = allKeys[i];
  const v = out[k];
  const escaped = JSON.stringify(v);
  lines.push(`  ${JSON.stringify(k)}: ${escaped}${i < allKeys.length - 1 ? "," : ""}`);
}
lines.push("}");
fs.writeFileSync(outPath, lines.join("\n") + "\n", "utf8");

console.log("wrote", outPath, "keys:", allKeys.length);
