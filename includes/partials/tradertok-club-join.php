<section class="education-subpage education-subpage--register tradertok-club-join-page">
  <section class="education-subpage-content education-subpage-content--register-page">
    <div class="container" style="padding-top: 100px;">
      <div class="registration-account-layout">
        <div class="registration-account-intro">
          <h1 class="education-subpage-section-title">Join TraderTok Club</h1>
          <p class="registration-page-hero-lead">
            Get daily trading insights, market updates, and beginner-friendly education designed to help you grow as a trader.
          </p>
          <h2 class="registration-page-hero-title">What to expect</h2>
          <ul class="registration-account-bullets">
            <li>Daily insight and market update flow</li>
            <li>Beginner-friendly education and practical guidance</li>
            <li>Fast onboarding into the TraderTok community</li>
          </ul>
          <p class="registration-account-crosslink-wrap">
            <a href="<?php echo htmlspecialchars(routeUrl('tradertok-club')); ?>" class="registration-account-crosslink">Back to TraderTok Club</a>
          </p>
        </div>

        <div class="registration-account-card">
          <div class="education-article-meta">TraderTok Club</div>
          <h3 class="registration-account-card-title">Join TraderTok Club</h3>
          <form class="deposit-form registration-account-form" id="traderTokClubJoinForm" novalidate>
            <div class="form-group">
              <label for="clubFullName">Full Name</label>
              <input id="clubFullName" type="text" name="full_name" placeholder="Your full name" required autocomplete="name">
            </div>
            <div class="form-group">
              <label for="clubEmail">Email Address</label>
              <input id="clubEmail" type="email" name="email" placeholder="you@example.com" required autocomplete="email">
            </div>
            <div class="form-group">
              <label for="clubPhone">Phone Number</label>
              <input id="clubPhone" type="tel" name="phone" placeholder="Include country code" required autocomplete="tel">
            </div>
            <div class="form-group">
              <label for="clubCountry">Country</label>
              <select id="clubCountry" name="country" required>
                <option value="">Select...</option>
                <option value="GB">United Kingdom</option>
                <option value="US">United States</option>
                <option value="DE">Germany</option>
                <option value="FR">France</option>
                <option value="AU">Australia</option>
                <option value="CA">Canada</option>
                <option value="SG">Singapore</option>
                <option value="AE">United Arab Emirates</option>
                <option value="ZA">South Africa</option>
                <option value="NG">Nigeria</option>
                <option value="IN">India</option>
                <option value="MY">Malaysia</option>
                <option value="OTHER">Other</option>
              </select>
            </div>
            <div class="form-group">
              <label for="clubExperience">Trading Experience</label>
              <select id="clubExperience" name="trading_experience" required>
                <option value="">Select your experience</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
              </select>
            </div>
            <div class="form-group">
              <label for="clubHeardAbout">How did you hear about us?</label>
              <select id="clubHeardAbout" name="heard_about" required>
                <option value="">Select an option</option>
                <option value="search">Search engine</option>
                <option value="social">Social media</option>
                <option value="friend">Friend or colleague</option>
                <option value="event">Webinar or event</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="edu-lead-gate-consent club-whatsapp-optin">
              <label class="edu-lead-gate-check-label">
                <input id="clubWhatsappOptin" type="checkbox" name="whatsapp_optin" value="1">
              </label>
              <span>Send me updates via WhatsApp</span>
            </div>

            <p class="edu-lead-gate-error" id="traderTokClubJoinError" role="alert" hidden></p>

            <button type="submit" class="btn-primary registration-account-submit">Join TraderTok Club</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<style>
.club-whatsapp-optin {
  margin: 8px 0 2px;
}

.club-whatsapp-optin span {
  color: var(--text-secondary);
}
</style>

<script>
(function() {
  var form = document.getElementById('traderTokClubJoinForm');
  var err = document.getElementById('traderTokClubJoinError');
  var thankYou = <?php echo json_encode(routeUrl('lead-thank-you', ['kind' => 'club'])); ?>;

  if (!form) return;

  function showError(message) {
    if (!err) return;
    err.textContent = message || '';
    err.hidden = !message;
  }

  function valueOf(name) {
    var field = form.querySelector('[name="' + name + '"]');
    if (!field || typeof field.value !== 'string') return '';
    return field.value.trim();
  }

  function isValidEmail(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
  }

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    showError('');

    var fullName = valueOf('full_name');
    var email = valueOf('email');
    var phone = valueOf('phone');
    var country = valueOf('country');
    var tradingExperience = valueOf('trading_experience');
    var heardAbout = valueOf('heard_about');
    var whatsappOptin = !!(form.querySelector('[name="whatsapp_optin"]') || {}).checked;

    if (!fullName) {
      showError('Please enter your full name.');
      return;
    }
    if (!email || !isValidEmail(email)) {
      showError('Please enter a valid email address.');
      return;
    }
    if (!phone) {
      showError('Please enter your phone number.');
      return;
    }
    if (!country) {
      showError('Please select your country.');
      return;
    }
    if (!tradingExperience) {
      showError('Please select your trading experience.');
      return;
    }
    if (!heardAbout) {
      showError('Please tell us how you heard about us.');
      return;
    }

    var payload = {
      full_name: fullName,
      email: email,
      phone: phone,
      country: country,
      trading_experience: tradingExperience,
      heard_about: heardAbout,
      whatsapp_optin: whatsappOptin
    };

    if (window.console && typeof window.console.info === 'function') {
      window.console.info('TraderTok Club lead captured (simulated)', payload);
    }

    window.location.href = thankYou;
  });
})();
</script>
