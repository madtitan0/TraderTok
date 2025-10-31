
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
                Events Calendar
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

<!-- Content Section with Modern Cards -->
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


    <div class="main-container2">
        <!-- Header Section -->
        <div class="header-section2">
            <h2 class="header-title2">
                Stay up to date with market events by checking the live Events Calendar below
            </h2>
        </div>

        <!-- Ticker Widget -->
        <div class="widget-card ticker-card">
            <div class="widget-header">
                <div class="widget-icon">📊</div>
                <h3 class="widget-title">Live Market Ticker</h3>
                <span class="live-badge">
                    <span class="live-dot"></span>
                    LIVE
                </span>
            </div>
            <div class="widget-content">
                <iframe 
                    scrolling="no" 
                    allowtransparency="true" 
                    frameborder="0" 
                    src="https://www.tradingview-widget.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22title%22%3A%22S%26P%20500%20Index%22%7D%2C%7B%22proName%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22title%22%3A%22US%20100%20Cash%20CFD%22%7D%2C%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%20to%20USD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22Bitcoin%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22Ethereum%22%7D%5D%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%7D" 
                    style="height: 46px;">
                </iframe>
            </div>
        </div>

        <!-- Economic Calendar Widget -->
        <div class="widget-card">
            <div class="widget-header">
                <div class="widget-icon">📅</div>
                <h3 class="widget-title">Economic Calendar</h3>
                <span class="live-badge">
                    <span class="live-dot"></span>
                    LIVE
                </span>
            </div>
            <div class="widget-content">
                <iframe 
                    scrolling="no" 
                    allowtransparency="true" 
                    frameborder="0" 
                    src="https://www.tradingview-widget.com/embed-widget/events/?locale=en#%7B%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%7D" 
                    style="height: 550px;">
                </iframe>
            </div>
        </div>

        <!-- Crypto Market Widget -->
        <div class="widget-card">
            <div class="widget-header">
                <div class="widget-icon">₿</div>
                <h3 class="widget-title">Cryptocurrency Market</h3>
                <span class="live-badge">
                    <span class="live-dot"></span>
                    LIVE
                </span>
            </div>
            <div class="widget-content">
                <iframe 
                    allowtransparency="true" 
                    frameborder="0" 
                    src="https://www.tradingview-widget.com/embed-widget/crypto-mkt-screener/?locale=en#%7B%22defaultColumn%22%3A%22overview%22%7D" 
                    style="height: 550px;">
                </iframe>
            </div>
        </div>
    </div>

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

