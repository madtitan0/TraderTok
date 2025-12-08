// ================== THEME TOGGLE ==================
const themeToggle = document.getElementById('themeToggle');
const body = document.body;

// Load saved theme from localStorage
function loadTheme() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'light') {
        body.classList.add('light-theme');
    }
}

// Get theme colors
function getThemeColors(transparent = false) {
    const isLight = body.classList.contains('light-theme');
    return {
        bg: isLight ? (transparent ? 'rgba(0,0,0,0)' : '#ffffff') : '#000000',
        text: isLight ? '#000000' : '#ffffff',
        grid: isLight ? 'rgba(0,0,0,0.06)' : 'rgba(255,255,255,0.06)',
        labelBg: isLight ? '#000000' : '#ffffff',
        labelText: isLight ? '#ffffff' : '#000000'
    };
}

// Toggle theme
function toggleTheme() {
    body.classList.toggle('light-theme');

    // Save to localStorage
    const currentTheme = body.classList.contains('light-theme') ? 'light' : 'dark';
    localStorage.setItem('theme', currentTheme);

    // Redraw all canvas charts
    if (window.redrawAllCharts) {
        window.redrawAllCharts();
    }
}

// Initialize theme on page load
loadTheme();

// Add click event listener
if (themeToggle) {
    themeToggle.addEventListener('click', toggleTheme);
}

// ================== MOBILE MENU ==================
const mobileMenuBtn  = document.querySelector('.mobile-menu-btn');
const nav            = document.querySelector('.nav');
const header         = document.querySelector('.header');
const mobileCloseBtn = document.querySelector('.mobile-close-btn');

const isMobile = () => window.innerWidth <= 768;

function openMobileMenu() {
    if (!nav) return;
    document.body.style.overflow = 'hidden';
    nav.classList.add('active');
    mobileMenuBtn?.classList.add('active');
    setTimeout(() => {
        nav.scrollTop = 0;
        nav.scrollTo(0, 0);
    }, 10);
}

function closeMobileMenu() {
    if (!nav) return;
    document.body.style.overflow = '';
    nav.classList.remove('active');
    mobileMenuBtn?.classList.remove('active');

    
    setTimeout(() => {
        document.querySelectorAll('.nav-item.dropdown.active').forEach(item => {
            item.classList.remove('active');
        });
    }, 150);
}

if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', () => {
        if (nav.classList.contains('active')) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    });
}


if (mobileCloseBtn) {
    mobileCloseBtn.addEventListener('click', () => {
        closeMobileMenu();
    });
}


document.addEventListener('click', (e) => {
    if (!isMobile()) return;
    const target = e.target;
    if (!(target instanceof Element)) return;

    const link = target.closest('.menu-card, .nav-link');
    if (!link) return;

    if (link.classList.contains('nav-link') && link.closest('.nav-item.dropdown')) {
        return;
    }


    if (link.classList.contains('menu-card')) {
        closeMobileMenu();
        return;
    }

    closeMobileMenu();
});


window.addEventListener('resize', () => {
    if (!isMobile()) {
        closeMobileMenu();
    }
});

// ================== MOBILE DROPDOWN ==================
function initMobileDropdown() {
    const dropdownItems = document.querySelectorAll('.nav-item.dropdown');

    dropdownItems.forEach(item => {
        const link = item.querySelector('.nav-link');
        if (!link) return;

        
        if (link._dropdownClickHandler) {
            link.removeEventListener('click', link._dropdownClickHandler);
        }

      
        link._dropdownClickHandler = function(e) {
           
            if (!isMobile()) return;

            e.preventDefault();
            e.stopPropagation();

            const isCurrentlyActive = item.classList.contains('active');

            
            dropdownItems.forEach(other => {
                if (other !== item) {
                    other.classList.remove('active');
                }
            });

            
            if (isCurrentlyActive) {
                item.classList.remove('active');
            } else {
                item.classList.add('active');
            }
        };

        link.addEventListener('click', link._dropdownClickHandler);
    });
}


initMobileDropdown();


let resizeTimeout;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
        initMobileDropdown();
    }, 100);
});

// ================== SMOOTH SCROLL (НЕ ЛОМАЕМ href="#") ==================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');

        // служебные ссылки типа "#" или "#!" — не трогаем
        if (!href || href === '#' || href === '#!') return;

        const target = document.querySelector(href);
        if (!target) return;

        e.preventDefault();
        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
});

// ================== HEADER SCROLL EFFECT ==================
if (header) {
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        header.classList.toggle('header-blur', currentScroll > 100);
    }, { passive: true });
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
        const low  = Math.min(prevClose, close) - Math.random() * 0.3;

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
        candles.forEach(c => {
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
            const color = bull ? "#22c55e" : "#ef4444";

            const x = offsetX + idx * candleWidth;

            const yHigh  = priceToY(candle.high,  h, min, max);
            const yLow   = priceToY(candle.low,   h, min, max);
            const yOpen  = priceToY(candle.open,  h, min, max);
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
        const y = Math.max(4, Math.min(h - labelHeight - 4, lastY - labelHeight / 2));

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
    const statLabel = element.closest('.stat-card').querySelector('.stat-label').textContent;

    function frame(now) {
        const progress = Math.min(1, (now - start) / duration);
        const value = Math.floor(target * progress);

        if (statLabel.includes('Secure')) {
            element.textContent = value + '%';
        } else if (element.classList.contains('stat-24') || element.classList.contains('stat-7')) {
            element.textContent = value;
        } else {
            element.textContent = value + '+';
        }

        if (progress < 1) {
            requestAnimationFrame(frame);
        }
    }

    requestAnimationFrame(frame);
}

// Intersection Observer for About section (counter + gradient animation + fade-in)
const aboutObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Add fade-in effect
            entry.target.classList.add('is-visible');

            // Start counter animation for regular stats
            const statNumbers = entry.target.querySelectorAll('.stat-number[data-target]');
            statNumbers.forEach(element => {
                const target = parseInt(element.getAttribute('data-target'));
                animateCounter(element, target);
            });

            // Start counter animation for 24/7 - parallel
            const stat24 = entry.target.querySelector('.stat-24');
            const stat7 = entry.target.querySelector('.stat-7');
            if (stat24 && stat7) {
                const target24 = parseInt(stat24.getAttribute('data-target'));
                const target7 = parseInt(stat7.getAttribute('data-target'));
                animateCounter(stat24, target24, 2000);
                animateCounter(stat7, target7, 2000);
            }

            // Start gradient animation for subtitle
            const aboutSubtitle = document.querySelector('.about-subtitle.gradient-text');
            if (aboutSubtitle) {
                aboutSubtitle.classList.add('animate');
            }

            aboutObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.3 });

