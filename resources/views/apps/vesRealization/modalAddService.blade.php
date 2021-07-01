<!-- Modal Add Service -->
<div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="send_request_modal">Add Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa fa-window-close"></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form>
            <!--  1 Start Date -->
            <div class="row">
              <div class="col-12">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">Service Name</label>
                  <div class="input-group">
                    <select id="serviceName" class="form-control" name="serviceName">
                      <option value="Tambat">Tambat</option>
                      <option value="Tunda">Tunda</option>
                      <option value="Pandu">Pandu</option>
                      <option value="Air">Air</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">Start Date</label>
                  <div class="input-group">
                    <input id="startDate" name="startDate" type="text" class="form-control" data-date-format="mm/dd/yyyy" placeholder="Enter ETB mm/dd/yyyy">
                  </div>
                </div>
              </div>
              <div class="col-6">
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
              </div>
            </div>
            <!-- ./end row -->
            <!--  2 End Date-->
            <div class="row">
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">End Date</label>
                  <div class="input-group">
                    <input id="endDate" class="form-control" data-date-format="mm/dd/yyyy" placeholder="Enter ETB mm/dd/yyyy">
                  </div>
                </div>
              </div>
              <div class="col-6">
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
              </div>
            </div>
            <!-- ./end row -->
            <!--  3 Start Meter-->
            <div class="row">
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">Start Meter (m)</label>
                  <div class="input-group">
                    <input id="startMeter" type="number" class="form-control" placeholder="Enter Start Meter">
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">End Meter (m)</label>
                  <div class="input-group">
                    <input id="endMeter" type="number" class="form-control"  placeholder="Enter Start Meter">
                  </div>
                </div>
              </div>
            </div>
            <!-- ./end row -->
            <!--  4 Rampdoor-->
            <div class="row">
              <div class="col-6">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">Rampdoor</label>
                  <div class="input-group">
                    <select id="rampdoor" type="number" class="form-control">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./end row -->
            <div>
              <div class="d-flex flex-row justify-content-between my-flex-container">
                  <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
                  <div class="p-2 my-flex-item"><button type="button" id="add-row" class="btn btn-success mr-3"> <i class="fa fa-plus"></i> Add</button></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ./ Modal -->
