<<<<<<< HEAD
// ================== RESPOND.IO WIDGET POSITION ==================
// Position is controlled by CSS variables in whatsapp-widget.css:
//   --tt-respondio-bottom, --tt-respondio-right
(function () {
  var STYLE_ID = "tt-respond-io-stack-style";

  var isApplyingPosition = false;
  var styleObserver = null;
  var trackedContainer = null;

  function readCssVar(name, fallback) {
    var value = getComputedStyle(document.documentElement)
      .getPropertyValue(name)
      .trim();
    return value || fallback;
  }

  function getRespondIoOffset() {
    return {
      bottom: readCssVar("--tt-respondio-bottom", "94px"),
      right: readCssVar("--tt-respondio-right", "20px"),
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
    styleObserver = new MutationObserver(function () {
      if (!isApplyingPosition) {
        applyPosition();
      }
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

  var resizeTimer;
  function onLayoutChange() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(applyPosition, 100);
  }

  function watchWidget() {
    if (applyPosition()) {
      window.addEventListener("resize", onLayoutChange);
      return;
    }

    var mountObserver = new MutationObserver(function () {
      if (applyPosition()) {
        mountObserver.disconnect();
        window.addEventListener("resize", onLayoutChange);
      }
    });

    mountObserver.observe(document.documentElement, {
      childList: true,
      subtree: true,
    });

    setTimeout(function () {
      mountObserver.disconnect();
    }, 15000);
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", watchWidget);
  } else {
    watchWidget();
=======
// ================== RESPOND.IO WIDGET POSITIONING ==================
(function () {
  const OFFSET_CLASS = "respondio-widget-offset";
  const IFRAME_SELECTOR = 'iframe[src*="respond.io"]';

  function applyOffset(element) {
    if (!(element instanceof HTMLElement)) {
      return;
    }

    element.classList.add(OFFSET_CLASS);
  }

  function styleWidget(frame) {
    if (!(frame instanceof HTMLIFrameElement)) {
      return;
    }

    applyOffset(frame);

    let current = frame.parentElement;
    let depth = 0;

    while (current && current !== document.body && depth < 4) {
      const position = window.getComputedStyle(current).position;

      if (position === "fixed" || position === "absolute") {
        applyOffset(current);
      }

      current = current.parentElement;
      depth += 1;
    }
  }

  function scan() {
    document.querySelectorAll(IFRAME_SELECTOR).forEach(styleWidget);
  }

  function init() {
    scan();

    const observer = new MutationObserver(function (mutations) {
      mutations.forEach(function (mutation) {
        mutation.addedNodes.forEach(function (node) {
          if (!(node instanceof HTMLElement)) {
            return;
          }

          if (node.matches && node.matches(IFRAME_SELECTOR)) {
            styleWidget(node);
            return;
          }

          const frames = node.querySelectorAll ? node.querySelectorAll(IFRAME_SELECTOR) : [];
          frames.forEach(styleWidget);
        });
      });
    });

    observer.observe(document.body, {
      childList: true,
      subtree: true
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
>>>>>>> origin/main
  }
})();