const aboutSection = document.querySelector('.about-us');
if (aboutSection) {
    aboutObserver.observe(aboutSection);
}

// Parallax effect removed - kept simple for stability
// Stacking cards effect works with pure CSS using sticky positioning and negative margins

// ================== INSIGHTS SECTION ANIMATION ==================

const insightsSection = document.querySelector('.insights');
if (insightsSection) {
    const insightsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                insightsSection.classList.add('is-visible');
                insightsObserver.unobserve(insightsSection);
            }
        });
    }, { threshold: 0.2 });

    insightsObserver.observe(insightsSection);
}

// ================== PLATFORMS SECTION INTERACTIVITY ==================

// Scroll reveal for platforms section
const platformsSection = document.querySelector('.platforms-section');
if (platformsSection) {
    const platformsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                platformsSection.classList.add('is-visible');

                // Start gradient animation for subtitle
                const platformsSubtitle = document.querySelector('.platforms-subtitle');
                if (platformsSubtitle) {
                    platformsSubtitle.classList.add('animate');
                }

                platformsObserver.unobserve(platformsSection);
            }
        });
    }, { threshold: 0.2 });

    platformsObserver.observe(platformsSection);
}

// Interactive platform options with device visualization
const deviceWrapper = document.querySelector('.device-wrapper');
const desktopOption = document.querySelector('.platform-option--desktop');
const mobileOption = document.querySelector('.platform-option--mobile');
const optionsRegion = document.querySelector('.platform-options');

if (deviceWrapper && desktopOption && mobileOption && optionsRegion) {

    function setActive(mode) {
        deviceWrapper.classList.remove('desktop-active', 'mobile-active');
        desktopOption.classList.remove('platform-option--active');
        mobileOption.classList.remove('platform-option--active');

        desktopOption.setAttribute('aria-pressed', 'false');
        mobileOption.setAttribute('aria-pressed', 'false');

        if (mode === 'desktop') {
            deviceWrapper.classList.add('desktop-active');
            desktopOption.classList.add('platform-option--active');
            desktopOption.setAttribute('aria-pressed', 'true');
        } else if (mode === 'mobile') {
            deviceWrapper.classList.add('mobile-active');
            mobileOption.classList.add('platform-option--active');
            mobileOption.setAttribute('aria-pressed', 'true');
        }
    }

    // Start with no active state
    setActive(null);

    function activateDesktop() { setActive('desktop'); }
    function activateMobile() { setActive('mobile'); }

    // Hover events
    desktopOption.addEventListener('mouseenter', activateDesktop);
    mobileOption.addEventListener('mouseenter', activateMobile);

    // Click events (for mobile and explicit selection)
    desktopOption.addEventListener('click', activateDesktop);
    mobileOption.addEventListener('click', activateMobile);

    // When mouse leaves options region - deactivate both
    optionsRegion.addEventListener('mouseleave', function() {
        setActive(null);
    });

    // Keyboard support (Tab focus)
    desktopOption.addEventListener('focusin', activateDesktop);
    mobileOption.addEventListener('focusin', activateMobile);

    optionsRegion.addEventListener('focusout', function() {
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
        deviceWrapper.style.transform =
            `translate(${x * maxMovement}px, ${y * maxMovement}px)`;
    }

    function resetParallax() {
        deviceWrapper.style.transform = 'translate(0, 0)';
    }

    function enableParallax() {
        deviceWrapper.addEventListener('mousemove', handleParallax);
        deviceWrapper.addEventListener('mouseleave', resetParallax);
    }

    function disableParallax() {
        deviceWrapper.removeEventListener('mousemove', handleParallax);
        deviceWrapper.removeEventListener('mouseleave', resetParallax);
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
    window.addEventListener('resize', updateParallax);
}

// ================== TRADING CHART FOR DEVICE SCREENS ==================

const laptopCanvas = document.getElementById('laptopChart');
const phoneCanvas = document.getElementById('phoneChart');

if (laptopCanvas && phoneCanvas) {
    const laptopCtx = laptopCanvas.getContext('2d');
    const phoneCtx = phoneCanvas.getContext('2d');

    const CANDLE_COUNT_LAPTOP = 40;
    const CANDLE_COUNT_PHONE = 10;  // Меньше свечей для лучшей читаемости на маленьком экране
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
        candles.forEach(c => {
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
        const isLight = body.classList.contains('light-theme');

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
            const color = bull ? "#22c55e" : "#ef4444";

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
        const labelY = Math.max(4, Math.min(h - labelHeight - 4, lastY - labelHeight / 2));

        const colors = getThemeColors();
        ctx.fillStyle = colors.labelBg;
        roundRectPath(ctx, labelX, labelY, textWidth, labelHeight, 8);
        ctx.fill();

        ctx.fillStyle = colors.labelText;
        ctx.fillText(label, labelX + 6, labelY + 11);
        ctx.restore();
    }

    function drawLaptopChart() {
        drawCandlestickChart(laptopCanvas, laptopCtx, laptopCandles, CANDLE_COUNT_LAPTOP);
    }

    function drawPhoneChart() {
        drawCandlestickChart(phoneCanvas, phoneCtx, phoneCandles, CANDLE_COUNT_PHONE);
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
window.redrawAllCharts = function() {
    // Trigger resize event to redraw all canvases
    const event = new Event('resize');
    window.dispatchEvent(event);

    // Also call stored redraw functions if available
    if (window.chartRedrawFunctions) {
        window.chartRedrawFunctions.forEach(fn => fn());
    }
};

// ================== WHY CHOOSE SECTION ANIMATION ==================

const whyChooseSection = document.querySelector('.why-choose');
if (whyChooseSection) {
    const whyChooseObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                whyChooseSection.classList.add('is-visible');

                // Start gradient animation for description
                const whyChooseDescription = document.querySelector('.why-choose-description.gradient-text');
                if (whyChooseDescription) {
                    whyChooseDescription.classList.add('animate');
                }

                whyChooseObserver.unobserve(whyChooseSection);
            }
        });
    }, { threshold: 0.2 });

    whyChooseObserver.observe(whyChooseSection);
}

