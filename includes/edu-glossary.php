<?php
$glossary_terms = [
    ['term' => 'Ask Price', 'slug' => 'ask-price', 'letter' => 'A', 'definition' => 'The lowest price at which a seller is willing to sell an instrument.', 'featured' => true],
    ['term' => 'Base Currency', 'slug' => 'base-currency', 'letter' => 'B', 'definition' => 'The first currency listed in a forex pair, used as the reference unit for pricing.'],
    ['term' => 'Bear Market', 'slug' => 'bear-market', 'letter' => 'B', 'definition' => 'A market environment where prices are generally falling and sentiment is weak.', 'featured' => true],
    ['term' => 'Bid Price', 'slug' => 'bid-price', 'letter' => 'B', 'definition' => 'The highest price a buyer is currently willing to pay for an instrument.', 'featured' => true],
    ['term' => 'Bull Market', 'slug' => 'bull-market', 'letter' => 'B', 'definition' => 'A market environment where prices are generally rising and sentiment is optimistic.', 'featured' => true],
    ['term' => 'CFD', 'slug' => 'cfd', 'letter' => 'C', 'definition' => 'A contract for difference, allowing traders to speculate on price movement without owning the underlying asset.', 'featured' => true],
    ['term' => 'Currency Pair', 'slug' => 'currency-pair', 'letter' => 'C', 'definition' => 'Two currencies quoted together, showing how much of the second currency is needed to buy one unit of the first.', 'featured' => true],
    ['term' => 'Drawdown', 'slug' => 'drawdown', 'letter' => 'D', 'definition' => 'The decline in account value from a peak to a lower point, often measured as a percentage.'],
    ['term' => 'Equity', 'slug' => 'equity', 'letter' => 'E', 'definition' => 'The current value of a trading account including open profits and losses.'],
    ['term' => 'Fundamental Analysis', 'slug' => 'fundamental-analysis', 'letter' => 'F', 'definition' => 'A method of analyzing markets using economic data, company news, and broader financial conditions.', 'featured' => true],
    ['term' => 'Hedging', 'slug' => 'hedging', 'letter' => 'H', 'definition' => 'A strategy used to reduce exposure to market risk by taking an offsetting position.'],
    ['term' => 'Leverage', 'slug' => 'leverage', 'letter' => 'L', 'definition' => 'Borrowed trading exposure that allows a trader to control a larger position with a smaller deposit.', 'featured' => true],
    ['term' => 'Liquidity', 'slug' => 'liquidity', 'letter' => 'L', 'definition' => 'The ease with which an instrument can be bought or sold without causing major price changes.', 'featured' => true],
    ['term' => 'Long Position', 'slug' => 'long-position', 'letter' => 'L', 'definition' => 'A trade that aims to benefit from a rise in price.'],
    ['term' => 'Lot Size', 'slug' => 'lot-size', 'letter' => 'L', 'definition' => 'A standardized trade size used to measure the volume of a position in the market.', 'featured' => true],
    ['term' => 'Margin', 'slug' => 'margin', 'letter' => 'M', 'definition' => 'The amount of funds required to open and maintain a leveraged position.', 'featured' => true],
    ['term' => 'Margin Call', 'slug' => 'margin-call', 'letter' => 'M', 'definition' => 'A warning that account funds are too low to support open positions.'],
    ['term' => 'Pip', 'slug' => 'pip', 'letter' => 'P', 'definition' => 'A standard unit used to measure price movement in forex markets.', 'featured' => true],
    ['term' => 'Position Size', 'slug' => 'position-size', 'letter' => 'P', 'definition' => 'The total amount of an instrument traded in a single position.'],
    ['term' => 'Resistance', 'slug' => 'resistance', 'letter' => 'R', 'definition' => 'A price level where upward movement may slow or reverse due to selling pressure.'],
    ['term' => 'Risk-Reward Ratio', 'slug' => 'risk-reward-ratio', 'letter' => 'R', 'definition' => 'A comparison between the amount risked on a trade and the potential return.'],
    ['term' => 'Short Position', 'slug' => 'short-position', 'letter' => 'S', 'definition' => 'A trade that aims to benefit from a fall in price.'],
    ['term' => 'Slippage', 'slug' => 'slippage', 'letter' => 'S', 'definition' => 'The difference between the expected price of a trade and the price at which it is executed.'],
    ['term' => 'Spread', 'slug' => 'spread', 'letter' => 'S', 'definition' => 'The difference between the bid price and the ask price.', 'featured' => true],
    ['term' => 'Stop-Loss', 'slug' => 'stop-loss', 'letter' => 'S', 'definition' => 'An order designed to limit losses by closing a trade at a specified price.', 'featured' => true],
    ['term' => 'Support', 'slug' => 'support', 'letter' => 'S', 'definition' => 'A price level where downward movement may slow or reverse due to buying pressure.'],
    ['term' => 'Swap', 'slug' => 'swap', 'letter' => 'S', 'definition' => 'An overnight financing adjustment that may be charged or credited on open positions.'],
    ['term' => 'Take-Profit', 'slug' => 'take-profit', 'letter' => 'T', 'definition' => 'An order used to close a position automatically once a target profit level is reached.'],
    ['term' => 'Technical Analysis', 'slug' => 'technical-analysis', 'letter' => 'T', 'definition' => 'A method of analyzing markets using charts, price action, and indicators.', 'featured' => true],
    ['term' => 'Volatility', 'slug' => 'volatility', 'letter' => 'V', 'definition' => 'The degree to which market prices move up or down over a period of time.', 'featured' => true],
];

