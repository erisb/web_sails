<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('apps/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{url('landingpage/public/assets/icon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SAILS VMS
  </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ url('apps/assets/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
  <!-- wizard -->
  <link href="{{ url('apps/assets/css/smart_wizard_theme_dots.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
  <link href="{{ url('apps/assets/font/font-awesome5/all.min.css') }}" rel="stylesheet" />
  <link href="{{ url('apps/assets/css/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ url('apps/assets/css/gijgo.min.css') }}" rel="stylesheet" />
  <link href="{{ url('apps/assets/css/style-sails.css') }}" rel="stylesheet" />
  <!--  flag country -->
  <link rel="stylesheet" href="{{ url('apps/assets/css/countrySelect.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ url('apps/assets/css/jquery.loading-indicator.css') }}"/>
  <!--   Core JS Files   -->

  <script src="{{ url('apps/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('apps/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ url('apps/assets/js/gijgo.min.js') }}"></script>
  <script src="{{ url('apps/assets/js/jquery.loading-indicator.js') }}"></script>
  <script type="text/javascript">
  // untuk menu active
  </script>
</head>
<script>
  $(function() {
    var homeLoader = $('body').loadingIndicator({
      useImage: false,
    }).data("loadingIndicator");
    
    setTimeout(function() {
      homeLoader.hide();
    }, 1500);
    
  });
</script>
<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          <img src="{{ url('apps/assets/img/sailsLogo.png') }}" alt="">
        </a>
      </div>

      <div class="sidebar-wrapper">
        <div class="card-profile" >
          <div class="card-avatar">
            <a href="#pablo">
              <img class="img" src="{{ url('apps/assets/img/faces/marc.jpg') }}" />
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">{{Session::get('name')}}</h6>
          </div>
        </div>
        <ul class="nav">
          <li  data-toggle="collapse" data-target="#account" class="collapsed">
              <a class="nav-link" href="{{url('accountSetting')}}">
                <i class="material-icons">settings</i>
                <p>CUSTOMERS</p>
                <span class="arrow"></span>
              </a>
          </li>
          <li  data-toggle="collapse" data-target="#account" class="collapsed">
              <a class="nav-link" href="{{url('get_payment')}}">
                <i class="material-icons">settings</i>
                <p>PAYMENT VERIFICATION</p>
                <span class="arrow"></span>
              </a>
          </li>
          @if(Session::get('role') == 1)
            <li  data-toggle="collapse" data-target="#account" class="collapsed">
                <a class="nav-link" href="{{url('user')}}">
                  <i class="material-icons">settings</i>
                  <p>USERS</p>
                  <span class="arrow"></span>
                </a>
            </li>
          {{-- @elseif(Session::get('role') == 2)
            <li  data-toggle="collapse" data-target="#account" class="collapsed">
                <a class="nav-link" href="{{url('accountSetting')}}">
                  <i class="material-icons">settings</i>
                  <p>MY PROFILE</p>
                  <span class="arrow"></span>
                </a>
            </li> --}}
          @endif
          <li  data-toggle="collapse" data-target="#account" class="collapsed">
              <a class="nav-link" href="{{url('logout')}}">
                <i class="material-icons">settings_power</i>
                <p>LOGOUT</p>
                <span class="arrow"></span>
              </a>
          </li>
          <!-- <ul class="sub-menu collapse" id="account">
              <li class="active-sub mt-2"><a class="nav-link" href="/accountSetting/paymentVerification">Payment Verification</a></li>
              <li><a class="nav-link" href="/accountSetting/editAccount">My Profile</a></li>
          </ul> -->
          <!--  Dropdown menu sample-->

          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    @yield('content')
    @yield('modal_patch')
    @yield('modal_BUP')
    @yield('modal_user')
    @stack('scriptJS')
    @extends('apps.mains.footer_portal')
