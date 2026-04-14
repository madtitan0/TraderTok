<?php
$course_info = [
    'level' => 'Beginner',
    'lessons' => '5',
    'duration' => '30 mins',
    'format' => 'Read + Learn',
    'category' => 'Indices',
];

$learning_outcomes = [
    [
        'title' => 'Understand what stock market indices are',
        'copy' => 'You will learn that an index measures the performance of a basket of securities and helps represent a market, economy, or sector.',
    ],
    [
        'title' => 'Understand how index CFDs work',
        'copy' => 'You will learn that a CFD allows traders to speculate on the price movement of an index without owning the underlying basket of stocks.',
    ],
    [
        'title' => 'Identify the key drivers of index movement',
        'copy' => 'You will learn that major indices are often influenced by company earnings, macroeconomic expectations, interest rates, sector performance, and broader market sentiment.',
    ],
    [
        'title' => 'Build a safer beginner approach to index trading',
        'copy' => 'You will understand why broad market exposure does not eliminate volatility and why risk control still matters.',
    ],
];

$lessons = [
    [
        'title' => 'Lesson 1 — What Is an Index?',
        'goal' => 'To explain what a market index is in simple terms.',
        'body' => [
            'A market index is a benchmark that tracks the performance of a basket of securities. It is designed to represent part of the stock market, a region, a sector, or a broader economy.',
            'Indices help traders and investors understand broad market direction without focusing on one company alone. An index may track a broad national stock market, a group of large companies, a sector of the economy, or a themed basket of companies.',
            'An index is not a single stock. It is a market benchmark built from multiple companies or securities.',
        ],
        'takeaway' => 'An index shows how a basket of securities is performing as a group.',
    ],
    [
        'title' => 'Lesson 2 — Why Do Traders Trade Indices?',
        'goal' => 'To explain why indices are popular with traders.',
        'body' => [
            'Indices are popular because they provide broad market exposure through one position. Instead of opening separate positions in many shares, traders can follow a single market that reflects a wider part of the economy or sector.',
            'Traders watch indices because they reflect broader market sentiment, are useful for following macro themes, can move on economic and policy expectations, and let traders focus on a broad market view instead of one stock.',
            'For beginners, this can make indices easier to understand conceptually than individual stock trading, although broad exposure does not mean lower risk.',
        ],
        'takeaway' => 'Traders use indices to gain exposure to broad market performance through one tradable market.',
    ],
    [
        'title' => 'Lesson 3 — How Do Index CFDs Work?',
        'goal' => 'To explain index CFD basics clearly.',
        'body' => [
            'An index CFD is a derivative product that lets you speculate on the price movement of a stock index without owning the underlying basket of shares.',
            'In simple terms, you choose whether you think the index will rise or fall, you open a position through a trading platform, and your result depends on the difference between entry price and exit price.',
            'Like other CFDs, index CFDs may allow both long and short exposure. They may also involve leverage, which means beginners should understand exposure and risk before trading.',
        ],
        'takeaway' => 'Index CFDs let traders speculate on index price movement without owning the underlying shares.',
    ],
    [
        'title' => 'Lesson 4 — What Moves Major Indices?',
        'goal' => 'To explain the main drivers of index prices.',
        'body' => [
            'Major indices are usually influenced by several broad forces at the same time, including company performance, interest rates and macro expectations, sector leadership, risk sentiment, volatility, market structure, and momentum.',
            'If many large companies inside the index report stronger or weaker results, the index may react. Broader market indices often respond to central bank policy, inflation expectations, and growth outlook as well.',
            'An index usually moves because many companies and many macro expectations are interacting at once, not because of one isolated headline.',
        ],
        'takeaway' => 'Indices are broad markets, so their price movement often reflects both company-level and macro-level forces.',
    ],
    [
        'title' => 'Lesson 5 — How Beginners Can Approach Indices Trading',
        'goal' => 'To give beginners a practical starting framework.',
        'body' => [
            'A simple beginner approach to indices trading should focus on structure, not speed. It helps to understand which index you are trading, know what that index broadly represents, check the macro and earnings context, identify whether the market is trending or ranging, reduce position size around major events, and define stop-loss and risk before entering.',
            'Beginners should also remember that leveraged index products can amplify both gains and losses, which is why risk management remains essential.',
            'Do not assume that an index is safe just because it is diversified. Broad indices can still move sharply during macro repricing, policy shocks, or volatility events.',
        ],
        'takeaway' => 'A good beginner approach to index trading combines market context, simple chart structure, and disciplined risk control.',
    ],
];

$related_glossary = ['Index', 'Stock Market Index', 'CFD', 'Leverage', 'Volatility', 'Sector', 'Market Sentiment'];
$related_articles = [
    'What Are Stock Market Indices?',
    'How Index CFDs Work',
    'What Moves Major Indices?',
    'Beginner\'s Guide to Trading the S&P 500',
    'Risk Management Tips for Index Traders',
];

$faq_items = [
    ['q' => 'What is an index in trading?', 'a' => 'An index is a benchmark that measures the performance of a basket of securities, such as stocks, representing part of a market or economy.'],
    ['q' => 'What is indices trading?', 'a' => 'Indices trading means taking a position on the price movement of a stock market index rather than trading one individual stock.'],
    ['q' => 'What is an index CFD?', 'a' => 'An index CFD is a derivative product that allows traders to speculate on the movement of an index without owning the underlying basket of shares.'],
    ['q' => 'Why do traders trade indices?', 'a' => 'Traders use indices to gain exposure to broad market or sector performance through one market rather than many separate positions.'],
    ['q' => 'What affects index prices?', 'a' => 'Index prices are commonly influenced by company earnings, macroeconomic expectations, interest rates, sector performance, and broader market sentiment.'],
    ['q' => 'Is this course suitable for beginners?', 'a' => 'Yes. This course is designed to help beginners understand what indices are, how index CFDs work, and how to approach major indices with better structure and risk control.'],
];
require_once __DIR__ . '/../config/course-faq-helpers.php';
$course_faq_visible = course_faq_is_complete($faq_items);
?>

