@extends('apps.mains.header_portal')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <!-- breadcrumb -->
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="width:400px;">
                  <li class="breadcrumb-item">User</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
            <div class="col-12">
              <div class="navbar-wrapper">
                <h3 class=""><span class="tim-note">User </span></h3>
                <form class="navbar-form">
                  <div class="input-group no-border">

                    <i class="pt-2 ml-5 material-icons"> search</i>
                    <input id="search_user" type="text" value="" class="form-control" placeholder="Search...">

                  </div>
                </form>
              </div>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          {{-- <div class="collapse navbar-collapse justify-content-end">
            <a class="btn btn-primary" href="#" role="button" id="show_user" data-toggle="modal" data-target="#userModal">
              <i class="material-icons">add</i> CREATE NEW
            </a>
          </div> --}}
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid pr-5 pl-5 mt-5">
          <!-- ./ wizard -->
          <!-- header -->
          <div class="row">
            <div class="col">
            List User ( 10 User )
            {{-- <div class="pull-right form-row">Filter by :
              <select id="inputState"  class="form-filter custom -select" name="" >
                <option value="">Recently Added</option>
                <option value="">New</option>
                <option value="">Waiting Approval</option>
                <option value="">Waiting Berth</option>
                <option value="">Reject</option>
                <option value="">Berthing</option>
                <option value="">Departure</option>
              </select>

            </div> --}}

            </div>
          </div>
          <hr>

          <!-- ./ header -->
          <!-- table -->
          <div style="float:right;margin-bottom:10px;">
            <a class="btn btn-primary" href="#" role="button" id="show_user" data-toggle="modal" data-target="#userModal"><i class="material-icons">add</i> CREATE NEW
            </a>
          </div>
          <div class="card">
            <div class="card-table">
              <!-- Wizard step -->

              <div class="table-responsive">
                <table class="table display table-hover cell-border compact stripe" id="user" >
                  <thead class=" text-grey text-center">
                    <th class="text-center">No</th>
                    <th>FullName</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Action</th>
                    <th>Id User</th>
                  </thead>
                  <tbody class=" text-grey text-center">
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ./table -->
        </div>
      </div>

    </div>

  </div>
  <!-- end div header -->
@endsection
<!--  Add Modal -->
@include('apps.modal.modalUser')

@push('scriptJS')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready(function() {
      var userList_Table = $('#user').DataTable({
          searching: true,
          paging: true,
          info: true,
          lengthChange:false,
          order: [ 0, 'asc' ],
          pageLength: 10,
          ajax: {
              url: 'get_user',
              dataSrc: 'data'
          },
          columns:[
              { data : null,
                render: function (data, type, row, meta) {
                        //I want to get row index here somehow
                        return  meta.row+1;
                  }
              },
              { data : 'fullname' },
              { data : 'username'  },
              { data : 'password'  },
              { data : null,
                render: function (data, type, row, meta) {
                    if (row.id_role == '1')
                    {
                        return 'Admin';
                    }
                    else
                    {
                        return 'BUP';
                    }
                }
              },
              { data : null,
                render: function (data, type, row, meta) {
                    
                    return '<a href="#" data-toggle="modal" data-target="#userModal" data-placement="left" title="Edit User" class="edit_modal" id="edit_modal">'
                          +'<i class="fas fa-edit fa-1x pl-2 pr-2 text-success"></i></a>'
                          +'<a href="#" data-toggle="modal" data-target="#deleteUserModal" data-placement="left" title="Delete User" class="delete_modal" id="delete_modal"><i class="fas fa-trash fa-1x pr-2 text-danger "></i></a>';
                }

              },
              { data : 'id_user'  }
          ],
          columnDefs: [
              { targets: [3,6], visible: false}
          ]
      });

      $('#search_user').on('keyup change', function(){
          userList_Table.search($(this).val()).draw();
      });

      var id_user,fullname,username,password;
      $('#user tbody').on( 'click', '#edit_modal', function () {
          var data = userList_Table.row( $(this).parents('tr') ).data();
          id_user = data.id_user;
          fullname = data.fullname;
          username = data.username;
          password = data.password;
          console.log(id_user);
        
          $('#fullname').val(fullname);
          $('#username').val(username);
          $('#password').val(password);
          $('#show_add').attr('style','display:none');
          $('#show_edit').attr('style','display:block');
      });

      $('#show_user').on('click',function(e){
          e.preventDefault();
          $('#user_form')[0].reset();

          $('#show_add').attr('style','display:block');
          $('#show_edit').attr('style','display:none');
      })

      $('#add_user').on('click', function (e) {
          e.preventDefault();
          var data_all = $('#user_form').serialize();
          var validator = $("#user_form").validate({
            rules: {
                      fullname_add:{
                        required:true
                      },
                      username_add:{
                        required:true
                      },
                      password_add:{
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
                  url: 'add_user',
                  method: 'post',
                  dataType: 'json',
                  data : data_all,
                  success: function(data){
                    // console.log(data.status);
                    if (data.status == 'Success')
                    {
                        $('#userModal').modal('hide');
                        userList_Table.ajax.reload();
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

      $('#edit_user').on('click', function (e) {
          e.preventDefault();
          var data_all = $('#user_form').serialize();
          console.log(data_all)
          var validator = $("#user_form").validate({
            rules: {
                      fullname:{
                        required:true
                      },
                      username:{
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
                  url: 'edit_user/'+id_user,
                  method: 'get',
                  dataType: 'json',
                  data : data_all,
                  success: function(data){
                    // console.log(data.status);
                    if (data.status == 'Success')
                    {
                        $('#userModal').modal('hide');
                        userList_Table.ajax.reload();
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

      $('#delete_user').on('click', function (e) {
          e.preventDefault();
          $.ajax({
              url: 'delete_user/'+id_user,
              method: 'get',
              dataType: 'json',
              success: function(data){
                // console.log(data.status);
                if (data.status == 'Success')
                {
                    $('#deleteUserModal').modal('hide');
                    userList_Table.ajax.reload();
                }
                else
                {
                    alert('Data Gagal di Delete');
                }
              },
              error: function(error){
                  alert('Ada Error'+error+' nih');
              }
          });
      });
  });

</script>
@endpush
