    <style>
        /* Live Training Page Styles */
        .training-page {
            padding-top: 100px;
        }

        .training-main {
            padding: 60px 0 80px;
        }

        /* Main Layout - Two Column Grid */
        .training-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 40px;
        }

        .training-left {
            display: flex;
            flex-direction: column;
        }

        .training-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-top: -40px;
        }

        .training-image {
            margin-bottom: 0;
            display: flex;
            justify-content: flex-end;
        }

        .training-image img {
            width: 130%;
            height: auto;
            object-fit: contain;
            display: block;
            transform: translateX(5%);
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            color: var(--text-primary);
        }

        .gradient-text {
            background: var(--brand-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-description {
            font-size: 0.95rem;
            line-height: 1.7;
            color: var(--text-secondary);
            margin-bottom: 16px;
        }

        /* Stats Bar - under text */
        .stats-bar {
            display: flex;
            gap: 32px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid var(--border-color);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            background: var(--brand-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-top: 4px;
        }

        /* Upcoming Sessions Section */
        .upcoming-section {
            margin-top: 165px;
        }

        .upcoming-section .section-title {
            margin-bottom: 8px;
        }

        .upcoming-section .section-description {
            margin-bottom: 24px;
        }

        /* Right column webinar card directly touches image */
        .training-right .webinar-card {
            width: 100%;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .section-description {
            color: var(--text-secondary);
            font-size: 0.85rem;
            line-height: 1.6;
        }

        /* Webinar Card */
        .webinar-card {
            background: var(--bg-secondary);
            border-radius: 14px;
            padding: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .webinar-card:hover {
            border-color: rgba(230, 57, 70, 0.3);
            background: var(--bg-tertiary);
        }

        .webinar-date {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .webinar-day {
            width: 50px;
            height: 50px;
            background: var(--bg-tertiary);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
        }

        .webinar-day-num {
            font-size: 1.25rem;
            font-weight: 800;
            line-height: 1;
        }

        .webinar-day-name {
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-secondary);
        }

        .countdown-text {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-bottom: 12px;
        }

        .countdown-text strong {
            color: var(--text-primary);
            font-weight: 600;
        }

        .webinar-datetime {
            flex: 1;
        }

        .webinar-month {
            font-size: 0.75rem;
            color: var(--text-secondary);
            margin-bottom: 2px;
        }

        .webinar-time {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .webinar-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .webinar-description {
            font-size: 0.8rem;
            line-height: 1.6;
            color: var(--text-secondary);
            margin-bottom: 16px;
        }

        .btn-register {
            display: inline-block;
            padding: 10px 20px;
            background: var(--brand-gradient);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            box-shadow: 0 6px 16px rgba(230, 57, 70, 0.3);
        }

        /* Responsive */
        @media (max-width: 900px) {
            .training-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .training-left {
                order: 1;
            }

            .training-right {
                order: 2;
                align-items: center;
                margin-top: 0;
            }

            .upcoming-section {
                margin-top: 40px;
            }

            .training-image {
                justify-content: center;
            }

            .training-image img {
                max-height: 350px;
                width: 100%;
                transform: none;
                margin: 0 auto;
            }
        }

        @media (max-width: 650px) {
            .stats-bar {
                gap: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .webinar-card {
                padding: 18px;
            }
        }
    </style>

    <!-- Main Content -->
    <main class="training-page">
        <section class="training-main">
            <div class="container">
                <div class="training-layout">
                    <!-- Left Column - Text, Stats & First Event -->
                    <div class="training-left">
                        <h1 class="hero-title">Learn Trading <span class="gradient-text">Live</span></h1>
                        <p class="hero-description">
                            Join our expert-led live trading sessions and webinars. Get real-time market analysis, learn proven strategies, and interact directly with professional traders.
                        </p>

                        <div class="stats-bar">
                            <div class="stat-item">
                                <div class="stat-number"><span class="counter" data-target="50">0</span>+</div>
                                <div class="stat-label">Sessions/Month</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number"><span class="counter" data-target="15">0</span>K+</div>
                                <div class="stat-label">Active Learners</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number"><span class="counter" data-target="8">0</span></div>
                                <div class="stat-label">Expert Trainers</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number"><span class="counter" data-target="500">0</span>+</div>
                                <div class="stat-label">Hours of Training</div>
                            </div>
                        </div>

                        <!-- Upcoming Sessions Header & First Event -->
                        <div class="upcoming-section">
                            <h2 class="section-title">Upcoming Sessions</h2>
                            <p class="section-description">Reserve your spot in our next live trading sessions. Limited seats available.</p>

                            <div class="webinar-card">
                                <p class="countdown-text"><strong id="countdown-days">83</strong> days left until the event</p>
                                <div class="webinar-date">
                                    <div class="webinar-day">
                                        <span class="webinar-day-num">18</span>
                                        <span class="webinar-day-name">Feb</span>
                                    </div>
                                    <div class="webinar-datetime">
                                        <div class="webinar-month">Wednesday, 18th of February 2026</div>
                                        <div class="webinar-time">13:00 GMT+1</div>
                                    </div>
                                </div>
                                <h3 class="webinar-title">Gold - Reaching New Heights in 2026</h3>
                                <p class="webinar-description">There is no better way to teach our clients on ins and outs of the markets and investing, than through the use of live training. Join our exclusive webinars to learn more on a weekly basis.</p>
                                <button class="btn-register">Register Now</button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Image & Second Event -->
                    <div class="training-right">
                        <div class="training-image">
                            <img src="assets/images/lovely-lady-with-curly-hair-email-with-her-friend-using-silver-laptop-being-isolated-grey-wall.png" alt="Live Training">
                        </div>

                        <div class="webinar-card">
                            <p class="countdown-text"><strong id="countdown-days-2">111</strong> days left until the event</p>
                            <div class="webinar-date">
                                <div class="webinar-day">
                                    <span class="webinar-day-num">18</span>
                                    <span class="webinar-day-name">Mar</span>
                                </div>
                                <div class="webinar-datetime">
                                    <div class="webinar-month">Wednesday, 18th of March 2026</div>
                                    <div class="webinar-time">14:00 GMT+1</div>
                                </div>
                            </div>
                            <h3 class="webinar-title">Forex Fundamentals - Mastering Currency Trading</h3>
                            <p class="webinar-description">Discover the essential strategies for successful forex trading. Our expert analysts will guide you through market analysis, risk management, and profitable trading techniques.</p>
                            <button class="btn-register">Register Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter Animation
            const counters = document.querySelectorAll('.counter');

            const animateCounter = (counter) => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000;
                const startTime = performance.now();

                const updateCount = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const easeOut = 1 - Math.pow(1 - progress, 3);
                    const current = Math.floor(easeOut * target);

                    counter.textContent = current;

                    if (progress < 1) {
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.textContent = target;
                    }
                };

                requestAnimationFrame(updateCount);
            };

            // Intersection Observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => observer.observe(counter));

            // Countdown calculation - February event
            const eventDate1 = new Date('2026-02-18T13:00:00+01:00');
            const today = new Date();
            const diffTime1 = eventDate1 - today;
            const diffDays1 = Math.ceil(diffTime1 / (1000 * 60 * 60 * 24));
            const countdownEl1 = document.getElementById('countdown-days');
            if (countdownEl1 && diffDays1 > 0) {
                countdownEl1.textContent = diffDays1;
            } else if (countdownEl1 && diffDays1 <= 0) {
                countdownEl1.parentElement.textContent = 'Event has started';
            }

            // Countdown calculation - March event
            const eventDate2 = new Date('2026-03-18T14:00:00+01:00');
            const diffTime2 = eventDate2 - today;
            const diffDays2 = Math.ceil(diffTime2 / (1000 * 60 * 60 * 24));
            const countdownEl2 = document.getElementById('countdown-days-2');
            if (countdownEl2 && diffDays2 > 0) {
                countdownEl2.textContent = diffDays2;
            } else if (countdownEl2 && diffDays2 <= 0) {
                countdownEl2.parentElement.textContent = 'Event has started';
            }
        });
    </script>