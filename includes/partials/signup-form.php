<?php
/**
 * Shared Create Account / signup form fields.
 * Used on the create-account-embed page (auth sidebar uses inline markup in head.php).
 */
$signupFormExtraClass = isset($signupFormExtraClass) ? (string) $signupFormExtraClass : '';
$signupShowSocial = !isset($signupShowSocial) || $signupShowSocial;
$signupShowHeader = !isset($signupShowHeader) || $signupShowHeader;
$signupFormActive = isset($signupFormActive) ? (bool) $signupFormActive : true;
$signupTermsId = isset($signupTermsId) ? (string) $signupTermsId : 'terms-agree';
?>
<form class="auth-form<?php echo $signupFormActive ? ' active' : ''; ?><?php echo $signupFormExtraClass !== '' ? ' ' . htmlspecialchars($signupFormExtraClass, ENT_QUOTES, 'UTF-8') : ''; ?>" id="signupForm" data-form="signup" novalidate>
  <?php if ($signupShowHeader) : ?>
  <h2 class="auth-form-title" data-i18n="auth.createAccount">Create Account</h2>
  <p class="auth-form-subtitle" data-i18n="auth.startJourney">Start your trading journey today</p>
  <?php endif; ?>

  <div class="auth-form-row">
    <div class="auth-form-group">
      <label for="signup-firstname" class="auth-label" data-i18n="auth.firstName">First Name</label>
      <input type="text" id="signup-firstname" class="auth-input"
        data-i18n-placeholder="auth.firstNamePlaceholder" placeholder="John" required autocomplete="given-name">
    </div>
    <div class="auth-form-group">
      <label for="signup-lastname" class="auth-label" data-i18n="auth.lastName">Last Name</label>
      <input type="text" id="signup-lastname" class="auth-input"
        data-i18n-placeholder="auth.lastNamePlaceholder" placeholder="Doe" required autocomplete="family-name">
    </div>
  </div>

  <div class="auth-form-group">
    <label for="signup-email" class="auth-label" data-i18n="auth.email">Email</label>
    <input type="email" id="signup-email" class="auth-input" data-i18n-placeholder="auth.emailPlaceholder"
      placeholder="support@tradertok.com" required autocomplete="email">
  </div>

  <?php include __DIR__ . '/auth-phone-country-picker.php'; ?>

  <?php
  $qualificationNamePrefix = 'signup_';
  $qualificationIdPrefix = 'signup';
  $qualificationInputClass = 'auth-input';
  include __DIR__ . '/registration-qualification-fields.php';
  ?>

  <div class="auth-form-group">
    <label for="signup-password" class="auth-label">Password</label>
    <input type="password" id="signup-password" class="auth-input" placeholder="Enter Password" required autocomplete="new-password">
  </div>

  <label class="auth-checkbox auth-terms">
    <input type="checkbox" id="<?php echo htmlspecialchars($signupTermsId, ENT_QUOTES, 'UTF-8'); ?>" required>
    <span>I agree to the <a href="./files/Service_Agreement_Terms_&_Conditions_Amber_Rock_Trade_Ltd.pdf"
        target="_blank" rel="noopener noreferrer" class="auth-link">Terms of Service</a> and <a
        href="./files/Privacy_Policy_Amber_Rock_Trade_Ltd.pdf" target="_blank" rel="noopener noreferrer" class="auth-link">Privacy
        Policy</a></span>
  </label>

  <button type="submit" class="auth-submit-btn" data-i18n="auth.createAccount">Create Account</button>

  <?php if ($signupShowSocial) : ?>
  <div class="auth-divider">
    <span>or continue with</span>
  </div>

  <div class="auth-social">
    <button type="button" class="auth-social-btn">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
        <path
          d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
          fill="#4285F4" />
        <path
          d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
          fill="#34A853" />
        <path
          d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
          fill="#FBBC05" />
        <path
          d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
          fill="#EA4335" />
      </svg>
      Google
    </button>
    <button type="button" class="auth-social-btn">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="#1877F2">
        <path
          d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
      </svg>
      Facebook
    </button>
  </div>
  <?php endif; ?>
</form>
