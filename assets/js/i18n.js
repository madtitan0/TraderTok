/**
 * TraderTok Internationalization Module
 * Supports: English (en), Hindi (hi), Latin American Spanish (es-419)
 */

(function() {
    'use strict';

    // Configuration
    const CONFIG = {
        defaultLang: 'en',
        supportedLangs: ['en', 'hi', 'es-419', 'it', 'vn', 'th', 'my', 'ph', 'id', 'pk'],
        supportedLangs: ['en', 'hi', 'es-419', 'it', 'vn', 'th', 'my', 'ph', 'id', 'pk'],
        localStorageKey: 'preferredLanguage',
        /** sessionStorage: last locale applied from IP geolocation (region-redirect.js) */
        geoLocaleStorageKey: 'tradertok_geo_locale',
        localesPath: 'locales/' // Path to locales folder
    };

    // Cache for loaded translations
    const translationsCache = {};

    // Current language
    let currentLang = CONFIG.defaultLang;

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

        if (value === undefined) return key;

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
                console.log(`Failed to load translations from ${path}, trying next path...`);
            }
        }

        console.warn(`Could not load translations for ${lang} from any path.`);
        
        // Fallback to English if we haven't tried it yet and we are not already trying to load English
        if (lang !== CONFIG.defaultLang && !translationsCache[CONFIG.defaultLang]) {
             console.log('Falling back to default language');
             return loadTranslations(CONFIG.defaultLang);
        }

        return translationsCache[CONFIG.defaultLang] || {};
    }

    /**
     * Apply translations to all elements with data-i18n attributes
     */
    function applyTranslationsToDOM() {
        // Text content: data-i18n
        document.querySelectorAll('[data-i18n]').forEach(element => {
            const key = element.getAttribute('data-i18n');
            const translation = t(key);
            if (translation !== key) {
                element.textContent = translation;
            }
        });

        // HTML content: data-i18n-html
        document.querySelectorAll('[data-i18n-html]').forEach(element => {
            const key = element.getAttribute('data-i18n-html');
            const translation = t(key);
            if (translation !== key) {
                element.innerHTML = translation;
            }
        });

        // Placeholders: data-i18n-placeholder
        document.querySelectorAll('[data-i18n-placeholder]').forEach(element => {
            const key = element.getAttribute('data-i18n-placeholder');
            const translation = t(key);
            if (translation !== key) {
                element.placeholder = translation;
            }
        });

        // Aria labels: data-i18n-aria
        document.querySelectorAll('[data-i18n-aria]').forEach(element => {
            const key = element.getAttribute('data-i18n-aria');
            const translation = t(key);
            if (translation !== key) {
                element.setAttribute('aria-label', translation);
            }
        });

        // Title attributes: data-i18n-title
        document.querySelectorAll('[data-i18n-title]').forEach(element => {
            const key = element.getAttribute('data-i18n-title');
            const translation = t(key);
            if (translation !== key) {
                element.title = translation;
            }
        });

        // Update HTML lang attribute
        document.documentElement.lang = currentLang === 'es-419' ? 'es' : currentLang;
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
        const savedLang = localStorage.getItem(CONFIG.localStorageKey);
        let geoLocale = null;
        try {
            geoLocale = sessionStorage.getItem(CONFIG.geoLocaleStorageKey);
        } catch (e) {}

        // 1) PHP regional subdomain: fixed locale (highest priority)
        if (window.subdomainData && window.subdomainData.lang) {
            currentLang = window.subdomainData.lang;
        } else if (window.regionData && window.regionData.lang) {
            // 2) Hash / client subdomain / async geo-ip (set before or after this script)
            currentLang = window.regionData.lang;
        } else if (geoLocale && CONFIG.supportedLangs.includes(geoLocale)) {
            // 3) Last IP-based locale (persists across pages until user changes language)
            currentLang = geoLocale;
        } else if (savedLang && CONFIG.supportedLangs.includes(savedLang)) {
            currentLang = savedLang;
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
    }

    // Expose to global scope
    window.i18n = {
        t,
        setLanguage,
        getLanguage,
        init,
        loadTranslations,
        applyTranslations: applyTranslationsToDOM,
        supportedLangs: CONFIG.supportedLangs,
        isLanguageLocked
    };

    // Auto-initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
