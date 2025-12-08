        <style>
        /* Legal Page Styles */
        .legal-page {
            padding-top: 100px;
        }

        /* Hero Section - Two Column */
        .legal-hero {
            padding: 60px 0 80px;
        }

        .hero-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        .hero-content {
            max-width: 100%;
        }

        .hero-title {
            font-size: clamp(2rem, 4vw, 2.8rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            color: var(--text-primary);
        }

        .gradient-text {
            background: var(--brand-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 0.9rem;
            line-height: 1.7;
            color: var(--text-secondary);
            margin-bottom: 16px;
        }

        .hero-note {
            font-size: 0.85rem;
            line-height: 1.7;
            color: var(--text-secondary);
            font-style: italic;
        }

        /* Documents Grid - Right Side */
        .documents-grid {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .document-card {
            display: flex;
            flex-direction: column;
            padding: 14px 18px;
            background: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .document-card:hover {
            border-color: rgba(230, 57, 70, 0.3);
            background: var(--bg-tertiary);
        }

        .document-icon {
            width: 44px;
            height: 54px;
            background: var(--bg-tertiary);
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: relative;
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .document-icon::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 10px 10px 0;
            border-color: transparent var(--bg-secondary) transparent transparent;
        }

        .document-icon::after {
            content: 'PDF';
            position: absolute;
            bottom: 6px;
            font-size: 0.5rem;
            font-weight: 800;
            color: #dc2626;
            letter-spacing: 0.5px;
            background: rgba(220, 38, 38, 0.1);
            padding: 2px 5px;
            border-radius: 3px;
        }

        .document-icon svg {
            width: 18px;
            height: 18px;
            stroke: var(--text-secondary);
            margin-bottom: 10px;
            stroke-width: 1.5;
        }

        .document-content {
            flex: 1;
            min-width: 0;
        }

        .document-header {
            display: flex;
            align-items: center;
            gap: 16px;
            width: 100%;
            cursor: pointer;
        }

        .document-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .document-toggle {
            margin-left: auto;
            font-size: 1.2rem;
            font-weight: 300;
            color: var(--text-secondary);
            transition: transform 0.3s ease, color 0.3s ease;
            flex-shrink: 0;
        }

        .document-card.active .document-toggle {
            transform: rotate(45deg);
            color: var(--brand-color);
        }

        .document-description {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, opacity 0.3s ease, padding 0.3s ease;
            opacity: 0;
            padding: 0 0 0 60px;
        }

        .document-card.active .document-description {
            max-height: 200px;
            opacity: 1;
            padding: 12px 0 0 60px;
        }

        .document-description p {
            font-size: 0.8rem;
            line-height: 1.6;
            color: var(--text-secondary);
        }

        .document-download {
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            background: var(--bg-tertiary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .document-download svg {
            width: 16px;
            height: 16px;
            stroke: var(--text-secondary);
            transition: all 0.3s ease;
        }

        .document-card:hover .document-download {
            background: #E63946;
        }

        .document-card:hover .document-download svg {
            stroke: white;
        }

        /* Video Section */
        .video-section {
            padding: 0 0 60px;
        }

        .video-wrapper {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            height: 300px;
        }

        .video-wrapper::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            pointer-events: none;
        }

        .legal-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            filter: brightness(0.8);
        }

        /* Important Notice */
        .notice-section {
            padding: 0 0 80px;
        }

        .notice-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .notice-title .gradient-text {
            background: var(--brand-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .notice-title svg {
            width: 16px;
            height: 16px;
            stroke: #E63946;
            flex-shrink: 0;
        }

        .notice-text {
            font-size: 0.8rem;
            line-height: 1.7;
            color: var(--text-secondary);
        }

        .notice-text a {
            color: var(--brand-color);
            text-decoration: none;
            font-weight: 500;
        }

        .notice-text a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .hero-layout {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        @media (max-width: 480px) {
            .document-description {
                display: none;
            }
        }
    </style>
    
    <!-- Main Content -->
    <main class="legal-page">
        <!-- Hero Section - Two Column -->
        <section class="legal-hero">
            <div class="container">
                <div class="hero-layout">
                    <!-- Left Side - Text -->
                    <div class="hero-content">
                        <h1 class="hero-title">Important Legal Information & <span class="gradient-text">Policies</span></h1>
                        <p class="hero-description">
                            At TraderTok, we are committed to maintaining the highest standards of regulatory compliance, legal integrity, and client protection. As a regulated trading company, transparency and accountability are at the core of our operations.
                        </p>
                        <p class="hero-description">
                            Below you will find our key legal documents, which define the framework of our services and outline your rights and responsibilities as a client. These documents cover essential areas including identity verification, transaction handling, data privacy, trading conditions, and risk disclosures.
                        </p>
                        <p class="hero-note">
                            We strongly encourage all clients to carefully review the following before opening an account or initiating any trading activity:
                        </p>
                    </div>

                    <!-- Right Side - Documents -->
                    <div class="documents-grid">
                        <div class="document-card">
                            <div class="document-header">
                                <div class="document-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </div>
                                <div class="document-content">
                                    <h3 class="document-title">Privacy Policy</h3>
                                </div>
                                <span class="document-toggle">+</span>
                                <a href="./files/Privacy_Policy_Amber_Rock_Trade_Ltd.pdf" class="document-download" download>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                </a>
                            </div>
                            <div class="document-description">
                                <p>The Company maintains a comprehensive data protection framework, referencing its commitments to high standards of security and confidentiality.</p>
                            </div>
                        </div>

                        <div class="document-card">
                            <div class="document-header">
                                <div class="document-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </div>
                                <div class="document-content">
                                    <h3 class="document-title">Terms & Conditions</h3>
                                </div>
                                <span class="document-toggle">+</span>
                                <a href="./files/Service_Agreement_Terms_&_Conditions_Amber_Rock_Trade_Ltd.pdf" class="document-download" download>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                </a>
                            </div>
                            <div class="document-description">
                                <p>The Agreement stipulates the investment and ancillary services provided by the Company to its trading activities.</p>
                            </div>
                        </div>

                        <div class="document-card">
                            <div class="document-header">
                                <div class="document-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </div>
                                <div class="document-content">
                                    <h3 class="document-title">Anti-Money Laundering Policy</h3>
                                </div>
                                <span class="document-toggle">+</span>
                                <a href="./files/AML_AND_KYC_POLICY_Amber_Rock_Trade_Ltd.pdf" class="document-download" download>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                </a>
                            </div>
                            <div class="document-description">
                                <p>This policy outlines the Company's commitment to preventing and detecting money laundering and terrorist financing activities.</p>
                            </div>
                        </div>

                        <div class="document-card">
                            <div class="document-header">
                                <div class="document-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </div>
                                <div class="document-content">
                                    <h3 class="document-title">Order Execution Policy</h3>
                                </div>
                                <span class="document-toggle">+</span>
                                <a href="./files/Order_Executio_ Policy_Amber_Rock_Trade_Ltd.pdf" class="document-download" download>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                </a>
                            </div>
                            <div class="document-description">
                                <p>The Company is committed to providing clients with optimal trading conditions and efficient order execution.</p>
                            </div>
                        </div>

                        <div class="document-card">
                            <div class="document-header">
                                <div class="document-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </div>
                                <div class="document-content">
                                    <h3 class="document-title">Risk Disclosure</h3>
                                </div>
                                <span class="document-toggle">+</span>
                                <a href="./files/Risk_Disclosure_Amber_Rock_Trade_Ltd.pdf" class="document-download" download>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                </a>
                            </div>
                            <div class="document-description">
                                <p>This Risk Disclosure document informs you of the inherent risks associated with trading, by entering into over-the-counter.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video Section -->
        <section class="video-section">
            <div class="container">
                <div class="video-wrapper">
                    <video class="legal-video" autoplay muted loop playsinline>
                        <source src="assets/images/video_1920x1080.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </section>

        <!-- Important Notice -->
        <section class="notice-section">
            <div class="container">
                <div class="notice-title">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span class="gradient-text">Important</span>
                </div>
                <p class="notice-text">
                    By continuing to use our services, you confirm that you have read, understood, and agreed to the terms outlined in these policies. If you have any questions or concerns regarding these documents, please <a href="../contact-us/index.html">contact our legal department</a> for clarification.
                </p>
            </div>
        </section>
    </main>

        <script>
        // Document Accordion
        document.addEventListener('DOMContentLoaded', function() {
            const documentCards = document.querySelectorAll('.document-card');

            documentCards.forEach(card => {
                const header = card.querySelector('.document-header');
                const downloadBtn = card.querySelector('.document-download');

                header.addEventListener('click', function(e) {
                    // Don't toggle if clicking on download button
                    if (e.target.closest('.document-download')) return;

                    // Close other open cards
                    documentCards.forEach(otherCard => {
                        if (otherCard !== card && otherCard.classList.contains('active')) {
                            otherCard.classList.remove('active');
                        }
                    });

                    // Toggle current card
                    card.classList.toggle('active');
                });
            });
        });
    </script>