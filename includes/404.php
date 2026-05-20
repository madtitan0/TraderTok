<section class="not-found-page" aria-labelledby="not-found-title">
  <div class="container">
    <div class="not-found-card">
      <p class="not-found-code" aria-hidden="true">404</p>
      <h1 id="not-found-title" class="not-found-title">Page not found</h1>
      <p class="not-found-message">
        Sorry, the page you are looking for does not exist. It may have been moved, removed, or the URL may be
        incorrect.
      </p>
      <div class="not-found-actions">
        <a href="<?php echo htmlspecialchars(routeUrl(''), ENT_QUOTES, 'UTF-8'); ?>" class="btn-primary not-found-btn">
          Back to Homepage
        </a>
        <a href="<?php echo htmlspecialchars(routeUrl('help-center'), ENT_QUOTES, 'UTF-8'); ?>"
          class="btn-secondary not-found-btn">
          Visit Help Center
        </a>
      </div>
    </div>
  </div>
</section>

<style>
.not-found-page {
  padding: 120px 0 100px;
  min-height: 55vh;
  display: flex;
  align-items: center;
  background:
    radial-gradient(circle at top right, rgba(208, 44, 45, 0.12), transparent 32%),
    linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
}

.not-found-card {
  max-width: 640px;
  margin: 0 auto;
  margin-top: 60px;
  text-align: center;
  padding: 48px 40px;
  border-radius: var(--radius-lg);
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  box-shadow: 0 18px 40px var(--shadow-color);
}

.not-found-code {
  margin: 0 0 12px;
  font-size: clamp(4rem, 12vw, 6.5rem);
  font-weight: 800;
  line-height: 1;
  background: var(--brand-gradient);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  letter-spacing: -0.04em;
}

.not-found-title {
  margin: 0 0 16px;
  font-size: clamp(1.75rem, 4vw, 2.5rem);
  font-weight: 800;
  line-height: 1.2;
  color: var(--text-primary);
}

.not-found-message {
  margin: 0 0 32px;
  font-size: 1rem;
  line-height: 1.7;
  color: var(--text-secondary);
}

.not-found-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 14px;
  justify-content: center;
  align-items: center;
}

.not-found-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 180px;
  padding: 14px 28px;
  text-decoration: none;
  border-radius: var(--radius-sm);
  font-weight: 700;
  font-size: 0.95rem;
}

@media (max-width: 640px) {
  .not-found-page {
    padding: 100px 0 80px;
  }

  .not-found-card {
    padding: 36px 24px;
  }

  .not-found-actions {
    flex-direction: column;
    width: 100%;
  }

  .not-found-btn {
    width: 100%;
    min-width: 0;
  }
}
</style>