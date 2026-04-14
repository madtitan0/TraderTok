<?php
$course_info = [
    'level' => 'Beginner',
    'lessons' => '6',
    'duration' => '35 mins',
    'format' => 'Read + Learn',
    'category' => 'Risk Basics',
];

$learning_outcomes = [
    [
        'title' => 'Understand leverage clearly',
        'copy' => 'You will learn what leverage does, how it increases market exposure, and why it magnifies losses as well as gains.',
    ],
    [
        'title' => 'Learn what margin means',
        'copy' => 'You will understand margin as the deposit needed to support a leveraged position, and why margin is not the same as the maximum amount you can lose.',
    ],
    [
        'title' => 'Avoid beginner risk mistakes',
        'copy' => 'You will learn how beginners commonly misuse leverage, misunderstand margin, ignore position sizing, and enter trades without a plan.',
    ],
];

$lessons = [
    [
        'title' => 'Lesson 1 — What Is Leverage in Trading?',
        'goal' => 'To explain leverage in simple, beginner-friendly language.',
        'body' => [
            'Leverage allows a trader to control a larger market position than the cash they initially commit. In practical terms, that means a small amount of capital can provide exposure to a much larger trade.',
            'For example, the CFTC explains that with a 2% margin requirement, a trader could open a $100,000 position with only $2,000 in their account. That sounds efficient, but it also means a relatively small adverse price move can create a very large percentage loss on the deposited funds.',
            'This is the single most important beginner concept: leverage does not reduce risk. It reduces the upfront amount needed to open a position, while keeping the exposure large.',
        ],
        'takeaway' => 'Leverage increases exposure, not safety. A larger position can move against you much faster than beginners expect.',
    ],
    [
        'title' => 'Lesson 2 — What Does Margin Mean?',
        'goal' => 'To explain margin clearly and separate it from total trade risk.',
        'body' => [
            'Margin is the amount of money required to open and maintain a leveraged position. In retail trading, it is often referred to as a deposit or security requirement.',
            'A common beginner mistake is assuming margin is the most they can lose. That is incorrect. Margin is simply the amount needed to support the position. The actual profit or loss depends on the full size of the trade and how much the market moves.',
            'If a trade gives you exposure to a large market move using a relatively small deposit, the market only needs to move a modest amount against you for the loss on that deposit to become significant.',
        ],
        'takeaway' => 'Margin is the deposit needed for exposure. It is not the same thing as total trade risk.',
    ],
    [
        'title' => 'Lesson 3 — What Is a Margin Call or Margin Close-Out?',
        'goal' => 'To introduce what happens when losses reduce available funds.',
        'body' => [
            'A margin call generally refers to a situation where the funds in your account are no longer sufficient to support your leveraged positions. Depending on the product, jurisdiction, and broker setup, this may lead to a request to add funds, restrictions on new positions, or an automatic reduction or closure of positions.',
            'For retail CFDs, the FCA requires firms to close out a customer’s position when funds fall to 50% of the margin needed to maintain open positions. This is commonly referred to as a margin close-out protection rule.',
            'This matters because beginners often assume they will have plenty of time to react if a trade moves sharply against them. In reality, fast markets can reduce usable margin quickly, especially when leverage is high.',
        ],
        'takeaway' => 'Margin call risk usually increases when trade size is too large, leverage is too high, or volatility rises unexpectedly.',
    ],
    [
        'title' => 'Lesson 4 — How Leverage Changes Risk',
        'goal' => 'To help beginners connect leverage to actual trading risk.',
        'body' => [
            'Leverage changes the speed and scale of account impact. A trader who uses lower exposure relative to account size can typically absorb ordinary market fluctuations more easily. A trader who uses too much leverage may see the account swing sharply even when the underlying market only moves a little.',
            'That is why regulators have introduced leverage restrictions. The FCA’s permanent retail CFD rules cap leverage depending on the asset class, ranging from 30:1 to 2:1, because excessive leverage was contributing to retail harm.',
            'The CFTC also states plainly that high leverage amplifies both gains and losses. The more leverage you use, the less room you have for error.',
        ],
        'takeaway' => 'Leverage changes not only potential return, but also how quickly a bad trade can damage your account.',
    ],
    [
        'title' => 'Lesson 5 — Beginner Risk Mistakes to Avoid',
        'goal' => 'To address the course learning outcome around avoiding beginner mistakes.',
        'body' => [
            'Most beginner risk mistakes are not caused by lack of effort. They are caused by misunderstanding exposure.',
            'Common beginner mistakes include using too much leverage, confusing margin with affordability, trading without a stop-loss or exit plan, overtrading after a loss, ignoring product complexity, and not understanding account protections and limits.',
            'Retail protections like negative balance protection and margin close-out rules exist for a reason, but they are not substitutes for disciplined risk management.',
        ],
        'takeaway' => 'The biggest beginner risk mistake is treating leverage as a convenience instead of a force multiplier for loss.',
    ],
    [
        'title' => 'Lesson 6 — A Practical Risk Checklist Before You Place a Trade',
        'goal' => 'To give users a usable pre-trade framework.',
        'body' => [
            'Before placing a leveraged trade, a beginner should be able to answer these questions: Do I understand the product I am trading? Do I understand how much exposure I am taking? Do I know how margin works on this position?',
            'Do I know what happens if the market moves against me? Is the position size reasonable for my account? Do I have an exit plan before entering? Am I relying on hope, or on a defined risk setup?',
            'The CFTC and SEC both emphasize that leveraged trading and margin-based exposure can increase losses materially, especially when investors do not fully understand the product mechanics.',
        ],
        'takeaway' => 'Good risk management begins before the trade is opened, not after the trade goes wrong.',
    ],
];

