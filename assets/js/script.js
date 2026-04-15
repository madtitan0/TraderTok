/**
 * Existing-user qualification: POST JSON to same-origin api/traders-club-qualification.php
 * (server forwards to DataConect; configure token in includes/config/traders-club.php).
 */
function tradersClubQualificationRequest(body) {
  const c =
    typeof window !== "undefined" ? window.TRADERS_CLUB_QUALIFICATION : null;
  if (!c || !c.configured || !c.postUrl) {
    return Promise.reject(
      new Error(
        "Qualification is not configured. Set qualification_token in includes/config/traders-club.php.",
      ),
    );
  }
  const headers = {
    "Content-Type": "application/json",
    Accept: "application/json",
  };
  return fetch(c.postUrl, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
    credentials: "same-origin",
  });
}

// ================== THEME TOGGLE ==================
const themeToggle = document.getElementById("themeToggle");
const body = document.body;

// Load saved theme from localStorage
function loadTheme() {
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "light") {
    body.classList.add("light-theme");
  }
}

// Get theme colors
function getThemeColors(transparent = false) {
  const isLight = body.classList.contains("light-theme");
  return {
    bg: isLight ? (transparent ? "rgba(0,0,0,0)" : "#ffffff") : "#000000",
    text: isLight ? "#000000" : "#ffffff",
    grid: isLight ? "rgba(0,0,0,0.06)" : "rgba(255,255,255,0.06)",
    labelBg: isLight ? "#000000" : "#ffffff",
    labelText: isLight ? "#ffffff" : "#000000",
  };
}

// Toggle theme
function toggleTheme() {
  body.classList.toggle("light-theme");

  // Save to localStorage
  const currentTheme = body.classList.contains("light-theme")
    ? "light"
    : "dark";
  localStorage.setItem("theme", currentTheme);

  // Redraw all canvas charts
  if (window.redrawAllCharts) {
    window.redrawAllCharts();
  }
}

// Initialize theme on page load
loadTheme();

// Add click event listener
if (themeToggle) {
  themeToggle.addEventListener("click", toggleTheme);
}

// ================== MOBILE MENU ==================
const mobileMenuBtn = document.querySelector(".mobile-menu-btn");
const nav = document.querySelector(".nav");
const header = document.querySelector(".header");
const mobileCloseBtn = document.querySelector(".mobile-close-btn");

const isMobile = () => window.innerWidth <= 768;

function openMobileMenu() {
  if (!nav) return;
  document.body.style.overflow = "hidden";
  nav.classList.add("active");
  mobileMenuBtn?.classList.add("active");
  setTimeout(() => {
    nav.scrollTop = 0;
    nav.scrollTo(0, 0);
  }, 10);
}

function closeMobileMenu() {
  if (!nav) return;
  document.body.style.overflow = "";
  nav.classList.remove("active");
  mobileMenuBtn?.classList.remove("active");

  setTimeout(() => {
    document.querySelectorAll(".nav-item.dropdown.active").forEach((item) => {
      item.classList.remove("active");
    });
  }, 150);
}

if (mobileMenuBtn) {
  mobileMenuBtn.addEventListener("click", () => {
    if (nav.classList.contains("active")) {
      closeMobileMenu();
    } else {
      openMobileMenu();
    }
  });
}

if (mobileCloseBtn) {
  mobileCloseBtn.addEventListener("click", () => {
    closeMobileMenu();
  });
}

document.addEventListener("click", (e) => {
  if (!isMobile()) return;
  const target = e.target;
  if (!(target instanceof Element)) return;

  const link = target.closest(".menu-card, .nav-link");
  if (!link) return;

  if (
    link.classList.contains("nav-link") &&
    link.closest(".nav-item.dropdown")
  ) {
    return;
  }

  if (link.classList.contains("menu-card")) {
    closeMobileMenu();
    return;
  }

  closeMobileMenu();
});

window.addEventListener("resize", () => {
  if (!isMobile()) {
    closeMobileMenu();
  }
});

// ================== MOBILE DROPDOWN ==================
function initMobileDropdown() {
  const dropdownItems = document.querySelectorAll(".nav-item.dropdown");

  dropdownItems.forEach((item) => {
    const link = item.querySelector(".nav-link");
    if (!link) return;

    if (link._dropdownClickHandler) {
      link.removeEventListener("click", link._dropdownClickHandler);
    }

    link._dropdownClickHandler = function (e) {
      if (!isMobile()) return;

      e.preventDefault();
      e.stopPropagation();

      const isCurrentlyActive = item.classList.contains("active");

      dropdownItems.forEach((other) => {
        if (other !== item) {
          other.classList.remove("active");
        }
      });

      if (isCurrentlyActive) {
        item.classList.remove("active");
      } else {
        item.classList.add("active");
      }
    };

    link.addEventListener("click", link._dropdownClickHandler);
  });
}

initMobileDropdown();

let resizeTimeout;
window.addEventListener("resize", () => {
  clearTimeout(resizeTimeout);
  resizeTimeout = setTimeout(() => {
    initMobileDropdown();
  }, 100);
});

// ================== SMOOTH SCROLL (НЕ ЛОМАЕМ href="#") ==================
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    const href = this.getAttribute("href");

    // служебные ссылки типа "#" или "#!" — не трогаем
    if (!href || href === "#" || href === "#!") return;

    const target = document.querySelector(href);
    if (!target) return;

    e.preventDefault();
    target.scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
  });
});

// ================== HEADER SCROLL EFFECT ==================
if (header) {
  window.addEventListener(
    "scroll",
    () => {
      const currentScroll = window.pageYOffset;
      header.classList.toggle("header-blur", currentScroll > 100);
    },
    { passive: true },
  );
}

// ================== ANIMATED CANDLESTICK CHART ==================
const canvas = document.getElementById("candles");
if (canvas) {
  const ctx = canvas.getContext("2d");

  const CANDLE_COUNT = 50;
  const candles = [];
  let lastClose = 100.0;

  function createCandle(prevClose) {
    const bodyRange = 0.6;
    const bodySize = (Math.random() - 0.5) * bodyRange;
    const close = prevClose + bodySize;

    const high = Math.max(prevClose, close) + Math.random() * 0.3;
    const low = Math.min(prevClose, close) - Math.random() * 0.3;

    return { open: prevClose, high, low, close };
  }

  for (let i = 0; i < CANDLE_COUNT; i++) {
    const c = createCandle(lastClose);
    candles.push(c);
    lastClose = c.close;
  }

  function getPriceRange() {
    let min = Infinity;
    let max = -Infinity;
    candles.forEach((c) => {
      if (c.low < min) min = c.low;
      if (c.high > max) max = c.high;
    });
    const pad = (max - min || 1) * 0.2;
    return { min: min - pad, max: max + pad };
  }

  function priceToY(price, height, min, max) {
    return height - ((price - min) / (max - min)) * height;
  }

  function roundRectPath(x, y, w, h, r) {
    const radius = Math.min(r, w / 2, h / 2);
    ctx.beginPath();
    ctx.moveTo(x + radius, y);
    ctx.lineTo(x + w - radius, y);
    ctx.quadraticCurveTo(x + w, y, x + w, y + radius);
    ctx.lineTo(x + w, y + h - radius);
    ctx.quadraticCurveTo(x + w, y + h, x + w - radius, y + h);
    ctx.lineTo(x + radius, y + h);
    ctx.quadraticCurveTo(x, y + h, x, y + h - radius);
    ctx.lineTo(x, y + radius);
    ctx.quadraticCurveTo(x, y, x + radius, y);
    ctx.closePath();
  }

  function drawBackground(w, h) {
    const colors = getThemeColors();
    ctx.fillStyle = colors.bg;
    ctx.fillRect(0, 0, w, h);

    ctx.strokeStyle = colors.grid;
    ctx.lineWidth = 1;

    const vLines = 6;
    for (let i = 1; i < vLines; i++) {
      const x = (w / vLines) * i;
      ctx.beginPath();
      ctx.moveTo(x, 0);
      ctx.lineTo(x, h);
      ctx.stroke();
    }

    const hLines = 5;
    for (let i = 1; i < hLines; i++) {
      const y = (h / hLines) * i;
      ctx.beginPath();
      ctx.moveTo(0, y);
      ctx.lineTo(w, y);
      ctx.stroke();
    }
  }

  function drawCandles() {
    const w = canvas.width / (window.devicePixelRatio || 1);
    const h = canvas.height / (window.devicePixelRatio || 1);

    const { min, max } = getPriceRange();
    drawBackground(w, h);

    const fullWidth = w - 16;
    const offsetX = 8;
    const candleWidth = fullWidth / CANDLE_COUNT;
    const gap = candleWidth * 0.18;
    const bodyWidth = candleWidth - gap;

    candles.forEach((candle, idx) => {
      const bull = candle.close >= candle.open;
      const color = bull ? "#22c55e" : "#d02c2d";

      const x = offsetX + idx * candleWidth;

      const yHigh = priceToY(candle.high, h, min, max);
      const yLow = priceToY(candle.low, h, min, max);
      const yOpen = priceToY(candle.open, h, min, max);
      const yClose = priceToY(candle.close, h, min, max);

      ctx.strokeStyle = color;
      ctx.lineWidth = 1;
      ctx.beginPath();
      ctx.moveTo(x + bodyWidth / 2, yHigh);
      ctx.lineTo(x + bodyWidth / 2, yLow);
      ctx.stroke();

      const top = Math.min(yOpen, yClose);
      const height = Math.max(2, Math.abs(yClose - yOpen));
      ctx.fillStyle = color;
      ctx.fillRect(x, top, bodyWidth, height);
    });

    const last = candles[candles.length - 1];
    const lastY = priceToY(last.close, h, min, max);
    const label = last.close.toFixed(3);

    ctx.save();
    ctx.font = "10px system-ui, -apple-system, sans-serif";
    const textWidth = ctx.measureText(label).width + 12;
    const labelHeight = 16;
    const wLogical = w;
    const x = wLogical - textWidth - 6;
    const y = Math.max(
      4,
      Math.min(h - labelHeight - 4, lastY - labelHeight / 2),
    );

    const colors = getThemeColors();
    ctx.fillStyle = colors.labelBg;
    roundRectPath(x, y, textWidth, labelHeight, 8);
    ctx.fill();

    ctx.fillStyle = colors.labelText;
    ctx.fillText(label, x + 6, y + 11);
    ctx.restore();
  }

  function draw() {
    drawCandles();
  }

  function resizeCanvas() {
    const dpr = window.devicePixelRatio || 1;
    const rect = canvas.getBoundingClientRect();
    canvas.width = rect.width * dpr;
    canvas.height = rect.height * dpr;
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    draw();
  }

  window.addEventListener("resize", resizeCanvas);
  resizeCanvas();

  function tick() {
    const last = candles[candles.length - 1];
    const next = createCandle(last.close);
    candles.push(next);
    candles.shift();
    draw();
  }

  setInterval(tick, 900);
}

// ================== STAT COUNTER ANIMATION ==================
function animateCounter(element, target, duration = 2000) {
  const start = performance.now();
  const statLabel = element
    .closest(".stat-card")
    .querySelector(".stat-label").textContent;

  function frame(now) {
    const progress = Math.min(1, (now - start) / duration);
    const value = Math.floor(target * progress);

    if (statLabel.includes("Secure")) {
      element.textContent = value + "%";
    } else if (
      element.classList.contains("stat-24") ||
      element.classList.contains("stat-7")
    ) {
      element.textContent = value;
    } else {
      element.textContent = value + "+";
    }

    if (progress < 1) {
      requestAnimationFrame(frame);
    }
  }

  requestAnimationFrame(frame);
}

