// ====== MEET THE TEAM PAGE JAVASCRIPT ======
// Simplified version using CSS sticky stacking (like Insights section)

(function() {
    'use strict';

    function init() {
        bindTeamTabEvents();
        bindDepartmentTabEvents();
    }

    function switchTeam(wrapper, team) {
        // Update tabs within this wrapper
        wrapper.querySelectorAll('.team-tab').forEach(t => {
            t.classList.toggle('active', t.dataset.team === team);
        });

        // Update stacks within this wrapper
        wrapper.querySelectorAll('.team-stack').forEach(stack => {
            stack.classList.toggle('active', stack.dataset.team === team);
        });

        // Force recalculate sticky positioning on mobile
        const activeStack = wrapper.querySelector('.team-stack.active');
        if (activeStack) {
            const cards = activeStack.querySelectorAll('.team-card');
            cards.forEach(card => {
                // Temporarily remove and re-add sticky to force recalc
                const originalPosition = card.style.position;
                card.style.position = 'relative';
                void card.offsetHeight; // Force reflow
                card.style.position = originalPosition || '';
            });
        }
    }

    function bindTeamTabEvents() {
        // Use event delegation on document for team tabs
        document.addEventListener('click', function(e) {
            const tab = e.target.closest('.team-tab');
            if (!tab) return;

            // Find the wrapper that contains this tab
            const wrapper = tab.closest('.team-stack-wrapper');
            if (!wrapper) return;

            const team = tab.dataset.team;
            if (!team) return;

            // Check if already active
            if (tab.classList.contains('active')) return;

            switchTeam(wrapper, team);
        });
    }

    function bindDepartmentTabEvents() {
        // Use event delegation for department tabs
        document.addEventListener('click', function(e) {
            const tab = e.target.closest('.department-tab');
            if (!tab) return;

            const department = tab.dataset.department;
            if (!department) return;

            // Check if already active
            if (tab.classList.contains('active')) return;

            // Update department tabs
            document.querySelectorAll('.department-tab').forEach(t => {
                t.classList.toggle('active', t.dataset.department === department);
            });

            // Update department contents
            document.querySelectorAll('.department-content').forEach(content => {
                content.classList.toggle('active', content.dataset.department === department);
            });

            // Scroll to team section
            const teamSection = document.querySelector('.team-section');
            if (teamSection) {
                teamSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
