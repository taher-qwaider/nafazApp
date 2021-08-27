jQuery(window).on("load", function () {
    "use strict";

    /*  ===================================
     Loading Timeout
     ====================================== */
    $("#loader-fade").fadeOut(800);
});

jQuery(function ($) {
    "use strict";

    var $window = $(window);
    var windowsize = $(window).width();

    /* ===================================
       Nav Scroll
       ====================================== */

    $(".scroll").on("click", function(event){
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top - 40}, 1100);
    });
    /* ====================================
       Nav Fixed On Scroll
       ======================================= */
    if (jQuery(".main-header").length > 0) {
        $(window).on('scroll', function () {
          if ($(this).scrollTop() >= 80) { // Set position from top to add class
              $('header').addClass('header-appear');
          }
          else {
              $('header').removeClass('header-appear');
          }
    });
    
    /*bottom menu fix*/
    if ($("nav.navbar").hasClass("bottom-nav")) {
        var navHeight = $(".bottom-nav").offset().top;
        $(window).on("scroll", function () {
            if ($window.scrollTop() > navHeight) {
                $('header').addClass('header-appear');
            } else {
                $('header').removeClass('header-appear');
            }
        });
    }
  }

    /* ===================================
       Side Menu
       ====================================== */

    if ($(".sidemenu_toggle").length) {
        $(".sidemenu_toggle").on("click", function () {
            $(".pushwrap").toggleClass("active");
            $(".side-menu").addClass("side-menu-active"), $("#close_side_menu").fadeIn(700)
        }), $("#close_side_menu").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $(this).fadeOut(200), $(".pushwrap").removeClass("active")
        }), $(".side-nav .navbar-nav .nav-link").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active")
        }), $("#btn_sideNavClose").on("click", function () {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active")
        })
    }
    /* =====================================
       Wow
       ======================================== */

    if ($(window).width() > 767) {
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        new WOW().init();
    }

    /* ===================================
       isotope
       ====================================== */
  var $grid = $(".grid").isotope({
    itemSelector: ".element-item",
    layoutMode: "fitRows",
    isOriginLeft: false,
    transitionDuration: 800,
  });
  ////////////////// filter functions
  var filterFns = {
    ////////////////// show if name ends with -ium
    ium: function () {
      var name = $(this).find(".name").text();
      return name.match(/ium$/);
    },
  };
  ////////////////// bind filter button click
  $(".filters-button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    ////////////////// use filterFn if matches value
    filterValue = filterFns[filterValue] || filterValue;
    $grid.isotope({ filter: filterValue });
  });
  ////////////////// change is-checked class on buttons
  $(".button-group").each(function (i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on("click", "button", function () {
      $buttonGroup.find(".is-checked").removeClass("is-checked");
      $(this).addClass("is-checked");
    });
  });

    /* ===================================
     gallery_fancybox
       ====================================== */
       $('.gallery_fancybox').click(function(){
        var img = [
           {
             src  : 'images/image-03.png',
           },
           {
             src  : 'images/image-04.jpg',
           },
           {
            src  : 'images/image-07.jpg',
          }
         ];
         $.fancybox.open
         // Options will go here
         (img, {
           loop : false,
           transitionEffect: "fade",
           animationEffect: "fade",
           transitionDuration: 1000,
         })
       })
       
});

if (jQuery(".sliderHome").length > 0) {
  var sliderHome = new Swiper(".sliderHome", {
    // Optional parameters
    speed: 1500,
    slidesPerView: 1,
    // effect: 'fade',
    autoplay: {
      delay: 5000,
    },
    parallax: true,

    // If we need pagination

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
}
if (jQuery(".sliderService").length > 0) {
  var sliderService = new Swiper(".sliderService", {
    speed: 1000,
    // grabCursor: true,
    // effect: 'fade',
    // mousewheelControl: 1,
    // autoplay: {
    // 	delay: 5000,
    // },
    // loop:true,
    autoplay: false,
    // spaceBetween: 0,
    // delayBetweenSlides: 2000,
    navigation: {
      nextEl: '.containersliderService .swiper-button-next',
      prevEl: '.containersliderService .swiper-button-prev',
    },
    pagination: {
      el: '.sliderService .swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      4000: {
        slidesPerView: 4
      } ,
      1024: {
          slidesPerView: 4
      },
      768: {
          slidesPerView: 2
      },
      640: {
          slidesPerView: 2
      },
      500: {
          slidesPerView: 2
      }
  } 
  });
  
}


if (jQuery(".sliderTestimonial").length > 0) {
  var sliderTestimonial = new Swiper(".sliderTestimonial", {
    // Optional parameters
    speed: 1000,
    spaceBetween: 25,
    slidesPerView: 1,
    autoplay: {
      delay: 5000,
    },

    // If we need pagination
    pagination: {
      el: '.containersliderService .swiper-pagination',
      clickable: true,
    },

    // Navigation arrows
  
  });

}


if (jQuery(".sliderBlog").length > 0) {
  var sliderBlog = new Swiper(".sliderBlog", {
    // Optional parameters
    speed: 1300,
    spaceBetween: 25,
    slidesPerView: 1,
    // autoplay: {
    //   delay: 5000,
    // },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

}





if (jQuery(".sliderFilter").length > 0) {
  var sliderFilter = new Swiper(".sliderFilter", {
    // Optional parameters
    slidesPerView:"auto",

    // autoplay: {
    // 	delay: 5000,
    // },

    // If we need pagination
    pagination: {
      el: '.sliderFilter .swiper-pagination',
      // clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: '.sliderFilter .swiper-button-next',
      prevEl: '.sliderFilter .swiper-button-prev',
    },

  });

}
