"use strict";
/**
 * Extracts AML policy HTML into amlPolicyPage.block01..block13 for i18n,
 * writes English bundle JSON and regenerates includes/anti-money-laundering-policy.php
 * with data-i18n-html wrappers (same pattern as risk/privacy/terms).
 *
 * Usage: node tools/build-aml-policy-page.cjs
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const phpPath = path.join(root, "includes", "anti-money-laundering-policy.php");
const raw = fs.readFileSync(phpPath, "utf8");
const lines = raw.split(/\r?\n/);

/** Inclusive 1-based line numbers (must match current includes/anti-money-laundering-policy.php) */
const ranges = [
  [16, 24, "block01"],
  [25, 70, "block02"],
  [71, 86, "block03"],
  [87, 100, "block04"],
  [101, 319, "block05"],
  [320, 494, "block06"],
  [495, 523, "block07"],
  [524, 569, "block08"],
  [570, 1237, "block09"],
  [1238, 1277, "block10"],
  [1278, 1404, "block11"],
  [1405, 1447, "block12"],
  [1448, 1457, "block13"],
];

function extractRange(start, end) {
  return lines.slice(start - 1, end).join("\n");
}

/** Remove nested i18n attrs so outer data-i18n-html is the single source of truth. */
function stripI18nAttrs(html) {
  return html.replace(/\s+data-i18n(?:-html)?="[^"]+"/g, "");
}

const bodies = {
  heroTitle: "ANTI-MONEY LAUNDERING AND KNOW YOUR CLIENT POLICY",
  /** Legacy section labels (same strings appear inside block HTML); kept for locale parity / SEO keys */
  h1: "ANTI-MONEY LAUNDERING AND KNOW YOUR CLIENT POLICY",
  h2: "Purpose",
  h3: "Legal Framework",
  h4: "DEFINITIONS",
  h5: "Policy",
  h6: "1. CLIENT IDENTIFICATION AND DUE DILIGENCE PROCEDURES",
  h7: "POLITICALLY EXPOSED PERSONS",
  h8: "2. CLIENT ACCOUNT OPENING PROCEDURES",
  h9: "2.1 Client Risk Classification",
  h10: "2.2 Client’s acceptance policy",
  h11: "3. ADDITIONAL MEASURES",
  h12:
    "4 High Risk and Non-Cooperative Jurisdictions and FATF\n          Recommendations",
  h13:
    "5. ANTI-MONEY LAUNDERING COMPLIANCE OFFICER’S\n          OBLIGATIONS",
  h14: "6. REVIEW OF POLICY",
};

for (const [a, b, key] of ranges) {
  bodies[key] = stripI18nAttrs(extractRange(a, b).trim());
}

const bundlePath = path.join(
  root,
  "tools",
  "i18n-overrides",
  "bundles",
  "amlPolicy.bodies.en.json"
);
fs.mkdirSync(path.dirname(bundlePath), { recursive: true });
fs.writeFileSync(bundlePath, JSON.stringify(bodies, null, 2) + "\n", "utf8");
console.log("Wrote", bundlePath, Object.keys(bodies).length, "keys");

const header = `<!-- Hero Section with Video Background -->
<section class="page-hero">
  <!-- Video Background -->
  <video class="page-hero-video" autoplay loop muted playsinline>
    <source src="assets/images/Trading Essentials.mp4" type="video/mp4">
  </video>

  <!-- Overlay -->
  <div class="page-hero-overlay"></div>

  <div class="container">
    <div class="page-hero-content legal-document-content" style="justify-content: start; align-items: flex-start; text-align: left;">
      <div class="doc-page-hero-title">
        <span data-i18n="amlPolicyPage.heroTitle" style='color: var(--brand-color-start)'>ANTI-MONEY LAUNDERING AND KNOW YOUR CLIENT POLICY</span>
      </div>
`;

const footer = `    </div>
  </div>
</section>
`;

let mid = "";
for (const [, , key] of ranges) {
  const html = bodies[key];
  mid += `      <div data-i18n-html="amlPolicyPage.${key}">\n${html}\n      </div>\n\n`;
}

const outPhp = header + mid + footer;
const outPath = path.join(root, "includes", "anti-money-laundering-policy.php");
fs.writeFileSync(outPath, outPhp, "utf8");
console.log("Regenerated", outPath);
