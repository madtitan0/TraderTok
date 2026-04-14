<?php
/**
 * Subdomain Configuration for TraderTok
 * Detects the subdomain and maps it to a country and language.
 */

$host = $_SERVER['HTTP_HOST'];
$parts = explode('.', $host);
$subdomain = (count($parts) > 2) ? strtolower($parts[0]) : '';

// --- Simulation Mode for testing ---
// Allows testing on IP addresses or local domains by using ?test_subdomain=ng
// Restricted to IP addresses/localhost to ensure it never affects the live domain
$isLocal = filter_var($host, FILTER_VALIDATE_IP) || strpos($host, 'localhost') !== false;

if ($isLocal) {
    if (isset($_GET['test_subdomain'])) {
        $subdomain = strtolower($_GET['test_subdomain']);
        if ($subdomain === 'clear') {
            setcookie('test_subdomain', '', time() - 3600, '/');
            $subdomain = ''; // Reset so it behaves like main domain
        } else {
            // Set cookie to persist the simulation across page clicks for 1 hour
            setcookie('test_subdomain', $subdomain, time() + 3600, '/');
        }
    } elseif (isset($_COOKIE['test_subdomain'])) {
        // Read from cookie, overriding any false subdomains from IP
        $subdomain = strtolower($_COOKIE['test_subdomain']);
    }
}
// -----------------------------------

// Mapping subdomains to country IDs and language codes
$subdomainMap = [
    'ng'    => ['country' => 'nigeria',        'lang' => 'en'],
    'vn'    => ['country' => 'vietnam',        'lang' => 'vn'], // vi fallback to en
    'th'    => ['country' => 'thailand',       'lang' => 'th'], // th fallback to en
    'my'    => ['country' => 'malaysia',       'lang' => 'my'], // ms fallback to en
    'ph'    => ['country' => 'philippines',    'lang' => 'ph'],
    'id'    => ['country' => 'indonesia',      'lang' => 'id'],
    'pk'    => ['country' => 'pakistan',       'lang' => 'pk'],
    'latam' => ['country' => 'latam',          'lang' => 'es-419'],
    'es'    => ['country' => 'latam',          'lang' => 'es-419'],
    'na'    => ['country' => 'namibia',        'lang' => 'en'],
    'ke'    => ['country' => 'kenya',          'lang' => 'en'], //ke Swahili
    'gh'    => ['country' => 'ghana',          'lang' => 'en'],
    'za'    => ['country' => 'south-africa',   'lang' => 'en'],  //za Xhosa
    'tt'    => ['country' => 'trinidad-tobago', 'lang' => 'en'],
    'gy'    => ['country' => 'guyana',         'lang' => 'en'],
];

$detectedSubdomainData = null;
if (isset($subdomainMap[$subdomain])) {
    $detectedSubdomainData = $subdomainMap[$subdomain];
    $detectedSubdomainData['subdomain'] = $subdomain;
}

// Global variable for use in head.php to inject into JS
$subdomainJS = 'null';
if ($detectedSubdomainData) {
    $subdomainJS = json_encode($detectedSubdomainData);
}

/**
 * Optional extra apex hostnames treated as "main" for region-redirect.js first-visit geo
 * (in addition to tradertok.com / www). Example: ['mybrand.com', 'www.mybrand.com']
 * Leave empty if you only use tradertok.com.
 */
$tradertok_extra_geo_main_hosts = [];
?>
