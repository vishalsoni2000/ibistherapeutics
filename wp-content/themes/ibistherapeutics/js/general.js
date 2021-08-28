$headerHeight = '';
$headerHeightscroll = '';

jQuery(document).ready(function($) {
        $(".navbar-toggle").click(function() {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $('.mobile_menu').animate({
                    'right': '-100%'
                }, 500);
            } else {
                $(this).addClass("active");
                $('.mobile_menu').animate({
                    'right': '0'
                }, 500);
            }
        });
        $(".mobile_menu ul li").find("ul").parents("li").prepend("<span></span>");
        $(".mobile_menu ul li ul").addClass("first-sub");
        $(".mobile_menu ul li ul").prev().prev("span").addClass("first-em");
        $(".mobile_menu ul li ul ul").removeClass("first-sub");
        $(".mobile_menu ul li ul ul").addClass("second-sub");
        $(".mobile_menu ul li ul ul").prev().prev("span").addClass("second-em");
        $(".mobile_menu ul li ul ul").prev().prev("span").removeClass("first-em");
        $(".mobile_menu ul li span.first-em").click(function(e) {
            $(".mobile_menu ul li span.first-em").removeClass('active');
            $(".mobile_menu ul li span.second-em").removeClass('active');
            if ($(this).parent("li").hasClass("active")) {
                $(this).parent("li").removeClass("active");
                $(this).next().next("ul.first-sub").slideUp();
                $(".mobile_menu ul li ul.second-sub li").removeClass("active");
                $(".mobile_menu ul li ul.second-sub").slideUp();
            } else {
                $(this).addClass('active');
                $(".mobile_menu ul li").removeClass("active");
                $(this).parent("li").addClass("active");
                $(".mobile_menu ul li ul.first-sub").slideUp();
                $(this).next().next("ul.first-sub").slideDown();
                $(".mobile_menu ul li ul.second-sub li").removeClass("active");
                $(".mobile_menu ul li ul.second-sub").slideUp();
            }
        });
        $(".mobile_menu ul li ul.first-sub li span.second-em").click(function(e) {
            $(".mobile_menu ul li span.second-em").removeClass('active');
            if ($(this).parent("li").hasClass("active")) {
                $(this).parent("li").removeClass("active");
                $(this).next().next("ul.second-sub").slideUp();
            } else {
                $(this).addClass('active');
                $(".mobile_menu ul li ul li").removeClass("active");
                $(this).parent("li").addClass("active");
                $(".mobile_menu ul li ul.second-sub").slideUp();
                $(this).next().next("ul.second-sub").slideDown();
            }
        });
        $(".close-btn").click(function() {
            $('.mobile_menu').animate({
                'right': '-100%'
            }, 500);
            $(" .navbar-toggle").removeClass("active");
        });

    // Affiliates
    // $('.affiliates-section ul').slick({
    //     infinite: true,
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     dots: false,
    //     arrows: false,
    //     autoplay: true,
    //     responsive: [
    //       {
    //           breakpoint: 992,
    //           settings: {
    //               slidesToShow: 3,
    //               slidesToScroll: 1,
    //               dots: true,
    //         }
    //       },
    //       {
    //           breakpoint: 767,
    //           settings: {
    //               slidesToShow: 2,
    //               slidesToScroll: 1,
    //               dots: true,
    //         }
    //       },
    //       {
    //           breakpoint: 480,
    //           settings: {
    //               slidesToShow: 1,
    //               slidesToScroll: 1,
    //               dots: true,
    //         }
    //       }
    //     ]
    // });

    AOS.init();


});


jQuery(window).on('load resize ready', function($) {

    // setTimeout(function(){
    //     $headerHeight = jQuery('header').outerHeight();
    //     jQuery('#wrapper').css('padding-top', $headerHeight);
    // },500);
    if( jQuery(window).scrollTop() > 50 ){
        setTimeout(function(){
            stickyHeader();
        },500);
    }


});

jQuery(window).scroll(function(event) {
    stickyHeader();

    // Fingerprinting Section
    if( jQuery(window).scrollTop() < 1400 || jQuery(window).scrollTop() > 2650){
        jQuery('.the-solution-section').addClass("remove-animation");
        jQuery('.the-solution-section').removeClass("add-animation");

        removeSolutionAniamation();
    } else {
      jQuery('.the-solution-section').removeClass("remove-animation");
      jQuery('.the-solution-section').addClass("add-animation");

      addSolutionAniamation();
    }

    // Toxicity Section
    if( jQuery(window).scrollTop() < 2300 || jQuery(window).scrollTop() > 4250){
        jQuery('.toxicity-section').addClass("remove-animation");
        jQuery('.toxicity-section').removeClass("add-animation");

        removeAniamation();
    } else {
      jQuery('.toxicity-section').removeClass("remove-animation");
      jQuery('.toxicity-section').addClass("add-animation");

      addAniamation();
    }
});


