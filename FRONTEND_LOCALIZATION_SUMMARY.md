# TraderTok Frontend Localization & Region Detection Summary

This document serves as a comprehensive overview of the newly implemented frontend localization, region detection, and UI routing features created for the TraderTok mobile/web application.

## 1. What We Built

We designed a completely **frontend-driven** architecture to handle regional language switching, automatic subdomain redirection, and targeted promotions locking, all without requiring complex backend routing or database changes.

### Key Features:
*   **Intelligent Geo-Detection & Redirects:** Automatically identifies a first-time user's country using their IP address (via caching) and redirects them from the main global site (`www.`) to their appropriate regional subdomain (e.g., `vn.tradertok.com`).
*   **Dynamic Language Assignment:** If a user lands on a specific subdomain, the website instantly recognizes the country, pulls the correctly associated language from the mapping, and translates the site without requiring the user to touch the language selector.
*   **Regional Promotions Filtering:** The "Offers" dropdown and the promotions page now default to displaying the deals specifically mapped to the detected user's region.
*   **Hidden Language Capabilities:** The primary website keeps a minimal language dropdown (only English and Spanish). However, behind the scenes, fully supported regional languages (Thai, Vietnamese, Malay, Indonesian, Tagalog, Urdu) are loaded into the DOM. This allows subdomains to magically apply the correct UI flag and native labels without cluttering the main website's navigation.

---

## 2. How We Did It (Technical Implementation)

The system revolves around a lightweight sequence of frontend scripts that communicate using the global `window.regionData` object.

### The Core Modules:
1.  **`assets/js/region-redirect.js` (NEW)**
    *   Injected early into `head.php`.
    *   Determines the active region via a strict priority chain: 
        1. URL Hash Override (`#vietnam`) → Used for manual selections.
        2. PHP Data (`window.subdomainData`) → Sent from `subdomain-config.php`.
        3. IP Geolocation (`ipapi.co`) → Fallback for new visitors navigating to the bare root.
    *   Stores `window.regionData` globally so other files don't have to duplicate the logic.

2.  **`assets/js/i18n.js` (UPDATED)**
    *   Reads `window.regionData.lang` on initialization to figure out what language to fetch from the `/locales/` directory.
    *   If no forced region is detected, it falls back to `localStorage` or `en`.

3.  **`assets/js/offers-promotions.js` (UPDATED)**
    *   Reads `window.regionData.country`.
    *   Uses this localized string to filter the list of rendered promotional offers. We intentionally **removed UI locking** to ensure the user still feels in control if they want to physically browse other regional offers.

4.  **`includes/head.php` (UPDATED)**
    *   Added the missing regional languages (Thai `th`, Vietnamese `vn`, Malay `my`, Indonesian `id`, Tagalog `ph`, Urdu `pk`) into the HTML `<div class="language-dropdown">` and mobile menus.
    *   Applied `style="display: none;"` to these new elements. **Why?** It hides them from the casual user on the main domain (who only sees EN and ES). However, `script.js` relies on `document.querySelector` to grab the localized flag emoji (e.g., 🇹🇭). By keeping them hidden instead of deleting them, the JavaScript is able to visually assign the Thai flag when navigating to the Thai subdomain.

5.  **`/locales/*.json` (UPDATED)**
    *   Injected the missing dictionary keys for all supported languages (`language.thai`, `language.vietnamese`, etc.) into every `.json` file. This ensures that the dynamic dropdown labels won't break or render blank when switching between dialects.

---

## 3. What Changes It Will Affect

### User Journey Impacts
*   **First-Time Visitors:** Users hitting the main URL will experience an instant background API check via `ipapi.co`. If they hit a matched region, they will be instantly bounced to their respective subdomain (recorded in `sessionStorage` to prevent infinite redirect loops).
*   **Language Menu Navigation:** Unless a user is tech-savvy enough to manually rewrite the URL hash or subdomain, they will only be able to manually select **English** or **Spanish** from the navigation bar on the root domain.
*   **Promotions Display:** The `Offers` page will now naturally silo regional marketing. A user in Nigeria will see completely different offers (and CTA links) than a user in Thailand.
*   **Subdomain Autonomy:** Visitors going directly to `th.tradertok.com` will enjoy a localized Thai UI with the Thai flag locked in the header, while still having the freedom to browse freely.

### Developer Impacts
*   **Adding New Regions:** To add a new country (e.g., Brazil), you only need to update the mappings in `subdomain-config.php`, provide a localized `.json` file, and add the country code mappings to the dictionaries at the top of `region-redirect.js` and `offers-promotions.js`. No database migrations or server redirects are required.
