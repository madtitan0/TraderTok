/**
 * One-off: merge tools/home-faq-export.json into locales/en.json as homeFaq.
 * Run: node tools/merge-home-faq-en.js
 */
const fs = require('fs');
const path = require('path');

const root = path.join(__dirname, '..');
const raw = fs.readFileSync(path.join(__dirname, 'home-faq-export.json'), 'utf8').replace(/^\uFEFF/, '');
const faqExport = JSON.parse(raw);

const sec = faqExport[2];
const item = sec.items[1];
item.paragraphs = [
  'Phone: <a class="license-link" href="tel:+447520640890">+44 7520 640 890</a>',
  'Email: <a class="license-link" href="mailto:support@tradertok.com">support@tradertok.com</a>',
  'Website contact form',
];
delete item.linkify;

const homeFaq = {
  title: 'Frequently Asked Questions',
  subtitle:
    'Quick answers about TraderTok—markets, accounts, funding, fees, regulation, and support.',
  lead: 'Explore topics below. Each section expands for more detail.',
  sections: faqExport,
};

const enPath = path.join(root, 'locales', 'en.json');
const en = JSON.parse(fs.readFileSync(enPath, 'utf8'));
en.homeFaq = homeFaq;
fs.writeFileSync(enPath, JSON.stringify(en, null, 2) + '\n', 'utf8');
console.log('Merged homeFaq into', enPath);
