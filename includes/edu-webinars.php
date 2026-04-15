<?php
$webinar_types = [
    [
        'type' => 'Beginner Forex Webinar',
        'summary' => 'A user-friendly introduction to how the forex market works, how pairs move, and what new traders usually need to understand first.',
    ],
    [
        'type' => 'CFD Basics Webinar',
        'summary' => 'An educational session explaining what CFDs are, how pricing works, and how users can better understand market exposure across asset classes.',
    ],
    [
        'type' => 'Weekly Market Outlook',
        'summary' => 'A recurring session focused on the week ahead, including macro themes, key events, and broader market context.',
    ],
    [
        'type' => 'Gold Trading Webinar',
        'summary' => 'A focused session looking at gold market drivers, safe-haven demand, and the macro themes that often influence precious metals.',
    ],
    [
        'type' => 'Risk Management Workshop',
        'summary' => 'A practical session on capital protection, position sizing, and how users can think more clearly about exposure and trade planning.',
    ],
    [
        'type' => 'Platform Walkthrough',
        'summary' => 'A tutorial-style session showing how users navigate the platform, read charts, and understand core trading tools.',
    ],
    [
        'type' => 'Ask the Analyst Session',
        'summary' => 'An interactive session where users can explore market concepts, current themes, and platform-related questions in a structured format.',
    ],
];

$what_youll_learn = [
    'How to understand the core theme of a webinar before joining.',
    'How market outlook sessions connect macro events to forex, gold, and indices.',
    'How risk management and platform education can support a stronger learning routine.',
];

$replays = [
    ['title' => 'Weekly Market Outlook: Inflation, Rates, and Sentiment', 'meta' => 'Replay • 45 mins'],
    ['title' => 'Risk Management Workshop: Building Better Habits', 'meta' => 'Replay • 38 mins'],
    ['title' => 'Platform Walkthrough: Charts, Orders, and Position Monitoring', 'meta' => 'Replay • 32 mins'],
];

$related_reading = [
    ['title' => 'Market News & Insights', 'description' => 'Follow market commentary and weekly outlook context.', 'href' => './edu-market-news'],
    ['title' => 'Platform Tutorials', 'description' => 'Learn how charts, orders, and platform tools work.', 'href' => './edu-tutorials'],
    ['title' => 'Trading Essentials', 'description' => 'Explore foundational educational articles and concepts.', 'href' => './trading-essentials'],
];
?>

