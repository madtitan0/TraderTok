<?php
/**
 * Render a paragraph item from JSON supporting plain text and bold blocks.
 *
 * Supported formats:
 * - "Plain paragraph text"
 * - {"bold":"Bold line"}
 * - {"text":"Plain paragraph text"}
 *
 * @param mixed $para
 */
function education_article_render_paragraph_item($para): void
{
    if ($para === '' || $para === null) {
        return;
    }

    if (is_array($para)) {
        if (!empty($para['bold'])) {
            echo '<p class="education-article-emphasis"><strong>' . htmlspecialchars((string) $para['bold']) . '</strong></p>';
            return;
        }
        if (!empty($para['text'])) {
            echo '<p>' . htmlspecialchars((string) $para['text']) . '</p>';
            return;
        }
        return;
    }

    echo '<p>' . htmlspecialchars((string) $para) . '</p>';
}

/**
 * Render optional multi-paragraph intro/body from JSON (plain text, escaped).
 *
 * @param array<string, mixed> $content
 */
function education_article_render_paragraph_field(array $content, string $field, string $paragraphsField): void
{
    if (!empty($content[$paragraphsField]) && is_array($content[$paragraphsField])) {
        foreach ($content[$paragraphsField] as $para) {
            education_article_render_paragraph_item($para);
        }
        return;
    }
    if (!empty($content[$field])) {
        echo '<p>' . htmlspecialchars((string) $content[$field]) . '</p>';
    }
}

/**
 * Section body: optional "paragraphs", legacy "text", optional "bullets", optional "text_after" ( prose after bullets ).
 *
 * @param array<string, mixed> $section
 */
function education_article_render_section_body(array $section): void
{
    if (!empty($section['paragraphs']) && is_array($section['paragraphs'])) {
        foreach ($section['paragraphs'] as $para) {
            education_article_render_paragraph_item($para);
        }
    } elseif (!empty($section['text'])) {
        echo '<p>' . htmlspecialchars((string) $section['text']) . '</p>';
    }

    if (!empty($section['bullets']) && is_array($section['bullets'])) {
        echo '<ul class="education-article-bullets">';
        foreach ($section['bullets'] as $item) {
            if ($item === '' || $item === null) {
                continue;
            }
            echo '<li>' . htmlspecialchars((string) $item) . '</li>';
        }
        echo '</ul>';
    }

    if (!empty($section['text_after'])) {
        echo '<p>' . htmlspecialchars((string) $section['text_after']) . '</p>';
    }
}

/**
 * Trimmed section heading for <h2> and TOC. Empty string means omit heading row and TOC link.
 *
 * @param array<string, mixed> $section
 */
function education_article_section_heading_text(array $section): string
{
    if (!isset($section['heading'])) {
        return '';
    }

    return trim((string) $section['heading']);
}

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

                    <?php if (!empty($article['content']['sections']) || (!empty($article['content']['faq']) && is_array($article['content']['faq']))): ?>
                    <div class="education-article-panel">
                        <div class="education-article-panel-label">In This Article</div>
                        <ul class="education-article-toc">
                            <?php if (!empty($article['content']['sections'])): ?>
                                <?php foreach ($article['content']['sections'] as $index => $section): ?>
                                <?php
                                $tocHeading = education_article_section_heading_text($section);
                                if ($tocHeading !== '') :
                                ?>
                            <li>
                                <a href="#article-section-<?php echo $index + 1; ?>">
                                    <?php echo htmlspecialchars($tocHeading); ?>
                                </a>
                            </li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (!empty($article['content']['faq']) && is_array($article['content']['faq'])): ?>
                            <li>
                                <a href="#article-faq">Frequently Asked Questions</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </aside>

                <article class="education-article-main">
                    <?php if (!empty($article['content']['introduction']) || !empty($article['content']['introduction_paragraphs'])): ?>
                    <section class="education-article-block">
                        <div class="education-article-block-label">Introduction</div>
                        <?php education_article_render_paragraph_field($article['content'], 'introduction', 'introduction_paragraphs'); ?>
                    </section>
                    <?php endif; ?>

                    <?php if (!empty($article['content']['sections'])): ?>
                        <?php foreach ($article['content']['sections'] as $index => $section): ?>
                        <?php $sectionHeading = education_article_section_heading_text($section); ?>
                        <section class="education-article-block" id="article-section-<?php echo $index + 1; ?>">
                            <?php if ($sectionHeading !== ''): ?>
                            <h2><?php echo htmlspecialchars($sectionHeading); ?></h2>
                            <?php endif; ?>
                            <?php education_article_render_section_body($section); ?>
                        </section>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (!empty($article['content']['conclusion']) || !empty($article['content']['conclusion_paragraphs'])): ?>
                    <section class="education-article-block">
                        <div class="education-article-block-label">Conclusion</div>
                        <?php education_article_render_paragraph_field($article['content'], 'conclusion', 'conclusion_paragraphs'); ?>
                    </section>
                    <?php endif; ?>

                    <?php if (!empty($article['content']['faq']) && is_array($article['content']['faq'])): ?>
                    <section class="education-article-block education-article-faq" id="article-faq">
                        <div class="education-article-block-label">Frequently Asked Questions</div>
                        <dl class="education-article-faq-list">
                            <?php foreach ($article['content']['faq'] as $faqItem): ?>
                                <?php if (empty($faqItem['q']) && empty($faqItem['a'])) {
                                    continue;
                                } ?>
                            <dt><?php echo htmlspecialchars((string) ($faqItem['q'] ?? '')); ?></dt>
                            <dd><?php echo htmlspecialchars((string) ($faqItem['a'] ?? '')); ?></dd>
                            <?php endforeach; ?>
                        </dl>
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
                    <article class="education-article-card" onclick="window.location.href='./education?id=<?php echo htmlspecialchars((string) $related['id'], ENT_QUOTES, 'UTF-8'); ?>'">
                        <div class="education-article-card-body">
                            <div class="education-article-meta"><?php echo htmlspecialchars($related['category'] ?? 'Article'); ?></div>
                            <h3><?php echo htmlspecialchars($related['title'] ?? ''); ?></h3>
                            <p><?php echo htmlspecialchars($related['excerpt'] ?? ''); ?></p>
                            <button class="education-article-link" onclick="event.stopPropagation(); window.location.href='./education?id=<?php echo htmlspecialchars((string) $related['id'], ENT_QUOTES, 'UTF-8'); ?>'">Read Article</button>
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
