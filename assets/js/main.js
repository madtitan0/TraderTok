 class myHeaderindex  extends HTMLElement{   
    connectedCallback(){
        this.innerHTML = `
    
        <header id="header" class="header fixed-top" data-scrollto-offset="0">

        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                
                <img class="strickedlogo d-none" src="./assets/img/NewTemp/icon/logo.svg" alt="" >
                <img class=" fixedlogo " src="./assets/img/NewTemp/icon/logowhite.png" alt="" >
            </a>

            <nav id="navbar" class="navbar"> 
                <ul>
                    <li><a class="nav-link scrollto" href="index.html#about">Ana Sayfa</a></li>
                    <li><a class="nav-link scrollto" href="./aboutus.html">Hakkımızda</a></li>
                    <li class="dropdown"><a href="#"><span>Hesap Türleri</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li> <a href="./demoaccount.html">Demo Hesap</a></li>
                            <li><a href="./realaccount.html">Gerçek Hesap</a></li>
                            <li> <a href="./accounttransfer.html">Hesap Taşıma</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="./campaigns.html">Kampanyalar</a></li> 
                    <li><a class="nav-link scrollto" href="./investment.html"> Yatırım </a></li>
                    <li><a class="nav-link scrollto" href="./platforms.html">Platformlar</a></li>
                    <li><a class="nav-link scrollto" href="./dailyanalysis.html">Günlük Analizler</a></li>
                </ul>

                <a class="btn-getstarted btn btn-outline-info scrollto px-2 py-2" href="./contactus.html">Bizimle İletişime Geçin </a>
				<a class="btn-getstarted btn btn-warning   btn-sm scrollto px-2 py-2" href="#">Gerçek Hesap</a>
                <a class="btn-getstarted btn btn-warning  btn-sm scrollto px-2 py-2" href="#">Demo Hesap</a>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>

            </nav><!-- .navbar -->

        </div>

    </header>
    
    `
    }
}
 
customElements.define('my-headerindex',myHeaderindex);

class myHeader  extends HTMLElement{   
    connectedCallback(){
        this.innerHTML = `
        <header id="header" class="header fixed-top" data-scrollto-offset="0">

        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->

                <img src="./assets/img/NewTemp/icon/logo.svg" alt="" style="height:30px">
                <!-- <h1>HeroBiz<span>.</span></h1> -->
            </a>

            <nav id="navbar" class="navbar navbar2">
                <ul>
                    <li><a class="nav-link scrollto" href="index.html#about">Ana Sayfa</a></li>
                    <li><a class="nav-link scrollto" href="./aboutus.html">Hakkımızda</a></li>
                    <li class="dropdown"><a href="#"><span>Hesap Türleri</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li> <a href="./demoaccount.html">Demo Hesap</a></li>
                            <li><a href="./realaccount.html">Gerçek Hesap</a></li>
                            <li> <a href="./accounttransfer.html">Hesap Taşıma</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="./campaigns.html">Kampanyalar</a></li> 
                    <li><a class="nav-link scrollto" href="./investment.html"> Yatırım </a></li>
                    <li><a class="nav-link scrollto" href="./platforms.html">Platformlar</a></li>
                    <li><a class="nav-link scrollto" href="./dailyanalysis.html">Günlük Analizler</a></li>
                    
                </ul>
 
                <a class="btn-getstarted btn btn-outline-info scrollto px-2 py-2" href="./contactus.html">Bizimle İletişime Geçin </a>
				<a class="btn-getstarted btn btn-warning   btn-sm scrollto px-2 py-2" href="#">Gerçek Hesap</a>
                <a class="btn-getstarted btn btn-warning  btn-sm scrollto px-2 py-2" href="#">Demo Hesap</a>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>

            </nav><!-- .navbar -->

        </div>

    </header>

 
    
    `
    }
}
customElements.define('my-header',myHeader);

