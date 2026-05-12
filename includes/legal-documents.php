    <style>
/* Legal Page Styles */
.legal-page {
  padding-top: 100px;
  background: var(--bg-primary);
}

.legal-hero {
  padding: 60px 0 80px;
}

.legal-hero-inner {
  max-width: 1200px;
  margin: 0 auto;
}

.hero-content {
  max-width: 820px;
  margin: 0 auto 36px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  gap: 16px;
}

.hero-title {
  font-size: clamp(2rem, 4vw, 3.1rem);
  font-weight: 800;
  line-height: 1.1;
  margin: 0;
  color: var(--brand-color-start);
}

.gradient-text {
  background: var(--brand-gradient);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.hero-description,
.hero-note {
  max-width: 760px;
}

.hero-description {
  font-size: 0.95rem;
  line-height: 1.8;
  color: rgba(255, 255, 255, 0.95);
  margin: 0;
}

body.light-theme .legal-page .hero-description {
  color: var(--text-secondary);
}

.hero-note {
  font-size: 0.85rem;
  line-height: 1.7;
  color: rgba(255, 255, 255, 0.9);
  font-style: italic;
  margin: 0;
}

body.light-theme .legal-page .hero-note {
  color: var(--text-tertiary);
}

.documents-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
  align-items: start;
  width: 100%;
  max-width: 100%;
  margin: 0 auto;
}

.document-card {
  display: flex;
  flex-direction: column;
  padding: 24px 26px;
  background: var(--bg-secondary);
  border: 1px solid var(--border-color);
  border-radius: 18px;
  transition: all 0.3s ease;
  box-shadow: 0 10px 28px rgba(0, 0, 0, 0.06);
}

.document-card:hover {
  border-color: rgba(230, 57, 70, 0.3);
  background: var(--bg-tertiary);
}

.document-header {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  width: 100%;
  min-width: 0;
}

.document-main {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  min-width: 0;
  flex: 1;
}

.document-icon {
  width: 44px;
  height: 54px;
  background: var(--bg-tertiary);
  border-radius: 6px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  position: relative;
  border: 1px solid var(--border-color);
  overflow: hidden;
}

.document-icon::before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 0 10px 10px 0;
  border-color: transparent var(--bg-secondary) transparent transparent;
}

.document-icon::after {
  content: 'PDF';
  position: absolute;
  bottom: 6px;
  font-size: 0.5rem;
  font-weight: 800;
  color: #dc2626;
  letter-spacing: 0.5px;
  background: rgba(220, 38, 38, 0.1);
  padding: 2px 5px;
  border-radius: 3px;
}

.document-icon svg {
  width: 18px;
  height: 18px;
  stroke: var(--text-secondary);
  margin-bottom: 10px;
  stroke-width: 1.5;
}

.document-content {
  flex: 1;
  min-width: 0;
}

.document-title {
  font-size: 1rem;
  font-weight: 700;
  color: var(--text-primary);
  line-height: 1.35;
  margin: 0;
  overflow-wrap: anywhere;
}

.document-actions {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
  margin-left: auto;
}

.document-toggle,
.document-download {
  width: 38px;
  height: 38px;
  border-radius: var(--btn-pill-radius, 9999px);
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: var(--bg-tertiary);
  border: 1px solid var(--border-color);
  color: var(--text-secondary);
  transition: all 0.3s ease;
}

.document-toggle {
  cursor: pointer;
  font-size: 1.15rem;
  font-weight: 300;
  line-height: 1;
  padding: 0;
}

.document-toggle:hover,
.document-download:hover {
  background: var(--hover-bg);
  border-color: rgba(230, 57, 70, 0.28);
  color: var(--text-primary);
}

.document-card.active .document-toggle {
  transform: rotate(45deg);
  color: var(--brand-color-start);
}

.document-download svg {
  width: 16px;
  height: 16px;
  stroke: currentColor;
  transition: all 0.3s ease;
}

.document-description {
  max-height: 0;
  overflow: hidden;
  opacity: 0;
  padding: 0;
  transition: max-height 0.35s ease, opacity 0.3s ease, padding 0.3s ease;
}

.document-card.active .document-description {
  max-height: 10000px;
  opacity: 1;
  padding: 18px 0 0;
  display: block;
}

/* Preview / fallback copy only (not inside structured panel) */
.document-description > p {
  font-size: clamp(0.8rem, 2vw, 1rem);
  line-height: 1.75;
  color: rgba(255, 255, 255, 0.95);
  text-align: justify;
  text-justify: inter-word;
  hyphens: auto;
  margin: 0 0 12px;
}

body.light-theme .document-description > p {
  color: var(--text-secondary);
}

.document-description > p:last-child {
  margin-bottom: 0;
}