// Intersection Observer for About section (counter + gradient animation + fade-in)
const aboutObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Add fade-in effect
        entry.target.classList.add("is-visible");

        // Start counter animation for regular stats
        const statNumbers = entry.target.querySelectorAll(
          ".stat-number[data-target]",
        );
        statNumbers.forEach((element) => {
          const target = parseInt(element.getAttribute("data-target"));
          animateCounter(element, target);
        });

        // Start counter animation for 24/7 - parallel
        const stat24 = entry.target.querySelector(".stat-24");
        const stat7 = entry.target.querySelector(".stat-7");
        if (stat24 && stat7) {
          const target24 = parseInt(stat24.getAttribute("data-target"));
          const target7 = parseInt(stat7.getAttribute("data-target"));
          animateCounter(stat24, target24, 2000);
          animateCounter(stat7, target7, 2000);
        }

        // Start gradient animation for subtitle
        const aboutSubtitle = document.querySelector(
          ".about-subtitle.gradient-text",
        );
        if (aboutSubtitle) {
          aboutSubtitle.classList.add("animate");
        }

        aboutObserver.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.3 },
);

const aboutSection = document.querySelector(".about-us");
if (aboutSection) {
  aboutObserver.observe(aboutSection);
}

// Parallax effect removed - kept simple for stability
// Stacking cards effect works with pure CSS using sticky positioning and negative margins

// ================== INSIGHTS SECTION ANIMATION ==================

const insightsSection = document.querySelector(".insights");
if (insightsSection) {
  const insightsObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          insightsSection.classList.add("is-visible");
          insightsObserver.unobserve(insightsSection);
        }
      });
    },
    { threshold: 0.2 },
  );

  insightsObserver.observe(insightsSection);
}

// ================== PLATFORMS SECTION INTERACTIVITY ==================

// Scroll reveal for platforms section
const platformsSection = document.querySelector(".platforms-section");
if (platformsSection) {
  const platformsObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          platformsSection.classList.add("is-visible");

          platformsObserver.unobserve(platformsSection);
        }
      });
    },
    { threshold: 0.2 },
  );

  platformsObserver.observe(platformsSection);
}

// Interactive platform options with device visualization
const deviceWrapper = document.querySelector(".device-wrapper");
const desktopOption = document.querySelector(".platform-option--desktop");
const mobileOption = document.querySelector(".platform-option--mobile");
const optionsRegion = document.querySelector(".platform-options");

if (deviceWrapper && desktopOption && mobileOption && optionsRegion) {
  function setActive(mode) {
    deviceWrapper.classList.remove("desktop-active", "mobile-active");
    desktopOption.classList.remove("platform-option--active");
    mobileOption.classList.remove("platform-option--active");

    desktopOption.setAttribute("aria-pressed", "false");
    mobileOption.setAttribute("aria-pressed", "false");

    if (mode === "desktop") {
      deviceWrapper.classList.add("desktop-active");
      desktopOption.classList.add("platform-option--active");
      desktopOption.setAttribute("aria-pressed", "true");
    } else if (mode === "mobile") {
      deviceWrapper.classList.add("mobile-active");
      mobileOption.classList.add("platform-option--active");
      mobileOption.setAttribute("aria-pressed", "true");
    }
  }

  // Start with no active state
  setActive(null);

  function activateDesktop() {
    setActive("desktop");
  }
  function activateMobile() {
    setActive("mobile");
  }

  // Hover events
  desktopOption.addEventListener("mouseenter", activateDesktop);
  mobileOption.addEventListener("mouseenter", activateMobile);

  // Click events (for mobile and explicit selection)
  desktopOption.addEventListener("click", activateDesktop);
  mobileOption.addEventListener("click", activateMobile);

  // When mouse leaves options region - deactivate both
  optionsRegion.addEventListener("mouseleave", function () {
    setActive(null);
  });

  // Keyboard support (Tab focus)
  desktopOption.addEventListener("focusin", activateDesktop);
  mobileOption.addEventListener("focusin", activateMobile);

  optionsRegion.addEventListener("focusout", function () {
    const current = document.activeElement;
    if (!optionsRegion.contains(current)) {
      setActive(null);
    }
  });

  // Parallax effect for device wrapper (desktop only)
  function handleParallax(e) {
    const rect = deviceWrapper.getBoundingClientRect();
    const x = (e.clientX - rect.left) / rect.width - 0.5;
    const y = (e.clientY - rect.top) / rect.height - 0.5;
    const maxMovement = 8;
    deviceWrapper.style.transform = `translate(${x * maxMovement}px, ${y * maxMovement}px)`;
  }

  function resetParallax() {
    deviceWrapper.style.transform = "translate(0, 0)";
  }

  function enableParallax() {
    deviceWrapper.addEventListener("mousemove", handleParallax);
    deviceWrapper.addEventListener("mouseleave", resetParallax);
  }

  function disableParallax() {
    deviceWrapper.removeEventListener("mousemove", handleParallax);
    deviceWrapper.removeEventListener("mouseleave", resetParallax);
    resetParallax();
  }

  function updateParallax() {
    if (window.innerWidth >= 900) {
      enableParallax();
    } else {
      disableParallax();
    }
  }

  updateParallax();
  window.addEventListener("resize", updateParallax);
}

// ================== TRADING CHART FOR DEVICE SCREENS ==================

const laptopCanvas = document.getElementById("laptopChart");
const phoneCanvas = document.getElementById("phoneChart");

if (laptopCanvas && phoneCanvas) {
  const laptopCtx = laptopCanvas.getContext("2d");
  const phoneCtx = phoneCanvas.getContext("2d");

  const CANDLE_COUNT_LAPTOP = 40;
  const CANDLE_COUNT_PHONE = 10; // Меньше свечей для лучшей читаемости на маленьком экране
  const laptopCandles = [];
  const phoneCandles = [];
  let laptopLastClose = 100.0;
  let phoneLastClose = 100.0;

  function createCandle(prevClose) {
    const bodyRange = 0.6;
    const bodySize = (Math.random() - 0.5) * bodyRange;
    const close = prevClose + bodySize;

    const high = Math.max(prevClose, close) + Math.random() * 0.3;
    const low = Math.min(prevClose, close) - Math.random() * 0.3;

    return { open: prevClose, high, low, close };
  }

  // Initialize laptop candles
  for (let i = 0; i < CANDLE_COUNT_LAPTOP; i++) {
    const c = createCandle(laptopLastClose);
    laptopCandles.push(c);
    laptopLastClose = c.close;
  }

  // Initialize phone candles
  for (let i = 0; i < CANDLE_COUNT_PHONE; i++) {
    const c = createCandle(phoneLastClose);
    phoneCandles.push(c);
    phoneLastClose = c.close;
  }

  function getPriceRange(candles) {
    let min = Infinity;
    let max = -Infinity;
    candles.forEach((c) => {
      if (c.low < min) min = c.low;
      if (c.high > max) max = c.high;
    });
    const pad = (max - min || 1) * 0.2;
    return { min: min - pad, max: max + pad };
  }

  function priceToY(price, height, min, max) {
    return height - ((price - min) / (max - min)) * height;
  }

  function roundRectPath(ctx, x, y, w, h, r) {
    const radius = Math.min(r, w / 2, h / 2);
    ctx.beginPath();
    ctx.moveTo(x + radius, y);
    ctx.lineTo(x + w - radius, y);
    ctx.quadraticCurveTo(x + w, y, x + w, y + radius);
    ctx.lineTo(x + w, y + h - radius);
    ctx.quadraticCurveTo(x + w, y + h, x + w - radius, y + h);
    ctx.lineTo(x + radius, y + h);
    ctx.quadraticCurveTo(x, y + h, x, y + h - radius);
    ctx.lineTo(x, y + radius);
    ctx.quadraticCurveTo(x, y, x + radius, y);
    ctx.closePath();
  }

  function drawBackground(ctx, w, h) {
    const colors = getThemeColors(true); // transparent for devices
    const isLight = body.classList.contains("light-theme");

    if (isLight) {
      // Clear canvas for transparency in light theme
      ctx.clearRect(0, 0, w, h);
    } else {
      // Fill with black in dark theme
      ctx.fillStyle = colors.bg;
      ctx.fillRect(0, 0, w, h);
    }

    ctx.strokeStyle = colors.grid;
    ctx.lineWidth = 1;

    const vLines = 6;
    for (let i = 1; i < vLines; i++) {
      const x = (w / vLines) * i;
      ctx.beginPath();
      ctx.moveTo(x, 0);
      ctx.lineTo(x, h);
      ctx.stroke();
    }

    const hLines = 5;
    for (let i = 1; i < hLines; i++) {
      const y = (h / hLines) * i;
      ctx.beginPath();
      ctx.moveTo(0, y);
      ctx.lineTo(w, y);
      ctx.stroke();
    }
  }

  function drawCandlestickChart(canvas, ctx, candles, candleCount) {
    if (!canvas) return;

    const rect = canvas.getBoundingClientRect();
    const dpr = window.devicePixelRatio || 1;

    canvas.width = rect.width * dpr;
    canvas.height = rect.height * dpr;
    ctx.scale(dpr, dpr);

    const w = rect.width;
    const h = rect.height;

    const { min, max } = getPriceRange(candles);
    drawBackground(ctx, w, h);

    const fullWidth = w - 16;
    const offsetX = 8;
    const candleWidth = fullWidth / candleCount;
    const gap = candleWidth * 0.18;
    const bodyWidth = candleWidth - gap;

    candles.forEach((candle, idx) => {
      const bull = candle.close >= candle.open;
      const color = bull ? "#22c55e" : "#d02c2d";

      const x = offsetX + idx * candleWidth;

      const yHigh = priceToY(candle.high, h, min, max);
      const yLow = priceToY(candle.low, h, min, max);
      const yOpen = priceToY(candle.open, h, min, max);
      const yClose = priceToY(candle.close, h, min, max);

      ctx.strokeStyle = color;
      ctx.lineWidth = 1;
      ctx.beginPath();
      ctx.moveTo(x + bodyWidth / 2, yHigh);
      ctx.lineTo(x + bodyWidth / 2, yLow);
      ctx.stroke();

      const top = Math.min(yOpen, yClose);
      const height = Math.max(2, Math.abs(yClose - yOpen));
      ctx.fillStyle = color;
      ctx.fillRect(x, top, bodyWidth, height);
    });

    const last = candles[candles.length - 1];
    const lastY = priceToY(last.close, h, min, max);
    const label = last.close.toFixed(3);

    ctx.save();
    ctx.font = "10px system-ui, -apple-system, sans-serif";
    const textWidth = ctx.measureText(label).width + 12;
    const labelHeight = 16;
    const labelX = w - textWidth - 6;
    const labelY = Math.max(
      4,
      Math.min(h - labelHeight - 4, lastY - labelHeight / 2),
    );

    const colors = getThemeColors();
    ctx.fillStyle = colors.labelBg;
    roundRectPath(ctx, labelX, labelY, textWidth, labelHeight, 8);
    ctx.fill();

    ctx.fillStyle = colors.labelText;
    ctx.fillText(label, labelX + 6, labelY + 11);
    ctx.restore();
  }

  function drawLaptopChart() {
    drawCandlestickChart(
      laptopCanvas,
      laptopCtx,
      laptopCandles,
      CANDLE_COUNT_LAPTOP,
    );
  }

  function drawPhoneChart() {
    drawCandlestickChart(
      phoneCanvas,
      phoneCtx,
      phoneCandles,
      CANDLE_COUNT_PHONE,
    );
  }

  function resizeLaptopCanvas() {
    drawLaptopChart();
  }

  function resizePhoneCanvas() {
    drawPhoneChart();
  }

  window.addEventListener("resize", () => {
    resizeLaptopCanvas();
    resizePhoneCanvas();
  });

  // Initial draw
  resizeLaptopCanvas();
  resizePhoneCanvas();

  // Animate laptop candles
  function tickLaptop() {
    const last = laptopCandles[laptopCandles.length - 1];
    const next = createCandle(last.close);
    laptopCandles.push(next);
    laptopCandles.shift();
    drawLaptopChart();
  }

  // Animate phone candles
  function tickPhone() {
    const last = phoneCandles[phoneCandles.length - 1];
    const next = createCandle(last.close);
    phoneCandles.push(next);
    phoneCandles.shift();
    drawPhoneChart();
  }

  setInterval(tickLaptop, 900);
  setInterval(tickPhone, 900);

  // Store redraw functions for theme change
  if (!window.chartRedrawFunctions) {
    window.chartRedrawFunctions = [];
  }
  window.chartRedrawFunctions.push(drawLaptopChart, drawPhoneChart);
}

