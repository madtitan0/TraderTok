<?php

/**
 * Same-origin proxy for existing-user qualification (Traders Club + Deposit modals).
 * Forwards POST JSON to DataConect with ?token= from includes/config/traders-club.php only.
 */
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
    exit;
}

$cfg = require dirname(__DIR__) . '/includes/config/traders-club.php';
$url = (string) ($cfg['qualification_url'] ?? '');
$token = isset($cfg['qualification_token']) && is_string($cfg['qualification_token'])
    ? trim($cfg['qualification_token'])
    : '';

if ($url === '' || $token === '') {
    http_response_code(503);
    echo json_encode([
        'message' => 'Qualification is not configured. Set qualification_token in includes/config/traders-club.php.',
    ]);
    exit;
}

$raw = file_get_contents('php://input');
if ($raw === false || $raw === '') {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid request body']);
    exit;
}

$upstream = $url;
$sep = strpos($upstream, '?') !== false ? '&' : '?';
$upstream .= $sep . 'token=' . rawurlencode($token);

$headers = [
    'Content-Type: application/json',
    'Accept: application/json',
];
$referer = (string) ($cfg['qualification_referer'] ?? '');
if ($referer !== '') {
    $headers[] = 'Referer: ' . $referer;
}

if (function_exists('curl_init')) {
    $ch = curl_init($upstream);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $raw,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 45,
        CURLOPT_FOLLOWLOCATION => true,
    ]);
    $responseBody = curl_exec($ch);
    $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);
    if ($responseBody === false || $err !== '') {
        http_response_code(502);
        echo json_encode(['message' => 'Upstream request failed.']);
        exit;
    }
    http_response_code($status >= 100 && $status < 600 ? $status : 502);
    echo $responseBody;
    exit;
}

$ctx = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => implode("\r\n", $headers),
        'content' => $raw,
        'timeout' => 45,
        'ignore_errors' => true,
    ],
]);
$responseBody = @file_get_contents($upstream, false, $ctx);
if ($responseBody === false) {
    http_response_code(502);
    echo json_encode(['message' => 'Upstream request failed.']);
    exit;
}
$status = 502;
if (isset($http_response_header[0]) && preg_match('/\s(\d{3})\s/', $http_response_header[0], $m)) {
    $status = (int) $m[1];
}
http_response_code($status >= 100 && $status < 600 ? $status : 502);
echo $responseBody;
