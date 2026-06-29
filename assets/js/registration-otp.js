/**
 * Email verification OTP step before clientzone/leads registration submissions.
 */
(function (global) {
  var OTP_URL =
    "https://6dfed096-backend-clientzone.dataconect.com/api/v1/clientzone/auth/account/generate-registration-otp";
  var OTP_DURATION_SEC = 30 * 60;
  var MIN_CODE_LENGTH = 4;

  // Temporary master switch for the email verification (OTP) step across all
  // registration/lead forms. While false, the OTP step is hidden/disabled and
  // registration is allowed without verification. The UI and logic are left in
  // place so this can be re-enabled by flipping this flag back to true.
  var REGISTRATION_OTP_ENABLED = false;

  var instances = new WeakMap();

  function t(key, fallback) {
    if (global.i18n && typeof global.i18n.t === "function") {
      var out = global.i18n.t(key);
      if (out && out !== key) return out;
    }
    return fallback;
  }

  function parseJsonSafe(raw) {
    if (global.TraderTokLeads && global.TraderTokLeads.parseJsonSafe) {
      return global.TraderTokLeads.parseJsonSafe(raw);
    }
    try {
      return raw ? JSON.parse(raw) : null;
    } catch (error) {
      return null;
    }
  }

  function getHeaders() {
    if (global.TraderTokLeads && typeof global.TraderTokLeads.leadsHeaders === "function") {
      return global.TraderTokLeads.leadsHeaders();
    }
    return {
      "Content-Type": "application/json",
      Accept: "application/json",
      Referer: global.location.origin + "/",
      "x-platform-name": "ClientZone",
    };
  }

  function getInstance(formEl) {
    return instances.get(formEl) || null;
  }

  function fingerprint(payload) {
    if (!payload) return "";
    return JSON.stringify({
      email: payload.email || "",
      phone: payload.phone || "",
      firstName: payload.firstName || "",
      lastName: payload.lastName || "",
      country: payload.country || "",
      brandId: payload.brandId || "",
      businessUnitId: payload.businessUnitId || "",
    });
  }

  function formatTimer(seconds) {
    var mins = Math.floor(seconds / 60);
    var secs = seconds % 60;
    return String(mins) + ":" + (secs < 10 ? "0" : "") + String(secs);
  }

  function validateOtpPayload(payload) {
    if (!payload) return "Missing verification details.";
    if (!payload.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(payload.email)) {
      return t("registrationOtp.errEmail", "Please enter a valid email address.");
    }
    if (!payload.phone || String(payload.phone).replace(/\D/g, "").length < 6) {
      return t("registrationOtp.errPhone", "Please enter a valid phone number.");
    }
    if (!payload.firstName) {
      return t("registrationOtp.errFirstName", "Please enter your first name.");
    }
    if (!payload.lastName) {
      return t("registrationOtp.errLastName", "Please enter your last name.");
    }
    if (!payload.country) {
      return t("registrationOtp.errCountry", "Please select your country.");
    }
    if (!payload.brandId || !payload.businessUnitId) {
      return t("registrationOtp.errConfig", "Verification is not configured for this form.");
    }
    return "";
  }

  function clearTimer(state) {
    if (state.timerId) {
      global.clearInterval(state.timerId);
      state.timerId = null;
    }
  }

  function updateTimer(state) {
    if (!state.timerEl) return;
    var remaining = Math.max(0, Math.ceil((state.expiresAt - Date.now()) / 1000));
    state.timerEl.textContent = formatTimer(remaining);
    if (remaining <= 0) {
      clearTimer(state);
    }
  }

  function startTimer(state) {
    clearTimer(state);
    state.expiresAt = Date.now() + OTP_DURATION_SEC * 1000;
    updateTimer(state);
    state.timerId = global.setInterval(function () {
      updateTimer(state);
    }, 1000);
  }

  function showPanel(state, visible) {
    if (state.panel) state.panel.hidden = !visible;
    if (state.sendBtn) state.sendBtn.hidden = visible;
  }

  function setError(state, message) {
    if (!state.errorEl) return;
    state.errorEl.textContent = message || "";
    state.errorEl.hidden = !message;
  }

  function isOtpActive(state) {
    if (!REGISTRATION_OTP_ENABLED) return false;
    return typeof state.options.isActive === "function"
      ? !!state.options.isActive()
      : true;
  }

  function formIsComplete(state) {
    if (typeof state.options.isFormComplete === "function") {
      return !!state.options.isFormComplete();
    }
    return true;
  }

  function prerequisitesError(state) {
    if (typeof state.options.validateBeforeSend === "function") {
      var extraError = state.options.validateBeforeSend();
      if (extraError) return extraError;
    }
    var payload =
      state.options.getOtpPayload && state.options.getOtpPayload();
    return validateOtpPayload(payload);
  }

  function syncSubmit(formEl, state) {
    var submitBtn =
      (state.options.getSubmitButton && state.options.getSubmitButton()) ||
      formEl.querySelector('button[type="submit"]');
    if (!submitBtn) return;

    var active = isOtpActive(state);

    if (!active) {
      if (!REGISTRATION_OTP_ENABLED) {
        // Verification temporarily disabled globally: keep the "Send
        // verification code" button visible but greyed-out and unclickable
        // (the :disabled CSS handles opacity + not-allowed cursor), and keep the
        // wrapper visible so the host form can still surface validation errors.
        if (state.sendBtn) {
          state.sendBtn.hidden = false;
          state.sendBtn.disabled = true;
        }
        if (state.panel) state.panel.hidden = true;
        if (state.wrap) {
          state.wrap.hidden = false;
          state.wrap.style.margin = "";
        }
      } else if (state.wrap) {
        // Conditionally inactive (e.g. deposit/club "existing account" mode):
        // hide the OTP wrapper entirely as before.
        state.wrap.hidden = true;
        state.wrap.style.margin = "";
      }
      submitBtn.disabled = false;
      return;
    }

    if (state.wrap) {
      state.wrap.hidden = false;
      state.wrap.style.margin = "";
    }

    submitBtn.disabled = !formIsComplete(state) || !isReady(formEl);
  }

  function syncSendButton(formEl, state) {
    if (!state.sendBtn || (state.panel && !state.panel.hidden)) return;

    var active = isOtpActive(state);
    if (!active) {
      // Keep the button disabled (greyed-out) while verification is globally
      // turned off; otherwise leave it enabled when merely conditionally inactive.
      state.sendBtn.disabled = !REGISTRATION_OTP_ENABLED;
      return;
    }

    state.sendBtn.disabled = !!prerequisitesError(state);
  }

  function syncUi(formEl, state) {
    syncSubmit(formEl, state);
    syncSendButton(formEl, state);
  }

  function reset(formEl) {
    var state = getInstance(formEl);
    if (!state) return;

    state.sent = false;
    state.sentFingerprint = "";
    if (state.input) state.input.value = "";
    clearTimer(state);
    if (state.timerEl) state.timerEl.textContent = formatTimer(OTP_DURATION_SEC);
    showPanel(state, false);
    setError(state, "");
    syncUi(formEl, state);
  }

  function isRequired(formEl) {
    if (!REGISTRATION_OTP_ENABLED) return false;
    var state = getInstance(formEl);
    if (!state) return false;
    if (typeof state.options.isActive === "function") {
      return !!state.options.isActive();
    }
    return true;
  }

  function isReady(formEl) {
    var state = getInstance(formEl);
    if (!state) return true;
    if (!isRequired(formEl)) return true;
    if (!state.sent) return false;
    var code = state.input ? state.input.value.trim() : "";
    return code.length >= MIN_CODE_LENGTH;
  }

  function getOtpValue(formEl) {
    var state = getInstance(formEl);
    if (!state || !state.input) return "";
    return state.input.value.trim();
  }

  function refresh(formEl) {
    var state = getInstance(formEl);
    if (!state) return;
    syncUi(formEl, state);
  }

  function onWatchChange(formEl, state) {
    var payload =
      state.options.getOtpPayload && state.options.getOtpPayload();
    var nextFingerprint = fingerprint(payload);
    if (state.sent && state.sentFingerprint && nextFingerprint !== state.sentFingerprint) {
      reset(formEl);
      return;
    }
    syncUi(formEl, state);
  }

  function sendOtp(formEl, state) {
    if (!REGISTRATION_OTP_ENABLED) return;
    if (typeof state.options.validateBeforeSend === "function") {
      var extraError = state.options.validateBeforeSend();
      if (extraError) {
        setError(state, extraError);
        return;
      }
    }

    var payload =
      state.options.getOtpPayload && state.options.getOtpPayload();
    var validationError = validateOtpPayload(payload);
    if (validationError) {
      setError(state, validationError);
      return;
    }

    setError(state, "");
    if (state.sendBtn) {
      state.sendBtn.disabled = true;
      state.sendBtn.textContent = t("registrationOtp.sending", "Sending…");
    }
    if (state.resendBtn) state.resendBtn.disabled = true;

    global
      .fetch(OTP_URL, {
        method: "POST",
        headers: getHeaders(),
        body: JSON.stringify(payload),
      })
      .then(function (response) {
        return response.text().then(function (raw) {
          return { response: response, data: parseJsonSafe(raw), raw: raw };
        });
      })
      .then(function (result) {
        if (!result.response.ok) {
          var message =
            (result.data && (result.data.message || result.data.error)) ||
            t(
              "registrationOtp.errSend",
              "Unable to send verification code. Please try again.",
            );
          setError(state, message);
          return;
        }

        state.sent = true;
        state.sentFingerprint = fingerprint(payload);
        showPanel(state, true);
        startTimer(state);
        if (state.input) {
          state.input.focus();
        }
        syncUi(formEl, state);
      })
      .catch(function () {
        setError(
          state,
          t(
            "registrationOtp.errNetwork",
            "A network error occurred. Please try again.",
          ),
        );
      })
      .finally(function () {
        if (state.sendBtn) {
          state.sendBtn.textContent = t(
            "registrationOtp.sendCode",
            "Send verification code",
          );
        }
        if (state.resendBtn) {
          state.resendBtn.disabled = false;
        }
        syncUi(formEl, state);
      });
  }

  function mount(formEl, options) {
    if (!formEl || getInstance(formEl)) return;

    options = options || {};
    var submitBtn =
      (options.getSubmitButton && options.getSubmitButton()) ||
      formEl.querySelector('button[type="submit"]');
    if (!submitBtn) return;

    var wrap = document.createElement("div");
    wrap.className = "registration-otp-wrap";

    var sendBtn = document.createElement("button");
    sendBtn.type = "button";
    sendBtn.className = "registration-otp-send btn-secondary";
    sendBtn.textContent = t("registrationOtp.sendCode", "Send verification code");

    var panel = document.createElement("div");
    panel.className = "registration-otp-panel";
    panel.hidden = true;

    var header = document.createElement("div");
    header.className = "registration-otp-header";

    var message = document.createElement("p");
    message.className = "registration-otp-message";
    message.textContent = t(
      "registrationOtp.codeSent",
      "A verification code has been sent to your email",
    );

    var timerEl = document.createElement("span");
    timerEl.className = "registration-otp-timer";
    timerEl.textContent = formatTimer(OTP_DURATION_SEC);

    header.appendChild(message);
    header.appendChild(timerEl);

    var hint = document.createElement("p");
    hint.className = "registration-otp-hint";
    hint.textContent = t(
      "registrationOtp.spamHint",
      "If you don't see the email, please check your Junk or Spam folder.",
    );

    var input = document.createElement("input");
    input.type = "text";
    input.className = "registration-otp-input";
    input.inputMode = "numeric";
    input.autocomplete = "one-time-code";
    input.maxLength = 8;
    input.placeholder = t(
      "registrationOtp.enterCode",
      "Enter verification code",
    );
    input.setAttribute("aria-label", t("registrationOtp.enterCode", "Enter verification code"));

    var resendBtn = document.createElement("button");
    resendBtn.type = "button";
    resendBtn.className = "registration-otp-resend";
    resendBtn.textContent = t("registrationOtp.resendCode", "Resend Code");

    var errorEl = document.createElement("p");
    errorEl.className = "registration-otp-error";
    errorEl.hidden = true;
    errorEl.setAttribute("role", "alert");

    panel.appendChild(header);
    panel.appendChild(hint);
    panel.appendChild(input);
    panel.appendChild(resendBtn);

    wrap.appendChild(sendBtn);
    wrap.appendChild(panel);
    wrap.appendChild(errorEl);

    submitBtn.parentNode.insertBefore(wrap, submitBtn);

    var state = {
      options: options,
      wrap: wrap,
      sendBtn: sendBtn,
      panel: panel,
      input: input,
      resendBtn: resendBtn,
      timerEl: timerEl,
      errorEl: errorEl,
      sent: false,
      sentFingerprint: "",
      expiresAt: 0,
      timerId: null,
    };

    instances.set(formEl, state);

    sendBtn.addEventListener("click", function () {
      sendOtp(formEl, state);
    });

    resendBtn.addEventListener("click", function () {
      sendOtp(formEl, state);
    });

    input.addEventListener("input", function () {
      setError(state, "");
      syncUi(formEl, state);
    });

    var watchSelectors = options.watchSelectors || [];
    watchSelectors.forEach(function (selector) {
      var nodes = formEl.querySelectorAll(selector);
      Array.prototype.forEach.call(nodes, function (node) {
        node.addEventListener("input", function () {
          onWatchChange(formEl, state);
        });
        node.addEventListener("change", function () {
          onWatchChange(formEl, state);
        });
      });
    });

    if (typeof options.onMount === "function") {
      options.onMount(formEl, state);
    }

    syncUi(formEl, state);
  }

  global.TraderTokRegistrationOtp = {
    mount: mount,
    reset: reset,
    refresh: refresh,
    isReady: isReady,
    isRequired: isRequired,
    getOtpValue: getOtpValue,
    OTP_URL: OTP_URL,
  };
})(window);
