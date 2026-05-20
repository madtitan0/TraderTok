<?php

/**
 * Routing helpers for page resolution and 404 handling.
 */

function tt_get_route_config(): array
{
    static $config = null;

    if ($config === null) {
        $config = require dirname(__DIR__) . '/config/page-routes.php';
    }

    return $config;
}

function tt_get_static_routes(): array
{
    $config = tt_get_route_config();

    return $config['static'] ?? [];
}

function tt_get_dynamic_route_types(): array
{
    $config = tt_get_route_config();

    return $config['dynamic'] ?? [];
}

function tt_menu_matches_page(string $page, object $get): bool
{
    if (empty($get->menus) || !is_iterable($get->menus)) {
        return false;
    }

    foreach ($get->menus as $menu) {
        if (isset($menu->url) && (string) $menu->url === $page) {
            return true;
        }
    }

    return false;
}

/**
 * Whether the current request maps to a known page (static, CMS menu, or dynamic route with valid params).
 */
function tt_resolve_page_exists(?string $page, object $get): bool
{
    if ($page === null || $page === '') {
        return true;
    }

    $staticRoutes = tt_get_static_routes();
    if (isset($staticRoutes[$page])) {
        return true;
    }

    $dynamicTypes = tt_get_dynamic_route_types();
    if (!in_array($page, $dynamicTypes, true)) {
        return tt_menu_matches_page($page, $get);
    }

    switch ($page) {
        case 'otherPage':
            $getURL = isset($_GET['url']) ? (string) $_GET['url'] : '';
            if ($getURL === '' || empty($get->other_page) || !is_iterable($get->other_page)) {
                return false;
            }
            foreach ($get->other_page as $item) {
                if (isset($item->url) && (string) $item->url === $getURL) {
                    return true;
                }
            }

            return false;

        case 'extraMenu':
            $id = isset($_GET['id']) ? (string) $_GET['id'] : '';
            if ($id === '' || empty($get->extra_menu) || !is_iterable($get->extra_menu)) {
                return false;
            }
            foreach ($get->extra_menu as $item) {
                if (isset($item->id) && (string) $item->id === $id) {
                    return true;
                }
            }

            return false;

        case 'blogDetail':
            $id = isset($_GET['id']) ? (string) $_GET['id'] : '';
            if ($id === '' || empty($get->blog) || !is_iterable($get->blog)) {
                return false;
            }
            foreach ($get->blog as $item) {
                if (isset($item->id) && (string) $item->id === $id) {
                    return true;
                }
            }

            return false;

        case 'documents':
            return is_readable(dirname(__DIR__) . '/document.php');

        default:
            return false;
    }
}

function tt_set_not_found_meta(object $get): void
{
    $brand = trim((string) ($get->brand_name ?? 'TraderTok'));
    if ($brand === '') {
        $brand = 'TraderTok';
    }

    $get->title = 'Page Not Found | ' . $brand;
    $get->desc = 'The page you are looking for does not exist or may have been moved.';
    $get->keyw = '404, page not found';
}

function tt_render_not_found_page(): void
{
    if (!headers_sent()) {
        http_response_code(404);
    }

    require dirname(__DIR__) . '/404.php';
    require dirname(__DIR__) . '/footer.php';
    exit;
}