function addSolutionAniamation() {
  // console.log('test...');
  if (!jQuery( ".the-solution-section" ).hasClass('new-section')) {
    if (jQuery( ".the-solution-section" ).hasClass('add-animation')) {
      jQuery('.the-solution-listing .single-list:first-child h4').click(function() {

          jQuery('.table-box-left').css('top','8.2%');
          setTimeout(function(){
            jQuery('.table-box-right').css('top','8.2%');
          }, 1000);

          setTimeout(function(){
            jQuery('.solution-image img.solution-graph-image').addClass("blur-img");
            jQuery('.table-box-left').addClass("blur-img");
            jQuery('.table-box-right').addClass("blur-img");
         }, 2000);

         setTimeout(function(){
           jQuery('.table-box-center').css('top','0');
         }, 2000);
      });
    }
  }

  if (jQuery( ".the-solution-section" ).hasClass('new-section')) {
    if (jQuery( ".the-solution-section" ).hasClass('add-animation')) {
      jQuery('.the-solution-listing .single-list:first-child h4').click(function() {

          jQuery('.table-box-left').css('top','4%');
          setTimeout(function(){
            jQuery('.table-box-right').css('top','4%');
          }, 1000);

          setTimeout(function(){
            jQuery('.solution-image img.solution-graph-image').addClass("blur-img");
            jQuery('.table-box-left').addClass("blur-img");
            jQuery('.table-box-right').addClass("blur-img");
         }, 2000);

         setTimeout(function(){
           jQuery('.table-box-center').css('top','0');
         }, 2000);
      });
    }
  }
}

function removeSolutionAniamation() {
  // console.log('test...');
  if (jQuery( ".the-solution-section" ).hasClass('remove-animation')) {

      jQuery('.table-box-left').css('top','100%');
      jQuery('.table-box-right').css('top','100%');
      // setTimeout(function(){
        jQuery('.solution-image img.solution-graph-image').removeClass("blur-img");
        jQuery('.table-box-left').removeClass("blur-img");
        jQuery('.table-box-right').removeClass("blur-img");
     // }, 2000);
      jQuery('.table-box-center').css('top','100%');
  }
}


function addAniamation() {
  if (!jQuery( ".toxicity-section" ).hasClass('new-section')) {
    if (jQuery( ".toxicity-section" ).hasClass('add-animation')) {
      jQuery('.toxicity-section .table-image').click(function() {
         jQuery('.toxicity-section .graph-line').css('right','-87px');
         jQuery('.toxicity-section .table-box').css('top','4%');
     });
    }
  }
  if (jQuery( ".toxicity-section" ).hasClass('new-section')) {
    if (jQuery( ".toxicity-section" ).hasClass('add-animation')) {
      jQuery('.toxicity-section .table-image').click(function() {
         jQuery('.toxicity-section .graph-line').css('right','-100px');
         jQuery('.toxicity-section .table-box').css('top','4%');
     });
    }
  }
}

function removeAniamation() {
  if (!jQuery( ".toxicity-section" ).hasClass('new-section')) {
    if (jQuery( ".toxicity-section" ).hasClass('remove-animation')) {
         jQuery('.toxicity-section .graph-line').css('right','3.7%');
         jQuery('.toxicity-section .table-box').css('top','140%');
    }
  }
  if (jQuery( ".toxicity-section" ).hasClass('new-section')) {
    if (jQuery( ".toxicity-section" ).hasClass('remove-animation')) {
         jQuery('.toxicity-section .graph-line').css('right','3.7%');
         jQuery('.toxicity-section .table-box').css('top','140%');
    }
  }
}

/* sticky header script */
function stickyHeader() {
    var sticky = jQuery('header'),
        scroll = jQuery(window).scrollTop();

    if (scroll >= 50) {
        sticky.addClass('sticky');
        $headerHeightscroll = jQuery('header.sticky').outerHeight();
    } else sticky.removeClass('sticky');
}

/* function for Lazyload and set image to background in InternetExplorer 11 Only */
var userAgent, ieReg, ie;
userAgent = window.navigator.userAgent;
ieReg = /msie|Trident.*rv[ :]*11\./gi;
ie = ieReg.test(userAgent);
if (ie) {
    jQuery(".innbaner").each(function() {
        var $container = jQuery(this),
            imgUrl = $container.find("img").prop("src");
        if (imgUrl) {
            $container.css({
                "background-image": 'url(' + imgUrl + ')',
                "background-size": "cover",
                "background-position": "center center"
            }).addClass("custom-object-fit");
            jQuery(".innbaner img").css("display", "none");
        }
    });
}
