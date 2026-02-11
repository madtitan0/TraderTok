    <style>
/* Contact Page Styles */
.contact-page {
  padding-top: 100px;
  min-height: 60vh;
}

.contact-hero {
  padding: 60px 0 80px;
}

.contact-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: start;
}

.contact-content {
  max-width: 100%;
}

.contact-title {
  font-size: clamp(2rem, 4vw, 2.8rem);
  font-weight: 800;
  line-height: 1.1;
  margin-bottom: 16px;
  color: var(--text-primary);
}

.gradient-text {
  background: var(--brand-gradient);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.contact-description {
  font-size: 0.95rem;
  line-height: 1.7;
  color: var(--text-secondary);
  margin-bottom: 32px;
}

/* Form Styles */
.contact-form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.form-label {
  font-size: 0.875rem;
  font-weight: 600;
  color: var(--text-primary);
}

.form-input,
.form-textarea {
  padding: 14px 16px;
  background: var(--bg-secondary);
  border: 1px solid var(--border-color);
  border-radius: 10px;
  font-size: 0.95rem;
  color: var(--text-primary);
  transition: all 0.3s ease;
  font-family: inherit;
}

.form-input:focus,
.form-textarea:focus {
  outline: none;
  background: var(--hover-bg);
  border-color: rgba(230, 57, 70, 0.5);
  box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.1);
}

.form-input::placeholder,
.form-textarea::placeholder {
  color: var(--text-secondary);
  opacity: 0.6;
}

.form-textarea {
  resize: vertical;
  min-height: 120px;
}

.form-error {
  font-size: 0.75rem;
  color: #dc2626;
  min-height: 18px;
}

.form-status {
  padding: 12px 16px;
  border-radius: 8px;
  font-size: 0.875rem;
  display: none;
}

.form-status.success {
  display: block;
  background: rgba(34, 197, 94, 0.1);
  color: #22c55e;
  border: 1px solid rgba(34, 197, 94, 0.2);
}

.form-status.error {
  display: block;
  background: rgba(220, 38, 38, 0.1);
  color: #dc2626;
  border: 1px solid rgba(220, 38, 38, 0.2);
}

.btn-contact-submit {
  padding: 16px 32px;
  background: var(--brand-gradient);
  border: none;
  border-radius: 10px;
  color: white;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  width: fit-content;
}

.btn-contact-submit:hover {
  box-shadow: 0 8px 25px rgba(230, 57, 70, 0.3);
}

/* Image Side */
.contact-image-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
}

.contact-image {
  max-width: 85%;
  height: auto;
  display: block;
}

/* Responsive */
@media (max-width: 900px) {
  .contact-layout {
    grid-template-columns: 1fr;
    gap: 40px;
  }

  .contact-image-wrapper {
    min-height: 300px;
    order: -1;
  }
}

@media (max-width: 600px) {
  .form-row {
    grid-template-columns: 1fr;
  }
}
    </style>

    <!-- Main Content -->
    <main class="contact-page" style="background: var(--bg-primary);">
      <section class="contact-hero">
        <div class="container">
          <div class="contact-layout">
            <!-- Left Side - Form -->
            <div class="contact-content">
              <h1 class="contact-title"><span data-i18n="contactUsPage.heroTitle">Contact</span> <span
                  class="gradient-text" data-i18n="contactUsPage.heroTitleHighlight">Us</span></h1>
              <p class="contact-description" data-i18n="contactUsPage.heroDescription">
                We remain open to any inquiries or questions you might have. Please submit a query in the fields below,
                and our support team will promptly respond to it.
              </p>

              <form class="contact-form" id="contactForm" novalidate>
                <div class="form-row">
                  <div class="form-group">
                    <label for="name" class="form-label" data-i18n="contactUsPage.formName">Name</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Enter your name"
                      data-i18n-placeholder="contactUsPage.formNamePlaceholder" required>
                    <span class="form-error" id="name-error"></span>
                  </div>
                  <div class="form-group">
                    <label for="surname" class="form-label" data-i18n="contactUsPage.formSurname">Surname</label>
                    <input type="text" id="surname" name="surname" class="form-input" placeholder="Enter your surname"
                      data-i18n-placeholder="contactUsPage.formSurnamePlaceholder" required>
                    <span class="form-error" id="surname-error"></span>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group">
                    <label for="phone" class="form-label" data-i18n="contactUsPage.formPhone">Phone</label>
                    <input type="tel" id="phone" name="phone" class="form-input" placeholder="+44 7520 640 890"
                      data-i18n-placeholder="contactUsPage.formPhonePlaceholder" required>
                    <span class="form-error" id="phone-error"></span>
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label" data-i18n="contactUsPage.formEmail">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="your@email.com"
                      data-i18n-placeholder="contactUsPage.formEmailPlaceholder" required>
                    <span class="form-error" id="email-error"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="message" class="form-label" data-i18n="contactUsPage.formMessage">Message</label>
                  <textarea id="message" name="message" class="form-textarea"
                    placeholder="Tell us about your inquiry..."
                    data-i18n-placeholder="contactUsPage.formMessagePlaceholder" rows="5" required></textarea>
                  <span class="form-error" id="message-error"></span>
                </div>

                <div class="form-status" id="formStatus" role="alert"></div>

                <button type="submit" class="btn-contact-submit" id="submitBtn"
                  data-i18n="contactUsPage.formSubmit">Send Message</button>
              </form>
            </div>

            <!-- Right Side - Image -->
            <div class="contact-image-wrapper">
              <img src=" assets/images/36019266_kulins0879.png" alt="Contact Support" class="contact-image">
            </div>
          </div>
        </div>
      </section>
    </main>