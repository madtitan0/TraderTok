<?php $mt5PlatformLinks = require __DIR__ . '/config/mt5-platform-links.php'; ?>

    <!-- Hero -->
    <section class="trading-platforms-hero">
        <div class="container">
            <div class="trading-platforms-hero__inner">
                <h2 class="trading-platform-hero-title trading-platforms-hero__title">
                    <span data-i18n="tradingPlatformsPage.heroTitle">Trade</span> <span id="typewriter" class="trading-platforms-hero__typewriter"></span>
                </h2>
                <p class="trading-platforms-hero__subtitle" data-i18n="tradingPlatformsPage.heroSubtitle">
                    At TraderTok, we believe technology should empower, not complicate. That's why we built platforms that give you full control of your trading experience, whether you're at your desk or on the move.
                </p>
                <div class="trading-platforms-hero__actions">
                    <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="btn-primary" style="text-decoration:none;">
                        Open Live Account
                    </a>
                    <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="btn-secondary" style="text-decoration:none;">
                        Open Demo Account
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- TraderTok app downloads (original) -->
    <section class="trading-platforms-block" aria-labelledby="trading-platforms-tradertok-heading">
        <div class="container">
            <header class="trading-platforms-block__header">
                <h2 id="trading-platforms-tradertok-heading" class="trading-platforms-block__title" data-i18n="tradingPlatformsPage.traderTokSectionTitle">TraderTok App</h2>
            </header>

            <div class="trading-platforms-block__grid">
                <div class="trading-platform-card" style="background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 24px; padding: 48px; position: relative; overflow: hidden; height: 600px;">
                    <div style="position: relative; z-index: 2;">
                        <h3 class="trading-platform-card__title" data-i18n="tradingPlatformsPage.mobilePlatform">Mobile Platform</h3>
                        <div class="trading-platform-card__platforms">
                            <div class="trading-platform-card__platform-row">
                                <svg width="80" height="80" viewBox="0 0 80 80" aria-hidden="true" class="platform-icon">
                                    <rect x="12" y="12" width="56" height="56" rx="14" ry="14" fill="none" stroke="currentColor" stroke-width="3"/>
                                    <text x="40" y="48" text-anchor="middle" font-size="28" font-weight="600" fill="currentColor">iOS</text>
                                </svg>
                                <a href="https://apps.apple.com/tr/app/tradertok/id6759670314" class="btn-platform btn-platform-primary" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">
                                    <span data-i18n="tradingPlatformsPage.downloadForIos">Download for iOS</span>
                                </a>
                            </div>
                            <div class="trading-platform-card__platform-row">
                                <svg width="80" height="80" viewBox="0 0 80 80" aria-hidden="true" class="platform-icon">
                                    <g transform="scale(3.33)">
                                        <path fill="currentColor" d="M6 18c0 .55.45 1 1 1h1v3.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V19h2v3.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V19h1c.55 0 1-.45 1-1V8H6v10zM3.5 8C2.67 8 2 8.67 2 9.5v7c0 .83.67 1.5 1.5 1.5S5 17.33 5 16.5v-7C5 8.67 4.33 8 3.5 8zm17 0c-.83 0-1.5.67-1.5 1.5v7c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5v-7c0-.83-.67-1.5-1.5-1.5zm-4.97-5.84l1.3-1.3c.2-.2.2-.51 0-.71-.2-.2-.51-.2-.71 0l-1.48 1.48C13.85 1.23 12.95 1 12 1c-.96 0-1.86.23-2.66.63L7.85.15c-.2-.2-.51-.2-.71 0-.2.2-.2.51 0 .71l1.31 1.31C6.97 3.26 6 5.01 6 7h12c0-1.99-.97-3.75-2.47-4.84zM10 5H9V4h1v1zm5 0h-1V4h1v1z"/>
                                    </g>
                                </svg>
                                <a href="https://play.google.com/store/apps/details?id=com.tradertok.app" class="btn-platform btn-platform-outline" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">
                                    <span data-i18n="tradingPlatformsPage.downloadForAndroid">Download for Android</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="trading-platform-card__device" aria-hidden="true">
                        <img src="assets/images/Iphone - platforms2.png" alt="" style="max-width: 100%; height: auto; max-height: 550px; object-fit: contain;">
                    </div>
                </div>

                <div class="trading-platform-card desktop-platform-card" style="background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 24px; padding: 48px; position: relative; overflow: hidden; height: 600px;">
                    <div style="position: relative; z-index: 2;">
                        <h3 class="trading-platform-card__title" data-i18n="tradingPlatformsPage.webDesktop">Web &amp; Desktop</h3>
                        <div class="trading-platform-card__platforms">
                            <div class="trading-platform-card__platform-row">
                                <svg width="80" height="80" viewBox="0 0 80 80" aria-hidden="true" class="platform-icon">
                                    <g transform="scale(0.75) translate(13, 13)">
                                        <path fill="currentColor" d="M0 12.402l35.687-4.86.016 34.423-35.67.203zm35.67 33.529l.028 34.453L.028 75.48.026 45.7zm4.326-39.025L87.314 0v41.527l-47.318.376zm47.329 39.349l-.011 41.34-47.318-6.678-.066-34.739z"/>
                                    </g>
                                </svg>
                                <a href="https://tradertok.com/download/win.zip" class="btn-platform btn-platform-primary" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">
                                    <span data-i18n="tradingPlatformsPage.downloadForWindows">Download for Windows</span>
                                </a>
                            </div>
                            <div class="trading-platform-card__platform-row">
                                <svg width="80" height="80" viewBox="0 0 80 80" aria-hidden="true" class="platform-icon">
                                    <g transform="scale(3.33)">
                                        <path fill="currentColor" d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                                    </g>
                                </svg>
                                <a href="https://tradertok.com/download/mac.zip" class="btn-platform btn-platform-outline" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">
                                    <span data-i18n="tradingPlatformsPage.downloadForMac">Download for Mac</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="trading-platform-card__device trading-platform-card__device--desktop" aria-hidden="true">
                        <img src="assets/images/laptop_platforms.png" alt="" style="max-width: 100%; height: auto; max-height: 550px; object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MetaTrader 5 downloads -->
    <section class="trading-platforms-block trading-platforms-block--mt5" aria-labelledby="trading-platforms-mt5-heading">
        <div class="container">
            <header class="trading-platforms-block__header">
                <img src="assets/images/mt5.png" alt="" class="trading-platforms-block__mt5-logo" width="48" height="48">
                <h2 id="trading-platforms-mt5-heading" class="trading-platforms-block__title" data-i18n="tradingPlatformsPage.mt5SectionTitle">MetaTrader 5</h2>
                <p class="trading-platforms-block__subtitle" data-i18n="tradingPlatformsPage.mt5SectionSubtitle">Download MT5 for desktop and mobile, or trade instantly in your browser.</p>
            </header>

            <div class="trading-platforms-block__grid">
                <div class="trading-platform-card" style="background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 24px; padding: 48px; position: relative; overflow: hidden; height: 600px;">
                    <div style="position: relative; z-index: 2;">
                        <h3 class="trading-platform-card__title" data-i18n="tradingPlatformsPage.mobilePlatform">Mobile Platform</h3>
                        <div class="trading-platform-card__platforms">
                            <div class="trading-platform-card__platform-row">
                                <img src="assets/images/mt5.png" alt="" width="80" height="80" class="platform-icon trading-platform-card__mt5-icon trading-platform-card__mt5-icon--lg">
                                <a href="<?php echo htmlspecialchars($mt5PlatformLinks['mobile_ios'], ENT_QUOTES, 'UTF-8'); ?>" class="btn-platform btn-platform-primary" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">
                                    <span data-i18n="tradingPlatformsPage.downloadMt5ForIos">Download MT5 for iOS</span>
                                </a>
                            </div>
                            <div class="trading-platform-card__platform-row">
                                <img src="assets/images/mt5.png" alt="" width="80" height="80" class="platform-icon trading-platform-card__mt5-icon trading-platform-card__mt5-icon--lg">
                                <a href="<?php echo htmlspecialchars($mt5PlatformLinks['mobile_android'], ENT_QUOTES, 'UTF-8'); ?>" class="btn-platform btn-platform-outline" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">
                                    <span data-i18n="tradingPlatformsPage.downloadMt5ForAndroid">Download MT5 for Android</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="trading-platform-card__device" aria-hidden="true">
                        <img src="assets/images/Iphone - platforms2.png" alt="" style="max-width: 100%; height: auto; max-height: 550px; object-fit: contain;">
                    </div>
                </div>

                <div class="trading-platform-card desktop-platform-card" style="background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 24px; padding: 48px; position: relative; overflow: hidden; height: 600px;">
                    <div style="position: relative; z-index: 2;">
                        <h3 class="trading-platform-card__title" data-i18n="tradingPlatformsPage.webDesktop">Web &amp; Desktop</h3>
                        <div class="trading-platform-card__platforms">
                            <div class="trading-platform-card__platform-row">
                                <img src="assets/images/mt5.png" alt="" width="80" height="80" class="platform-icon trading-platform-card__mt5-icon trading-platform-card__mt5-icon--lg">
                                <a href="<?php echo htmlspecialchars($mt5PlatformLinks['desktop_windows'], ENT_QUOTES, 'UTF-8'); ?>" class="btn-platform btn-platform-primary" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">
                                    <span data-i18n="tradingPlatformsPage.downloadMt5ForWindows">Download MT5 for Windows</span>
                                </a>
                            </div>
                            <div class="trading-platform-card__platform-row">
                                <img src="assets/images/mt5.png" alt="" width="80" height="80" class="platform-icon trading-platform-card__mt5-icon trading-platform-card__mt5-icon--lg">
                                <a href="<?php echo htmlspecialchars($mt5PlatformLinks['web_trader'], ENT_QUOTES, 'UTF-8'); ?>" class="btn-platform btn-platform-outline" style="text-decoration: none;" target="_blank" rel="noopener noreferrer">
                                    <span data-i18n="footer.platformWebTrader">Web Trader</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="trading-platform-card__device trading-platform-card__device--desktop" aria-hidden="true">
                        <img src="assets/images/laptop_platforms.png" alt="" style="max-width: 100%; height: auto; max-height: 550px; object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding: 0 0 90px; background: var(--bg-primary);">
        <div class="container" style="max-width: 1100px;">
            <div style="border: 1px solid var(--border-color); background: var(--bg-secondary); border-radius: 20px; padding: 28px; text-align: center;">
                <h2 style="margin: 0 0 10px; color: var(--text-primary); font-size: clamp(1.7rem, 3vw, 2.2rem);">Plan before you place trades</h2>
                <p style="margin: 0 auto 18px; max-width: 780px; color: var(--text-secondary); line-height: 1.7;">Use our Trading Calculators to estimate pip value, profit/loss, margin requirements, and position size before execution.</p>
                <a href="<?php echo htmlspecialchars(routeUrl('trading-calculators')); ?>" class="btn-primary" style="display: inline-flex; align-items: center; justify-content: center; min-height: 46px; padding: 0 22px; text-decoration: none;">
                    Trading Calculators
                </a>
            </div>
        </div>
    </section>

    <!-- Typewriter Animation Script -->
    <script>
        (function() {
            // Default words (English)
            let words = ['Smarter', 'Faster', 'Your Way'];
            let wordIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            const typewriterElement = document.getElementById('typewriter');
            const typingSpeed = 150;
            const deletingSpeed = 100;
            const delayBetweenWords = 2000;

            // Get translated words from i18n
            function getTranslatedWords() {
                if (window.i18n && window.i18n.t) {
                    const translatedWords = window.i18n.t('tradingPlatformsPage.typewriterWords');
                    if (Array.isArray(translatedWords)) {
                        words = translatedWords;
                    }
                }
            }

            // Listen for language changes
            window.addEventListener('languageChanged', function() {
                getTranslatedWords();
            });

            // Initial load
            setTimeout(getTranslatedWords, 100);

            function type() {
                const currentWord = words[wordIndex];

                if (isDeleting) {
                    typewriterElement.textContent = currentWord.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typewriterElement.textContent = currentWord.substring(0, charIndex + 1);
                    charIndex++;
                }

                let timeout = isDeleting ? deletingSpeed : typingSpeed;

                if (!isDeleting && charIndex === currentWord.length) {
                    timeout = delayBetweenWords;
                    isDeleting = true;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    wordIndex = (wordIndex + 1) % words.length;
                }

                setTimeout(type, timeout);
            }

            type();
        })();

    </script>