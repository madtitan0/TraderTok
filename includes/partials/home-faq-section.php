<?php
$home_faq_sections = require __DIR__ . '/../data/home-faq-data.php';

if (!function_exists('home_faq_format_paragraph')) {
    function home_faq_format_paragraph($text)
    {
        $esc = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
        $esc = str_replace(
            ['support@tradertok.com', '+44 7520 640 890'],
            [
                '<a class="license-link" href="mailto:support@tradertok.com">support@tradertok.com</a>',
                '<a class="license-link" href="tel:+447520640890">+44 7520 640 890</a>',
            ],
            $esc
        );
        return $esc;
    }
}

if (!function_exists('home_faq_format_bullet')) {
    function home_faq_format_bullet($text)
    {
        if (strpos($text, '<a ') !== false) {
            return $text;
        }
        $esc = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
        $licenseLabel = 'License No: GB24203892';
        $needle = htmlspecialchars($licenseLabel, ENT_QUOTES, 'UTF-8');
        if (strpos($esc, $needle) !== false) {
            $link = '<a href="https://opr.fscmauritius.org/ords/opr/r/fsc-opr/fsc-online-public-register-opr" target="_blank" rel="noopener noreferrer" class="license-link">License No: GB24203892</a>';
            $esc = str_replace($needle, $link, $esc);
        }
        return $esc;
    }
}
?>