// ================== ACCORDION FUNCTIONALITY ==================

const accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach(item => {
    const header = item.querySelector('.accordion-header');

    header.addEventListener('click', () => {
        const isActive = item.classList.contains('active');

        // Close all accordion items
        accordionItems.forEach(otherItem => {
            otherItem.classList.remove('active');
        });

        // Toggle current item
        if (!isActive) {
            item.classList.add('active');
        }
    });
});

// ================== CONTACT FORM SECTION ANIMATION ==================

const contactFormSection = document.querySelector('.contact-form-section');
if (contactFormSection) {
    const contactFormObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add fade-in effect
                contactFormSection.classList.add('is-visible');

                // Start gradient animation for subtitle
                const contactFormSubtitle = document.querySelector('.contact-form-subtitle.gradient-text');
                if (contactFormSubtitle) {
                    contactFormSubtitle.classList.add('animate');
                }

                contactFormObserver.unobserve(contactFormSection);
            }
        });
    }, { threshold: 0.2 });

    contactFormObserver.observe(contactFormSection);
}

// ================== PAYMENT METHODS SECTION ANIMATION ==================

const paymentMethodsSection = document.querySelector('.payment-methods-section');
if (paymentMethodsSection) {
    const paymentMethodsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Start gradient animation for title
                const paymentMethodsTitle = document.querySelector('.payment-methods-title.gradient-text');
                if (paymentMethodsTitle) {
                    paymentMethodsTitle.classList.add('animate');
                }

                paymentMethodsObserver.unobserve(paymentMethodsSection);
            }
        });
    }, { threshold: 0.2 });

    paymentMethodsObserver.observe(paymentMethodsSection);
}

// ================== FORM VALIDATION ==================

const contactForm = document.getElementById('contactForm');
if (contactForm) {
    const submitBtn = document.getElementById('submitBtn');
    const formStatus = document.getElementById('formStatus');

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
        const errorSpan = document.getElementById(fieldId + '-error');

        if (field && errorSpan) {
            field.classList.add('error');
            errorSpan.textContent = message;
        }
    }

    function clearError(fieldId) {
        const field = document.getElementById(fieldId);
        const errorSpan = document.getElementById(fieldId + '-error');

        if (field && errorSpan) {
            field.classList.remove('error');
            errorSpan.textContent = '';
        }
    }

    function clearAllErrors() {
        ['name', 'surname', 'phone', 'email', 'message'].forEach(clearError);
    }

    function validateForm() {
        clearAllErrors();
        let isValid = true;

        // Validate Name
        const name = document.getElementById('name').value.trim();
        if (name === '') {
            showError('name', 'Name is required');
            isValid = false;
        } else if (name.length < 2) {
            showError('name', 'Name must be at least 2 characters');
            isValid = false;
        }

        // Validate Surname
        const surname = document.getElementById('surname').value.trim();
        if (surname === '') {
            showError('surname', 'Surname is required');
            isValid = false;
        } else if (surname.length < 2) {
            showError('surname', 'Surname must be at least 2 characters');
            isValid = false;
        }

        // Validate Phone
        const phone = document.getElementById('phone').value.trim();
        if (phone === '') {
            showError('phone', 'Phone number is required');
            isValid = false;
        } else if (!validatePhone(phone)) {
            showError('phone', 'Please enter a valid phone number');
            isValid = false;
        }

        // Validate Email
        const email = document.getElementById('email').value.trim();
        if (email === '') {
            showError('email', 'Email is required');
            isValid = false;
        } else if (!validateEmail(email)) {
            showError('email', 'Please enter a valid email address');
            isValid = false;
        }

        // Validate Message
        const message = document.getElementById('message').value.trim();
        if (message === '') {
            showError('message', 'Message is required');
            isValid = false;
        } else if (message.length < 10) {
            showError('message', 'Message must be at least 10 characters');
            isValid = false;
        }

        return isValid;
    }

    // Real-time validation on input
    ['name', 'surname', 'phone', 'email', 'message'].forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('blur', () => {
                const value = field.value.trim();

                if (value === '') {
                    clearError(fieldId);
                } else {
                    // Validate individual field
                    if (fieldId === 'email' && !validateEmail(value)) {
                        showError(fieldId, 'Please enter a valid email address');
                    } else if (fieldId === 'phone' && !validatePhone(value)) {
                        showError(fieldId, 'Please enter a valid phone number');
                    } else if ((fieldId === 'name' || fieldId === 'surname') && value.length < 2) {
                        showError(fieldId, `${fieldId.charAt(0).toUpperCase() + fieldId.slice(1)} must be at least 2 characters`);
                    } else if (fieldId === 'message' && value.length < 10) {
                        showError(fieldId, 'Message must be at least 10 characters');
                    } else {
                        clearError(fieldId);
                    }
                }
            });

            field.addEventListener('input', () => {
                if (field.classList.contains('error')) {
                    clearError(fieldId);
                }
            });
        }
    });

    // Form submission
    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (!validateForm()) {
            formStatus.className = 'form-status error';
            formStatus.textContent = 'Please fix the errors above';
            return;
        }

        // Disable submit button
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';

        // Get form data
        const formData = {
            name: document.getElementById('name').value.trim(),
            surname: document.getElementById('surname').value.trim(),
            phone: document.getElementById('phone').value.trim(),
            email: document.getElementById('email').value.trim(),
            message: document.getElementById('message').value.trim()
        };

        try {
            // Simulate API call (replace with actual endpoint)
            await new Promise(resolve => setTimeout(resolve, 1500));

            // Show success message
            formStatus.className = 'form-status success';
            formStatus.textContent = 'Thank you! We will contact you soon.';

            // Reset form
            contactForm.reset();
            clearAllErrors();

            // Hide success message after 5 seconds
            setTimeout(() => {
                formStatus.className = 'form-status';
                formStatus.textContent = '';
            }, 5000);

        } catch (error) {
            // Show error message
            formStatus.className = 'form-status error';
            formStatus.textContent = 'Something went wrong. Please try again.';
        } finally {
            // Re-enable submit button
            submitBtn.disabled = false;
            submitBtn.textContent = 'Contact Us';
        }
    });
}

