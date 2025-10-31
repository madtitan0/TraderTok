
<!-- Hero Section with Parallax Effect -->
<section class="page-hero" style="
    background: url('./assets/img/NewTemp/bull.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    min-height: 50vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    overflow: hidden;
">
    <!-- Dynamic Gradient Overlay -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        /* background: linear-gradient(135deg, rgba(30, 77, 130, 0.92) 0%, rgba(230, 26, 56, 0.90) 50%,  rgba(211, 146, 102, 0.88) 100%); */
background: linear-gradient(
  135deg,
  rgba(30, 77, 130, 0.75) 0%, 
  rgba(217, 149, 102, 0.65) 50%, 
  rgba(211, 146, 102, 0.55) 100%
);

        background-size: 200% 200%;
        animation: gradientFlow 5s ease infinite;
    "></div>
    
    <!-- Floating Orbs -->
    <div style="
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 140, 0, 0.3), transparent);
        border-radius: 50%;
        top: -100px;
        right: -100px;
        animation: float 20s ease-in-out infinite;
    "></div>
    
    <div style="
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(211, 146, 102, 0.25), transparent);
        border-radius: 50%;
        bottom: -80px;
        left: -80px;
        animation: float 15s ease-in-out infinite reverse;
    "></div>
    
    <div class="container" style="position: relative; z-index: 3;">
        <div style="opacity: 0; animation: fadeInUp 1s ease forwards; animation-delay: 0.2s;">
            <h1 style="
                color: white;
                font-size: clamp(36px, 6vw, 68px);
                font-weight: 800;
                text-shadow: 0 10px 30px rgba(0,0,0,0.3);
                margin: 0 0 20px 0;
                letter-spacing: -1px;
                line-height: 1.1;
            ">
                About Us
            </h1>
            
            <!-- Modern Accent Line -->
            <div style="
                height: 3px;
                width: 100px;
                background: linear-gradient(90deg, transparent, #e61a38, #d39266, transparent);
                margin: 0 auto;
                border-radius: 3px;
                box-shadow: 0 0 20px rgba(255, 140, 0, 0.5);
            "></div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div style="
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        opacity: 0;
        animation: fadeIn 1s ease forwards 1.5s;
    ">
        <div style="
            width: 30px;
            height: 40px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            position: relative;
        ">
            <div style="
                width: 6px;
                height: 10px;
                background: white;
                border-radius: 3px;
                position: absolute;
                top: 8px;
                left: 50%;
                transform: translateX(-50%);
                animation: scrollDown 2s ease infinite;
            "></div>
        </div>
    </div>
</section>


<section style="
    background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    padding: 120px 0;
    min-height: 70vh;
    position: relative;
">
    <!-- Background Texture -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0.03;
        background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%231E4D82\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
        pointer-events: none;
    "></div>
<div>

    <section class="about-section2">
        <!-- Background Decorations -->
        <div class="bg-decoration circle1"></div>
        <div class="bg-decoration circle2"></div>

        <div class="container">
            <!-- Our Vision -->
            <div class="content-block reverse">
                <div class="image-container">
                    <img src="./assets/img/NewTemp/about2.jpg" alt="Our Vision">
                </div>
                <div class="text-content">
                    <span class="section-label">Our Vision</span>
                    <h2>Empowering Every Trader</h2>
                    <div class="accent-line"></div>
                    <p>To create a world where trading is transparent, intuitive, and empowering — where every trader, from first-time investor to seasoned professional, has the resources to succeed in a fair and open marketplace.</p>
                    <p>We believe in breaking barriers — in technology, accessibility, and education — so that anyone, anywhere, can participate in the global financial ecosystem with confidence.</p>
                    <div class="stat-highlight">
                        <div class="stat-number">100K+</div>
                        <div class="stat-label">Traders<br>Worldwide</div>
                    </div>
                </div>
            </div>

            <!-- Our Edge -->
            <div class="content-block">
                <div class="text-content">
                    <span class="section-label">Our Edge</span>
                    <h2>Institutional Performance</h2>
                    <div class="accent-line"></div>
                    <p>We deliver institutional-grade performance to retail traders, combining deep liquidity, ultra-fast execution, and world-class platforms like TraderTool.</p>
                    <p>Behind every order lies a network of trusted partners, robust infrastructure, and a team of market professionals dedicated to optimizing your trading experience.</p>
                    <p>We don't believe in shortcuts. We believe in consistency, transparency, and service that stands the test of time.</p>
                    <p>From tight
spreads and advanced analytics to dedicated client support, everything we do is designed
around one goal — your success.</p>
                    <div class="stat-highlight">
                        <div class="stat-number">&lt;10ms</div>
                        <div class="stat-label">Average<br>Execution Speed</div>
                    </div>
                </div>
                <div class="image-container">
                    <img src="./assets/img/NewTemp/about3.jpeg" alt="Our Edge">
                </div>
            </div>

            <!-- Our People -->
            <div class="content-block reverse">
                <div class="image-container">
                    <img src="./assets/img/NewTemp/about4.jpeg" alt="Our People">
                </div>
                <div class="text-content">
                    <span class="section-label">Our People</span>
                    <h2>Built on Trust</h2>
                    <div class="accent-line"></div>
                    <p>Our team is our strength. We're traders, technologists, and financial professionals who share a deep understanding of the markets and an even deeper commitment to our clients.</p>
                    <p>Trust isn't given — it's earned, and we work tirelessly every day to earn it.</p>
                    <div class="stat-highlight">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Industry<br>Experts</div>
                    </div>
                </div>
            </div>

            <!-- Our Promise -->
            <div class="content-block">
                <div class="text-content">
                    <span class="section-label">Our Promise</span>
                    <h2>Seamless & Strategic</h2>
                    <div class="accent-line"></div>
                    <p>Trading should be as seamless as it is strategic. At TraderTok, we combine innovation with accountability to give you a platform that performs when it matters most.</p>
                    <p>With global reach and local insight, we proudly support clients across the world, offering personalized solutions for every trading style.</p>
                    <div class="stat-highlight">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Global<br>Support</div>
                    </div>
                </div>
                <div class="image-container">
                    <img src="./assets/img/NewTemp/about5.jpeg" alt="Our Promise">
                </div>
            </div>
        </div>
    </section>
</section>

<!-- Ultra-Modern CTA Section -->
<section style="
    background: #0a0e27;
    padding: 0;
    position: relative;
    overflow: hidden;
    border-radius: 40px 40px 0 0;
">
    <!-- Animated Mesh Gradient Background -->
    <div style="
        position: absolute;
        inset: 0;
        background: 
            radial-gradient(circle at 20% 30%, rgba(30, 77, 130, 0.4) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(255, 140, 0, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(211, 146, 102, 0.2) 0%, transparent 70%);
        animation: meshMove 15s ease infinite;
    "></div>
    
    <!-- Grid Pattern -->
    <div style="
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        opacity: 0.5;
    "></div>
    
    <!-- Glowing Orbs -->
    <div style="
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255, 140, 0, 0.15), transparent 70%);
        border-radius: 50%;
        top: -150px;
        right: -150px;
        filter: blur(60px);
        animation: pulse 8s ease infinite;
    "></div>
    
    <div style="
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(30, 77, 130, 0.2), transparent 70%);
        border-radius: 50%;
        bottom: -100px;
        left: -100px;
        filter: blur(60px);
        animation: pulse 10s ease infinite reverse;
    "></div>
    
    <div class="container" style="position: relative; z-index: 2; padding: 120px 15px;">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8 text-center">
                <!-- Badge -->
                <div style="
                    display: inline-block;
                    background: rgba(255, 140, 0, 0.1);
                    border: 1px solid rgba(255, 140, 0, 0.3);
                    color: #e61a38;
                    padding: 8px 20px;
                    border-radius: 30px;
                    font-size: 13px;
                    font-weight: 600;
                    letter-spacing: 1px;
                    margin-bottom: 30px;
                    text-transform: uppercase;
                    opacity: 0;
                    animation: fadeInUp 0.8s ease forwards;
                    animation-delay: 0.2s;
                ">
                    Start Your Journey
                </div>
                
                <h2 style="
                    color: white;
                    font-size: clamp(32px, 5vw, 56px);
                    font-weight: 800;
                    margin-bottom: 24px;
                    line-height: 1.2;
                    letter-spacing: -1px;
                    opacity: 0;
                    animation: fadeInUp 0.8s ease forwards;
                    animation-delay: 0.3s;
                ">
                    Get Started With <span style="
                        background: linear-gradient(135deg, #e61a38, #d39266);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                    ">TraderTok</span>
                </h2>
                
                <p style="
                    color: rgba(255, 255, 255, 0.8);
                    font-size: 19px;
                    margin-bottom: 45px;
                    font-weight: 300;
                    line-height: 1.7;
                    max-width: 600px;
                    margin-left: auto;
                    margin-right: auto;
                    opacity: 0;
                    animation: fadeInUp 0.8s ease forwards;
                    animation-delay: 0.4s;
                ">
                    Choose your account, deposit funds, and begin trading today.
                </p>
                
                <!-- CTA Button with Micro-interaction -->
                <div style="opacity: 0; animation: fadeInUp 0.8s ease forwards; animation-delay: 0.5s;">
                    <a href="#" style="
                        display: inline-flex;
                        align-items: center;
                        gap: 12px;
                        background: linear-gradient(135deg, #e61a38, #d39266);
                        color: white;
                        padding: 18px 45px;
                        border-radius: 50px;
                        font-weight: 600;
                        font-size: 17px;
                        text-decoration: none;
                        box-shadow: 
                            0 0 0 0 rgba(255, 140, 0, 0.4),
                            0 20px 40px rgba(255, 140, 0, 0.3);
                        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                        position: relative;
                        overflow: hidden;
                    " onmouseover="
                        this.style.transform='translateY(-3px)';
                        this.style.boxShadow='0 0 0 8px rgba(255, 140, 0, 0.2), 0 25px 50px rgba(255, 140, 0, 0.4)';
                    " onmouseout="
                        this.style.transform='translateY(0)';
                        this.style.boxShadow='0 0 0 0 rgba(255, 140, 0, 0.4), 0 20px 40px rgba(255, 140, 0, 0.3)';
                    ">
                        <span>Open Trading Account</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" style="transition: transform 0.3s ease;">
                            <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
                
                <!-- Trust Indicators -->
                <div style="
                    margin-top: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 40px;
                    flex-wrap: wrap;
                    opacity: 0;
                    animation: fadeIn 0.8s ease forwards;
                    animation-delay: 0.7s;
                ">
                    <div style="color: rgba(255, 255, 255, 0.6); font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" style="color: #e61a38;">
                            <path d="M10 2L12.39 7.26L18 8.27L14 12.14L15.18 18L10 15.27L4.82 18L6 12.14L2 8.27L7.61 7.26L10 2Z"/>
                        </svg>
                        <span>Trusted Platform</span>
                    </div>
                    <div style="color: rgba(255, 255, 255, 0.6); font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" style="color: #e61a38;">
                            <path d="M10 1L3 6V10C3 14.55 6.84 18.74 10 19C13.16 18.74 17 14.55 17 10V6L10 1Z" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 10L9 12L13 8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Secure Trading</span>
                    </div>
                    <div style="color: rgba(255, 255, 255, 0.6); font-size: 14px; display: flex; align-items: center; gap: 8px;">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" style="color: #e61a38;">
                            <circle cx="10" cy="10" r="8" stroke-linecap="round"/>
                            <path d="M10 6V10L13 13" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

