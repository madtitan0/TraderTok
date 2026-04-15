<?php
/**
 * Thank-you hero CTAs after demo/live lead submission: Sign in + Education Hub only.
 * Sign in uses #signin; script.js opens the auth sidebar (same flow as header Sign In).
 */
?>
<div class="education-subpage-hero-ctas education-subpage-hero-ctas--thank-you-lead" role="group" aria-label="Next steps">
    <a href="#signin" class="education-subpage-hero-cta education-subpage-hero-cta--primary thank-you-cta-signin">Sign in</a>
    <a href="<?php echo htmlspecialchars(routeUrl('education-hub')); ?>" class="education-subpage-hero-cta education-subpage-hero-cta--ghost">Education Hub</a>
</div>