<section class="home-faq-section" id="home-faq" aria-labelledby="home-faq-heading">
    <div class="container">
        <div class="home-faq-intro">
            <h2 class="instruments-home-title" id="home-faq-heading" data-i18n="homeFaq.title">Frequently Asked Questions</h2>
            <p class="instruments-home-subtitle gradient-text" data-i18n="homeFaq.subtitle">Quick answers about TraderTok—markets, accounts, funding, fees, regulation, and support.</p>
            <p class="home-faq-lead" data-i18n="homeFaq.lead">Explore topics below. Each section expands for more detail.</p>
        </div>

        <?php foreach ($home_faq_sections as $secIndex => $section): ?>
            <div class="home-faq-category" id="home-faq-<?php echo (int) ($secIndex + 1); ?>">
                <div class="home-faq-category-head">
                    <h3 class="home-faq-category-title" data-i18n="homeFaq.sections.<?php echo (int) $secIndex; ?>.label"><?php echo htmlspecialchars($section['label']); ?></h3>
                    <p class="home-faq-category-intro" data-i18n="homeFaq.sections.<?php echo (int) $secIndex; ?>.intro"><?php echo htmlspecialchars($section['intro']); ?></p>
                </div>
                <div class="home-faq-list" role="list">
                    <?php foreach ($section['items'] as $itemIndex => $item): ?>
                        <div class="home-faq-item" role="listitem">
                            <button type="button" class="home-faq-header" aria-expanded="false">
                                <span class="home-faq-question-text" data-i18n="homeFaq.sections.<?php echo (int) $secIndex; ?>.items.<?php echo (int) $itemIndex; ?>.question"><?php echo htmlspecialchars($item['question']); ?></span>
                                <span class="home-faq-toggle" aria-hidden="true"></span>
                            </button>
                            <div class="home-faq-panel">
                                <div class="home-faq-body">
                                    <?php
                                    if (!empty($item['paragraphs'])) {
                                        foreach ($item['paragraphs'] as $pi => $p) {
                                            $pk = 'homeFaq.sections.' . (int) $secIndex . '.items.' . (int) $itemIndex . '.paragraphs.' . (int) $pi;
                                            echo '<p data-i18n-html="' . htmlspecialchars($pk, ENT_QUOTES, 'UTF-8') . '">' . home_faq_format_paragraph($p) . '</p>';
                                        }
                                    }
                                    if (!empty($item['bullets'])) {
                                        echo '<ul class="home-faq-ul">';
                                        foreach ($item['bullets'] as $bi => $b) {
                                            $bk = 'homeFaq.sections.' . (int) $secIndex . '.items.' . (int) $itemIndex . '.bullets.' . (int) $bi;
                                            echo '<li data-i18n-html="' . htmlspecialchars($bk, ENT_QUOTES, 'UTF-8') . '">' . home_faq_format_bullet($b) . '</li>';
                                        }
                                        echo '</ul>';
                                    }
                                    if (!empty($item['paragraphs_after'])) {
                                        foreach ($item['paragraphs_after'] as $pi => $p) {
                                            $pk = 'homeFaq.sections.' . (int) $secIndex . '.items.' . (int) $itemIndex . '.paragraphs_after.' . (int) $pi;
                                            $paraBody = (strpos($p, '<a ') !== false) ? $p : home_faq_format_paragraph($p);
                                            echo '<p data-i18n-html="' . htmlspecialchars($pk, ENT_QUOTES, 'UTF-8') . '">' . $paraBody . '</p>';
                                        }
                                    }
                                    if (!empty($item['bullets_after'])) {
                                        echo '<ul class="home-faq-ul">';
                                        foreach ($item['bullets_after'] as $bi => $b) {
                                            $bk = 'homeFaq.sections.' . (int) $secIndex . '.items.' . (int) $itemIndex . '.bullets_after.' . (int) $bi;
                                            echo '<li data-i18n="' . htmlspecialchars($bk, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($b) . '</li>';
                                        }
                                        echo '</ul>';
                                    }
                                    if (!empty($item['paragraphs_final'])) {
                                        foreach ($item['paragraphs_final'] as $pi => $p) {
                                            $pk = 'homeFaq.sections.' . (int) $secIndex . '.items.' . (int) $itemIndex . '.paragraphs_final.' . (int) $pi;
                                            echo '<p data-i18n-html="' . htmlspecialchars($pk, ENT_QUOTES, 'UTF-8') . '">' . home_faq_format_paragraph($p) . '</p>';
                                        }
                                    }
                                    if (!empty($item['lists'])) {
                                        echo '<div class="home-faq-tier-grid">';
                                        foreach ($item['lists'] as $li => $list) {
                                            echo '<div class="home-faq-tier-card">';
                                            $tk = 'homeFaq.sections.' . (int) $secIndex . '.items.' . (int) $itemIndex . '.lists.' . (int) $li . '.title';
                                            echo '<h4 data-i18n="' . htmlspecialchars($tk, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($list['title']) . '</h4>';
                                            echo '<ul class="home-faq-ul">';
                                            foreach ($list['items'] as $ii => $lit) {
                                                $lk = 'homeFaq.sections.' . (int) $secIndex . '.items.' . (int) $itemIndex . '.lists.' . (int) $li . '.items.' . (int) $ii;
                                                echo '<li data-i18n="' . htmlspecialchars($lk, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($lit) . '</li>';
                                            }
                                            echo '</ul></div>';
                                        }
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<style>
.home-faq-section {
    padding: 100px 0 110px;
    background:
        radial-gradient(circle at 20% 20%, rgba(230, 57, 70, 0.06), transparent 40%),
        linear-gradient(180deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
    scroll-margin-top: 100px;
}

.home-faq-intro {
    text-align: center;
    max-width: 900px;
    margin: 0 auto 48px;
}

.home-faq-lead {
    color: var(--text-secondary);
    font-size: 1.05rem;
    line-height: 1.7;
    margin: 12px 0 0;
}

.home-faq-category {
    margin-bottom: 40px;
}

.home-faq-category:last-child {
    margin-bottom: 0;
}

.home-faq-category-head {
    margin-bottom: 18px;
    padding-bottom: 12px;
    border-bottom: 1px solid var(--card-border);
}

.home-faq-category-title {
    font-size: clamp(1.25rem, 2.5vw, 1.5rem);
    font-weight: 800;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    color: #d02c2d;
    margin: 0 0 8px;
}

.home-faq-category-intro {
    color: var(--text-secondary);
    font-size: 0.98rem;
    line-height: 1.65;
    margin: 0;
    max-width: 720px;
}

.home-faq-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.home-faq-item {
    border-radius: 20px;
    border: 1px solid var(--card-border);
    background: var(--card-bg);
    box-shadow: 0 12px 36px var(--shadow-color);
    overflow: hidden;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.home-faq-item.active {
    border-color: rgba(230, 57, 70, 0.35);
    box-shadow: 0 16px 44px var(--shadow-color);
}

.home-faq-header {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 20px 22px;
    background: transparent;
    border: 0;
    cursor: pointer;
    text-align: left;
    color: var(--text-primary);
    font-size: clamp(1rem, 2vw, 1.15rem);
    font-weight: 700;
    line-height: 1.45;
}

.home-faq-header:hover {
    background: rgba(230, 57, 70, 0.04);
}

.home-faq-toggle {
    position: relative;
    width: 22px;
    height: 22px;
    flex-shrink: 0;
    border-radius: 50%;
    border: 2px solid rgba(230, 57, 70, 0.5);
}

.home-faq-toggle::before,
.home-faq-toggle::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 10px;
    height: 2px;
    background: #d02c2d;
    border-radius: 2px;
    transform: translate(-50%, -50%);
    transition: transform 0.2s ease, opacity 0.2s ease;
}

.home-faq-toggle::after {
    transform: translate(-50%, -50%) rotate(90deg);
}

.home-faq-item.active .home-faq-toggle::after {
    opacity: 0;
    transform: translate(-50%, -50%) rotate(90deg) scaleX(0.2);
}

.home-faq-panel {
    display: none;
    border-top: 1px solid var(--card-border);
}

.home-faq-item.active .home-faq-panel {
    display: block;
}

.home-faq-body {
    padding: 0 22px 22px;
}

.home-faq-body p {
    color: var(--text-secondary);
    font-size: 0.98rem;
    line-height: 1.8;
    margin: 0 0 12px;
}

.home-faq-body p:last-child {
    margin-bottom: 0;
}

.home-faq-ul {
    margin: 0 0 14px;
    padding-left: 1.25rem;
    color: var(--text-secondary);
    font-size: 0.98rem;
    line-height: 1.75;
}

.home-faq-ul li {
    margin-bottom: 6px;
}

.home-faq-tier-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 14px;
    margin-top: 14px;
}

.home-faq-tier-card {
    padding: 16px 18px;
    border-radius: 16px;
    background: var(--bg-secondary);
    border: 1px solid var(--card-border);
}

.home-faq-tier-card h4 {
    font-size: 1.05rem;
    font-weight: 800;
    color: #d02c2d;
    margin: 0 0 10px;
    letter-spacing: 0.02em;
}

.home-faq-tier-card .home-faq-ul {
    margin-bottom: 0;
}

body.light-theme .home-faq-item {
    background: #fff;
}

@media (max-width: 640px) {
    .home-faq-section {
        padding: 72px 0 88px;
    }

    .home-faq-header {
        padding: 16px 18px;
        font-size: 0.95rem;
    }

    .home-faq-tier-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.home-faq-section .home-faq-header').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var item = btn.closest('.home-faq-item');
            var open = item.classList.contains('active');
            item.classList.toggle('active', !open);
            btn.setAttribute('aria-expanded', String(!open));
        });
    });
});
</script>
