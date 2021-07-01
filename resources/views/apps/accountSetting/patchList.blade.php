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
                   <li class="breadcrumb-item"><a href="{{url('accountSetting')}}">Customer</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Patch List</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
            <div class="col-12">
              <div class="navbar-wrapper">
                <h3 class="h3"><span class="tim-note">All Patch</span></h3>
                <form class="navbar-form">
                  <div class="input-group no-border">

                    <i class="pt-2 ml-5 material-icons"> search</i>
                    <input id="search_patch" type="text" value="" class="form-control" placeholder="Search...">

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
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid pr-5 pl-5 mt-5">
          <!-- ./ wizard -->
          <!-- header -->
          <div class="row">
            <div class="col">
            List Patch ( 10 Patch )
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
          @if ($role == 1)
            <div style="float:right;margin-bottom:10px;">
              <a class="btn btn-primary" href="#" role="button" id="show_upload" data-toggle="modal" data-target="#patchModal">
                <i class="material-icons">add</i> UPLOAD FILE
              </a>
            </div>
          @endif
          <div class="card">
            <div class="card-table">
              <!-- Wizard step -->

              <div class="table-responsive">
                <table class="table display table-hover cell-border compact stripe" id="patch" >
                  <thead class=" text-grey text-center">
                    <th class="text-center">No</th>
                    <th>Patch Version</th>
                    <th>File Name</th>
                    <th>Date Release</th>
                    <th>Release Notes</th>
                    <th>Id Patch</th>
                    @if ($role == 1)
                      <th>Action</th>
                    @endif
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
@endsection
<!--  Add Modal -->
@include('apps.modal.modalPatch')

