<style>
.support-guide-page {
  padding: 80px 0 110px;
  background:
    radial-gradient(circle at top right, rgba(230, 57, 70, 0.08), transparent 28%),
    linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
}

.support-guide-grid {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 24px;
  margin-bottom: 24px;
}

.support-guide-grid--equal {
  grid-template-columns: repeat(2, minmax(0, 1fr));
}

.support-guide-card,
.support-guide-section,
.support-guide-note {
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  border-radius: 28px;
  padding: 32px;
  box-shadow: 0 18px 40px var(--shadow-color);
}

.support-guide-card--primary,
.support-guide-note {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.08) 0%, var(--card-bg) 100%);
}

.support-guide-eyebrow {
  color: #ff5a36;
  font-size: 0.86rem;
  font-weight: 800;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  margin-bottom: 14px;
}

.support-guide-card h2,
.support-guide-section h2,
.support-guide-note h2 {
  color: var(--text-primary);
  font-size: clamp(1.4rem, 1.7vw, 2rem);
  line-height: 1.3;
  margin-bottom: 14px;
}

.support-guide-card p,
.support-guide-section p,
.support-guide-note p,
.support-guide-list li,
.support-guide-step p {
  color: var(--text-secondary);
  font-size: 1rem;
  line-height: 1.8;
}

.support-guide-list {
  margin: 0;
  padding-left: 20px;
}

.support-guide-list li {
  margin-bottom: 10px;
}

.support-guide-steps {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 18px;
  margin-top: 22px;
}

.support-guide-step {
  padding: 22px;
  border-radius: 22px;
  background: var(--bg-secondary);
  border: 1px solid var(--card-border);
}

.support-guide-step span {
  display: inline-flex;
  width: 42px;
  height: 42px;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: linear-gradient(135deg, #ff5a36 0%, #e63946 100%);
  color: #ffffff;
  font-weight: 800;
  margin-bottom: 16px;
  box-shadow: 0 10px 24px rgba(230, 57, 70, 0.25);
}

.support-guide-step p {
  margin: 0;
}

@media (max-width: 980px) {
  .support-guide-grid,
  .support-guide-grid--equal,
  .support-guide-steps {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 640px) {
  .support-guide-page {
    padding: 64px 0 90px;
  }

  .support-guide-card,
  .support-guide-section,
  .support-guide-note {
    padding: 26px 22px;
  }
}
</style>
