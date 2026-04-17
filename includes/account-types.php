    <style>
/* Account Types Page — comparison, details, IB tables, CTA */
.account-types-page {
  padding-top: 150px;
  min-height: 60vh;
  overflow-x: hidden;
  max-width: 100%;
  box-sizing: border-box;
}

.account-types-hero {
  padding: 0 0 24px;
  text-align: center;
}

.account-types-hero .container > .account-types-text:only-child {
  max-width: 760px;
  margin: 0 auto;
}

.account-types-title {
  /* Primary headline: white (not brand red); slightly above 3.5rem cap */
  font-size: clamp(2.65rem, 4.25vw, 3.65rem);
  font-weight: 700;
  line-height: 1.15;
  margin-bottom: 16px;
  color: var(--text-primary);
  text-align: center;
  letter-spacing: -0.02em;
}

.account-types-title .acct-hero-line,
.account-types-title .gradient-text {
  color: var(--text-primary);
  -webkit-text-fill-color: var(--text-primary);
}

.account-types-title .gradient-text {
  /* Solid primary text; gradient animation disabled for readability */
  background: none;
  -webkit-background-clip: unset;
  background-clip: unset;
  animation: none;
}

.account-types-subtitle {
  font-size: 1.12rem;
  line-height: 1.75;
  color: var(--text-primary);
  text-align: center;
  max-width: 640px;
  margin: 0 auto;
  padding-bottom: 8px;
}

.acct-section {
  padding: 48px 0;
}

.acct-section--tight {
  padding-top: 24px;
}

/* Section headings: white primary text, slightly larger than 3.5rem max */
.acct-section h2 {
  font-size: clamp(2.65rem, 4.25vw, 3.65rem);
  font-weight: 700;
  color: var(--text-primary);
  margin: 0 0 8px;
  text-align: center;
  line-height: 1.2;
}

.acct-section-intro {
  text-align: center;
  color: var(--text-primary);
  font-size: 1.02rem;
  max-width: 56ch;
  margin: 0 auto 28px;
  line-height: 1.65;
}

/* Comparison table */
.acct-table-scroll {
  width: 100%;
  max-width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  border-radius: 16px;
  border: 1px solid var(--border-color);
  background: var(--bg-secondary);
  margin-bottom: 8px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
}

.acct-compare-table {
  width: 100%;
  max-width: 100%;
  table-layout: fixed;
  border-collapse: collapse;
  font-size: 0.875rem;
}

/* Desktop: force horizontal scroll instead of crushing columns */
@media (min-width: 769px) {
  .acct-compare-table {
    min-width: 720px;
    width: max-content;
    table-layout: auto;
  }
}

.acct-compare-table th,
.acct-compare-table td {
  word-wrap: break-word;
  overflow-wrap: break-word;
  hyphens: manual;
}

.acct-compare-table caption {
  caption-side: top;
  text-align: left;
  padding: 16px 18px 12px;
  font-weight: 700;
  font-size: 0.95rem;
  color: var(--text-primary);
}

.acct-compare-table thead th {
  text-align: left;
  padding: 12px 14px;
  background: rgba(208, 44, 45, 0.12);
  color: var(--text-primary);
  font-weight: 600;
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  border-bottom: 1px solid var(--border-color);
  white-space: normal;
}

.acct-compare-table tbody td {
  padding: 14px 14px;
  vertical-align: top;
  border-bottom: 1px solid var(--border-color);
  color: var(--text-secondary);
  line-height: 1.45;
}

.acct-compare-table tbody tr:last-child td {
  border-bottom: none;
}

.acct-compare-table .acct-type-cell {
  font-weight: 700;
  color: var(--text-primary);
  white-space: normal;
}

.acct-compare-table tbody tr.acct-row--ecn {
  background: linear-gradient(90deg, rgba(212, 175, 55, 0.12) 0%, rgba(212, 175, 55, 0.04) 100%);
  box-shadow: inset 3px 0 0 0 #d4af37;
}

.acct-compare-table tbody tr.acct-row--ecn td {
  color: var(--text-primary);
}

