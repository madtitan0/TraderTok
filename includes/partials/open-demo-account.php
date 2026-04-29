<section class="education-subpage education-subpage--register">
  <section class="education-subpage-content education-subpage-content--register-page">
    <div class="container" style="padding-top: 100px;">
      <div class="registration-account-layout">
        <div class="registration-account-intro">
          <h1 class="education-subpage-section-title" data-i18n="openDemoAccountPage.heroTitle">Open a free demo account
          </h1>
          <p class="registration-page-hero-lead" data-i18n="openDemoAccountPage.heroLead">
            Practice with virtual funds on live market data. Submit your details below; our team will follow up with
            next steps. No payment required for a demo.
          </p>
          <h2 class="registration-page-hero-title " data-i18n="openDemoAccountPage.whyTitle">Why start with a demo?</h2>
          <p class="section-body" data-i18n="openDemoAccountPage.whyBody">A demo account lets you explore the platform,
            charts, and order types in a risk-free environment while you learn how markets move.</p>
          <ul class="registration-account-bullets">
            <li data-i18n="openDemoAccountPage.bullet1">Virtual balance for practice</li>
            <li data-i18n="openDemoAccountPage.bullet2">Live market pricing for realistic context</li>
            <li data-i18n="openDemoAccountPage.bullet3">No deposit required to get started</li>
          </ul>
          <p class="registration-account-crosslink-wrap">
            <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>"
              class="registration-account-crosslink" data-i18n="openDemoAccountPage.liveCrosslink">Open a live
              account</a>
          </p>
          <!-- <p class="edu-lead-gate-note" data-i18n="openDemoAccountPage.formNote">This form is not yet connected to a -->
            live CRM. Submissions are simulated until you wire your registration API.</p>
        </div>
        <div class="registration-account-card">
          <div class="education-article-meta" data-i18n="openDemoAccountPage.cardMeta">Your details</div>
          <h3 class="registration-account-card-title" data-i18n="openDemoAccountPage.cardTitle">Request a demo account
          </h3>
          <form class="deposit-form registration-account-form" id="openDemoAccountPageForm" novalidate>
            <div class="form-group">
              <label for="openDemoName" data-i18n="openDemoAccountPage.labelFullName">Full name</label>
              <input id="openDemoName" type="text" name="name"
                data-i18n-placeholder="openDemoAccountPage.placeholderFullName" placeholder="Your full name" required
                autocomplete="name">
            </div>
            <div class="form-group">
              <label for="openDemoEmail" data-i18n="openDemoAccountPage.labelEmail">Email address</label>
              <input id="openDemoEmail" type="email" name="email"
                data-i18n-placeholder="openDemoAccountPage.placeholderEmail" placeholder="you@example.com" required
                autocomplete="email">
            </div>
            <div class="form-group">
              <label for="openDemoPhone" data-i18n="openDemoAccountPage.labelPhone">Phone</label>
              <input id="openDemoPhone" type="tel" name="phone"
                data-i18n-placeholder="openDemoAccountPage.placeholderPhone" placeholder="Include country code" required
                autocomplete="tel">
            </div>
            <div class="form-group">
              <label for="openDemoCountry" data-i18n="openDemoAccountPage.labelCountry">Country / region</label>
              <select id="openDemoCountry" name="country" required>
                <option value="" data-i18n="openDemoAccountPage.selectPlaceholder">Select…</option>
                <option value="GB" data-i18n="openDemoAccountPage.countries.GB">United Kingdom</option>
                <option value="US" data-i18n="openDemoAccountPage.countries.US">United States</option>
                <option value="DE" data-i18n="openDemoAccountPage.countries.DE">Germany</option>
                <option value="FR" data-i18n="openDemoAccountPage.countries.FR">France</option>
                <option value="AU" data-i18n="openDemoAccountPage.countries.AU">Australia</option>
                <option value="CA" data-i18n="openDemoAccountPage.countries.CA">Canada</option>
                <option value="SG" data-i18n="openDemoAccountPage.countries.SG">Singapore</option>
                <option value="AE" data-i18n="openDemoAccountPage.countries.AE">United Arab Emirates</option>
                <option value="ZA" data-i18n="openDemoAccountPage.countries.ZA">South Africa</option>
                <option value="NG" data-i18n="openDemoAccountPage.countries.NG">Nigeria</option>
                <option value="IN" data-i18n="openDemoAccountPage.countries.IN">India</option>
                <option value="MY" data-i18n="openDemoAccountPage.countries.MY">Malaysia</option>
                <option value="OTHER" data-i18n="openDemoAccountPage.countries.OTHER">Other</option>
              </select>
            </div>
            <div class="form-group">
              <label for="openDemoHeardAbout">How did you hear about us?</label>
              <select id="openDemoHeardAbout" name="heard_about" required>
                <option value="">Select an option</option>
                <option value="search">Search engine</option>
                <option value="social">Social media</option>
                <option value="friend">Friend or colleague</option>
                <option value="event">Webinar or event</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="edu-lead-gate-consent">
              <label class="edu-lead-gate-check-label">
                <input type="checkbox" name="consent" id="claimOfferConsent" value="1" required>
              </label>
              <span data-i18n-html="claimOfferPage.consentHtml">I understand that trading
                carries risk and I
                agree to be contacted about this offer. I have read the <a href="./privacy-policy" target="_blank"
                  rel="noopener noreferrer">Privacy Policy</a>.</span>
            </div>
            <p class="edu-lead-gate-error" id="openDemoPageError" role="alert" hidden></p>
            <button type="submit" class="btn-primary registration-account-submit"
              data-i18n="openDemoAccountPage.submitButton">Submit demo request</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<script>
(function() {
  var form = document.getElementById('openDemoAccountPageForm');
  var err = document.getElementById('openDemoPageError');
  var thankYou = <?php echo json_encode(routeUrl('lead-thank-you', ['kind' => 'demo'])); ?>;

  function tr(key) {
    if (window.i18n && typeof window.i18n.t === 'function') {
      var out = window.i18n.t(key);
      if (out && out !== key) return out;
    }
    return key;
  }

  function showError(msg) {
    if (!err) return;
    err.textContent = msg || '';
    err.hidden = !msg;
  }

  if (!form) return;

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    showError('');

    var name = (form.querySelector('[name="name"]') || {}).value;
    var email = (form.querySelector('[name="email"]') || {}).value;
    var phone = (form.querySelector('[name="phone"]') || {}).value;
    var country = (form.querySelector('[name="country"]') || {}).value;
    var heardAbout = (form.querySelector('[name="heard_about"]') || {}).value;
    var consent = form.querySelector('[name="consent"]');

    name = name ? name.trim() : '';
    email = email ? email.trim() : '';
    phone = phone ? phone.trim() : '';
    heardAbout = heardAbout ? heardAbout.trim() : '';

    if (!name) {
      showError(tr('openDemoAccountPage.errors.nameRequired'));
      return;
    }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showError(tr('openDemoAccountPage.errors.emailInvalid'));
      return;
    }
    if (!phone) {
      showError(tr('openDemoAccountPage.errors.phoneRequired'));
      return;
    }
    if (!country) {
      showError(tr('openDemoAccountPage.errors.countryRequired'));
      return;
    }
    if (!heardAbout) {
      showError('Please tell us how you heard about us.');
      return;
    }
    if (!consent || !consent.checked) {
      showError(tr('openDemoAccountPage.errors.consentRequired'));
      return;
    }

    window.location.href = thankYou;
  });
})();
</script>