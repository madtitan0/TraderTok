// ====== INSTRUMENTS PAGE JAVASCRIPT ======

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

// Toggle theme
function toggleTheme() {
    body.classList.toggle('light-theme');

    // Save to localStorage
    const currentTheme = body.classList.contains('light-theme') ? 'light' : 'dark';
    localStorage.setItem('theme', currentTheme);
}

// Initialize theme on page load
loadTheme();

// Add click event listener
if (themeToggle) {
    themeToggle.addEventListener('click', toggleTheme);
}

document.addEventListener('DOMContentLoaded', function() {
    // Category filtering
    const categoryTabs = document.querySelectorAll('.category-tab');
    const instrumentCards = document.querySelectorAll('.instrument-card');

    // Search functionality
    const searchInput = document.querySelector('.search-box input');

    // Trade buttons
    const tradeButtons = document.querySelectorAll('.instrument-trade-btn');

    // Current active category
    let activeCategory = 'all';

    // Category Tab Switching
    categoryTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const category = this.dataset.category;

            // Update active tab
            categoryTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Update active category
            activeCategory = category;

            // Filter instruments
            filterInstruments();
        });
    });

    // Search Functionality
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            filterInstruments();
        });
    }

    // Filter instruments based on category and search
    function filterInstruments() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';

        instrumentCards.forEach(card => {
            const cardCategory = card.dataset.category;
            const symbol = card.querySelector('.instrument-symbol').textContent.toLowerCase();
            const name = card.querySelector('.instrument-name').textContent.toLowerCase();

            // Check category match
            const categoryMatch = activeCategory === 'all' || cardCategory === activeCategory;

            // Check search match
            const searchMatch = searchTerm === '' ||
                                symbol.includes(searchTerm) ||
                                name.includes(searchTerm);

            // Show or hide card
            if (categoryMatch && searchMatch) {
                card.classList.remove('hidden');
                // Add animation
                card.style.animation = 'fadeInUp 0.5s ease forwards';
            } else {
                card.classList.add('hidden');
            }
        });

        // Show "no results" message if needed
        showNoResultsMessage();
    }

    // Show no results message
    function showNoResultsMessage() {
        const visibleCards = Array.from(instrumentCards).filter(card => !card.classList.contains('hidden'));

        // Remove existing message
        const existingMessage = document.querySelector('.no-results-message');
        if (existingMessage) {
            existingMessage.remove();
        }

        // Add message if no results
        if (visibleCards.length === 0) {
            const grid = document.querySelector('.instruments-grid');
            const message = document.createElement('div');
            message.className = 'no-results-message';
            message.innerHTML = `
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="opacity: 0.3; margin: 0 auto 20px;">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <h3 style="color: #ffffff; margin: 0 0 12px 0; font-size: 1.5rem;">No instruments found</h3>
                    <p style="color: #666666; margin: 0;">Try adjusting your search or category filter</p>
                </div>
            `;
            grid.appendChild(message);
        }
    }

    // Trade button handlers
    tradeButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const card = this.closest('.instrument-card');
            const symbol = card.querySelector('.instrument-symbol').textContent;
            const name = card.querySelector('.instrument-name').textContent;

            // Check if user is logged in (you can implement this check)
            const isLoggedIn = false; // Replace with actual auth check

            if (isLoggedIn) {
                // Redirect to trading platform
                console.log(`Opening trading platform for ${symbol}`);
                // window.location.href = `/trade?symbol=${encodeURIComponent(symbol)}`;
            } else {
                // Open auth sidebar to sign in
                if (typeof openAuthSidebar === 'function') {
                    openAuthSidebar('signin');
                } else {
                    alert('Please sign in to start trading');
                }
            }
        });
    });

    // CTA Button handlers
    const ctaButtons = document.querySelectorAll('.cta-buttons .btn');

    ctaButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (this.classList.contains('btn-primary')) {
                e.preventDefault();
                // Open sign up
                if (typeof openAuthSidebar === 'function') {
                    openAuthSidebar('signup');
                }
            }
            // btn-secondary (Learn More) can keep default behavior or custom
        });
    });

    // Add animation styles dynamically
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .instrument-card {
            animation: fadeInUp 0.5s ease forwards;
        }

        .instrument-card:nth-child(1) { animation-delay: 0s; }
        .instrument-card:nth-child(2) { animation-delay: 0.05s; }
        .instrument-card:nth-child(3) { animation-delay: 0.1s; }
        .instrument-card:nth-child(4) { animation-delay: 0.15s; }
        .instrument-card:nth-child(5) { animation-delay: 0.2s; }
        .instrument-card:nth-child(6) { animation-delay: 0.25s; }
    `;
    document.head.appendChild(style);

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#authSidebar') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Update stats dynamically based on visible instruments
    function updateStats() {
        const visibleInstruments = Array.from(instrumentCards).filter(card => !card.classList.contains('hidden'));
        const statNumber = document.querySelector('.stat-number');

        if (statNumber && activeCategory !== 'all') {
            // Animate number change
            const currentNumber = parseInt(statNumber.textContent);
            const targetNumber = visibleInstruments.length;

            if (currentNumber !== targetNumber) {
                animateNumber(statNumber, currentNumber, targetNumber, 500);
            }
        }
    }

    // Animate number counting
    function animateNumber(element, start, end, duration) {
        const range = end - start;
        const increment = range / (duration / 16); // 60fps
        let current = start;

        const timer = setInterval(() => {
            current += increment;
            if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                current = end;
                clearInterval(timer);
            }
            element.textContent = Math.round(current) + '+';
        }, 16);
    }

    // Intro section gradient animation
    const introSection = document.querySelector('.instruments-intro');
    if (introSection) {
        const introObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const firstParagraph = document.querySelector('.intro-first-paragraph.gradient-text');
                    if (firstParagraph) {
                        // Add small delay for smoother effect
                        setTimeout(() => {
                            firstParagraph.classList.add('animate');
                        }, 300);
                    }
                    introObserver.unobserve(introSection);
                }
            });
        }, { threshold: 0.1 });

        introObserver.observe(introSection);
    }

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe stat items
    document.querySelectorAll('.stat-item').forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'all 0.6s ease';
        observer.observe(item);
    });

    // Category Cards Hover Effect
    const categoryCards = document.querySelectorAll('.category-card');

    categoryCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            // Add active class for additional effects if needed
            this.classList.add('active');
        });

        card.addEventListener('mouseleave', function() {
            this.classList.remove('active');
        });

        // Button click handler
        const btn = card.querySelector('.category-btn');
        if (btn) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const category = card.dataset.category;
                console.log(`Explore ${category} clicked`);

                // Here you can add navigation or filtering logic
                // For example: window.location.href = `#${category}`;
                // Or open a modal/filter instruments by category
            });
        }
    });

    // Smooth entrance animation for category cards
    const observeCategoryCards = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observeCategoryCards.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    categoryCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        observeCategoryCards.observe(card);
    });

    // Initialize
    console.log('Instruments page initialized');
    console.log(`Total instruments: ${instrumentCards.length}`);
    console.log(`Total categories: ${categoryCards.length}`);
});