.acct-ecn-badge {
  display: inline-block;
  margin-left: 8px;
  font-size: 0.65rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  padding: 3px 8px;
  border-radius: 999px;
  background: linear-gradient(135deg, #d4af37, #b8860b);
  color: #1a1a1a;
  vertical-align: middle;
}

/* Abbreviations / tooltips */
.acct-compare-table abbr {
  text-decoration: underline dotted;
  text-underline-offset: 3px;
  cursor: help;
}

/* Details (account deep-dives) */
.acct-details-wrap {
  max-width: 900px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.acct-details {
  border: 1px solid var(--border-color);
  border-radius: 14px;
  background: var(--bg-secondary);
  overflow: hidden;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.acct-details:hover {
  border-color: rgba(208, 44, 45, 0.35);
}

.acct-details.acct-details--ecn {
  border-color: rgba(212, 175, 55, 0.45);
  background: linear-gradient(180deg, rgba(212, 175, 55, 0.08) 0%, var(--bg-secondary) 48px);
  box-shadow: 0 12px 40px rgba(212, 175, 55, 0.08);
}

.acct-details summary {
  list-style: none;
  padding: 18px 20px;
  font-weight: 700;
  font-size: 1.05rem;
  color: var(--text-primary);
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
}

.acct-details summary::-webkit-details-marker {
  display: none;
}

.acct-details summary::after {
  content: "";
  width: 10px;
  height: 10px;
  border-right: 2px solid var(--text-secondary);
  border-bottom: 2px solid var(--text-secondary);
  transform: rotate(45deg);
  transition: transform 0.25s ease;
  flex-shrink: 0;
}

.acct-details[open] summary::after {
  transform: rotate(-135deg);
}

.acct-details__body {
  padding: 0 20px 22px;
  border-top: 1px solid var(--border-color);
}

.acct-details__body h3 {
  font-size: 0.8rem;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  color: #00b67a;
  margin: 18px 0 8px;
  font-weight: 700;
}

.acct-details__body h3:first-child {
  margin-top: 16px;
}

.acct-details__body ul {
  margin: 0;
  padding-left: 1.2rem;
  color: var(--text-secondary);
  line-height: 1.65;
  font-size: 0.92rem;
}

.acct-details__body li {
  margin-bottom: 6px;
}

/* Notes card */
.acct-notes-card {
  max-width: 720px;
  margin: 0 auto;
  padding: 22px 24px;
  border-radius: 14px;
  border: 1px solid var(--border-color);
  background: rgba(0, 182, 122, 0.06);
}

.acct-notes-card ul {
  margin: 0;
  padding-left: 1.15rem;
  color: var(--text-secondary);
  line-height: 1.7;
  font-size: 0.95rem;
}

.acct-notes-card li {
  margin-bottom: 10px;
}

.acct-notes-card li:last-child {
  margin-bottom: 0;
}

.acct-notes-card strong {
  color: var(--text-primary);
}

/* IB & data tables */
.acct-subhead {
  font-size: 1.2rem;
  font-weight: 700;
  color: var(--text-primary);
  margin: 32px 0 12px;
  text-align: center;
}

.acct-subhead:first-of-type {
  margin-top: 8px;
}

.acct-ib-note {
  font-size: 0.85rem;
  color: var(--text-secondary);
  text-align: center;
  margin-bottom: 12px;
  font-style: italic;
}

.acct-data-table-wrap {
  width: 100%;
  max-width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  border-radius: 12px;
  border: 1px solid var(--border-color);
  margin-bottom: 20px;
  background: var(--bg-secondary);
  box-sizing: border-box;
}

.acct-data-table {
  width: 100%;
  min-width: 0;
  max-width: 100%;
  table-layout: fixed;
  border-collapse: collapse;
  font-size: 0.82rem;
}

.acct-data-table th,
.acct-data-table td {
  padding: 10px 12px;
  text-align: left;
  border-bottom: 1px solid var(--border-color);
  word-wrap: break-word;
  overflow-wrap: anywhere;
  hyphens: auto;
  vertical-align: top;
}

.acct-data-table thead th {
  background: var(--bg-tertiary);
  font-weight: 600;
  font-size: 0.72rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--text-primary);
  white-space: normal;
}

.acct-data-table tbody tr:last-child td {
  border-bottom: none;
}

.acct-data-table tbody td {
  color: var(--text-secondary);
}

.acct-placeholder-card {
  padding: 20px 22px;
  border-radius: 12px;
  border: 1px dashed var(--border-color);
  background: var(--bg-secondary);
  text-align: center;
  color: var(--text-secondary);
  font-size: 0.92rem;
  max-width: 640px;
  margin: 0 auto 24px;
}

/* Rebate */
.acct-rebate-steps {
  max-width: 640px;
  margin: 0 auto 24px;
  padding-left: 1.2rem;
  color: var(--text-secondary);
  line-height: 1.7;
}

.acct-rebate-example {
  width: 100%;
  max-width: min(520px, 100%);
  margin: 16px auto 0;
}

.acct-rebate-example .acct-data-table-wrap {
  overflow-x: visible;
}

.acct-rebate-example .acct-data-table {
  table-layout: fixed;
}

/* Spread subsection */
.acct-spread-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-top: 8px;
}

@media (max-width: 991px) {
  .acct-spread-grid {
    grid-template-columns: 1fr;
  }
}

.acct-spread-block h3 {
  font-size: 0.85rem;
  font-weight: 700;
  margin: 0 0 10px;
  color: var(--text-primary);
}

.acct-spread-block .acct-data-table {
  min-width: 0;
}

.acct-ecn-cost {
  max-width: 640px;
  margin: 24px auto 0;
  padding: 20px 22px;
  border-radius: 14px;
  border: 1px solid rgba(212, 175, 55, 0.35);
  background: rgba(212, 175, 55, 0.06);
}

.acct-ecn-cost ul {
  margin: 8px 0 0;
  padding-left: 1.15rem;
  color: var(--text-secondary);
  line-height: 1.65;
  font-size: 0.92rem;
}

/* Elite */
.acct-elite-card {
  max-width: 720px;
  margin: 0 auto;
  padding: 28px 26px;
  border-radius: 16px;
  border: 1px solid var(--border-color);
  background: linear-gradient(145deg, var(--bg-secondary) 0%, var(--bg-tertiary) 100%);
  text-align: center;
}

.acct-elite-card h2 {
  margin-bottom: 12px !important;
}

.acct-elite-card p {
  color: var(--text-secondary);
  line-height: 1.7;
  margin: 0 0 16px;
  font-size: 0.98rem;
}

.acct-elite-card p:last-child {
  margin-bottom: 0;
}

/* CTA */
.acct-cta {
  padding: 56px 0 100px;
  text-align: center;
}

.acct-cta-inner {
  max-width: 640px;
  margin: 0 auto;
  padding: 36px 28px;
  border-radius: 18px;
  border: 1px solid var(--border-color);
  background: var(--bg-secondary);
  box-shadow: 0 16px 48px rgba(0, 0, 0, 0.15);
}

.acct-cta h2 {
  font-size: clamp(2.65rem, 4.25vw, 3.65rem);
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.2;
  margin-bottom: 20px !important;
}

.acct-cta-buttons {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  justify-content: center;
  align-items: center;
}

.acct-cta-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-height: 48px;
  padding: 0 22px;
  border-radius: 10px;
  font-weight: 600;
  font-size: 0.95rem;
  text-decoration: none;
  transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
  border: 1px solid transparent;
}

