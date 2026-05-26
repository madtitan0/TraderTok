// ================== WHATSAPP + RESPOND.IO WIDGET ==================
(function () {
  /** Gap between the bottom of respond.io and the top of the WhatsApp bubble. */
  var RESPOND_IO_GAP_PX = 14;

  function getRespondIoOffset() {
    var whatsapp = document.querySelector(".whatsapp-widget");
    if (!whatsapp) {
      return { bottom: "96px", right: "20px" };
    }

    var rect = whatsapp.getBoundingClientRect();
    var bottom = window.innerHeight - rect.top + RESPOND_IO_GAP_PX;
    var right = window.innerWidth - rect.right;

    return {
      bottom: Math.max(0, Math.round(bottom)) + "px",
      right: Math.max(0, Math.round(right)) + "px",
    };
  }

  function positionRespondIoWidget() {
    var host = document.querySelector("respond-io-widget");
    if (!host || !host.shadowRoot) {
      return false;
    }

    var container = host.shadowRoot.querySelector(".container.container--fixed");
    if (!container) {
      return false;
    }

    var offset = getRespondIoOffset();
    container.style.bottom = offset.bottom;
    container.style.right = offset.right;
    return true;
  }

  function applyRespondIoPosition() {
    if (!positionRespondIoWidget()) {
      return false;
    }
    // respond.io may re-apply defaults shortly after mount
    setTimeout(positionRespondIoWidget, 400);
    setTimeout(positionRespondIoWidget, 1200);
    return true;
  }

  var resizeTimer;
  function onLayoutChange() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(applyRespondIoPosition, 100);
  }

  function watchRespondIoWidget() {
    if (applyRespondIoPosition()) {
      window.addEventListener("resize", onLayoutChange);
      return;
    }

    var observer = new MutationObserver(function () {
      if (applyRespondIoPosition()) {
        observer.disconnect();
        window.addEventListener("resize", onLayoutChange);
      }
    });

    observer.observe(document.documentElement, {
      childList: true,
      subtree: true,
    });

    setTimeout(function () {
      observer.disconnect();
    }, 15000);
  }

  function init() {
    const whatsappBtn = document.querySelector(".whatsapp-button");
    if (!whatsappBtn) {
      return;
    }

    const PHONE_NUMBER = "447988536833"; 

    whatsappBtn.addEventListener("click", function (e) {
      e.preventDefault();

      // Use i18n system for greeting message
      const greeting = (window.i18n && typeof window.i18n.t === "function") 
        ? window.i18n.t("Hello! Welcome to TraderTok. We are here to help you. What can we do for you today?")
        : "Hello! Welcome to TraderTok. We are here to help you. What can we do for you today?";

      const encodedMessage = encodeURIComponent(greeting);
      const whatsappUrl = `https://wa.me/${PHONE_NUMBER}?text=${encodedMessage}`;

      window.open(whatsappUrl, "_blank");
    });
  }

  function boot() {
    init();
    watchRespondIoWidget();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