// Create global function to redraw all charts on theme change
window.redrawAllCharts = function () {
  // Trigger resize event to redraw all canvases
  const event = new Event("resize");
  window.dispatchEvent(event);

  // Also call stored redraw functions if available
  if (window.chartRedrawFunctions) {
    window.chartRedrawFunctions.forEach((fn) => fn());
  }
};

// ================== WHY CHOOSE SECTION ANIMATION ==================

const whyChooseSection = document.querySelector(".why-choose");
if (whyChooseSection) {
  const whyChooseObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          whyChooseSection.classList.add("is-visible");

          // Start gradient animation for description
          const whyChooseDescription = document.querySelector(
            ".why-choose-description.gradient-text",
          );
          if (whyChooseDescription) {
            whyChooseDescription.classList.add("animate");
          }

          whyChooseObserver.unobserve(whyChooseSection);
        }
      });
    },
    { threshold: 0.2 },
  );

  whyChooseObserver.observe(whyChooseSection);
}

// ================== ACCORDION FUNCTIONALITY ==================

const accordionItems = document.querySelectorAll(".accordion-item");

accordionItems.forEach((item) => {
  const header = item.querySelector(".accordion-header");

  header.addEventListener("click", () => {
    const isActive = item.classList.contains("active");

    // Close all accordion items
    accordionItems.forEach((otherItem) => {
      otherItem.classList.remove("active");
    });

    // Toggle current item
    if (!isActive) {
      item.classList.add("active");
    }
  });
});

// ================== CONTACT FORM SECTION ANIMATION ==================

const contactFormSection = document.querySelector(".contact-form-section");
if (contactFormSection) {
  const contactFormObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Add fade-in effect
          contactFormSection.classList.add("is-visible");

          // Start gradient animation for subtitle
          const contactFormSubtitle = document.querySelector(
            ".contact-form-subtitle.gradient-text",
          );
          if (contactFormSubtitle) {
            contactFormSubtitle.classList.add("animate");
          }

          contactFormObserver.unobserve(contactFormSection);
        }
      });
    },
    { threshold: 0.2 },
  );

  contactFormObserver.observe(contactFormSection);
}

// ================== PAYMENT METHODS SECTION ANIMATION ==================

const paymentMethodsSection = document.querySelector(
  ".payment-methods-section",
);
if (paymentMethodsSection) {
  const paymentMethodsObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Start gradient animation for title
          const paymentMethodsTitle = document.querySelector(
            ".payment-methods-title.gradient-text",
          );
          if (paymentMethodsTitle) {
            paymentMethodsTitle.classList.add("animate");
          }

          paymentMethodsObserver.unobserve(paymentMethodsSection);
        }
      });
    },
    { threshold: 0.2 },
  );

  paymentMethodsObserver.observe(paymentMethodsSection);
}

// ================== FORM VALIDATION ==================

const contactForm = document.getElementById("contactForm");
if (contactForm) {
  const submitBtn = document.getElementById("submitBtn");
  const formStatus = document.getElementById("formStatus");

  // Validation functions
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  function validatePhone(phone) {
    const re = /^[+]?[0-9\s\-()]{10,}$/;
    return re.test(phone);
  }

  function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorSpan = document.getElementById(fieldId + "-error");

    if (field && errorSpan) {
      field.classList.add("error");
      errorSpan.textContent = message;
    }
  }

  function clearError(fieldId) {
    const field = document.getElementById(fieldId);
    const errorSpan = document.getElementById(fieldId + "-error");

    if (field && errorSpan) {
      field.classList.remove("error");
      errorSpan.textContent = "";
    }
  }

  function clearAllErrors() {
    ["name", "surname", "phone", "email", "message"].forEach(clearError);
  }

  function validateForm() {
    clearAllErrors();
    let isValid = true;

    // Validate Name
    const name = document.getElementById("name").value.trim();
    if (name === "") {
      showError("name", "Name is required");
      isValid = false;
    } else if (name.length < 2) {
      showError("name", "Name must be at least 2 characters");
      isValid = false;
    }

    // Validate Surname
    const surname = document.getElementById("surname").value.trim();
    if (surname === "") {
      showError("surname", "Surname is required");
      isValid = false;
    } else if (surname.length < 2) {
      showError("surname", "Surname must be at least 2 characters");
      isValid = false;
    }

    // Validate Phone
    const phone = document.getElementById("phone").value.trim();
    if (phone === "") {
      showError("phone", "Phone number is required");
      isValid = false;
    } else if (!validatePhone(phone)) {
      showError("phone", "Please enter a valid phone number");
      isValid = false;
    }

    // Validate Email
    const email = document.getElementById("email").value.trim();
    if (email === "") {
      showError("email", "Email is required");
      isValid = false;
    } else if (!validateEmail(email)) {
      showError("email", "Please enter a valid email address");
      isValid = false;
    }

    // Validate Message
    const message = document.getElementById("message").value.trim();
    if (message === "") {
      showError("message", "Message is required");
      isValid = false;
    } else if (message.length < 10) {
      showError("message", "Message must be at least 10 characters");
      isValid = false;
    }

    return isValid;
  }

  // Real-time validation on input
  ["name", "surname", "phone", "email", "message"].forEach((fieldId) => {
    const field = document.getElementById(fieldId);
    if (field) {
      field.addEventListener("blur", () => {
        const value = field.value.trim();

        if (value === "") {
          clearError(fieldId);
        } else {
          // Validate individual field
          if (fieldId === "email" && !validateEmail(value)) {
            showError(fieldId, "Please enter a valid email address");
          } else if (fieldId === "phone" && !validatePhone(value)) {
            showError(fieldId, "Please enter a valid phone number");
          } else if (
            (fieldId === "name" || fieldId === "surname") &&
            value.length < 2
          ) {
            showError(
              fieldId,
              `${fieldId.charAt(0).toUpperCase() + fieldId.slice(1)} must be at least 2 characters`,
            );
          } else if (fieldId === "message" && value.length < 10) {
            showError(fieldId, "Message must be at least 10 characters");
          } else {
            clearError(fieldId);
          }
        }
      });

      field.addEventListener("input", () => {
        if (field.classList.contains("error")) {
          clearError(fieldId);
        }
      });
    }
  });

  // Form submission
  contactForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    if (!validateForm()) {
      formStatus.className = "form-status error";
      formStatus.textContent = "Please fix the errors above";
      return;
    }

    // Disable submit button
    submitBtn.disabled = true;
    submitBtn.textContent = "Sending...";

    try {
      // Simulate API call (replace with actual endpoint)
      await new Promise((resolve) => setTimeout(resolve, 1500));

            // Show unified success message
      contactForm.innerHTML = `
                <div style="text-align: center; padding: 40px 20px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#00C853" stroke-width="2" style="width: 80px; height: 80px; margin-bottom: 20px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="16 8 10 14 8 12"></polyline>
                    </svg>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px; color: var(--text-primary);">Application Submitted!</h3>
                    <p style="color: var(--text-secondary);">Our manager will contact you shortly.</p>
                </div>
            `;
    } catch (error) {
      // Show error message
      formStatus.className = "form-status error";
      formStatus.textContent = "Something went wrong. Please try again.";
    } finally {
      // Re-enable submit button
      submitBtn.disabled = false;
      submitBtn.textContent = "Contact Us";
    }
  });
}

// ================== AUTH SIDEBAR ==================

const authSidebar = document.getElementById("authSidebar");
const authOverlay = document.getElementById("authOverlay");
const authCloseBtn = document.getElementById("authCloseBtn");
const signInBtn = document.getElementById("signInBtn");
const signUpBtn = document.getElementById("signUpBtn");
const authTabs = document.querySelectorAll(".auth-tab");
const authForms = document.querySelectorAll(".auth-form");

// Open sidebar
function openAuthSidebar(defaultTab = "signin") {
  authSidebar.classList.add("active");
  authOverlay.classList.add("active");
  document.body.style.overflow = "hidden";

  // Switch to the requested tab
  switchAuthTab(defaultTab);
}

// Close sidebar
function closeAuthSidebar() {
  authSidebar.classList.remove("active");
  authOverlay.classList.remove("active");
  document.body.style.overflow = "";
}

// Switch between tabs
function switchAuthTab(tabName) {
  // Update tabs
  authTabs.forEach((tab) => {
    if (tab.dataset.tab === tabName) {
      tab.classList.add("active");
    } else {
      tab.classList.remove("active");
    }
  });

  // Update forms
  authForms.forEach((form) => {
    if (form.dataset.form === tabName) {
      form.classList.add("active");
    } else {
      form.classList.remove("active");
    }
  });
}

// Event Listeners
if (signInBtn) {
  signInBtn.addEventListener("click", () => {
    openAuthSidebar("signin");
  });
}

if (signUpBtn) {
  signUpBtn.addEventListener("click", () => {
    openAuthSidebar("signup");
  });
}

document.querySelectorAll('a[href="#signin"]').forEach((link) => {
  link.addEventListener("click", (e) => {
    e.preventDefault();
    openAuthSidebar("signin");
  });
});

if (authCloseBtn) {
  authCloseBtn.addEventListener("click", closeAuthSidebar);
}

if (authOverlay) {
  authOverlay.addEventListener("click", closeAuthSidebar);
}

// Tab switching
authTabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    switchAuthTab(tab.dataset.tab);
  });
});

// Close on Escape key
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && authSidebar.classList.contains("active")) {
    closeAuthSidebar();
  }
});

// Form Submissions
const signinForm = document.getElementById("signinForm");
const signupForm = document.getElementById("signupForm");

if (signinForm) {
  signinForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const email = document.getElementById("signin-email").value;
    const password = document.getElementById("signin-password").value;

    // Redirect to the client portal with credentials
    const redirectUrl = `https://client.tradertok.com/#/auth/autologin?email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`;

    window.location.href = redirectUrl;
  });
}

