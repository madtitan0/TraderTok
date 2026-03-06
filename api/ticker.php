<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');



$cache_file = __DIR__ . '/../cache/ticker.json';
$lock_file = __DIR__ . '/../cache/ticker.lock';
$cache_time = 180; // 3 minutes (180 seconds)

// Create cache directory if it doesn't exist and ensure it is writable
if (!file_exists(__DIR__ . '/../cache')) {
    mkdir(__DIR__ . '/../cache', 0777, true);
}

// Check if cache exists and is fresh BEFORE trying to lock (fast path)
if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_time)) {
    echo file_get_contents($cache_file);
    exit;
}

// If cache is stale or missing, try to acquire an exclusive lock
$fp = @fopen($lock_file, 'c+'); // 'c+' is safer for locking

if ($fp && flock($fp, LOCK_EX | LOCK_NB)) {
    // We got the lock! It is our responsibility to fetch fresh data.
    
    // Double check the cache just in case another process *just* updated it and released the lock
    if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_time)) {
        echo file_get_contents($cache_file);
        flock($fp, LOCK_UN);
        fclose($fp);
        exit;
    }

// API Keys
$api_keys = [
    'finnhub' => 'd6k47v9r01qko8c3aov0d6k47v9r01qko8c3aovg',
    'alpha_vantage' => 'P8CMFAKORAGXV13C',
    'twelve_data' => 'b58765051219452198c23b8d25864b81'
];

$symbols = [
    ['symbol' => 'BTC/USDT', 'type' => 'crypto', 'binance_symbol' => 'BTCUSDT', 'finnhub_symbol' => 'BINANCE:BTCUSDT', 'display' => 'BTC/USD'],
    ['symbol' => 'ETH/USDT', 'type' => 'crypto', 'binance_symbol' => 'ETHUSDT', 'finnhub_symbol' => 'BINANCE:ETHUSDT', 'display' => 'ETH/USD'],
    ['symbol' => 'XRP/USDT', 'type' => 'crypto', 'binance_symbol' => 'XRPUSDT', 'finnhub_symbol' => 'BINANCE:XRPUSDT', 'display' => 'XRP/USD'],
    ['symbol' => 'ADA/USDT', 'type' => 'crypto', 'binance_symbol' => 'ADAUSDT', 'finnhub_symbol' => 'BINANCE:ADAUSDT', 'display' => 'ADA/USD'],
    ['symbol' => 'SOL/USDT', 'type' => 'crypto', 'binance_symbol' => 'SOLUSDT', 'finnhub_symbol' => 'BINANCE:SOLUSDT', 'display' => 'SOL/USD'],
    ['symbol' => 'EUR/USD', 'type' => 'forex', 'finnhub_symbol' => 'OANDA:EUR_USD', 'td_symbol' => 'EUR/USD'],
    ['symbol' => 'GBP/USD', 'type' => 'forex', 'finnhub_symbol' => 'OANDA:GBP_USD', 'td_symbol' => 'GBP/USD'],
    ['symbol' => 'USD/JPY', 'type' => 'forex', 'finnhub_symbol' => 'OANDA:USD_JPY', 'td_symbol' => 'USD/JPY'],
    ['symbol' => 'SPY', 'type' => 'index', 'finnhub_symbol' => 'SPY', 'display' => 'S&P 500'], // SPY ETF proxy for S&P 500
    ['symbol' => 'DAX', 'type' => 'index', 'finnhub_symbol' => 'DAX', 'display' => 'DAX 40'], // GlobalX DAX proxy
    ['symbol' => 'QQQ', 'type' => 'index', 'finnhub_symbol' => 'QQQ', 'display' => 'NASDAQ'], // QQQ ETF proxy
    ['symbol' => 'AAPL', 'type' => 'stock', 'finnhub_symbol' => 'AAPL'],
    ['symbol' => 'NVDA', 'type' => 'stock', 'finnhub_symbol' => 'NVDA'],
    ['symbol' => 'GOOGL', 'type' => 'stock', 'finnhub_symbol' => 'GOOGL'],
    ['symbol' => 'TM', 'type' => 'stock', 'finnhub_symbol' => 'TM', 'display' => 'TOYOTA'], // TM ADR
    ['symbol' => 'BABA', 'type' => 'stock', 'finnhub_symbol' => 'BABA'],
    ['symbol' => 'GLD', 'type' => 'commodity', 'finnhub_symbol' => 'GLD', 'display' => 'GOLD'], // GLD ETF proxy
    ['symbol' => 'USO', 'type' => 'commodity', 'finnhub_symbol' => 'USO', 'display' => 'WTI OIL'], // USO ETF proxy
    ['symbol' => 'UNG', 'type' => 'commodity', 'finnhub_symbol' => 'UNG', 'display' => 'NAT GAS']  // UNG ETF proxy
];

