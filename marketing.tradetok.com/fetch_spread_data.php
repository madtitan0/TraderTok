<?php
/**
 * Called by the browser only when it decides the JSON is stale (> 5 min).
 * Always fetches fresh data from the API, writes last_updated to JSON, returns result.
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$apiKey    = 'YX7eGYjQQm0iz5XNKpyviWi790shhrZ0c2d24bIBJo8LGcRB';
$cacheFile = __DIR__ . '/spread_data.json';
$symbols   = ['EURUSD','GBPUSD','AUDUSD','XAUUSD'];

$data = [];
foreach ($symbols as $symbol) {
    $url = 'https://api.realmarketapi.com/api/v1/price'
         . '?apiKey='     . urlencode($apiKey)
         . '&symbolCode=' . urlencode($symbol)
         . '&timeFrame=M5';

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_SSL_VERIFYPEER => true,
    ]);
    $response = curl_exec($ch);
    $code     = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code === 200 && $response) {
        $d      = json_decode($response, true);
        $close  = (float)($d['closePrice'] ?? $d['ClosePrice'] ?? 0);
        $open   = (float)($d['openPrice']  ?? $d['OpenPrice']  ?? 0);
        $bid    = (float)($d['bid']        ?? $d['Bid']        ?? $close);
        $ask    = (float)($d['ask']        ?? $d['Ask']        ?? $close);
        $change = $open != 0 ? round((($close - $open) / $open) * 100, 4) : 0;
        $data[] = [
            'pair'   => $symbol,
            'bid'    => $bid,
            'ask'    => $ask,
            'change' => $change,
            'spread' => round(abs($ask - $bid), 6),
        ];
    }
}

if (!empty($data)) {
    $payload = [
        'last_updated'    => time(),
        'last_updated_dt' => date('Y-m-d H:i:s'),
        'data'            => $data,
    ];
    $tmp = $cacheFile . '.tmp';
    file_put_contents($tmp, json_encode($payload, JSON_PRETTY_PRINT));
    rename($tmp, $cacheFile);
    echo json_encode($payload);
    exit;
}

if (file_exists($cacheFile)) {
    echo file_get_contents($cacheFile);
    exit;
}

echo json_encode(['last_updated' => 0, 'last_updated_dt' => '', 'data' => []]);
