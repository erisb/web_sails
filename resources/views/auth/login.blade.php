<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SAILS VMS Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no", minimum-scale=1", maximum-scale=1">
    <link rel="icon" type="image/png" href="{{url('landingpage/public/assets/icon.png')}}">
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="{{ url('landingpage/node_modules/bootstrap-4/dist/css/bootstrap.min.css') }}">
    <!-- Theme 1 -->
    <link rel="stylesheet" href="{{ url('landingpage/login.css') }}">
  </head>

  <body>

    <div class="fluid-container">
      <div class="row">
        <div class="col-sm-12 col-4 col-md-4 col-lg-4 col-xs-12">
        <section class="fluid-container">
          <section class="hero">
              <div class="overlay-black"></div>
                  <a href="/" class="navbar-brand logo-top"  >
                      <img id="logo" src="{{ url('landingpage/public/assets/sailsLogoWhite.png') }}"  class="d-inline-block align-top logo">
                      <span id="link" class="text-dark">
                          <i id="nav_list" class="pl-3 pr-2 pb-2"></i>
                      </span>
                  </a>
                  <div class="hero-content text-center">
                      <header class="typewriter">
                          <p class="h5">SAILS ENTERPRISE</p>
                      </header>

                      <p class="pt-3 h6"> <i> Vessel Management System </i></p>
                  </div>
                  <!-- <div class="powered text-center mt-5">
                      <p><i> POWERED BY </i></p>
                      <div class="row">
                        <div class="col">ILCS</div>
                        <div class="col">IPC</div>
                        <div class="col">TELKOM</div>
                      </div>
                  </div> -->
          </section>
        </section>
      </div>
        <div class="col-sm-12 col-8 col-md-8 col-lg-8 col-xs-12">
        <div class="d-flex flex-row justify-content-end my-flex-container">
             <div class="p-2 my-flex-item m-4">
               <span class="pr-3">Dont have an account ? </span>
               <a href="{{url('register')}}" class="btn btn-outline-success btn-xs pl-5 pr-5"> SIGN UP </a>
             </div>
        </div>
        <div class="form-login d-flex flex-row justify-content-center align-items-center my-flex-container">
             <div class="col-8 my-flex-item">
               <p class="h4">Sign In to Sails VMS Web Portal</p>
               <p>Enter your details below.</p>
               <form id="login" method="post" action="{{route('login')}}">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                   <label for="exampleInputEmail1" class="h6">Username</label>
                   <input type="email" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Email" autofocus="autofocus">
                   <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                   @if ($errors->has('username'))
                      <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                   @endif
                 </div>
                 <div class="form-group">
                   <label for="exampleInputPassword1" class="h6">Password
                   </label>
                   <span style="right: 0; position: absolute; font-size: 12px; font-weight: 400;" class="pr-3"> <a href="{{url('show_forget')}}"> Forgot Password ? </a></span> 
                   <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                   @if ($errors->has('password'))
                      <span class="help-block" style="color:red">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                   @endif
                 </div>
                 <!-- <div class="form-group">
                   <label for="exampleInputPassword1" class="h6">Terminal /Site</label>
                   <input type="text" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                 </div> -->
             </div>

        </div>
        <div class="d-flex flex-row justify-content-center align-items-center my-flex-container">
             <div class="mt-2 my-flex-item">
               <!--  tombol asli -->
               <!-- <button type="submit" class="btn btn-success pl-5 pr-5 btn-lg">Submit</button> -->
               <!--  tombol demo -->
               <button type="submit" class="btn btn-success pl-5 pr-5 btn-lg" id="act_login">Submit</button>
             </form>
             <!--///////////////////////////////////// end form  -->
             </div>

        </div>

      </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="{{ url('landingpage/node_modules/jquery/dist/jquery.slim.min.js') }}" ></script>
    
    <script src="{{ url('landingpage/node_modules/popper.js/dist/umd/popper.min.js') }}" ></script>
    <script src="{{ url('landingpage/node_modules/bootstrap-4/dist/js/bootstrap.min.js') }}" ></script>
    <!-- tweenmax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    

  </body>
</html>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
</script>
