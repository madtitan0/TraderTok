<section class="page-hero">
  <video class="page-hero-video" autoplay loop muted playsinline>
    <source src="assets/images/education.mp4" type="video/mp4">
  </video>
  <div class="page-hero-overlay"></div>

  <div class="container">
    <div class="page-hero-content" style="justify-content: start; align-items: flex-start; text-align: left;">
      <div class="page-hero-badge">
        <span>Responsible Trading</span>
      </div>
      <h1 class="doc-page-hero-title">RESPONSIBLE TRADING</h1>
      <p class="doc-page-hero-subtitle">
        Responsible trading means approaching financial markets with a clear understanding of risk,
        realistic expectations, and discipline.
      </p>
      <p class="doc-page-hero-subtitle">
        Trading forex, cryptocurrencies, commodities, indices, and equities can involve significant
        losses, especially when leverage is used. This page highlights a few essential principles
        every client should keep in mind before trading.
      </p>
    </div>
  </div>
</section>

<section class="responsible-trading-page">
  <div class="container">
    <article class="responsible-trading-card responsible-trading-card--intro">
      <h2 class='doc-page-hero-title'>Trading financial instruments involves a high level of risk</h2>
      <p>
        Trading financial instruments, including forex, cryptocurrencies, commodities, indices,
        and equities, involves a high level of risk and may not be suitable for all individuals.
      </p>
      <p>
        Clients should understand the nature of leveraged products and assess whether trading
        is appropriate in light of their financial circumstances, experience, and tolerance for risk.
      </p>
    </article>

    <div class="responsible-trading-grid">
      <article class="responsible-trading-card">
        <h2 class='doc-page-hero-title'>Clients should</h2>
        <ul class="responsible-trading-list">
          <li>Only trade with funds they can afford to lose</li>
          <li>Understand the risks associated with leveraged products</li>
          <li>Avoid relying on trading as a primary source of income</li>
        </ul>
      </article>

      <article class="responsible-trading-card responsible-trading-card--cta">
        <h2 class='doc-page-hero-title'>Need more guidance?</h2>
        <p>
          If you would like more information about support, financial vulnerability, and the safeguards
          available to clients, please review our Client Vulnerability Policy.
        </p>
        <a class="responsible-trading-link" href="client-vulnerability">
          Learn more about Client Vulnerability
        </a>
      </article>
    </div>
  </div>
</section>

<style>
.responsible-trading-page {
  padding: 80px 0 110px;
  background:
    radial-gradient(circle at top right, rgba(230, 57, 70, 0.08), transparent 28%),
    linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
}

.responsible-trading-card {
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  border-radius: 28px;
  padding: 32px;
  box-shadow: 0 18px 40px var(--shadow-color);
}

.responsible-trading-card--intro {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.08) 0%, var(--card-bg) 100%);
  margin-bottom: 24px;
}

.responsible-trading-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 24px;
}

.responsible-trading-card h2 {
  margin: 0 0 18px;
  color: #ff6b35;
  font-size: clamp(1.7rem, 2.4vw, 2.35rem);
  line-height: 1.18;
  font-weight: 700;
}

.responsible-trading-card p,
.responsible-trading-list li {
  color: var(--text-secondary);
  font-size: 1.05rem;
  line-height: 1.8;
}

.responsible-trading-card p {
  margin: 0 0 16px;
}

.responsible-trading-list {
  margin: 0;
  padding-left: 22px;
}

.responsible-trading-list li + li {
  margin-top: 10px;
}

.responsible-trading-card--cta {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.responsible-trading-link {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: fit-content;
  min-height: 50px;
  padding: 0 22px;
  margin-top: 12px;
  border-radius: 999px;
  background: linear-gradient(135deg, #ff6b35 0%, #ff3b30 100%);
  color: #ffffff;
  font-weight: 600;
  text-decoration: none;
  box-shadow: 0 14px 28px rgba(255, 107, 53, 0.24);
  transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
}

.responsible-trading-link:hover {
  transform: translateY(-2px);
  box-shadow: 0 18px 34px rgba(255, 107, 53, 0.3);
}

.responsible-trading-link:focus-visible {
  outline: 3px solid rgba(255, 107, 53, 0.28);
  outline-offset: 3px;
}

[data-theme="dark"] .responsible-trading-card--intro {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.14) 0%, var(--card-bg) 100%);
}

@media (max-width: 900px) {
  .responsible-trading-page {
    padding: 64px 0 88px;
  }

  .responsible-trading-grid {
    grid-template-columns: 1fr;
  }

  .responsible-trading-card {
    padding: 26px;
  }
}

@media (max-width: 640px) {
  .responsible-trading-card h2 {
    font-size: 1.55rem;
  }

  .responsible-trading-card p,
  .responsible-trading-list li {
    font-size: 1rem;
    line-height: 1.72;
  }

  .responsible-trading-link {
    width: 100%;
  }
}
</style>
