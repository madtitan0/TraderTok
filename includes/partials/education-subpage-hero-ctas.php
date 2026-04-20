<?php
/**
 * Shared hero CTAs for Education Hub subpages (demo/live registration + hub home).
 */
?>
<div class="education-subpage-hero-ctas" role="group" aria-label="Trading account actions">
    <a href="<?php echo htmlspecialchars(routeUrl('education-hub')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--ghost" data-i18n="nav.educationHub">Education Hub</a>
    <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--primary" data-i18n="educationHubPage.ctaDemo">Open demo account</a>
    <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--solid" data-i18n="educationHubPage.ctaLive">Open live account</a>
</div>
