<?php
$live_modal_js_path = __DIR__ . '/../../assets/js/live-account-modal.js';
$live_modal_js_ver = @filemtime($live_modal_js_path) ?: time();
?>
<div class="deposit-modal" id="liveAccountModal" role="dialog" aria-modal="true" aria-labelledby="liveAccountTitle" aria-hidden="true">
    <div class="deposit-modal-overlay live-account-modal-overlay"></div>
    <div class="deposit-modal-content">
        <button type="button" class="modal-close live-account-modal-close" aria-label="Close">&times;</button>
        <div class="modal-header" id="liveAccountModalIntro">
            <h3 class="modal-title" id="liveAccountTitle">Open a live trading account</h3>
            <p class="modal-subtitle">Tell us how to reach you. A member of the team will follow up with eligibility checks, documentation, and next steps. Trading involves risk; this is not financial advice.</p>
        </div>
        <form class="deposit-form" id="liveAccountForm" novalidate>
            <div class="form-group">
                <label for="liveAccountName">Full name</label>
                <input id="liveAccountName" type="text" name="name" placeholder="Your full name" required autocomplete="name">
            </div>
            <div class="form-group">
                <label for="liveAccountEmail">Email address</label>
                <input id="liveAccountEmail" type="email" name="email" placeholder="you@example.com" required autocomplete="email">
            </div>
            <div class="form-group">
                <label for="liveAccountPhone">Phone</label>
                <input id="liveAccountPhone" type="tel" name="phone" placeholder="Include country code" required autocomplete="tel">
            </div>
            <div class="edu-lead-gate-consent">
                <label class="edu-lead-gate-check-label">
                    <input type="checkbox" name="consent" id="liveAccountConsent" value="1" required>
                    <span>I understand that trading carries risk and I agree to be contacted about opening a live account. I have read the <a href="./privacy-policy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.</span>
                </label>
            </div>
            <p class="edu-lead-gate-note demo-account-modal-note">This form is not yet connected to a server. Submissions are simulated until you connect onboarding or CRM.</p>
            <p class="edu-lead-gate-error" id="liveAccountError" role="alert" hidden></p>
            <button type="submit" class="btn-primary live-account-submit">Submit live account request</button>
        </form>
        <div class="live-account-success" id="liveAccountSuccess" hidden>
            <div class="modal-header">
                <h3 class="modal-title">Thank you</h3>
                <p class="modal-subtitle">We have received your request. Someone will contact you about next steps for a live account.</p>
            </div>
            <button type="button" class="btn-primary live-account-done-btn live-account-modal-close-secondary">Close</button>
        </div>
    </div>
</div>
<script src="assets/js/live-account-modal.js?v=<?php echo (int) $live_modal_js_ver; ?>"></script>