class myFooter  extends HTMLElement{   
    connectedCallback(){
        this.innerHTML = `
    
        <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <img src="./assets/img/NewTemp/icon/logowhite.png" alt="" style="height:50px">
                            
                            <p class="lh-sm mt-3">
                                Forex Tij, Tij Company Doo şirketi adı altında ticaret için hizmetler sunar.
                            </p><br>
                            <p class="lh-sm">
                                Bu web sitesindeki tüm aracılık faaliyetleri ‘’ Forex Tij ‘’ tarafından sağlanmaktadır.
                                ‘’ Tij Company Doo ‘’ Hizmetleri, Türkiye ve Amerika Birleşik Devletleri’nde ikamet
                                edenler için mevcut değildir.
                            </p><br>
                            <p class="lh-sm">
                                İyiliğiniz için çalıştığımızın farkındayız. Ekip ve eylemlerimiz için sorumluluk
                                alıyoruz.

                            </p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links  d-none d-sm-block d-sm-none d-md-block">
                        <h4>Hızlı Linkler</h4>
                        <ul>
                            <li> <a href="./aboutus.html">Hakkımızda</a></li>
                            <li> <a href="./contactus.html">Bizimle İletişime Geçin</a></li>
                            <li> <a href="./demoaccount.html">Demo Hesap Aç</a></li>
                            <li> <a href="./realaccount.html">Gerçek Hesap Aç</a></li>
                            <li> <a href="#">Giriş Yap</a></li>
                            <li><a href="../campaigns.html">Kampanyalar</a></li> 
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links   d-none d-sm-block d-sm-none d-md-block">
                        <h4>Destek</h4>
                        <ul>
                            <li><a href="#">Forex Hakkında
                                </a></li>
                            <li><a href="#">Yatırım Yapmak</a></li>
                            <li><a href="#">Eğitim</a></li>
                            <li><a href="./privacy-policy.html"> Gizlilik Sözleşmesi</a></li>
                            <li><a href="./terms-and-condition.html">Kullanım Koşulları</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Bizimle İletişime Geçin 


                        </h4>
                        <ul class="list-unstyled menu">
                            <li><i class="bi bi-telephone mt-2 px-1"> </i> +90 216 240 1279</li>
                            <li><i class="bi bi-envelope mt-2 px-1"> </i>support@forextij.com</li>
                            <li><i class="bi bi-geo-alt mt-2 px-1"></i>Via Morimondo, 26 br 20143 
                                MILANO ITALY</li>
                        </ul>

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div
                        class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                            <a href="https://mobile.twitter.com/forextij" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="https://www.instagram.com/forextij/" class="instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                        <div class="d-flex flex-column align-items-center align-items-lg-start">
                            <div class="copyright">
                                &copy; Copyright <strong><span>Forex-TIJ -</span></strong>. All Rights Reserved
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </footer>
    
    `
    }
}
customElements.define('my-footer',myFooter);



    
    
    // Start of LiveChat (www.livechat.com) code 
 
    // window.__lc = window.__lc || {};
    // window.__lc.license = 14168124;
    // ; (function (n, t, c) { function i(n) { return e._h ? e._h.apply(null, n) : e._q.push(n) } var e = { _q: [], _h: null, _v: "2.0", on: function () { i(["on", c.call(arguments)]) }, once: function () { i(["once", c.call(arguments)]) }, off: function () { i(["off", c.call(arguments)]) }, get: function () { if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load."); return i(["get", c.call(arguments)]) }, call: function () { i(["call", c.call(arguments)]) }, init: function () { var n = t.createElement("script"); n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n) } }; !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e }(window, document, [].slice))
  
        
