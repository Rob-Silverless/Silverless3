//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend owl.carousel.min.js

jQuery(document).ready(function($) {
  /* ADD CLASS ON LOAD*/

  $("html")
    .delay(1500)
    .queue(function(next) {
      $(this).addClass("loaded");
      next();
    });

  //Smooth Scroll

  $("nav a, a.button, a.next-section, a.explore").click(function() {
    if ($(this).attr("href") != "#") {
      $("html, body").animate(
        {
          scrollTop: $($(this).attr("href")).offset().top - 100
        },
        500
      );
      return false;
    }
  });

  /* ADD CLASS ON SCROLL*/

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }
  });

  // ========== Controller for lightbox elements

  $(".gallery").each(function() {
    $(this)
      .find(".lightbox-gallery")
      .magnificPopup({
        type: "image",
        gallery: {
          enabled: true
        }
      });
  });

  /* Magnific Popup */

  $(".img-wrapper").each(function(gallery) {
    $(this).magnificPopup({
      delegate: 'a',
      type: 'image',
      closeOnContentClick: true,
      closeBtnInside: false,
      image: {
        verticalFit: true,
      },
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"><i class="fas fa-chevron-circle-right"></i></button>',
      },
    });
  });

  $(".post-image a").magnificPopup({
    type: "image",
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: "mfp-no-margins mfp-with-zoom",
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300
    }
  });

  // GLOBAL OWL CAROUSEL SETTINGS

  /* CLASS AND FOCUS ON CLICK */

  $(".menu-trigger").click(function() {
    $(".menu-collapse").toggleClass("visible");
    $(".current-menu-item").toggleClass("loaded");
    $(".menu-trigger").toggleClass("opened");
  });
  $(".read-more").prev().hide();
  $(".read-more").click(function(e) {
    e.preventDefault();
    $(this).prev().slideToggle();
  });

  $(".tab-trigger").click(function() {
    $(".tab-trigger.active").removeClass("active");
    $(this).addClass("active");
  });

  $(".see-more").click(function() {
    $(this)
      .closest(".camp-summary__item")
      .toggleClass("open");
  });

  // ========== Add class if in viewport on page load

  $.fn.isOnScreen = function() {
    var win = $(window);

    var viewport = {
      top: win.scrollTop(),
      left: win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return !(
      viewport.right < bounds.left ||
      viewport.left > bounds.right ||
      viewport.bottom < bounds.top ||
      viewport.top > bounds.bottom
    );
  };

  $(".slide-up, .slide-down, .slide-right, .slow-fade").each(function() {
    if ($(this).isOnScreen()) {
      $(this).addClass("active");
    }
  });

  // ========== Add class on entering viewport

  $.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();
    return elementBottom > viewportTop && elementTop < viewportBottom;
  };

  $(window).on("resize scroll", function() {
    $(".slide-up, .slide-down, .slide-right, .slow-fade").each(function() {
      if ($(this).isInViewport()) {
        $(this).addClass("active");
      }
    });
  });

  // ========== Tab Slider

  var action = false,
    clicked = false;
  var Owl = {
    init: function() {
      Owl.carousel();
    },
    carousel: function() {
      var owl;
      $(document).ready(function() {
        owl = $(".tabs").owlCarousel({
          items: 1,
          center: true,
          nav: false,
          dots: true,
          loop: true,
          margin: 10,
          dotsContainer: ".test",
          navText: ["prev", "next"]
        });
        $(".owl-next").on("click", function() {
          action = "next";
        });
        $(".owl-prev").on("click", function() {
          action = "prev";
        });
        $(".tabs-header").on("click", "li", function(e) {
          owl.trigger("to.owl.carousel", [$(this).index(), 300]);
        });
      });
    }
  };
  $(document).ready(function() {
    Owl.init();
  });

  /***********HERO SLIDER***********/
  var slideCount = $("#slider ul li").length;
  var slideWidth = $("#slider ul li").width();
  var slideHeight = $("#slider ul li").height();
  var sliderUlWidth = slideCount * slideWidth;
  $("#slider ul").css({ width: sliderUlWidth, marginLeft: -slideWidth });
  $("#slider ul li:last-child").prependTo("#slider ul");
  function moveLeft() {
    $("#slider ul").animate(
      {
        left: +slideWidth
      },
      500,
      function() {
        $("#slider ul li:last-child").prependTo("#slider ul");
        $("#slider ul").css("left", "");
      }
    );
  }
  function moveRight() {
    $("#slider ul").animate(
      {
        left: -slideWidth
      },
      500,
      function() {
        $("#slider ul li:first-child").appendTo("#slider ul");
        $("#slider ul").css("left", "");
      }
    );
  }
  $("a.control_prev").click(function() {
    moveLeft();
  });
  $("a.control_next").click(function() {
    moveRight();
  });

  //Tabs
  var initialHeight = $('.services-content-container').find('.services-tab-content').height();
  $('.services-content-container').css('height', (initialHeight + 200))

  $('.services-tab .tab').on('click', function(){
    var selectedTab = $(this).attr('data-tab');
    var tabHeight = $('#' + selectedTab).height();
    $('.services-tab .tab').removeClass('selected');
    $(this).addClass('selected');
    $('.services-tab-content').removeClass('selected');
    $('.services-content-container').css('height', (tabHeight + 200))
    $('#' + selectedTab).addClass('selected');
  })

  //Mobile Menu

  $(".mobileMenu").click(function() {
    $("nav").slideToggle(300);
  });
  /*$('').on('click', function(){
    if($('header').hasClass('open')){
      console.log('does not have class');
      $('header').removeClass('open');
    } else {
      console.log('has class');
      $('header').addClass('open');
    }
  })*/

  var navHeight = $("header").height();
  $("main").css({
    "padding-top": navHeight + "px"
  });



  // ========== Sticky
 $.fn.stickyViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();
    var viewportTop = $(window).scrollTop() + navHeight;
    var viewportBottom = viewportTop + $(window).height();
    return elementTop < viewportTop && elementBottom > viewportTop;
  };

  $(window).on("resize scroll", function() {
    $(".stickyContainer").each(function() {
      if ($(this).stickyViewport()) {
        $(this + ".sticky").addClass("fixedTop").css("top", navHeight);
      } else {
        $(this).removeClass("fixedTop");
      }
    });
  });

  // ============ Accordion
  if($('.accordion-content').attr('data-hide') == 'true'){
    $('.accordion-content').hide();
  }
  
  $('.accordion-title').on('click', function(){
    var currentAccordion = $(this).attr('data-accordion');
      $('#' + currentAccordion).slideToggle();
      if($(this).hasClass('open')){
        $(this).removeClass('open');
      } else { 
        $(this).addClass('open');
      }
  });



