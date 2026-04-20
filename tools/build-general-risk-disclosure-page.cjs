"use strict";
/**
 * Extracts General Risk Disclosure HTML into generalRiskDisclosurePage.block01..block08,
 * writes tools/i18n-overrides/bundles/generalRiskDisclosure.bodies.en.json
 * and regenerates includes/general-risk-disclosure.php.
 *
 * Usage: node tools/build-general-risk-disclosure-page.cjs
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const phpPath = path.join(root, "includes", "general-risk-disclosure.php");
let raw = fs.readFileSync(phpPath, "utf8");

raw = raw
  .replace(/\bExchangeTraded\b/g, "Exchange-Traded")
  .replace(/\bInternetbased\b/g, "Internet-based")
  .replace(/\binsuBicient\b/g, "insufficient")
  .replace(/\bsuBicient\b/g, "sufficient")
  .replace(/peer-to peer\b/g, "peer-to-peer")
  .replace(/in any way\.The company/g, "in any way. The company");

const lines = raw.split(/\r?\n/);

/** Inclusive 1-based line numbers */
const ranges = [
  [16, 74, "block01"],
  [75, 99, "block02"],
  [100, 128, "block03"],
  [129, 156, "block04"],
  [157, 182, "block05"],
  [183, 231, "block06"],
  [232, 255, "block07"],
  [256, 368, "block08"],
];

function extractRange(start, end) {
  return lines.slice(start - 1, end).join("\n");
}

function stripI18nAttrs(html) {
  return html.replace(/\s+data-i18n(?:-html)?="[^"]+"/g, "");
}

const bodies = {
  heroTitle: "GENERAL RISK DISCLOSURE",
  h1: "GENERAL RISK DISCLOSURE",
  h2:
    "This Risk Disclosure Notice is part of the Client Agreements as\n          defined in our Terms & Conditions",
};

for (const [a, b, key] of ranges) {
  bodies[key] = stripI18nAttrs(extractRange(a, b).trim());
}

const bundlePath = path.join(
  root,
  "tools",
  "i18n-overrides",
  "bundles",
  "generalRiskDisclosure.bodies.en.json"
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
      <div class="doc-page-hero-title" >
        <span data-i18n="generalRiskDisclosurePage.heroTitle" style='color: var(--brand-color-start)'>GENERAL RISK DISCLOSURE</span>
      </div>
`;

const footer = `    </div>
  </div>
</section>
`;

let mid = "";
for (const [, , key] of ranges) {
  const html = bodies[key];
  mid += `      <div data-i18n-html="generalRiskDisclosurePage.${key}">\n${html}\n      </div>\n\n`;
}

fs.writeFileSync(phpPath, header + mid + footer, "utf8");
console.log("Regenerated", phpPath);
