<?php
/**
 * Shared hero CTAs for Education Hub subpages (demo/live registration + hub home).
 */
?>
<div class="education-subpage-hero-ctas" role="group" aria-label="Trading and learning actions">
    <a href="<?php echo htmlspecialchars(routeUrl('education-hub')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--ghost" data-i18n="nav.educationHub">Education Hub</a>
    <a href="<?php echo htmlspecialchars(routeUrl('trading-calculators')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--ghost">Trading Calculators</a>
    <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--primary" data-i18n="educationHubPage.ctaDemo">Open demo account</a>
    <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--solid" data-i18n="educationHubPage.ctaLive">Open live account</a>
</div>
