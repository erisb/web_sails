<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>SAILS Vessel Management System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('landingpage/node_modules/jquery/dist/jquery.slim.min.js') }}" ></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  </head>

  <body>

    <section class="fluid-container">
      <nav id="anim" class=" navbar navbar-expand-lg navbar-light opaque-navbar-page border">
          <div class="container">
              <a href="/" class="navbar-brand logo-top"  >
                  <img id="logo" src="{{ url('landingpage/public/assets/sailsLogo.png') }}"  class="d-inline-block align-top logo">
                  <span id="link" class="text-dark">
                      <i id="nav_list" class="pl-3 pr-2 pb-2"></i>
                  </span>
              </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSails" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <!-- Hamburger Menu -->
                  <div id="nav-icon3">
                    <span class="bg_black"></span>
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
                  <span id="nav" class="navbar-nav navbar-right">
                      <ul class="navbar-nav mr-auto nav-h vr-left">
                          <li class="nav-item active">
                              <a href="/#home" class="nav-link text-dark">Home</a>
                          </li>
                        <li class="nav-item ">
                            <a href="/#about" class="nav-link text-dark">About</a>
                        </li>
                        <li class="nav-item ">
                            <a href="/#pricing" class="nav-link text-dark">Pricing</a>
                        </li>
                        <li class="nav-item ">
                            <a href="/#contact" class="nav-link text-dark">Contact</a>
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
    @stack('scriptJS')
    <!-- Optional JavaScript -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{ url('landingpage/node_modules/popper.js/dist/umd/popper.min.js') }}" ></script>
    <script src="{{ url('landingpage/node_modules/bootstrap-4/dist/js/bootstrap.min.js') }}" ></script>
    <!-- Mansory -->
    <script src="{{ url('landingpage/node_modules/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('landingpage/node_modules/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <!--Slick Js Testi & Slider-->
    <script src="{{ url('landingpage/node_modules/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- tweenmax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <!-- App -->
    <script src="{{ url('landingpage/app_solidheader.js') }}"></script>
    <script>
    $(document).ready(function(){
      $('#nav-icon2').click(function(){
        $(this).toggleClass('open');
      });
    });
    </script>
    </body>
    </html>