function fetch_from_url($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Increased timeout
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
    $result = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code == 200 && $result) {
        return json_decode($result, true);
    }
    return null;
}

$results = [];

foreach ($symbols as $item) {
    $display_symbol = isset($item['display']) ? $item['display'] : $item['symbol'];
    $data_point = [
        'id' => strtolower(str_replace(['/', ' '], ['_', ''], $display_symbol)),
        'symbol' => $display_symbol,
        'type' => $item['type'],
        'price' => 0,
        'change' => 0,
        'percent' => 0,
        'source' => 'unknown'
    ];

    $success = false;

    if ($item['type'] === 'crypto') {
        // 1. Binance Public API
        $url = "https://api.binance.com/api/v3/ticker/24hr?symbol=" . urlencode($item['binance_symbol']);
        $res = fetch_from_url($url);
        if ($res && isset($res['lastPrice'])) {
            $data_point['price'] = (float)$res['lastPrice'];
            $data_point['percent'] = (float)$res['priceChangePercent'];
            $data_point['change'] = (float)$res['priceChange'];
            $data_point['source'] = 'binance';
            $success = true;
        }

        // 2. Cryptocompare or other fallback if needed, but here we use Finnhub as general fallback below
    }

    // Fallback Logic: Finnhub -> Alpha Vantage -> Twelve Data
    if (!$success) {
        // 1. Finnhub
        $symbol_param = isset($item['finnhub_symbol']) ? $item['finnhub_symbol'] : $item['symbol'];
        $url = "https://finnhub.io/api/v1/quote?symbol=" . urlencode($symbol_param) . "&token=" . $api_keys['finnhub'];
        $res = fetch_from_url($url);
        if ($res && isset($res['c']) && (float)$res['c'] > 0) {
            $data_point['price'] = (float)$res['c'];
            $data_point['change'] = (float)$res['d'];
            $data_point['percent'] = (float)$res['dp'];
            $data_point['source'] = 'finnhub';
            $success = true;
        }

        // 2. Alpha Vantage
        if (!$success) {
            $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=" . urlencode($item['symbol']) . "&apikey=" . $api_keys['alpha_vantage'];
            $res = fetch_from_url($url);
            if ($res && isset($res['Global Quote']['05. price'])) {
                $data_point['price'] = (float)$res['Global Quote']['05. price'];
                $data_point['change'] = (float)$res['Global Quote']['09. change'];
                $data_point['percent'] = (float)str_replace('%', '', $res['Global Quote']['10. change percent']);
                $data_point['source'] = 'alpha_vantage';
                $success = true;
            }
        }

        // 3. Twelve Data
        if (!$success) {
            $symbol_param = isset($item['td_symbol']) ? $item['td_symbol'] : $item['symbol'];
            $url = "https://api.twelvedata.com/quote?symbol=" . urlencode($symbol_param) . "&apikey=" . $api_keys['twelve_data'];
            $res = fetch_from_url($url);
            if ($res && isset($res['close'])) {
                $data_point['price'] = (float)$res['close'];
                $data_point['change'] = (float)$res['change'];
                $data_point['percent'] = (float)$res['percent_change'];
                $data_point['source'] = 'twelvedata';
                $success = true;
            }
        }
    }

    $results[] = $data_point;
}

$output = json_encode($results);
file_put_contents($cache_file, $output);

// Release the lock
flock($fp, LOCK_UN);
fclose($fp);

echo $output;
} else {
    // We couldn't get the lock. Another process is currently fetching fresh data from the APIs.
    // Instead of waiting (which could hang the request) or fetching ourselves (which causes the race condition),
    // we just serve the slightly stale cache file if it exists, or a default empty array if this is the very first run ever.
    if (file_exists($cache_file)) {
        echo file_get_contents($cache_file);
    } else {
        echo "[]";
    }
    if ($fp) fclose($fp);
}
