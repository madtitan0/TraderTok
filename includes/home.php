<!-- Modern Hero Section -->
<section class="modern-hero" style="overflow-x: hidden !important; padding: 0 !important;">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    
    <!-- Navigation Dots -->
    <div class="hero-nav-dots">
      <?php foreach ($sliders as $index => $slide): ?>
        <button type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide-to="<?= $index ?>"
                <?= $index === 0 ? 'class="active" aria-current="true"' : '' ?>
                aria-label="Slide <?= $index + 1 ?>"></button>
      <?php endforeach; ?>

      
    </div>

    

    <!-- Slides -->
    <div class="carousel-inner">
      <?php foreach ($sliders as $i => $slide): ?>
        <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
          
          <!-- Slide Wrapper -->
          <div class="hero-slide-wrapper">

            <!-- Background with overlay layers -->
            <div class="hero-background">
              <!-- <img src="<?= $slide->background_image ? $get->assets_url . '/' . $slide->background_image : './assets/img/NewTemp/bg4.jpg' ?>" -->
               <img src="./assets/img/NewTemp/slider.png"
                   class="hero-bg-image"
                   alt="slide background">
              <div class="hero-gradient-overlay"></div>
              <div class="hero-pattern-overlay"></div>
            </div>

            <!-- Text + Image content -->
            <div class="hero-content-container">
              <div class="container">
                <div class="row align-items-center justify-content-between">

                  <!-- Text Section -->
                  <div class="col-lg-6 col-md-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="hero-text-content">
                      <div class="hero-badge">
                        <span class="badge-icon">✦</span>
                        <span class="badge-text">Welcome</span>
                      </div>
                      <h1 class="hero-main-title"><?= $slide->title ?></h1>
                      <p class="hero-subtitle"><?= $slide->content ?></p>
                      <div class="hero-cta-group">
                        <a href="<?= $get->login_url ?>" class="btn-primary-hero">Get Started</a>
                        <a href="<?= $get->register_url ?>" class="btn-secondary-hero">
                          <span class="btn-icon">▶</span>
                          Learn More
                        </a>
                      </div>
                    </div>
                  </div>

                  <!-- Image Section -->
                  <?php if ($slide->image): ?>
                    <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                      <div class="hero-visual-wrapper">
                        <div class="hero-image-float">
                          <img src="<?= $get->assets_url . '/' . $slide->image ?>" 
                               class="hero-feature-image" 
                               alt="hero visual">
                        </div>
                        <div class="hero-decoration-circle"></div>
                        <div class="hero-decoration-dots"></div>
                      </div>
                    </div>
                  <?php endif; ?>


                </div>

                
              </div>

              
            </div>
            

          </div>
          
        </div>
      <?php endforeach; ?>
      
    </div>

    <!-- Arrows -->
    <!-- <button class="carousel-control-prev hero-arrow hero-arrow-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="hero-arrow-icon">‹</span>
    </button>
    <button class="carousel-control-next hero-arrow hero-arrow-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="hero-arrow-icon">›</span>
    </button> -->

  </div>

                    <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container" style="">
  <div class="tradingview-widget-container__widget"></div>
  <!-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener nofollow" target="_blank"><span class="blue-text">Ticker tape</span></a><span class="trademark"> by TradingView</span></div> -->
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500 Index"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "US 100 Cash CFD"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR to USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "Bitcoin"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "Ethereum"
    }
  ],
  "colorTheme": "dark",
  "locale": "en",
  "largeChartUrl": "",
  "isTransparent": false,
  "showSymbolLogo": true,
  "displayMode": "adaptive"
}
  </script>
</div>
<!-- TradingView Widget END -->

</section>

<!-- ======= About Section ======= -->
<?php
if ($get->home_image_about_us && $get->home_about_us) {
    echo '
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 about-content">
                    <span class="section-badge">About Us</span>
                    <h2 class="about-title">Your Trusted Partner in Financial Growth</h2>
                    <p class="about-text">' . $get->home_about_us . '</p>

                    <a href="./about" class="btn-primary-hero">Learn More</a>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Happy Clients</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Support</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">100%</span>
                            <span class="stat-label">Secure</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-image-wrapper">
                        <!-- <img src="https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=800&q=80" alt="About TraderTok"> -->
                        <img src="' . $get->assets_url . '/' . $get->home_image_about_us . '" class="img-fluid" alt="Responsive image" data-aos="zoom-in" style="border-radius: 12px;">
                    </div>
                </div>
            </div>
        </div>
    </section>';
}
?>



    <!-- End About Section -->

