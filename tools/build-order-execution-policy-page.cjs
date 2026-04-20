"use strict";
/**
 * Extracts Order Execution Policy HTML into orderExecutionPolicyPage.block01..block18,
 * writes tools/i18n-overrides/bundles/orderExecutionPolicy.bodies.en.json
 * and regenerates includes/order-execution-policy.php.
 *
 * Usage: node tools/build-order-execution-policy-page.cjs
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const phpPath = path.join(root, "includes", "order-execution-policy.php");
let raw = fs.readFileSync(phpPath, "utf8");
raw = raw.replace(
  /(\n\s*<p class="doc-page-hero-subtitle">\s*\n\s*)n order to meet/g,
  "$1In order to meet"
);

const lines = raw.split(/\r?\n/);

/** Inclusive 1-based line numbers — each block is one major section (starts at h1) */
const ranges = [
  [16, 71, "block01"],
  [72, 83, "block02"],
  [84, 93, "block03"],
  [94, 120, "block04"],
  [121, 131, "block05"],
  [132, 159, "block06"],
  [160, 176, "block07"],
  [177, 203, "block08"],
  [204, 227, "block09"],
  [228, 262, "block10"],
  [263, 320, "block11"],
  [321, 335, "block12"],
  [336, 347, "block13"],
  [348, 361, "block14"],
  [362, 373, "block15"],
  [374, 386, "block16"],
  [387, 399, "block17"],
  [400, 415, "block18"],
];

function extractRange(start, end) {
  return lines.slice(start - 1, end).join("\n");
}

function stripI18nAttrs(html) {
  return html.replace(/\s+data-i18n(?:-html)?="[^"]+"/g, "");
}

const bodies = {
  heroTitle: "ORDER EXECUTION POLICY",
  h1: "ORDER EXECUTION POLICY",
  h2: "Definitions",
  h3: "1. OBJECTIVE",
  h4: "2. SCOPE SECTION",
  h5: "3. GENERAL EXECUTION POLICY",
  h6: "4. CLIENT COMMUNICATION",
  h7: "5.BEST EXECUTION CRITERIA",
  h8: "6. EXECUTION FACTORS",
  h9: "7. EXECUTION VENUES",
  h10: "8. SLIPPAGE",
  h11: "9. SPECIFIC INSTRUCTIONS",
  h12: "10. TYPES OF ORDERS",
  h13: "11. PRICING",
  h14: "12. ORDER SIZE",
  h15: "13. ORDER SPEED",
  h16: "14. ORDER EXECUTION PROBABILITY",
  h17: "15. ORDER SETTLEMENT PROBABILITY",
  h18: "16. MARKET IMPACT",
  h19: "17. CONCLUSION",
};

for (const [a, b, key] of ranges) {
  bodies[key] = stripI18nAttrs(extractRange(a, b).trim());
}

const bundlePath = path.join(
  root,
  "tools",
  "i18n-overrides",
  "bundles",
  "orderExecutionPolicy.bodies.en.json"
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
        <span data-i18n="orderExecutionPolicyPage.heroTitle" style='color: var(--brand-color-start)'>ORDER EXECUTION POLICY</span>
      </div>
`;

const footer = `    </div>
  </div>
</section>
`;

let mid = "";
for (const [, , key] of ranges) {
  const html = bodies[key];
  mid += `      <div data-i18n-html="orderExecutionPolicyPage.${key}">\n${html}\n      </div>\n\n`;
}

fs.writeFileSync(phpPath, header + mid + footer, "utf8");
console.log("Regenerated", phpPath);
