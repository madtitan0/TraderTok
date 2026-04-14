    <style>
/* Account Types Page - Clean Cards Design */
.account-types-page {
  padding-top: 150px;
  min-height: 60vh;
}

.account-types-hero {
  padding: 0;
  text-align: center;
}

.account-types-hero .container {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: 40px;
  align-items: center;
}

/* Full-width centered hero when image column is absent */
.account-types-hero .container > .account-types-text:only-child {
  grid-column: 1 / -1;
  max-width: 720px;
  justify-self: center;
}

.account-types-text {
  text-align: center;
}

.account-types-image {
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
  margin-bottom: 0;
  position: relative;
  z-index: 2;
}

.account-types-image img {
  max-width: 100%;
  height: auto;
  max-height: 480px;
  object-fit: contain;
}

.account-types-title {
  font-size: clamp(2.2rem, 4vw, 3.5rem);
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 20px;
  color: var(--brand-color-end);
  text-align: center;
  letter-spacing: -0.02em;
}

.account-types-title .gradient-text {
  background: linear-gradient(90deg,
      #d02c2d 0%,
      #d02c2d 25%,
      #ffffff 50%,
      #ffffff 100%);
  background-size: 250% 100%;
  background-position: 100% 0;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  color: transparent;
  animation: accountTypeGradientFill 1.8s ease-out forwards;
  animation-play-state: paused;
}

.account-types-title .gradient-text.animate {
  animation-play-state: running;
}

@keyframes accountTypeGradientFill {
  0% {
    background-position: 100% 0;
  }

  100% {
    background-position: 0% 0;
  }
}

.account-types-subtitle {
  font-size: 1rem;
  line-height: 1.7;
  color: var(--text-secondary);
  text-align: center;
  max-width: 520px;
  margin: 0 auto;
  padding-bottom: 50px;
}

/* Cards Grid */
.account-types-content {
  padding: 0 0 80px;
}

.accounts-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 14px;
  align-items: stretch;
}

/* Card Base */
.account-card {
  background: var(--bg-secondary);
  border-radius: 16px;
  padding: 24px 20px;
  display: flex;
  flex-direction: column;
  position: relative;
  border: 1px solid var(--border-color);
  transition: all 0.3s ease;
}

.account-card:hover {
  border-color: rgba(230, 57, 70, 0.3);
  background: var(--bg-tertiary);
}

/* Color Accents per Tier - only for price */
.account-card.tier-1 {
  --price-color: #4ADE80;
}

.account-card.tier-2 {
  --price-color: #A78BFA;
}

.account-card.tier-3 {
  --price-color: #60A5FA;
}

.account-card.tier-4 {
  --price-color: #F472B6;
}

.account-card.tier-5 {
  --price-color: #D4AF37;
}

/* Header */
.account-header {
  text-align: center;
  margin-bottom: 0;
}

.account-name {
  font-size: 0.8rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: var(--text-primary);
  margin-top: 6px;
}

.account-price {
  font-size: 2rem;
  font-weight: 400;
  color: var(--price-color);
  letter-spacing: -0.02em;
  line-height: 1.1;
}

/* Popular Badge */
.popular-badge {
  position: absolute;
  top: -10px;
  left: 50%;
  transform: translateX(-50%);
  background: var(--bg-tertiary);
  color: var(--text-primary);
  font-size: 0.6rem;
  font-weight: 600;
  padding: 5px 12px;
  border-radius: 20px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  white-space: nowrap;
  border: 1px solid var(--border-color);
}

/* Dotted Divider */
.account-divider {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 16px 0;
}

.account-divider::before {
  content: '• • • • • • •';
  font-size: 5px;
  color: var(--text-secondary);
  opacity: 0.4;
  letter-spacing: 3px;
}

/* Features */
.account-features {
  display: flex;
  flex-direction: column;
  gap: 8px;
  margin-bottom: 0;
  flex: 1;
}

.feature-item {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 10px;
  font-size: 0.75rem;
  color: var(--text-secondary);
  line-height: 1.4;
}

.feature-item span:first-child {
  flex: 1;
}

