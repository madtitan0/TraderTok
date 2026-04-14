<?php
$articles_json = file_get_contents(__DIR__ . '/../assets/data/education_articles.json');
$articles = json_decode($articles_json, true);
$article_id = $_GET['id'] ?? '';
$article = null;

foreach ($articles as $item) {
    if (($item['id'] ?? '') === $article_id) {
        $article = $item;
        break;
    }
}

if (!$article && !empty($articles)) {
    $article = $articles[0];
}

$related_articles = array_values(array_filter($articles, function ($item) use ($article) {
    return ($item['id'] ?? '') !== ($article['id'] ?? '');
}));
$related_articles = array_slice($related_articles, 0, 3);
?>

<section class="education-subpage education-article-page">
    <section class="education-subpage-hero education-article-hero">
        <video class="page-hero-video" autoplay loop muted playsinline>
            <source src="assets/images/education.mp4" type="video/mp4">
        </video>
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow"><?php echo htmlspecialchars($article['category'] ?? 'Article'); ?></div>
            <h1 class="education-subpage-title"><?php echo htmlspecialchars($article['title'] ?? 'Education Article'); ?></h1>
            <p class="education-subpage-subtitle"><?php echo htmlspecialchars($article['excerpt'] ?? ''); ?></p>
            <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="education-article-layout">
                <aside class="education-article-sidebar">
                    <div class="education-article-panel">
                        <div class="education-article-panel-label">Article Overview</div>
                        <h2><?php echo htmlspecialchars($article['title'] ?? ''); ?></h2>
                        <p><?php echo htmlspecialchars($article['meta_description'] ?? $article['excerpt'] ?? ''); ?></p>
                    </div>

                    <?php if (!empty($article['content']['sections'])): ?>
                    <div class="education-article-panel">
                        <div class="education-article-panel-label">In This Article</div>
                        <ul class="education-article-toc">
                            <?php foreach ($article['content']['sections'] as $index => $section): ?>
                            <li>
                                <a href="#article-section-<?php echo $index + 1; ?>">
                                    <?php echo htmlspecialchars($section['heading'] ?? 'Section'); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </aside>

                <article class="education-article-main">
                    <?php if (!empty($article['content']['introduction'])): ?>
                    <section class="education-article-block">
                        <div class="education-article-block-label">Introduction</div>
                        <p><?php echo htmlspecialchars($article['content']['introduction']); ?></p>
                    </section>
                    <?php endif; ?>

                    <?php if (!empty($article['content']['sections'])): ?>
                        <?php foreach ($article['content']['sections'] as $index => $section): ?>
                        <section class="education-article-block" id="article-section-<?php echo $index + 1; ?>">
                            <h2><?php echo htmlspecialchars($section['heading'] ?? ''); ?></h2>
                            <p><?php echo htmlspecialchars($section['text'] ?? ''); ?></p>
                        </section>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (!empty($article['content']['conclusion'])): ?>
                    <section class="education-article-block">
                        <div class="education-article-block-label">Conclusion</div>
                        <p><?php echo htmlspecialchars($article['content']['conclusion']); ?></p>
                    </section>
                    <?php endif; ?>

                    <?php if (!empty($article['content']['disclaimer'])): ?>
                    <section class="education-article-disclaimer">
                        <div class="education-article-block-label">Educational Disclaimer</div>
                        <p><?php echo htmlspecialchars($article['content']['disclaimer']); ?></p>
                    </section>
                    <?php endif; ?>
                </article>
            </div>

            <?php if (!empty($related_articles)): ?>
            <section class="education-article-related">
                <div class="education-subpage-header">
                    <h2 class="education-subpage-section-title">Related Articles</h2>
                    <p class="education-subpage-section-subtitle">Continue exploring other educational topics from the same content library.</p>
                </div>

                <div class="education-article-grid">
                    <?php foreach ($related_articles as $related): ?>
                    <article class="education-article-card" onclick="window.location.href='./education-article?id=<?php echo htmlspecialchars($related['id']); ?>'">
                        <div class="education-article-card-body">
                            <div class="education-article-meta"><?php echo htmlspecialchars($related['category'] ?? 'Article'); ?></div>
                            <h3><?php echo htmlspecialchars($related['title'] ?? ''); ?></h3>
                            <p><?php echo htmlspecialchars($related['excerpt'] ?? ''); ?></p>
                            <button class="education-article-link" onclick="event.stopPropagation(); window.location.href='./education-article?id=<?php echo htmlspecialchars($related['id']); ?>'">Read Article</button>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>

            <?php include __DIR__ . '/partials/education-hub-account-ctas.php'; ?>
        </div>
    </section>
</section>
