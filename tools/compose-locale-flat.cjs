/**
 * Merges tools/i18n-overrides/bundles/ui.<lang>.json + legal.<lang>.json → tools/i18n-overrides/<lang>.flat.json
 * Usage: node tools/compose-locale-flat.cjs th
 */
const fs = require('fs');
const path = require('path');

const lang = process.argv[2];
if (!lang) {
  console.error('Usage: node tools/compose-locale-flat.cjs <th|my|ph|id|pk>');
  process.exit(1);
}

const root = path.join(__dirname, 'i18n-overrides', 'bundles');
const uiPath = path.join(root, `ui.${lang}.json`);
const legalPath = path.join(root, `legal.${lang}.json`);
const outPath = path.join(__dirname, 'i18n-overrides', `${lang}.flat.json`);

const ui = JSON.parse(fs.readFileSync(uiPath, 'utf8'));
const legal = JSON.parse(fs.readFileSync(legalPath, 'utf8'));
const flat = { ...ui, ...legal };
const n = Object.keys(flat).length;
if (n !== 242) {
  console.warn(`Warning: expected 242 keys for ${lang}, got ${n}`);
}
fs.writeFileSync(outPath, JSON.stringify(flat, null, 2) + '\n', 'utf8');
console.log('Wrote', outPath, n, 'keys');
