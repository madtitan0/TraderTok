<?php
$course_filters = [
    'levels' => ['All Levels', 'Beginner', 'Intermediate', 'Advanced later'],
    'topics' => ['Forex Basics', 'CFD Basics', 'Risk Management', 'Technical Analysis', 'Fundamental Analysis', 'Trading Psychology', 'Gold & Commodities', 'Platform Tutorials'],
    'formats' => ['Reading Course', 'Video Course', 'Mixed Format', 'Webinar Replay'],
    'durations' => ['Under 30 mins', '30–60 mins', '1–2 hours', 'Multi-part Series'],
];

$learning_paths = [
    [
        'title' => 'Start Trading from Scratch',
        'for' => 'Complete beginners',
        'modules' => ['Forex Basics', 'CFD Basics', 'Leverage', 'Risk Basics'],
        'duration' => '4-course path',
        'cta' => 'Start Beginner Path',
    ],
    [
        'title' => 'Build Technical Analysis Skills',
        'for' => 'Users who want chart-reading skills',
        'modules' => ['Candlesticks', 'Trends', 'Support & Resistance', 'RSI and MACD'],
        'duration' => '3-course path',
        'cta' => 'Explore Technical Path',
    ],
    [
        'title' => 'Learn to Manage Risk Better',
        'for' => 'Users struggling with consistency',
        'modules' => ['Stop-loss', 'Position sizing', 'Drawdown', 'Discipline'],
        'duration' => '2-course path',
        'cta' => 'Start Risk Course Path',
    ],
    [
        'title' => 'Understand Market Drivers',
        'for' => 'Users interested in news and macro',
        'modules' => ['CPI', 'NFP', 'Interest rates', 'Central banks'],
        'duration' => '2-course path',
        'cta' => 'Explore Fundamentals Path',
    ],
];

$courses = [
    [
        'title' => 'Forex Trading Fundamentals',
        'category' => 'Forex Trading Course',
        'level' => 'Beginner',
        'lessons' => 7,
        'duration' => '45 mins',
        'href' => routeUrl('forex-trading-fundamentals'),
        'summary' => 'Learn the foundations of forex trading, including currency pairs, pips, spreads, market sessions, and how the forex market works.',
        'outcomes' => ['Understand the forex market', 'Learn how currency pairs work', 'Know basic trading terminology'],
    ],
    [
        'title' => 'CFD Trading Basics',
        'category' => 'CFD Trading Course',
        'level' => 'Beginner',
        'lessons' => 7,
        'duration' => '40 mins',
        'href' => routeUrl('cfd-trading-basics'),
        'summary' => 'Understand what CFDs are, how they work, and the key concepts every beginner should know before trading them.',
        'outcomes' => ['Understand long and short positions', 'Learn leverage and margin basics', 'Identify common CFD risks'],
    ],
    [
        'title' => 'Leverage, Margin & Risk Basics',
        'category' => 'Risk Basics',
        'level' => 'Beginner',
        'lessons' => 6,
        'duration' => '35 mins',
        'href' => routeUrl('leverage-margin-risk-basics'),
        'summary' => 'A practical course explaining leverage, margin, margin call, and how to think about risk before placing trades.',
        'outcomes' => ['Understand leverage clearly', 'Learn what margin means', 'Avoid beginner risk mistakes'],
    ],
    [
        'title' => 'Risk Management Essentials',
        'category' => 'Risk Management',
        'level' => 'Beginner to Intermediate',
        'lessons' => 8,
        'duration' => '55 mins',
        'href' => routeUrl('risk-management-essentials'),
        'summary' => 'Learn how to protect your trading capital through position sizing, stop-loss use, risk-reward planning, and disciplined trade management.',
        'outcomes' => ['Use risk per trade properly', 'Understand risk-reward ratio', 'Reduce emotional decision-making'],
    ],
    [
        'title' => 'Technical Analysis for Beginners',
        'category' => 'Technical Analysis',
        'level' => 'Beginner',
        'lessons' => 8,
        'duration' => '60 mins',
        'href' => routeUrl('technical-analysis-for-beginners'),
        'summary' => 'Learn how traders read charts using candlesticks, support and resistance, trends, and beginner-friendly indicators.',
        'outcomes' => ['Read basic price charts', 'Spot trends and key zones', 'Understand beginner indicators'],
    ],
    [
        'title' => 'Fundamental Analysis Basics',
        'category' => 'Fundamental Analysis',
        'level' => 'Beginner',
        'lessons' => 7,
        'duration' => '50 mins',
        'href' => routeUrl('fundamental-analysis-basics'),
        'summary' => 'Understand how economic data, inflation, interest rates, jobs reports, and central bank decisions can affect the markets.',
        'outcomes' => ['Follow macro events better', 'Understand why prices move', 'Learn how traders use economic calendars'],
    ],
    [
        'title' => 'Trading Psychology Basics',
        'category' => 'Trading Psychology',
        'level' => 'Beginner',
        'lessons' => 6,
        'duration' => '30 mins',
        'href' => routeUrl('trading-psychology-basics'),
        'summary' => 'Explore the emotional side of trading, including fear, greed, impatience, overtrading, and how to build better discipline.',
        'outcomes' => ['Understand emotional mistakes', 'Improve trading discipline', 'Build a stronger routine'],
    ],
    [
        'title' => 'Gold Trading for Beginners',
        'category' => 'Gold & Commodities',
        'level' => 'Beginner',
        'lessons' => 5,
        'duration' => '30 mins',
        'href' => routeUrl('gold-trading-for-beginners'),
        'summary' => 'Learn the basics of gold trading, the factors that affect gold prices, and how beginners approach this market.',
        'outcomes' => ['Understand what moves gold', 'Learn beginner market context', 'Build a clearer commodity foundation'],
    ],
    [
        'title' => 'Indices Trading Basics',
        'category' => 'Indices',
        'level' => 'Beginner',
        'lessons' => 5,
        'duration' => '30 mins',
        'href' => routeUrl('indices-trading-basics'),
        'summary' => 'Understand what indices are, how index CFDs work, and what beginner traders should know before trading major indices.',
        'outcomes' => ['Understand index markets', 'Learn basic CFD context', 'Recognize beginner considerations'],
    ],
    [
        'title' => 'Platform Basics: How to Use the TraderTok Platform',
        'category' => 'Platform Tutorials',
        'level' => 'Beginner',
        'lessons' => 6,
        'duration' => '25 mins',
        'href' => routeUrl('platform-basics'),
        'summary' => 'Get familiar with the platform, chart layout, order types, stop-loss, take-profit, and trade monitoring tools.',
        'outcomes' => ['Understand platform layout', 'Learn core order tools', 'Monitor trades more clearly'],
    ],
];

