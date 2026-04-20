/**
 * Merges tools/offers-promotions-data/promotions.<lang>.json into locales/<file>.json
 * under offersPage.promotions, and merges offers-page-ui.json strings into offersPage.
 * Fallback: promotions.en.json when a language-specific promotions file is missing.
 *
 * Run: node tools/build-offers-promotions-into-locales.cjs
 */
"use strict";

const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const dataDir = path.join(__dirname, "offers-promotions-data");
const localesDir = path.join(root, "locales");

const LANG_MAP = [
  { file: "en.json", promoKey: "en" },
  { file: "es-419.json", promoKey: "es-419" },
  { file: "id.json", promoKey: "id" },
  { file: "my.json", promoKey: "my" },
  { file: "ph.json", promoKey: "ph" },
  { file: "pk.json", promoKey: "pk" },
  { file: "th.json", promoKey: "th" },
  { file: "vn.json", promoKey: "vn" },
];

function deepMergeOffersPageUi(target, ui) {
  if (!ui || typeof ui !== "object") return;
  Object.keys(ui).forEach(function (k) {
    if (k === "regions" && ui.regions && typeof ui.regions === "object") {
      target.regions = target.regions || {};
      Object.assign(target.regions, ui.regions);
      return;
    }
    if (k === "meta" && ui.meta && typeof ui.meta === "object") {
      target.meta = target.meta || {};
      Object.assign(target.meta, ui.meta);
      return;
    }
    target[k] = ui[k];
  });
}

const uiAll = JSON.parse(fs.readFileSync(path.join(dataDir, "offers-page-ui.json"), "utf8"));

const enPromoPath = path.join(dataDir, "promotions.en.json");
const enPromo = JSON.parse(fs.readFileSync(enPromoPath, "utf8"));

for (const { file, promoKey } of LANG_MAP) {
  const localePath = path.join(localesDir, file);
  const j = JSON.parse(fs.readFileSync(localePath, "utf8"));

  j.offersPage = j.offersPage || {};

  const promoFile = path.join(dataDir, "promotions." + promoKey + ".json");
  let promotions;
  if (fs.existsSync(promoFile)) {
    promotions = JSON.parse(fs.readFileSync(promoFile, "utf8"));
  } else {
    promotions = enPromo;
  }
  j.offersPage.promotions = promotions;

  const ui = uiAll[promoKey] || uiAll.en;
  deepMergeOffersPageUi(j.offersPage, ui);

  fs.writeFileSync(localePath, JSON.stringify(j, null, 2) + "\n", "utf8");
  console.log("updated offersPage in", file);
}
