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
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">Available Articles</div>
            <h1 class="education-subpage-title">Trading Essentials</h1>
            <p class="education-subpage-subtitle">
                A curated set of educational articles that users can browse as part of the Trading Essentials learning path.
            </p>
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
