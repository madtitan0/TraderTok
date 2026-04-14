<?php

/**
 * Traders Club — upstream API settings.
 * For secrets, use includes/config/traders-club.local.php (see .gitignore) or env vars.
 */
$cfg = [
    /**
     * Base URL without query string; head.php appends ?token= from qualification_token for the browser POST.
     */
    'qualification_url' => getenv('TRADERS_CLUB_QUALIFICATION_URL') ?: 'https://6dfed096-backend.dataconect.com/api/v1/webhook/user-ad-group/qualification',
    /**
     * Query token (?token=…) — set in traders-club.local.php or TRADERS_CLUB_QUALIFICATION_TOKEN
     */
    'qualification_token' => getenv('TRADERS_CLUB_QUALIFICATION_TOKEN') ?: '',
    /** Optional Bearer if your environment uses it instead of or with ?token= */
    'qualification_bearer_token' => getenv('TRADERS_CLUB_QUALIFICATION_BEARER') ?: '',
    /** Optional extra curl headers: [ 'X-Custom: value' ] */
    'qualification_extra_headers' => [],
    /** Empty by default (matches upstream curl). Set TRADERS_CLUB_REFERER or traders-club.local.php if required. */
    'qualification_referer' => (string) (getenv('TRADERS_CLUB_REFERER') ?: ''),
];

if (is_file(__DIR__ . '/traders-club.local.php')) {
    $local = require __DIR__ . '/traders-club.local.php';
    if (is_array($local)) {
        $cfg = array_replace_recursive($cfg, $local);
    }
}

return $cfg;
