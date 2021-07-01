@section('modal_ves_service')
<!---Modal Add Services--->
<div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_request_head">Add Service</h5>
        <h5 class="modal-title" id="edit_request_head" style="display: none;">Edit Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa fa-window-close"></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form id="service_form">
            <!--  1 Start Date -->
            <div class="row">
              <div class="col-12">
                <div class="form-group date" data-provide="datepicker" id="field_service">
                  <label for="exampleInputEmail1">Service Name</label>
                  <div class="input-group">
                    <select id="service" class="form-control" name="service">
                      <option value="">Pilih Services</option>
                     {{--  <option value="Tambat">Tambat</option>
                      <option value="Tunda">Tunda</option>
                      <option value="Pandu">Pandu</option>
                      <option value="Air">Air</option> --}}
                      @foreach($services as $value)
                        <option value="{{$value->ID_SERVICE}}" data-qty="{{$value->QUANTITY}}" data-uom="{{$value->UOM}}" data-unit="{{$value->UNIT_PRICE}}" data-serv_name="{{$value->SERVICE_NAME}}">{{$value->SERVICE_NAME}}</option>
                      @endforeach
                    </select>
                    {{-- <input type="hidden" id="serv_name" name="serv_name" type="text" class="form-control"> --}}
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker" id="field_startDate" style="display: none;">
                  <label for="exampleInputEmail1">Start Date</label>
                  <div class="input-group">
                    <input type="text" id="startDate" name="startDate" type="text" class="form-control" placeholder="Enter Date">
                  </div>
                </div>
              </div>
              {{-- <div class="col-6">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Hours </label>
                      <input type="number" class="form-control" id="hoursStart" aria-describedby="emailHelp" value="{{ date('H') }}">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Minutes </label>
                      <input type="text" class="form-control" id="minutesStart" aria-describedby="emailHelp" value="{{ date('i:s') }}">
                    </div>
                  </div>
                </div>
              </div> --}}
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker" id="field_endDate" style="display: none;">
                  <label for="exampleInputEmail1">End Date</label>
                  <div class="input-group">
                    <input type="text" name="endDate" id="endDate" class="form-control" placeholder="Enter Date">
                  </div>
                </div>
              </div>
            </div>
            <!-- ./end row -->
            <!--  2 End Date-->
           {{--  <div class="row">
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">End Date</label>
                  <div class="input-group">
                    <input id="endDate" class="form-control" data-date-format="mm/dd/yyyy" placeholder="Enter ETB mm/dd/yyyy">
                  </div>
                </div>
              </div> --}}
              {{-- <div class="col-6">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Hours </label>
                      <input id="hoursEnd" type="number" class="form-control" aria-describedby="emailHelp" value="{{ date('H') }}">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Minutes </label>
                      <input id="minutesEnd" type="text" class="form-control" aria-describedby="emailHelp" value="{{ date('i:s') }}">
                    </div>
                  </div>
                </div>
              </div> --}}
            {{-- </div> --}}
            <!-- ./end row -->
            <!--  3 Start Meter-->
            <div class="row">
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker" id="field_startMeter" style="display: none;">
                  <label for="exampleInputEmail1">Start Meter (m)</label>
                  <div class="input-group">
                    <input name="startMeter" id="startMeter" type="number" class="form-control" placeholder="Enter Start Meter">
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker" id="field_endMeter" style="display: none;">
                  <label for="exampleInputEmail1">End Meter (m)</label>
                  <div class="input-group">
                    <input name="endMeter" id="endMeter" type="number" class="form-control" placeholder="Enter Start Meter">
                  </div>
                </div>
              </div>
            </div>
            <!-- ./end row -->
            <!--  4 Rampdoor-->
            <div class="row">
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker" id="field_rampdoor" style="display: none;">
                  <label for="exampleInputEmail1">Rampdoor</label>
                  <div class="input-group">
                    <select id="rampdoor" name="rampdoor" class="form-control">
                      <option value="">Pilih Rampdoor</option>
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </div>
                </div>
                <div class="form-group date" data-provide="datepicker" id="field_via" style="display: none;">
                  <label for="exampleInputEmail1">Via</label>
                  <div class="input-group">
                    <select id="via" name="via" class="form-control">
                      <option value="">Pilih Via</option>
                      <option value="PDAM">PDAM</option>
                      <option value="TERMINAL">TERMINAL</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group date" data-provide="datepicker" id="field_keterangan" style="display: none;">
                  <label for="exampleInputEmail1">Keterangan</label>
                  <div class="input-group">
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              {{-- <div class="col-6">
                <div class="form-group date" data-provide="datepicker" id="field_via" style="display: none;">
                  <label for="exampleInputEmail1">Via</label>
                  <div class="input-group">
                    <select id="rampdoor" name="rampdoor" class="form-control">
                      <option value="">Pilih Via</option>
                      <option value="PDAM">PDAM</option>
                      <option value="TERMINAL">TERMINAL</option>
                    </select>
                  </div>
                </div>
              </div> --}}
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker" id="field_ton" style="display: none;">
                  <label for="exampleInputEmail1">Ton</label>
                  <div class="input-group">
                    <input name="ton" id="ton" type="number" class="form-control" placeholder="Enter Ton">
                  </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- <div class="row">
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker" id="field_via" style="display: none;">
                  <label for="exampleInputEmail1">Via</label>
                  <div class="input-group">
                    <select id="rampdoor" name="rampdoor" class="form-control">
                      <option value="">Pilih Via</option>
                      <option value="PDAM">PDAM</option>
                      <option value="TERMINAL">TERMINAL</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker" id="field_ton" style="display: none;">
                  <label for="exampleInputEmail1">Ton</label>
                  <div class="input-group">
                    <input name="ton" id="ton" type="number" class="form-control" placeholder="Enter Ton">
                  </div>
                  </div>
                </div>
              </div>
            </div> --}}

            {{-- <div class="row">
              <div class="col-12">
                <div class="form-group date" data-provide="datepicker" id="field_keterangan" style="display: none;">
                  <label for="exampleInputEmail1">Keterangan</label>
                  <div class="input-group">
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div> --}}
            <!-- ./end row -->
          {{-- <div> --}}
              <div class="d-flex flex-row justify-content-between my-flex-container">
                  <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
                  <div class="p-2 my-flex-item" id="add_req_modal"><button type="button" id="add-row" class="btn btn-success mr-3"> <i class="fa fa-plus"></i> Add</button></div>
                  <div class="p-2 my-flex-item" id="edit_req_modal" style="display: none;"><button type="button" id="edit-row" class="btn btn-success mr-3"> <i class="fa fa-plus"></i> Edit</button></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete Services -->
