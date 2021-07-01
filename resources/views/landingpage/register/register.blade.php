@extends('mains.headersolid')
@section('content')
    <section class="text-dark pt-5 pb-5">
        <section class="container services text-center ">
            <div class="row justify-content-md-center ">

                <div class="col-xs-12 col-md-10 col-sm-12">
                    <h2 class="text-center pb-3">Joining sails just one step away</h2>
                </div>
                <div class="col-xs-12 col-md-6 col-sm-12 pl-5 mr-5">
                    <p class="text-center pb-4"> Check sails anytime, anywhere to keep track of your terminal, employees and inventory. All in one platform</p>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="border"></div>
        </div>

    </section>
    <form id="add_bup" enctype="multipart/form-data">
    <section class="container">
          <div class="row pb-5">
              <div class="col-12 pb-2">
                <p class="h5">Choose Plan</p>
              </div>
              <div class="col-3">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="plan" id="planCloud" value="1" >
                    <label class="form-check-label h5" for="defaultCheck1">
                      Cloud Services
                    </label>
                  </div>
              </div>
              <div class="col-3">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="plan" id="planPremise" value="2" checked>
                    <label class="form-check-label h5" for="defaultCheck1">
                      On Premise
                    </label>
                  </div>
              </div>
          </div>
        <div class="row">
            <div class="col">
                  <div class="form-group text-left">
                    <label for="formGroupExampleInput">Company Name</label>
                    <input type="text" class="form-control" name="bupName" id="bupName" placeholder="Input your name...">
                  </div>
                  <div class="form-group text-left">
                    <label for="formGroupExampleInput2">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Input your phone number...">
                  </div>
                  <div class="form-group text-left">
                    <label for="formGroupExampleInput2">NPWP</label>
                    <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Input your NPWP...">
                  </div>
                  <div class="form-group text-left">
                    <label for="formGroupExampleInput2">SIUP</label>
                    <input type="text" class="form-control" name="siup" id="siup" placeholder="Input your SIUP...">
                  </div>
            </div>
            <div class="col">
                    <div class="form-group text-left">
                      <label for="formGroupExampleInput">E-mail</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Input your email address...">
                    </div>
                    <div class="form-group text-left">
                      <label for="formGroupExampleInput2">Address</label>
                      <textarea rows="5" class="form-control" name="address" id="address" placeholder="Input your name address..."></textarea>
                    </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- Line -->
    <div class="container">
        <i class="fas fa-lock ml-2"></i>
        <span> Account</span>
        <div class="border border-2x">
        </div>
    </div>

    <section class="container">
            <div>
                  <div class="pt-5 pb-5" >
                      <div class="col-6">
                        <div class="form-group text-left">
                          <label for="formGroupExampleInput">Username</label>
                          <input type="email" width="500px" class="form-control" name="username" id="username" placeholder="Email...">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group text-left">
                          <label for="formGroupExampleInput2">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password...">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group text-left">
                          <label for="formGroupExampleInput">Re-type Password</label>
                          <input type="password" class="form-control" name="repassword" id="repassword" placeholder="Password again...">
                        </div>
                      </div>
                  </div>
            </div>
    </section>
    <!-- Line -->
    <div class="container">
        <i class="fas fa-folder ml-2 "></i>
        <span> Document</span>
        <div class="border border-2x mb-5">
        </div>
    </div>
    <section class="container">
              <div class="row pb-4">
                  <div class="col-12">
                    <p class="">Please submit following document for faster registration process</p>
                    <ol>
                      <li>Dokumen A</li>
                      <li>Dokumen A</li>
                      <li>Dokumen A</li>
                      <li>Dokumen A</li>
                    </ol>
                    <p>Choose one of the following method to submit this document :</p>
                  </div>
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="upload" id="uploadOnline" value="1" checked>
                          <label class="form-check-label h5" for="defaultCheck2">
                          Upload
                        </label>
                      </div>
                  </div>
                  <div class="col-3">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="upload" id="uploadOffline" value="2" >
                          <label class="form-check-label h5" for="defaultCheck2">
                          Offline | Via POS
                        </label>
                      </div>
                  </div>
                  <div id="online-view" style="display: block;" class="col-12 pt-5">
                    <div class="card no-shadow form-upload">
                      <input id="form-upload" type="file" name="file[]" multiple>
                      <p id="name-upload">Drag your files here or click in this area.</p>
                    </div>

                  </div>
                  <div id="offline-view" style="display: none;" class="col-12 pt-5">
                    <div class="card p-5">
                      <p id="name-upload">Send your mail to : ILCS, Plaza Telkom 4th floor.
                        <br>Laksamana Yos Sudarso Street No. 23-24, RT.16/RW.6 Kb Bawang, Jakarta Utara,
                        <br>Daerah khusus Ibukota Jakarta 14320
                      </p>
                      <p class="h5">Phone : (021) 1500950</p>
                    </div>

                  </div>
            </div>

    </section>

    <section class="container">
            <div class="row pb-4">
                  <div class="col-6">
                      <div class="form-check focused">
                         <input class="form-check-input" type="checkbox" name="ceklis" id="ceklis" value="data_ceklis">
                        <label class="form-check-label h6" for="defaultCheck1">
                          By signin up you agree to Privacy & Terms of Service
                        </label>
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="form-check d-flex flex-row-reverse">
                         <div class="g-recaptcha" id="captcha" data-sitekey="6Ld3QnUUAAAAAPQ6Ny1ldiRcw1v_l6GBxFY4SxKy"></div>
                        </label>
                      </div>
                  </div>
            </div>
    </section>
    <section class="container">
      <div class="border"></div>
            <div class="row pb-4 pt-5">
                  <div class="col-12 d-flex flex-row-reverse">
                      <!-- tombol asli -->
                      <!-- <button type="submit" class="btn btn-success pl-5 pr-5 pl-10 pr-10 btn-lg"> SIGN UP </button> -->
                      <!-- tombol hanya untuk demo -->
                      <a href="#" class="btn btn-success pl-5 pr-5 pl-10 pr-10 btn-lg" id="sign_up"> SIGN UP </a>
                  </div>
            </div>
    </section>
    </form>
