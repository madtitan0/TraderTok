
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
                Legal
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


<!-- <section style="
    margin:50px auto;
    padding:30px;
    background-color:#0A1F44;
    border-radius:12px;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
    line-height:1.6;
    font-size:18px;
    color:#EAEAEA;
    max-width:1500px;
    border-top:5px solid #E74C3C;
    background-clip: padding-box;
"> -->
    <!-- <h1 style="text-align:center; color:#E74C3C; margin-bottom:20px; font-weight:bold;">
      Your Trust, Our Commitment to Transparency
    </h1>

    <p>
      At TraderTok, we are committed to maintaining the highest standards of regulatory compliance, 
      legal integrity, and client protection. As a regulated trading company, transparency and 
      accountability are at the core of our operations.
    </p>

    <p>
      Below you will find our key legal documents, which define the framework of our services and outline 
      your rights and responsibilities as a client. These documents cover essential areas including 
      identity verification, transaction handling, data privacy, trading conditions, and risk disclosures.
    </p>

    <p>
      We strongly encourage all clients to carefully review the following before opening an account 
      or initiating any trading activity:
    </p>

    <h3 style="font-size: 20px; font-weight: bold; color: #E74C3C; margin-top:30px; margin-bottom:15px;">
      Official Policy Documents
    </h3>

    <ul style="list-style-type: disc; padding-left: 25px; margin-top:0; margin-bottom:30px;">
      <li style="margin-bottom:10px;">
        Anti-Money Laundering (AML) &amp; Know Your Customer (KYC) Policy
        <a href="https://keen-haibt.35-157-61-198.plesk.page//files/AML_AND_KYC_POLICY_Amber_Rock_Trade_Ltd.pdf" target="_blank" style="margin-left:8px; vertical-align:middle;">
          <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF" style="width:40px; cursor:pointer; height:auto; vertical-align:middle;">
        </a>
      </li>
      <li style="margin-bottom:10px;">
        Order Execution Policy
        <a href="https://keen-haibt.35-157-61-198.plesk.page//files/Order_Executio_ Policy_Amber_Rock_Trade_Ltd.pdf" target="_blank" style="margin-left:8px; vertical-align:middle;">
          <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF" style="width:40px; cursor:pointer; height:auto; vertical-align:middle;">
        </a>
      </li>
      <li style="margin-bottom:10px;">
        Privacy Policy
        <a href="https://keen-haibt.35-157-61-198.plesk.page//files/Privacy_Policy_Amber_Rock_Trade_Ltd.pdf" target="_blank" style="margin-left:8px; vertical-align:middle;">
          <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF" style="width:40px; cursor: pointer; height:auto; vertical-align:middle;">
        </a>
      </li>
      <li style="margin-bottom:10px;">
        Risk Disclosure Statement
        <a href="https://keen-haibt.35-157-61-198.plesk.page//files/Risk_Disclosure_Amber_Rock_Trade_Ltd.pdf" target="_blank" style="margin-left:8px; vertical-align:middle;">
          <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF" style="width:40px; cursor:pointer; height:auto; vertical-align:middle;">
        </a>
      </li>
      <li>
        Service Agreement (Terms &amp; Conditions)
        <a href="https://keen-haibt.35-157-61-198.plesk.page//files/Service_Agreement_Terms_&amp;_Conditions_Amber_Rock_Trade_Ltd.pdf" target="_blank" style="margin-left:8px; vertical-align:middle;">
          <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF" style="width:40px; cursor:pointer; height:auto; vertical-align:middle;">
        </a>
      </li>
    </ul>

    <p style="margin-top:30px; font-size:14px; color:#555; background-color:#f4f6f8; padding:12px 16px; border-left:4px solid #E74C3C; border-radius:6px;">
      By continuing to use our services, you confirm that you have read, understood, and agreed to the terms outlined in these policies.
    </p> -->

        <div class="main-container1">
        <div class="header-section1">
            <h1>Important Legal Information & Policies</h1>
        </div>

        <div class="intro-text1">
            <p>
                At TraderTok, we are committed to maintaining the highest standards of regulatory compliance, 
                legal integrity, and client protection. As a regulated trading company, transparency and 
                accountability are at the core of our operations.
            </p>
            <p>
                Below you will find our key legal documents, which define the framework of our services and outline 
                your rights and responsibilities as a client. These documents cover essential areas including 
                identity verification, transaction handling, data privacy, trading conditions, and risk disclosures.
            </p>
            <p>
                We strongly encourage all clients to carefully review the following before opening an account 
                or initiating any trading activity:
            </p>
        </div>

        <div class="cards-grid">
            <!-- Privacy Policy Card -->
            <div class="policy-card">
                <div class="icon-container">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF Icon">
                </div>
                <h3>Privacy Policy</h3>
                <p>
                    The Company maintains a comprehensive data protection framework, referencing its commitments to high standards of security and confidentiality.
                </p>
                <a href="./files/Privacy_Policy_Amber_Rock_Trade_Ltd.pdf" class="download-btn">
                    <svg class="download-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12L6 8h8l-4 4zm0 2l-4-4H2v2h4l4 4 4-4h4v-2h-4l-4 4z"/>
                    </svg>
                    Download PDF
                </a>
            </div>

            <!-- Terms & Conditions Card -->
            <div class="policy-card">
                <div class="icon-container">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF Icon">
                </div>
                <h3>Terms & Conditions</h3>
                <p>
                    The Agreement stipulates the investment and ancillary services provided by the Company to its trading activities.
                </p>
                <a href="./files/Service_Agreement_Terms_&_Conditions_Amber_Rock_Trade_Ltd.pdf" class="download-btn">
                    <svg class="download-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12L6 8h8l-4 4zm0 2l-4-4H2v2h4l4 4 4-4h4v-2h-4l-4 4z"/>
                    </svg>
                    Download PDF
                </a>
            </div>

            <!-- AML & KYC Policy Card -->
            <div class="policy-card">
                <div class="icon-container">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF Icon">
                </div>
                <h3>Anti-Money Laundering Policy</h3>
                <p>
                    This policy outlines the Company's commitment to preventing and detecting money laundering and terrorist financing activities.
                </p>
                <a href="./files/AML_AND_KYC_POLICY_Amber_Rock_Trade_Ltd.pdf" class="download-btn">
                    <svg class="download-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12L6 8h8l-4 4zm0 2l-4-4H2v2h4l4 4 4-4h4v-2h-4l-4 4z"/>
                    </svg>
                    Download PDF
                </a>
            </div>

            <!-- Complaint Handling Policy Card -->
            <!-- <div class="policy-card">
                <div class="icon-container">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF Icon">
                </div>
                <h3>Complaint Handling Policy</h3>
                <p>
                    This document outlines the procedures followed by the Company in addressing and resolving client complaints.
                </p>
                <a href="#" class="download-btn">
                    <svg class="download-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12L6 8h8l-4 4zm0 2l-4-4H2v2h4l4 4 4-4h4v-2h-4l-4 4z"/>
                    </svg>
                    Download PDF
                </a>
            </div> -->

            <!-- Order Execution Policy Card -->
            <div class="policy-card">
                <div class="icon-container">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF Icon">
                </div>
                <h3>Order Execution Policy</h3>
                <p>
                    The Company is committed to providing clients with optimal trading conditions and efficient order execution.
                </p>
                <a href="./files/Order_Executio_ Policy_Amber_Rock_Trade_Ltd.pdf" class="download-btn">
                    <svg class="download-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12L6 8h8l-4 4zm0 2l-4-4H2v2h4l4 4 4-4h4v-2h-4l-4 4z"/>
                    </svg>
                    Download PDF
                </a>
            </div>

            <!-- Risk Disclosure Card -->
            <div class="policy-card">
                <div class="icon-container">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF Icon">
                </div>
                <h3>Risk Disclosure</h3>
                <p>
                    This Risk Disclosure document informs you of the inherent risks associated with trading, by entering into over-the-counter.
                </p>
                <a href="./files/Risk_Disclosure_Amber_Rock_Trade_Ltd.pdf" class="download-btn">
                    <svg class="download-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12L6 8h8l-4 4zm0 2l-4-4H2v2h4l4 4 4-4h4v-2h-4l-4 4z"/>
                    </svg>
                    Download PDF
                </a>
            </div>
        </div>

        <div class="disclaimer">
            <p>
                <strong>Important:</strong> By continuing to use our services, you confirm that you have read, understood, and agreed to the terms outlined in these policies. If you have any questions or concerns regarding these documents, please contact our legal department for clarification.
            </p>
        </div>
    </div>
<!-- </section> -->
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


