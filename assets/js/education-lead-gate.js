/**
 * Education Academy lead gate — unlock via localStorage eduHub_form_submitted === 'true'
 * Wire form POST to your API later; on success call the same unlock path.
 */
(function () {
  var STORAGE_KEY = 'eduHub_form_submitted';

  /** Slugs that trigger the lead gate page guard (not `education-article` — article URLs must load). */
  var EDU_GATE_SLUGS = [
    'courses',
    'trading-essentials',
    'edu-market-news',
    'edu-ebooks',
    'edu-webinars',
    'edu-glossary',
    'forex-trading-fundamentals',
    'cfd-trading-basics',
    'leverage-margin-risk-basics',
    'risk-management-essentials',
    'technical-analysis-for-beginners',
    'fundamental-analysis-basics',
    'trading-psychology-basics',
    'gold-trading-for-beginners',
    'indices-trading-basics',
    'platform-basics',
  ];

  if (typeof window.__EDU_GATE_SLUGS !== 'undefined' && Array.isArray(window.__EDU_GATE_SLUGS)) {
    EDU_GATE_SLUGS = window.__EDU_GATE_SLUGS;
  }

  function isUnlocked() {
    try {
      return localStorage.getItem(STORAGE_KEY) === 'true';
    } catch (e) {
      return false;
    }
  }

  function getCurrentPageSlug() {
    var q = new URLSearchParams(window.location.search).get('page');
    if (q) {
      return q;
    }
    var path = window.location.pathname.replace(/^\/+|\/+$/g, '');
    if (!path) {
      return '';
    }
    return path.split('/')[0] || '';
  }

  function slugFromHref(href) {
    if (!href || href === '#' || href.indexOf('javascript:') === 0) {
      return null;
    }
    try {
      var u = new URL(href, window.location.href);
      var page = u.searchParams.get('page');
      if (page) {
        return page;
      }
      var p = u.pathname.replace(/^\/+|\/+$/g, '');
      if (!p) {
        return null;
      }
      return p.split('/')[0] || null;
    } catch (e) {
      return null;
    }
  }

  function isGatedSlug(slug) {
    if (!slug) {
      return false;
    }
    return EDU_GATE_SLUGS.indexOf(slug) !== -1;
  }

  function normalizePendingHref(href) {
    if (!href) {
      return null;
    }
    if (href.indexOf('://') !== -1) {
      return href;
    }
    if (href.charAt(0) === '/') {
      return '.' + href;
    }
    return href;
  }

  var modalEl;
  var pendingHref = null;

  function getModal() {
    if (!modalEl) {
      modalEl = document.getElementById('eduLeadGateModal');
    }
    return modalEl;
  }

  function openModal(nextHref) {
    pendingHref = normalizePendingHref(nextHref) || null;
    var m = getModal();
    if (!m) {
      return;
    }
    m.classList.add('active');
    document.body.style.overflow = 'hidden';
    var nameInput = m.querySelector('input[name="name"]');
    if (nameInput) {
      nameInput.focus();
    }
  }

  function closeModal() {
    var m = getModal();
    if (!m) {
      return;
    }
    m.classList.remove('active');
    document.body.style.overflow = '';
    pendingHref = null;
  }

  /**
   * Simulated API: always resolves successfully until a real endpoint is wired.
   * Replace this with fetch() to your CRM; call onUnlockSuccess only on HTTP 2xx.
   */
  function simulateLeadSubmit(payload) {
    return new Promise(function (resolve) {
      window.setTimeout(function () {
        resolve({ ok: true, simulated: true, received: payload });
      }, 400);
    });
  }

  function showFormError(message) {
    var el = document.getElementById('eduLeadGateError');
    if (!el) {
      return;
    }
    if (message) {
      el.textContent = message;
      el.hidden = false;
    } else {
      el.textContent = '';
      el.hidden = true;
    }
  }

  function onUnlockSuccess() {
    try {
      localStorage.setItem(STORAGE_KEY, 'true');
    } catch (e) {}

    var params = new URLSearchParams(window.location.search);
    var ret = params.get('return');
    if (ret) {
      try {
        var decoded = decodeURIComponent(ret);
        if (decoded.indexOf('://') === -1 && decoded.charAt(0) === '/') {
          window.location.href = decoded;
          return;
        }
      } catch (e) {}
    }

    if (pendingHref) {
      window.location.href = pendingHref;
      return;
    }

    closeModal();

    if (window.location.search.indexOf('edu_gate') !== -1) {
      window.history.replaceState({}, document.title, window.location.pathname);
    }
  }

  function handleFormSubmit(e) {
    e.preventDefault();
    showFormError('');

    var form = e.target;
    var name = (form.querySelector('[name="name"]') || {}).value;
    var email = (form.querySelector('[name="email"]') || {}).value;
    var consent = form.querySelector('[name="consent"]');
    var submitBtn = form.querySelector('.edu-lead-gate-submit');

    name = name ? name.trim() : '';
    email = email ? email.trim() : '';

    if (!name) {
      showFormError('Please enter your full name.');
      return;
    }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showFormError('Please enter a valid email address.');
      return;
    }
    if (!consent || !consent.checked) {
      showFormError('Please accept the Privacy Policy to continue.');
      return;
    }

    var payload = {
      name: name,
      email: email,
      consent: true,
    };

    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = 'Continuing…';
    }

    simulateLeadSubmit(payload).then(
      function () {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Continue to Academy';
        }
        onUnlockSuccess();
      },
      function () {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Continue to Academy';
        }
        showFormError('Something went wrong. Please try again.');
      }
    );
  }

  function interceptLinkClick(e) {
    if (isUnlocked()) {
      return;
    }
    var a = e.target.closest('a');
    if (!a || !a.getAttribute('href')) {
      return;
    }
    if (a.getAttribute('data-edu-gate-ignore') === '1') {
      return;
    }
    var slug = slugFromHref(a.href);
    if (!isGatedSlug(slug)) {
      return;
    }
    e.preventDefault();
    e.stopPropagation();
    openModal(a.getAttribute('href'));
  }

  function runPageGuard() {
    if (isUnlocked()) {
      return;
    }
    var slug = getCurrentPageSlug();
    if (slug === 'education-hub') {
      return;
    }
    if (!isGatedSlug(slug)) {
      return;
    }
    var qs = new URLSearchParams(window.location.search);
    if (qs.get('edu_gate') === '1') {
      return;
    }
    var ret = window.location.pathname + window.location.search;
    window.location.replace('./education-hub?edu_gate=1&return=' + encodeURIComponent(ret));
  }

  function onDomReady() {
    runPageGuard();

    document.addEventListener('click', interceptLinkClick, true);

    var m = getModal();
    if (m) {
      var form = m.querySelector('#eduLeadGateForm');
      if (form) {
        form.addEventListener('submit', handleFormSubmit);
      }
      var closeBtn = m.querySelector('.edu-lead-gate-close');
      if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
      }
      var overlay = m.querySelector('.edu-lead-gate-overlay');
      if (overlay) {
        overlay.addEventListener('click', closeModal);
      }
    }

    var qs = new URLSearchParams(window.location.search);
    if (qs.get('edu_gate') === '1' && !isUnlocked()) {
      var ret = qs.get('return');
      if (ret) {
        try {
          var dec = decodeURIComponent(ret);
          if (dec.indexOf('://') === -1) {
            openModal(dec);
          }
        } catch (err) {
          openModal(null);
        }
      } else {
        openModal(null);
      }
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', onDomReady);
  } else {
    onDomReady();
  }

  window.EduLeadGate = {
    STORAGE_KEY: STORAGE_KEY,
    isUnlocked: isUnlocked,
    openModal: openModal,
    closeModal: closeModal,
    isGatedSlug: isGatedSlug,
    slugFromHref: slugFromHref,
  };
})();