@push('scriptJS')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#date_release').datepicker({
        uiLibrary: 'bootstrap4'
    });

    $(document).ready(function() {
        // Datatable_vessel
        // var bup_id = {{$bup}};
        // if ({{$role}} == 1) {var urlz = 'get_patch';}
        // else {var urlz = 'get_patch_byRole/'+bup_id;}
        if({{$role}} == 1)
        {
              var patch_Table = $('#patch').DataTable({
                  searching: true,
                  paging: true,
                  info: true,
                  lengthChange:false,
                  order: [ 0, 'asc' ],
                  pageLength: 10,
                  ajax: {
                      url: 'get_patch',
                      dataSrc: 'data'
                  },
                  columns:[
                      { data : null,
                        render: function (data, type, row, meta) {
                                //I want to get row index here somehow
                                return  meta.row+1;
                          }
                      },
                      { data : 'PATCH_VERSION' },
                      { data : null,
                          render: function (data, type, row, meta) {
                            set_link = (row.PATCH_FILE != null) ? 'get_file_patch/'+row.PATCH_FILE : '#';
                            return '<a href="'+set_link+'">'+row.PATCH_FILE+'</a>';
                        }
                      },
                      { data : 'PATCH_DATE_RELEASE'  },
                      { data : null,
                          render: function (data, type, row, meta) {
                            set_link = (row.PATCH_RELEASE_NOTES != null) ? 'get_file_patch/'+row.PATCH_RELEASE_NOTES : '#';
                            return '<a href="'+set_link+'">'+row.PATCH_RELEASE_NOTES+'</a>';
                        }
                      },
                      { data : 'ID_PATCH'  },
                      { data : null,
                          render: function (data, type, row, meta) {
                            if ({{$role}} == 1)
                            {                        
                                
                                  return '<a href="#" data-toggle="modal" data-target="#patchModal" data-placement="left" title="Edit Patch" class="edit_modal" id="edit_modal"><i class="fas fa-edit fa-1x pl-2 pr-2 text-success"></i></a>'
                                        +'<a href="#" data-toggle="modal" data-target="#deletePatchModal" data-placement="left" title="Delete Patch" class="delete_modal" id="delete_modal"><i class="fas fa-trash fa-1x pr-2 text-danger "></i></a>';
                            }
                            else
                            {
                                // if (row.BUP_STATUS == '1')
                                // {
                                //   return '<a href="#" data-toggle="modal" data-target="#bupModal" data-placement="left" title="Edit BUP" class="edit_modal" id="edit_modal"><i class="fas fa-edit fa-1x pl-2 pr-2 text-success"></i></a>';
                                //         // +'<a href="#" data-toggle="modal" data-target="#deleteBUP" data-placement="left" title="Delete BUP" class="delete_modal" id="delete_modal"><i class="fas fa-trash fa-1x pr-2 text-danger "></i></a>';

                                // }
                                // else if (row.BUP_STATUS == '2')
                                // {
                                //   return '<a href="get_billing/'+row.ID_BUP+'" data-toggle="tooltip"  data-html="true" data-placement="left" title="Check Billing"><i class="fas fa-credit-card  text-success"></i></a>';
                                // }
                                // else if (row.BUP_STATUS == '3')
                                // {
                                //   return '<a href="#" data-toggle="modal" data-target="#viewBUP" data-toggle="modal"  data-placement="left" title="View BUP"  ><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>';
                                // }
                            }
                          }
                      }
                  ],
                  columnDefs: [
                      { targets: [5], visible: false}
                  ]
              });
        }
        else
        {
              var patch_Table = $('#patch').DataTable({
                  searching: true,
                  paging: true,
                  info: true,
                  lengthChange:false,
                  order: [ 0, 'asc' ],
                  pageLength: 10,
                  ajax: {
                      url: 'get_patch',
                      dataSrc: 'data'
                  },
                  columns:[
                      { data : null,
                        render: function (data, type, row, meta) {
                                //I want to get row index here somehow
                                return  meta.row+1;
                          }
                      },
                      { data : 'PATCH_VERSION' },
                      { data : null,
                          render: function (data, type, row, meta) {
                            set_link = (row.PATCH_FILE != null) ? 'get_file_patch/'+row.PATCH_FILE : '#';
                            return '<a href="'+set_link+'">'+row.PATCH_FILE+'</a>';
                        }
                      },
                      { data : 'PATCH_DATE_RELEASE'  },
                      { data : null,
                          render: function (data, type, row, meta) {
                            set_link = (row.PATCH_RELEASE_NOTES != null) ? 'get_file_patch/'+row.PATCH_RELEASE_NOTES : '#';
                            return '<a href="'+set_link+'">'+row.PATCH_RELEASE_NOTES+'</a>';
                        }
                      },
                      { data : 'ID_PATCH'  },
                      { data : null}
                  ],
                  columnDefs: [
                      { targets: [5,6], visible: false}
                  ]
              });
        }

        $('#search_patch').on('keyup change', function(){
          patch_Table.search($(this).val()).draw();
        });

        var id_patch,version,date_release,file_patch,file_notes;
        $('#patch tbody').on( 'click', '#edit_modal', function () {
            var data = patch_Table.row( $(this).parents('tr') ).data();
            id_patch = data.ID_PATCH;
            version = data.PATCH_VERSION;
            date_release = data.PATCH_DATE_RELEASE;
            file_patch = data.PATCH_FILE;
            file_notes = data.PATCH_RELEASE_NOTES;
            console.log(file_patch);

            $('#version').val(version);
            $('#date_release').val(date_release);
            // $('input[type="file"]').text(file_patch);
            // $('#file_notes').html(file_notes);

            $('#add_title').attr('style','display:none');
            $('#edit_title').attr('style','display:block');

            $('#show_add').attr('style','display:none');
            $('#show_edit').attr('style','display:block');
        });

        $('#patch tbody').on('click', '#delete_modal', function () {
            var data = patch_Table.row($(this).parents('tr')).data();
            id_patch = data.ID_PATCH;
        });

        $('#show_upload').on('click',function(e){
            e.preventDefault();
            $('#patch_form')[0].reset();
        })

        var form_data = new FormData();
        $('input[type="file"]').on('change', function (e) {
            [].forEach.call(this.files, function (file) {
                form_data.append('file[]', file);
            });
            console.log(form_data)
        });

        $('#show_upload').on('click',function(e){
            e.preventDefault();
            $('#add_title').attr('style','display:block');
            $('#edit_title').attr('style','display:none');

            $('#show_add').attr('style','display:block');
            $('#show_edit').attr('style','display:none');
        })

        function fill_all(){
          var result = {
              version      : $("#version").val(),
              date_release : $("#date_release").val(),
              file_patch   : $("#file_patch").val().replace(/.*(\/|\\)/, ''),
              file_notes   : $("#file_notes").val().replace(/.*(\/|\\)/, ''),
          };
          return result;
        }

        $('#add_patch').on('click', function (e) {
          e.preventDefault();
          var data_all = fill_all();
          console.log(data_all)
          var validator = $("#patch_form").validate({
            rules: {
                      version:{
                        required:true
                      },
                      date_release:{
                        required:true
                      },
                      file_patch:{
                        required:true
                      },
                      file_notes:{
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
                  url: 'upload_patch',
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


              $.ajax({
                  url: 'add_patch',
                  method: 'post',
                  dataType: 'json',
                  data : data_all,
                  success: function(data){
                    // console.log(data.status);
                    if (data.status == 'Success')
                    {
                        $('#patchModal').modal('hide');
                        patch_Table.ajax.reload();
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

      $('#edit_patch').on('click', function (e) {
          e.preventDefault();
          var data_all = fill_all();
          console.log(data_all)
          var validator = $("#patch_form").validate({
            rules: {
                      version:{
                        required:true
                      },
                      date_release:{
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
                  url: 'upload_patch',
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


              $.ajax({
                  url: 'edit_patch/'+id_patch,
                  method: 'post',
                  dataType: 'json',
                  data : data_all,
                  success: function(data){
                    // console.log(data.status);
                    if (data.status == 'Success')
                    {
                        $('#patchModal').modal('hide');
                        patch_Table.ajax.reload();
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

      $('#delete_patch').on('click', function (e) {
          e.preventDefault();
          console.log(id_patch)
          $.ajax({
              url: 'delete_patch/'+id_patch,
              method: 'get',
              dataType: 'json',
              success: function(data){
                // console.log(data.status);
                if (data.status == 'Success')
                {
                    $('#deletePatchModal').modal('hide');
                    patch_Table.ajax.reload();
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
  <!-- end div header -->
@endpush
