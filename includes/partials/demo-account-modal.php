<?php
$demo_modal_js_path = __DIR__ . '/../../assets/js/demo-account-modal.js';
$demo_modal_js_ver = @filemtime($demo_modal_js_path) ?: time();
?>
<div class="deposit-modal" id="demoAccountModal" role="dialog" aria-modal="true" aria-labelledby="demoAccountTitle" aria-hidden="true">
    <div class="deposit-modal-overlay demo-account-modal-overlay"></div>
    <div class="deposit-modal-content">
        <button type="button" class="modal-close demo-account-modal-close" aria-label="Close">&times;</button>
        <div class="modal-header" id="demoAccountModalIntro">
            <h3 class="modal-title" id="demoAccountTitle">Open a free demo account</h3>
            <p class="modal-subtitle">Practice with virtual funds on live market data. Submit your details below; our team will follow up with next steps. No payment required for a demo.</p>
        </div>
        <form class="deposit-form" id="demoAccountForm" novalidate>
            <div class="form-group">
                <label for="demoAccountName">Full name</label>
                <input id="demoAccountName" type="text" name="name" placeholder="Your full name" required autocomplete="name">
            </div>
            <div class="form-group">
                <label for="demoAccountEmail">Email address</label>
                <input id="demoAccountEmail" type="email" name="email" placeholder="you@example.com" required autocomplete="email">
            </div>
            <div class="form-group">
                <label for="demoAccountPhone">Phone</label>
                <input id="demoAccountPhone" type="tel" name="phone" placeholder="Include country code" required autocomplete="tel">
            </div>
            <div class="form-group">
                <label for="demoAccountCountry">Country / region</label>
                <select id="demoAccountCountry" name="country" required>
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
                    <option value="OTHER">Other</option>
                </select>
            </div>
            <div class="edu-lead-gate-consent">
                <label class="edu-lead-gate-check-label">
                    <input type="checkbox" name="consent" id="demoAccountConsent" value="1" required>
                    <span>I agree to be contacted about my demo request and I have read the <a href="./privacy-policy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.</span>
                </label>
            </div>
            <p class="edu-lead-gate-note demo-account-modal-note">This form is not yet connected to a server. Submissions are simulated for testing; wire your CRM or registration API when ready.</p>
            <p class="edu-lead-gate-error" id="demoAccountError" role="alert" hidden></p>
            <button type="submit" class="btn-primary demo-account-submit">Create demo account</button>
        </form>
        <div class="demo-account-success" id="demoAccountSuccess" hidden>
            <div class="modal-header">
                <h3 class="modal-title">Thank you</h3>
                <p class="modal-subtitle">We have received your demo request. You will be contacted shortly with instructions to access your practice account.</p>
            </div>
            <button type="button" class="btn-primary demo-account-done-btn demo-account-modal-close-secondary">Close</button>
        </div>
    </div>
</div>
<script src="assets/js/demo-account-modal.js?v=<?php echo (int) $demo_modal_js_ver; ?>"></script>
