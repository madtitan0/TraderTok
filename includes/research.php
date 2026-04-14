<style>
.research-page {
  padding-top: 100px;
}

/* Hero Section */
.research-hero {
  padding: 60px 0 80px;
  position: relative;
  overflow: hidden;
}

.research-hero::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -20%;
  width: 600px;
  height: 600px;
  background: radial-gradient(circle, rgba(230, 57, 70, 0.08) 0%, transparent 70%);
  pointer-events: none;
}

.hero-content {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(230, 57, 70, 0.1);
  color: #d02c2d;
  padding: 8px 16px;
  border-radius: 30px;
  font-size: 0.8rem;
  font-weight: 600;
  margin-bottom: 24px;
  border: 1px solid rgba(230, 57, 70, 0.2);
}

.hero-badge svg {
  width: 16px;
  height: 16px;
}

.hero-title {
  font-size: clamp(2.5rem, 5vw, 3.5rem);
  font-weight: 800;
  line-height: 1.1;
  margin-bottom: 24px;
  color: var(--brand-color-start);
}

.hero-description {
  font-size: 1.1rem;
  line-height: 1.8;
  color: var(--text-secondary);
  margin-bottom: 20px;
}

.hero-description-small {
  font-size: 0.95rem;
  line-height: 1.7;
  color: rgba(255, 255, 255, 0.95);
  margin-bottom: 16px;
}

/* Stats Bar */
.stats-bar {
  display: flex;
  justify-content: center;
  gap: 50px;
  margin-top: 50px;
  padding-top: 40px;
  border-top: 1px solid var(--border-color);
}

.stat-item {
  text-align: center;
}

.stat-number {
  font-size: 2.5rem;
  font-weight: 800;
  background: var(--brand-gradient);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.stat-label {
  font-size: 0.85rem;
  color: var(--text-secondary);
  margin-top: 4px;
}

.stat-clock {
  width: 50px;
  height: 50px;
  margin: 0 auto;
}

.clock-icon {
  width: 100%;
  height: 100%;
  color: #d02c2d;
}

.clock-hand {
  transform-origin: 25px 25px;
  animation: clockSpin 3s linear infinite;
}

@keyframes clockSpin {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}

/* Section Styles */
.research-section {
  padding: 60px 0;
}

.section-header {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  margin-bottom: 40px;
  gap: 20px;
}

.section-title-group h2 {
  font-size: clamp(2.25rem, 4.5vw, 3.5rem);
  font-weight: 800;
  margin-bottom: 8px;
}

.section-title-group p {
  color: rgba(255, 255, 255, 0.95);
  font-size: 1rem;
}

.section-tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  color: var(--text-secondary);
  font-size: 0.85rem;
  padding: 8px 16px;
  background: var(--bg-secondary);
  border-radius: 8px;
  border: 1px solid var(--border-color);
}

.section-tag svg {
  width: 16px;
  height: 16px;
  stroke: currentColor;
}

/* Video Cards Grid */
.videos-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 24px;
}

.video-card {
  background: var(--bg-secondary);
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid var(--border-color);
  transition: all 0.3s ease;
}

.video-card:hover {
  border-color: rgba(230, 57, 70, 0.3);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.video-thumbnail {
  position: relative;
  aspect-ratio: 16/9;
  background: var(--bg-tertiary);
  overflow: hidden;
}

.video-thumbnail img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.video-thumbnail::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.6) 0%, transparent 50%);
  z-index: 1;
}

.play-button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 60px;
  height: 60px;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  transition: all 0.3s ease;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.play-button svg {
  width: 24px;
  height: 24px;
  fill: #d02c2d;
  margin-left: 3px;
}

.video-card:hover .play-button {
  transform: translate(-50%, -50%) scale(1.1);
  background: #d02c2d;
}

.video-card:hover .play-button svg {
  fill: white;
}

