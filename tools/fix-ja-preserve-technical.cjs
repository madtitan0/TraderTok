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

function shouldKeepEnglish(key, value) {
  if (typeof value !== "string") return false;
  if (key.endsWith("Link") || key.endsWith("Url") || key.endsWith("Href")) return true;
  if (/^\.\/?\?page=/.test(value)) return true;
  if (/^https?:\/\//.test(value)) return true;
  if (/^mailto:/.test(value)) return true;
  if (/^support@/.test(value)) return true;
  if (/^\+?\d[\d\s-]{6,}$/.test(value.trim())) return true;
  if (/^you@example\.com$/.test(value)) return true;
  if (value === "Apple Pay" || value === "Google Pay") return true;
  if (value === "iOS" || value === "FSC") return true;
  if (/^\d{2}:\d{2}\sGMT/.test(value)) return true;
  return false;
}

const fe = [];
const fj = [];
flatten(en, "", fe);
flatten(ja, "", fj);
const fjMap = Object.fromEntries(fj.map((x) => [x.path, x.value]));

let fixed = 0;
for (const { path: keyPath, value } of fe) {
  if (!shouldKeepEnglish(keyPath.split(".").pop(), value)) continue;
  if (fjMap[keyPath] !== value) {
    setDeep(ja, keyPath, value);
    fixed++;
  }
}

fs.writeFileSync(jaPath, JSON.stringify(ja, null, 2) + "\n", "utf8");
console.log("Restored", fixed, "technical/URL values from en.json");
