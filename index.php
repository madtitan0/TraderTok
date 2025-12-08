<?php
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
        } elseif ($page == 'trading-platform'){
      require("includes/trading-platform.php");
        } elseif ($page == 'legal'){
      require("includes/legal.php");
        } elseif ($page == 'events-calendar'){
      require("includes/events-calendar.php");
        } elseif ($page == 'meet-the-team'){
      require("includes/meet-the-team.php");
        } elseif ($page == 'account-types'){
      require("includes/account-types.php");
        } else if($page == 'otherPage'){
           
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
