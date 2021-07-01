<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('apps/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ url('apps/assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sails VMS
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
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
  <!--   Core JS Files   -->

  <script src="{{ url('apps/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('apps/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ url('apps/assets/js/gijgo.min.js') }}"></script>
  <script type="text/javascript">
  // untuk menu active
  </script>
</head>

<body class="">
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
            <h6 class="card-category text-gray">CEO / Co-Founder</h6>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="/app">
              <i class="material-icons">directions_boat</i>
              <p>VESSEL SCHEDULE</p>
            </a>
          </li>
          <li id="vesRealization" class="nav-item ">
            <a class="nav-link" href="/vesRealization">
              <i class="material-icons">memory</i>
              <p>VESSEL REALIZATION</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active-a" href="/invoicing">
              <i class="material-icons">library_books</i>
              <p>INVOICING</p>
            </a>
          </li>
          <!-- <li  data-toggle="collapse" data-target="#account" class="collapsed">
              <a class="nav-link" href="/accountSetting/customer">
                <i class="material-icons">settings</i>
                <p>ACCOUNT SETTINGS</p>
                <span class="arrow"></span>
              </a>
          </li> -->

          <!--  Dropdown menu sample-->
          <li  data-toggle="collapse" data-target="#account" class="collapsed">
              <a class="nav-link" href="#">
                <i class="material-icons">settings</i>
                <p>ACCOUNT SETTINGS</p>
                <span class="arrow"></span>
              </a>
          </li>
          <ul class="sub-menu collapse" id="account">
              <li><a class="nav-link" href="/accountSetting/editAccount">My Profile</a></li>
              <li><a class="nav-link" href="/accountSetting/customer">Customer</a></li>
              <li class="active-sub mt-2"><a class="nav-link" href="/accountSetting/paymentVerification">Payment Verification</a></li>
          </ul>
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
    @extends('apps.mains.footer')
