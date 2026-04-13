<?php
$market_sections = [
    'Daily Market Brief',
    'Weekly Outlook',
    'Forex Analysis',
    'Gold & Commodities',
    'Indices Watch',
    'Major Economic Events',
    'Central Bank Watch',
];

$latest_updates = [
    [
        'label' => 'Forex Analysis',
        'title' => 'USD Strength Holds as Rate Expectations Stay in Focus',
        'summary' => 'A look at how rate expectations, inflation trends, and risk sentiment continue to shape major forex pairs.',
        'time' => 'Updated today',
    ],
    [
        'label' => 'Gold & Commodities',
        'title' => 'Gold Outlook: Safe-Haven Demand and Yield Pressure',
        'summary' => 'An educational breakdown of the factors that often influence gold pricing, including yields, risk-off sentiment, and macro uncertainty.',
        'time' => 'Updated today',
    ],
    [
        'label' => 'Indices Watch',
        'title' => 'Equity Indices React to Earnings and Macro Signals',
        'summary' => 'A broader view of how earnings releases and economic expectations can affect index sentiment across global markets.',
        'time' => 'Updated this week',
    ],
    [
        'label' => 'Central Bank Watch',
        'title' => 'Why Central Bank Language Still Moves the Market',
        'summary' => 'A simple educational commentary on how central bank guidance influences currencies, commodities, and broader risk appetite.',
        'time' => 'Updated this week',
    ],
];

$economic_events = [
    ['time' => '08:30', 'region' => 'USD', 'event' => 'Inflation Data Release', 'impact' => 'High Impact'],
    ['time' => '10:00', 'region' => 'EUR', 'event' => 'Central Bank Commentary', 'impact' => 'Medium Impact'],
    ['time' => '13:00', 'region' => 'GBP', 'event' => 'Employment Data Update', 'impact' => 'High Impact'],
    ['time' => '15:30', 'region' => 'CAD', 'event' => 'Rate Statement', 'impact' => 'High Impact'],
];

$archive_items = [
    ['date' => 'April 2026', 'title' => 'Weekly Market Outlook: Rates, Inflation, and Risk Sentiment'],
    ['date' => 'March 2026', 'title' => 'Gold Market Outlook: Macro Drivers Behind Recent Volatility'],
    ['date' => 'March 2026', 'title' => 'Forex Market News: What Moved the Dollar This Week'],
    ['date' => 'February 2026', 'title' => 'Trading Market Analysis: Indices, Commodities, and Central Bank Themes'],
];

$market_drivers = [
    [
        'title' => 'Interest Rate Expectations',
        'description' => 'Changes in rate expectations can influence currencies, index sentiment, and commodity pricing across multiple regions.',
    ],
    [
        'title' => 'Inflation and Growth Data',
        'description' => 'Economic releases often shift market expectations around central bank policy, consumer demand, and risk appetite.',
    ],
    [
        'title' => 'Risk Sentiment',
        'description' => 'Market tone can change quickly when traders move between risk-on and risk-off behaviour during uncertainty.',
    ],
    [
        'title' => 'Commodity and Energy Moves',
        'description' => 'Oil and gold often provide clues about inflation pressure, geopolitical concerns, and defensive positioning.',
    ],
];

$outlook_points = [
    'Watch how central bank commentary changes expectations rather than focusing only on the headline decision.',
    'Compare forex reactions with gold and index moves to understand whether the market is seeking risk or safety.',
    'Use major economic events as context for volatility, not as standalone trading signals.',
];
?>

