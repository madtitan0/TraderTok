<?php
$course_info = [
    'level' => 'Beginner',
    'lessons' => '7',
    'duration' => '45 mins',
    'format' => 'Read + Learn',
    'category' => 'Forex Basics',
];

$learning_outcomes = [
    [
        'title' => 'Understand the forex market',
        'copy' => 'You will learn what the foreign exchange market is, why it exists, who participates in it, and how retail traders access it through broker platforms.',
    ],
    [
        'title' => 'Learn how currency pairs work',
        'copy' => 'You will understand base currency, quote currency, exchange rates, and how traders read pairs like EUR/USD, USD/JPY, and GBP/USD.',
    ],
    [
        'title' => 'Know basic trading terminology',
        'copy' => 'You will become familiar with essential beginner terms such as pip, spread, bid price, ask price, lot size, volatility, and trading session.',
    ],
];

$lessons = [
    [
        'title' => 'Lesson 1 — What Is Forex Trading?',
        'goal' => 'To introduce the forex market and explain why currencies are traded.',
        'body' => [
            'Forex trading refers to the buying of one currency and the selling of another at the same time. Because currencies are always quoted relative to another currency, forex trading happens in pairs. For example, if a trader buys EUR/USD, they are effectively buying euros and selling U.S. dollars.',
            'The forex market is one of the largest financial markets in the world because currencies are needed for international trade, investment, travel, and financial settlement. Institutions, banks, corporations, governments, and retail traders all participate in the broader foreign exchange ecosystem.',
            'For beginners, the most important idea is this: forex trading is not about buying a single asset in isolation. It is about speculating on the relative value of one currency against another.',
        ],
        'takeaway' => 'Forex trading is the exchange of one currency for another, and prices are always quoted as currency pairs.',
    ],
    [
        'title' => 'Lesson 2 — How Currency Pairs Work',
        'goal' => 'To explain base currency, quote currency, and pair movement.',
        'body' => [
            'A currency pair has two parts: base currency, which is the first currency in the pair, and quote currency, which is the second currency in the pair.',
            'Example: EUR/USD = 1.1000. This means 1 euro is worth 1.1000 U.S. dollars. If EUR/USD rises, it usually means the euro is strengthening relative to the dollar. If EUR/USD falls, it usually means the euro is weakening relative to the dollar.',
            'Major pairs usually include the U.S. dollar and are among the most traded pairs. Minor pairs do not include the U.S. dollar but still involve major currencies. Exotic pairs include one major currency and one emerging-market currency, and they may have lower liquidity and wider spreads.',
        ],
        'takeaway' => 'A forex pair shows how much of the quote currency is needed to buy one unit of the base currency.',
    ],
    [
        'title' => 'Lesson 3 — Bid, Ask, and Spread',
        'goal' => 'To explain how forex quotes are displayed and where spread fits in.',
        'body' => [
            'Forex prices are usually displayed with two values: bid price, which is the price at which the market or dealer buys from you, and ask price, which is the price at which the market or dealer sells to you.',
            'The difference between these two prices is called the spread. In retail trading, spread is one of the most important basic trading costs to understand.',
            'Example: if EUR/USD is quoted as Bid: 1.1000 and Ask: 1.1002, then the spread is 2 pips. For a beginner, the key point is that the market usually needs to move enough to cover the spread before a trade becomes profitable.',
        ],
        'takeaway' => 'Bid is the selling price, ask is the buying price, and the spread is the difference between them.',
    ],
    [
        'title' => 'Lesson 4 — What Is a Pip?',
        'goal' => 'To explain the meaning of pip in simple terms.',
        'body' => [
            'A pip is one of the smallest standard units of movement in many forex currency pairs. For many major pairs, a pip is typically the fourth decimal place, while for many JPY pairs it is commonly the second decimal place.',
            'Example: if EUR/USD moves from 1.1000 to 1.1005, that is a move of 5 pips. If USD/JPY moves from 150.20 to 150.30, that is often described as a 10 pip move under common JPY pair conventions.',
            'Pips matter because they help measure price movement, spreads are usually measured in pips, profit and loss are often discussed in pips, and stop-loss or take-profit distances are often set in pips.',
        ],
        'takeaway' => 'A pip is a standard way to measure price movement in forex.',
    ],
    [
        'title' => 'Lesson 5 — Lot Size and Trade Size Basics',
        'goal' => 'To introduce position sizing at a basic level.',
        'body' => [
            'A lot refers to trade size. Understanding lot size matters because it affects how much value each pip movement represents.',
            'Common lot references in forex education include standard lot = 100,000 units, mini lot = 10,000 units, and micro lot = 1,000 units.',
            'For beginners, the exact pip value calculation can come later, but the important principle is simple: larger position sizes generally increase both potential profit and potential loss. Smaller position sizes are often used by beginners to reduce exposure while learning.',
        ],
        'takeaway' => 'Lot size affects trade exposure and risk, so position size should never be ignored.',
    ],
    [
        'title' => 'Lesson 6 — Forex Market Sessions',
        'goal' => 'To explain why timing matters in forex.',
        'body' => [
            'Unlike some markets that trade within one local exchange schedule, the forex market is active across major financial centers around the world. Trading activity often rises when major sessions overlap or when key economic releases are published.',
            'The most commonly referenced market sessions are the Asian session, London session, and New York session.',
            'Sessions matter because liquidity can change during different parts of the day, spreads may widen or narrow, volatility may increase around overlaps and news releases, and certain currency pairs may be more active during relevant regional hours.',
        ],
        'takeaway' => 'Market sessions can affect liquidity, volatility, and the overall trading environment.',
    ],
    [
        'title' => 'Lesson 7 — Basic Forex Trading Terminology Every Beginner Should Know',
        'goal' => 'To reinforce core language.',
        'body' => [
            'Before moving to advanced concepts, beginners should be comfortable with the following terms: currency pair, bid price, ask price, spread, pip, lot size, volatility, liquidity, long position, and short position.',
            'Currency pair means two currencies quoted together, such as EUR/USD. Volatility refers to the speed or size of price movement over time, while liquidity describes how easily a market can be traded without large price disruption.',
            'Long position means buying with the expectation that price may rise, and short position means selling with the expectation that price may fall.',
        ],
        'takeaway' => 'Learning forex terminology early helps beginners read charts, understand lessons, and follow trading content more confidently.',
    ],
];

