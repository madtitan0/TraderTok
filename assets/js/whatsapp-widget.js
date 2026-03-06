// ================== WHATSAPP WIDGET LOGIC ==================
(function () {
  function init() {
    const whatsappBtn = document.querySelector(".whatsapp-button");
    if (!whatsappBtn) {
      console.warn("WhatsApp button not found in DOM");
      return;
    }

    // Configuration
    const PHONE_NUMBER = "447520640890"; // Updated to match footer phone if provided, or default

    whatsappBtn.addEventListener("click", function (e) {
      e.preventDefault();

      // Use i18n system for greeting message
      const greeting = window.i18n && typeof window.i18n.t === "function" 
        ? window.i18n.t("whatsapp.greeting")
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