$related_glossary = ['Leverage', 'Margin', 'Margin Call', 'Margin Close-Out', 'Risk-Reward Ratio', 'Stop-Loss', 'Position Size'];
$related_articles = [
    'What Is Leverage in Trading?',
    'What Is Margin and Margin Call?',
    'Common Beginner Trading Risk Mistakes',
    'How Position Size Affects Trading Risk',
    'Why Overleveraging Is Dangerous',
];

$faq_items = [
    ['q' => 'What is leverage in trading?', 'a' => 'Leverage allows a trader to gain exposure to a larger position than the cash committed up front, which can increase both potential gains and potential losses.'],
    ['q' => 'What does margin mean in trading?', 'a' => 'Margin is the deposit required to open and maintain a leveraged position. It is not the same as the maximum amount you can lose.'],
    ['q' => 'What is a margin call?', 'a' => 'A margin call generally refers to a situation where account funds are insufficient to support open leveraged positions, which may lead to action such as additional funding requirements or position reduction or closure. Retail CFD products in the UK are subject to margin close-out rules at 50% of required maintenance margin.'],
    ['q' => 'Why is leverage risky for beginners?', 'a' => 'Leverage is risky because even a small market move can create a large percentage gain or loss relative to the capital deposited. Regulators consistently warn that leverage can magnify losses rapidly.'],
    ['q' => 'What is the most common beginner risk mistake?', 'a' => 'One of the most common mistakes is taking a position that is too large for the account size, simply because margin requirements make it possible to do so.'],
    ['q' => 'Is this course suitable for beginners?', 'a' => 'Yes. This course is structured to help beginners understand leverage, margin, and practical risk thinking before they move into more advanced trading topics.'],
];
require_once __DIR__ . '/../config/course-faq-helpers.php';
$course_faq_visible = course_faq_is_complete($faq_items);
?>

