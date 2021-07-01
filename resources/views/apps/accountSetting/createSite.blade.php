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
                  <li class="breadcrumb-item active" aria-current="page">Create Site</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
            <div class="col-12">
              <div class="navbar-wrapper">
                <h3 class="h3"><span class="tim-note">Create Site</span></h3>
                <form class="navbar-form">
                  <div class="input-group no-border">

                    <i class="pt-2 ml-5 material-icons"> search</i>
                    <input id="search_site" type="text" value="" class="form-control" placeholder="Search...">

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
          <!-- <div class="collapse navbar-collapse justify-content-end">
            <a class="btn btn-primary" href="/accountSetting/addNewSite" role="button">
              <i class="material-icons">add</i> CREATE NEW
            </a>
          </div> -->
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid pr-5 pl-5 mt-5">
          <!-- ./ wizard -->
          <!-- header -->
          <div class="row">
            <div class="col">
            List Site ( 10 Site )
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
            <a class="btn btn-primary" href="#" role="button" id="add_row">
              <i class="material-icons">add</i> CREATE NEW
            </a>
          </div>
          <div class="card">
            <div class="card-table">
              <!-- Wizard step -->
              <div class="table-responsive">
                <input type="hidden" name="id_bup" id="id_bup" value="{{$id_bup}}">
                <table class="table display table-hover cell-border compact stripe" id="site" >
                  <thead class=" text-grey text-center">
                    <th class="text-center">No</th>
                    <th>Site Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th style="display:none;">ID Terminal</th>
                  </thead>
                  <tbody class=" text-grey text-center">
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($data_site as $site)
                  <tr>
                      <td>{{$no}}</td>
                      <td>{{$site->TERMINAL_NAME}}</td>
                      <td>{{$site->USERNAME}}</td>
                      <td>{{$site->PASSWORD}}</td>
                      <td>
                        @if ($site->STATUS == 1)
                            <a class="text-success" href="#" role="button">
                                <i class="fas fa-circle text-success text-left pr-1"></i> <span class="text-default">Active </span>
                            </a>
                        @else
                            <a class="text-success" href="#" role="button">
                                <i class="fas fa-circle text-success text-left pr-1"></i> <span class="text-default">Deactive </span>
                            </a>
                        @endif

                      </td>
                      <td>
                          <a href="#" data-placement="left" title="Edit Site" class="edit_site" id="edit_site"><i class="fas fa-edit fa-1x pl-2 pr-2 text-success"></i></a>
                          <a href="#" data-toggle="modal" data-target="#deleteTerminal" data-placement="left" title="Delete Site" class="delete_site" id="delete_site"><i class="fas fa-trash fa-1x pr-2 text-danger "></i></a>
                      </td>
                      <td style="display:none;">{{$site->ID_TERMINAL_PORTAL}}</td>
                  </tr>
                  @php $no++ @endphp
                  @endforeach
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
        var customerSite_Table = $('#site').DataTable({
            searching: true,
            paging: true,
            info: true,
            lengthChange:false,
            order: [ 0, 'asc' ],
            // serverSide: false,
            // processing: true,
            pageLength: 10,
            
        });

        $('#search_site').on('keyup change', function(){
          customerSite_Table.search($(this).val()).draw();
        });

        $('#add_row').on('click', function () {
            customerSite_Table.row.add([
                '',
                '<input type="text" class="form-control" name="nama_terminal" id="nama_terminal">',
                '<input type="text" class="form-control" name="username" id="username">',
                '<input type="password" class="form-control" name="password" id="password">',
                '',
                '<a href="#" data-toggle="tooltip"  data-placement="left" title="Add" id="add_site"><i class="fas fa-plus-circle fa-1x pl-2 pr-2 text-success"></i></a>'
                +'<a href="#" data-toggle="tooltip"  data-placement="left" title="Cancel" id="cancel_row" class="cancel_row"><i class="fas fa-close fa-1x pr-2 text-danger "></i></a>',
                ''
            ]).draw(false);
        });

        $('#site').on('click','#cancel_row', function () {
            var tableRow = customerSite_Table.row($(this).parents('tr'));
            customerSite_Table.row( tableRow ).remove().draw();
        });

        $('#site').on('click','.edit_site', function (e) {
            e.preventDefault();
            var nRow = $(this).parents('tr')[0];
            var aData = customerSite_Table.row($(this).parents('tr')).data();
            console.log(aData)
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '';
            jqTds[1].innerHTML = '<input type="text" class="form-control" name="nama_terminal" id="nama_terminal" value="'+aData[1]+'">';
            jqTds[2].innerHTML = '<input type="text" class="form-control" name="username" id="username" value="'+aData[2]+'">';
            jqTds[3].innerHTML = '<input type="password" class="form-control" name="password" id="password" value="'+aData[3]+'">';
            jqTds[4].innerHTML = '';
            jqTds[5].innerHTML = '<a href="#" data-toggle="tooltip"  data-placement="left" title="Edit Site" id="edit_row" class="edit_row"><i class="fas fa-edit fa-1x pl-2 pr-2 text-success"></i></a>'
                                +'<a href="#" data-toggle="tooltip"  data-placement="left" title="Cancel" id="cancel_site" class="cancel_site"><i class="fas fa-close fa-1x pr-2 text-danger "></i></a>';
            jqTds[6].innerHTML = '<input type="hidden" class="form-control" name="id_terminal" id="id_terminal" value="'+aData[6]+'">';
        });

        $('#site').on('click','.cancel_site', function (e) {
            e.preventDefault();
            var nRow = $(this).parents('tr')[0];
            var aData = customerSite_Table.row($(this).parents('tr')).data();
            console.log(aData)
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = aData[0];
            jqTds[1].innerHTML = aData[1];
            jqTds[2].innerHTML = aData[2];
            jqTds[3].innerHTML = aData[3];
            jqTds[4].innerHTML = aData[4];
            jqTds[5].innerHTML = '<a href="#" data-toggle="tooltip"  data-placement="left" title="Edit Site" class="edit_site" id="edit_site"><i class="fas fa-edit fa-1x pl-2 pr-2 text-success"></i></a>'
                                +'<a href="#" data-toggle="tooltip"  data-placement="left" title="Delete Site" class="delete_site" id="delete_site"><i class="fas fa-trash fa-1x pr-2 text-danger "></i></a>';
            jqTds[6].innerHTML = aData[6];
        });

        $('#site').on('click','#add_site',function(e){
            e.preventDefault();
            var id_bup = $('#id_bup').val();
            var nama_site = $('#nama_terminal').val();
            var username = $('#username').val();
            var password = $('#password').val();
            console.log('id_bup= '+id_bup+' &nama_site= '+nama_site+' &username= '+username+' &password= '+password);
            
            $.ajax({
                url: '{{url("add_site")}}',
                method: 'post',
                dataType: 'json',
                data: {id_bup : id_bup,nama_site : nama_site,username : username,password : password},
                success: function(data){
                  // console.log(data.status);
                  if (data.status == 'Success')
                  {
                      // $('#site').DataTable().ajax.reload();
                      location.reload();
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
        
        $('#site').on('click','.edit_row', function (e) {
            e.preventDefault();
            var nama_site = $('#nama_terminal').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var id_terminal = $('#id_terminal').val();

            $.ajax({
                url: '{{url("edit_site")}}/'+id_terminal,
                method: 'post',
                dataType: 'json',
                data: {nama_site : nama_site,username : username,password : password},
                success: function(data){
                  // console.log(data.status);
                  if (data.status == 'Success')
                  {
                      // $('#site').DataTable().ajax.reload();
                      location.reload();
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
        
        var id_terminal;
        $('#site tbody').on('click','#delete_site', function (e) {
            var data = customerSite_Table.row( $(this).parents('tr') ).data();
            id_terminal = data[6];
            console.log(id_terminal);
        });

        $('#delete_terminal').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{url("delete_site")}}/'+id_terminal,
                method: 'get',
                dataType: 'json',
                success: function(data){
                  // console.log(data.status);
                  if (data.status == 'Success')
                  {
                      // $('#site').DataTable().ajax.reload();
                      location.reload();
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
