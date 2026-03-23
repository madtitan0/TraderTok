<?php
$id = $_GET['id'] ?? '';
$articles_json = file_get_contents('assets/data/education_articles.json');
$articles = json_decode($articles_json, true);

$article = null;
foreach ($articles as $a) {
    if ($a['id'] === $id) {
        $article = $a;
        break;
    }
}

if (!$article) {
    header("Location: education-hub");
    exit;
}
?>

<div class="article-detail-page">
    <div class="container">

        <!-- Breadcrumb -->
        <nav class="edu-breadcrumb-nav">
            <a href="education-hub" data-i18n="educationArticles.general.title">Education Academy</a>
            <span class="separator">/</span>
            <span class="current" data-i18n="educationArticles.<?php echo $article['id']; ?>.title"><?php echo htmlspecialchars($article['title']); ?></span>
        </nav>

        <header class="article-header">
            <!-- <h1 class="article-hero-title">
                <?php echo htmlspecialchars($article['title']); ?>
            </h1> -->

            <h1 class="article-hero-title" data-i18n="educationArticles.<?php echo $article['id']; ?>.title">
                <?php echo htmlspecialchars($article['title']); ?>
            </h1>

            <div class="article-meta">  
                <span class="category">
                    <?php echo htmlspecialchars($article['category']); ?>
                </span>
                <span class="read-time" data-i18n="educationArticles.general.time">5 min read</span>
            </div>
        </header>

        <div class="article-content-wrapper">

            <main class="article-main-content">

                <div class="article-body-text">

                    <!-- <p class="intro-lead">
                        <?php echo htmlspecialchars($article['content']['introduction']); ?>
                    </p> -->

                    <p class="intro-lead" data-i18n="educationArticles.<?php echo $article['id']; ?>.content.introduction">
                         <?php echo htmlspecialchars($article['content']['introduction']); ?>
                    </p>


                    <!-- <?php foreach($article['content']['sections'] as $section): ?>
                        <section class="content-section">

                            <h2>
                                <?php echo htmlspecialchars($section['heading']); ?>
                            </h2>

                            <div class="section-text">
                                <?php echo nl2br(htmlspecialchars($section['text'])); ?>
                            </div>

                        </section>
                    <?php endforeach; ?> -->

                    <?php foreach($article['content']['sections'] as $key => $section): ?>
                    <section class="content-section">
                        <h2 data-i18n="educationArticles.<?php echo $article['id']; ?>.content.sections.<?php echo $key; ?>.heading"></h2>
                        <div class="section-text" data-i18n="educationArticles.<?php echo $article['id']; ?>.content.sections.<?php echo $key; ?>.text"></div>
                    </section>
                    <?php endforeach; ?>

                    <div class="article-conclusion" data-i18n="educationArticles.<?php echo $article['id']; ?>.content.conclusion">
                        <p>
                            <?php echo htmlspecialchars($article['content']['conclusion']); ?>
                        </p>
                    </div>
<!-- 
                    <div class="article-disclosure">
                        <p data-i18n-html="educationArticles.<?php echo $article['id']; ?>.content.disclaimer">
                            <strong data-i18n="educationArticles.general.disclosure">Risk Disclosure:</strong>
                            <?php echo htmlspecialchars($article['content']['disclaimer']); ?>
                        </p>
                    </div> -->
                    <div class="article-disclosure">
                        <p>
                            <strong data-i18n="educationArticles.general.disclosure"></strong>
                            <span data-i18n="educationArticles.<?php echo $article['id']; ?>.content.disclaimer"></span>
                        </p>
                    </div>

                </div>

            </main>

        </div>

    </div>
</div>

<style>

.article-detail-page {
    background: var(--bg-primary);
    color: var(--text-primary);
    padding: 150px 0 100px;
}

/* Breadcrumb */

.edu-breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
    opacity: 0.6;
    margin-bottom: 30px;
}

.edu-breadcrumb-nav a {
    color: inherit;
    text-decoration: none;
    transition: opacity 0.2s;
}

.edu-breadcrumb-nav a:hover {
    opacity: 1;
}

/* Header */

.article-header {
    margin-bottom: 40px;
}

.article-hero-title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 900;
    line-height: 1.1;
    margin-bottom: 20px;
}

.article-meta {
    display: flex;
    align-items: center;
    gap: 20px;
}

.article-meta .category {
    background: var(--brand-gradient);
    padding: 4px 12px;
    border-radius: 40px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #fff;
}

.article-meta .read-time {
    font-size: 0.9rem;
    opacity: 0.6;
}

/* Centered Layout */

.article-content-wrapper {
    display: flex;
    justify-content: center;
}

/* Article Container */

.article-main-content {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    padding: 60px;
    border-radius: 32px;
    max-width: 1200px;
    width: 100%;
}

/* Typography */

.article-body-text p {
    margin-bottom: 20px;
}

.intro-lead {
    font-size: 1.25rem;
    line-height: 1.6;
    font-weight: 500;
    margin-bottom: 40px;
}

/* Sections */

.content-section {
    margin-bottom: 50px;
}

.content-section h2 {
    font-size: 1.75rem;
    font-weight: 800;
    margin-bottom: 20px;
}

.section-text {
    font-size: 1.1rem;
    line-height: 1.8;
    opacity: 0.9;
}

/* Conclusion */

.article-conclusion {
    padding: 30px;
    background: var(--bg-secondary);
    border-radius: 20px;
    font-style: italic;
    margin-bottom: 40px;
}

/* Disclosure */

.article-disclosure {
    font-size: 0.85rem;
    opacity: 0.5;
    border-top: 1px solid var(--card-border);
    padding-top: 30px;
}

/* Mobile */

@media (max-width: 991px) {

    .article-main-content {
        padding: 40px 20px;
    }

}

</style>