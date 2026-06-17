<?php if (!empty($blogDetail)) : ?>
<section class="education-subpage education-article-page education-subpage--blog-detail">
    <section class="education-subpage-hero education-subpage-hero--blog-detail">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow" data-i18n="blogsPage.eyebrow">Insights &amp; updates</div>
            <h1 class="education-subpage-title"><?php echo htmlspecialchars((string) $blogDetail->title, ENT_QUOTES, 'UTF-8'); ?></h1>
            <?php if (!empty($blogDetail->spot)) : ?>
            <p class="education-subpage-subtitle"><?php echo htmlspecialchars((string) $blogDetail->spot, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
            <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="blog-detail-layout<?php echo $blogDetail->colums_count == 1 ? ' blog-detail-layout--single' : ' blog-detail-layout--split'; ?>">
                <?php if (!empty($blogDetail->image)) : ?>
                <div class="blog-detail-media">
                    <img
                        src="<?php echo htmlspecialchars($get->assets_url . '/' . $blogDetail->image, ENT_QUOTES, 'UTF-8'); ?>"
                        class="blog-detail-media-image"
                        alt="<?php echo htmlspecialchars((string) $blogDetail->title, ENT_QUOTES, 'UTF-8'); ?>"
                        loading="lazy"
                    >
                </div>
                <?php endif; ?>

                <article class="education-article-block blog-detail-body">
                    <div class="about-txt blog-detail-content">
                        <?php echo $blogDetail->content; ?>
                    </div>
                </article>
            </div>

            <p class="blog-detail-back">
                <a href="./blog" class="education-article-link" data-i18n="blogsPage.backToBlogs">&larr; Back to Blogs</a>
            </p>

            <?php include __DIR__ . '/partials/education-hub-account-ctas.php'; ?>
        </div>
    </section>
</section>
<?php endif; ?>