<section class="education-subpage education-subpage--webinars">
    <section class="education-subpage-hero education-subpage-hero--webinars">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">Trading Webinars</div>
            <h1 class="education-subpage-title">Live Trading Webinars &amp; Learning Sessions</h1>
            <p class="education-subpage-subtitle">
                Join TraderTok webinars on forex, CFDs, trading strategy, risk management, technical analysis, and weekly market outlooks.
            </p>
            <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="education-user-strip">
                <div class="education-user-strip-card">
                    <div class="education-article-meta">Who It’s For</div>
                    <h3>Useful for users who prefer guided learning and live explanations</h3>
                    <p>These sessions are designed for users who want concepts explained in a structured way, whether they are learning forex basics, risk management, platform use, or weekly market context.</p>
                </div>
                <div class="education-user-strip-card">
                    <div class="education-article-meta">What You’ll Learn</div>
                    <h3>Educational sessions across markets, platform use, and trading concepts</h3>
                    <p>Webinars are meant to help users build understanding through live explanations, examples, and repeatable educational themes that fit within the rest of the Academy.</p>
                </div>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Featured Webinar</h2>
                <p class="education-subpage-section-subtitle">A lead session that highlights the webinar structure users can expect across the page.</p>
            </div>

            <section class="webinars-featured-panel">
                <div class="webinars-featured-copy">
                    <div class="education-article-meta">Weekly Market Outlook</div>
                    <h3>How Macro Themes, Central Bank Signals, and Risk Sentiment Shape the Trading Week</h3>
                    <p>This featured session gives users a structured look at the bigger themes behind the coming week, helping them understand how macro events, policy commentary, and market sentiment connect across instruments.</p>

                    <div class="webinars-meta-grid">
                        <div class="webinars-meta-item">
                            <span>Date and Time</span>
                            <strong>Every Monday • 18:00 GMT</strong>
                        </div>
                        <div class="webinars-meta-item">
                            <span>Speaker Bio</span>
                            <strong>TraderTok Market Education Team</strong>
                        </div>
                    </div>
                </div>

                <div class="webinars-registration-card">
                    <div class="education-article-meta">Registration Form</div>
                    <h3>Reserve a place for the next live session</h3>
                    <form class="webinars-form" id="webinarsForm">
                        <input type="text" name="name" placeholder="Full Name" required>
                        <input type="email" name="email" placeholder="Email Address" required>
                        <select name="interest" required>
                            <option value="" disabled selected>Select webinar interest</option>
                            <option value="Beginner Forex Webinar">Beginner Forex Webinar</option>
                            <option value="CFD Basics Webinar">CFD Basics Webinar</option>
                            <option value="Weekly Market Outlook">Weekly Market Outlook</option>
                            <option value="Gold Trading Webinar">Gold Trading Webinar</option>
                            <option value="Risk Management Workshop">Risk Management Workshop</option>
                            <option value="Platform Walkthrough">Platform Walkthrough</option>
                            <option value="Ask the Analyst Session">Ask the Analyst Session</option>
                        </select>
                        <button type="submit" class="btn-primary">Register Interest</button>
                    </form>
                </div>
            </section>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Webinar Types</h2>
                <p class="education-subpage-section-subtitle">A clear overview of the session formats users can explore across the webinar library.</p>
            </div>

            <div class="webinars-type-grid">
                <?php foreach ($webinar_types as $webinar): ?>
                    <article class="webinars-type-card">
                        <div class="education-article-meta">Session Type</div>
                        <h3><?php echo htmlspecialchars($webinar['type']); ?></h3>
                        <p><?php echo htmlspecialchars($webinar['summary']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">What You’ll Learn in a Session</h2>
                <p class="education-subpage-section-subtitle">A simple guide to the kind of value users can expect when joining or replaying a webinar.</p>
            </div>

            <section class="webinars-learning-panel">
                <div class="webinars-learning-copy">
                    <div class="education-article-meta">Learning Focus</div>
                    <h3>Built to make live education easier to follow and more practical</h3>
                    <p>Sessions are structured to keep the learning focused and approachable, helping users understand market concepts, platform workflows, and broader context without relying only on written content.</p>
                </div>
                <ul class="webinars-learning-list">
                    <?php foreach ($what_youll_learn as $item): ?>
                        <li><?php echo htmlspecialchars($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Replay Section</h2>
                <p class="education-subpage-section-subtitle">Recorded learning sessions users can revisit if they miss a live webinar.</p>
            </div>

            <div class="education-article-grid">
                <?php foreach ($replays as $replay): ?>
                    <article class="education-article-card">
                        <div class="education-article-card-body">
                            <div class="education-article-meta"><?php echo htmlspecialchars($replay['meta']); ?></div>
                            <h3><?php echo htmlspecialchars($replay['title']); ?></h3>
                            <p>Replay content helps users revisit educational explanations, market context, and platform guidance at their own pace.</p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header" style="padding-top: 20px;">
                <h2 class="education-subpage-section-title">Related Reading</h2>
                <p class="education-subpage-section-subtitle">Continue learning through related Academy pages connected to webinar topics.</p>
            </div>

            <div class="education-article-grid">
                <?php foreach ($related_reading as $item): ?>
                    <article class="education-article-card">
                        <div class="education-article-card-body">
                            <div class="education-article-meta">Related Reading</div>
                            <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p><?php echo htmlspecialchars($item['description']); ?></p>
                            <a href="<?php echo htmlspecialchars($item['href']); ?>" class="education-article-link">Open Page</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <?php include __DIR__ . '/partials/education-hub-account-ctas.php'; ?>
        </div>
    </section>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('webinarsForm');
    if (!form) return;

    const thankYou = <?php echo json_encode(routeUrl('lead-thank-you', ['kind' => 'webinar'])); ?>;

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        window.location.href = thankYou;
    });
});
</script>
