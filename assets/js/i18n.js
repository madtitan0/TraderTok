/**
 * TraderTok Internationalization Module
 * Supports: English (en), Hindi (hi), Latin American Spanish (es-419), Japanese (ja), and regional locales
 */

(function() {
    'use strict';

    // Configuration
    const CONFIG = {
        defaultLang: 'en',
        supportedLangs: ['en', 'hi', 'es-419', 'it', 'vn', 'th', 'my', 'ph', 'id', 'pk', 'ja'],
        localStorageKey: 'preferredLanguage',
        /** sessionStorage: last locale applied from IP geolocation (region-redirect.js) */
        geoLocaleStorageKey: 'tradertok_geo_locale',
        localesPath: 'locales/' // Path to locales folder
    };

    // Cache for loaded translations
    const translationsCache = {};

    // Current language
    let currentLang = CONFIG.defaultLang;

    let resolveInitialI18nReady;
    const initialI18nReady = new Promise(function (resolve) {
        resolveInitialI18nReady = resolve;
    });

    /**
     * Get nested value from object using dot notation
     * @param {Object} obj - The object to search
     * @param {string} path - Dot notation path (e.g., "nav.home")
     * @returns {string|undefined} - The value or undefined
     */
    function getNestedValue(obj, path) {
        return path.split('.').reduce((current, key) => {
            return current && current[key] !== undefined ? current[key] : undefined;
        }, obj);
    }

    /**
     * Walk loaded locale JSON by path segments (supports arrays, e.g. ['offersPage','promotions','vietnam',0,'badge']).
     * Falls back to English cache when the current language has no value.
     * @param {Array<string|number>} pathParts
     * @returns {unknown}
     */
    function getMessage(pathParts) {
        if (!pathParts || !pathParts.length) return undefined;
        function walk(root) {
            let cur = root;
            for (let i = 0; i < pathParts.length; i++) {
                if (cur == null) return undefined;
                cur = cur[pathParts[i]];
            }
            return cur;
        }
        const tr = translationsCache[currentLang];
        let v = tr ? walk(tr) : undefined;
        if (v === undefined && currentLang !== CONFIG.defaultLang) {
            const fb = translationsCache[CONFIG.defaultLang];
            v = fb ? walk(fb) : undefined;
        }
        return v;
    }

    /**
     * Get translation by key
     * @param {string} key - Translation key in dot notation
     * @param {Object} params - Optional parameters for interpolation
     * @returns {string} - Translated string or key if not found
     */
    function t(key, params = {}) {
        const translations = translationsCache[currentLang] || translationsCache[CONFIG.defaultLang];
        if (!translations) return key;

        let value = getNestedValue(translations, key);

        // Fallback to English if translation not found
        if (value === undefined && currentLang !== CONFIG.defaultLang) {
            const fallback = translationsCache[CONFIG.defaultLang];
            if (fallback) {
                value = getNestedValue(fallback, key);
            }
        }

        if (value === undefined || value === null) return key;

        if (typeof value !== 'string') {
            value = String(value);
        }

        // Simple interpolation: replace {{param}} with value
        if (params && typeof value === 'string') {
            Object.keys(params).forEach(param => {
                value = value.replace(new RegExp(`{{${param}}}`, 'g'), params[param]);
            });
        }

        return value;
    }

    /**
     * Load translations from JSON file
     * @param {string} lang - Language code
     * @returns {Promise<Object>} - Translations object
     */
    async function loadTranslations(lang) {
        // Return cached if available
        if (translationsCache[lang]) {
            return translationsCache[lang];
        }

        const pathsToTry = [
            CONFIG.localesPath,       // 'locales/' - Works for root and flat structures
            '../' + CONFIG.localesPath // '../locales/' - Works for subfolders
        ];

        for (const path of pathsToTry) {
            try {
                const response = await fetch(path + lang + '.json');
                if (response.ok) {
                    const translations = await response.json();
                    translationsCache[lang] = translations;
                    return translations;
                }
            } catch (e) {
                // Continue to next path
            }
        }

        console.warn(`Could not load translations for ${lang} from any path.`);
        
        // Fallback to English if we haven't tried it yet and we are not already trying to load English
        if (lang !== CONFIG.defaultLang && !translationsCache[CONFIG.defaultLang]) {
             return loadTranslations(CONFIG.defaultLang);
        }

        return translationsCache[CONFIG.defaultLang] || {};
    }

    /**
     * Apply translations to all elements with data-i18n attributes
     */
    function applyTranslationsToDOM() {
        // HTML first: setting innerHTML replaces descendants; applying [data-i18n] before this
        // would lose nested i18n nodes inside [data-i18n-html] containers.
        document.querySelectorAll('[data-i18n-html]').forEach(element => {
            const key = (element.getAttribute('data-i18n-html') || '').trim();
            if (!key) return;
            const translation = t(key);
            if (translation !== key) {
                element.innerHTML = translation;
            }
        });

        // Text content: data-i18n
        document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = (element.getAttribute('data-i18n') || '').trim();
            if (!key) return;
            const translation = t(key);
            if (translation !== key) {
                element.textContent = translation;
            }
        });

        // Placeholders: data-i18n-placeholder
        document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
            const key = (element.getAttribute('data-i18n-placeholder') || '').trim();
            if (!key) return;
            const translation = t(key);
            if (translation !== key) {
                element.placeholder = translation;
            }
        });

        // Aria labels: data-i18n-aria
        document.querySelectorAll('[data-i18n-aria]').forEach(element => {
            const key = (element.getAttribute('data-i18n-aria') || '').trim();
            if (!key) return;
            const translation = t(key);
            if (translation !== key) {
                element.setAttribute('aria-label', translation);
            }
        });

        // Image alt text: data-i18n-alt
        document.querySelectorAll('[data-i18n-alt]').forEach(element => {
            const key = (element.getAttribute('data-i18n-alt') || '').trim();
            if (!key) return;
            const translation = t(key);
            if (translation !== key) {
                element.setAttribute('alt', translation);
            }
        });

        // Title attributes: data-i18n-title
        document.querySelectorAll('[data-i18n-title]').forEach(element => {
            const key = (element.getAttribute('data-i18n-title') || '').trim();
            if (!key) return;
            const translation = t(key);
            if (translation !== key) {
                element.title = translation;
            }
        });

        // Table cell labels (e.g. mobile stacked comparison tables): data-i18n-data-label → sets data-label
        document.querySelectorAll('[data-i18n-data-label]').forEach(element => {
            const key = (element.getAttribute('data-i18n-data-label') || '').trim();
            if (!key) return;
            const translation = t(key);
            if (translation !== key) {
                element.setAttribute('data-label', translation);
            }
        });

        // Update HTML lang attribute
        document.documentElement.lang = currentLang === 'es-419' ? 'es' : currentLang;

        try {
            window.dispatchEvent(new CustomEvent('tradertok:i18n-applied'));
        } catch (e) {}
    }

    /**
     * Change language and apply translations
     * @param {string} lang - Language code
     * @returns {Promise<void>}
     */
    function isLanguageLocked() {
        return !!(window.subdomainData && window.subdomainData.country && window.subdomainData.lang);
    }

    async function setLanguage(lang, opts) {
        if (isLanguageLocked()) {
            return;
        }
        if (!CONFIG.supportedLangs.includes(lang)) {
            console.warn(`Language ${lang} is not supported. Using ${CONFIG.defaultLang}`);
            lang = CONFIG.defaultLang;
        }

        currentLang = lang;
        localStorage.setItem(CONFIG.localStorageKey, lang);
        if (opts && opts.fromUser) {
            try {
                sessionStorage.removeItem(CONFIG.geoLocaleStorageKey);
            } catch (e) {}
            // Reload locale JSON so updated translation files apply without full page refresh
            delete translationsCache[lang];
            if (lang !== CONFIG.defaultLang) {
                delete translationsCache[CONFIG.defaultLang];
            }
        }

        // Load translations if not cached
        await loadTranslations(lang);

        // Also ensure English is loaded for fallback
        if (lang !== CONFIG.defaultLang) {
            await loadTranslations(CONFIG.defaultLang);
        }

        // Apply to DOM
        applyTranslationsToDOM();

        // Dispatch custom event for any listeners
        window.dispatchEvent(new CustomEvent('languageChanged', { detail: { lang } }));
    }

    /**
     * Get current language
     * @returns {string} - Current language code
     */
    function getLanguage() {
        return currentLang;
    }

    /**
     * Initialize i18n module
     * @returns {Promise<void>}
     */
    async function init() {
        try {
        const savedLang = localStorage.getItem(CONFIG.localStorageKey);
        let geoLocale = null;
        try {
            geoLocale = sessionStorage.getItem(CONFIG.geoLocaleStorageKey);
        } catch (e) {}

        // 1) PHP regional subdomain: fixed locale (highest priority)
        if (window.subdomainData && window.subdomainData.lang) {
            currentLang = window.subdomainData.lang;
        } else if (savedLang && CONFIG.supportedLangs.includes(savedLang)) {
            // 2) Stored preference (manual choice or prior session) before region/geo heuristics
            currentLang = savedLang;
        } else if (window.regionData && window.regionData.lang) {
            // 3) Hash / client subdomain (set before or after this script)
            currentLang = window.regionData.lang;
        } else if (geoLocale && CONFIG.supportedLangs.includes(geoLocale)) {
            // 4) Last IP-based locale (persists across pages until user changes language)
            currentLang = geoLocale;
        // Auto-detect from subdomain if no explicit choice yet
        } else if (window.subdomainData && window.subdomainData.lang) {
            currentLang = window.subdomainData.lang;
        // Auto-detect from client-side fallback
        } else if (window.regionData && window.regionData.lang &&
                   (window.regionData.source === 'php-subdomain' ||
                    window.regionData.source === 'client-subdomain' ||
                    window.regionData.source === 'hash')) {
            currentLang = window.regionData.lang;
        } else {
            const browserLang = navigator.language || navigator.userLanguage;
            if (browserLang.startsWith('hi')) {
                currentLang = 'hi';
            } else if (browserLang.startsWith('es')) {
                currentLang = 'es-419';
            } else if (browserLang.startsWith('ja')) {
                currentLang = 'ja';
            } else {
                currentLang = CONFIG.defaultLang;
            }
        }

        // Validate that locale file exists for the language
        if (!CONFIG.supportedLangs.includes(currentLang)) {
            currentLang = CONFIG.defaultLang;
        }

        // Validate that locale file exists for the language
        if (!CONFIG.supportedLangs.includes(currentLang)) {
            currentLang = CONFIG.defaultLang;
        }

        // Preload English (always needed as fallback)
        await loadTranslations(CONFIG.defaultLang);

        // Load current language if different
        if (currentLang !== CONFIG.defaultLang) {
            await loadTranslations(currentLang);
        }

        // Apply translations
        applyTranslationsToDOM();
        } finally {
            if (typeof resolveInitialI18nReady === 'function') {
                resolveInitialI18nReady();
                resolveInitialI18nReady = null;
            }
        }
    }

    // Expose to global scope
    window.i18n = {
        t,
        getMessage,
        setLanguage,
        getLanguage,
        init,
        loadTranslations,
        applyTranslations: applyTranslationsToDOM,
        supportedLangs: CONFIG.supportedLangs,
        isLanguageLocked,
        /** Resolves after first successful init() (locale JSON cached for current + fallback lang). */
        whenReady: function () {
            return initialI18nReady;
        }
    };

    // Auto-initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