$why_learn = [
    ['title' => 'Structured Learning', 'copy' => 'Our courses are organized into clear paths so you can learn step by step instead of jumping between disconnected articles.'],
    ['title' => 'Beginner-Friendly Explanations', 'copy' => 'Complex trading concepts are explained in simpler language to help new traders build confidence.'],
    ['title' => 'Practical Market Concepts', 'copy' => 'Learn core ideas like leverage, margin, chart basics, and risk management through clear examples and real-world context.'],
    ['title' => 'Connected Learning Experience', 'copy' => 'Move easily from courses to articles, glossary terms, webinars, and platform tutorials to deepen understanding.'],
];

$journey_steps = [
    'Start with Forex Trading Fundamentals',
    'Learn CFD Basics and Leverage',
    'Complete Risk Management Essentials',
    'Move to Technical and Fundamental Analysis',
    'Build discipline with Trading Psychology',
    'Explore webinars, articles, and platform tutorials',
];

$beginner_order = [
    'Forex Trading Fundamentals',
    'CFD Trading Basics',
    'Leverage, Margin & Risk Basics',
    'Risk Management Essentials',
    'Technical Analysis for Beginners',
];

$faq_items = [
    ['q' => 'Are TraderTok Academy courses suitable for beginners?', 'a' => 'Yes, the core Academy courses are designed to help beginners understand forex, CFDs, leverage, chart basics, risk management, and trading psychology in a step-by-step format.'],
    ['q' => 'What topics do the trading courses cover?', 'a' => 'The courses cover forex basics, CFD trading, leverage, margin, risk management, technical analysis, fundamental analysis, trading psychology, and platform tutorials.'],
    ['q' => 'How should I start learning trading as a beginner?', 'a' => 'Start with the beginner course path, beginning with forex fundamentals and CFD basics, then move to leverage, risk management, and chart-reading concepts.'],
    ['q' => 'Are the courses connected to other Academy resources?', 'a' => 'Yes, each course should connect to related articles, glossary terms, webinars, and tutorials so users can continue learning more deeply.'],
    ['q' => 'Do the courses explain trading risk?', 'a' => 'Yes, risk awareness should be a key part of the Academy. Dedicated course modules should explain leverage, margin, stop-loss use, and responsible trade planning.'],
    ['q' => 'Can I learn platform usage from the Academy too?', 'a' => 'Yes, the Academy should include platform tutorials that explain charts, order placement, stop-loss, take-profit, and monitoring positions.'],
];
?>

