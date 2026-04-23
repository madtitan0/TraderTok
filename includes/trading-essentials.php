
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
    if (!is_array($articles)) {
        $articles = [];
    }
    $per_page = 20;
    $articles_page = isset($_GET['articles_page']) ? (int) $_GET['articles_page'] : 1;
    if ($articles_page < 1) {
        $articles_page = 1;
    }
    $total_articles = count($articles);
    $total_pages = $total_articles > 0 ? (int) max(1, (int) ceil($total_articles / $per_page)) : 1;
    if ($articles_page > $total_pages) {
        $articles_page = $total_pages;
    }
    $offset = ($articles_page - 1) * $per_page;
    $paged_articles = array_slice($articles, $offset, $per_page);

    $te_list_href = static function (int $pageNum): string {
        if ($pageNum <= 1) {
            return routeUrl('trading-essentials');
        }
        return routeUrl('trading-essentials', ['articles_page' => $pageNum]);
    };
    ?>

    <section class="hub-content-sec" id="articles" style="padding: 50px 0;">
        <div class="container">
            <!-- <h2 class="sec-title">Educational Resources</h2>
            <p class="sec-subtitle">Explore our library of 20+ articles. Start from the beginning or dive into a specific topic.</p>
             -->
            <div class="article-grid">
                <?php if ($paged_articles): ?>
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
                    foreach ($paged_articles as $idx => $article):
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

            <?php if ($total_pages > 1): ?>
            <nav class="trading-essentials-pagination" aria-label="Article pages">
                <div class="trading-essentials-pagination__inner">
                    <?php if ($articles_page > 1): ?>
                        <a href="<?php echo htmlspecialchars($te_list_href($articles_page - 1), ENT_QUOTES, 'UTF-8'); ?>" class="trading-essentials-pagination__link--nav" data-i18n="tradingEssentials.paginationPrev">Previous</a>
                    <?php else: ?>
                        <span class="trading-essentials-pagination__muted" data-i18n="tradingEssentials.paginationPrev">Previous</span>
                    <?php endif; ?>

                    <span class="trading-essentials-pagination__status">
                        <span data-i18n="tradingEssentials.paginationPage">Page</span>
                        <?php echo (int) $articles_page; ?>
                        <span data-i18n="tradingEssentials.paginationOf">of</span>
                        <?php echo (int) $total_pages; ?>
                    </span>

                    <?php if ($articles_page < $total_pages): ?>
                        <a href="<?php echo htmlspecialchars($te_list_href($articles_page + 1), ENT_QUOTES, 'UTF-8'); ?>" class="trading-essentials-pagination__link--nav" data-i18n="tradingEssentials.paginationNext">Next</a>
                    <?php else: ?>
                        <span class="trading-essentials-pagination__muted" data-i18n="tradingEssentials.paginationNext">Next</span>
                    <?php endif; ?>
                </div>
            </nav>
            <?php endif; ?>
        </div>
    </section>

    <script>
    function handleArticleAccess(articleId) {
        if (window.EduLeadGate && typeof window.EduLeadGate.openModal === 'function') {
            window.EduLeadGate.openModal('education-article?id=' + encodeURIComponent(articleId));
            return;
        }
        window.location.href = 'education-article?id=' + encodeURIComponent(articleId);
    }
    </script>