$featured_terms = array_values(array_filter($glossary_terms, static function ($term) {
    return !empty($term['featured']);
}));

$latest_terms = array_slice(array_reverse($glossary_terms), 0, 8);

$related_guides = [
    [
        'title' => 'What Is Forex Trading?',
        'description' => 'Start with the core mechanics of how the forex market works and why currencies move.',
        'href' => './education-article?id=what-is-forex-trading'
    ],
    [
        'title' => 'What Is Leverage in Trading?',
        'description' => 'Understand how leverage works, why it matters, and how to approach it responsibly.',
        'href' => './education-article?id=what-is-leverage'
    ],
    [
        'title' => 'Risk Management in Trading',
        'description' => 'Learn the principles behind protecting capital and managing position exposure.',
        'href' => './education-article?id=risk-management-in-trading'
    ],
];

$starter_terms = [
    [
        'term' => 'Leverage',
        'plain' => 'Lets a trader control a bigger position with a smaller amount of money.',
    ],
    [
        'term' => 'Margin',
        'plain' => 'The funds set aside to keep a leveraged trade open.',
    ],
    [
        'term' => 'Pip',
        'plain' => 'A standard way to measure small price changes in forex.',
    ],
    [
        'term' => 'Spread',
        'plain' => 'The difference between the buy price and the sell price.',
    ],
];

$glossary_letters = [];
foreach (range('A', 'Z') as $letter) {
    $terms_for_letter = array_values(array_filter($glossary_terms, static function ($term) use ($letter) {
        return $term['letter'] === $letter;
    }));

    if (!empty($terms_for_letter)) {
        $glossary_letters[$letter] = $terms_for_letter;
    }
}
?>