/*
 * Accordion panel: same typography as .page-hero-content.legal-document-content in styles.css
 * (brand main title, white section heads, white body). Scoped here for padding / edge cases only.
 */
.document-description .legal-documents-panel.page-hero-content.legal-document-content {
  width: 100%;
  max-width: none;
  margin: 0;
  text-align: left;
  align-items: flex-start;
  padding: clamp(20px, 3vw, 40px);
}

.document-description .legal-documents-panel > h1.doc-sub:first-child {
  margin-top: 0;
}

.document-description .legal-documents-panel h1.doc-sub span,
.document-description .legal-documents-panel h1.doc-page-hero-title span {
  /* color: inherit; */
  /* background: none; */
  /* -webkit-text-fill-color: currentColor; */
}

.document-description .legal-documents-panel .doc-page-hero-subtitle b,
.document-description .legal-documents-panel .doc-page-hero-subtitle strong {
  color: var(--text-primary);
  font-weight: 600;
}

body:not(.light-theme) .document-description .legal-documents-panel .doc-page-hero-subtitle b,
body:not(.light-theme) .document-description .legal-documents-panel .doc-page-hero-subtitle strong {
  color: #ffffff;
}

.document-description .legal-documents-panel p:not([class]) {
  font-size: clamp(0.8rem, 2vw, 1rem);
  line-height: 1.75;
  color: #ffffff;
  margin: 0 0 1rem;
  text-align: justify;
  text-justify: inter-word;
  hyphens: auto;
}

body.light-theme .document-description .legal-documents-panel p:not([class]) {
  color: var(--text-secondary);
}

.video-section {
  padding: 0 0 60px;
}

.video-wrapper {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  height: 300px;
}

.video-wrapper::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.4);
  pointer-events: none;
}

.legal-video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  filter: brightness(0.8);
}

.notice-section {
  padding: 0 0 80px;
}

.notice-title {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.9rem;
  font-weight: 700;
  margin-bottom: 8px;
}

