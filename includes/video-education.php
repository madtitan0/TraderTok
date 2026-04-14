  <style>
/* 
.page-hero1 {
padding : 650px 0 600px;
height: 100vh;
} */
/* Video Cards Grid */
.videos-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 20px;
  margin-top: 40px;
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
@media (max-width: 768px) {
  .page-hero {
    overflow: visible !important;
    height: auto !important;
  }
}
   </style>
  
  
  <!-- Video Education Section with Video Background -->
    <section class="page-hero ">
        <!-- Video Background -->
        <video class="page-hero-video" autoplay loop muted playsinline>
            <source src="assets/images/education.mp4" type="video/mp4">
        </video>

        <!-- Overlay -->
        <div class="page-hero-overlay"></div>

        <div class="container">
            <div class="page-hero-content">
                <!-- <div class="page-hero-badge">
                    <span data-i18n="videoEducationPage.comingSoon">Coming Soon</span>
                </div> -->
                <h1 class="page-hero-title">
                    <span data-i18n="videoEducationPage.heroTitle">Video</span> <span class="gradient-text" data-i18n="videoEducationPage.heroTitleHighlight">Education</span>
                </h1>
                <p class="page-hero-subtitle" data-i18n="videoEducationPage.heroSubtitle">
                    TraderTok offers a wide range of educational resources. One way to learn more about trading, is through our extensive video gallery, covering dozens of hot topics, constantly relevant for traders, both professional and beginners alike.
                </p>
                <?php include __DIR__ . '/partials/education-subpage-hero-ctas.php'; ?>

                         <div class="videos-grid">
           <!-- Video Card 1 -->
           <div class="video-card">
             <div class="video-thumbnail" onclick="openVideo('assets/videos/vid1.mp4')">
               <!-- <div style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="1">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                                </svg>
                            </div> -->
               <!-- <video preload="metadata" muted playsinline style="width: 100%; height: 100%; object-fit: cover;">
                                <source src="assets/videos/vid1.mp4#t=0.5" type="video/mp4">
                            </video> -->
               <video id="video-preview-1" preload="none" muted playsinline
                 style="width: 100%; height: 100%; object-fit: cover;" data-src="assets/videos/vid1.mp4#t=0.5">
                 <source data-src="assets/videos/vid1.mp4#t=0.5" type="video/mp4">
               </video>
               <div class="play-button">
                 <svg viewBox="0 0 24 24">
                   <polygon points="5 3 19 12 5 21 5 3" />
                 </svg>
               </div>
               <!-- <span class="video-duration">12:45</span> -->
               <span class="video-duration" id="duration-1">--:--</span>
             </div>
             <div class="video-info">
               <div class="video-category">Trading Strategy</div>
               <h3 class="video-title"> Understanding Trading Accounts: A Comprehensive Guide</h3>
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
                                    2.4k views
                                </span> -->
               </div>
             </div>
           </div>

           <!-- Video Card 2 -->
           <div class="video-card">
             <div class="video-thumbnail" onclick="openVideo('assets/videos/vid2.mp4')">
               <video id="video-preview-2" preload="none" muted playsinline
                 style="width: 100%; height: 100%; object-fit: cover;" data-src="assets/videos/vid2.mp4#t=0.5">
                 <source data-src="assets/videos/vid2.mp4#t=0.5" type="video/mp4">
               </video>
               <div class="play-button">
                 <svg viewBox="0 0 24 24">
                   <polygon points="5 3 19 12 5 21 5 3" />
                 </svg>
               </div>
               <span class="video-duration" id="duration-2">--:--</span>
             </div>
             <div class="video-info">
               <div class="video-category">Trading Strategy</div>
               <h3 class="video-title">Mastering CFD Trading Orders & Market Types</h3>
               <div class="video-meta">
                 <span>
                   <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                     <circle cx="12" cy="12" r="10" />
                     <polyline points="12 6 12 12 16 14" />
                   </svg>
                   Dec 10, 2024
                 </span>
                 <!-- <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    1.8k views
                                </span> -->
               </div>
             </div>
           </div>

                      <!-- Video Card 3 -->
           <div class="video-card">
             <div class="video-thumbnail" onclick="openVideo('assets/videos/vid3.mp4')">
               <video id="video-preview-2" preload="none" muted playsinline
                 style="width: 100%; height: 100%; object-fit: cover;" data-src="assets/videos/vid3.mp4#t=0.5">
                 <source data-src="assets/videos/vid3.mp4#t=0.5" type="video/mp4">
               </video>
               <div class="play-button">
                 <svg viewBox="0 0 24 24">
                   <polygon points="5 3 19 12 5 21 5 3" />
                 </svg>
               </div>
               <span class="video-duration" id="duration-2">--:--</span>
             </div>
             <div class="video-info">
               <div class="video-category">Trading Strategy</div>
               <h3 class="video-title">Advanced Strategies</h3>
               <div class="video-meta">
                 <span>
                   <svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                     <circle cx="12" cy="12" r="10" />
                     <polyline points="12 6 12 12 16 14" />
                   </svg>
                   Dec 10, 2024
                 </span>
                 <!-- <span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    1.8k views
                                </span> -->
               </div>
             </div>
           </div>

         </div>
            </div>
        </div>
    </section>


      <div id="videoModal" class="video-modal">
     <div class="video-modal-content">
       <button class="close-btn" onclick="closeVideo()">×</button>

       <video id="videoPlayer" controls preload="metadata">
         <source src="" type="video/mp4">
         Your browser does not support the video tag.
       </video>
     </div>
   </div>



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
   <script>
function openVideo(src) {
  const modal = document.getElementById("videoModal");
  const video = document.getElementById("videoPlayer");

  video.src = src;
  modal.style.display = "flex";
  video.play();
}

function closeVideo() {
  const modal = document.getElementById("videoModal");
  const video = document.getElementById("videoPlayer");

  video.pause();
  video.currentTime = 0;
  video.src = "";
  modal.style.display = "none";
}
   </script>