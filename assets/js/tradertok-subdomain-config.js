/**
 * Canonical subdomain → regional site slug (country id) mapping.
 * Used by region-redirect.js, offers-promotions.js, and offers-nav.js.
 */
(function (global) {
    'use strict';

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
        if (global.TRADERTOK_COUNTRY_CODE_TO_SUBDOMAIN[code]) {
            return global.TRADERTOK_COUNTRY_CODE_TO_SUBDOMAIN[code];
        }
        if (global.TRADERTOK_LATAM_CODES.indexOf(code) !== -1) {
            return 'latam';
        }
        return null;
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
        return global.TRADERTOK_SUBDOMAIN_MAP[k] ? k : null;
    };
})(typeof window !== 'undefined' ? window : this);
