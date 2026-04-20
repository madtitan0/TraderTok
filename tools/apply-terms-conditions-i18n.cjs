"use strict";
/**
 * Injects data-i18n-html="termsConditionsPage.<key>" on each doc-page-hero-subtitle p
 * and doc-page-hero-list li in includes/terms-conditions.php (same key algorithm as
 * extract-terms-conditions-bodies.cjs).
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const phpPath = path.join(root, "includes", "terms-conditions.php");

let html = fs.readFileSync(phpPath, "utf8");
html = html.replace(/\r\n/g, "\n");

let lastH = "h2";
const counters = {};

function nextKey(kind) {
  const ck = `${lastH}_${kind}`;
  const id = (counters[ck] = (counters[ck] || 0) + 1);
  return `${lastH}_${kind}${id}`;
}

const tokenRe =
  /(<span\s+data-i18n="termsConditionsPage\.(h\d+)"[^>]*>[\s\S]*?<\/span>)|(<p[^>]*class="doc-page-hero-subtitle"[^>]*>[\s\S]*?<\/p>)|(<ul[^>]*class="doc-page-hero-list"[^>]*>[\s\S]*?<\/ul>)/gi;

const out = [];
let lastIndex = 0;
let m;
while ((m = tokenRe.exec(html)) !== null) {
  out.push(html.slice(lastIndex, m.index));
  if (m[2]) {
    lastH = m[2];
    out.push(m[0]);
    lastIndex = m.index + m[0].length;
    continue;
  }
  if (m[3]) {
    const full = m[3];
    const inner = full
      .replace(/^<p[^>]*>/i, "")
      .replace(/<\/p>\s*$/i, "")
      .trim();
    if (!inner) {
      out.push(full);
      lastIndex = m.index + m[0].length;
      continue;
    }
    const k = nextKey("p");
    const openMatch = full.match(/^<p([^>]*)>/i);
    const attrs = openMatch ? openMatch[1] : "";
    if (/data-i18n-html\s*=/.test(attrs)) {
      out.push(full);
    } else {
      const injected = `<p${attrs} data-i18n-html="termsConditionsPage.${k}">`;
      out.push(injected + inner + "</p>");
    }
    lastIndex = m.index + m[0].length;
    continue;
  }
  if (m[4]) {
    const ul = m[4];
    const ulStart = ul.match(/^<ul[^>]*>/i)[0];
    const ulRest = ul.slice(ulStart.length, ul.length - "</ul>".length);
    const liRe = /<li([^>]*)>([\s\S]*?)<\/li>/gi;
    let rebuilt = ulStart;
    let lm;
    let liLast = 0;
    while ((lm = liRe.exec(ulRest)) !== null) {
      rebuilt += ulRest.slice(liLast, lm.index);
      const liAttrs = lm[1] || "";
      const liInner = lm[2].trim();
      liLast = lm.index + lm[0].length;
      if (!liInner) {
        rebuilt += lm[0];
        continue;
      }
      const k = nextKey("li");
      if (/data-i18n-html\s*=/.test(liAttrs)) {
        rebuilt += lm[0];
      } else {
        rebuilt += `<li${liAttrs} data-i18n-html="termsConditionsPage.${k}">${lm[2]}</li>`;
      }
    }
    rebuilt += ulRest.slice(liLast) + "</ul>";
    out.push(rebuilt);
    lastIndex = m.index + m[0].length;
  }
}
out.push(html.slice(lastIndex));

fs.writeFileSync(phpPath, out.join(""), "utf8");
console.log("updated", phpPath);
