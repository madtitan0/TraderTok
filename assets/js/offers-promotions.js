/**
 * Offers & Promotions Page
 * Manages country-specific promotions with region selection and geo-detection.
 */
(function () {
    'use strict';

    var OFFERS_GEO_SESSION_KEY = 'tradertok_offers_geo';
    var offerRegionResolutionPending = false;

    // -------------------------------------------------------------------------
    // Region Data
    // -------------------------------------------------------------------------

    const REGIONS = [
        { id: 'vietnam', name: 'Vietnam', code: 'VN' },
        { id: 'thailand', name: 'Thailand', code: 'TH' },
        { id: 'malaysia', name: 'Malaysia', code: 'MY' },
        { id: 'philippines', name: 'Philippines', code: 'PH' },
        { id: 'indonesia', name: 'Indonesia', code: 'ID' },
        { id: 'pakistan', name: 'Pakistan', code: 'PK' },
        { id: 'latam', name: 'Latin America', code: 'LATAM' },
        { id: 'namibia', name: 'Namibia', code: 'NA' },
        { id: 'kenya', name: 'Kenya', code: 'KE' },
        { id: 'ghana', name: 'Ghana', code: 'GH' },
        { id: 'nigeria', name: 'Nigeria', code: 'NG' },
        { id: 'south-africa', name: 'South Africa', code: 'ZA' },
        { id: 'trinidad-tobago', name: 'Trinidad & Tobago', code: 'TT' },
        { id: 'guyana', name: 'Guyana', code: 'GY' }
    ];

    /** Region id → locales/*.json code (aligned with tradertok-subdomain-config TRADERTOK_SUBDOMAIN_TO_LANG) */
    var REGION_ID_TO_LOCALE = {
        vietnam: 'vn',
        thailand: 'th',
        malaysia: 'my',
        philippines: 'ph',
        indonesia: 'id',
        pakistan: 'pk',
        latam: 'es-419',
        namibia: 'en',
        kenya: 'en',
        ghana: 'en',
        nigeria: 'en',
        'south-africa': 'en',
        'trinidad-tobago': 'en',
        guyana: 'en'
    };

    var GEO_LOCALE_SESSION_KEY = 'tradertok_geo_locale';

    function syncUiLanguageToOfferRegion(regionId) {
        if (!regionId) return;
        if (window.subdomainData && window.subdomainData.lang) return;
        if (window.i18n && window.i18n.isLanguageLocked && window.i18n.isLanguageLocked()) return;
        var lang = REGION_ID_TO_LOCALE[regionId];
        if (!lang || !window.i18n || typeof window.i18n.setLanguage !== 'function') return;
        try {
            var pref = localStorage.getItem('preferredLanguage');
            var supported = window.i18n.supportedLangs;
            if (pref && supported && supported.indexOf(pref) !== -1) return;
        } catch (e) {}
        try {
            sessionStorage.setItem(GEO_LOCALE_SESSION_KEY, lang);
        } catch (e) {}
        window.i18n.setLanguage(lang);
    }

    // -------------------------------------------------------------------------
    // Flag SVGs
    // -------------------------------------------------------------------------

    const FLAGS = {
        vietnam: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="480" fill="#da251d"/><polygon points="320,120 348,206 438,206 366,258 388,344 320,296 252,344 274,258 202,206 292,206" fill="#ff0"/></svg>',

        thailand: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="480" fill="#fff"/><rect width="640" height="80" y="0" fill="#a51931"/><rect width="640" height="80" y="400" fill="#a51931"/><rect width="640" height="160" y="160" fill="#2d2a4a"/></svg>',

        malaysia: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="480" fill="#fff"/><rect width="640" height="34.3" fill="#cc0001"/><rect width="640" height="34.3" y="68.6" fill="#cc0001"/><rect width="640" height="34.3" y="137.1" fill="#cc0001"/><rect width="640" height="34.3" y="205.7" fill="#cc0001"/><rect width="640" height="34.3" y="274.3" fill="#cc0001"/><rect width="640" height="34.3" y="342.9" fill="#cc0001"/><rect width="640" height="34.3" y="411.4" fill="#cc0001"/><rect width="320" height="240" fill="#000066"/><path d="M192,154.3 a45,45 0 1,1 0,-68.6 a38,38 0 1,0 0,68.6" fill="#ffcc00"/><polygon points="215,120 223,132 237,130 231,142 241,152 228,151 223,164 214,154 200,159 207,146 199,134 212,137 215,123" fill="#ffcc00" transform="translate(10, -5)"/></svg>',

        philippines: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="240" fill="#0038a8"/><rect width="640" height="240" y="240" fill="#ce1126"/><polygon points="0,0 360,240 0,480" fill="#fff"/><circle cx="120" cy="240" r="48" fill="none" stroke="#fcd116" stroke-width="4"/><g fill="#fcd116"><polygon points="120,192 125,208 142,208 128,218 134,234 120,224 106,234 112,218 98,208 115,208"/><polygon points="62,330 67,346 84,346 70,356 76,372 62,362 48,372 54,356 40,346 57,346"/><polygon points="178,330 183,346 200,346 186,356 192,372 178,362 164,372 170,356 156,346 173,346"/><g transform="translate(120,240)"><line x1="0" y1="-48" x2="0" y2="-68" stroke="#fcd116" stroke-width="3"/><line x1="0" y1="-48" x2="0" y2="-68" stroke="#fcd116" stroke-width="3" transform="rotate(45)"/><line x1="0" y1="-48" x2="0" y2="-68" stroke="#fcd116" stroke-width="3" transform="rotate(90)"/><line x1="0" y1="-48" x2="0" y2="-68" stroke="#fcd116" stroke-width="3" transform="rotate(135)"/><line x1="0" y1="-48" x2="0" y2="-68" stroke="#fcd116" stroke-width="3" transform="rotate(180)"/><line x1="0" y1="-48" x2="0" y2="-68" stroke="#fcd116" stroke-width="3" transform="rotate(225)"/><line x1="0" y1="-48" x2="0" y2="-68" stroke="#fcd116" stroke-width="3" transform="rotate(270)"/><line x1="0" y1="-48" x2="0" y2="-68" stroke="#fcd116" stroke-width="3" transform="rotate(315)"/></g></g></svg>',

        indonesia: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="240" fill="#ce1126"/><rect width="640" height="240" y="240" fill="#fff"/></svg>',

        pakistan: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="160" height="480" fill="#fff"/><rect x="160" width="480" height="480" fill="#01411c"/><circle cx="400" cy="240" r="100" fill="#fff"/><circle cx="420" cy="240" r="80" fill="#01411c"/><polygon points="444,180 452,204 478,204 458,220 466,244 444,228 422,244 430,220 410,204 436,204" fill="#fff"/></svg>',

        latam: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><circle cx="320" cy="240" r="220" fill="#1a2744"/><circle cx="320" cy="240" r="210" fill="#1e3050"/><path d="M280,80 C260,100 250,130 255,160 C258,180 250,200 245,220 C240,240 242,260 250,280 C258,300 260,320 255,340 C252,355 255,370 265,385 C275,400 290,410 310,415 C330,418 345,412 355,400 C365,388 380,380 395,382 C410,384 418,375 420,360 C422,345 418,330 408,318 C398,306 392,290 390,272 C388,254 380,238 368,226 C356,214 348,198 346,180 C344,162 336,148 322,138 C308,128 298,114 294,98 C292,88 286,82 280,80 Z" fill="#2ec4b6" opacity="0.85"/><circle cx="320" cy="240" r="215" fill="none" stroke="#2ec4b6" stroke-width="2" opacity="0.3"/></svg>',

        namibia: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><polygon points="0,0 640,0 0,480" fill="#003580"/><polygon points="640,480 640,0 0,480" fill="#009543"/><line x1="0" y1="480" x2="640" y2="0" stroke="#fff" stroke-width="60"/><line x1="0" y1="480" x2="640" y2="0" stroke="#d21034" stroke-width="40"/><circle cx="170" cy="140" r="60" fill="#ffce00"/><circle cx="190" cy="140" r="50" fill="#003580"/></svg>',

        kenya: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="120" fill="#000"/><rect width="640" height="20" y="120" fill="#fff"/><rect width="640" height="200" y="140" fill="#bb0000"/><rect width="640" height="20" y="340" fill="#fff"/><rect width="640" height="120" y="360" fill="#006600"/><g transform="translate(320,240)"><ellipse cx="0" cy="0" rx="50" ry="90" fill="#000" stroke="#fff" stroke-width="4"/><line x1="0" y1="-110" x2="0" y2="110" stroke="#fff" stroke-width="5"/><line x1="-30" y1="-95" x2="-60" y2="-120" stroke="#000" stroke-width="5"/><line x1="30" y1="-95" x2="60" y2="-120" stroke="#000" stroke-width="5"/><line x1="-30" y1="95" x2="-60" y2="120" stroke="#000" stroke-width="5"/><line x1="30" y1="95" x2="60" y2="120" stroke="#000" stroke-width="5"/><rect x="-4" y="-90" width="8" height="180" fill="#bb0000" rx="2"/></g></svg>',

        ghana: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="160" fill="#ce1126"/><rect width="640" height="160" y="160" fill="#fcd116"/><rect width="640" height="160" y="320" fill="#006b3f"/><polygon points="320,190 334,230 376,230 342,256 354,296 320,270 286,296 298,256 264,230 306,230" fill="#000"/></svg>',

        nigeria: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="214" height="480" fill="#008751"/><rect x="214" width="212" height="480" fill="#fff"/><rect x="426" width="214" height="480" fill="#008751"/></svg>',

        'south-africa': '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="240" fill="#de3831"/><rect width="640" height="240" y="240" fill="#002395"/><polygon points="0,0 240,240 0,480" fill="#000"/><polygon points="0,48 200,240 0,432" fill="#ffb612" stroke="#ffb612" stroke-width="2"/><path d="M0,168 L320,240 L0,312 Z" fill="#007a4d"/><path d="M240,240 L640,96 L640,168 L340,240 L640,312 L640,384 L240,240 Z" fill="#007a4d"/><line x1="0" y1="168" x2="640" y2="168" stroke="#fff" stroke-width="4" opacity="0"/><path d="M640,96 L640,168 L340,240 L640,312 L640,384" fill="none" stroke="#fff" stroke-width="4"/><path d="M0,48 L200,240 L0,432" fill="none" stroke="#fff" stroke-width="4"/></svg>',

        'trinidad-tobago': '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="480" fill="#ce1126"/><line x1="640" y1="0" x2="0" y2="480" stroke="#fff" stroke-width="72"/><line x1="640" y1="0" x2="0" y2="480" stroke="#000" stroke-width="56"/></svg>',

        guyana: '<svg viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg"><rect width="640" height="480" fill="#009e49"/><polygon points="0,0 640,240 0,480" fill="#fff"/><polygon points="0,0 640,240 0,480" fill="#fcd116" transform="scale(0.94)" transform-origin="0 240"/><polygon points="0,30 300,240 0,450" fill="#000" opacity="0.15"/><polygon points="0,30 300,240 0,450" fill="#ce1126"/><polygon points="0,60 200,240 0,420" fill="#000" opacity="0.15"/><polygon points="0,60 200,240 0,420" fill="#fff"/></svg>'
    };

    // -------------------------------------------------------------------------
    // Promotions Data
    // -------------------------------------------------------------------------

    const PROMOTIONS = {
        vietnam: [
            {
                badge: 'Welcome Bonus',
                title: '100% Deposit Bonus for New Traders',
                description: 'Double your starting capital with our exclusive welcome offer for Vietnamese traders. Open a live account and receive a 100% bonus on your first deposit.',
                details: ['Min. deposit $100', 'Max. bonus $5,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Cashback Program',
                title: '5% Weekly Cashback on Trading Volume',
                description: 'Earn back a percentage of your weekly trading volume automatically. The more you trade, the more you earn back into your account.',
                details: ['5% weekly cashback', 'No cap on earnings', 'Credited every Monday', 'All instruments eligible'],
                cta: 'Join Program',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Refer a Friend',
                title: 'Earn $50 for Every Successful Referral',
                description: 'Invite your friends to trade with TraderTok and receive $50 for each friend who opens and funds a live account. Your friend also gets a bonus.',
                details: ['$50 per referral', 'No referral limit', 'Friend gets $25 bonus', 'Withdrawable profits'],
                cta: 'Start Referring',
                ctaLink: './?page=claim-offer'
            }
        ],

        thailand: [
            {
                badge: 'Welcome Bonus',
                title: '75% Deposit Bonus for Thai Traders',
                description: 'Start trading with extra margin. Thai traders receive a generous 75% bonus on their first deposit to amplify their trading potential.',
                details: ['Min. deposit $50', 'Max. bonus $3,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Reduced Spreads',
                title: 'Spreads from 0.1 Pips on Major Pairs',
                description: 'Enjoy ultra-tight spreads on all major currency pairs. Trade EUR/USD, GBP/USD, and USD/JPY with some of the lowest spreads in the industry.',
                details: ['From 0.1 pips on majors', 'No commission on standard', 'Available on all platforms', 'Gold & oil included'],
                cta: 'Open Account',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Free Signals',
                title: 'Daily Free Trading Signals Package',
                description: 'Receive professional daily trading signals directly to your device. Our expert analysts deliver actionable trade ideas across forex, commodities, and indices.',
                details: ['5+ signals daily', 'Entry, TP & SL levels', 'Telegram & email delivery', '70%+ historical accuracy'],
                cta: 'Get Signals',
                ctaLink: './?page=claim-offer'
            }
        ],

        malaysia: [
            {
                badge: 'Welcome Bonus',
                title: '100% Deposit Bonus for New Malaysian Traders',
                description: 'Double your trading capital with our exclusive welcome offer for Malaysian traders. Fund your account and start trading with 100% additional margin.',
                details: ['Min. deposit $100', 'Max. bonus $5,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Islamic Account',
                title: 'Zero Swap Islamic Trading Account',
                description: 'Trade in accordance with your principles. Our Sharia-compliant accounts feature zero overnight swap fees on all positions held past market close.',
                details: ['Zero swap fees', 'No hidden costs', 'Full instrument access', 'Instant activation'],
                cta: 'Open Islamic Account',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'ECN Trading',
                title: 'Spreads from 0.0 Pips on ECN Account',
                description: 'Experience professional-grade trading with direct market access. Enjoy ultra-low raw spreads from 0.0 pips on major pairs with fast execution.',
                details: ['From 0.0 pips', 'Deep liquidity', 'Fast execution', 'Institutional pricing'],
                cta: 'Try ECN Account',
                ctaLink: './?page=claim-offer'
            }
        ],

        philippines: [
            {
                badge: 'Welcome Bonus',
                title: '100% Deposit Bonus for Filipino Traders',
                description: 'Kickstart your trading journey with double the capital. Filipino traders receive a 100% match on their first deposit to maximize trading opportunities.',
                details: ['Min. deposit $100', 'Max. bonus $5,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Trading Competition',
                title: '$10,000 Monthly Trading Competition',
                description: 'Compete against fellow traders for a share of the $10,000 monthly prize pool. Top performers on demo or live accounts win cash prizes.',
                details: ['$10,000 prize pool', 'Top 10 win prizes', 'Demo & live eligible', 'Monthly reset'],
                cta: 'Enter Competition',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Free Education',
                title: 'Complete Trading Education Package',
                description: 'Access our comprehensive education library at no cost. Includes video courses, webinars, e-books, and live mentoring sessions for all skill levels.',
                details: ['50+ video lessons', 'Weekly live webinars', 'E-book library', 'Personal mentor access'],
                cta: 'Start Learning',
                ctaLink: './?page=claim-offer'
            }
        ],

        indonesia: [
            {
                badge: 'Welcome Bonus',
                title: '50% Deposit Bonus for Indonesian Traders',
                description: 'Boost your first deposit with a 50% bonus. Indonesian traders can start with additional trading capital to explore the global markets.',
                details: ['Min. deposit $50', 'Max. bonus $2,500', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Islamic Account',
                title: 'Swap-Free Islamic Trading Account',
                description: 'Trade in accordance with Sharia principles. Our Islamic account features zero overnight swap charges on all positions held past market close.',
                details: ['Zero swap charges', 'No hidden fees', 'All instruments available', 'Sharia-compliant'],
                cta: 'Open Islamic Account',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Cashback',
                title: '3% Cashback on Every Trade',
                description: 'Receive 3% cashback on every trade you execute, regardless of the outcome. Funds are credited directly to your trading account weekly.',
                details: ['3% per trade', 'Win or lose', 'Weekly credit', 'No minimum volume'],
                cta: 'Activate Cashback',
                ctaLink: './?page=claim-offer'
            }
        ],

        pakistan: [
            {
                badge: 'Welcome Bonus',
                title: '100% Deposit Bonus for Pakistani Traders',
                description: 'Double your trading power with our exclusive 100% deposit match for Pakistani clients. Fund your account and trade with twice the capital.',
                details: ['Min. deposit $100', 'Max. bonus $5,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Islamic Account',
                title: 'Zero Swap Islamic Account',
                description: 'Trade confidently with our fully Sharia-compliant trading account. Hold positions overnight without any swap or rollover fees applied.',
                details: ['Zero swap fees', 'Sharia-compliant', 'Full instrument access', 'Dedicated support'],
                cta: 'Open Islamic Account',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Reduced Commission',
                title: 'Up to 50% Reduced Trading Commission',
                description: 'Enjoy significantly lower commission rates on all your trades. High-volume traders benefit from even deeper discounts on our ECN accounts.',
                details: ['Up to 50% reduction', 'ECN accounts eligible', 'Volume-based tiers', 'Instant activation'],
                cta: 'Reduce Costs',
                ctaLink: './?page=claim-offer'
            }
        ],

        latam: [
            {
                badge: 'Bono de Bienvenida',
                title: '100% Bonus de Deposito para Nuevos Traders',
                description: 'Duplica tu capital inicial con nuestra oferta exclusiva de bienvenida para traders latinoamericanos. Abre una cuenta y recibe un 100% de bono en tu primer deposito.',
                details: ['Deposito min. $100', 'Bono max. $5,000', 'Valido por 30 dias', 'T&C aplican'],
                cta: 'Reclamar Oferta',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Referral Program',
                title: 'Earn $75 per Referral Across Latin America',
                description: 'Invite traders from any Latin American country and earn $75 for each successful referral. Build your network and earn unlimited rewards.',
                details: ['$75 per referral', 'Unlimited referrals', 'Multi-country support', 'Fast payouts'],
                cta: 'Start Referring',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Trading Competition',
                title: '$15,000 LATAM Trading Championship',
                description: 'Compete in the region-wide trading championship with a $15,000 prize pool. Traders from all Latin American countries are eligible to participate.',
                details: ['$15,000 prize pool', 'Regional leaderboard', 'Monthly rounds', 'Demo & live accounts'],
                cta: 'Enter Championship',
                ctaLink: './?page=claim-offer'
            }
        ],

        namibia: [
            {
                badge: 'Welcome Bonus',
                title: '75% Deposit Bonus for Namibian Traders',
                description: 'Start your trading journey with a 75% bonus on your first deposit. Namibian traders can access global markets with enhanced capital.',
                details: ['Min. deposit $50', 'Max. bonus $3,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Local Payment Bonus',
                title: 'Extra 10% Bonus on Local Payment Methods',
                description: 'Receive an additional 10% bonus when you deposit using local Namibian payment methods. Stack this on top of your welcome bonus for maximum value.',
                details: ['Extra 10% bonus', 'Local bank transfers', 'Mobile money accepted', 'Instant credit'],
                cta: 'Deposit Now',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Education Access',
                title: 'Free Premium Trading Education',
                description: 'Access our complete premium education suite at no charge. Includes beginner to advanced courses, market analysis tools, and weekly mentoring sessions.',
                details: ['Full course library', 'Weekly mentoring', 'Market analysis tools', 'Certificate on completion'],
                cta: 'Start Learning',
                ctaLink: './?page=claim-offer'
            }
        ],

        kenya: [
            {
                badge: 'Welcome Bonus',
                title: '100% Deposit Bonus for Kenyan Traders',
                description: 'Double your capital with a 100% match on your first deposit. Kenyan traders can take advantage of this offer to trade forex, metals, and more.',
                details: ['Min. deposit $50', 'Max. bonus $5,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'M-Pesa Bonus',
                title: 'Extra 15% Bonus on M-Pesa Deposits',
                description: 'Fund your account using M-Pesa and receive an extra 15% bonus on every deposit. Fast, convenient, and rewarding for Kenyan traders.',
                details: ['15% extra on M-Pesa', 'Instant processing', 'No deposit fees', 'Stackable with welcome bonus'],
                cta: 'Deposit via M-Pesa',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Live Training',
                title: 'Free Weekly Live Trading Sessions',
                description: 'Join our expert analysts for free live trading sessions every week. Watch real-time analysis, learn strategies, and ask questions during market hours.',
                details: ['Weekly live sessions', 'Real-time analysis', 'Interactive Q&A', 'Recording access'],
                cta: 'Join Sessions',
                ctaLink: './?page=claim-offer'
            }
        ],

        ghana: [
            {
                badge: 'Welcome Bonus',
                title: '50% Deposit Bonus for Ghanaian Traders',
                description: 'Get a 50% boost on your first deposit. Ghanaian traders can begin their trading journey with additional capital across all account types.',
                details: ['Min. deposit $50', 'Max. bonus $2,500', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Cashback Program',
                title: '4% Weekly Cashback on All Trades',
                description: 'Earn 4% cashback on your weekly trading volume. Funds are automatically credited to your account every Monday morning.',
                details: ['4% weekly cashback', 'Automatic credit', 'No cap on earnings', 'All instruments'],
                cta: 'Activate Cashback',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Trading Education',
                title: 'Free Comprehensive Trading Course',
                description: 'Master the markets with our free trading education program designed for Ghanaian traders. Covers fundamentals, technical analysis, and risk management.',
                details: ['40+ video lessons', 'Practice exercises', 'Downloadable guides', 'Community access'],
                cta: 'Enroll Free',
                ctaLink: './?page=claim-offer'
            }
        ],

        nigeria: [
            {
                badge: 'Welcome Bonus',
                title: '100% Deposit Bonus for Nigerian Traders',
                description: 'Start strong with a 100% deposit match. Nigerian traders can fund their accounts and trade with double the capital from day one.',
                details: ['Min. deposit $100', 'Max. bonus $5,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Naira Deposit Bonus',
                title: 'Extra 15% Bonus on Naira Deposits',
                description: 'Deposit in Nigerian Naira and receive an extra 15% bonus on top of your deposit. Supports local bank transfers and popular Nigerian payment methods.',
                details: ['15% extra on NGN deposits', 'Local bank transfers', 'Opay & Palmpay accepted', 'Instant processing'],
                cta: 'Deposit in Naira',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Free Signals',
                title: 'Premium Trading Signals at No Cost',
                description: 'Receive daily professional trading signals delivered via Telegram and email. Covering forex, gold, and indices with clear entry and exit levels.',
                details: ['5+ daily signals', 'Forex, gold & indices', 'Telegram delivery', 'Performance tracking'],
                cta: 'Get Free Signals',
                ctaLink: './?page=claim-offer'
            }
        ],

        'south-africa': [
            {
                badge: 'Welcome Bonus',
                title: '75% Deposit Bonus for South African Traders',
                description: 'Amplify your starting capital with a 75% deposit bonus. South African traders enjoy competitive conditions and enhanced trading power.',
                details: ['Min. deposit $100', 'Max. bonus $3,750', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'ZAR Account',
                title: 'ZAR-Denominated Account Benefits',
                description: 'Trade directly in South African Rand with no currency conversion fees. Enjoy local deposits and withdrawals with zero additional charges.',
                details: ['ZAR base currency', 'No conversion fees', 'EFT deposits supported', 'Fast ZAR withdrawals'],
                cta: 'Open ZAR Account',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Trading Competition',
                title: '$20,000 South Africa Trading Cup',
                description: 'Compete for your share of a $20,000 prize pool in our quarterly South Africa Trading Cup. Open to all SA-based traders on live accounts.',
                details: ['$20,000 prize pool', 'Quarterly competition', 'Live accounts only', 'Top 20 win prizes'],
                cta: 'Enter Competition',
                ctaLink: './?page=claim-offer'
            }
        ],

        'trinidad-tobago': [
            {
                badge: 'Welcome Bonus',
                title: '100% Deposit Bonus for T&T Traders',
                description: 'Double your first deposit with our exclusive welcome offer for Trinidad & Tobago traders. Access global markets with enhanced trading capital.',
                details: ['Min. deposit $100', 'Max. bonus $5,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Caribbean Trader',
                title: 'Caribbean Trader Loyalty Program',
                description: 'Join our exclusive Caribbean Trader program and earn loyalty points on every trade. Redeem points for cash bonuses, reduced spreads, and premium services.',
                details: ['Earn points per lot', 'Redeem for cash', 'Tiered VIP levels', 'Exclusive perks'],
                cta: 'Join Program',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Reduced Spreads',
                title: 'Tight Spreads from 0.2 Pips',
                description: 'Trade with some of the tightest spreads available in the Caribbean region. Major forex pairs, gold, and indices at ultra-competitive pricing.',
                details: ['From 0.2 pips', 'Majors & gold', 'No requotes', 'Fast execution'],
                cta: 'Start Trading',
                ctaLink: './?page=claim-offer'
            }
        ],

        guyana: [
            {
                badge: 'Welcome Bonus',
                title: '75% Deposit Bonus for Guyanese Traders',
                description: 'Start with a 75% bonus on your first deposit. Guyanese traders can access world-class trading conditions with boosted starting capital.',
                details: ['Min. deposit $50', 'Max. bonus $3,000', 'Valid for 30 days', 'T&C apply'],
                cta: 'Claim Offer',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'GYD Deposit Bonus',
                title: 'Extra 10% on Guyanese Dollar Deposits',
                description: 'Fund your account in GYD and receive an additional 10% bonus. Supports local bank transfers with quick processing times.',
                details: ['10% extra on GYD', 'Local bank support', 'Quick processing', 'No hidden fees'],
                cta: 'Deposit in GYD',
                ctaLink: './?page=claim-offer'
            },
            {
                badge: 'Personal Manager',
                title: 'Dedicated Personal Account Manager',
                description: 'Receive one-on-one support from a dedicated account manager. Get personalized trading guidance, market insights, and priority assistance.',
                details: ['1-on-1 support', 'Trading guidance', 'Priority withdrawals', 'Direct phone line'],
                cta: 'Get Your Manager',
                ctaLink: './?page=claim-offer'
            }
        ]
    };

    function escapeHtml(str) {
        var s = str == null ? '' : String(str);
        return s
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    }

    function localizedPromotion(regionId, index, fallback) {
        var entry = null;
        if (window.i18n && typeof window.i18n.getMessage === 'function') {
            entry = window.i18n.getMessage(['offersPage', 'promotions', regionId, index]);
        }
        if (!entry || typeof entry !== 'object') {
            return {
                badge: fallback.badge,
                title: fallback.title,
                description: fallback.description,
                details: (fallback.details || []).slice(),
                cta: fallback.cta,
                ctaLink: fallback.ctaLink
            };
        }
        var fd = fallback.details || [];
        var ed = entry.details;
        var details = [];
        for (var di = 0; di < fd.length; di++) {
            details.push(ed && ed[di] != null ? ed[di] : fd[di]);
        }
        return {
            badge: entry.badge != null ? entry.badge : fallback.badge,
            title: entry.title != null ? entry.title : fallback.title,
            description: entry.description != null ? entry.description : fallback.description,
            details: details,
            cta: entry.cta != null ? entry.cta : fallback.cta,
            ctaLink: entry.ctaLink != null ? entry.ctaLink : fallback.ctaLink
        };
    }

    function getPromotionsForRegion(regionId) {
        var base = PROMOTIONS[regionId] || [];
        var out = [];
        for (var i = 0; i < base.length; i++) {
            out.push(localizedPromotion(regionId, i, base[i]));
        }
        return out;
    }

    function regionDisplayName(regionId) {
        var key = 'offersPage.regions.' + regionId;
        if (window.i18n && window.i18n.t) {
            var v = window.i18n.t(key);
            if (v !== key) return v;
        }
        var r = getRegionById(regionId);
        return r ? r.name : regionId;
    }

    const LATAM_CODES = [
        'MX', 'BR', 'AR', 'CO', 'CL', 'PE', 'EC', 'VE',
        'UY', 'PY', 'BO', 'CR', 'PA', 'GT', 'HN', 'SV',
        'NI', 'DO', 'CU'
    ];

    // -------------------------------------------------------------------------
    // State
    // -------------------------------------------------------------------------

    let selectedRegion = null;

    // -------------------------------------------------------------------------
    // Star SVG Icon (for promo badges)
    // -------------------------------------------------------------------------

    const STAR_ICON = '<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><polygon points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"/></svg>';

    // -------------------------------------------------------------------------
    // Render Sidebar (Desktop)
    // -------------------------------------------------------------------------

    function renderSidebar() {
        var list = document.getElementById('sidebarCountryList');
        if (!list) return;

        var html = '';
        for (var i = 0; i < REGIONS.length; i++) {
            var region = REGIONS[i];
            var promos = PROMOTIONS[region.id] || [];
            var offerCount = promos.length;
            var offerText;
            if (window.i18n && window.i18n.t) {
                if (offerCount === 1) {
                    offerText = window.i18n.t('offersPage.offersOne');
                    if (offerText === 'offersPage.offersOne') offerText = '1 offer';
                } else {
                    offerText = window.i18n.t('offersPage.offersMany', { count: offerCount });
                    if (offerText === 'offersPage.offersMany') {
                        offerText = offerCount + ' offers';
                    }
                }
            } else {
                offerText = offerCount === 1 ? '1 offer' : offerCount + ' offers';
            }
            var flag = FLAGS[region.id] || '';
            var rname = escapeHtml(regionDisplayName(region.id));

            html +=
                '<button class="sidebar-country-item" data-region="' + region.id + '" ' +
                'role="option" aria-selected="false" type="button">' +
                    '<div class="sidebar-country-flag">' + flag + '</div>' +
                    '<span class="sidebar-country-name">' + rname + '</span>' +
                    '<span class="sidebar-country-count">' + escapeHtml(offerText) + '</span>' +
                '</button>';
        }

        list.innerHTML = html;
    }

    // -------------------------------------------------------------------------
    // Render Horizontal Strip (Mobile)
    // -------------------------------------------------------------------------

    function renderStrip() {
        var strip = document.getElementById('countryStrip');
        if (!strip) return;

        var html = '';
        for (var i = 0; i < REGIONS.length; i++) {
            var region = REGIONS[i];
            var flag = FLAGS[region.id] || '';
            var rname = escapeHtml(regionDisplayName(region.id));

            html +=
                '<button class="strip-country-item" data-region="' + region.id + '" type="button">' +
                    '<div class="strip-country-flag">' + flag + '</div>' +
                    '<span class="strip-country-name">' + rname + '</span>' +
                '</button>';
        }

        strip.innerHTML = html;
    }

    // -------------------------------------------------------------------------
    // Render Promotions
    // -------------------------------------------------------------------------

    function renderPromotions(regionId) {
        var grid = document.getElementById('promotionsGrid');
        var empty = document.getElementById('promotionsEmpty');
        var cta = document.getElementById('offersContentCta');

        if (window.TraderTokIsOffersUnsupportedVisitor && window.TraderTokIsOffersUnsupportedVisitor()) {
            if (grid) grid.innerHTML = '';
            if (empty) empty.style.display = 'none';
            if (cta) cta.style.display = 'none';
            var ph = document.getElementById('promotionsHeader');
            if (ph) ph.style.display = 'none';
            return;
        }

        if (!grid) return;

        // No region selected — show prompt to pick one
        if (!regionId) {
            grid.innerHTML = '';
            if (empty) {
                var emptyMsg = 'Select a country to view exclusive offers for your region.';
                if (window.i18n && window.i18n.t) {
                    var em = window.i18n.t('offersPage.emptyState');
                    if (em !== 'offersPage.emptyState') emptyMsg = em;
                }
                empty.innerHTML =
                    '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--text-tertiary); margin-bottom: 16px;">' +
                        '<circle cx="12" cy="12" r="10"></circle>' +
                        '<path d="M8 12l2 2 4-4"></path>' +
                    '</svg>' +
                    '<p>' + escapeHtml(emptyMsg) + '</p>';
                empty.style.display = '';
            }
            if (cta) cta.style.display = 'none';
            return;
        }

        var regionPromos = getPromotionsForRegion(regionId);
        var promos = [];
        for (var i = 0; i < regionPromos.length; i++) {
            promos.push({ promo: regionPromos[i], regionId: regionId });
        }

        if (promos.length === 0) {
            grid.innerHTML = '';
            if (empty) {
                var noOffersText = 'No offers available for this region yet. Check back soon!';
                if (window.i18n && window.i18n.t) {
                    var nt = window.i18n.t('offersPage.noOffers');
                    if (nt !== 'offersPage.noOffers') noOffersText = nt;
                }
                empty.innerHTML =
                    '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--text-tertiary); margin-bottom: 16px;">' +
                        '<circle cx="12" cy="12" r="10"></circle>' +
                        '<line x1="12" y1="8" x2="12" y2="12"></line>' +
                        '<line x1="12" y1="16" x2="12.01" y2="16"></line>' +
                    '</svg>' +
                    '<p>' + escapeHtml(noOffersText) + '</p>';
                empty.style.display = '';
            }
            return;
        }

        if (empty) empty.style.display = 'none';

        var html = '';
        for (var p = 0; p < promos.length; p++) {
            var item = promos[p];
            var promo = item.promo;
            var delay = p * 60;

            // Build details tags
            var detailsHtml = '';
            if (promo.details && promo.details.length) {
                for (var d = 0; d < promo.details.length; d++) {
                    detailsHtml += '<span class="promo-detail-tag">' + escapeHtml(promo.details[d]) + '</span>';
                }
            }

            html +=
                '<div class="promo-card" style="animation-delay: ' + delay + 'ms;">' +
                    '<div class="promo-card-badge">' +
                        STAR_ICON +
                        '<span>' + escapeHtml(promo.badge) + '</span>' +
                    '</div>' +
                    '<h3 class="promo-card-title">' + escapeHtml(promo.title) + '</h3>' +
                    '<p class="promo-card-description">' + escapeHtml(promo.description) + '</p>' +
                    '<div class="promo-card-details">' + detailsHtml + '</div>' +
                    '<a href="' + String(promo.ctaLink).replace(/"/g, '&quot;') + '" class="promo-card-cta">' + escapeHtml(promo.cta) + '</a>' +
                '</div>';
        }

        grid.innerHTML = html;

        // Show CTA when a region is selected with promotions
        if (cta) cta.style.display = 'block';
    }

    // -------------------------------------------------------------------------
    // Select Region
    // -------------------------------------------------------------------------

    function selectRegion(regionId) {
        selectedRegion = regionId;

        // Update sidebar active states
        var sidebar = document.getElementById('offersSidebar');
        var sidebarItems = document.querySelectorAll('.sidebar-country-item');
        for (var i = 0; i < sidebarItems.length; i++) {
            var item = sidebarItems[i];
            var isActive = item.getAttribute('data-region') === regionId;
            item.classList.toggle('active', isActive);
            item.setAttribute('aria-selected', isActive ? 'true' : 'false');
        }
        if (sidebar) sidebar.classList.toggle('has-selection', !!regionId);

        // Update mobile strip active states
        var strip = document.getElementById('countryStrip');
        var stripItems = document.querySelectorAll('.strip-country-item');
        for (var j = 0; j < stripItems.length; j++) {
            var stripItem = stripItems[j];
            var isStripActive = stripItem.getAttribute('data-region') === regionId;
            stripItem.classList.toggle('active', isStripActive);
        }
        if (strip) strip.classList.toggle('has-selection', !!regionId);

        // Scroll active strip item into view on mobile
        if (regionId) {
            var activeStripItem = document.querySelector('.strip-country-item.active');
            if (activeStripItem) {
                activeStripItem.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            }
        }

        // Sync dropdown
        var dropdown = document.getElementById('regionDropdown');
        if (dropdown) {
            dropdown.value = regionId || '';
        }

        // Update promotions header
        var header = document.getElementById('promotionsHeader');
        var headerTitle = document.getElementById('promotionsRegionTitle');
        if (regionId) {
            var region = getRegionById(regionId);
            if (header) header.style.display = '';
            if (headerTitle && region) {
                var hdr = null;
                if (window.i18n && window.i18n.t) {
                    hdr = window.i18n.t('offersPage.regionOffersTitle', {
                        name: regionDisplayName(regionId)
                    });
                    if (hdr === 'offersPage.regionOffersTitle') hdr = null;
                }
                headerTitle.textContent = hdr != null ? hdr : region.name + ' Offers';
            }
        } else {
            if (header) header.style.display = 'none';
        }

        // Render promotions
        renderPromotions(regionId);

        // On mobile, scroll to content
        var content = document.getElementById('offersContent');
        if (content && window.innerWidth < 768) {
            content.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        syncUiLanguageToOfferRegion(regionId);
    }

    // -------------------------------------------------------------------------
    // Clear Selection
    // -------------------------------------------------------------------------

    function clearSelection() {
        selectedRegion = null;

        // Remove active state from sidebar
        var sidebar = document.getElementById('offersSidebar');
        var sidebarItems = document.querySelectorAll('.sidebar-country-item');
        for (var i = 0; i < sidebarItems.length; i++) {
            sidebarItems[i].classList.remove('active');
            sidebarItems[i].setAttribute('aria-selected', 'false');
        }
        if (sidebar) sidebar.classList.remove('has-selection');

        // Remove active state from strip
        var strip = document.getElementById('countryStrip');
        var stripItems = document.querySelectorAll('.strip-country-item');
        for (var j = 0; j < stripItems.length; j++) {
            stripItems[j].classList.remove('active');
        }
        if (strip) strip.classList.remove('has-selection');

        // Reset dropdown to placeholder
        var dropdown = document.getElementById('regionDropdown');
        if (dropdown) dropdown.selectedIndex = 0;

        // Hide promotions header
        var header = document.getElementById('promotionsHeader');
        if (header) header.style.display = 'none';

        // Show prompt state (also hides CTA)
        renderPromotions(null);
    }

    // -------------------------------------------------------------------------
    // Event Listeners
    // -------------------------------------------------------------------------

    function initEventListeners() {
        // Sidebar clicks via event delegation
        var sidebarList = document.getElementById('sidebarCountryList');
        if (sidebarList) {
            sidebarList.addEventListener('click', function (e) {
                if (isOffersInteractionBlocked()) return;

                var item = e.target.closest('.sidebar-country-item');
                if (!item) return;
                var regionId = item.getAttribute('data-region');
                if (!regionId) return;
                if (selectedRegion === regionId) {
                    clearSelection();
                } else {
                    selectRegion(regionId);
                }
            });
        }

        // Mobile strip clicks
        var strip = document.getElementById('countryStrip');
        if (strip) {
            strip.addEventListener('click', function (e) {
                if (isOffersInteractionBlocked()) return;

                var item = e.target.closest('.strip-country-item');
                if (!item) return;
                var regionId = item.getAttribute('data-region');
                if (!regionId) return;
                if (selectedRegion === regionId) {
                    clearSelection();
                } else {
                    selectRegion(regionId);
                }
            });
        }

        // Dropdown change (mobile)
        var dropdown = document.getElementById('regionDropdown');
        if (dropdown) {
            dropdown.addEventListener('change', function () {
                var lc = getOffersLockCountry();
                if (lc) {
                    dropdown.value = lc;
                    return;
                }

                var value = dropdown.value;
                if (value) {
                    selectRegion(value);
                } else {
                    clearSelection();
                }
            });
        }

        // Clear button
        var clearBtn = document.getElementById('clearRegion');
        if (clearBtn) {
            clearBtn.addEventListener('click', function () {
                if (isOffersInteractionBlocked()) return;
                clearSelection();
            });
        }

        window.addEventListener('hashchange', function () {
            if (offerRegionResolutionPending) return;
            if (window.TraderTokIsOffersUnsupportedVisitor && window.TraderTokIsOffersUnsupportedVisitor()) {
                if (window.location.hash) {
                    history.replaceState(
                        null,
                        '',
                        window.location.pathname + window.location.search
                    );
                }
                return;
            }
            var lock = getOffersLockCountry();
            if (lock) {
                var want = getRegionFromURL();
                if (want && want !== lock) {
                    history.replaceState(
                        null,
                        '',
                        window.location.pathname + window.location.search + '#' + lock
                    );
                }
                return;
            }
            var region = getRegionFromURL();
            if (region && region !== selectedRegion) {
                selectRegion(region);
            }
        });
    }

    // -------------------------------------------------------------------------
    // Geo-Detection
    // -------------------------------------------------------------------------

    function fetchWithAbort(url, timeoutMs) {
        var controller = new AbortController();
        var tid = setTimeout(function () {
            controller.abort();
        }, timeoutMs);
        return fetch(url, { signal: controller.signal }).finally(function () {
            clearTimeout(tid);
        });
    }

    /**
     * ISO country code (alpha-2). Uses ipapi.co first, then GeoJS (CORS-friendly fallback)
     * if the first request fails — avoids relying on AbortSignal.timeout (not in older Safari).
     */
    async function fetchVisitorCountryCode() {
        var ms = 4000;
        try {
            var response = await fetchWithAbort('https://ipapi.co/json/', ms);
            if (response.ok) {
                var data = await response.json();
                if (data && data.country_code) {
                    return String(data.country_code).toUpperCase();
                }
            }
        } catch (e) {}

        try {
            var response2 = await fetchWithAbort('https://get.geojs.io/v1/ip/country.json', ms);
            if (response2.ok) {
                var data2 = await response2.json();
                if (data2 && data2.country && String(data2.country).length === 2) {
                    return String(data2.country).toUpperCase();
                }
            }
        } catch (e2) {}

        return null;
    }

    async function attemptGeoDetection() {
        try {
            if (selectedRegion) return;

            var countryCode =
                typeof window.TraderTokFetchVisitorIsoCountryCode === 'function'
                    ? await window.TraderTokFetchVisitorIsoCountryCode()
                    : await fetchVisitorCountryCode();
            if (!countryCode) return;

            var detectedRegion = mapCountryToRegion(countryCode);
            if (!detectedRegion) {
                if (window.TraderTokSetOffersUnsupportedVisitorFlag) {
                    window.TraderTokSetOffersUnsupportedVisitorFlag();
                }
                try {
                    sessionStorage.removeItem(OFFERS_GEO_SESSION_KEY);
                } catch (eRm) {}
                selectedRegion = null;
                if (window.location.hash) {
                    history.replaceState(
                        null,
                        '',
                        window.location.pathname + window.location.search
                    );
                }
                renderPromotions(null);
                refreshOffersChromeState();
                try {
                    window.dispatchEvent(new CustomEvent('tradertok:offers-unsupported-visitor'));
                } catch (eEv) {}
                return;
            }

            if (window.TraderTokClearOffersUnsupportedVisitorFlag) {
                window.TraderTokClearOffersUnsupportedVisitorFlag();
            }

            try {
                sessionStorage.setItem(OFFERS_GEO_SESSION_KEY, detectedRegion);
            } catch (e3) {}

            selectRegion(detectedRegion);
            refreshOffersChromeState();
            normalizeOffersHashToLock();
        } catch (e) {
            // Fail silently on any error
        }
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    function getRegionById(regionId) {
        for (var i = 0; i < REGIONS.length; i++) {
            if (REGIONS[i].id === regionId) return REGIONS[i];
        }
        return null;
    }

    function mapCountryToRegion(countryCode) {
        if (typeof window.TraderTokIsoToOfferPromoRegionSlug === 'function') {
            return window.TraderTokIsoToOfferPromoRegionSlug(countryCode);
        }
        var code = String(countryCode).toUpperCase();
        for (var i = 0; i < REGIONS.length; i++) {
            if (REGIONS[i].code === code) return REGIONS[i].id;
        }
        if (LATAM_CODES.indexOf(code) !== -1) {
            return 'latam';
        }
        return null;
    }

    // -------------------------------------------------------------------------
    // Initialization
    // -------------------------------------------------------------------------

    function getRegionFromURL() {
        // Check hash fragment first (e.g. #kenya), then query param as fallback
        var hash = window.location.hash.replace('#', '');
        var region = hash || new URLSearchParams(window.location.search).get('region');
        if (region) {
            var valid = REGIONS.some(function(r) { return r.id === region; });
            if (valid) return region;
        }
        return null;
    }

    /**
     * Canonical map lives in tradertok-subdomain-config.js (TRADERTOK_SUBDOMAIN_MAP).
     */
    function getRegionFromSubdomain() {
        var hostname = window.location.hostname;
        var parts = hostname.split('.');
        if (parts.length < 3) return null;
        var raw = parts[0];
        if (
            typeof window.TraderTokNormalizeSubdomainKey !== 'function' ||
            !window.TRADERTOK_SUBDOMAIN_MAP
        ) {
            return null;
        }
        var canon = window.TraderTokNormalizeSubdomainKey(raw);
        if (!canon) return null;
        return window.TRADERTOK_SUBDOMAIN_MAP[canon] || null;
    }

    function getOffersLockCountry() {
        if (window.subdomainData && window.subdomainData.country) {
            return window.subdomainData.country;
        }
        try {
            var g = sessionStorage.getItem(OFFERS_GEO_SESSION_KEY);
            if (g && getRegionById(g)) return g;
        } catch (e) {}
        return null;
    }

    function isOffersInteractionBlocked() {
        var unsupported =
            window.TraderTokIsOffersUnsupportedVisitor &&
            window.TraderTokIsOffersUnsupportedVisitor();
        return !!getOffersLockCountry() || offerRegionResolutionPending || unsupported;
    }

    function normalizeOffersHashToLock() {
        var lock = getOffersLockCountry();
        if (!lock) return;
        var want = getRegionFromURL();
        if (want && want !== lock) {
            history.replaceState(
                null,
                '',
                window.location.pathname + window.location.search + '#' + lock
            );
        } else if (!window.location.hash || window.location.hash === '#') {
            history.replaceState(
                null,
                '',
                window.location.pathname + window.location.search + '#' + lock
            );
        }
    }

    function refreshOffersChromeState() {
        var lockCountry = getOffersLockCountry();
        var unsupported =
            window.TraderTokIsOffersUnsupportedVisitor &&
            window.TraderTokIsOffersUnsupportedVisitor();
        var sb = document.getElementById('offersSidebar');
        var strip = document.getElementById('countryStrip');
        var dd = document.getElementById('regionDropdown');
        var clearBtn = document.getElementById('clearRegion');
        if (sb) {
            sb.classList.toggle('is-locked', !!lockCountry);
            sb.classList.toggle('is-unsupported-region', !!unsupported);
        }
        if (strip) {
            strip.classList.toggle('is-locked', !!lockCountry);
            strip.classList.toggle('is-unsupported-region', !!unsupported);
        }
        if (dd) {
            dd.disabled = !!lockCountry || !!unsupported || offerRegionResolutionPending;
        }
        if (clearBtn) {
            clearBtn.style.display = lockCountry || unsupported ? 'none' : '';
        }
    }

    function init() {
        renderSidebar();
        renderStrip();
        initEventListeners();

        if (window.subdomainData && window.subdomainData.country) {
            if (window.TraderTokClearOffersUnsupportedVisitorFlag) {
                window.TraderTokClearOffersUnsupportedVisitorFlag();
            }
            try {
                sessionStorage.setItem(OFFERS_GEO_SESSION_KEY, window.subdomainData.country);
            } catch (e0) {}
            selectRegion(window.subdomainData.country);
            refreshOffersChromeState();
            normalizeOffersHashToLock();
            return;
        }

        try {
            var cached = sessionStorage.getItem(OFFERS_GEO_SESSION_KEY);
            if (cached && getRegionById(cached)) {
                if (window.TraderTokClearOffersUnsupportedVisitorFlag) {
                    window.TraderTokClearOffersUnsupportedVisitorFlag();
                }
                selectRegion(cached);
                refreshOffersChromeState();
                normalizeOffersHashToLock();
                return;
            }
        } catch (e1) {}

        var subdomainRegion = getRegionFromSubdomain();
        if (subdomainRegion) {
            if (window.TraderTokClearOffersUnsupportedVisitorFlag) {
                window.TraderTokClearOffersUnsupportedVisitorFlag();
            }
            try {
                sessionStorage.setItem(OFFERS_GEO_SESSION_KEY, subdomainRegion);
            } catch (e2) {}
            selectRegion(subdomainRegion);
            refreshOffersChromeState();
            normalizeOffersHashToLock();
            return;
        }

        if (window.TraderTokIsOffersUnsupportedVisitor && window.TraderTokIsOffersUnsupportedVisitor()) {
            if (window.location.hash) {
                history.replaceState(
                    null,
                    '',
                    window.location.pathname + window.location.search
                );
            }
            renderPromotions(null);
            refreshOffersChromeState();
            try {
                window.dispatchEvent(new CustomEvent('tradertok:offers-unsupported-visitor'));
            } catch (eUs) {}
            return;
        }

        offerRegionResolutionPending = true;
        renderPromotions(null);
        refreshOffersChromeState();
        void attemptGeoDetection().finally(function () {
            offerRegionResolutionPending = false;
            refreshOffersChromeState();
        });
    }

    function scheduleOffersInit() {
        function go() {
            init();
        }
        if (window.i18n && typeof window.i18n.whenReady === 'function') {
            window.i18n.whenReady().then(go, go);
        } else {
            go();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', scheduleOffersInit);
    } else {
        scheduleOffersInit();
    }

    function refreshOffersI18n() {
        renderSidebar();
        renderStrip();
        if (selectedRegion) {
            var headerTitle = document.getElementById('promotionsRegionTitle');
            if (headerTitle && selectedRegion) {
                var region = getRegionById(selectedRegion);
                if (region) {
                    var hdr = null;
                    if (window.i18n && window.i18n.t) {
                        hdr = window.i18n.t('offersPage.regionOffersTitle', {
                            name: regionDisplayName(selectedRegion)
                        });
                        if (hdr === 'offersPage.regionOffersTitle') hdr = null;
                    }
                    headerTitle.textContent = hdr != null ? hdr : region.name + ' Offers';
                }
            }
            renderPromotions(selectedRegion);
        } else {
            renderPromotions(null);
        }
    }

    window.addEventListener('languageChanged', refreshOffersI18n);
    window.addEventListener('tradertok:i18n-applied', refreshOffersI18n);

})();
