<section class="page-hero">
  <video class="page-hero-video" autoplay loop muted playsinline>
    <source src="assets/images/education.mp4" type="video/mp4">
  </video>
  <div class="page-hero-overlay"></div>

  <div class="container">
    <div class="page-hero-content" style="justify-content: start; align-items: flex-start; text-align: left;">
      <div class="page-hero-badge">
        <span>Trading Basics</span>
      </div>
      <h1 class="doc-page-hero-title">BUY AND SELL EXPLAINED</h1>
      <p class="doc-page-hero-subtitle">
        Every trade begins with a decision: buy or sell. These actions sound simple, but in trading they
        reflect a view on market direction, timing, and risk.
      </p>
      <p class="doc-page-hero-subtitle">
        Understanding how buy and sell decisions connect to price quotes, spread, and position management
        helps traders avoid some of the most common beginner mistakes.
      </p>
    </div>
  </div>
</section>

<section class="buy-sell-page">
  <div class="container">
    <article class="buy-sell-card buy-sell-card--feature">
      <h2 class='doc-page-hero-title'>What “buy” means</h2>
      <p>
        A buy position, often called a long position, is taken when a trader expects the market price to rise.
        If the market moves upward after entry, the trade may generate a profit. If it falls, the position may lose value.
      </p>
    </article>

    <div class="buy-sell-grid">
      <article class="buy-sell-card">
        <h2 class='doc-page-hero-title'>What “sell” means</h2>
        <p>
          A sell position, often called a short position, is taken when a trader expects the market price to fall.
          If the market declines after entry, the trade may perform well. If price rises instead, the position may move into loss.
        </p>
      </article>

      <article class="buy-sell-card">
        <h2 class='doc-page-hero-title'>Why the quote matters</h2>
        <p>
          Many instruments display both a bid price and an ask price. The ask is typically the price used when buying.
          The bid is typically the price used when selling. The gap between them is the spread, which is one of the core trading costs to understand.
        </p>
      </article>
    </div>

    <article class="buy-sell-card">
      <h2 class='doc-page-hero-title'>Simple trading logic</h2>
      <div class="buy-sell-steps">
        <article class="buy-sell-step">
          <span>1</span>
          <h3>Buy</h3>
          <p>You believe price may move higher, so you open a long position.</p>
        </article>
        <article class="buy-sell-step">
          <span>2</span>
          <h3>Sell</h3>
          <p>You believe price may move lower, so you open a short position.</p>
        </article>
        <article class="buy-sell-step">
          <span>3</span>
          <h3>Manage Risk</h3>
          <p>Before entering either direction, define position size, stop-loss, and take-profit levels clearly.</p>
        </article>
      </div>
    </article>

    <article class="buy-sell-card">
      <h2 class='doc-page-hero-title'>What beginners should remember</h2>
      <ul class="buy-sell-list">
        <li>Buy and sell are directional decisions, not guarantees</li>
        <li>The spread affects how quickly a position moves from entry into profit</li>
        <li>Trade direction matters, but position size and risk management matter just as much</li>
        <li>A good entry should be supported by a plan, not only by emotion or urgency</li>
      </ul>
    </article>
  </div>
</section>

<style>
.buy-sell-page {
  padding: 80px 0 110px;
  background:
    radial-gradient(circle at top right, rgba(230, 57, 70, 0.08), transparent 28%),
    linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
}

.buy-sell-grid,
.buy-sell-steps {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 24px;
}

.buy-sell-steps {
  grid-template-columns: repeat(3, minmax(0, 1fr));
}

.buy-sell-card,
.buy-sell-step {
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  border-radius: 28px;
  padding: 32px;
  margin-bottom: 24px;
  box-shadow: 0 18px 40px var(--shadow-color);
}

.buy-sell-card--feature {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.08) 0%, var(--card-bg) 100%);
}

.buy-sell-card h2,
.buy-sell-step h3 {
  /* color: var(--text-primary); */
  line-height: 1.22;
}

.buy-sell-card h2 {
  margin: 0 0 18px;
  font-size: clamp(1.7rem, 2.4vw, 2.35rem);
  font-weight: 700;
}

.buy-sell-step h3 {
  margin: 0 0 12px;
  font-size: 1.2rem;
  font-weight: 700;
}

.buy-sell-card p,
.buy-sell-step p,
.buy-sell-list li {
  color: var(--text-secondary);
  font-size: 1.05rem;
  line-height: 1.8;
}

.buy-sell-card p,
.buy-sell-step p {
  margin: 0;
}

.buy-sell-step span {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 44px;
  height: 44px;
  margin-bottom: 16px;
  border-radius: 50%;
  background: linear-gradient(135deg, #d02c2d 0%, #ff3b30 100%);
  color: #ffffff;
  font-size: 1rem;
  font-weight: 700;
}

.buy-sell-list {
  margin: 0;
  padding-left: 22px;
}

.buy-sell-list li + li {
  margin-top: 10px;
}

[data-theme="dark"] .buy-sell-card--feature {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.14) 0%, var(--card-bg) 100%);
}

@media (max-width: 900px) {
  .buy-sell-page {
    padding: 64px 0 88px;
  }

  .buy-sell-grid,
  .buy-sell-steps {
    grid-template-columns: 1fr;
  }

  .buy-sell-card,
  .buy-sell-step {
    padding: 26px;
  }
}

@media (max-width: 640px) {
  .buy-sell-card h2 {
    font-size: 1.55rem;
  }

  .buy-sell-card p,
  .buy-sell-step p,
  .buy-sell-list li {
    font-size: 1rem;
    line-height: 1.72;
  }
}
</style>
