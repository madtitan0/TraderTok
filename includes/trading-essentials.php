<?php
$articles_json = file_get_contents(__DIR__ . '/../assets/data/education_articles.json');
$articles = json_decode($articles_json, true);
$display_limit = 20;
?>

<section class="education-subpage education-subpage--articles">
    <section class="education-subpage-hero">
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

    <section class="education-subpage-content">
        <div class="container">


            <div class="education-article-grid">
                <?php if ($articles): ?>
                    <?php foreach (array_slice($articles, 0, $display_limit) as $article): ?>
                    <article class="education-article-card" onclick="handleArticleAccess('<?php echo $article['id']; ?>')">
                        <div class="education-article-card-body">
                            <div class="education-article-meta"><?php echo htmlspecialchars($article['category']); ?></div>
                            <h3 data-i18n="educationArticles.<?php echo $article['id']; ?>.title"><?php echo htmlspecialchars($article['title']); ?></h3>
                            <p data-i18n="educationArticles.<?php echo $article['id']; ?>.excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                            <button class="education-article-link" onclick="event.stopPropagation(); handleArticleAccess('<?php echo $article['id']; ?>')">
                                <span data-i18n="common.learnMore">Read More</span>
                            </button>
                        </div>
                    </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="education-subpage-empty">Articles coming soon.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</section>

<script>
function handleArticleAccess(articleId) {
    const isUnlocked = localStorage.getItem('eduHub_form_submitted') === 'true';
    if (isUnlocked) {
        window.location.href = 'education-article?id=' + articleId;
    } else {
        window.location.href = 'education-hub';
    }
}
</script>
