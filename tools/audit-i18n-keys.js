/**
 * One-off: list data-i18n keys used in repo vs keys in locales/en.json
 * Run: node tools/audit-i18n-keys.js
 */
const fs = require('fs');
const path = require('path');

function flatten(obj, prefix = '') {
    const out = {};
    for (const k of Object.keys(obj)) {
        const v = obj[k];
        const key = prefix ? `${prefix}.${k}` : k;
        if (v && typeof v === 'object' && !Array.isArray(v)) {
            Object.assign(out, flatten(v, key));
        } else {
            out[key] = v;
        }
    }
    return out;
}

function walkDir(dir, acc = []) {
    const entries = fs.readdirSync(dir, { withFileTypes: true });
    for (const e of entries) {
        if (e.name === 'node_modules' || e.name === '.git') continue;
        const full = path.join(dir, e.name);
        if (e.isDirectory()) walkDir(full, acc);
        else if (/\.(php|js|html)$/.test(e.name)) acc.push(full);
    }
    return acc;
}

const root = path.join(__dirname, '..');
const en = JSON.parse(fs.readFileSync(path.join(root, 'locales/en.json'), 'utf8'));
const flat = flatten(en);
const keys = new Set(Object.keys(flat));

const files = walkDir(path.join(root, 'includes'))
    .concat(walkDir(path.join(root, 'assets')))
    .concat(fs.existsSync(path.join(root, 'index.php')) ? [path.join(root, 'index.php')] : []);

const re = /data-i18n(?:-html|-placeholder|-aria|-title)?="([^"]+)"/g;
const used = new Set();
for (const file of files) {
    let s;
    try {
        s = fs.readFileSync(file, 'utf8');
    } catch {
        continue;
    }
    let m;
    while ((m = re.exec(s)) !== null) used.add(m[1]);
}

function isPhpDynamicKey(k) {
    return (
        k.includes('<?php') ||
        k.includes('$i18nKey') ||
        k.includes('$i18nSuffix') ||
        k.includes("$article['id']") ||
        /^\s*'\s*\.\s*\$/.test(k) ||
        /\.\s*'\s*$/.test(k)
    );
}

const missing = [...used]
    .filter((k) => !keys.has(k) && !isPhpDynamicKey(k))
    .sort();
const unused = [...keys].filter((k) => !k.startsWith('_') && !used.has(k)).sort();

console.log('Keys in en.json (flattened):', keys.size);
console.log('Unique data-i18n* keys in templates:', used.size);
console.log('MISSING from en.json (' + missing.length + '):');
missing.forEach((k) => console.log('  ', k));
console.log('\n(Sample of unused keys — not all may be referenced in PHP):', unused.length);
