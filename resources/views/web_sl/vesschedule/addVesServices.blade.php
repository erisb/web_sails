@extends('web_sl.mains.header_sl')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          @if ($jmlh_services === 0)
            <div class="navbar-wrapper">
              <h3 class=""><span class="tim-note">Add Vessel Schedule & Services</span></h3>
            </div>
          @else
            <div class="navbar-wrapper">
              <h3 class=""><span class="tim-note">View Vessel Schedule & Services</span></h3>
            </div>
          @endif
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
                <p class="h3"><i class=" fa fa-ship"></i> <b>Vessel Info</b></p>
                <hr class="mb-5 mr-5">
              <form id="vesSch_form">
                <input type="hidden" class="form-control" name="id_user" id="id_user" value="{{$id_user}}">
                  <input type="hidden" class="form-control" name="id_customer" id="id_customer" value="@php echo !empty($id_customer) ? $id_customer : 0 @endphp">
                  <input type="hidden" class="form-control" name="id_terminal" id="id_terminal" value="{{$id_terminal}}">
                  <input type="hidden" class="form-control" name="id_sch" id="id_sch" value="{{$all_sch->ID_VES_SCHEDULE}}">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Vessel Name</label>
                        <input type="text" class="form-control" name="ves_name" autocomplete="off" id="ves_name" value="{{$all_sch->ves_master->VESSEL_NAME}}" disabled="disabled">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Call Sign</label>
                        <input type="text" class="form-control" name="call_sign" id="call_sign" value="{{$data_vessel[0]->CALL_SIGN}}" disabled="disabled">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Flag</label>
                        <input type="text" class="form-control" name="flag" id="flag" value="{{$data_vessel[0]->COUNTRY_NAME}}" disabled="disabled">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Vessel Code</label>
                        <input type="text" class="form-control" name="ves_code" id="ves_code" value="{{$data_vessel[0]->VESSEL_CODE}}" disabled="disabled">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Voy In</label>
                        <input type="text" class="form-control" name="voy_in" id="voy_in" value="{{$all_sch->VOY_IN}}" disabled="disabled">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Voy Out</label>
                        <input type="text" class="form-control" name="voy_out" id="voy_out" value="{{$all_sch->VOY_OUT}}"" disabled="disabled">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Voyage Type</label>
                        <select class="form-control" name="voy_type" id="voy_type" disabled="disabled">
                            <option value="">Pilih Tipe</option>
                            <option value="INTERSULLER" @php echo ($all_sch->JENIS_PELAYARAN == 'INTERSULLER') ? 'selected="selected"' : '';@endphp>INTERSULLER</option>
                            <option value="OCEAN GOING" @php echo ($all_sch->JENIS_PELAYARAN == 'OCEAN GOING') ? 'selected="selected"' : '';@endphp>OCEAN GOING</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Shipping Agent</label>
                        <select class="form-control" name="ship_agent" id="ship_agent" disabled="disabled">
                            <option value="">Pilih Shipping Agent</option>
                            @foreach ($customer as $value)
                               <option value="{{$value->ID_CUSTOMERS}}" @php echo ($value->ID_CUSTOMERS == Session::get('customer')) ? 'selected="selected"' : '' @endphp">{{$value->CUSTOMERS_NAME}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div><br><br>
                  <!-- Estimation Schedule -->
                  <div class="col-12">
                    <p class="h3"><i class=" fa fa-clock"></i> <b>Estimation Schedule</b></p>
                    <hr class="mb-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">ETA</label>
                      <input type="text" name="eta" id="eta" class="form-control" value="{{$all_sch->ETA}}" disabled="disabled">
                    </div><br><br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">ETB</label>
                      <input type="text" name="etb" id="etb" class="form-control" value="{{$all_sch->ETB}}" disabled="disabled">
                    </div><br><br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">ETD</label>
                      <input type="text" name="etd" id="etd" class="form-control"value="{{$all_sch->ETD}}" disabled="disabled">
                    </div>
                  </div><br><br>
                  <!--  Port info -->
                  <!--  Vessel info -->
                  <div class="col-12">
                    <p class="h3"><i class=" fa fa-anchor"></i> <b>Port Info</b></p>
                    <hr class="mb-5">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Next Port</label>
                          <select class="form-control" name="next_port" id="next_port" disabled="disabled">
                              <option value="">Pilih Port</option>
                              @foreach ($port as $value)
                                 <option value="{{$value->ID_PORT}}" @php echo ($all_sch->DESTINATION == $value->ID_PORT) ? 'selected="selected"' : '';@endphp>{{$value->PORT_NAME}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Origin Port</label>
                          <select class="form-control" name="ori_port" id="ori_port" disabled="disabled">
                              <option value="">Pilih Port</option>
                              @foreach ($port as $value)
                                 <option value="{{$value->ID_PORT}}" @php echo ($all_sch->ORIGIN == $value->ID_PORT) ? 'selected="selected"' : '';@endphp>{{$value->PORT_NAME}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div><br><br>

                  <!--  Tabel Service | Muncul ketika schedule sudah di approve -->
                  <div class="container">
                    <div class="row">
                      <div class="col-6  justify-content-start">
                        <span class="h3"><i class=" fa fa-clipboard-list"></i> <b>Service</b></span>
                      </div>
                      @if ($jmlh_services == 0)
                        <div class="col-6 d-flex justify-content-end">
                          <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addService" id="show_add_serv">
                            <i class="material-icons">add</i> Add Service
                          </a>
                        </div>
                      @endif
                    </div>
                    <hr class="mb-5">
                  </div>


                  <div class="table-responsive">
                    <table class="table display table-hover cell-border compact stripe" id="v_services" >
                      <thead class=" text-grey text-center">
                        {{-- <th>#</th> --}}
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>UOM</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        @if ($jmlh_services == 0)
                          <th>Action</th>
                        @endif
                      </thead>
                      <tbody>
                        @if ($jmlh_services != 0)
                            @foreach($data_services as $value)
                                @php 
                                      $date_service = $value->START_DATE.'-'.$value->END_DATE; 
                                      $meter_service = $value->START_METER.'-'.$value->END_METER;
                                @endphp
                              <tr>
                                <td id='td_idService' style='display:none'>{{$value->ID_SERVICE}}</td>
                                <td id='td_service'>{{$value->SERVICE_NAME}}</td>
                                <td><a class='text-success' href='#'><i class='fas fa-calendar-alt text-calendar-alt pr-1'></i><span class='text-default' id='td_date'>{{$date_service}}</span><br><i class='fa fa-anchor text-success pr-1'></i><span class='text-default'>Berth Info : </span><span class='text-default' id='td_meter'>{{$meter_service}}</span><span class='text-default'> (m)</span><br><i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Rampdoor : </span><span class='text-default' id='td_rampdoor'>{{$value->RAMPDOOR}}</span><br><i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Via : </span><span class='text-default' id='td_via'>{{$value->VIA}}</span><br><i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Ton : </span><span class='text-default' id='td_ton'>{{$value->TON}}</span><br><i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Keterangan : </span><span class='text-default' id='td_ket'>{{$value->KETERANGAN}}</span></td>
                                <td>{{$value->QUANTITY}}</td>
                                <td>{{$value->ID_UOM}}</td>
                                <td>{{$value->UNIT_PRICE}}</td>
                                <td>{{$value->UNIT_PRICE * $value->QUANTITY}}</td>
                              </tr>
                            @endforeach
                        @endif
                        {{-- <tr> --}}
                          {{-- <td class="text-primary table-action">
                            <a href="" data-toggle="modal" data-target="#addService" alt="edit ?"><i class="fas fa-edit fa-1x pr-2 pl-3 text-warning"></i></a>
                            <a href="#" id="delete-row" data-toggle="modal" data-target="#deleteService" alt="delete ?"><i class="fas fa-trash pl-3 text-danger"></i></a>
                          </td> --}}
                        {{-- </tr> --}}
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
                @if ($jmlh_services == 0)
                  <div class="d-flex flex-row justify-content-between my-flex-container mb-5 mt-5">
                      <div class="p-2 my-flex-item"><button type="submit" class="btn btn-outline-danger"><i class="fa fa-window-close"></i> Cancel</button></div>
                      <div class="p-2 my-flex-item"><button type="submit" class="btn btn-success mr-3" id="add_service"> <i class="fa fa-save"></i> Save</button></div>
                  </div>
                @endif
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>

    </div>

  </div>
@endsection
@include('web_sl.modal.modalVesService')

@push('scriptJS')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#startDate').datetimepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd HH:MM:ss'
    });
    $('#endDate').datetimepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd HH:MM:ss'
    });
    
    $('#service').change(function(){
        var service_name = $('#service').find(':selected').data('serv_name');
        if (service_name == 'Tambat')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:block');
            $('#field_startMeter').attr('style','display:block');
            $('#field_endMeter').attr('style','display:block');
            $('#field_rampdoor').attr('style','display:block');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');
        }
        else if (service_name == 'Pandu')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');
        }
        else if (service_name == 'Tunda')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:block');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');
        }
        else if (service_name == 'Kepil')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');
        }
        else if (service_name == 'Air')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:block');
            $('#field_via').attr('style','display:block');
        }
        else if (service_name == 'Labuh')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');
        }
        else if (service_name == 'Sampah')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:block');
            $('#field_via').attr('style','display:none');
        }
        else
        {
            $('#field_startDate').attr('style','display:none');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');
        }
    })
    
    var data_service = [];
    var id_service,qty,uom,unit,serv_name,total,startDate,endDate,startMeter,endMeter,ket,via,ton;
    $("#add-row").click(function(e){
        e.preventDefault();
        id_service = $("#service").val();
        qty = $('#service').find(':selected').data('qty');
        uom = $('#service').find(':selected').data('uom');
        unit = $('#service').find(':selected').data('unit');
        serv_name = $('#service').find(':selected').data('serv_name');
        total = qty*unit;
        if (serv_name == 'Tambat')
        {
            startDate = $("#startDate").val();
            endDate = $("#endDate").val();
            startMeter = $("#startMeter").val();
            endMeter = $("#endMeter").val();
            rampdoor = $("#rampdoor").val();
            ket = '';
            via = '';
            ton = '';
        }
        else if(serv_name == 'Labuh')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = '';
        }
        else if(serv_name == 'Pandu')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = '';
        }
        else if(serv_name == 'Tunda')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = $('#keterangan').val();
            via = '';
            ton = '';
        }
        else if(serv_name == 'Kepil')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = '';
        }
        else if(serv_name == 'Sampah')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = $('#ton').val();
        }
        else if(serv_name == 'Air')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = $('#via').val();
            ton = $('#ton').val();
        }
        else
        {
            startDate = '';
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = '';
        }
        // startDate
        
        // var hoursStart = $("#hoursStart").val();
        // var minutesStart = $("#minutesStart").val();
        // alert(startDate);
        // endDate
        
        // var hoursEnd = $("#hoursEnd").val();
        // var minutesEnd = $("#minutesEnd").val();
        // meter
        
        // ket = $('#keterangan').val();
        // via = $('#via').val();
        // ton = $('#ton').val();
        
        var descriptionDate = "<a class='text-success' href='#'><i class='fas fa-calendar-alt text-calendar-alt pr-1'></i><span class='text-default' id='td_date'>" + startDate + " - " + endDate +  "</span>";

        // var descriptionHours = "<a class='text-success' href='#'><i class='fas fa-clock  pr-1'></i> <span class='text-default'>" + hoursStart + ":" + minutesStart + " - " + hoursEnd + " - " + minutesEnd + "</span>";
        var action = "<a href='#' data-toggle='modal' data-target='#addService' alt='edit ?' id='show_edit_modal'><i class='fas fa-edit fa-1x  pr-2 pl-3 text-warning'></i></a><a href='' data-toggle='modal' data-target='#deleteService' alt='delete ?' id='show_delete_modal'><i class='fas fa-trash pl-3 text-danger'></i></a>";
        var markup = "<tr><!--td><input type='checkbox' name='record'></td--><td id='td_idService' style='display:none'>" + id_service + "</td><td id='td_service'>" + serv_name + "</td><td>" + descriptionDate + "<br>" + "<i class='fa fa-anchor text-success pr-1'></i><span class='text-default'>Berth Info : </span><span class='text-default' id='td_meter'>" + startMeter + "-" + endMeter + "</span><span class='text-default'> (m)</span>" + "<br>" + "<i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Rampdoor : </span><span class='text-default' id='td_rampdoor'>" + rampdoor + "</span><br>"+"<i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Via : </span><span class='text-default' id='td_via'>" + via + "</span><br>"+"<i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Ton : </span><span class='text-default' id='td_ton'>" + ton + " </span><br>"+"<i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Keterangan : </span><span class='text-default' id='td_ket'>" + ket + " </span></td><td>"+qty+"</td><td>"+uom+"</td><td>"+unit+"</td><td>"+total+"</td><td class='text-primary table-action'>" + action + "</td></tr>";
        // alert(markup);
        $("table tbody").append(markup);
        data_service.push({service:id_service,start_date:startDate,end_date:endDate,start_meter:startMeter,end_meter:endMeter,rampdoor:rampdoor,qty:qty,uom:uom,unit:unit,keterangan:ket,via:via,ton:ton});
        console.log(data_service)
    });

    $('#show_add_serv').on('click',function(e){
        e.preventDefault();
        $('#add_req_modal').attr('style','display:block');
        $('#edit_req_modal').attr('style','display:none');

        $('#add_request_head').attr('style','display:block');
        $('#edit_request_head').attr('style','display:none');

        $('#service_form')[0].reset();
        $('#service').val('');

        $('#field_startDate').attr('style','display:none');
        $('#field_endDate').attr('style','display:none');
        $('#field_startMeter').attr('style','display:none');
        $('#field_endMeter').attr('style','display:none');
        $('#field_rampdoor').attr('style','display:none');
        $('#field_keterangan').attr('style','display:none');
        $('#field_ton').attr('style','display:none');
        $('#field_via').attr('style','display:none');
    })

    var get_tr,get_serv_id;
    $('#v_services tbody').on( 'click', '#show_edit_modal', function () {
        get_tr = $(this).parents("tr");
        get_serv_id = $(this).closest('tr').find('#td_idService').text();
        var get_serv_name = $(this).closest('tr').find('#td_service').text();
        var get_serv_date = $(this).closest('tr').find('#td_date').text();
        var data_date = get_serv_date.split('-');
        var start_date = data_date[0]+'-'+data_date[1]+'-'+data_date[2];
        var end_date = data_date[3].trim()+'-'+data_date[4]+'-'+data_date[5];
        // console.log(data_date)
        // console.log('start date = '+start_date+' end date = '+end_date)
        var get_serv_meter= $(this).closest('tr').find('#td_meter').text();
        var data_meter = get_serv_meter.split('-');
        var start_meter = data_meter[0];
        var end_meter = data_meter[1];
        // console.log(data_meter)
        var get_serv_ramp = $(this).closest('tr').find('#td_rampdoor').text();
        var get_serv_via = $(this).closest('tr').find('#td_via').text();
        var get_serv_ton = $(this).closest('tr').find('#td_ton').text();
        var get_serv_ket = $(this).closest('tr').find('#td_ket').text();
        
        // console.log(get_serv_id);
        if (get_serv_name == 'Tambat')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:block');
            $('#field_startMeter').attr('style','display:block');
            $('#field_endMeter').attr('style','display:block');
            $('#field_rampdoor').attr('style','display:block');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');

            $('#service').val(get_serv_id);
            $('#startDate').val(start_date);
            $('#endDate').val(end_date);
            $('#startMeter').val(start_meter);
            $('#endMeter').val(end_meter);
            $('#rampdoor').val(get_serv_ramp);
        }
        else if (get_serv_name == 'Pandu')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');

            $('#service').val(get_serv_id);
            $('#startDate').val(start_date);
        }
        else if (get_serv_name == 'Tunda')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:block');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');

            $('#service').val(get_serv_id);
            $('#startDate').val(start_date);
            $('#rketerangan').val(get_serv_ket);
        }
        else if (get_serv_name == 'Kepil')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');

            $('#service').val(get_serv_id);
            $('#startDate').val(start_date);
        }
        else if (get_serv_name == 'Air')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:block');
            $('#field_via').attr('style','display:block');

            $('#service').val(get_serv_id);
            $('#startDate').val(start_date);
            $('#via').val(get_serv_via);
            $('#ton').val(get_serv_ton);
        }
        else if (get_serv_name == 'Labuh')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');

            $('#service').val(get_serv_id);
            $('#startDate').val(start_date);
        }
        else if (get_serv_name == 'Sampah')
        {
            $('#field_startDate').attr('style','display:block');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:block');
            $('#field_via').attr('style','display:none');

            $('#service').val(get_serv_id);
            $('#startDate').val(start_date);
            $('#ton').val(get_serv_ton);
        }
        else
        {
            $('#field_startDate').attr('style','display:none');
            $('#field_endDate').attr('style','display:none');
            $('#field_startMeter').attr('style','display:none');
            $('#field_endMeter').attr('style','display:none');
            $('#field_rampdoor').attr('style','display:none');
            $('#field_keterangan').attr('style','display:none');
            $('#field_ton').attr('style','display:none');
            $('#field_via').attr('style','display:none');
        }

        $('#add_req_modal').attr('style','display:none');
        $('#edit_req_modal').attr('style','display:block');

         $('#add_request_head').attr('style','display:none');
        $('#edit_request_head').attr('style','display:block');
    });

    $("#edit-row").click(function(e){
        e.preventDefault();
        id_service = $("#service").val();
        // console.log(id_service)
        qty = $('#service').find(':selected').data('qty');
        uom = $('#service').find(':selected').data('uom');
        unit = $('#service').find(':selected').data('unit');
        serv_name = $('#service').find(':selected').data('serv_name');
        total = qty*unit;
        if (serv_name == 'Tambat')
        {
            startDate = $("#startDate").val();
            endDate = $("#endDate").val();
            startMeter = $("#startMeter").val();
            endMeter = $("#endMeter").val();
            rampdoor = $("#rampdoor").val();
            ket = '';
            via = '';
            ton = '';
        }
        else if(serv_name == 'Labuh')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = '';
        }
        else if(serv_name == 'Pandu')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = '';
        }
        else if(serv_name == 'Tunda')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = $('#keterangan').val();
            via = '';
            ton = '';
        }
        else if(serv_name == 'Kepil')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = '';
        }
        else if(serv_name == 'Sampah')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = $('#ton').val();
        }
        else if(serv_name == 'Air')
        {
            startDate = $("#startDate").val();
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = $('#via').val();
            ton = $('#ton').val();
        }
        else
        {
            startDate = '';
            endDate = '';
            startMeter = '';
            endMeter = '';
            rampdoor = '';
            ket = '';
            via = '';
            ton = '';
        }
        // startDate
        
        // var hoursStart = $("#hoursStart").val();
        // var minutesStart = $("#minutesStart").val();
        // alert(startDate);
        // endDate
        
        // var hoursEnd = $("#hoursEnd").val();
        // var minutesEnd = $("#minutesEnd").val();
        // meter
        
        // ket = $('#keterangan').val();
        // via = $('#via').val();
        // ton = $('#ton').val();
        
        var descriptionDate = "<a class='text-success' href='#'><i class='fas fa-calendar-alt text-calendar-alt pr-1'></i><span class='text-default' id='td_date'>" + startDate + " - " + endDate +  "</span>";

        // var descriptionHours = "<a class='text-success' href='#'><i class='fas fa-clock  pr-1'></i> <span class='text-default'>" + hoursStart + ":" + minutesStart + " - " + hoursEnd + " - " + minutesEnd + "</span>";
        var action = "<a href='#' data-toggle='modal' data-target='#addService' alt='edit ?' id='show_edit_modal'><i class='fas fa-edit fa-1x  pr-2 pl-3 text-warning'></i></a><a href='' data-toggle='modal' data-target='#deleteService' alt='delete ?' id='show_delete_modal'><i class='fas fa-trash pl-3 text-danger'></i></a>";
        var markup = "<tr><!--td><input type='checkbox' name='record'></td--><td id='td_idService' style='display:none'>" + id_service + "</td><td id='td_service'>" + serv_name + "</td><td>" + descriptionDate + "<br>" + "<i class='fa fa-anchor text-success pr-1'></i><span class='text-default'>Berth Info : </span><span class='text-default' id='td_meter'>" + startMeter + "-" + endMeter + "</span><span class='text-default'> (m)</span>" + "<br>" + "<i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Rampdoor : </span><span class='text-default' id='td_rampdoor'>" + rampdoor + "</span><br>"+"<i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Via : </span><span class='text-default' id='td_via'>" + via + "</span><br>"+"<i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Ton : </span><span class='text-default' id='td_ton'>" + ton + " </span><br>"+"<i class='fa fa-circle text-success pr-1'></i><span class='text-default'> Keterangan : </span><span class='text-default' id='td_ket'>" + ket + " </span></td><td>"+qty+"</td><td>"+uom+"</td><td>"+unit+"</td><td>"+total+"</td><td class='text-primary table-action'>" + action + "</td></tr>";
        $('#v_services tbody').trigger('click');
        get_tr.remove();
        $("table tbody").append(markup);
        console.log(data_service[0].service)
        console.log(get_serv_id)
        for (var i=0;i<data_service.length;i++)
        {
            if (data_service[i].service == get_serv_id)
            {
                data_service.splice([i],1);
            }
        }
        data_service.push({service:id_service,start_date:startDate,end_date:endDate,start_meter:startMeter,end_meter:endMeter,rampdoor:rampdoor,qty:qty,uom:uom,unit:unit,keterangan:ket,via:via,ton:ton});
        console.log(data_service)
    });

    $('#v_services tbody').on( 'click', '#show_delete_modal', function(e){
          e.preventDefault();
          get_tr = $(this).parents("tr");
    })

    // Find and remove selected table rows
    $("#delete-row").click(function(){
      $('#v_services tbody').trigger('click');
        get_tr.remove();
    });

    $('#add_service').on('click',function(e){
          e.preventDefault();
          var id_sch = $('#id_sch').val();
          var id_terminal = $('#id_terminal').val();
          var id_user = $('#id_user').val();
          var panjang_data = data_service.length;
          console.log(id_terminal)
          $.ajax({
              url: '{{url('add_service')}}',
              method: 'post',
              dataType: 'json',
              data : {id_sch:id_sch,data_service:data_service,panjang_data:panjang_data,id_terminal:id_terminal,id_user:id_user},
              success: function(data){
                if (data.status == 'Success')
                {
                    $('#successService').modal('show');
                    window.location.href='{{url("web_sl/back_ves_sch")}}/'+id_sch;
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

</script>
@endpush