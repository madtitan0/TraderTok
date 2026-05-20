<?php

/**
 * Router for PHP's built-in development server (php -S host:port router.php).
 * Mirrors .htaccess rewrite behavior so pretty URLs work without Apache.
 */

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = is_string($uri) ? $uri : '/';
$path = rawurldecode($uri);

if ($path !== '/' && $path !== '' && file_exists(__DIR__ . $path) && !is_dir(__DIR__ . $path)) {
    return false;
}

if (preg_match('#^/academy/market-news/?$#i', $path)) {
    $_GET['page'] = 'edu-market-news';
    require __DIR__ . '/index.php';

    return true;
}

$pageSlug = trim($path, '/');
if ($pageSlug !== '') {
    $_GET['page'] = $pageSlug;
}

require __DIR__ . '/index.php';

return true;
