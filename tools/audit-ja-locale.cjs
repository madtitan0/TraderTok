"use strict";
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const en = JSON.parse(fs.readFileSync(path.join(root, "locales", "en.json"), "utf8"));
const jaPath = path.join(root, "locales", "ja.json");
const ja = JSON.parse(fs.readFileSync(jaPath, "utf8"));

function flatten(obj, prefix, out) {
  if (typeof obj === "string") {
    out.push({ path: prefix, value: obj });
    return;
  }
  if (Array.isArray(obj)) {
    obj.forEach((v, i) => flatten(v, `${prefix}[${i}]`, out));
  } else if (obj && typeof obj === "object") {
    for (const k of Object.keys(obj)) {
      flatten(obj[k], prefix ? `${prefix}.${k}` : k, out);
    }
  }
}

const enFlat = [];
const jaFlat = [];
flatten(en, "", enFlat);
flatten(ja, "", jaFlat);
const enMap = Object.fromEntries(enFlat.map((x) => [x.path, x.value]));
const jaMap = Object.fromEntries(jaFlat.map((x) => [x.path, x.value]));

let same = 0;
let diff = 0;
let hasJa = 0;
for (const k of Object.keys(enMap)) {
  if (enMap[k] === jaMap[k]) same++;
  else diff++;
  if (/[\u3040-\u30ff\u4e00-\u9faf]/.test(jaMap[k] || "")) hasJa++;
}

console.log({
  total: Object.keys(enMap).length,
  identicalToEn: same,
  translated: diff,
  valuesWithJapanese: hasJa,
  pctJapanese: Math.round((hasJa / Object.keys(enMap).length) * 100) + "%",
  corrupt: JSON.stringify(ja).includes("\uFFFD"),
});

console.log("Sample termsConditionsPage.h1:", jaMap["termsConditionsPage.h1"]);
console.log("Sample homeFaq.title:", jaMap["homeFaq.title"]);
console.log("Sample footer.support:", jaMap["footer.support"]);
