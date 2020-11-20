(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
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


//admin login form
$(document).ready(function(){
    $('#lform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hadding:'notification',
                    text: result.message,
                    postion:'top-center',
                    icon: result.status
                });
                if(result.url && result.url.length > 0){
                    setTimeout(function(){
                        window.location.href = result.url
                    }, 2000)
                }
            }
        });
    });
});

// //enroll membership form
//
// $(document).ready(function(){
//     $('#m-form').on('submit', function(e){
//         e.preventDefault()
//         $.ajax({
//             url: 'action.php',
//             type: 'post',
//             data: $(this).serialize(),
//             success: function(data){
//                 var result = JSON.parse(data);
//                 $.toast({
//                     hadding:'notification',
//                     text: result.message,
//                     postion:'top-center',
//                     icon: result.status
//                 });
//                 setTimeout(function(){
//                     location.reload();
//                 }, 2000);
//             }
//         });
//     });
//
//     //get value from url to popup
//     $('#comment_modal').on('click', function (e) {
//         e.preventDefault();
//         var idval = $(this).attr('mival');
//         $('input[name=comment_case_id]').val(idval);
//         $('#comments').modal('show');
//     })
// });
//
//
// // Lawyer request send for approval
// $(document).ready(function(){
//     $('#app-form').on('submit', function(e){
//         e.preventDefault()
//         $.ajax({
//             url: 'action.php',
//             type: 'post',
//             data: $(this).serialize(),
//             success: function(data){
//                 var result = JSON.parse(data);
//                 $.toast({
//                     hadding:'notification',
//                     text: result.message,
//                     postion:'top-center',
//                     icon: result.status
//                 });
//                 setTimeout(function(){
//                     location.reload();
//                 }, 2000);
//             }
//         });
//     });
// });
