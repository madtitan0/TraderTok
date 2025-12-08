   <!-- Page Styles -->
    <style>
        .markets-page {
            padding: 120px 0 60px;
            min-height: 100vh;
        }

        .markets-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .markets-header h1 {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 15px;
            color: var(--text-primary);
        }

        .markets-header p {
            font-size: 1.1rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        .market-section {
            margin-bottom: 60px;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .section-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
        }

        .section-icon svg {
            width: 32px;
            height: 32px;
            stroke: var(--text-primary);
            transition: all 0.3s ease;
        }

        .section-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: var(--brand-gradient);
            opacity: 0;
            filter: blur(15px);
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .section-header:hover .section-icon::after {
            opacity: 0.5;
        }

        .section-header:hover .section-icon svg {
            transform: scale(1.1);
            stroke: #E63946;
        }

        /* Animated icon for Live Market */
        #live-market .section-icon svg {
            animation: float 3s ease-in-out infinite;
        }

        /* Animated icon for Economic Calendar */
        #economic-calendar .section-icon svg {
            animation: pulse-icon 2s ease-in-out infinite;
        }

        /* Animated icon for Crypto */
        #crypto-market .section-icon svg {
            animation: rotate-slow 8s linear infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }

        @keyframes pulse-icon {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.9; }
        }

        @keyframes rotate-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .section-title-group h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .section-title-group p {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        /* Minimal LIVE indicator */
        .live-indicator {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: #22c55e;
            padding: 0;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1px;
            margin-left: auto;
            text-transform: uppercase;
        }

        .live-indicator::before {
            content: '';
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 8px #22c55e, 0 0 16px rgba(34, 197, 94, 0.4);
            animation: live-pulse 1.5s ease-in-out infinite;
        }

        @keyframes live-pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
                box-shadow: 0 0 8px #22c55e, 0 0 16px rgba(34, 197, 94, 0.4);
            }
            50% {
                opacity: 0.5;
                transform: scale(0.8);
                box-shadow: 0 0 4px #22c55e;
            }
        }

        /* Widget Container */
        .widget-container {
            background: var(--bg-secondary);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .widget-container iframe {
            width: 100%;
            border: none;
        }

        /* Crypto Table */
        .crypto-table-wrapper {
            background: var(--bg-secondary);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .crypto-table {
            width: 100%;
            border-collapse: collapse;
        }

        .crypto-table th {
            background: var(--bg-tertiary);
            padding: 16px 20px;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
        }

        .crypto-table th:first-child {
            padding-left: 24px;
        }

        .crypto-table td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.95rem;
            color: var(--text-primary);
            transition: background 0.2s ease;
        }

        .crypto-table td:first-child {
            padding-left: 24px;
        }

        .crypto-table tbody tr:hover td {
            background: var(--bg-tertiary);
        }

        .crypto-table tbody tr:last-child td {
            border-bottom: none;
        }

        .crypto-rank {
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.85rem;
        }

        .crypto-name-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .crypto-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .crypto-name-info {
            display: flex;
            flex-direction: column;
        }

        .crypto-name {
            font-weight: 600;
            color: var(--text-primary);
        }

        .crypto-symbol {
            font-size: 0.8rem;
            color: var(--text-secondary);
            text-transform: uppercase;
        }

        .crypto-price {
            font-weight: 600;
            font-family: 'SF Mono', 'Fira Code', monospace;
        }

        .crypto-change {
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.85rem;
            display: inline-block;
        }

        .crypto-change.positive {
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
        }

        .crypto-change.negative {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .crypto-market-cap,
        .crypto-volume {
            font-family: 'SF Mono', 'Fira Code', monospace;
            font-size: 0.9rem;
        }

        .crypto-sparkline {
            width: 120px;
            height: 40px;
        }

        /* Loading State */
        .table-loading {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            color: var(--text-secondary);
        }

        .table-loading .spinner {
            width: 40px;
            height: 40px;
            border: 3px solid var(--border-color);
            border-top-color: var(--brand-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 15px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 900px) {
            .crypto-table-wrapper {
                overflow-x: auto;
            }

            .crypto-table {
                min-width: 800px;
            }

            .section-header {
                flex-wrap: wrap;
            }

            .live-indicator {
                margin-left: 0;
                margin-top: 10px;
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 600px) {
            .markets-page {
                padding: 100px 0 40px;
            }

            .section-icon {
                width: 42px;
                height: 42px;
            }

            .section-title-group h2 {
                font-size: 1.25rem;
            }
        }

        /* TradingView Widget Dark Mode Fix */
        [data-theme="dark"] .tradingview-widget-container {
            filter: none;
        }

        [data-theme="light"] .tradingview-widget-container iframe {
            filter: invert(0);
        }
    </style>

    <!-- Main Content Section -->
    <section class="markets-page">
        <div class="container">
            <!-- Page Header -->
            <div class="markets-header">
                <h1>Markets <span class="gradient-text">Overview</span></h1>
                <p>Real-time market data, economic events, and cryptocurrency prices all in one place</p>
            </div>

            <!-- Section 1: Live Market -->
            <div class="market-section" id="live-market">
                <div class="section-header">
                    <div class="section-icon">
                        <!-- Minimal Line Chart Icon -->
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 17 9 11 13 15 21 7"/>
                            <polyline points="17 7 21 7 21 11"/>
                        </svg>
                    </div>
                    <div class="section-title-group">
                        <h2>Live Market</h2>
                        <p>Real-time quotes for major forex pairs, indices, and commodities</p>
                    </div>
                    <span class="live-indicator">LIVE</span>
                </div>
                <div class="widget-container">
                    <!-- TradingView Market Overview Widget -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                        {
                            "colorTheme": "dark",
                            "dateRange": "12M",
                            "showChart": true,
                            "locale": "en",
                            "width": "100%",
                            "height": "550",
                            "largeChartUrl": "",
                            "isTransparent": true,
                            "showSymbolLogo": true,
                            "showFloatingTooltip": true,
                            "tabs": [
                                {
                                    "title": "Forex",
                                    "symbols": [
                                        {"s": "FX:EURUSD", "d": "EUR/USD"},
                                        {"s": "FX:GBPUSD", "d": "GBP/USD"},
                                        {"s": "FX:USDJPY", "d": "USD/JPY"},
                                        {"s": "FX:USDCHF", "d": "USD/CHF"},
                                        {"s": "FX:AUDUSD", "d": "AUD/USD"},
                                        {"s": "FX:USDCAD", "d": "USD/CAD"}
                                    ],
                                    "originalTitle": "Forex"
                                },
                                {
                                    "title": "Indices",
                                    "symbols": [
                                        {"s": "FOREXCOM:SPXUSD", "d": "S&P 500"},
                                        {"s": "FOREXCOM:NSXUSD", "d": "NASDAQ 100"},
                                        {"s": "FOREXCOM:DJI", "d": "Dow Jones"},
                                        {"s": "INDEX:DAX", "d": "DAX"},
                                        {"s": "INDEX:NKY", "d": "Nikkei 225"},
                                        {"s": "INDEX:UKX", "d": "FTSE 100"}
                                    ],
                                    "originalTitle": "Indices"
                                },
                                {
                                    "title": "Commodities",
                                    "symbols": [
                                        {"s": "TVC:GOLD", "d": "Gold"},
                                        {"s": "TVC:SILVER", "d": "Silver"},
                                        {"s": "TVC:USOIL", "d": "WTI Crude Oil"},
                                        {"s": "TVC:UKOIL", "d": "Brent Crude Oil"},
                                        {"s": "TVC:PLATINUM", "d": "Platinum"},
                                        {"s": "TVC:PALLADIUM", "d": "Palladium"}
                                    ],
                                    "originalTitle": "Commodities"
                                }
                            ]
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Section 2: Economic Calendar -->
            <div class="market-section" id="economic-calendar">
                <div class="section-header">
                    <div class="section-icon">
                        <!-- Minimal Calendar Icon -->
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <circle cx="12" cy="15" r="2"/>
                        </svg>
                    </div>
                    <div class="section-title-group">
                        <h2>Economic Calendar</h2>
                        <p>Upcoming economic events and their expected impact on the markets</p>
                    </div>
                    <span class="live-indicator">LIVE</span>
                </div>
                <div class="widget-container">
                    <!-- TradingView Economic Calendar Widget -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
                        {
                            "colorTheme": "dark",
                            "isTransparent": true,
                            "width": "100%",
                            "height": "550",
                            "locale": "en",
                            "importanceFilter": "-1,0,1",
                            "countryFilter": "us,eu,gb,jp,cn,de,fr,au,ca,ch"
                        }
                        </script>
                    </div>
                </div>
            </div>

            <!-- Section 3: Cryptocurrency Market -->
            <div class="market-section" id="crypto-market">
                <div class="section-header">
                    <div class="section-icon">
                        <!-- Minimal Bitcoin/Crypto Icon -->
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M9 8h4c1.1 0 2 .9 2 2s-.9 2-2 2H9"/>
                            <path d="M9 12h4.5c1.1 0 2 .9 2 2s-.9 2-2 2H9"/>
                            <line x1="9" y1="8" x2="9" y2="16"/>
                            <line x1="11" y1="6" x2="11" y2="8"/>
                            <line x1="13" y1="6" x2="13" y2="8"/>
                            <line x1="11" y1="16" x2="11" y2="18"/>
                            <line x1="13" y1="16" x2="13" y2="18"/>
                        </svg>
                    </div>
                    <div class="section-title-group">
                        <h2>Cryptocurrency Market</h2>
                        <p>Top cryptocurrencies by market capitalization with real-time data</p>
                    </div>
                    <span class="live-indicator">LIVE</span>
                </div>
                <div class="crypto-table-wrapper">
                    <table class="crypto-table" id="cryptoTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>24h %</th>
                                <th>7d %</th>
                                <th>Market Cap</th>
                                <th>Volume (24h)</th>
                                <th>Last 7 Days</th>
                            </tr>
                        </thead>
                        <tbody id="cryptoTableBody">
                            <tr>
                                <td colspan="8">
                                    <div class="table-loading">
                                        <div class="spinner"></div>
                                        <span>Loading cryptocurrency data...</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Cryptocurrency Data Script -->
    <script>
        // CoinGecko API - Free, no API key required
        const COINGECKO_API = 'https://api.coingecko.com/api/v3';

        // Format currency
        function formatCurrency(num) {
            if (num >= 1e12) return '$' + (num / 1e12).toFixed(2) + 'T';
            if (num >= 1e9) return '$' + (num / 1e9).toFixed(2) + 'B';
            if (num >= 1e6) return '$' + (num / 1e6).toFixed(2) + 'M';
            if (num >= 1e3) return '$' + (num / 1e3).toFixed(2) + 'K';
            return '$' + num.toFixed(2);
        }

        // Format price with appropriate decimals
        function formatPrice(price) {
            if (price >= 1000) return '$' + price.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            if (price >= 1) return '$' + price.toFixed(2);
            if (price >= 0.01) return '$' + price.toFixed(4);
            return '$' + price.toFixed(6);
        }

        // Format percentage change
        function formatChange(change) {
            const isPositive = change >= 0;
            const formattedChange = Math.abs(change).toFixed(2);
            return {
                value: (isPositive ? '+' : '-') + formattedChange + '%',
                class: isPositive ? 'positive' : 'negative'
            };
        }

        // Create mini sparkline SVG
        function createSparkline(data, isPositive) {
            if (!data || data.length === 0) return '';

            const width = 120;
            const height = 40;
            const padding = 2;

            const min = Math.min(...data);
            const max = Math.max(...data);
            const range = max - min || 1;

            const points = data.map((value, index) => {
                const x = padding + (index / (data.length - 1)) * (width - 2 * padding);
                const y = height - padding - ((value - min) / range) * (height - 2 * padding);
                return `${x},${y}`;
            }).join(' ');

            const color = isPositive ? '#22c55e' : '#ef4444';

            return `
                <svg class="crypto-sparkline" viewBox="0 0 ${width} ${height}">
                    <polyline
                        fill="none"
                        stroke="${color}"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        points="${points}"
                    />
                </svg>
            `;
        }

        // Fetch and render crypto data
        async function fetchCryptoData() {
            try {
                const response = await fetch(
                    `${COINGECKO_API}/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=20&page=1&sparkline=true&price_change_percentage=24h,7d`
                );

                if (!response.ok) throw new Error('API request failed');

                const data = await response.json();
                renderCryptoTable(data);
            } catch (error) {
                console.error('Error fetching crypto data:', error);
                document.getElementById('cryptoTableBody').innerHTML = `
                    <tr>
                        <td colspan="8">
                            <div class="table-loading">
                                <span style="color: #ef4444;">Failed to load data. Please refresh the page.</span>
                            </div>
                        </td>
                    </tr>
                `;
            }
        }

        // Render crypto table
        function renderCryptoTable(coins) {
            const tbody = document.getElementById('cryptoTableBody');

            tbody.innerHTML = coins.map((coin, index) => {
                const change24h = formatChange(coin.price_change_percentage_24h || 0);
                const change7d = formatChange(coin.price_change_percentage_7d_in_currency || 0);
                const sparklineData = coin.sparkline_in_7d?.price || [];
                const isPositive7d = (coin.price_change_percentage_7d_in_currency || 0) >= 0;

                return `
                    <tr>
                        <td><span class="crypto-rank">${coin.market_cap_rank}</span></td>
                        <td>
                            <div class="crypto-name-cell">
                                <img src="${coin.image}" alt="${coin.name}" class="crypto-icon" loading="lazy">
                                <div class="crypto-name-info">
                                    <span class="crypto-name">${coin.name}</span>
                                    <span class="crypto-symbol">${coin.symbol}</span>
                                </div>
                            </div>
                        </td>
                        <td><span class="crypto-price">${formatPrice(coin.current_price)}</span></td>
                        <td><span class="crypto-change ${change24h.class}">${change24h.value}</span></td>
                        <td><span class="crypto-change ${change7d.class}">${change7d.value}</span></td>
                        <td><span class="crypto-market-cap">${formatCurrency(coin.market_cap)}</span></td>
                        <td><span class="crypto-volume">${formatCurrency(coin.total_volume)}</span></td>
                        <td>${createSparkline(sparklineData, isPositive7d)}</td>
                    </tr>
                `;
            }).join('');
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            fetchCryptoData();

            // Refresh crypto data every 60 seconds
            setInterval(fetchCryptoData, 60000);
        });

        // Update TradingView widget theme based on current theme
        function updateWidgetTheme() {
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            // TradingView widgets will need page refresh to change theme
            // This is a limitation of their embed widgets
        }
    </script>