<section class="education-subpage education-subpage--courses">
    <section class="education-subpage-hero education-subpage-hero--courses">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">TraderTok Academy</div>
            <h1 class="education-subpage-title">Forex &amp; CFD Trading Courses That Help You Learn Step by Step</h1>
            <p class="education-subpage-subtitle">
                Explore structured trading courses designed to help you understand forex, CFDs, leverage, charts, risk management, and trading psychology. Whether you are just starting or building your knowledge, TraderTok Academy helps you learn in a clear and practical way.
            </p>
            <div class="education-subpage-hero-ctas courses-hero-ctas--three" role="group" aria-label="Get started">
                <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--primary">Open demo account</a>
                <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--solid">Open live account</a>
                <a href="#learning-path" class="education-subpage-hero-cta education-subpage-hero-cta--ghost" data-edu-gate-ignore="1">Start with beginner course</a>
            </div>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <!-- <section class="courses-filter-bar">
                <div class="courses-filter-search">
                    <label for="course-search">Course Finder</label>
                    <input id="course-search" type="search" placeholder="Search courses, topics, or trading concepts">
                </div>
                <div class="courses-filter-groups">
                    <div class="courses-filter-group">
                        <span>By level</span>
                        <div class="courses-filter-chips">
                            <?php foreach ($course_filters['levels'] as $filter): ?>
                                <button type="button" class="courses-filter-chip"><?php echo htmlspecialchars($filter); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="courses-filter-group">
                        <span>By topic</span>
                        <div class="courses-filter-chips">
                            <?php foreach ($course_filters['topics'] as $filter): ?>
                                <button type="button" class="courses-filter-chip"><?php echo htmlspecialchars($filter); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="courses-filter-group">
                        <span>By format</span>
                        <div class="courses-filter-chips">
                            <?php foreach ($course_filters['formats'] as $filter): ?>
                                <button type="button" class="courses-filter-chip"><?php echo htmlspecialchars($filter); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="courses-filter-group">
                        <span>By duration</span>
                        <div class="courses-filter-chips">
                            <?php foreach ($course_filters['durations'] as $filter): ?>
                                <button type="button" class="courses-filter-chip"><?php echo htmlspecialchars($filter); ?></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section> -->

           <div class="education-subpage-header" id="learning-path">
                <h2 class="education-subpage-section-title">Choose Your Learning Path</h2>
                <p class="education-subpage-section-subtitle">Instead of starting randomly, users can follow a path that matches where they are right now.</p>
            </div>

            <div class="courses-path-grid">
                <?php foreach ($learning_paths as $path): ?>
                    <article class="courses-path-card">
                        <div class="education-article-meta">Learning Path</div>
                        <h3><?php echo htmlspecialchars($path['title']); ?></h3>
                        <p class="courses-path-for">For: <?php echo htmlspecialchars($path['for']); ?></p>
                        <ul class="courses-path-list">
                            <?php foreach ($path['modules'] as $module): ?>
                                <li><?php echo htmlspecialchars($module); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="courses-path-footer">
                            <span><?php echo htmlspecialchars($path['duration']); ?></span>
                             <a href="#all-courses" class="education-article-link" data-edu-gate-ignore="1"><?php echo htmlspecialchars($path['cta']); ?></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header" id="all-courses">
                <h2 class="education-subpage-section-title">All Trading Courses</h2>
                <p class="education-subpage-section-subtitle">Structured trading courses designed to help you understand the markets, improve decision-making, and build a more disciplined trading approach.</p>
            </div>

            <div class="courses-grid">
                <?php foreach ($courses as $course): ?>
                    <?php $is_live_course = $course['href'] !== '#'; ?>
                    <article class="courses-course-card<?php echo $is_live_course ? ' courses-course-card--clickable' : ''; ?>"<?php echo $is_live_course ? ' onclick="window.location.href=\'' . htmlspecialchars($course['href'], ENT_QUOTES) . '\'" tabindex="0" role="link"' : ''; ?>>
                        <div class="education-article-meta"><?php echo htmlspecialchars($course['category']); ?></div>
                        <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                        <div class="courses-course-meta">
                            <span><?php echo htmlspecialchars($course['level']); ?></span>
                            <span><?php echo htmlspecialchars((string) $course['lessons']); ?> lessons</span>
                            <span><?php echo htmlspecialchars($course['duration']); ?></span>
                        </div>
                        <p><?php echo htmlspecialchars($course['summary']); ?></p>
                        <div class="courses-outcomes-title">Learning outcomes</div>
                        <ul class="courses-outcomes-list">
                            <?php foreach ($course['outcomes'] as $outcome): ?>
                                <li><?php echo htmlspecialchars($outcome); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if ($is_live_course): ?>
                            <a href="<?php echo htmlspecialchars($course['href']); ?>" class="btn-primary courses-course-cta" data-edu-gate-ignore="1" onclick="event.stopPropagation();">Start Course</a>
                        <?php else: ?>
                            <span class="courses-course-cta courses-course-cta--coming-soon">Coming Soon</span>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Why Learn with TraderTok Academy</h2>
                <p class="education-subpage-section-subtitle">The Academy is designed to feel connected, practical, and easier to follow for growing traders.</p>
            </div>

            <div class="courses-benefits-grid">
                <?php foreach ($why_learn as $item): ?>
                    <article class="courses-benefit-card">
                        <div class="education-article-meta">Why Learn Here</div>
                        <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                        <p><?php echo htmlspecialchars($item['copy']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">How to Progress Through the Courses</h2>
                <p class="education-subpage-section-subtitle">If you are new to trading, start with the beginner path first. Once you understand the basics, move into chart analysis, macro events, and platform usage to build a more complete learning experience.</p>
            </div>

            <section class="courses-journey">
                <?php foreach ($journey_steps as $index => $step): ?>
                    <article class="courses-journey-step">
                        <div class="courses-journey-number">Step <?php echo $index + 1; ?></div>
                        <p><?php echo htmlspecialchars($step); ?></p>
                    </article>
                <?php endforeach; ?>
            </section>

            <div class="education-subpage-header" id="beginner-start">
                <h2 class="education-subpage-section-title">New to Trading? Start Here</h2>
                <p class="education-subpage-section-subtitle">If you are just getting started, begin with these courses in order to build a strong foundation before exploring advanced market topics.</p>
            </div>

            <section class="courses-beginner-start">
                <div class="courses-beginner-panel">
                    <div class="education-article-meta">Beginner Learning Path</div>
                    <h3>Recommended course order for first-time learners</h3>
                    <ol class="courses-beginner-list">
                        <?php foreach ($beginner_order as $course_name): ?>
                            <li><?php echo htmlspecialchars($course_name); ?></li>
                        <?php endforeach; ?>
                    </ol>
                    <a href="#all-courses" class="btn-primary" data-edu-gate-ignore="1">Start Beginner Learning Path</a>
                </div>
            </section>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Frequently Asked Questions</h2>
                <p class="education-subpage-section-subtitle">Helpful answers that support new users and strengthen the learning path across the Academy.</p>
            </div>

            <div class="courses-faq-list">
                <?php foreach ($faq_items as $index => $faq): ?>
                    <article class="courses-faq-item<?php echo $index === 0 ? ' is-open' : ''; ?>">
                        <button class="courses-faq-toggle" type="button" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                            <span class="courses-faq-question"><?php echo htmlspecialchars($faq['q']); ?></span>
                            <span class="courses-faq-icon" aria-hidden="true"><?php echo $index === 0 ? '−' : '+'; ?></span>
                        </button>
                        <div class="courses-faq-answer">
                            <p><?php echo htmlspecialchars($faq['a']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <section class="courses-final-cta">
                <div class="courses-final-cta-panel">
                    <div class="education-article-meta">Continue Your Trading Learning Journey</div>
                    <h2>Continue Your Trading Learning Journey</h2>
                    <p>Explore structured trading education, practical resources, and platform tutorials designed to help you understand the markets more clearly.</p>
                    <div class="courses-final-cta-actions">
                        <a href="./education-article?id=what-is-forex-trading" class="btn-primary">Browse All Articles</a>
                        <a href="<?php echo htmlspecialchars(routeUrl('edu-webinars')); ?>" class="education-article-link courses-secondary-cta">Join a Webinar</a>
                        <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="education-article-link courses-secondary-cta">Open Demo Account</a>
                        <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="education-article-link courses-secondary-cta">Open Live Account</a>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.courses-faq-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                const item = toggle.closest('.courses-faq-item');
                const answer = item ? item.querySelector('.courses-faq-answer') : null;
                const icon = toggle.querySelector('.courses-faq-icon');
                const isOpen = item ? item.classList.contains('is-open') : false;

                document.querySelectorAll('.courses-faq-item').forEach(function(otherItem) {
                    otherItem.classList.remove('is-open');
                    const otherToggle = otherItem.querySelector('.courses-faq-toggle');
                    const otherIcon = otherItem.querySelector('.courses-faq-icon');
                    if (otherToggle) {
                        otherToggle.setAttribute('aria-expanded', 'false');
                    }
                    if (otherIcon) {
                        otherIcon.textContent = '+';
                    }
                });

                if (!item || !answer) {
                    return;
                }

                if (!isOpen) {
                    item.classList.add('is-open');
                    toggle.setAttribute('aria-expanded', 'true');
                    if (icon) {
                        icon.textContent = '−';
                    }
                }
            });
        });
    });
    </script>
</section>
