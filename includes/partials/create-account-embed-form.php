        <div class="registration-account-card create-account-embed-card">
          <div class="education-article-meta" data-i18n="auth.createAccount">Create Account</div>
          <h3 class="registration-account-card-title" data-i18n="auth.startJourney">Start your trading journey today</h3>
          <?php
          $signupFormExtraClass = 'create-account-embed-form';
          $signupFormActive = true;
          $signupShowHeader = false;
          $signupShowSocial = false;
          $signupTermsId = 'signupEmbedTerms';
          include __DIR__ . '/signup-form.php';
          ?>
        </div>

<style>
  .page-embed-form .create-account-embed-card .auth-form.create-account-embed-form {
    display: flex;
    gap: 18px;
  }

  .page-embed-form .create-account-embed-card .registration-qualification-fields .form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 0;
  }

  .page-embed-form .create-account-embed-card .registration-qualification-fields label,
  .page-embed-form .create-account-embed-card .registration-qualification-fields legend {
    font-size: 14px;
    font-weight: 500;
    color: var(--text-primary);
  }

  .page-embed-form .create-account-embed-card .registration-qualification-radio-group {
    border: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .page-embed-form .create-account-embed-card .registration-qualification-radio-group label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 400;
  }

  .page-embed-form .create-account-embed-card .country-dropdown {
    z-index: 40;
  }
</style>
