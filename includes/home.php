    <!-- Hero Section -->
    <section class="hero gold-silver-banner">
      <div class="banner-left">
        <div class="banner-content">
          <p class="banner-subtitle" data-i18n-html="hero.subtitle">Precious Metals Investment</p>
          <h1 class="banner-title" data-i18n-html="hero.title">
            <span class="highlight-gold">Gold</span> & <span class="highlight-silver">Silver</span>: The Smart Money's
            Safe Haven
          </h1>
          <p class="banner-text" data-i18n-html="hero.description">
            When markets shake, precious metals stand strong. Discover why gold and silver are the go-to assets for
            preserving wealth and seizing buying opportunities right now. With limited supply and growing global demand,
            today's prices could be tomorrow's missed chance.
          </p>
          <a data-i18n="hero.getStarted" href="<?= $get->register_url ?>" class="btn-hero btn-primary-hero"
            onclick="openAuthModal('register')">Get
            Started</a>
        </div>
      </div>
      <div class="banner-right">
        <img src="assets/images/gold-silver-bar-transparent-background.png" alt="Gold and Silver"
          class="banner-bg-image">
      </div>
    </section>

    <!-- Earnings Reports Promo Popup -->
    <div class="earnings-popup" id="earnings-popup">
      <div class="earnings-popup-overlay"></div>
      <div class="earnings-popup-content">
        <button class="earnings-popup-close" id="earnings-popup-close" aria-label="Close">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 6L6 18M6 6l12 12" />
          </svg>
        </button>

        <!-- Animated Logo Background -->
        <div class="earnings-logos-bg">
          <div class="earnings-logo earnings-logo-nvidia">
            <img src="assets/images/Nvidia_logo.svg.png" alt="NVIDIA">
          </div>
          <div class="earnings-logo earnings-logo-apple">
            <img src="assets/images/Apple_logo_black.svg" alt="Apple">
          </div>
          <div class="earnings-logo earnings-logo-amazon">
            <img src="assets/images/pngimg.com - amazon_PNG27.png" alt="Amazon">
          </div>
        </div>

        <!-- Content -->
        <!-- <div class="earnings-popup-header">
          <span class="earnings-badge-text" data-i18n="earningsPopup.badge">Limited Time Offer</span>
          <h2 class="earnings-popup-title" data-i18n="earningsPopup.title">
            Earnings Reports & Premarket Opportunities
          </h2>
          <p class="earnings-popup-period" data-i18n="earningsPopup.period">
            January & February 2026
          </p>

          Countdown Timer
          <div class="earnings-countdown" id="earnings-countdown">
            <div class="earnings-countdown-item">
              <span class="earnings-countdown-value" id="earnings-days">00</span>
              <span class="earnings-countdown-label" data-i18n="earningsPopup.days">Days</span>
            </div>
            <div class="earnings-countdown-item">
              <span class="earnings-countdown-value" id="earnings-hours">00</span>
              <span class="earnings-countdown-label" data-i18n="earningsPopup.hours">Hours</span>
            </div>
            <div class="earnings-countdown-item">
              <span class="earnings-countdown-value" id="earnings-minutes">00</span>
              <span class="earnings-countdown-label" data-i18n="earningsPopup.minutes">Min</span>
            </div>
            <div class="earnings-countdown-item">
              <span class="earnings-countdown-value" id="earnings-seconds">00</span>
              <span class="earnings-countdown-label" data-i18n="earningsPopup.seconds">Sec</span>
            </div>
          </div>
        </div> -->

        <!-- Company Logos Showcase
        <div class="earnings-companies">
          <div class="earnings-company" data-company="nvidia">
            <div class="company-icon">
              <img src="assets/images/Nvidia_logo.svg.png" alt="NVIDIA">
            </div>
            <span class="company-name">NVIDIA</span>
            <span class="company-ticker">NVDA</span>
          </div>
          <div class="earnings-company" data-company="apple">
            <div class="company-icon">
              <img src="assets/images/Apple_logo_black.svg" alt="Apple">
            </div>
            <span class="company-name">Apple</span>
            <span class="company-ticker">AAPL</span>
          </div>
          <div class="earnings-company" data-company="amazon">
            <div class="company-icon">
              <img src="assets/images/pngimg.com - amazon_PNG27.png" alt="Amazon">
            </div>
            <span class="company-name">Amazon</span>
            <span class="company-ticker">AMZN</span>
          </div>
        </div> -->

        <p class="earnings-popup-description" data-i18n="earningsPopup.description">
          Register your interest now and get exclusive promotions with guaranteed returns
        </p>

        <button class="btn-earnings-register" onclick="openAuthSidebar('signin')" data-i18n="earningsPopup.cta">
          Register Interest Now
        </button>

        <p class="earnings-popup-disclaimer" data-i18n="earningsPopup.disclaimer">
          *Terms and conditions apply. Capital at risk.
        </p>
      </div>
    </div>
    
    <!-- Promo Image Popup (trader.jpg) -->
    <div class="trader-popup" id="trader-popup">
      <div class="trader-popup-overlay"></div>
      <div class="trader-popup-content">
        <button class="trader-popup-close" id="trader-popup-close" aria-label="Close">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M18 6L6 18M6 6l12 12" />
          </svg>
        </button>
        <div class="trader-popup-image-container">
          <img src="assets/images/trader.jpg" alt="Promo Offer" class="trader-popup-img">
          <!-- <button class="btn-trader-claim" onclick="openAuthSidebar('signin')">Claim Offer</button> -->
        </div>
      </div>
    </div>

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

            <a href="<?= $get->register_url ?>" class="btn-about" data-i18n="hero.learnMore"
              style="text-decoration: none;">Learn More</a>
          </div>

          <!-- <?php
