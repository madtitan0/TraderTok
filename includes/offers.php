    <!-- Main Content -->
    <main class="offers-page">
        <!-- Hero Section -->
        <section class="offers-hero">
            <div class="container">
                <div class="offers-hero-content">
                    <h1 class="offers-title">
                        <span data-i18n="offersPage.heroTitle">Exclusive</span>
                        <span class="" data-i18n="offersPage.heroTitleHighlight">Offers & Promotions</span>
                    </h1>
                    <p class="offers-subtitle" data-i18n="offersPage.heroSubtitle">Discover region-specific promotions and exclusive trading opportunities tailored for traders in your area.</p>
                </div>
            </div>
        </section>

        <!-- Split Panel Layout -->
        <section class="offers-split">
            <div class="container">
                <!-- Mobile-only dropdown (hidden on desktop) -->
                <div class="offers-mobile-selector">
                    <label for="regionDropdown" class="region-dropdown-label" data-i18n="offersPage.selectRegion">Select Your Region</label>
                    <div class="region-dropdown-container">
                        <select id="regionDropdown" class="region-dropdown">
                            <option value="" disabled selected data-i18n="offersPage.selectRegionPlaceholder">— Select a Region —</option>
                            <option value="vietnam">Vietnam</option>
                            <option value="thailand">Thailand</option>
                            <option value="malaysia">Malaysia</option>
                            <option value="philippines">Philippines</option>
                            <option value="indonesia">Indonesia</option>
                            <option value="pakistan">Pakistan</option>
                            <option value="latam">Latin America</option>
                            <option value="namibia">Namibia</option>
                            <option value="kenya">Kenya</option>
                            <option value="ghana">Ghana</option>
                            <option value="nigeria">Nigeria</option>
                            <option value="south-africa">South Africa</option>
                            <option value="trinidad-tobago">Trinidad & Tobago</option>
                            <option value="guyana">Guyana</option>
                        </select>
                    </div>
                </div>

                <!-- Mobile horizontal strip (hidden on desktop) -->
                <div class="offers-country-strip" id="countryStrip"></div>

                <div class="offers-split-layout">
                    <!-- Left Sidebar -->
                    <aside class="offers-sidebar" id="offersSidebar" aria-label="Country selection">
                        <div class="offers-sidebar-header">
                            <h2 class="offers-sidebar-title" data-i18n="offersPage.selectRegion">Select Region</h2>
                        </div>
                        <nav class="offers-sidebar-list" id="sidebarCountryList" role="listbox" aria-label="Countries">
                            <!-- Dynamically populated by JS -->
                        </nav>
                    </aside>

                    <!-- Right Content -->
                    <div class="offers-content" id="offersContent">
                        <!-- Promotions Header -->
                        <div class="offers-content-header" id="promotionsHeader" style="display: none;">
                            <h2 class="promotions-region-title" id="promotionsRegionTitle"></h2>
                            <button class="promotions-clear-btn" id="clearRegion" data-i18n="offersPage.clearSelection">Clear Selection</button>
                        </div>

                        <!-- Promo Cards Grid -->
                        <div class="offers-content-grid" id="promotionsGrid" aria-live="polite">
                            <!-- Dynamically populated by JS -->
                        </div>

                        <!-- Empty State -->
                        <div class="offers-content-empty" id="promotionsEmpty">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--text-tertiary); margin-bottom: 16px;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 12l2 2 4-4"></path>
                            </svg>
                            <p>Select a country to view exclusive offers for your region.</p>
                        </div>

                        <!-- Integrated CTA (hidden until region selected) -->
                        <div class="offers-content-cta" id="offersContentCta">
                            <div class="offers-cta-inner">
                                <h2 class="offers-cta-title" data-i18n="offersPage.ctaTitle">Ready to Start Trading?</h2>
                                <p class="offers-cta-subtitle" data-i18n="offersPage.ctaSubtitle">Open your account today and take advantage of these exclusive offers.</p>
                                <a href="./contact-us" class="btn-offers-cta" data-i18n="offersPage.ctaButton">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <script>
        // Hero gradient text animation on scroll
        const offersHero = document.querySelector('.offers-hero');
        if (offersHero) {
            const heroObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const gradientText = entry.target.querySelector('.gradient-text');
                        if (gradientText) {
                            gradientText.classList.add('animate');
                        }
                        heroObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            heroObserver.observe(offersHero);
        }
    </script>