<?php
/**
 * Pill-shaped buttons site-wide (full rounded ends).
 * Loaded after main CSS in head.php.
 */
?>
<style id="global-button-pills">
:root {
  --btn-pill-radius: 9999px;
}

:is(
  .btn-primary,
  .btn-secondary,
  .btn-secondary1,
  .btn,
  .btn-platform,
  .btn-platform-primary,
  .btn-platform-outline,
  .btn-offers-cta,
  .btn-register,
  .btn-contact-submit,
  .btn-deposit,
  .btn-submit-deposit,
  .btn-submit-club,
  .btn-traders-club,
  .btn-telegram,
  .btn-read-more,
  .acct-cta-btn,
  .cta-btn-primary,
  .cta-btn-secondary,
  .education-hub-cta-btn,
  .education-hub-cta-btn--solid,
  .education-hub-cta-btn--outline,
  .auth-submit-btn,
  .registration-account-submit,
  .demo-account-submit,
  .demo-account-done-btn,
  .live-account-submit,
  .live-account-done-btn,
  .edu-lead-gate-submit,
  .promotions-clear-btn,
  .newsletter-cta__submit,
  .edu-calc-submit,
  .ebook-download-btn,
  .courses-course-cta,
  .courses-filter-chip,
  .document-toggle,
  .department-tab,
  .language-btn,
  .auth-social-btn,
  .kid-closing-cta,
  #signInBtn,
  #signUpBtn
) {
  border-radius: var(--btn-pill-radius) !important;
}

/* Header / nav CTAs that use IDs only */
#signInBtn.btn-secondary,
#signUpBtn.btn-primary {
  border-radius: var(--btn-pill-radius) !important;
}
</style>
