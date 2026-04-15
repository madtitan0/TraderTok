<?php
require_once __DIR__ . '/config/subdomain-config.php';

/** Used by assets/js/script.js for “existing user” qualification (direct POST, no PHP proxy). */
$tradersClubCfg = require __DIR__ . '/config/traders-club.php';
$tcQualUrl = (string) ($tradersClubCfg['qualification_url'] ?? '');
$tcQualToken = isset($tradersClubCfg['qualification_token']) && is_string($tradersClubCfg['qualification_token'])
    ? $tradersClubCfg['qualification_token'] : '';
$tcQualBearer = isset($tradersClubCfg['qualification_bearer_token']) && is_string($tradersClubCfg['qualification_bearer_token'])
    ? $tradersClubCfg['qualification_bearer_token'] : '';
$tcQualPostUrl = '';
if ($tcQualUrl !== '') {
    if ($tcQualToken !== '') {
        $tcSep = strpos($tcQualUrl, '?') !== false ? '&' : '?';
        $tcQualPostUrl = $tcQualUrl . $tcSep . 'token=' . rawurlencode($tcQualToken);
    } else {
        $tcQualPostUrl = $tcQualUrl;
    }
}

function assetStylesheetTag($path)
{
    if (!file_exists($path)) {
        return '';
    }

    return '<link rel="stylesheet" href="' . $path . '?v=' . filemtime($path) . '">';
}

function routeUrl($pageName, array $params = [])
{
    $query = array_merge(['page' => $pageName], $params);
    return './?' . http_build_query($query);
}

