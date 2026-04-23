/**
 * Education Academy gate — sign up / sign in (simulated) before gated destinations.
 * After successful sign-in only, sessionStorage allows moving among the 8 Education Hub sections
 * without the modal until the tab closes. Sign-up does not set that pass. Course lesson URLs
 * always use the normal gate unless the generic session pass applies for the post-submit hop.
 */
(function () {
  var SESSION_KEY = 'edu_academy_session';
  /** Set only after successful sign-in; allows the 8 hub section pages only (same tab). */
  var HUB8_SESSION_KEY = 'edu_hub8_signed_in';

  var HUB_SECTION_SLUGS = [
    'courses',
    'trading-essentials',
    'edu-market-news',
    'edu-ebooks',
    'edu-webinars',
    'edu-glossary',
    'edu-tutorials',
    'edu-resources',
  ];

  /** Slugs that trigger the lead gate page guard (not `education-article` — article URLs must load). */
  var EDU_GATE_SLUGS = [
    'courses',
    'trading-essentials',
    'edu-market-news',
    'edu-ebooks',
    'edu-webinars',
    'edu-glossary',
    'edu-tutorials',
    'edu-resources',
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

  function tMsg(key, fallback) {
    if (typeof window !== 'undefined' && window.i18n && typeof window.i18n.t === 'function') {
      var v = window.i18n.t(key);
      if (v && v !== key) {
        return v;
      }
    }
    return fallback;
  }

  /** True after successful sign-in/up in this tab (clears when the tab closes). Used only to avoid an immediate post-submit redirect loop. */
  function hasSessionGatePass() {
    try {
      return sessionStorage.getItem(SESSION_KEY) === '1';
    } catch (e) {
      return false;
    }
  }

  function setSessionGatePass() {
    try {
      sessionStorage.setItem(SESSION_KEY, '1');
    } catch (e) {}
  }

  function clearSessionGatePass() {
    try {
      sessionStorage.removeItem(SESSION_KEY);
      sessionStorage.removeItem(HUB8_SESSION_KEY);
    } catch (e) {}
  }

  function isHubSectionSlug(slug) {
    return !!slug && HUB_SECTION_SLUGS.indexOf(slug) !== -1;
  }

  function hasHub8GatePass() {
    try {
      return sessionStorage.getItem(HUB8_SESSION_KEY) === '1';
    } catch (e) {
      return false;
    }
  }

  function setHub8GatePass() {
    try {
      sessionStorage.setItem(HUB8_SESSION_KEY, '1');
    } catch (e) {}
  }

  /** @deprecated Use hasSessionGatePass; kept for external callers. */
  function isUnlocked() {
    return hasSessionGatePass();
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
    if (href.charAt(0) === '#') {
      return href;
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

  function showFormError(message, panel) {
    panel = panel || 'signup';
    var id = panel === 'signin' ? 'eduLeadGateErrorSignin' : 'eduLeadGateError';
    var el = document.getElementById(id);
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

  function clearAllErrors() {
    showFormError('', 'signup');
    showFormError('', 'signin');
  }

  function setMode(mode) {
    var m = getModal();
    if (!m) {
      return;
    }
    var signupTab = m.querySelector('#eduLeadGateTabSignup');
    var signinTab = m.querySelector('#eduLeadGateTabSignin');
    var signupPanel = m.querySelector('#eduLeadGatePanelSignup');
    var signinPanel = m.querySelector('#eduLeadGatePanelSignin');
    if (!signupTab || !signinTab || !signupPanel || !signinPanel) {
      return;
    }

    var isSignup = mode !== 'signin';
    signupTab.setAttribute('aria-selected', isSignup ? 'true' : 'false');
    signupTab.tabIndex = isSignup ? 0 : -1;
    signinTab.setAttribute('aria-selected', isSignup ? 'false' : 'true');
    signinTab.tabIndex = isSignup ? -1 : 0;

    if (isSignup) {
      signupPanel.hidden = false;
      signupPanel.classList.remove('edu-lead-gate-panel--hidden');
      signinPanel.hidden = true;
      signinPanel.classList.add('edu-lead-gate-panel--hidden');
    } else {
      signupPanel.hidden = true;
      signupPanel.classList.add('edu-lead-gate-panel--hidden');
      signinPanel.hidden = false;
      signinPanel.classList.remove('edu-lead-gate-panel--hidden');
    }

    clearAllErrors();
  }

  function focusActivePanelFirstField() {
    var m = getModal();
    if (!m) {
      return;
    }
    var signinSelected = m.querySelector('#eduLeadGateTabSignin[aria-selected="true"]');
    if (signinSelected) {
      var em = m.querySelector('#eduLeadGateSigninEmail');
      if (em) {
        em.focus();
      }
      return;
    }
    var nm = m.querySelector('#eduLeadGateName');
    if (nm) {
      nm.focus();
    }
  }

  function resetModalForms() {
    var m = getModal();
    if (!m) {
      return;
    }
    m.querySelectorAll('.edu-lead-gate-form').forEach(function (f) {
      if (typeof f.reset === 'function') {
        f.reset();
      }
    });
  }

  function openModal(nextHref) {
    pendingHref = normalizePendingHref(nextHref) || null;
    var m = getModal();
    if (!m) {
      return;
    }
    resetModalForms();
    setMode('signup');
    m.classList.add('active');
    document.body.style.overflow = 'hidden';
    window.setTimeout(focusActivePanelFirstField, 0);
  }

  function closeModal() {
    var m = getModal();
    if (!m) {
      return;
    }
    m.classList.remove('active');
    document.body.style.overflow = '';
    pendingHref = null;
    clearAllErrors();
  }

  /**
   * Simulated API: always resolves successfully until a real endpoint is wired.
   */
  function simulateLeadSubmit(payload) {
    return new Promise(function (resolve) {
      window.setTimeout(function () {
        resolve({ ok: true, simulated: true, received: payload });
      }, 400);
    });
  }

  function resetSubmitButton(form, labelKey, labelFallback) {
    var submitBtn = form.querySelector('.edu-lead-gate-submit');
    if (submitBtn) {
      submitBtn.disabled = false;
      submitBtn.textContent = tMsg(labelKey, labelFallback);
    }
  }

  /**
   * @param {{ hub8?: boolean }} opts hub8: true after simulated sign-in (8 hub sections share session).
   */
  function onUnlockSuccess(opts) {
    opts = opts || {};
    if (opts.hub8) {
      setHub8GatePass();
    }
    setSessionGatePass();

    if (pendingHref && pendingHref.charAt(0) === '#') {
      var hash = pendingHref.slice(1);
      pendingHref = null;
      var modal = getModal();
      if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
      }
      window.location.hash = hash;
      if (window.location.search.indexOf('edu_gate') !== -1) {
        var path = window.location.pathname;
        window.history.replaceState({}, document.title, path + window.location.hash);
      }
      return;
    }

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

  function handleSignupSubmit(e) {
    e.preventDefault();
    clearAllErrors();

    var form = e.target;
    var name = (form.querySelector('[name="name"]') || {}).value;
    var email = (form.querySelector('[name="email"]') || {}).value;
    var consent = form.querySelector('[name="consent"]');
    var submitBtn = form.querySelector('.edu-lead-gate-submit');

    name = name ? name.trim() : '';
    email = email ? email.trim() : '';

    if (!name) {
      showFormError(tMsg('eduLeadGate.errName', 'Please enter your full name.'), 'signup');
      return;
    }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showFormError(tMsg('eduLeadGate.errEmail', 'Please enter a valid email address.'), 'signup');
      return;
    }
    if (!consent || !consent.checked) {
      showFormError(tMsg('eduLeadGate.errConsent', 'Please accept the Privacy Policy to continue.'), 'signup');
      return;
    }

    var payload = {
      mode: 'signup',
      name: name,
      email: email,
      consent: true,
    };

    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = tMsg('eduLeadGate.submitBusy', 'Continuing…');
    }

    simulateLeadSubmit(payload).then(
      function () {
        resetSubmitButton(form, 'eduLeadGate.submitSignUp', 'Create account & continue');
        onUnlockSuccess({});
      },
      function () {
        resetSubmitButton(form, 'eduLeadGate.submitSignUp', 'Create account & continue');
        showFormError(tMsg('eduLeadGate.errGeneric', 'Something went wrong. Please try again.'), 'signup');
      }
    );
  }

  function handleSigninSubmit(e) {
    e.preventDefault();
    clearAllErrors();

    var form = e.target;
    var email = (form.querySelector('[name="email"]') || {}).value;
    var password = (form.querySelector('[name="password"]') || {}).value;
    var submitBtn = form.querySelector('.edu-lead-gate-submit');

    email = email ? email.trim() : '';
    password = password || '';

    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showFormError(tMsg('eduLeadGate.errEmail', 'Please enter a valid email address.'), 'signin');
      return;
    }
    if (password.length < 6) {
      showFormError(tMsg('eduLeadGate.errPassword', 'Please enter a password (at least 6 characters).'), 'signin');
      return;
    }

    var payload = {
      mode: 'signin',
      email: email,
    };

    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = tMsg('eduLeadGate.submitBusy', 'Continuing…');
    }

    simulateLeadSubmit(payload).then(
      function () {
        resetSubmitButton(form, 'eduLeadGate.submitSignIn', 'Sign in & continue');
        onUnlockSuccess({ hub8: true });
      },
      function () {
        resetSubmitButton(form, 'eduLeadGate.submitSignIn', 'Sign in & continue');
        showFormError(tMsg('eduLeadGate.errGeneric', 'Something went wrong. Please try again.'), 'signin');
      }
    );
  }

  function interceptLinkClick(e) {
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
    if (slug === getCurrentPageSlug()) {
      return;
    }
    if (hasHub8GatePass()) {
      var cur = getCurrentPageSlug();
      if (isHubSectionSlug(slug) && (isHubSectionSlug(cur) || cur === 'education-hub')) {
        return;
      }
    }
    e.preventDefault();
    e.stopPropagation();
    openModal(a.getAttribute('href'));
  }

  function handleAccessContentClick(e) {
    var trigger = e.target.closest('[data-edu-access-content="1"]');
    if (!trigger) {
      return;
    }
    e.preventDefault();
    if (hasHub8GatePass()) {
      window.location.hash = 'hub-sections';
      var sec = document.getElementById('hub-sections');
      if (sec) {
        sec.scrollIntoView({ behavior: 'smooth' });
      }
      return;
    }
    openModal('#hub-sections');
  }

  function runPageGuard() {
    var slug = getCurrentPageSlug();
    if (slug === 'education-hub') {
      return;
    }
    if (!isGatedSlug(slug)) {
      return;
    }
    if (hasHub8GatePass() && isHubSectionSlug(slug)) {
      return;
    }
    if (hasSessionGatePass()) {
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
    try {
      localStorage.removeItem('eduHub_form_submitted');
    } catch (e) {}

    runPageGuard();

    document.addEventListener('click', interceptLinkClick, true);
    document.addEventListener('click', handleAccessContentClick, false);

    var m = getModal();
    if (m) {
      var formSu = m.querySelector('#eduLeadGateFormSignup');
      var formSi = m.querySelector('#eduLeadGateFormSignin');
      if (formSu) {
        formSu.addEventListener('submit', handleSignupSubmit);
      }
      if (formSi) {
        formSi.addEventListener('submit', handleSigninSubmit);
      }

      m.querySelectorAll('.edu-lead-gate-mode-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
          var mode = btn.getAttribute('data-edu-mode');
          if (mode) {
            setMode(mode);
            focusActivePanelFirstField();
          }
        });
      });

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
    if (qs.get('edu_gate') === '1') {
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
    SESSION_KEY: SESSION_KEY,
    HUB8_SESSION_KEY: HUB8_SESSION_KEY,
    HUB_SECTION_SLUGS: HUB_SECTION_SLUGS,
    hasSessionGatePass: hasSessionGatePass,
    hasHub8GatePass: hasHub8GatePass,
    isHubSectionSlug: isHubSectionSlug,
    clearSessionGatePass: clearSessionGatePass,
    isUnlocked: isUnlocked,
    openModal: openModal,
    closeModal: closeModal,
    isGatedSlug: isGatedSlug,
    slugFromHref: slugFromHref,
    setMode: setMode,
  };
})();