$related_glossary = ['Currency Pair', 'Pip', 'Spread', 'Lot Size', 'Bid Price', 'Ask Price', 'Volatility', 'Liquidity'];
$related_articles = [
    'What Is Forex Trading and How Does It Work?',
    'What Is a Pip in Forex Trading?',
    'What Is Spread in Forex?',
    'Major vs Minor Currency Pairs Explained',
    'Best Time to Trade Forex for Beginners',
];

$faq_items = [
    ['q' => 'What is forex trading in simple words?', 'a' => 'Forex trading is the buying of one currency and the selling of another as a pair, such as EUR/USD.'],
    ['q' => 'What are currency pairs in forex?', 'a' => 'Currency pairs show the value of one currency relative to another. The first is the base currency, and the second is the quote currency.'],
    ['q' => 'What is a pip in forex trading?', 'a' => 'A pip is a common unit used to measure price movement in forex quotations. For many major pairs it is typically the fourth decimal place, while many JPY pairs use a different convention.'],
    ['q' => 'What is spread in forex?', 'a' => 'Spread is the difference between the bid price and ask price. It is one of the basic transaction cost concepts beginners should understand.'],
    ['q' => 'Why do forex market sessions matter?', 'a' => 'Different market sessions can affect liquidity and volatility, which may influence how active certain currency pairs are during the day.'],
    ['q' => 'Is this forex trading fundamentals course suitable for beginners?', 'a' => 'Yes. This course is structured to help beginners understand the forex market, currency pairs, and key trading terms before moving to more advanced topics.'],
];
require_once __DIR__ . '/../config/course-faq-helpers.php';
$course_faq_visible = course_faq_is_complete($faq_items);
?>

