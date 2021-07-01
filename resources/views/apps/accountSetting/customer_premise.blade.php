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
                  <li class="breadcrumb-item">Customers</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
            <div class="col-12">
              <div class="navbar-wrapper">
                <h3 class="h3"><span class="tim-note">All Customer</span></h3>
                <form class="navbar-form">
                  <div class="input-group no-border">

                    <i class="pt-2 ml-5 material-icons"> search</i>
                    <input id="search_customer" type="text" value="" class="form-control" placeholder="Search...">

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
            List Customer ( 10 Customer )
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
          <div class="card">
            <div class="card-table">
              <!-- Wizard step -->

              <div class="table-responsive">
                <table class="table display table-hover cell-border compact stripe" id="v_customer" >
                  <thead class=" text-grey text-center">
                    <th class="text-center">No</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Document</th>
                    <th>Plan</th>
                    <th>License</th>
                    <th>Status</th>
                    <th>ID Bup</th>
                    <th width="15%">Action</th>
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
@include('apps.modal.modalBUP')

@push('scriptJS')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // Datatable_vessel
        var bup_id = {{$bup}};
        if ({{$role}} == 1) {var urlz = 'get_customer';}
        else {var urlz = 'get_customer_byRole/'+bup_id;}
        var vesCustomer_Table = $('#v_customer').DataTable({
            searching: true,
            paging: true,
            info: true,
            lengthChange:false,
            order: [ 0, 'asc' ],
            pageLength: 10,
            ajax: {
                url: urlz,
                dataSrc: 'data'
            },
            columns:[
                { data : null,
                  render: function (data, type, row, meta) {
                          //I want to get row index here somehow
                          return  meta.row+1;
                    }
                },
                { data : 'BUP_NAME' },
                { data : 'BUP_EMAIL'  },
                { data : 'BUP_PHONE'  },
                { data : null,
                  render: function (data, type, row, meta) {
                      set_link_1 = (row.BUP_FILE_1 != 'online') && (row.BUP_FILE_1 != 'offline') ? '<a href="get_file/'+row.BUP_FILE_1+'">'+row.BUP_FILE_1+'.</a>' : '-';
                      set_link_2 = (row.BUP_FILE_2 != 'online') && (row.BUP_FILE_1 != 'offline') ? '<a href="get_file/'+row.BUP_FILE_2+'">'+row.BUP_FILE_2+'.</a>' : '-';
                      set_link_3 = (row.BUP_FILE_3 != 'online') && (row.BUP_FILE_1 != 'offline') ? '<a href="get_file/'+row.BUP_FILE_3+'">'+row.BUP_FILE_3+'.</a>' : '-';
                      set_link_4 = (row.BUP_FILE_4 != 'online') && (row.BUP_FILE_1 != 'offline') ? '<a href="get_file/'+row.BUP_FILE_4+'">'+row.BUP_FILE_4+'.</a>' : '-';
                      return '1. '+set_link_1+'<br>'
                             +'2. '+set_link_2+'<br>'
                             +'3. '+set_link_3+'<br>'
                             +'4. '+set_link_4;
                  }
                },
                { data : null,
                  render: function (data, type, row, meta) {
                      if (row.BUP_PLAN == '1')
                      {
                          return 'Cloud Services';
                      }
                      else
                      {
                          return 'On Premise';
                      }
                  }

                },
                { data : null,
                  render: function (data, type, row, meta) {
                      if(row.LICENSE_KEY == null)
                      {
                          return '-';
                      }
                      else
                      {
                          return row.LICENSE_KEY;
                      }
                  }
                },
                { data : 'BUP_STATUS',
                  render: function (data, type, row, meta) {
                      if (row.BUP_STATUS == '1')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1 text-warning"></i>'
                                  +'<span class="text-default">Waiting Approval Document</span></a>';
                      }
                      else if (row.BUP_STATUS == '2')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Approve Document</span></a>';
                      }
                      else if (row.BUP_STATUS == '3')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Reject Document</span></a>';
                      }
                      else if (row.BUP_STATUS == '4')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Waiting Approval Payment</span></a>';
                      }
                      else if (row.BUP_STATUS == '5')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Paid</span></a>';
                      }
                      else if (row.BUP_STATUS == '6')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Unpaid</span></a>';
                      }
                  }

                },
                { data : 'ID_BUP' },
                { data : null,
                    render: function (data, type, row, meta) {
                      if ({{$role}} == 1)
                      {                        
                          if (row.BUP_STATUS == '1')
                          {
                            return '<a href="#" data-toggle="modal" data-target="#rejectAccount" title="Reject" id="rej_acc"><i class="fas fa-window-close fa-1x pl-2 pr-2 text-danger"></i></a>'
                                  +'<a href="#" data-toggle="modal" data-target="#approveAccount"  title="Approve" id="app_acc"><i class="fas fa-check-square fa-1x pr-2 text-success"></i></a>'
                                  +'<a href="#" data-toggle="modal" data-target="#bupModal" data-placement="left" title="Edit BUP" class="edit_modal" id="edit_modal"><i class="fas fa-edit fa-1x pl-2 pr-2 text-success"></i></a>';

                          }
                          else if (row.BUP_STATUS == '2' || row.BUP_STATUS == '4' || row.BUP_STATUS == '5')
                          {
                            return '<a href="set_site/'+row.ID_BUP+'" data-toggle="tooltip"  data-html="true" data-placement="left" title="Setting Site"><i class="fas fa-cogs fa-1x pl-2 pr-2 text-info"></i></a>'
                                  +'<a href="{{url('patch')}}" data-toggle="tooltip"  data-html="true" data-placement="left" title="Upload Patch"><i class="fas fa-download fa-1x pr-2 text-primary"></i></a>'
                                  +'<a href="get_billing/'+row.ID_BUP+'" data-toggle="tooltip"  data-html="true" data-placement="left" title="Check Billing" data-toggle="modal" data-target="#send_request_modal" ><i class="fas fa-credit-card  text-success"></i></a>';
                          }
                          else if (row.BUP_STATUS == '3' || row.BUP_STATUS == '6')
                          {
                            return '<a href="#" data-toggle="modal" data-target="#approveAccount"  title="Approve" id="app_acc"><i class="fas fa-check-square fa-1x pr-2 text-success"></i></a>';
                          }
                      }
                      else
                      {
                          if (row.BUP_STATUS == '1')
                          {
                            return '<a href="#" data-toggle="modal" data-target="#bupModal" data-placement="left" title="Edit BUP" class="edit_modal" id="edit_modal"><i class="fas fa-edit fa-1x pl-2 pr-2 text-success"></i></a>';
                                  // +'<a href="#" data-toggle="modal" data-target="#deleteBUP" data-placement="left" title="Delete BUP" class="delete_modal" id="delete_modal"><i class="fas fa-trash fa-1x pr-2 text-danger "></i></a>';

                          }
                          else if (row.BUP_STATUS == '2')
                          {
                            return '<a href="get_billing/'+row.ID_BUP+'" data-toggle="tooltip"  data-html="true" data-placement="left" title="Check Billing"><i class="fas fa-credit-card  text-success"></i></a>';
                          }
                          else if (row.BUP_STATUS == '3' || row.BUP_STATUS == '4' || row.BUP_STATUS == '6')
                          {
                            return '<a href="#" data-toggle="modal" data-target="#viewBUP" data-toggle="modal"  data-placement="left" title="View BUP"  ><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>';
                          }
                          else if (row.BUP_STATUS == '5')
                          {
                            return '<a href="{{url('patch')}}" data-toggle="tooltip"  data-html="true" data-placement="left" title="Download Patch"><i class="fas fa-download fa-1x pr-2 text-primary"></i></a>';
                          }
                      }
                    }
                }
            ],
            columnDefs: [
                { targets: [8], visible: false}
            ]
        });

        $('#search_customer').on('keyup change', function(){
          vesCustomer_Table.search($(this).val()).draw();
        });

        var id_bup,bup_name,bup_address,bup_phone,bup_npwp,bup_siup,bup_email,bup_plan,bup_username,bup_password;
        $('#v_customer tbody').on( 'click', '#app_acc', function () {
            var data = vesCustomer_Table.row( $(this).parents('tr') ).data();
            id_bup = data.ID_BUP;
            console.log(id_bup);
        });

        $('#v_customer tbody').on( 'click', '#rej_acc', function () {
            var data = vesCustomer_Table.row( $(this).parents('tr') ).data();
            id_bup = data.ID_BUP;
            console.log(id_bup);
        });

        $('#v_customer tbody').on( 'click', '#edit_modal', function () {
            var data = vesCustomer_Table.row( $(this).parents('tr') ).data();
            id_bup = data.ID_BUP;
            bup_name = data.BUP_NAME;
            bup_address = data.BUP_ADDRESS;
            bup_phone = data.BUP_PHONE;
            bup_npwp = data.BUP_NPWP;
            bup_siup = data.BUP_SIUP;
            bup_email = data.BUP_EMAIL;
            bup_plan = data.BUP_PLAN;
            bup_username = data.BUP_USERNAME;
            bup_password = data.BUP_PASSWORD;
            console.log(id_bup);

            $('#name').val(bup_name);
            $('#address').val(bup_address);
            $('#email').val(bup_email);
            $('#phone').val(bup_phone);
            $('#npwp').val(bup_npwp);
            $('#siup').val(bup_siup);
            $('#username').val(bup_username);
            $('#password').val(bup_password);
            if (bup_plan == 1){$('#planCloud').prop('checked',true);}
            else {$('#planPremise').prop('checked',true);}
        });

        $('#approve_account').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url: 'app_acc/'+id_bup,
                method: 'get',
                dataType: 'json',
                success: function(data){
                  if (data.status == 'Success')
                  {
                      vesCustomer_Table.ajax.reload();
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
        })

        $('#reject_account').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url: 'rej_acc/'+id_bup,
                method: 'get',
                dataType: 'json',
                success: function(data){
                  if (data.status == 'Success')
                  {
                      vesCustomer_Table.ajax.reload();
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
        })

        function fill_all(){
          var result = {
              name        : $("#name").val(),
              address     : $("#address").val(),
              phone       : $("#phone").val(),
              npwp        : $("#npwp").val(),
              siup        : $("#siup").val(),
              email       : $("#email").val(),
              username    : $("#username").val(),
              password    : $("#password").val(),
              plan        : $("input[name='plan']:checked").val(),
          };
          return result;
        }

        $('#edit_bup').on('click',function(e){
            e.preventDefault();
            var data_all = fill_all();
            console.log(data_all)
            var validator = $("#bup_form").validate({
            rules: {
                      name:{
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
                  url: 'edit_bup/'+id_bup,
                  method: 'post',
                  dataType: 'json',
                  data : data_all,
                  success: function(data){
                    if (data.status == 'Success')
                    {
                        $('#bupModal').modal('hide');
                        vesCustomer_Table.ajax.reload();
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
    });
</script>
  <!-- end div header -->
@endpush