.video-duration {
  position: absolute;
  bottom: 12px;
  right: 12px;
  background: rgba(0, 0, 0, 0.8);
  color: white;
  padding: 4px 8px;
  border-radius: 4px;
  font-size: 0.75rem;
  font-weight: 600;
  z-index: 2;
}

.video-info {
  padding: 20px;
}

.video-category {
  font-size: 0.75rem;
  color: #d02c2d;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 8px;
}

.video-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 8px;
  line-height: 1.4;
}

.video-meta {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 0.8rem;
  color: var(--text-secondary);
}

.video-meta span {
  display: flex;
  align-items: center;
  gap: 4px;
}

.video-meta svg {
  width: 14px;
  height: 14px;
  stroke: currentColor;
}

/* PDF Reports Grid */
.reports-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 20px;
}

.report-card {
  display: flex;
  align-items: center;
  gap: 16px;
  background: var(--bg-secondary);
  border-radius: 12px;
  padding: 20px;
  border: 1px solid var(--border-color);
  transition: all 0.3s ease;
  cursor: pointer;
}

.report-card:hover {
  border-color: rgba(230, 57, 70, 0.3);
  background: var(--bg-tertiary);
}

.report-icon {
  width: 52px;
  height: 64px;
  background: var(--bg-tertiary);
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  position: relative;
  border: 1px solid var(--border-color);
  overflow: hidden;
}

.report-icon::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 0 14px 14px 0;
  border-color: transparent var(--bg-secondary) transparent transparent;
}

.report-icon::after {
  content: 'PDF';
  position: absolute;
  bottom: 8px;
  font-size: 0.55rem;
  font-weight: 800;
  color: #d02c2d;
  letter-spacing: 0.5px;
  background: rgba(220, 38, 38, 0.1);
  padding: 2px 6px;
  border-radius: 3px;
}

.report-icon svg {
  width: 22px;
  height: 22px;
  stroke: var(--text-secondary);
  margin-bottom: 12px;
  stroke-width: 1.5;
}

.report-info {
  flex: 1;
  min-width: 0;
}

