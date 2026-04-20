/**
 * One-off: wire legal document body copy (p + li) to data-i18n-html keys under each page prefix,
 * and merge English strings into locales/en.json.
 *
 * Also fixes misused data-i18n="privacyPolicyPage.heroTitle" section headings per file.
 *
 * Run from repo root: node tools/build-legal-page-bodies-i18n.js
 */
const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");

function deepMerge(target, source) {
  for (const k of Object.keys(source)) {
    const v = source[k];
    if (v && typeof v === "object" && !Array.isArray(v)) {
      if (!target[k] || typeof target[k] !== "object") target[k] = {};
      deepMerge(target[k], v);
    } else {
      target[k] = v;
    }
  }
  return target;
}

/** Collect <p class="doc-page-hero-subtitle"> and <li> blocks without data-i18n, in document order */
function collectBodyBlocks(html) {
  const re =
    /<p class="doc-page-hero-subtitle"(?![^>]*\bdata-i18n(?:-html)?=)[^>]*>([\s\S]*?)<\/p>|<li(?![^>]*\bdata-i18n(?:-html)?=)[^>]*>([\s\S]*?)<\/li>/gi;
  const blocks = [];
  let m;
  while ((m = re.exec(html)) !== null) {
    const inner = (m[1] !== undefined ? m[1] : m[2]).trim();
    if (!inner) continue;
    blocks.push({
      full: m[0],
      inner,
      index: m.index,
    });
  }
  return blocks;
}

function applyBodyKeys(html, prefix, stringsOut) {
  const blocks = collectBodyBlocks(html);
  blocks.forEach((b, i) => {
    const key = `b${String(i + 1).padStart(3, "0")}`;
    b.key = key;
    stringsOut[key] = b.inner;
  });
  let out = html;
  for (let i = blocks.length - 1; i >= 0; i--) {
    const b = blocks[i];
    const fullKey = `${prefix}.${b.key}`;
    const replacement = b.full.startsWith("<p")
      ? `<p class="doc-page-hero-subtitle" data-i18n-html="${fullKey}">${b.inner}</p>`
      : `<li data-i18n-html="${fullKey}">${b.inner}</li>`;
    out = out.slice(0, b.index) + replacement + out.slice(b.index + b.full.length);
  }
  return out;
}

function fixPrivacyHeroTitleSpans(html, prefix, startH, endH) {
  let h = startH;
  return html.replace(
    /<span data-i18n="privacyPolicyPage\.heroTitle"([^>]*)>([\s\S]*?)<\/span>/g,
    (match, attrs, inner) => {
      if (h > endH) {
        console.warn("More heroTitle spans than expected for", prefix, "at h", h);
      }
      const key = `h${h}`;
      h += 1;
      return `<span data-i18n="${prefix}.${key}"${attrs}>${inner}</span>`;
    },
  );
}

function fixSingleHeroToH1(html, prefix) {
  return html.replace(
    /<span data-i18n="privacyPolicyPage\.heroTitle"([^>]*)>([\s\S]*?)<\/span>/,
    (_m, attrs, inner) => `<span data-i18n="${prefix}.h1"${attrs}>${inner}</span>`,
  );
}

const JOBS = [
  {
    file: "includes/cookies-policy.php",
    prefix: "cookiesPolicyPage",
    hero: null,
  },
  {
    file: "includes/privacy-policy.php",
    prefix: "privacyPolicyPage",
    hero: "h1",
  },
  {
    file: "includes/terms-conditions.php",
    prefix: "termsConditionsPage",
    hero: "h1",
    stripWrongSubtitle: true,
  },
  {
    file: "includes/general-risk-disclosure.php",
    prefix: "generalRiskDisclosurePage",
    hero: "h1",
  },
  {
    file: "includes/client-service-agreement.php",
    prefix: "clientServiceAgreementPage",
    hero: "h1",
  },
  {
    file: "includes/order-execution-policy.php",
    prefix: "orderExecutionPolicyPage",
    hero: "h2-h19",
  },
  {
    file: "includes/anti-money-laundering-policy.php",
    prefix: "amlPolicyPage",
    hero: "h2-h14",
    stripWrongSubtitle: true,
  },
  {
    file: "includes/risk-disclosure.php",
    prefix: "riskDisclosurePage",
    hero: null,
  },
];

const enPath = path.join(root, "locales", "en.json");
const en = JSON.parse(fs.readFileSync(enPath, "utf8"));

for (const job of JOBS) {
  const full = path.join(root, job.file);
  let html = fs.readFileSync(full, "utf8");

  if (job.stripWrongSubtitle) {
    html = html.replace(
      /<p class="doc-page-hero-subtitle"\s+data-i18n="privacyPolicyPage\.heroSubtitle"/,
      '<p class="doc-page-hero-subtitle"',
    );
  }

  if (job.hero === "h1") {
    html = fixSingleHeroToH1(html, job.prefix);
  } else if (job.hero === "h2-h19") {
    html = fixPrivacyHeroTitleSpans(html, job.prefix, 2, 19);
  } else if (job.hero === "h2-h14") {
    html = fixPrivacyHeroTitleSpans(html, job.prefix, 2, 14);
  }

  const bodyStrings = {};
  const newHtml = applyBodyKeys(html, job.prefix, bodyStrings);
  const count = Object.keys(bodyStrings).length;
  if (count === 0) {
    console.warn(job.file, "— no body blocks found");
  } else {
    fs.writeFileSync(full, newHtml, "utf8");
    deepMerge(en, { [job.prefix]: bodyStrings });
    console.log(job.file, "→", count, "body keys under", job.prefix);
  }
}

fs.writeFileSync(enPath, JSON.stringify(en, null, 2) + "\n", "utf8");
console.log("Updated", enPath);
