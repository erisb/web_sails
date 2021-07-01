@extends('mains.headersolid')
@section('content')
    <section class="text-dark pt-5 pb-5">
        <section class="container services text-center ">
            <div class="row justify-content-md-center ">

                <div class="col-xs-12 col-md-10 col-sm-12">
                    <h2 class="text-center pb-3">Forgot Your Password ?</h2>
                </div>
                <div class="col-xs-12 col-md-6 col-sm-12 pl-5 mr-5">
                    <p class="text-center pb-4"> Dont worry Resseting your password is easy, just tell the email address you registered with sails</p>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="border"></div>
        </div>

    </section>
    <!-- Form -->

    <!-- Form  -->
    <form id="forgot_form" action="{{url('send_email')}}" method="post">
      <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
      <div class="d-flex flex-row justify-content-center my-flex-container">
       <div class="pb-2 col-4">

        <div class="inner-addon right-addon">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email address..." autofocus/>
          <span class="help-block" style="color:red"><strong>{{session('Failed')}}</strong></span>
          @if ($errors->has('email'))
            <span class="help-block" style="color:red">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>

       </div>
      </div>
      <div class="d-flex flex-row justify-content-center my-flex-container">
       <div class="pb-5">
           <button type="submit" class="btn btn-success btn-lg mt-5 mb-5"> SEND </button>
       </div>
      </div>
    </form>
@endsection
