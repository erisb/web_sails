@extends('mains.headersolid')
@section('content')
    <section class="text-dark pt-5 pb-5">
        <section class="container services text-center ">
            <div class="row justify-content-md-center ">

                <div class="col-xs-12 col-md-10 col-sm-12">
                    <h2 class="text-center pb-3 text-success">Reset Your Password ?</h2>
                </div>
                <div class="col-xs-12 col-md-6 col-sm-12 pl-5 mr-5">
                    <p class="text-center pb-4"> We have a reset password email to <b> {{session('email')}}</b> Please click the reset password link to set your new password</p>
                    <p class="pb-5">Dont receive the email yet ? <br>Please check your spam folder, or <a href="{{url('show_forget')}}" class="text-primary"> resend </a> the email </p>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="border"></div>
        </div>

    </section>
@endsection
