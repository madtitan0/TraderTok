
    <section class="page-hero1">
        <video class="page-hero-video" autoplay loop muted playsinline>
            <source src="assets/images/education.mp4" type="video/mp4">
        </video>
        <div class="page-hero-overlay"></div>
        <div class="page-hero-content">
            <h1 class="page-hero-title">
                <span data-i18n="tradingEssentials.titlePart1">Educational</span> <span> <span data-i18n="tradingEssentials.titlePart2">Resources</span></span>
            </h1>
             <p class="sec-subtitle">
                <span data-i18n="tradingEssentials.subtitle1">Master the fundamentals of the forex market with our curated collection of essential trading guides.</span> <br/> 
                <span data-i18n="tradingEssentials.subtitle2">Explore our library of 20+ articles. Start from the beginning or dive into a specific topic.</span>
             </p>
            <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>
        </div>
    </section>

    <?php
    $articles_json = file_get_contents(__DIR__ . '/../assets/data/education_articles.json');
    $articles = json_decode($articles_json, true);
    $display_limit = 20;
    ?>

    <section class="hub-content-sec" id="articles" style="padding: 50px 0;">
        <div class="container">
            <!-- <h2 class="sec-title">Educational Resources</h2>
            <p class="sec-subtitle">Explore our library of 20+ articles. Start from the beginning or dive into a specific topic.</p>
             -->
            <div class="article-grid">
                <?php if ($articles): ?>
                    <?php 
                    // Category colour palette for card gradients
                    $categoryColors = [
                        'Forex Basics'      => ['#1a237e', '#283593'],
                        'Trading Mechanics' => ['#1b5e20', '#2e7d32'],
                        'Trading Tools'     => ['#4a148c', '#6a1b9a'],
                        'Risk Management'   => ['#b71c1c', '#c62828'],
                        'Market Analysis'   => ['#e65100', '#ef6c00'],
                        'default'           => ['#1e3a5f', '#0d2137'],
                    ];
                    foreach(array_slice($articles, 0, $display_limit) as $idx => $article):
                        $colors = $categoryColors[$article['category']] ?? $categoryColors['default'];
                    ?>
                    <article class="article-card" onclick="handleArticleAccess('<?php echo $article['id']; ?>')" style="cursor: pointer;">
                        <!-- <div class="article-img" style="background: linear-gradient(135deg, <?php echo $colors[0]; ?>, <?php echo $colors[1]; ?>); position: relative; display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 3rem; font-weight: 900; color: rgba(255,255,255,0.15);"><?php echo str_pad($idx+1, 2, '0', STR_PAD_LEFT); ?></span>
                            <span class="article-cat" style="position: absolute; bottom: 14px; left: 16px; background: rgba(255,255,255,0.15); backdrop-filter: blur(5px); border-radius: 50px; padding: 4px 12px; font-size: 0.7rem; letter-spacing: 0.05em; color: #fff; font-weight: 700; text-transform: uppercase; border: 1px solid rgba(255,255,255,0.2);"><?php echo htmlspecialchars($article['category']); ?></span>
                        </div> -->
                        <div class="article-body">
                            <h3 data-i18n="educationArticles.<?php echo $article['id']; ?>.title"><?php echo htmlspecialchars($article['title']); ?></h3>
                            <p data-i18n="educationArticles.<?php echo $article['id']; ?>.excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                            <button class="btn-read-more" onclick="event.stopPropagation(); handleArticleAccess('<?php echo $article['id']; ?>')"><span data-i18n="common.learnMore">Read More</span> &rarr;</button>
                        </div>
                    </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center; color: var(--text-secondary);">Articles coming soon.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script>
    function handleArticleAccess(articleId) {
        // Check if unlocked via Education Hub submission
        const isUnlocked = localStorage.getItem('eduHub_form_submitted') === 'true';
        if (isUnlocked) {
            window.location.href = 'education-article?id=' + articleId;
        } else {
            // Redirect to registration section on the hub page
            window.location.href = 'education-hub#register';
        }
    }
    </script>
