<!-- Trading Central Page -->
<style>
    .ptag{
        display: block;
    }
    .tc-stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 32px;
        margin: 64px auto;
        max-width: 1200px;
        text-align: center;
    }
    .tc-stat {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 16px;
        padding: 32px;
        transition: transform 0.3s;
    }
    .tc-stat:hover {
        transform: translateY(-5px);
    }
    .tc-stat h3 {
        font-size: 3rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 8px;
    }
    .tc-stat p {
        font-size: 1.1rem;
        color: var(--text-secondary);
        font-weight: 500;
    }
    
    .tc-features-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 64px;
        align-items: center;
        margin-bottom: 120px;
    }
    .tc-feature-text h2 {
        font-size: 2.5rem;
        color: var(--text-primary);
        margin-bottom: 24px;
        font-weight: 700;
    }
    .tc-feature-text p {
        font-size: 1.1rem;
        color: var(--text-secondary);
        line-height: 1.8;
        margin-bottom: 24px;
    }
    
    .tc-tools-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 32px;
    }
    .tc-tool-card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        padding: 40px;
        border-radius: 24px;
    }
    .tc-tool-card h3 {
        font-size: 1.5rem;
        margin-bottom: 16px;
        color: var(--text-primary);
        font-weight: 700;
    }
    .tc-tool-card p {
        color: var(--text-secondary);
        line-height: 1.7;
    }

    .tc-faq-item {
        border-bottom: 1px solid var(--card-border);
        padding: 24px 0;
    }
    .tc-faq-question {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 16px;
    }
    .tc-faq-answer {
        color: var(--text-secondary);
        line-height: 1.8;
    }

    @media (max-width: 991px) {
        .tc-stats-row { grid-template-columns: repeat(2, 1fr); }
        .tc-features-grid { grid-template-columns: 1fr; gap: 40px; }
        .tc-tools-grid { grid-template-columns: 1fr; }
        .ptag{
            display: none;
        }
    }
    @media (max-width: 576px) {
        .tc-stats-row { grid-template-columns: 1fr; }
    }
</style>