// ================== AUTH SIDEBAR ==================

const authSidebar = document.getElementById('authSidebar');
const authOverlay = document.getElementById('authOverlay');
const authCloseBtn = document.getElementById('authCloseBtn');
const signInBtn = document.getElementById('signInBtn');
const signUpBtn = document.getElementById('signUpBtn');
const authTabs = document.querySelectorAll('.auth-tab');
const authForms = document.querySelectorAll('.auth-form');

// Open sidebar
function openAuthSidebar(defaultTab = 'signin') {
    authSidebar.classList.add('active');
    authOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';

    // Switch to the requested tab
    switchAuthTab(defaultTab);
}

// Close sidebar
function closeAuthSidebar() {
    authSidebar.classList.remove('active');
    authOverlay.classList.remove('active');
    document.body.style.overflow = '';
}

// Switch between tabs
function switchAuthTab(tabName) {
    // Update tabs
    authTabs.forEach(tab => {
        if (tab.dataset.tab === tabName) {
            tab.classList.add('active');
        } else {
            tab.classList.remove('active');
        }
    });

    // Update forms
    authForms.forEach(form => {
        if (form.dataset.form === tabName) {
            form.classList.add('active');
        } else {
            form.classList.remove('active');
        }
    });
}

// Event Listeners
if (signInBtn) {
    signInBtn.addEventListener('click', () => {
        openAuthSidebar('signin');
    });
}

if (signUpBtn) {
    signUpBtn.addEventListener('click', () => {
        openAuthSidebar('signup');
    });
}

if (authCloseBtn) {
    authCloseBtn.addEventListener('click', closeAuthSidebar);
}

if (authOverlay) {
    authOverlay.addEventListener('click', closeAuthSidebar);
}

// Tab switching
authTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        switchAuthTab(tab.dataset.tab);
    });
});

// Close on Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && authSidebar.classList.contains('active')) {
        closeAuthSidebar();
    }
});

// Form Submissions
const signinForm = document.getElementById('signinForm');
const signupForm = document.getElementById('signupForm');

if (signinForm) {
    signinForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const email = document.getElementById('signin-email').value;
        const password = document.getElementById('signin-password').value;

        console.log('Sign In:', { email, password });

        // Simulate API call
        await new Promise(resolve => setTimeout(resolve, 1000));

        alert('Sign In functionality - Connect your backend here!');
        // closeAuthSidebar();
    });
}

// ================== LANGUAGE SELECTOR ==================

const languageBtn = document.getElementById('languageBtn');
const languageDropdown = document.getElementById('languageDropdown');
const languageItems = document.querySelectorAll('.language-item');
const mobileLanguageItems = document.querySelectorAll('.mobile-language-item');

let currentLanguage = 'en';

// Language names mapping
const languageNames = {
    'en': 'EN',
    'it': 'IT',
    'de': 'DE'
};

// Function to update language
function updateLanguage(lang, flagHTML) {
    currentLanguage = lang;

    // Update desktop button if exists
    if (languageBtn) {
        languageBtn.querySelector('.language-flag').innerHTML = flagHTML;
        languageBtn.querySelector('.language-code').textContent = languageNames[lang];
    }

    // Update all language items active state
    languageItems.forEach(i => {
        if (i.dataset.lang === lang) {
            i.classList.add('active');
        } else {
            i.classList.remove('active');
        }
    });

    // Update mobile language items active state
    mobileLanguageItems.forEach(i => {
        if (i.dataset.lang === lang) {
            i.classList.add('active');
        } else {
            i.classList.remove('active');
        }
    });

    // Store in localStorage
    localStorage.setItem('preferredLanguage', lang);

    console.log('Language changed to:', lang);

    // TODO: Here you can implement actual language switching logic
    // For example: load translations, update page content, etc.
}

