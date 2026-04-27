<section class="education-subpage education-subpage--register">
  <section class="education-subpage-content education-subpage-content--register-page">
    <div class="container" style="padding-top: 100px;">
      <div class="registration-account-layout">
        <div class="registration-account-intro">
          <h1 class="education-subpage-section-title" data-i18n="openLiveAccountPage.heroTitle">Open a live trading
            account</h1>
          <p class="registration-page-hero-lead" data-i18n="openLiveAccountPage.heroLead">
            Tell us how to reach you. A member of the team will follow up with eligibility checks, documentation, and
            next steps. Trading involves risk; this is not financial advice.
          </p>
          <h2 class="registration-page-hero-title" data-i18n="openLiveAccountPage.beforeTitle">Before you start</h2>
          <p class="section-body" data-i18n="openLiveAccountPage.beforeBody">Live accounts involve real capital and
            regulatory checks. Completing this form registers your interest so our team can guide you through
            verification and platform access.</p>
          <ul class="registration-account-bullets">
            <li data-i18n="openLiveAccountPage.bullet1">Identity and residency checks may apply</li>
            <li data-i18n="openLiveAccountPage.bullet2">Risk disclosure and terms acceptance as part of onboarding</li>
            <li data-i18n="openLiveAccountPage.bullet3">Dedicated follow-up from our team</li>
          </ul>
          <p class="registration-account-crosslink-wrap">
            <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>"
              class="registration-account-crosslink" data-i18n="openLiveAccountPage.demoCrosslink">Open a demo
              account</a>
          </p>
          <!-- <p class="edu-lead-gate-note" data-i18n="openLiveAccountPage.formNote">This form is not yet connected to a
            live onboarding system. Submissions are simulated until you connect your CRM or registration API.</p> -->
        </div>
        <div class="registration-account-card">
          <div class="education-article-meta" data-i18n="openLiveAccountPage.cardMeta">Your details</div>
          <h3 class="registration-account-card-title" data-i18n="openLiveAccountPage.cardTitle">Register interest in a
            live account</h3>
          <form class="deposit-form registration-account-form" id="openLiveAccountPageForm" novalidate>
            <div class="form-group">
              <label for="openLiveName" data-i18n="openLiveAccountPage.labelFullName">Full name</label>
              <input id="openLiveName" type="text" name="name"
                data-i18n-placeholder="openLiveAccountPage.placeholderFullName" placeholder="Your full name" required
                autocomplete="name">
            </div>
            <div class="form-group">
              <label for="openLiveEmail" data-i18n="openLiveAccountPage.labelEmail">Email address</label>
              <input id="openLiveEmail" type="email" name="email"
                data-i18n-placeholder="openLiveAccountPage.placeholderEmail" placeholder="you@example.com" required
                autocomplete="email">
            </div>
            <div class="form-group">
              <label for="openLivePhone" data-i18n="openLiveAccountPage.labelPhone">Phone</label>
              <input id="openLivePhone" type="tel" name="phone"
                data-i18n-placeholder="openLiveAccountPage.placeholderPhone" placeholder="Include country code" required
                autocomplete="tel">
            </div>
            <div class="form-group">
              <label for="openLiveCountry" data-i18n="openLiveAccountPage.labelCountry">Country / region</label>
              <select id="openLiveCountry" name="country" required>
                <option value="" data-i18n="openLiveAccountPage.selectPlaceholder">Select…</option>
                <option value="GB" data-i18n="openLiveAccountPage.countries.GB">United Kingdom</option>
                <option value="US" data-i18n="openLiveAccountPage.countries.US">United States</option>
                <option value="DE" data-i18n="openLiveAccountPage.countries.DE">Germany</option>
                <option value="FR" data-i18n="openLiveAccountPage.countries.FR">France</option>
                <option value="AU" data-i18n="openLiveAccountPage.countries.AU">Australia</option>
                <option value="CA" data-i18n="openLiveAccountPage.countries.CA">Canada</option>
                <option value="SG" data-i18n="openLiveAccountPage.countries.SG">Singapore</option>
                <option value="AE" data-i18n="openLiveAccountPage.countries.AE">United Arab Emirates</option>
                <option value="ZA" data-i18n="openLiveAccountPage.countries.ZA">South Africa</option>
                <option value="NG" data-i18n="openLiveAccountPage.countries.NG">Nigeria</option>
                <option value="IN" data-i18n="openLiveAccountPage.countries.IN">India</option>
                <option value="MY" data-i18n="openLiveAccountPage.countries.MY">Malaysia</option>
                <option value="OTHER" data-i18n="openLiveAccountPage.countries.OTHER">Other</option>
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
            <p class="edu-lead-gate-error" id="openLivePageError" role="alert" hidden></p>
            <button type="submit" class="btn-primary registration-account-submit"
              data-i18n="openLiveAccountPage.submitButton">Submit live account request</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<script>
(function() {
  var form = document.getElementById('openLiveAccountPageForm');
  var err = document.getElementById('openLivePageError');
  var thankYou = <?php echo json_encode(routeUrl('lead-thank-you', ['kind' => 'live'])); ?>;

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
    var consent = form.querySelector('[name="consent"]');

    name = name ? name.trim() : '';
    email = email ? email.trim() : '';
    phone = phone ? phone.trim() : '';

    if (!name) {
      showError(tr('openLiveAccountPage.errors.nameRequired'));
      return;
    }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showError(tr('openLiveAccountPage.errors.emailInvalid'));
      return;
    }
    if (!phone) {
      showError(tr('openLiveAccountPage.errors.phoneRequired'));
      return;
    }
    if (!country) {
      showError(tr('openLiveAccountPage.errors.countryRequired'));
      return;
    }
    if (!consent || !consent.checked) {
      showError(tr('openLiveAccountPage.errors.consentRequired'));
      return;
    }

    window.location.href = thankYou;
  });
})();
</script>