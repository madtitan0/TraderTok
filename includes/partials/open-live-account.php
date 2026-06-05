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
          <form
            class="deposit-form registration-account-form"
            id="openLiveAccountPageForm"
            novalidate
            data-thank-you-url="<?php echo htmlspecialchars(routeUrl('lead-thank-you', ['kind' => 'live'])); ?>"
          >
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
            <?php
            $countryFieldPrefix = 'openLive';
            $countryLabelFor = 'openLiveCountrySearch';
            $countryLabelI18n = 'openLiveAccountPage.labelCountry';
            $countryLabelText = 'Country / region';
            include __DIR__ . '/country-search-select-field.php';
            ?>
            <div class="form-group">
              <label for="openLiveHeardAbout">How did you hear about us?</label>
              <select id="openLiveHeardAbout" name="heard_about" required>
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
            <p class="edu-lead-gate-error" id="openLivePageError" role="alert" hidden></p>
            <button type="submit" class="btn-primary registration-account-submit"
              data-i18n="openLiveAccountPage.submitButton">Submit live account request</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<?php include __DIR__ . '/country-search-select-styles.php'; ?>