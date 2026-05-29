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

function setDeep(obj, keyPath, value) {
  const parts = keyPath.replace(/\[(\d+)\]/g, ".$1").split(".").filter(Boolean);
  let cur = obj;
  for (let i = 0; i < parts.length - 1; i++) {
    const p = parts[i];
    if (cur[p] === undefined || typeof cur[p] !== "object") {
      cur[p] = /^\d+$/.test(parts[i + 1]) ? [] : {};
    }
    cur = cur[p];
  }
  cur[parts[parts.length - 1]] = value;
}

const enFlat = [];
flatten(en, "", enFlat);
const enMap = Object.fromEntries(enFlat.map((x) => [x.path, x.value]));

const jaFlat = [];
flatten(ja, "", jaFlat);

let fallback = 0;
for (const item of jaFlat) {
  if (item.value.includes("\uFFFD") && enMap[item.path]) {
    setDeep(ja, item.path, enMap[item.path]);
    fallback++;
  }
}

fs.writeFileSync(jaPath, JSON.stringify(ja, null, 2) + "\n", "utf8");

const jaFlat2 = [];
flatten(ja, "", jaFlat2);
const jaMap = Object.fromEntries(jaFlat2.map((x) => [x.path, x.value]));
let same = 0;
let diff = 0;
for (const k of Object.keys(enMap)) {
  if (enMap[k] === jaMap[k]) same++;
  else diff++;
}

console.log({
  corruptFallback: fallback,
  same,
  diff,
  pct: Math.round((diff / Object.keys(enMap).length) * 100) + "%",
  remainingCorrupt: JSON.stringify(ja).includes("\uFFFD"),
});
