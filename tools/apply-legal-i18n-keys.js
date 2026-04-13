/**
 * Replaces repeated data-i18n="privacyPolicyPage.heroTitle" spans with
 * unique keys per document (privacyPolicyPage.h1, cookiesPolicyPage.h1, …)
 * and merges English strings into locales/en.json.
 *
 * Run from repo root: node tools/apply-legal-i18n-keys.js
 */
const fs = require('fs');
const path = require('path');

const root = path.join(__dirname, '..');

const JOBS = [
  { file: 'includes/privacy-policy.php', jsonPrefix: 'privacyPolicyPage' },
  { file: 'includes/cookies-policy.php', jsonPrefix: 'cookiesPolicyPage' },
  { file: 'includes/terms-conditions.php', jsonPrefix: 'termsConditionsPage' },
  { file: 'includes/client-service-agreement.php', jsonPrefix: 'clientServiceAgreementPage' },
  { file: 'includes/risk-disclosure.php', jsonPrefix: 'riskDisclosurePage' },
  { file: 'includes/order-execution-policy.php', jsonPrefix: 'orderExecutionPolicyPage' },
  { file: 'includes/anti-money-laundering-policy.php', jsonPrefix: 'amlPolicyPage' },
  { file: 'includes/general-risk-disclosure.php', jsonPrefix: 'generalRiskDisclosurePage' },
];

function matchOldRe() {
  return /<span\s+data-i18n="privacyPolicyPage\.heroTitle">([\s\S]*?)<\/span>/g;
}

function deepMerge(target, source) {
  for (const k of Object.keys(source)) {
    const v = source[k];
    if (v && typeof v === 'object' && !Array.isArray(v)) {
      if (!target[k] || typeof target[k] !== 'object') target[k] = {};
      deepMerge(target[k], v);
    } else {
      target[k] = v;
    }
  }
  return target;
}

function processFile(relPath, jsonPrefix) {
  const full = path.join(root, relPath);
  let s = fs.readFileSync(full, 'utf8');
  const strings = {};
  let n = 0;
  s = s.replace(matchOldRe(), (_match, inner) => {
    n += 1;
    const key = `h${n}`;
    const text = inner.replace(/\r\n/g, '\n').trim();
    strings[key] = text;
    return `<span data-i18n="${jsonPrefix}.${key}">${inner}</span>`;
  });
  if (n === 0) {
    console.warn('No matches in', relPath);
    return null;
  }
  fs.writeFileSync(full, s, 'utf8');
  console.log(relPath, '→', n, 'headings under', jsonPrefix);
  return { [jsonPrefix]: strings };
}

const enPath = path.join(root, 'locales', 'en.json');
const en = JSON.parse(fs.readFileSync(enPath, 'utf8'));

for (const { file, jsonPrefix } of JOBS) {
  const patch = processFile(file, jsonPrefix);
  if (patch) deepMerge(en, patch);
}

fs.writeFileSync(enPath, JSON.stringify(en, null, 2) + '\n', 'utf8');
console.log('Updated', enPath);
