@extends('mains.headersolid')
@section('content')
    <section class="text-dark pt-5 pb-5">
        <section class="container services text-center ">
            <div class="row justify-content-md-center ">

                <div class="col-xs-12 col-md-10 col-sm-12">
                    <h2 class="text-center pb-3 text-success">Congratulation!</h2>
                </div>
                <div class="col-xs-12 col-md-6 col-sm-12">
                    <p class="text-center pb-4"> Registration sails successfully! <br> Please check your mailbox for the next action.</p>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="border"></div>
        </div>

    </section>


    <script type="text/javascript">
      // form upload
      $(document).ready(function(){
        $('.form-upload #form-upload').change(function (e) {
          var filename = e.target.files[0].name;
          $('#name-upload').text(this.files.length + " file(s) selected");
          alert('The file "' + filename +  '" has been selected.');

        });
      });
      // checked upload files
      var ckboxOffline = $('#offline');
      var ckboxOnline = $('#online');

      $('#offline').on('click',function () {
          if (ckboxOffline.is(':checked')) {
              $('#offline').attr('checked', true);
              $('#offline-view').css('display', 'block');
              $('#online-view').css('display', 'none');
          }
      });
      $('#online').on('click',function () {
          if (ckboxOnline.is(':checked')) {
              $('#online').attr('checked', true);
              $('#online-view').css('display', 'block');
              $('#offline-view').css('display', 'none');
          }
      });
    </script>
@endsection
