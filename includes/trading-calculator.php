<style>
.trading-calculators-page {
  padding: 140px 0 90px;
  background: var(--bg-primary);
}

.trading-calculators-hero {
  max-width: 900px;
  margin: 0 auto 36px;
  text-align: center;
}

.trading-calculators-title {
  margin: 0 0 14px;
  font-size: clamp(2.1rem, 4vw, 3.2rem);
  line-height: 1.15;
  color: var(--text-primary);
}

.trading-calculators-intro {
  margin: 0 auto;
  max-width: 760px;
  color: var(--text-secondary);
  line-height: 1.75;
  font-size: 1.02rem;
}

.trading-calculators-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
}

.trading-calculator-card {
  border: 1px solid var(--border-color);
  border-radius: 16px;
  background: var(--bg-secondary);
  padding: 20px;
}

.trading-calculator-card h2 {
  margin: 0 0 8px;
  font-size: 1.45rem;
  color: var(--text-primary);
}

.trading-calculator-card p {
  margin: 0 0 14px;
  color: var(--text-secondary);
  line-height: 1.65;
}

.trading-calculator-widget {
  width: 100% !important;
  max-width: 1000px;
  margin: 0 auto !important;
  min-height: 0;
  border-radius: 12px;
  overflow: hidden;
  background: transparent;
  display: block;
  text-align: center;
}

.trading-calculator-widget > * {
  margin: 0 auto !important;
  max-width: 100% !important;
}

.trading-calculators-disclaimer {
  margin: 24px 0 0;
  padding: 16px 18px;
  border-radius: 12px;
  border: 1px solid rgba(208, 44, 45, 0.35);
  background: rgba(208, 44, 45, 0.08);
  color: var(--text-primary);
  line-height: 1.65;
}

.trading-calculators-cta {
  margin-top: 24px;
  padding: 24px;
  border-radius: 16px;
  border: 1px solid var(--border-color);
  background: var(--bg-secondary);
  text-align: center;
}

.trading-calculators-cta h3 {
  margin: 0 0 14px;
  color: var(--text-primary);
  font-size: 1.35rem;
}

.trading-calculators-cta-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  justify-content: center;
}

.trading-calculators-cta-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 46px;
  padding: 0 20px;
  border-radius: 10px;
  font-weight: 600;
  text-decoration: none;
  transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
}

.trading-calculators-cta-btn--primary {
  background: var(--brand-gradient);
  color: #fff;
}

.trading-calculators-cta-btn--primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 22px rgba(208, 44, 45, 0.35);
}

.trading-calculators-cta-btn--ghost {
  color: var(--text-primary);
  border: 1px solid var(--border-color);
}

.trading-calculators-cta-btn--ghost:hover {
  background: var(--bg-tertiary);
}

@media (max-width: 768px) {
  .trading-calculators-page {
    padding-top: 120px;
  }

  .trading-calculator-card {
    padding: 16px;
  }

  .trading-calculators-cta-btn {
    width: 100%;
  }
}
</style>

<main class="trading-calculators-page">
  <div class="container">
    <header class="trading-calculators-hero">
      <h1 class="trading-calculators-title">Trading Calculators</h1>
      <p class="trading-calculators-intro">
        Plan your trades more confidently with TraderTok&apos;s trading calculators. Estimate potential profit or loss, pip value, margin requirements, and position size before placing a trade.
      </p>
    </header>

    <section class="trading-calculators-grid" aria-label="Trading calculators">
      <article class="trading-calculator-card">
        <h2>Profit &amp; Loss Calculator</h2>
        <p>Estimate potential trade outcomes based on instrument, lot size, entry price, and exit price.</p>
        <div id="profit-calculator-209935" class="trading-calculator-widget"></div>
      </article>

      <article class="trading-calculator-card">
        <h2>Pip Value Calculator</h2>
        <p>Check how much each pip movement is worth for your selected instrument, lot size, and account currency.</p>
        <div id="pip-value-calculator-126393" class="trading-calculator-widget"></div>
      </article>

      <article class="trading-calculator-card">
        <h2>Margin Calculator</h2>
        <p>Estimate the margin required to open positions based on instrument, lot size, and leverage.</p>
        <div id="margin-calculator-840913" class="trading-calculator-widget"></div>
      </article>

      <article class="trading-calculator-card">
        <h2>Position Size (Risk) Calculator</h2>
        <p>Calculate position sizing from account balance, risk percentage, and stop-loss distance.</p>
        <div id="position-size-calculator-860133" class="trading-calculator-widget"></div>
      </article>
    </section>

    <p class="trading-calculators-disclaimer">
      Calculations are for informational purposes only and may vary based on market conditions, spreads, leverage, and account type.
    </p>

    <section class="trading-calculators-cta" aria-label="Trading calculators actions">
      <h3>Ready for your next trade setup?</h3>
      <div class="trading-calculators-cta-actions">
        <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="trading-calculators-cta-btn trading-calculators-cta-btn--primary">Open Account</a>
        <a href="<?php echo htmlspecialchars(routeUrl('contact-us')); ?>" class="trading-calculators-cta-btn trading-calculators-cta-btn--ghost">Contact Support</a>
        <a href="<?php echo htmlspecialchars(routeUrl('education-hub')); ?>" class="trading-calculators-cta-btn trading-calculators-cta-btn--ghost">Learn More</a>
      </div>
    </section>
  </div>
</main>

<script type="text/javascript" src="https://fxverify.com/Content/remote/remote-widgets.js"></script>
<script type="text/javascript">
  (function() {
    var baseConfig = {
      "Url": "https://fxverify.com",
      "TopPaneStyle": "YmFja2dyb3VuZDogbGluZWFyLWdyYWRpZW50KCMzNDM1NDAgMCUsICMyNDI4MzEgMTAwJSk7IGNvbG9yOiB3aGl0ZTsgYm9yZGVyLWJvdHRvbTogbm9uZTs=",
      "BottomPaneStyle": "YmFja2dyb3VuZDogIzE1MTgxZDsgYm9yZGVyOiBzb2xpZCAwcHggIzJhMmUzOTsgY29sb3I6ICM5MTk0YTE7",
      "ButtonStyle": "YmFja2dyb3VuZDogIzM0MzU0MDsgY29sb3I6IHdoaXRlOyBib3JkZXItcmFkaXVzOiAyMHB4Ow==",
      "TitleStyle": "dGV4dC1hbGlnbjogbGVmdDsgZm9udC1zaXplOiA0MHB4OyBmb250LXdlaWdodDogNTAwOw==",
      "TextboxStyle": "YmFja2dyb3VuZDogIzE1MTgxZDsgY29sb3I6ICM5MTk0YTE7IGJvcmRlcjogc29saWQgMHB4ICM5MTk0YTE7",
      "HighlightColor": "rgba(0,0,0,1.0)",
      "IsDisplayTitle": false,
      "IsShowChartLinks": true,
      "IsShowEmbedButton": false,
      "CompactType": "large"
    };

    function renderCalc(containerId, calculator) {
      var el = document.getElementById(containerId);
      if (!el) return;
      var width = Math.min(1000, Math.max(320, Math.floor(el.clientWidth)));
      RemoteCalc(Object.assign({}, baseConfig, {
        "ContainerWidth": String(width),
        "Calculator": calculator,
        "ContainerId": containerId
      }));
    }

    renderCalc("profit-calculator-209935", "profit-calculator");
    renderCalc("pip-value-calculator-126393", "pip-value-calculator");
    renderCalc("margin-calculator-840913", "margin-calculator");
    renderCalc("position-size-calculator-860133", "position-size-calculator");
  })();
</script>
