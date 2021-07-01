@extends('mains.headersolid')
@section('content')
    <section class="text-dark pt-5 pb-5">
        <section class="container services text-center ">
            <div class="row justify-content-md-center ">

                <div class="col-xs-12 col-md-10 col-sm-12">
                    <h2 class="text-center pb-3">Reset Your Password</h2>
                </div>
            </div>
        </section>

    </section>
    <!-- Form -->

    <!-- Form  -->
    <form id="reset_form">
      {{-- <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> --}}
      <input type="hidden" name="id_user" id="id_user" value="{{$id_user}}">
      <div class="d-flex flex-row justify-content-center my-flex-container">
       <div class="pb-2 col-4 pb-4">
        <label for="inlineFormInputGroup">New Password</label>
        <div class="inner-addon right-addon">
          <a href="#"><i id="eyeSatu" class="fa fa-eye-slash" onclick="showPasswordSatu()"></i></a>
          <input id="passwordSatu" type="password" name="password" class="form-control form-control-lg" placeholder="New password" autofocus/>
        </div>

       </div>
      </div>
      <div class="d-flex flex-row justify-content-center my-flex-container">
       <div class="pb-2 col-4">
        <label for="inlineFormInputGroup">Re-type Password</label>
        <div class="inner-addon right-addon">
          <a href="#"><i id="eyeDua" class="fa fa-eye-slash" onclick="showPasswordDua()"></i></a>
          <input id="passwordDua" type="password" name="passwordDua" class="form-control form-control-lg" placeholder="Re-type password" autofocus/>
        </div>

       </div>
      </div>
      <div class="d-flex flex-row justify-content-center my-flex-container">
       <div class="pb-5">
           <button type="submit" class="btn btn-success btn-lg mt-5 mb-5" id="reset_pass"> SEND </button> 
       </div>
      </div>
    </form>
@endsection

@push('scriptJS')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    function showPasswordSatu() {
      var x = document.getElementById("passwordSatu");
      if (x.type === "password") {
          x.type = "text";
          $('#eyeSatu').removeClass('fa fa-eye-slash');
          $('#eyeSatu').addClass('fa fa-eye');
      } else {
          x.type = "password";
          $('#eyeSatu').removeClass('fa fa-eye');
          $('#eyeSatu').addClass('fa fa-eye-slash');
      }
    }
    function showPasswordDua() {
      var x = document.getElementById("passwordDua");
      if (x.type === "password") {
          x.type = "text";
          $('#eyeDua').removeClass('fa fa-eye-slash');
          $('#eyeDua').addClass('fa fa-eye');
      } else {
          x.type = "password";
          $('#eyeDua').removeClass('fa fa-eye');
          $('#eyeDua').addClass('fa fa-eye-slash');
      }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#reset_pass').on('click',function(e){
            e.preventDefault();
            var data_all = $('#reset_form').serialize();
            console.log(data_all)
            var validator = $("#reset_form").validate({
              rules: {
                        password:{
                          required:true
                        },
                        passwordDua:{
                          required:true
                        }
              },
              onfocusout: false,
              invalidHandler: function(form, validator) {
                  var errors = validator.numberOfInvalids();
                  if (errors) {                    
                      validator.errorList[0].element.focus();
                  }
              }
            });
            var pass1 = $('#passwordSatu').val();
            var pass2 = $('#passwordDua').val();
            var id_user = $('#id_user').val();
            console.log(id_user)
            if(pass1 != pass2)
            {
                $("#passwordDua").focus();
            }

            if (validator.form() && pass1 == pass2)
            {
                $.ajax({
                    url: "{{url('reset_pass')}}/"+id_user,
                    method: 'post',
                    dataType: 'json',
                    data: data_all,
                    success: function(data){
                      if (data.status == 'Success')
                      {
                          window.location = "{{url('login')}}";
                      }
                      else
                      {
                          alert('Data Gagal di Simpan');
                      }
                    },
                    error: function(error){
                        alert('Ada Error'+error+' nih');
                    }
                });
            }
        });
    });
</script>
@endpush
