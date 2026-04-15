<?php
$resource_tools = [
    [
        'label' => 'Trading Calculator',
        'title' => 'Position Size Calculator',
        'description' => 'Helps users estimate how position sizing relates to account size, risk level, and trade planning.',
    ],
    [
        'label' => 'Trading Calculator',
        'title' => 'Pip Calculator',
        'description' => 'Explains how pip value can vary across instruments and helps users better understand price movement impact.',
    ],
    [
        'label' => 'Trading Calculator',
        'title' => 'Risk-Reward Calculator',
        'description' => 'Supports users in comparing potential risk against potential return before entering a trade setup.',
    ],
    [
        'label' => 'Market Guide',
        'title' => 'Market Sessions Guide',
        'description' => 'Shows how session timing affects market activity and why some trading hours may feel more active than others.',
    ],
    [
        'label' => 'Market Guide',
        'title' => 'Economic Calendar Guide',
        'description' => 'Helps users understand how to read economic events and why scheduled releases can influence volatility.',
    ],
    [
        'label' => 'Planning Resource',
        'title' => 'Trading Journal Template',
        'description' => 'Encourages users to track decisions, observations, and trade outcomes in a more structured way.',
    ],
    [
        'label' => 'Checklist',
        'title' => 'Pre-Trade Checklist',
        'description' => 'A practical checklist users can review before entering a trade to help improve consistency and discipline.',
    ],
    [
        'label' => 'Checklist',
        'title' => 'Demo Trading Checklist',
        'description' => 'A useful framework for users practicing in a demo environment before moving further into platform use and market learning.',
    ],
];

$resource_groups = [
    [
        'title' => 'Calculators',
        'description' => 'Useful for understanding trade size, pip value, and risk-reward relationships in a more practical way.',
    ],
    [
        'title' => 'Guides',
        'description' => 'Helpful references for market sessions, calendar events, and platform-related planning.',
    ],
    [
        'title' => 'Checklists and Templates',
        'description' => 'Structured tools that can support journaling, preparation, and more consistent decision-making.',
    ],
];

$practical_uses = [
    'Review position size and risk-reward before entering a setup.',
    'Use the economic calendar guide to understand when volatility may increase.',
    'Work through a pre-trade checklist to confirm the setup and platform details are clear.',
    'Track observations in a journal template to improve learning over time.',
];
?>

<section class="education-subpage education-subpage--resources">
    <section class="education-subpage-hero education-subpage-hero--resources">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">Tools &amp; Resources</div>
            <h1 class="education-subpage-title">Trading Tools &amp; Resources</h1>
            <p class="education-subpage-subtitle">
                Access TraderTok trading tools and resources including calculators, economic calendar guides, trading checklists, and practical learning support.
            </p>
            <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="education-user-strip">
                <div class="education-user-strip-card">
                    <div class="education-article-meta">Why This Page Helps</div>
                    <h3>Useful for users who want practical tools alongside educational content</h3>
                    <p>This page brings together calculators, checklists, and learning aids that can help users understand planning, market timing, and trade structure more clearly.</p>
                </div>
                <div class="education-user-strip-card">
                    <div class="education-article-meta">How to Use It</div>
                    <h3>Choose a tool based on the part of the process you want to understand better</h3>
                    <p>Some resources are useful before a trade is placed, while others are better for planning, reviewing, or understanding how market events may affect price behaviour.</p>
                </div>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Resource Categories</h2>
                <p class="education-subpage-section-subtitle">The tools are organized into calculators, guides, and checklists so users can find the right type of support quickly.</p>
            </div>

            <div class="resources-category-grid">
                <?php foreach ($resource_groups as $group): ?>
                    <article class="resources-category-card">
                        <div class="education-article-meta">Category</div>
                        <h3><?php echo htmlspecialchars($group['title']); ?></h3>
                        <p><?php echo htmlspecialchars($group['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Available Tools &amp; Resources</h2>
                <p class="education-subpage-section-subtitle">A practical library of educational resources users can use for planning, reviewing, and understanding key market concepts.</p>
            </div>

            <div class="resources-tool-grid">
                <?php foreach ($resource_tools as $tool): ?>
                    <article class="resources-tool-card">
                        <div class="education-article-meta"><?php echo htmlspecialchars($tool['label']); ?></div>
                        <h3><?php echo htmlspecialchars($tool['title']); ?></h3>
                        <p><?php echo htmlspecialchars($tool['description']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">When Users Commonly Use These Resources</h2>
                <p class="education-subpage-section-subtitle">A simple guide to how these tools can support learning before, during, and after the trading process.</p>
            </div>

            <section class="resources-practical-panel">
                <div class="resources-practical-copy">
                    <div class="education-article-meta">Practical Learning Support</div>
                    <h3>Resources that help users prepare, review, and learn more consistently</h3>
                    <p>These tools are not just references. They can help users build better routines around planning, risk awareness, market timing, and post-trade review.</p>
                </div>
                <ul class="resources-practical-list">
                    <?php foreach ($practical_uses as $use): ?>
                        <li><?php echo htmlspecialchars($use); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <div class="education-article-grid">
                <article class="education-article-card">
                    <div class="education-article-card-body">
                        <div class="education-article-meta">Checklist</div>
                        <h3>Pre-Trade Checklist</h3>
                        <p>A straightforward way for users to confirm setup quality, timing, and planning details before placing an order.</p>
                    </div>
                </article>
                <article class="education-article-card">
                    <div class="education-article-card-body">
                        <div class="education-article-meta">Guide</div>
                        <h3>Economic Calendar Guide</h3>
                        <p>Useful for understanding scheduled events and why some market periods may become more active than others.</p>
                    </div>
                </article>
                <article class="education-article-card">
                    <div class="education-article-card-body">
                        <div class="education-article-meta">Template</div>
                        <h3>Trading Journal Template</h3>
                        <p>Supports users who want to document observations and develop stronger learning habits over time.</p>
                    </div>
                </article>
            </div>

            <section class="education-user-strip education-user-strip--single">
                <div class="education-user-strip-card">
                    <div class="education-article-meta">Useful Note</div>
                    <h3>These tools are meant to support understanding and preparation</h3>
                    <p>The purpose of this section is educational. It gives users practical resources that can help them understand trading concepts, structure their process, and learn in a more organized way.</p>
                </div>
            </section>

            <?php include __DIR__ . '/partials/education-hub-account-ctas.php'; ?>
        </div>
    </section>
</section>
