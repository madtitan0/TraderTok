    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <!-- Left side - Image -->
            <div class="hero-person">
                <img src="assets/images/hero-background.webp" alt="Professional trader reviewing market data on TraderTok platform" loading="eager">
                <div class="phone-chart">
                    <canvas id="candles"></canvas>
                </div>
            </div>

            <!-- Right side - Content -->
            <div class="hero-content">
                <h1 class="hero-title">Enter <span class="gradient-text">The Markets</span> With Confidence At<br><span class="gradient-text">TraderTok</span></h1>
                <div class="hero-buttons">
                    <a href="<?= $get->login_url ?>" class="btn-hero btn-primary-hero" style="text-decoration: none;">Get Started</a>
                    <a href="<?= $get->register_url ?>" class="btn-hero btn-secondary-hero" style="text-decoration: none;">Learn More</a>
                </div>
                <p class="hero-description">At TraderTok, we support you with free market analysis and a team of experienced professionals, so you're never navigating the markets alone. With a broad range of trading instruments and a strong community of investors, TraderTok is a trusted destination for those looking to take the next step in their financial journey.</p>
            </div>
        </div>
    </section>

    <!-- Promo Banner Section -->
    <section class="promo-banner" id="promo-banner">
        <div class="promo-banner-container">
            <div class="promo-card">
                <!-- Left - Content -->
                <div class="promo-content">
                    <h2 class="promo-title">
                        <span class="promo-title-highlight">200%</span>
                        Invest Now and receive up to 200% bonus
                    </h2>

                    <p class="promo-subtitle">
                        Contact your account manager to find out more
                    </p>

                    <!-- Countdown Timer -->
                    <div class="promo-countdown" id="promo-countdown">
                        <div class="countdown-item">
                            <span class="countdown-value" id="countdown-days">00</span>
                            <span class="countdown-label">Days</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-value" id="countdown-hours">00</span>
                            <span class="countdown-label">Hours</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-value" id="countdown-minutes">00</span>
                            <span class="countdown-label">Min</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-value" id="countdown-seconds">00</span>
                            <span class="countdown-label">Sec</span>
                        </div>
                    </div>

                    <div class="promo-expired" id="promo-expired">
                        This offer has expired. Stay tuned for new promotions!
                    </div>

                    <div class="promo-cta">
                        <!-- <button class="btn-promo" onclick="openAuthModal('register')">Get Started</button> -->
                        <a href="<?= $get->register_url ?>" class="btn-promo" style="text-decoration: none;">Get Started</a>
                        
                    </div>
                </div>

                <!-- Right - Arrow Animation -->
                <div class="promo-visual">
                    <svg id="growth-arrow" width="420" height="420" viewBox="0 0 420 420">
                        <defs>
                            <filter id="glow" x="-50%" y="-50%" width="200%" height="200%">
                                <feGaussianBlur stdDeviation="2" result="blur" />
                                <feMerge>
                                    <feMergeNode in="blur" />
                                    <feMergeNode in="SourceGraphic" />
                                </feMerge>
                            </filter>
                        </defs>
                        <g id="arrow-segments"></g>
                        <polygon id="arrow-head" points="0,-8 18,0 0,8" fill="#00FF7F" filter="url(#glow)" style="opacity: 0;" />
                    </svg>
                </div>
            </div>
        </div>
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
                    <h2 class="about-title">Your Trusted Partner in Financial Growth</h2>
                    <p class="about-subtitle gradient-text">At TraderTok, we're redefining what it means to trade in the global markets.</p>

                    <p class="about-description">Born from a passion for precision, technology, and opportunity, we've built a platform that empowers traders of all levels to take control of their financial future.</p>

                    <p class="about-description">We don't just provide access to the markets — we provide the clarity, confidence, and cutting-edge tools that make a real difference. Every second counts in trading, and that's why we've engineered an environment where speed meets stability, and innovation meets opportunity.</p>

                     <a href="<?= $get->register_url ?>" class="btn-about" style="text-decoration: none;">Learn More</a>
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
                        <div class="stat-label">Happy Clients</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number stat-247">
                            <span class="stat-24" data-target="24">0</span>
                            <span class="stat-slash">/</span>
                            <span class="stat-7" data-target="7">0</span>
                        </div>
                        <div class="stat-label">Support</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number" data-target="100">0</div>
                        <div class="stat-label">Secure</div>
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
                    <h2 class="traders-club-title">FREE</h2>
                    <p class="traders-club-description">
                        Join our <strong>Traders Club</strong> and get a free virtual card. Instant withdrawals, use worldwide with no fees and no limits.
                    </p>
                    <p class="traders-club-disclaimer">*Available for verified club members only</p>
                    <button class="btn-traders-club" id="openTradersClubModal">
                        Join Now
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
                <h3 class="modal-title">Join Traders Club</h3>
                <p class="modal-subtitle">Get your free virtual card today</p>
            </div>
            <form class="traders-club-form" id="tradersClubForm">
                <div class="form-group">
                    <label for="clubName">Name</label>
                    <input type="text" id="clubName" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="clubEmail">Email</label>
                    <input type="email" id="clubEmail" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="clubPhone">Phone</label>
                    <input type="tel" id="clubPhone" name="phone" placeholder="Enter your phone" required>
                </div>
                <button type="submit" class="btn-submit-club">
                    Get My Free Card
                </button>
            </form>
        </div>
    </div>

    <!-- Insights Section -->
    <section class="insights">
        <div class="insights-wrapper">
            <h2 class="insights-title">Get the latest analytics insights — straight from our team to you.</h2>
           
                <div class="insights-cards">
                     <?php foreach ($cards as $card) { ?>
                    <article class="insight-card">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <h3 class="card-title"><?= $card->title ?></h3>
                            <p class="card-description"><?= $card->content ?></p>
                        </div>
                    </article>
                        <?php } ?>
                    <!-- Card 1 - Financial Strategy -->
                    <!-- <article class="insight-card">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <h3 class="card-title">Financial<br>Strategy</h3>
                            <p class="card-description">Personalized trading strategies tailored to your unique financial goals and experience level.</p>
                        </div>
                    </article> -->

                    <!-- Card 2 - Free Trainings -->
                    <!-- <article class="insight-card">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <h3 class="card-title">Free<br>Trainings</h3>
                            <p class="card-description">Expert-led forex training from beginner to intermediate level, completely free with live support.</p>
                        </div>
                    </article> -->

                    <!-- Card 3 - Asset Management -->
                    <!-- <article class="insight-card">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <h3 class="card-title">Asset<br>Management</h3>
                            <p class="card-description">24/7 expert guidance to identify and manage the right assets for maximum profitability.</p>
                        </div>
                    </article> -->

                    <!-- Card 4 - Demo Account -->
                    <!-- <article class="insight-card">
                        <div class="card-overlay"></div>
                        <div class="card-content">
                            <h3 class="card-title">Demo<br>Account</h3>
                            <p class="card-description">Practice risk-free with $10,000 virtual money on real-time market data before going live.</p>
                        </div>
                    </article> -->
                </div>
            
        </div>
    </section>

    <!-- Trading Platforms Section -->
    <section class="platforms-section">
        <div class="container">
            <!-- Header -->
            <div class="platforms-header">
                <div class="platforms-eyebrow">Our Trading Platforms</div>
                <h2 class="platforms-title">Come Trade With Us</h2>
                <p class="platforms-subtitle">
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
                            <div class="platform-option__label">Web &amp; Desktop</div>
                            <div class="platform-option__header">
                                <div class="platform-option__title">
                                    TraderTok Desktop
                                </div>
                            </div>
                            <p class="platform-option__text">
                                Access our TraderTok Desktop application on your Mac or Windows PC and get full access to charts,
                                indicators and multi-screen workspace for professional trading.
                            </p>
                            <div class="platform-option__actions">
                                <a href="https://tradertok.com/download/win.zip" class="btn-platform btn-platform-primary" style=" text-decoration: none;">
                                    <svg class="btn-os-icon" viewBox="0 0 88 88" aria-hidden="true">
                                        <path fill="currentColor" d="M0 12.402l35.687-4.86.016 34.423-35.67.203zm35.67 33.529l.028 34.453L.028 75.48.026 45.7zm4.326-39.025L87.314 0v41.527l-47.318.376zm47.329 39.349l-.011 41.34-47.318-6.678-.066-34.739z"/>
                                    </svg>
                                    Windows
                                </a>
                                <a href="https://tradertok.com/download/mac.zip" class="btn-platform btn-platform-outline" style=" text-decoration: none;">
                                    <svg class="btn-os-icon" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill="currentColor" d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                                    </svg>
                                    Mac
                                </a>
                            </div>
                        </div>

                        <!-- Mobile Platform Option -->
                        <div class="platform-option platform-option--mobile" tabindex="0" role="button" aria-pressed="false">
                            <div class="platform-option__label">Mobile Platform</div>
                            <div class="platform-option__header">
                                <div class="platform-option__title">
                                    TraderTok Mobile
                                </div>
                            </div>
                            <p class="platform-option__text">
                                Access our mobile platform on iOS and Android and trade anywhere: open, manage
                                and close positions right from your phone in just a few taps.
                            </p>
                            <div class="platform-option__actions">
                                <a href="https://appzone.tradertok.com/" class="btn-platform btn-platform-outline auth-trigger" data-tab="signin" style=" text-decoration: none;">
                                    <svg class="btn-os-icon" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                    Sign In
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Device Visual -->
                <div class="platforms-visual">
                    <div class="device-wrapper">
                        <img src="assets/images/devices-mockup.png" alt="TraderTok desktop and mobile trading platform interface showing real-time charts" class="devices-img" loading="lazy" />

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
                <h2 class="instruments-home-title">Explore Our Trading Instruments</h2>
                <p class="instruments-home-subtitle gradient-text">At TraderTok, we offer an extensive range of trading instruments tailored to meet the needs of every kind of trader—whether you're just starting out or managing a sophisticated portfolio.</p>
                <p class="instruments-home-description">With access to global markets and deep liquidity, our platform empowers you to explore opportunities across a broad spectrum of asset classes, all in one place. We believe that choice is power, which is why we continuously expand our list of instruments to match the pace of the ever-evolving financial landscape.</p>
            </div>

            <!-- Instruments Accordion -->
            <div class="instruments-accordion-home">
                    <?php $advantId = 0;
                                                        foreach ($advantages as $advantage) {
                                                            $advantage_img = $advantage->image ?   $get->assets_url . '/' . $advantage->image : "wp-content/uploads/2019/02/banner-image-one.jpg"; ?>
                    <div class="accordion-item">
                        <button class="accordion-header">
                            <span class="accordion-title"><?= $advantage->title ?></span>
                            <span class="accordion-icon">+</span>
                        </button>
                        <div class="accordion-content">
                            <div class="accordion-body">
                                <?= $advantage->content ?>
                            </div>
                        </div>
                    </div>
                     <?php } ?>


                <!-- Forex -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Forex</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            The foreign exchange market is the most liquid market in the world, offering around-the-clock access and tight spreads. Our forex offerings cover all major pairs, minors, and a wide selection of exotics, providing opportunities for both day traders and long-term strategists. With low latency execution and high leverage options, our platform allows you to act quickly in a fast-moving market.
                        </div>
                    </div>
                </div> -->

                <!-- Commodities -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Commodities</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            Commodities like gold, oil, and silver offer traders a hedge against inflation and market volatility. These assets often behave independently of stocks and currencies, making them excellent tools for diversification. Our commodity instruments are traded with competitive pricing and fast execution, allowing you to tap into global supply and demand shifts with confidence.
                        </div>
                    </div>
                </div> -->

                <!-- Stocks -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Stocks</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            Trade shares of top-performing companies from leading global exchanges. Our stock instruments allow you to speculate on price movements without owning the underlying asset, giving you the flexibility to go long or short. Enjoy access to major sectors like tech, healthcare, energy, and more—empowering you to build strategies based on corporate performance and market momentum.
                        </div>
                    </div>
                </div> -->

                <!-- Indices -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Indices</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            Indices represent the performance of a group of stocks, making them a powerful way to gain broad market exposure. Whether you're trading the S&P 500, NASDAQ, FTSE, or other major indices, our platform provides efficient access with low latency and advanced charting tools. Indices are ideal for traders seeking to take positions on broader economic trends rather than individual companies.
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <!-- Why Choose TraderTok Section -->
    <section class="why-choose">
        <div class="container">
            <div class="why-choose-content">
                <h2 class="why-choose-title">Why Choose TraderTok</h2>
                <p class="why-choose-description gradient-text">We provide our investors with continuous improvement, new opportunities to explore financial markets and the opportunity to work with a recognized leader in the financial industry.</p>
            </div>

            <!-- Two Column Layout -->
            <div class="why-choose-grid">
                <!-- Left Column: Video -->
                <div class="why-choose-video">
                    <video autoplay loop muted playsinline class="trading-video" aria-label="Professional trader using TraderTok platform" preload="metadata" loading="lazy">
                        <source src="assets/images/why-choose-video1.mp4" type="video/mp4">
                        <track kind="captions" src="captions.vtt" srclang="en" label="English captions">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Right Column: Accordion FAQ -->
                <div class="why-choose-accordion">
                    <?php $questId=0;  foreach ($questions as $quest) {   ?>
                        <div class="accordion-item">
                            <button class="accordion-header">
                                <span class="accordion-title"><?= $quest->title ?></span>
                                <span class="accordion-icon">+</span>
                            </button>
                            <div class="accordion-content">
                                <div class="accordion-body">
                                    <?= $quest->content ?>
                                </div>
                            </div>
                        </div>
                    <?php $questId++; } ?>
                <!-- Item 1 -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Lightning-Fast Execution</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            Every millisecond counts in trading. Our advanced infrastructure ensures your orders are executed quickly, reliably, and with minimal slippage, so you never miss an opportunity.
                        </div>
                    </div>
                </div> -->

                <!-- Item 2 -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Cutting-Edge Platforms</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            Trade on TraderTool, our own intuitive platform. With advanced charts, powerful analytics, and customizable tools, you have everything you need to trade smarter.
                        </div>
                    </div>
                </div> -->

                <!-- Item 3 -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Global Markets, Local Insights</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            Access a wide range of financial instruments, from forex and commodities to indices and cryptocurrencies. Our global reach is complemented by expert market insights to help you make informed decisions.
                        </div>
                    </div>
                </div> -->

                <!-- Item 4 -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Competitive Pricing & Tight Spreads</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            We offer market-leading spreads, low fees, and transparent pricing — designed to give you the edge in every trade.
                        </div>
                    </div>
                </div> -->

                <!-- Item 5 -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Expert Support</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            Our dedicated support team is available whenever you need them. We combine industry knowledge with fast, friendly service, so you can focus on trading with confidence.
                        </div>
                    </div>
                </div> -->

                <!-- Item 6 -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Security & Trust</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            Your funds and data are safeguarded with industry-standard security protocols and robust account protection. Trade with confidence knowing that your investments are secure.
                        </div>
                    </div>
                </div> -->

                <!-- Item 7 -->
                <!-- <div class="accordion-item">
                    <button class="accordion-header">
                        <span class="accordion-title">Education & Resources</span>
                        <span class="accordion-icon">+</span>
                    </button>
                    <div class="accordion-content">
                        <div class="accordion-body">
                            Whether you're new to trading or a seasoned professional, our learning resources, webinars, and market insights help you sharpen your skills and grow as a trader.
                        </div>
                    </div>
                </div> -->
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
                        <strong>7.6% interest</strong> is Monthly. Receive monthly interest payment directly into your cash balance, with no obligation.
                    </p>
                    <p class="deposit-disclaimer">*Credit and other risks apply, please read the Terms and Conditions</p>
                    <button class="btn-deposit" id="openDepositModal">
                        Join Now
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
                <h3 class="modal-title">Open Deposit Account</h3>
                <p class="modal-subtitle">Fill in your details and our manager will contact you</p>
            </div>
            <form class="deposit-form" id="depositForm">
                <div class="form-group">
                    <label for="depositName">Name</label>
                    <input type="text" id="depositName" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="depositEmail">Email</label>
                    <input type="email" id="depositEmail" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="depositPhone">Phone</label>
                    <input type="tel" id="depositPhone" name="phone" placeholder="+1 (555) 000-0000" required>
                </div>
                <button type="submit" class="btn-submit-deposit">
                    <span class="btn-text">Submit Application</span>
                    <span class="btn-loading">
                        <svg class="spinner" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none" stroke-dasharray="31.4 31.4" stroke-linecap="round"/>
                        </svg>
                    </span>
                </button>
            </form>
            <p class="modal-disclaimer">By submitting, you agree to our Terms of Service and Privacy Policy</p>
        </div>
    </div>

    <!-- Telegram Section -->
    <section class="telegram-section">
        <div class="container">
            <div class="telegram-card">
                <div class="telegram-info">
                    <h2 class="telegram-title">Join Our <span class="gradient-text">Community</span></h2>
                    <p class="telegram-description">Get trading signals, market analysis, and connect with other traders</p>
                </div>
                <div class="telegram-person">
                    <img src="assets/images/Person holding phone happily.png" alt="Happy trader">
                </div>
                <a href="https://t.me/YOUR_CHANNEL" target="_blank" class="btn-telegram">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                        <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                    </svg>
                    Join Now
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
                <h2 class="contact-form-title">Are You Ready To Earn With TraderTok?</h2>
                <p class="contact-form-subtitle gradient-text">We will call you</p>
                <p class="contact-form-description">Step into the world's largest trading volume market in few minutes; easily and securely.</p>

                <!-- Contact Form -->
                <form class="contact-form" id="contactForm" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-input" placeholder="Enter your name" required aria-required="true">
                            <span class="form-error" id="name-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" id="surname" name="surname" class="form-input" placeholder="Enter your surname" required aria-required="true">
                            <span class="form-error" id="surname-error"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" id="phone" name="phone" class="form-input" placeholder="+44 7520 640 890" required aria-required="true" pattern="[+]?[0-9\s\-()]+">
                            <span class="form-error" id="phone-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="your@email.com" required aria-required="true">
                            <span class="form-error" id="email-error"></span>
                        </div>
                    </div>

                    <div class="form-group form-group-full">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-textarea" placeholder="Tell us about your trading goals..." rows="5" required aria-required="true"></textarea>
                        <span class="form-error" id="message-error"></span>
                    </div>

                    <div class="form-status" id="formStatus" role="alert" aria-live="polite"></div>

                    <button type="submit" class="btn-contact-submit" id="submitBtn">Contact Us</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Trustpilot Reviews Section -->
    <section class="trustpilot-section">
        <div class="container">
            <div class="trustpilot-header">
                <div class="trustpilot-logo">
                    <div class="trustpilot-brand">
                        <svg viewBox="0 0 24 24" width="32" height="32" class="trustpilot-star-icon">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" fill="#00B67A"/>
                        </svg>
                        <span class="trustpilot-name">Trustpilot</span>
                    </div>
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

            <div class="trustpilot-slider">
                <div class="trustpilot-track" id="trustpilotTrack">


                <?php
