<style>
  /* .gold-silver-banner {
  background-image: url('assets/images/banner.jpeg');
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain; 
  
  width: 100%;
  height: 500px;
} */

.gold-silver-banner {
  position: relative;
  width: 100%;
  overflow: hidden;
  line-height: 0;
}

.gold-silver-banner::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.5); /* adjust darkness here */
  z-index: 1;
}

/* make sure content stays above overlay */
.gold-silver-banner > * {
  position: relative;
  z-index: 2;
}
.banner-img {
  width: 100%;
  height: auto;
  display: block;
}

@media (max-width: 768px) {
  .gold-silver-banner {
    min-height: 210px;
  }

  .banner-img {
    width: 100%;
    height: 210px;
    object-fit: contain;
    object-position: center center;
    background: #000000;
  }
}

/* Home payment — revamp (wallets + layout overrides) */
.home-payment-overview.home-pay-revamp .home-payment-overview__visual {
  border-radius: 20px;
  padding: 0;
  background: transparent;
}

.home-payment-overview.home-pay-revamp .home-payment-overview__icon-grid {
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.home-pay-methods-row {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 10px;
}

@media (max-width: 640px) {
  .home-pay-methods-row {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

.home-pay-wallets {
  border-radius: 16px;
  padding: 16px 14px 18px;
  background: linear-gradient(165deg, rgba(208, 44, 45, 0.09) 0%, rgba(0, 0, 0, 0.35) 45%, rgba(0, 182, 122, 0.06) 100%);
  border: 1px solid rgba(255, 255, 255, 0.1);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
}

.home-pay-wallets__label {
  display: block;
  font-size: 0.68rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.55);
  margin-bottom: 12px;
  text-align: center;
}

body.light-theme .home-pay-wallets__label {
  color: rgba(0, 0, 0, 0.45);
}

.home-pay-wallets__grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 10px;
}

@media (max-width: 520px) {
  .home-pay-wallets__grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

.home-payment-overview__wallet-chip {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 6px;
  min-height: 92px;
  padding: 12px 8px;
  border-radius: 14px;
  background: rgba(0, 0, 0, 0.28);
  border: 1px solid rgba(255, 255, 255, 0.1);
  transition: border-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
}

.home-payment-overview__wallet-chip:hover {
  border-color: rgba(0, 182, 122, 0.45);
  box-shadow: 0 6px 20px rgba(0, 182, 122, 0.12);
  transform: translateY(-2px);
}

.home-payment-overview__wallet-brand {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
}

.home-payment-overview__wallet-apple-mark {
  width: 20px;
  height: 24px;
  flex-shrink: 0;
}

.home-payment-overview__wallet-apple-pay-text {
  font-size: 1.05rem;
  font-weight: 600;
  letter-spacing: -0.03em;
}

.home-payment-overview__wallet-brand--apple {
  color: #f5f5f7;
}

.home-payment-overview__wallet-g-mark {
  width: 26px;
  height: 26px;
  flex-shrink: 0;
}

.home-payment-overview__wallet-gpay-text {
  display: flex;
  align-items: center;
  font-weight: 600;
  font-size: 1rem;
}

.home-payment-overview__wallet-gpay-muted {
  color: rgba(255, 255, 255, 0.92);
  letter-spacing: -0.02em;
}

.home-payment-overview__wallet-chip--mm {
  padding: 10px 8px;
  min-height: 88px;
}

.home-payment-overview__wallet-mm-img {
  width: 100%;
  max-width: 120px;
  height: auto;
  max-height: 56px;
  object-fit: contain;
  display: block;
}

.home-payment-overview__brand-svg--visa {
  max-width: 168px;
  max-height: 52px;
}

.home-payment-overview__wallet-chip-name {
  font-size: 11px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  color: var(--text-primary);
  text-align: center;
  line-height: 1.25;
}

.home-payment-overview__wallet-chip-region {
  font-size: 9px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--text-secondary);
  opacity: 0.9;
}

.home-payment-overview__gcash-wordmark {
  font-size: 17px;
  font-weight: 800;
  letter-spacing: -0.04em;
  line-height: 1;
}

.home-payment-overview__gcash-g {
  color: #005ead;
}

.home-payment-overview__gcash-c {
  color: #f7941d;
}

.home-payment-overview__gcash-ash {
  color: #005ead;
}

body.light-theme .home-payment-overview__wallet-chip {
  background: rgba(255, 255, 255, 0.85);
  border-color: rgba(0, 0, 0, 0.08);
}

body.light-theme .home-pay-wallets {
  background: linear-gradient(165deg, rgba(208, 44, 45, 0.06) 0%, #fff 40%, rgba(0, 182, 122, 0.05) 100%);
  border-color: rgba(0, 0, 0, 0.08);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
}

body.light-theme .home-payment-overview__wallet-chip:hover {
  border-color: rgba(0, 182, 122, 0.35);
}

body.light-theme .home-payment-overview__wallet-brand--apple {
  color: #111;
}

body.light-theme .home-payment-overview__wallet-gpay-muted {
  color: #5f6368;
}

.home-pay-revamp .home-payment-overview__bullets {
  margin-top: 8px;
}

.home-pay-revamp .home-payment-overview__usp,
.home-pay-revamp .home-payment-overview__providers {
  display: none;
}

.home-pay-footnote {
  margin: 14px 0 0;
  font-size: 0.78rem;
  line-height: 1.5;
  color: var(--text-secondary);
  text-align: center;
  opacity: 0.85;
  max-width: 36rem;
  margin-left: auto;
  margin-right: auto;
}
</style>
    <!-- Hero Section -->
<section class="hero gold-silver-banner" aria-label="TraderTok banner">
  <img src="assets/images/banner.jpeg" alt="Banner" class="banner-img">
</section>



    <!-- About Us Section -->
    <section class="about-us">
      <div class="container">
        <div class="about-content">
          <div class="candles-bg">
            <div class="candle" style="--x: 120px; --y: 280px; --h: 110px; --delay: 0s; --duration: 4.5s;"></div>
            <div class="candle" style="--x: 250px; --y: 250px; --h: 140px; --delay: 0.6s; --duration: 5.8s;"></div>
            <div class="candle" style="--x: 380px; --y: 290px; --h: 100px; --delay: 1.2s; --duration: 5.2s;"></div>
            <div class="candle" style="--x: 510px; --y: 240px; --h: 150px; --delay: 0.3s; --duration: 6.0s;"></div>
            <div class="candle" style="--x: 640px; --y: 270px; --h: 120px; --delay: 1.5s; --duration: 4.8s;"></div>
            <div class="candle" style="--x: 770px; --y: 260px; --h: 130px; --delay: 0.9s; --duration: 5.5s;"></div>
            <div class="candle" style="--x: 900px; --y: 285px; --h: 105px; --delay: 1.8s; --duration: 5.0s;"></div>
            <div class="candle" style="--x: 1030px; --y: 255px; --h: 135px; --delay: 0.4s; --duration: 5.7s;"></div>
            <div class="candle" style="--x: 1160px; --y: 275px; --h: 115px; --delay: 1.1s; --duration: 4.9s;"></div>
          </div>
          <div class="about-text">
            <h2 class="about-title" data-i18n="about.title">Your Trusted Partner in Financial Growth</h2>
            <p class="about-subtitle gradient-text" data-i18n="about.subtitle">At TraderTok, we're redefining what it
              means to trade in the global markets.</p>

            <p class="about-description" data-i18n="about.description1">Born from a passion for precision, technology,
              and opportunity, we've built a platform that empowers traders of all levels to take control of their
              financial future.</p>

            <p class="about-description" data-i18n="about.description2">We don't just provide access to the markets — we
              provide the clarity, confidence, and cutting-edge tools that make a real difference. Every second counts
              in trading, and that's why we've engineered an environment where speed meets stability, and innovation
              meets opportunity.</p>

            <a href="about" class="btn-primary" data-i18n="hero.learnMore"
              style="text-decoration: none;">Learn More</a>
          </div>


          <div class="about-stats">
            <div class="stat-card">
              <div class="stat-number" data-target="500">0</div>
              <div class="stat-label" data-i18n="about.happyClients">Happy Clients</div>
            </div>
            <div class="stat-card">
              <div class="stat-number stat-247">
                <span class="stat-24" data-target="24">0</span>
                <span class="stat-slash">/</span>
                <span class="stat-7" data-target="5">0</span>
              </div>
              <div class="stat-label" data-i18n="about.support">Support</div>
            </div>
            <div class="stat-card">
              <div class="stat-number" data-target="100">0</div>
              <div class="stat-label" data-i18n="about.secure">Secure</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Traders Club Section -->
    <section class="traders-club-section">
      <div class="container">
        <div class="traders-club-card">
          <div class="traders-club-content">
            <h2 class="traders-club-title" data-i18n="tradersClub.free">FREE</h2>
            <p class="traders-club-description" data-i18n-html="tradersClub.description">
              Join our <strong>Traders Club</strong> and get a free virtual card. Instant withdrawals, use worldwide
              with no fees and no limits.
            </p>
            <p class="traders-club-disclaimer" data-i18n="tradersClub.disclaimer">*Available for verified club members
              only</p>
            <button class="btn-traders-club" id="openTradersClubModal">
              <span data-i18n="tradersClub.joinNow">Join Now</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </button>
          </div>
          <div class="traders-club-image">
            <img src="assets/images/card-tradertok.png" alt="TraderTok Free Card" loading="lazy">
          </div>
        </div>
      </div>
    </section>

    <!-- Traders Club Modal -->
    <div class="traders-club-modal" id="tradersClubModal">
      <div class="traders-club-modal-overlay"></div>
      <div class="traders-club-modal-content" id="tradersClubModalContent">
        <button class="modal-close" id="closeTradersClubModal">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
        <div id="tradersClubModalBody">
          <div class="modal-header">
            <h3 class="modal-title" data-i18n="tradersClub.modalTitle">Join Traders Club</h3>
            <p class="modal-subtitle" data-i18n="tradersClub.modalSubtitle">Get your free virtual card today</p>
          </div>
          <form class="traders-club-form" id="tradersClubForm" novalidate>
            <div class="traders-club-mode" role="group" aria-labelledby="tradersClubModeLabel">
              <span id="tradersClubModeLabel" class="traders-club-mode-label" data-i18n="tradersClub.choosePath">How would you like to continue?</span>
              <div class="traders-club-mode-toggle">
                <label class="traders-club-mode-option">
                  <input type="radio" name="tradersClubMode" value="existing" checked>
                  <span data-i18n="tradersClub.haveAccount">I have an account</span>
                </label>
                <label class="traders-club-mode-option">
                  <input type="radio" name="tradersClubMode" value="new">
                  <span data-i18n="tradersClub.createAccount">Create an account</span>
                </label>
              </div>
            </div>

            <div id="tradersClubPanelExisting" class="traders-club-panel">
              <div class="form-group">
                <label for="clubEmailExisting" data-i18n="tradersClub.email">Email</label>
                <input type="email" id="clubEmailExisting" name="email_existing"
                  data-i18n-placeholder="tradersClub.emailPlaceholder" placeholder="Enter your email"
                  autocomplete="email">
              </div>
              <p class="traders-club-hint" data-i18n="tradersClub.existingHint">We’ll check your Traders Club eligibility using your account email.</p>
            </div>

            <div id="tradersClubPanelNew" class="traders-club-panel" hidden>
              <div class="traders-club-form-row">
                <div class="form-group">
                  <label for="clubFirstname" data-i18n="auth.firstName">First name</label>
                  <input type="text" id="clubFirstname" name="firstname"
                    data-i18n-placeholder="auth.firstNamePlaceholder" placeholder="John" autocomplete="given-name">
                </div>
                <div class="form-group">
                  <label for="clubLastname" data-i18n="auth.lastName">Last name</label>
                  <input type="text" id="clubLastname" name="lastname"
                    data-i18n-placeholder="auth.lastNamePlaceholder" placeholder="Doe" autocomplete="family-name">
                </div>
              </div>
              <div class="form-group">
                <label for="clubEmailNew" data-i18n="tradersClub.email">Email</label>
                <input type="email" id="clubEmailNew" name="email_new"
                  data-i18n-placeholder="tradersClub.emailPlaceholder" placeholder="Enter your email"
                  autocomplete="email">
              </div>
              <div class="form-group">
                <label for="clubPhone" data-i18n="tradersClub.phone">Phone</label>
                <input type="tel" id="clubPhone" name="phone"
                  data-i18n-placeholder="tradersClub.phonePlaceholder" placeholder="Enter your phone"
                  autocomplete="tel">
              </div>
              <div class="form-group">
                <label for="clubPassword" data-i18n="auth.password">Password</label>
                <input type="password" id="clubPassword" name="password"
                  data-i18n-placeholder="auth.passwordPlaceholder" placeholder="Create a password" minlength="8"
                  autocomplete="new-password">
              </div>
            </div>

            <p class="traders-club-form-error" id="tradersClubFormError" role="alert" hidden></p>

            <button type="submit" class="btn-submit-club" id="tradersClubSubmit" data-i18n="tradersClub.continueEligible">
              Continue
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Insights Section -->
    <section class="insights">
      <div class="insights-wrapper">
        <h2 class="insights-title" data-i18n="insights.title">Get the latest analytics insights — straight from our team
          to you.</h2>

        <div class="insights-cards">
          <?php
                    // Mapping for i18n keys based on card titles
                    $cardI18nMap = [
                        'Financial Strategy' => 'financialStrategy',
                        'Free Trainings' => 'freeTrainings',
                        'Asset Management' => 'assetManagement',
                        'Demo Account' => 'demoAccount'
                    ];

                    foreach ($cards as $card) {
                        // Normalize title to match keys (remove <br>, trim whitespace)
                        $cleanTitle = trim(preg_replace('/\s+/', ' ', strip_tags($card->title)));
                        $i18nSuffix = isset($cardI18nMap[$cleanTitle]) ? $cardI18nMap[$cleanTitle] : null;
                    ?>
          <article class="insight-card">
            <div class="card-overlay"></div>
            <div class="card-content">
              <h3 class="card-title" <?php echo $i18nSuffix ? 'data-i18n-html="insights.' . $i18nSuffix . '"' : ''; ?>>
                <?php echo $card->title; ?></h3>
              <p class="card-description" <?php echo $i18nSuffix ? 'data-i18n="insights.' . $i18nSuffix . 'Desc"' : ''; ?>>
                <?php echo $card->content; ?></p>
            </div>
          </article>
          <?php } ?>

        </div>

      </div>
    </section>

    <!-- Trading Platforms Section -->
    <section class="platforms-section">
      <div class="container">
        <!-- Header -->
        <div class="platforms-header">
          <!-- <div class="platforms-eyebrow" data-i18n="platforms.eyebrow">Our Trading Platforms</div> -->
          <h2 class="platforms-title" data-i18n="platforms.title">Come Trade With Us</h2>
          <p class="platforms-subtitle" data-i18n="platforms.subtitle">
            Choose how you prefer to trade: powerful desktop application for deep analysis
            or lightweight mobile platform to stay in the market on the go.
          </p>
        </div>

        <!-- Two Column Layout -->
        <div class="platforms-wrapper">
          <!-- Left: Platform Options -->
          <div class="platforms-left">
            <div class="platform-options">
              <!-- Desktop Platform Option -->
              <div class="platform-option platform-option--desktop" tabindex="0" role="button" aria-pressed="false">
                <div class="platform-option__label" data-i18n="platforms.webDesktop">Web &amp; Desktop</div>
                <div class="platform-option__header">
                  <div class="platform-option__title" data-i18n="platforms.desktopTitle">
                    TraderTok Desktop
                  </div>
                </div>
                <p class="platform-option__text" data-i18n="platforms.desktopDescription">
                  Access our TraderTok Desktop application on your Mac or Windows PC and get full access to charts,
                  indicators and multi-screen workspace for professional trading.
                </p>
                <div class="platform-option__actions">
                  <a href="https://tradertok.com/download/win.zip" class="btn-platform btn-platform-primary"
                    style=" text-decoration: none;">
                    <svg class="btn-os-icon" viewBox="0 0 88 88" aria-hidden="true">
                      <path fill="currentColor"
                        d="M0 12.402l35.687-4.86.016 34.423-35.67.203zm35.67 33.529l.028 34.453L.028 75.48.026 45.7zm4.326-39.025L87.314 0v41.527l-47.318.376zm47.329 39.349l-.011 41.34-47.318-6.678-.066-34.739z" />
                    </svg>
                    <span data-i18n="platforms.windows">Windows</span>
                  </a>
                  <a href="https://tradertok.com/download/mac.zip" class="btn-platform btn-platform-outline"
                    style=" text-decoration: none;">
                    <svg class="btn-os-icon" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill="currentColor"
                        d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z" />
                    </svg>
                    <span data-i18n="platforms.mac">Mac</span>
                  </a>
                </div>
              </div>

              <!-- Mobile Platform Option -->
              <div class="platform-option platform-option--mobile" tabindex="0" role="button" aria-pressed="false">
                <div class="platform-option__label" data-i18n="platforms.mobilePlatform">Mobile Platform</div>
                <div class="platform-option__header">
                  <div class="platform-option__title" data-i18n="platforms.mobileTitle">
                    TraderTok Mobile
                  </div>
                </div>
                <p class="platform-option__text" data-i18n="platforms.mobileDescription">
                  Access our mobile platform on iOS and Android and trade anywhere: open, manage
                  and close positions right from your phone in just a few taps.
                </p>
                <div class="platform-option__actions">
                  <a href="https://appzone.tradertok.com/" class="btn-platform btn-platform-outline auth-trigger"
                    data-tab="signin" style=" text-decoration: none;">
                    <svg class="btn-os-icon" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill="currentColor"
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                    <span data-i18n="auth.signIn">Sign In</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Right: Device Visual -->
          <div class="platforms-visual">
            <div class="device-wrapper">
              <img src="assets/images/devices-mockup.png"
                alt="TraderTok desktop and mobile trading platform interface showing real-time charts"
                class="devices-img" loading="lazy" />

              <div class="screen-overlay laptop-screen">
                <canvas id="laptopChart" class="trading-chart"></canvas>
              </div>

              <div class="screen-overlay phone-screen">
                <canvas id="phoneChart" class="trading-chart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Trading Instruments Section -->
    <section class="instruments-section-home">
      <!-- Background Video -->
      <div class="instruments-video-bg">
        <video autoplay loop muted playsinline>
          <source src="assets/images/education.mp4" type="video/mp4">
        </video>
        <div class="instruments-video-overlay"></div>
      </div>

      <div class="container">
        <!-- Floating Symbols Background -->
        <div class="symbols-bg-home">
          <span class="symbol-home" style="--x: 8%; --y: 15%; --size: 48px; --delay: 0s; --duration: 25s;">$</span>
          <span class="symbol-home" style="--x: 22%; --y: 65%; --size: 36px; --delay: 3s; --duration: 30s;">€</span>
          <span class="symbol-home" style="--x: 15%; --y: 85%; --size: 42px; --delay: 7s; --duration: 28s;">£</span>
          <span class="symbol-home" style="--x: 35%; --y: 25%; --size: 32px; --delay: 2s; --duration: 32s;">¥</span>
          <span class="symbol-home" style="--x: 48%; --y: 70%; --size: 38px; --delay: 5s; --duration: 27s;">₿</span>
          <span class="symbol-home" style="--x: 42%; --y: 40%; --size: 44px; --delay: 1s; --duration: 29s;">Ξ</span>
          <span class="symbol-home" style="--x: 65%; --y: 20%; --size: 40px; --delay: 4s; --duration: 31s;">₹</span>
          <span class="symbol-home" style="--x: 58%; --y: 75%; --size: 34px; --delay: 6s; --duration: 26s;">₽</span>
          <span class="symbol-home" style="--x: 72%; --y: 55%; --size: 46px; --delay: 8s; --duration: 33s;">₩</span>
          <span class="symbol-home" style="--x: 85%; --y: 30%; --size: 36px; --delay: 2.5s; --duration: 29s;">₪</span>
          <span class="symbol-home" style="--x: 78%; --y: 80%; --size: 40px; --delay: 5.5s; --duration: 27s;">฿</span>
          <span class="symbol-home" style="--x: 92%; --y: 45%; --size: 38px; --delay: 3.5s; --duration: 30s;">₺</span>
        </div>

        <div class="instruments-intro-home">
          <h2 class="instruments-home-title" data-i18n="instruments.sectionTitle">Explore Our Trading Instruments</h2>
          <p class="instruments-home-subtitle gradient-text" data-i18n="instruments.sectionSubtitle">At TraderTok, we
            offer an extensive range of trading instruments tailored to meet the needs of every kind of trader—whether
            you're just starting out or managing a sophisticated portfolio.</p>
          <p class="instruments-home-description" data-i18n="instruments.sectionDescription">With access to global
            markets and deep liquidity, our platform empowers you to explore opportunities across a broad spectrum of
            asset classes, all in one place. We believe that choice is power, which is why we continuously expand our
            list of instruments to match the pace of the ever-evolving financial landscape.</p>
        </div>

        <!-- Instruments Accordion -->
        <div class="instruments-accordion-home">
          <?php
                    $instrumentI18nMap = [
                        'Forex' => 'forex',
                        'Commodities' => 'commodities',
                        'Stocks' => 'stocks',
                        'Indices' => 'indices',
                        'Cryptocurrencies' => 'cryptocurrencies'
                    ];

                    $advantId = 0;
                    foreach ($advantages as $advantage) {
                        $advantage_img = $advantage->image ?   $get->assets_url . '/' . $advantage->image : "wp-content/uploads/2019/02/banner-image-one.jpg";

                        // Normalize title
                        $cleanTitle = trim(preg_replace('/\s+/', ' ', strip_tags($advantage->title)));
                        $i18nSuffix = isset($instrumentI18nMap[$cleanTitle]) ? $instrumentI18nMap[$cleanTitle] : null;
                    ?>
          <div class="accordion-item">
            <button class="accordion-header">
              <span class="accordion-title"
                <?php echo $i18nSuffix ? 'data-i18n="instruments.' . $i18nSuffix . '"' : ''; ?>><?php echo $advantage->title; ?></span>
              <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
              <div class="accordion-body" <?php echo $i18nSuffix ? 'data-i18n="instruments.' . $i18nSuffix . 'Desc"' : ''; ?>>
                <?php echo $advantage->content; ?>
              </div>
            </div>
          </div>
          <?php } ?>

        </div>
      </div>
    </section>

    <!-- Why Choose TraderTok Section -->
    <section class="why-choose">
      <div class="container">
        <div class="why-choose-content">
          <h2 class="why-choose-title" data-i18n="whyChoose.title">Why Choose TraderTok</h2>
          <p class="why-choose-description gradient-text" data-i18n="whyChoose.subtitle">We provide our investors with
            continuous improvement, new opportunities to explore financial markets and the opportunity to work with a
            recognized leader in the financial industry.</p>
        </div>

        <!-- Two Column Layout -->
        <div class="why-choose-grid">
          <!-- Left Column: Video -->
          <div class="why-choose-video">
            <video autoplay loop muted playsinline class="trading-video trading-video-dark"
              aria-label="Professional trader using TraderTok platform" preload="metadata" loading="lazy">
              <source src="assets/images/why-choose-video1.mp4" type="video/mp4">
              <track kind="captions" src="captions.vtt" srclang="en" label="English captions">
              Your browser does not support the video tag.
            </video>
            <video autoplay loop muted playsinline class="trading-video trading-video-light"
              aria-label="Professional trader using TraderTok platform" preload="metadata" loading="lazy">
              <source src="assets/images/why-choose-video1.mp4" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>

          <!-- Right Column: Accordion FAQ -->
          <div class="why-choose-accordion">
            <?php
                    $whyChooseI18nMap = [
                        'Lightning-Fast Execution' => 'whyChoose.lightningExecution',
                        'Cutting-Edge Platforms' => 'whyChoose.cuttingEdgePlatforms',
                        'Global Markets, Local Insights' => 'whyChoose.globalMarkets',
                        'Competitive Pricing & Tight Spreads' => 'whyChoose.competitivePricing',
                        'Expert Support' => 'whyChoose.expertSupport',
                        'Security & Trust' => 'whyChoose.securityTrust',
                        'Education & Resources' => 'whyChoose.educationResources'
                    ];

                    $questId=0;
                    foreach ($questions as $quest) {
                        // Normalize title
                        $cleanTitle = trim(preg_replace('/\s+/', ' ', strip_tags($quest->title)));
                        $i18nKey = isset($whyChooseI18nMap[$cleanTitle]) ? $whyChooseI18nMap[$cleanTitle] : null;
                    ?>
            <div class="accordion-item">
              <button class="accordion-header">
                <span class="accordion-title"
                  <?php echo $i18nKey ? 'data-i18n="' . $i18nKey . '"' : ''; ?>><?php echo $quest->title; ?></span>
                <span class="accordion-icon">+</span>
              </button>
              <div class="accordion-content">
                <div class="accordion-body" <?php echo $i18nKey ? 'data-i18n="' . $i18nKey . 'Desc"' : ''; ?>>
                  <?php echo $quest->content; ?>
                </div>
              </div>
            </div>
            <?php $questId++; } ?>

          </div>
        </div>
      </div>
    </section>

    <?php include __DIR__ . '/partials/home-faq-section.php'; ?>

    <!-- Deposit Account Section -->
    <section class="deposit-section">
      <div class="container">
        <div class="deposit-card">
          <div class="deposit-content">
            <div class="deposit-counter">
              <span class="counter-number" id="depositCounter">0.0</span>
              <span class="counter-symbol">%</span>
            </div>
            <p class="deposit-description">
              <strong data-i18n="deposit.interest">7.6% interest</strong> <span data-i18n="deposit.isMonthly">is
                Monthly</span>. <span data-i18n="deposit.description">Receive monthly interest payment directly into
                your cash balance, with no obligation.</span>
            </p>
            <p class="deposit-disclaimer" data-i18n="deposit.disclaimer">*Credit and other risks apply, please read the
              Terms and Conditions</p>
            <button class="btn-deposit" id="openDepositModal">
              <span data-i18n="deposit.joinNow">Join Now</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </button>
          </div>
          <div class="deposit-image">
            <img src="assets/images/7.6.png" alt="7.6% Annual Deposit Rate" loading="lazy">
          </div>
        </div>
      </div>
    </section>

    <!-- Deposit Modal (same API flow as Traders Club; group = DepositAccount) -->
    <div class="deposit-modal" id="depositModal">
      <div class="deposit-modal-overlay"></div>
      <div class="deposit-modal-content" id="depositModalContent">
        <button class="modal-close" id="closeDepositModal">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
        <div id="depositModalBody">
          <div class="modal-header">
            <h3 class="modal-title" data-i18n="deposit.modalTitle">Open Deposit Account</h3>
            <p class="modal-subtitle" data-i18n="deposit.modalSubtitle">Fill in your details and our manager will contact
              you</p>
          </div>
          <form class="deposit-form" id="depositForm" novalidate>
            <div class="traders-club-mode" role="group" aria-labelledby="depositModeLabel">
              <span id="depositModeLabel" class="traders-club-mode-label" data-i18n="deposit.choosePath">How would you like to continue?</span>
              <div class="traders-club-mode-toggle">
                <label class="traders-club-mode-option">
                  <input type="radio" name="depositMode" value="existing" checked>
                  <span data-i18n="deposit.haveAccount">I have an account</span>
                </label>
                <label class="traders-club-mode-option">
                  <input type="radio" name="depositMode" value="new">
                  <span data-i18n="deposit.createAccount">Create an account</span>
                </label>
              </div>
            </div>

            <div id="depositPanelExisting" class="traders-club-panel">
              <div class="form-group">
                <label for="depositEmailExisting" data-i18n="deposit.email">Email</label>
                <input type="email" id="depositEmailExisting" name="email_existing"
                  data-i18n-placeholder="deposit.emailPlaceholder" placeholder="Enter your email"
                  autocomplete="email">
              </div>
              <p class="traders-club-hint" data-i18n="deposit.existingHint">We’ll check your eligibility using your account email.</p>
            </div>

            <div id="depositPanelNew" class="traders-club-panel" hidden>
              <div class="traders-club-form-row">
                <div class="form-group">
                  <label for="depositFirstname" data-i18n="auth.firstName">First name</label>
                  <input type="text" id="depositFirstname" name="firstname"
                    data-i18n-placeholder="auth.firstNamePlaceholder" placeholder="John" autocomplete="given-name">
                </div>
                <div class="form-group">
                  <label for="depositLastname" data-i18n="auth.lastName">Last name</label>
                  <input type="text" id="depositLastname" name="lastname"
                    data-i18n-placeholder="auth.lastNamePlaceholder" placeholder="Doe" autocomplete="family-name">
                </div>
              </div>
              <div class="form-group">
                <label for="depositEmailNew" data-i18n="deposit.email">Email</label>
                <input type="email" id="depositEmailNew" name="email_new"
                  data-i18n-placeholder="deposit.emailPlaceholder" placeholder="Enter your email"
                  autocomplete="email">
              </div>
              <div class="form-group">
                <label for="depositPhone" data-i18n="deposit.phone">Phone</label>
                <input type="tel" id="depositPhone" name="phone"
                  data-i18n-placeholder="deposit.phonePlaceholder" placeholder="+1 (555) 000-0000"
                  autocomplete="tel">
              </div>
              <div class="form-group">
                <label for="depositPassword" data-i18n="auth.password">Password</label>
                <input type="password" id="depositPassword" name="password"
                  data-i18n-placeholder="auth.passwordPlaceholder" placeholder="Enter your password" minlength="8"
                  autocomplete="new-password">
              </div>
            </div>

            <p class="traders-club-form-error" id="depositFormError" role="alert" hidden></p>

            <button type="submit" class="btn-submit-deposit" id="depositSubmit" data-i18n="deposit.continueEligible">Continue</button>
          </form>
          <p class="modal-disclaimer" data-i18n="deposit.modalDisclaimer">By submitting, you agree to our Terms of Service
            and Privacy Policy</p>
        </div>
      </div>
    </div>

    <!-- Telegram Section -->
    <section class="telegram-section">
      <div class="container">
        <div class="telegram-card">
          <div class="telegram-info">
            <h2 class="telegram-title" data-i18n-html="telegram.title">Join Our <span
                class="gradient-text">Community</span></h2>
            <p class="telegram-description" data-i18n="telegram.description">Get trading signals, market analysis, and
              connect with other traders</p>
          </div>
          <div class="telegram-person">
            <img src="assets/images/Person holding phone happily.png" alt="Happy trader" loading="lazy">
          </div>
          <a href="https://t.me/+awNc7BFxH45jOTNk" target="_blank" class="btn-telegram">
            <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
              <path
                d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z" />
            </svg>
            <span data-i18n="telegram.joinNow">Join Now</span>
          </a>
        </div>

        <!-- News Ticker -->
        <div class="telegram-ticker-wrapper">
          <div class="telegram-ticker">
            <div class="ticker-track">
              <div class="ticker-item">
                <span class="ticker-badge">SIGNAL</span>
                <span class="ticker-text">BTC/USDT Long Entry at $67,450 - Target $72,000</span>
                <span class="ticker-time">2h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge alert">ALERT</span>
                <span class="ticker-text">Fed Interest Rate Decision Tomorrow - High Volatility Expected</span>
                <span class="ticker-time">4h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge success">PROFIT</span>
                <span class="ticker-text">ETH Trade Closed +18.5% Profit - Congratulations to all members!</span>
                <span class="ticker-time">6h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge">SIGNAL</span>
                <span class="ticker-text">GOLD Short Setup Forming - Wait for Confirmation</span>
                <span class="ticker-time">8h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge analysis">ANALYSIS</span>
                <span class="ticker-text">Weekly Market Review: S&P 500 Bullish Momentum Continues</span>
                <span class="ticker-time">12h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge success">PROFIT</span>
                <span class="ticker-text">NASDAQ Scalp +2.3% in 15 minutes - Perfect execution!</span>
                <span class="ticker-time">1d ago</span>
              </div>
              <!-- Duplicate for seamless loop -->
              <div class="ticker-item">
                <span class="ticker-badge">SIGNAL</span>
                <span class="ticker-text">BTC/USDT Long Entry at $67,450 - Target $72,000</span>
                <span class="ticker-time">2h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge alert">ALERT</span>
                <span class="ticker-text">Fed Interest Rate Decision Tomorrow - High Volatility Expected</span>
                <span class="ticker-time">4h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge success">PROFIT</span>
                <span class="ticker-text">ETH Trade Closed +18.5% Profit - Congratulations to all members!</span>
                <span class="ticker-time">6h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge">SIGNAL</span>
                <span class="ticker-text">GOLD Short Setup Forming - Wait for Confirmation</span>
                <span class="ticker-time">8h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge analysis">ANALYSIS</span>
                <span class="ticker-text">Weekly Market Review: S&P 500 Bullish Momentum Continues</span>
                <span class="ticker-time">12h ago</span>
              </div>
              <div class="ticker-item">
                <span class="ticker-badge success">PROFIT</span>
                <span class="ticker-text">NASDAQ Scalp +2.3% in 15 minutes - Perfect execution!</span>
                <span class="ticker-time">1d ago</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
      <div class="container">
        <div class="contact-form-content">
          <h2 class="contact-form-title" data-i18n="contactForm.title">Are You Ready To Earn With TraderTok?</h2>
          <p class="contact-form-subtitle gradient-text" data-i18n="contactForm.subtitle">We will call you</p>
          <p class="contact-form-description" data-i18n="contactForm.description">Step into the world's largest trading
            volume market in few minutes; easily and securely.</p>

          <!-- Contact Form -->
          <form class="contact-form" id="contactForm" novalidate>
            <div class="form-row">
              <div class="form-group">
                <label for="name" class="form-label" data-i18n="contactForm.name">Name</label>
                <input type="text" id="name" name="name" class="form-input" placeholder="Enter your name"
                  data-i18n-placeholder="contactForm.namePlaceholder" required aria-required="true">
                <span class="form-error" id="name-error"></span>
              </div>
              <div class="form-group">
                <label for="surname" class="form-label" data-i18n="contactForm.surname">Surname</label>
                <input type="text" id="surname" name="surname" class="form-input" placeholder="Enter your surname"
                  data-i18n-placeholder="contactForm.surnamePlaceholder" required aria-required="true">
                <span class="form-error" id="surname-error"></span>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="phone" class="form-label" data-i18n="contactForm.phone">Phone</label>
                <input type="tel" id="phone" name="phone" class="form-input" placeholder="+44 7520 640 890"
                  data-i18n-placeholder="contactForm.phonePlaceholder" required aria-required="true"
                  pattern="[+]?[0-9\s\-()]+">
                <span class="form-error" id="phone-error"></span>
              </div>
              <div class="form-group">
                <label for="email" class="form-label" data-i18n="contactForm.email">Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="support@tradertok.com"
                  data-i18n-placeholder="contactForm.emailPlaceholder" required aria-required="true">
                <span class="form-error" id="email-error"></span>
              </div>
            </div>

            <div class="form-group form-group-full">
              <label for="message" class="form-label" data-i18n="contactForm.message">Message</label>
              <textarea id="message" name="message" class="form-textarea"
                placeholder="Tell us about your trading goals..." data-i18n-placeholder="contactForm.messagePlaceholder"
                rows="5" required aria-required="true"></textarea>
              <span class="form-error" id="message-error"></span>
            </div>

            <div class="form-status" id="formStatus" role="alert" aria-live="polite"></div>

            <button type="submit" class="btn-contact-submit" id="submitBtn" data-i18n="contactForm.submit">Contact
              Us</button>
          </form>
        </div>
      </div>
    </section>

    <!-- Trustpilot Reviews Section -->
    <section class="trustpilot-section">
      <div class="container">
        <div class="trustpilot-header">
          <div class="trustpilot-logo">
            <a href="https://www.trustpilot.com/review/tradertok.com" target="_blank" class="trustpilot-brand">
              <svg viewBox="0 0 24 24" width="32" height="32" class="trustpilot-star-icon">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                  fill="#00B67A" />
              </svg>
              <span class="trustpilot-name">Trustpilot</span>
            </a>
            <div class="trustpilot-rating">
              <div class="trustpilot-stars">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
              </div>
              <span class="trustpilot-score">4.5 out of 5</span>
            </div>
          </div>
        </div>

    <?php
    $home_client_testimonials = [
        [
            'name' => 'Bunny',
            'text' => 'Everything runs smoothly and the platform is very easy to use. A big thank you to David Faris, his professionalism and support are truly top-tier. He goes above and beyond to help.',
            'stars' => 5,
        ],
        [
            'name' => 'Frank B',
            'text' => 'My experience has been excellent. Dominic Weber has been incredibly helpful and accommodating throughout, making the entire process simple and stress-free.',
            'stars' => 5,
        ],
        [
            'name' => 'Mark Telford',
            'text' => 'Amazing experience overall. The platform is easy to navigate and very reliable. David Faris has been outstanding with his support and guidance.',
            'stars' => 5,
        ],
        [
            'name' => 'Dody Chandra Petrus',
            'text' => 'This is my first time trading and the experience has been great so far. Dominic Weber has been very supportive and always available to assist whenever needed.',
            'stars' => 5,
        ],
        [
            'name' => 'Kenneth Umaid',
            'text' => 'Great service and smooth experience. Everything works exactly as expected. Special thanks to David Faris for his consistent support and professionalism.',
            'stars' => 5,
        ],
        [
            'name' => 'Indira Sammy',
            'text' => 'Very satisfied with the overall experience. The platform is user-friendly and efficient. Dominic Weber has been extremely helpful and responsive throughout.',
            'stars' => 5,
        ],
        [
            'name' => 'Chris',
            'text' => 'The support from Mr. Simon Bjork, along with the team, Lucas, Roy, and Brooke, has been exceptional from the very beginning. They guided me through the initial stages of trading, including financial transfers and ongoing training sessions, always responding quickly and clearly to any questions. Their encouragement during market fluctuations has been especially reassuring, and I have full confidence in their advice and integrity. This experience has built a strong sense of trust, and I look forward to continuing this journey with them.',
            'stars' => 5,
        ],
    ];
    $home_testimonial_colors = ['#d02c2d', '#2196F3', '#7B68EE', '#d02c2d', '#00B67A', '#9C27B0', '#00897B'];
    ?>

        <!-- Client testimonials (directly under Trustpilot header) -->
        <section class="client-testimonials-section client-testimonials-section--under-trustpilot" aria-label="Client testimonials">
          <div class="client-testimonials-header">
            <h2 class="client-testimonials-title">Client testimonials</h2>
            <p class="client-testimonials-subtitle">What traders say about their experience with us</p>
          </div>

          <div class="client-testimonials-slider">
            <div class="client-testimonials-row">
              <button type="button" class="client-testimonials-btn client-testimonials-btn--side" id="clientTestimonialsPrev" aria-label="Previous testimonial">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
              </button>
              <div class="client-testimonials-viewport">
            <div class="client-testimonials-track" id="clientTestimonialsTrack">
            <?php foreach ($home_client_testimonials as $ti => $item) :
                $bg = $home_testimonial_colors[$ti % count($home_testimonial_colors)];
                $stars = isset($item['stars']) ? (int) $item['stars'] : 5;
                if ($stars < 0) {
                    $stars = 0;
                }
                if ($stars > 5) {
                    $stars = 5;
                }
                $authorName = isset($item['name']) ? trim((string) $item['name']) : '';
                ?>
            <div class="client-testimonials-card<?php echo $ti === 0 ? ' active' : ''; ?>">
              <?php if ($authorName !== '') : ?>
              <div class="client-testimonials-author" style="--accent: <?php echo htmlspecialchars($bg, ENT_QUOTES, 'UTF-8'); ?>;">
                <p class="client-testimonials-author-name"><?php echo htmlspecialchars($authorName, ENT_QUOTES, 'UTF-8'); ?></p>
              </div>
              <?php endif; ?>
              <p class="client-testimonials-quote"><?php echo htmlspecialchars($item['text'], ENT_QUOTES, 'UTF-8'); ?></p>
              <div class="client-testimonials-stars" aria-label="<?php echo $stars; ?> out of 5 stars">
                <?php
                for ($s = 1; $s <= 5; $s++) {
                    $full = $s <= $stars;
                    echo '<span class="client-testimonials-star' . ($full ? ' is-full' : ' is-empty') . '" aria-hidden="true">' . ($full ? '★' : '☆') . '</span>';
                }
                ?>
              </div>
            </div>
            <?php endforeach; ?>
            </div>
              </div>
              <button type="button" class="client-testimonials-btn client-testimonials-btn--side" id="clientTestimonialsNext" aria-label="Next testimonial">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </button>
            </div>
            <div class="client-testimonials-dots-row">
              <div class="client-testimonials-dots" id="clientTestimonialsDots"></div>
            </div>
          </div>
        </section>

        <a href="https://www.trustpilot.com/review/tradertok.com" target="_blank" class="trustpilot-link">
          <span data-i18n="trustpilot.moreReviews">More reviews on Trustpilot</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </a>
      </div>
    </section>

    <!-- Payment methods overview (copy + icon grid — below trust/testimonial area) -->

       <section class="home-payment-overview home-pay-revamp" aria-labelledby="home-payment-overview-title">
      <div class="container">
        <div class="home-payment-overview__layout">
          <h2 id="home-payment-overview-title" class="home-payment-overview__title">Fast, Secure &amp; Flexible Payments</h2>

          <p class="home-payment-overview__lead">
            Fund your account through licensed payment partners: cards, bank transfer, and regional options including <strong>Apple Pay</strong>, <strong>Google Pay</strong>, <strong>mobile money (Africa)</strong>, and <strong>GCash (Asia)</strong> where available.
          </p>

          <div class="home-payment-overview__visual" aria-label="Payment methods">
            <div class="home-payment-overview__icon-grid">
              <div class="home-pay-methods-row">
                <div class="home-payment-overview__icon-tile home-payment-overview__icon-tile--brand">
                  <svg class="home-payment-overview__brand-svg home-payment-overview__brand-svg--visa" viewBox="0 0 750 471" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Visa">
                    <path d="M278.2 334.3l30-186.2h48.1l-30.1 186.2h-48zm188.8-181.7c-9.5-3.6-24.5-7.5-43.2-7.5-47.6 0-81.2 24.1-81.5 58.5-.3 25.5 23.9 39.7 42.2 48.2 18.8 8.7 25.1 14.2 25 22-.1 11.9-15 17.3-28.9 17.3-19.3 0-29.6-2.7-45.5-9.4l-6.2-2.8-6.8 40c11.3 5 32.2 9.3 53.9 9.5 50.7 0 83.6-23.8 84-60.5.2-20.2-12.6-35.5-40.4-48.2-16.8-8.2-27.1-13.7-27-22 0-7.4 8.7-15.3 27.5-15.3 15.7-.2 27.1 3.2 36 6.8l4.3 2 6.6-38.6zm124.4-4.5h-37.3c-11.5 0-20.2 3.2-25.3 14.8l-71.6 163.2h50.6s8.3-21.9 10.1-26.7c5.5 0 54.8.1 61.9.1 1.4 6.2 6 26.6 6 26.6h44.7l-39.1-177.9zm-59.4 115c4-10.3 19.4-50 19.4-50-.3.5 4-10.4 6.4-17.1l3.3 15.4s9.3 43.1 11.3 52.1h-40.4v-.4zm-281.8-115l-47.3 127.1-5-24.8c-8.7-28.4-36-59.2-66.5-74.6l43.2 158.2 51-0.1 75.9-185.9-51.3.1z" fill="#1A1F71"/>
                    <path d="M146.9 148.1h-77.7l-.6 3.6c60.4 14.7 100.4 50.3 117 93l-16.9-81.5c-2.9-11.2-11.4-14.6-21.8-15.1z" fill="#F9A533"/>
                  </svg>
                </div>
                <div class="home-payment-overview__icon-tile home-payment-overview__icon-tile--brand">
                  <img src="./assets/images/Mastercard-logo.svg.png" alt="Mastercard" class="home-payment-overview__brand-img home-payment-overview__brand-img--mastercard" width="120" height="75" loading="lazy">
                </div>
                <div class="home-payment-overview__icon-tile">
                  <span class="home-payment-overview__icon-label">Cards</span>
                  <svg class="home-payment-overview__svg-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                    <rect x="6" y="12" width="36" height="24" rx="3"/>
                    <line x1="6" y1="20" x2="42" y2="20"/>
                    <rect x="28" y="28" width="10" height="4" rx="1" fill="currentColor" stroke="none"/>
                  </svg>
                </div>
                <div class="home-payment-overview__icon-tile">
                  <span class="home-payment-overview__icon-label">Bank transfer</span>
                  <svg class="home-payment-overview__svg-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                    <path d="M8 20h32l-6-8H14l-6 8z"/>
                    <path d="M10 20v14M18 20v14M24 16v18M30 20v14M38 20v14"/>
                    <line x1="6" y1="34" x2="42" y2="34"/>
                  </svg>
                </div>
              </div>

              <div class="home-pay-wallets">
                <span class="home-pay-wallets__label">Digital wallets &amp; regional methods</span>
                <div class="home-pay-wallets__grid" role="list">
                  <div class="home-payment-overview__wallet-chip" role="listitem" aria-label="Apple Pay">
                    <div class="home-payment-overview__wallet-brand home-payment-overview__wallet-brand--apple" aria-hidden="true">
                      <svg class="home-payment-overview__wallet-apple-mark" viewBox="0 0 24 28" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                      </svg>
                      <span class="home-payment-overview__wallet-apple-pay-text">Pay</span>
                    </div>
                  </div>
                  <div class="home-payment-overview__wallet-chip" role="listitem" aria-label="Google Pay">
                    <div class="home-payment-overview__wallet-brand home-payment-overview__wallet-brand--gpay" aria-hidden="true">
                      <svg class="home-payment-overview__wallet-g-mark" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                      </svg>
                      <span class="home-payment-overview__wallet-gpay-text"><span class="home-payment-overview__wallet-gpay-muted">Pay</span></span>
                    </div>
                  </div>
                  <div class="home-payment-overview__wallet-chip home-payment-overview__wallet-chip--mm" role="listitem" aria-label="Mobile money">
                    <img src="./assets/images/mm.jpg" alt="Mobile money" class="home-payment-overview__wallet-mm-img" width="120" height="56" loading="lazy">
                  </div>
                  <div class="home-payment-overview__wallet-chip" role="listitem" aria-label="GCash, Asia">
                    <span class="home-payment-overview__gcash-wordmark" aria-hidden="true"><span class="home-payment-overview__gcash-g">G</span><span class="home-payment-overview__gcash-c">C</span><span class="home-payment-overview__gcash-ash">ash</span></span>
                    <span class="home-payment-overview__wallet-chip-region" aria-hidden="true">Asia</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="home-payment-overview__trust-tags">
              <span class="home-payment-overview__tag">Secure</span>
              <span class="home-payment-overview__tag">Fast processing</span>
              <span class="home-payment-overview__tag">Global</span>
            </div>
            <p class="home-pay-footnote">PSPs include PayRetailers, PayOp, and others. Available methods depend on your region.</p>
          </div>

          <ul class="home-payment-overview__bullets">
            <li>Regional funding options</li>
            <li>Quick deposits and withdrawals</li>
            <li>Processing through regulated partners</li>
          </ul>

          <div class="home-payment-overview__usp">
            <h3 class="home-payment-overview__usp-title">Global Payment Access</h3>
            <p class="home-payment-overview__usp-text">
              Unlike traditional platforms limited to a few payment methods, TraderTok provides flexible funding options through multiple global payment partners — giving users access to the most efficient and convenient methods available in their region.
            </p>
          </div>

          <div class="home-payment-overview__providers">
            <h3 class="home-payment-overview__providers-title">Powered by Trusted Payment Partners</h3>
            <p class="home-payment-overview__providers-text">
              TraderTok works with a network of licensed payment service providers, including PayRetailers, PayOp, and other global PSP partners, enabling access to widely used payment methods such as Visa and Mastercard, along with bank transfers and region-specific solutions.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Banking Partners Section -->
    <section class="payment-methods-section">
      <div class="payment-methods-content">
        <div class="payment-methods-header">
          <h2 class="payment-methods-title" data-i18n-html="banking.title">Your funds are held in <span
              class="gradient-text">top-tier institutions</span></h2>
          <p class="payment-methods-subtitle" data-i18n="banking.subtitle">The TraderTok Group works with globally
            renowned banking partners including:</p>
        </div>

        <div class="payment-marquee">
          <div class="payment-marquee-track">
            <?php
            if ($companies) {
                foreach ($companies as $companie) {
                    echo '
                                        <div class="payment-method-item">
                        <img class="payment-method-logo bank-logo" src="' . $get->assets_url . '/' . $companie->image . '" alt="' . $companie->title . '" />
                    </div>   ';
                }
            }
            ?>

          </div>
        </div>

        <p class="banking-disclaimer" data-i18n="banking.disclaimer">* These banks are partnered with the TraderTok
          group and do not serve all entities within the group</p>
      </div>
    </section>