<div class="modal fade" id="deleteService" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete_modal">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="fa fa-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="container text-center">
          <h4><i class="fas fa-trash-alt fa-3x text-danger"></i></h4>
          <h4>Are you sure to delete this service ?</h4>
          <p>Delete permanently!</p>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
            <div class="p-2 my-flex-item"><a href="#" id="delete-row" data-dismiss="modal" class="btn btn-danger mr-3"> <i class="fa fa-trash"></i> Delete</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successService" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="success_modal">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="fa fa-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="container text-center">
          <h4><i class="fas fa-check-square fa-3x text-default"></i></h4>
          <h4>Data Berhasil Di Simpan</h4>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="margin: 0 5px 0 150px;"><i class="fa fa-window-close"></i> Close</button></div>
            {{-- <div class="p-2 my-flex-item"><a href="#" id="delete-row" data-dismiss="modal" class="btn btn-danger mr-3"> <i class="fa fa-trash"></i> Delete</a></div> --}}
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successUser" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="success_modal">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="fa fa-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="container text-center">
          <h4><i class="fas fa-check-square fa-3x text-default"></i></h4>
          <h4>Data Berhasil Di Simpan</h4>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="margin: 0 5px 0 150px;"><i class="fa fa-window-close"></i> Close</button></div>
            {{-- <div class="p-2 my-flex-item"><a href="#" id="delete-row" data-dismiss="modal" class="btn btn-danger mr-3"> <i class="fa fa-trash"></i> Delete</a></div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./ Modal -->
@endsection
