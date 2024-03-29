(function($) {
  "use strict"; // Start of use strict
  
  // Toggle the side navigation
  $(document).ready(function () {
    var navState = localStorage.getItem('sidebar');
    if (navState == null){
      localStorage.setItem('sidebar', 'untoggled');
      $('#sidebar_loader').css('display', 'block');  
    }
    if (navState == 'toggled') {
      toggleNav();
    }
    if (navState == 'untoggled') {
      untoggleNav();
    }
  });

  $("#sidebarToggle, #sidebarToggleTop").on('click', function() {
    var navState = localStorage.getItem('sidebar');

    if (navState == 'toggled') {
      localStorage.setItem('sidebar', 'untoggled');
      untoggleNav();
    }
    if (navState == 'untoggled') {
      localStorage.setItem('sidebar', 'toggled');
      toggleNav();
    }
  });

  function toggleNav(){
    $("body").addClass("sidebar-toggled");
    $(".sidebar").addClass("toggled");
    localStorage.setItem('sidebar', 'toggled');
  }

  function untoggleNav(){
    $("body").removeClass("sidebar-toggled");
    $(".sidebar").removeClass("toggled");
    localStorage.setItem('sidebar', 'untoggled');
  }

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict
