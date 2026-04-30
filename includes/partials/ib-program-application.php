<?php
$ib_partner_languages = [
  'ar' => 'Arabic',
  'bg' => 'Bulgarian',
  'cs' => 'Czech',
  'da' => 'Danish',
  'de' => 'German',
  'el' => 'Greek',
  'en' => 'English',
  'es' => 'Spanish (Spain)',
  'es-419' => 'Spanish (Latin America)',
  'fi' => 'Finnish',
  'fr' => 'French',
  'he' => 'Hebrew',
  'hi' => 'Hindi',
  'hu' => 'Hungarian',
  'id' => 'Indonesian',
  'it' => 'Italian',
  'ja' => 'Japanese',
  'ko' => 'Korean',
  'my' => 'Malay',
  'nl' => 'Dutch',
  'no' => 'Norwegian',
  'ph' => 'Philippines',
  'pk' => 'Pakistan',
  'pl' => 'Polish',
  'pt' => 'Portuguese',
  'ro' => 'Romanian',
  'ru' => 'Russian',
  'sv' => 'Swedish',
  'th' => 'Thai',
  'tr' => 'Turkish',
  'uk' => 'Ukrainian',
  'vn' => 'Vietnamese',
  'zh' => 'Chinese (Simplified)',
];
asort($ib_partner_languages);
?>
<section class="education-subpage education-subpage--register ib-program-application-page">
  <section class="education-subpage-content education-subpage-content--register-page">
    <div class="container" style="padding-top: 100px;">
      <div class="registration-account-layout">
        <div class="registration-account-intro">
          <h1 class="education-subpage-section-title">Become a Trading Partner (IB)</h1>
          <p class="registration-page-hero-lead">
            Refer traders, grow your network, and earn commissions for every active client you bring.
          </p>
          <h2 class="registration-page-hero-title">How it works</h2>
          <ul class="registration-account-bullets">
            <li>Submit your profile in 3 short steps</li>
            <li>Our Partner Team reviews your fit and promotion model</li>
            <li>Approved applicants are contacted with onboarding details</li>
          </ul>
          <p class="registration-account-crosslink-wrap">
            <a href="<?php echo htmlspecialchars(routeUrl('ib-program')); ?>" class="registration-account-crosslink">Back to Partner Program</a>
          </p>
        </div>

        <div class="registration-account-card">
          <div class="education-article-meta">Partner Program</div>
          <h3 class="registration-account-card-title">Become a Trading Partner (IB)</h3>
          <form
            class="deposit-form registration-account-form"
            id="ibPartnerApplicationForm"
            novalidate
            data-thank-you-url="<?php echo htmlspecialchars(routeUrl('lead-thank-you', ['kind' => 'ib'])); ?>"
            data-leads-url="https://6dfed096-backend-clientzone.dataconect.com/api/v1/clientzone/leads"
          >
            <div class="ib-program-stepper" aria-hidden="true">
              <span class="ib-program-step-pill is-active" data-step-pill="1">Step 1: Basic Info</span>
              <span class="ib-program-step-pill" data-step-pill="2">Step 2: Profile</span>
              <span class="ib-program-step-pill" data-step-pill="3">Step 3: Partner Info</span>
            </div>

            <div class="ib-program-step is-active" data-step="1">
              <div class="form-group">
                <label for="ibPartnerFirstName">First Name</label>
                <input id="ibPartnerFirstName" type="text" name="first_name" placeholder="Your first name" required autocomplete="given-name">
              </div>
              <div class="form-group">
                <label for="ibPartnerLastName">Last Name</label>
                <input id="ibPartnerLastName" type="text" name="last_name" placeholder="Your last name" required autocomplete="family-name">
              </div>
              <div class="form-group">
                <label for="ibPartnerEmail">Email Address</label>
                <input id="ibPartnerEmail" type="email" name="email" placeholder="you@example.com" required autocomplete="email">
              </div>
              <div class="form-group">
                <label for="ibPartnerPhone">Phone Number</label>
                <input id="ibPartnerPhone" type="tel" name="phone" placeholder="Include country code" required autocomplete="tel">
              </div>
              <div class="form-group">
                <label for="ibPartnerCountrySearch">Country</label>
                <div class="ib-search-select" id="ibPartnerCountryWrap">
                  <input type="hidden" name="country" id="ibPartnerCountry" value="">
                  <input
                    type="text"
                    id="ibPartnerCountrySearch"
                    class="ib-search-select-input"
                    placeholder="Search country..."
                    autocomplete="off"
                    autocorrect="off"
                    spellcheck="false"
                    aria-autocomplete="list"
                    aria-controls="ibPartnerCountryList"
                    aria-expanded="false"
                    role="combobox"
                  >
                  <ul class="ib-search-select-list" id="ibPartnerCountryList" role="listbox" hidden></ul>
                </div>
              </div>
              <div class="form-group">
                <label for="ibPartnerLanguageSearch">Preferred Language</label>
                <div class="ib-search-select" id="ibPartnerLanguageWrap">
                  <input type="hidden" name="language" id="ibPartnerLanguage" value="">
                  <input
                    type="text"
                    id="ibPartnerLanguageSearch"
                    class="ib-search-select-input"
                    placeholder="Search language..."
                    autocomplete="off"
                    autocorrect="off"
                    spellcheck="false"
                    aria-autocomplete="list"
                    aria-controls="ibPartnerLanguageList"
                    aria-expanded="false"
                    role="combobox"
                  >
                  <ul class="ib-search-select-list" id="ibPartnerLanguageList" role="listbox" hidden></ul>
                </div>
              </div>
              <script type="application/json" id="ibPartnerLanguagesJson"><?php
                $ib_language_pairs = [];
                foreach ($ib_partner_languages as $code => $label) {
                  $ib_language_pairs[] = ['value' => (string) $code, 'label' => (string) $label];
                }
                echo json_encode($ib_language_pairs, JSON_UNESCAPED_UNICODE);
              ?></script>
            </div>

            <div class="ib-program-step" data-step="2" hidden>
              <div class="form-group">
                <label for="ibPartnerExperience">Experience Level</label>
                <select id="ibPartnerExperience" name="experience_level" required>
                  <option value="">Select experience level</option>
                  <option value="beginner">Beginner</option>
                  <option value="intermediate">Intermediate</option>
                  <option value="advanced">Advanced</option>
                </select>
              </div>
              <div class="form-group">
                <label for="ibPartnerHeardAbout">How did you hear about us?</label>
                <select id="ibPartnerHeardAbout" name="heard_about" required>
                  <option value="">Select an option</option>
                  <option value="search">Search engine</option>
                  <option value="social">Social media</option>
                  <option value="friend">Friend or colleague</option>
                  <option value="event">Webinar or event</option>
                  <option value="other">Other</option>
                </select>
              </div>
            </div>

            <div class="ib-program-step" data-step="3" hidden>
              <fieldset class="ib-partner-radio-group">
                <legend>Are you currently a partner/IB/agent?</legend>
                <label>
                  <input type="radio" name="is_partner" value="yes" required>
                  <span>Yes</span>
                </label>
                <label>
                  <input type="radio" name="is_partner" value="no" required>
                  <span>No</span>
                </label>
              </fieldset>
              <div class="form-group" id="ibPartnerReferrerWrap" hidden>
                <label for="ibPartnerReferrer">Who referred you? (Optional)</label>
                <input id="ibPartnerReferrer" type="text" name="referred_by" placeholder="Referrer name">
              </div>
              <div class="form-group">
                <label for="ibPartnerPromotionMethod">Preferred method of promotion</label>
                <select id="ibPartnerPromotionMethod" name="promotion_method" required>
                  <option value="">Select method</option>
                  <option value="social_media">Social Media</option>
                  <option value="paid_ads">Paid Ads</option>
                  <option value="community_network">Community / Network</option>
                  <option value="other">Other</option>
                </select>
              </div>
            </div>

            <p class="edu-lead-gate-error" id="ibPartnerFormError" role="alert" hidden></p>

            <div class="ib-program-form-actions">
              <button type="button" class="btn-secondary1 ib-program-form-back" id="ibPartnerPrevBtn" hidden>Back</button>
              <button type="button" class="btn-primary registration-account-submit" id="ibPartnerNextBtn">Continue</button>
              <button type="submit" class="btn-primary registration-account-submit" id="ibPartnerSubmitBtn" hidden>Submit Application</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<style>