.notice-title .gradient-text {
  background: var(--brand-gradient);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.notice-title svg {
  width: 16px;
  height: 16px;
  stroke: var(--brand-color-start);
  flex-shrink: 0;
}

.notice-text {
  font-size: 0.9rem;
  line-height: 1.8;
  color: rgba(255, 255, 255, 0.95);
  text-align: center;
  max-width: 920px;
  margin: 0 auto;
}

body.light-theme .notice-text {
  color: var(--text-secondary);
}

.notice-text a {
  color: var(--brand-color-start);
  text-decoration: none;
  font-weight: 500;
}

.notice-text a:hover {
  text-decoration: underline;
}

@media (max-width: 900px) {
  .documents-grid {
    grid-template-columns: 1fr;
    max-width: 100%;
  }

  .hero-content {
    max-width: 100%;
  }
}

@media (max-width: 640px) {
  .legal-hero {
    padding: 40px 0 60px;
  }

  .document-card {
    padding: 18px 16px;
    border-radius: 16px;
  }

  .document-header {
    gap: 12px;
  }

  .document-main {
    gap: 12px;
  }

  .document-title {
    font-size: 0.95rem;
  }

  .document-actions {
    gap: 8px;
  }

  .document-toggle,
  .document-download {
    width: 34px;
    height: 34px;
    border-radius: var(--btn-pill-radius, 9999px);
  }

  .document-description,
  .document-card.active .document-description {
    padding-left: 0;
  }
}
    </style>

    <!-- Main Content -->
    <?php
    function extract_legal_document_content($file_path) {
      if (!is_file($file_path)) {
        return '';
      }

      ob_start();
      include $file_path;
      $html = ob_get_clean();

      if (!is_string($html) || trim($html) === '') {
        return '';
      }

      // Check if DOMDocument exists to avoid fatal error on servers without the extension
      if (!class_exists('DOMDocument')) {
        return extract_legal_document_content_fallback($html);
      }

      $previous = libxml_use_internal_errors(true);
      $dom = new DOMDocument();

      // Check for libxml constants
      $options = 0;
      if (defined('LIBXML_HTML_NOIMPLIED')) $options |= LIBXML_HTML_NOIMPLIED;
      if (defined('LIBXML_HTML_NODEFDTD')) $options |= LIBXML_HTML_NODEFDTD;

      // Handle UTF-8 safely without XML declaration that triggers some linters
      $loaded = $dom->loadHTML('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . $html, $options);

    if (!$loaded) {
    libxml_clear_errors();
    libxml_use_internal_errors($previous);
    return extract_legal_document_content_fallback($html);
    }

    $xpath = new DOMXPath($dom);
    $nodes = $xpath->query(
    "//div[contains(concat(' ', normalize-space(@class), ' '), ' legal-document-content ')]"
    . " | //div[contains(concat(' ', normalize-space(@class), ' '), ' page-hero-content ')]"
    );

    if (!$nodes || $nodes->length === 0) {
    libxml_clear_errors();
    libxml_use_internal_errors($previous);
    return extract_legal_document_content_fallback($html);
    }

    $content = '';
    foreach ($nodes->item(0)->childNodes as $child) {
    $content .= $dom->saveHTML($child);
    }

    libxml_clear_errors();
    libxml_use_internal_errors($previous);

    return $content;
    }

    /**
    * Fallback extraction method using regex if DOMDocument is unavailable.
    */
    function extract_legal_document_content_fallback($html) {
      // Use regex to capture content inside the primary div
      if (preg_match('/<div[^>]*class=["\'][^"\']*(?:legal-document-content|page-hero-content)[^"\']*["\'][^>]*>(.*?)<\/div>\s*<\/div>\s*<\/section>/is', $html, $matches)) {
        return $matches[1];
      }

      // Simpler version if the structural tail differs slightly
      if (preg_match('/<div[^>]*class=["\'][^"\']*(?:legal-document-content|page-hero-content)[^"\']*["\'][^>]*>(.*)/is', $html, $matches)) {
        $content = $matches[1];
        $content = preg_replace('/<\/div>\s*<\/div>\s*<\/section>\s*$/is', '', $content);
        return $content;
      }

      // Return a stripped version of the HTML if regex fails, but NEVER the whole document
      return preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", strip_tags($html, '<p><div><h1><h2><h3><h4><h5><h6><ul><li><span><b><i><strong><em><br>'));
    }

                        $legal_documents = [
                        [
                        'title' => 'Privacy Policy',
                        'description' => 'The policy explains how personal information is collected, used, stored,
                        shared, and protected across the platform.',
                        'file' => './files/Privacy_Policy_Amber_Rock_Trade_Ltd.pdf',
                        'content_html' => extract_legal_document_content(__DIR__ . '/privacy-policy.php'),
                        'preview' => [],
                        ],
                        [
                        'title' => 'Terms & Conditions',
                        'description' => 'The agreement sets the legal framework for account use, client
                        responsibilities, service delivery, and platform access.',
                        'file' => './files/Service_Agreement_Terms_&_Conditions_Amber_Rock_Trade_Ltd.pdf',
                        'content_html' => extract_legal_document_content(__DIR__ . '/terms-conditions.php'),
                        'preview' => [],
                        ],
                        [
                        'title' => 'Anti-Money Laundering Policy',
                        'description' => 'The policy outlines the checks and controls used to help prevent money
                        laundering, terrorist financing, and misuse of the platform.',
                        'file' => './files/AML_AND_KYC_POLICY_Amber_Rock_Trade_Ltd.pdf',
                        'content_html' => extract_legal_document_content(__DIR__ . '/anti-money-laundering-policy.php'),
                        'preview' => [],
                        ],
                        [
                        'title' => 'Order Execution Policy',
                        'description' => 'The policy explains how orders are handled and how the Company seeks the best
                        possible execution outcome for clients.',
                        'file' => './files/Order_Executio_ Policy_Amber_Rock_Trade_Ltd.pdf',
                        'content_html' => extract_legal_document_content(__DIR__ . '/order-execution-policy.php'),
                        'preview' => [],
                        ],
                        [
                        'title' => 'Risk Disclosure',
                        'description' => 'This notice sets out the risks of leveraged and derivative trading so clients
                        can make informed decisions.',
                        'file' => './files/Risk_Disclosure_Amber_Rock_Trade_Ltd.pdf',
                        'content_html' => extract_legal_document_content(__DIR__ . '/risk-disclosure.php'),
                        'preview' => [],
                        ],
                        [
                        'title' => 'General Risk Disclosure',
                        'description' => 'A broader risk notice covering market commentary, product exposure, margin
                        usage, and the limits of trading knowledge.',
                        'file' => './files/General_Risk _Disclosure_AMBER_ROCK_TRADE_LTD.pdf',
                        'content_html' => extract_legal_document_content(__DIR__ . '/general-risk-disclosure.php'),
                        'preview' => [],
                        ],
                        [
                        'title' => 'Client Service Agreement',
                        'description' => 'The agreement governs the client relationship, service use, communication, and
                        the responsibilities of both parties.',
                        'file' => './files/CLIENT_SERVICES_AGREEMENT_AMBER_ROCK_TRADE_LTD.pdf',
                        'content_html' => extract_legal_document_content(__DIR__ . '/client-service-agreement.php'),
                        'preview' => [],
                        ],
                        [
                        'title' => 'GBL (Investment Dealer Licence)',
                        'description' => 'Global Business Licence certificate for Amber Rock Trade Ltd as an Investment Dealer.',
                        'file' => './assets/images/cert.jpg',
                        'content_html' => '<p class="legal-doc-cert-wrap"><img src="./assets/images/cert.jpg" alt="Amber Rock Trade Ltd Global Business Licence (Investment Dealer) certificate" style="max-width:100%;height:auto;border-radius:12px;display:block;" loading="lazy" decoding="async" /></p>',
                        'preview' => [],
                        'download_aria_label' => 'Open certificate',
                        ],
                        ];
                        ?>

    <main class="legal-page">
      <section class="legal-hero">
        <div class="container">
          <div class="legal-hero-inner">
            <div class="hero-content">
              <h1 class="hero-title">
                <span data-i18n="legalPage.heroTitle">Important Legal Information &</span>
                <span class="" data-i18n="legalPage.heroTitleHighlight">Policies</span>
              </h1>
              <p class="hero-description" data-i18n="legalPage.heroDescription1">
                At TraderTok, we are committed to maintaining the highest standards of regulatory
                compliance, legal integrity, and client protection. As a regulated trading company,
                transparency and accountability are at the core of our operations.
              </p>
              <p class="hero-description" data-i18n="legalPage.heroDescription2">
                Below you will find our key legal documents, which define the framework of our
                services and outline your rights and responsibilities as a client. These documents
                cover essential areas including identity verification, transaction handling, data
                privacy, trading conditions, and risk disclosures.
              </p>
              <p class="hero-note" data-i18n="legalPage.heroNote">
                We strongly encourage all clients to carefully review the following before opening
                an account or initiating any trading activity:
              </p>
            </div>

            <div class="documents-grid">
              <?php foreach ($legal_documents as $index => $document): ?>
              <div class="document-card">
                <div class="document-header">
                  <div class="document-main">
                    <div class="document-icon">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                      </svg>
                    </div>
                    <div class="document-content">
                      <h3 class="document-title"><?php echo htmlspecialchars($document['title']); ?>
                      </h3>
                    </div>
                  </div>
                  <div class="document-actions">
                    <button class="document-toggle" type="button" aria-expanded="false"
                      aria-label="Toggle preview">+</button>
                    <a href="<?php echo htmlspecialchars(str_replace(' ', '%20', $document['file']), ENT_QUOTES); ?>"
                      class="document-download" target="_blank" rel="noopener noreferrer"
                      aria-label="<?php echo htmlspecialchars(!empty($document['download_aria_label']) ? $document['download_aria_label'] : 'Download PDF', ENT_QUOTES); ?>">
                      <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                        stroke-linejoin="miter">
                        <polyline points="22 14 22 22 2 22 2 14"></polyline>
                        <polyline points="17 12 12 17 7 12"></polyline>
                        <line x1="12" y1="17" x2="12" y2="3"></line>
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="document-description">
                  <?php if (!empty($document['content_html'])): ?>
                  <div class="page-hero-content legal-document-content legal-documents-panel">
                  <?php echo $document['content_html']; ?>
                  </div>
                  <?php elseif (!empty($document['preview'])): ?>
                  <?php foreach ($document['preview'] as $paragraph): ?>
                  <p><?php echo htmlspecialchars($paragraph); ?></p>
                  <?php endforeach; ?>
                  <?php else: ?>
                  <p><?php echo htmlspecialchars($document['description']); ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>

      <!-- Video Section -->
      <section class="video-section">
        <div class="container">
          <div class="video-wrapper">
            <video class="legal-video" autoplay muted loop playsinline>
              <source src="assets/images/vid.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </section>

      <!-- Important Notice -->
      <section class="notice-section">
        <div class="container">
          <div class="notice-title">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" y1="8" x2="12" y2="12"></line>
              <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <span class="gradient-text" data-i18n="legalPage.important">Important</span>
          </div>
          <p class="notice-text" data-i18n="legalPage.importantNotice">
            By continuing to use our services, you confirm that you have read, understood, and
            agreed to the terms outlined in these policies. If you have any questions or concerns
            regarding these documents, please <a href="./contact-us/">contact our legal
              department</a> for clarification.
          </p>
        </div>
      </section>
    </main>

    <script>
document.addEventListener('DOMContentLoaded', function() {
  const documentCards = document.querySelectorAll('.document-card');

  documentCards.forEach(function(card) {
    const toggleBtn = card.querySelector('.document-toggle');
    if (!toggleBtn) return;

    toggleBtn.addEventListener('click', function(event) {
      event.preventDefault();
      event.stopPropagation();

      const shouldOpen = !card.classList.contains('active');

      documentCards.forEach(function(otherCard) {
        if (otherCard === card) return;
        otherCard.classList.remove('active');
        const otherToggle = otherCard.querySelector('.document-toggle');
        if (otherToggle) {
          otherToggle.setAttribute('aria-expanded', 'false');
        }
      });

      card.classList.toggle('active', shouldOpen);
      toggleBtn.setAttribute('aria-expanded', String(shouldOpen));
    });
  });
});
    </script>