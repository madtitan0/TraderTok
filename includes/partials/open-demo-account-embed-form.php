        <div class="registration-account-card">
          <div class="education-article-meta" data-i18n="openDemoAccountPage.cardMeta">Your details</div>
          <h3 class="registration-account-card-title" data-i18n="openDemoAccountPage.cardTitle">Request a demo account</h3>
          <form
            class="deposit-form registration-account-form"
            id="openDemoAccountPageForm"
            novalidate
            data-thank-you-url="<?php echo htmlspecialchars(embed_route_url('lead-thank-you', ['kind' => 'demo'])); ?>"
          >
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
            <?php
            $countryFieldPrefix = 'openDemo';
            $countryLabelFor = 'openDemoCountrySearch';
            $countryLabelI18n = 'openDemoAccountPage.labelCountry';
            $countryLabelText = 'Country / region';
            include __DIR__ . '/country-search-select-field.php';
            ?>
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
                <input type="checkbox" name="consent" id="openDemoEmbedConsent" value="1" required>
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

<?php include __DIR__ . '/country-search-select-styles.php'; ?>