// Toggle language dropdown (desktop)
if (languageBtn) {
    languageBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        languageDropdown.classList.toggle('active');
        languageBtn.classList.toggle('active');
    });
}

// Select language (desktop)
languageItems.forEach(item => {
    item.addEventListener('click', () => {
        const lang = item.dataset.lang;
        const flagHTML = item.querySelector('.language-flag').innerHTML;

        updateLanguage(lang, flagHTML);

        // Close dropdown
        if (languageDropdown) {
            languageDropdown.classList.remove('active');
        }
        if (languageBtn) {
            languageBtn.classList.remove('active');
        }
    });
});

// Select language (mobile menu)
mobileLanguageItems.forEach(item => {
    item.addEventListener('click', () => {
        const lang = item.dataset.lang;
        const flagHTML = item.querySelector('.language-flag').innerHTML;

        updateLanguage(lang, flagHTML);

        // Close mobile menu
        const nav = document.querySelector('.nav');
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        if (nav) {
            nav.classList.remove('active');
        }
        if (mobileMenuBtn) {
            mobileMenuBtn.classList.remove('active');
        }
    });
});

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    if (languageDropdown && !languageDropdown.contains(e.target) && e.target !== languageBtn && !languageBtn.contains(e.target)) {
        languageDropdown.classList.remove('active');
        if (languageBtn) {
            languageBtn.classList.remove('active');
        }
    }
});

// Load saved language preference on page load
window.addEventListener('DOMContentLoaded', () => {
    const savedLanguage = localStorage.getItem('preferredLanguage') || 'en';

    // Find the item in desktop or mobile
    let savedItem = document.querySelector(`.language-item[data-lang="${savedLanguage}"]`);
    if (!savedItem) {
        savedItem = document.querySelector(`.mobile-language-item[data-lang="${savedLanguage}"]`);
    }

    if (savedItem) {
        const flagHTML = savedItem.querySelector('.language-flag').innerHTML;
        updateLanguage(savedLanguage, flagHTML);
    } else {
        // Default to English
        const englishItem = document.querySelector('.language-item[data-lang="en"]') ||
                           document.querySelector('.mobile-language-item[data-lang="en"]');
        if (englishItem) {
            const flagHTML = englishItem.querySelector('.language-flag').innerHTML;
            updateLanguage('en', flagHTML);
        }
    }
});

// ================== PHONE COUNTRY SELECTOR ==================

const countrySelect = document.getElementById('countrySelect');
const countryDropdown = document.getElementById('countryDropdown');
const countrySearch = document.getElementById('countrySearch');
const countryList = document.getElementById('countryList');
const countryItems = document.querySelectorAll('.country-item');

let selectedCountryCode = '+44';
let selectedCountryFlag = '🇬🇧';

// Toggle dropdown
if (countrySelect) {
    countrySelect.addEventListener('click', (e) => {
        e.stopPropagation();
        countryDropdown.classList.toggle('active');
        countrySelect.classList.toggle('active');

        // Focus search when opening
        if (countryDropdown.classList.contains('active')) {
            setTimeout(() => {
                countrySearch.focus();
            }, 100);
        }
    });
}

// Select country
countryItems.forEach(item => {
    item.addEventListener('click', () => {
        const code = item.dataset.code;
        const flag = item.dataset.flag;

        selectedCountryCode = code;
        selectedCountryFlag = flag;

        // Update button
        countrySelect.querySelector('.country-flag').textContent = flag;
        countrySelect.querySelector('.country-code').textContent = code;

        // Close dropdown
        countryDropdown.classList.remove('active');
        countrySelect.classList.remove('active');

        // Clear search
        countrySearch.value = '';
        countryItems.forEach(item => item.classList.remove('hidden'));
    });
});

// Search countries
if (countrySearch) {
    countrySearch.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();

        countryItems.forEach(item => {
            const countryName = item.dataset.country.toLowerCase();
            const countryCode = item.dataset.code.toLowerCase();

            if (countryName.includes(searchTerm) || countryCode.includes(searchTerm)) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    });
}

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    if (countryDropdown && !countryDropdown.contains(e.target) && e.target !== countrySelect) {
        countryDropdown.classList.remove('active');
        if (countrySelect) {
            countrySelect.classList.remove('active');
        }
    }
});

// Signup form submission with phone
if (signupForm) {
    signupForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const firstname = document.getElementById('signup-firstname').value;
        const lastname = document.getElementById('signup-lastname').value;
        const email = document.getElementById('signup-email').value;
        const phone = document.getElementById('signup-phone').value;
        const fullPhone = selectedCountryCode + phone;
        const password = document.getElementById('signup-password').value;
        const confirmPassword = document.getElementById('signup-confirm-password').value;

        // Validate passwords match
        if (password !== confirmPassword) {
            alert('Passwords do not match!');
            return;
        }

        console.log('Sign Up:', {
            firstname,
            lastname,
            email,
            phone: fullPhone,
            countryCode: selectedCountryCode,
            password
        });

        // Simulate API call
        await new Promise(resolve => setTimeout(resolve, 1000));

        alert('Sign Up functionality - Connect your backend here!');
        // closeAuthSidebar();
    });
}