.ib-program-stepper {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 18px;
}

.ib-program-step-pill {
  border: 1px solid var(--border-color);
  border-radius: 999px;
  padding: 7px 12px;
  font-size: 0.8rem;
  color: var(--text-secondary);
}

.ib-program-step-pill.is-active {
  border-color: rgba(230, 57, 70, 0.65);
  color: #d02c2d;
  background: rgba(230, 57, 70, 0.09);
}

.ib-program-step {
  margin-bottom: 12px;
}

.ib-partner-radio-group {
  border: 1px solid var(--border-color);
  border-radius: 12px;
  padding: 14px 16px;
  margin: 0 0 16px;
}

.ib-partner-radio-group legend {
  color: var(--text-primary);
  font-weight: 600;
  margin: 0 0 8px;
  padding: 0;
  font-size: 0.95rem;
}

.ib-partner-radio-group label {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-right: 18px;
  color: var(--text-secondary);
}

.ib-program-form-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  align-items: center;
}

.ib-program-form-actions .registration-account-submit,
.ib-program-form-actions .ib-program-form-back {
  margin-top: 8px;
  width: auto;
  min-width: 140px;
}

.ib-program-form-actions #ibPartnerSubmitBtn[hidden],
.ib-program-form-actions #ibPartnerNextBtn[hidden],
.ib-program-form-actions #ibPartnerPrevBtn[hidden] {
  display: none !important;
}

.ib-search-select {
  position: relative;
}

.ib-search-select-input {
  width: 100%;
}

.ib-search-select-list {
  position: absolute;
  left: 0;
  right: 0;
  top: calc(100% + 4px);
  z-index: 40;
  max-height: 260px;
  overflow-y: auto;
  margin: 0;
  padding: 4px 0;
  list-style: none;
  background: var(--bg-secondary, #1a1a1a);
  border: 1px solid var(--border-color, rgba(255, 255, 255, 0.12));
  border-radius: 10px;
  box-shadow: 0 12px 32px rgba(0, 0, 0, 0.35);
}

.ib-search-select-option {
  padding: 10px 14px;
  cursor: pointer;
  font-size: 0.95rem;
  color: var(--text-primary, #f2f2f2);
}

.ib-search-select-option:hover,
.ib-search-select-option.is-highlighted {
  background: rgba(230, 57, 70, 0.12);
}

.ib-search-select-option[hidden] {
  display: none !important;
}

@media (max-width: 640px) {
  .ib-program-form-actions .registration-account-submit,
  .ib-program-form-actions .ib-program-form-back {
    width: 100%;
  }
}
</style>