/** Current request origin (scheme + host) for absolute OG/Twitter image URLs. */
function tt_site_origin(): string
{
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (isset($_SERVER['SERVER_PORT']) && (string) $_SERVER['SERVER_PORT'] === '443')
        || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower((string) $_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https')
        || (isset($_SERVER['HTTP_X_FORWARDED_SSL']) && (string) $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on');
    $host = isset($_SERVER['HTTP_HOST']) ? (string) $_SERVER['HTTP_HOST'] : 'localhost';

    return ($https ? 'https' : 'http') . '://' . $host;
}

$ttOrigin = tt_site_origin();
$ttRequestUri = isset($_SERVER['REQUEST_URI']) ? (string) $_SERVER['REQUEST_URI'] : '/';
$ttOgUrl = $ttOrigin . $ttRequestUri;
$ttOgImageUrl = $ttOrigin . '/og-image.jpg';
$ttTwitterImageUrl = $ttOrigin . '/twitter-image.jpg';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>window.subdomainData = <?php echo $subdomainJS; ?>;</script>
    <script>
    window.TRADERS_CLUB_QUALIFICATION = <?php echo json_encode(
        [
            'postUrl' => $tcQualPostUrl,
            'configured' => ($tcQualPostUrl !== '' && ($tcQualToken !== '' || $tcQualBearer !== '')),
            'bearer' => $tcQualBearer,
        ],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
    ); ?>;
    </script>
    <?php if (!empty($tradertok_extra_geo_main_hosts) && is_array($tradertok_extra_geo_main_hosts)) : ?>
    <script>
    window.TRADERTOK_MAIN_DOMAINS = <?php echo json_encode(array_values($tradertok_extra_geo_main_hosts)); ?>;
    </script>
    <?php endif; ?>

    <!-- Subdomain map must load before region-redirect.js -->
    <script
      src="assets/js/tradertok-subdomain-config.js?v=<?php echo filemtime('assets/js/tradertok-subdomain-config.js'); ?>">
    </script>
    <script src="assets/js/region-redirect.js?v=<?php echo filemtime('assets/js/region-redirect.js'); ?>"></script>

    <!-- Google Tag Manager -->
    <?php include 'gtm-head-code.php'; ?>
    <!-- End Google Tag Manager -->

    <title><?php echo htmlspecialchars((string) $get->title, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="title" content="<?php echo htmlspecialchars((string) $get->title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="description" content="<?php echo htmlspecialchars((string) $get->desc, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars((string) $get->keyw, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="author" content="<?php echo htmlspecialchars((string) $get->brand_name, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="theme-color" content="#d02c2d">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($ttOgUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars((string) $get->title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars((string) $get->desc, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ttOgImageUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars((string) $get->brand_name, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo htmlspecialchars($ttOgUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars((string) $get->title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars((string) $get->desc, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ttTwitterImageUrl, ENT_QUOTES, 'UTF-8'); ?>">

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

    <link rel="icon" href="<?php echo htmlspecialchars((string) $get->assets_url . '/' . (string) $get->favicon, ENT_QUOTES, 'UTF-8'); ?>" />
    <?php echo (isset($theme) && is_object($theme) && isset($theme->css_files)) ? $theme->css_files : ''; ?>

    <?php
    $sharedStylesheets = [
        'assets/css/design-tokens.css',
        'assets/css/education-hub.css',
        'assets/css/education-article.css',
        'assets/css/about-styles.css',
        'assets/css/education-about-alignment.css',
        'assets/css/styles.css',
        'assets/css/team-styles.css',
        'assets/css/instruments-styles.css',
        'assets/css/offers-promotions-styles.css',
        'assets/css/market-ticker.css',
        'assets/css/whatsapp-widget.css',
        'assets/css/education-styles.css',
    ];

    foreach ($sharedStylesheets as $stylesheet) {
        echo assetStylesheetTag($stylesheet);
    }
    ?>

    <?php include __DIR__ . '/partials/site-heading-accent-swap.php'; ?>

    <?php echo $get->head_code; ?>
  </head>

  <body class="<?php echo !$page ? 'page-home' : 'page-inner'; ?>">
    <!-- Google Tag Manager (noscript) -->
    <?php include 'gtm-body-code.php'; ?>
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
            <img src="<?php echo $get->assets_url.'/'.$get->logo; ?>" alt="<?php echo $get->brand_name; ?>"
              class="logo-image">
          </a>

          <!-- Navigation -->
          <nav class="nav" id="main-navigation" aria-label="Main navigation">
            <?php include __DIR__ . '/partials/main-nav-list.php'; ?>

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
                  <button class="mobile-language-item" data-lang="th" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇹🇭</span>
                    <span class="mobile-language-name" data-i18n="language.thai">ไทย</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="vn" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇻🇳</span>
                    <span class="mobile-language-name" data-i18n="language.vietnamese">Tiếng Việt</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="my" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇲🇾</span>
                    <span class="mobile-language-name" data-i18n="language.malay">Bahasa Melayu</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="id" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇮🇩</span>
                    <span class="mobile-language-name" data-i18n="language.indonesian">Bahasa Indonesia</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="ph" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇵🇭</span>
                    <span class="mobile-language-name" data-i18n="language.tagalog">Tagalog</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="pk" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇵🇰</span>
                    <span class="mobile-language-name" data-i18n="language.urdu">اردو</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="th" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇹🇭</span>
                    <span class="mobile-language-name" data-i18n="language.thai">ไทย</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="vn" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇻🇳</span>
                    <span class="mobile-language-name" data-i18n="language.vietnamese">Tiếng Việt</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="my" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇲🇾</span>
                    <span class="mobile-language-name" data-i18n="language.malay">Bahasa Melayu</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="id" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇮🇩</span>
                    <span class="mobile-language-name" data-i18n="language.indonesian">Bahasa Indonesia</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="ph" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇵🇭</span>
                    <span class="mobile-language-name" data-i18n="language.tagalog">Tagalog</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>
                  <button class="mobile-language-item" data-lang="pk" style="display: none;">
                    <span class="language-flag" style="font-size: 1.25rem;">🇵🇰</span>
                    <span class="mobile-language-name" data-i18n="language.urdu">اردو</span>
                    <svg class="mobile-language-check" width="18" height="18" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                  </button>

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
                <div class="language-item" data-lang="th" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇹🇭</span>
                  <span class="language-name" data-i18n="language.thai">ไทย</span>
                </div>
                <div class="language-item" data-lang="vn" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇻🇳</span>
                  <span class="language-name" data-i18n="language.vietnamese">Tiếng Việt</span>
                </div>
                <div class="language-item" data-lang="my" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇲🇾</span>
                  <span class="language-name" data-i18n="language.malay">Bahasa Melayu</span>
                </div>
                <div class="language-item" data-lang="id" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇮🇩</span>
                  <span class="language-name" data-i18n="language.indonesian">Bahasa Indonesia</span>
                </div>
                <div class="language-item" data-lang="ph" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇵🇭</span>
                  <span class="language-name" data-i18n="language.tagalog">Tagalog</span>
                </div>
                <div class="language-item" data-lang="pk" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇵🇰</span>
                  <span class="language-name" data-i18n="language.urdu">اردو</span>
                </div>
                <div class="language-item" data-lang="th" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇹🇭</span>
                  <span class="language-name" data-i18n="language.thai">ไทย</span>
                </div>
                <div class="language-item" data-lang="vn" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇻🇳</span>
                  <span class="language-name" data-i18n="language.vietnamese">Tiếng Việt</span>
                </div>
                <div class="language-item" data-lang="my" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇲🇾</span>
                  <span class="language-name" data-i18n="language.malay">Bahasa Melayu</span>
                </div>
                <div class="language-item" data-lang="id" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇮🇩</span>
                  <span class="language-name" data-i18n="language.indonesian">Bahasa Indonesia</span>
                </div>
                <div class="language-item" data-lang="ph" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇵🇭</span>
                  <span class="language-name" data-i18n="language.tagalog">Tagalog</span>
                </div>
                <div class="language-item" data-lang="pk" style="display: none;">
                  <span class="language-flag" style="font-size: 1.25rem;">🇵🇰</span>
                  <span class="language-name" data-i18n="language.urdu">اردو</span>
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
          <img src="<?php echo $get->assets_url.'/'.$get->logo; ?>" alt="TraderTok" class="auth-logo-image">
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
                <div class="country-item" data-code="+1" data-flag="🇦🇸" data-country="American Samoa">
                  <span class="country-flag">🇦🇸</span>
                  <span class="country-name">American Samoa</span>
                  <span class="country-code">+1</span>
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
                <div class="country-item" data-code="+1" data-flag="🇦🇮" data-country="Anguilla">
                  <span class="country-flag">🇦🇮</span>
                  <span class="country-name">Anguilla</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇦🇬" data-country="Antigua and Barbuda">
                  <span class="country-flag">🇦🇬</span>
                  <span class="country-name">Antigua and Barbuda</span>
                  <span class="country-code">+1</span>
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
                <div class="country-item" data-code="+297" data-flag="🇦🇼" data-country="Aruba">
                  <span class="country-flag">🇦🇼</span>
                  <span class="country-name">Aruba</span>
                  <span class="country-code">+297</span>
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
                <div class="country-item" data-code="+1" data-flag="🇧🇸" data-country="Bahamas">
                  <span class="country-flag">🇧🇸</span>
                  <span class="country-name">Bahamas</span>
                  <span class="country-code">+1</span>
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
                <div class="country-item" data-code="+1" data-flag="🇧🇧" data-country="Barbados">
                  <span class="country-flag">🇧🇧</span>
                  <span class="country-name">Barbados</span>
                  <span class="country-code">+1</span>
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
                <div class="country-item" data-code="+501" data-flag="🇧🇿" data-country="Belize">
                  <span class="country-flag">🇧🇿</span>
                  <span class="country-name">Belize</span>
                  <span class="country-code">+501</span>
                </div>
                <div class="country-item" data-code="+229" data-flag="🇧🇯" data-country="Benin">
                  <span class="country-flag">🇧🇯</span>
                  <span class="country-name">Benin</span>
                  <span class="country-code">+229</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇧🇲" data-country="Bermuda">
                  <span class="country-flag">🇧🇲</span>
                  <span class="country-name">Bermuda</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+975" data-flag="🇧🇹" data-country="Bhutan">
                  <span class="country-flag">🇧🇹</span>
                  <span class="country-name">Bhutan</span>
                  <span class="country-code">+975</span>
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
                <div class="country-item" data-code="+267" data-flag="🇧🇼" data-country="Botswana">
                  <span class="country-flag">🇧🇼</span>
                  <span class="country-name">Botswana</span>
                  <span class="country-code">+267</span>
                </div>
                <div class="country-item" data-code="+47" data-flag="🇧🇻" data-country="Bouvet Island">
                  <span class="country-flag">🇧🇻</span>
                  <span class="country-name">Bouvet Island</span>
                  <span class="country-code">+47</span>
                </div>
                <div class="country-item" data-code="+55" data-flag="🇧🇷" data-country="Brazil">
                  <span class="country-flag">🇧🇷</span>
                  <span class="country-name">Brazil</span>
                  <span class="country-code">+55</span>
                </div>
                <div class="country-item" data-code="+246" data-flag="🇮🇴" data-country="British Indian Ocean Territory">
                  <span class="country-flag">🇮🇴</span>
                  <span class="country-name">British Indian Ocean Territory</span>
                  <span class="country-code">+246</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇻🇬" data-country="British Virgin Islands">
                  <span class="country-flag">🇻🇬</span>
                  <span class="country-name">British Virgin Islands</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+673" data-flag="🇧🇳" data-country="Brunei">
                  <span class="country-flag">🇧🇳</span>
                  <span class="country-name">Brunei</span>
                  <span class="country-code">+673</span>
                </div>
                <div class="country-item" data-code="+359" data-flag="🇧🇬" data-country="Bulgaria">
                  <span class="country-flag">🇧🇬</span>
                  <span class="country-name">Bulgaria</span>
                  <span class="country-code">+359</span>
                </div>
                <div class="country-item" data-code="+226" data-flag="🇧🇫" data-country="Burkina Faso">
                  <span class="country-flag">🇧🇫</span>
                  <span class="country-name">Burkina Faso</span>
                  <span class="country-code">+226</span>
                </div>
                <div class="country-item" data-code="+257" data-flag="🇧🇮" data-country="Burundi">
                  <span class="country-flag">🇧🇮</span>
                  <span class="country-name">Burundi</span>
                  <span class="country-code">+257</span>
                </div>
                <div class="country-item" data-code="+855" data-flag="🇰🇭" data-country="Cambodia">
                  <span class="country-flag">🇰🇭</span>
                  <span class="country-name">Cambodia</span>
                  <span class="country-code">+855</span>
                </div>
                <div class="country-item" data-code="+237" data-flag="🇨🇲" data-country="Cameroon">
                  <span class="country-flag">🇨🇲</span>
                  <span class="country-name">Cameroon</span>
                  <span class="country-code">+237</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇨🇦" data-country="Canada">
                  <span class="country-flag">🇨🇦</span>
                  <span class="country-name">Canada</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+238" data-flag="🇨🇻" data-country="Cape Verde">
                  <span class="country-flag">🇨🇻</span>
                  <span class="country-name">Cape Verde</span>
                  <span class="country-code">+238</span>
                </div>
                <div class="country-item" data-code="+599" data-flag="🇧🇶" data-country="Caribbean Netherlands">
                  <span class="country-flag">🇧🇶</span>
                  <span class="country-name">Caribbean Netherlands</span>
                  <span class="country-code">+599</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇰🇾" data-country="Cayman Islands">
                  <span class="country-flag">🇰🇾</span>
                  <span class="country-name">Cayman Islands</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+236" data-flag="🇨🇫" data-country="Central African Republic">
                  <span class="country-flag">🇨🇫</span>
                  <span class="country-name">Central African Republic</span>
                  <span class="country-code">+236</span>
                </div>
                <div class="country-item" data-code="+235" data-flag="🇹🇩" data-country="Chad">
                  <span class="country-flag">🇹🇩</span>
                  <span class="country-name">Chad</span>
                  <span class="country-code">+235</span>
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
                <div class="country-item" data-code="+61" data-flag="🇨🇽" data-country="Christmas Island">
                  <span class="country-flag">🇨🇽</span>
                  <span class="country-name">Christmas Island</span>
                  <span class="country-code">+61</span>
                </div>
                <div class="country-item" data-code="+61" data-flag="🇨🇨" data-country="Cocos (Keeling) Islands">
                  <span class="country-flag">🇨🇨</span>
                  <span class="country-name">Cocos (Keeling) Islands</span>
                  <span class="country-code">+61</span>
                </div>
                <div class="country-item" data-code="+57" data-flag="🇨🇴" data-country="Colombia">
                  <span class="country-flag">🇨🇴</span>
                  <span class="country-name">Colombia</span>
                  <span class="country-code">+57</span>
                </div>
                <div class="country-item" data-code="+269" data-flag="🇰🇲" data-country="Comoros">
                  <span class="country-flag">🇰🇲</span>
                  <span class="country-name">Comoros</span>
                  <span class="country-code">+269</span>
                </div>
                <div class="country-item" data-code="+682" data-flag="🇨🇰" data-country="Cook Islands">
                  <span class="country-flag">🇨🇰</span>
                  <span class="country-name">Cook Islands</span>
                  <span class="country-code">+682</span>
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
                <div class="country-item" data-code="+53" data-flag="🇨🇺" data-country="Cuba">
                  <span class="country-flag">🇨🇺</span>
                  <span class="country-name">Cuba</span>
                  <span class="country-code">+53</span>
                </div>
                <div class="country-item" data-code="+599" data-flag="🇨🇼" data-country="Curaçao">
                  <span class="country-flag">🇨🇼</span>
                  <span class="country-name">Curaçao</span>
                  <span class="country-code">+599</span>
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
                <div class="country-item" data-code="+253" data-flag="🇩🇯" data-country="Djibouti">
                  <span class="country-flag">🇩🇯</span>
                  <span class="country-name">Djibouti</span>
                  <span class="country-code">+253</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇩🇲" data-country="Dominica">
                  <span class="country-flag">🇩🇲</span>
                  <span class="country-name">Dominica</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇩🇴" data-country="Dominican Republic">
                  <span class="country-flag">🇩🇴</span>
                  <span class="country-name">Dominican Republic</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+243" data-flag="🇨🇩" data-country="DR Congo">
                  <span class="country-flag">🇨🇩</span>
                  <span class="country-name">DR Congo</span>
                  <span class="country-code">+243</span>
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
                <div class="country-item" data-code="+503" data-flag="🇸🇻" data-country="El Salvador">
                  <span class="country-flag">🇸🇻</span>
                  <span class="country-name">El Salvador</span>
                  <span class="country-code">+503</span>
                </div>
                <div class="country-item" data-code="+240" data-flag="🇬🇶" data-country="Equatorial Guinea">
                  <span class="country-flag">🇬🇶</span>
                  <span class="country-name">Equatorial Guinea</span>
                  <span class="country-code">+240</span>
                </div>
                <div class="country-item" data-code="+291" data-flag="🇪🇷" data-country="Eritrea">
                  <span class="country-flag">🇪🇷</span>
                  <span class="country-name">Eritrea</span>
                  <span class="country-code">+291</span>
                </div>
                <div class="country-item" data-code="+372" data-flag="🇪🇪" data-country="Estonia">
                  <span class="country-flag">🇪🇪</span>
                  <span class="country-name">Estonia</span>
                  <span class="country-code">+372</span>
                </div>
                <div class="country-item" data-code="+268" data-flag="🇸🇿" data-country="Eswatini">
                  <span class="country-flag">🇸🇿</span>
                  <span class="country-name">Eswatini</span>
                  <span class="country-code">+268</span>
                </div>
                <div class="country-item" data-code="+251" data-flag="🇪🇹" data-country="Ethiopia">
                  <span class="country-flag">🇪🇹</span>
                  <span class="country-name">Ethiopia</span>
                  <span class="country-code">+251</span>
                </div>
                <div class="country-item" data-code="+500" data-flag="🇫🇰" data-country="Falkland Islands">
                  <span class="country-flag">🇫🇰</span>
                  <span class="country-name">Falkland Islands</span>
                  <span class="country-code">+500</span>
                </div>
                <div class="country-item" data-code="+298" data-flag="🇫🇴" data-country="Faroe Islands">
                  <span class="country-flag">🇫🇴</span>
                  <span class="country-name">Faroe Islands</span>
                  <span class="country-code">+298</span>
                </div>
                <div class="country-item" data-code="+679" data-flag="🇫🇯" data-country="Fiji">
                  <span class="country-flag">🇫🇯</span>
                  <span class="country-name">Fiji</span>
                  <span class="country-code">+679</span>
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
                <div class="country-item" data-code="+594" data-flag="🇬🇫" data-country="French Guiana">
                  <span class="country-flag">🇬🇫</span>
                  <span class="country-name">French Guiana</span>
                  <span class="country-code">+594</span>
                </div>
                <div class="country-item" data-code="+689" data-flag="🇵🇫" data-country="French Polynesia">
                  <span class="country-flag">🇵🇫</span>
                  <span class="country-name">French Polynesia</span>
                  <span class="country-code">+689</span>
                </div>
                <div class="country-item" data-code="+262" data-flag="🇹🇫" data-country="French Southern and Antarctic Lands">
                  <span class="country-flag">🇹🇫</span>
                  <span class="country-name">French Southern and Antarctic Lands</span>
                  <span class="country-code">+262</span>
                </div>
                <div class="country-item" data-code="+241" data-flag="🇬🇦" data-country="Gabon">
                  <span class="country-flag">🇬🇦</span>
                  <span class="country-name">Gabon</span>
                  <span class="country-code">+241</span>
                </div>
                <div class="country-item" data-code="+220" data-flag="🇬🇲" data-country="Gambia">
                  <span class="country-flag">🇬🇲</span>
                  <span class="country-name">Gambia</span>
                  <span class="country-code">+220</span>
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
                <div class="country-item" data-code="+233" data-flag="🇬🇭" data-country="Ghana">
                  <span class="country-flag">🇬🇭</span>
                  <span class="country-name">Ghana</span>
                  <span class="country-code">+233</span>
                </div>
                <div class="country-item" data-code="+350" data-flag="🇬🇮" data-country="Gibraltar">
                  <span class="country-flag">🇬🇮</span>
                  <span class="country-name">Gibraltar</span>
                  <span class="country-code">+350</span>
                </div>
                <div class="country-item" data-code="+30" data-flag="🇬🇷" data-country="Greece">
                  <span class="country-flag">🇬🇷</span>
                  <span class="country-name">Greece</span>
                  <span class="country-code">+30</span>
                </div>
                <div class="country-item" data-code="+299" data-flag="🇬🇱" data-country="Greenland">
                  <span class="country-flag">🇬🇱</span>
                  <span class="country-name">Greenland</span>
                  <span class="country-code">+299</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇬🇩" data-country="Grenada">
                  <span class="country-flag">🇬🇩</span>
                  <span class="country-name">Grenada</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+590" data-flag="🇬🇵" data-country="Guadeloupe">
                  <span class="country-flag">🇬🇵</span>
                  <span class="country-name">Guadeloupe</span>
                  <span class="country-code">+590</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇬🇺" data-country="Guam">
                  <span class="country-flag">🇬🇺</span>
                  <span class="country-name">Guam</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+502" data-flag="🇬🇹" data-country="Guatemala">
                  <span class="country-flag">🇬🇹</span>
                  <span class="country-name">Guatemala</span>
                  <span class="country-code">+502</span>
                </div>
                <div class="country-item" data-code="+44" data-flag="🇬🇬" data-country="Guernsey">
                  <span class="country-flag">🇬🇬</span>
                  <span class="country-name">Guernsey</span>
                  <span class="country-code">+44</span>
                </div>
                <div class="country-item" data-code="+224" data-flag="🇬🇳" data-country="Guinea">
                  <span class="country-flag">🇬🇳</span>
                  <span class="country-name">Guinea</span>
                  <span class="country-code">+224</span>
                </div>
                <div class="country-item" data-code="+245" data-flag="🇬🇼" data-country="Guinea-Bissau">
                  <span class="country-flag">🇬🇼</span>
                  <span class="country-name">Guinea-Bissau</span>
                  <span class="country-code">+245</span>
                </div>
                <div class="country-item" data-code="+592" data-flag="🇬🇾" data-country="Guyana">
                  <span class="country-flag">🇬🇾</span>
                  <span class="country-name">Guyana</span>
                  <span class="country-code">+592</span>
                </div>
                <div class="country-item" data-code="+509" data-flag="🇭🇹" data-country="Haiti">
                  <span class="country-flag">🇭🇹</span>
                  <span class="country-name">Haiti</span>
                  <span class="country-code">+509</span>
                </div>
                <div class="country-item" data-code="+504" data-flag="🇭🇳" data-country="Honduras">
                  <span class="country-flag">🇭🇳</span>
                  <span class="country-name">Honduras</span>
                  <span class="country-code">+504</span>
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
                <div class="country-item" data-code="+44" data-flag="🇮🇲" data-country="Isle of Man">
                  <span class="country-flag">🇮🇲</span>
                  <span class="country-name">Isle of Man</span>
                  <span class="country-code">+44</span>
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
                <div class="country-item" data-code="+225" data-flag="🇨🇮" data-country="Ivory Coast">
                  <span class="country-flag">🇨🇮</span>
                  <span class="country-name">Ivory Coast</span>
                  <span class="country-code">+225</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇯🇲" data-country="Jamaica">
                  <span class="country-flag">🇯🇲</span>
                  <span class="country-name">Jamaica</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+81" data-flag="🇯🇵" data-country="Japan">
                  <span class="country-flag">🇯🇵</span>
                  <span class="country-name">Japan</span>
                  <span class="country-code">+81</span>
                </div>
                <div class="country-item" data-code="+44" data-flag="🇯🇪" data-country="Jersey">
                  <span class="country-flag">🇯🇪</span>
                  <span class="country-name">Jersey</span>
                  <span class="country-code">+44</span>
                </div>
                <div class="country-item" data-code="+962" data-flag="🇯🇴" data-country="Jordan">
                  <span class="country-flag">🇯🇴</span>
                  <span class="country-name">Jordan</span>
                  <span class="country-code">+962</span>
                </div>
                <div class="country-item" data-code="+76" data-flag="🇰🇿" data-country="Kazakhstan">
                  <span class="country-flag">🇰🇿</span>
                  <span class="country-name">Kazakhstan</span>
                  <span class="country-code">+76</span>
                </div>
                <div class="country-item" data-code="+254" data-flag="🇰🇪" data-country="Kenya">
                  <span class="country-flag">🇰🇪</span>
                  <span class="country-name">Kenya</span>
                  <span class="country-code">+254</span>
                </div>
                <div class="country-item" data-code="+686" data-flag="🇰🇮" data-country="Kiribati">
                  <span class="country-flag">🇰🇮</span>
                  <span class="country-name">Kiribati</span>
                  <span class="country-code">+686</span>
                </div>
                <div class="country-item" data-code="+383" data-flag="🇽🇰" data-country="Kosovo">
                  <span class="country-flag">🇽🇰</span>
                  <span class="country-name">Kosovo</span>
                  <span class="country-code">+383</span>
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
                <div class="country-item" data-code="+856" data-flag="🇱🇦" data-country="Laos">
                  <span class="country-flag">🇱🇦</span>
                  <span class="country-name">Laos</span>
                  <span class="country-code">+856</span>
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
                <div class="country-item" data-code="+266" data-flag="🇱🇸" data-country="Lesotho">
                  <span class="country-flag">🇱🇸</span>
                  <span class="country-name">Lesotho</span>
                  <span class="country-code">+266</span>
                </div>
                <div class="country-item" data-code="+231" data-flag="🇱🇷" data-country="Liberia">
                  <span class="country-flag">🇱🇷</span>
                  <span class="country-name">Liberia</span>
                  <span class="country-code">+231</span>
                </div>
                <div class="country-item" data-code="+218" data-flag="🇱🇾" data-country="Libya">
                  <span class="country-flag">🇱🇾</span>
                  <span class="country-name">Libya</span>
                  <span class="country-code">+218</span>
                </div>
                <div class="country-item" data-code="+423" data-flag="🇱🇮" data-country="Liechtenstein">
                  <span class="country-flag">🇱🇮</span>
                  <span class="country-name">Liechtenstein</span>
                  <span class="country-code">+423</span>
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
                <div class="country-item" data-code="+853" data-flag="🇲🇴" data-country="Macau">
                  <span class="country-flag">🇲🇴</span>
                  <span class="country-name">Macau</span>
                  <span class="country-code">+853</span>
                </div>
                <div class="country-item" data-code="+261" data-flag="🇲🇬" data-country="Madagascar">
                  <span class="country-flag">🇲🇬</span>
                  <span class="country-name">Madagascar</span>
                  <span class="country-code">+261</span>
                </div>
                <div class="country-item" data-code="+265" data-flag="🇲🇼" data-country="Malawi">
                  <span class="country-flag">🇲🇼</span>
                  <span class="country-name">Malawi</span>
                  <span class="country-code">+265</span>
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
                <div class="country-item" data-code="+223" data-flag="🇲🇱" data-country="Mali">
                  <span class="country-flag">🇲🇱</span>
                  <span class="country-name">Mali</span>
                  <span class="country-code">+223</span>
                </div>
                <div class="country-item" data-code="+356" data-flag="🇲🇹" data-country="Malta">
                  <span class="country-flag">🇲🇹</span>
                  <span class="country-name">Malta</span>
                  <span class="country-code">+356</span>
                </div>
                <div class="country-item" data-code="+692" data-flag="🇲🇭" data-country="Marshall Islands">
                  <span class="country-flag">🇲🇭</span>
                  <span class="country-name">Marshall Islands</span>
                  <span class="country-code">+692</span>
                </div>
                <div class="country-item" data-code="+596" data-flag="🇲🇶" data-country="Martinique">
                  <span class="country-flag">🇲🇶</span>
                  <span class="country-name">Martinique</span>
                  <span class="country-code">+596</span>
                </div>
                <div class="country-item" data-code="+222" data-flag="🇲🇷" data-country="Mauritania">
                  <span class="country-flag">🇲🇷</span>
                  <span class="country-name">Mauritania</span>
                  <span class="country-code">+222</span>
                </div>
                <div class="country-item" data-code="+230" data-flag="🇲🇺" data-country="Mauritius">
                  <span class="country-flag">🇲🇺</span>
                  <span class="country-name">Mauritius</span>
                  <span class="country-code">+230</span>
                </div>
                <div class="country-item" data-code="+262" data-flag="🇾🇹" data-country="Mayotte">
                  <span class="country-flag">🇾🇹</span>
                  <span class="country-name">Mayotte</span>
                  <span class="country-code">+262</span>
                </div>
                <div class="country-item" data-code="+52" data-flag="🇲🇽" data-country="Mexico">
                  <span class="country-flag">🇲🇽</span>
                  <span class="country-name">Mexico</span>
                  <span class="country-code">+52</span>
                </div>
                <div class="country-item" data-code="+691" data-flag="🇫🇲" data-country="Micronesia">
                  <span class="country-flag">🇫🇲</span>
                  <span class="country-name">Micronesia</span>
                  <span class="country-code">+691</span>
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
                <div class="country-item" data-code="+1" data-flag="🇲🇸" data-country="Montserrat">
                  <span class="country-flag">🇲🇸</span>
                  <span class="country-name">Montserrat</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+212" data-flag="🇲🇦" data-country="Morocco">
                  <span class="country-flag">🇲🇦</span>
                  <span class="country-name">Morocco</span>
                  <span class="country-code">+212</span>
                </div>
                <div class="country-item" data-code="+258" data-flag="🇲🇿" data-country="Mozambique">
                  <span class="country-flag">🇲🇿</span>
                  <span class="country-name">Mozambique</span>
                  <span class="country-code">+258</span>
                </div>
                <div class="country-item" data-code="+95" data-flag="🇲🇲" data-country="Myanmar">
                  <span class="country-flag">🇲🇲</span>
                  <span class="country-name">Myanmar</span>
                  <span class="country-code">+95</span>
                </div>
                <div class="country-item" data-code="+264" data-flag="🇳🇦" data-country="Namibia">
                  <span class="country-flag">🇳🇦</span>
                  <span class="country-name">Namibia</span>
                  <span class="country-code">+264</span>
                </div>
                <div class="country-item" data-code="+674" data-flag="🇳🇷" data-country="Nauru">
                  <span class="country-flag">🇳🇷</span>
                  <span class="country-name">Nauru</span>
                  <span class="country-code">+674</span>
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
                <div class="country-item" data-code="+687" data-flag="🇳🇨" data-country="New Caledonia">
                  <span class="country-flag">🇳🇨</span>
                  <span class="country-name">New Caledonia</span>
                  <span class="country-code">+687</span>
                </div>
                <div class="country-item" data-code="+64" data-flag="🇳🇿" data-country="New Zealand">
                  <span class="country-flag">🇳🇿</span>
                  <span class="country-name">New Zealand</span>
                  <span class="country-code">+64</span>
                </div>
                <div class="country-item" data-code="+505" data-flag="🇳🇮" data-country="Nicaragua">
                  <span class="country-flag">🇳🇮</span>
                  <span class="country-name">Nicaragua</span>
                  <span class="country-code">+505</span>
                </div>
                <div class="country-item" data-code="+227" data-flag="🇳🇪" data-country="Niger">
                  <span class="country-flag">🇳🇪</span>
                  <span class="country-name">Niger</span>
                  <span class="country-code">+227</span>
                </div>
                <div class="country-item" data-code="+234" data-flag="🇳🇬" data-country="Nigeria">
                  <span class="country-flag">🇳🇬</span>
                  <span class="country-name">Nigeria</span>
                  <span class="country-code">+234</span>
                </div>
                <div class="country-item" data-code="+683" data-flag="🇳🇺" data-country="Niue">
                  <span class="country-flag">🇳🇺</span>
                  <span class="country-name">Niue</span>
                  <span class="country-code">+683</span>
                </div>
                <div class="country-item" data-code="+672" data-flag="🇳🇫" data-country="Norfolk Island">
                  <span class="country-flag">🇳🇫</span>
                  <span class="country-name">Norfolk Island</span>
                  <span class="country-code">+672</span>
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
                <div class="country-item" data-code="+1" data-flag="🇲🇵" data-country="Northern Mariana Islands">
                  <span class="country-flag">🇲🇵</span>
                  <span class="country-name">Northern Mariana Islands</span>
                  <span class="country-code">+1</span>
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
                <div class="country-item" data-code="+680" data-flag="🇵🇼" data-country="Palau">
                  <span class="country-flag">🇵🇼</span>
                  <span class="country-name">Palau</span>
                  <span class="country-code">+680</span>
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
                <div class="country-item" data-code="+675" data-flag="🇵🇬" data-country="Papua New Guinea">
                  <span class="country-flag">🇵🇬</span>
                  <span class="country-name">Papua New Guinea</span>
                  <span class="country-code">+675</span>
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
                <div class="country-item" data-code="+64" data-flag="🇵🇳" data-country="Pitcairn Islands">
                  <span class="country-flag">🇵🇳</span>
                  <span class="country-name">Pitcairn Islands</span>
                  <span class="country-code">+64</span>
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
                <div class="country-item" data-code="+1" data-flag="🇵🇷" data-country="Puerto Rico">
                  <span class="country-flag">🇵🇷</span>
                  <span class="country-name">Puerto Rico</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+974" data-flag="🇶🇦" data-country="Qatar">
                  <span class="country-flag">🇶🇦</span>
                  <span class="country-name">Qatar</span>
                  <span class="country-code">+974</span>
                </div>
                <div class="country-item" data-code="+242" data-flag="🇨🇬" data-country="Republic of the Congo">
                  <span class="country-flag">🇨🇬</span>
                  <span class="country-name">Republic of the Congo</span>
                  <span class="country-code">+242</span>
                </div>
                <div class="country-item" data-code="+40" data-flag="🇷🇴" data-country="Romania">
                  <span class="country-flag">🇷🇴</span>
                  <span class="country-name">Romania</span>
                  <span class="country-code">+40</span>
                </div>
                <div class="country-item" data-code="+73" data-flag="🇷🇺" data-country="Russia">
                  <span class="country-flag">🇷🇺</span>
                  <span class="country-name">Russia</span>
                  <span class="country-code">+73</span>
                </div>
                <div class="country-item" data-code="+250" data-flag="🇷🇼" data-country="Rwanda">
                  <span class="country-flag">🇷🇼</span>
                  <span class="country-name">Rwanda</span>
                  <span class="country-code">+250</span>
                </div>
                <div class="country-item" data-code="+262" data-flag="🇷🇪" data-country="Réunion">
                  <span class="country-flag">🇷🇪</span>
                  <span class="country-name">Réunion</span>
                  <span class="country-code">+262</span>
                </div>
                <div class="country-item" data-code="+590" data-flag="🇧🇱" data-country="Saint Barthélemy">
                  <span class="country-flag">🇧🇱</span>
                  <span class="country-name">Saint Barthélemy</span>
                  <span class="country-code">+590</span>
                </div>
                <div class="country-item" data-code="+290" data-flag="🇸🇭" data-country="Saint Helena, Ascension and Tristan da Cunha">
                  <span class="country-flag">🇸🇭</span>
                  <span class="country-name">Saint Helena, Ascension and Tristan da Cunha</span>
                  <span class="country-code">+290</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇰🇳" data-country="Saint Kitts and Nevis">
                  <span class="country-flag">🇰🇳</span>
                  <span class="country-name">Saint Kitts and Nevis</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇱🇨" data-country="Saint Lucia">
                  <span class="country-flag">🇱🇨</span>
                  <span class="country-name">Saint Lucia</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+590" data-flag="🇲🇫" data-country="Saint Martin">
                  <span class="country-flag">🇲🇫</span>
                  <span class="country-name">Saint Martin</span>
                  <span class="country-code">+590</span>
                </div>
                <div class="country-item" data-code="+508" data-flag="🇵🇲" data-country="Saint Pierre and Miquelon">
                  <span class="country-flag">🇵🇲</span>
                  <span class="country-name">Saint Pierre and Miquelon</span>
                  <span class="country-code">+508</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇻🇨" data-country="Saint Vincent and the Grenadines">
                  <span class="country-flag">🇻🇨</span>
                  <span class="country-name">Saint Vincent and the Grenadines</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+685" data-flag="🇼🇸" data-country="Samoa">
                  <span class="country-flag">🇼🇸</span>
                  <span class="country-name">Samoa</span>
                  <span class="country-code">+685</span>
                </div>
                <div class="country-item" data-code="+378" data-flag="🇸🇲" data-country="San Marino">
                  <span class="country-flag">🇸🇲</span>
                  <span class="country-name">San Marino</span>
                  <span class="country-code">+378</span>
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
                <div class="country-item" data-code="+248" data-flag="🇸🇨" data-country="Seychelles">
                  <span class="country-flag">🇸🇨</span>
                  <span class="country-name">Seychelles</span>
                  <span class="country-code">+248</span>
                </div>
                <div class="country-item" data-code="+232" data-flag="🇸🇱" data-country="Sierra Leone">
                  <span class="country-flag">🇸🇱</span>
                  <span class="country-name">Sierra Leone</span>
                  <span class="country-code">+232</span>
                </div>
                <div class="country-item" data-code="+65" data-flag="🇸🇬" data-country="Singapore">
                  <span class="country-flag">🇸🇬</span>
                  <span class="country-name">Singapore</span>
                  <span class="country-code">+65</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇸🇽" data-country="Sint Maarten">
                  <span class="country-flag">🇸🇽</span>
                  <span class="country-name">Sint Maarten</span>
                  <span class="country-code">+1</span>
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
                <div class="country-item" data-code="+677" data-flag="🇸🇧" data-country="Solomon Islands">
                  <span class="country-flag">🇸🇧</span>
                  <span class="country-name">Solomon Islands</span>
                  <span class="country-code">+677</span>
                </div>
                <div class="country-item" data-code="+252" data-flag="🇸🇴" data-country="Somalia">
                  <span class="country-flag">🇸🇴</span>
                  <span class="country-name">Somalia</span>
                  <span class="country-code">+252</span>
                </div>
                <div class="country-item" data-code="+27" data-flag="🇿🇦" data-country="South Africa">
                  <span class="country-flag">🇿🇦</span>
                  <span class="country-name">South Africa</span>
                  <span class="country-code">+27</span>
                </div>
                <div class="country-item" data-code="+500" data-flag="🇬🇸" data-country="South Georgia">
                  <span class="country-flag">🇬🇸</span>
                  <span class="country-name">South Georgia</span>
                  <span class="country-code">+500</span>
                </div>
                <div class="country-item" data-code="+82" data-flag="🇰🇷" data-country="South Korea">
                  <span class="country-flag">🇰🇷</span>
                  <span class="country-name">South Korea</span>
                  <span class="country-code">+82</span>
                </div>
                <div class="country-item" data-code="+211" data-flag="🇸🇸" data-country="South Sudan">
                  <span class="country-flag">🇸🇸</span>
                  <span class="country-name">South Sudan</span>
                  <span class="country-code">+211</span>
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
                <div class="country-item" data-code="+597" data-flag="🇸🇷" data-country="Suriname">
                  <span class="country-flag">🇸🇷</span>
                  <span class="country-name">Suriname</span>
                  <span class="country-code">+597</span>
                </div>
                <div class="country-item" data-code="+4779" data-flag="🇸🇯" data-country="Svalbard and Jan Mayen">
                  <span class="country-flag">🇸🇯</span>
                  <span class="country-name">Svalbard and Jan Mayen</span>
                  <span class="country-code">+4779</span>
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
                <div class="country-item" data-code="+239" data-flag="🇸🇹" data-country="São Tomé and Príncipe">
                  <span class="country-flag">🇸🇹</span>
                  <span class="country-name">São Tomé and Príncipe</span>
                  <span class="country-code">+239</span>
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
                <div class="country-item" data-code="+670" data-flag="🇹🇱" data-country="Timor-Leste">
                  <span class="country-flag">🇹🇱</span>
                  <span class="country-name">Timor-Leste</span>
                  <span class="country-code">+670</span>
                </div>
                <div class="country-item" data-code="+228" data-flag="🇹🇬" data-country="Togo">
                  <span class="country-flag">🇹🇬</span>
                  <span class="country-name">Togo</span>
                  <span class="country-code">+228</span>
                </div>
                <div class="country-item" data-code="+690" data-flag="🇹🇰" data-country="Tokelau">
                  <span class="country-flag">🇹🇰</span>
                  <span class="country-name">Tokelau</span>
                  <span class="country-code">+690</span>
                </div>
                <div class="country-item" data-code="+676" data-flag="🇹🇴" data-country="Tonga">
                  <span class="country-flag">🇹🇴</span>
                  <span class="country-name">Tonga</span>
                  <span class="country-code">+676</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇹🇹" data-country="Trinidad and Tobago">
                  <span class="country-flag">🇹🇹</span>
                  <span class="country-name">Trinidad and Tobago</span>
                  <span class="country-code">+1</span>
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
                <div class="country-item" data-code="+1" data-flag="🇹🇨" data-country="Turks and Caicos Islands">
                  <span class="country-flag">🇹🇨</span>
                  <span class="country-name">Turks and Caicos Islands</span>
                  <span class="country-code">+1</span>
                </div>
                <div class="country-item" data-code="+688" data-flag="🇹🇻" data-country="Tuvalu">
                  <span class="country-flag">🇹🇻</span>
                  <span class="country-name">Tuvalu</span>
                  <span class="country-code">+688</span>
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
                <div class="country-item" data-code="+268" data-flag="🇺🇲" data-country="United States Minor Outlying Islands">
                  <span class="country-flag">🇺🇲</span>
                  <span class="country-name">United States Minor Outlying Islands</span>
                  <span class="country-code">+268</span>
                </div>
                <div class="country-item" data-code="+1" data-flag="🇻🇮" data-country="United States Virgin Islands">
                  <span class="country-flag">🇻🇮</span>
                  <span class="country-name">United States Virgin Islands</span>
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
                <div class="country-item" data-code="+678" data-flag="🇻🇺" data-country="Vanuatu">
                  <span class="country-flag">🇻🇺</span>
                  <span class="country-name">Vanuatu</span>
                  <span class="country-code">+678</span>
                </div>
                <div class="country-item" data-code="+3906698" data-flag="🇻🇦" data-country="Vatican City">
                  <span class="country-flag">🇻🇦</span>
                  <span class="country-name">Vatican City</span>
                  <span class="country-code">+3906698</span>
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
                <div class="country-item" data-code="+681" data-flag="🇼🇫" data-country="Wallis and Futuna">
                  <span class="country-flag">🇼🇫</span>
                  <span class="country-name">Wallis and Futuna</span>
                  <span class="country-code">+681</span>
                </div>
                <div class="country-item" data-code="+2125288" data-flag="🇪🇭" data-country="Western Sahara">
                  <span class="country-flag">🇪🇭</span>
                  <span class="country-name">Western Sahara</span>
                  <span class="country-code">+2125288</span>
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
                <div class="country-item" data-code="+358" data-flag="🇦🇽" data-country="Åland Islands">
                  <span class="country-flag">🇦🇽</span>
                  <span class="country-name">Åland Islands</span>
                  <span class="country-code">+358</span>
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