// ====== PROMO BANNER COUNTDOWN TIMER ======
(function() {
    // ========================================
    // CONFIGURE YOUR PROMO END DATE HERE:
    // Format: 'YYYY-MM-DDTHH:MM:SS' (24-hour format)
    // Example: '2025-12-31T23:59:59' for Dec 31, 2025 at 11:59:59 PM
    // ========================================
    const PROMO_END_DATE = '2025-12-31T23:59:59';
    // ========================================

    const countdownContainer = document.getElementById('promo-countdown');
    const expiredMessage = document.getElementById('promo-expired');
    const daysEl = document.getElementById('countdown-days');
    const hoursEl = document.getElementById('countdown-hours');
    const minutesEl = document.getElementById('countdown-minutes');
    const secondsEl = document.getElementById('countdown-seconds');

    if (!countdownContainer || !daysEl || !hoursEl || !minutesEl || !secondsEl) {
        return;
    }

    const endDate = new Date(PROMO_END_DATE).getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = endDate - now;

        if (distance < 0) {
            // Promo has expired
            countdownContainer.classList.add('hidden');
            if (expiredMessage) {
                expiredMessage.classList.add('show');
            }
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        daysEl.textContent = String(days).padStart(2, '0');
        hoursEl.textContent = String(hours).padStart(2, '0');
        minutesEl.textContent = String(minutes).padStart(2, '0');
        secondsEl.textContent = String(seconds).padStart(2, '0');
    }

    // Initial update
    updateCountdown();

    // Update every second
    setInterval(updateCountdown, 1000);
})();

// ====== PROMO BANNER GRADIENT ANIMATION ======
const promoBanner = document.querySelector('.promo-banner');
if (promoBanner) {
    const promoObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Start gradient animation for title
                const promoGradientTexts = promoBanner.querySelectorAll('.promo-title .gradient-text');
                promoGradientTexts.forEach(text => {
                    text.classList.add('animate');
                });

                // Start growth arrow animation
                startGrowthArrowAnimation();

                promoObserver.unobserve(promoBanner);
            }
        });
    }, { threshold: 0.3 });

    promoObserver.observe(promoBanner);
}

// ====== GROWTH ARROW ANIMATION ======
function startGrowthArrowAnimation() {
    const segmentsGroup = document.getElementById('arrow-segments');
    const arrowHead = document.getElementById('arrow-head');

    if (!segmentsGroup || !arrowHead) return;

    const points = [
        { x: 40, y: 360 },
        { x: 80, y: 330 },
        { x: 110, y: 300 },
        { x: 130, y: 320 },
        { x: 160, y: 280 },
        { x: 190, y: 250 },
        { x: 210, y: 270 },
        { x: 240, y: 220 },
        { x: 260, y: 240 },
        { x: 290, y: 180 },
        { x: 310, y: 200 },
        { x: 340, y: 140 },
        { x: 360, y: 100 },
        { x: 380, y: 50 },
    ];

    const tension = 0.3;

    function getPointOnCurve(t) {
        if (t <= 0) return { x: points[0].x, y: points[0].y, angle: -45 };
        if (t >= 1) {
            const last = points[points.length - 1];
            const prev = points[points.length - 2];
            return {
                x: last.x,
                y: last.y,
                angle: Math.atan2(last.y - prev.y, last.x - prev.x) * (180 / Math.PI)
            };
        }

        const totalSegments = points.length - 1;
        const segment = Math.min(Math.floor(t * totalSegments), totalSegments - 1);
        const localT = (t * totalSegments) - segment;

        const i = segment;
        const p0 = points[Math.max(i - 1, 0)];
        const p1 = points[i];
        const p2 = points[i + 1];
        const p3 = points[Math.min(i + 2, points.length - 1)];

        const cp1x = p1.x + (p2.x - p0.x) * tension;
        const cp1y = p1.y + (p2.y - p0.y) * tension;
        const cp2x = p2.x - (p3.x - p1.x) * tension;
        const cp2y = p2.y - (p3.y - p1.y) * tension;

        const t2 = localT * localT;
        const t3 = t2 * localT;
        const mt = 1 - localT;
        const mt2 = mt * mt;
        const mt3 = mt2 * mt;

        const x = mt3 * p1.x + 3 * mt2 * localT * cp1x + 3 * mt * t2 * cp2x + t3 * p2.x;
        const y = mt3 * p1.y + 3 * mt2 * localT * cp1y + 3 * mt * t2 * cp2y + t3 * p2.y;

        const dx = 3 * mt2 * (cp1x - p1.x) + 6 * mt * localT * (cp2x - cp1x) + 3 * t2 * (p2.x - cp2x);
        const dy = 3 * mt2 * (cp1y - p1.y) + 6 * mt * localT * (cp2y - cp1y) + 3 * t2 * (p2.y - cp2y);

        return {
            x,
            y,
            angle: Math.atan2(dy, dx) * (180 / Math.PI)
        };
    }

    function renderFrame(progress) {
        segmentsGroup.innerHTML = '';

        const numSegments = 20;

        for (let i = 0; i < numSegments; i++) {
            const startT = (i / numSegments) * progress;
            const endT = ((i + 1) / numSegments) * progress;

            if (endT <= 0) continue;

            const startPoint = getPointOnCurve(startT);
            const endPoint = getPointOnCurve(endT);

            const opacity = 0.15 + (endT / progress) * 0.85;
            const colorProgress = endT / progress;
            const r = Math.round(0);
            const g = Math.round(150 + colorProgress * 105);
            const b = Math.round(50 + colorProgress * 30);

            const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
            path.setAttribute('d', `M ${startPoint.x} ${startPoint.y} L ${endPoint.x} ${endPoint.y}`);
            path.setAttribute('fill', 'none');
            path.setAttribute('stroke', `rgb(${r}, ${g}, ${b})`);
            path.setAttribute('stroke-width', '3');
            path.setAttribute('stroke-linecap', 'round');
            path.setAttribute('stroke-linejoin', 'round');
            path.setAttribute('opacity', opacity);
            segmentsGroup.appendChild(path);
        }

        if (progress > 0.02) {
            const currentPoint = getPointOnCurve(progress);
            arrowHead.style.opacity = '1';
            arrowHead.setAttribute('transform', `translate(${currentPoint.x}, ${currentPoint.y}) rotate(${currentPoint.angle})`);
        }
    }

    const duration = 5000;
    const start = Date.now();

    // Easing function for smooth animation
    function easeOutCubic(t) {
        return 1 - Math.pow(1 - t, 3);
    }

    function animate() {
        const elapsed = Date.now() - start;
        const linearProgress = Math.min(elapsed / duration, 1);
        const progress = easeOutCubic(linearProgress);

        renderFrame(progress);

        if (linearProgress < 1) {
            requestAnimationFrame(animate);
        }
    }

    setTimeout(() => requestAnimationFrame(animate), 300);
}

