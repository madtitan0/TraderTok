"use strict";
/**
 * Applies a flat English→target map to all string leaves in promotions.en.json
 * and writes promotions.<lang>.json. Map keys must match English source strings exactly.
 *
 * Usage: node tools/apply-promo-string-map.cjs <langCode>
 * Expects: tools/offers-promotions-data/<langCode>-flat-map.json (e.g. vn-flat-map.json for vn).
 */
const fs = require("fs");
const path = require("path");

const lang = process.argv[2] || "vn";
const dataDir = path.join(__dirname, "offers-promotions-data");
const mapPath = path.join(dataDir, lang + "-flat-map.json");
const srcPath = path.join(dataDir, "promotions.en.json");
const outPath = path.join(dataDir, "promotions." + lang + ".json");

if (!fs.existsSync(mapPath)) {
  console.error("missing map:", mapPath);
  process.exit(1);
}

const map = JSON.parse(fs.readFileSync(mapPath, "utf8"));
const src = JSON.parse(fs.readFileSync(srcPath, "utf8"));

function walk(x, keyHint) {
  if (typeof x === "string") {
    if (keyHint === "ctaLink") {
      return x;
    }
    return Object.prototype.hasOwnProperty.call(map, x) ? map[x] : x;
  }
  if (Array.isArray(x)) {
    return x.map(function (item) {
      return walk(item, keyHint);
    });
  }
  if (x && typeof x === "object") {
    const o = {};
    for (const k of Object.keys(x)) {
      o[k] = walk(x[k], k);
    }
    return o;
  }
  return x;
}

fs.writeFileSync(outPath, JSON.stringify(walk(src), null, 2) + "\n", "utf8");
console.log("wrote", outPath);
