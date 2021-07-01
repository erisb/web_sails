@extends('web_sl.mains.header_sl')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <!-- breadcrumb -->
          <div class="row">
            {{-- <input type="text" name="ves_name" id="ves_name"> --}}
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="width:400px;">
                  <li class="breadcrumb-item">Vessel Schedule</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
            <div class="col-12">
              <div class="navbar-wrapper">
                <h3 class="h3"><span class="tim-note">All Vessel Schedule</span></h3>
                <form class="navbar-form">
                  <div class="input-group no-border">

                    <i class="pt-2 ml-5 material-icons"> search</i>
                    <input id="search_ves_sch" type="text" value="" class="form-control" placeholder="Search...">

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
            List Vessel Schedule ( 10 Vessel Schedule )
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
            <a class="btn btn-primary" href="#" role="button" id="show_add_vesSchedule" data-toggle="modal" data-target="#vesScheduleModal">
              <i class="material-icons">add</i> Vessel Schedule
            </a>
          </div>
          <div class="card">
            <div class="card-table">
              <!-- Wizard step -->

              <div class="table-responsive">
                <table class="table display table-hover cell-border compact stripe" id="ves_sch" >
                  <thead class=" text-grey text-center">
                    <th class="text-center">No</th>
                    <th>Vessel Name</th>
                    <th width="15%">Route</th>
                    <th>Arrival</th>
                    <th>Berthing</th>
                    <th>Departure</th>
                    <th>Status</th>
                    <th>Id Vessel Schedule</th>
                    <th>Id User</th>
                    <th>Id Customer</th>
                    <th>Id Terminal</th>
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
@include('web_sl.modal.modalVesSchedule')