@endsection

@push('scriptJS')
    <style type="text/css">
        div#focus_cek{ 
          border:2px solid #9ecaed;
          border-radius: 10px;
          box-shadow:0 0 5px #9ecaed;
        } 

    </style>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      // form upload
      $(document).ready(function(){
        $('.form-upload #form-upload').change(function (e) {
          var filename = e.target.files[0].name;
          $('#name-upload').text(this.files.length + " file(s) selected");
        });
      });
      // checked upload files
      var ckboxOffline = $('#uploadOffline');
      var ckboxOnline = $('#uploadOnline');

      $('#uploadOffline').on('click',function () {
          if (ckboxOffline.is(':checked')) {
              $('#uploadOffline').attr('checked', true);
              $('#offline-view').css('display', 'block');
              $('#online-view').css('display', 'none');
          }
      });
      $('#uploadOnline').on('click',function () {
          if (ckboxOnline.is(':checked')) {
              $('#uploadOnline').attr('checked', true);
              $('#online-view').css('display', 'block');
              $('#offline-view').css('display', 'none');
          }
      });

      var form_data = new FormData();
      $('input[type="file"]').on('change', function (e) {
          [].forEach.call(this.files, function (file) {
              form_data.append('file[]', file);
          });
      });

      var names = [];
      $("input[type='file']").change(function() {
          for (var i = 0; i < $(this).get(0).files.length; ++i) {
              names.push($(this).get(0).files[i].name);
          }
      });

      function fill_all(){
        var result = {
            bup_name    : $("#bupName").val(),
            bup_address : $("#address").val(),
            bup_phone   : $("#phone").val(),
            bup_npwp    : $("#npwp").val(),
            bup_siup    : $("#siup").val(),
            bup_email   : $("#email").val(),
            username    : $("#username").val(),
            password    : $("#password").val(),
            plan        : $("input[name='plan']:checked").val(),
            tipe_upload : $("input[name='upload']:checked").val(),
            filename    : names
        };
        return result;
      }

      if($("#ceklis").is(":checked"))
      {
          $(".focused").removeAttr("id","focus_cek");
      }

      $("#sign_up").on('click',function(e){
          e.preventDefault();
          var data_all = fill_all();
          console.log(data_all);
          var validator = $("#add_bup").validate({
            rules: {
                      bupName:{
                        required:true
                      },
                      phone:{
                        required:true
                      },
                      npwp:{
                        required:true
                      },
                      siup:{
                        required:true
                      },
                      email:{
                        required:true
                      },
                      address:{
                        required:true
                      },
                      username:{
                        required:true
                      },
                      password:{
                        required:true
                      },
                      repassword:{
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

          $('input[name^="file[]"]').each(function () {
              $(this).rules('add', {
                  required: true,
                  // extension: "png|jpeg|jpg|doc|docx|pdf",
                  // filesize: 1048576,
              })
          });
          
          var password = $("#password").val();
          var repassword = $("#repassword").val();

          if(password != repassword)
          {
              $("#repassword").focus();
          }

          if (validator.form() && $("#ceklis").is(":checked") && grecaptcha.getResponse() != '' && password == repassword)
          {
                var cekUpload = $("input[name='upload']:checked").val();
                if (cekUpload == 1)
                {
                  form_data.append('bup_name',$('#bupName').val());
                  $.ajax({
                      url: 'upload_bup',
                      method: 'post',
                      dataType: 'json',
                      contentType: false,
                      processData: false,
                      data: form_data,
                      success: function(data){
                        if (data.status == 'Success')
                        {
                            //
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

                $(".focused").removeAttr("id","focus_cek");
                $.ajax({
                  url: 'add_bup',
                  method: 'post',
                  dataType: 'json',
                  // contentType: false,
                  // processData: false,
                  data: data_all,
                  success: function(data){
                    if (data.status == 'Success')
                    {
                        window.location.href="/registrationsuccess";
                    }
                    else
                    {
                        alert('Data Gagal di Simpan');
                    }
                  },
                  error: function(error){
                      alert('Ada Error'+error+' nih');
                  }
                })
          }
          else if(validator.form() && grecaptcha.getResponse() != '' && password == repassword)
          {
              $(".focused").attr("id","focus_cek");
          }
      });
    </script>
@endpush
