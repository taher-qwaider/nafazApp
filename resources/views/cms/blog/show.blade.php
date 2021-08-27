<html lang="ar">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Page Title -->
    <title>المدونة</title>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css" />

    <!-- Favicon -->
    <!-- <link rel="icon" href="ad-agency/img/favicon.ico" /> -->
    <!-- Bundle -->
    <link rel="stylesheet" href="{{ asset('app/css/bundle.min.css') }}" />
    <!-- Plugin Css -->
    <link rel="stylesheet" href="{{ asset('app/css/fancybox.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('app/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('app/css/main.css') }}" />
  </head>
  <body>
    <!-- Loader -->
    <!-- <div class="loader" id="loader-fade">
      <div class="dot-container">
        <div class="dot dot-1"></div>
        <div class="dot dot-2"></div>
        <div class="dot dot-3"></div>
      </div>

      <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
          <filter id="goo">
            <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -7"></feColorMatrix>
          </filter>
        </defs>
      </svg>
    </div> -->
    <!-- Loader ends -->
    <header class="cursor-light header-appear">
      <nav class="navbar navbar-top-default navbar-expand-lg nav-three-circles bottom-nav nav-box-shadow no-animation">
        <div class="container-fluid">
          <a class="logo ml-lg-1" href="javascript:void(0)">
            <img src="{{ asset('storage/' . $logo->value) }}" class="logo-default" alt="logo" title="Logo" />
          </a>
          <div class="collapse navbar-collapse d-none d-lg-block">
            <ul class="nav navbar-nav mx-auto">
              <li class="nav-item"><a href="#home" class="scroll nav-link link active">الرئيسية</a></li>
              <li class="nav-item"><a href="#about" class="scroll nav-link link">من نحن</a></li>
              <li class="nav-item"><a href="#service" class="scroll nav-link link">خدماتنا</a></li>
              <li class="nav-item"><a href="#work" class="scroll nav-link link">معرض اعمالنا</a></li>
              <li class="nav-item"><a href="#clients" class="scroll nav-link link">عملائنا</a></li>
              <li class="nav-item"><a href="#blog" class="scroll nav-link link">المدونة</a></li>
              <li class="nav-item"><a href="#contact" class="scroll nav-link link">اتصل بنا</a></li>
            </ul>
          </div>
          <div class="d-flex align-items-center">
            <img src="{{ asset('app/images/111.png') }}" class="image-vision ml-2 nav-btn-number d-none d-lg-block">
            <a href="javascript:void(0)" class="nav-btn-number btn-setting btn-hvr-up btn-hvr-whatsapp color-white mr-lg-3"><i class="fab fa-whatsapp"></i> +669 9 234 812</a>
          </div>
          <!-- side menu open button -->
          <div class="menu-btn">
            <a class="menu_bars menu-bars-setting animated-wrap sidemenu_toggle">
              <div class="menu-lines animated-element">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </a>
          </div>
          <!-- Side Menu -->
        </div>
      </nav>
      <!--Side Menu-->
    </header>

    <!-- Blog start -->
    <section id="blog" class="half-section pb-0 bg-change  list-blogs">
      <div class="single-blog">
        <h3 class="p-4 text-white"> كيف يمكنني التسجيل في الموقع</h3>
        <div class="single-blog-image">
          <img alt="blog" src="{{ asset('storage/'. $blog->image->path) }}" class="w-100" />
        </div>
         <div class="single-blog-content p-5">
          <p class="mb-5">{{ $blog->body }}</p>
        </div>
      </div>
    </section>
    <!-- Blog ends -->
       <!-- Blog start -->
    <section id="blog" class="half-section py-0 bg-change bg-yellow list-blogs bg-dark">
      <div class="main-title wow fadeIn p-5 bg-dark2 mb-0 text-right" data-wow-delay="300ms">
        <h2 class="mb-0 mr-0">مقالات مشابهة</h2>
      </div>
        @foreach($blogs as $blog)
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 p-lg-0">
                    <div class="split-container-setting style-three text-center">
                        <div class="main-title mb-5 wow fadeIn" data-wow-delay="300ms">
                            <h5 class="font-18 text-blue">{{ $blog->created_at->format('d/m/Y') }}</h5>
                            <h2 class="mb-0 font-weight-normal">{{ $blog->title }}</h2>
                        </div>
                        <p class="color-black mb-5">{{ $blog->body }}</p>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn-setting color-black btn-hvr-up btn-blue btn-hvr-pink">قراءة المزيد</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="hover-effect image-blog">
                        <img alt="blog" src="{{ asset('storage/' . $blog->image->path) }}" class="about-img" />
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- Blog ends -->
    <!-- Footer starts -->
    <footer class="p-half bg-dark2">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <ul class="footer-icons mb-4">
                @foreach($socialMedias as $socialMedia)
                    @switch($socialMedia->name)
                        @case('facebook')
                        <li>
                            <a href="{{ $socialMedia->url }}" class="wow fadeInUp facebook" style="visibility: visible; animation-name: fadeInUp;"><i class="fab fa-facebook-f"></i> </a>
                        </li>
                        @break
                        @case('twitter')
                        <li>
                            <a href="{{ $socialMedia->url }}" class="wow fadeInDown twitter" style="visibility: visible; animation-name: fadeInDown;"><i class="fab fa-twitter"></i> </a>
                        </li>
                        @break
                        @case('google')
                        <li>
                            <a href="{{ $socialMedia->url }}" class="wow fadeInUp google" style="visibility: visible; animation-name: fadeInUp;"><i class="fab fa-google"></i> </a>
                        </li>
                        @break
                        @case('linkedin')
                        <li>
                            <a href="{{ $socialMedia->url }}" class="wow fadeInDown linkedin" style="visibility: visible; animation-name: fadeInDown;"><i class="fab fa-linkedin-in"></i> </a>
                        </li>
                        @break
                        @case('instagram')
                        <li>
                            <a href="{{ $socialMedia->url }}" class="wow fadeInUp instagram" style="visibility: visible; animation-name: fadeInUp;"><i class="fab fa-instagram"></i> </a>
                        </li>
                        @break
                        @case('pinterest')
                        <li>
                            <a href="{{ $socialMedia->url }}" class="wow fadeInDown pinterest" style="visibility: visible; animation-name: fadeInDown;"><i class="fab fa-pinterest-p"></i> </a>
                        </li>
                        @break
                    @endswitch
                @endforeach
            </ul>
            <p class="copyrights mt-2 mb-2">جميع الحقوق محفوظة لمؤســســـة نفاذ للمقاولات © 2020 </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer ends -->

    <!-- JavaScript -->
    <script src="{{ asset('app/js/bundle.min.js') }}"></script>
    <script src="{{ asset('app/js/fancybox.min.js') }}"></script>
    <script src="{{ asset('app/js/isotope.min.js') }}"></script>
    <script src="{{ asset('app/js/swiper.min.js') }}"></script>
    <script src="{{ asset('app/js/wow.min.js') }}"></script>
    <script src="{{ asset('app/js/function.js') }}"></script>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        var uluru = { lat: 32.5035911, lng: 35.4652862 };
        // The map, centered at Uluru
        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 16,
          center: uluru,
        });
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          //- icon: "images/marker.png"
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcTWZnmuGjZKYeBR5vX8xS6p122spkpBM&amp;callback=initMap"></script>
  </body>
</html>
