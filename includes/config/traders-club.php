<?php

/**
 * Traders Club — qualification webhook (existing-user path in Deposit + Traders Club modals).
 *
 * Set qualification_token in $TRADERS_CLUB_INLINE below. The browser POSTs to
 * ./api/traders-club-qualification.php; PHP forwards to the URL below with ?token= (no Bearer).
 *
 * Optional: TRADERS_CLUB_QUALIFICATION_URL / TRADERS_CLUB_QUALIFICATION_TOKEN env (non-empty overrides),
 * or includes/config/traders-club.local.php
 */
$TRADERS_CLUB_INLINE = [
    'qualification_url' => 'https://77d6c7de-backend-clientzone.dataconect.com/api/v1/webhook/user-ad-group/qualification',
    'qualification_token' => '9ec760d0-1df7-4bd5-bec0-1ff869986107',
];

// Env vars override inline only when non-empty (empty env must not wipe a configured inline token).
$tcEnv = static function (string $key, string $fallback): string {
    $v = getenv($key);
    if ($v === false) {
        return $fallback;
    }
    $v = trim((string) $v);

    return $v !== '' ? $v : $fallback;
};

$cfg = [
    'qualification_url' => $tcEnv('TRADERS_CLUB_QUALIFICATION_URL', $TRADERS_CLUB_INLINE['qualification_url']),
    'qualification_token' => $tcEnv('TRADERS_CLUB_QUALIFICATION_TOKEN', $TRADERS_CLUB_INLINE['qualification_token']),
    'qualification_extra_headers' => [],
    'qualification_referer' => (string) (getenv('TRADERS_CLUB_REFERER') ?: ''),
];

if (is_file(__DIR__ . '/traders-club.local.php')) {
    $local = require __DIR__ . '/traders-club.local.php';
    if (is_array($local)) {
        $cfg = array_replace_recursive($cfg, $local);
    }
}

return $cfg;
