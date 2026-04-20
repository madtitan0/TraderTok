"use strict";
/**
 * Machine-translates riskDisclosurePage *body* keys (not h1–h22 section titles) from English
 * into the target locale via MyMemory. Preserves existing h* titles in each locale file.
 *
 * Usage: node tools/translate-risk-disclosure-bodies-mymemory.cjs [vn|es-419|th|id|my|ph|pk]
 * Run from repo root. Expect ~2–4 min per language (48 strings, rate-limited).
 */
const fs = require("fs");
const path = require("path");
const https = require("https");

const TARGET = process.argv[2] || "vn";

const LOCALE_FILE = {
  vn: "vn.json",
  "es-419": "es-419.json",
  th: "th.json",
  id: "id.json",
  my: "my.json",
  ph: "ph.json",
  pk: "pk.json",
};

const MYMEMORY_TO = {
  vn: "vi",
  "es-419": "es",
  th: "th",
  id: "id",
  my: "ms",
  ph: "tl",
  pk: "ur",
};

const DELAY_MS = 400;

function delay(ms) {
  return new Promise(function (r) {
    setTimeout(r, ms);
  });
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
            if (j.responseStatus !== 200) {
              console.warn(
                "MyMemory status",
                j.responseStatus,
                (j.responseDetails || "").slice(0, 120)
              );
              resolve(text);
              return;
            }
            if (j.responseData && j.responseData.translatedText) {
              var out = String(j.responseData.translatedText);
              if (/MYMEMORY WARNING|USAGE LIMIT/i.test(out)) {
                console.warn("MyMemory quota/limit — keeping English for this chunk.");
                resolve(text);
                return;
              }
              resolve(out);
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

/** Long strings: avoid huge GET URLs; translate in ~400-char chunks at word boundaries. */
async function translateChunked(text, toApi) {
  if (text.length <= 400) {
    return fetchTranslation(text, toApi);
  }
  var parts = [];
  var i = 0;
  while (i < text.length) {
    var end = Math.min(i + 400, text.length);
    if (end < text.length) {
      var sp = text.lastIndexOf(" ", end);
      if (sp > i + 40) {
        end = sp + 1;
      }
    }
    var chunk = text.slice(i, end).trim();
    if (chunk.length) {
      parts.push(await fetchTranslation(chunk, toApi));
    }
    i = end;
    if (i < text.length) {
      await delay(DELAY_MS);
    }
  }
  return parts.join(" ");
}

function isSectionTitleKey(k) {
  return /^h\d+$/.test(k);
}

async function main() {
  var localeName = LOCALE_FILE[TARGET];
  var toApi = MYMEMORY_TO[TARGET];
  if (!localeName || !toApi) {
    console.error("Unknown target:", TARGET);
    process.exit(1);
  }

  var root = path.join(__dirname, "..");
  var enPath = path.join(root, "locales", "en.json");
  var outPath = path.join(root, "locales", localeName);
  var en = JSON.parse(fs.readFileSync(enPath, "utf8"));
  var loc = JSON.parse(fs.readFileSync(outPath, "utf8"));
  var src = en.riskDisclosurePage || {};
  var dst = loc.riskDisclosurePage || {};

  var keys = Object.keys(src).filter(function (k) {
    return !isSectionTitleKey(k);
  });
  console.log(TARGET, "→", keys.length, "body keys");

  for (var i = 0; i < keys.length; i++) {
    var k = keys[i];
    var english = src[k];
    if (typeof english !== "string") continue;
    process.stdout.write("\r  " + (i + 1) + "/" + keys.length + " " + k + "   ");
    dst[k] = await translateChunked(english, toApi);
    await delay(DELAY_MS);
  }

  loc.riskDisclosurePage = dst;
  fs.writeFileSync(outPath, JSON.stringify(loc, null, 2) + "\n", "utf8");
  console.log("\nwrote", outPath);
}

main().catch(function (e) {
  console.error(e);
  process.exit(1);
});
