/**
 * TraderTok Region Detection & Redirect Module
 * -----------------------------------------------
 * Runs early on every page. Handles:
 *  1. URL hash override  (#vietnam, #ng, etc.)
 *  2. Subdomain detection (client-side fallback for window.subdomainData)
 *  3. IP geolocation redirect (first-time visit to main domain only)
 *  4. Global window.regionData for other scripts to consume
 *
 * Requires: tradertok-subdomain-config.js (canonical TRADERTOK_SUBDOMAIN_MAP)
 */

(function () {
    'use strict';

    var MAIN_DOMAINS = ['tradertok.com', 'www.tradertok.com'];

    function getMainDomains() {
        var list = MAIN_DOMAINS.slice();
        if (Array.isArray(window.TRADERTOK_MAIN_DOMAINS)) {
            for (var i = 0; i < window.TRADERTOK_MAIN_DOMAINS.length; i++) {
                var h = window.TRADERTOK_MAIN_DOMAINS[i];
                if (h && list.indexOf(h) === -1) {
                    list.push(h);
                }
            }
        }
        return list;
    }
    var REDIRECT_SESSION_KEY = 'tradertok_redirected';
    var GEO_CACHE_KEY = 'tradertok_geo_region';
    var GEO_TIMEOUT_MS = 4000;

    /**
     * Subdomain key → { country, lang } built from global map (single source of truth).
     */
    var SUBDOMAIN_MAP = (function () {
        if (!window.TRADERTOK_SUBDOMAIN_MAP || !window.TRADERTOK_SUBDOMAIN_TO_LANG) {
            return {};
        }
        var raw = window.TRADERTOK_SUBDOMAIN_MAP;
        var langs = window.TRADERTOK_SUBDOMAIN_TO_LANG;
        var out = {};
        for (var k in raw) {
            if (Object.prototype.hasOwnProperty.call(raw, k)) {
                out[k] = { country: raw[k], lang: langs[k] || 'en' };
            }
        }
        var aliases = window.TRADERTOK_SUBDOMAIN_HOST_ALIASES || {};
        for (var a in aliases) {
            if (Object.prototype.hasOwnProperty.call(aliases, a)) {
                var canon = aliases[a];
                if (out[canon]) {
                    out[a] = out[canon];
                }
            }
        }
        return out;
    })();

    var HASH_TO_COUNTRY = {
        vn: 'vietnam', th: 'thailand', my: 'malaysia',
        ph: 'philippines', id: 'indonesia', pk: 'pakistan',
        latam: 'latam', es: 'latam', na: 'namibia',
        ke: 'kenya', gh: 'ghana', ng: 'nigeria',
        za: 'south-africa', tt: 'trinidad-tobago', gy: 'guyana',
        vietnam: 'vietnam', thailand: 'thailand', malaysia: 'malaysia',
        philippines: 'philippines', indonesia: 'indonesia', pakistan: 'pakistan',
        namibia: 'namibia', kenya: 'kenya', ghana: 'ghana',
        nigeria: 'nigeria', 'south-africa': 'south-africa',
        'trinidad-tobago': 'trinidad-tobago', 'trinidad': 'trinidad-tobago',
        guyana: 'guyana'
    };

    var COUNTRY_TO_LANG = {
        vietnam: 'vn', thailand: 'th', malaysia: 'my',
        philippines: 'ph', indonesia: 'id', pakistan: 'pk',
        latam: 'es-419', namibia: 'en', kenya: 'en',
        ghana: 'en', nigeria: 'en', 'south-africa': 'en',
        'trinidad-tobago': 'en', guyana: 'en'
    };

    function getHostname() {
        return window.location.hostname.toLowerCase();
    }

    function isMainDomain() {
        var h = getHostname();
        return getMainDomains().indexOf(h) !== -1 ||
               h === 'localhost' ||
               /^\d+\.\d+\.\d+\.\d+$/.test(h);
    }

    function getSubdomainFromHost() {
        var parts = getHostname().split('.');
        if (parts.length < 3) return null;
        var raw = parts[0];
        var canon = typeof window.TraderTokNormalizeSubdomainKey === 'function'
            ? window.TraderTokNormalizeSubdomainKey(raw)
            : null;
        if (!canon || !SUBDOMAIN_MAP[canon]) return null;
        return canon;
    }

    function getCountryFromHash() {
        var hash = window.location.hash.replace('#', '').toLowerCase().trim();
        if (!hash) return null;
        return HASH_TO_COUNTRY[hash] || null;
    }

    function mapCountryCodeToSubdomain(iso) {
        if (typeof window.TraderTokCountryCodeToSubdomainKey !== 'function' ||
            !window.TRADERTOK_SUBDOMAIN_MAP) {
            return null;
        }
        var key = window.TraderTokCountryCodeToSubdomainKey(iso);
        if (!key || !window.TRADERTOK_SUBDOMAIN_MAP[key]) return null;
        return key;
    }

    function buildRegionData() {
        if (window.subdomainData && window.subdomainData.country) {
            return {
                country: window.subdomainData.country,
                lang: window.subdomainData.lang || 'en',
                subdomain: window.subdomainData.subdomain || null,
                source: 'php-subdomain'
            };
        }

        var hashCountry = getCountryFromHash();
        if (hashCountry) {
            return {
                country: hashCountry,
                lang: COUNTRY_TO_LANG[hashCountry] || 'en',
                subdomain: null,
                source: 'hash'
            };
        }

        var sub = getSubdomainFromHost();
        if (sub) {
            var data = SUBDOMAIN_MAP[sub];
            return {
                country: data.country,
                lang: data.lang,
                subdomain: sub,
                source: 'client-subdomain'
            };
        }

        return null;
    }

    function shouldAttemptRedirect() {
        if (!isMainDomain()) return false;
        if (getCountryFromHash()) return false;
        if (sessionStorage.getItem(REDIRECT_SESSION_KEY)) return false;
        return true;
    }

    function performRedirect(subdomainKey) {
        if (!subdomainKey) return;
        try { sessionStorage.setItem(REDIRECT_SESSION_KEY, '1'); } catch (e) {}

        var dest = window.location.protocol + '//' +
            subdomainKey + '.tradertok.com' +
            window.location.pathname +
            window.location.search;
        window.location.replace(dest);
    }

    function fetchWithAbort(url, timeoutMs) {
        var controller = new AbortController();
        var tid = setTimeout(function () { controller.abort(); }, timeoutMs);
        return fetch(url, { signal: controller.signal }).finally(function () {
            clearTimeout(tid);
        });
    }

    async function fetchVisitorCountryCodeForRedirect() {
        try {
            var response = await fetchWithAbort('https://ipapi.co/json/', GEO_TIMEOUT_MS);
            if (response.ok) {
                var data = await response.json();
                if (data && data.country_code) {
                    return String(data.country_code).toUpperCase();
                }
            }
        } catch (e) {}

        try {
            var response2 = await fetchWithAbort('https://get.geojs.io/v1/ip/country.json', GEO_TIMEOUT_MS);
            if (response2.ok) {
                var data2 = await response2.json();
                if (data2 && data2.country && String(data2.country).length === 2) {
                    return String(data2.country).toUpperCase();
                }
            }
        } catch (e2) {}

        return null;
    }

    async function attemptGeoRedirect() {
        if (!shouldAttemptRedirect()) return;

        var cached = null;
        try { cached = sessionStorage.getItem(GEO_CACHE_KEY); } catch (e) {}
        if (cached) {
            performRedirect(cached);
            return;
        }

        try {
            var code = await fetchVisitorCountryCodeForRedirect();
            if (!code) return;

            var sub = mapCountryCodeToSubdomain(code);
            if (sub) {
                try { sessionStorage.setItem(GEO_CACHE_KEY, sub); } catch (e) {}
                performRedirect(sub);
            }
        } catch (e) {}
    }

    function initHashChangeListener() {
        window.addEventListener('hashchange', function () {
            var country = getCountryFromHash();
            if (!country) return;

            window.regionData = {
                country: country,
                lang: COUNTRY_TO_LANG[country] || 'en',
                subdomain: null,
                source: 'hash'
            };

            if (window.i18n && window.i18n.setLanguage) {
                if (!window.i18n.isLanguageLocked || !window.i18n.isLanguageLocked()) {
                    window.i18n.setLanguage(COUNTRY_TO_LANG[country] || 'en');
                }
            }
        });
    }

    var regionData = buildRegionData();
    window.regionData = regionData;

    initHashChangeListener();

    if (!regionData && isMainDomain()) {
        attemptGeoRedirect();
    }

})();
