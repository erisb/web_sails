<!-- Modal Add Service -->
<div class="modal fade" id="generatePranota" tabindex="-1" role="dialog" aria-labelledby="generatePranota" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="send_request_modal">Generate Pranota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa fa-window-close"></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form>
            <!--  1 Start Date -->
            <div class="row">
              <div class="col-12 mb-2">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">Vessel Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="vesselName" value="Vessel Name" disabled>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">No Report</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="vesselName" value="RE-01" disabled>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">Report Date</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="vesselName" value="RE-01" disabled>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">Start Date</label>
                  <div class="input-group">
                    <select class="form-control" name="">
                      <option value="ga">General</option>
                      <option value="diskon20">Off 20%</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!-- ./end row -->

            <div class="mt-3">
              <div class="d-flex flex-row justify-content-between my-flex-container">
                  <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
                  <div class="p-2 my-flex-item"><a href="#" data-toggle="modal" data-target="#previewPranota" data-dismiss="modal"  class="btn btn-success mr-3"> <i class="fa fa-sync"></i> Generate</a></div>
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
