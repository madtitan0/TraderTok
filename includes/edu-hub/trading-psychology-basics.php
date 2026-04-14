<?php
$course_info = [
    'level' => 'Beginner',
    'lessons' => '6',
    'duration' => '30 mins',
    'format' => 'Read + Learn',
    'category' => 'Trading Psychology',
];

$learning_outcomes = [
    [
        'title' => 'Understand emotional mistakes',
        'copy' => 'You will learn how fear, greed, hope, frustration, boredom, and overconfidence can affect trading behavior.',
    ],
    [
        'title' => 'Improve trading discipline',
        'copy' => 'You will understand why disciplined traders rely on rules, trading plans, and self-control instead of reacting to every market move.',
    ],
    [
        'title' => 'Build a stronger routine',
        'copy' => 'You will learn how pre-trade and post-trade habits can reduce impulsive actions and support more consistent decision-making.',
    ],
];

$lessons = [
    [
        'title' => 'Lesson 1 — What Is Trading Psychology?',
        'goal' => 'To explain trading psychology in simple terms.',
        'body' => [
            'Trading psychology refers to the emotional and mental side of decision-making in markets. It includes how traders react to wins, losses, uncertainty, missed opportunities, volatility, and pressure.',
            'Even when two traders use the same strategy, their results can differ if one follows rules consistently and the other reacts emotionally.',
            'For beginners, trading psychology matters because markets naturally create stress, uncertainty, and pressure that can lead to poor decisions before technical mistakes even appear.',
        ],
        'takeaway' => 'Trading psychology is about how emotions and habits affect execution, especially under uncertainty.',
    ],
    [
        'title' => 'Lesson 2 — Fear, Greed, and Other Common Trading Emotions',
        'goal' => 'To help beginners identify the most common emotional influences.',
        'body' => [
            'Fear may show up as hesitation, panic exits, avoiding valid setups, or closing winners too early. Greed may show up as over-leveraging, taking trades outside the plan, holding too long for more profit, or increasing size without discipline.',
            'Other common emotions include hope, which can lead to holding losing trades too long; frustration, which can trigger revenge trading; boredom, which can push traders into unnecessary positions; and overconfidence, which can follow a winning streak and weaken discipline.',
            'Emotional mistakes often begin before the trade is placed, when the trader stops following process and starts reacting to feelings.',
        ],
        'takeaway' => 'Emotional mistakes often begin when the trader stops following process and starts reacting to feelings.',
    ],
    [
        'title' => 'Lesson 3 — Overtrading, Impatience, and Revenge Trading',
        'goal' => 'To explain common behavior patterns that damage performance.',
        'body' => [
            'Overtrading means trading too much or too often, usually without sufficient quality, discipline, or purpose. It often comes from emotional responses such as impatience, fear of missing out, frustration after a loss, or the urge to make losses back quickly.',
            'This is why revenge trading is so dangerous. After a loss, some traders abandon their plan and increase frequency or size to recover quickly, which usually makes emotional pressure worse rather than better.',
            'A trader can feel productive by staying active, but activity without discipline often leads to worse outcomes.',
        ],
        'takeaway' => 'Overtrading is usually not a market problem. It is a discipline problem.',
    ],
    [
        'title' => 'Lesson 4 — How Discipline Improves Trading Decisions',
        'goal' => 'To cover the learning outcome around improving discipline.',
        'body' => [
            'Discipline in trading means following a defined process even when emotions push you to do something else. That includes respecting entry criteria, position size, stop-loss, target logic, and the decision not to trade when conditions do not fit the plan.',
            'At a practical level, discipline reduces random decisions, lowers unnecessary exposure, creates consistency across trades, makes review and improvement possible, and keeps emotion from reshaping the plan mid-trade.',
            'Discipline does not guarantee winning trades, but it reduces avoidable mistakes and helps performance become more consistent over time.',
        ],
        'takeaway' => 'Discipline does not guarantee winning trades, but it reduces avoidable mistakes and makes performance more consistent.',
    ],
    [
        'title' => 'Lesson 5 — Building a Stronger Trading Routine',
        'goal' => 'To cover the learning outcome around routine-building.',
        'body' => [
            'A strong trading routine helps reduce decision fatigue and emotional drift. Instead of making each trade feel like an isolated high-pressure event, a routine turns trading into a process with steps before, during, and after execution.',
            'A simple beginner routine may include: before trading, review the market context, check major news or event risk, confirm whether the setup matches your plan, define entry, stop-loss, target, and risk per trade. During trading, avoid changing the plan impulsively, do not add size emotionally, and let the trade play out according to rules. After trading, record what happened, note whether the trade followed the plan, and identify emotional mistakes separately from strategy mistakes.',
            'Routine makes it easier to repeat good behavior and spot emotional mistakes before they become habits.',
        ],
        'takeaway' => 'A routine reduces the chance that emotions take control at the most important moments.',
    ],
    [
        'title' => 'Lesson 6 — A Practical Trading Psychology Checklist for Beginners',
        'goal' => 'To turn the course into a usable process.',
        'body' => [
            'Before placing a trade, a beginner should ask: am I trading because the setup fits my plan or because I feel urgency? Am I increasing size because I am confident or because I am emotional? Am I trying to recover a recent loss too quickly? Do I know exactly where I will exit if wrong? Am I taking this trade because I am bored? Would I take the same trade if the previous trade had been a winner instead of a loser?',
            'These questions help separate process-driven decisions from emotionally driven ones. That separation is one of the biggest improvements a beginner can make.',
            'Better trading psychology starts with self-awareness, but it improves through repeated habits and honest review.',
        ],
        'takeaway' => 'Better trading psychology starts with self-awareness, but it improves through repeated habits and honest review.',
    ],
];

