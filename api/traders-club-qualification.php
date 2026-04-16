<?php

/**
 * Same-origin proxy for existing-user qualification (Traders Club + Deposit modals).
 * Forwards POST JSON to DataConect with the configured token appended as ?token=.
 */
header('Content-Type: application/json; charset=utf-8');

$qualificationUrl = 'https://6dfed096-backend.dataconect.com/api/v1/webhook/user-ad-group/qualification';
$qualificationToken = '9ec760d0-1df7-4bd5-bec0-1ff869986107';
$qualificationReferer = '';
$qualificationDebugLog = dirname(__DIR__) . '/tmp/traders-club-qualification.log';

function qualification_parse_json(?string $raw): ?array
{
    if (!is_string($raw) || trim($raw) === '') {
        return null;
    }

    $decoded = json_decode($raw, true);

    return is_array($decoded) ? $decoded : null;
}

function qualification_extract_action(?array $data): string
{
    if (!is_array($data)) {
        return '';
    }

    $raw = $data['action'] ?? $data['data']['action'] ?? null;
    if (!is_string($raw)) {
        return '';
    }

    $action = strtoupper(trim($raw));

    return ($action === 'REDIRECT' || $action === 'PENDING') ? $action : '';
}

function qualification_extract_message(?array $data, string $raw): string
{
    if (is_array($data)) {
        $candidates = [
            $data['message'] ?? null,
            $data['error'] ?? null,
            $data['errors'] ?? null,
            $data['data']['message'] ?? null,
            $data['data']['error'] ?? null,
        ];

        foreach ($candidates as $candidate) {
            if (is_string($candidate) && trim($candidate) !== '') {
                return trim($candidate);
            }
        }
    }

    return trim($raw);
}

function qualification_should_fallback_to_pending(int $status, ?array $data, string $raw): bool
{
    if ($status >= 200 && $status < 300) {
        return true;
    }

    $message = strtolower(qualification_extract_message($data, $raw));
    if ($message === '') {
        return false;
    }

    return str_contains($message, 'not found')
        || str_contains($message, 'email not found')
        || str_contains($message, 'lead not found')
        || str_contains($message, 'user not found');
}

function qualification_send_json(int $status, array $payload): void
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

function qualification_log_debug(string $stage, array $context = []): void
{
    global $qualificationDebugLog;

    $line = [
        'time' => gmdate('c'),
        'stage' => $stage,
        'context' => $context,
    ];

    @file_put_contents(
        $qualificationDebugLog,
        json_encode($line, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL,
        FILE_APPEND
    );
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
    exit;
}

$url = trim($qualificationUrl);
$token = trim($qualificationToken);

if ($url === '' || $token === '') {
    http_response_code(503);
    echo json_encode([
        'message' => 'Qualification is not configured in api/traders-club-qualification.php.',
    ]);
    exit;
}

$raw = file_get_contents('php://input');
if ($raw === false || $raw === '') {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid request body']);
    exit;
}

$payload = json_decode($raw, true);
if (!is_array($payload)) {
    http_response_code(400);
    echo json_encode(['message' => 'Request body must be valid JSON']);
    exit;
}

$existing = $payload['existing'] ?? null;
$group = $payload['group'] ?? null;
$email = $payload['email'] ?? null;

if (!is_bool($existing)) {
    http_response_code(400);
    echo json_encode(['message' => '`existing` must be a boolean']);
    exit;
}

if (!is_string($group) || trim($group) === '') {
    http_response_code(400);
    echo json_encode(['message' => '`group` is required']);
    exit;
}

$cleanPayload = [
    'existing' => $existing,
    'group' => trim($group),
];

if ($existing) {
    if (!is_string($email) || trim($email) === '') {
        http_response_code(400);
        echo json_encode(['message' => '`email` is required when `existing` is true']);
        exit;
    }

    $email = trim($email);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['message' => '`email` must be a valid email address']);
        exit;
    }

    $cleanPayload['email'] = $email;
}

$raw = json_encode($cleanPayload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
if ($raw === false) {
    http_response_code(500);
    echo json_encode(['message' => 'Failed to encode request body']);
    exit;
}

$upstream = $url;
$sep = strpos($upstream, '?') !== false ? '&' : '?';
$upstream .= $sep . 'token=' . rawurlencode($token);

$headers = [
    'Content-Type: application/json',
    'Accept: application/json',
];
$referer = trim($qualificationReferer);
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
    $status = $status >= 100 && $status < 600 ? $status : 502;
    $data = qualification_parse_json($responseBody);
    $action = qualification_extract_action($data);
    if ($action !== '') {
        qualification_send_json(200, ['action' => $action]);
    }
    if (qualification_should_fallback_to_pending($status, $data, (string) $responseBody)) {
        qualification_log_debug('fallback_to_pending', [
            'status' => $status,
            'request' => $cleanPayload,
            'upstream' => $data ?? $responseBody,
        ]);
        qualification_send_json(200, ['action' => 'PENDING']);
    }
    qualification_log_debug('unexpected_upstream_response', [
        'status' => $status,
        'request' => $cleanPayload,
        'upstream' => $data ?? $responseBody,
    ]);
    http_response_code($status);
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
$status = $status >= 100 && $status < 600 ? $status : 502;
$data = qualification_parse_json($responseBody);
$action = qualification_extract_action($data);
if ($action !== '') {
    qualification_send_json(200, ['action' => $action]);
}
if (qualification_should_fallback_to_pending($status, $data, (string) $responseBody)) {
    qualification_log_debug('fallback_to_pending', [
        'status' => $status,
        'request' => $cleanPayload,
        'upstream' => $data ?? $responseBody,
    ]);
    qualification_send_json(200, ['action' => 'PENDING']);
}
qualification_log_debug('unexpected_upstream_response', [
    'status' => $status,
    'request' => $cleanPayload,
    'upstream' => $data ?? $responseBody,
]);
http_response_code($status);
echo $responseBody;
