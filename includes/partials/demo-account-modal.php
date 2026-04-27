<?php
$demo_modal_js_path = __DIR__ . '/../../assets/js/demo-account-modal.js';
$demo_modal_js_ver = @filemtime($demo_modal_js_path) ?: time();
?>
<div class="deposit-modal" id="demoAccountModal" role="dialog" aria-modal="true" aria-labelledby="demoAccountTitle" aria-hidden="true">
    <div class="deposit-modal-overlay demo-account-modal-overlay"></div>
    <div class="deposit-modal-content">
        <button type="button" class="modal-close demo-account-modal-close" data-i18n-aria="demoAccountModal.closeAriaLabel" aria-label="Close">&times;</button>
        <div class="modal-header" id="demoAccountModalIntro">
            <h3 class="modal-title" id="demoAccountTitle" data-i18n="openDemoAccountPage.heroTitle">Open a free demo account</h3>
            <p class="modal-subtitle" data-i18n="openDemoAccountPage.heroLead">Practice with virtual funds on live market data. Submit your details below; our team will follow up with next steps. No payment required for a demo.</p>
        </div>
        <form class="deposit-form" id="demoAccountForm" novalidate>
            <div class="form-group">
                <label for="demoAccountName" data-i18n="openDemoAccountPage.labelFullName">Full name</label>
                <input id="demoAccountName" type="text" name="name" data-i18n-placeholder="openDemoAccountPage.placeholderFullName" placeholder="Your full name" required autocomplete="name">
            </div>
            <div class="form-group">
                <label for="demoAccountEmail" data-i18n="openDemoAccountPage.labelEmail">Email address</label>
                <input id="demoAccountEmail" type="email" name="email" data-i18n-placeholder="openDemoAccountPage.placeholderEmail" placeholder="you@example.com" required autocomplete="email">
            </div>
            <div class="form-group">
                <label for="demoAccountPhone" data-i18n="openDemoAccountPage.labelPhone">Phone</label>
                <input id="demoAccountPhone" type="tel" name="phone" data-i18n-placeholder="openDemoAccountPage.placeholderPhone" placeholder="Include country code" required autocomplete="tel">
            </div>
            <div class="form-group">
                <label for="demoAccountCountry" data-i18n="openDemoAccountPage.labelCountry">Country / region</label>
                <select id="demoAccountCountry" name="country" required>
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
                    <option value="OTHER" data-i18n="openDemoAccountPage.countries.OTHER">Other</option>
                </select>
            </div>
            <div class="edu-lead-gate-consent">
                <label class="edu-lead-gate-check-label">
                    <input type="checkbox" name="consent" id="demoAccountConsent" value="1" required>
                    <span data-i18n-html="openDemoAccountPage.consentHtml">I agree to be contacted about my demo request and I have read the <a href="./privacy-policy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.</span>
                </label>
            </div>
            <!-- <p class="edu-lead-gate-note demo-account-modal-note" data-i18n="demoAccountModal.formNote">This form is not yet connected to a server. Submissions are simulated for testing; wire your CRM or registration API when ready.</p> -->
            <p class="edu-lead-gate-error" id="demoAccountError" role="alert" hidden></p>
            <button type="submit" class="btn-primary demo-account-submit" data-i18n="demoAccountModal.submitButton">Create demo account</button>
        </form>
        <div class="demo-account-success" id="demoAccountSuccess" hidden>
            <div class="modal-header">
                <h3 class="modal-title" data-i18n="demoAccountModal.successTitle">Thank you</h3>
                <p class="modal-subtitle" data-i18n="demoAccountModal.successSubtitle">We have received your demo request. You will be contacted shortly with instructions to access your practice account.</p>
            </div>
            <button type="button" class="btn-primary demo-account-done-btn demo-account-modal-close-secondary" data-i18n="demoAccountModal.closeButton">Close</button>
        </div>
    </div>
</div>
<script src="assets/js/demo-account-modal.js?v=<?php echo (int) $demo_modal_js_ver; ?>"></script>