$related_glossary = ['Fear', 'Greed', 'Overtrading', 'Discipline', 'Trading Plan', 'Revenge Trading', 'Loss Aversion'];
$related_articles = [
    'Fear and Greed in Trading',
    'How to Stop Overtrading',
    'Common Emotional Mistakes Traders Make',
    'Why a Trading Plan Improves Discipline',
    'Building a Better Trading Routine',
];

$faq_items = [
    ['q' => 'What is trading psychology?', 'a' => 'Trading psychology is the emotional and mental side of trading, including how fear, greed, discipline, confidence, and habits affect decision-making.'],
    ['q' => 'Why is trading psychology important for beginners?', 'a' => 'It is important because beginners often make mistakes from emotion rather than analysis, including panic exits, overtrading, or abandoning a trading plan.'],
    ['q' => 'What is overtrading?', 'a' => 'Overtrading is excessive trading, often caused by emotional responses such as trying to recover losses quickly or trading too frequently without quality setups.'],
    ['q' => 'How can traders improve discipline?', 'a' => 'Traders can improve discipline by using a written plan, journaling trades, defining risk before entry, and following a repeatable routine instead of reacting emotionally.'],
    ['q' => 'What emotions affect trading the most?', 'a' => 'Common emotions include fear, greed, hope, frustration, boredom, and overconfidence. These can distort trade timing, position size, and decision quality.'],
    ['q' => 'Is this course suitable for beginners?', 'a' => 'Yes. This course is structured to help beginners understand emotional mistakes, improve discipline, and build a stronger routine in a simple and practical way.'],
];
require_once __DIR__ . '/../config/course-faq-helpers.php';
$course_faq_visible = course_faq_is_complete($faq_items);
?>

<section class="education-subpage education-course-page">
    <section class="education-subpage-hero education-subpage-hero--course-detail">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">TraderTok Academy Course</div>
            <div class="education-course-breadcrumb">Home &gt; Academy &gt; Courses &gt; Trading Psychology Basics</div>
            <h1 class="education-subpage-title">Trading Psychology Basics for Beginners</h1>
            <p class="education-subpage-subtitle">
                This beginner-friendly course explores the emotional side of trading, including fear, greed, impatience, overtrading, frustration, and the habits that support better discipline. If you are new to trading, this course will help you understand why emotions affect decisions and how to build a stronger routine around your trading process.
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
                            <a href="#course-example">Simple Psychology Example</a>
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
                        <p>Trading psychology is the study of how emotions, habits, and mental biases affect trading decisions. A trader may understand charts, risk management, and market structure, but still perform poorly if fear, greed, frustration, boredom, or overconfidence repeatedly interfere with execution.</p>
                        <p>For beginners, trading psychology is not about removing emotion completely. It is about understanding emotional patterns early enough to stop them from driving impulsive decisions.</p>
                        <p>This course is designed to help you understand the most common emotional mistakes in trading, why discipline matters more than impulse, how fear, greed, and impatience affect execution, why overtrading happens, and how to build a routine that supports better decisions.</p>
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
                        <p>Trading psychology basics can be simplified into five core ideas: emotions influence trading decisions more than many beginners expect, fear, greed, frustration, and boredom can all damage execution, overtrading often comes from impatience or loss-recovery behavior, discipline improves consistency by keeping traders aligned with rules, and routines and journals make emotional mistakes easier to spot and reduce over time.</p>
                        <p>Even a good strategy can break down if the trader repeatedly overrides it emotionally.</p>
                    </section>

                    <section class="education-article-block" id="course-example">
                        <h2>Simple psychology example</h2>
                        <div class="education-course-example-panel">
                            <div class="education-course-example-quote">
                                <span>Impulse</span>
                                <strong>Re-entering After a Loss</strong>
                            </div>
                            <div class="education-course-example-quote">
                                <span>Discipline</span>
                                <strong>Waiting for the Setup Again</strong>
                            </div>
                        </div>
                        <ul class="education-course-example-list">
                            <li>After getting stopped out, a trader may feel frustration, fear of missing out, or the urge to recover losses quickly.</li>
                            <li>That emotional pressure can lead to a second trade without checking whether the setup still fits the plan.</li>
                            <li>A disciplined process accepts the loss, reviews whether conditions still match the plan, and waits for proper confirmation instead of reacting emotionally.</li>
                        </ul>
                        <p>This is the difference between impulse and discipline.</p>
                    </section>

                    <section class="education-article-disclaimer" id="course-risk">
                        <h2>Important note for beginners</h2>
                        <p>Trading psychology does not replace risk management, and it does not eliminate losses. What it does is reduce the chance that one loss turns into a chain of poor decisions.</p>
                        <p>Emotional control is an important part of trading discipline, but it does not remove market risk. Trading leveraged products involves significant risk, and psychological mistakes can increase exposure if not managed through clear rules and routines.</p>
                    </section>

                    <section class="education-article-block" id="course-next">
                        <h2>Continue learning next</h2>
                        <div class="education-course-related-grid">
                            <div>
                                <h3>Suggested next steps</h3>
                                <ul class="education-course-related-list">
                                    <li>Risk Management Essentials</li>
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
                            <h2>Trade with more discipline, not more emotion</h2>
                            <p>
                                Learn how to identify emotional mistakes, reduce overtrading, and build a stronger trading routine before moving into more advanced strategy content inside TraderTok Academy.
                            </p>
                        </div>
                        <div class="education-course-final-cta-actions">
                            <a href="#" class="btn-primary">Start Next Course</a>
                            <a href="#" class="education-article-link courses-secondary-cta">Explore Psychology Articles</a>
                            <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="education-article-link courses-secondary-cta">Open Demo Account</a>
                            <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="education-article-link courses-secondary-cta">Open Live Account</a>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </section>
</section>
