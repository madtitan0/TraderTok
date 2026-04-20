"use strict";
/**
 * Merges tools/i18n-overrides/bundles/riskDisclosure.<locale>.json into locales/<locale>.json
 * under riskDisclosurePage (body keys only; preserves existing h1–h22).
 *
 * Usage:
 *   node tools/apply-risk-disclosure-bundle.cjs
 *   node tools/apply-risk-disclosure-bundle.cjs es-419 th id
 *   node tools/apply-risk-disclosure-bundle.cjs all
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const bundlesDir = path.join(root, "tools", "i18n-overrides", "bundles");

const ALL = ["es-419", "th", "id", "my", "ph", "pk"];

function merge(locale) {
  const bundleFile =
    locale === "es-419"
      ? "riskDisclosure.es-419.json"
      : `riskDisclosure.${locale}.json`;
  const bundlePath = path.join(bundlesDir, bundleFile);
  const localePath = path.join(root, "locales", `${locale}.json`);
  if (!fs.existsSync(bundlePath)) {
    console.error("missing bundle:", bundlePath);
    process.exit(1);
  }
  if (!fs.existsSync(localePath)) {
    console.error("missing locale:", localePath);
    process.exit(1);
  }
  const body = JSON.parse(fs.readFileSync(bundlePath, "utf8"));
  const loc = JSON.parse(fs.readFileSync(localePath, "utf8"));
  loc.riskDisclosurePage = Object.assign({}, loc.riskDisclosurePage, body);
  fs.writeFileSync(localePath, JSON.stringify(loc, null, 2) + "\n", "utf8");
  console.log("merged", Object.keys(body).length, "keys → locales/" + locale + ".json");
}

const args = process.argv.slice(2);
const targets =
  args.length === 0 || args.includes("all")
    ? ALL.filter((l) => fs.existsSync(path.join(bundlesDir, l === "es-419" ? "riskDisclosure.es-419.json" : `riskDisclosure.${l}.json`)))
    : args;

for (const locale of targets) {
  merge(locale);
}