@push('scriptJS')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#eta').datetimepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd HH:MM:ss'
    });
    $('#etb').datetimepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd HH:MM:ss'
    });
    $('#etd').datetimepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd HH:MM:ss'
    });

    $(document).ready(function() {
        // Datatable_vessel
        var vesSchedule_Table = $('#ves_sch').DataTable({
            searching: true,
            paging: true,
            info: true,
            lengthChange:false,
            order: [ 0, 'asc' ],
            pageLength: 10,
            ajax: {
                url: '{{url('vesselSchedule_list')}}/{{$id_terminal}}',
                dataSrc: 'data'
            },
            columns:[
                { data : null,
                  render: function (data, type, row, meta) {
                          //I want to get row index here somehow
                          return  meta.row+1;
                    }
                },
                { data : 'ves_master.VESSEL_NAME' },
                { data : null,
                  render: function (data, type, row, meta) {
                     return row.get_port_ori.PORT_NAME+' - '+row.get_port_next.PORT_NAME
                  }
                },
                { data : 'ETA'  },
                { data : 'ETB'  },
                { data : 'ETD'  },
                { data : 'STATUS',
                  render: function (data, type, row, meta) {
                      if (row.STATUS == '1')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1 text-warning"></i>'
                                  +'<span class="text-default">New</span></a>';
                      }
                      else if (row.STATUS == '2')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Waiting Approval</span></a>';
                      }
                      else if (row.STATUS == '3')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Approve Schedule</span></a>';
                      }
                      else if (row.STATUS == '4')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Reject Schedule</span></a>';
                      }
                      else if (row.STATUS == '5')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Waiting Approve Service</span></a>';
                      }
                      else if (row.STATUS == '6')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Approve Service</span></a>';
                      }
                      else if (row.STATUS == '7')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Reject Service</span></a>';
                      }
                      else if (row.STATUS == '8')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Realization</span></a>';
                      }
                      else if (row.STATUS == '9')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Pranota</span></a>';
                      }
                      else if (row.STATUS == '10')
                      {
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1"></i>'
                                  +'<span class="text-default">Invoice</span></a>';
                      }
                  }

                },
                { data : 'ID_VES_SCHEDULE' },
                { data : 'ID_USER' },
                { data : 'ID_CUSTOMERS' },
                { data : 'ID_TERMINAL' },
                { data : null,
                    render: function (data, type, row, meta) {                 
                        if (row.STATUS == '1')
                        {
                          return '<a href="#" data-toggle="modal" data-target="#vesScheduleModal" data-placement="left" title="Edit Schedule" id="edit_sch_modal"><i class="fas fa-edit fa-1x pl-2 pr-2 text-success"></i></a>'
                            +'<a href="#" data-toggle="modal" data-target="#deleteVesScheduleModal" data-placement="left" title="Delete Schedule" id="delete_sch_modal"><i class="fas fa-trash fa-1x pr-2 text-danger "></i></a>'
                            +'<a href="#" data-toggle="modal" data-target="#requestVesScheduleModal" data-placement="left" title="Request Approve Schedule" id="send_req_sch_modal"><i class="fas fa-envelope fa-1x pr-2 text-danger "></i></a>';

                        }
                        else if(row.STATUS == '3')
                        {
                            if ({{$data_services}} == '0')
                            {
                                return '<a href="{{url('web_sl/vesServices')}}/'+row.ID_VES_SCHEDULE+'/'+row.ves_master.ID_VESSEL+'" data-placement="left" title="Add Services" id="add_services_show"><i class="fas fa-plus-square fa-1x pl-2 pr-2 text-success"></i></a>'
                                +'<a href="#" data-toggle="modal" data-target="#requestVesServicesModal" data-placement="left" title="Request Approve Services" id="send_req_serv_modal"><i class="fas fa-envelope fa-1x pr-2 text-danger "></i></a>';
                            }
                            else
                            {
                                return '<a href="#" data-toggle="modal" data-target="#requestVesServicesModal" data-placement="left" title="Request Approve Services" id="send_req_serv_modal"><i class="fas fa-envelope fa-1x pr-2 text-danger "></i></a>';
                            }
                        }
                        else
                        {
                            return '<a href="{{url('web_sl/vesServices')}}/'+row.ID_VES_SCHEDULE+'/'+row.ves_master.ID_VESSEL+'" data-toggle="tooltip"  data-placement="left" title="View Schedule & Services" id="view_sch"><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>';
                        }
                    }
                }
            ],
            columnDefs: [
                { targets: [7,8,9,10], visible: false}
            ]
        });

        $('#search_ves_sch').on('keyup change', function(){
          vesSchedule_Table.search($(this).val()).draw();
        });

        var id_country,id_vessel;
        $('#ves_name').autocomplete({
            source: "{{url('vessel_auto')}}",
            appendTo : "#vesScheduleModal",
            select:function(key,value){
                console.log(value.item)
                $('#call_sign').val(value.item.call_sign);
                $('#flag').val(value.item.country);
                $('#ves_code').val(value.item.vessel_code)
                id_country = value.item.id_country;
                id_vessel = value.item.id_vessel;
            }
        })

        $('#show_add_vesSchedule').on( 'click', function () {
            $('#vesSch_form')[0].reset();
            $('#add_title').attr('style','display:block');
            $('#edit_title').attr('style','display:none');

            $('#show_add').attr('style','display:block');
            $('#show_edit').attr('style','display:none');
        });

        var id_sch,ves_name,voy_in,voy_out,voy_type,eta,etb,etd,origin_port,destination_port,id_user,id_customer,id_terminal;
        $('#ves_sch tbody').on( 'click', '#delete_sch_modal', function () {
            var data = vesSchedule_Table.row( $(this).parents('tr') ).data();
            id_sch = data.ID_VES_SCHEDULE;
            console.log(id_sch);
        });
        
        $('#ves_sch tbody').on( 'click', '#edit_sch_modal', function () {
            var data = vesSchedule_Table.row( $(this).parents('tr') ).data();
            id_sch = data.ID_VES_SCHEDULE;
            ves_name = data.ves_master.VESSEL_NAME;
            voy_in = data.VOY_IN;
            voy_out = data.VOY_OUT;
            voy_type = data.JENIS_PELAYARAN;
            eta = data.ETA;
            etb = data.ETB;
            etd = data.ETD;
            origin_port = data.ORIGIN;
            destination_port = data.DESTINATION;
            id_user = data.ID_USER;
            id_customers = data.ID_CUSTOMERS;
            id_terminal = data.ID_TERMINAL
            console.log(id_sch);
            $('#vesSch_form')[0].reset();

            $('#ves_name').val(ves_name);
            $('#voy_in').val(voy_in);
            $('#voy_out').val(voy_out);
            $('#voy_type').val(voy_type);
            $('#ship_agent').val(id_customers);
            $('#eta').val(eta);
            $('#etb').val(etb);
            $('#etd').val(etd);
            $('#ori_port').val(origin_port);
            $('#next_port').val(destination_port);
            $('#id_user').val(id_user);
            $('#id_customer').val(id_customer);
            $('#id_terminal').val(id_terminal);
            
            $.ajax({
                url: '{{url('edit_vessel_auto')}}',
                method: 'get',
                dataType: 'json',
                data:{term : $('#ves_name').val()},
                success: function(data){
                  console.log(data)
                  if (data != '')
                  {
                      $('#call_sign').val(data[0].CALL_SIGN);
                      $('#flag').val(data[0].COUNTRY_NAME);
                      $('#ves_code').val(data[0].VESSEL_CODE)
                      id_country = data[0].ID_COUNTRY;
                      id_vessel = data[0].ID_VESSEL;
                  }
                  else
                  {
                      alert('Data Kosong');
                  }
                },
                error: function(error){
                    alert('Ada Error'+error+' nih');
                }
            })

            $('#add_title').attr('style','display:none');
            $('#edit_title').attr('style','display:block');

            $('#show_add').attr('style','display:none');
            $('#show_edit').attr('style','display:block');
            
        });

        $('#ves_sch tbody').on( 'click', '#send_req_sch_modal', function () {
            var data = vesSchedule_Table.row( $(this).parents('tr') ).data();
            id_sch = data.ID_VES_SCHEDULE;
            console.log(id_sch);
        });

        $('#ves_sch tbody').on( 'click', '#send_req_serv_modal', function () {
            var data = vesSchedule_Table.row( $(this).parents('tr') ).data();
            id_sch = data.ID_VES_SCHEDULE;
            console.log(id_sch);
        });

        $('#send_request_sch').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url: '{{url('send_ves_sch')}}/'+id_sch,
                method: 'get',
                dataType: 'json',
                success: function(data){
                  if (data.status == 'Success')
                  {
                      vesSchedule_Table.ajax.reload();
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

        $('#send_request_serv').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url: '{{url('send_ves_serv')}}/'+id_sch,
                method: 'get',
                dataType: 'json',
                success: function(data){
                  if (data.status == 'Success')
                  {
                      vesSchedule_Table.ajax.reload();
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

        $('#delete_vesSchedule').on('click',function(e){
            e.preventDefault();
            $.ajax({
                url: '{{url('delete_ves_sch')}}/'+id_sch,
                method: 'get',
                dataType: 'json',
                success: function(data){
                  if (data.status == 'Success')
                  {
                      vesSchedule_Table.ajax.reload();
                  }
                  else
                  {
                      alert('Data Gagal di Hapus');
                  }
                },
                error: function(error){
                    alert('Ada Error'+error+' nih');
                }
            })
        })
        
        function fill_all(){
          var result = {
              ID_VESSEL       : id_vessel,
              VOYAGE_IN       : $("#voy_in").val(),
              VOYAGE_OUT      : $("#voy_out").val(),
              JENIS_PELAYARAN : $("#voy_type").val(),
              ETA             : $("#eta").val(),
              ETB             : $("#etb").val(),
              ETD             : $("#etd").val(),
              ORIGIN          : $("#ori_port").val(),
              DESTINATION     : $("#next_port").val(),
              ID_USER         : $("#id_user").val(),
              ID_CUSTOMER     : $("#id_customer").val(),
              ID_TERMINAL     : $("#id_terminal").val(),
              STATUS          : 1
          };
          return result;
        }

        $('#add_ves_sch').on('click',function(e){
            e.preventDefault();
            var data_all = fill_all();
            console.log(data_all)
            var validator = $("#vesSch_form").validate({
            rules: {
                      ves_name:{
                        required:true
                      },
                      call_sign:{
                        required:true
                      },
                      flag:{
                        required:true
                      },
                      ves_code:{
                        required:true
                      },
                      voy_in:{
                        required:true
                      },
                      voy_out:{
                        required:true
                      },
                      // ship_agent:{
                      //   required:true
                      // },
                      voy_type:{
                        required:true
                      },
                      eta:{
                        required:true
                      },
                      etb:{
                        required:true
                      },
                      etd:{
                        required:true
                      },
                      ori_port:{
                        required:true
                      },
                      next_port:{
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
                  url: '{{url('add_ves_sch')}}',
                  method: 'post',
                  dataType: 'json',
                  data : data_all,
                  success: function(data){
                    if (data.status == 'Success')
                    {
                        $('#vesScheduleModal').modal('hide');
                        vesSchedule_Table.ajax.reload();
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

        $('#edit_ves_sch').on('click',function(e){
            e.preventDefault();
            var data_all = fill_all();
            console.log(data_all)
            var validator = $("#vesSch_form").validate({
            rules: {
                      ves_name:{
                        required:true
                      },
                      call_sign:{
                        required:true
                      },
                      flag:{
                        required:true
                      },
                      ves_code:{
                        required:true
                      },
                      voy_in:{
                        required:true
                      },
                      voy_out:{
                        required:true
                      },
                      // ship_agent:{
                      //   required:true
                      // },
                      voy_type:{
                        required:true
                      },
                      eta:{
                        required:true
                      },
                      etb:{
                        required:true
                      },
                      etd:{
                        required:true
                      },
                      ori_port:{
                        required:true
                      },
                      next_port:{
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
                  url: '{{url('edit_ves_sch')}}/'+id_sch,
                  method: 'post',
                  dataType: 'json',
                  data : data_all,
                  success: function(data){
                    if (data.status == 'Success')
                    {
                        $('#vesScheduleModal').modal('hide');
                        vesSchedule_Table.ajax.reload();
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
@endpush
