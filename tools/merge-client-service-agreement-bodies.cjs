"use strict";
/**
 * Merges tools/i18n-overrides/bundles/clientServiceAgreement.bodies.<locale>.json
 * into locales/<locale>.json under clientServiceAgreementPage.
 *
 * Usage: node tools/merge-client-service-agreement-bodies.cjs en | all | vn ...
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const bundlesDir = path.join(root, "tools", "i18n-overrides", "bundles");

function mergeLocale(locale) {
  const bundlePath = path.join(
    bundlesDir,
    `clientServiceAgreement.bodies.${locale}.json`
  );
  const localePath = path.join(root, "locales", `${locale}.json`);
  if (!fs.existsSync(bundlePath)) {
    console.error("missing bundle:", bundlePath);
    process.exit(1);
  }
  if (!fs.existsSync(localePath)) {
    console.error("missing locale:", localePath);
    process.exit(1);
  }
  const bodies = JSON.parse(fs.readFileSync(bundlePath, "utf8"));
  const loc = JSON.parse(fs.readFileSync(localePath, "utf8"));
  loc.clientServiceAgreementPage = Object.assign(
    {},
    loc.clientServiceAgreementPage || {},
    bodies
  );
  fs.writeFileSync(localePath, JSON.stringify(loc, null, 2) + "\n", "utf8");
  console.log(
    "merged",
    Object.keys(bodies).length,
    "keys → locales/" + locale + ".json"
  );
}

const ALL = ["en", "vn", "es-419", "th", "id", "my", "ph", "pk"];

const args = process.argv.slice(2);
const targets =
  !args.length || args.includes("all")
    ? ALL.filter((locale) =>
        fs.existsSync(
          path.join(bundlesDir, `clientServiceAgreement.bodies.${locale}.json`)
        )
      )
    : args;

if (!targets.length) {
  console.error(
    "Usage: node tools/merge-client-service-agreement-bodies.cjs <locale> [...] | all"
  );
  process.exit(1);
}
for (const locale of targets) {
  mergeLocale(locale);
}
