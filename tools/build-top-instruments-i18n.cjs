/**
 * Merges tools/top-instruments-flat.*.json into locales/*.json under topInstrumentsPage.
 * Flat keys use dots: "hero.badge" -> { hero: { badge: "..." } }
 * Run: node tools/build-top-instruments-i18n.cjs
 */
"use strict";

const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const localesDir = path.join(root, "locales");
const flatDir = path.join(__dirname, "top-instruments-flat");

function setNested(obj, parts, value) {
  let cur = obj;
  for (let i = 0; i < parts.length - 1; i++) {
    const p = parts[i];
    cur[p] = cur[p] && typeof cur[p] === "object" ? cur[p] : {};
    cur = cur[p];
  }
  cur[parts[parts.length - 1]] = value;
}

function nestFromFlat(flat) {
  const out = {};
  for (const [k, v] of Object.entries(flat)) {
    setNested(out, k.split("."), v);
  }
  return out;
}

const LANG_FILES = {
  en: "en.json",
  "es-419": "es-419.json",
  id: "id.json",
  my: "my.json",
  ph: "ph.json",
  pk: "pk.json",
  th: "th.json",
  vn: "vn.json",
};

for (const [lang, fname] of Object.entries(LANG_FILES)) {
  const flatPath = path.join(flatDir, `${lang}.json`);
  if (!fs.existsSync(flatPath)) {
    console.warn("skip (missing flat file):", flatPath);
    continue;
  }
  const flat = JSON.parse(fs.readFileSync(flatPath, "utf8"));
  const localePath = path.join(localesDir, fname);
  const j = JSON.parse(fs.readFileSync(localePath, "utf8"));
  j.topInstrumentsPage = nestFromFlat(flat);
  fs.writeFileSync(localePath, JSON.stringify(j, null, 2) + "\n", "utf8");
  console.log("updated topInstrumentsPage in", fname);
}
