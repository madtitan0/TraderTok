"use strict";
/**
 * Extracts Client Service Agreement HTML into clientServiceAgreementPage.block01..block36,
 * writes tools/i18n-overrides/bundles/clientServiceAgreement.bodies.en.json
 * and regenerates includes/client-service-agreement.php.
 *
 * Line ranges are inclusive (end index for slice is exclusive: slice(start-1, end)).
 * After first run, prefer refresh-client-service-agreement-php-from-bundle.cjs.
 *
 * Usage: node tools/build-client-service-agreement-page.cjs
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const phpPath = path.join(root, "includes", "client-service-agreement.php");
let raw = fs.readFileSync(phpPath, "utf8");

const lines = raw.split(/\r?\n/);

/**
 * Inclusive line start, inclusive line end (extractRange uses slice(start-1, end) so end is exclusive in slice terms = last line included)
 */
const ranges = [
  [16, 33, "block01"],
  [34, 70, "block02"],
  [71, 109, "block03"],
  [110, 134, "block04"],
  [135, 231, "block05"],
  [232, 292, "block06"],
  [293, 335, "block07"],
  [336, 374, "block08"],
  [375, 488, "block09"],
  [489, 531, "block10"],
  [532, 623, "block11"],
  [624, 662, "block12"],
  [663, 707, "block13"],
  [708, 759, "block14"],
  [760, 784, "block15"],
  [785, 806, "block16"],
  [807, 892, "block17"],
  [893, 1019, "block18"],
  [1020, 1029, "block19"],
  [1030, 1047, "block20"],
  [1048, 1062, "block21"],
  [1063, 1112, "block22"],
  [1113, 1148, "block23"],
  [1149, 1173, "block24"],
  [1174, 1251, "block25"],
  [1252, 1446, "block26"],
  [1448, 1498, "block27"],
  [1500, 1550, "block28"],
  [1552, 1592, "block29"],
  [1594, 1617, "block30"],
  [1618, 1634, "block31"],
  [1635, 1652, "block32"],
  [1653, 1701, "block33"],
  [1703, 1715, "block34"],
  [1717, 1755, "block35"],
  [1756, 1807, "block36"],
];

function extractRange(start, end) {
  return lines.slice(start - 1, end).join("\n");
}

function stripI18nAttrs(html) {
  return html.replace(/\s+data-i18n(?:-html)?="[^"]+"/g, "");
}

const bodies = {
  heroTitle: "CLIENT SERVICE AGREEMENT",
  h1: "CLIENT SERVICE AGREEMENT",
  h2: "INTRODUCTION",
  h3: "WHEREAS:",
  h4: "1. COMMUNICATION WITH US",
  h5: "2. MEMBERSHIP ELIGIBILITY",
  h6: "3. DEFINITIONS – INTEPRETATION",
  h7: "4. PROVISION OF SERVICES",
  h8: "5. ACCOUNT OPENING INFORMATION AND REQUIREMENTS",
  h9: "6. GUARANTEES ON BEHALF OF THE CLIENT",
  h10: "7. ELECTRONIC TRADING",
  h11: "8. FINANCIAL INFORMATION",
  h12: "9. ORDERS – INSTRUCTIONS AND BASIS OF DEALINGS",
  h13: "10.CONFIRMATIONS",
  h14: "11.PRICING",
  h15: "12.REFUSAL TO EXECUTE ORDERS",
  h16: "13.CANCELLATION OF TRANSACTIONS",
  h17: "14.SETTLEMENT OF TRANSACTIONS",
  h18: "15.BONUS AND PROMOTIONS POLICY",
  h19: "16.CLIENTS FUNDS",
  h20: "MINIMUM WITHDRAWAL AMOUNTS",
  h21: "WITHDRAWAL CHARGES",
  h22: "17.DORMANT ACCOUNT PROCEDURE",
  h23: "18.COSTS AND CHARGES",
  h24: "19.COMPANY LIABILITY AND INDEMNITY",
  h25: "20.DURATION OF THE AGREEMENT AND AMENDMENT THEREOF",
  h26:
    "21.IMPROPER OR ABUSIVE TRADING AND/ OR UNAUTHORISED\n          ACTIVITIES",
  h27: "22.CFD TRADING TERMS",
  h28: "23.TERMINATION",
  h29: "24.EVENTS OF DEFAULT AND RIGHTS ON DEFAULT",
  h30: "25.ACKNOWLEDGEMENT OF RISKS",
  h31: "26.CONFIDENTIAL INFORMATION",
  h32: "27.NOTICES",
  h33: "28.CONFILICT OF INTEREST",
  h34: "29.GENERAL PROVISIONS",
  h35: "30.APPLICABLE LAW, JURISDICTION",
  h36: "31.DISPUTE RESOLUTION PROVISION",
  h37: "32.MISCELLANEOUS",
};

for (const [a, b, key] of ranges) {
  bodies[key] = stripI18nAttrs(extractRange(a, b).trim());
}

const bundlePath = path.join(
  root,
  "tools",
  "i18n-overrides",
  "bundles",
  "clientServiceAgreement.bodies.en.json"
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
        <span data-i18n="clientServiceAgreementPage.heroTitle" style='color: var(--brand-color-start)'>CLIENT SERVICE AGREEMENT</span>
      </div>
`;

const footer = `    </div>
  </div>
</section>
`;

let mid = "";
for (const [, , key] of ranges) {
  const html = bodies[key];
  mid += `      <div data-i18n-html="clientServiceAgreementPage.${key}">\n${html}\n      </div>\n\n`;
}

fs.writeFileSync(phpPath, header + mid + footer, "utf8");
console.log("Regenerated", phpPath);
