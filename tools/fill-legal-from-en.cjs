/**
 * Overwrites tools/i18n-overrides/bundles/legal.<lang>.json using flattened en.json values
 * for the same keys as legal.th.json (172 keys). Use when legal translations are deferred.
 */
const fs = require('fs');
const path = require('path');

function flatten(obj, prefix = '') {
  const o = {};
  for (const k of Object.keys(obj)) {
    const v = obj[k];
    const key = prefix ? `${prefix}.${k}` : k;
    if (v && typeof v === 'object' && !Array.isArray(v)) {
      Object.assign(o, flatten(v, key));
    } else {
      o[key] = v;
    }
  }
  return o;
}

const root = path.join(__dirname, '..');
const enFlat = flatten(JSON.parse(fs.readFileSync(path.join(root, 'locales/en.json'), 'utf8')));
const template = JSON.parse(
  fs.readFileSync(path.join(__dirname, 'i18n-overrides/bundles/legal.th.json'), 'utf8')
);
const keys = Object.keys(template);
const langs = ['th', 'my', 'ph', 'id', 'pk'];

for (const lang of langs) {
  const out = {};
  for (const k of keys) {
    if (enFlat[k] === undefined) {
      console.warn('Missing in en:', k);
    }
    out[k] = enFlat[k] !== undefined ? enFlat[k] : template[k];
  }
  const p = path.join(__dirname, 'i18n-overrides/bundles', `legal.${lang}.json`);
  fs.writeFileSync(p, JSON.stringify(out, null, 2) + '\n', 'utf8');
  console.log('Wrote', p);
}
