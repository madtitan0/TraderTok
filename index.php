<?php
echo "<!-- INDEX_PAGE_VAR: '" . @$_GET['page'] . "' -->\n";
require 'api.php';
require 'includes/head.php';

if (!$page) {
    require 'includes/home.php';
} else {
    $menuDetail = (object)[];
    // $menuDetail = new stdClass;

        if($page == 'contact-us'){

            require("includes/contact-us.php");

        } elseif ($page == 'trading-essentials'){
      require("includes/trading-essentials.php");
        } elseif ($page == 'video-education'){
      require("includes/video-education.php");
        } elseif ($page == 'research'){
      require("includes/research.php");
        } elseif ($page == 'live-training'){
      require("includes/live-training.php");
        } elseif ($page == 'offers' || $page == 'offers-promotions' || in_array($page, ['vn', 'th', 'ph', 'id', 'pk', 'latam', 'na', 'ke', 'gh', 'ng', 'za', 'tt', 'gy'])){
      require("includes/offers.php");
      } elseif ($page == 'trading-platform'){
      require("includes/trading-platform.php");
        } elseif ($page == 'trading-central'){
      require("includes/trading-central.php");
        } elseif ($page == 'legal-documents'){
      require("includes/legal-documents.php");
        } elseif ($page == 'regulations'){
      require("includes/regulations.php");
        } elseif ($page == 'events-calendar'){
      require("includes/events-calendar.php");
        } elseif ($page == 'education-hub'){
      require("includes/education-hub.php");
        } elseif ($page == 'education-article'){
      require("includes/education-article.php");
        } elseif ($page == 'meet-the-team'){
      require("includes/meet-the-team.php");
        } elseif ($page == 'account-types'){
      require("includes/account-types.php");
        } elseif ($page == 'privacy-policy'){
      require("includes/privacy-policy.php");
        }elseif ($page == 'terms-conditions'){
      require("includes/terms-conditions.php");
        }elseif ($page == 'anti-money-laundering-policy'){
      require("includes/anti-money-laundering-policy.php");
        }elseif ($page == 'order-execution-policy'){
      require("includes/order-execution-policy.php");
        }elseif ($page == 'risk-disclosure'){
      require("includes/risk-disclosure.php");
        }elseif ($page == 'general-risk-disclosure'){
      require("includes/general-risk-disclosure.php");
        }elseif ($page == 'client-service-agreement'){
      require("includes/client-service-agreement.php");
        }elseif ($page == 'cookie-policy'){
      require("includes/cookie-policy.php");
        } elseif ($page == 'top-instruments'){
      require("includes/top-instruments.php");
        }  elseif ($page == 'help-center'){
      require("includes/help-center.php");
        }  elseif ($page == 'how-to-deposit'){
      require("includes/how-to-deposit.php");
        }  elseif ($page == 'how-to-withdraw'){
      require("includes/how-to-withdraw.php");
        }  elseif ($page == 'how-to-open-account'){
      require("includes/how-to-open-account.php");
        }  elseif ($page == 'how-to-verify-account'){
      require("includes/how-to-verify-account.php");
        }  elseif ($page == 'client-vulnerability'){
      require("includes/client-vulnerability.php");
        }  elseif ($page == 'how-copy-trading-works'){
      require("includes/how-copy-trading-works.php");
        }  elseif ($page == 'responsible-trading'){
      require("includes/responsible-trading.php");
        }  elseif ($page == 'interest-on-balance'){
      require("includes/interest-on-balance.php");
        }  elseif ($page == 'what-is-leverage-and-margin'){
      require("includes/what-is-leverage-and-margin.php");
        }  elseif ($page == 'buy-and-sell-explained'){
      require("includes/buy-and-sell-explained.php");
        }  elseif ($page == 'tax-report'){
      require("includes/tax-report.php");
        }  elseif ($page == 'accessibility'){
      require("includes/accessibility.php");
        }  elseif ($page == 'key-information-documents'){
      require("includes/key-information-documents.php");
        }  elseif ($page == 'invite-a-friend'){
      require("includes/invite-a-friend.php");
        }  elseif ($page == 'ib-program'){
      require("includes/ib-program.php");
        }  elseif ($page == 'tradertok-club'){
      require("includes/tradertok-club.php");
        }  elseif ($page == 'segregated-account'){
      require("includes/segregated-account.php");
        }  elseif ($page == 'key-information-documents'){
      require("includes/key-information-documents.php");
        } 
         else if($page == 'otherPage'){

            foreach ($get->other_page as $pageOther) {
                if ($pageOther->url == $getURL) {
                    $menuDetail = $pageOther;
                }
            }

            require("includes/otherPage.php");

        }  elseif ($page == 'extraMenu') {
        foreach ($get->extra_menu as $extraMenu) {
            if ($extraMenu->id == $_GET["id"]) {
                $menuDetail = $extraMenu;
            }
        }
        require("includes/extraMenuPage.php");
    } else if ($page == 'documents'){

            require("includes/document.php");
        }
                else if($page=='about')
        {

            require("includes/about.php");
        }
        else if($page=='blog')
        {

            require("includes/blog.php");
        }
        else if($page=='blogDetail')
        {

            foreach ($get->blog as $blog1) {

                if ($blog1->id == $_GET["id"]) {
                    $blogDetail = $blog1;
                }
            }
            require("includes/BlogDetail.php");
        }
        else{

            foreach ($get->menus as $pageMenus) {
                if ($pageMenus->url == $page) {
                    $menuDetail = $pageMenus;
                }
            }

            if (!count((array)$menuDetail)) {
                die('page not found...');
            }

            require("includes/page.php");

        }




}


require 'includes/footer.php';