<?php
$course_info = [
    'level' => 'Beginner',
    'lessons' => '5',
    'duration' => '30 mins',
    'format' => 'Read + Learn',
    'category' => 'Commodities / Gold',
];

$learning_outcomes = [
    [
        'title' => 'Understand the basics of gold trading',
        'copy' => 'You will learn what traders mean by gold trading, why gold is widely followed, and how it fits into broader macro trading.',
    ],
    [
        'title' => 'Identify the main factors that affect gold prices',
        'copy' => 'You will understand that gold is commonly influenced by macro risk, uncertainty, opportunity cost, momentum, and broader economic conditions.',
    ],
    [
        'title' => 'Understand how beginners approach the gold market',
        'copy' => 'You will learn how beginners can use simpler routines, focus on macro context, and apply stronger risk management rather than treating gold as an easy market.',
    ],
    [
        'title' => 'Build a safer foundation for gold trading',
        'copy' => 'You will understand why gold can be volatile and why disciplined risk control matters before placing trades.',
    ],
];

$lessons = [
    [
        'title' => 'Lesson 1 — What Is Gold Trading?',
        'goal' => 'To explain gold trading in simple terms.',
        'body' => [
            'Gold trading means taking exposure to the price movement of gold rather than only buying physical bullion for long-term holding. In practice, traders may access the gold market through products linked to spot pricing, derivatives, or exchange-based contracts depending on the platform and jurisdiction.',
            'Gold is unusual because it sits between two worlds: it is a commodity, and it is also treated by many market participants as a financial asset and macro hedge.',
            'That is one reason gold attracts attention from many types of participants, including institutions, hedgers, funds, active traders, and individuals.',
        ],
        'takeaway' => 'Gold trading is about participating in gold price movement, and the market is followed by a wide mix of commercial, institutional, and speculative participants.',
    ],
    [
        'title' => 'Lesson 2 — Why Do Traders Watch Gold?',
        'goal' => 'To explain why gold matters in global markets.',
        'body' => [
            'Traders watch gold because it often responds to broad macro conditions rather than only narrow sector-specific developments. Gold is frequently discussed when markets are repricing risk, rates, inflation expectations, and confidence.',
            'Gold often gets attention when macro uncertainty rises, inflation concerns increase, real yields or opportunity-cost dynamics change, investors seek diversification, or momentum and positioning strengthen.',
            'This does not mean gold always rises during uncertainty or inflation. It means gold is often part of the conversation when markets are reacting to broader macro conditions.',
        ],
        'takeaway' => 'Gold is watched because it can reflect broad macro forces, not just commodity-specific demand.',
    ],
    [
        'title' => 'Lesson 3 — What Affects Gold Prices?',
        'goal' => 'To cover the main price drivers beginners should know.',
        'body' => [
            'Gold prices are influenced by several overlapping factors. A useful beginner framework is to think in terms of risk and uncertainty, opportunity cost, economic expansion, and momentum.',
            'Periods of market stress or policy uncertainty can support gold demand. Changes in rates and yields can affect how attractive gold looks relative to income-producing assets. Growth conditions can shape demand and sentiment. Momentum and positioning can also influence price direction in a widely traded market.',
            'Gold usually moves because several drivers interact at the same time. It is not a market that can be explained by one headline alone.',
        ],
        'takeaway' => 'Gold prices are shaped by macro conditions, uncertainty, opportunity cost, and momentum rather than one single factor.',
    ],
    [
        'title' => 'Lesson 4 — How Beginners Can Approach Gold Trading',
        'goal' => 'To help beginners build a practical starting framework.',
        'body' => [
            'Beginners should approach gold trading with structure, because gold can move sharply around news, macro surprises, and changes in sentiment.',
            'A simple beginner approach may include understanding the macro backdrop, knowing whether the market is trending or ranging, identifying nearby support and resistance areas, checking major event risk before entering, reducing trade size when volatility is high, and avoiding overreacting to every intraday move.',
            'A good beginner approach to gold trading focuses on context, structure, and risk control rather than constant prediction.',
        ],
        'takeaway' => 'A good beginner approach to gold trading focuses on context, structure, and risk control rather than constant prediction.',
    ],
    [
        'title' => 'Lesson 5 — Risk Management in Gold Trading',
        'goal' => 'To explain why risk control matters especially in gold.',
        'body' => [
            'Gold can be attractive to beginners, but it should not be treated as an easy market. It can react quickly to inflation data, central bank expectations, U.S. dollar moves, geopolitical events, and momentum shifts.',
            'A beginner gold risk checklist should include defining stop-loss before entry, reducing size in fast conditions, avoiding overleveraging, knowing the upcoming event calendar, and avoiding the assumption that gold must rise or fall because of one narrative.',
            'Gold trading can offer opportunity, but beginners should approach it with disciplined sizing and event awareness from the start.',
        ],
        'takeaway' => 'Gold trading can be opportunity-rich, but beginners should approach it with disciplined sizing and event awareness.',
    ],
];

$related_glossary = ['Gold', 'Commodity', 'Safe Haven', 'Opportunity Cost', 'Volatility', 'Support', 'Resistance', 'Leverage'];
$related_articles = [
    'What Moves Gold Prices?',
    'Gold Trading Basics for Beginners',
    'How Interest Rates Affect Gold',
    'Why Traders Watch Gold During Uncertainty',
    'Risk Management Tips for Gold Traders',
];

