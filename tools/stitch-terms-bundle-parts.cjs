"use strict";
/**
 * Merges tools/i18n-overrides/bundles/parts/terms.<locale>.part*.json into
 * tools/i18n-overrides/bundles/termsConditions.bodies.<locale>.json
 * (later files override keys if duplicated — use disjoint key sets).
 *
 * Usage: node tools/stitch-terms-bundle-parts.cjs vn
 */
const fs = require("fs");
const path = require("path");

const locale = process.argv[2];
if (!locale) {
  console.error("Usage: node tools/stitch-terms-bundle-parts.cjs <locale>");
  process.exit(1);
}

const root = path.join(__dirname, "..");
const partsDir = path.join(root, "tools", "i18n-overrides", "bundles", "parts");
const prefix = `terms.${locale}.part`;

const files = fs
  .readdirSync(partsDir)
  .filter((f) => f.startsWith(prefix) && f.endsWith(".json"))
  .sort();

if (!files.length) {
  console.error("No part files for", locale, "in", partsDir);
  process.exit(1);
}

let merged = {};
for (const f of files) {
  const p = path.join(partsDir, f);
  const chunk = JSON.parse(fs.readFileSync(p, "utf8"));
  merged = Object.assign(merged, chunk);
}

const outPath = path.join(
  root,
  "tools",
  "i18n-overrides",
  "bundles",
  `termsConditions.bodies.${locale}.json`
);
fs.writeFileSync(outPath, JSON.stringify(merged, null, 2) + "\n", "utf8");
console.log(
  "wrote",
  outPath,
  "keys:",
  Object.keys(merged).length,
  "from",
  files.length,
  "parts"
);