<section class="education-subpage education-course-page">
    <section class="education-subpage-hero education-subpage-hero--course-detail">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">TraderTok Academy Course</div>
            <div class="education-course-breadcrumb">Home &gt; Academy &gt; Courses &gt; Indices Trading Basics</div>
            <h1 class="education-subpage-title">Indices Trading Basics for Beginners</h1>
            <p class="education-subpage-subtitle">
                This beginner-friendly course explains what stock market indices are, how index CFDs work, and what new traders should understand before trading major indices. If you are new to indices trading, this course gives you a practical foundation before moving into advanced analysis and execution.
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
                            <a href="#course-example">Simple Indices Example</a>
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
                        <p>Indices trading means taking exposure to the performance of a group of stocks through one market rather than analysing and trading each company individually.</p>
                        <p>For beginners, index markets can be attractive because they offer a simpler way to follow broad market themes. Instead of trading one stock, you may be trading the combined movement of many companies through a single benchmark market.</p>
                        <p>This course is designed to help you understand what an index is, how index CFDs work at a basic level, why indices move, what beginner traders should pay attention to, and why risk management matters in index trading.</p>
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
                        <p>Indices trading basics can be simplified into five core ideas: an index measures the performance of a basket of securities, indices help represent broad markets, sectors, or economies, index CFDs let traders speculate on index price movement without owning the underlying basket, index prices are influenced by both macro and company-level forces, and beginners should approach indices with structure and risk discipline.</p>
                    </section>

                    <section class="education-article-block" id="course-example">
                        <h2>Simple indices example</h2>
                        <div class="education-course-example-panel">
                            <div class="education-course-example-quote">
                                <span>Supportive Conditions</span>
                                <strong>Index May Rise</strong>
                            </div>
                            <div class="education-course-example-quote">
                                <span>Weaker Conditions</span>
                                <strong>Index May Fall</strong>
                            </div>
                        </div>
                        <ul class="education-course-example-list">
                            <li>If market sentiment improves, interest-rate expectations become more supportive, and several major companies report stronger results, a broad stock index may rise.</li>
                            <li>If economic expectations weaken, yields rise sharply, volatility increases, and major sectors inside the index come under pressure, that same index may fall.</li>
                            <li>This is why indices trading is often about broad market context rather than one isolated company story.</li>
                        </ul>
                    </section>

                    <section class="education-article-disclaimer" id="course-risk">
                        <h2>Important note for beginners</h2>
                        <p>Indices can look simpler than individual stocks because they represent a basket of companies, but they are still volatile markets.</p>
                        <p>Indices trading involves market risk, and leveraged products can increase losses quickly. Broad market exposure does not remove volatility. Educational content should not be treated as investment advice.</p>
                    </section>

                    <section class="education-article-block" id="course-next">
                        <h2>Continue learning next</h2>
                        <div class="education-course-related-grid">
                            <div>
                                <h3>Suggested next steps</h3>
                                <ul class="education-course-related-list">
                                    <li>CFD Trading Basics</li>
                                    <li>Leverage, Margin &amp; Risk Basics</li>
                                    <li>Technical Analysis for Beginners</li>
                                    <li>Fundamental Analysis Basics</li>
                                </ul>
                            </div>
                            <div>
                                <h3>Related glossary terms</h3>
                                <ul class="education-course-related-list">
                                    <?php foreach ($related_glossary as $item): ?>
                                        <li><?php echo htmlspecialchars($item); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div>
                                <h3>Related articles</h3>
                                <ul class="education-course-related-list">
                                    <?php foreach ($related_articles as $item): ?>
                                        <li><?php echo htmlspecialchars($item); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <?php if ($course_faq_visible): ?>
                    <section class="education-article-block" id="course-faq">
                        <h2>Frequently Asked Questions</h2>
                        <div class="faq-list">
                            <?php foreach ($faq_items as $index => $item): ?>
                                <article class="faq-item<?php echo $index === 0 ? ' active' : ''; ?>">
                                    <button class="faq-q" type="button">
                                        <span><?php echo htmlspecialchars($item['q']); ?></span>
                                        <span class="faq-icon"></span>
                                    </button>
                                    <div class="faq-a">
                                        <p><?php echo htmlspecialchars($item['a']); ?></p>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <section class="education-course-final-cta">
                        <div class="education-course-final-cta-content">
                            <h2>Understand the market before you trade the index</h2>
                            <p>
                                Learn what indices are, how index CFDs work, and how broad market forces influence major indices before moving into deeper strategy content inside TraderTok Academy.
                            </p>
                        </div>
                        <div class="education-course-final-cta-actions">
                            <a href="#" class="btn-primary">Start Next Course</a>
                            <a href="#" class="education-article-link courses-secondary-cta">Explore Indices Articles</a>
                            <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="education-article-link courses-secondary-cta">Open Demo Account</a>
                            <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="education-article-link courses-secondary-cta">Open Live Account</a>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </section>
</section>
