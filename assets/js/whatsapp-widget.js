// ================== WHATSAPP WIDGET LOGIC ==================
(function () {
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

  // Initialize when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
