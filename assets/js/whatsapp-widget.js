// WhatsApp click handler + respond.io stacked above the WhatsApp bubble.
(function () {
  "use strict";

  var RESPOND_IO_Z_INDEX = "9998";
  var REAPPLY_DELAYS_MS = [0, 200, 400, 800, 1200, 2500, 4000];
  var MOBILE_MIN_GAP_PX = 26;

  function getStackGapPx() {
    var raw = getComputedStyle(document.documentElement)
      .getPropertyValue("--widget-stack-gap")
      .trim();
    var n = parseFloat(raw);
    var base = Number.isFinite(n) ? n : 20;
    if (isMobileViewport()) {
      return Math.max(base, MOBILE_MIN_GAP_PX);
    }
    return base;
  }

  function isMobileViewport() {
    return window.matchMedia("(max-width: 768px)").matches;
  }

  function getViewportHeight() {
    return window.visualViewport ? window.visualViewport.height : window.innerHeight;
  }

  function getWhatsAppAnchor() {
    return (
      document.querySelector(".whatsapp-button") ||
      document.querySelector(".whatsapp-widget")
    );
  }

  function getRespondIoContainer(host) {
    if (!host || !host.shadowRoot) {
      return null;
    }

    var root = host.shadowRoot;
    return (
      root.querySelector(".container.container--fixed") ||
      root.querySelector(".container") ||
      root.querySelector("[class*='container']")
    );
  }

  function getWhatsAppFixedRight() {
    var widget = document.querySelector(".whatsapp-widget");
    if (!widget) {
      return isMobileViewport() ? "12px" : "16px";
    }
    var right = getComputedStyle(widget).right;
    return right && right !== "auto" ? right : "16px";
  }

  function getRespondIoOffset() {
    var anchor = getWhatsAppAnchor();
    if (!anchor) {
      var fallbackBottom = isMobileViewport() ? "88px" : "76px";
      return { bottom: fallbackBottom, right: getWhatsAppFixedRight() };
    }

    var rect = anchor.getBoundingClientRect();
    var gap = getStackGapPx();
    var bottom = getViewportHeight() - rect.top + gap;
    var right = getWhatsAppFixedRight();

    return {
      bottom: Math.max(0, Math.round(bottom)) + "px",
      right: right,
    };
  }

  function applyOffsetToElement(el, offset) {
    if (!el) {
      return;
    }
    el.style.setProperty("bottom", offset.bottom, "important");
    el.style.setProperty("right", offset.right, "important");
    el.style.setProperty("left", "auto", "important");
    el.style.setProperty("top", "auto", "important");
    el.style.setProperty("z-index", RESPOND_IO_Z_INDEX, "important");
  }

  function positionRespondIoWidget() {
    var host = document.querySelector("respond-io-widget");
    var container = getRespondIoContainer(host);
    if (!container) {
      return false;
    }

    var offset = getRespondIoOffset();
    applyOffsetToElement(container, offset);
    if (host instanceof HTMLElement) {
      applyOffsetToElement(host, offset);
    }

    // If respond.io (incl. “Powered by” label) still overlaps WhatsApp, nudge up.
    var anchor = getWhatsAppAnchor();
    if (anchor) {
      var waTop = anchor.getBoundingClientRect().top;
      var riRect = container.getBoundingClientRect();
      var clearance = isMobileViewport() ? 4 : 8;
      if (riRect.bottom > waTop - clearance) {
        var bump = Math.ceil(riRect.bottom - waTop + clearance);
        var bumpedBottom = parseFloat(offset.bottom) + bump;
        var bumped = {
          bottom: bumpedBottom + "px",
          right: offset.right,
        };
        applyOffsetToElement(container, bumped);
        if (host instanceof HTMLElement) {
          applyOffsetToElement(host, bumped);
        }
      }
    }

    return true;
  }

  function scheduleReapply() {
    REAPPLY_DELAYS_MS.forEach(function (delay) {
      setTimeout(positionRespondIoWidget, delay);
    });
  }

  var resizeTimer;
  function onLayoutChange() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(positionRespondIoWidget, 80);
  }

  function watchWhatsAppWidget() {
    var anchor = getWhatsAppAnchor();
    if (!anchor || typeof ResizeObserver === "undefined") {
      return;
    }

    var ro = new ResizeObserver(onLayoutChange);
    ro.observe(anchor);
  }

  function watchRespondIoHost() {
    var host = document.querySelector("respond-io-widget");
    if (!host || typeof ResizeObserver === "undefined") {
      return;
    }

    var ro = new ResizeObserver(onLayoutChange);
    ro.observe(host);

    if (host.shadowRoot) {
      var innerObs = new MutationObserver(onLayoutChange);
      innerObs.observe(host.shadowRoot, { childList: true, subtree: true });
    }
  }

  function watchRespondIoWidget() {
    function onPositioned() {
      scheduleReapply();
      watchWhatsAppWidget();
      watchRespondIoHost();
      window.addEventListener("resize", onLayoutChange);
      window.addEventListener("orientationchange", onLayoutChange);
      if (window.visualViewport) {
        window.visualViewport.addEventListener("resize", onLayoutChange);
        window.visualViewport.addEventListener("scroll", onLayoutChange);
      }
      var mq = window.matchMedia("(max-width: 768px)");
      if (typeof mq.addEventListener === "function") {
        mq.addEventListener("change", onLayoutChange);
      }
    }

    if (positionRespondIoWidget()) {
      onPositioned();
      return;
    }

    var observer = new MutationObserver(function () {
      if (positionRespondIoWidget()) {
        observer.disconnect();
        onPositioned();
      }
    });

    observer.observe(document.documentElement, {
      childList: true,
      subtree: true,
    });

    setTimeout(function () {
      observer.disconnect();
    }, 25000);
  }

  function initWhatsAppClick() {
    var whatsappBtn = document.querySelector(".whatsapp-button");
    if (!whatsappBtn) {
      return;
    }

    var phoneNumber = "447988536833";

    whatsappBtn.addEventListener("click", function (e) {
      e.preventDefault();

      var greeting =
        window.i18n && typeof window.i18n.t === "function"
          ? window.i18n.t(
              "Hello! Welcome to TraderTok. We are here to help you. What can we do for you today?"
            )
          : "Hello! Welcome to TraderTok. We are here to help you. What can we do for you today?";

      var whatsappUrl =
        "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(greeting);
      window.open(whatsappUrl, "_blank");
    });
  }

  function boot() {
    initWhatsAppClick();
    watchRespondIoWidget();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
