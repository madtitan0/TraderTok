<?php
/**
 * Normalizes the CDN cache file so api.php can keep using $api[0] unchanged.
 * The remote JSON may be either [ { config } ] or a single object with ->menus.
 * Removes empty/invalid JSON so api.php can re-fetch instead of fatalling on $api[0].
 */
$key = 'f2f7ef3b-8168-4a6e-be8d-aab31fdb980e';
$localFile = __DIR__ . "/cache_$key.json";
$remoteUrl = "https://cdn-customer.theteampower.com/data/$key.json";
$jsonFlags = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;

$isUsableConfig = function ($decoded) {
    if (!is_array($decoded) || !isset($decoded[0]) || !is_object($decoded[0])) {
        return false;
    }

    return isset($decoded[0]->menus);
};

$writeIfValid = function ($decoded) use ($localFile, $jsonFlags, $isUsableConfig) {
    if ($isUsableConfig($decoded)) {
        file_put_contents($localFile, json_encode($decoded, $jsonFlags));

        return true;
    }
    if (is_object($decoded) && isset($decoded->menus)) {
        file_put_contents($localFile, json_encode([$decoded], $jsonFlags));

        return true;
    }

    return false;
};

$tryRemote = function () use ($remoteUrl, $writeIfValid) {
    $json = @file_get_contents($remoteUrl);
    if ($json === false || $json === '') {
        return false;
    }
    $decoded = json_decode($json);

    return $writeIfValid($decoded);
};

if (!file_exists($localFile)) {
    $tryRemote();

    return;
}

$raw = @file_get_contents($localFile);
if ($raw === false || trim((string) $raw) === '') {
    @unlink($localFile);
    $tryRemote();

    return;
}

$decoded = json_decode($raw);
if ($decoded === null) {
    @unlink($localFile);
    $tryRemote();

    return;
}

if ($isUsableConfig($decoded)) {
    return;
}

if (is_object($decoded) && isset($decoded->menus)) {
    file_put_contents($localFile, json_encode([$decoded], $jsonFlags));

    return;
}

@unlink($localFile);
$tryRemote();
