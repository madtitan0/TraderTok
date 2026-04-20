/**
 * Demo account lead modal — opens from [data-open-demo-account].
 * Submit is simulated until a backend endpoint is connected.
 */
(function () {
  var modal = document.getElementById('demoAccountModal');
  if (!modal) {
    return;
  }

  var form = document.getElementById('demoAccountForm');
  var successEl = document.getElementById('demoAccountSuccess');
  var errorEl = document.getElementById('demoAccountError');
  var introEl = document.getElementById('demoAccountModalIntro');

  function tr(key) {
    if (window.i18n && typeof window.i18n.t === 'function') {
      var out = window.i18n.t(key);
      if (out && out !== key) return out;
    }
    return key;
  }

  function submitLabel() {
    return tr('demoAccountModal.submitButton');
  }

  function showError(msg) {
    if (!errorEl) {
      return;
    }
    if (msg) {
      errorEl.textContent = msg;
      errorEl.hidden = false;
    } else {
      errorEl.textContent = '';
      errorEl.hidden = true;
    }
  }

  function openModal() {
    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    showError('');
    if (form && successEl && introEl) {
      form.hidden = false;
      successEl.hidden = true;
      introEl.hidden = false;
      form.reset();
    }
    var submitBtn = form ? form.querySelector('.demo-account-submit') : null;
    if (submitBtn) {
      submitBtn.textContent = submitLabel();
    }
    var first = document.getElementById('demoAccountName');
    if (first) {
      window.setTimeout(function () {
        first.focus();
      }, 100);
    }
  }

  function closeModal() {
    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    showError('');
  }

  function simulateSubmit() {
    return new Promise(function (resolve) {
      window.setTimeout(function () {
        resolve({ ok: true, simulated: true });
      }, 450);
    });
  }

  document.addEventListener(
    'click',
    function (e) {
      var trigger = e.target.closest('[data-open-demo-account]');
      if (!trigger) {
        return;
      }
      e.preventDefault();
      e.stopPropagation();
      openModal();
    },
    true
  );

  modal.querySelectorAll('.demo-account-modal-close, .demo-account-modal-overlay').forEach(function (el) {
    el.addEventListener('click', closeModal);
  });

  modal.querySelectorAll('.demo-account-modal-close-secondary').forEach(function (el) {
    el.addEventListener('click', closeModal);
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
      closeModal();
    }
  });

  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      showError('');

      var name = (form.querySelector('[name="name"]') || {}).value;
      var email = (form.querySelector('[name="email"]') || {}).value;
      var phone = (form.querySelector('[name="phone"]') || {}).value;
      var country = (form.querySelector('[name="country"]') || {}).value;
      var consent = form.querySelector('[name="consent"]');
      var submitBtn = form.querySelector('.demo-account-submit');

      name = name ? name.trim() : '';
      email = email ? email.trim() : '';
      phone = phone ? phone.trim() : '';

      if (!name) {
        showError(tr('openDemoAccountPage.errors.nameRequired'));
        return;
      }
      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showError(tr('openDemoAccountPage.errors.emailInvalid'));
        return;
      }
      if (!phone) {
        showError(tr('openDemoAccountPage.errors.phoneRequired'));
        return;
      }
      if (!country) {
        showError(tr('openDemoAccountPage.errors.countryRequired'));
        return;
      }
      if (!consent || !consent.checked) {
        showError(tr('demoAccountModal.errors.consentPrivacy'));
        return;
      }

      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = tr('demoAccountModal.sending');
      }

      simulateSubmit().then(
        function () {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = submitLabel();
          }
          if (form && successEl && introEl) {
            form.hidden = true;
            introEl.hidden = true;
            successEl.hidden = false;
          }
        },
        function () {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = submitLabel();
          }
          showError(tr('demoAccountModal.errors.generic'));
        }
      );
    });
  }

  window.addEventListener('tradertok:i18n-applied', function () {
    var submitBtn = form ? form.querySelector('.demo-account-submit') : null;
    if (submitBtn && !submitBtn.disabled) {
      submitBtn.textContent = submitLabel();
    }
  });

  window.DemoAccountModal = {
    open: openModal,
    close: closeModal,
  };
})();