// ================== LANGUAGE SELECTOR ==================

const languageBtn = document.getElementById("languageBtn");
const languageDropdown = document.getElementById("languageDropdown");
const languageItems = document.querySelectorAll(".language-item");
const mobileLanguageItems = document.querySelectorAll(".mobile-language-item");

let currentLanguage = "en";

// Language names mapping
const languageNames = {
  en: "EN",
  it: "IT",
  hi: "HI",
  "es-419": "ES",
  vn: "VN",
  th: "TH",
  my: "MY",
  ph: "PH",
  id: "ID",
  pk: "PK",
};

function isRegionalLanguageLocked() {
  return !!(window.subdomainData && window.subdomainData.lang);
}

// Function to update language
function updateLanguage(lang, flagHTML) {
  if (isRegionalLanguageLocked() && lang !== window.subdomainData.lang) {
    return;
  }

  currentLanguage = lang;

  // Update desktop button if exists
  if (languageBtn) {
    languageBtn.querySelector(".language-flag").innerHTML = flagHTML;
    languageBtn.querySelector(".language-code").textContent =
      languageNames[lang] || String(lang).toUpperCase().slice(0, 2);
  }

  // Update all language items active state
  languageItems.forEach((i) => {
    if (i.dataset.lang === lang) {
      i.classList.add("active");
    } else {
      i.classList.remove("active");
    }
  });

  // Update mobile language items active state
  mobileLanguageItems.forEach((i) => {
    if (i.dataset.lang === lang) {
      i.classList.add("active");
    } else {
      i.classList.remove("active");
    }
  });

  if (!isRegionalLanguageLocked()) {
    localStorage.setItem("preferredLanguage", lang);
  }

  if (
    !isRegionalLanguageLocked() &&
    typeof window.i18n !== "undefined" &&
    window.i18n.setLanguage
  ) {
    window.i18n.setLanguage(lang, { fromUser: true });
  }
}

// Toggle language dropdown (desktop)
if (languageBtn) {
  languageBtn.addEventListener("click", (e) => {
    if (isRegionalLanguageLocked()) {
      return;
    }
    e.stopPropagation();
    languageDropdown.classList.toggle("active");
    languageBtn.classList.toggle("active");
  });
}

// Select language (desktop)
languageItems.forEach((item) => {
  item.addEventListener("click", () => {
    if (isRegionalLanguageLocked()) return;
    const lang = item.dataset.lang;
    const flagHTML = item.querySelector(".language-flag").innerHTML;

    updateLanguage(lang, flagHTML);

    // Close dropdown
    if (languageDropdown) {
      languageDropdown.classList.remove("active");
    }
    if (languageBtn) {
      languageBtn.classList.remove("active");
    }
  });
});

// Select language (mobile menu)
mobileLanguageItems.forEach((item) => {
  // If subdomain is active, don't allow changing language
  if (window.subdomainData && window.subdomainData.lang) {
    item.style.opacity = '0.5';
    item.style.cursor = 'default';
    item.style.pointerEvents = 'none';
  }

  item.addEventListener("click", () => {
    if (isRegionalLanguageLocked()) {
      return;
    }
    const lang = item.dataset.lang;
    const flagHTML = item.querySelector(".language-flag").innerHTML;

    updateLanguage(lang, flagHTML);

    // Close mobile menu logic removed to keep menu open for navigation
  });
});

// Close dropdown when clicking outside
document.addEventListener("click", (e) => {
  if (
    languageDropdown &&
    !languageDropdown.contains(e.target) &&
    e.target !== languageBtn &&
    !languageBtn.contains(e.target)
  ) {
    languageDropdown.classList.remove("active");
    if (languageBtn) {
      languageBtn.classList.remove("active");
    }
  }
});

// ================== EDUCATION COURSE FAQ (accordion, #course-faq) ==================
window.addEventListener("DOMContentLoaded", () => {
  const list = document.querySelector(
    ".education-course-page #course-faq .faq-list",
  );
  if (!list) return;

  list.querySelectorAll(".faq-q").forEach((btn) => {
    btn.addEventListener("click", () => {
      const item = btn.closest(".faq-item");
      if (!item) return;
      const wasActive = item.classList.contains("active");

      list.querySelectorAll(".faq-item").forEach((el) => {
        el.classList.remove("active");
      });

      if (!wasActive) {
        item.classList.add("active");
      }
    });
  });
});

// Load saved language preference on page load
window.addEventListener("DOMContentLoaded", () => {
  const savedLanguage =
    (window.subdomainData && window.subdomainData.lang) ||
    localStorage.getItem("preferredLanguage") ||
    "en";

  // Find the item in desktop or mobile
  let savedItem = document.querySelector(
    `.language-item[data-lang="${savedLanguage}"]`,
  );
  if (!savedItem) {
    savedItem = document.querySelector(
      `.mobile-language-item[data-lang="${savedLanguage}"]`,
    );
  }

  if (savedItem) {
    const flagHTML = savedItem.querySelector(".language-flag").innerHTML;
    updateLanguage(savedLanguage, flagHTML);
  } else {
    // Default to English
    const englishItem =
      document.querySelector('.language-item[data-lang="en"]') ||
      document.querySelector('.mobile-language-item[data-lang="en"]');
    if (englishItem) {
      const flagHTML = englishItem.querySelector(".language-flag").innerHTML;
      updateLanguage("en", flagHTML);
    }
  }

  if (isRegionalLanguageLocked()) {
    document.body.classList.add("region-language-locked");
    if (languageBtn) {
      languageBtn.setAttribute("disabled", "disabled");
      languageBtn.setAttribute("aria-disabled", "true");
    }
    languageItems.forEach((i) => {
      i.style.pointerEvents = "none";
      i.style.cursor = "default";
      i.style.opacity = i.classList.contains("active") ? "1" : "0.45";
    });
    mobileLanguageItems.forEach((i) => {
      i.style.pointerEvents = "none";
      i.style.cursor = "default";
      i.style.opacity = i.classList.contains("active") ? "1" : "0.45";
    });
  }
});

// ================== PHONE COUNTRY SELECTOR ==================

const countrySelect = document.getElementById("countrySelect");
const countryDropdown = document.getElementById("countryDropdown");
const countrySearch = document.getElementById("countrySearch");
const countryList = document.getElementById("countryList");
const countryItems = document.querySelectorAll(".country-item");

let selectedCountryCode = "+44";
let selectedCountryFlag = "🇬🇧";
let selectedCountryIso = "GB";

const countryIsoMap = {
  Afghanistan: "AF",
  Albania: "AL",
  Algeria: "DZ",
  "American Samoa": "AS",
  Andorra: "AD",
  Angola: "AO",
  Anguilla: "AI",
  "Antigua and Barbuda": "AG",
  Argentina: "AR",
  Armenia: "AM",
  Aruba: "AW",
  Australia: "AU",
  Austria: "AT",
  Azerbaijan: "AZ",
  Bahamas: "BS",
  Bahrain: "BH",
  Bangladesh: "BD",
  Barbados: "BB",
  Belarus: "BY",
  Belgium: "BE",
  Belize: "BZ",
  Benin: "BJ",
  Bermuda: "BM",
  Bhutan: "BT",
  Bolivia: "BO",
  "Bosnia and Herzegovina": "BA",
  Botswana: "BW",
  "Bouvet Island": "BV",
  Brazil: "BR",
  "British Indian Ocean Territory": "IO",
  "British Virgin Islands": "VG",
  Brunei: "BN",
  Bulgaria: "BG",
  "Burkina Faso": "BF",
  Burundi: "BI",
  Cambodia: "KH",
  Cameroon: "CM",
  Canada: "CA",
  "Cape Verde": "CV",
  "Caribbean Netherlands": "BQ",
  "Cayman Islands": "KY",
  "Central African Republic": "CF",
  Chad: "TD",
  Chile: "CL",
  China: "CN",
  "Christmas Island": "CX",
  "Cocos (Keeling) Islands": "CC",
  Colombia: "CO",
  Comoros: "KM",
  "Cook Islands": "CK",
  "Costa Rica": "CR",
  Croatia: "HR",
  Cuba: "CU",
  "Curaçao": "CW",
  Cyprus: "CY",
  "Czech Republic": "CZ",
  Denmark: "DK",
  Djibouti: "DJ",
  Dominica: "DM",
  "Dominican Republic": "DO",
  "DR Congo": "CD",
  Ecuador: "EC",
  Egypt: "EG",
  "El Salvador": "SV",
  "Equatorial Guinea": "GQ",
  Eritrea: "ER",
  Estonia: "EE",
  Eswatini: "SZ",
  Ethiopia: "ET",
  "Falkland Islands": "FK",
  "Faroe Islands": "FO",
  Fiji: "FJ",
  Finland: "FI",
  France: "FR",
  "French Guiana": "GF",
  "French Polynesia": "PF",
  "French Southern and Antarctic Lands": "TF",
  Gabon: "GA",
  Gambia: "GM",
  Georgia: "GE",
  Germany: "DE",
  Ghana: "GH",
  Gibraltar: "GI",
  Greece: "GR",
  Greenland: "GL",
  Grenada: "GD",
  Guadeloupe: "GP",
  Guam: "GU",
  Guatemala: "GT",
  Guernsey: "GG",
  Guinea: "GN",
  "Guinea-Bissau": "GW",
  Guyana: "GY",
  Haiti: "HT",
  Honduras: "HN",
  "Hong Kong": "HK",
  Hungary: "HU",
  Iceland: "IS",
  India: "IN",
  Indonesia: "ID",
  Iran: "IR",
  Iraq: "IQ",
  Ireland: "IE",
  "Isle of Man": "IM",
  Israel: "IL",
  Italy: "IT",
  "Ivory Coast": "CI",
  Jamaica: "JM",
  Japan: "JP",
  Jersey: "JE",
  Jordan: "JO",
  Kazakhstan: "KZ",
  Kenya: "KE",
  Kiribati: "KI",
  Kosovo: "XK",
  Kuwait: "KW",
  Kyrgyzstan: "KG",
  Laos: "LA",
  Latvia: "LV",
  Lebanon: "LB",
  Lesotho: "LS",
  Liberia: "LR",
  Libya: "LY",
  Liechtenstein: "LI",
  Lithuania: "LT",
  Luxembourg: "LU",
  Macau: "MO",
  Madagascar: "MG",
  Malawi: "MW",
  Malaysia: "MY",
  Maldives: "MV",
  Mali: "ML",
  Malta: "MT",
  "Marshall Islands": "MH",
  Martinique: "MQ",
  Mauritania: "MR",
  Mauritius: "MU",
  Mayotte: "YT",
  Mexico: "MX",
  Micronesia: "FM",
  Moldova: "MD",
  Monaco: "MC",
  Mongolia: "MN",
  Montenegro: "ME",
  Montserrat: "MS",
  Morocco: "MA",
  Mozambique: "MZ",
  Myanmar: "MM",
  Namibia: "NA",
  Nauru: "NR",
  Nepal: "NP",
  Netherlands: "NL",
  "New Caledonia": "NC",
  "New Zealand": "NZ",
  Nicaragua: "NI",
  Niger: "NE",
  Nigeria: "NG",
  Niue: "NU",
  "Norfolk Island": "NF",
  "North Korea": "KP",
  "North Macedonia": "MK",
  "Northern Mariana Islands": "MP",
  Norway: "NO",
  Oman: "OM",
  Pakistan: "PK",
  Palau: "PW",
  Palestine: "PS",
  Panama: "PA",
  "Papua New Guinea": "PG",
  Paraguay: "PY",
  Peru: "PE",
  Philippines: "PH",
  "Pitcairn Islands": "PN",
  Poland: "PL",
  Portugal: "PT",
  "Puerto Rico": "PR",
  Qatar: "QA",
  "Republic of the Congo": "CG",
  Romania: "RO",
  Russia: "RU",
  Rwanda: "RW",
  "Réunion": "RE",
  "Saint Barthélemy": "BL",
  "Saint Helena, Ascension and Tristan da Cunha": "SH",
  "Saint Kitts and Nevis": "KN",
  "Saint Lucia": "LC",
  "Saint Martin": "MF",
  "Saint Pierre and Miquelon": "PM",
  "Saint Vincent and the Grenadines": "VC",
  Samoa: "WS",
  "San Marino": "SM",
  "Saudi Arabia": "SA",
  Senegal: "SN",
  Serbia: "RS",
  Seychelles: "SC",
  "Sierra Leone": "SL",
  Singapore: "SG",
  "Sint Maarten": "SX",
  Slovakia: "SK",
  Slovenia: "SI",
  "Solomon Islands": "SB",
  Somalia: "SO",
  "South Africa": "ZA",
  "South Georgia": "GS",
  "South Korea": "KR",
  "South Sudan": "SS",
  Spain: "ES",
  "Sri Lanka": "LK",
  Sudan: "SD",
  Suriname: "SR",
  "Svalbard and Jan Mayen": "SJ",
  Sweden: "SE",
  Switzerland: "CH",
  Syria: "SY",
  "São Tomé and Príncipe": "ST",
  Taiwan: "TW",
  Tajikistan: "TJ",
  Tanzania: "TZ",
  Thailand: "TH",
  "Timor-Leste": "TL",
  Togo: "TG",
  Tokelau: "TK",
  Tonga: "TO",
  "Trinidad and Tobago": "TT",
  Tunisia: "TN",
  Turkey: "TR",
  Turkmenistan: "TM",
  "Turks and Caicos Islands": "TC",
  Tuvalu: "TV",
  Uganda: "UG",
  Ukraine: "UA",
  "United Arab Emirates": "AE",
  "United Kingdom": "GB",
  "United States": "US",
  "United States Minor Outlying Islands": "UM",
  "United States Virgin Islands": "VI",
  Uruguay: "UY",
  Uzbekistan: "UZ",
  Vanuatu: "VU",
  "Vatican City": "VA",
  Venezuela: "VE",
  Vietnam: "VN",
  "Wallis and Futuna": "WF",
  "Western Sahara": "EH",
  Yemen: "YE",
  Zambia: "ZM",
  Zimbabwe: "ZW",
  "Åland Islands": "AX",
};

