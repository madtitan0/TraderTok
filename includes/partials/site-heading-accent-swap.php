<!-- <style>
  /**
   * Site-wide: primary red for section/hero headings; solid white for paragraph
   * lines that used .gradient-text as “subheading” accents. Split title spans
   * (.gradient-text inside h1–h3) render white for contrast on primary headings.
   */
  p.gradient-text {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
  }

  main h1:not(.gradient-text),
  main h2:not(.gradient-text),
  main h3:not(.gradient-text) {
    color: var(--brand-color-start, #d02c2d) !important;
    -webkit-text-fill-color: var(--brand-color-start, #d02c2d) !important;
  }

  main h1:not(.gradient-text) .gradient-text,
  main h2 .gradient-text,
  main h3 .gradient-text {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
  }

  /* Education Hub hero: uppercase eyebrow is the primary headline; lead line is white (no <main> on static routes) */
  .education-hub-hero h1.page-hero-title1 {
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
  }

  .page-home .about-title,
  .page-home .insights .insights-title,
  .page-home .insights .card-title,
  .page-home .platforms-section .platforms-title,
  .page-home .instruments-section-home .instruments-home-title,
  .page-home .why-choose .why-choose-title,
  .page-home .telegram-section .telegram-title,
  .page-home .contact-form-section .contact-form-title,
  .page-home .client-testimonials-section .client-testimonials-title,
  .page-home .home-faq-section .instruments-home-title,
  .page-home .home-faq-section .home-faq-category-title,
  .page-home .home-payment-overview .home-payment-overview__title,
  .page-home .home-payment-overview .home-payment-overview__usp-title,
  .page-home .home-payment-overview .home-payment-overview__providers-title,
  .page-home .payment-methods-section .payment-methods-title,
  .page-home .traders-club-modal .modal-title,
  .page-home .deposit-modal .modal-title {
    color: var(--brand-color-start, #d02c2d) !important;
    -webkit-text-fill-color: var(--brand-color-start, #d02c2d) !important;
  }

  .page-home .telegram-section .telegram-title,
  .page-home .payment-methods-section .payment-methods-title {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
  }

  .page-home .telegram-section .telegram-title .gradient-text {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
  }

  /* Banking headline: full line same brand color (span matches first half) */
  .page-home .payment-methods-section .payment-methods-title .gradient-text {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    color: var(--brand-color-start, #d02c2d) !important;
    -webkit-text-fill-color: var(--brand-color-start, #d02c2d) !important;
  }

  /* Traders Club promo sits on brand gradient — headline must stay black */
  .page-home .traders-club-title {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
  }
</style> -->


<style>
  /**
   * Site-wide: primary red for section/hero headings; solid white for paragraph
   * lines that used .gradient-text as “subheading” accents. Split title spans
   * (.gradient-text inside h1–h3) render white for contrast on primary headings.
   */
  p.gradient-text {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
  }

  main h1:not(.gradient-text),
  main h2:not(.gradient-text),
  main h3:not(.gradient-text) {
    color: var(--brand-color-start, #d02c2d) !important;
    -webkit-text-fill-color: var(--brand-color-start, #d02c2d) !important;
  }

  main h1:not(.gradient-text) .gradient-text,
  main h2 .gradient-text,
  main h3 .gradient-text {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
  }

  /* Legal documents: section labels (h1.doc-sub) are not marketing heroes — not brand red */
  .page-hero-content.legal-document-content h1.doc-sub {
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
  }

  body.light-theme .page-hero-content.legal-document-content h1.doc-sub {
    color: var(--text-primary) !important;
    -webkit-text-fill-color: var(--text-primary) !important;
  }

  /* Education Hub hero: uppercase eyebrow is the primary headline; lead line is white (no <main> on static routes) */
  .education-hub-hero h1.page-hero-title1 {
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
  }

  .page-home .about-title,
  .page-home .insights .insights-title,
  .page-home .insights .card-title,
  .page-home .platforms-section .platforms-title,
  .page-home .instruments-section-home .instruments-home-title,
  .page-home .why-choose .why-choose-title,
  .page-home .telegram-section .telegram-title,
  .page-home .contact-form-section .contact-form-title,
  .page-home .client-testimonials-section .client-testimonials-title,
  .page-home .home-faq-section .instruments-home-title,
  .page-home .home-faq-section .home-faq-category-title,
  .page-home .home-payment-overview .home-payment-overview__title,
  .page-home .home-payment-overview .home-payment-overview__usp-title,
  .page-home .home-payment-overview .home-payment-overview__providers-title,
  .page-home .payment-methods-section .payment-methods-title,
  .page-home .traders-club-modal .modal-title,
  .page-home .deposit-modal .modal-title {
    color: var(--brand-color-start, #d02c2d) !important;
    -webkit-text-fill-color: var(--brand-color-start, #d02c2d) !important;
  }

  .page-home .telegram-section .telegram-title,
  .page-home .payment-methods-section .payment-methods-title {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
  }

  .page-home .telegram-section .telegram-title .gradient-text {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
  }

  /* Banking headline: full line same brand color (span matches first half) */
  .page-home .payment-methods-section .payment-methods-title .gradient-text {
    background: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
    color: var(--brand-color-start, #d02c2d) !important;
    -webkit-text-fill-color: var(--brand-color-start, #d02c2d) !important;
  }

  /* Traders Club promo sits on brand gradient — headline must stay black */
  .page-home .traders-club-title {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
  }
</style>
