<section class="page-hero">
  <video class="page-hero-video" autoplay loop muted playsinline>
    <source src="assets/images/education.mp4" type="video/mp4">
  </video>
  <div class="page-hero-overlay"></div>

  <div class="container">
    <div class="page-hero-content" style="justify-content: start; align-items: flex-start; text-align: left;">
      <div class="page-hero-badge">
        <span>Account Administration</span>
      </div>
      <h1 class="doc-page-hero-title">TAX REPORT</h1>
      <p class="doc-page-hero-subtitle">
        Trading activity may create tax reporting obligations depending on where you live, how you trade,
        and what rules apply in your jurisdiction.
      </p>
      <p class="doc-page-hero-subtitle">
        This page gives a simple overview of what a tax report usually helps with and why keeping accurate account records matters.
      </p>
    </div>
  </div>
</section>

<section class="tax-report-page">
  <div class="container">
    <article class="tax-report-card tax-report-card--feature">
      <h2 class='doc-page-hero-title'>What a tax report is for</h2>
      <p>
        A tax report is typically a summary of account activity that helps clients review deposits, withdrawals,
        closed trade results, and other account records that may be relevant for personal reporting or professional review.
      </p>
    </article>

    <div class="tax-report-grid">
      <article class="tax-report-card">
        <h2 class='doc-page-hero-title'>Why it matters</h2>
        <ul class="tax-report-list">
          <li>It helps organize account activity in one place</li>
          <li>It supports year-end record keeping and reconciliation</li>
          <li>It can make discussions with an accountant or tax adviser easier</li>
        </ul>
      </article>

      <article class="tax-report-card">
        <h2 class='doc-page-hero-title'>What clients should keep in mind</h2>
        <ul class="tax-report-list">
          <li>Tax treatment may differ by country or region</li>
          <li>Reporting requirements may depend on product type and account activity</li>
          <li>Clients remain responsible for understanding their own obligations</li>
        </ul>
      </article>
    </div>

    <article class="tax-report-card">
      <h2 class='doc-page-hero-title'>Important note</h2>
      <p>
        TraderTok’s legal documentation already makes clear that tax responsibilities may apply to clients depending on their circumstances.
        This page is informational only and should not be treated as tax advice.
      </p>
      <p class="tax-report-note">
        If you need tax-specific guidance, the safest step is to consult a qualified adviser in your jurisdiction.
      </p>
    </article>
  </div>
</section>

<style>
.tax-report-page {
  padding: 80px 0 110px;
  background:
    radial-gradient(circle at top right, rgba(230, 57, 70, 0.08), transparent 28%),
    linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
}

.tax-report-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 24px;
}

.tax-report-card {
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  border-radius: 28px;
  padding: 32px;
  margin-bottom: 24px;
  box-shadow: 0 18px 40px var(--shadow-color);
}

.tax-report-card--feature {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.08) 0%, var(--card-bg) 100%);
}

.tax-report-card h2 {
  margin: 0 0 18px;
  /* color: var(--text-primary); */
  font-size: clamp(1.7rem, 2.4vw, 2.35rem);
  line-height: 1.22;
  font-weight: 700;
}

.tax-report-card p,
.tax-report-list li {
  color: var(--text-secondary);
  font-size: 1.05rem;
  line-height: 1.8;
}

.tax-report-card p {
  margin: 0 0 16px;
}

.tax-report-list {
  margin: 0;
  padding-left: 22px;
}

.tax-report-list li + li {
  margin-top: 10px;
}

.tax-report-note {
  margin-top: 18px;
  padding-top: 18px;
  border-top: 1px solid var(--card-border);
}

[data-theme="dark"] .tax-report-card--feature {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.14) 0%, var(--card-bg) 100%);
}

@media (max-width: 900px) {
  .tax-report-page {
    padding: 64px 0 88px;
  }

  .tax-report-grid {
    grid-template-columns: 1fr;
  }

  .tax-report-card {
    padding: 26px;
  }
}

@media (max-width: 640px) {
  .tax-report-card h2 {
    font-size: 1.55rem;
  }

  .tax-report-card p,
  .tax-report-list li {
    font-size: 1rem;
    line-height: 1.72;
  }
}
</style>
