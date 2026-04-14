<section class="page-hero">
  <video class="page-hero-video" autoplay loop muted playsinline>
    <source src="assets/images/education.mp4" type="video/mp4">
  </video>
  <div class="page-hero-overlay"></div>

  <div class="container">
    <div class="page-hero-content" style="justify-content: start; align-items: flex-start; text-align: left;">
      <div class="page-hero-badge">
        <span>Accessibility Statement</span>
      </div>
      <h1 class="doc-page-hero-title">INCLUSIVE ACCESS ACROSS TRADERTOK</h1>
      <p class="doc-page-hero-subtitle">
        At TraderTok, we are committed to ensuring our website and services are accessible to all users, including individuals with disabilities.
      </p>
      <p class="doc-page-hero-subtitle">
        We continuously work to improve the usability and accessibility of our platform by following recognized standards and best practices. Our goal is to provide an inclusive experience across all devices, including compatibility with assistive technologies such as screen readers and keyboard navigation.
      </p>
    </div>
  </div>
</section>

<section class="accessibility-page">
  <div class="container">
    <div class="accessibility-grid">
      <article class="accessibility-card accessibility-card--primary">
        <div class="doc-page-hero-title">What We Are Doing</div>
        <h2>Ongoing accessibility improvements across the website</h2>
        <p>
          We regularly review and enhance our website to improve accessibility and user experience.
          Our efforts include:
        </p>
        <ul class="accessibility-list">
          <li>Maintaining clear structure and navigation across all pages</li>
          <li>Ensuring readability with accessible typography and contrast</li>
          <li>Supporting keyboard navigation and assistive technologies</li>
        </ul>
      </article>

      <article class="accessibility-card">
        <div class="doc-page-hero-title">Known Limitations</div>
        <h2>Areas we are still improving</h2>
        <p>
          While we aim to meet WCAG 2.1 Level AA standards, certain advanced trading tools and
          interactive elements may not yet fully comply due to their technical complexity. We are
          actively working to improve these areas.
        </p>
      </article>
    </div>

    <article class="accessibility-card accessibility-card--full">
      <div class="doc-page-hero-title">Feedback and Assistance</div>
      <h2>Need help accessing something on the site?</h2>
      <p>
        If you experience any difficulty accessing our website or need assistance, we encourage you
        to contact us. Your feedback helps us improve.
      </p>

      <div class="accessibility-contact-grid">
        <div class="accessibility-contact-item">
          <span>Email</span>
          <a class="license-link" href="mailto:support@tradertok.com">support@tradertok.com</a>
        </div>
        <div class="accessibility-contact-item">
          <span>Phone</span>
          <a class="license-link" href="tel:+447520640890">+44 7520 640 890</a>
        </div>
      </div>

      <p class="accessibility-support-note">
        We are committed to providing support and will make every reasonable effort to deliver information in an accessible format.
      </p>
    </article>
  </div>
</section>

<style>
.accessibility-page {
  padding: 80px 0 110px;
  background:
    radial-gradient(circle at top right, rgba(230, 57, 70, 0.08), transparent 28%),
    linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
}

.accessibility-grid {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 24px;
  margin-bottom: 24px;
}

.accessibility-card {
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  border-radius: 28px;
  padding: 32px;
  box-shadow: 0 18px 40px var(--shadow-color);
}

.accessibility-card--primary {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.08) 0%, var(--card-bg) 100%);
}

.accessibility-card--full {
  margin-top: 8px;
}

.accessibility-eyebrow {
  color: #d02c2d;
  font-size: 0.86rem;
  font-weight: 800;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  margin-bottom: 14px;
}

.accessibility-card h2 {
  color: var(--text-primary);
  font-size: clamp(1.4rem, 1.8vw, 2rem);
  line-height: 1.3;
  margin-bottom: 16px;
}

.accessibility-card p,
.accessibility-list li,
.accessibility-support-note {
  color: var(--text-secondary);
  font-size: 1rem;
  line-height: 1.8;
}

.accessibility-list {
  margin: 18px 0 0;
  padding-left: 20px;
}

.accessibility-list li {
  margin-bottom: 10px;
}

.accessibility-contact-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 18px;
  margin: 26px 0 16px;
}

.accessibility-contact-item {
  padding: 20px 22px;
  border-radius: 20px;
  background: var(--bg-secondary);
  border: 1px solid var(--card-border);
}

.accessibility-contact-item span {
  display: block;
  color: var(--text-tertiary);
  font-size: 0.9rem;
  margin-bottom: 8px;
}

.accessibility-support-note {
  margin: 0;
}

@media (max-width: 900px) {
  .accessibility-grid,
  .accessibility-contact-grid {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 640px) {
  .accessibility-page {
    padding: 64px 0 90px;
  }

  .accessibility-card {
    padding: 26px 22px;
  }
}
</style>