//  End of LiveChat code 
document.addEventListener('DOMContentLoaded', () => {
  "use strict";

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Sticky header on scroll
   */
  // const selectHeader = document.querySelector('#header');
  // if (selectHeader) {
  //   document.addEventListener('scroll', () => {
  //     window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
  //   });
  // }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = document.querySelectorAll('#navbar .scrollto');

  function navbarlinksActive() {
    navbarlinks.forEach(navbarlink => {

      if (!navbarlink.hash) return;

      let section = document.querySelector(navbarlink.hash);
      if (!section) return;

      let position = window.scrollY;
      if (navbarlink.hash != '#header') position += 200;

      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active');
      } else {
        navbarlink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navbarlinksActive);
  document.addEventListener('scroll', navbarlinksActive);

  /**
   * Function to scroll to an element with top ofset
   */
  function scrollto(el) {
    const selectHeader = document.querySelector('#header');
    let offset = 0;

    if (selectHeader.classList.contains('sticked1')) {
      offset = document.querySelector('#header.sticked1').offsetHeight;
    } else if (selectHeader.hasAttribute('data-scrollto-offset')) {
      offset = selectHeader.offsetHeight - parseInt(selectHeader.getAttribute('data-scrollto-offset'));
    }
    window.scrollTo({
      top: document.querySelector(el).offsetTop - offset,
      behavior: 'smooth'
    });
  }

  /**
   * Fires the scrollto function on click to links .scrollto
   */
  let selectScrollto = document.querySelectorAll('.scrollto');
  selectScrollto.forEach(el => el.addEventListener('click', function(event) {
    if (document.querySelector(this.hash)) {
      event.preventDefault();

      let mobileNavActive = document.querySelector('.mobile-nav-active');
      if (mobileNavActive) {
        mobileNavActive.classList.remove('mobile-nav-active');

        let navbarToggle = document.querySelector('.mobile-nav-toggle');
        navbarToggle.classList.toggle('bi-list');
        navbarToggle.classList.toggle('bi-x');
      }
      scrollto(this.hash);
    }
  }));

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        scrollto(window.location.hash);
      }
    }
  });

  /**
   * Mobile nav toggle
   */
  const mobileNavToogle = document.querySelector('.mobile-nav-toggle');
  if (mobileNavToogle) {
    mobileNavToogle.addEventListener('click', function(event) {
      event.preventDefault();

      document.querySelector('body').classList.toggle('mobile-nav-active');

      this.classList.toggle('bi-list');
      this.classList.toggle('bi-x');
    });
  }

  /**
   * Toggle mobile nav dropdowns
   */
  const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');

  navDropdowns.forEach(el => {
    el.addEventListener('click', function(event) {
      if (document.querySelector('.mobile-nav-active')) {
        event.preventDefault();
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('dropdown-active');

        let dropDownIndicator = this.querySelector('.dropdown-indicator');
        dropDownIndicator.classList.toggle('bi-chevron-up');
        dropDownIndicator.classList.toggle('bi-chevron-down');
      }
    })
  });

  /**
   * Auto generate the hero carousel indicators
   */
  let heroCarouselIndicators = document.querySelector('#hero .carousel-indicators');
  if (heroCarouselIndicators) {
    let heroCarouselItems = document.querySelectorAll('#hero .carousel-item')

    heroCarouselItems.forEach((item, index) => {
      if (index === 0) {
        heroCarouselIndicators.innerHTML += `<li data-bs-target="#hero" data-bs-slide-to="${index}" class="active"></li>`;
      } else {
        heroCarouselIndicators.innerHTML += `<li data-bs-target="#hero" data-bs-slide-to="${index}"></li>`;
      }
    });
  }

  /**
   * Scroll top button
   */
  const scrollTop = document.querySelector('.scroll-top');
  if (scrollTop) {
    const togglescrollTop = function() {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
    window.addEventListener('load', togglescrollTop);
    document.addEventListener('scroll', togglescrollTop);
    scrollTop.addEventListener('click', window.scrollTo({
      top: 0,
      behavior: 'smooth'
    }));
  }

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Porfolio isotope and filter
   */
  let portfolionIsotope = document.querySelector('.portfolio-isotope');

  if (portfolionIsotope) {

    let portfolioFilter = portfolionIsotope.getAttribute('data-portfolio-filter') ? portfolionIsotope.getAttribute('data-portfolio-filter') : '*';
    let portfolioLayout = portfolionIsotope.getAttribute('data-portfolio-layout') ? portfolionIsotope.getAttribute('data-portfolio-layout') : 'masonry';
    let portfolioSort = portfolionIsotope.getAttribute('data-portfolio-sort') ? portfolionIsotope.getAttribute('data-portfolio-sort') : 'original-order';

    window.addEventListener('load', () => {
      let portfolioIsotope = new Isotope(document.querySelector('.portfolio-container'), {
        itemSelector: '.portfolio-item',
        layoutMode: portfolioLayout,
        filter: portfolioFilter,
        sortBy: portfolioSort
      });

      let menuFilters = document.querySelectorAll('.portfolio-isotope .portfolio-flters li');
      menuFilters.forEach(function(el) {
        el.addEventListener('click', function() {
          document.querySelector('.portfolio-isotope .portfolio-flters .filter-active').classList.remove('filter-active');
          this.classList.add('filter-active');
          portfolioIsotope.arrange({
            filter: this.getAttribute('data-filter')
          });
          if (typeof aos_init === 'function') {
            aos_init();
          }
        }, false);
      });

    });

  }

  /**
   * Clients Slider
   */
  new Swiper('.clients-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 40
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 60
      },
      640: {
        slidesPerView: 4,
        spaceBetween: 80
      },
      992: {
        slidesPerView: 6,
        spaceBetween: 120
      }
    }
  });

  /**
   * Testimonials Slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Testimonials Slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Animation on scroll function and init
   */
  function aos_init() {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });

});