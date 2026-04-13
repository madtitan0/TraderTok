<section class="page-hero">
  <video class="page-hero-video" autoplay loop muted playsinline>
    <source src="assets/images/education.mp4" type="video/mp4">
  </video>
  <div class="page-hero-overlay"></div>

  <div class="container">
    <div class="page-hero-content" style="justify-content: start; align-items: flex-start; text-align: left;">
      <div class="page-hero-badge">
        <span>Account Benefits</span>
      </div>
      <h1 class="doc-page-hero-title">INTEREST ON BALANCE</h1>
      <p class="doc-page-hero-subtitle">
        Some account benefits are designed to make idle funds work harder. Interest on balance refers to
        periodic interest credited to eligible cash balances held in your account.
      </p>
      <p class="doc-page-hero-subtitle">
        On TraderTok, this benefit is presented as a monthly crediting feature, helping clients understand
        that unused cash may still play a role inside a broader account experience.
      </p>
    </div>
  </div>
</section>

<section class="interest-balance-page">
  <div class="container">
    <article class="interest-balance-card interest-balance-card--feature">
      <h2 class='doc-page-hero-title'>What it means</h2>
      <p>
        Interest on balance is the return that may be applied to eligible cash held in an account rather than actively used in open positions.
        Instead of leaving funds completely inactive, the account may credit interest over a defined period, subject to the program terms.
      </p>
    </article>

    <div class="interest-balance-grid">
      <article class="interest-balance-card">
        <h2 class='doc-page-hero-title'>How it is presented on the site</h2>
        <p>
          TraderTok currently highlights this feature as a monthly interest benefit credited directly into the cash balance.
          The core idea is simple: qualifying balances may receive an additional periodic credit without needing a separate action each time.
        </p>
      </article>

      <article class="interest-balance-card">
        <h2 class='doc-page-hero-title'>Why clients care</h2>
        <ul class="interest-balance-list">
          <li>It gives idle cash a more active role inside the account</li>
          <li>It can improve the overall value of holding available funds on account</li>
          <li>It supports a clearer separation between capital in use and capital kept in reserve</li>
        </ul>
      </article>
    </div>

    <article class="interest-balance-card">
      <h2 class='doc-page-hero-title'>Important considerations</h2>
      <ul class="interest-balance-list">
        <li>Eligibility may depend on account type, balance level, region, or active campaign terms</li>
        <li>Interest programs should always be reviewed alongside the product conditions that apply to the account</li>
        <li>Clients should understand that interest benefits do not remove trading risk on leveraged products</li>
      </ul>
      <p class="interest-balance-note">
        This page is intentionally brief and static. Full rates, thresholds, and eligibility rules can be added later when the final commercial setup is confirmed.
      </p>
    </article>
  </div>
</section>

<style>
.interest-balance-page {
  padding: 80px 0 110px;
  background:
    radial-gradient(circle at top right, rgba(230, 57, 70, 0.08), transparent 28%),
    linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
}

.interest-balance-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 24px;
}

.interest-balance-card {
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  border-radius: 28px;
  padding: 32px;
  margin-bottom: 24px;
  box-shadow: 0 18px 40px var(--shadow-color);
}

.interest-balance-card--feature {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.08) 0%, var(--card-bg) 100%);
}

.interest-balance-card h2 {
  margin: 0 0 18px;
  /* color: var(--text-primary); */
  font-size: clamp(1.7rem, 2.4vw, 2.35rem);
  line-height: 1.22;
  font-weight: 700;
}

.interest-balance-card p,
.interest-balance-list li {
  color: var(--text-secondary);
  font-size: 1.05rem;
  line-height: 1.8;
}

.interest-balance-card p {
  margin: 0 0 16px;
}

.interest-balance-list {
  margin: 0;
  padding-left: 22px;
}

.interest-balance-list li + li {
  margin-top: 10px;
}

.interest-balance-note {
  margin-top: 18px;
  padding-top: 18px;
  border-top: 1px solid var(--card-border);
}

[data-theme="dark"] .interest-balance-card--feature {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.14) 0%, var(--card-bg) 100%);
}

@media (max-width: 900px) {
  .interest-balance-page {
    padding: 64px 0 88px;
  }

  .interest-balance-grid {
    grid-template-columns: 1fr;
  }

  .interest-balance-card {
    padding: 26px;
  }
}

@media (max-width: 640px) {
  .interest-balance-card h2 {
    font-size: 1.55rem;
  }

  .interest-balance-card p,
  .interest-balance-list li {
    font-size: 1rem;
    line-height: 1.72;
  }
}
</style>
