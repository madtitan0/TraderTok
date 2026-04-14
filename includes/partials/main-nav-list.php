<?php
/**
 * Main header navigation — five top-level categories with mega-style dropdowns.
 */
?>
<ul class="nav-list">

  <!-- 1. Company -->
  <li class="nav-item dropdown mega-dropdown">
    <a href="#" class="nav-link" aria-haspopup="true" aria-expanded="false">
      <span data-i18n="nav.company">Company</span> <span class="arrow" aria-hidden="true">▼</span>
    </a>
    <div class="dropdown-menu mega-menu-dropdown" role="menu">
      <div class="dropdown-cards mega-menu-cards mega-menu-cards--3col">
        <a href="./about" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <path d="M12 16v-4M12 8h.01"></path>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="nav.aboutUs">About Us</h3>
            <p data-i18n="dropdown.aboutUsDesc">Our story &amp; mission</p>
          </div>
        </a>
        <a href="./meet-the-team" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="nav.meetTheTeam">Meet the Team</h3>
            <p data-i18n="dropdown.meetTeamDesc">People behind TraderTok</p>
          </div>
        </a>
        <a href="./contact-us" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="nav.contactUs">Contact Us</h3>
            <p data-i18n="dropdown.contactUsDesc">Support &amp; enquiries</p>
          </div>
        </a>
      </div>
    </div>
  </li>


  <!-- 2. Trading -->
  <li class="nav-item dropdown mega-dropdown">
    <a href="#" class="nav-link" aria-haspopup="true" aria-expanded="false">
      <span data-i18n="nav.trading">Trading</span> <span class="arrow" aria-hidden="true">▼</span>
    </a>
    <div class="dropdown-menu mega-menu-dropdown" role="menu">
      <div class="dropdown-cards mega-menu-cards mega-menu-cards--2col">
        <a href="./trading-platform" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
              <line x1="8" y1="21" x2="16" y2="21"></line>
              <line x1="12" y1="17" x2="12" y2="21"></line>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="dropdown.tradingPlatform">Trading Platform</h3>
            <p data-i18n="dropdown.tradingPlatformDesc">Explore our platforms</p>
          </div>
        </a>
        <a href="./trading-central" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="dropdown.tradingCentral">Trading Central</h3>
            <p data-i18n="dropdown.tradingCentralDesc">Advanced analytics &amp; insights</p>
          </div>
        </a>
        <a href="./top-instruments" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="12" y1="20" x2="12" y2="10"></line>
              <line x1="18" y1="20" x2="18" y2="4"></line>
              <line x1="6" y1="20" x2="6" y2="16"></line>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="dropdown.topInstruments">Top Instruments</h3>
            <p data-i18n="dropdown.topInstrumentsDesc">Popular instruments &amp; market context</p>
          </div>
        </a>
        <a href="./account-types" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="nav.accountTypes">Account Types</h3>
            <p data-i18n="dropdown.accountTypesDesc">Compare accounts &amp; features</p>
          </div>
        </a>
      </div>
    </div>
  </li>

  <!-- 3. Learn -->
  <li class="nav-item dropdown mega-dropdown">
    <a href="#" class="nav-link" aria-haspopup="true" aria-expanded="false">
      <span data-i18n="nav.learn">Learn</span> <span class="arrow" aria-hidden="true">▼</span>
    </a>
    <div class="dropdown-menu mega-menu-dropdown" role="menu">
      <div class="dropdown-cards mega-menu-cards mega-menu-cards--2col">
        <a href="./education-hub" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
              <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="nav.educationHub">Education Hub</h3>
            <p data-i18n="dropdown.educationHubDesc">Guides, tools &amp; learning paths</p>
          </div>
        </a>
        <a href="./live-training" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <circle cx="12" cy="12" r="3"></circle>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="dropdown.liveTraining">Live Training</h3>
            <p data-i18n="dropdown.liveTrainingDesc">Join live sessions with experts</p>
          </div>
        </a>
        <a href="./research" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="12" y1="20" x2="12" y2="10"></line>
              <line x1="18" y1="20" x2="18" y2="4"></line>
              <line x1="6" y1="20" x2="6" y2="16"></line>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="dropdown.research">Market Research</h3>
            <p data-i18n="dropdown.researchDesc">In-depth market analysis and insights</p>
          </div>
        </a>
        <a href="./events-calendar" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
              <line x1="16" y1="2" x2="16" y2="6"></line>
              <line x1="8" y1="2" x2="8" y2="6"></line>
              <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="dropdown.eventsCalendar">Events Calendar</h3>
            <p data-i18n="dropdown.eventsCalendarDesc">Track important market events</p>
          </div>
        </a>
      </div>
    </div>
  </li>


  <!-- 4. Partners & Offers -->
  <li class="nav-item dropdown mega-dropdown">
    <a href="./offers-promotions" class="nav-link" aria-haspopup="true" aria-expanded="false">
      <span data-i18n="nav.partnersOffers">Partners &amp; Offers</span> <span class="arrow" aria-hidden="true">▼</span>
    </a>
    <div class="dropdown-menu mega-menu-dropdown mega-menu-dropdown--partners" role="menu">
      <div class="mega-menu-partners-top">
        <a href="./ib-program" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="footer.ibProgram">IB Program</h3>
            <p data-i18n="dropdown.ibProgramDesc">Partner &amp; referral programme</p>
          </div>
        </a>
        <a href="./tradertok-club" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="footer.TraderTokClub">TraderTok Club</h3>
            <p data-i18n="dropdown.traderTokClubDesc">Exclusive benefits &amp; rewards</p>
          </div>
        </a>
      </div>
      <div class="mega-menu-offers-block">
        <p class="mega-menu-section-label" data-i18n="nav.promotionsOffers">Promotions / Offers</p>
        <div class="offers-dropdown offers-dropdown--embedded" role="group"></div>
      </div>
    </div>
  </li>

  <!-- 5. Legal -->
  <li class="nav-item dropdown mega-dropdown">
    <a href="#" class="nav-link" aria-haspopup="true" aria-expanded="false">
      <span data-i18n="nav.legal">Legal</span> <span class="arrow" aria-hidden="true">▼</span>
    </a>
    <div class="dropdown-menu mega-menu-dropdown" role="menu">
      <div class="dropdown-cards mega-menu-cards mega-menu-cards--3col">
        <a href="./regulations" class="menu-card">
          <span class="menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
              <path fill="currentColor" d="M28 22v-3c0-2.2-1.8-4-4-4s-4 1.8-4 4v3c-1.1 0-2 .9-2 2v5c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2v-5c0-1.1-.9-2-2-2m-6-3c0-1.1.9-2 2-2s2 .9 2 2v3h-4zm-2 10v-5h8v5zM8 16h6v2H8zm0-6h12v2H8z"></path>
              <path fill="currentColor" d="M26 4c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v13c0 4.1 2.2 7.8 5.8 9.7l5.2 2.8v-2.3l-4.2-2.3C5.8 23.4 4 20.3 4 17V4h20v8h2z"></path>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="dropdown.regulations">Regulations</h3>
            <p data-i18n="dropdown.regulationsDesc">Explore our regulations</p>
          </div>
        </a>
        <a href="./legal-documents" class="menu-card">
          <span class="menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
              <g fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M3 10c0-3.771 0-5.657 1.172-6.828S7.229 2 11 2h2c3.771 0 5.657 0 6.828 1.172S21 6.229 21 10v4c0 3.771 0 5.657-1.172 6.828S16.771 22 13 22h-2c-3.771 0-5.657 0-6.828-1.172S3 17.771 3 14z"></path>
                <path stroke-linecap="round" d="M8 10h8m-8 4h5"></path>
              </g>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="dropdown.legalDocuments">Legal Documents</h3>
            <p data-i18n="dropdown.legalDocumentsDesc">Explore our legal documents</p>
          </div>
        </a>
        <a href="./risk-disclosure" class="menu-card">
          <span class="menu-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
              <line x1="12" y1="9" x2="12" y2="13"></line>
              <line x1="12" y1="17" x2="12.01" y2="17"></line>
            </svg>
          </span>
          <div class="menu-text">
            <h3 data-i18n="dropdown.riskDisclosure">Risk Disclosure</h3>
            <p data-i18n="dropdown.riskDisclosureDesc">Important risk information</p>
          </div>
        </a>
      </div>
    </div>
  </li>
</ul>