// Toggle dropdown
if (countrySelect) {
  countrySelect.addEventListener("click", (e) => {
    e.stopPropagation();
    countryDropdown.classList.toggle("active");
    countrySelect.classList.toggle("active");

    // Focus search when opening
    if (countryDropdown.classList.contains("active")) {
      setTimeout(() => {
        countrySearch.focus();
      }, 100);
    }
  });
}

// Select country
countryItems.forEach((item) => {
  item.addEventListener("click", () => {
    const code = item.dataset.code;
    const flag = item.dataset.flag;
    const country = item.dataset.country;

    selectedCountryCode = code;
    selectedCountryFlag = flag;
    selectedCountryIso = countryIsoMap[country] || "CY";

    // Update button
    countrySelect.querySelector(".country-flag").textContent = flag;
    countrySelect.querySelector(".country-code").textContent = code;

    // Close dropdown
    countryDropdown.classList.remove("active");
    countrySelect.classList.remove("active");

    // Clear search
    countrySearch.value = "";
    countryItems.forEach((item) => item.classList.remove("hidden"));
  });
});

// Search countries
if (countrySearch) {
  countrySearch.addEventListener("input", (e) => {
    const searchTerm = e.target.value.toLowerCase();

    countryItems.forEach((item) => {
      const countryName = item.dataset.country.toLowerCase();
      const countryCode = item.dataset.code.toLowerCase();

      if (
        countryName.includes(searchTerm) ||
        countryCode.includes(searchTerm)
      ) {
        item.classList.remove("hidden");
      } else {
        item.classList.add("hidden");
      }
    });
  });
}

// Close dropdown when clicking outside
document.addEventListener("click", (e) => {
  if (
    countryDropdown &&
    !countryDropdown.contains(e.target) &&
    e.target !== countrySelect
  ) {
    countryDropdown.classList.remove("active");
    if (countrySelect) {
      countrySelect.classList.remove("active");
    }
  }
});

// ================== DEVICE DETECTION UTILITIES ==================

/**
 * Generate or retrieve a unique device ID
 * This ID is stored in localStorage to persist across sessions
 */
function getUniqueDeviceId() {
  const storageKey = "device_unique_id";
  let uniqueId = localStorage.getItem(storageKey);

  if (!uniqueId) {
    // Generate a new unique ID using timestamp and random string
    uniqueId =
      "device_" +
      Date.now() +
      "_" +
      Math.random().toString(36).substring(2, 15);
    localStorage.setItem(storageKey, uniqueId);
  }

  return uniqueId;
}

/**
 * Detect the operating system from user agent
 */
function detectOS() {
  const userAgent = navigator.userAgent || navigator.vendor || window.opera;

  if (/windows phone/i.test(userAgent)) return "Windows Phone";
  if (/android/i.test(userAgent)) return "Android";
  if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) return "iOS";
  if (/Win/i.test(userAgent)) return "Windows";
  if (/Mac/i.test(userAgent)) return "MacOS";
  if (/Linux/i.test(userAgent)) return "Linux";
  if (/X11/i.test(userAgent)) return "UNIX";

  return "Unknown";
}

/**
 * Detect the system name (device type)
 */
function detectSystemName() {
  const userAgent = navigator.userAgent || navigator.vendor || window.opera;

  // Check for mobile devices
  if (/iPad/.test(userAgent)) return "Tablet";
  if (/iPhone|iPod/.test(userAgent)) return "Mobile";
  if (/android/i.test(userAgent)) {
    // Check if it's a tablet or mobile
    return /mobile/i.test(userAgent) ? "Mobile" : "Tablet";
  }
  if (/windows phone/i.test(userAgent)) return "Mobile";

  // Default to Desktop for non-mobile devices
  return "Desktop";
}

/**
 * Detect the browser brand
 */
function detectBrowser() {
  const userAgent = navigator.userAgent;

  // Check for Edge (must be before Chrome check)
  if (/Edg/i.test(userAgent)) return "Edge";

  // Check for Chrome
  if (/Chrome/i.test(userAgent) && !/Edg/i.test(userAgent)) return "Chrome";

  // Check for Safari (must be after Chrome check)
  if (/Safari/i.test(userAgent) && !/Chrome/i.test(userAgent)) return "Safari";

  // Check for Firefox
  if (/Firefox/i.test(userAgent)) return "Firefox";

  // Check for Opera
  if (/OPR|Opera/i.test(userAgent)) return "Opera";

  // Check for Internet Explorer
  if (/MSIE|Trident/i.test(userAgent)) return "Internet Explorer";

  return "Unknown";
}

/**
 * Get the browser language (base language code only)
 * Examples: "en-US" → "en", "es-419" → "es", "fr-CA" → "fr"
 */
function getBrowserLanguage() {
  const fullLanguage = navigator.language || navigator.userLanguage || "en";
  // Extract base language code (everything before the hyphen)
  return fullLanguage.split("-")[0];
}

function getUserDeviceInfo() {
  return {
    appVersion: "1.0",
    uniqueId: getUniqueDeviceId(),
    device: detectOS(),
    systemName: detectSystemName(),
    useragent: navigator.userAgent,
    type: "website",
    brand: detectBrowser(),
    systemVersion: "1",
    language: getBrowserLanguage(),
  };
}

// Signup form submission with phone
if (signupForm) {
  signupForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const firstname = document.getElementById("signup-firstname").value;
    const lastname = document.getElementById("signup-lastname").value;
    const email = document.getElementById("signup-email").value;
    const phone = document.getElementById("signup-phone").value;
    const password = document.getElementById("signup-password").value;
    const fullPhone = selectedCountryCode + phone;

    const payload = {
      firstName: firstname,
      lastName: lastname,
      email: email,
      phone: fullPhone,
      password: password,
      country: selectedCountryIso || "CY",
      language: currentLanguage || "en",
      brandId: "8f867771-8a91-4eac-acd9-3255502fceab",
      businessUnitId: "34f7b5d6-fc0f-44fc-9323-8b0fcd3b26ed",
      tags: [
        {
          id: "fb251ea1-1956-428a-b5a3-015cfb017e37",
        },
      ],
      // clientzoneDisabled: true,
      accounts: [
        {
          groupName: "118000\\Default.USD",
          leverage: 100,
          isDemoAccount: false,
        },
      ],
      userDevice: getUserDeviceInfo(),
    };

    try {
      const submitBtn = signupForm.querySelector('button[type="submit"]');
      const originalBtnText = submitBtn.textContent;
      submitBtn.textContent = "Registering...";
      submitBtn.disabled = true;

      const response = await fetch(
        "https://6dfed096-backend-clientzone.dataconect.com/api/v1/clientzone/leads",
        {
          method: "POST",
          headers: {
            "sec-ch-ua-platform": '"Windows"',
            "x-platform-name": "ClientZone",
            Referer: "https://client.tradertok.com/",
            "sec-ch-ua":
              '"Chromium";v="142", "Google Chrome";v="142", "Not_A Brand";v="99"',
            "sec-ch-ua-mobile": "?0",
            "Access-Control-Allow-Origin": "*",
            "User-Agent":
              "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36",
            Accept: "application/json",
            "Content-Type": "application/json",
          },
          body: JSON.stringify(payload),
        },
      );

      if (response.ok) {
        await response.json();

        // Show success message instead of redirecting
        // alert('Registration successful! Please check your email.');
        // Optional: Close sidebar or reset form
        // closeAuthSidebar();

        // Show success message
        signupForm.innerHTML = `
                    <div style="text-align: center; padding: 40px 20px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#00C853" stroke-width="2" style="width: 80px; height: 80px; margin-bottom: 20px;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="16 8 10 14 8 12"></polyline>
                        </svg>
                        <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px; color: var(--text-primary);">Registration Successful!</h3>
                    </div>
                `;
        signupForm.reset();
      } else {
        const errorData = await response.json();
        console.error("Signup Error:", errorData);

        // Show error message
        signupForm.innerHTML = `
                    <div style="text-align: center; padding: 40px 20px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#FF5252" stroke-width="2" style="width: 80px; height: 80px; margin-bottom: 20px;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px; color: var(--text-primary);">Registration Failed</h3>
                        <p style="color: var(--text-secondary); margin-bottom: 20px;">${errorData.message || "An unknown error occurred."}</p>
                        <button onclick="location.reload()" class="auth-submit-btn" style="max-width: 200px; margin: 0 auto;">Try Again</button>
                    </div>
                `;
      }
    } catch (error) {
      console.error("Network Error:", error);

      // Show network error message
      signupForm.innerHTML = `
                <div style="text-align: center; padding: 40px 20px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#FF5252" stroke-width="2" style="width: 80px; height: 80px; margin-bottom: 20px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px; color: var(--text-primary);">Connection Error</h3>
                    <p style="color: var(--text-secondary); margin-bottom: 20px;">Please check your internet connection and try again.</p>
                    <button onclick="location.reload()" class="auth-submit-btn" style="max-width: 200px; margin: 0 auto;">Try Again</button>
                </div>
            `;
    } finally {
      const submitBtn = signupForm.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.textContent = "Create Account";
        submitBtn.disabled = false;
      }
    }
  });
}