// ================== DEPOSIT COUNTER ANIMATION ==================
(function() {
    const counter = document.getElementById('depositCounter');
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
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter();
                observer.disconnect();
            }
        });
    }, { threshold: 0.5 });

    observer.observe(counter);
})();

// ================== DEPOSIT MODAL ==================
(function() {
    const modal = document.getElementById('depositModal');
    const openBtn = document.getElementById('openDepositModal');
    const closeBtn = document.getElementById('closeDepositModal');
    const overlay = modal?.querySelector('.deposit-modal-overlay');
    const form = document.getElementById('depositForm');
    const submitBtn = form?.querySelector('.btn-submit-deposit');

    // ===== CONFIGURATION =====
    // Telegram Bot Configuration
    const TELEGRAM_BOT_TOKEN = 'YOUR_BOT_TOKEN'; // Replace with your bot token
    const TELEGRAM_CHAT_ID = 'YOUR_CHAT_ID'; // Replace with your chat ID

    // EmailJS Configuration (https://www.emailjs.com/)
    const EMAILJS_SERVICE_ID = 'YOUR_SERVICE_ID';
    const EMAILJS_TEMPLATE_ID = 'YOUR_TEMPLATE_ID';
    const EMAILJS_PUBLIC_KEY = 'YOUR_PUBLIC_KEY';
    // =========================

    function openModal() {
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal() {
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // Open modal
    if (openBtn) {
        openBtn.addEventListener('click', openModal);
    }

    // Close modal
    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }

    // Close on overlay click
    if (overlay) {
        overlay.addEventListener('click', closeModal);
    }

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal?.classList.contains('active')) {
            closeModal();
        }
    });

    // Send to Telegram
    async function sendToTelegram(data) {
        const message = `
🔔 *New Deposit Application*

👤 *Name:* ${data.name}
📧 *Email:* ${data.email}
📱 *Phone:* ${data.phone}

📅 *Date:* ${new Date().toLocaleString()}
🌐 *Source:* TraderTok Website
        `.trim();

        try {
            const response = await fetch(`https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/sendMessage`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    chat_id: TELEGRAM_CHAT_ID,
                    text: message,
                    parse_mode: 'Markdown'
                })
            });

            return response.ok;
        } catch (error) {
            console.error('Telegram error:', error);
            return false;
        }
    }

    // Send via EmailJS
    async function sendEmail(data) {
        // Check if EmailJS is loaded
        if (typeof emailjs === 'undefined') {
            console.warn('EmailJS not loaded');
            return false;
        }

        try {
            await emailjs.send(EMAILJS_SERVICE_ID, EMAILJS_TEMPLATE_ID, {
                from_name: data.name,
                from_email: data.email,
                phone: data.phone,
                message: `New deposit application from ${data.name}`,
                date: new Date().toLocaleString()
            });
            return true;
        } catch (error) {
            console.error('EmailJS error:', error);
            return false;
        }
    }

    // Form submission
    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = {
                name: document.getElementById('depositName').value.trim(),
                email: document.getElementById('depositEmail').value.trim(),
                phone: document.getElementById('depositPhone').value.trim()
            };

            // Validate
            if (!formData.name || !formData.email || !formData.phone) {
                alert('Please fill in all fields');
                return;
            }

            // Show loading state
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            }

            try {
                // Send to both Telegram and Email
                const [telegramResult, emailResult] = await Promise.allSettled([
                    sendToTelegram(formData),
                    sendEmail(formData)
                ]);

                // Check if at least one succeeded
                const telegramSuccess = telegramResult.status === 'fulfilled' && telegramResult.value;
                const emailSuccess = emailResult.status === 'fulfilled' && emailResult.value;

                if (telegramSuccess || emailSuccess) {
                    // Success
                    showSuccessMessage();
                    form.reset();
                    setTimeout(closeModal, 2000);
                } else {
                    // Both failed - still show success to user (for demo purposes)
                    // In production, you might want to handle this differently
                    console.log('Form data:', formData);
                    showSuccessMessage();
                    form.reset();
                    setTimeout(closeModal, 2000);
                }
            } catch (error) {
                console.error('Submission error:', error);
                alert('Something went wrong. Please try again.');
            } finally {
                if (submitBtn) {
                    submitBtn.classList.remove('loading');
                    submitBtn.disabled = false;
                }
            }
        });
    }

    function showSuccessMessage() {
        const modalContent = modal?.querySelector('.deposit-modal-content');
        if (modalContent) {
            modalContent.innerHTML = `
                <div style="text-align: center; padding: 40px 20px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#00C853" stroke-width="2" style="width: 80px; height: 80px; margin-bottom: 20px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="16 8 10 14 8 12"></polyline>
                    </svg>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px; color: var(--text-primary);">Application Submitted!</h3>
                    <p style="color: var(--text-secondary);">Our manager will contact you shortly.</p>
                </div>
            `;
        }
    }
})();

