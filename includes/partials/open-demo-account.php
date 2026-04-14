<section class="education-subpage education-subpage--register">
    <section class="education-subpage-content education-subpage-content--register-page">
        <div class="container" style="padding-top: 100px;">
            <div class="registration-account-layout">
                <div class="registration-account-intro">
                    <h1 class="education-subpage-section-title">Open a free demo account</h1>
                    <p class="registration-page-hero-lead">
                        Practice with virtual funds on live market data. Submit your details below; our team will follow up with next steps. No payment required for a demo.
                    </p>
                    <h2 class="registration-page-hero-title ">Why start with a demo?</h2>
                    <p class="section-body">A demo account lets you explore the platform, charts, and order types in a risk-free environment while you learn how markets move.</p>
                    <ul class="registration-account-bullets">
                        <li>Virtual balance for practice</li>
                        <li>Live market pricing for realistic context</li>
                        <li>No deposit required to get started</li>
                    </ul>
                    <p class="registration-account-crosslink-wrap">
                        <a href="<?php echo htmlspecialchars(routeUrl('open-live-account')); ?>" class="registration-account-crosslink">Open a live account</a>
                    </p>
                    <p class="edu-lead-gate-note">This form is not yet connected to a live CRM. Submissions are simulated until you wire your registration API.</p>
                </div>
                <div class="registration-account-card">
                    <div class="education-article-meta">Your details</div>
                    <h3 class="registration-account-card-title">Request a demo account</h3>
                    <form class="deposit-form registration-account-form" id="openDemoAccountPageForm" novalidate>
                        <div class="form-group">
                            <label for="openDemoName">Full name</label>
                            <input id="openDemoName" type="text" name="name" placeholder="Your full name" required autocomplete="name">
                        </div>
                        <div class="form-group">
                            <label for="openDemoEmail">Email address</label>
                            <input id="openDemoEmail" type="email" name="email" placeholder="you@example.com" required autocomplete="email">
                        </div>
                        <div class="form-group">
                            <label for="openDemoPhone">Phone</label>
                            <input id="openDemoPhone" type="tel" name="phone" placeholder="Include country code" required autocomplete="tel">
                        </div>
                        <div class="form-group">
                            <label for="openDemoCountry">Country / region</label>
                            <select id="openDemoCountry" name="country" required>
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
                                <input type="checkbox" name="consent" id="openDemoConsent" value="1" required>
                                <span>I agree to be contacted about my demo request and I have read the <a href="./privacy-policy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.</span>
                            </label>
                        </div>
                        <p class="edu-lead-gate-error" id="openDemoPageError" role="alert" hidden></p>
                        <button type="submit" class="btn-primary registration-account-submit">Submit demo request</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<script>
(function () {
  var form = document.getElementById('openDemoAccountPageForm');
  var err = document.getElementById('openDemoPageError');
  var thankYou = <?php echo json_encode(routeUrl('lead-thank-you', ['kind' => 'demo'])); ?>;

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
      console.log('[open-demo-account] lead (simulated)');
    }

    window.location.href = thankYou;
  });
})();
</script>
