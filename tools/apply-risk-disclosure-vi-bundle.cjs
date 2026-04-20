"use strict";
/**
 * Merges tools/i18n-overrides/bundles/riskDisclosure.vi.json into locales/vn.json
 * under riskDisclosurePage (body keys only; preserves existing h1–h22).
 * Run: node tools/apply-risk-disclosure-vi-bundle.cjs
 */
const fs = require("fs");
const path = require("path");
const root = path.join(__dirname, "..");
const bundlePath = path.join(
  root,
  "tools",
  "i18n-overrides",
  "bundles",
  "riskDisclosure.vi.json"
);
const vnPath = path.join(root, "locales", "vn.json");
const vi = JSON.parse(fs.readFileSync(bundlePath, "utf8"));
const vn = JSON.parse(fs.readFileSync(vnPath, "utf8"));
vn.riskDisclosurePage = Object.assign({}, vn.riskDisclosurePage, vi);
fs.writeFileSync(vnPath, JSON.stringify(vn, null, 2) + "\n", "utf8");
console.log("merged", Object.keys(vi).length, "keys into locales/vn.json");