$faq_items = [
    ['q' => 'What is gold trading?', 'a' => 'Gold trading means taking exposure to movements in the price of gold through market products rather than only buying and storing physical gold.'],
    ['q' => 'Why do traders trade gold?', 'a' => 'Traders follow gold because it often responds to macro conditions such as uncertainty, opportunity cost, growth expectations, and momentum.'],
    ['q' => 'What affects gold prices the most?', 'a' => 'Gold prices are commonly affected by risk and uncertainty, opportunity cost, economic conditions, and momentum.'],
    ['q' => 'Is gold good for beginner traders?', 'a' => 'Gold can be suitable for beginners as a learning market, but it can also be volatile. Beginners should approach it with clear risk management and awareness of major macro events.'],
    ['q' => 'Why is risk management important in gold trading?', 'a' => 'Risk management matters because gold can move quickly around inflation data, rate expectations, geopolitical developments, and broader sentiment shifts.'],
    ['q' => 'Is this course suitable for beginners?', 'a' => 'Yes. This course is designed to give beginners a simple foundation in gold trading, price drivers, and safer market habits.'],
];
require_once __DIR__ . '/../config/course-faq-helpers.php';
$course_faq_visible = course_faq_is_complete($faq_items);
?>

<section class="education-subpage education-course-page">
    <section class="education-subpage-hero education-subpage-hero--course-detail">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">TraderTok Academy Course</div>
            <div class="education-course-breadcrumb">Home &gt; Academy &gt; Courses &gt; Gold Trading for Beginners</div>
            <h1 class="education-subpage-title">Gold Trading for Beginners</h1>
            <p class="education-subpage-subtitle">
                This beginner-friendly course explains the basics of gold trading, the main factors that affect gold prices, and how new traders can approach the gold market with more structure. If you are new to trading gold, this course gives you a practical foundation before moving into advanced analysis and execution.
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
                            <a href="#course-example">Simple Gold-Market Example</a>
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
                        <p>Gold is one of the most closely watched markets in the world. It is traded for different reasons: as a store of value, as a portfolio diversifier, as a macro hedge, and as a speculative trading market.</p>
                        <p>For beginners, gold trading can feel attractive because the market is familiar and highly visible. But it can also be fast-moving, especially around inflation data, interest-rate expectations, central bank news, and U.S. dollar moves.</p>
                        <p>This course is designed to help you understand what gold trading means in simple terms, why traders follow gold prices, what usually drives gold higher or lower, how gold can react to macro conditions, and how beginners can approach the gold market more carefully.</p>
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
                        <p>Gold trading for beginners can be simplified into five core ideas: gold is both a commodity market and a macro financial market, traders watch gold because it often reacts to broad macro forces, gold prices are commonly shaped by risk, uncertainty, opportunity cost, growth conditions, and momentum, beginners should approach gold with structure rather than assumptions, and risk management matters because gold can move quickly around major events.</p>
                    </section>

                    <section class="education-article-block" id="course-example">
                        <h2>Simple gold-market example</h2>
                        <div class="education-course-example-panel">
                            <div class="education-course-example-quote">
                                <span>Higher Uncertainty</span>
                                <strong>Gold Draws More Attention</strong>
                            </div>
                            <div class="education-course-example-quote">
                                <span>Higher Opportunity Cost</span>
                                <strong>Gold May Face Pressure</strong>
                            </div>
                        </div>
                        <ul class="education-course-example-list">
                            <li>When markets become more uncertain, traders may look at gold more closely for diversification or protection.</li>
                            <li>When yields become more attractive relative to non-yielding assets, gold may face pressure from changing opportunity-cost dynamics.</li>
                            <li>Gold does not always react in exactly the same way, which is why traders usually assess it through a broader macro lens that includes uncertainty, rates, and sentiment.</li>
                        </ul>
                    </section>

                    <section class="education-article-disclaimer" id="course-risk">
                        <h2>Important note for beginners</h2>
                        <p>Gold trading can be volatile, especially around major economic releases and changing policy expectations. Easier access does not remove market risk.</p>
                        <p>Gold trading involves market risk and may not be suitable for all traders. Price swings can increase during macro events and policy shifts. If leveraged products are used, losses can increase quickly.</p>
                    </section>

                    <section class="education-article-block" id="course-next">
                        <h2>Continue learning next</h2>
                        <div class="education-course-related-grid">
                            <div>
                                <h3>Suggested next steps</h3>
                                <ul class="education-course-related-list">
                                    <li>Fundamental Analysis Basics</li>
                                    <li>Technical Analysis for Beginners</li>
                                    <li>Risk Management Essentials</li>
                                    <li>Leverage, Margin &amp; Risk Basics</li>
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
                            <h2>Understand gold before you trade it</h2>
                            <p>
                                Learn what moves gold, how macro conditions influence price, and how beginners can approach the gold market with stronger structure and risk control.
                            </p>
                        </div>
                        <div class="education-course-final-cta-actions">
                            <a href="#" class="btn-primary">Start Next Course</a>
                            <a href="#" class="education-article-link courses-secondary-cta">Explore Gold Articles</a>
                            <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="education-article-link courses-secondary-cta">Open Demo Account</a>
                            <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="education-article-link courses-secondary-cta">Open Live Account</a>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </section>
</section>