.report-title {
  font-size: 0.95rem;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 4px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.report-meta {
  font-size: 0.8rem;
  color: var(--text-secondary);
}

.report-download {
  width: 40px;
  height: 40px;
  background: var(--bg-tertiary);
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.report-download svg {
  width: 18px;
  height: 18px;
  stroke: var(--text-secondary);
  transition: all 0.3s ease;
}

.report-card:hover .report-download {
  background: #d02c2d;
}

.report-card:hover .report-download svg {
  stroke: white;
}

/* Why Education Section */
.why-education {
  padding: 80px 0;
  margin-top: 60px;
}

.education-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: center;
}

.education-text h2 {
  font-size: clamp(2.25rem, 4.5vw, 3.5rem);
  font-weight: 800;
  margin-bottom: 20px;
}

.education-text p {
  font-size: 1.05rem;
  line-height: 1.8;
  color: rgba(255, 255, 255, 0.95);
  margin-bottom: 16px;
}

.education-features {
  display: flex;
  flex-wrap: wrap;
  gap: 24px;
  margin-top: 30px;
}

.feature-item {
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.feature-icon {
  width: 18px;
  height: 18px;
  color: #22c55e;
  flex-shrink: 0;
}

.feature-item span {
  font-size: 0.9rem;
  font-weight: 500;
  color: var(--text-primary);
}

.education-visual {
  position: relative;
}

.education-image-container {
  border-radius: 20px;
  overflow: hidden;
}

.education-image {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 20px;
}

/* Counter Animation */
.counter {
  display: inline-block;
}

.video-modal {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.85);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 9999;
}

.video-modal-content {
  position: relative;
  width: 90%;
  max-width: 960px;
}

.video-modal video {
  width: 100%;
  border-radius: 14px;
  background: black;
}

.close-btn {
  position: absolute;
  top: -45px;
  right: 0;
  font-size: 32px;
  color: white;
  background: none;
  border: none;
  cursor: pointer;
}


@keyframes countUp {
  from {
    opacity: 0.5;
  }

  to {
    opacity: 1;
  }
}

/* Responsive */
@media (max-width: 900px) {
  .stats-bar {
    gap: 30px;
    flex-wrap: wrap;
  }

  .education-content {
    grid-template-columns: 1fr;
    gap: 40px;
  }

  .section-header {
    flex-direction: column;
    align-items: flex-start;
  }
}

@media (max-width: 600px) {
  .research-hero {
    padding: 40px 0 60px;
  }

  .videos-grid {
    grid-template-columns: 1fr;
  }

  .reports-grid {
    grid-template-columns: 1fr;
  }

  .stat-number {
    font-size: 2rem;
  }

  .education-features {
    justify-content: center;
  }
}

body.light-theme .research-page .hero-description-small,
body.light-theme .research-page .section-title-group p,
body.light-theme .research-page .education-text p {
  color: var(--text-secondary);
}
   </style>

   <!-- Main Content -->
   <main class="research-page" style="background: var(--bg-primary);">
     <!-- Hero Section -->
     <section class="research-hero">
       <div class="container">
         <div class="hero-content">
           <h1 class="hero-title"><span data-i18n="researchPage.heroTitle">Market Insights That</span> <span
               class="" data-i18n="researchPage.heroTitleHighlight">Matter</span></h1>
           <p class="hero-description-small" data-i18n="researchPage.heroDesc1">
             Our research materials are carefully prepared to help traders and investors better understand the markets.
             Each video and PDF on this page has been thoughtfully developed to offer insights that are practical,
             clear, and based on real market experience.
           </p>
           <p class="hero-description-small" data-i18n="researchPage.heroDesc2">
             We know the financial world can be complex, so we aim to present information in a way that's structured and
             easy to follow, without losing the depth that matters.
           </p>
           <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>

           <div class="stats-bar">
             <div class="stat-item">
               <div class="stat-number"><span class="counter" data-target="50">0</span>+</div>
               <div class="stat-label" data-i18n="researchPage.videoLessons">Video Lessons</div>
             </div>
             <div class="stat-item">
               <div class="stat-number"><span class="counter" data-target="25">0</span>+</div>
               <div class="stat-label" data-i18n="researchPage.pdfReports">PDF Reports</div>
             </div>
             <div class="stat-item">
               <div class="stat-clock">
                 <svg viewBox="0 0 50 50" class="clock-icon">
                   <circle cx="25" cy="25" r="22" fill="none" stroke="currentColor" stroke-width="2" opacity="0.3" />
                   <circle cx="25" cy="25" r="2" fill="currentColor" />
                   <line x1="25" y1="25" x2="25" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     class="clock-hand" />
                 </svg>
               </div>
               <div class="stat-label" data-i18n="researchPage.weeklyUpdates">Weekly Updates</div>
             </div>
           </div>
         </div>
       </div>
     </section>

     <!-- Video Materials Section -->
     <section class="research-section">
       <div class="container">
         <div class="section-header">
           <div class="section-title-group">
             <h2 data-i18n="researchPage.videoMaterials">Video Materials</h2>
             <p data-i18n="researchPage.videoMaterialsDesc">Watch our expert analysis and trading insights</p>
           </div>
           <div class="section-tag">
             <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
               <polygon points="5 3 19 12 5 21 5 3" />
             </svg>
             <span data-i18n="researchPage.latestVideos">Latest Videos</span>
           </div>
         </div>

         <div class="videos-grid">
           <!-- Video Card 1 -->
                       <div class="video-card">
             <div class="video-thumbnail">
               <div
                 style="background: linear-gradient(135deg, #1a1a2e 0%, #d02c2d 50%, #1a1a2e 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                 <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)"
                   stroke-width="1">
                   <rect x="3" y="3" width="18" height="18" rx="2" />
                   <line x1="3" y1="9" x2="21" y2="9" />
                   <line x1="9" y1="21" x2="9" y2="9" />
                 </svg>
               </div>
               <div class="play-button">
                 <svg viewBox="0 0 24 24">
                   <polygon points="5 3 19 12 5 21 5 3" />
                 </svg>
               </div>
               <span class="video-duration">24:15</span>
             </div>
             <div class="video-info">
               <div class="video-category">Trading Strategy</div>
               <h3 class="video-title">CFDs Types</h3>
               <div class="video-meta">
                 <span>
                   <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                     <circle cx="12" cy="12" r="10" />
                     <polyline points="12 6 12 12 16 14" />
                   </svg>
                   Dec 15, 2024
                 </span>
                 <!-- <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    3.1k views
                                </span> -->
               </div>
             </div>
           </div>

           <!-- Video Card 2 -->
            <div class="video-card">
             <div class="video-thumbnail">
               <div
                 style="background: linear-gradient(135deg, #1a1a2e 0%, #d02c2d 50%, #1a1a2e 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                 <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)"
                   stroke-width="1">
                   <rect x="3" y="3" width="18" height="18" rx="2" />
                   <line x1="3" y1="9" x2="21" y2="9" />
                   <line x1="9" y1="21" x2="9" y2="9" />
                 </svg>
               </div>
               <div class="play-button">
                 <svg viewBox="0 0 24 24">
                   <polygon points="5 3 19 12 5 21 5 3" />
                 </svg>
               </div>
               <span class="video-duration">24:15</span>
             </div>
             <div class="video-info">
               <div class="video-category">Trading Strategy</div>
               <h3 class="video-title">Market Types</h3>
               <div class="video-meta">
                 <span>
                   <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                     <circle cx="12" cy="12" r="10" />
                     <polyline points="12 6 12 12 16 14" />
                   </svg>
                   Dec 8, 2024
                 </span>
                 <!-- <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    3.1k views
                                </span> -->
               </div>
             </div>
           </div>


           <!-- Video Card 3 -->
           <div class="video-card">
             <div class="video-thumbnail">
               <div
                 style="background: linear-gradient(135deg, #1a1a2e 0%, #d02c2d 50%, #1a1a2e 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                 <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)"
                   stroke-width="1">
                   <rect x="3" y="3" width="18" height="18" rx="2" />
                   <line x1="3" y1="9" x2="21" y2="9" />
                   <line x1="9" y1="21" x2="9" y2="9" />
                 </svg>
               </div>
               <div class="play-button">
                 <svg viewBox="0 0 24 24">
                   <polygon points="5 3 19 12 5 21 5 3" />
                 </svg>
               </div>
               <span class="video-duration">24:15</span>
             </div>
             <div class="video-info">
               <div class="video-category">Market Analysis</div>
               <h3 class="video-title">Weekly Market Outlook: Forex & Commodities</h3>
               <div class="video-meta">
                 <span>
                   <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                     <circle cx="12" cy="12" r="10" />
                     <polyline points="12 6 12 12 16 14" />
                   </svg>
                   Dec 8, 2024
                 </span>
                 <!-- <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    3.1k views
                                </span> -->
               </div>
             </div>
           </div>

           <!-- Video Card 4 -->
           <div class="video-card">
             <div class="video-thumbnail">
               <div
                 style="background: linear-gradient(135deg, #2d4059 0%, #d02c2d 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                 <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)"
                   stroke-width="1">
                   <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                 </svg>
               </div>
               <div class="play-button">
                 <svg viewBox="0 0 24 24">
                   <polygon points="5 3 19 12 5 21 5 3" />
                 </svg>
               </div>
               <span class="video-duration">15:20</span>
             </div>
             <div class="video-info">
               <div class="video-category">Technical Analysis</div>
               <h3 class="video-title">Building a Diversified Trading Portfolio</h3>
               <div class="video-meta">
                 <span>
                   <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                     <circle cx="12" cy="12" r="10" />
                     <polyline points="12 6 12 12 16 14" />
                   </svg>
                   Dec 5, 2024
                 </span>
                 <!-- <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    2.0k views
                                </span> -->
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>

     <!-- PDF Reports Section -->
     <section class="research-section">
       <div class="container">
         <div class="section-header">
           <div class="section-title-group">
             <h2 data-i18n="researchPage.researchReports">Research Reports</h2>
             <p data-i18n="researchPage.researchReportsDesc">Download in-depth analysis and detailed market reports</p>
           </div>
           <div class="section-tag">
             <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
               <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
               <polyline points="14 2 14 8 20 8" />
             </svg>
             <span data-i18n="researchPage.pdfDownloads">PDF Downloads</span>
           </div>
         </div>

         <div class="reports-grid">
           <div class="report-card">
             <div class="report-icon">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                 <polyline points="14 2 14 8 20 8" />
               </svg>
             </div>
             <div class="report-info">
               <h4 class="report-title">Q4 2024 Market Outlook</h4>
               <p class="report-meta">2.4 MB • Updated Dec 2024</p>
             </div>
             <div class="report-download">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                 <polyline points="7 10 12 15 17 10" />
                 <line x1="12" y1="15" x2="12" y2="3" />
               </svg>
             </div>
           </div>

           <div class="report-card">
             <div class="report-icon">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                 <polyline points="14 2 14 8 20 8" />
               </svg>
             </div>
             <div class="report-info">
               <h4 class="report-title">Forex Trading Strategies Guide</h4>
               <p class="report-meta">3.1 MB • Updated Nov 2024</p>
             </div>
             <div class="report-download">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                 <polyline points="7 10 12 15 17 10" />
                 <line x1="12" y1="15" x2="12" y2="3" />
               </svg>
             </div>
           </div>

           <div class="report-card">
             <div class="report-icon">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                 <polyline points="14 2 14 8 20 8" />
               </svg>
             </div>
             <div class="report-info">
               <h4 class="report-title">Cryptocurrency Market Analysis</h4>
               <p class="report-meta">1.8 MB • Updated Dec 2024</p>
             </div>
             <div class="report-download">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                 <polyline points="7 10 12 15 17 10" />
                 <line x1="12" y1="15" x2="12" y2="3" />
               </svg>
             </div>
           </div>

           <div class="report-card">
             <div class="report-icon">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                 <polyline points="14 2 14 8 20 8" />
               </svg>
             </div>
             <div class="report-info">
               <h4 class="report-title">Risk Management Handbook</h4>
               <p class="report-meta">2.7 MB • Updated Oct 2024</p>
             </div>
             <div class="report-download">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                 <polyline points="7 10 12 15 17 10" />
                 <line x1="12" y1="15" x2="12" y2="3" />
               </svg>
             </div>
           </div>

           <div class="report-card">
             <div class="report-icon">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                 <polyline points="14 2 14 8 20 8" />
               </svg>
             </div>
             <div class="report-info">
               <h4 class="report-title">Technical Indicators Explained</h4>
               <p class="report-meta">4.2 MB • Updated Nov 2024</p>
             </div>
             <div class="report-download">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                 <polyline points="7 10 12 15 17 10" />
                 <line x1="12" y1="15" x2="12" y2="3" />
               </svg>
             </div>
           </div>

           <div class="report-card">
             <div class="report-icon">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                 <polyline points="14 2 14 8 20 8" />
               </svg>
             </div>
             <div class="report-info">
               <h4 class="report-title">Commodities Trading Guide</h4>
               <p class="report-meta">2.9 MB • Updated Sep 2024</p>
             </div>
             <div class="report-download">
               <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                 <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                 <polyline points="7 10 12 15 17 10" />
                 <line x1="12" y1="15" x2="12" y2="3" />
               </svg>
             </div>
           </div>
         </div>
       </div>
     </section>

     <!-- Why Education Section -->
     <section class="why-education">
       <div class="container">
         <div class="education-content">
           <div class="education-text">
             <h2><span data-i18n="researchPage.whyEducation">Why Education</span> <span class=""
                 data-i18n="researchPage.whyEducationHighlight">Matters</span></h2>
             <p data-i18n="researchPage.whyEducationDesc1">
               In the fast-paced world of trading and investing, education is not optional—it's essential. Sound
               decision-making starts with understanding the instruments, the risks, and the broader economic context.
             </p>
             <p data-i18n="researchPage.whyEducationDesc2">
               Markets change, patterns evolve, and new opportunities emerge every day—those best prepared are those who
               stay informed. We believe that empowering traders with knowledge is one of the most valuable services we
               can offer.
             </p>

             <div class="education-features">
               <div class="feature-item">
                 <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                   stroke-linecap="round" stroke-linejoin="round">
                   <polyline points="20 6 9 17 4 12" />
                 </svg>
                 <span data-i18n="researchPage.practicalInsights">Practical Insights</span>
               </div>
               <div class="feature-item">
                 <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                   stroke-linecap="round" stroke-linejoin="round">
                   <polyline points="20 6 9 17 4 12" />
                 </svg>
                 <span data-i18n="researchPage.expertAnalysis">Expert Analysis</span>
               </div>
               <div class="feature-item">
                 <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                   stroke-linecap="round" stroke-linejoin="round">
                   <polyline points="20 6 9 17 4 12" />
                 </svg>
                 <span data-i18n="researchPage.weeklyUpdatesFeature">Weekly Updates</span>
               </div>
               <div class="feature-item">
                 <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                   stroke-linecap="round" stroke-linejoin="round">
                   <polyline points="20 6 9 17 4 12" />
                 </svg>
                 <span data-i18n="researchPage.clearStructure">Clear Structure</span>
               </div>
             </div>
           </div>

           <div class="education-visual">
             <div class="education-image-container">
               <img src="assets/images/10030610.png" alt="Why Education Matters" class="education-image">
             </div>
           </div>
         </div>
       </div>
     </section>
   </main>




   <script>
document.addEventListener('DOMContentLoaded', function() {
  // Counter Animation
  const counters = document.querySelectorAll('.counter');

  const animateCounter = (counter) => {
    const target = parseInt(counter.getAttribute('data-target'));
    const duration = 2000;
    const startTime = performance.now();

    const updateCount = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const easeOut = 1 - Math.pow(1 - progress, 3);
      const current = Math.floor(easeOut * target);

      counter.textContent = current;

      if (progress < 1) {
        requestAnimationFrame(updateCount);
      } else {
        counter.textContent = target;
      }
    };

    requestAnimationFrame(updateCount);
  };

  // Intersection Observer
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.5
  });

  counters.forEach(counter => observer.observe(counter));


  // Lazy Loading Video Thumbnails with Duration Detection
  const videoObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const video = entry.target;
        const source = video.querySelector('source[data-src]');
        const durationSpan = document.getElementById(video.id.replace('video-preview-', 'duration-'));

        if (source && source.dataset.src) {
          // Load the video source
          source.src = source.dataset.src;
          video.load();

          // Get duration when metadata loads
          video.addEventListener('loadedmetadata', function() {
            const duration = video.duration;
            const minutes = Math.floor(duration / 60);
            const seconds = Math.floor(duration % 60);
            if (durationSpan) {
              durationSpan.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            }
          });

          // Stop observing this video
          videoObserver.unobserve(video);
        }
      }
    });
  }, {
    rootMargin: '50px' // Start loading 50px before video enters viewport
  });

  // Observe all video previews dynamically
  const allVideoPreviews = document.querySelectorAll('video[data-src]');
  allVideoPreviews.forEach(video => {
    videoObserver.observe(video);
  });
});
   </script>
 