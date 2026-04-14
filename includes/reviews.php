<section class="page-hero">
  <video class="page-hero-video" autoplay loop muted playsinline>
    <source src="assets/images/education.mp4" type="video/mp4">
  </video>
  <div class="page-hero-overlay"></div>

  <div class="container">
    <div class="page-hero-content" style="justify-content: start; align-items: flex-start; text-align: left;">
      <div class="page-hero-badge">
        <span>Client Reviews</span>
      </div>
      <h1 class="doc-page-hero-title">CLIENT REVIEWS</h1>
      <p class="doc-page-hero-subtitle">
        At TraderTok, we place strong emphasis on transparency, client satisfaction, and continuous improvement.
        We actively listen to client feedback and use it to strengthen the platform, services, and overall trading experience.
      </p>
      <p class="doc-page-hero-subtitle">
        Our growing community of traders reflects our commitment to delivering a reliable and professional trading environment.
      </p>
    </div>
  </div>
</section>

<section class="reviews-page">
  <div class="container">
    <div class="reviews-grid">
      <article class="reviews-card reviews-card--primary">
        <div class="reviews-eyebrow">What Our Clients Say</div>
        <h2>Independent feedback helps users understand the TraderTok experience</h2>
        <p>
          We encourage all users to explore independent reviews and ratings to better understand how clients
          experience TraderTok across support, trading access, and everyday platform use.
        </p>
        <a class="reviews-cta" href="https://www.trustpilot.com/review/tradertok.com?stars=5" target="_blank" rel="noopener noreferrer">
          View Verified Reviews on Trustpilot
        </a>
      </article>

      <article class="reviews-card">
        <div class="reviews-eyebrow">Why Reviews Matter</div>
        <h2>Feedback is part of how the platform improves</h2>
        <ul class="reviews-list">
          <li>Continuously improve the platform and services</li>
          <li>Maintain transparency and accountability</li>
          <li>Build long-term trust with the trading community</li>
        </ul>
      </article>
    </div>

    <article class="reviews-section-card">
      <div class="reviews-eyebrow">Our Commitment</div>
      <h2>What TraderTok continues to focus on</h2>
      <div class="reviews-commitment-grid">
        <article class="reviews-commitment-card">
          <h3>Secure and Transparent Environment</h3>
          <p>We remain committed to providing a trading environment built around security, transparency, and operational clarity.</p>
        </article>
        <article class="reviews-commitment-card">
          <h3>Responsive Client Support</h3>
          <p>Our goal is to provide timely, professional assistance that helps users navigate the platform with confidence.</p>
        </article>
        <article class="reviews-commitment-card">
          <h3>Continuous Improvement</h3>
          <p>Real user feedback plays an important role in how the TraderTok experience evolves over time.</p>
        </article>
        <article class="reviews-commitment-card">
          <h3>Trust at the Core</h3>
          <p>Your confidence in the platform, the service, and the overall experience remains central to our long-term approach.</p>
        </article>
      </div>
    </article>

    <article class="reviews-note-card">
      <div class="reviews-eyebrow">Transparency Note</div>
      <h2>Reviews reflect individual experiences</h2>
      <p>
        Reviews and testimonials reflect individual client experiences and may not represent the experience of all users.
        Trading outcomes vary and are influenced by market conditions, individual strategies, and risk management practices.
      </p>
    </article>
  </div>
</section>

<style>
.reviews-page {
  padding: 80px 0 110px;
  background:
    radial-gradient(circle at top right, rgba(230, 57, 70, 0.08), transparent 28%),
    linear-gradient(180deg, rgba(8, 8, 8, 1) 0%, rgba(12, 12, 12, 1) 100%);
}

.reviews-grid {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 24px;
  margin-bottom: 24px;
}

.reviews-card,
.reviews-section-card,
.reviews-note-card {
  background: rgba(255, 255, 255, 0.025);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 28px;
  padding: 32px;
  box-shadow: 0 18px 40px rgba(0, 0, 0, 0.24);
}

.reviews-card--primary,
.reviews-note-card {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.08) 0%, rgba(255, 255, 255, 0.02) 100%);
}

.reviews-eyebrow {
  color: #d02c2d;
  font-size: 0.86rem;
  font-weight: 800;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  margin-bottom: 14px;
}

.reviews-card h2,
.reviews-section-card h2,
.reviews-note-card h2,
.reviews-commitment-card h3 {
  color: #ffffff;
  line-height: 1.3;
}

.reviews-card h2,
.reviews-section-card h2,
.reviews-note-card h2 {
  font-size: clamp(1.4rem, 2vw, 2rem);
  margin-bottom: 14px;
}

.reviews-card p,
.reviews-note-card p,
.reviews-list li,
.reviews-commitment-card p {
  color: rgba(255, 255, 255, 0.74);
  font-size: 1rem;
  line-height: 1.8;
}

.reviews-list {
  margin: 0;
  padding-left: 20px;
}

.reviews-list li {
  margin-bottom: 10px;
}

.reviews-cta {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
  padding: 14px 20px;
  border-radius: 999px;
  background: linear-gradient(135deg, #d02c2d 0%, #d02c2d 100%);
  color: #ffffff;
  font-weight: 700;
  text-decoration: none;
  box-shadow: 0 12px 28px rgba(230, 57, 70, 0.25);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.reviews-cta:hover {
  transform: translateY(-2px);
  box-shadow: 0 16px 32px rgba(230, 57, 70, 0.32);
}

.reviews-commitment-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 18px;
  margin-top: 20px;
}

.reviews-commitment-card {
  padding: 22px;
  border-radius: 22px;
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.08);
}

.reviews-commitment-card h3 {
  font-size: 1.05rem;
  margin-bottom: 10px;
}

@media (max-width: 980px) {
  .reviews-grid,
  .reviews-commitment-grid {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 640px) {
  .reviews-page {
    padding: 64px 0 90px;
  }

  .reviews-card,
  .reviews-section-card,
  .reviews-note-card {
    padding: 26px 22px;
  }
}
</style>
