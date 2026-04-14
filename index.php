<?php
ob_start();
echo "<!-- INDEX_PAGE_VAR: '" . @$_GET['page'] . "' -->\n";
require __DIR__ . '/ensure-api-cache-shape.php';
require __DIR__ . '/api.php';

// Academy: page-specific SEO (API $get defaults are site-wide).
if (!empty($page)) {
    if ($page === 'edu-market-news') {
        $get->title = 'Market News & Insights | Forex, Gold, Indices & Macro Analysis | TraderTok';
        $get->desc = 'Stay updated with TraderTok market news, weekly outlooks, forex analysis, gold insights, and major economic events shaping the markets.';
        $get->keyw = 'market news and analysis, forex market news, gold market outlook, weekly market outlook, trading market analysis';
    } elseif ($page === 'open-demo-account') {
        $get->title = 'Open Demo Account | Practice Trading | TraderTok';
        $get->desc = 'Register your interest in a free demo trading account. Practice with virtual funds on live market data.';
        $get->keyw = 'demo account, practice trading, forex demo, CFD demo';
    } elseif ($page === 'open-live-account') {
        $get->title = 'Open Live Trading Account | TraderTok';
        $get->desc = 'Start your live trading account application. Our team will follow up with next steps and documentation.';
        $get->keyw = 'live account, forex account, trading account registration';
    } elseif ($page === 'lead-thank-you') {
        $get->title = 'Thank You | TraderTok';
        $get->desc = 'Your request has been received.';
        $get->keyw = 'thank you, confirmation';
    } else {
        $courseSeo = require __DIR__ . '/includes/config/course-seo.php';
        if (isset($courseSeo[$page])) {
            $get->title = $courseSeo[$page]['title'];
            $get->desc = $courseSeo[$page]['description'];
            $get->keyw = $courseSeo[$page]['keywords'];
        }
    }
}

require 'includes/head.php';

echo "<!-- INDEX_PAGE_VAR: '" . @$_GET['page'] . "' -->\n";

$routeConfig = require __DIR__ . '/includes/config/page-routes.php';
$staticRoutes = $routeConfig['static'];

if (!$page) {
    require 'includes/home.php';
    require 'includes/footer.php';
    exit;
}

$menuDetail = (object)[];

if (isset($staticRoutes[$page])) {
    require $staticRoutes[$page];
    require 'includes/footer.php';
    exit;
}

switch ($page) {
    case 'otherPage':
        foreach ($get->other_page as $pageOther) {
            if ($pageOther->url == $getURL) {
                $menuDetail = $pageOther;
                break;
            }
        }
        require 'includes/otherPage.php';
        break;

    case 'extraMenu':
        $extraMenuTarget = __DIR__ . '/includes/extraMenuPage.php';
        if (!file_exists($extraMenuTarget)) {
            die('Missing template: includes/extraMenuPage.php');
        }

        foreach ($get->extra_menu as $extraMenu) {
            if ($extraMenu->id == $_GET['id']) {
                $menuDetail = $extraMenu;
                break;
            }
        }
        require $extraMenuTarget;
        break;

    case 'documents':
        $documentTarget = __DIR__ . '/includes/document.php';
        if (!file_exists($documentTarget)) {
            die('Missing template: includes/document.php');
        }
        require $documentTarget;
        break;

    case 'blogDetail':
        foreach ($get->blog as $blog1) {
            if ($blog1->id == $_GET['id']) {
                $blogDetail = $blog1;
                break;
            }
        }
        require 'includes/blogDetail.php';
        break;

    default:
        foreach ($get->menus as $pageMenus) {
            if ($pageMenus->url == $page) {
                $menuDetail = $pageMenus;
                break;
            }
        }

        if (!count((array) $menuDetail)) {
            die('page not found...');
        }

        require 'includes/page.php';
        break;
}

require 'includes/footer.php';

ob_end_flush();