.feature-icon {
  flex-shrink: 0;
  width: 16px;
  height: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.feature-icon svg {
  width: 14px;
  height: 14px;
  stroke-width: 2.5;
}

.feature-icon.check svg {
  stroke: #22D3EE;
}

/* Note */
.account-note {
  font-size: 0.7rem;
  color: var(--text-secondary);
  line-height: 1.5;
  padding: 10px 12px;
  background: var(--bg-tertiary);
  border-radius: 8px;
  margin-top: 12px;
  font-style: italic;
}

/* Bottom Divider */
.account-divider-bottom {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: auto;
  padding-top: 16px;
  margin-bottom: 14px;
}

.account-divider-bottom::before {
  content: '• • • • • • •';
  font-size: 5px;
  color: var(--text-secondary);
  opacity: 0.4;
  letter-spacing: 3px;
}

/* Button */
.account-btn {
  display: block;
  width: 100%;
  padding: 0;
  background: transparent;
  border: none;
  color: var(--price-color);
  font-size: 0.8rem;
  font-weight: 600;
  cursor: pointer;
  transition: opacity 0.3s ease;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 1.5px;
}

.account-btn:hover {
  opacity: 0.7;
}

/* Responsive */
@media (max-width: 1400px) {
  .accounts-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 1000px) {
  .accounts-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 1000px) {
  .account-types-hero .container {
    grid-template-columns: 1fr;
    gap: 20px;
  }

  .account-types-text {
    text-align: center;
    padding-bottom: 20px;
  }

  .account-types-title {
    text-align: center;
  }

  .account-types-subtitle {
    text-align: center;
    margin: 0 auto;
  }

  .account-types-image {
    order: -1;
    justify-content: center;
    margin-bottom: 0;
  }

  .account-types-image img {
    max-height: 250px;
  }
}

@media (max-width: 650px) {
  .accounts-grid {
    grid-template-columns: 1fr;
    max-width: 360px;
    margin: 0 auto;
  }

  .account-card {
    padding: 22px 18px;
  }

  .account-types-hero {
    padding: 60px 0 30px;
  }

  .account-types-image img {
    max-height: 200px;
  }
}
    </style>

    <!-- Main Content -->
    <main class="account-types-page" style="background: var(--bg-primary);">
      <section class="account-types-hero">
        <div class="container">
          <div class="account-types-text">
            <h1 class="account-types-title"><span data-i18n="accountTypesPage.heroTitle">Choose Your</span> <span
                class="" data-i18n="accountTypesPage.heroTitleHighlight">Account Type</span></h1>
            <p class="account-types-subtitle" data-i18n="accountTypesPage.heroSubtitle">No matter your trading goals,
              TraderTok offers an account tailored to suit them perfectly. Explore and compare our five account options
              to find the one that best aligns with your needs.</p>
          </div>
          <!-- <div class="account-types-image">
            <img src="assets/images/portrait-young-woman-standing-against-blue-background.png" alt="TraderTok Trader">
          </div> -->
        </div>
      </section>

      <section class="account-types-content">
        <div class="container">
          <div class="accounts-grid">
            <!-- Standard Account -->
            <div class="account-card tier-1">
              <div class="account-header">
                <div class="account-price" data-target="10000">$0</div>
                <div class="account-name" data-i18n="accountTypesPage.standard.name">Standard</div>
              </div>
              <div class="account-divider"></div>
              <div class="account-features">
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.standard.feature1">Basic access to the trading platform</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.standard.feature2">Standard customer support</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.standard.feature3">Standard market analysis tools</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.standard.feature4">Access to educational resources</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.standard.feature5">Regular market updates</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.standard.feature6">Account Manager</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
              </div>
              <div class="account-divider-bottom"></div>
              <a href="http://client.tradertok.com/#/auth/register" class="account-btn" data-i18n="accountTypesPage.getStarted">Get Started</a>
            </div>

            <!-- Advanced Account -->
            <div class="account-card tier-2">
              <div class="account-header">
                <div class="account-price" data-target="25000">$0</div>
                <div class="account-name" data-i18n="accountTypesPage.advanced.name">Advanced</div>
              </div>
              <div class="account-divider"></div>
              <div class="account-features">
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.advanced.feature1">All Standard Account benefits</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.advanced.feature2">Lower transaction costs</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.advanced.feature3">Advanced charting tools</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.advanced.feature4">Priority customer support</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.advanced.feature5">Daily market insights and research reports</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.advanced.feature6">Account Manager</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
              </div>
              <div class="account-note" data-i18n="accountTypesPage.advanced.note">Potential for Increased Revenue:
                Enjoy reduced transaction costs, allowing you to retain a higher percentage of your profits</div>
              <div class="account-divider-bottom"></div>
              <a href="http://client.tradertok.com/#/auth/register" class="account-btn" data-i18n="accountTypesPage.getStarted">Get Started</a>
            </div>

            <!-- Professional Account (Most Popular) -->
            <div class="account-card popular tier-3">
              <span class="popular-badge" data-i18n="accountTypesPage.mostPopular">Most Popular</span>
              <div class="account-header">
                <div class="account-price" data-target="100000">$0</div>
                <div class="account-name" data-i18n="accountTypesPage.professional.name">Professional</div>
              </div>
              <div class="account-divider"></div>
              <div class="account-features">
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.professional.feature1">All Advanced Account benefits</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.professional.feature2">50% Swap Reduction</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.professional.feature3">Exclusive research reports</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.professional.feature4">Even lower transaction costs</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.professional.feature5">Dedicated personal assistant</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.professional.feature6">Customizable trading conditions</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.professional.feature7">Use of AI tools (limited)</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.professional.feature8">Extensive education by a senior
                    analyst</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
              </div>
              <div class="account-note" data-i18n="accountTypesPage.professional.note">Potential for Increased Revenue:
                Some of the lowest transaction costs in the branch, and the use of a personal assistant and an AI tool
                to navigate you through financial markets</div>
              <div class="account-divider-bottom"></div>
              <a href="http://client.tradertok.com/#/auth/register" class="account-btn" data-i18n="accountTypesPage.getStarted">Get Started</a>
            </div>

            <!-- Exclusive Account -->
            <div class="account-card tier-4">
              <div class="account-header">
                <div class="account-price" data-target="250000">$0</div>
                <div class="account-name" data-i18n="accountTypesPage.exclusive.name">Exclusive</div>
              </div>
              <div class="account-divider"></div>
              <div class="account-features">
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.exclusive.feature1">All Professional Account benefits</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.exclusive.feature2">Zero swap fees!</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.exclusive.feature3">Lowest possible transaction costs</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.exclusive.feature4">Priority access to new features and tools</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.exclusive.feature5">Exclusive educational resources</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.exclusive.feature6">VIP events and networking opportunities</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.exclusive.feature7">Regular personal access to senior
                    analysts</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.exclusive.feature8">Highest level of customer support with faster
                    response times</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
              </div>
              <div class="account-note" data-i18n="accountTypesPage.exclusive.note">Benefit from the lowest transaction
                costs, zero swap fees, exclusive features, and personalized support, optimizing your trading performance
                for higher potential returns</div>
              <div class="account-divider-bottom"></div>
              <a href="http://client.tradertok.com/#/auth/register" class="account-btn" data-i18n="accountTypesPage.getStarted">Get Started</a>
            </div>

            <!-- BLACK Account -->
            <div class="account-card tier-5">
              <div class="account-header">
                <div class="account-price" data-target="1000000">$0</div>
                <div class="account-name" data-i18n="accountTypesPage.black.name">BLACK</div>
              </div>
              <div class="account-divider"></div>
              <div class="account-features">
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.black.feature1">All Exclusive Account Benefits</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.black.feature2">Personal dedicated senior analyst</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.black.feature3">300.000 welcome bonus</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.black.feature4">Access to private collection of educational
                    info</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.black.feature5">Personalized and negotiable offers</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
                <div class="feature-item">
                  <span data-i18n="accountTypesPage.black.feature6">Oversight analyst</span>
                  <span class="feature-icon check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                      <polyline points="20 6 9 17 4 12"></polyline>
                    </svg></span>
                </div>
              </div>
              <div class="account-divider-bottom"></div>
              <a href="http://client.tradertok.com/#/auth/register" class="account-btn" data-i18n="accountTypesPage.getStarted">Get Started</a>
            </div>
          </div>
        </div>
      </section>
    </main>


    <script>
// Account Price Counter Animation
function animatePriceCounter(element, target, duration = 2000) {
  const start = performance.now();

  function formatNumber(num) {
    return '$' + num.toLocaleString('en-US');
  }

  function frame(now) {
    const progress = Math.min(1, (now - start) / duration);
    // Easing function for smooth deceleration
    const easeOut = 1 - Math.pow(1 - progress, 3);
    const value = Math.floor(target * easeOut);

    element.textContent = formatNumber(value);

    if (progress < 1) {
      requestAnimationFrame(frame);
    }
  }

  requestAnimationFrame(frame);
}

// Intersection Observer for Account Types Hero (gradient animation)
const accountTypesHero = document.querySelector('.account-types-hero');
if (accountTypesHero) {
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
  }, {
    threshold: 0.3
  });

  heroObserver.observe(accountTypesHero);
}

// Intersection Observer for Account Types section (counter animation)
const accountTypesSection = document.querySelector('.account-types-content');
if (accountTypesSection) {
  const accountObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const priceElements = entry.target.querySelectorAll('.account-price[data-target]');
        priceElements.forEach((element, index) => {
          const target = parseInt(element.getAttribute('data-target'));
          // Stagger the animations slightly
          setTimeout(() => {
            animatePriceCounter(element, target, 1800);
          }, index * 100);
        });

        accountObserver.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.2
  });

  accountObserver.observe(accountTypesSection);
}
    </script>