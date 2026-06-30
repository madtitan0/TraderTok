/**
 * eBooks page — download modal lead submission (register-style payload).
 */
(function () {
  var leads = window.TraderTokLeads;
  if (!leads) return;

  var modal = document.getElementById("ebookLeadModal");
  var form = document.getElementById("ebookLeadForm");
  if (!modal || !form) return;

  var closeBtn = document.getElementById("closeEbookModal");
  var errEl = document.getElementById("ebookLeadFormError");
  var bookIdInput = document.getElementById("targetBookId");
  var thankYouBase = form.getAttribute("data-thank-you-url") || "";

  var EXPERIENCE_FIELD_ID = "a374f4f6-0007-4571-94c8-cc73121a6691";

  var BOOK_TOPICS = {
    forex: "Beginner's Guide to Forex Trading",
    cfd: "CFD Trading Essentials",
    risk: "Risk Management Playbook",
    technical: "Technical Analysis Starter Guide",
    psychology: "Trading Psychology Handbook",
  };

  function readValue(name) {
    var field = form.querySelector('[name="' + name + '"]');
    if (!field || typeof field.value !== "string") return "";
    return field.value.trim();
  }

  function showError(message) {
    if (!errEl) return;
    errEl.textContent = message || "";
    errEl.hidden = !message;
  }

  function bookTopic(bookId) {
    return BOOK_TOPICS[bookId] || bookId || "eBook";
  }

  function thankYouUrl(bookId) {
    var topic = bookTopic(bookId);
    if (!thankYouBase) return "";
    var sep = thankYouBase.indexOf("?") >= 0 ? "&" : "?";
    return thankYouBase + sep + "topic=" + encodeURIComponent(topic);
  }

  function buildPayload() {
    var names = leads.splitFullName(readValue("name"));
    var bookId = bookIdInput ? bookIdInput.value.trim() : "";
    var topic = bookTopic(bookId);
    var experience = readValue("experience");
    var customFields = [];

    if (experience) {
      customFields.push({ id: EXPERIENCE_FIELD_ID, value: experience });
    }

    return leads.mergePayload({
      firstName: names.firstName,
      lastName: names.lastName,
      email: readValue("email"),
      country: readValue("country"),
      language: leads.getLanguage(),
      brandId: leads.BRAND_ID,
      businessUnitId: leads.BUSINESS_UNIT_ID,
      bonusTagId: leads.BONUS_TAG_ID,
      tags: [{ id: leads.TAG_ID }],
      accounts: leads.defaultAccounts(false),
      userDevice: leads.getUserDeviceInfoSafe(),

      customFields: customFields,
      comment: topic,
      description: "[ebook] " + topic + (experience ? " | " + experience : ""),
    });
  }

  function validateForm() {
    var name = readValue("name");
    var email = readValue("email");
    var country = readValue("country");
    var experience = readValue("experience");

    if (!name) {
      showError("Please enter your full name.");
      return false;
    }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      showError("Please enter a valid email address.");
      return false;
    }
    if (!country) {
      showError("Please select your country.");
      return false;
    }
    if (!experience) {
      showError("Please select your trading experience level.");
      return false;
    }

    showError("");
    return true;
  }

  function openModal(bookId) {
    if (bookIdInput) {
      bookIdInput.value = bookId || "";
    }
    showError("");
    modal.classList.add("active");
    modal.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
  }

  function closeModal() {
    modal.classList.remove("active");
    modal.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
    showError("");
  }

  function initCountrySelect() {
    var countrySearch = window.TraderTokCountrySearch;
    if (countrySearch && typeof countrySearch.initCountryField === "function") {
      countrySearch.initCountryField("ebookLead");
    }
  }

  document.querySelectorAll(".ebook-download-btn").forEach(function (trigger) {
    trigger.addEventListener("click", function () {
      openModal(this.getAttribute("data-book") || "");
    });
  });

  if (closeBtn) {
    closeBtn.addEventListener("click", closeModal);
  }

  var overlay = modal.querySelector(".deposit-modal-overlay");
  if (overlay) {
    overlay.addEventListener("click", closeModal);
  }

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && modal.classList.contains("active")) {
      closeModal();
    }
  });

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    if (!validateForm()) return;

    var bookId = bookIdInput ? bookIdInput.value.trim() : "";
    var submitBtn = form.querySelector('button[type="submit"]');
    var originalText = submitBtn ? submitBtn.textContent : "Download Now";

    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = "Submitting...";
    }

    leads
      .postLead(buildPayload())
      .then(function (result) {
        if (!result.response.ok) {
          var message =
            (result.data && (result.data.message || result.data.error)) ||
            "Unable to submit your request right now. Please try again.";
          showError(message);
          return;
        }

        var redirectUrl = thankYouUrl(bookId);
        if (redirectUrl) {
          window.location.href = redirectUrl;
        }
      })
      .catch(function () {
        showError("A network error occurred. Please try again.");
      })
      .finally(function () {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = originalText;
        }
      });
  });

  initCountrySelect();
})();