if ($get->home_image_about_us && $get->home_about_us) {
    echo '
                // <div class="about-text">
                //     <h2 class="about-title">Your Trusted Partner in Financial Growth</h2>
                //     <p class="about-subtitle gradient-text">At TraderTok, we&apos;re redefining what it means to trade in the global markets.</p>

                //     <p class="about-description">' . $get->home_about_us . '</p>


                //     <a href="<?= $get->register_url ?>" class="btn-about" style="text-decoration: none;">Learn More</a>
                // </div>';
                }
?> -->

          <div class="about-stats">
            <div class="stat-card">
              <div class="stat-number" data-target="500">0</div>
              <div class="stat-label" data-i18n="about.happyClients">Happy Clients</div>
            </div>
            <div class="stat-card">
              <div class="stat-number stat-247">
                <span class="stat-24" data-target="24">0</span>
                <span class="stat-slash">/</span>
                <span class="stat-7" data-target="7">0</span>
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
            <img src="assets/images/card-tradertok.png" alt="TraderTok Free Card">
          </div>
        </div>
      </div>
    </section>

    <!-- Traders Club Modal -->
    <div class="traders-club-modal" id="tradersClubModal">
      <div class="traders-club-modal-overlay"></div>
      <div class="traders-club-modal-content">
        <button class="modal-close" id="closeTradersClubModal">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
        <div class="modal-header">
          <h3 class="modal-title" data-i18n="tradersClub.modalTitle">Join Traders Club</h3>
          <p class="modal-subtitle" data-i18n="tradersClub.modalSubtitle">Get your free virtual card today</p>
        </div>
        <form class="traders-club-form" id="tradersClubForm">
          <div class="form-group">
            <label for="clubName" data-i18n="tradersClub.name">Name</label>
            <input type="text" id="clubName" name="name" data-i18n-placeholder="tradersClub.namePlaceholder"
              placeholder="Enter your name" required>
          </div>
          <div class="form-group">
            <label for="clubEmail" data-i18n="tradersClub.email">Email</label>
            <input type="email" id="clubEmail" name="email" data-i18n-placeholder="tradersClub.emailPlaceholder"
              placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label for="clubPhone" data-i18n="tradersClub.phone">Phone</label>
            <input type="tel" id="clubPhone" name="phone" data-i18n-placeholder="tradersClub.phonePlaceholder"
              placeholder="Enter your phone" required>
          </div>
          <button type="submit" class="btn-submit-club" data-i18n="tradersClub.getMyFreeCard">
            Get My Free Card
          </button>
        </form>
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
              <h3 class="card-title" <?= $i18nSuffix ? 'data-i18n-html="insights.' . $i18nSuffix . '"' : '' ?>>
                <?= $card->title ?></h3>
              <p class="card-description" <?= $i18nSuffix ? 'data-i18n="insights.' . $i18nSuffix . 'Desc"' : '' ?>>
                <?= $card->content ?></p>
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
          <div class="platforms-eyebrow" data-i18n="platforms.eyebrow">Our Trading Platforms</div>
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
                <?= $i18nSuffix ? 'data-i18n="instruments.' . $i18nSuffix . '"' : '' ?>><?= $advantage->title ?></span>
              <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content">
              <div class="accordion-body" <?= $i18nSuffix ? 'data-i18n="instruments.' . $i18nSuffix . 'Desc"' : '' ?>>
                <?= $advantage->content ?>
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
                  <?= $i18nKey ? 'data-i18n="' . $i18nKey . '"' : '' ?>><?= $quest->title ?></span>
                <span class="accordion-icon">+</span>
              </button>
              <div class="accordion-content">
                <div class="accordion-body" <?= $i18nKey ? 'data-i18n="' . $i18nKey . 'Desc"' : '' ?>>
                  <?= $quest->content ?>
                </div>
              </div>
            </div>
            <?php $questId++; } ?>

          </div>
        </div>
      </div>
    </section>

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
            <img src="assets/images/7.6.png" alt="7.6% Annual Deposit Rate">
          </div>
        </div>
      </div>
    </section>

    <!-- Deposit Modal -->
    <div class="deposit-modal" id="depositModal">
      <div class="deposit-modal-overlay"></div>
      <div class="deposit-modal-content">
        <button class="modal-close" id="closeDepositModal">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
        <div class="modal-header">
          <h3 class="modal-title" data-i18n="deposit.modalTitle">Open Deposit Account</h3>
          <p class="modal-subtitle" data-i18n="deposit.modalSubtitle">Fill in your details and our manager will contact
            you</p>
        </div>
        <form class="deposit-form" id="depositForm">
          <div class="form-group">
            <label for="depositName" data-i18n="deposit.name">Name</label>
            <input type="text" id="depositName" name="name" placeholder="Enter your name"
              data-i18n-placeholder="deposit.namePlaceholder" required>
          </div>
          <div class="form-group">
            <label for="depositEmail" data-i18n="deposit.email">Email</label>
            <input type="email" id="depositEmail" name="email" placeholder="Enter your email"
              data-i18n-placeholder="deposit.emailPlaceholder" required>
          </div>
          <div class="form-group">
            <label for="depositPhone" data-i18n="deposit.phone">Phone</label>
            <input type="tel" id="depositPhone" name="phone" placeholder="+1 (555) 000-0000"
              data-i18n-placeholder="deposit.phonePlaceholder" required>
          </div>
          <button type="submit" class="btn-submit-deposit">
            <span class="btn-text" data-i18n="deposit.submitApplication">Submit Application</span>
            <span class="btn-loading">
              <svg class="spinner" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none"
                  stroke-dasharray="31.4 31.4" stroke-linecap="round" />
              </svg>
            </span>
          </button>
        </form>
        <p class="modal-disclaimer" data-i18n="deposit.modalDisclaimer">By submitting, you agree to our Terms of Service
          and Privacy Policy</p>
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
            <img src="assets/images/Person holding phone happily.png" alt="Happy trader">
          </div>
          <a href="https://t.me/YOUR_CHANNEL" target="_blank" class="btn-telegram">
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
    <!-- <section class="trustpilot-section">
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
              <span class="trustpilot-score">4.8 out of 5</span>
            </div>
          </div>
        </div>


        <a href="https://www.trustpilot.com" target="_blank" class="trustpilot-link">
          <span data-i18n="trustpilot.moreReviews">More reviews on Trustpilot</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </a>
      </div>
    </section> -->

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
