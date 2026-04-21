<section class="education-subpage education-subpage--register education-subpage--claim-offer">
  <section class="education-subpage-content education-subpage-content--register-page">
    <div class="container" style="padding-top: 100px;">
      <div class="registration-account-layout">
        <div class="registration-account-intro">
          <h1 class="education-subpage-section-title" data-i18n="claimOfferPage.heroTitle">
            Claim your trading bonus
          </h1>
          <p class="registration-page-hero-lead" data-i18n="claimOfferPage.heroLead">
            Enter your details to claim your trading bonus. Once submitted, our team will verify your eligibility and
            guide you through the simple onboarding process so you can activate your offer quickly. Trading involves
            risk, and this does not constitute financial advice.
          </p>

          <div class="claim-offer-intro-stack">
            <div class="claim-offer-intro-section">
              <h2 class="registration-page-hero-title" data-i18n="claimOfferPage.stepsTitle">What happens next</h2>
              <p class="section-body" data-i18n="claimOfferPage.stepsLead">
                After you submit the form, we use your details to check that the offer applies to your region and
                profile. Here is the typical flow.
              </p>
              <ul class="registration-account-bullets">
                <li data-i18n="claimOfferPage.step1">We review your submission and may request additional verification
                  if required.</li>
                <li data-i18n="claimOfferPage.step2">A team member reaches out by email or phone with clear next steps
                  for your account.</li>
                <li data-i18n="claimOfferPage.step3">Once approved, you complete onboarding and activate your promotion
                  in line with the offer terms.</li>
              </ul>
            </div>
            <div class="claim-offer-intro-section">
              <h2 class="registration-page-hero-title" data-i18n="claimOfferPage.benefitsTitle">Why claim through
                TraderTok</h2>
              <ul class="registration-account-bullets">
                <li data-i18n="claimOfferPage.benefit1">Promotions are structured for eligible regions—your form helps
                  us match you to the right offer.</li>
                <li data-i18n="claimOfferPage.benefit2">You get hands-on support from our team during verification and
                  account setup.</li>
                <li data-i18n="claimOfferPage.benefit3">Risk disclosures and terms are shared upfront so you can decide
                  with confidence.</li>
              </ul>
            </div>
          </div>

          <p class="edu-lead-gate-note" data-i18n="claimOfferPage.introNote">
            Submissions are reviewed during business hours. Trading involves risk; all offers are subject to
            eligibility, availability, and terms.
          </p>

          <p class="registration-account-crosslink-wrap">
            <a href="<?php echo htmlspecialchars(routeUrl('open-demo-account')); ?>"
              class="registration-account-crosslink" data-i18n="claimOfferPage.demoCrosslink">Open a demo account</a>
          </p>
        </div>
        <div class="registration-account-card">
          <div class="education-article-meta" data-i18n="claimOfferPage.cardMeta">Your details</div>
          <h3 class="registration-account-card-title" data-i18n="claimOfferPage.cardTitle">Claim Your Offer</h3>
          <form class="deposit-form registration-account-form" id="claimOfferPageForm" novalidate>
            <div class="form-group">
              <label for="claimOfferName" data-i18n="claimOfferPage.labelName">Name</label>
              <input id="claimOfferName" type="text" name="name" data-i18n-placeholder="claimOfferPage.placeholderName"
                placeholder="Your full name" required autocomplete="name">
            </div>
            <div class="form-group">
              <label for="claimOfferEmail" data-i18n="claimOfferPage.labelEmail">Email</label>
              <input id="claimOfferEmail" type="email" name="email"
                data-i18n-placeholder="claimOfferPage.placeholderEmail" placeholder="you@example.com" required
                autocomplete="email">
            </div>
            <div class="form-group">
              <label for="claimOfferCountry" data-i18n="claimOfferPage.labelCountry">Country</label>
              <select id="claimOfferCountry" name="country" required>
                <option value="" data-i18n="claimOfferPage.selectPlaceholder">Select…</option>
                <option value="GB" data-i18n="claimOfferPage.countries.GB">United Kingdom</option>
                <option value="US" data-i18n="claimOfferPage.countries.US">United States</option>
                <option value="DE" data-i18n="claimOfferPage.countries.DE">Germany</option>
                <option value="FR" data-i18n="claimOfferPage.countries.FR">France</option>
                <option value="AU" data-i18n="claimOfferPage.countries.AU">Australia</option>
                <option value="CA" data-i18n="claimOfferPage.countries.CA">Canada</option>
                <option value="SG" data-i18n="claimOfferPage.countries.SG">Singapore</option>
                <option value="AE" data-i18n="claimOfferPage.countries.AE">United Arab Emirates</option>
                <option value="ZA" data-i18n="claimOfferPage.countries.ZA">South Africa</option>
                <option value="NG" data-i18n="claimOfferPage.countries.NG">Nigeria</option>
                <option value="IN" data-i18n="claimOfferPage.countries.IN">India</option>
                <option value="MY" data-i18n="claimOfferPage.countries.MY">Malaysia</option>
                <option value="OTHER" data-i18n="claimOfferPage.countries.OTHER">Other</option>
              </select>
            </div>
            <div class="form-group">
              <label for="claimOfferExperience" data-i18n="claimOfferPage.labelExperience">Experience</label>
              <select id="claimOfferExperience" name="experience" required>
                <option value="" data-i18n="claimOfferPage.experiencePlaceholder">Select your experience</option>
                <option value="beginner" data-i18n="claimOfferPage.experience.beginner">Beginner</option>
                <option value="intermediate" data-i18n="claimOfferPage.experience.intermediate">Intermediate</option>
                <option value="advanced" data-i18n="claimOfferPage.experience.advanced">Advanced</option>
                <option value="professional" data-i18n="claimOfferPage.experience.professional">Professional</option>
              </select>
            </div>
            <div class="form-group">
              <label for="claimOfferPhone" data-i18n="claimOfferPage.labelPhone">Phone number</label>
              <input id="claimOfferPhone" type="tel" name="phone"
                data-i18n-placeholder="claimOfferPage.placeholderPhone" placeholder="Include country code" required
                autocomplete="tel">
            </div>
            <div class="form-group">
              <label for="claimOfferHeardAbout" data-i18n="claimOfferPage.labelHeardAbout">How did you hear about
                us?</label>
              <select id="claimOfferHeardAbout" name="heard_about" required>
                <option value="" data-i18n="claimOfferPage.heardAboutPlaceholder">Select an option</option>
                <option value="search" data-i18n="claimOfferPage.heardAbout.search">Search engine</option>
                <option value="social" data-i18n="claimOfferPage.heardAbout.social">Social media</option>
                <option value="friend" data-i18n="claimOfferPage.heardAbout.friend">Friend or colleague</option>
                <option value="advertisement" data-i18n="claimOfferPage.heardAbout.advertisement">Advertisement</option>
                <option value="email" data-i18n="claimOfferPage.heardAbout.email">Email</option>
                <option value="other" data-i18n="claimOfferPage.heardAbout.other">Other</option>
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
            <p class="edu-lead-gate-error" id="claimOfferPageError" role="alert" hidden></p>
            <button type="submit" class="btn-primary registration-account-submit"
              data-i18n="claimOfferPage.submitButton">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<script>