// Define an array of background colors
$backgroundColors = [ '#E63946', '#2196F3', '#7B68EE', '#FF6B35', '#00B67A'];

// Define an array of review titles
$reviewTitles = [
    'Professional trading environment',
    'Best account manager ever!',
    'There are many available trading assets.',
    'Excellent platform for beginners!',
    'Fast withdrawals and great support',
];

foreach ($comments as $comentKey => $coment) {
    // Get background color (cycles through the array)
    $bgColor = $backgroundColors[$comentKey % count($backgroundColors)];
    
    // Get review title (cycles through the array)
    $reviewTitle = $reviewTitles[$comentKey % count($reviewTitles)];
    
    // Get first letter of title for avatar
    $initial = !empty($coment->title) ? strtoupper(substr($coment->title, 0, 1)) : 'U';
?>
    <div class="trustpilot-card <?= $comentKey === 0 ? 'active' :  null ?> ">
        <div class="review-avatar" style="background: <?= $bgColor ?>;"><?= $initial ?></div>
        <p class="review-author"><?= $coment->title ?></p>
        <h3 class="review-title"><?= $reviewTitle ?></h3>
        <p class="review-text"><?= $coment->content ?></p>
        <div class="review-stars">★★★★★</div>
    </div>
<?php } ?>
                    <!-- Review 1 -->
                    <!-- <div class="trustpilot-card">
                        <div class="review-avatar" style="background: #7B68EE;">M</div>
                        <p class="review-author">Minh Chi</p>
                        <h3 class="review-title">There are many available trading assets.</h3>
                        <p class="review-text">There are many available trading assets. Especially when you consider the trading modes. Each of these trading modes has its own specific assets in addition to the other assets on the platform.</p>
                        <div class="review-stars">★★★★★</div>
                    </div> -->

                    <!-- Review 2 -->
                    <!-- <div class="trustpilot-card">
                        <div class="review-avatar" style="background: #FF6B35;">J</div>
                        <p class="review-author">James Wilson</p>
                        <h3 class="review-title">Excellent platform for beginners!</h3>
                        <p class="review-text">As a new trader, I found TraderTok incredibly easy to use. The educational resources and customer support helped me understand the markets quickly. Highly recommend!</p>
                        <div class="review-stars">★★★★★</div>
                    </div> -->

                    <!-- Review 3 -->
                    <!-- <div class="trustpilot-card">
                        <div class="review-avatar" style="background: #00B67A;">S</div>
                        <p class="review-author">Sarah Chen</p>
                        <h3 class="review-title">Fast withdrawals and great support</h3>
                        <p class="review-text">I've been trading with TraderTok for 6 months now. The withdrawals are processed within 24 hours and customer support is always responsive. Great experience overall!</p>
                        <div class="review-stars">★★★★★</div>
                    </div> -->

                    <!-- Review 4 -->
                    <!-- <div class="trustpilot-card">
                        <div class="review-avatar" style="background: #E63946;">A</div>
                        <p class="review-author">Alexander Müller</p>
                        <h3 class="review-title">Professional trading environment</h3>
                        <p class="review-text">The platform offers professional-grade tools with an intuitive interface. Spreads are competitive and execution is fast. Exactly what I was looking for.</p>
                        <div class="review-stars">★★★★★</div>
                    </div> -->

                    <!-- Review 5 -->
                    <!-- <div class="trustpilot-card">
                        <div class="review-avatar" style="background: #2196F3;">L</div>
                        <p class="review-author">Linda Thompson</p>
                        <h3 class="review-title">Best account manager ever!</h3>
                        <p class="review-text">My account manager has been incredibly helpful in guiding me through my trading journey. The personal attention and expertise made all the difference. Thank you TraderTok!</p>
                        <div class="review-stars">★★★★★</div>
                    </div> -->
                </div>

                <div class="trustpilot-nav">
                    <button class="trustpilot-btn prev" id="trustpilotPrev">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <div class="trustpilot-dots" id="trustpilotDots"></div>
                    <button class="trustpilot-btn next" id="trustpilotNext">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            <a href="https://www.trustpilot.com" target="_blank" class="trustpilot-link">
                More reviews on Trustpilot
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </a>
        </div>
    </section>

    <!-- Banking Partners Section -->
    <section class="payment-methods-section">
        <div class="payment-methods-content">
            <div class="payment-methods-header">
                <h2 class="payment-methods-title">Your funds are held in <span class="gradient-text">top-tier institutions</span></h2>
                <p class="payment-methods-subtitle">The TraderTok Group works with globally renowned banking partners including:</p>
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
                    <!-- First set -->
                    <!-- <div class="payment-method-item">
                        <img src="assets/images/banks_logo/ubs-logo.svg" alt="UBS" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/jpm-logo.svg" alt="JP Morgan" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/citi-logo.svg" alt="Citibank" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/db-logo.svg" alt="Deutsche Bank" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/coutts-logo.svg" alt="Coutts" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/pictet-logo.svg" alt="Pictet" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/jss-logo.svg" alt="Julius Baer" class="payment-method-logo bank-logo">
                    </div> -->

                    <!-- Duplicate set for seamless loop -->
                    <!-- <div class="payment-method-item">
                        <img src="assets/images/banks_logo/ubs-logo.svg" alt="UBS" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/jpm-logo.svg" alt="JP Morgan" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/citi-logo.svg" alt="Citibank" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/db-logo.svg" alt="Deutsche Bank" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/coutts-logo.svg" alt="Coutts" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/pictet-logo.svg" alt="Pictet" class="payment-method-logo bank-logo">
                    </div>

                    <div class="payment-method-item">
                        <img src="assets/images/banks_logo/jss-logo.svg" alt="Julius Baer" class="payment-method-logo bank-logo">
                    </div> -->
                </div>
            </div>

            <p class="banking-disclaimer">* These banks are partnered with the TraderTok group and do not serve all entities within the group</p>
        </div>
    </section>