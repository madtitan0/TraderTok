"use strict";
/**
 * One-time / on-demand: extracts PROMOTIONS object from assets/js/offers-promotions.js
 * and writes tools/offers-promotions-data/promotions.en.json
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const jsPath = path.join(root, "assets/js/offers-promotions.js");
const outDir = path.join(__dirname, "offers-promotions-data");
const outPath = path.join(outDir, "promotions.en.json");

const txt = fs.readFileSync(jsPath, "utf8");
const startMark = "const PROMOTIONS = ";
const start = txt.indexOf(startMark);
if (start === -1) {
  console.error("PROMOTIONS not found");
  process.exit(1);
}
const endMark = "\n    const LATAM_CODES";
const end = txt.indexOf(endMark, start);
if (end === -1) {
  console.error("LATAM_CODES marker not found");
  process.exit(1);
}
let chunk = txt.slice(start + startMark.length, end).trim();
if (chunk.endsWith(";")) {
  chunk = chunk.slice(0, -1).trim();
}
// eslint-disable-next-line no-new-func
const PROMOTIONS = new Function("return (" + chunk + ")")();
fs.mkdirSync(outDir, { recursive: true });
fs.writeFileSync(outPath, JSON.stringify(PROMOTIONS, null, 2) + "\n", "utf8");
console.log("wrote", outPath);