.acct-cta-btn--primary {
  background: linear-gradient(135deg, #d02c2d, #b02526);
  color: #fff;
}

.acct-cta-btn--primary:hover {
  box-shadow: 0 8px 24px rgba(208, 44, 45, 0.35);
  transform: translateY(-2px);
}

.acct-cta-btn--secondary {
  background: transparent;
  color: var(--text-primary);
  border-color: var(--border-color);
}

.acct-cta-btn--secondary:hover {
  border-color: rgba(208, 44, 45, 0.5);
  background: var(--bg-tertiary);
}

.acct-cta-btn--outline {
  background: transparent;
  color: #00b67a;
  border-color: rgba(0, 182, 122, 0.45);
}

.acct-cta-btn--outline:hover {
  background: rgba(0, 182, 122, 0.08);
}

@media (max-width: 1000px) {
  .account-types-hero .container {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 650px) {
  .account-types-page {
    padding-top: 120px;
  }

  .acct-section {
    padding: 32px 0;
  }

  .acct-cta-buttons {
    flex-direction: column;
  }

  .acct-cta-btn {
    width: 100%;
  }

  .acct-data-table th,
  .acct-data-table td {
    padding: 8px 6px;
    font-size: 0.76rem;
  }

  .acct-data-table thead th {
    font-size: 0.65rem;
  }
}

body.light-theme .acct-table-scroll,
body.light-theme .acct-data-table-wrap,
body.light-theme .acct-details,
body.light-theme .acct-notes-card,
body.light-theme .acct-elite-card,
body.light-theme .acct-cta-inner {
  background: #fff;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
}

body.light-theme .acct-compare-table tbody tr.acct-row--ecn {
  background: linear-gradient(90deg, rgba(212, 175, 55, 0.15) 0%, rgba(212, 175, 55, 0.05) 100%);
}

/* Revamp: density, focus, polish */
.account-types-page .acct-section .container,
.account-types-hero .container {
  max-width: 1080px;
  width: 100%;
  box-sizing: border-box;
}

.account-types-subtitle {
  font-size: 1.12rem;
  max-width: 42rem;
  padding-bottom: 4px;
}

.acct-section {
  padding: 40px 0;
}

.acct-section-intro {
  max-width: 40rem;
  margin-bottom: 22px;
  font-size: 1.02rem;
}

.acct-table-scroll {
  border-radius: 20px;
  box-shadow: 0 16px 48px rgba(0, 0, 0, 0.18);
  background: linear-gradient(180deg, var(--bg-secondary) 0%, rgba(0, 0, 0, 0.12) 100%);
}

.acct-compare-table caption {
  padding: 18px 20px 8px;
  font-size: 0.88rem;
  font-weight: 600;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  color: var(--text-primary);
}

.acct-compare-table thead th {
  padding: 14px 16px;
  font-size: 0.7rem;
  background: linear-gradient(180deg, rgba(208, 44, 45, 0.2) 0%, rgba(208, 44, 45, 0.08) 100%);
  border-bottom: 1px solid rgba(208, 44, 45, 0.25);
}

.acct-compare-table tbody td,
.acct-compare-table tbody th {
  padding: 16px 16px;
  font-size: 0.88rem;
}

.acct-compare-table tbody tr:nth-child(odd):not(.acct-row--ecn) {
  background: rgba(255, 255, 255, 0.02);
}

body.light-theme .acct-compare-table tbody tr:nth-child(odd):not(.acct-row--ecn) {
  background: rgba(0, 0, 0, 0.02);
}

.acct-details-wrap {
  gap: 14px;
}

.acct-details summary {
  padding: 20px 22px;
  font-size: 1.02rem;
  border-left: 3px solid transparent;
}

.acct-details[open] summary {
  border-left-color: #00b67a;
}

.acct-details--ecn summary {
  border-left-color: #d4af37;
}

.acct-details--ecn[open] summary {
  background: rgba(212, 175, 55, 0.06);
}

.acct-data-table thead th {
  background: rgba(208, 44, 45, 0.1);
  font-size: 0.68rem;
}

.acct-data-table tbody td {
  font-size: 0.84rem;
}

.acct-data-table tbody tr:nth-child(even) {
  background: rgba(255, 255, 255, 0.02);
}

body.light-theme .acct-data-table tbody tr:nth-child(even) {
  background: rgba(0, 0, 0, 0.02);
}

.acct-spread-grid {
  gap: 16px;
  padding: 20px;
  border-radius: 20px;
  border: 1px solid var(--border-color);
  background: var(--bg-secondary);
}

.acct-spread-block h3 {
  font-size: 0.78rem;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-secondary);
}

.acct-cta-inner {
  border-radius: 22px;
  background: linear-gradient(165deg, var(--bg-secondary) 0%, var(--bg-tertiary) 100%);
  border: 1px solid rgba(208, 44, 45, 0.2);
  box-shadow: 0 20px 56px rgba(0, 0, 0, 0.2);
}

.acct-subhead {
  margin-top: 28px;
  font-size: 1rem;
}

.acct-ib-note {
  font-style: normal;
  font-size: 0.82rem;
  opacity: 0.9;
}

/* Mobile: stack each account row as a card (readable labels + values) */
@media (max-width: 768px) {
  .acct-table-scroll {
    overflow-x: visible;
    -webkit-overflow-scrolling: auto;
  }

  .acct-compare-table {
    width: 100%;
    min-width: 0;
    table-layout: auto;
    font-size: 0.9rem;
  }

  .acct-compare-table thead {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
  }

  .acct-compare-table caption {
    text-align: center;
    padding: 12px 12px 14px;
  }

  .acct-compare-table tbody {
    display: block;
  }

  .acct-compare-table tbody tr {
    display: block;
    margin-bottom: 16px;
    border: 1px solid var(--border-color);
    border-radius: 14px;
    overflow: hidden;
    background: var(--bg-secondary);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
  }

  .acct-compare-table tbody tr:last-child {
    margin-bottom: 0;
  }

  .acct-compare-table tbody th.acct-type-cell {
    display: block;
    width: 100%;
    box-sizing: border-box;
    padding: 14px 16px;
    margin: 0;
    text-align: left;
    font-size: 1.02rem;
    line-height: 1.35;
    background: linear-gradient(180deg, rgba(208, 44, 45, 0.22) 0%, rgba(208, 44, 45, 0.08) 100%);
    border-bottom: 1px solid var(--border-color);
    white-space: normal;
    overflow-wrap: break-word;
    word-break: normal;
  }

  .acct-compare-table tbody tr.acct-row--ecn th.acct-type-cell {
    background: linear-gradient(180deg, rgba(212, 175, 55, 0.2) 0%, rgba(212, 175, 55, 0.06) 100%);
    box-shadow: inset 3px 0 0 0 #d4af37;
  }

  .acct-compare-table tbody td {
    display: block;
    position: relative;
    padding: 12px 16px 12px calc(50% + 10px);
    border-bottom: 1px solid var(--border-color);
    text-align: left;
    color: var(--text-primary);
    overflow-wrap: break-word;
    word-break: normal;
    line-height: 1.45;
  }

  .acct-compare-table tbody td:last-child {
    border-bottom: none;
  }

  .acct-compare-table tbody td::before {
    content: attr(data-label);
    position: absolute;
    left: 16px;
    top: 12px;
    width: calc(50% - 22px);
    font-weight: 700;
    font-size: 0.68rem;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--text-secondary);
    line-height: 1.45;
  }

  /* Beat desktop zebra / light-theme row backgrounds on stacked cards */
  .acct-compare-table tbody tr:nth-child(odd):not(.acct-row--ecn),
  .acct-compare-table tbody tr:nth-child(even):not(.acct-row--ecn),
  .acct-compare-table tbody tr.acct-row--ecn {
    background: var(--bg-secondary);
  }

  body.light-theme .acct-compare-table tbody tr:nth-child(odd):not(.acct-row--ecn),
  body.light-theme .acct-compare-table tbody tr:nth-child(even):not(.acct-row--ecn),
  body.light-theme .acct-compare-table tbody tr.acct-row--ecn {
    background: var(--card-bg, #fff);
  }
}
    </style>

    <!-- Main Content -->
    <main class="account-types-page" style="background: var(--bg-primary);">
      <section class="account-types-hero">
        <div class="container">
          <div class="account-types-text">
            <h1 class="account-types-title">
              <span class="">Choose the Right Account for Your</span>
              <span class="">Trading Journey</span>
            </h1>
            <p class="account-types-subtitle">
              Whether you&rsquo;re just starting or trading at a professional level, our account types are designed to match your experience and goals.
            </p>
          </div>
        </div>
      </section>

      <section class="acct-section acct-section--tight" aria-labelledby="acct-compare-heading">
        <div class="container">
          <h2 id="acct-compare-heading">Account types overview</h2>
          <p class="acct-section-intro">Compare at a glance, then expand <strong>Account details</strong> below for full information.</p>
          <div class="acct-table-scroll" role="region" aria-label="Account comparison table" tabindex="0">
            <table class="acct-compare-table">
              <caption>Account Comparison Table</caption>
              <thead>
                <tr>
                  <th scope="col">Account type</th>
                  <th scope="col">Target trader</th>
                  <th scope="col">Min deposit</th>
                  <th scope="col"><abbr title="Difference between bid and ask price; lower can mean lower cost before commission.">Spread</abbr></th>
                  <th scope="col"><abbr title="Per-lot trading fee where applicable; $0 means commission-free on that account.">Commission</abbr></th>
                  <th scope="col"><abbr title="Maximum leverage offered; higher leverage increases both potential reward and risk.">Leverage</abbr></th>
                  <th scope="col">Key features</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="acct-type-cell">Cent (Starter)</th>
                  <td data-label="Target trader">Beginners</td>
                  <td data-label="Min deposit">$10</td>
                  <td data-label="Spread">From 1.8 pips</td>
                  <td data-label="Commission">$0</td>
                  <td data-label="Leverage">Up to 1:1000</td>
                  <td data-label="Key features">Trade in cents, low risk, swap-free option</td>
                </tr>
                <tr>
                  <th scope="row" class="acct-type-cell">STP (Standard)</th>
                  <td data-label="Target trader">Intermediate</td>
                  <td data-label="Min deposit">$100</td>
                  <td data-label="Spread">From 1.8 pips</td>
                  <td data-label="Commission">$0</td>
                  <td data-label="Leverage">Up to 1:1000</td>
                  <td data-label="Key features">Fast execution, no commission</td>
                </tr>
                <tr class="acct-row--ecn">
                  <th scope="row" class="acct-type-cell">
                    ECN (Professional)
                    <span class="acct-ecn-badge">Premium</span>
                  </th>
                  <td data-label="Target trader">Advanced / High volume</td>
                  <td data-label="Min deposit">$500</td>
                  <td data-label="Spread">From 0.1 pips</td>
                  <td data-label="Commission">$8–$10 per lot</td>
                  <td data-label="Leverage">Up to 1:1000</td>
                  <td data-label="Key features">Raw spreads, ideal for scalping &amp; bots</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <section class="acct-section" aria-labelledby="acct-details-heading">
        <div class="container">
          <h2 id="acct-details-heading">Account details</h2>
          <p class="acct-section-intro">Features and costs per account type.</p>
          <div class="acct-details-wrap">
            <details class="acct-details">
              <summary>Cent Account (Starter)</summary>
              <div class="acct-details__body">
                <h3>Purpose</h3>
                <ul>
                  <li>Designed for beginners entering forex trading</li>
                  <li>Low deposit to reduce entry barrier</li>
                </ul>
                <h3>Key features</h3>
                <ul>
                  <li>Trade in cents (lower risk exposure)</li>
                  <li>Spread from 1.8 pips</li>
                  <li>No commission</li>
                  <li>Leverage up to 1:1000</li>
                  <li>Islamic (swap-free) option available</li>
                </ul>
                <h3>Why it&rsquo;s ideal</h3>
                <ul>
                  <li>Perfect for beginner markets like Pakistan</li>
                  <li>Helps onboard new traders easily</li>
                  <li>Supports IB growth through easy entry</li>
                </ul>
              </div>
            </details>

            <details class="acct-details">
              <summary>STP Account (Standard)</summary>
              <div class="acct-details__body">
                <h3>Purpose</h3>
                <ul>
                  <li>For regular traders looking for better execution</li>
                </ul>
                <h3>Key features</h3>
                <ul>
                  <li>Minimum deposit: $100</li>
                  <li>Spread from 1.8 pips</li>
                  <li>No commission</li>
                  <li>Straight-through processing (STP)</li>
                  <li>Fast execution</li>
                  <li>Leverage up to 1:1000</li>
                </ul>
                <h3>Why it’s ideal</h3>
                <ul>
                  <li>Balanced trading conditions</li>
                  <li>Simple pricing model</li>
                  <li>Suitable for most retail traders</li>
                </ul>
              </div>
            </details>

            <details class="acct-details acct-details--ecn">
              <summary>ECN Account (Professional)</summary>
              <div class="acct-details__body">
                <h3>Purpose</h3>
                <ul>
                  <li>Designed for experienced and high-volume traders</li>
                </ul>
                <h3>Key features</h3>
                <ul>
                  <li>Minimum deposit: $500</li>
                  <li>Raw spreads from 0.1 pips</li>
                  <li>Commission: $8–$10 per lot</li>
                  <li>Leverage up to 1:1000</li>
                  <li>Supports Forex, Metals, Indices, Commodities, Crypto</li>
                  <li>Ideal for scalping and automated trading</li>
                </ul>
                <h3>Why it&rsquo;s ideal</h3>
                <ul>
                  <li>Tight spreads for serious traders</li>
                  <li>Better execution quality</li>
                  <li>Competitive with top ECN brokers</li>
                </ul>
              </div>
            </details>
          </div>
        </div>
      </section>

      <section class="acct-section" aria-labelledby="acct-notes-heading">
        <div class="container">
          <h2 id="acct-notes-heading">Important notes</h2>
          <div class="acct-notes-card">
            <ul>
              <li><strong>All account types support:</strong> Forex, Metals, Indices, Commodities, and Crypto.</li>
              <li><strong>Islamic accounts are available for:</strong> Cent and STP accounts.</li>
            </ul>
          </div>
        </div>
      </section>
<!-- 
      <section class="acct-section" aria-labelledby="acct-ib-heading">
        <div class="container">
          <h2 id="acct-ib-heading">Partner (IB) commissions</h2>
          <p class="acct-section-intro">Indicative $ per lot (unless noted). <strong>Subject to your IB agreement.</strong></p>

          <h3 class="acct-subhead">STP account &ndash; IB commission</h3>
          <div class="acct-data-table-wrap">
            <table class="acct-data-table">
              <thead>
                <tr>
                  <th scope="col">Level</th>
                  <th scope="col">Partner tier</th>
                  <th scope="col">Gold</th>
                  <th scope="col">Forex / Metals</th>
                  <th scope="col"><abbr title="Futures and CFD instruments: single commission tier.">Futures CFD</abbr></th>
                  <th scope="col">Crypto</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Level 1 (G6)</td>
                  <td>Partner</td>
                  <td>$6</td>
                  <td>$4</td>
                  <td>$4</td>
                  <td>$4</td>
                </tr>
                <tr>
                  <td>Level 2 (G7)</td>
                  <td>Senior Partner</td>
                  <td>$7</td>
                  <td>$5</td>
                  <td>$5</td>
                  <td>$5</td>
                </tr>
                <tr>
                  <td>Level 3 (G8)</td>
                  <td>Premium Partner</td>
                  <td>$8</td>
                  <td>$6</td>
                  <td>$6</td>
                  <td>$6</td>
                </tr>
                <tr>
                  <td>Level 4 (G9)</td>
                  <td>Premium Partner</td>
                  <td>$9</td>
                  <td>$7</td>
                  <td>$6</td>
                  <td>$7</td>
                </tr>
                <tr>
                  <td>Level 5 (G10)</td>
                  <td>Premium Partner</td>
                  <td>$10</td>
                  <td>$8</td>
                  <td>$6</td>
                  <td>$8</td>
                </tr>
              </tbody>
            </table>
          </div>

          <h3 class="acct-subhead">Cent account – IB commission</h3>
          <p class="acct-ib-note">Only Forex, Metals, Oil &amp; Natural Gas (cent denomination).</p>
          <div class="acct-data-table-wrap">
            <table class="acct-data-table">
              <thead>
                <tr>
                  <th scope="col">Level</th>
                  <th scope="col">Partner tier</th>
                  <th scope="col">Forex &amp; Metals</th>
                  <th scope="col">Gold</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Level 1 (G6)</td>
                  <td>Partner</td>
                  <td>USC 6</td>
                  <td>USC 4</td>
                </tr>
                <tr>
                  <td>Level 2 (G7)</td>
                  <td>Senior Partner</td>
                  <td>USC 7</td>
                  <td>USC 5</td>
                </tr>
                <tr>
                  <td>Level 3 (G8)</td>
                  <td>Premium Partner</td>
                  <td>USC 8</td>
                  <td>USC 6</td>
                </tr>
                <tr>
                  <td>Level 4 (G9)</td>
                  <td>Premium Partner</td>
                  <td>USC 9</td>
                  <td>USC 7</td>
                </tr>
                <tr>
                  <td>Level 5 (G10)</td>
                  <td>Premium Partner</td>
                  <td>USC 10</td>
                  <td>—</td>
                </tr>
              </tbody>
            </table>
          </div>

          <h3 class="acct-subhead">ECN account &ndash; IB commission</h3>
          <div class="acct-placeholder-card" role="status">
            ECN partner commissions may be confirmed with your manager or added here once your fixed structure is finalized.
          </div>
        </div>
      </section>

      <section class="acct-section" aria-labelledby="acct-rebate-heading">
        <div class="container">
          <h2 id="acct-rebate-heading">Flexible rebate structure</h2>
          <p class="acct-section-intro">In addition to standard commissions, partners can customize their earnings.</p>
          <h3 class="acct-subhead">How it works</h3>
          <ol class="acct-rebate-steps">
            <li>Base commission is provided.</li>
            <li>Partner requests higher payout.</li>
            <li>Spread is slightly increased.</li>
            <li>Extra spread converts into higher commission.</li>
          </ol>
          <h3 class="acct-subhead">Example</h3>
          <div class="acct-data-table-wrap acct-rebate-example">
            <table class="acct-data-table">
              <thead>
                <tr>
                  <th scope="col">Level</th>
                  <th scope="col">Rebate</th>
                  <th scope="col">Spread adjustment</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Level 1</td>
                  <td>$11 per lot</td>
                  <td>+5 points</td>
                </tr>
                <tr>
                  <td>Level 1</td>
                  <td>$16 per lot</td>
                  <td>+10 points</td>
                </tr>
                <tr>
                  <td>Level 1</td>
                  <td>$20+ per lot</td>
                  <td>Custom</td>
                </tr>
              </tbody>
            </table>
          </div>
          <h3 class="acct-subhead">Benefits</h3>
          <div class="acct-notes-card" style="margin-top: 0;">
            <ul>
              <li>Flexible earning structure</li>
              <li>Higher income potential</li>
              <li>Custom deals for serious partners</li>
              <li>Works for both small and large IBs</li>
            </ul>
          </div>
        </div>
      </section>

      <section class="acct-section" aria-labelledby="acct-spread-heading">
        <div class="container">
          <h2 id="acct-spread-heading">Spread information</h2>
          <p class="acct-section-intro">Typical STP and Cent spreads (indicative). ECN costs combine raw spread plus commission.</p>

          <div class="acct-spread-grid">
            <div class="acct-spread-block">
              <h3>Forex (STP &amp; Cent)</h3>
              <div class="acct-data-table-wrap">
                <table class="acct-data-table">
                  <thead>
                    <tr>
                      <th scope="col">Pair</th>
                      <th scope="col">Typical spread</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td>EUR/USD</td><td>1.2 – 1.5</td></tr>
                    <tr><td>GBP/USD</td><td>1.5 – 1.8</td></tr>
                    <tr><td>USD/JPY</td><td>1.3 – 1.6</td></tr>
                    <tr><td>AUD/USD</td><td>1.4 – 1.7</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="acct-spread-block">
              <h3>Metals</h3>
              <div class="acct-data-table-wrap">
                <table class="acct-data-table">
                  <thead>
                    <tr>
                      <th scope="col">Instrument</th>
                      <th scope="col">Spread</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td>Gold (XAU/USD)</td><td>18–25 points</td></tr>
                    <tr><td>Silver (XAG/USD)</td><td>25–35 points</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="acct-spread-block">
              <h3>Crypto</h3>
              <div class="acct-data-table-wrap">
                <table class="acct-data-table">
                  <thead>
                    <tr>
                      <th scope="col">Pair</th>
                      <th scope="col">Spread</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td>BTC/USD</td><td>30–60</td></tr>
                    <tr><td>ETH/USD</td><td>5–12</td></tr>
                    <tr><td>XRP/USD</td><td>0.005–0.02</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="acct-ecn-cost" aria-labelledby="ecn-cost-title">
            <h3 id="ecn-cost-title" style="margin: 0 0 8px; font-size: 1rem;">ECN account cost structure</h3>
            <ul>
              <li>Raw spreads from 0.0&ndash;0.2 pips</li>
              <li>Commission approx: $6 per lot (round turn)</li>
            </ul>
            <p style="margin: 14px 0 0; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-secondary);">Example</p>
            <ul style="margin-top: 8px;">
              <li>Spread: ~0.1 pips</li>
              <li>Commission: ~$6</li>
              <li>Total cost: ~$7 per lot</li>
            </ul>
          </div>
        </div>
      </section> -->

      <section class="acct-section" aria-labelledby="acct-elite-heading">
        <div class="container">
          <div class="acct-elite-card">
            <h2 id="acct-elite-heading">Mystery / elite accounts</h2>
            <p>Our offering goes beyond the standard account types listed here. We maintain a range of premium and elite accounts, tailored for professional traders and investors &mdash; available by request only.</p>
            <p>For access and details, please <a href="./?page=contact-us" style="color: #00b67a; font-weight: 600;">contact us</a> directly.</p>
          </div>
        </div>
      </section>

      <section class="acct-cta" aria-labelledby="acct-cta-heading">
        <div class="container">
          <div class="acct-cta-inner">
            <h2 id="acct-cta-heading">Open your account</h2>
            <div class="acct-cta-buttons">
              <a href="./?page=open-live-account" class="acct-cta-btn acct-cta-btn--primary">Open Live Account</a>
              <a href="./?page=open-demo-account" class="acct-cta-btn acct-cta-btn--secondary">Try Demo</a>
              <a href="./?page=contact-us" class="acct-cta-btn acct-cta-btn--outline">Speak to an Expert</a>
            </div>
          </div>
        </div>
      </section>
    </main>

