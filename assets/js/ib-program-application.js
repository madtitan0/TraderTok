(function () {
  var form = document.getElementById("ibPartnerApplicationForm");
  if (!form) return;

  var steps = Array.prototype.slice.call(
    form.querySelectorAll(".ib-program-step"),
  );
  if (!steps.length) return;

  var pills = Array.prototype.slice.call(form.querySelectorAll("[data-step-pill]"));
  var err = document.getElementById("ibPartnerFormError");
  var prevBtn = document.getElementById("ibPartnerPrevBtn");
  var nextBtn = document.getElementById("ibPartnerNextBtn");
  var submitBtn = document.getElementById("ibPartnerSubmitBtn");
  var referrerWrap = document.getElementById("ibPartnerReferrerWrap");
  var partnerRadios = form.querySelectorAll('input[name="is_partner"]');
  var currentStep = 1;

  var LEADS_URL = form.getAttribute("data-leads-url") || "";
  var THANK_YOU_URL = form.getAttribute("data-thank-you-url") || "";

  var BRAND_ID = "8f867771-8a91-4eac-acd9-3255502fceab";
  var BUSINESS_UNIT_ID = "1900fb9a-c717-4481-9ba4-70dfe01c648f";
  var TAG_ID = "fb251ea1-1956-428a-b5a3-015cfb017e37";
  var DEFAULT_ACCOUNTS = [
    {
      groupName: "118000\\Default.USD",
      leverage: 100,
      isDemoAccount: false,
    },
  ];

  var CUSTOM_FIELD_IDS = {
    isPartner: "a950faa1-c9d5-4ae6-b5a5-42ab5be71b1b",
    heardAbout: "7b031f98-76ab-4a81-a188-12ddfe87ddcb",
    promotionMethod: "bd52aade-6dab-49c8-a937-2c617938b8b0",
    referredBy: "f8b0c806-916f-4bd1-9a29-3a2c7173bb0b",
    experienceLevel: "a374f4f6-0007-4571-94c8-cc73121a6691",
  };

  var HEARD_ABOUT_LABELS = {
    search: "Search engine",
    social: "Social Media",
    friend: "Friend or colleague",
    event: "Webinar or event",
    other: "Other",
  };

  var PROMOTION_METHOD_LABELS = {
    social_media: "Social Media",
    paid_ads: "Paid Ads",
    community_network: "Community / Network",
    other: "Other",
  };

  var EXPERIENCE_LEVEL_LABELS = {
    beginner: "Beginner",
    intermediate: "Intermediate",
    advanced: "Advanced",
  };

  function showError(message) {
    if (!err) return;
    err.textContent = message || "";
    err.hidden = !message;
  }

  function readValue(name) {
    var field = form.querySelector('[name="' + name + '"]');
    if (!field || typeof field.value !== "string") return "";
    return field.value.trim();
  }

  function isValidEmail(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
  }

  function selectedPartnerValue() {
    var checked = form.querySelector('input[name="is_partner"]:checked');
    return checked ? checked.value : "";
  }

  function updateReferrerVisibility() {
    if (!referrerWrap) return;
    var shouldShow = selectedPartnerValue() === "yes";
    referrerWrap.hidden = !shouldShow;
    if (!shouldShow) {
      var referrer = form.querySelector('[name="referred_by"]');
      if (referrer) referrer.value = "";
    }
  }

  function validateStep(stepNumber, silent) {
    if (stepNumber === 1) {
      if (!readValue("first_name")) {
        if (!silent) showError("Please enter your first name.");
        return false;
      }
      if (!readValue("last_name")) {
        if (!silent) showError("Please enter your last name.");
        return false;
      }
      if (!isValidEmail(readValue("email"))) {
        if (!silent) showError("Please enter a valid email address.");
        return false;
      }
      if (!readValue("phone")) {
        if (!silent) showError("Please enter your phone number.");
        return false;
      }
      if (!readValue("country")) {
        if (!silent) showError("Please select your country.");
        return false;
      }
      if (!readValue("language")) {
        if (!silent) showError("Please select your preferred language.");
        return false;
      }
    }

    if (stepNumber === 2) {
      if (!readValue("experience_level")) {
        if (!silent) showError("Please select your experience level.");
        return false;
      }
      if (!readValue("heard_about")) {
        if (!silent) showError("Please tell us how you heard about us.");
        return false;
      }
    }

    if (stepNumber === 3) {
      if (!selectedPartnerValue()) {
        if (!silent) {
          showError("Please choose whether you are currently a partner/IB/agent.");
        }
        return false;
      }
      if (!readValue("promotion_method")) {
        if (!silent) showError("Please select your preferred method of promotion.");
        return false;
      }
    }

    if (!silent) showError("");
    return true;
  }

  function validateAllSteps(silent) {
    return (
      validateStep(1, silent) && validateStep(2, silent) && validateStep(3, silent)
    );
  }

  function updateSubmitState() {
    if (!submitBtn) return;
    submitBtn.disabled = !validateAllSteps(true);
  }

  function initIbSearchSelect(opts) {
    var wrap = opts.wrap;
    var hidden = opts.hidden;
    var input = opts.input;
    var listEl = opts.list;
    var items = opts.items;
    var onChange = opts.onChange || function () {};

    if (!wrap || !hidden || !input || !listEl || !items || !items.length) return;

    var optionEls = [];
    var highlightIdx = -1;

    function norm(s) {
      return String(s || "")
        .toLowerCase()
        .trim();
    }

    function buildOptions() {
      listEl.innerHTML = "";
      optionEls = [];
      items.forEach(function (item) {
        var li = document.createElement("li");
        li.setAttribute("role", "option");
        li.className = "ib-search-select-option";
        li.dataset.value = item.value;
        li.dataset.label = item.label;
        li.textContent = item.label;
        listEl.appendChild(li);
        optionEls.push(li);
      });
    }

    function filterOptions(query) {
      var q = norm(query);
      optionEls.forEach(function (li) {
        var label = norm(li.dataset.label);
        var value = norm(li.dataset.value);
        var match = !q || label.indexOf(q) !== -1 || value.indexOf(q) !== -1;
        li.hidden = !match;
      });
    }

    function visibleOptions() {
      return optionEls.filter(function (li) {
        return !li.hidden;
      });
    }

    function stripHighlightClasses() {
      optionEls.forEach(function (li) {
        li.classList.remove("is-highlighted");
      });
    }

    function clearHighlight() {
      highlightIdx = -1;
      stripHighlightClasses();
    }

    function applyHighlight(vis) {
      stripHighlightClasses();
      if (highlightIdx < 0 || highlightIdx >= vis.length) return;
      vis[highlightIdx].classList.add("is-highlighted");
      vis[highlightIdx].scrollIntoView({ block: "nearest" });
    }

    function openList() {
      listEl.hidden = false;
      input.setAttribute("aria-expanded", "true");
    }

    function closeList() {
      listEl.hidden = true;
      input.setAttribute("aria-expanded", "false");
      clearHighlight();
    }

    function syncInputFromHidden() {
      var v = hidden.value.trim();
      if (!v) {
        input.value = "";
        return;
      }
      var found = items.filter(function (i) {
        return i.value === v;
      })[0];
      input.value = found ? found.label : "";
    }

    buildOptions();

    input.addEventListener("focus", function () {
      filterOptions(input.value);
      openList();
    });

    input.addEventListener("input", function () {
      hidden.value = "";
      filterOptions(input.value);
      openList();
      clearHighlight();
      onChange();
    });

    listEl.addEventListener("mousedown", function (e) {
      e.preventDefault();
    });

    listEl.addEventListener("click", function (e) {
      var li = e.target.closest(".ib-search-select-option");
      if (!li || !listEl.contains(li) || li.hidden) return;
      hidden.value = li.dataset.value;
      input.value = li.dataset.label || "";
      closeList();
      hidden.dispatchEvent(new Event("change", { bubbles: true }));
      onChange();
    });

    document.addEventListener("click", function (e) {
      if (!wrap.contains(e.target)) closeList();
    });

    input.addEventListener("keydown", function (e) {
      var vis = visibleOptions();
      if (e.key === "Escape") {
        e.preventDefault();
        closeList();
        syncInputFromHidden();
        return;
      }
      if (e.key === "ArrowDown") {
        e.preventDefault();
        if (listEl.hidden) {
          filterOptions(input.value);
          openList();
          vis = visibleOptions();
        }
        if (!vis.length) return;
        highlightIdx = Math.min(highlightIdx + 1, vis.length - 1);
        if (highlightIdx < 0) highlightIdx = 0;
        applyHighlight(vis);
        return;
      }
      if (e.key === "ArrowUp") {
        e.preventDefault();
        if (listEl.hidden || !vis.length) return;
        highlightIdx = Math.max(highlightIdx - 1, 0);
        applyHighlight(vis);
        return;
      }
      if (e.key === "Enter") {
        if (listEl.hidden || highlightIdx < 0) return;
        vis = visibleOptions();
        var chosen = vis[highlightIdx];
        if (!chosen) return;
        e.preventDefault();
        hidden.value = chosen.dataset.value;
        input.value = chosen.dataset.label || "";
        closeList();
        hidden.dispatchEvent(new Event("change", { bubbles: true }));
        onChange();
      }
    });

    syncInputFromHidden();
  }

  function setupIbPartnerSearchSelects() {
    var countryWrap = document.getElementById("ibPartnerCountryWrap");
    var countryHidden = document.getElementById("ibPartnerCountry");
    var countryInput = document.getElementById("ibPartnerCountrySearch");
    var countryList = document.getElementById("ibPartnerCountryList");
    var rawCountries = window.TRADER_TOK_COUNTRY_OPTIONS;

    if (
      countryWrap &&
      countryHidden &&
      countryInput &&
      countryList &&
      Array.isArray(rawCountries) &&
      rawCountries.length
    ) {
      var countryItems = rawCountries.map(function (row) {
        return { value: row.code, label: row.name };
      });
      initIbSearchSelect({
        wrap: countryWrap,
        hidden: countryHidden,
        input: countryInput,
        list: countryList,
        items: countryItems,
        onChange: updateSubmitState,
      });
    }

    var langWrap = document.getElementById("ibPartnerLanguageWrap");
    var langHidden = document.getElementById("ibPartnerLanguage");
    var langInput = document.getElementById("ibPartnerLanguageSearch");
    var langList = document.getElementById("ibPartnerLanguageList");
    var langJson = document.getElementById("ibPartnerLanguagesJson");

    if (langWrap && langHidden && langInput && langList && langJson) {
      try {
        var langItems = JSON.parse(langJson.textContent.trim());
        if (Array.isArray(langItems) && langItems.length) {
          initIbSearchSelect({
            wrap: langWrap,
            hidden: langHidden,
            input: langInput,
            list: langList,
            items: langItems,
            onChange: updateSubmitState,
          });
        }
      } catch (ignore) {}
    }
  }

  function setStep(stepNumber) {
    currentStep = stepNumber;

    steps.forEach(function (stepEl, idx) {
      var isActive = idx === stepNumber - 1;
      stepEl.classList.toggle("is-active", isActive);
      stepEl.hidden = !isActive;
    });

    pills.forEach(function (pill, idx) {
      pill.classList.toggle("is-active", idx === stepNumber - 1);
    });

    if (prevBtn) prevBtn.hidden = stepNumber === 1;
    if (nextBtn) nextBtn.hidden = stepNumber === steps.length;
    if (submitBtn) submitBtn.hidden = stepNumber !== steps.length;

    updateReferrerVisibility();
    updateSubmitState();
  }

  function detectBrowser() {
    var userAgent = navigator.userAgent || "";
    if (/Edg/i.test(userAgent)) return "Edge";
    if (/Chrome/i.test(userAgent) && !/Edg/i.test(userAgent)) return "Chrome";
    if (/Safari/i.test(userAgent) && !/Chrome/i.test(userAgent)) return "Safari";
    if (/Firefox/i.test(userAgent)) return "Firefox";
    if (/OPR|Opera/i.test(userAgent)) return "Opera";
    if (/MSIE|Trident/i.test(userAgent)) return "Internet Explorer";
    return "Unknown";
  }

  function fallbackUserDeviceInfo() {
    return {
      appVersion: "1.0",
      uniqueId: "",
      device: navigator.platform || "Unknown",
      systemName: navigator.platform || "Unknown",
      useragent: navigator.userAgent || "",
      type: "website",
      brand: detectBrowser(),
      systemVersion: "1",
      language: (navigator.language || "en").split("-")[0],
    };
  }

  function getUserDeviceInfoSafe() {
    if (typeof window.getUserDeviceInfo === "function") {
      return window.getUserDeviceInfo();
    }
    return fallbackUserDeviceInfo();
  }

  function buildCustomFields() {
    var isPartnerYes = selectedPartnerValue() === "yes";
    var heardAboutValue = HEARD_ABOUT_LABELS[readValue("heard_about")] || "";
    var promotionMethodValue =
      PROMOTION_METHOD_LABELS[readValue("promotion_method")] || "";
    var experienceValue =
      EXPERIENCE_LEVEL_LABELS[readValue("experience_level")] || "";

    return [
      { id: CUSTOM_FIELD_IDS.isPartner, value: isPartnerYes },
      { id: CUSTOM_FIELD_IDS.heardAbout, value: heardAboutValue },
      { id: CUSTOM_FIELD_IDS.promotionMethod, value: promotionMethodValue },
      { id: CUSTOM_FIELD_IDS.referredBy, value: readValue("referred_by") },
      { id: CUSTOM_FIELD_IDS.experienceLevel, value: experienceValue },
    ];
  }

  function buildPayload() {
    return {
      firstName: readValue("first_name"),
      lastName: readValue("last_name"),
      email: readValue("email"),
      phone: readValue("phone"),
      country: readValue("country"),
      language: readValue("language"),
      brandId: BRAND_ID,
      businessUnitId: BUSINESS_UNIT_ID,
      tags: [{ id: TAG_ID }],
      accounts: DEFAULT_ACCOUNTS,
      userDevice: getUserDeviceInfoSafe(),
      customFields: buildCustomFields(),
    };
  }

  function leadsHeaders() {
    return {
      "Content-Type": "application/json",
      Accept: "application/json",
      Referer: window.location.origin + "/",
      "x-platform-name": "ClientZone",
    };
  }

  function parseJsonSafe(raw) {
    try {
      return raw ? JSON.parse(raw) : null;
    } catch (error) {
      return null;
    }
  }

  setupIbPartnerSearchSelects();

  Array.prototype.forEach.call(partnerRadios, function (radio) {
    radio.addEventListener("change", function () {
      updateReferrerVisibility();
      updateSubmitState();
    });
  });

  form.addEventListener("input", updateSubmitState);
  form.addEventListener("change", updateSubmitState);

  if (prevBtn) {
    prevBtn.addEventListener("click", function () {
      showError("");
      if (currentStep > 1) setStep(currentStep - 1);
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", function () {
      if (!validateStep(currentStep, false)) return;
      if (currentStep < steps.length) setStep(currentStep + 1);
    });
  }

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    if (!validateAllSteps(false)) return;
    if (!LEADS_URL) {
      showError("Lead endpoint is not configured.");
      return;
    }

    var originalSubmitText = submitBtn ? submitBtn.textContent : "";

    try {
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = "Submitting...";
      }
      if (nextBtn) nextBtn.disabled = true;
      if (prevBtn) prevBtn.disabled = true;

      var response = await fetch(LEADS_URL, {
        method: "POST",
        headers: leadsHeaders(),
        body: JSON.stringify(buildPayload()),
      });

      var raw = await response.text();
      var data = parseJsonSafe(raw);

      if (!response.ok) {
        var message =
          (data && (data.message || data.error)) ||
          "Unable to submit your application right now. Please try again.";
        showError(message);
        return;
      }

      showError("");
      if (THANK_YOU_URL) {
        window.location.href = THANK_YOU_URL;
      }
    } catch (error) {
      showError("A network error occurred. Please try again.");
    } finally {
      if (submitBtn) {
        submitBtn.textContent = originalSubmitText || "Submit Application";
        submitBtn.disabled = !validateAllSteps(true);
      }
      if (nextBtn) nextBtn.disabled = false;
      if (prevBtn) prevBtn.disabled = false;
    }
  });

  setStep(1);
})();
