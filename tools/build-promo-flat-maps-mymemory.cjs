"use strict";
/**
 * Builds tools/offers-promotions-data/<code>-flat-map.json (English → target) using MyMemory API.
 * Then run: node tools/apply-promo-string-map.cjs <code> && node tools/build-offers-promotions-into-locales.cjs
 *
 * Usage:
 *   node tools/build-promo-flat-maps-mymemory.cjs           # all targets (slow)
 *   node tools/build-promo-flat-maps-mymemory.cjs es-419   # one locale
 */
const fs = require("fs");
const path = require("path");
const https = require("https");

const dataDir = path.join(__dirname, "offers-promotions-data");
const srcPath = path.join(dataDir, "promotions.en.json");

/** promo file / apply-promo key → MyMemory langpair target code */
const TARGETS = [
  { file: "es-419", api: "es" },
  { file: "th", api: "th" },
  { file: "id", api: "id" },
  { file: "my", api: "ms" },
  { file: "ph", api: "tl" },
  { file: "pk", api: "ur" },
];

const DELAY_MS = 400;

function walkCollectStrings(obj, set) {
  if (typeof obj === "string") {
    set.add(obj);
    return;
  }
  if (Array.isArray(obj)) {
    obj.forEach(function (x) {
      walkCollectStrings(x, set);
    });
    return;
  }
  if (obj && typeof obj === "object") {
    Object.keys(obj).forEach(function (k) {
      walkCollectStrings(obj[k], set);
    });
  }
}

function fetchTranslation(text, toApi) {
  return new Promise(function (resolve) {
    var url =
      "https://api.mymemory.translated.net/get?q=" +
      encodeURIComponent(text) +
      "&langpair=en|" +
      toApi;
    https
      .get(url, function (res) {
        var data = "";
        res.on("data", function (c) {
          data += c;
        });
        res.on("end", function () {
          try {
            var j = JSON.parse(data);
            if (
              j.responseStatus === 200 &&
              j.responseData &&
              j.responseData.translatedText
            ) {
              resolve(String(j.responseData.translatedText));
            } else {
              resolve(text);
            }
          } catch (e) {
            resolve(text);
          }
        });
      })
      .on("error", function () {
        resolve(text);
      });
  });
}

function delay(ms) {
  return new Promise(function (r) {
    setTimeout(r, ms);
  });
}

async function buildOne(target) {
  var mapPath = path.join(dataDir, target.file + "-flat-map.json");
  var src = JSON.parse(fs.readFileSync(srcPath, "utf8"));
  var set = new Set();
  walkCollectStrings(src, set);
  var strings = Array.from(set).sort();
  var map = {};
  if (fs.existsSync(mapPath)) {
    try {
      map = JSON.parse(fs.readFileSync(mapPath, "utf8"));
    } catch (e) {
      map = {};
    }
  }
  console.log(target.file + " (" + target.api + "): " + strings.length + " strings");
  for (var i = 0; i < strings.length; i++) {
    var s = strings[i];
    if (map[s] != null && map[s] !== "") {
      continue;
    }
    map[s] = await fetchTranslation(s, target.api);
    process.stdout.write("\r  " + (i + 1) + "/" + strings.length + "   ");
    await delay(DELAY_MS);
  }
  fs.writeFileSync(mapPath, JSON.stringify(map, null, 2) + "\n", "utf8");
  console.log("\n  wrote " + mapPath);
}

async function main() {
  var only = process.argv[2];
  var list = TARGETS;
  if (only) {
    list = TARGETS.filter(function (t) {
      return t.file === only;
    });
    if (!list.length) {
      console.error("Unknown target:", only, "Expected one of:", TARGETS.map(function (x) { return x.file; }).join(", "));
      process.exit(1);
    }
  }
  for (var j = 0; j < list.length; j++) {
    await buildOne(list[j]);
  }
}

main().catch(function (e) {
  console.error(e);
  process.exit(1);
});
