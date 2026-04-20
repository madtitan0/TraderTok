/**
 * Deep-merge missing keys from locales/en.json into other locale JSON files.
 * Preserves existing translations; only adds keys that are absent (undefined).
 * Run: node tools/merge-missing-locale-keys-from-en.js
 */
const fs = require("fs");
const path = require("path");

function mergeMissing(target, source) {
  if (Array.isArray(source)) {
    if (target !== undefined && target !== null) return target;
    return JSON.parse(JSON.stringify(source));
  }
  if (source === null || typeof source !== "object") {
    return target !== undefined ? target : source;
  }
  const out =
    target && typeof target === "object" && !Array.isArray(target)
      ? { ...target }
      : {};
  for (const k of Object.keys(source)) {
    if (!(k in out)) {
      out[k] = mergeMissing(undefined, source[k]);
    } else {
      out[k] = mergeMissing(out[k], source[k]);
    }
  }
  return out;
}

const root = path.join(__dirname, "..");
const localesDir = path.join(root, "locales");
const enPath = path.join(localesDir, "en.json");
const en = JSON.parse(fs.readFileSync(enPath, "utf8"));

for (const name of fs.readdirSync(localesDir)) {
  if (!name.endsWith(".json") || name === "en.json") continue;
  const p = path.join(localesDir, name);
  const loc = JSON.parse(fs.readFileSync(p, "utf8"));
  const merged = mergeMissing(loc, en);
  fs.writeFileSync(p, JSON.stringify(merged, null, 2) + "\n", "utf8");
  console.log("merged missing keys from en into", name);
}
