<?php
require_once __DIR__ . '/../config/subdomain-config.php';

if (!function_exists('embed_asset_stylesheet_tag')) {
    function embed_asset_stylesheet_tag($path)
    {
        if (!file_exists($path)) {
            return '';
        }

        return '<link rel="stylesheet" href="' . $path . '?v=' . filemtime($path) . '">';
    }
}

if (!function_exists('embed_route_url')) {
    function embed_route_url($pageName, array $params = [])
    {
        $slug = trim((string) $pageName, '/');
        $base = $slug === '' ? './' : './' . $slug;
        if (empty($params)) {
            return $base;
        }

        return $base . '?' . http_build_query($params);
    }
}

$pageTitle = isset($embedPageTitle) ? (string) $embedPageTitle : 'TraderTok';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <script>
    window.subdomainData = <?php echo $subdomainJS; ?>;
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php
    $embedStylesheets = [
        'assets/css/design-tokens.css',
        'assets/css/education-about-alignment.css',
        'assets/css/styles.css',
        'assets/css/education-styles.css',
        'assets/css/embed-form.css',
    ];
    foreach ($embedStylesheets as $stylesheet) {
        echo embed_asset_stylesheet_tag($stylesheet);
    }
    ?>
    <?php include __DIR__ . '/global-button-pills.php'; ?>
  </head>
  <body class="page-embed-form">
    <div class="embed-form-wrap">
