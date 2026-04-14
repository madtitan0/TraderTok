<?php

/**
 * Newsletter signup for Education Hub — appends JSON lines to data/newsletter-leads.jsonl
 */
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!is_array($data)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Invalid request']);
    exit;
}

if (!empty($data['website'])) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Invalid request']);
    exit;
}

$email = isset($data['email']) ? trim((string) $data['email']) : '';
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

$consent = !empty($data['consent']);
if (!$consent) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Consent is required to subscribe.']);
    exit;
}

$name = isset($data['name']) ? trim((string) $data['name']) : '';
if (strlen($name) > 120) {
    $name = substr($name, 0, 120);
}

$record = [
    'source' => 'education_hub_newsletter',
    'email' => $email,
    'name' => $name,
    'ts' => gmdate('c'),
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
];

$dir = dirname(__DIR__) . '/data';
$file = $dir . '/newsletter-leads.jsonl';

if (!is_dir($dir)) {
    if (!@mkdir($dir, 0755, true)) {
        http_response_code(500);
        echo json_encode(['ok' => false, 'message' => 'Could not save subscription. Please try again later.']);
        exit;
    }
}

$line = json_encode($record, JSON_UNESCAPED_UNICODE) . "\n";
if (file_put_contents($file, $line, FILE_APPEND | LOCK_EX) === false) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Could not save subscription. Please try again later.']);
    exit;
}

echo json_encode(['ok' => true, 'message' => 'Thanks — you are subscribed.']);
