<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>SAILS Vessel Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no", minimum-scale=1", maximum-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('landingpage/public/assets/icon.png')}}">
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="{{ url('landingpage/node_modules/bootstrap-4/dist/css/bootstrap.min.css') }}">
    <link href="{{ url('landingpage/assets/open-iconic/font/css/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('landingpage/node_modules/normalize/normalize.css') }}">
    <!-- Slick Carousel untuk Testimonial dan Slider-->
    <link rel="stylesheet" href="{{ url('landingpage/node_modules/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ url('landingpage/node_modules/slick-carousel/slick/slick-theme.css') }}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ url('landingpage/public/assets/font/fontawesome-free5/css/all.css') }}" >
    <!-- Theme 1 -->
    <link rel="stylesheet" href="{{ url('landingpage/style.css') }}">
  </head>

  <body>
    <!-- Menu -->
    <section class="fluid-container">
      <nav id="anim" class=" navbar fixed-top navbar-expand-lg navbar-light opaque-navbar">
          <div class="container">
              <a href="/#home" class="navbar-brand logo-top"  >
                  <img id="logo" src="{{ url('landingpage/public/assets/sailsLogoWhite.png') }}"  class="d-inline-block align-top logo">
                  <span id="link" class="text-dark">
                      <i id="nav_list" class="pl-3 pr-2 pb-2"></i>
                  </span>
              </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSails" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <!-- Hamburger Menu -->
                  <div id="nav-icon2">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                </button>



              <div class="collapse navbar-collapse" id="navbarSails">
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                      </li>
                  </ul>
                  <span id="navigation" class="navbar-nav navbar-right">
                      <ul class="navbar-nav mr-auto nav-h vr-left">
                          <li class="nav-item active">
                              <a href="#home" class="nav-link text-white">Home</a>
                          </li>
                        <li class="nav-item ">
                            <a href="#about" class="nav-link text-white">About</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#pricing" class="nav-link text-white">Pricing</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#contact" class="nav-link text-white">Contact    </a>
                        </li>
                      </ul>
                  </span>
              </div>

          </div>
      </nav>

    </section>
    @yield('content')
    @extends('mains.footer')

    <!-- footer  -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('landingpage/node_modules/jquery/dist/jquery.slim.min.js') }}" ></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="{{ url('landingpage/node_modules/popper.js/dist/umd/popper.min.js') }}" ></script>
    <script src="{{ url('landingpage/node_modules/bootstrap-4/dist/js/bootstrap.min.js') }}" ></script>
    <!-- Mansory -->
    <script src="{{ url('landingpage/node_modules/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('landingpage/node_modules/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <!--Slick Js Testi & Slider-->
    <script src="{{ url('landingpage/node_modules/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- tweenmax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <!-- scrolltoid -->
    <script src="{{ url('landingpage/public/assets/scrolltoid/jquery.malihu.PageScroll2id.min.js') }}" ></script>
    <!-- App -->
    <script src="{{ url('landingpage/app.js') }}"></script>
    <script>
      $(document).ready(function(){
        $('#nav-icon2').click(function(){
          $(this).toggleClass('open');
        });
      });

      // scrolltoid
      (function($){
          $(window).load(function(){
              $("#navigation a").mPageScroll2id();
          });
      })(jQuery);
      $("#navigation a").mPageScroll2id({
        scrollSpeed:900
      });
    </script>
  </body>
</html>