// ====== POPUPS (EARNINGS & TRADER PROMO) ======
(function () {
  const earningsPopup = document.getElementById("earnings-popup");
  const earningsCloseBtn = document.getElementById("earnings-popup-close");
  const earningsOverlay = earningsPopup?.querySelector(".earnings-popup-overlay");

  const traderPopup = document.getElementById("trader-popup");
  const traderCloseBtn = document.getElementById("trader-popup-close");
  const traderOverlay = traderPopup?.querySelector(".trader-popup-overlay");
  const traderClaimBtn = traderPopup?.querySelector(".btn-trader-claim");

  if (!earningsPopup && !traderPopup) return;

  function openPopups() {
    if (earningsPopup) earningsPopup.classList.add("active");
    if (traderPopup) traderPopup.classList.add("active");
    document.body.style.overflow = "hidden";
  }

  function closeTraderPopup() {
    if (traderPopup) traderPopup.classList.remove("active");
    // Only restore scroll if earnings is also closed
    if (!earningsPopup || !earningsPopup.classList.contains("active")) {
      document.body.style.overflow = "";
    }
  }

  function closeEarningsPopup() {
    if (earningsPopup) earningsPopup.classList.remove("active");
    // Also close trader if it's still open (safety)
    if (traderPopup) traderPopup.classList.remove("active");
    document.body.style.overflow = "";
  }

  // Trader Popup Close
  if (traderCloseBtn) {
    traderCloseBtn.addEventListener("click", closeTraderPopup);
  }
  if (traderOverlay) {
    traderOverlay.addEventListener("click", closeTraderPopup);
  }
  if (traderClaimBtn) {
    traderClaimBtn.addEventListener("click", () => {
      closeTraderPopup();
      // Optionally also close earnings? User didn't specify, 
      // but usually clicking a CTA closes the popup.
      // For now let's just close trader as requested.
    });
  }

  // Earnings Popup Close
  if (earningsCloseBtn) {
    earningsCloseBtn.addEventListener("click", closeEarningsPopup);
  }
  if (earningsOverlay) {
    earningsOverlay.addEventListener("click", closeEarningsPopup);
  }

  // ESC key to close (closes top-most or both)
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      if (traderPopup?.classList.contains("active")) {
        closeTraderPopup();
      } else if (earningsPopup?.classList.contains("active")) {
        closeEarningsPopup();
      }
    }
  });

  // Close popup when CTA button in earnings is clicked
  const earningsCtaBtn = earningsPopup?.querySelector(".btn-earnings-register");
  if (earningsCtaBtn) {
    earningsCtaBtn.addEventListener("click", () => {
      closeEarningsPopup();
    });
  }

  // Show both popups after 3 seconds
  setTimeout(() => {
    openPopups();
  }, 3000);

  // Expose functions globally for manual triggering if needed
  window.openPopups = openPopups;
  window.closeTraderPopup = closeTraderPopup;
  window.closeEarningsPopup = closeEarningsPopup;

  // ====== COUNTDOWN TIMER - End of February 2026 ======
  const EARNINGS_END_DATE = "2026-02-28T23:59:59";

  const daysEl = document.getElementById("earnings-days");
  const hoursEl = document.getElementById("earnings-hours");
  const minutesEl = document.getElementById("earnings-minutes");
  const secondsEl = document.getElementById("earnings-seconds");

  if (daysEl && hoursEl && minutesEl && secondsEl) {
    const endDate = new Date(EARNINGS_END_DATE).getTime();

    function updateEarningsCountdown() {
      const now = new Date().getTime();
      const distance = endDate - now;

      if (distance < 0) {
        daysEl.textContent = "00";
        hoursEl.textContent = "00";
        minutesEl.textContent = "00";
        secondsEl.textContent = "00";
        return;
      }

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor(
        (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60),
      );
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      daysEl.textContent = String(days).padStart(2, "0");
      hoursEl.textContent = String(hours).padStart(2, "0");
      minutesEl.textContent = String(minutes).padStart(2, "0");
      secondsEl.textContent = String(seconds).padStart(2, "0");
    }

    // Initial update
    updateEarningsCountdown();

    // Update every second
    setInterval(updateEarningsCountdown, 1000);
  }
})();

// ================== DEPOSIT COUNTER ANIMATION ==================
(function () {
  const counter = document.getElementById("depositCounter");
  if (!counter) return;

  const targetValue = 7.6;
  const duration = 2000;
  let hasAnimated = false;

  function animateCounter() {
    if (hasAnimated) return;
    hasAnimated = true;

    const startTime = Date.now();

    function update() {
      const elapsed = Date.now() - startTime;
      const progress = Math.min(elapsed / duration, 1);

      // Easing function
      const easeOutQuart = 1 - Math.pow(1 - progress, 4);

      const currentValue = (targetValue * easeOutQuart).toFixed(1);
      counter.textContent = currentValue;

      if (progress < 1) {
        requestAnimationFrame(update);
      }
    }

    requestAnimationFrame(update);
  }

  // Use Intersection Observer to trigger animation when visible
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter();
          observer.disconnect();
        }
      });
    },
    { threshold: 0.5 },
  );

  observer.observe(counter);
})();

// ================== DEPOSIT MODAL (same flow as Traders Club; group = DepositAccount) ==================
(function () {
  const DEPOSIT_LEADS_URL =
    "https://6dfed096-backend-clientzone.dataconect.com/api/v1/clientzone/leads";
  const DEPOSIT_WALLET_URL = "https://client.tradertok.com/#/wallet";
  const DEPOSIT_GROUP = "DepositAccount";

  const modal = document.getElementById("depositModal");
  const openBtn = document.getElementById("openDepositModal");
  const overlay = modal?.querySelector(".deposit-modal-overlay");

  let depositContentBackup = null;

  function getDepositModalContentEl() {
    return (
      document.getElementById("depositModalContent") ||
      document.querySelector("#depositModal .deposit-modal-content")
    );
  }

  function captureBackupIfNeeded() {
    const content = getDepositModalContentEl();
    if (content && !depositContentBackup) {
      depositContentBackup = content.cloneNode(true);
    }
  }

  function restoreModalFromBackup() {
    const content = getDepositModalContentEl();
    if (content && depositContentBackup) {
      content.replaceWith(depositContentBackup.cloneNode(true));
      bindDepositModal();
    }
  }

  function openModal() {
    if (!modal) return;
    captureBackupIfNeeded();
    modal.classList.add("active");
    document.body.style.overflow = "hidden";
  }

  function closeModal() {
    if (!modal) return;
    modal.classList.remove("active");
    document.body.style.overflow = "";
    restoreModalFromBackup();
  }

  function setFormError(msg) {
    const el = document.getElementById("depositFormError");
    if (!el) return;
    if (msg) {
      el.textContent = msg;
      el.hidden = false;
    } else {
      el.textContent = "";
      el.hidden = true;
    }
  }

  function parseJsonSafe(txt) {
    try {
      return JSON.parse(txt);
    } catch {
      return null;
    }
  }

  function normalizeAction(data) {
    const raw = data?.action ?? data?.data?.action;
    if (typeof raw !== "string") return "";
    return raw.trim().toUpperCase();
  }

  function getDepositLeadsHeaders() {
    return {
      "Content-Type": "application/json",
      Accept: "application/json",
      Referer: "https://client.tradertok.com/",
      "x-platform-name": "ClientZone",
    };
  }

  function showDepositFeedbackPending() {
    const body = document.getElementById("depositModalBody");
    if (!body) return;
    body.innerHTML = `
      <div class="modal-header">
        <h3 class="modal-title" data-i18n="deposit.requestPendingTitle">Request pending</h3>
        <p class="modal-subtitle" data-i18n="deposit.requestPendingBody">Your deposit account request is pending.</p>
      </div>
      <div style="text-align: center; padding: 24px 8px 8px;">
        <button type="button" class="btn-submit-deposit" id="depositPendingClose">OK</button>
      </div>
    `;
    document.getElementById("depositPendingClose")?.addEventListener("click", closeModal);
    if (typeof window.updatePageLanguage === "function") {
      window.updatePageLanguage();
    }
  }

  function showDepositFeedbackRegistrationSuccess() {
    const body = document.getElementById("depositModalBody");
    if (!body) return;
    body.innerHTML = `
      <div style="text-align: center; padding: 32px 16px 24px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="#00C853" stroke-width="2" style="width: 72px; height: 72px; margin-bottom: 16px;">
          <circle cx="12" cy="12" r="10"></circle>
          <polyline points="16 8 10 14 8 12"></polyline>
        </svg>
        <h3 class="modal-title" data-i18n="deposit.registrationSuccessTitle" style="margin-bottom: 10px;">You're registered</h3>
        <p data-i18n="deposit.registrationSuccessBody" style="color: var(--text-secondary); line-height: 1.65; margin-bottom: 20px;">Thank you.</p>
        <button type="button" class="btn-submit-deposit" id="depositRegSuccessClose">Close</button>
      </div>
    `;
    document.getElementById("depositRegSuccessClose")?.addEventListener("click", closeModal);
    if (typeof window.updatePageLanguage === "function") {
      window.updatePageLanguage();
    }
  }

  async function submitExistingAccount(email) {
    setFormError("");
    let res;
    try {
      res = await tradersClubQualificationRequest({
        existing: true,
        group: DEPOSIT_GROUP,
        email: email.trim(),
      });
    } catch (err) {
      setFormError(
        err?.message ||
          "Qualification request could not be sent. Check configuration.",
      );
      return;
    }

    const raw = await res.text();
    const data = raw ? parseJsonSafe(raw) : null;

    if (!res.ok) {
      const msg =
        data?.message ||
        data?.error ||
        (typeof data?.errors === "string" ? data.errors : null) ||
        `Request failed (${res.status})`;
      setFormError(msg);
      return;
    }

    const action = normalizeAction(data);
    if (action === "REDIRECT") {
      window.location.href = DEPOSIT_WALLET_URL;
      return;
    }
    if (action === "PENDING") {
      showDepositFeedbackPending();
      return;
    }
    setFormError(
      "Unexpected response from the server. Please try again later.",
    );
  }

  async function submitNewAccount(fields) {
    setFormError("");
    const fullPhone =
      (typeof selectedCountryCode !== "undefined" ? selectedCountryCode : "+44") +
      String(fields.phone).replace(/\s+/g, "");

    const payload = {
      firstName: fields.firstname,
      lastName: fields.lastname,
      email: fields.email.trim(),
      phone: fullPhone,
      password: fields.password,
      country:
        typeof selectedCountryIso !== "undefined" ? selectedCountryIso : "CY",
      language: typeof currentLanguage !== "undefined" ? currentLanguage : "en",
      brandId: "8f867771-8a91-4eac-acd9-3255502fceab",
      businessUnitId: "34f7b5d6-fc0f-44fc-9323-8b0fcd3b26ed",
      adGroup: DEPOSIT_GROUP,
      tags: [
        {
          id: "fb251ea1-1956-428a-b5a3-015cfb017e37",
        },
      ],
      accounts: [
        {
          groupName: "118000\\Default.USD",
          leverage: 100,
          isDemoAccount: false,
        },
      ],
      userDevice:
        typeof getUserDeviceInfo === "function" ? getUserDeviceInfo() : {},
    };

    const res = await fetch(DEPOSIT_LEADS_URL, {
      method: "POST",
      headers: getDepositLeadsHeaders(),
      body: JSON.stringify(payload),
    });

    const raw = await res.text();
    const data = raw ? parseJsonSafe(raw) : null;

    if (!res.ok) {
      const msg =
        data?.message || data?.error || `Registration failed (${res.status})`;
      setFormError(msg);
      return;
    }

    showDepositFeedbackRegistrationSuccess();
  }

  function updateModeUI(mode) {
    const panelEx = document.getElementById("depositPanelExisting");
    const panelNew = document.getElementById("depositPanelNew");
    const submitBtn = document.getElementById("depositSubmit");
    if (panelEx) panelEx.hidden = mode !== "existing";
    if (panelNew) panelNew.hidden = mode !== "new";
    if (submitBtn) {
      if (mode === "existing") {
        submitBtn.textContent = "Continue";
        submitBtn.setAttribute("data-i18n", "deposit.continueEligible");
      } else {
        submitBtn.textContent = "Submit Application";
        submitBtn.setAttribute("data-i18n", "deposit.submitApplication");
      }
      if (typeof window.updatePageLanguage === "function") {
        window.updatePageLanguage();
      }
    }
  }

  function bindDepositModal() {
    const closeBtn = document.getElementById("closeDepositModal");
    const form = document.getElementById("depositForm");
    const submitBtn = document.getElementById("depositSubmit");
    const modeRadios = form?.querySelectorAll('input[name="depositMode"]');

    closeBtn?.addEventListener("click", closeModal);

    if (modal && !modal.dataset.depositOverlayBound) {
      modal.dataset.depositOverlayBound = "1";
      overlay?.addEventListener("click", closeModal);
    }

    modeRadios?.forEach((r) => {
      r.addEventListener("change", () => {
        const m = form.querySelector('input[name="depositMode"]:checked')?.value;
        if (m === "existing" || m === "new") updateModeUI(m);
        setFormError("");
      });
    });

    const initial =
      form?.querySelector('input[name="depositMode"]:checked')?.value;
    updateModeUI(initial === "new" ? "new" : "existing");

    form?.addEventListener("submit", async (e) => {
      e.preventDefault();
      setFormError("");
      const mode = form.querySelector('input[name="depositMode"]:checked')?.value;

      if (mode === "existing") {
        const email = document.getElementById("depositEmailExisting")?.value?.trim();
        if (!email) {
          setFormError("Please enter your email.");
          return;
        }
        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.textContent = "Please wait…";
        }
        try {
          await submitExistingAccount(email);
        } catch (err) {
          console.error(err);
          setFormError(
            err?.message ||
              "Network error. Check your connection and try again.",
          );
        } finally {
          if (submitBtn) {
            submitBtn.disabled = false;
          }
          const m = form.querySelector('input[name="depositMode"]:checked')?.value;
          updateModeUI(m === "new" ? "new" : "existing");
        }
        return;
      }

      const firstname = document.getElementById("depositFirstname")?.value?.trim();
      const lastname = document.getElementById("depositLastname")?.value?.trim();
      const email = document.getElementById("depositEmailNew")?.value?.trim();
      const phone = document.getElementById("depositPhone")?.value?.trim();
      const password = document.getElementById("depositPassword")?.value;

      if (!firstname || !lastname || !email || !phone || !password) {
        setFormError("Please fill in all fields.");
        return;
      }
      if (password.length < 8) {
        setFormError("Password must be at least 8 characters.");
        return;
      }

      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = "Registering…";
      }
      try {
        await submitNewAccount({
          firstname,
          lastname,
          email,
          phone,
          password,
        });
      } catch (err) {
        console.error(err);
        setFormError(
          err?.message ||
            "Network error. Check your connection and try again.",
        );
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
        }
        updateModeUI("new");
      }
    });
  }

  openBtn?.addEventListener("click", openModal);

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal?.classList.contains("active")) {
      closeModal();
    }
  });

  bindDepositModal();
})();

