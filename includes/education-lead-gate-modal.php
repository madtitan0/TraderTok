<?php
$edu_lead_gate_slugs = require __DIR__ . '/../config/edu-lead-gate-slugs.php';
?>
<script>
window.__EDU_GATE_SLUGS = <?php echo json_encode(array_values($edu_lead_gate_slugs)); ?>;
</script>
<div class="deposit-modal" id="eduLeadGateModal" role="dialog" aria-modal="true" aria-labelledby="eduLeadGateTitle">
    <div class="deposit-modal-overlay edu-lead-gate-overlay"></div>
    <div class="deposit-modal-content">
        <button type="button" class="modal-close edu-lead-gate-close" aria-label="Close">&times;</button>
        <div class="modal-header">
            <h3 class="modal-title" id="eduLeadGateTitle" data-i18n="eduLeadGate.title">Access TraderTok Academy</h3>
            <p class="modal-subtitle" data-i18n="eduLeadGate.subtitle">Sign in or sign up to continue. After sign in, you can move between the eight Education Hub sections in this tab without being asked again until you close the tab. Educational content only.</p>
        </div>

        <div class="edu-lead-gate-mode-switch" role="tablist" data-i18n-aria="eduLeadGate.modeSwitchAria">
            <button type="button" class="edu-lead-gate-mode-btn" role="tab" id="eduLeadGateTabSignup" aria-selected="true" aria-controls="eduLeadGatePanelSignup" data-edu-mode="signup" data-i18n="eduLeadGate.tabSignUp">Sign up</button>
            <button type="button" class="edu-lead-gate-mode-btn" role="tab" id="eduLeadGateTabSignin" aria-selected="false" aria-controls="eduLeadGatePanelSignin" data-edu-mode="signin" data-i18n="eduLeadGate.tabSignIn">Sign in</button>
        </div>

        <div class="edu-lead-gate-panel" id="eduLeadGatePanelSignup" role="tabpanel" aria-labelledby="eduLeadGateTabSignup">
            <form class="deposit-form edu-lead-gate-form" id="eduLeadGateFormSignup" novalidate data-edu-form="signup">
                <div class="form-group">
                    <label for="eduLeadGateName" data-i18n="eduLeadGate.labelName">Full name</label>
                    <input id="eduLeadGateName" type="text" name="name" data-i18n-placeholder="eduLeadGate.placeholderName" placeholder="Your name" required autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="eduLeadGateEmail" data-i18n="eduLeadGate.labelEmail">Email address</label>
                    <input id="eduLeadGateEmail" type="email" name="email" data-i18n-placeholder="eduLeadGate.placeholderEmail" placeholder="you@example.com" required autocomplete="email">
                </div>
                <div class="edu-lead-gate-consent">
                    <label class="edu-lead-gate-check-label">
                        <input type="checkbox" name="consent" id="eduLeadGateConsent" value="1" required>
                        <span data-i18n-html="eduLeadGate.consentHtml">I agree to receive educational content and Academy updates, and I have read the <a href="./privacy-policy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.</span>
                    </label>
                </div>
                <p class="edu-lead-gate-note" data-i18n="eduLeadGate.signUpNote">Submissions are simulated until you connect your CRM or auth API.</p>
                <p class="edu-lead-gate-error" id="eduLeadGateError" role="alert" hidden></p>
                <button type="submit" class="btn-primary edu-lead-gate-submit" data-i18n="eduLeadGate.submitSignUp">Create account & continue</button>
            </form>
        </div>

        <div class="edu-lead-gate-panel edu-lead-gate-panel--hidden" id="eduLeadGatePanelSignin" role="tabpanel" aria-labelledby="eduLeadGateTabSignin" hidden>
            <form class="deposit-form edu-lead-gate-form" id="eduLeadGateFormSignin" novalidate data-edu-form="signin">
                <div class="form-group">
                    <label for="eduLeadGateSigninEmail" data-i18n="eduLeadGate.labelEmail">Email address</label>
                    <input id="eduLeadGateSigninEmail" type="email" name="email" data-i18n-placeholder="eduLeadGate.placeholderEmail" placeholder="you@example.com" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="eduLeadGatePassword" data-i18n="eduLeadGate.labelPassword">Password</label>
                    <input id="eduLeadGatePassword" type="password" name="password" data-i18n-placeholder="eduLeadGate.placeholderPassword" placeholder="Enter your password" required autocomplete="current-password" minlength="6">
                </div>
                <p class="edu-lead-gate-note" data-i18n="eduLeadGate.signInNote">Sign-in is simulated until your authentication API is connected.</p>
                <p class="edu-lead-gate-error edu-lead-gate-error--signin" id="eduLeadGateErrorSignin" role="alert" hidden></p>
                <button type="submit" class="btn-primary edu-lead-gate-submit" data-i18n="eduLeadGate.submitSignIn">Sign in & continue</button>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/education-lead-gate.js?v=<?php echo @filemtime(__DIR__ . '/../assets/js/education-lead-gate.js') ?: time(); ?>"></script>
