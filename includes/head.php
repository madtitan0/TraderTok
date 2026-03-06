<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NL5PSBRX');</script> -->
    <!-- End Google Tag Manager -->

    <!-- Primary Meta Tags -->
    <title><?= $get->title ?></title>
    <meta name="title" content="<?= $get->title ?>">
    <meta name="description" content="<?= $get->desc ?>">
    <meta name="keywords" content="<?= $get->keyw ?>">
    <meta name="author" content=" <?= $get->brand_name ?>">
    <meta name="theme-color" content="#E63946">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://tradertok.com/">
    <meta property="og:title" content="TraderTok - Professional Trading Platform">
    <meta property="og:description"
      content="Grow your savings with confidence. Access powerful trading platforms, real-time analysis, and 24/7 expert support.">
    <meta property="og:image" content="https://tradertok.com/og-image.jpg">
    <meta property="og:site_name" content="TraderTok">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://tradertok.com/">
    <meta name="twitter:title" content="TraderTok - Professional Trading Platform">
    <meta name="twitter:description"
      content="Grow your savings with confidence. Access powerful trading platforms and expert market insights.">
    <meta name="twitter:image" content="https://tradertok.com/twitter-image.jpg">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZHD8CS6T8H"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-ZHD8CS6T8H');
    </script>

    <!-- Google Fonts - Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet">

    <link rel="icon" href="<?= $get->assets_url . '/' . $get->favicon ?>" />
    <?= $theme->css_files ?>

    <link rel="stylesheet" href="assets/css/styles.css?v=<?= filemtime('assets/css/styles.css') ?>">
    <link rel="stylesheet" href="assets/css/team-styles.css?v=<?= filemtime('assets/css/team-styles.css') ?>">
    <link rel="stylesheet"
      href="assets/css/instruments-styles.css?v=<?= filemtime('assets/css/instruments-styles.css') ?>">
     <link rel="stylesheet" href="assets/css/offers-promotions-styles.css?v=<?= filemtime('assets/css/offers-promotions-styles.css') ?>">
         <link rel="stylesheet" href="assets/css/market-ticker.css?v=<?= filemtime('assets/css/market-ticker.css') ?>">
    <link rel="stylesheet" href="assets/css/whatsapp-widget.css?v=<?= filemtime('assets/css/whatsapp-widget.css') ?>">
    <?= $get->head_code ?>
  </head>

  <body>
    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NL5PSBRX"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->

      <!-- Market Ticker -->
    <div class="top-ticker" id="topTicker">
        <div class="ticker-content" id="tickerContent">
            <!-- Items will be populated by JS -->
        </div>
    </div>

    <!-- Header -->
    <header class="header">
      <div class="container">
        <div class="header-content">
          <!-- Logo -->
          <a href="./" class="logo">
            <img src="<?= $get->assets_url.'/'.$get->logo ?>" alt="<?= $get->brand_name ?>" class="logo-image">
          </a>

          <!-- Navigation -->
          <nav class="nav" id="main-navigation" aria-label="Main navigation">
            <ul class="nav-list">
              <li class="nav-item">
                <a href="./meet-the-team" class="nav-link" data-i18n="nav.meetTheTeam">Meet the Team</a>
              </li>
              <li class="nav-item">
                <a href="./trading-platform" class="nav-link" data-i18n="nav.tradingPlatforms">Trading Platforms</a>
              </li>
              <li class="nav-item">
                <a href="./account-types" class="nav-link" data-i18n="nav.accountTypes">Account Types</a>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link" aria-haspopup="true" aria-expanded="false"><span
                    data-i18n="nav.educationResources">Education Resources</span> <span class="arrow">▼</span></a>
                <div class="dropdown-menu" role="menu">
                  <div class="dropdown-cards">
                    <a href="./trading-essentials" class="menu-card">
                      <span class="menu-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                          <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                      </span>
                      <div class="menu-text">
                        <h3 data-i18n="dropdown.tradingEssentials">Trading Essentials</h3>
                        <p data-i18n="dropdown.tradingEssentialsDesc">Learn the fundamentals of trading</p>
                      </div>
                    </a>
                    <a href="./video-education" class="menu-card">
                      <span class="menu-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polygon points="5 3 19 12 5 21 5 3"></polygon>
                        </svg>
                      </span>
                      <div class="menu-text">
                        <h3 data-i18n="dropdown.videoEducation">Video Education</h3>
                        <p data-i18n="dropdown.videoEducationDesc">Watch tutorials and expert insights</p>
                      </div>
                    </a>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link" aria-haspopup="true" aria-expanded="false"><span
                    data-i18n="nav.marketsOverview">Markets Overview</span> <span class="arrow">▼</span></a>
                <div class="dropdown-menu" role="menu">
                  <div class="dropdown-cards">
                    <a href="./events-calendar" class="menu-card">
                      <span class="menu-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                          <line x1="16" y1="2" x2="16" y2="6"></line>
                          <line x1="8" y1="2" x2="8" y2="6"></line>
                          <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                      </span>
                      <div class="menu-text">
                        <h3 data-i18n="dropdown.eventsCalendar">Events Calendar</h3>
                        <p data-i18n="dropdown.eventsCalendarDesc">Track important market events</p>
                      </div>
                    </a>
                    <a href="./research" class="menu-card">
                      <span class="menu-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="12" y1="20" x2="12" y2="10"></line>
                          <line x1="18" y1="20" x2="18" y2="4"></line>
                          <line x1="6" y1="20" x2="6" y2="16"></line>
                        </svg>
                      </span>
                      <div class="menu-text">
                        <h3 data-i18n="dropdown.research">Research</h3>
                        <p data-i18n="dropdown.researchDesc">In-depth market analysis and insights</p>
                      </div>
                    </a>
                    <a href="./live-training" class="menu-card">
                      <span class="menu-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <circle cx="12" cy="12" r="10"></circle>
                          <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                      </span>
                      <div class="menu-text">
                        <h3 data-i18n="dropdown.liveTraining">Live Training</h3>
                        <p data-i18n="dropdown.liveTrainingDesc">Join live sessions with experts</p>
                      </div>
                    </a>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link" aria-haspopup="true" aria-expanded="false"><span
                    data-i18n="nav.legal">Legal</span> <span class="arrow">▼</span></a>
                <div class="dropdown-menu" role="menu">
                  <div class="dropdown-cards">
                    <a href="./legal-documents" class="menu-card">
                      <span class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                          <g fill="none" stroke="currentColor" stroke-width="1.5">
                            <path
                              d="M3 10c0-3.771 0-5.657 1.172-6.828S7.229 2 11 2h2c3.771 0 5.657 0 6.828 1.172S21 6.229 21 10v4c0 3.771 0 5.657-1.172 6.828S16.771 22 13 22h-2c-3.771 0-5.657 0-6.828-1.172S3 17.771 3 14z" />
                            <path stroke-linecap="round" d="M8 10h8m-8 4h5" />
                          </g>
                        </svg>
                      </span>
                      <div class="menu-text">
                        <h3 data-i18n="dropdown.legalDocuments">Legal Documents</h3>
                        <p data-i18n="dropdown.legalDocumentsDesc">Explore our legal documents</p>
                      </div>
                    </a>
                    <a href="./regulations" class="menu-card">
                      <span class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                          <path fill="currentColor"
                            d="M28 22v-3c0-2.2-1.8-4-4-4s-4 1.8-4 4v3c-1.1 0-2 .9-2 2v5c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2v-5c0-1.1-.9-2-2-2m-6-3c0-1.1.9-2 2-2s2 .9 2 2v3h-4zm-2 10v-5h8v5zM8 16h6v2H8zm0-6h12v2H8z" />
                          <path fill="currentColor"
                            d="M26 4c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v13c0 4.1 2.2 7.8 5.8 9.7l5.2 2.8v-2.3l-4.2-2.3C5.8 23.4 4 20.3 4 17V4h20v8h2z" />
                        </svg>
                      </span>
                      <div class="menu-text">
                        <h3 data-i18n="dropdown.regulations">Regulations</h3>
                        <p data-i18n="dropdown.regulationsDesc">Explore our regulations</p>
                      </div>
                    </a>
                  </div>
                </div>
              <li class="nav-item dropdown">
                  <a href="./offers-promotions" class="nav-link" aria-haspopup="true" aria-expanded="false"><span data-i18n="nav.offers">Offers</span> <span class="arrow">▼</span></a>
                  <div class="dropdown-menu offers-dropdown" role="menu"></div>
              </li>
              <li class="nav-item">
                <a href="./contact-us" class="nav-link" data-i18n="nav.contactUs">Contact Us</a>
              </li>
            </ul>
            <div class="mobile-menu-extra">
              <!-- Language Selector for Mobile Menu -->
              <div class="mobile-language-section">
                <h4 class="mobile-language-title" data-i18n="language.title">Language</h4>
                <div class="mobile-language-list">
                  <button class="mobile-language-item active" data-lang="en">
                    <span class="language-flag">
                      <svg class="flag-icon" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#012169" d="M0 0h640v480H0z" />
                        <path fill="#FFF"
                          d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0z" />
                        <path fill="#C8102E"
                          d="m424 281 216 159v40L369 281zm-184 20 6 35L54 480H0zM640 0v3L391 191l2-44L590 0zM0 0l239 176h-60L0 42z" />
                        <path fill="#FFF" d="M241 0v480h160V0zM0 160v160h640V160z" />
                        <path fill="#C8102E" d="M0 193v96h640v-96zM273 0v480h96V0z" />
                      </svg>
                    </span>
                    <span class="mobile-language-name" data-i18n="language.english">English</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="hi">
                    <span class="language-flag">
                      <svg class="flag-icon" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#f93" d="M0 0h640v160H0z" />
                        <path fill="#fff" d="M0 160h640v160H0z" />
                        <path fill="#128807" d="M0 320h640v160H0z" />
                        <circle cx="320" cy="240" r="45" fill="#008" stroke="#008" stroke-width="2" />
                        <circle cx="320" cy="240" r="35" fill="#fff" />
                        <circle cx="320" cy="240" r="8" fill="#008" />
                      </svg>
                    </span>
                    <span class="mobile-language-name" data-i18n="language.hindi">हिन्दी</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="es-419">
                    <span class="language-flag">
                      <svg class="flag-icon" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#0039a6" d="M0 0h640v160H0z" />
                        <path fill="#fff" d="M0 160h640v160H0z" />
                        <path fill="#0039a6" d="M0 320h640v160H0z" />
                        <g transform="translate(320,240)">
                          <circle r="30" fill="#f1bf00" />
                        </g>
                      </svg>
                    </span>
                    <span class="mobile-language-name" data-i18n="language.spanish">Español</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <!-- <button class="mobile-language-item" data-lang="de">
                                    <span class="language-flag">
                                        <svg class="flag-icon" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="#ffce00" d="M0 320h640v160H0z"/>
                                            <path fill="#000" d="M0 0h640v160H0z"/>
                                            <path fill="#d00" d="M0 160h640v160H0z"/>
                                        </svg>
                                    </span>
                                    <span class="mobile-language-name">Deutsch</span>
                                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </button> -->

                  <!-- <button class="mobile-language-item" data-lang="hi">
                                    <span class="language-flag">
                                        <svg class="flag-icon" viewBox="0 0 640 480">
                                            <path fill="#f93" d="M0 0h640v160H0z"/>
                                            <path fill="#fff" d="M0 160h640v160H0z"/>
                                            <path fill="#128807" d="M0 320h640v160H0z"/>
                                            <circle cx="320" cy="240" r="48" fill="none" stroke="#000088" stroke-width="6"/>
                                            <circle cx="320" cy="240" r="3" fill="#000088"/>
                                        </svg>
                                    </span>

                                    <span class="mobile-language-name">Hindi</span>

                                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </button> -->

                </div>
              </div>
            </div>
          </nav>

          <!-- Right side actions -->
          <div class="header-actions">
            <!-- Language Selector -->
            <div class="language-selector">
              <button class="language-btn" id="languageBtn" aria-label="Select language">
                <span class="language-flag">
                  <svg class="flag-icon" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#012169" d="M0 0h640v480H0z" />
                    <path fill="#FFF"
                      d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0z" />
                    <path fill="#C8102E"
                      d="m424 281 216 159v40L369 281zm-184 20 6 35L54 480H0zM640 0v3L391 191l2-44L590 0zM0 0l239 176h-60L0 42z" />
                    <path fill="#FFF" d="M241 0v480h160V0zM0 160v160h640V160z" />
                    <path fill="#C8102E" d="M0 193v96h640v-96zM273 0v480h96V0z" />
                  </svg>
                </span>
                <span class="language-code">EN</span>
                <svg class="language-arrow" width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor"
                  stroke-width="2">
                  <path d="M2 3.5L5 6.5L8 3.5" />
                </svg>
              </button>
              <div class="language-dropdown" id="languageDropdown">
                <div class="language-item" data-lang="en">
                  <span class="language-flag">
                    <svg class="flag-icon" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
                      <path fill="#012169" d="M0 0h640v480H0z" />
                      <path fill="#FFF"
                        d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0z" />
                      <path fill="#C8102E"
                        d="m424 281 216 159v40L369 281zm-184 20 6 35L54 480H0zM640 0v3L391 191l2-44L590 0zM0 0l239 176h-60L0 42z" />
                      <path fill="#FFF" d="M241 0v480h160V0zM0 160v160h640V160z" />
                      <path fill="#C8102E" d="M0 193v96h640v-96zM273 0v480h96V0z" />
                    </svg>
                  </span>
                  <span class="language-name" data-i18n="language.english">English</span>
                </div>
                <div class="language-item" data-lang="hi">
                  <span class="language-flag">
                    <svg class="flag-icon" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
                      <path fill="#f93" d="M0 0h640v160H0z" />
                      <path fill="#fff" d="M0 160h640v160H0z" />
                      <path fill="#128807" d="M0 320h640v160H0z" />
                      <circle cx="320" cy="240" r="45" fill="#008" stroke="#008" stroke-width="2" />
                      <circle cx="320" cy="240" r="35" fill="#fff" />
                      <circle cx="320" cy="240" r="8" fill="#008" />
                    </svg>
                  </span>
                  <span class="language-name" data-i18n="language.hindi">हिन्दी</span>
                </div>
                <div class="language-item" data-lang="es-419">
                  <span class="language-flag">
                    <svg class="flag-icon" viewBox="0 0 640 480" xmlns="http://www.w3.org/2000/svg">
                      <path fill="#0039a6" d="M0 0h640v160H0z" />
                      <path fill="#fff" d="M0 160h640v160H0z" />
                      <path fill="#0039a6" d="M0 320h640v160H0z" />
                      <g transform="translate(320,240)">
                        <circle r="30" fill="#f1bf00" />
                      </g>
                    </svg>
                  </span>
                  <span class="language-name" data-i18n="language.spanish">Español</span>
                </div>
              </div>
            </div>

            <!-- Theme Toggle -->
            <button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
              <svg class="sun-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="5"></circle>
                <line x1="12" y1="1" x2="12" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="23"></line>
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                <line x1="1" y1="12" x2="3" y2="12"></line>
                <line x1="21" y1="12" x2="23" y2="12"></line>
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
              </svg>
              <svg class="moon-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
              </svg>
            </button>

            <button class="btn-secondary" id="signInBtn" data-i18n="auth.signIn">Sign In</button>
            <button class="btn-primary" id="signUpBtn" data-i18n="auth.signUp">Sign Up</button>
            <button class="mobile-close-btn">✕</button>
          </div>

          <!-- Mobile menu button -->
          <button class="mobile-menu-btn" aria-label="Toggle navigation menu" aria-expanded="false"
            aria-controls="main-navigation">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
      </div>
    </header>

    <!-- Auth Sidebar Panel -->
    <div class="auth-overlay" id="authOverlay"></div>
    <div class="auth-sidebar" id="authSidebar">
      <button class="auth-close-btn" id="authCloseBtn" aria-label="Close authentication panel">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>

      <div class="auth-content">
        <!-- Logo -->
        <div class="auth-logo">
          <img src="<?= $get->assets_url.'/'.$get->logo ?>" alt="TraderTok" class="auth-logo-image">
        </div>

        <!-- Tab Switcher -->
        <div class="auth-tabs">
          <button class="auth-tab active" data-tab="signin" data-i18n="auth.signIn">Sign In</button>
          <button class="auth-tab" data-tab="signup" data-i18n="auth.signUp">Sign Up</button>
        </div>

        <!-- Sign In Form -->
        <form class="auth-form active" id="signinForm" data-form="signin">
          <h2 class="auth-form-title">Welcome Back</h2>
          <p class="auth-form-subtitle">Sign in to continue trading</p>

          <div class="auth-form-group">
            <label for="signin-email" class="auth-label">Email</label>
            <input type="email" id="signin-email" class="auth-input" placeholder="support@tradertok.com" required>
          </div>

          <div class="auth-form-group">
            <label for="signin-password" class="auth-label">Password</label>
            <input type="password" id="signin-password" class="auth-input" placeholder="Enter your password" required>
          </div>

          <div class="auth-form-options">
            <label class="auth-checkbox">
              <input type="checkbox" id="remember-me">
              <span>Remember me</span>
            </label>
            <a href="https://client.tradertok.com//#/auth/forgot-password" target="_blank" class="auth-link">Forgot
              password?</a>
          </div>

          <button type="submit" class="auth-submit-btn">Sign In</button>

          <div class="auth-divider">
            <span>or continue with</span>
          </div>

          <div class="auth-social">
            <button type="button" class="auth-social-btn">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                  fill="#4285F4" />
                <path
                  d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                  fill="#34A853" />
                <path
                  d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                  fill="#FBBC05" />
                <path
                  d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                  fill="#EA4335" />
              </svg>
              Google
            </button>
            <button type="button" class="auth-social-btn">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="#1877F2">
                <path
                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
              Facebook
            </button>
          </div>
        </form>

        <!-- Sign Up Form -->
        <form class="auth-form" id="signupForm" data-form="signup">
          <h2 class="auth-form-title" data-i18n="auth.createAccount">Create Account</h2>
          <p class="auth-form-subtitle" data-i18n="auth.startJourney">Start your trading journey today</p>

          <div class="auth-form-row">
            <div class="auth-form-group">
              <label for="signup-firstname" class="auth-label" data-i18n="auth.firstName">First Name</label>
              <input type="text" id="signup-firstname" class="auth-input"
                data-i18n-placeholder="auth.firstNamePlaceholder" placeholder="John" required>
            </div>
            <div class="auth-form-group">
              <label for="signup-lastname" class="auth-label" data-i18n="auth.lastName">Last Name</label>
              <input type="text" id="signup-lastname" class="auth-input"
                data-i18n-placeholder="auth.lastNamePlaceholder" placeholder="Doe" required>
            </div>
          </div>

          <div class="auth-form-group">
            <label for="signup-email" class="auth-label" data-i18n="auth.email">Email</label>
            <input type="email" id="signup-email" class="auth-input" data-i18n-placeholder="auth.emailPlaceholder"
              placeholder="support@tradertok.com" required>
          </div>

          <div class="auth-form-group">
            <label for="signup-phone" class="auth-label" data-i18n="auth.phoneNumber">Phone Number</label>
            <div class="auth-phone-input">
              <button type="button" class="phone-country-select" id="countrySelect">
                <span class="country-flag">🇬🇧</span>
                <span class="country-code">+44</span>
                <svg class="dropdown-arrow" width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor"
                  stroke-width="2">
                  <path d="M3 4.5L6 7.5L9 4.5" />
                </svg>
              </button>
              <input type="tel" id="signup-phone" class="auth-input phone-number-input" placeholder="7520 640 890"
                required>
            </div>

            <!-- Country Dropdown -->
            <div class="country-dropdown" id="countryDropdown">
              <div class="country-search-wrapper">
                <input type="text" class="country-search" id="countrySearch" placeholder="Search country...">
              </div>
              <div class="country-list" id="countryList">
                <div class="country-item" data-code="+93" data-flag="🇦🇫" data-country="Afghanistan">
                  <span class="country-flag">🇦🇫</span>
                  <span class="country-name">Afghanistan</span>
                  <span class="country-code">+93</span>
                </div>
                <div class="country-item" data-code="+355" data-flag="🇦🇱" data-country="Albania">
                  <span class="country-flag">🇦🇱</span>
                  <span class="country-name">Albania</span>
                  <span class="country-code">+355</span>
                </div>
                <div class="country-item" data-code="+213" data-flag="🇩🇿" data-country="Algeria">
                  <span class="country-flag">🇩🇿</span>
                  <span class="country-name">Algeria</span>
                  <span class="country-code">+213</span>
                </div>
                <div class="country-item" data-code="+376" data-flag="🇦🇩" data-country="Andorra">
                  <span class="country-flag">🇦🇩</span>
                  <span class="country-name">Andorra</span>
                  <span class="country-code">+376</span>
                </div>
                <div class="country-item" data-code="+244" data-flag="🇦🇴" data-country="Angola">
                  <span class="country-flag">🇦🇴</span>
                  <span class="country-name">Angola</span>
                  <span class="country-code">+244</span>
                </div>
                <div class="country-item" data-code="+54" data-flag="🇦🇷" data-country="Argentina">
                  <span class="country-flag">🇦🇷</span>
                  <span class="country-name">Argentina</span>
                  <span class="country-code">+54</span>
                </div>
                <div class="country-item" data-code="+374" data-flag="🇦🇲" data-country="Armenia">
                  <span class="country-flag">🇦🇲</span>
                  <span class="country-name">Armenia</span>
                  <span class="country-code">+374</span>
                </div>
                <div class="country-item" data-code="+61" data-flag="🇦🇺" data-country="Australia">
                  <span class="country-flag">🇦🇺</span>
                  <span class="country-name">Australia</span>
                  <span class="country-code">+61</span>
                </div>
                <div class="country-item" data-code="+43" data-flag="🇦🇹" data-country="Austria">
                  <span class="country-flag">🇦🇹</span>
                  <span class="country-name">Austria</span>
                  <span class="country-code">+43</span>
                </div>
                <div class="country-item" data-code="+994" data-flag="🇦🇿" data-country="Azerbaijan">
                  <span class="country-flag">🇦🇿</span>
                  <span class="country-name">Azerbaijan</span>
                  <span class="country-code">+994</span>
                </div>
                <div class="country-item" data-code="+973" data-flag="🇧🇭" data-country="Bahrain">
                  <span class="country-flag">🇧🇭</span>
                  <span class="country-name">Bahrain</span>
                  <span class="country-code">+973</span>
                </div>
                <div class="country-item" data-code="+880" data-flag="🇧🇩" data-country="Bangladesh">
                  <span class="country-flag">🇧🇩</span>
                  <span class="country-name">Bangladesh</span>
                  <span class="country-code">+880</span>
                </div>
                <div class="country-item" data-code="+375" data-flag="🇧🇾" data-country="Belarus">
                  <span class="country-flag">🇧🇾</span>
                  <span class="country-name">Belarus</span>
                  <span class="country-code">+375</span>
                </div>
                <div class="country-item" data-code="+32" data-flag="🇧🇪" data-country="Belgium">
                  <span class="country-flag">🇧🇪</span>
                  <span class="country-name">Belgium</span>
                  <span class="country-code">+32</span>
                </div>
                <div class="country-item" data-code="+591" data-flag="🇧🇴" data-country="Bolivia">
                  <span class="country-flag">🇧🇴</span>
                  <span class="country-name">Bolivia</span>
                  <span class="country-code">+591</span>
                </div>
                <div class="country-item" data-code="+387" data-flag="🇧🇦" data-country="Bosnia and Herzegovina">
                  <span class="country-flag">🇧🇦</span>
                  <span class="country-name">Bosnia and Herzegovina</span>
                  <span class="country-code">+387</span>
                </div>
                <div class="country-item" data-code="+55" data-flag="🇧🇷" data-country="Brazil">
                  <span class="country-flag">🇧🇷</span>
                  <span class="country-name">Brazil</span>
                  <span class="country-code">+55</span>
                </div>
                <div class="country-item" data-code="+359" data-flag="🇧🇬" data-country="Bulgaria">
                  <span class="country-flag">🇧🇬</span>
                  <span class="country-name">Bulgaria</span>
                  <span class="country-code">+359</span>
                </div>
                <div class="country-item" data-code="+855" data-flag="🇰🇭" data-country="Cambodia">
                  <span class="country-flag">🇰🇭</span>
                  <span class="country-name">Cambodia</span>
                  <span class="country-code">+855</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇨🇦" data-country="Canada">
                  <span class="country-flag">🇨🇦</span>
                  <span class="country-name">Canada</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+56" data-flag="🇨🇱" data-country="Chile">
                  <span class="country-flag">🇨🇱</span>
                  <span class="country-name">Chile</span>
                  <span class="country-code">+56</span>
                </div>
                <div class="country-item" data-code="+86" data-flag="🇨🇳" data-country="China">
                  <span class="country-flag">🇨🇳</span>
                  <span class="country-name">China</span>
                  <span class="country-code">+86</span>
                </div>
                <div class="country-item" data-code="+57" data-flag="🇨🇴" data-country="Colombia">
                  <span class="country-flag">🇨🇴</span>
                  <span class="country-name">Colombia</span>
                  <span class="country-code">+57</span>
                </div>
                <div class="country-item" data-code="+506" data-flag="🇨🇷" data-country="Costa Rica">
                  <span class="country-flag">🇨🇷</span>
                  <span class="country-name">Costa Rica</span>
                  <span class="country-code">+506</span>
                </div>
                <div class="country-item" data-code="+385" data-flag="🇭🇷" data-country="Croatia">
                  <span class="country-flag">🇭🇷</span>
                  <span class="country-name">Croatia</span>
                  <span class="country-code">+385</span>
                </div>
                <div class="country-item" data-code="+357" data-flag="🇨🇾" data-country="Cyprus">
                  <span class="country-flag">🇨🇾</span>
                  <span class="country-name">Cyprus</span>
                  <span class="country-code">+357</span>
                </div>
                <div class="country-item" data-code="+420" data-flag="🇨🇿" data-country="Czech Republic">
                  <span class="country-flag">🇨🇿</span>
                  <span class="country-name">Czech Republic</span>
                  <span class="country-code">+420</span>
                </div>
                <div class="country-item" data-code="+45" data-flag="🇩🇰" data-country="Denmark">
                  <span class="country-flag">🇩🇰</span>
                  <span class="country-name">Denmark</span>
                  <span class="country-code">+45</span>
                </div>
                <div class="country-item" data-code="+593" data-flag="🇪🇨" data-country="Ecuador">
                  <span class="country-flag">🇪🇨</span>
                  <span class="country-name">Ecuador</span>
                  <span class="country-code">+593</span>
                </div>
                <div class="country-item" data-code="+20" data-flag="🇪🇬" data-country="Egypt">
                  <span class="country-flag">🇪🇬</span>
                  <span class="country-name">Egypt</span>
                  <span class="country-code">+20</span>
                </div>
                <div class="country-item" data-code="+372" data-flag="🇪🇪" data-country="Estonia">
                  <span class="country-flag">🇪🇪</span>
                  <span class="country-name">Estonia</span>
                  <span class="country-code">+372</span>
                </div>
                <div class="country-item" data-code="+251" data-flag="🇪🇹" data-country="Ethiopia">
                  <span class="country-flag">🇪🇹</span>
                  <span class="country-name">Ethiopia</span>
                  <span class="country-code">+251</span>
                </div>
                <div class="country-item" data-code="+358" data-flag="🇫🇮" data-country="Finland">
                  <span class="country-flag">🇫🇮</span>
                  <span class="country-name">Finland</span>
                  <span class="country-code">+358</span>
                </div>
                <div class="country-item" data-code="+33" data-flag="🇫🇷" data-country="France">
                  <span class="country-flag">🇫🇷</span>
                  <span class="country-name">France</span>
                  <span class="country-code">+33</span>
                </div>
                <div class="country-item" data-code="+995" data-flag="🇬🇪" data-country="Georgia">
                  <span class="country-flag">🇬🇪</span>
                  <span class="country-name">Georgia</span>
                  <span class="country-code">+995</span>
                </div>
                <div class="country-item" data-code="+49" data-flag="🇩🇪" data-country="Germany">
                  <span class="country-flag">🇩🇪</span>
                  <span class="country-name">Germany</span>
                  <span class="country-code">+49</span>
                </div>
                <div class="country-item" data-code="+30" data-flag="🇬🇷" data-country="Greece">
                  <span class="country-flag">🇬🇷</span>
                  <span class="country-name">Greece</span>
                  <span class="country-code">+30</span>
                </div>
                <div class="country-item" data-code="+852" data-flag="🇭🇰" data-country="Hong Kong">
                  <span class="country-flag">🇭🇰</span>
                  <span class="country-name">Hong Kong</span>
                  <span class="country-code">+852</span>
                </div>
                <div class="country-item" data-code="+36" data-flag="🇭🇺" data-country="Hungary">
                  <span class="country-flag">🇭🇺</span>
                  <span class="country-name">Hungary</span>
                  <span class="country-code">+36</span>
                </div>
                <div class="country-item" data-code="+354" data-flag="🇮🇸" data-country="Iceland">
                  <span class="country-flag">🇮🇸</span>
                  <span class="country-name">Iceland</span>
                  <span class="country-code">+354</span>
                </div>
                <div class="country-item" data-code="+91" data-flag="🇮🇳" data-country="India">
                  <span class="country-flag">🇮🇳</span>
                  <span class="country-name">India</span>
                  <span class="country-code">+91</span>
                </div>
                <div class="country-item" data-code="+62" data-flag="🇮🇩" data-country="Indonesia">
                  <span class="country-flag">🇮🇩</span>
                  <span class="country-name">Indonesia</span>
                  <span class="country-code">+62</span>
                </div>
                <div class="country-item" data-code="+98" data-flag="🇮🇷" data-country="Iran">
                  <span class="country-flag">🇮🇷</span>
                  <span class="country-name">Iran</span>
                  <span class="country-code">+98</span>
                </div>
                <div class="country-item" data-code="+964" data-flag="🇮🇶" data-country="Iraq">
                  <span class="country-flag">🇮🇶</span>
                  <span class="country-name">Iraq</span>
                  <span class="country-code">+964</span>
                </div>
                <div class="country-item" data-code="+353" data-flag="🇮🇪" data-country="Ireland">
                  <span class="country-flag">🇮🇪</span>
                  <span class="country-name">Ireland</span>
                  <span class="country-code">+353</span>
                </div>
                <div class="country-item" data-code="+972" data-flag="🇮🇱" data-country="Israel">
                  <span class="country-flag">🇮🇱</span>
                  <span class="country-name">Israel</span>
                  <span class="country-code">+972</span>
                </div>
                <div class="country-item" data-code="+39" data-flag="🇮🇹" data-country="Italy">
                  <span class="country-flag">🇮🇹</span>
                  <span class="country-name">Italy</span>
                  <span class="country-code">+39</span>
                </div>
                <div class="country-item" data-code="+81" data-flag="🇯🇵" data-country="Japan">
                  <span class="country-flag">🇯🇵</span>
                  <span class="country-name">Japan</span>
                  <span class="country-code">+81</span>
                </div>
                <div class="country-item" data-code="+962" data-flag="🇯🇴" data-country="Jordan">
                  <span class="country-flag">🇯🇴</span>
                  <span class="country-name">Jordan</span>
                  <span class="country-code">+962</span>
                </div>
                <div class="country-item" data-code="+7" data-flag="🇰🇿" data-country="Kazakhstan">
                  <span class="country-flag">🇰🇿</span>
                  <span class="country-name">Kazakhstan</span>
                  <span class="country-code">+7</span>
                </div>
                <div class="country-item" data-code="+254" data-flag="🇰🇪" data-country="Kenya">
                  <span class="country-flag">🇰🇪</span>
                  <span class="country-name">Kenya</span>
                  <span class="country-code">+254</span>
                </div>
                <div class="country-item" data-code="+965" data-flag="🇰🇼" data-country="Kuwait">
                  <span class="country-flag">🇰🇼</span>
                  <span class="country-name">Kuwait</span>
                  <span class="country-code">+965</span>
                </div>
                <div class="country-item" data-code="+996" data-flag="🇰🇬" data-country="Kyrgyzstan">
                  <span class="country-flag">🇰🇬</span>
                  <span class="country-name">Kyrgyzstan</span>
                  <span class="country-code">+996</span>
                </div>
                <div class="country-item" data-code="+371" data-flag="🇱🇻" data-country="Latvia">
                  <span class="country-flag">🇱🇻</span>
                  <span class="country-name">Latvia</span>
                  <span class="country-code">+371</span>
                </div>
                <div class="country-item" data-code="+961" data-flag="🇱🇧" data-country="Lebanon">
                  <span class="country-flag">🇱🇧</span>
                  <span class="country-name">Lebanon</span>
                  <span class="country-code">+961</span>
                </div>
                <div class="country-item" data-code="+218" data-flag="🇱🇾" data-country="Libya">
                  <span class="country-flag">🇱🇾</span>
                  <span class="country-name">Libya</span>
                  <span class="country-code">+218</span>
                </div>
                <div class="country-item" data-code="+370" data-flag="🇱🇹" data-country="Lithuania">
                  <span class="country-flag">🇱🇹</span>
                  <span class="country-name">Lithuania</span>
                  <span class="country-code">+370</span>
                </div>
                <div class="country-item" data-code="+352" data-flag="🇱🇺" data-country="Luxembourg">
                  <span class="country-flag">🇱🇺</span>
                  <span class="country-name">Luxembourg</span>
                  <span class="country-code">+352</span>
                </div>
                <div class="country-item" data-code="+60" data-flag="🇲🇾" data-country="Malaysia">
                  <span class="country-flag">🇲🇾</span>
                  <span class="country-name">Malaysia</span>
                  <span class="country-code">+60</span>
                </div>
                <div class="country-item" data-code="+960" data-flag="🇲🇻" data-country="Maldives">
                  <span class="country-flag">🇲🇻</span>
                  <span class="country-name">Maldives</span>
                  <span class="country-code">+960</span>
                </div>
                <div class="country-item" data-code="+356" data-flag="🇲🇹" data-country="Malta">
                  <span class="country-flag">🇲🇹</span>
                  <span class="country-name">Malta</span>
                  <span class="country-code">+356</span>
                </div>
                <div class="country-item" data-code="+52" data-flag="🇲🇽" data-country="Mexico">
                  <span class="country-flag">🇲🇽</span>
                  <span class="country-name">Mexico</span>
                  <span class="country-code">+52</span>
                </div>
                <div class="country-item" data-code="+373" data-flag="🇲🇩" data-country="Moldova">
                  <span class="country-flag">🇲🇩</span>
                  <span class="country-name">Moldova</span>
                  <span class="country-code">+373</span>
                </div>
                <div class="country-item" data-code="+377" data-flag="🇲🇨" data-country="Monaco">
                  <span class="country-flag">🇲🇨</span>
                  <span class="country-name">Monaco</span>
                  <span class="country-code">+377</span>
                </div>
                <div class="country-item" data-code="+976" data-flag="🇲🇳" data-country="Mongolia">
                  <span class="country-flag">🇲🇳</span>
                  <span class="country-name">Mongolia</span>
                  <span class="country-code">+976</span>
                </div>
                <div class="country-item" data-code="+382" data-flag="🇲🇪" data-country="Montenegro">
                  <span class="country-flag">🇲🇪</span>
                  <span class="country-name">Montenegro</span>
                  <span class="country-code">+382</span>
                </div>
                <div class="country-item" data-code="+212" data-flag="🇲🇦" data-country="Morocco">
                  <span class="country-flag">🇲🇦</span>
                  <span class="country-name">Morocco</span>
                  <span class="country-code">+212</span>
                </div>
                <div class="country-item" data-code="+95" data-flag="🇲🇲" data-country="Myanmar">
                  <span class="country-flag">🇲🇲</span>
                  <span class="country-name">Myanmar</span>
                  <span class="country-code">+95</span>
                </div>
                <div class="country-item" data-code="+977" data-flag="🇳🇵" data-country="Nepal">
                  <span class="country-flag">🇳🇵</span>
                  <span class="country-name">Nepal</span>
                  <span class="country-code">+977</span>
                </div>
                <div class="country-item" data-code="+31" data-flag="🇳🇱" data-country="Netherlands">
                  <span class="country-flag">🇳🇱</span>
                  <span class="country-name">Netherlands</span>
                  <span class="country-code">+31</span>
                </div>
                <div class="country-item" data-code="+64" data-flag="🇳🇿" data-country="New Zealand">
                  <span class="country-flag">🇳🇿</span>
                  <span class="country-name">New Zealand</span>
                  <span class="country-code">+64</span>
                </div>
                <div class="country-item" data-code="+234" data-flag="🇳🇬" data-country="Nigeria">
                  <span class="country-flag">🇳🇬</span>
                  <span class="country-name">Nigeria</span>
                  <span class="country-code">+234</span>
                </div>
                <div class="country-item" data-code="+850" data-flag="🇰🇵" data-country="North Korea">
                  <span class="country-flag">🇰🇵</span>
                  <span class="country-name">North Korea</span>
                  <span class="country-code">+850</span>
                </div>
                <div class="country-item" data-code="+389" data-flag="🇲🇰" data-country="North Macedonia">
                  <span class="country-flag">🇲🇰</span>
                  <span class="country-name">North Macedonia</span>
                  <span class="country-code">+389</span>
                </div>
                <div class="country-item" data-code="+47" data-flag="🇳🇴" data-country="Norway">
                  <span class="country-flag">🇳🇴</span>
                  <span class="country-name">Norway</span>
                  <span class="country-code">+47</span>
                </div>
                <div class="country-item" data-code="+968" data-flag="🇴🇲" data-country="Oman">
                  <span class="country-flag">🇴🇲</span>
                  <span class="country-name">Oman</span>
                  <span class="country-code">+968</span>
                </div>
                <div class="country-item" data-code="+92" data-flag="🇵🇰" data-country="Pakistan">
                  <span class="country-flag">🇵🇰</span>
                  <span class="country-name">Pakistan</span>
                  <span class="country-code">+92</span>
                </div>
                <div class="country-item" data-code="+970" data-flag="🇵🇸" data-country="Palestine">
                  <span class="country-flag">🇵🇸</span>
                  <span class="country-name">Palestine</span>
                  <span class="country-code">+970</span>
                </div>
                <div class="country-item" data-code="+507" data-flag="🇵🇦" data-country="Panama">
                  <span class="country-flag">🇵🇦</span>
                  <span class="country-name">Panama</span>
                  <span class="country-code">+507</span>
                </div>
                <div class="country-item" data-code="+595" data-flag="🇵🇾" data-country="Paraguay">
                  <span class="country-flag">🇵🇾</span>
                  <span class="country-name">Paraguay</span>
                  <span class="country-code">+595</span>
                </div>
                <div class="country-item" data-code="+51" data-flag="🇵🇪" data-country="Peru">
                  <span class="country-flag">🇵🇪</span>
                  <span class="country-name">Peru</span>
                  <span class="country-code">+51</span>
                </div>
                <div class="country-item" data-code="+63" data-flag="🇵🇭" data-country="Philippines">
                  <span class="country-flag">🇵🇭</span>
                  <span class="country-name">Philippines</span>
                  <span class="country-code">+63</span>
                </div>
                <div class="country-item" data-code="+48" data-flag="🇵🇱" data-country="Poland">
                  <span class="country-flag">🇵🇱</span>
                  <span class="country-name">Poland</span>
                  <span class="country-code">+48</span>
                </div>
                <div class="country-item" data-code="+351" data-flag="🇵🇹" data-country="Portugal">
                  <span class="country-flag">🇵🇹</span>
                  <span class="country-name">Portugal</span>
                  <span class="country-code">+351</span>
                </div>
                <div class="country-item" data-code="+974" data-flag="🇶🇦" data-country="Qatar">
                  <span class="country-flag">🇶🇦</span>
                  <span class="country-name">Qatar</span>
                  <span class="country-code">+974</span>
                </div>
                <div class="country-item" data-code="+40" data-flag="🇷🇴" data-country="Romania">
                  <span class="country-flag">🇷🇴</span>
                  <span class="country-name">Romania</span>
                  <span class="country-code">+40</span>
                </div>
                <div class="country-item" data-code="+7" data-flag="🇷🇺" data-country="Russia">
                  <span class="country-flag">🇷🇺</span>
                  <span class="country-name">Russia</span>
                  <span class="country-code">+7</span>
                </div>
                <div class="country-item" data-code="+966" data-flag="🇸🇦" data-country="Saudi Arabia">
                  <span class="country-flag">🇸🇦</span>
                  <span class="country-name">Saudi Arabia</span>
                  <span class="country-code">+966</span>
                </div>
                <div class="country-item" data-code="+221" data-flag="🇸🇳" data-country="Senegal">
                  <span class="country-flag">🇸🇳</span>
                  <span class="country-name">Senegal</span>
                  <span class="country-code">+221</span>
                </div>
                <div class="country-item" data-code="+381" data-flag="🇷🇸" data-country="Serbia">
                  <span class="country-flag">🇷🇸</span>
                  <span class="country-name">Serbia</span>
                  <span class="country-code">+381</span>
                </div>
                <div class="country-item" data-code="+65" data-flag="🇸🇬" data-country="Singapore">
                  <span class="country-flag">🇸🇬</span>
                  <span class="country-name">Singapore</span>
                  <span class="country-code">+65</span>
                </div>
                <div class="country-item" data-code="+421" data-flag="🇸🇰" data-country="Slovakia">
                  <span class="country-flag">🇸🇰</span>
                  <span class="country-name">Slovakia</span>
                  <span class="country-code">+421</span>
                </div>
                <div class="country-item" data-code="+386" data-flag="🇸🇮" data-country="Slovenia">
                  <span class="country-flag">🇸🇮</span>
                  <span class="country-name">Slovenia</span>
                  <span class="country-code">+386</span>
                </div>
                <div class="country-item" data-code="+27" data-flag="🇿🇦" data-country="South Africa">
                  <span class="country-flag">🇿🇦</span>
                  <span class="country-name">South Africa</span>
                  <span class="country-code">+27</span>
                </div>
                <div class="country-item" data-code="+82" data-flag="🇰🇷" data-country="South Korea">
                  <span class="country-flag">🇰🇷</span>
                  <span class="country-name">South Korea</span>
                  <span class="country-code">+82</span>
                </div>
                <div class="country-item" data-code="+34" data-flag="🇪🇸" data-country="Spain">
                  <span class="country-flag">🇪🇸</span>
                  <span class="country-name">Spain</span>
                  <span class="country-code">+34</span>
                </div>
                <div class="country-item" data-code="+94" data-flag="🇱🇰" data-country="Sri Lanka">
                  <span class="country-flag">🇱🇰</span>
                  <span class="country-name">Sri Lanka</span>
                  <span class="country-code">+94</span>
                </div>
                <div class="country-item" data-code="+249" data-flag="🇸🇩" data-country="Sudan">
                  <span class="country-flag">🇸🇩</span>
                  <span class="country-name">Sudan</span>
                  <span class="country-code">+249</span>
                </div>
                <div class="country-item" data-code="+46" data-flag="🇸🇪" data-country="Sweden">
                  <span class="country-flag">🇸🇪</span>
                  <span class="country-name">Sweden</span>
                  <span class="country-code">+46</span>
                </div>
                <div class="country-item" data-code="+41" data-flag="🇨🇭" data-country="Switzerland">
                  <span class="country-flag">🇨🇭</span>
                  <span class="country-name">Switzerland</span>
                  <span class="country-code">+41</span>
                </div>
                <div class="country-item" data-code="+963" data-flag="🇸🇾" data-country="Syria">
                  <span class="country-flag">🇸🇾</span>
                  <span class="country-name">Syria</span>
                  <span class="country-code">+963</span>
                </div>
                <div class="country-item" data-code="+886" data-flag="🇹🇼" data-country="Taiwan">
                  <span class="country-flag">🇹🇼</span>
                  <span class="country-name">Taiwan</span>
                  <span class="country-code">+886</span>
                </div>
                <div class="country-item" data-code="+992" data-flag="🇹🇯" data-country="Tajikistan">
                  <span class="country-flag">🇹🇯</span>
                  <span class="country-name">Tajikistan</span>
                  <span class="country-code">+992</span>
                </div>
                <div class="country-item" data-code="+255" data-flag="🇹🇿" data-country="Tanzania">
                  <span class="country-flag">🇹🇿</span>
                  <span class="country-name">Tanzania</span>
                  <span class="country-code">+255</span>
                </div>
                <div class="country-item" data-code="+66" data-flag="🇹🇭" data-country="Thailand">
                  <span class="country-flag">🇹🇭</span>
                  <span class="country-name">Thailand</span>
                  <span class="country-code">+66</span>
                </div>
                <div class="country-item" data-code="+228" data-flag="🇹🇬" data-country="Togo">
                  <span class="country-flag">🇹🇬</span>
                  <span class="country-name">Togo</span>
                  <span class="country-code">+228</span>
                </div>
                <div class="country-item" data-code="+216" data-flag="🇹🇳" data-country="Tunisia">
                  <span class="country-flag">🇹🇳</span>
                  <span class="country-name">Tunisia</span>
                  <span class="country-code">+216</span>
                </div>
                <div class="country-item" data-code="+90" data-flag="🇹🇷" data-country="Turkey">
                  <span class="country-flag">🇹🇷</span>
                  <span class="country-name">Turkey</span>
                  <span class="country-code">+90</span>
                </div>
                <div class="country-item" data-code="+993" data-flag="🇹🇲" data-country="Turkmenistan">
                  <span class="country-flag">🇹🇲</span>
                  <span class="country-name">Turkmenistan</span>
                  <span class="country-code">+993</span>
                </div>
                <div class="country-item" data-code="+256" data-flag="🇺🇬" data-country="Uganda">
                  <span class="country-flag">🇺🇬</span>
                  <span class="country-name">Uganda</span>
                  <span class="country-code">+256</span>
                </div>
                <div class="country-item" data-code="+380" data-flag="🇺🇦" data-country="Ukraine">
                  <span class="country-flag">🇺🇦</span>
                  <span class="country-name">Ukraine</span>
                  <span class="country-code">+380</span>
                </div>
                <div class="country-item" data-code="+971" data-flag="🇦🇪" data-country="United Arab Emirates">
                  <span class="country-flag">🇦🇪</span>
                  <span class="country-name">United Arab Emirates</span>
                  <span class="country-code">+971</span>
                </div>
                <div class="country-item" data-code="+44" data-flag="🇬🇧" data-country="United Kingdom">
                  <span class="country-flag">🇬🇧</span>
                  <span class="country-name">United Kingdom</span>
                  <span class="country-code">+44</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇺🇸" data-country="United States">
                  <span class="country-flag">🇺🇸</span>
                  <span class="country-name">United States</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+598" data-flag="🇺🇾" data-country="Uruguay">
                  <span class="country-flag">🇺🇾</span>
                  <span class="country-name">Uruguay</span>
                  <span class="country-code">+598</span>
                </div>
                <div class="country-item" data-code="+998" data-flag="🇺🇿" data-country="Uzbekistan">
                  <span class="country-flag">🇺🇿</span>
                  <span class="country-name">Uzbekistan</span>
                  <span class="country-code">+998</span>
                </div>
                <div class="country-item" data-code="+58" data-flag="🇻🇪" data-country="Venezuela">
                  <span class="country-flag">🇻🇪</span>
                  <span class="country-name">Venezuela</span>
                  <span class="country-code">+58</span>
                </div>
                <div class="country-item" data-code="+84" data-flag="🇻🇳" data-country="Vietnam">
                  <span class="country-flag">🇻🇳</span>
                  <span class="country-name">Vietnam</span>
                  <span class="country-code">+84</span>
                </div>
                <div class="country-item" data-code="+967" data-flag="🇾🇪" data-country="Yemen">
                  <span class="country-flag">🇾🇪</span>
                  <span class="country-name">Yemen</span>
                  <span class="country-code">+967</span>
                </div>
                <div class="country-item" data-code="+260" data-flag="🇿🇲" data-country="Zambia">
                  <span class="country-flag">🇿🇲</span>
                  <span class="country-name">Zambia</span>
                  <span class="country-code">+260</span>
                </div>
                <div class="country-item" data-code="+263" data-flag="🇿🇼" data-country="Zimbabwe">
                  <span class="country-flag">🇿🇼</span>
                  <span class="country-name">Zimbabwe</span>
                  <span class="country-code">+263</span>
                </div>
              </div>
            </div>
          </div>

          <div class="auth-form-group">
            <label for="signup-password" class="auth-label">Password</label>
            <input type="password" id="signup-password" class="auth-input" placeholder="Enter Password" required>
          </div>

          <!-- <div class="auth-form-group">
            <label for="signup-confirm-password" class="auth-label">Confirm Password</label>
            <input type="password" id="signup-confirm-password" class="auth-input" placeholder="Confirm your password"
              required>
          </div> -->

          <label class="auth-checkbox auth-terms">
            <input type="checkbox" id="terms-agree" required>
            <span>I agree to the <a href="./files/Service_Agreement_Terms_&_Conditions_Amber_Rock_Trade_Ltd.pdf"
                target="_blank" class="auth-link">Terms of Service</a> and <a
                href="./files/Privacy_Policy_Amber_Rock_Trade_Ltd.pdf" target="_blank" class="auth-link">Privacy
                Policy</a></span>
          </label>

          <button type="submit" class="auth-submit-btn">Create Account</button>

          <div class="auth-divider">
            <span>or continue with</span>
          </div>

          <div class="auth-social">
            <button type="button" class="auth-social-btn">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                  fill="#4285F4" />
                <path
                  d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                  fill="#34A853" />
                <path
                  d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                  fill="#FBBC05" />
                <path
                  d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                  fill="#EA4335" />
              </svg>
              Google
            </button>
            <button type="button" class="auth-social-btn">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="#1877F2">
                <path
                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
              Facebook
            </button>
          </div>
        </form>
      </div>
    </div>