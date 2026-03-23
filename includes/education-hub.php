<?php
$articles_json = file_get_contents('assets/data/education_articles.json');
$articles = json_decode($articles_json, true);
?>

<div class="education-hub">
    <!-- Hero Section -->
    <section class="page-hero1">
        <video class="page-hero-video" autoplay loop muted playsinline>
            <source src="assets/images/education.mp4" type="video/mp4">
        </video>
        <div class="page-hero-overlay1"></div>
        <div class="page-hero-content1">
            <h1 class="page-hero-title1" data-i18n-html="educationHub.hero.title"></h1>
            <p class="page-hero-subtitle1" data-i18n="educationHub.hero.subtitle">
                Access 20+ comprehensive trading guides designed specifically for beginners. No complex jargon, just clear explanations to help you start your journey.
            </p>
            <div class="hero-ctas">
                <!-- <a href="#register" class="btn-primary">Get Free Access Now</a> -->
                <!-- <a href="#articles" class="btn-secondary1">View Articles</a> -->
                 <a href="#" id="viewArticlesBtn" class="btn-secondary1" data-i18n="educationHub.hero.cta">View Articles</a>
            </div>
            <p class="micro-trust" data-i18n="educationHub.hero.trust">Join 5,000+ traders learning with TraderTok</p>
        </div>
    </section>

    <!-- Trust Strip -->
    <!-- <section class="trust-strip">
        <div class="container">
            <h2 class="trust-title">Designed for beginners </h2>
            <div class="trust-items">
                <div class="trust-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>100% Beginner-friendly</span>
                </div>
                <div class="trust-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>Focus on Risk Management</span>
                </div>
                <div class="trust-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>Simple, Clear Explanations</span>
                </div>
                <div class="trust-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span>Mobile-friendly Learning</span>
                </div>
            </div>
        </div>
    </section> -->

    <!-- What You'll Learn -->
    <section class="learn-section" id="learn">
        <div class="container">
            <h2 class="sec-title" data-i18n="educationHub.learn.title">What You'll Learn</h2>
            <p class="sec-subtitle" data-i18n="educationHub.learn.subtitle">Our curriculum covers everything you need to know to get started.</p>
            <div class="learn-grid">
                <div class="learn-card">
                    <h3 data-i18n="educationHub.learn.items.0.title">Forex Fundamentals</h3>
                    <p data-i18n="educationHub.learn.items.0.description">Understand the basic mechanics of the world's largest financial market.</p>
                </div>
                <div class="learn-card">
                    <h3 data-i18n="educationHub.learn.items.1.title">Leverage & Margin</h3>
                    <p data-i18n="educationHub.learn.items.1.description">Learn how to use trading power wisely and protect your capital.</p>
                </div>
                <div class="learn-card">
                    <h3 data-i18n="educationHub.learn.items.2.title">Risk Management Basics</h3>
                    <p data-i18n="educationHub.learn.items.2.description">The #1 skill every trader needs to survive and grow.</p>
                </div>
                <div class="learn-card">
                    <h3 data-i18n="educationHub.learn.items.3.title">Common Beginner Mistakes</h3>
                    <p data-i18n="educationHub.learn.items.3.description">Save time and money by avoiding the pitfalls most new traders face.</p>
                </div>
                <div class="learn-card">
                    <h3 data-i18n="educationHub.learn.items.4.title">Market Sessions</h3>
                    <p data-i18n="educationHub.learn.items.4.description">Learn when to trade (and when not to) for the best opportunities.</p>
                </div>
                <div class="learn-card">
                    <h3 data-i18n="educationHub.learn.items.5.title">Trading Psychology</h3>
                    <p data-i18n="educationHub.learn.items.5.description">Master your emotions to make better, more rational trading decisions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Who This Is For -->
    <section class="who-for-sec">
        <div class="container">
            <h2 class="sec-title" data-i18n="educationHub.whoFor.title">Is This Education for You?</h2>
            <div class="who-grid">
                <div class="who-box for">
                    <h3 data-i18n="educationHub.whoFor.for.title">This is for you if:</h3>
                    <ul>
                        <li data-i18n="educationHub.whoFor.for.items.0">You are a complete beginner with zero trading experience.</li>
                        <li data-i18n="educationHub.whoFor.for.items.1">You want to learn the fundamentals of the forex market.</li>
                        <li data-i18n="educationHub.whoFor.for.items.2">You prefer structured, easy-to-read lessons.</li>
                    </ul>
                </div>
                <div class="who-box not-for">
                    <h3 data-i18n="educationHub.whoFor.notFor.title">This is NOT for you if:</h3>
                    <ul>
                        <li data-i18n="educationHub.whoFor.notFor.items.0">You are looking for guaranteed profits or "get rich quick" schemes.</li>
                        <li data-i18n="educationHub.whoFor.notFor.items.1">You want trading signals or someone to trade for you.</li>
                        <li data-i18n="educationHub.whoFor.notFor.items.2">You are unwilling to accept the risks involved in trading.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works-sec" id="how-it-works">
        <div class="container">
            <h2 class="sec-title" data-i18n="educationHub.howItWorks.title">How It Works</h2>
            <div class="steps-grid">
                <div class="step">
                    <div class="step-num">1</div>
                    <h4 data-i18n="educationHub.howItWorks.steps.0.title">Create Your Free Account</h4>
                    <p data-i18n="educationHub.howItWorks.steps.0.description">Fill out the simple registration form below to unlock the hub.</p>
                </div>
                <div class="step">
                    <div class="step-num">2</div>
                    <h4 data-i18n="educationHub.howItWorks.steps.1.title">Get Instant Access</h4>
                    <p data-i18n="educationHub.howItWorks.steps.1.description">Once registered, you'll have full access to all 20+ articles immediately.</p>
                </div>
                <div class="step">
                    <div class="step-num">3</div>
                    <h4 data-i18n="educationHub.howItWorks.steps.2.title">Explore at Your Own Pace</h4>
                    <p data-i18n="educationHub.howItWorks.steps.2.description">Read on any device, anytime. New content is added monthly.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Resources Section -->
    <section class="edu-resources" id="gatedContent" style="display: none;">
        <div class="container">
            <!-- Courses -->
            <div class="edu-resource-card">
                <div class="edu-resource-image">
                    <img src="assets/images/edu-learn.jpg" alt="Courses">
                </div>
                <div class="edu-resource-content">
                    <h2 class="edu-resource-title" data-i18n="educationHub.resources.courses.title">Courses</h2>
                    <p class="edu-resource-text" data-i18n="educationHub.resources.courses.description">
                        Kickstart your trading journey with Vantage's free online trading courses. Master the art of trading as you delve into our comprehensive curriculum, perfect for aspiring traders eager to learn online trading from.
                    </p>
                    <a href="./trading-essentials" class="edu-btn gated-trigger" data-target="./trading-essentials" data-i18n="educationHub.resources.courses.cta">LEARN MORE</a>
                </div>
            </div>


            <!-- Podcasts -->
            <div class="edu-resource-card reverse">
                <div class="edu-resource-image">
                    <img src="assets/images/edu-vid1.jpg" alt="Educational Videos">
                </div>
                <div class="edu-resource-content">
                    <h2 class="edu-resource-title" data-i18n="educationHub.resources.videos.title">Educational Videos</h2>
                    <p class="edu-resource-text" data-i18n="educationHub.resources.videos.description">
                        Unlock your trading potential with Vantage's free educational videos, covering essential trading concepts and strategies. Whether you're a beginner or an experienced trader, our videos provide the knowledge you need to succeed in the dynamic world of trading.
                    </p>
                    <a href="./video-education" class="edu-btn gated-trigger" data-i18n="educationHub.resources.videos.cta" data-target="./video-education">WATCH NOW</a>
                </div>
            </div>


        </div>
    </section>

    <!-- FAQ -->
    <section class="faq-sec" id="faq" style="background: var(--bg-primary);">
        <div class="container">
            <h2 class="sec-title" data-i18n="educationHub.faq.title">Frequently Asked Questions</h2>
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-q" data-i18n-html="educationHub.faq.items.0.q">Is the Education Hub really free?<span>+</span></div>
                    <div class="faq-a" data-i18n="educationHub.faq.items.0.a">Yes! Our goal is to empower traders with the right knowledge. There are no hidden fees.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-q" data-i18n-html="educationHub.faq.items.1.q">Do I need a trading account to access the hub?<span>+</span></div>
                    <div class="faq-a" data-i18n="educationHub.faq.items.1.a">No, you just need to register via the form on this page to unlock the content.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-q" data-i18n-html="educationHub.faq.items.2.q">Are the articles suitable for complete beginners?<span>+</span></div>
                    <div class="faq-a" data-i18n="educationHub.faq.items.2.a">Absolutely. We've designed all 20 initial articles specifically for people with zero market experience.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-q" data-i18n-html="educationHub.faq.items.3.q">Is this financial advice?<span>+</span></div>
                    <div class="faq-a" data-i18n="educationHub.faq.items.3.a">No. All content is for educational purposes only. Trading involves risk.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-q" data-i18n-html="educationHub.faq.items.4.q">Can I read the articles on my phone?<span>+</span></div>
                    <div class="faq-a" data-i18n="educationHub.faq.items.4.a">Yes, the Education Hub is fully optimized for mobile, tablet, and desktop viewing.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-q" data-i18n-html="educationHub.faq.items.5.q">What happens after I register?<span>+</span></div>
                    <div class="faq-a" data-i18n="educationHub.faq.items.5.a">You will get instant access to the articles. Our team might reach out to offer further support as you start your journey.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gated Access Modal -->
    <div class="deposit-modal" id="eduGatedModal">
        <div class="deposit-modal-overlay"></div>
        <div class="deposit-modal-content">
            <button class="modal-close" id="closeEduGatedModal">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div class="modal-header">
                <h3 class="modal-title" data-i18n="educationHub.modal.title">Access Educational Content</h3>
                <p class="modal-subtitle" data-i18n="educationHub.modal.subtitletitle">To unlock this content, please provide your contact details. Our team will get in touch to support your trading journey.</p>
            </div>
            <form class="deposit-form" id="eduGatedForm">
                <div class="form-group">
                    <label for="geName">Full Name</label>
                    <input type="text" id="geName" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="geEmail">Email Address</label>
                    <input type="email" id="geEmail" name="email" placeholder="Enter your email address" required>
                </div>
                
                <div class="form-group">
                    <label for="geCountry">Country</label>
                    <select id="geCountry" name="country" required>
                        <option value="" disabled selected>Select your country</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="geLanguage">Preferred Language</label>
                    <select id="geLanguage" name="language" required>
                        <option value="" disabled selected>Select preferred language</option>
                        <option value="English">English</option>
                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                        <option value="Vietnamese">Vietnamese</option>
                        <option value="Thai">Thai</option>
                        <option value="Tagalog">Tagalog</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="geWhatsApp">WhatsApp Number <span style="font-size: 0.8rem; font-weight: normal; color: var(--text-secondary);">(optional)</span></label>
                    <input type="tel" id="geWhatsApp" name="whatsapp" placeholder="e.g. +1 234 567 8900">
                </div>

                <div class="form-group checkbox-group" style="display: flex; align-items: flex-start; gap: 10px; margin-bottom: 20px;">
                    <input type="checkbox" id="geConsent" name="consent" required style="margin-top: 4px; width: auto; color: var(--primary-color);">
                    <label for="geConsent" style="font-size: 0.85rem; line-height: 1.4; color: var(--text-secondary); cursor: pointer; user-select: none;">
                        I agree to receive educational updates and communications from TraderTok Academy.
                    </label>
                </div>

                <input type="hidden" id="geArticleId" name="article_id">
                <button type="submit" class="btn-submit-deposit">
                    <span class="btn-text" data-i18n="educationHub.modal.submit">Submit & Unlock</span>
                    <span class="btn-loading">
                        <svg class="spinner" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" fill="none"
                                stroke-dasharray="31.4 31.4" stroke-linecap="round" />
                        </svg>
                    </span>
                </button>
            </form>
            <p class="modal-disclaimer" data-i18n="educationHub.modal.modal">By submitting, you agree to our Terms of Service and Privacy Policy</p>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('eduGatedModal');
        const form = document.getElementById('eduGatedForm');
        const closeBtn = document.getElementById('closeEduGatedModal');
        const overlay = modal.querySelector('.deposit-modal-overlay');
        const gatedTriggers = document.querySelectorAll('.gated-trigger');
        const STORAGE_KEY = 'eduHub_form_submitted';
        const viewArticlesBtn = document.getElementById('viewArticlesBtn');
        const gatedContent = document.getElementById('gatedContent');

        // FAQ Toggle
        document.querySelectorAll('.faq-q').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                const wasActive = item.classList.contains('active');
                
                // Close all other FAQs
                document.querySelectorAll('.faq-item').forEach(otherItem => {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('span').textContent = '+';
                });

                if (!wasActive) {
                    item.classList.add('active');
                    q.querySelector('span').textContent = '-';
                }
            });
        });

        function isGated() {
            return !localStorage.getItem(STORAGE_KEY);
        }

        // function openModal(articleId) {
        //     document.getElementById('geArticleId').value = articleId;
        //     modal.classList.add('active');
        //     document.body.style.overflow = 'hidden';
        // }
        function openModal(target) {
            document.getElementById('geArticleId').value = target;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }


        function unlockContent() {
            if (gatedContent) {
                gatedContent.style.display = 'block';
            }
        }

        // On page load
        if (!isGated()) {
            unlockContent();
        }

        // gatedTriggers.forEach(trigger => {
        //     trigger.addEventListener('click', function(e) {
        //         const articleId = this.getAttribute('data-id');
        //         if (isGated()) {
        //             e.preventDefault();
        //             openModal(articleId);
        //         } else {
        //             window.location.href = 'education-article?id=' + articleId;
        //         }
        //     });
        // });

        gatedTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                const target = this.getAttribute('data-target');

                if (isGated()) {
                    e.preventDefault();
                    openModal(target); // store target for later redirect
                } else {
                    window.location.href = target;
                }
            });
        });


        if (viewArticlesBtn) {
            viewArticlesBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if (isGated()) {
                    openModal('education'); // or any ID you want
                } else {
                    unlockContent();
                    gatedContent.scrollIntoView({ behavior: 'smooth' });
                }
            });
        }

        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (overlay) overlay.addEventListener('click', closeModal);

        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                const submitBtn = this.querySelector('.btn-submit-deposit');
                submitBtn.classList.add('loading');

                const articleId = document.getElementById('geArticleId').value;
                
                // Mark as submitted
                localStorage.setItem(STORAGE_KEY, 'true');
                unlockContent();
                
                // Show unified success modal content
                const modalContent = modal.querySelector('.deposit-modal-content');
                if (modalContent) {
                    modalContent.innerHTML = `
                        <div style="text-align: center; padding: 40px 20px;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#00C853" stroke-width="2" style="width: 80px; height: 80px; margin-bottom: 20px;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="16 8 10 14 8 12"></polyline>
                            </svg>
                            <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px; color: var(--text-primary);" data-i18n="educationHub.modal.successTitle">Application Submitted!</h3>
                            <p style="color: var(--text-secondary);" data-i18n="educationHub.modal.successMessage">Our manager will contact you shortly.</p>
                        </div>
                    `;
                }

                setTimeout(() => {
                    const target = document.getElementById('geArticleId').value;

                    closeModal();

                    if (target) {
                        window.location.href = target;
                    } else {
                        gatedContent.scrollIntoView({ behavior: 'smooth' });
                    }
                }, 2000);

                // setTimeout(() => {
                //     closeModal();
                //     gatedContent.scrollIntoView({ behavior: 'smooth' });
                // }, 2000);

                // setTimeout(() => {
                    // window.location.href = 'education-article?id=' + articleId;
                    //  window.location.href = 'trading-essentials';
                // }, 2000);
            });
        }
    });
    </script>
</div>
