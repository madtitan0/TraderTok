   <!-- Page Styles -->
<style>
.events-calendar-page {
  padding: 120px 0 40px;
  background: var(--bg-primary);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

.markets-header {
  text-align: center;
  margin-bottom: 30px;
  padding: 0 20px;
  flex-shrink: 0;
}

.markets-header h1 {
  font-size: clamp(2.25rem, 4.5vw, 3.5rem);
  font-weight: 800;
  margin-bottom: 10px;
  color: var(--brand-color-start);
}

.markets-header h1 .gradient-text {
  background: none !important;
  -webkit-background-clip: unset !important;
  background-clip: unset !important;
  color: #ffffff !important;
  -webkit-text-fill-color: #ffffff !important;
}

.markets-header p {
  font-size: 1.1rem;
  color: rgba(255, 255, 255, 0.95);
  max-width: 600px;
  margin: 0 auto;
}

/* Light Theme Styles */
body.light-theme .markets-header h1 .gradient-text {
  background: none !important;
  -webkit-background-clip: unset !important;
  background-clip: unset !important;
  color: var(--text-primary) !important;
  -webkit-text-fill-color: var(--text-primary) !important;
}

body.light-theme .markets-header p {
  color: var(--text-secondary);
}

.calendar-container {
  flex: 1;
  width: 100%;
  background: var(--bg-secondary);
  border: none;
  /* Dynamically fill the rest of the viewport minus header and padding */
  min-height: calc(100vh - 280px);
}

.calendar-container iframe {
  width: 100%;
  height: 100%;
  min-height: calc(100vh - 280px);
  border: none;
  display: block;
}

.events-calendar-insights {
  padding: 36px 0 90px;
  background: var(--bg-primary);
}

.events-calendar-insights-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 18px;
  margin-bottom: 24px;
}

.events-calendar-card {
  border: 1px solid var(--card-border);
  background: var(--bg-secondary);
  border-radius: 20px;
  padding: 22px;
  box-shadow: 0 12px 28px var(--shadow-color);
}

.events-calendar-card h2 {
  margin: 0 0 10px;
  color: var(--text-primary);
  font-size: 1.2rem;
}

.events-calendar-card p,
.events-calendar-card li,
.events-calendar-impact-row span {
  color: var(--text-secondary);
  line-height: 1.7;
  font-size: 0.98rem;
}

.events-calendar-list {
  margin: 0;
  padding-left: 18px;
}

.events-calendar-list li + li {
  margin-top: 8px;
}

.events-calendar-impact {
  display: grid;
  gap: 10px;
}

.events-calendar-impact-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  padding: 10px 12px;
  border: 1px solid var(--card-border);
  border-radius: 12px;
  background: var(--bg-primary);
}

.events-calendar-impact-row strong {
  color: var(--text-primary);
  font-size: 0.95rem;
}

.events-calendar-band {
  border: 1px solid var(--card-border);
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.08) 0%, var(--bg-secondary) 100%);
  border-radius: 22px;
  padding: 24px;
  text-align: center;
}

.events-calendar-band h2 {
  margin: 0 0 10px;
  color: var(--text-primary);
  font-size: clamp(1.4rem, 2.2vw, 2rem);
}

.events-calendar-band p {
  margin: 0 auto 16px;
  max-width: 900px;
  color: var(--text-secondary);
  line-height: 1.75;
}

.events-calendar-band-actions {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 10px;
}

.events-calendar-band-actions .btn-primary,
.events-calendar-band-actions .btn-secondary {
  text-decoration: none;
}

@media (max-width: 900px) {
  .events-calendar-page {
    padding-top: 100px;
  }
  .calendar-container,
  .calendar-container iframe {
    min-height: calc(100vh - 260px);
  }

  .events-calendar-insights-grid {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 600px) {
  .events-calendar-page {
    padding-top: 80px;
  }
  .calendar-container,
  .calendar-container iframe {
    min-height: calc(100vh - 240px);
  }

  .events-calendar-insights {
    padding: 26px 0 72px;
  }

  .events-calendar-card,
  .events-calendar-band {
    padding: 18px;
  }
}
</style>

<!-- Main Content Section -->
<section class="events-calendar-page">
  <!-- Page Header -->
  <div class="markets-header">
    <h1><span data-i18n="eventsCalendarPage.heroTitle">Markets</span> <span class=""
        data-i18n="eventsCalendarPage.heroTitleHighlight">Overview</span></h1>
    <p data-i18n="eventsCalendarPage.heroSubtitle">Real-time market data, economic events, and cryptocurrency prices all in one place</p>
  </div>

  <div class="calendar-container">
    <!-- Trading Central Economic Calendar Iframe -->
      <!-- <iframe src="https://site.ct.recognia.com/afa40s/presto/economic_calendar_prelogin?sid=7yK4t3sey1mi8leCOBbXBeOZl8p%2FhnHa" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen></iframe> -->
    <iframe src="https://site.tradingcentral.com/afa40s/serve.shtml?page=economic_calendar_prelogin" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen></iframe>
  </div>
</section>

<section class="events-calendar-insights">
  <div class="container">
    <div class="events-calendar-insights-grid">
      <article class="events-calendar-card">
        <h2>How to use this calendar effectively</h2>
        <ul class="events-calendar-list">
          <li>Filter by region and impact level to focus only on events relevant to your watchlist.</li>
          <li>Check previous versus forecast values to spot where sentiment may shift quickly.</li>
          <li>Create a pre-event plan with key levels, invalidation points, and maximum risk.</li>
        </ul>
      </article>

      <article class="events-calendar-card">
        <h2>Typical market reaction areas</h2>
        <div class="events-calendar-impact">
          <div class="events-calendar-impact-row">
            <strong>Interest Rate Decisions</strong>
            <span>FX pairs, indices, gold</span>
          </div>
          <div class="events-calendar-impact-row">
            <strong>Inflation &amp; CPI Data</strong>
            <span>FX pairs, bonds, indices</span>
          </div>
          <div class="events-calendar-impact-row">
            <strong>Employment Reports</strong>
            <span>USD pairs, indices</span>
          </div>
          <div class="events-calendar-impact-row">
            <strong>Energy Inventories</strong>
            <span>Oil and related sectors</span>
          </div>
        </div>
      </article>

      <article class="events-calendar-card">
        <h2>Before-event checklist</h2>
        <ul class="events-calendar-list">
          <li>Review spread and volatility conditions around the release window.</li>
          <li>Avoid oversized positions into high-impact events if your plan is unclear.</li>
          <li>Use stop-loss and position sizing aligned with your risk limits.</li>
        </ul>
      </article>
    </div>

    <article class="events-calendar-band">
      <h2>Turn event awareness into a structured trading plan</h2>
      <p>
        Use the Events Calendar alongside our trading calculators and account options to prepare trade size,
        margin requirements, and scenario planning before major announcements.
      </p>
      <div class="events-calendar-band-actions">
        <a href="<?php echo htmlspecialchars(routeUrl('trading-calculators')); ?>" class="btn-secondary">Trading Calculators</a>
        <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="btn-primary">Open Live Account</a>
        <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="btn-secondary">Open Demo Account</a>
      </div>
    </article>
  </div>
</section>
