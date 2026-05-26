// ================== RESPOND.IO WIDGET POSITION ==================
// CSS variables in whatsapp-widget.css:
//   --tt-respondio-right   horizontal offset (independent)
//   --tt-respondio-bottom  minimum bottom offset (optional floor)
//   --tt-respondio-gap     space above the WhatsApp button (stacking)
(function () {
  var STYLE_ID = "tt-respond-io-stack-style";
  var RETRY_DELAYS_MS = [0, 50, 150, 300, 600, 1000, 1500, 2500, 4000, 6000, 10000];
  var POLL_MS = 400;
  var POLL_DURATION_MS = 20000;

  var isApplyingPosition = false;
  var styleObserver = null;
  var trackedContainer = null;
  var retryTimers = [];
  var pollTimer = null;
  var started = false;

  function parsePx(value, fallback) {
    var n = parseFloat(value);
    return Number.isFinite(n) ? n : fallback;
  }

  function readCssVar(name, fallback) {
    var value = getComputedStyle(document.documentElement)
      .getPropertyValue(name)
      .trim();
    return value || fallback;
  }

  function getRespondIoOffset() {
    var cssBottomPx = parsePx(readCssVar("--tt-respondio-bottom", "0"), 0);
    var gapPx = parsePx(readCssVar("--tt-respondio-gap", "14"), 14);
    var right = readCssVar("--tt-respondio-right", "20px");
    var bottomPx = cssBottomPx;

    var whatsappBtn = document.querySelector(".whatsapp-button");
    if (whatsappBtn) {
      var waRect = whatsappBtn.getBoundingClientRect();
      var stackBottomPx = window.innerHeight - waRect.top + gapPx;
      bottomPx = Math.max(bottomPx, stackBottomPx);
    }

    if (bottomPx <= 0) {
      bottomPx = 94;
    }

    return {
      bottom: Math.round(bottomPx) + "px",
      right: right,
    };
  }

  function ensureShadowStyles(shadowRoot) {
    if (!shadowRoot || shadowRoot.getElementById(STYLE_ID)) {
      return;
    }

    var style = document.createElement("style");
    style.id = STYLE_ID;
    style.textContent =
      ".container.container--fixed{" +
      "bottom:var(--tt-respond-bottom)!important;" +
      "right:var(--tt-respond-right)!important;" +
      "transform-origin:calc(100% + var(--tt-respond-right)) calc(100% + var(--tt-respond-bottom))!important;" +
      "}";
    shadowRoot.appendChild(style);
  }

  function attachStyleGuard(container) {
    if (!container || trackedContainer === container) {
      return;
    }

    if (styleObserver) {
      styleObserver.disconnect();
    }

    trackedContainer = container;
    var guardTimer;

    styleObserver = new MutationObserver(function () {
      if (isApplyingPosition) {
        return;
      }
      clearTimeout(guardTimer);
      guardTimer = setTimeout(applyPosition, 32);
    });

    styleObserver.observe(container, {
      attributes: true,
      attributeFilter: ["style"],
    });
  }

  function applyPosition() {
    var host = document.querySelector("respond-io-widget");
    if (!host || !host.shadowRoot) {
      return false;
    }

    var container = host.shadowRoot.querySelector(".container.container--fixed");
    if (!container) {
      return false;
    }

    ensureShadowStyles(host.shadowRoot);
    attachStyleGuard(container);

    var offset = getRespondIoOffset();
    isApplyingPosition = true;
    container.style.setProperty("--tt-respond-bottom", offset.bottom);
    container.style.setProperty("--tt-respond-right", offset.right);
    container.style.setProperty("bottom", offset.bottom, "important");
    container.style.setProperty("right", offset.right, "important");
    container.style.setProperty(
      "transform-origin",
      "calc(100% + " + offset.right + ") calc(100% + " + offset.bottom + ")",
      "important"
    );
    isApplyingPosition = false;
    return true;
  }

  function scheduleRetries() {
    retryTimers.forEach(clearTimeout);
    retryTimers = RETRY_DELAYS_MS.map(function (delay) {
      return setTimeout(applyPosition, delay);
    });
  }

  function startPolling() {
    if (pollTimer) {
      clearInterval(pollTimer);
    }

    var startedAt = Date.now();
    pollTimer = setInterval(function () {
      applyPosition();
      if (Date.now() - startedAt >= POLL_DURATION_MS) {
        clearInterval(pollTimer);
        pollTimer = null;
      }
    }, POLL_MS);
  }

  function onLayoutChange() {
    applyPosition();
    scheduleRetries();
  }

  function beginWatch() {
    if (started) {
      applyPosition();
      scheduleRetries();
      return;
    }
    started = true;

    applyPosition();
    scheduleRetries();
    startPolling();

    window.addEventListener("resize", onLayoutChange);
    window.addEventListener("orientationchange", onLayoutChange);

    var mountObserver = new MutationObserver(function () {
      if (applyPosition()) {
        scheduleRetries();
      }
    });

    mountObserver.observe(document.documentElement, {
      childList: true,
      subtree: true,
    });
  }

  function boot() {
    beginWatch();

    var respondScript = document.getElementById("respondio__growth_tool");
    if (respondScript && !respondScript.dataset.ttPositionBound) {
      respondScript.dataset.ttPositionBound = "1";
      respondScript.addEventListener("load", function () {
        beginWatch();
      });
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
