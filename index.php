<?php

echo "<!-- INDEX_PAGE_VAR: '" . @$_GET['page'] . "' -->\n";

require 'api.php';
require 'includes/head.php';

$routeConfig = require __DIR__ . '/config/page-routes.php';
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