<section class="education-subpage education-subpage--market-news">
    <section class="education-subpage-hero education-subpage-hero--market-news">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">Market Commentary</div>
            <h1 class="education-subpage-title">Market News &amp; Insights</h1>
            <p class="education-subpage-subtitle">
                Stay updated with TraderTok market news, weekly outlooks, forex analysis, gold insights, and major economic events shaping the markets.
            </p>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="education-user-strip">
                <div class="education-user-strip-card">
                    <div class="education-article-meta">Educational Framing</div>
                    <h3>Market commentary designed to support learning, not investment decisions</h3>
                    <p>This section is presented as market commentary and educational analysis. It is intended to help users understand how global events, macro themes, and financial instruments interact across the market environment.</p>
                </div>
                <div class="education-user-strip-card">
                    <div class="education-article-meta">What You’ll Find</div>
                    <h3>Structured coverage of key themes that affect forex, gold, indices, and macro sentiment</h3>
                    <p>Users can follow daily briefs, weekly outlooks, analyst commentary, and important economic events in one place without losing the consistent educational tone used across the Academy.</p>
                </div>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">What Usually Moves the Market</h2>
                <p class="education-subpage-section-subtitle">A quick reference section to help users understand the main drivers behind the commentary they see on this page.</p>
            </div>

            <div class="market-drivers-grid">
                <?php foreach ($market_drivers as $driver): ?>
                    <article class="market-driver-card">
                        <div class="education-article-meta">Key Driver</div>
                        <h3><?php echo htmlspecialchars($driver['title']); ?></h3>
                        <p><?php echo htmlspecialchars($driver['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Coverage Areas</h2>
                <p class="education-subpage-section-subtitle">The page is organized around the core market topics users often follow most closely.</p>
            </div>

            <div class="market-news-section-grid">
                <?php foreach ($market_sections as $section): ?>
                    <article class="market-news-section-card">
                        <div class="education-article-meta">Sub-section</div>
                        <h3><?php echo htmlspecialchars($section); ?></h3>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Featured Insight</h2>
                <p class="education-subpage-section-subtitle">A lead educational analysis piece that gives users broader context before they move into shorter updates.</p>
            </div>

            <section class="market-featured-insight">
                <div class="market-featured-insight-copy">
                    <div class="education-article-meta">Weekly Outlook</div>
                    <h3>How Rates, Inflation, and Risk Sentiment Are Shaping This Week’s Market Tone</h3>
                    <p>This featured insight brings together the bigger themes behind the current market backdrop, including central bank expectations, macro data, and how traders often interpret shifting sentiment across currencies, gold, and indices.</p>
                    <div class="education-mini-note">Educational note: this commentary is intended to explain market dynamics and does not constitute investment advice.</div>
                </div>
                <div class="market-featured-insight-panel">
                    <div class="market-highlight-row">
                        <span>Focus 1</span>
                        <strong>Weekly Market Outlook</strong>
                    </div>
                    <div class="market-highlight-row">
                        <span>Focus 2</span>
                        <strong>Central Bank Watch</strong>
                    </div>
                    <div class="market-highlight-row">
                        <span>Focus 3</span>
                        <strong>Major Economic Events</strong>
                    </div>
                </div>
            </section>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Latest Market Updates</h2>
                <p class="education-subpage-section-subtitle">Shorter educational commentary pieces covering forex market news, gold outlooks, index moves, and macro developments.</p>
            </div>

            <div class="education-article-grid market-news-updates-grid">
                <?php foreach ($latest_updates as $update): ?>
                    <article class="education-article-card">
                        <div class="education-article-card-body">
                            <div class="education-article-meta"><?php echo htmlspecialchars($update['label']); ?></div>
                            <h3><?php echo htmlspecialchars($update['title']); ?></h3>
                            <p><?php echo htmlspecialchars($update['summary']); ?></p>
                            <div class="education-mini-note"><?php echo htmlspecialchars($update['time']); ?></div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Upcoming Economic Events</h2>
                <p class="education-subpage-section-subtitle">A simple event view to help users understand which releases and policy updates may matter across the market week.</p>
            </div>

            <div class="market-events-panel">
                <?php foreach ($economic_events as $event): ?>
                    <div class="market-event-row">
                        <div class="market-event-time"><?php echo htmlspecialchars($event['time']); ?></div>
                        <div class="market-event-main">
                            <h3><?php echo htmlspecialchars($event['event']); ?></h3>
                            <p><?php echo htmlspecialchars($event['region']); ?> • <?php echo htmlspecialchars($event['impact']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Weekly Outlook</h2>
                <p class="education-subpage-section-subtitle">A broader look at the themes likely to influence market behaviour over the coming week.</p>
            </div>

            <section class="market-weekly-outlook">
                <div class="market-weekly-outlook-card">
                    <div class="education-article-meta">Weekly Market Outlook</div>
                    <h3>Key Themes to Watch Across Forex, Gold, Indices, and Macro Releases</h3>
                    <p>The weekly outlook brings together the main educational talking points that users can monitor throughout the week, from macro data and risk sentiment to central bank commentary and commodity reactions.</p>
                    <ul class="market-outlook-list">
                        <?php foreach ($outlook_points as $point): ?>
                            <li><?php echo htmlspecialchars($point); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Analyst Commentary Archive</h2>
                <p class="education-subpage-section-subtitle">An archive of educational analysis pieces users can browse for broader market context.</p>
            </div>

            <div class="market-archive-list">
                <?php foreach ($archive_items as $item): ?>
                    <article class="market-archive-item">
                        <div class="market-archive-date"><?php echo htmlspecialchars($item['date']); ?></div>
                        <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                    </article>
                <?php endforeach; ?>
            </div>

            <section class="education-user-strip education-user-strip--single">
                <div class="education-user-strip-card market-disclaimer-card">
                    <div class="education-article-meta">Important Editorial Note</div>
                    <h3>This page is market commentary for educational purposes only</h3>
                    <p>All content in this section is provided as educational market commentary and general analysis. It does not constitute investment advice, personal recommendations, or a solicitation to trade any financial instrument. Trading and investing involve risk, and users should evaluate market information carefully within their own circumstances.</p>
                </div>
            </section>
        </div>
    </section>
</section>
