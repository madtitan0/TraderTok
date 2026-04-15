<?php
$tutorial_sections = [
    [
        'label' => 'Getting Started',
        'title' => 'A simple first step for users who are new to the platform',
        'description' => 'Understand the platform layout, where to find key tools, and how to begin using the desktop or mobile experience with confidence.',
    ],
    [
        'label' => 'How to Log In',
        'title' => 'Access your platform securely and understand the main login flow',
        'description' => 'A walkthrough of how users typically log in, switch between devices, and confirm they are working inside the correct account environment.',
    ],
    [
        'label' => 'How to Read Charts',
        'title' => 'Learn what users are looking at when they open a market chart',
        'description' => 'Covers chart basics, timeframes, price movement, and how to make chart views easier to interpret.',
    ],
    [
        'label' => 'How to Place an Order',
        'title' => 'Understand the basic flow of placing a trade on the platform',
        'description' => 'Introduces the core elements users review before placing an order, including instrument, volume, and execution type.',
    ],
    [
        'label' => 'Stop-Loss and Take-Profit',
        'title' => 'Learn how protection and exit levels are set within the platform',
        'description' => 'Explains how stop-loss and take-profit levels help users structure trade management more clearly.',
    ],
    [
        'label' => 'Monitor Open Positions',
        'title' => 'Follow active trades and understand what platform data means',
        'description' => 'Shows how users can review open positions, floating P/L, and position details while a trade is active.',
    ],
    [
        'label' => 'Mobile Trading',
        'title' => 'Use the trading app to monitor markets and manage activity on the go',
        'description' => 'Highlights how platform actions translate to the mobile experience, including monitoring, chart access, and order management.',
    ],
];

$quick_start_steps = [
    'Log in to the platform and confirm you are in the correct account environment.',
    'Open a chart and identify the instrument and timeframe you want to review.',
    'Learn where order entry, open positions, and account information are displayed.',
    'Practice using stop-loss and take-profit tools before focusing on live trade management.',
];

$mobile_highlights = [
    'Check watchlists and price movement while away from desktop.',
    'Open charts quickly and switch between timeframes.',
    'Review open positions and update trade parameters from the app.',
];
?>

<section class="education-subpage education-subpage--tutorials">
    <section class="education-subpage-hero education-subpage-hero--tutorials">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">Platform Tutorials</div>
            <h1 class="education-subpage-title">Platform Tutorials</h1>
            <p class="education-subpage-subtitle">
                Learn how to use TraderTok trading platforms with beginner-friendly tutorials on charts, order types, stop-loss, take-profit, and mobile trading.
            </p>
            <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="education-user-strip">
                <div class="education-user-strip-card">
                    <div class="education-article-meta">Who This Helps</div>
                    <h3>Useful for users learning how to move around the platform with more confidence</h3>
                    <p>This section is designed for users who want practical guidance on how platform tools work, where to find them, and how to use the trading interface more comfortably.</p>
                </div>
                <div class="education-user-strip-card">
                    <div class="education-article-meta">What You’ll Learn</div>
                    <h3>Core platform actions across desktop and mobile</h3>
                    <p>The tutorials focus on the tasks users usually need first, including logging in, reading charts, placing orders, setting trade parameters, and monitoring positions.</p>
                </div>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Quick Start</h2>
                <p class="education-subpage-section-subtitle">A simple sequence users can follow when getting familiar with the trading platform for the first time.</p>
            </div>

            <section class="tutorial-quick-start">
                <?php foreach ($quick_start_steps as $index => $step): ?>
                    <article class="tutorial-step-card">
                        <div class="tutorial-step-number"><?php echo $index + 1; ?></div>
                        <p><?php echo htmlspecialchars($step); ?></p>
                    </article>
                <?php endforeach; ?>
            </section>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Tutorial Sections</h2>
                <p class="education-subpage-section-subtitle">The page is structured around the core actions most users want to understand when using a trading platform.</p>
            </div>

            <div class="tutorial-section-grid">
                <?php foreach ($tutorial_sections as $section): ?>
                    <article class="tutorial-section-card">
                        <div class="education-article-meta"><?php echo htmlspecialchars($section['label']); ?></div>
                        <h3><?php echo htmlspecialchars($section['title']); ?></h3>
                        <p><?php echo htmlspecialchars($section['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">What Users Usually Need First</h2>
                <p class="education-subpage-section-subtitle">A focused overview of the platform actions that tend to matter most for beginners.</p>
            </div>

            <div class="education-article-grid">
                <article class="education-article-card">
                    <div class="education-article-card-body">
                        <div class="education-article-meta">Charts</div>
                        <h3>How to read charts more clearly</h3>
                        <p>Learn how to identify the chart area, switch timeframes, review price action, and understand what you are seeing before interacting with the market.</p>
                    </div>
                </article>
                <article class="education-article-card">
                    <div class="education-article-card-body">
                        <div class="education-article-meta">Orders</div>
                        <h3>How to place and manage an order</h3>
                        <p>Understand where order entry happens, what details users usually check, and how stop-loss and take-profit settings fit into the order process.</p>
                    </div>
                </article>
                <article class="education-article-card">
                    <div class="education-article-card-body">
                        <div class="education-article-meta">Open Positions</div>
                        <h3>How to monitor positions after a trade is active</h3>
                        <p>See how to review open trades, current P/L, and trade details so the platform feels easier to interpret during live market activity.</p>
                    </div>
                </article>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Mobile Trading</h2>
                <p class="education-subpage-section-subtitle">A quick guide to how the trading experience carries over to mobile devices.</p>
            </div>

            <section class="tutorial-mobile-panel">
                <div class="tutorial-mobile-copy">
                    <div class="education-article-meta">Trading App Tutorial</div>
                    <h3>Use the mobile platform to stay connected to charts, positions, and market activity</h3>
                    <p>The mobile experience helps users keep track of markets and positions when they are away from desktop. It is especially useful for monitoring open trades, checking chart movement, and reviewing account activity during the day.</p>
                </div>
                <ul class="tutorial-mobile-list">
                    <?php foreach ($mobile_highlights as $highlight): ?>
                        <li><?php echo htmlspecialchars($highlight); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section class="education-user-strip education-user-strip--single">
                <div class="education-user-strip-card">
                    <div class="education-article-meta">Useful Note</div>
                    <h3>These tutorials are designed to help users understand platform functions more clearly</h3>
                    <p>The purpose of this section is educational. It supports users who want a better understanding of how trading tools, charts, and platform features work across desktop and mobile environments.</p>
                </div>
            </section>

            <?php include __DIR__ . '/partials/education-hub-account-ctas.php'; ?>
        </div>
    </section>
</section>
