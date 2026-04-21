/**
 * Offers Navigation Dropdown Enhancement
 * Populates the nav dropdown with real country flags and offer summaries.
 * Loaded on all pages.
 */
(function() {
    'use strict';

    // Compact inline SVG flags (simplified but recognizable)
    var FLAGS = {
        vietnam: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#DA251D" width="30" height="20"/><path fill="#FFCD00" d="M15 4l1.76 5.42h5.7l-4.6 3.35 1.76 5.42L15 14.84l-4.62 3.35 1.76-5.42-4.6-3.35h5.7z"/></svg>',
        thailand: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#A51931" width="30" height="20"/><rect fill="#F4F5F8" y="3.33" width="30" height="13.34"/><rect fill="#2D2A4A" y="6.67" width="30" height="6.66"/></svg>',
        malaysia: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#fff" width="30" height="20"/><rect fill="#cc0001" width="30" height="1.43"/><rect fill="#cc0001" y="2.86" width="30" height="1.43"/><rect fill="#cc0001" y="5.71" width="30" height="1.43"/><rect fill="#cc0001" y="8.57" width="30" height="1.43"/><rect fill="#cc0001" y="11.43" width="30" height="1.43"/><rect fill="#cc0001" y="14.29" width="30" height="1.43"/><rect fill="#cc0001" y="17.14" width="30" height="1.43"/><rect fill="#000066" width="15" height="10"/><path d="M9 6.43 a1.8 1.8 0 1,1 0,-2.86 a1.52 1.52 0 1,0 0,2.86" fill="#ffcc00"/><polygon fill="#ffcc00" points="10 5, 10.3 5.5, 11 5.4, 10.7 6, 11.2 6.5, 10.5 6.4, 10.3 7, 9.9 6.5, 9.2 6.7, 9.5 6.1, 9.1 5.6, 9.7 5.7"/></svg>',
        philippines: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#0038A8" width="30" height="10"/><rect fill="#CE1126" y="10" width="30" height="10"/><polygon fill="#FFF" points="0,0 14,10 0,20"/><circle fill="#FCD116" cx="4.5" cy="10" r="2"/><circle fill="#FCD116" cx="1.5" cy="3.5" r=".7"/><circle fill="#FCD116" cx="1.5" cy="16.5" r=".7"/><circle fill="#FCD116" cx="8" cy="10" r=".7"/></svg>',
        indonesia: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#CE1126" width="30" height="10"/><rect fill="#FFF" y="10" width="30" height="10"/></svg>',
        pakistan: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#115740" width="30" height="20"/><rect fill="#FFF" width="7.5" height="20"/><circle fill="#FFF" cx="18.5" cy="10" r="4.5"/><circle fill="#115740" cx="19.8" cy="10" r="3.7"/><path fill="#FFF" d="M21.5 6.2l.6 1.8h1.9l-1.5 1.1.6 1.9-1.6-1.2-1.5 1.2.6-1.9-1.6-1.1h2z"/></svg>',
        latam: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#1A237E" width="30" height="20" rx="2"/><circle cx="15" cy="10" r="7" fill="none" stroke="rgba(255,255,255,.35)" stroke-width=".8"/><ellipse cx="15" cy="10" rx="3.5" ry="7" fill="none" stroke="rgba(255,255,255,.25)" stroke-width=".6"/><line x1="8" y1="10" x2="22" y2="10" stroke="rgba(255,255,255,.2)" stroke-width=".5"/><path d="M13 4.5c-1.5 1-2.5 3-2.5 5.5s1.5 4.5 3 5.5c.5-.5 1-2 1.2-3.5.2-2-.3-4-1-5.8-.2-.6-.4-1.2-.7-1.7z" fill="#4CAF50" opacity=".45"/></svg>',
        namibia: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><polygon fill="#003580" points="0,0 30,0 0,20"/><polygon fill="#009543" points="30,0 30,20 0,20"/><path d="M0,16L26,0" stroke="#FFF" stroke-width="4" fill="none"/><path d="M0,16L26,0" stroke="#C8102E" stroke-width="2.5" fill="none"/><circle fill="#FFB81C" cx="7" cy="6.5" r="3.2"/><circle fill="#003580" cx="8" cy="6.5" r="2.4"/></svg>',
        kenya: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#000" width="30" height="20"/><rect fill="#FFF" y="4.5" width="30" height="1.2"/><rect fill="#BB1600" y="5.7" width="30" height="8.6"/><rect fill="#FFF" y="14.3" width="30" height="1.2"/><rect fill="#006B3F" y="15.5" width="30" height="4.5"/><ellipse cx="15" cy="10" rx="2.8" ry="5.5" fill="#000" stroke="#FFF" stroke-width=".6"/><rect fill="#BB1600" x="14.4" y="4" width="1.2" height="12"/></svg>',
        ghana: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#CE1126" width="30" height="6.67"/><rect fill="#FCD116" y="6.67" width="30" height="6.67"/><rect fill="#006B3F" y="13.33" width="30" height="6.67"/><path fill="#000" d="M15 7.5l1.1 3.4h3.6l-2.9 2.1 1.1 3.4-2.9-2.1-2.9 2.1 1.1-3.4-2.9-2.1h3.6z"/></svg>',
        nigeria: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#008751" width="10" height="20"/><rect fill="#FFF" x="10" width="10" height="20"/><rect fill="#008751" x="20" width="10" height="20"/></svg>',
        'south-africa': '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#DE3831" width="30" height="10"/><rect fill="#002395" y="10" width="30" height="10"/><polygon fill="#FFF" points="0,0 10,0 20,8 20,12 10,20 0,20"/><polygon fill="#007A4D" points="0,2 8.5,2 17.5,8.5 17.5,11.5 8.5,18 0,18"/><polygon fill="#FFB612" points="0,4 7,4 15,9 15,11 7,16 0,16"/><polygon fill="#000" points="0,6 5.5,6 12.5,9.8 12.5,10.2 5.5,14 0,14"/><rect fill="#FFF" x="13" y="9" width="17" height="2"/><rect fill="#007A4D" x="14" y="9.4" width="16" height="1.2"/></svg>',
        'trinidad-tobago': '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#CE1126" width="30" height="20"/><polygon fill="#FFF" points="4,0 12,0 30,14 30,20 26,20 18,20 0,6 0,0"/><polygon fill="#000" points="6,0 10,0 30,15 30,20 24,20 20,20 0,5 0,0"/></svg>',
        guyana: '<svg viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg"><rect fill="#009E49" width="30" height="20"/><polygon fill="#FFF" points="0,0 30,10 0,20"/><polygon fill="#FCD116" points="0,1 26,10 0,19"/><polygon fill="#000" points="0,2 14,10 0,18"/><polygon fill="#CE1126" points="0,3 12,10 0,17"/></svg>'
    };

    var OFFERS_GEO_SESSION_KEY = 'tradertok_offers_geo';

    function getLockedOfferRegion() {
        if (window.subdomainData && window.subdomainData.country) {
            return window.subdomainData.country;
        }
        try {
            var g = sessionStorage.getItem(OFFERS_GEO_SESSION_KEY);
            if (g) return g;
        } catch (e) {}
        return null;
    }

    function isVisitorOffersUnsupported() {
        return (
            typeof window.TraderTokIsOffersUnsupportedVisitor === 'function' &&
            window.TraderTokIsOffersUnsupportedVisitor()
        );
    }

    // Region groups — other rows disabled when offers are locked to visitor region (subdomain or geo)
    var REGION_GROUPS = [
        {
            title: 'Asia Pacific',
            countries: [
                { id: 'vietnam', name: 'Vietnam', offer: 'Up to 100% Deposit Bonus' },
                { id: 'thailand', name: 'Thailand', offer: '75% Bonus + Free Signals' },
                { id: 'malaysia', name: 'Malaysia', offer: '100% Bonus + Zero Swap' },
                { id: 'philippines', name: 'Philippines', offer: '100% Bonus + $10K Competition' },
                { id: 'indonesia', name: 'Indonesia', offer: '50% Bonus + Islamic Account' },
                { id: 'pakistan', name: 'Pakistan', offer: '100% Bonus + Zero Swap' }
            ]
        },
        {
            title: 'Africa',
            countries: [
                { id: 'namibia', name: 'Namibia', offer: '75% Bonus + Local Payment Extra' },
                { id: 'kenya', name: 'Kenya', offer: '100% Bonus + M-Pesa 15% Extra' },
                { id: 'ghana', name: 'Ghana', offer: '50% Bonus + 4% Cashback' },
                { id: 'nigeria', name: 'Nigeria', offer: '100% Bonus + Naira Deposit Extra' },
                { id: 'south-africa', name: 'South Africa', offer: '75% Bonus + ZAR Account' }
            ]
        },
        {
            title: 'Americas',
            countries: [
                { id: 'latam', name: 'Latin America', offer: '100% Bono + $15K Championship' },
                { id: 'trinidad-tobago', name: 'Trinidad & Tobago', offer: '100% Bonus + Loyalty Program' },
                { id: 'guyana', name: 'Guyana', offer: '75% Bonus + Personal Manager' }
            ]
        }
    ];

    function buildDropdownHtml(basePath, lockedCountry, allCountriesDisabled) {
            var html = '<div class="offers-dropdown-grid">';
            REGION_GROUPS.forEach(function(group) {
                html += '<div class="offers-dropdown-col">';
                html += '<h4 class="offers-dropdown-heading">' + group.title + '</h4>';
                group.countries.forEach(function(c) {
                    var isLockedInactive =
                        !!allCountriesDisabled ||
                        (lockedCountry && c.id !== lockedCountry);
                    var rowClass =
                        'offers-dropdown-item' +
                        (isLockedInactive ? ' offers-dropdown-item--disabled' : '');
                    var inner =
                        '<span class="offers-flag">' +
                        FLAGS[c.id] +
                        '</span>' +
                        '<span class="offers-dropdown-info">' +
                        '<span class="offers-dropdown-name">' +
                        c.name +
                        '</span>' +
                        '<span class="offers-dropdown-offer">' +
                        c.offer +
                        '</span>' +
                        '</span>';
                    if (isLockedInactive) {
                        html +=
                            '<span class="' +
                            rowClass +
                            '" aria-disabled="true" role="presentation">' +
                            inner +
                            '</span>';
                    } else {
                        html +=
                            '<a href="' +
                            basePath +
                            '#' +
                            c.id +
                            '" class="' +
                            rowClass +
                            '">' +
                            inner +
                            '</a>';
                    }
                });
                html += '</div>';
            });
            html += '</div>';
            var footerHref = lockedCountry
                ? basePath + '#' + lockedCountry
                : basePath;
            if (allCountriesDisabled) {
                html +=
                    '<div class="offers-dropdown-footer">' +
                    '<span class="offers-dropdown-all offers-dropdown-all--disabled" aria-disabled="true">' +
                    'View All Offers →' +
                    '</span>' +
                    '</div>';
            } else {
                html +=
                    '<div class="offers-dropdown-footer">' +
                    '<a href="' +
                    footerHref +
                    '" class="offers-dropdown-all">View All Offers →</a>' +
                    '</div>';
            }

        return html;
    }

    function renderOffersDropdowns() {
        var dropdowns = document.querySelectorAll('.offers-dropdown');
        if (!dropdowns.length) return;

        var lockedCountry = getLockedOfferRegion();
        var allDisabled = isVisitorOffersUnsupported();

        dropdowns.forEach(function(dropdown) {
            var navItem = dropdown.closest('.nav-item');
            var parentLink = navItem ? navItem.querySelector('a.nav-link') : null;
            var basePath = parentLink ? parentLink.getAttribute('href') : './offers-promotions';
            dropdown.innerHTML = buildDropdownHtml(basePath, lockedCountry, allDisabled);
        });
    }

    function isOffersPromotionsPage() {
        var p = window.location.pathname || '';
        return /offers-promotions/i.test(p);
    }

    async function tryDetectOfferRegionForNav() {
        if (window.subdomainData && window.subdomainData.country) return;
        if (getLockedOfferRegion()) return;
        if (isOffersPromotionsPage()) return;
        if (
            typeof window.TraderTokFetchVisitorIsoCountryCode !== 'function' ||
            typeof window.TraderTokIsoToOfferPromoRegionSlug !== 'function'
        ) {
            return;
        }
        try {
            var iso = await window.TraderTokFetchVisitorIsoCountryCode();
            if (!iso) return;
            var region = window.TraderTokIsoToOfferPromoRegionSlug(iso);
            if (!region) {
                if (window.TraderTokSetOffersUnsupportedVisitorFlag) {
                    window.TraderTokSetOffersUnsupportedVisitorFlag();
                }
                try {
                    sessionStorage.removeItem(OFFERS_GEO_SESSION_KEY);
                } catch (eRm) {}
                renderOffersDropdowns();
                return;
            }
            if (window.TraderTokClearOffersUnsupportedVisitorFlag) {
                window.TraderTokClearOffersUnsupportedVisitorFlag();
            }
            try {
                sessionStorage.setItem(OFFERS_GEO_SESSION_KEY, region);
            } catch (e2) {}
            renderOffersDropdowns();
        } catch (e) {}
    }

    function init() {
        if (window.subdomainData && window.subdomainData.country && window.TraderTokClearOffersUnsupportedVisitorFlag) {
            window.TraderTokClearOffersUnsupportedVisitorFlag();
        }
        renderOffersDropdowns();
        void tryDetectOfferRegionForNav();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    window.addEventListener('tradertok:offers-unsupported-visitor', function () {
        renderOffersDropdowns();
    });
})();
