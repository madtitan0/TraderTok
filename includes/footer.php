    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <!-- Top Section -->
            <div class="footer-top">
                <!-- Quick Links -->
                <div class="footer-column">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="meet-the-team/index.html" class="footer-link">Meet the Team</a></li>
                        <li><a href="trading-platforms/index.html" class="footer-link">Trading Platforms</a></li>
                        <li><a href="legal/index.html" class="footer-link">Legal</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div class="footer-column">
                    <h3 class="footer-title">Resources</h3>
                    <ul class="footer-links">
                        <li><a href="trading-essentials/index.html" class="footer-link">Education Resources</a></li>
                        <li><a href="events-calendar/index.html" class="footer-link">Markets Overview</a></li>
                        <li><a href="contact-us/index.html" class="footer-link">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="footer-column">
                    <h3 class="footer-title">Contact</h3>
                    <div class="footer-contact">
                        <!-- <a href="tel:+447520640890" class="footer-phone"> '. $get->phone  .'</a> -->
                        <?= isset($get->phone) ? ' <a href="tel:+447520640890" class="footer-phone"> '. $get->phone  .'</a>' : null ?>
                        <p class="footer-contact-text">Available 24/5 for support</p>
                        <div class="footer-payment-icons">
                            <svg class="payment-icon" viewBox="0 0 750 471" xmlns="http://www.w3.org/2000/svg"><path d="M278.2 334.3l30-186.2h48.1l-30.1 186.2h-48zm188.8-181.7c-9.5-3.6-24.5-7.5-43.2-7.5-47.6 0-81.2 24.1-81.5 58.5-.3 25.5 23.9 39.7 42.2 48.2 18.8 8.7 25.1 14.2 25 22-.1 11.9-15 17.3-28.9 17.3-19.3 0-29.6-2.7-45.5-9.4l-6.2-2.8-6.8 40c11.3 5 32.2 9.3 53.9 9.5 50.7 0 83.6-23.8 84-60.5.2-20.2-12.6-35.5-40.4-48.2-16.8-8.2-27.1-13.7-27-22 0-7.4 8.7-15.3 27.5-15.3 15.7-.2 27.1 3.2 36 6.8l4.3 2 6.6-38.6zm124.4-4.5h-37.3c-11.5 0-20.2 3.2-25.3 14.8l-71.6 163.2h50.6s8.3-21.9 10.1-26.7c5.5 0 54.8.1 61.9.1 1.4 6.2 6 26.6 6 26.6h44.7l-39.1-177.9zm-59.4 115c4-10.3 19.4-50 19.4-50-.3.5 4-10.4 6.4-17.1l3.3 15.4s9.3 43.1 11.3 52.1h-40.4v-.4zm-281.8-115l-47.3 127.1-5-24.8c-8.7-28.4-36-59.2-66.5-74.6l43.2 158.2 51-0.1 75.9-185.9-51.3.1z" fill="#1A1F71"/><path d="M146.9 148.1h-77.7l-.6 3.6c60.4 14.7 100.4 50.3 117 93l-16.9-81.5c-2.9-11.2-11.4-14.6-21.8-15.1z" fill="#F9A533"/></svg>
                            <img src="assets/images/Mastercard-logo.svg.png" alt="Mastercard" class="payment-icon">
                        </div>
                    </div>
                </div>

            </div>

            <!-- Divider -->
            <div class="footer-divider"></div>

            <!-- Bottom Section - Legal -->
            <div class="footer-bottom">
                <div class="footer-legal">
                    <p class="footer-copyright">© 2025 Amber Rock Trade Ltd, Level 5, Alexander House, 35 Cybercity, 72201 Ebene, Mauritius, Company No: 222594, License No: GB24203892. The Company is authorized and regulated by the Financial Services Commission of Mauritius ("FSC"). This website is operated by Amber Rock Trade Ltd.</p>

                    <p class="footer-payment-info">Payment processing is handled by our authorized payment agent, B-Tech Ltd, registered at Louki Akrita 1, Akritas Court, 3rd Floor, Flat/Office 301, 3030 Limassol, Cyprus, Company No: HE 414065.</p>

                    <p class="footer-risk-warning"><strong>Risk Warning:</strong> Trading derivative financial products with TraderTok involves a high level of risk and may not be suitable for all investors. You could lose all your invested capital and should only trade with funds you can afford to lose. Before opening any position, ensure you understand the risks, your investment objectives, and your level of experience. Please consult our full Risk Disclosure Statement for more information.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/team-script.js"></script>
    <script src="assets/js/instruments-script.js"></script>
</body>
</html>