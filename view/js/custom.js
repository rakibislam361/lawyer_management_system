/******************************************
    File Name: custom.js
    Template Name: zustyse - Responsive HTML5 Theme 
    Created By: htmldotdesign
    Envato Profile: https://themeforest.net/user/htmldotdesign
    Website: https://html.design
    Version: 1.0
******************************************/

"use strict";

/**== wow animation ==**/

new WOW().init();

/**== loader js ==*/

$(window).load(function() {
    $(".bg_load").fadeOut("slow");
})

/**== Menu js ==**/

$("#navbar_menu").menumaker({
    title: "Menu",
    format: "multitoggle"
});

/**== gallery js ==**/

$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});

/** progress_bar js **/
    
     $(document).ready(function() {
      $('.progress .progress-bar').css("width",
                function() {
                    return $(this).attr("aria-valuenow") + "%";
                }
        )
    });
    
/** Casestudies Tab_bar js **/  
    
    $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});

    
/**===== Revolution Slider =====**/

var tpj = jQuery;
var revapi4;
tpj(document).ready(function() {
    if (tpj("#rev_slider_4_1").revolution == undefined) {
        revslider_showDoubleJqueryError("#rev_slider_4_1");
    } else {
        revapi4 = tpj("#rev_slider_4_1").show().revolution({
            sliderType: "standard",
            jsFileLocation: "revolution/js/",
            sliderLayout: "fullwidth",
            dottedOverlay: "none",
            delay: 7000,
            navigation: {
                keyboardNavigation: "off",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                onHoverStop: "off",
                touch: {
                    touchenabled: "on",
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: "horizontal",
                    drag_block_vertical: false
                },
                arrows: {
                    style: "zeus",
                    enable: true,
                    hide_onmobile: true,
                    hide_under: 600,
                    hide_onleave: true,
                    hide_delay: 200,
                    hide_delay_mobile: 1200,
                    tmp: '<div class="tp-title-wrap"><div class="tp-arr-imgholder"></div></div>',
                    left: {
                        h_align: "left",
                        v_align: "center",
                        h_offset: 30,
                        v_offset: 0
                    },
                    right: {
                        h_align: "right",
                        v_align: "center",
                        h_offset: 30,
                        v_offset: 0
                    }
                },
                bullets: {
                    enable: true,
                    hide_onmobile: true,
                    hide_under: 600,
                    style: "metis",
                    hide_onleave: true,
                    hide_delay: 200,
                    hide_delay_mobile: 1200,
                    direction: "horizontal",
                    h_align: "center",
                    v_align: "bottom",
                    h_offset: 0,
                    v_offset: 30,
                    space: 5,
                    tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
                }
            },
            viewPort: {
                enable: true,
                outof: "pause",
                visible_area: "80%"
            },
            responsiveLevels: [1240, 1024, 778, 480],
            gridwidth: [1240, 1024, 778, 480],
            gridheight: [900, 900, 500, 400],
            lazyType: "none",
            parallax: {
                type: "mouse",
                origo: "slidercenter",
                speed: 3000,
                levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
            },
            shadow: 0,
            spinner: "off",
            stopLoop: "off",
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: "off",
            autoHeight: "off",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener: false,
            }
        });
    }
});

/**===== End slider =====**/
    
    
/** header fixed js **/

$(window).scroll(function(){
    if ($(window).scrollTop() >= 300) {
       $('.header_fixed_on_scroll').addClass('fixed-header');
    }
    else {
       $('.header_fixed_on_scroll').removeClass('fixed-header');
    }
});


/*!-- half slider --*/
$('.owl_half_slider').owlCarousel({
    stagePadding: 60,
    loop:true,
    margin:20,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        },
        1200:{
            items:3
        }
    }
})
    
    /** mousewheel slider **/

        var owl = $('.owl-carousel-mousewheel');
        owl.owlCarousel({
            loop: true,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 4
                },
                1640: {
                    items: 4
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function(e) {
            if (e.deltaY > 0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });


//service and service options
function mservice(datavalue){
    $.ajax({
        url:  'action.php',
        type: 'POST',
        data: {data : datavalue},
        success: function(result){
            $('#services').html(result);
        }
    });
}

// Lawyer Signup form
$(document).ready(function(){
    $('#myForm').on('submit', function(e){
        e.preventDefault();
        var fd =  new FormData(this);
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: fd,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success: function(data){
                var result = data;
                //  console.log(result.message);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                if(result.url && result.url.length > 0){
                    setTimeout(function(){
                        window.location.href = result.url
                    }, 3000)
                }
            }
        });
    });

});


// Client Signup form
$(document).ready(function(){
    $('#cForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
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


// Contact form submit
$(document).ready(function(){
    $('#form_contact').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
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


// Client form submit
$(document).ready(function(){
    $('#pform').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(data){
                var result = JSON.parse(data);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
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



// client submit case file
$(document).ready(function(){
    $('#casedetails').on('submit', function(e){
        e.preventDefault();
        var fd =  new FormData(this);
        $.ajax({
            url: 'action.php',
            type: 'post',
            data: fd,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            success: function(data){
                var result = data;
                //  console.log(result.message);
                $.toast({
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
                    icon: result.status
                });
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000)

            }
        });
    });



    $('.popupBtn').on('click', function(e){
        e.preventDefault();
        var id = $(this).val();
        $('#exampleModal input[name=lid]').val(id);
        $('#exampleModal').modal('show');

    })

});

// Login popup
$('.loginPopup').on('click',function (e) {
    e.preventDefault();
    $('#loginModal').modal('show');
});


// Login form submit
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
                    hading:'notification',
                    text: result.message,
                    position:'top-center',
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

// update profile
$(document).ready(function(){
    var form = $('#pform');
    $('#update').click(function(){
        $.ajax({
            url: form.attr("action"),
            type: 'post',
            data: $("pform input").serialize(),

            success: function(data){
                console.log(data);
            }
        });
    });

});


//Click event handler for nav-items
$(document).ready(function(){
    $('.first-ul li a').on("click", function(e) {
       // $('.first-ul li a').removeClass("active");
        $(this).addClass("active");

    });
});

// user profile datatable
$(document).ready( function () {
    $('#myTable').DataTable();
} );

// user case details datatable
$(document).ready( function () {
    $('#myDataTable').DataTable();
} );