<main id="main" style="background-color: #0e437e !important; color: #EAEAEA !important;">
    <!-- ======= Testimonials Section ======= -->

    

<section id="testimonials" class="testimonials">
  <div class="container" data-aos="fade-up">
    <div class="row align-items-center">

      <!-- Cards Section -->
      <div class="col-lg-7 col-md-9 order-md-0 order-sm-1 order-1">
        <div class="testimonial-item m-5">
          <div class="row d-flex align-items-stretch">
            <?php foreach ($cards as $card) { ?>
              <div class="col-12 col-md-6 col-lg-6 d-flex">
                <div class="card card1 m-2" style="background: linear-gradient(135deg, #e61a38, #d39266)!important; color:#222; min-height:250px; border-radius:12px; box-shadow:0 3px 8px rgba(0,0,0,0.15);">
                  <div class="card-body d-flex flex-column justify-content-start p-4">
                    
                    <?php if ($card->icon) { ?>
                      <div class="icon-box__icon mb-3" style="width:60px; height:60px; border-radius:50%; background:#fff; display:flex; align-items:center; justify-content:center; font-size:30px; color:#FF7043; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                        <?= $card->icon ?>
                      </div>
                    <?php } ?>

                    <h6 class="card-subtitle mt-2" style="font-weight:700; font-size:1.5rem; color:#fff;">
                      <?= $card->title ?>
                    </h6>
                    <p class="card-text mt-3" style="font-size: 1rem; line-height:1.5; color:#fcecec;">
                      <?= $card->content ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <!-- Text Section -->
      <div class="col-lg-5 col-md-3 order-sm-0 order-0 d-flex align-items-center">
        <div class="block-head">
          <span class="block-subtitle text-uppercase" style="color:#888;">TraderTok Education Department</span>
          <h2 class="block-title" style="color:#FFFFFF; font-weight:800; line-height:1.3; font-size:3rem !important; font-family: var(--font-secondary); ">
            <!-- Stay up to date with the latest news and most important lessons from our analytics team. -->
             Get the latest analytics insights — straight from our team to you.
          </h2>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- End Testimonials Section -->




<!-- <div style="padding: 40px; width: 1300px; background: #0A1F44; font-family: Arial, sans-serif; border-radius: 15px; margin: 40px auto;">

    <h1 style="text-align: center; font-size: 35px; color: #EAEAEA; margin-bottom: 40px; font-weight: 800;">
        Our Trading Platforms – <span style="color: #E74C3C;">Come Trade With Us</span>
    </h1>


    <div style="display: flex; align-items: flex-start; justify-content: center; gap: 40px; flex-wrap: wrap;">


        <div style="flex: 1; min-width: 300px; max-width: 400px; display: flex; flex-direction: column; gap: 25px;">


            <div style="background: white; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 25px;">
                <h2 style="color: #d32f2f; margin-top: 0; font-size: 25px;">TraderTool</h2>
                <p style="font-size: 14px; color: #555; margin-bottom: 16px;">Download for:</p>
                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="https://tradertok.com/download/win.zip" style="flex: 1; text-align: center; background: #0078D6; color: white; padding: 12px 15px; border-radius: 8px; text-decoration: none; font-size: 17px; transition: background 0.3s; cursor: pointer;">
                        <i class="fa-brands fa-windows" style="margin-right: 8px; font-size: 22px;"></i> Windows
                    </a>
                    <a href="https://tradertok.com/download/mac.zip" style="flex: 1; text-align: center; background: #000; color: white; padding: 12px 15px; border-radius: 8px; text-decoration: none; font-size: 17px; transition: background 0.3s; cursor: pointer;">
                        <i class="fa-brands fa-apple" style="margin-right: 8px; font-size: 22px;"></i> Mac
                    </a>
                </div>
            </div>

            <div style="background: white; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 25px;">
                <h2 style="color: #1976d2; margin-top: 0; font-size: 25px;">Mobile Platform</h2>
                <p style="font-size: 14px; color: #555; margin-bottom: 16px;">Access our mobile platform:</p>
                <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <a href="https://appzone.tradertok.com/" style="flex: 1; text-align: center; background: #000; color: white; padding: 12px 15px; border-radius: 8px; text-decoration: none; font-size: 17px; transition: background 0.3s; cursor:pointer;">
                      Sign Up
                    </a>
                </div>
            </div>

        </div>


        <div style="flex: 1; min-width: 300px; text-align: center;">
            <img style="width: 100%; height: 400px; object-fit: contain ; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);"  src="./assets/img/NewTemp/file.png"/>
                    </div>
                    </div>
                    </div>  -->

<div style="padding: 40px 20px; width: 100%; max-width: 1300px; background: #0A1F44; font-family: Arial, sans-serif; border-radius: 15px; margin: 40px auto; box-sizing: border-box;">

  <h1 style="text-align: center; font-size: 2rem; color: #EAEAEA; margin-bottom: 40px; font-weight: 800;">
    Our Trading Platforms – <span style="color: #E74C3C;">Come Trade With Us</span>
  </h1>

  <div style="display: flex; align-items: flex-start; justify-content: center; gap: 40px; flex-wrap: wrap;">

    <!-- Left side -->
    <div style="flex: 1; min-width: 280px; max-width: 500px; display: flex; flex-direction: column; gap: 25px;">

      <div style="background: white; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 25px;">
        <h2 style="color: #d32f2f; margin-top: 0; font-size: 1.5rem;">TraderTool</h2>
        <p style="font-size: 0.9rem; color: #555; margin-bottom: 16px;">Download for:</p>
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
          <a href="https://tradertok.com/download/win.zip" style="flex: 1; text-align: center; background: #0078D6; color: white; padding: 12px 15px; border-radius: 8px; text-decoration: none; font-size: 1rem; transition: background 0.3s;">
            <i class="fa-brands fa-windows" style="margin-right: 8px; font-size: 22px;"></i> Windows
          </a>
          <a href="https://tradertok.com/download/mac.zip" style="flex: 1; text-align: center; background: #000; color: white; padding: 12px 15px; border-radius: 8px; text-decoration: none; font-size: 1rem; transition: background 0.3s;">
            <i class="fa-brands fa-apple" style="margin-right: 8px; font-size: 22px;"></i> Mac
          </a>
        </div>
      </div>

      <div style="background: white; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); padding: 25px;">
        <h2 style="color: #1976d2; margin-top: 0; font-size: 1.5rem;">Mobile Platform</h2>
        <p style="font-size: 0.9rem; color: #555; margin-bottom: 16px;">Access our mobile platform:</p>
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
          <a href="https://appzone.tradertok.com/" style="flex: 1; text-align: center; background: #000; color: white; padding: 12px 15px; border-radius: 8px; text-decoration: none; font-size: 1rem; transition: background 0.3s;">
            Sign Up
          </a>
        </div>
      </div>

    </div>

    <!-- Right side -->
    <div style="flex: 1; min-width: 280px; text-align: center;">
      <img style="width: 100%; max-width: 500px; height: auto; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);" src="./assets/img/NewTemp/file.png" alt="Trading platform">
    </div>

  </div>
</div>

    <?php
        if (isset($questions)&& !empty($questions)) {   ?>
    <section id="faq" class="faq mb-5" style=" padding: 40px 0 !important;">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row">
                    <!-- <div class="col-lg-5 faqimgmob col-sm-12 order-sm-1 order-1">
                        <img src="./assets/img/NewTemp/accordion.jpg" class="img-fluid" alt="Responsive image">

                    </div> -->

                    <div class="col-lg-5 faqimgmob col-sm-12 order-sm-1 order-1 d-flex justify-content-center align-items-center">
  <img src="./assets/img/NewTemp/faq.png" class="img-fluid" alt="Responsive image">
</div>

                    <div class="col-lg-7 col-sm-12 order-sm-0 order-0 ">
                        <div class="content px-xl-5">
                            <div class="block-head">
                                <h2 class="block-title" style="text-align: center; color: #E74C3C !important; margin-bottom: 30px !important; font-size: 35px;"> WHY CHOOSE TRADERTOK</span>
                                    </h2><h2>
                                    <p class="fw-bold" style=" color: #EAEAEA; font-size: 20px;">
                                    We provide our investors with continuous improvement, new opportunities to explore financial markets and the opportunity to work with a recognized leader in the financial industry.
                                    </p>
                            </h2></div>
                        </div>

                        <!-- <div class="accordion accordion-flush px-xl-5" id="faqlist">
                        <?php $questId=0;  foreach ($questions as $quest) {   ?>
														
													
                            <div class="accordion-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="border-left: 6px solid #E74C3C !important; background: #ffffff !important; border-radius: 8px !important; margin-bottom: 15px !important; padding: 15px !important;">
                                <h3 class="accordion-header" style="margin: 0 !important; color: #181738 !important; font-weight: 600 !important;">
                                    <button class="accordion-button collapsed accordionitem" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $questId ?>">
                                        <div class="icon-box__iconaccordion bg-light-orange">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16">
                                                <g>
                                                    <path d="M15.68 27.432v1.142h1.045v-1.046h1.045v-1.572a1.57 1.57 0 00-1.568-1.568.523.523 0 01-.523-.523v-.523h.523a.523.523 0 01.523.523v.523h1.045v-.523a1.566 1.566 0 00-1.045-1.472v-1.137H15.68v1.045h-1.045v1.568a1.57 1.57 0 001.568 1.568.523.523 0 01.523.523v.523h-.523a.523.523 0 01-.523-.523v-.523h-1.045v.519a1.566 1.566 0 001.045 1.476z">
                                                    </path>
                                                    <path d="M31.361 17.075h-9.67l3.92-5.227h-2.09V6.621H19.34v5.228h-2.091l3.92 5.227h-4.443V8.189c0-1.492-3.919-1.568-4.7-1.568-.261 0-.872.01-1.568.076v-4.78C10.454.425 6.535.349 5.75.349s-4.7.076-4.7 1.568v15.158A1.046 1.046 0 000 18.12v13.59a1.046 1.046 0 001.045 1.045h30.316a1.046 1.046 0 001.045-1.045V18.12a1.046 1.046 0 00-1.045-1.045zm-10.976-4.181V7.667h2.091v5.227h1.045l-2.091 2.787-2.09-2.787zM8.363 17.075v-1.547a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5v1.547zm-6.272-4.683a12.171 12.171 0 003.659.5c.538 0 1.069-.026 1.568-.075v2.087a15.2 15.2 0 01-1.568.079 7.546 7.546 0 01-3.659-.618zm0-3.136a12.171 12.171 0 003.659.5c.538 0 1.069-.026 1.568-.075v2.088a15.2 15.2 0 01-1.568.08 7.546 7.546 0 01-3.659-.618zm13.59 1.975a7.546 7.546 0 01-3.659.618 7.546 7.546 0 01-3.659-.618V9.256a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5zm0 3.136a7.546 7.546 0 01-3.659.618 7.546 7.546 0 01-3.659-.618v-1.975a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5zm-.142-6.178a9.132 9.132 0 01-3.517.523 9.134 9.134 0 01-3.517-.523 9.132 9.132 0 013.517-.523 9.134 9.134 0 013.517.523zm-8.221 0v.443a15.051 15.051 0 01-1.568.079 7.546 7.546 0 01-3.659-.618V6.119a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5v.721c-1.091.204-2.091.596-2.091 1.349zM2.091 2.983a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5v1.975a7.546 7.546 0 01-3.659.618 7.546 7.546 0 01-3.659-.618zM5.75 1.394a9.134 9.134 0 013.517.523 9.134 9.134 0 01-3.517.523 9.134 9.134 0 01-3.517-.523 9.134 9.134 0 013.517-.523zM2.091 15.528a12.171 12.171 0 003.659.5c.538 0 1.069-.026 1.568-.075v1.12H2.091zM1.045 31.71V18.12h30.316v13.59z">
                                                    </path>
                                                    <path d="M2.091 19.165v11.5h28.225v-11.5zm3.083 1.045a2.622 2.622 0 01-2.038 2.038V20.21zm-2.038 7.37a2.622 2.622 0 012.038 2.038H3.136zm3.095 2.039a3.661 3.661 0 00-3.094-3.094v-3.22a3.661 3.661 0 003.094-3.095h6.677a5.736 5.736 0 000 9.408zm9.973-9.408a4.7 4.7 0 11-4.7 4.7 4.709 4.709 0 014.7-4.701zm11.029 9.408a2.622 2.622 0 012.038-2.038v2.038zm2.038-7.37a2.622 2.622 0 01-2.038-2.038h2.038zm-3.094-2.038a3.661 3.661 0 003.094 3.094v3.22a3.661 3.661 0 00-3.094 3.094h-6.678a5.736 5.736 0 000-9.408zM26.135 10.802h4.182V5.576h2.091L28.226 0l-4.182 5.576h2.091zm2.091-9.06l2.091 2.788h-1.046v5.227H27.18V4.53h-1.045z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </div>
                                        <?= $quest->title ?>
                                    </button>
                                </h3>
                                <div id="faq-content-<?php echo $questId ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                  <div class="accordion-body" 
                                      style="line-height:1.6; font-size:16px; padding-left:10px; padding-right: 10px overflow-wrap:break-word; word-break:break-word; margin-top: 10px !important; color: #333 !important;">
                                      <?= $quest->content ?>
                                  </div>
                               </div>
                            </div>
                            <?php $questId++; } ?>
                          

                           

                        </div> -->


                        <div class="accordion accordion-flush px-xl-5" id="faqlist">
    <?php $questId=0;  foreach ($questions as $quest) {   ?>
        
        <div class="accordion-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="border-left: 6px solid #ffffff !important; background: linear-gradient(135deg, #e61a38, #d39266) !important; border-radius: 8px !important; margin-bottom: 15px !important; padding: 15px !important;">
            <h3 class="accordion-header" style="margin: 0 !important; color: #ffffff !important; font-weight: 600 !important;">
                <button class="accordion-button collapsed accordionitem" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $questId ?>" style="background: transparent !important; color: #ffffff !important; border: none !important;">
                    <div class="icon-box__iconaccordion bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16">
                            <g>
                                <path d="M15.68 27.432v1.142h1.045v-1.046h1.045v-1.572a1.57 1.57 0 00-1.568-1.568.523.523 0 01-.523-.523v-.523h.523a.523.523 0 01.523.523v.523h1.045v-.523a1.566 1.566 0 00-1.045-1.472v-1.137H15.68v1.045h-1.045v1.568a1.57 1.57 0 001.568 1.568.523.523 0 01.523.523v.523h-.523a.523.523 0 01-.523-.523v-.523h-1.045v.519a1.566 1.566 0 001.045 1.476z">
                                </path>
                                <path d="M31.361 17.075h-9.67l3.92-5.227h-2.09V6.621H19.34v5.228h-2.091l3.92 5.227h-4.443V8.189c0-1.492-3.919-1.568-4.7-1.568-.261 0-.872.01-1.568.076v-4.78C10.454.425 6.535.349 5.75.349s-4.7.076-4.7 1.568v15.158A1.046 1.046 0 000 18.12v13.59a1.046 1.046 0 001.045 1.045h30.316a1.046 1.046 0 001.045-1.045V18.12a1.046 1.046 0 00-1.045-1.045zm-10.976-4.181V7.667h2.091v5.227h1.045l-2.091 2.787-2.09-2.787zM8.363 17.075v-1.547a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5v1.547zm-6.272-4.683a12.171 12.171 0 003.659.5c.538 0 1.069-.026 1.568-.075v2.087a15.2 15.2 0 01-1.568.079 7.546 7.546 0 01-3.659-.618zm0-3.136a12.171 12.171 0 003.659.5c.538 0 1.069-.026 1.568-.075v2.088a15.2 15.2 0 01-1.568.08 7.546 7.546 0 01-3.659-.618zm13.59 1.975a7.546 7.546 0 01-3.659.618 7.546 7.546 0 01-3.659-.618V9.256a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5zm0 3.136a7.546 7.546 0 01-3.659.618 7.546 7.546 0 01-3.659-.618v-1.975a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5zm-.142-6.178a9.132 9.132 0 01-3.517.523 9.134 9.134 0 01-3.517-.523 9.132 9.132 0 013.517-.523 9.134 9.134 0 013.517.523zm-8.221 0v.443a15.051 15.051 0 01-1.568.079 7.546 7.546 0 01-3.659-.618V6.119a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5v.721c-1.091.204-2.091.596-2.091 1.349zM2.091 2.983a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5v1.975a7.546 7.546 0 01-3.659.618 7.546 7.546 0 01-3.659-.618zM5.75 1.394a9.134 9.134 0 013.517.523 9.134 9.134 0 01-3.517.523 9.134 9.134 0 01-3.517-.523 9.134 9.134 0 013.517-.523zM2.091 15.528a12.171 12.171 0 003.659.5c.538 0 1.069-.026 1.568-.075v1.12H2.091zM1.045 31.71V18.12h30.316v13.59z">
                                </path>
                                <path d="M2.091 19.165v11.5h28.225v-11.5zm3.083 1.045a2.622 2.622 0 01-2.038 2.038V20.21zm-2.038 7.37a2.622 2.622 0 012.038 2.038H3.136zm3.095 2.039a3.661 3.661 0 00-3.094-3.094v-3.22a3.661 3.661 0 003.094-3.095h6.677a5.736 5.736 0 000 9.408zm9.973-9.408a4.7 4.7 0 11-4.7 4.7 4.709 4.709 0 014.7-4.701zm11.029 9.408a2.622 2.622 0 012.038-2.038v2.038zm2.038-7.37a2.622 2.622 0 01-2.038-2.038h2.038zm-3.094-2.038a3.661 3.661 0 003.094 3.094v3.22a3.661 3.661 0 00-3.094 3.094h-6.678a5.736 5.736 0 000-9.408zM26.135 10.802h4.182V5.576h2.091L28.226 0l-4.182 5.576h2.091zm2.091-9.06l2.091 2.788h-1.046v5.227H27.18V4.53h-1.045z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <?= $quest->title ?>
                </button>
            </h3>
            <div id="faq-content-<?php echo $questId ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                <div class="accordion-body" 
                    style="line-height:1.6; font-size:16px; padding-left:10px; padding-right: 10px; overflow-wrap:break-word; word-break:break-word; margin-top: 10px !important; color: #ffffff !important; background: transparent !important;">
                    <?= $quest->content ?>
                </div>
            </div>
        </div><!-- # Faq item-->
        <?php $questId++; } ?>
</div>
                    </div>
                </div>
            </div>
        </section>
<?php } ?>





    <!-- End Testimonials Section -->


    <section class="registerform">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">

                    <div class="row ">
                        <!-- <div class="col-lg-5 registerformtopmargin m-lg-4">
                            <div class="block-head"><span class="block-subtitle text-uppercase color-white"> ARE YOU READY TO EARN WITH <?= $get->brand_name ?>?</span>
                                <h2 class="block-title color-white"> We will call you </h2>
                            </div>
                            <p>Step into the world's largest trading volume market in few minutes; easily and securely.</p>
                        </div> -->

                        <div class="col-lg-5 registerformtopmargin m-lg-4 d-flex justify-content-center align-items-center text-center">
    <div>
        <div class="block-head">
            <span class="block-subtitle text-uppercase color-white">
                ARE YOU READY TO EARN WITH <?= $get->brand_name ?>?
            </span>
            <h2 class="block-title color-white">We will call you</h2>
        </div>
        <p class="color-white">Step into the world's largest trading volume market in few minutes; easily and securely.</p>
    </div>
</div>

                        <div class="col-lg-6" id="register">
                            <form method="post" action="./register/" novalidate id="jsd">
                                <input type="hidden" name="language" value="en">
                                <div class="sliderForm">
                                    <div class="row g-5 mt-lg-1">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="text" class="form-control form-control-lg mb-2" name="firstname" placeholder="Name">
                                            <span class="inputerrormessage msgFirstName"></span>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="text" class="form-control form-control-lg mb-2" name="lastname" placeholder="Surname">
                                            <span class="inputerrormessage msgLastName"></span>
                                        </div>
                                    </div>
                                    <div class="row g-5 mt-1">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="email" class="form-control form-control-lg emailz mb-2" name="email" placeholder="Email" aria-describedby="emailHelp">
                                            <span class="inputerrormessage msgEmail"></span>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 ">
                                            <input name="inputPhoneId" type="tel" placeholder="Phone" class="form-control form-control-lg mb-2" inputmode="tel" required disabled>
                                        </div>
                                    </div>
                                    <!-- <div class="row g-5 mt-1">
                                        <div class="col-lg-12 col-sm-12">
                                            <input type="text" class="form-control form-control-lg mb-2" name="message" placeholder="Message">
                                        </div>
                                    </div> -->
                                    <div class="row g-5 mt-1">
    <div class="col-lg-12 col-sm-12">
        <textarea class="form-control form-control-lg mb-2" 
                  name="message" 
                  placeholder="Message" 
                  rows="5"></textarea>
    </div>
</div>


                                    <input type="hidden" name="campaign" value="swissbase-website" /><input type="hidden" name="affiliate" value="lylc" /><input type="hidden" name="current_url" value="" /><input type="hidden" name="currency" value="USD" /><input type="hidden" name="language" value="tr" /><input type="hidden" name="platform_type" value="MT5" /><input type="hidden" name="aid" value="bitcoin" /><input type="hidden" name="partner_id" value="" /><input type="hidden" name="description" value="" />

                                    <div class="d-grid gap-2 my-4">
                                        <button class="btn btnregister" type="submit">Contact Us</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->