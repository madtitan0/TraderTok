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
  }
})();
