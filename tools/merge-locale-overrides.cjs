/**
 * Merges flat dot-notation translation overrides into locales/*.json.
 * Run from repo root: node tools/merge-locale-overrides.cjs
 */
const fs = require('fs');
const path = require('path');

const root = path.join(__dirname, '..');

function setDeep(obj, keyPath, value) {
  const parts = keyPath.split('.');
  let cur = obj;
  for (let i = 0; i < parts.length - 1; i++) {
    const p = parts[i];
    if (cur[p] === undefined || cur[p] === null || typeof cur[p] !== 'object') {
      cur[p] = {};
    }
    cur = cur[p];
  }
  cur[parts[parts.length - 1]] = value;
}

function mergeFlatIntoLocale(localeCode, flat) {
  const p = path.join(root, 'locales', `${localeCode}.json`);
  const data = JSON.parse(fs.readFileSync(p, 'utf8'));
  for (const [k, v] of Object.entries(flat)) {
    if (v === undefined || v === null) continue;
    setDeep(data, k, v);
  }
  fs.writeFileSync(p, JSON.stringify(data, null, 2) + '\n', 'utf8');
  console.log('Updated', p, '(' + Object.keys(flat).length + ' keys)');
}

const overridesDir = path.join(__dirname, 'i18n-overrides');
const files = fs.readdirSync(overridesDir).filter((f) => f.endsWith('.flat.json'));

for (const f of files) {
  const localeCode = f.replace('.flat.json', '');
  const flat = JSON.parse(fs.readFileSync(path.join(overridesDir, f), 'utf8'));
  mergeFlatIntoLocale(localeCode, flat);
}