// ================== TRUSTPILOT REVIEWS SLIDER ==================
(function () {
  const track = document.getElementById("trustpilotTrack");
  const prevBtn = document.getElementById("trustpilotPrev");
  const nextBtn = document.getElementById("trustpilotNext");
  const dotsContainer = document.getElementById("trustpilotDots");

  if (!track || !prevBtn || !nextBtn || !dotsContainer) return;

  const cards = track.querySelectorAll(".trustpilot-card");
  const totalCards = cards.length;
  let currentIndex = 0;
  let autoPlayInterval;

  // Initialize
  function init() {
    updateCards();
    createDots();
    startAutoPlay();
  }

  function createDots() {
    dotsContainer.innerHTML = "";
    for (let i = 0; i < totalCards; i++) {
      const dot = document.createElement("button");
      dot.classList.add("trustpilot-dot");
      if (i === 0) dot.classList.add("active");
      dot.addEventListener("click", () => {
        goToSlide(i);
        startAutoPlay();
      });
      dotsContainer.appendChild(dot);
    }
  }

  function updateDots() {
    const dots = dotsContainer.querySelectorAll(".trustpilot-dot");
    dots.forEach((dot, index) => {
      dot.classList.toggle("active", index === currentIndex);
    });
  }

  function updateCards() {
    // Calculate prev and next indices with wrapping
    const prevIndex = (currentIndex - 1 + totalCards) % totalCards;
    const nextIndex = (currentIndex + 1) % totalCards;

    // Update all cards
    cards.forEach((card, index) => {
      card.classList.remove("active", "prev", "next");

      if (index === currentIndex) {
        card.classList.add("active");
      } else if (index === prevIndex) {
        card.classList.add("prev");
      } else if (index === nextIndex) {
        card.classList.add("next");
      }
    });

    updateDots();
  }

  function goToSlide(index) {
    // Update index with wrapping
    currentIndex = index;
    if (currentIndex < 0) currentIndex = totalCards - 1;
    if (currentIndex >= totalCards) currentIndex = 0;

    updateCards();
  }

  function nextSlide() {
    goToSlide(currentIndex + 1);
  }

  function prevSlide() {
    goToSlide(currentIndex - 1);
  }

  function startAutoPlay() {
    stopAutoPlay();
    autoPlayInterval = setInterval(nextSlide, 5000);
  }

  function stopAutoPlay() {
    if (autoPlayInterval) {
      clearInterval(autoPlayInterval);
    }
  }

  // Event listeners
  prevBtn.addEventListener("click", () => {
    prevSlide();
    startAutoPlay();
  });

  nextBtn.addEventListener("click", () => {
    nextSlide();
    startAutoPlay();
  });

  // Pause on hover
  track.addEventListener("mouseenter", stopAutoPlay);
  track.addEventListener("mouseleave", startAutoPlay);

  // Initialize
  init();
})();

// ================== CLIENT TESTIMONIALS SLIDER (home) ==================
(function () {
  const track = document.getElementById("clientTestimonialsTrack");
  const prevBtn = document.getElementById("clientTestimonialsPrev");
  const nextBtn = document.getElementById("clientTestimonialsNext");
  const dotsContainer = document.getElementById("clientTestimonialsDots");

  if (!track || !prevBtn || !nextBtn || !dotsContainer) return;

  const cards = track.querySelectorAll(".client-testimonials-card");
  const totalCards = cards.length;
  if (totalCards === 0) return;

  let currentIndex = 0;
  let autoPlayInterval;

  function updateCards() {
    const prevIndex = (currentIndex - 1 + totalCards) % totalCards;
    const nextIndex = (currentIndex + 1) % totalCards;

    cards.forEach((card, index) => {
      card.classList.remove("active", "prev", "next");

      if (index === currentIndex) {
        card.classList.add("active");
      } else if (index === prevIndex) {
        card.classList.add("prev");
      } else if (index === nextIndex) {
        card.classList.add("next");
      }
    });

    const dots = dotsContainer.querySelectorAll(".client-testimonials-dot");
    dots.forEach((dot, index) => {
      dot.classList.toggle("active", index === currentIndex);
    });
  }

  function createDots() {
    dotsContainer.innerHTML = "";
    for (let i = 0; i < totalCards; i++) {
      const dot = document.createElement("button");
      dot.type = "button";
      dot.classList.add("client-testimonials-dot");
      if (i === 0) dot.classList.add("active");
      dot.setAttribute("aria-label", "Go to testimonial " + (i + 1));
      dot.addEventListener("click", () => {
        currentIndex = i;
        updateCards();
        startAutoPlay();
      });
      dotsContainer.appendChild(dot);
    }
  }

  function goToSlide(index) {
    currentIndex = index;
    if (currentIndex < 0) currentIndex = totalCards - 1;
    if (currentIndex >= totalCards) currentIndex = 0;
    updateCards();
  }

  function nextSlide() {
    goToSlide(currentIndex + 1);
  }

  function prevSlide() {
    goToSlide(currentIndex - 1);
  }

  function startAutoPlay() {
    stopAutoPlay();
    autoPlayInterval = setInterval(nextSlide, 6000);
  }

  function stopAutoPlay() {
    if (autoPlayInterval) {
      clearInterval(autoPlayInterval);
      autoPlayInterval = null;
    }
  }

  function handleNavClick(e, slideFn) {
    e.preventDefault();
    e.stopPropagation();
    slideFn();
    startAutoPlay();
  }

  prevBtn.addEventListener(
    "click",
    (e) => handleNavClick(e, prevSlide),
    true,
  );
  nextBtn.addEventListener(
    "click",
    (e) => handleNavClick(e, nextSlide),
    true,
  );

  const sliderRoot = track.closest(".client-testimonials-slider");
  const hoverTarget = sliderRoot || track;
  hoverTarget.addEventListener("mouseenter", stopAutoPlay);
  hoverTarget.addEventListener("mouseleave", startAutoPlay);

  createDots();
  updateCards();
  startAutoPlay();
})();

