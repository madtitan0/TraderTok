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
            <h3 class="modal-title" id="eduLeadGateTitle">Access TraderTok Academy</h3>
            <p class="modal-subtitle">Enter your details to unlock courses, articles, market insights, eBooks, webinars, and the glossary. Educational content only.</p>
        </div>
        <form class="deposit-form" id="eduLeadGateForm" novalidate>
            <div class="form-group">
                <label for="eduLeadGateName">Full name</label>
                <input id="eduLeadGateName" type="text" name="name" placeholder="Your name" required autocomplete="name">
            </div>
            <div class="form-group">
                <label for="eduLeadGateEmail">Email address</label>
                <input id="eduLeadGateEmail" type="email" name="email" placeholder="you@example.com" required autocomplete="email">
            </div>
            <div class="edu-lead-gate-consent">
                <label class="edu-lead-gate-check-label">
                    <input type="checkbox" name="consent" id="eduLeadGateConsent" value="1" required>
                    <span>I agree to receive educational content and Academy updates, and I have read the <a href="./privacy-policy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.</span>
                </label>
            </div>
            <p class="edu-lead-gate-note">The strategic plan emphasises <strong>name</strong> and <strong>email</strong> for lead capture. The consent checkbox supports compliance. Submit is simulated as successful until you connect a backend.</p>
            <p class="edu-lead-gate-error" id="eduLeadGateError" role="alert" hidden></p>
            <button type="submit" class="btn-primary edu-lead-gate-submit">Continue to Academy</button>
        </form>
    </div>
</div>
<script src="assets/js/education-lead-gate.js?v=<?php echo @filemtime(__DIR__ . '/../assets/js/education-lead-gate.js') ?: time(); ?>"></script>
