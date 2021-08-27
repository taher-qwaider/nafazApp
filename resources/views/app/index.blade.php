<html lang="ar">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Page Title -->
    <title>الرئيسية</title>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.13.0/css/pro.min.css" />

    <!-- Favicon -->
    <!-- <link rel="icon" href="ad-agency/img/favicon.ico" /> -->
    <!-- Bundle -->
    <link rel="stylesheet" href="{{ asset('app/css/bundle.min.css') }}" />
    <!-- Plugin Css -->
{{--    <link rel="stylesheet" href="{{ asset('app/css/fancybox.min.css') }}" />--}}

    <link rel="stylesheet" href="{{ asset('app/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('app/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('cms/fancyBox/source/jquery.fancybox.css') }}">
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
    <section class="top-header cursor-light">
      <div class="row no-gutters align-items-center">
        <div class="col-5 col-lg-4 text-right">
          <img src="{{ asset('app/images/111.png') }}" class="image-vision d-lg-none">
          <div class="slider-icons d-none d-lg-block">
            <ul class="slider-social banner-social d-flex">
                @foreach($socialMedias as $socialMedia)
                    @switch($socialMedia->name)
                        @case('facebook')
                            <li class="animated-wrap">
                                <a class="animated-element" href="{{ $socialMedia->url }}"><i class="fab fa-facebook-f"></i> </a>
                            </li>
                        @break
                        @case('twitter')
                            <li class="animated-wrap" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                                <a class="animated-element" href="{{ $socialMedia->url }}" style="transform: matrix(1, 0, 0, 1, 0, 0);"><i class="fab fa-twitter"></i> </a>
                            </li>
                        @break
                        @case('linkedin')
                            <li class="animated-wrap" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                                <a class="animated-element" href="{{ $socialMedia->url }}" style="transform: matrix(1, 0, 0, 1, 0, 0);"><i class="fab fa-linkedin-in"></i> </a>
                            </li>
                        @break
                        @case('instagram')
                            <li class="animated-wrap" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                                <a class="animated-element" href="{{ $socialMedia->url }}" style="transform: matrix(1, 0, 0, 1, 0, 0);"><i class="fab fa-instagram"></i> </a>
                            </li>
                        @break
                    @endswitch
                @endforeach
            </ul>
          </div>
        </div>
        <div class="col-1 col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-center">
          <a class="menu_bars menu-bars-setting sidemenu_toggle link">
            <div class="menu-lines">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </a>
        </div>
        <div class="col-6 col-lg-4 d-flex justify-content-end align-items-center pl-2 pl-lg-0">
          <img src="{{ asset('app/images/111.png') }}" class="image-vision ml-3 d-none d-lg-block">
          <a href="javascript:void(0)" class="btn-setting link btn-hvr-up btn-hvr-whatsapp color-white ml-lg-4 d-lg-inline-block"><i class="fab fa-whatsapp"></i> +669 9 234 812</a>
        </div>
      </div>
    </section>
    <header class="cursor-light main-header">
      <nav class="navbar navbar-top-default navbar-expand-lg nav-three-circles bottom-nav nav-box-shadow no-animation">
        <div class="container-fluid">
          <a class="logo ml-lg-1" href="javascript:void(0)">
            <img src="{{ asset('app/images/logo-white.png') }}" class="logo-default" alt="logo" title="Logo" />
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
      <!-- side menu open button -->
      <!--    <a class="menu_bars menu-bars-setting animated-wrap sidemenu_toggle d-lg-inline-block d-none">-->
      <!--        <div class="menu-lines animated-element">-->
      <!--            <span></span>-->
      <!--            <span></span>-->
      <!--            <span></span>-->
      <!--        </div>-->
      <!--    </a>-->
      <!-- Side Menu -->
      <div class="side-menu center">
        <div class="quarter-circle">
          <div class="menu_bars2 active" id="btn_sideNavClose">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="inner-wrapper justify-content-center">
          <div class="col-md-12 text-center">
            <a href="javascript:void(0)" class="logo-full mb-4"><img src="{{ asset('app/images/logo-white.png') }}" alt="" /></a>
          </div>
          <nav class="side-nav m-0">
            <ul class="navbar-nav flex-lg-row">
              <li class="nav-item"><a href="#home" class="scroll nav-link link active">الرئيسية</a></li>
              <li class="nav-item"><a href="#about" class="scroll nav-link link">من نحن</a></li>
              <li class="nav-item"><a href="#service" class="scroll nav-link link">خدماتنا</a></li>
              <li class="nav-item"><a href="#work" class="scroll nav-link link">معرض اعمالنا</a></li>
              <li class="nav-item"><a href="#clients" class="scroll nav-link link">عملائنا</a></li>
              <li class="nav-item"><a href="#blog" class="scroll nav-link link">المدونة</a></li>
              <li class="nav-item"><a href="#contact" class="scroll nav-link link">اتصل بنا</a></li>
            </ul>
          </nav>

          <div class="side-footer text-white w-100">
            <ul class="social-icons-simple">
              <li class="side-menu-icons">
                <a href="javascript:void(0)"><i class="fab fa-facebook-f color-white"></i> </a>
              </li>
              <li class="side-menu-icons">
                <a href="javascript:void(0)"><i class="fab fa-instagram color-white"></i> </a>
              </li>
              <li class="side-menu-icons">
                <a href="javascript:void(0)"><i class="fab fa-twitter color-white"></i> </a>
              </li>
            </ul>
             <p class="copyrights mt-2 mb-2">جميع الحقوق محفوظة لمؤســســـة نفاذ للمقاولات © 2020 </p>
          </div>
        </div>
      </div>
      <a id="close_side_menu" href="javascript:void(0);" style="display: none;"></a>
      <!--Side Menu-->
    </header>
    <section id="home" class="p-0 h-100vh cursor-light homeIntro">
      <div class="sliderHome swiper-container">
        <div class="swiper-wrapper h-auto">
            @foreach($sliders as $slider)
                <div class="swiper-slide">
                    <div class="item-slider" style="background-image: url('{{ asset('/storage/'.$slider->image->path) }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
                      <div class="container">
                        <div class="row align-items-center">
                          <div class="col-lg-6 mx-auto">
                            <div class="homeIntro-content">
                              <h1 class="homeIntro-title">{{ $slider->title }}</h1>
                              <p class="homeIntro-desc">{{ $slider->sub_title }}</p>
                               <div class="homeIntro-action">
                                <a href="{{ $slider->link }}" class="btn-setting color-white btn-hvr-up btn-hvr-yellow link">قراءة المزيد</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-action">
          <div class="swiper-button-next"><i class="fal fa-chevron-left"></i></div>
          <div class="swiper-button-prev"><i class="fal fa-chevron-right"></i></div>
        </div>
      </div>
    </section>

    <!--About start-->
    <section class="about overflow-visible bg-dark1" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 pl-5 mb-5 mb-lg-0 wow fadeInLeft">
            <div class="rare-box"></div>
            <img src="{{ asset('app/images/img09.jpg') }}" class="about-img-small position-relative w-100" alt="" />
          </div>
          <div class="col-lg-6 pl-6">
            <div class="main-title text-lg-right offset-md-1 mb-0 wow fadeInUp" data-wow-delay="300ms">
              <h2 class="wow fadeInUp font-weight-light" data-wow-delay="400ms">تعرف علينا</h2>
                <p class="pb-4 wow fadeInUp" data-wow-delay="500ms">{{ $about_us->where('key' , 'description')->first()->value }}</p>
              <ul class="pb-5 text-right wow fadeInUp" data-wow-delay="600ms">
                  @foreach($about_us->where('key' , 'lines') as $line)
                      <li>{{ $line->value }}</li>
                  @endforeach
              </ul>
{{--              <a href="javascript:void(0)" class="btn-setting color-black btn-hvr-up btn-yellow btn-hvr-pink text-white link wow fadeInUp" data-wow-delay="700ms">--}}
{{--                قراءة المزيد--}}
{{--              </a>--}}
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--About end-->

    <!-- About Boxes start -->
    <section class="bg-dark2" id="service">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="main-title wow fadeIn" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;">
              <h2 class="mb-0">خدماتنا</h2>
            </div>
          </div>
        </div>
        <div class="containersliderService">
          <div class="sliderService swiper-container">
            <div class="swiper-wrapper h-auto">
                @foreach($services as $service)
                    <div class="swiper-slide team-col">
                        <div class="team-image">
                            <img src="{{ asset('/storage/' . $service->image->path) }}" alt="team1" class="m-image1" />
                        </div>
                        <div class="team-classic-content hvr-team">
                            <h3 class="mb-3 text-capitalize color-black">{{ $service->name }}</h3>
                            <p class="mt-3 mb-3 color-black">{{ $service->body }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
          <div class="swiper-action">
            <div class="swiper-button-next"><i class="fal fa-chevron-left"></i></div>
            <div class="swiper-button-prev"><i class="fal fa-chevron-right"></i></div>
          </div>
        </div>
      </div>
    </section>
    <!-- About Boxes ends -->

    <!-- Work Starts -->
    <section id="work" class="pb-0 bg-dark1">
      <div class="container-fluid px-0">
        <div class="row">
          <div class="col-md-12">
            <div class="main-title wow fadeIn mb-5" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;">
              <h2 class="mb-0">اعمالنا</h2>
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s">
          <div class="button-group filters-button-group pr-4 pr-sm-0">
            <div class="swiper-container sliderFilter">
              <div class="swiper-wrapper h-auto">
                <div class="swiper-slide">
                  <button class="button is-checked" data-filter="*">الكل</button>
                </div>
                @foreach($categories as $category)
                  <div class="swiper-slide">
                      <button class="button" data-filter=".proj-{{ $category->id }}">{{ $category->title }}</button>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="row no-gutters grid wow row-mobile-md fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.1s" style="margin-right: 1px">
            @foreach($jobs as $job)
                <div class="col-lg-4 col-md-4 col-6 cbp-item element-item proj-{{ $job->category->id }}">
                    <div class="cbp-caption cbp-lightbox openAlbum" data-fancybox="gallery" data-id="{{$job->albums()->first()->id}}"  data-caption="Caption {{$job->id}}">
                        <div class="cbp-caption-defaultWrap">
                            <img src="{{ asset('storage/'.$job->albums()->first()->images()->first()->path) }}" alt="work" />
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body">
                                    <p>{{ $jobs->first()->albums()->first()->title }}</p>
                                    <div class="cbp-l-caption-title">{{ $job->description }}</div>
                                    <span class="work-icon">
                                         <i class="fa fa-arrow-left"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </section>
    <!-- Work ends -->
    <section id="clients" class="bg-white p-0 cursor-light no-transition">
      <h2 class="d-none">heading</h2>
      <div
        class="section-padding parallax-setting parallaxie parallax2"
        style="background-image: url('https://megaone.acrothemes.com/ad-agency/img/parallax2.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;"
      >
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="main-title wow fadeIn" data-wow-delay="300ms">
                <h2 class="mb-0">آراء العملاء</h2>
              </div>
            </div>
          </div>
          <div class="testimonial-images d-lg-block d-none">
            <div class="item-testimonial-images">
              <img src="{{ asset('app/images/testimonial4.png') }}" class="animated-element" />
            </div>
            <div class="item-testimonial-images">
              <img src="{{ asset('app/images/testimonial4.png') }}" class="animated-element" />
            </div>
            <div class="item-testimonial-images">
              <img src="{{ asset('app/images/testimonial4.png') }}" class="animated-element" />
            </div>
            <div class="item-testimonial-images">
              <img src="{{ asset('app/images/testimonial4.png') }}" class="animated-element" />
            </div>
            <div class="item-testimonial-images">
              <img src="{{ asset('app/images/testimonial4.png') }}" class="animated-element" />
            </div>
            <div class="item-testimonial-images">
              <img src="{{ asset('app/images/testimonial4.png') }}" class="animated-element" />
            </div>
            <div class="item-testimonial-images">
              <img src="{{ asset('app/images/testimonial4.png') }}" class="animated-element" />
            </div>
            <div class="item-testimonial-images">
              <img src="{{ asset('app/images/testimonial4.png') }}" class="animated-element" />
            </div>
          </div>
          <div class="row align-items-center position-relative">
            <div class="col-lg-6 mx-auto">
              <div class="containersliderService">
                <div class="swiper-container sliderTestimonial testimonial-two mx-auto">
                  <div class="swiper-wrapper h-auto">
                      @foreach($opinions as $opinion)
                          <div class="swiper-slide">
                              <div class="testimonial-item">
                                  <p class="color-white testimonial-para mb-15px">{{ $opinion->text }}</p>
                                  <div class="testimonial-post">
                                      <a href="javascript:void(0)" class="post"><img src="{{ asset('storage/'.$opinion->image->path) }}" alt="image" /></a>
                                      <div class="text-content">
                                          <h5 class="color-white text-capitalize">{{ $opinion->name }}</h5>
                                          <p class="color-white">{{ $opinion->profession }}</p>
                                          <div class="rating">
                                              @for($i =0; $i<$opinion->rate;  $i++)
                                                  <i class="fa fa-star"></i>
                                              @endfor
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Blog start -->
    <section id="blog" class="half-section p-0 bg-change bg-yellow">
      <div class="swiper-container sliderBlog">
        <div class="swiper-wrapper h-auto h-auto">
            @foreach($blogs as $blog)
                <div class="swiper-slide">
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
                </div>
            @endforeach
        </div>
        <div class="swiper-action w-100">
          <div class="swiper-button-next"><i class="fal fa-chevron-left"></i></div>
          <div class="swiper-button-prev"><i class="fal fa-chevron-right"></i></div>
        </div>
      </div>
    </section>
    <!-- Blog ends -->

    <!-- Contact & Map starts -->
    <section id="contact" class="bg-light-gray bg-dark1">
      <div class="container">
        <div class="row mx-lg-0">
          <div class="col-lg-6 col-md-6 col-sm-12 p-0">
            <div class="contact-box bg-dark2">
              <div class="main-title text-center text-md-right mb-4">
                <h2 class="font-weight-normal">اتصل بنا</h2>
              </div>

              <div class="text-center text-md-right">
                <!--Address-->
                <p class="mb-3">{{ $call_us->where('key', 'address')->first()->value }}</p>

                <!--Phone-->
                <p class="mb-3">
                    الهاتف : {{ $call_us->where('key', 'phone')->first()->value }}
                </p>

                <!--Email-->
                <p class="mb-3">
                  البريد الالكتروني: <a href="mailto:{{ $call_us->where('key', 'email')->first()->value }}" class="color-white">{{ $call_us->where('key', 'email')->first()->value }}</a> <br />
                </p>

              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 p-0 col-map box-shadow-map">
            <div id="map" class="bg-light-gray map"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact & Map ends -->

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
{{--    <script src="{{ asset('app/js/fancybox.min.js') }}"></script>--}}
    <script src="{{ asset('app/js/isotope.min.js') }}"></script>
    <script src="{{ asset('app/js/swiper.min.js') }}"></script>
    <script src="{{ asset('app/js/wow.min.js') }}"></script>
    <script src="{{ asset('app/js/function.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('cms/fancyBox/source/jquery.fancybox.js') }}"></script>
    <script>
        $('.openAlbum').click(function (event){
            var ablumId = $(this).data('id');
            // console.log(event);
            $.ajax({
                url:"{{ route('album.images') }}",
                type:"get",
                data:{
                    "id" : ablumId
                },
                success: function (data){
                    console.log(data);
                    var img=[];
                    $.each(data.images, function( index, value ) {
                        img.push({src:  "http://127.0.0.1:8000/storage/" + value.path, href: "http://127.0.0.1:8000/storage/" + value.path});
                    });
                    console.log(img)
                    $.fancybox.open
                    (img
                        , {
                            loop : false,
                            transitionEffect: "fade",
                            animationEffect: "fade",
                            transitionDuration: 1000,
                        })
                }
            })
        });
        // $('[data-fancybox="gallery"]').fancybox({
        //     selector : '.imglist a:visible',
        //     toolbar:true,
        // });
    </script>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        var uluru = { lat: {{ $maps->where('key', 'lat')->first()->value }}, lng: {{ $maps->where('key', 'lng')->first()->value }} };
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