// Works Filter

  $(".find-work .work-filter .checkbox input").change(function() {
    
    // Destination
    
    var sectors = $(".filter .checkbox.sectors input:checked").map(function() {
      return $(this).val();
    }).toArray();
    
    var types = $(".filter .checkbox.types input:checked").map(function() {
      return $(this).val();
    }).toArray();
    
    
    $(".works-container, .projects-container").each(function() {
      var works     = $(this);
      var isSector  = false;
      var isType    = false;
      
      var show = false;
      
      // Destination
      if(sectors.length > 0) {
        for(var i = 0; i < sectors.length; i++)
          if(works.hasClass(sectors[i]))
            isSector  = true;
      } else {
        isSector  = true;
      }
      
      // Style      
      if(types.length > 0) {
        for(var i = 0; i < types.length; i++)
          if(works.hasClass(types[i]))
            isType = true;
      } else {
        isType = true;
      }
      
      if(isSector && isType) {

        show = true;
        
      } else {
        show = false;
      }
      
      if(show)
        works.fadeIn();
      else
        works.fadeOut();
    });
  });
  $('.silverless_loadmore').click(function(){
 
    var button = $(this),
        data = {
      'action': 'loadmore',
      'query': silverless_loadmore_params.posts, // that's how we get params from wp_localize_script() function
      'page' : silverless_loadmore_params.current_page
    };
 
    $.ajax({ // you can also use $.post here
      url : silverless_loadmore_params.ajaxurl, // AJAX handler
      data : data,
      type : 'POST',
      beforeSend : function ( xhr ) {
        button.text('Loading...'); // change the button text, you can also add a preloader image
      },
      success : function( data ){
        if( data ) { 
          button.text( 'Load More' ).prev().before(data); // insert new posts
          silverless_loadmore_params.current_page++;
 
          if ( silverless_loadmore_params.current_page == silverless_loadmore_params.max_page ) 
            button.remove(); // if last page, remove the button
 
          // you can also fire the "post-load" event here if you use a plugin that requires it
          // $( document.body ).trigger( 'post-load' );
        } else {
          button.remove(); // if no data, remove the button as well
        }
      }
    });
  });
}); //Don't remove ---- end of jQuery wrapper
