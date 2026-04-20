"use strict";
/**
 * Rebuilds includes/client-service-agreement.php from
 * tools/i18n-overrides/bundles/clientServiceAgreement.bodies.en.json
 * Usage: node tools/refresh-client-service-agreement-php-from-bundle.cjs
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const bundlePath = path.join(
  root,
  "tools",
  "i18n-overrides",
  "bundles",
  "clientServiceAgreement.bodies.en.json"
);
const phpPath = path.join(root, "includes", "client-service-agreement.php");

function stripI18nAttrs(html) {
  if (typeof html !== "string") return html;
  return html.replace(/\s+data-i18n(?:-html)?="[^"]+"/g, "");
}

const bodies = JSON.parse(fs.readFileSync(bundlePath, "utf8"));
let changed = false;
for (const k of Object.keys(bodies)) {
  if (k.startsWith("block")) {
    const n = stripI18nAttrs(bodies[k]);
    if (n !== bodies[k]) changed = true;
    bodies[k] = n;
  }
}
if (changed) {
  fs.writeFileSync(bundlePath, JSON.stringify(bodies, null, 2) + "\n", "utf8");
}

const blockKeys = Object.keys(bodies)
  .filter((k) => /^block\d+$/.test(k))
  .sort(
    (a, b) =>
      parseInt(a.replace("block", ""), 10) -
      parseInt(b.replace("block", ""), 10)
  );

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
        <span data-i18n="clientServiceAgreementPage.heroTitle" style='color: var(--brand-color-start)'>${
          bodies.heroTitle || "CLIENT SERVICE AGREEMENT"
        }</span>
      </div>
`;

const footer = `    </div>
  </div>
</section>
`;

let mid = "";
for (const key of blockKeys) {
  mid += `      <div data-i18n-html="clientServiceAgreementPage.${key}">\n${bodies[key]}\n      </div>\n\n`;
}

fs.writeFileSync(phpPath, header + mid + footer, "utf8");
console.log("Updated", phpPath, "(" + blockKeys.length + " blocks)");