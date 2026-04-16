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

@media (max-width: 900px) {
  .events-calendar-page {
    padding-top: 100px;
  }
  .calendar-container,
  .calendar-container iframe {
    min-height: calc(100vh - 260px);
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
