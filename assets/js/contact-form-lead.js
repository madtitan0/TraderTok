/**
 * Contact us forms (home + contact page) — lead submission (register-style payload).
 */
(function () {
  var leads = window.TraderTokLeads;
  if (!leads) return;

  var form = document.getElementById("contactLeadForm");
  if (!form) return;

  var submitBtn = document.getElementById("contactLeadSubmitBtn");
  var formStatus = document.getElementById("contactLeadFormStatus");
  var otp = window.TraderTokRegistrationOtp;

  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function validatePhone(phone) {
    return /^[+]?[0-9\s\-()]{10,}$/.test(phone);
  }

  function showError(fieldId, message) {
    var field = document.getElementById(fieldId);
    var errorSpan = document.getElementById(fieldId + "-error");
    if (field && errorSpan) {
      field.classList.add("error");
      errorSpan.textContent = message;
    }
  }

  function clearError(fieldId) {
    var field = document.getElementById(fieldId);
    var errorSpan = document.getElementById(fieldId + "-error");
    if (field && errorSpan) {
      field.classList.remove("error");
      errorSpan.textContent = "";
    }
  }

  function clearAllErrors() {
    ["contactLeadName", "contactLeadSurname", "contactLeadPhone", "contactLeadEmail", "contactLeadMessage"].forEach(
      clearError,
    );
  }

  function validateForm() {
    clearAllErrors();
    var isValid = true;

    var name = document.getElementById("contactLeadName").value.trim();
    if (name === "") {
      showError("contactLeadName", "Name is required");
      isValid = false;
    } else if (name.length < 2) {
      showError("contactLeadName", "Name must be at least 2 characters");
      isValid = false;
    }

    var surname = document.getElementById("contactLeadSurname").value.trim();
    if (surname === "") {
      showError("contactLeadSurname", "Surname is required");
      isValid = false;
    } else if (surname.length < 2) {
      showError("contactLeadSurname", "Surname must be at least 2 characters");
      isValid = false;
    }

    var phone = document.getElementById("contactLeadPhone").value.trim();
    if (phone === "") {
      showError("contactLeadPhone", "Phone number is required");
      isValid = false;
    } else if (!validatePhone(phone)) {
      showError("contactLeadPhone", "Please enter a valid phone number");
      isValid = false;
    }

    var email = document.getElementById("contactLeadEmail").value.trim();
    if (email === "") {
      showError("contactLeadEmail", "Email is required");
      isValid = false;
    } else if (!validateEmail(email)) {
      showError("contactLeadEmail", "Please enter a valid email address");
      isValid = false;
    }

    var message = document.getElementById("contactLeadMessage").value.trim();
    if (message === "") {
      showError("contactLeadMessage", "Message is required");
      isValid = false;
    } else if (message.length < 10) {
      showError("contactLeadMessage", "Message must be at least 10 characters");
      isValid = false;
    }

    return isValid;
  }

  function buildContactPayload() {
    var source = form.getAttribute("data-form-source") || "contact";
    var message = document.getElementById("contactLeadMessage").value.trim();

    var payload = leads.mergePayload({
      firstName: document.getElementById("contactLeadName").value.trim(),
      lastName: document.getElementById("contactLeadSurname").value.trim(),
      email: document.getElementById("contactLeadEmail").value.trim(),
      phone: document.getElementById("contactLeadPhone").value.trim(),
      country: "CY",
      language: leads.getLanguage(),
      brandId: leads.BRAND_ID,
      businessUnitId: leads.BUSINESS_UNIT_ID,
      bonusTagId: leads.BONUS_TAG_ID,
      tags: [{ id: leads.TAG_ID }],
      accounts: leads.defaultAccounts(false),
      userDevice: leads.getUserDeviceInfoSafe(),
      clientzoneDisabled: true,
      comment: message,
      description: "[" + source + "] " + message,
    });

    if (otp) {
      payload.registrationVerificationOtp = otp.getOtpValue(form);
    }

    return payload;
  }

  function showFormStatus(type, text) {
    if (!formStatus) return;
    if (!type) {
      formStatus.className = "form-status";
      formStatus.textContent = "";
      return;
    }
    formStatus.className = "form-status " + type;
    formStatus.textContent = text;
  }

  function showSuccessView() {
    form.innerHTML =
      '<div style="text-align: center; padding: 40px 20px;">' +
      '<svg viewBox="0 0 24 24" fill="none" stroke="#00C853" stroke-width="2" style="width: 80px; height: 80px; margin-bottom: 20px;">' +
      '<circle cx="12" cy="12" r="10"></circle>' +
      '<polyline points="16 8 10 14 8 12"></polyline>' +
      "</svg>" +
      '<h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px; color: var(--text-primary);">Application Submitted!</h3>' +
      '<p style="color: var(--text-secondary);">Our manager will contact you shortly.</p>' +
      "</div>";
  }

  if (otp) {
    otp.mount(form, {
      getSubmitButton: function () {
        return submitBtn;
      },
      getOtpPayload: function () {
        return {
          firstName: document.getElementById("contactLeadName").value.trim(),
          lastName: document.getElementById("contactLeadSurname").value.trim(),
          email: document.getElementById("contactLeadEmail").value.trim(),
          phone: document.getElementById("contactLeadPhone").value.trim(),
          country: "CY",
          language: leads.getLanguage(),
          brandId: leads.BRAND_ID,
          businessUnitId: leads.BUSINESS_UNIT_ID,
        };
      },
      watchSelectors: [
        "#contactLeadName",
        "#contactLeadSurname",
        "#contactLeadPhone",
        "#contactLeadEmail",
      ],
    });
  }

  ["contactLeadName", "contactLeadSurname", "contactLeadPhone", "contactLeadEmail", "contactLeadMessage"].forEach(
    function (fieldId) {
      var field = document.getElementById(fieldId);
      if (!field) return;

      field.addEventListener("blur", function () {
        var value = field.value.trim();
        if (value === "") {
          clearError(fieldId);
          return;
        }
        if (fieldId === "contactLeadEmail" && !validateEmail(value)) {
          showError(fieldId, "Please enter a valid email address");
        } else if (fieldId === "contactLeadPhone" && !validatePhone(value)) {
          showError(fieldId, "Please enter a valid phone number");
        } else if (
          (fieldId === "contactLeadName" || fieldId === "contactLeadSurname") &&
          value.length < 2
        ) {
          showError(fieldId, "Must be at least 2 characters");
        } else if (fieldId === "contactLeadMessage" && value.length < 10) {
          showError(fieldId, "Message must be at least 10 characters");
        } else {
          clearError(fieldId);
        }
      });

      field.addEventListener("input", function () {
        if (field.classList.contains("error")) {
          clearError(fieldId);
        }
      });
    },
  );

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    if (!validateForm()) {
      showFormStatus("error", "Please fix the errors above");
      return;
    }

    if (otp && !otp.isReady(form)) {
      showFormStatus(
        "error",
        "Please verify your email with the code sent to you.",
      );
      return;
    }

    var originalBtnText = submitBtn ? submitBtn.textContent : "Contact Us";
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = "Sending...";
    }
    showFormStatus("", "");

    leads
      .postLead(buildContactPayload())
      .then(function (result) {
        if (!result.response.ok) {
          var message =
            (result.data && (result.data.message || result.data.error)) ||
            "Something went wrong. Please try again.";
          showFormStatus("error", message);
          return;
        }
        showSuccessView();
      })
      .catch(function () {
        showFormStatus("error", "Something went wrong. Please try again.");
      })
      .finally(function () {
        if (submitBtn) {
          submitBtn.textContent = originalBtnText;
          if (otp) {
            otp.refresh(form);
          } else {
            submitBtn.disabled = false;
          }
        }
      });
  });
})();
