        <div class="registration-account-card">
          <div class="education-article-meta" data-i18n="openLiveAccountPage.cardMeta">Your details</div>
          <h3 class="registration-account-card-title" data-i18n="openLiveAccountPage.cardTitle">Register interest in a live account</h3>
          <form
            class="deposit-form registration-account-form"
            id="openLiveAccountPageForm"
            novalidate
            data-thank-you-url="<?php echo htmlspecialchars(embed_route_url('lead-thank-you', ['kind' => 'live'])); ?>"
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
                <input type="checkbox" name="consent" id="openLiveEmbedConsent" value="1" required>
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

<?php include __DIR__ . '/country-search-select-styles.php'; ?>