// ================== TRADERS CLUB MODAL ==================
(function () {
  const TRADERS_CLUB_LEADS_URL =
    "https://6dfed096-backend-clientzone.dataconect.com/api/v1/clientzone/leads";
  const TRADERS_CLUB_WALLET_URL = "https://client.tradertok.com/#/wallet";
  const TRADERS_CLUB_GROUP = "TradersClub";

  const modal = document.getElementById("tradersClubModal");
  const openBtn = document.getElementById("openTradersClubModal");
  const overlay = modal?.querySelector(".traders-club-modal-overlay");

  let tradersClubContentBackup = null;

  function getModalContentEl() {
    return (
      document.getElementById("tradersClubModalContent") ||
      document.querySelector("#tradersClubModal .traders-club-modal-content")
    );
  }

  function captureBackupIfNeeded() {
    const content = getModalContentEl();
    if (content && !tradersClubContentBackup) {
      tradersClubContentBackup = content.cloneNode(true);
    }
  }

  function restoreModalFromBackup() {
    const content = getModalContentEl();
    if (content && tradersClubContentBackup) {
      content.replaceWith(tradersClubContentBackup.cloneNode(true));
      bindTradersClubModal();
    }
  }

  function openModal() {
    if (!modal) return;
    captureBackupIfNeeded();
    modal.classList.add("active");
    document.body.style.overflow = "hidden";
  }

  function closeModal() {
    if (!modal) return;
    modal.classList.remove("active");
    document.body.style.overflow = "";
    restoreModalFromBackup();
  }

  function setFormError(msg) {
    const el = document.getElementById("tradersClubFormError");
    if (!el) return;
    if (msg) {
      el.textContent = msg;
      el.hidden = false;
    } else {
      el.textContent = "";
      el.hidden = true;
    }
  }

  function parseJsonSafe(txt) {
    try {
      return JSON.parse(txt);
    } catch {
      return null;
    }
  }

  function normalizeAction(data) {
    const raw = data?.action ?? data?.data?.action;
    if (typeof raw !== "string") return "";
    return raw.trim().toUpperCase();
  }

  function getLeadsHeaders() {
    return {
      "Content-Type": "application/json",
      Accept: "application/json",
      Referer: "https://client.tradertok.com/",
      "x-platform-name": "ClientZone",
    };
  }

  function showTradersClubFeedbackPending() {
    const body = document.getElementById("tradersClubModalBody");
    if (!body) return;
    body.innerHTML = `
      <div class="modal-header">
        <h3 class="modal-title" data-i18n="tradersClub.requestPendingTitle">Request pending</h3>
        <p class="modal-subtitle" data-i18n="tradersClub.requestPendingBody">Your Traders Club request is pending.</p>
      </div>
      <div style="text-align: center; padding: 24px 8px 8px;">
        <button type="button" class="btn-submit-club" id="tradersClubPendingClose">OK</button>
      </div>
    `;
    document.getElementById("tradersClubPendingClose")?.addEventListener("click", closeModal);
    if (typeof window.updatePageLanguage === "function") {
      window.updatePageLanguage();
    }
  }

  function showTradersClubFeedbackRegistrationSuccess() {
    const body = document.getElementById("tradersClubModalBody");
    if (!body) return;
    body.innerHTML = `
      <div style="text-align: center; padding: 32px 16px 24px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="#00C853" stroke-width="2" style="width: 72px; height: 72px; margin-bottom: 16px;">
          <circle cx="12" cy="12" r="10"></circle>
          <polyline points="16 8 10 14 8 12"></polyline>
        </svg>
        <h3 class="modal-title" data-i18n="tradersClub.registrationSuccessTitle" style="margin-bottom: 10px;">You're registered</h3>
        <p data-i18n="tradersClub.registrationSuccessBody" style="color: var(--text-secondary); line-height: 1.65; margin-bottom: 20px;">Thank you.</p>
        <button type="button" class="btn-submit-club" id="tradersClubRegSuccessClose">Close</button>
      </div>
    `;
    document.getElementById("tradersClubRegSuccessClose")?.addEventListener("click", closeModal);
    if (typeof window.updatePageLanguage === "function") {
      window.updatePageLanguage();
    }
  }

  async function submitExistingAccount(email) {
    setFormError("");
    let res;
    try {
      res = await tradersClubQualificationRequest({
        existing: true,
        group: TRADERS_CLUB_GROUP,
        email: email.trim(),
      });
    } catch (err) {
      setFormError(
        err?.message ||
          "Qualification request could not be sent. Check configuration.",
      );
      return;
    }

    const raw = await res.text();
    const data = raw ? parseJsonSafe(raw) : null;

    if (!res.ok) {
      const msg =
        data?.message ||
        data?.error ||
        (typeof data?.errors === "string" ? data.errors : null) ||
        `Request failed (${res.status})`;
      setFormError(msg);
      return;
    }

    const action = normalizeAction(data);
    if (action === "REDIRECT") {
      window.location.href = TRADERS_CLUB_WALLET_URL;
      return;
    }
    if (action === "PENDING") {
      showTradersClubFeedbackPending();
      return;
    }
    setFormError(
      "Unexpected response from the server. Please try again later.",
    );
  }

  async function submitNewAccount(fields) {
    setFormError("");
    const fullPhone =
      (typeof selectedCountryCode !== "undefined" ? selectedCountryCode : "+44") +
      String(fields.phone).replace(/\s+/g, "");

    const payload = {
      firstName: fields.firstname,
      lastName: fields.lastname,
      email: fields.email.trim(),
      phone: fullPhone,
      password: fields.password,
      country:
        typeof selectedCountryIso !== "undefined" ? selectedCountryIso : "CY",
      language: typeof currentLanguage !== "undefined" ? currentLanguage : "en",
      brandId: "8f867771-8a91-4eac-acd9-3255502fceab",
      businessUnitId: "34f7b5d6-fc0f-44fc-9323-8b0fcd3b26ed",
      adGroup: TRADERS_CLUB_GROUP,
      tags: [
        {
          id: "fb251ea1-1956-428a-b5a3-015cfb017e37",
        },
      ],
      accounts: [
        {
          groupName: "118000\\Default.USD",
          leverage: 100,
          isDemoAccount: false,
        },
      ],
      userDevice:
        typeof getUserDeviceInfo === "function" ? getUserDeviceInfo() : {},
    };

    const res = await fetch(TRADERS_CLUB_LEADS_URL, {
      method: "POST",
      headers: getLeadsHeaders(),
      body: JSON.stringify(payload),
    });

    const raw = await res.text();
    const data = raw ? parseJsonSafe(raw) : null;

    if (!res.ok) {
      const msg =
        data?.message || data?.error || `Registration failed (${res.status})`;
      setFormError(msg);
      return;
    }

    showTradersClubFeedbackRegistrationSuccess();
  }

  function updateModeUI(mode) {
    const panelEx = document.getElementById("tradersClubPanelExisting");
    const panelNew = document.getElementById("tradersClubPanelNew");
    const submitBtn = document.getElementById("tradersClubSubmit");
    if (panelEx) panelEx.hidden = mode !== "existing";
    if (panelNew) panelNew.hidden = mode !== "new";
    if (submitBtn) {
      if (mode === "existing") {
        submitBtn.textContent = "Continue";
        submitBtn.setAttribute("data-i18n", "tradersClub.continueEligible");
      } else {
        submitBtn.textContent = "Get My Free Card";
        submitBtn.setAttribute("data-i18n", "tradersClub.getMyFreeCard");
      }
      if (typeof window.updatePageLanguage === "function") {
        window.updatePageLanguage();
      }
    }
  }

  function bindTradersClubModal() {
    const closeBtn = document.getElementById("closeTradersClubModal");
    const form = document.getElementById("tradersClubForm");
    const submitBtn = document.getElementById("tradersClubSubmit");
    const modeRadios = form?.querySelectorAll('input[name="tradersClubMode"]');

    closeBtn?.addEventListener("click", closeModal);

    if (modal && !modal.dataset.tradersClubOverlayBound) {
      modal.dataset.tradersClubOverlayBound = "1";
      overlay?.addEventListener("click", closeModal);
    }

    modeRadios?.forEach((r) => {
      r.addEventListener("change", () => {
        const m = form.querySelector('input[name="tradersClubMode"]:checked')
          ?.value;
        if (m === "existing" || m === "new") updateModeUI(m);
        setFormError("");
      });
    });

    const initial =
      form?.querySelector('input[name="tradersClubMode"]:checked')?.value;
    updateModeUI(initial === "new" ? "new" : "existing");

    form?.addEventListener("submit", async (e) => {
      e.preventDefault();
      setFormError("");
      const mode = form.querySelector('input[name="tradersClubMode"]:checked')
        ?.value;

      if (mode === "existing") {
        const email = document.getElementById("clubEmailExisting")?.value?.trim();
        if (!email) {
          setFormError("Please enter your email.");
          return;
        }
        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.textContent = "Please wait…";
        }
        try {
          await submitExistingAccount(email);
        } catch (err) {
          console.error(err);
          setFormError(
            err?.message ||
              "Network error. Check your connection and try again.",
          );
        } finally {
          if (submitBtn) {
            submitBtn.disabled = false;
          }
          const m = form.querySelector('input[name="tradersClubMode"]:checked')
            ?.value;
          updateModeUI(m === "new" ? "new" : "existing");
        }
        return;
      }

      const firstname = document.getElementById("clubFirstname")?.value?.trim();
      const lastname = document.getElementById("clubLastname")?.value?.trim();
      const email = document.getElementById("clubEmailNew")?.value?.trim();
      const phone = document.getElementById("clubPhone")?.value?.trim();
      const password = document.getElementById("clubPassword")?.value;

      if (!firstname || !lastname || !email || !phone || !password) {
        setFormError("Please fill in all fields.");
        return;
      }
      if (password.length < 8) {
        setFormError("Password must be at least 8 characters.");
        return;
      }

      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = "Registering…";
      }
      try {
        await submitNewAccount({
          firstname,
          lastname,
          email,
          phone,
          password,
        });
      } catch (err) {
        console.error(err);
        setFormError(
          err?.message ||
            "Network error. Check your connection and try again.",
        );
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
        }
        updateModeUI("new");
      }
    });
  }

  openBtn?.addEventListener("click", openModal);

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal?.classList.contains("active")) {
      closeModal();
    }
  });

  bindTradersClubModal();
})();

// ================== EDUCATION HUB NEWSLETTER (footer) ==================
(function () {
  const form = document.getElementById("educationNewsletterForm");
  const statusEl = document.getElementById("newsletterFormStatus");
  const submitBtn = document.getElementById("educationNewsletterSubmit");
  if (!form || !submitBtn) return;

  function setStatus(msg, type) {
    if (!statusEl) return;
    statusEl.textContent = msg || "";
    statusEl.classList.remove("is-error", "is-success");
    if (type === "error") statusEl.classList.add("is-error");
    if (type === "success") statusEl.classList.add("is-success");
  }

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const emailInput = document.getElementById("newsletter-email");
    const nameInput = document.getElementById("newsletter-name");
    const consent = document.getElementById("newsletter-consent");
    const hp = form.querySelector('input[name="website"]');

    if (hp && hp.value) {
      setStatus("", null);
      return;
    }

    const email = emailInput?.value?.trim() || "";
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !re.test(email)) {
      setStatus("Please enter a valid email address.", "error");
      return;
    }
    if (!consent?.checked) {
      setStatus("Please accept the consent to subscribe.", "error");
      return;
    }

    submitBtn.disabled = true;
    const prevLabel = submitBtn.textContent;
    submitBtn.textContent = "Subscribing…";
    setStatus("", null);

    try {
      const res = await fetch(form.getAttribute("action") || "./api/education-newsletter.php", {
        method: "POST",
        headers: { "Content-Type": "application/json", Accept: "application/json" },
        body: JSON.stringify({
          email,
          name: (nameInput?.value || "").trim(),
          consent: true,
          website: "",
        }),
      });
      const data = await res.json().catch(() => ({}));
      if (!res.ok || !data.ok) {
        setStatus(data.message || "Something went wrong. Please try again.", "error");
        return;
      }
      setStatus(data.message || "Thanks — you are subscribed.", "success");
      form.reset();
    } catch {
      setStatus("Network error. Please try again.", "error");
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = prevLabel;
    }
  });
})();
