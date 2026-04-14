<section class="education-subpage education-subpage--register">
    <section class="education-subpage-content education-subpage-content--register-page">
        <div class="container" style="padding-top: 100px;">
            <div class="registration-account-layout">
                <div class="registration-account-intro">
                    <h1 class="education-subpage-section-title">Open a live trading account</h1>
                    <p class="registration-page-hero-lead">
                        Tell us how to reach you. A member of the team will follow up with eligibility checks, documentation, and next steps. Trading involves risk; this is not financial advice.
                    </p>
                    <h2 class="registration-page-hero-title">Before you start</h2>
                    <p class="section-body">Live accounts involve real capital and regulatory checks. Completing this form registers your interest so our team can guide you through verification and platform access.</p>
                    <ul class="registration-account-bullets">
                        <li>Identity and residency checks may apply</li>
                        <li>Risk disclosure and terms acceptance as part of onboarding</li>
                        <li>Dedicated follow-up from our team</li>
                    </ul>
                    <p class="registration-account-crosslink-wrap">
                        <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>" class="registration-account-crosslink">Open a demo account</a>
                    </p>
                    <p class="edu-lead-gate-note">This form is not yet connected to a live onboarding system. Submissions are simulated until you connect your CRM or registration API.</p>
                </div>
                <div class="registration-account-card">
                    <div class="education-article-meta">Your details</div>
                    <h3 class="registration-account-card-title">Register interest in a live account</h3>
                    <form class="deposit-form registration-account-form" id="openLiveAccountPageForm" novalidate>
                        <div class="form-group">
                            <label for="openLiveName">Full name</label>
                            <input id="openLiveName" type="text" name="name" placeholder="Your full name" required autocomplete="name">
                        </div>
                        <div class="form-group">
                            <label for="openLiveEmail">Email address</label>
                            <input id="openLiveEmail" type="email" name="email" placeholder="you@example.com" required autocomplete="email">
                        </div>
                        <div class="form-group">
                            <label for="openLivePhone">Phone</label>
                            <input id="openLivePhone" type="tel" name="phone" placeholder="Include country code" required autocomplete="tel">
                        </div>
                        <div class="form-group">
                            <label for="openLiveCountry">Country / region</label>
                            <select id="openLiveCountry" name="country" required>
                                <option value="">Select…</option>
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
                        <div class="edu-lead-gate-consent">
                            <label class="edu-lead-gate-check-label">
                                <input type="checkbox" name="consent" id="openLiveConsent" value="1" required>
                                <span>I understand that trading carries risk and I agree to be contacted about opening a live account. I have read the <a href="./privacy-policy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.</span>
                            </label>
                        </div>
                        <p class="edu-lead-gate-error" id="openLivePageError" role="alert" hidden></p>
                        <button type="submit" class="btn-primary registration-account-submit">Submit live account request</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<script>
(function () {
  var form = document.getElementById('openLiveAccountPageForm');
  var err = document.getElementById('openLivePageError');
  var thankYou = <?php echo json_encode(routeUrl('lead-thank-you', ['kind' => 'live'])); ?>;

  function showError(msg) {
    if (!err) return;
    err.textContent = msg || '';
    err.hidden = !msg;
  }

  if (!form) return;

  form.addEventListener('submit', function (e) {
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
      showError('Please enter your full name.');
      return;
    }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showError('Please enter a valid email address.');
      return;
    }
    if (!phone) {
      showError('Please enter a phone number.');
      return;
    }
    if (!country) {
      showError('Please select your country or region.');
      return;
    }
    if (!consent || !consent.checked) {
      showError('Please confirm consent to continue.');
      return;
    }

    if (typeof console !== 'undefined' && console.log) {
      console.log('[open-live-account] lead (simulated)');
    }

    window.location.href = thankYou;
  });
})();
</script>
