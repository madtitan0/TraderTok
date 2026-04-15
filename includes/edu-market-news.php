<?php
$topics = [
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
        'summary' => 'How rate expectations, inflation trends, and risk sentiment continue to shape major forex pairs.',
        'time' => 'Updated today',
    ],
    [
        'label' => 'Gold & Commodities',
        'title' => 'Gold Outlook: Safe-Haven Demand and Yield Pressure',
        'summary' => 'Factors that often influence gold pricing: yields, risk sentiment, and macro uncertainty.',
        'time' => 'Updated today',
    ],
    [
        'label' => 'Indices Watch',
        'title' => 'Equity Indices React to Earnings and Macro Signals',
        'summary' => 'How earnings and economic expectations can affect index sentiment across global markets.',
        'time' => 'Updated this week',
    ],
    [
        'label' => 'Central Bank Watch',
        'title' => 'Why Central Bank Language Still Moves the Market',
        'summary' => 'How guidance influences currencies, commodities, and broader risk appetite.',
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

$outlook_points = [
    'Watch how central bank commentary shifts expectations—not only the headline decision.',
    'Compare forex with gold and indices to see whether markets favour risk or safety.',
    'Treat economic releases as context for volatility, not standalone signals.',
];
?>

<section class="education-subpage education-subpage--market-news">
    <section class="education-subpage-hero education-subpage-hero--market-news">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">Market commentary</div>
            <h1 class="education-subpage-title">Market News &amp; Insights</h1>
            <p class="education-subpage-subtitle">
                Market news and analysis in one place: forex, gold, indices, and macro themes—framed for learning, not recommendations.
            </p>
            <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <section class="education-user-strip education-user-strip--single">
                <div class="education-user-strip-card">
                    <div class="education-article-meta">Educational analysis only</div>
                    <h3>Commentary for context, not investment advice</h3>
                    <p>
                        This page is <strong>market commentary and educational analysis</strong>. It helps you see how events and themes connect across forex, commodities, and indices.
                        It does not constitute personal recommendations or a solicitation to trade. Trading involves risk; always make your own decisions.
                    </p>
                </div>
            </section>

            <div class="education-subpage-header" style="padding-top: 20px;">
                <h2 class="education-subpage-section-title">Daily market brief</h2>
                <p class="education-subpage-section-subtitle">A short snapshot of tone and themes—use it alongside the sections below.</p>
            </div>

            <div class="market-daily-brief">
                <p>
                    Major pairs remain sensitive to rate expectations and scheduled data this week. Gold and indices are moving with the same macro backdrop—yields, growth worries, and headline risk.
                    Use the <strong>latest updates</strong> and <strong>weekly outlook</strong> for more detail; treat all of it as educational context.
                </p>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">What we cover</h2>
                <p class="education-subpage-section-subtitle">Topics this hub ties together in one narrative.</p>
            </div>

            <ul class="market-topics-list" aria-label="Coverage topics">
                <?php foreach ($topics as $topic): ?>
                    <li><?php echo htmlspecialchars($topic); ?></li>
                <?php endforeach; ?>
            </ul>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Featured insight</h2>
                <p class="education-subpage-section-subtitle">Broader context before shorter updates.</p>
            </div>

            <section class="market-featured-insight">
                <div class="market-featured-insight-copy">
                    <div class="education-article-meta">Weekly outlook</div>
                    <h3>How rates, inflation, and risk sentiment are shaping the tone of the week</h3>
                    <p>Central bank expectations, macro data, and how traders read risk-on versus risk-off behaviour across currencies, gold, and indices.</p>
                </div>
                <div class="market-featured-insight-panel">
                    <div class="market-highlight-row">
                        <span>Focus</span>
                        <strong>Weekly market outlook</strong>
                    </div>
                    <div class="market-highlight-row">
                        <span>Focus</span>
                        <strong>Central bank watch</strong>
                    </div>
                    <div class="market-highlight-row">
                        <span>Focus</span>
                        <strong>Major economic events</strong>
                    </div>
                </div>
            </section>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Latest market updates</h2>
                <p class="education-subpage-section-subtitle">Short commentary pieces—forex market news, gold outlooks, and index context.</p>
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
                <h2 class="education-subpage-section-title">Upcoming economic events</h2>
                <p class="education-subpage-section-subtitle">Illustrative schedule—releases that often add volatility.</p>
            </div>

            <div class="market-events-panel">
                <?php foreach ($economic_events as $event): ?>
                    <div class="market-event-row">
                        <div class="market-event-time"><?php echo htmlspecialchars($event['time']); ?></div>
                        <div class="market-event-main">
                            <h3><?php echo htmlspecialchars($event['event']); ?></h3>
                            <p><?php echo htmlspecialchars($event['region']); ?> · <?php echo htmlspecialchars($event['impact']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Weekly outlook</h2>
                <p class="education-subpage-section-subtitle">Themes to watch across the week.</p>
            </div>

            <section class="market-weekly-outlook">
                <div class="market-weekly-outlook-card">
                    <div class="education-article-meta">Outlook</div>
                    <h3>Forex, gold, indices, and macro releases</h3>
                    <ul class="market-outlook-list">
                        <?php foreach ($outlook_points as $point): ?>
                            <li><?php echo htmlspecialchars($point); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Analyst commentary archive</h2>
                <p class="education-subpage-section-subtitle">Earlier outlook-style titles for context.</p>
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
                    <div class="education-article-meta">Important note</div>
                    <h3>Educational market commentary only</h3>
                    <p>
                        Content here is general analysis for learning. It is not investment advice, a personal recommendation, or an offer to trade.
                        TraderTok is regulated in Mauritius; always read official risk disclosures and terms before trading.
                    </p>
                </div>
            </section>

            <?php include __DIR__ . '/partials/education-hub-account-ctas.php'; ?>
        </div>
    </section>
</section>