<section class="education-subpage education-course-page">
    <section class="education-subpage-hero education-subpage-hero--course-detail">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">TraderTok Academy Course</div>
            <div class="education-course-breadcrumb">Home &gt; Academy &gt; Courses &gt; Forex Trading Fundamentals</div>
            <h1 class="education-subpage-title">Forex Trading Fundamentals for Beginners</h1>
            <p class="education-subpage-subtitle">
                This beginner-friendly forex trading course explains how the forex market works, how currency pairs are quoted, what pips and spreads mean, and why trading sessions matter. If you are new to forex trading, this course gives you the core knowledge you need before moving into leverage, risk management, and platform execution.
            </p>
            <?php include __DIR__ . '/../partials/education-course-hero-ctas.php'; ?>
            <div class="education-course-info-strip">
                <?php foreach ($course_info as $label => $value): ?>
                    <div class="education-course-info-item">
                        <span><?php echo htmlspecialchars(ucfirst($label)); ?></span>
                        <strong><?php echo htmlspecialchars($value); ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="education-course-layout">
                <aside class="education-course-sidebar">
                    <div class="education-article-panel">
                        <h2>Course Navigation</h2>
                        <div class="education-article-toc">
                            <a href="#course-overview">Course Overview</a>
                            <a href="#course-outcomes">What You Will Learn</a>
                            <a href="#course-lessons">Lessons</a>
                            <a href="#course-summary">Course Summary</a>
                            <a href="#course-example">Simple Forex Quote Example</a>
                            <a href="#course-risk">Important Note for Beginners</a>
                            <a href="#course-next">Continue Learning Next</a>
                            <?php if ($course_faq_visible): ?>
                            <a href="#course-faq">Frequently Asked Questions</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php include __DIR__ . '/../partials/course-video-education-promo.php'; ?>
                </aside>

                <main class="education-article-main">
                    <section class="education-article-block" id="course-overview">
                        <div class="education-article-block-label">Course Overview</div>
                        <h2>What is this course about?</h2>
                        <p>Forex, or foreign exchange, is the global market where currencies are exchanged. Traders participate in this market by buying one currency and selling another as a pair, such as EUR/USD or GBP/USD. In practice, retail traders usually access forex through a broker platform rather than a centralized exchange, and pricing, execution, and account conditions depend on that provider. The CFTC notes that retail forex trading is typically conducted through the dealer’s platform and that leveraged losses can occur rapidly, which is why foundational education matters before placing trades.</p>
                        <p>This course is designed to help beginners understand the basic structure of the forex market in simple language. You will learn what currency pairs are, how exchange rates move, what a pip is, how spreads affect trading costs, and why market sessions can influence volatility.</p>
                        <p>By the end of this course, you should be able to understand the forex market at a beginner level, explain how currency pairs work, understand basic forex trading terminology, and build a stronger foundation for future lessons on leverage, margin, and risk.</p>
                    </section>

                    <section class="education-article-block" id="course-outcomes">
                        <div class="education-article-block-label">Learning Outcomes</div>
                        <h2>What you will learn</h2>
                        <div class="education-course-outcome-grid">
                            <?php foreach ($learning_outcomes as $index => $outcome): ?>
                                <article class="education-course-outcome-card">
                                    <div class="education-course-outcome-number"><?php echo $index + 1; ?></div>
                                    <h3><?php echo htmlspecialchars($outcome['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($outcome['copy']); ?></p>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </section>

                    <section class="education-article-block" id="course-lessons">
                        <div class="education-article-block-label">Lesson Structure</div>
                        <h2>Course lessons</h2>
                        <div class="education-course-lessons">
                            <?php foreach ($lessons as $lesson): ?>
                                <article class="education-course-lesson-card">
                                    <h3><?php echo htmlspecialchars($lesson['title']); ?></h3>
                                    <div class="education-course-lesson-goal">Lesson goal: <?php echo htmlspecialchars($lesson['goal']); ?></div>
                                    <?php foreach ($lesson['body'] as $paragraph): ?>
                                        <p><?php echo htmlspecialchars($paragraph); ?></p>
                                    <?php endforeach; ?>
                                    <div class="education-course-takeaway">
                                        <strong>Key takeaway</strong>
                                        <p><?php echo htmlspecialchars($lesson['takeaway']); ?></p>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </section>

                    <section class="education-article-block" id="course-summary">
                        <h2>Course summary</h2>
                        <p>Forex trading fundamentals begin with three things: understanding what the forex market is, knowing how currency pairs are quoted, and learning basic terms such as pip, spread, and lot size.</p>
                        <p>These concepts may look simple, but they are essential. A beginner who does not understand pair structure, price movement, or basic terminology can easily misread trades and underestimate risk.</p>
                    </section>

                    <section class="education-article-block" id="course-example">
                        <h2>Simple forex quote example</h2>
                        <div class="education-course-example-panel">
                            <div class="education-course-example-quote">
                                <span>Bid</span>
                                <strong>1.1000</strong>
                            </div>
                            <div class="education-course-example-quote">
                                <span>Ask</span>
                                <strong>1.1002</strong>
                            </div>
                        </div>
                        <ul class="education-course-example-list">
                            <li>The spread is 2 pips.</li>
                            <li>If the ask price rises to 1.1007, that is a 5 pip move from 1.1002.</li>
                            <li>If a trader expects the euro to strengthen against the dollar, they may look for buying opportunities.</li>
                        </ul>
                        <p>This kind of simple quote-reading exercise helps beginners connect terminology to real market screens.</p>
                    </section>

                    <section class="education-article-disclaimer" id="course-risk">
                        <h2>Important note for beginners</h2>
                        <p>Learning forex trading fundamentals is not only about terminology. It is also about understanding that forex and CFD trading involve risk, especially when leverage is used. The CFTC warns that leveraged retail forex losses can happen quickly and that customers trade through the dealer’s platform, not a centralized exchange. That makes education, broker due diligence, and risk management especially important before trading live.</p>
                        <p>Forex and CFD trading involve significant risk and may not be suitable for all traders. Educational content should not be treated as investment advice.</p>
                    </section>

                    <section class="education-article-block" id="course-next">
                        <h2>Continue learning next</h2>
                        <div class="education-course-related-grid">
                            <article class="education-article-panel">
                                <h3>Suggested next courses</h3>
                                <ul class="education-course-related-list">
                                    <li>CFD Trading Basics</li>
                                    <li>Leverage, Margin &amp; Risk Basics</li>
                                    <li>Risk Management Essentials</li>
                                    <li>Technical Analysis for Beginners</li>
                                </ul>
                            </article>
                            <article class="education-article-panel">
                                <h3>Related glossary terms</h3>
                                <ul class="education-course-related-list">
                                    <?php foreach ($related_glossary as $term): ?>
                                        <li><?php echo htmlspecialchars($term); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </article>
                            <article class="education-article-panel">
                                <h3>Related articles</h3>
                                <ul class="education-course-related-list">
                                    <?php foreach ($related_articles as $article): ?>
                                        <li><?php echo htmlspecialchars($article); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </article>
                        </div>
                    </section>

                    <?php if ($course_faq_visible): ?>
                    <section class="education-article-block" id="course-faq">
                        <h2>Frequently Asked Questions</h2>
                        <div class="courses-faq-list">
                            <?php foreach ($faq_items as $faq): ?>
                                <article class="courses-faq-item">
                                    <h3><?php echo htmlspecialchars($faq['q']); ?></h3>
                                    <p><?php echo htmlspecialchars($faq['a']); ?></p>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <section class="courses-final-cta">
                        <div class="courses-final-cta-panel">
                            <h2>Build Your Forex Foundation Before You Trade</h2>
                            <p>Start with the basics, then continue your learning with CFD trading, leverage, risk management, and chart-reading courses inside TraderTok Academy.</p>
                            <div class="courses-final-cta-actions">
                                <a href="#" class="btn-primary">Start Next Course</a>
                                <a href="./education-article?id=what-is-forex-trading" class="education-article-link courses-secondary-cta">Explore Forex Articles</a>
                                <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="education-article-link courses-secondary-cta">Open Demo Account</a>
                                <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="education-article-link courses-secondary-cta">Open Live Account</a>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </section>
</section>