<section style="padding: 140px 0 100px; background: var(--bg-primary);">
    <div class="container">
        <!-- Hero Section -->
        <div style="text-align: center; max-width: 1200px; margin: 0 auto 40px;">
            <p class="ptag" style="font-size: 1.1rem; font-weight: 600; color: var(--primary-color); letter-spacing: 2px; text-transform: uppercase;" data-i18n="tradingCentral.eyebrow">Trading Central</p>
            <h1 style="font-size: 4.5rem; font-weight: 800; line-height: 1.2; color: var(--text-primary); margin: 24px 0;">
                <span data-i18n="tradingCentral.heroTitlePart1">Advanced analytics for</span> <br><span style="background: var(--brand-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;" data-i18n="tradingCentral.heroTitlePart2">smarter trading</span>
            </h1>
            <p style="font-size: 1.2rem; color: var(--text-secondary); line-height: 1.8; max-width: 800px; margin: 0 auto 40px;" data-i18n="tradingCentral.heroSubtitle">
                TraderTok brings you one of the most powerful market tools for modern trading. Trading Central combines cutting-edge tech with expert market analysis to elevate your trading experience.
            </p>
            <a href="https://appzone.tradertok.com/" class="btn-primary" style="display: inline-block; font-size: 1.1rem; padding: 16px 40px; border-radius: 8px;" data-i18n="tradingCentral.heroBtn">Access Trading Central</a>
        </div>

        <div style="text-align: center; margin-bottom: 100px;">
            <img src="assets/images/trading-central.png" alt="Trading Central Dashboard" style="max-width: 100%; height: auto; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        </div>

        <!-- Stats -->
        <div class="tc-stats-row">
            <div class="tc-stat">
                <h3>24/7</h3>
                <p data-i18n="tradingCentral.stats.s1lbl">Global Market Coverage</p>
            </div>
            <div class="tc-stat">
                <h3>250+</h3>
                <p data-i18n="tradingCentral.stats.s2lbl">Asset Breakdowns</p>
            </div>
            <div class="tc-stat">
                <h3>115</h3>
                <p data-i18n="tradingCentral.stats.s3lbl">Events Monitored</p>
            </div>
            <div class="tc-stat">
                <h3>2500+</h3>
                <p data-i18n="tradingCentral.stats.s4lbl">Aggregated News Sources</p>
            </div>
        </div>

        <div style="text-align: center; margin: 120px 0 80px;">
            <h2 style="font-size: 3rem; font-weight: 800; color: var(--text-primary);">
                <span data-i18n="tradingCentral.midTitlePart1">Stay ahead of market trends</span><br><span data-i18n="tradingCentral.midTitlePart2">with real-time analytics</span>
            </h2>
        </div>

        <!-- Features -->
        <div class="tc-features-grid">
            <div class="tc-feature-text">
                <h2 data-i18n="tradingCentral.features.f1title">Data-Driven Insights</h2>
                <p data-i18n="tradingCentral.features.f1desc">Stay ahead of the latest market moves with advanced analytics and expert insights.</p>
                <a href="https://appzone.tradertok.com/" class="btn-secondary" style="display: inline-block;" data-i18n="tradingCentral.features.registerBtn">Register to Access</a>
            </div>
            <div>
                <img src="assets/images/trading-central-mac-2.png" alt="Data Driven Insights" style="max-width: 100%; border-radius: 16px;">
            </div>
        </div>

        <div class="tc-features-grid" style="direction: rtl;">
            <div class="tc-feature-text" style="direction: ltr;">
                <h2 data-i18n="tradingCentral.features.f2title">Professional-Grade Analysis</h2>
                <p data-i18n="tradingCentral.features.f2desc">Navigate global markets with the latest market-scanning tools powered by AI.</p>
            </div>
            <div style="direction: ltr;">
                <img src="assets/images/trading-central-mac.png" alt="Professional-Grade Analysis" style="max-width: 100%; border-radius: 16px;">
            </div>
        </div>

        <div class="tc-features-grid">
            <div class="tc-feature-text">
                <h2 data-i18n="tradingCentral.features.f3title">Boundless Market Opportunities</h2>
                <p data-i18n="tradingCentral.features.f3desc">Access real-time insights into hundreds of financial instruments.</p>
            </div>
            <div>
                <img src="assets/images/trading-central-mob.png" alt="Boundless Market Opportunities" style="max-width: 100%; border-radius: 16px;">
            </div>
        </div>

        <!-- Registration CTA -->
        <div style="background: var(--card-bg); border-radius: 24px; padding: 64px 40px; text-align: center; margin-bottom: 120px;">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 24px;" data-i18n="tradingCentral.cta.title">Register to access Trading Central for FREE</h2>
            <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 700px; margin: 0 auto 40px;" data-i18n="tradingCentral.cta.desc">
                Unlock the full power of Trading Central when you register with TraderTok. Trading Central enhances your trading experience by providing actionable insights and expert analysis at no cost.
            </p>
            <a href="https://appzone.tradertok.com/" class="btn-primary" style="display: inline-block; padding: 16px 40px;" data-i18n="tradingCentral.cta.btn">Register to Access</a>
        </div>

        <!-- Tools section -->
        <div style="margin-bottom: 120px;">
            <div style="text-align: center; margin-bottom: 64px;">
                <h2 style="font-size: 3rem; font-weight: 800; color: var(--text-primary); margin-bottom: 24px;" data-i18n="tradingCentral.tools.title">The ultimate suite of market tools</h2>
                <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 700px; margin: 0 auto;" data-i18n="tradingCentral.tools.subtitle">
                    At TraderTok, we take pride in arming you with the tools and insights you need to succeed. Explore the power of Trading Central and redefine the way you trade.
                </p>
            </div>

            <div class="tc-tools-grid">
                <div class="tc-tool-card">
                    <h3 data-i18n="tradingCentral.tools.t1title">News & Sentiment Analysis</h3>
                    <p data-i18n="tradingCentral.tools.t1desc">Stay informed with comprehensive news and sentiment analysis across forex, stocks, commodities, indices, cryptocurrencies, and more. Leverage unbiased, data-driven insights to navigate the markets confidently and seize opportunities as they emerge.</p>
                </div>
                <div class="tc-tool-card">
                    <h3 data-i18n="tradingCentral.tools.t2title">Pricing Analytics</h3>
                    <p data-i18n="tradingCentral.tools.t2desc">Analyze real-time price movements and uncover trading opportunities across 250+ assets. Stay ahead of market trends with precise economic insights and pricing analytics that empower you to act decisively and maximize your trading potential.</p>
                </div>
                <div class="tc-tool-card">
                    <h3 data-i18n="tradingCentral.tools.t3title">Instruments & Insights</h3>
                    <p data-i18n="tradingCentral.tools.t3desc">Access actionable technical analysis on a wide range of financial instruments. Harness advanced analytics, pattern recognition technology, and real-time data to identify market opportunities and make informed trading decisions. Gain the clarity and confidence you need to navigate today's fast-moving financial landscape.</p>
                </div>
                <div class="tc-tool-card">
                    <h3 data-i18n="tradingCentral.tools.t4title">Actionable Ideas</h3>
                    <p data-i18n="tradingCentral.tools.t4desc">Discover live trading ideas generated from a combination of technical and fundamental analysis. Spot bullish and bearish opportunities in real time and make confident, data-backed decisions that align with your trading strategy.</p>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 48px;">
                <a href="https://appzone.tradertok.com/" class="btn-primary" style="display: inline-block; padding: 16px 40px;" data-i18n="tradingCentral.tools.btn">Get Started</a>
            </div>
        </div>

        <!-- FAQ Section -->
        <div>
            <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 40px;" data-i18n="tradingCentral.faq.title">Trading Central FAQs</h2>
            
            <div class="tc-faq-item">
                <div class="tc-faq-question" data-i18n="tradingCentral.faq.q1">What is Trading Central?</div>
                <div class="tc-faq-answer" data-i18n="tradingCentral.faq.a1">
                    Trading Central is a state-of-the-art market analysis and research suite that combines cutting-edge AI technology with the expertise of seasoned financial analysts. By seamlessly merging machine learning with human intelligence, Trading Central provides accurate, actionable trade ideas, in-depth market insights, and real-time data to help traders of all levels make informed decisions.
                </div>
            </div>
            
            <div class="tc-faq-item">
                <div class="tc-faq-question" data-i18n="tradingCentral.faq.q2">How do I access Trading Central?</div>
                <div class="tc-faq-answer" data-i18n="tradingCentral.faq.a2">
                    To access TraderTok's Trading Central, you need to log in to your account. You will find all the Trading Central tools within our trading environments. Trading Central is seamlessly integrated within the platform, providing you with powerful tools and insights at your fingertips.
                </div>
            </div>

            <div class="tc-faq-item">
                <div class="tc-faq-question" data-i18n="tradingCentral.faq.q3">What markets does Trading Central cover?</div>
                <div class="tc-faq-answer" data-i18n="tradingCentral.faq.a3">
                    Trading Central provides comprehensive insights into a wide array of markets offered by TraderTok, empowering you to diversify your trading portfolio. From Forex and Commodities to Indices, Cryptocurrencies, and Stocks, Trading Central delivers expert analysis and trade ideas across various financial instruments.
                </div>
            </div>

            <div class="tc-faq-item">
                <div class="tc-faq-question" data-i18n="tradingCentral.faq.q4">Why choose TraderTok and Trading Central?</div>
                <div class="tc-faq-answer" data-i18n="tradingCentral.faq.a4">
                    When you choose TraderTok, you're joining a trusted brokerage committed to your success. We provide a seamless trading experience with unparalleled support, low spreads, and an array of premium trading tools, including Trading Central, at no extra cost. By partnering with TraderTok, you gain access to the expertise, resources, and technology needed to achieve your financial goals.
                </div>
            </div>
        </div>
    </div>
</section>
