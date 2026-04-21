/**
 * Canonical subdomain → regional site slug (country id) mapping.
 * Used by region-redirect.js, offers-promotions.js, and offers-nav.js.
 *
 * Subdomain routing and IP→subdomain redirects are limited to SEA (vn, th, my, ph, id).
 * Offers & Promotions use TraderTokIsoToOfferPromoRegionSlug (all mapped regions), independent of SEA routing.
 * Full mappings stay in TRADERTOK_SUBDOMAIN_MAP for easy reactivation.
 */
(function (global) {
    'use strict';

    /** Subdomain keys that participate in regional routing (Southeast Asia only). */
    global.TRADERTOK_SEA_ACTIVE_SUBDOMAIN_KEYS = {
        vn: true,
        th: true,
        my: true,
        ph: true,
        id: true
    };

    global.TraderTokIsActiveRegionalSubdomainKey = function (key) {
        return !!(key && global.TRADERTOK_SEA_ACTIVE_SUBDOMAIN_KEYS[key]);
    };

    /** @type {Object.<string, string>} subdomain code → country id (matches PROMOTIONS keys) */
    global.TRADERTOK_SUBDOMAIN_MAP = {
        vn: 'vietnam',
        th: 'thailand',
        my: 'malaysia',
        ph: 'philippines',
        id: 'indonesia',
        pk: 'pakistan',
        latam: 'latam',
        na: 'namibia',
        ke: 'kenya',
        gh: 'ghana',
        ng: 'nigeria',
        za: 'south-africa',
        tt: 'trinidad-tobago',
        gy: 'guyana'
    };

    /** PHP also serves es.* as LATAM — normalize host label to canonical subdomain key */
    global.TRADERTOK_SUBDOMAIN_HOST_ALIASES = {
        es: 'latam'
    };

    /**
     * True when hostname is a known regional label on tradertok.com that is not SEA-active
     * (visitor should use the global apex site).
     * @param {string} hostname
     * @returns {boolean}
     */
    global.TraderTokShouldRedirectInactiveSubdomainToGlobal = function (hostname) {
        var parts = String(hostname || '').toLowerCase().split('.');
        if (parts.length < 3 || parts[0] === 'www') {
            return false;
        }
        var k = parts[0];
        if (global.TRADERTOK_SUBDOMAIN_HOST_ALIASES[k]) {
            k = global.TRADERTOK_SUBDOMAIN_HOST_ALIASES[k];
        }
        if (!global.TRADERTOK_SUBDOMAIN_MAP[k]) {
            return false;
        }
        return !global.TraderTokIsActiveRegionalSubdomainKey(k);
    };

    /** Subdomain key → locale code (locales/*.json) */
    global.TRADERTOK_SUBDOMAIN_TO_LANG = {
        vn: 'vn',
        th: 'th',
        my: 'my',
        ph: 'ph',
        id: 'id',
        pk: 'pk',
        latam: 'es-419',
        na: 'en',
        ke: 'en',
        gh: 'en',
        ng: 'en',
        za: 'en',
        tt: 'en',
        gy: 'en'
    };

    /** ISO 3166-1 alpha-2 → subdomain key (must exist in TRADERTOK_SUBDOMAIN_MAP) */
    global.TRADERTOK_COUNTRY_CODE_TO_SUBDOMAIN = {
        VN: 'vn', TH: 'th', MY: 'my', PH: 'ph',
        ID: 'id', PK: 'pk', NA: 'na', KE: 'ke',
        GH: 'gh', NG: 'ng', ZA: 'za', TT: 'tt', GY: 'gy'
    };

    global.TRADERTOK_LATAM_CODES = [
        'MX', 'BR', 'AR', 'CO', 'CL', 'PE', 'EC', 'VE',
        'UY', 'PY', 'BO', 'CR', 'PA', 'GT', 'HN', 'SV',
        'NI', 'DO', 'CU'
    ];

    /**
     * @param {string} iso Two-letter country code
     * @returns {string|null} subdomain key or null
     */
    global.TraderTokCountryCodeToSubdomainKey = function (iso) {
        if (!iso) return null;
        var code = String(iso).toUpperCase();
        var key = null;
        if (global.TRADERTOK_COUNTRY_CODE_TO_SUBDOMAIN[code]) {
            key = global.TRADERTOK_COUNTRY_CODE_TO_SUBDOMAIN[code];
        } else if (global.TRADERTOK_LATAM_CODES.indexOf(code) !== -1) {
            key = 'latam';
        }
        if (!key || !global.TraderTokIsActiveRegionalSubdomainKey(key)) {
            return null;
        }
        return key;
    };

    /**
     * ISO country code → UI locale (locales/*.json). Used for IP geolocation language.
     * @param {string} iso Two-letter country code
     * @returns {string|null} locale code or null if no mapped trading region
     */
    global.TraderTokCountryCodeToLocale = function (iso) {
        var sub = global.TraderTokCountryCodeToSubdomainKey(iso);
        if (!sub || !global.TRADERTOK_SUBDOMAIN_TO_LANG) return null;
        return global.TRADERTOK_SUBDOMAIN_TO_LANG[sub] || null;
    };

    /**
     * @param {string} sub Subdomain label from host (e.g. ng, vn, es)
     * @returns {string|null} canonical key present in TRADERTOK_SUBDOMAIN_MAP
     */
    global.TraderTokNormalizeSubdomainKey = function (sub) {
        if (!sub) return null;
        var k = String(sub).toLowerCase();
        if (k === 'www') return null;
        if (global.TRADERTOK_SUBDOMAIN_HOST_ALIASES[k]) {
            k = global.TRADERTOK_SUBDOMAIN_HOST_ALIASES[k];
        }
        if (!global.TRADERTOK_SUBDOMAIN_MAP[k]) {
            return null;
        }
        return global.TraderTokIsActiveRegionalSubdomainKey(k) ? k : null;
    };

    /**
     * ISO → offers/promotions region id (slug). Uses full TRADERTOK_SUBDOMAIN_MAP, not SEA-only routing.
     * @param {string} iso Two-letter country code
     * @returns {string|null}
     */
    global.TraderTokIsoToOfferPromoRegionSlug = function (iso) {
        if (!iso) return null;
        var code = String(iso).toUpperCase();
        var key = null;
        if (global.TRADERTOK_COUNTRY_CODE_TO_SUBDOMAIN[code]) {
            key = global.TRADERTOK_COUNTRY_CODE_TO_SUBDOMAIN[code];
        } else if (global.TRADERTOK_LATAM_CODES.indexOf(code) !== -1) {
            key = 'latam';
        }
        if (!key || !global.TRADERTOK_SUBDOMAIN_MAP[key]) return null;
        return global.TRADERTOK_SUBDOMAIN_MAP[key];
    };

    var GEO_FETCH_TIMEOUT_MS = 4000;

    function fetchWithAbortGeo(url, timeoutMs) {
        var controller = new AbortController();
        var tid = setTimeout(function () { controller.abort(); }, timeoutMs);
        return fetch(url, { signal: controller.signal }).finally(function () {
            clearTimeout(tid);
        });
    }

    /**
     * Visitor ISO country code (async). Shared by offers UI and nav.
     * @returns {Promise<string|null>}
     */
    global.TraderTokFetchVisitorIsoCountryCode = async function () {
        try {
            var response = await fetchWithAbortGeo('https://ipapi.co/json/', GEO_FETCH_TIMEOUT_MS);
            if (response.ok) {
                var data = await response.json();
                if (data && data.country_code) {
                    return String(data.country_code).toUpperCase();
                }
            }
        } catch (e) {}

        try {
            var response2 = await fetchWithAbortGeo('https://get.geojs.io/v1/ip/country.json', GEO_FETCH_TIMEOUT_MS);
            if (response2.ok) {
                var data2 = await response2.json();
                if (data2 && data2.country && String(data2.country).length === 2) {
                    return String(data2.country).toUpperCase();
                }
            }
        } catch (e2) {}

        return null;
    };

    /**
     * Visitor is outside all configured offer/promotion regions (ISO did not map).
     * Session flag drives empty + non-interactive offers UI site-wide.
     */
    global.TRADERTOK_SESSION_OFFERS_UNSUPPORTED = 'tradertok_offers_unsupported';

    global.TraderTokClearOffersUnsupportedVisitorFlag = function () {
        try {
            sessionStorage.removeItem(global.TRADERTOK_SESSION_OFFERS_UNSUPPORTED);
        } catch (e) {}
    };

    global.TraderTokSetOffersUnsupportedVisitorFlag = function () {
        try {
            sessionStorage.setItem(global.TRADERTOK_SESSION_OFFERS_UNSUPPORTED, '1');
        } catch (e) {}
    };

    global.TraderTokIsOffersUnsupportedVisitor = function () {
        try {
            return sessionStorage.getItem(global.TRADERTOK_SESSION_OFFERS_UNSUPPORTED) === '1';
        } catch (e) {
            return false;
        }
    };
})(typeof window !== 'undefined' ? window : this);