<section class="education-subpage education-course-page">
    <section class="education-subpage-hero education-subpage-hero--course-detail">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">TraderTok Academy Course</div>
            <div class="education-course-breadcrumb">Home &gt; Academy &gt; Courses &gt; Leverage, Margin &amp; Risk Basics</div>
            <h1 class="education-subpage-title">Leverage, Margin &amp; Risk Basics for Beginners</h1>
            <p class="education-subpage-subtitle">
                This practical beginner course explains leverage, margin, margin call, and the core risk concepts every trader should understand before placing a trade. If you are learning forex or CFD trading, this course will help you understand how exposure works and how to avoid common beginner mistakes.
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
                            <a href="#course-example">Simple Leverage Example</a>
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
                        <p>Many beginners hear terms like leverage, margin, and margin call very early in trading, but often misunderstand what they actually mean. That misunderstanding can be costly.</p>
                        <p>At a simple level, leverage means gaining exposure to a larger position with a smaller amount of upfront capital. Margin is the deposit required to open and maintain that leveraged position. Regulators and investor education sources consistently explain that leverage may increase purchasing power or exposure, but it also increases the potential for larger losses.</p>
                        <p>For retail CFD products, the FCA requires leverage caps between 30:1 and 2:1, a 50% margin close-out rule, and negative balance protection for retail clients, reflecting how serious leveraged risk can be. This course is designed to help beginners understand what leverage means in practical trading terms, what margin is and why it matters, what a margin call or margin close-out means, how to think about risk before opening a position, and which beginner mistakes lead to avoidable losses.</p>
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
                        <p>Leverage, margin, and risk basics can be simplified into four ideas: leverage increases exposure with less upfront capital, margin is the deposit required to support that exposure, margin call or close-out risk appears when account funds become insufficient, and beginner losses often come from oversized positions and misunderstood risk.</p>
                        <p>This is why retail regulators have imposed leverage limits, margin protections, and standardized warnings for leveraged retail products.</p>
                    </section>

                    <section class="education-article-block" id="course-example">
                        <h2>Simple leverage example</h2>
                        <div class="education-course-example-panel">
                            <div class="education-course-example-quote">
                                <span>Large Position</span>
                                <strong>Higher Exposure</strong>
                            </div>
                            <div class="education-course-example-quote">
                                <span>Smaller Position</span>
                                <strong>More Room to Manage</strong>
                            </div>
                        </div>
                        <ul class="education-course-example-list">
                            <li>The trade size is much larger than the deposit.</li>
                            <li>The market moves slightly against the trader.</li>
                            <li>Because the exposure is large, the loss on the deposit becomes significant quickly.</li>
                            <li>With a smaller position, the same market move has a smaller account impact and gives the trader more room to manage the trade.</li>
                        </ul>
                        <p>This is the core lesson: risk is shaped not only by direction, but by size and leverage.</p>
                    </section>

                    <section class="education-article-disclaimer" id="course-risk">
                        <h2>Important note for beginners</h2>
                        <p>Leverage can make markets feel more accessible, but it can also make losses happen faster than beginners expect. The FCA’s retail CFD rules require standardized warnings, leverage limits, margin close-out, and negative balance protection because these products were causing rapid retail losses.</p>
                        <p>Leverage and margin increase market exposure and can increase losses rapidly. Trading leveraged products involves significant risk and may not be suitable for all traders. Educational content should not be treated as investment advice.</p>
                    </section>

                    <section class="education-article-block" id="course-next">
                        <h2>Continue learning next</h2>
                        <div class="education-course-related-grid">
                            <article class="education-article-panel">
                                <h3>Suggested next courses</h3>
                                <ul class="education-course-related-list">
                                    <li>Risk Management Essentials</li>
                                    <li>CFD Trading Basics</li>
                                    <li>Forex Trading Fundamentals</li>
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
                            <h2>Understand Leverage Before You Risk Capital</h2>
                            <p>Learn how leverage, margin, and position size affect your exposure, then continue with risk management and beginner trading courses inside TraderTok Academy.</p>
                            <div class="courses-final-cta-actions">
                                <a href="#" class="btn-primary">Start Next Course</a>
                                <a href="./education-article?id=what-is-leverage" class="education-article-link courses-secondary-cta">Explore Risk Articles</a>
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
