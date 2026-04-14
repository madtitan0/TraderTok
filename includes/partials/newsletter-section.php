<?php
/**
 * Education Hub newsletter capture — included from footer on education-hub only.
 */
$newsletter_action = './api/education-newsletter.php';
?>
<section class="newsletter-cta" aria-labelledby="newsletter-cta-title">
  <div class="container">
    <div class="newsletter-cta__inner">
      <div class="newsletter-cta__copy">
        <h2 id="newsletter-cta-title" class="newsletter-cta__title">Never miss Education Hub updates</h2>
        <p class="newsletter-cta__text">
          Subscribe for occasional emails about new courses, articles, webinars, and tools — straight from the TraderTok Education Hub.
        </p>
      </div>
      <form class="newsletter-cta__form" id="educationNewsletterForm" novalidate action="<?php echo htmlspecialchars($newsletter_action, ENT_QUOTES, 'UTF-8'); ?>" method="post">
        <input type="text" name="website" class="newsletter-cta__hp" tabindex="-1" autocomplete="off" aria-hidden="true">
        <div class="newsletter-cta__fields">
          <label class="newsletter-cta__label" for="newsletter-name">Name <span class="newsletter-cta__optional">(optional)</span></label>
          <input type="text" id="newsletter-name" name="name" class="newsletter-cta__input" maxlength="120" placeholder="Your name" autocomplete="name">
          <label class="newsletter-cta__label" for="newsletter-email">Email <span class="newsletter-cta__req">*</span></label>
          <input type="email" id="newsletter-email" name="email" class="newsletter-cta__input" required placeholder="you@example.com" autocomplete="email" aria-required="true">
        </div>
        <label class="newsletter-cta__consent">
          <input type="checkbox" id="newsletter-consent" name="consent" value="1" required>
          <span>I agree to receive education-related updates from TraderTok. I can unsubscribe anytime.</span>
        </label>
        <p class="newsletter-cta__status" id="newsletterFormStatus" role="status" aria-live="polite"></p>
        <button type="submit" class="btn newsletter-cta__submit" id="educationNewsletterSubmit">Subscribe</button>
      </form>
    </div>
  </div>
</section>
