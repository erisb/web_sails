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
                  <li class="breadcrumb-item">Payment Verification</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
            <div class="col-12">
              <div class="navbar-wrapper">
                <h3 class=""><span class="tim-note">Payment Verification </span></h3>
                <form class="navbar-form">
                  <div class="input-group no-border">

                    <i class="pt-2 ml-5 material-icons"> search</i>
                    <input id="search_pay" type="text" value="" class="form-control" placeholder="Search...">

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
            List Payment ( 10 Payment )
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
                <table class="table display table-hover cell-border compact stripe" id="pay_veri" >
                  <thead class=" text-grey text-center">
                    <th class="text-center">No</th>
                    <th>Company Name</th>
                    <th>Phone</th>
                    <th>Terminal</th>
                    <th>Cycle Plan</th>
                    <th>Total Ammount</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th style="display:none;">ID Payment</th>
                    <th style="display:none;">ID BUP</th>
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
@include('apps.modal.modalBUP')

@push('scriptJS')
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready(function() {
      var bup_id = {{$bup}};
      if ({{$role}} == 1) {var urlz = 'get_pay_veri';}
      else {var urlz = 'get_pay_veri_byRole/'+bup_id;}
      var payVerification_Table = $('#pay_veri').DataTable({
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
              { data : 'BUP_PHONE'  },
              { data : 'TOTAL_TERMINAL'  },
              { data : null,
                render: function (data, type, row, meta) {
                    if (row.BUP_PLAN == '1')
                    {
                        return '1 Years';
                    }
                    else
                    {
                        return 'OTC';
                    }
                }
              },
              { data : 'TOTAL' },
              { data : null,
                render: function (data, type, row, meta) {
                    if (row.STATUS == '1')
                    {
                        return '<a class="text-success" href="#" role="button">'
                              +'<i class="fas fa-circle text-warning text-left pr-1"></i> <span class="text-default">Verified</span>'
                              +'</a>';
                    }
                    else if (row.STATUS == '2')
                    {
                        return '<a class="text-success" href="#" role="button">'
                              +'<i class="fas fa-circle text-warning text-left pr-1"></i> <span class="text-default">Reject</span>'
                              +'</a>';
                    }
                    else if (row.STATUS == '3')
                    {
                        return '<a class="text-success" href="#" role="button">'
                              +'<i class="fas fa-circle text-warning text-left pr-1"></i> <span class="text-default">Waiting Approval</span>'
                              +'</a>';
                    }
                    else if (row.STATUS == '4')
                    {
                        return '<a class="text-success" href="#" role="button">'
                              +'<i class="fas fa-circle text-warning text-left pr-1"></i> <span class="text-default">Waiting Payment</span>'
                              +'</a>';
                    }
                }

              },
              { data : null,
                  render: function (data, type, row, meta) {
                    if ({{$role}} == 1)
                    {
                        if (row.STATUS == '1')
                        {
                          return '<a href="#" data-toggle="modal" data-target="#viewPayment" data-toggle="tooltip"  data-placement="left" title="View Payment" id="view_pay"><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>';

                        }
                        else if (row.STATUS == '2')
                        {
                          return '<a href="#" data-toggle="modal" data-target="#viewPayment" data-toggle="tooltip"  data-placement="left" title="View Payment" id="view_pay"><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>';
                        }
                        else if (row.STATUS == '3')
                        {
                          return '<a href="#" data-toggle="modal" data-target="#rejectPayment" data-toggle="tooltip"  data-placement="left" title="Reject Payment" id="app_pay"><i class="fas fa-window-close fa-1x pl-2 pr-2 text-danger"></i></a>'
                                +'<a href="#" data-toggle="modal" data-target="#approvePayment" data-toggle="tooltip"  data-placement="left" title="Approve Payment" id="rej_pay"><i class="fas fa-check-square fa-1x pr-2 text-success"></i></a>';
                        }
                        else if (row.STATUS == '4')
                        {
                          // return '<a href="#" data-toggle="modal" data-target="#rejectPayment" data-toggle="tooltip"  data-placement="left" title="Approve Reject"  ><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>';
                            return '<a href="#" data-toggle="modal" data-target="#viewPayment" data-toggle="tooltip"  data-placement="left" title="View Payment" id="view_pay"><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>';
                        }
                    }
                    else
                    {
                          return '<a href="#" data-toggle="modal" data-target="#viewPayment" data-toggle="tooltip"  data-placement="left" title="View Payment" id="view_pay"><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>';
                    }
                  }
              },
              { data : 'ID_PAYMENT_H'  },
              { data : 'ID_BUP'  }
          ],
          columnDefs: [
              { targets: [8,9], visible: false}
          ]
      });

      $('#search_pay').on('keyup change', function(){
          payVerification_Table.search($(this).val()).draw();
      });

      var id_pay;
      var id_bup,bup_name;
      $('#pay_veri tbody').on( 'click', '#app_pay', function () {
          var data = payVerification_Table.row( $(this).parents('tr') ).data();
          id_pay = data.ID_PAYMENT_H;
          id_bup = data.ID_BUP;
          console.log(id_pay);
      });

      $('#pay_veri tbody').on( 'click', '#rej_pay', function () {
          var data = payVerification_Table.row( $(this).parents('tr') ).data();
          id_pay = data.ID_PAYMENT_H;
          id_bup = data.ID_BUP;
          console.log(id_pay);
      });

      $('#pay_veri tbody').on( 'click', '#view_pay', function () {
          var data = payVerification_Table.row( $(this).parents('tr') ).data();
          id_pay = data.ID_PAYMENT_H;
          nama = data.BUP_NAME;
          console.log(id_pay)
          $('#bup_name').text(nama);
          $.ajax({
              url: '{{url("get_view_pay")}}/'+id_pay,
              method: 'get',
              dataType: 'json',
              success: function(data){
                console.log(data);
                if (data != '')
                {
                    if (data.data[0].STATUS == 1){var status = 'Paid';}
                    else {var status = 'UnPaid';}
                    $('#status').text(status);
                    if (data.data[0].BUP_PLAN == 1){var plan = 'Subcribe';var invoice = '1 Years';}
                    else{var plan = 'License';var invoice = 'OTC';}
                    $('#current').text(plan);
                    $('#expired').text(data.data[0].EXPIRED_DATE);
                    $('#invoice').text(invoice);
                    $('#total_site').text(data.data[0].TOTAL_TERMINAL);
                    $('#total_cost').text(data.data[0].TOTAL);
                    $('#list_terminal').html('');
                    for(var i=0;i<data.data[0].TOTAL_TERMINAL;i++)
                    {
                      $('#list_terminal').append('<div class="d-flex flex-row justify-content-between my-flex-container"><div class="p-2 my-flex-item">'+data.data[i].TERMINAL_NAME+'</div><div class="p-2 my-flex-item">'+data.data[i].AMOUNT+'</div></div>'
                      );
                    }
                }
                else
                {
                    $('#viewPayment').modal('hide');
                    alert('Data Kosong');
                }
              },
              error: function(error){
                  alert('Ada Error'+error+' nih');
              }
          });
          console.log(nama);
      });

      $('#app_pay').on('click', function (e) {
          e.preventDefault();
          $.ajax({
              url: '{{url("app_pay")}}/'+id_pay+'/'+id_bup,
              method: 'get',
              dataType: 'json',
              success: function(data){
                // console.log(data.status);
                if (data.status == 'Success')
                {
                    payVerification_Table.ajax.reload();
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
      });

      $('#rej_pay').on('click', function (e) {
          e.preventDefault();
          $.ajax({
              url: '{{url("rej_pay")}}/'+id_pay,
              method: 'get',
              dataType: 'json',
              success: function(data){
                // console.log(data.status);
                if (data.status == 'Success')
                {
                    payVerification_Table.ajax.reload();
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
      });
  });

</script>
@endpush