<section class="education-subpage education-subpage--glossary">
    <section class="education-subpage-hero education-subpage-hero--glossary">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">Trading Terminology</div>
            <h1 class="education-subpage-title">Trading Glossary: Forex &amp; CFD Terms Explained</h1>
            <p class="education-subpage-subtitle">
                Understand essential forex and CFD trading terms with clear definitions for leverage, margin, pip, spread, stop-loss, slippage, and more.
            </p>
            <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Search and Browse the Glossary</h2>
                <p class="education-subpage-section-subtitle">Use the search box or jump through the A-Z index to quickly find the trading terms you need.</p>
            </div>

            <div class="glossary-toolbar">
                <div class="glossary-search">
                    <label for="glossary-search-input" class="glossary-search-label">Search terms</label>
                    <input id="glossary-search-input" type="search" placeholder="Search trading terminology" class="glossary-search-input">
                </div>
                <div class="glossary-az-index" aria-label="Glossary A to Z index">
                    <?php foreach ($glossary_letters as $letter => $terms_for_letter): ?>
                        <a href="#glossary-letter-<?php echo strtolower($letter); ?>" class="glossary-az-link"><?php echo $letter; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="education-user-strip">
                <div class="education-user-strip-card">
                    <div class="education-article-meta">How to Use This Page</div>
                    <h3>Start with a term you keep seeing, then move into the related guides</h3>
                    <p>If a word keeps coming up in articles, webinars, or platform tutorials, search it here first. Once the meaning is clear, use the related beginner guides to understand how that concept works in context.</p>
                </div>
                <div class="education-user-strip-card">
                    <div class="education-article-meta">Why This Helps</div>
                    <h3>It reduces confusion and makes the rest of the Education Hub easier to follow</h3>
                    <p>Many users get stuck because the terminology feels technical. This glossary is meant to simplify the language so the rest of the learning path becomes easier to understand.</p>
                </div>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Start Here: Common Beginner Terms</h2>
                <p class="education-subpage-section-subtitle">A simple starting point for users who want plain-language explanations before diving deeper.</p>
            </div>

            <div class="glossary-starter-grid">
                <?php foreach ($starter_terms as $starter_term): ?>
                    <article class="glossary-definition-card glossary-definition-card--starter">
                        <h3><?php echo htmlspecialchars($starter_term['term']); ?></h3>
                        <p><?php echo htmlspecialchars($starter_term['plain']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Featured Beginner Terms</h2>
                <p class="education-subpage-section-subtitle">A focused set of core concepts that many newer traders look for first.</p>
            </div>

            <div class="education-article-grid glossary-featured-grid">
                <?php foreach ($featured_terms as $term): ?>
                    <article class="education-article-card glossary-term-card" data-term="<?php echo strtolower($term['term']); ?>" data-letter="<?php echo strtolower($term['letter']); ?>">
                        <div class="education-article-card-body">
                            <div class="education-article-meta">Featured Term</div>
                            <h3><?php echo htmlspecialchars($term['term']); ?></h3>
                            <p><?php echo htmlspecialchars($term['definition']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Latest Glossary Entries</h2>
                <p class="education-subpage-section-subtitle">Recently added and refreshed definitions to support your learning journey.</p>
            </div>

            <div class="education-article-grid glossary-latest-grid">
                <?php foreach ($latest_terms as $term): ?>
                    <article class="education-article-card glossary-term-card" data-term="<?php echo strtolower($term['term']); ?>" data-letter="<?php echo strtolower($term['letter']); ?>">
                        <div class="education-article-card-body">
                            <div class="education-article-meta">Latest Entry</div>
                            <h3><?php echo htmlspecialchars($term['term']); ?></h3>
                            <p><?php echo htmlspecialchars($term['definition']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">A-Z Glossary</h2>
                <p class="education-subpage-section-subtitle">Browse all launch terms in a clean alphabetical structure that matches the rest of the Education Hub.</p>
            </div>

            <div class="glossary-letter-groups">
                <?php foreach ($glossary_letters as $letter => $terms_for_letter): ?>
                    <section id="glossary-letter-<?php echo strtolower($letter); ?>" class="glossary-letter-group">
                        <div class="glossary-letter-heading"><?php echo $letter; ?></div>
                        <div class="glossary-letter-grid">
                            <?php foreach ($terms_for_letter as $term): ?>
                                <article class="glossary-definition-card glossary-term-card" data-term="<?php echo strtolower($term['term']); ?>" data-letter="<?php echo strtolower($term['letter']); ?>">
                                    <h3><?php echo htmlspecialchars($term['term']); ?></h3>
                                    <p><?php echo htmlspecialchars($term['definition']); ?></p>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>

            <div class="education-subpage-header">
                <h2 class="education-subpage-section-title">Related Beginner Guides</h2>
                <p class="education-subpage-section-subtitle">Continue learning with supporting educational articles connected to these glossary concepts.</p>
            </div>

            <div class="education-article-grid">
                <?php foreach ($related_guides as $guide): ?>
                    <article class="education-article-card">
                        <div class="education-article-card-body">
                            <div class="education-article-meta">Beginner Guide</div>
                            <h3><?php echo htmlspecialchars($guide['title']); ?></h3>
                            <p><?php echo htmlspecialchars($guide['description']); ?></p>
                            <a class="education-article-link" href="<?php echo htmlspecialchars($guide['href']); ?>">Read Guide</a>
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
    const searchInput = document.getElementById('glossary-search-input');
    const termCards = document.querySelectorAll('.glossary-term-card');
    const letterGroups = document.querySelectorAll('.glossary-letter-group');

    if (!searchInput) return;

    searchInput.addEventListener('input', function () {
        const query = this.value.trim().toLowerCase();

        termCards.forEach(function (card) {
            const term = card.getAttribute('data-term') || '';
            const isVisible = !query || term.indexOf(query) !== -1;
            card.style.display = isVisible ? '' : 'none';
        });

        letterGroups.forEach(function (group) {
            const visibleCards = group.querySelectorAll('.glossary-definition-card[style="display: none;"]');
            const totalCards = group.querySelectorAll('.glossary-definition-card').length;
            group.hidden = totalCards > 0 && visibleCards.length === totalCards;
        });
    });
});
</script>
