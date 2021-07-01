 /*
  **********************************************************
  * OPAQUE NAVBAR SCRIPT
  **********************************************************
  */

  // Toggle tranparent navbar when the user scrolls the page

  $(window).scroll(function() {
    if($(this).scrollTop() > 150)  /*height in pixels when the navbar becomes non opaque*/
    {
        $('.opaque-navbar').addClass('opaque');
        $('.navbar-brand').removeClass('logo-top');
         $('#navigation ul li a').addClass('text-dark');
         $('#navigation ul li a').removeClass('text-light');
         $('#logo').removeClass('logo');
          $('#logo').addClass('logo-small');
          $('#nav-icon2 span').addClass('opencolor');
         $( '#logo' ).attr({
            src: "landingpage/public/assets/sailsLogo.png",
            title: "Sails Logo",
            alt: "Sails Logo"
          });
    } else {
          $('.opaque-navbar').removeClass('opaque');
          $('.navbar-brand').addClass('logo-top');
          $('#navigation ul li a').removeClass('text-dark');
          $('#navigation ul li a').addClass('text-light');
          $('#logo').removeClass('logo-small');
          $('#logo').addClass('logo');
          $('#nav-icon2 span').removeClass('opencolor');

          $( '#logo' ).attr({
            src: "landingpage/public/assets/sailsLogoWhite.png",
            title: "Sails",
            alt: "Sails Logo"
          });

    }
  });

  // MENU

  $("#nav_list").click(function(){
        // alert("The paragraph was clicked.");
        $(this).toggleClass('active');
        $('.pushmenu-push').toggleClass('pushmenu-push-toright');
        $('.pushmenu-left').toggleClass('pushmenu-open');
        $('.oi-menu').toggleClass('oi-x');
  });
  // text anim
  $('.txt').html(function(i, html) {
  var chars = $.trim(html).split("");

  return '<span>' + chars.join('</span><span>') + '</span>';
});

// hamburger
// Mansonry
  // initialize Masonry
  // external js: masonry.pkgd.js, imagesloaded.pkgd.js

  // init Masonry
var $grid = $('.grid').masonry({
    itemSelector: '.grid-item',
      percentPosition: true,
    transitionDuration: '0.6s'
  });
  // layout Masonry after each image loads
  $grid.imagesLoaded().progress( function() {
    $grid.masonry();
  });

// Slick Testimonial

$('.quotes').slick({
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 800,
    slidesToShow: 1,
    adaptiveHeight: true
  });


// vars
'use strict'
var	testim = document.getElementById("testim"),
		testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
    testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
    testimLeftArrow = document.getElementById("left-arrow"),
    testimRightArrow = document.getElementById("right-arrow"),
    testimSpeed = 4500,
    currentSlide = 0,
    currentActive = 0,
    testimTimer,
		touchStartPos,
		touchEndPos,
		touchPosDiff,
		ignoreTouch = 30;
;

window.onload = function() {

    // Testim Script
    function playSlide(slide) {
        for (var k = 0; k < testimDots.length; k++) {
            testimContent[k].classList.remove("active");
            testimContent[k].classList.remove("inactive");
            testimDots[k].classList.remove("active");
        }

        if (slide < 0) {
            slide = currentSlide = testimContent.length-1;
        }

        if (slide > testimContent.length - 1) {
            slide = currentSlide = 0;
        }

        if (currentActive != currentSlide) {
            testimContent[currentActive].classList.add("inactive");
        }
        testimContent[slide].classList.add("active");
        testimDots[slide].classList.add("active");

        currentActive = currentSlide;

        clearTimeout(testimTimer);
        testimTimer = setTimeout(function() {
            playSlide(currentSlide += 1);
        }, testimSpeed)
    }

    testimLeftArrow.addEventListener("click", function() {
        playSlide(currentSlide -= 1);
    })

    testimRightArrow.addEventListener("click", function() {
        playSlide(currentSlide += 1);
    })

    for (var l = 0; l < testimDots.length; l++) {
        testimDots[l].addEventListener("click", function() {
            playSlide(currentSlide = testimDots.indexOf(this));
        })
    }

    playSlide(currentSlide);

    // keyboard shortcuts
    document.addEventListener("keyup", function(e) {
        switch (e.keyCode) {
            case 37:
                testimLeftArrow.click();
                break;

            case 39:
                testimRightArrow.click();
                break;

            case 39:
                testimRightArrow.click();
                break;

            default:
                break;
        }
    })

		testim.addEventListener("touchstart", function(e) {
				touchStartPos = e.changedTouches[0].clientX;
		})

		testim.addEventListener("touchend", function(e) {
				touchEndPos = e.changedTouches[0].clientX;

				touchPosDiff = touchStartPos - touchEndPos;

				console.log(touchPosDiff);
				console.log(touchStartPos);
				console.log(touchEndPos);


				if (touchPosDiff > 0 + ignoreTouch) {
						testimLeftArrow.click();
				} else if (touchPosDiff < 0 - ignoreTouch) {
						testimRightArrow.click();
				} else {
					return;
				}

		})
}
