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

  function simulateSubmit(payload) {
    return new Promise(function (resolve) {
      window.setTimeout(function () {
        if (typeof console !== 'undefined' && console.log) {
          console.log('[demo-account] lead (simulated):', payload);
        }
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
        showError('Please enter your full name.');
        return;
      }
      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showError('Please enter a valid email address.');
        return;
      }
      if (!phone) {
        showError('Please enter a phone number.');
        return;
      }
      if (!country) {
        showError('Please select your country or region.');
        return;
      }
      if (!consent || !consent.checked) {
        showError('Please accept the privacy terms to continue.');
        return;
      }

      var payload = {
        name: name,
        email: email,
        phone: phone,
        country: country,
        consent: true,
        source: 'demo_account_modal',
      };

      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending…';
      }

      simulateSubmit(payload).then(
        function () {
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Create demo account';
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
            submitBtn.textContent = 'Create demo account';
          }
          showError('Something went wrong. Please try again.');
        }
      );
    });
  }

  window.DemoAccountModal = {
    open: openModal,
    close: closeModal,
  };
})();