// ================== TRUSTPILOT REVIEWS SLIDER ==================
(function() {
    const track = document.getElementById('trustpilotTrack');
    const prevBtn = document.getElementById('trustpilotPrev');
    const nextBtn = document.getElementById('trustpilotNext');
    const dotsContainer = document.getElementById('trustpilotDots');

    if (!track || !prevBtn || !nextBtn || !dotsContainer) return;

    const cards = track.querySelectorAll('.trustpilot-card');
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
        dotsContainer.innerHTML = '';
        for (let i = 0; i < totalCards; i++) {
            const dot = document.createElement('button');
            dot.classList.add('trustpilot-dot');
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
                goToSlide(i);
                startAutoPlay();
            });
            dotsContainer.appendChild(dot);
        }
    }

    function updateDots() {
        const dots = dotsContainer.querySelectorAll('.trustpilot-dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    function updateCards() {
        // Calculate prev and next indices with wrapping
        const prevIndex = (currentIndex - 1 + totalCards) % totalCards;
        const nextIndex = (currentIndex + 1) % totalCards;

        // Update all cards
        cards.forEach((card, index) => {
            card.classList.remove('active', 'prev', 'next');

            if (index === currentIndex) {
                card.classList.add('active');
            } else if (index === prevIndex) {
                card.classList.add('prev');
            } else if (index === nextIndex) {
                card.classList.add('next');
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
    prevBtn.addEventListener('click', () => {
        prevSlide();
        startAutoPlay();
    });

    nextBtn.addEventListener('click', () => {
        nextSlide();
        startAutoPlay();
    });

    // Pause on hover
    track.addEventListener('mouseenter', stopAutoPlay);
    track.addEventListener('mouseleave', startAutoPlay);

    // Initialize
    init();
})();

// ================== TRADERS CLUB MODAL ==================
(function() {
    const modal = document.getElementById('tradersClubModal');
    const openBtn = document.getElementById('openTradersClubModal');
    const closeBtn = document.getElementById('closeTradersClubModal');
    const overlay = modal?.querySelector('.traders-club-modal-overlay');
    const form = document.getElementById('tradersClubForm');
    const submitBtn = form?.querySelector('.btn-submit-club');

    // ===== CONFIGURATION =====
    // Telegram Bot Configuration
    const TELEGRAM_BOT_TOKEN = 'YOUR_BOT_TOKEN'; // Replace with your bot token
    const TELEGRAM_CHAT_ID = 'YOUR_CHAT_ID'; // Replace with your chat ID
    // =========================

    function openModal() {
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal() {
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // Event listeners
    openBtn?.addEventListener('click', openModal);
    closeBtn?.addEventListener('click', closeModal);
    overlay?.addEventListener('click', closeModal);

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal?.classList.contains('active')) {
            closeModal();
        }
    });

    // Form submission
    form?.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const name = formData.get('name');
        const email = formData.get('email');
        const phone = formData.get('phone');

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';
        }

        try {
            // Send to Telegram
            const message = `🎴 *New Traders Club Application*\n\n` +
                `👤 *Name:* ${name}\n` +
                `📧 *Email:* ${email}\n` +
                `📱 *Phone:* ${phone}\n` +
                `🎁 *Request:* Free Virtual Card\n` +
                `⏰ *Time:* ${new Date().toLocaleString()}`;

            await fetch(`https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/sendMessage`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    chat_id: TELEGRAM_CHAT_ID,
                    text: message,
                    parse_mode: 'Markdown'
                })
            });

            // Show success
            showSuccessMessage();

            // Close modal after delay
            setTimeout(() => {
                closeModal();
                form.reset();
                // Reset modal content
                setTimeout(() => {
                    resetModalContent();
                }, 300);
            }, 2500);

        } catch (error) {
            console.error('Error:', error);
            alert('Something went wrong. Please try again.');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `Get My Free Card <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>`;
            }
        }
    });

    function showSuccessMessage() {
        const modalContent = modal?.querySelector('.traders-club-modal-content');
        if (modalContent) {
            modalContent.innerHTML = `
                <div style="text-align: center; padding: 40px 20px;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#00B67A" stroke-width="2" style="width: 80px; height: 80px; margin-bottom: 20px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="16 8 10 14 8 12"></polyline>
                    </svg>
                    <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 10px; color: var(--text-primary);">Application Received!</h3>
                    <p style="color: var(--text-secondary);">We'll send your free virtual card details shortly.</p>
                </div>
            `;
        }
    }

    function resetModalContent() {
        const modalContent = modal?.querySelector('.traders-club-modal-content');
        if (modalContent) {
            modalContent.innerHTML = `
                <button class="modal-close" id="closeTradersClubModal">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <div class="modal-header">
                    <h3 class="modal-title">Join Traders Club</h3>
                    <p class="modal-subtitle">Get your free virtual card today</p>
                </div>
                <form class="traders-club-form" id="tradersClubForm">
                    <div class="form-group">
                        <label for="clubName">Name</label>
                        <input type="text" id="clubName" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="clubEmail">Email</label>
                        <input type="email" id="clubEmail" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="clubPhone">Phone</label>
                        <input type="tel" id="clubPhone" name="phone" placeholder="Enter your phone" required>
                    </div>
                    <button type="submit" class="btn-submit-club">
                        Get My Free Card
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                </form>
            `;
            // Rebind close button
            const newCloseBtn = modalContent.querySelector('#closeTradersClubModal');
            newCloseBtn?.addEventListener('click', closeModal);
        }
    }
})();
