<?php require_once __DIR__ . '/blog-url-helpers.php'; ?>
<section class="education-subpage education-subpage--blog">
    <section class="education-subpage-hero education-subpage-hero--blog">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow" data-i18n="blogsPage.eyebrow">Insights &amp; updates</div>
            <h1 class="education-subpage-title" data-i18n="blogsPage.title">Blogs</h1>
            <p class="education-subpage-subtitle" data-i18n="blogsPage.subtitle">
                Articles, market commentary, and educational posts from the TraderTok team.
            </p>
            <!-- <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?> -->
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="education-article-layout blog-page-layout">
                <!-- <aside class="education-article-sidebar">
                    <div class="education-article-panel blog-category-panel">
                        <div class="education-article-panel-label" data-i18n="blogsPage.categories">Categories</div>
                        <ul class="blog-category-list">
                            <?php
                                foreach ($blog_category as $blogCategory):
                            ?>
                            <li>
                                <a
                                    class="blog-category-link <?php if (isset($_GET['id']) && $_GET['id'] == $blogCategory->id) {
                                        echo 'is-active';
                                    } else {
                                        echo 'text-muted';
                                    } ?>"
                                    href="./blog?id=<?php echo $blogCategory->id; ?>"
                                ><?php echo htmlspecialchars((string) $blogCategory->title, ENT_QUOTES, 'UTF-8'); ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </aside> -->

                <div class="blog-posts-main">
                    <?php if (isset($_GET['id'])) { ?>
                    <div class="education-article-grid blog-article-grid">
                        <?php foreach ($blog as $blog1): ?>
                            <?php if ($blog1->hidden == false && $blog1->category_id == $_GET['id']) { ?>
                            <article class="education-article-card blog-article-card">
                                <?php if (!empty($blog1->image)) { ?>
                                <a class="blog-article-card-media" href="<?php echo htmlspecialchars(blog_post_href($blog1), ENT_QUOTES, 'UTF-8'); ?>">
                                    <img
                                        src="<?php echo $get->assets_url . '/' . $blog1->image; ?>"
                                        alt="<?php echo htmlspecialchars((string) $blog1->title, ENT_QUOTES, 'UTF-8'); ?>"
                                        loading="lazy"
                                    >
                                </a>
                                <?php } ?>
                                <div class="education-article-card-body">
                                    <h3><?php echo htmlspecialchars((string) $blog1->title, ENT_QUOTES, 'UTF-8'); ?></h3>
                                    <p><?php echo htmlspecialchars((string) $blog1->spot, ENT_QUOTES, 'UTF-8'); ?></p>
                                    <a
                                        class="education-article-link <?php if (isset($_GET['id']) && $_GET['id'] == $blog1->id) {
                                            echo 'link-dark';
                                        } else {
                                            echo 'text-muted';
                                        } ?>"
                                        href="<?php echo htmlspecialchars(blog_post_href($blog1), ENT_QUOTES, 'UTF-8'); ?>"
                                        data-i18n="blogsPage.readMore"
                                    >Read more</a>
                                </div>
                            </article>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                    <?php } else { ?>
                    <div class="education-article-grid blog-article-grid">
                        <?php foreach ($blog as $blog1): ?>
                            <?php if ($blog1->hidden == false) { ?>
                            <article class="education-article-card blog-article-card">
                                <?php if (!empty($blog1->image)) { ?>
                                <a class="blog-article-card-media" href="<?php echo htmlspecialchars(blog_post_href($blog1), ENT_QUOTES, 'UTF-8'); ?>">
                                    <img
                                        src="<?php echo $get->assets_url . '/' . $blog1->image; ?>"
                                        alt="<?php echo htmlspecialchars((string) $blog1->title, ENT_QUOTES, 'UTF-8'); ?>"
                                        loading="lazy"
                                    >
                                </a>
                                <?php } ?>
                                <div class="education-article-card-body">
                                    <h3><?php echo htmlspecialchars((string) $blog1->title, ENT_QUOTES, 'UTF-8'); ?></h3>
                                    <p><?php echo htmlspecialchars((string) $blog1->spot, ENT_QUOTES, 'UTF-8'); ?></p>
                                    <a
                                        class="education-article-link <?php if (isset($_GET['id']) && $_GET['id'] == $blog1->id) {
                                            echo 'link-dark';
                                        } else {
                                            echo 'text-muted';
                                        } ?>"
                                        href="<?php echo htmlspecialchars(blog_post_href($blog1), ENT_QUOTES, 'UTF-8'); ?>"
                                        data-i18n="blogsPage.readMore"
                                    >Read more</a>
                                </div>
                            </article>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</section>
