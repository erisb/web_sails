@extends('web_sl.mains.header_sl')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h3 class=""><span class="tim-note">Edit User</span></h3>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid pr-5 pl-5">
          <!-- table -->
          <div class="card">
            <div class="card-table">
              <!-- WForm -->
              <div class="container ml-2 mr-2 pt-3 ">
                <p class="h3"><i class="fa fa-address-book"></i> <b>User Info</b></p>
                <hr class="mb-5 mr-5"><br><br>
              <form id="user_form">
                <input type="hidden" class="form-control" name="id_user" id="id_user" value="{{$id_user}}">
                  {{-- <div class="row"> --}}
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input type="text" class="form-control" name="comp_name" id="comp_name" value="{{$data_user->CUSTOMERS_NAME}}" disabled="disabled">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{$data_user->CUSTOMERS_ADDRESS}}" disabled="disabled">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{$data_user->CUSTOMERS_PHONE}}" disabled="disabled">
                      </div>
                    </div><br><br>
                  {{-- </div> --}}
                    <p class="h3"><i class=" fa fa-lock"></i> <b>Authentication Info</b></p>
                    <hr class="mb-5"><br><br>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" value="{{$data_user->FULLNAME}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{$data_user->USERNAME}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="{{$data_user->PASSWORD}}">
                      </div>
                  </div><br><br>
              </div>
                <div class="d-flex flex-row justify-content-between my-flex-container mb-5 mt-5">
                    <div class="p-2 my-flex-item"><button type="submit" class="btn btn-outline-danger"><i class="fa fa-window-close"></i> Cancel</button></div>
                    <div class="p-2 my-flex-item"><button type="submit" class="btn btn-success mr-3" id="edit_user"> <i class="fa fa-save"></i> Edit</button></div>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>

    </div>

  </div>
@endsection
@include('web_sl.modal.modalUserSL')

@push('scriptJS')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#edit_user').on('click',function(e){
        e.preventDefault();
        var id_user = $('#id_user').val();
        var data_user = $("#user_form").serialize();;
        var validator = $("#user_form").validate({
          rules: {
                    fullname:{
                      required:true
                    },
                    username:{
                      required:true
                    },
                    password:{
                      required:true
                    },
          },
          onfocusout: false,
          invalidHandler: function(form, validator) {
              var errors = validator.numberOfInvalids();
              if (errors) {                    
                  validator.errorList[0].element.focus();
              }
          }
          });
          if (validator.form())
          {
            $.ajax({
                url: '{{url('edit_user')}}/'+id_user,
                method: 'get',
                dataType: 'json',
                data : data_user,
                success: function(data){
                  if (data.status == 'Success')
                  {
                      $('#successUser').modal('show');
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
    })
</script>
@endpush