(function() {
  var form = document.getElementById('claimOfferPageForm');
  var err = document.getElementById('claimOfferPageError');
  var thankYou = <?php echo json_encode(routeUrl('lead-thank-you', ['kind' => 'claim'])); ?>;

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
    var country = (form.querySelector('[name="country"]') || {}).value;
    var experience = (form.querySelector('[name="experience"]') || {}).value;
    var phone = (form.querySelector('[name="phone"]') || {}).value;
    var heardAbout = (form.querySelector('[name="heard_about"]') || {}).value;
    var consent = form.querySelector('[name="consent"]');

    name = name ? name.trim() : '';
    email = email ? email.trim() : '';
    phone = phone ? phone.trim() : '';

    if (!name) {
      showError(tr('claimOfferPage.errors.nameRequired'));
      return;
    }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showError(tr('claimOfferPage.errors.emailInvalid'));
      return;
    }
    if (!country) {
      showError(tr('claimOfferPage.errors.countryRequired'));
      return;
    }
    if (!experience) {
      showError(tr('claimOfferPage.errors.experienceRequired'));
      return;
    }
    if (!phone) {
      showError(tr('claimOfferPage.errors.phoneRequired'));
      return;
    }
    if (!heardAbout) {
      showError(tr('claimOfferPage.errors.heardAboutRequired'));
      return;
    }
    if (!consent || !consent.checked) {
      showError(tr('claimOfferPage.errors.consentRequired'));
      return;
    }

    window.location.href = thankYou;
  });
})();
</script>