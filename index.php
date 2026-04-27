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
    } elseif ($page === 'claim-offer') {
        $get->title = 'Claim Offer | TraderTok';
        $get->desc = 'Register your interest to claim a promotion. Our team will follow up with eligibility and next steps.';
        $get->keyw = 'claim offer, trading promotion, bonus, TraderTok';
    } elseif ($page === 'lead-thank-you') {
        $get->title = 'Thank You | TraderTok';
        $get->desc = 'Your request has been received.';
        $get->keyw = 'thank you, confirmation';
    } elseif ($page === 'edu-resources') {
        $get->title = 'Trading Tools & Resources | Pip, Position Size & Risk-Reward Calculators | TraderTok Academy';
        $get->desc = 'Use interactive pip, position size, and risk-reward calculators plus guides, checklists, and Academy links to support your trading education.';
        $get->keyw = 'trading calculators, pip calculator, position size calculator, risk reward calculator, trading resources, TraderTok Academy';
    } elseif ($page === 'top-instruments') {
        $get->title = 'Top Instruments & Asset Information | TraderTok';
        $get->desc = 'Educational overview of selected cryptocurrency and equity instruments on TraderTok: characteristics, market context, and risk considerations.';
        $get->keyw = 'Bitcoin, Ethereum, stocks, asset information, risk disclosure, TraderTok';
    } elseif ($page === 'ib-program') {
        $get->title = 'Partner Program (IB) | TraderTok';
        $get->desc = 'TraderTok Partner Program: structured partnerships, earning models, AI and portal support, and compliance principles for introducing brokers and partners.';
        $get->keyw = 'partner program, introducing broker, IB, affiliate, TraderTok';
    } elseif ($page === 'ib-program-application') {
        $get->title = 'Apply to Partner Program (IB) | TraderTok';
        $get->desc = 'Submit your TraderTok Partner Program (IB) application and share your profile, experience, and preferred promotion model.';
        $get->keyw = 'IB application, partner application, introducing broker form, TraderTok';
    } elseif ($page === 'tradertok-club') {
        $get->title = 'TraderTok Club | TraderTok';
        $get->desc = 'TraderTok Club loyalty programme: tiered benefits from Silver to Diamond, premium tools, dedicated support, and member-only opportunities for qualifying clients.';
        $get->keyw = 'TraderTok Club, loyalty programme, membership tiers, trading benefits, TraderTok';
    } elseif ($page === 'tradertok-club-join') {
        $get->title = 'Join TraderTok Club | TraderTok';
        $get->desc = 'Join TraderTok Club to receive trading insights, market updates, and beginner-friendly education resources.';
        $get->keyw = 'join TraderTok Club, trading community, trading insights, TraderTok';
    } elseif (in_array($page, [
        'offers',
        'offers-promotions',
        'vn',
        'th',
        'ph',
        'id',
        'pk',
        'latam',
        'na',
        'ke',
        'gh',
        'ng',
        'za',
        'tt',
        'gy',
    ], true)) {
        $get->title = 'Offers & Promotions | TraderTok';
        $get->desc = 'Discover region-specific promotions and exclusive trading opportunities tailored for traders in your area.';
        $get->keyw = 'trading offers, promotions, bonuses, TraderTok';
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