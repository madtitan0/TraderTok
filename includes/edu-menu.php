<?php
$current_page = $page ?? '';
?>
<nav class="edu-sub-nav">
    <div class="container">
        <div class="edu-nav-scroll">
            <ul class="edu-nav-list">
                <li class="edu-nav-item">
                    <a href="<?php echo routeUrl('trading-essentials'); ?>" class="edu-nav-link <?php echo ($current_page == 'trading-essentials') ? 'active' : ''; ?>" data-i18n="educationHub.menu.articles">Articles</a>
                </li>
                <li class="edu-nav-item">
                    <a href="<?php echo routeUrl('courses'); ?>" class="edu-nav-link <?php echo ($current_page == 'courses') ? 'active' : ''; ?>" data-i18n="educationHub.menu.courses">Courses</a>
                </li>
                <li class="edu-nav-item">
                    <a href="./edu-market-news" class="edu-nav-link <?php echo ($current_page == 'edu-market-news') ? 'active' : ''; ?>" data-i18n="educationHub.menu.marketNews">Market News & Insights</a>
                </li>
                <li class="edu-nav-item">
                    <a href="./edu-ebooks" class="edu-nav-link <?php echo ($current_page == 'edu-ebooks') ? 'active' : ''; ?>" data-i18n="educationHub.menu.ebooks">eBooks</a>
                </li>
                <li class="edu-nav-item">
                    <a href="./edu-webinars" class="edu-nav-link <?php echo ($current_page == 'edu-webinars') ? 'active' : ''; ?>" data-i18n="educationHub.menu.webinars">Webinars</a>
                </li>
                <li class="edu-nav-item">
                    <a href="./edu-glossary" class="edu-nav-link <?php echo ($current_page == 'edu-glossary') ? 'active' : ''; ?>" data-i18n="educationHub.menu.glossary">Trading Glossary</a>
                </li>
                <li class="edu-nav-item">
                    <a href="./edu-tutorials" class="edu-nav-link <?php echo ($current_page == 'edu-tutorials') ? 'active' : ''; ?>" data-i18n="educationHub.menu.tutorials">Platform Tutorials</a>
                </li>
                <li class="edu-nav-item">
                    <a href="./edu-resources" class="edu-nav-link <?php echo ($current_page == 'edu-resources') ? 'active' : ''; ?>" data-i18n="educationHub.menu.resources">Tools & Resources</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
