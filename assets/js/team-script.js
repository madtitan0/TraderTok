// ====== MEET THE TEAM PAGE JAVASCRIPT ======

document.addEventListener('DOMContentLoaded', function() {
    const teamTabs = document.querySelectorAll('.team-tab');
    const teamStacks = document.querySelectorAll('.team-stack');
    let currentTeam = 'english';

    function init() {
        bindEvents();
        bindKeyboardEvents();

        // Set initial z-index for all cards (last card on top)
        document.querySelectorAll('.team-stack').forEach(stack => {
            const cards = stack.querySelectorAll('.team-card');
            cards.forEach((card, index) => {
                card.style.zIndex = index + 1; // Last card has highest z-index
            });
        });

        window.addEventListener('scroll', onScroll);
        window.addEventListener('resize', onScroll);
        onScroll();

        console.log('Team page initialized');
    }

    function onScroll() {
        const activeStack = document.querySelector('.team-stack.active');
        if (!activeStack) return;

        const cards = activeStack.querySelectorAll('.team-card');
        const wrapper = document.querySelector('.team-stack-wrapper');
        if (!wrapper || cards.length === 0) return;

        // Get wrapper position
        const rect = wrapper.getBoundingClientRect();
        const wrapperTop = rect.top;
        const wrapperHeight = rect.height;
        const windowHeight = window.innerHeight;

        // Calculate progress: start animation when wrapper reaches 40% from top of screen
        const triggerPoint = windowHeight * 0.4;
        const totalScroll = wrapperHeight - windowHeight;
        const scrolled = Math.max(0, triggerPoint - wrapperTop);
        const progress = Math.min(1, scrolled / totalScroll);

        const totalCards = cards.length;

        // Equal duration for each card transition
        const cardDuration = 1 / totalCards;

        cards.forEach((card, index) => {
            // First card is always visible in position
            if (index === 0) {
                card.style.transform = `translateX(0)`;
                card.style.opacity = '1';
                return;
            }

            // Calculate when this card should start and end animating
            const cardStart = (index - 1) * cardDuration + cardDuration * 0.5; // Start after previous card is halfway
            const cardAnimDuration = cardDuration;

            let cardProgress = 0;
            if (progress >= cardStart) {
                cardProgress = Math.min(1, (progress - cardStart) / cardAnimDuration);
            }

            // Hide cards that haven't started animating
            if (cardProgress === 0) {
                card.style.opacity = '0';
                card.style.transform = `translateX(100vw)`;
                return;
            }

            card.style.opacity = '1';

            // Easing
            cardProgress = easeOutQuart(cardProgress);

            // Each card stacks slightly offset to the left
            // No offset on mobile
            const isMobile = window.innerWidth <= 768;
            const offsetPerCard = isMobile ? 0 : 30;
            const endX = -(index * offsetPerCard);
            const startX = window.innerWidth;

            const currentX = startX - (startX - endX) * cardProgress;

            card.style.transform = `translateX(${currentX}px)`;
        });

        // Update indicators
        updateIndicators(progress, totalCards);
    }

    function updateIndicators(progress, totalCards) {
        const indicators = document.querySelectorAll('.team-stack.active .team-indicator');
        if (indicators.length === 0) return;

        const cardDuration = 1 / totalCards;

        // Determine which card is currently visible (on top)
        let activeIndex = 0;

        for (let i = 1; i < totalCards; i++) {
            const cardStart = (i - 1) * cardDuration + cardDuration * 0.5;
            if (progress >= cardStart + cardDuration * 0.5) {
                activeIndex = i;
            }
        }

        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === activeIndex);
        });
    }

    function easeOutQuart(t) {
        return 1 - Math.pow(1 - t, 4);
    }

    function switchTeam(team) {
        if (team === currentTeam) return;

        teamTabs.forEach(tab => {
            tab.classList.toggle('active', tab.dataset.team === team);
        });

        teamStacks.forEach(stack => {
            if (stack.dataset.team === team) {
                stack.classList.add('active');
            } else {
                stack.classList.remove('active');
            }
        });

        currentTeam = team;

        // Set z-index for new team's cards (last card on top)
        const newStack = document.querySelector('.team-stack.active');
        if (newStack) {
            const cards = newStack.querySelectorAll('.team-card');
            cards.forEach((card, index) => {
                card.style.zIndex = index + 1;
            });
        }

        onScroll();
    }

    function bindEvents() {
        teamTabs.forEach(tab => {
            tab.addEventListener('click', () => switchTeam(tab.dataset.team));
        });

        // Indicator click handlers
        document.querySelectorAll('.team-indicator').forEach(indicator => {
            indicator.addEventListener('click', () => {
                const index = parseInt(indicator.dataset.index);
                scrollToCard(index);
            });
        });
    }

    function scrollToCard(index) {
        const wrapper = document.querySelector('.team-stack-wrapper');
        const activeStack = document.querySelector('.team-stack.active');
        if (!wrapper || !activeStack) return;

        const cards = activeStack.querySelectorAll('.team-card');
        const totalCards = cards.length;

        const rect = wrapper.getBoundingClientRect();
        const wrapperTop = window.scrollY + rect.top;
        const wrapperHeight = rect.height;
        const windowHeight = window.innerHeight;
        const totalScroll = wrapperHeight - windowHeight;

        const triggerPoint = windowHeight * 0.4;
        const cardDuration = 1 / totalCards;

        // Calculate target progress for this card
        let targetProgress;
        if (index === 0) {
            targetProgress = 0;
        } else {
            // Scroll to where this card is fully visible
            targetProgress = (index - 1) * cardDuration + cardDuration;
        }

        // Convert progress to scroll position
        const targetScroll = wrapperTop - triggerPoint + (targetProgress * totalScroll);

        window.scrollTo({
            top: targetScroll,
            behavior: 'smooth'
        });
    }

    function bindKeyboardEvents() {
        teamTabs.forEach((tab, index) => {
            tab.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    const nextIndex = (index + 1) % teamTabs.length;
                    teamTabs[nextIndex].focus();
                    teamTabs[nextIndex].click();
                } else if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    const prevIndex = (index - 1 + teamTabs.length) % teamTabs.length;
                    teamTabs[prevIndex].focus();
                    teamTabs[prevIndex].click();
                }
            });
        });
    }

    init();
});
