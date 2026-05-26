// ================== WHATSAPP WIDGET ==================
(function () {
  function init() {
    var whatsappBtn = document.querySelector(".whatsapp-button");
    if (!whatsappBtn) {
      return;
    }

    var PHONE_NUMBER = "447988536833";

    whatsappBtn.addEventListener("click", function (e) {
      e.preventDefault();

      var greeting =
        window.i18n && typeof window.i18n.t === "function"
          ? window.i18n.t(
              "Hello! Welcome to TraderTok. We are here to help you. What can we do for you today?"
            )
          : "Hello! Welcome to TraderTok. We are here to help you. What can we do for you today?";

      var encodedMessage = encodeURIComponent(greeting);
      var whatsappUrl = "https://wa.me/" + PHONE_NUMBER + "?text=" + encodedMessage;

      window.open(whatsappUrl, "_blank");
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
