/**
 * Merges tools/home-faq-translated/*.homeFaq.json into locales/*.json
 * Run: node tools/merge-home-faq-locales.js
 */
const fs = require('fs');
const path = require('path');

const root = path.join(__dirname, '..');

const MERGES = [
  ['es-419.json', 'es-419.homeFaq.json'],
  ['vn.json', 'vn.homeFaq.json'],
  ['th.json', 'th.homeFaq.json'],
  ['id.json', 'id.homeFaq.json'],
  ['ph.json', 'ph.homeFaq.json'],
  ['my.json', 'my.homeFaq.json'],
  ['pk.json', 'pk.homeFaq.json'],
];

function merge(localeFile, partialName) {
  const p = path.join(root, 'locales', localeFile);
  const j = JSON.parse(fs.readFileSync(p, 'utf8'));
  const raw = fs
    .readFileSync(path.join(__dirname, 'home-faq-translated', partialName), 'utf8')
    .replace(/^\uFEFF/, '');
  j.homeFaq = JSON.parse(raw);
  fs.writeFileSync(p, JSON.stringify(j, null, 2) + '\n', 'utf8');
  console.log('Merged homeFaq into', localeFile);
}

for (const [locale, partial] of MERGES) {
  merge(locale, partial);
}
