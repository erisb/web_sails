<!-- Modal Patch -->  
@section('modal_patch')
<div class="modal fade" id="patchModal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_title">Add Patch</h5>
        <h5 class="modal-title" id="edit_title" style="display: none;">Edit Patch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa fa-window-close"></span>
        </button>
      </div>
      <br>
      <div class="modal-body">
        <div class="container">
        <form id="patch_form" enctype="multipart/form-data">
            <!--  1 Start Date -->
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Patch Version</label>
                  <div class="input-group">
                   <input id="version" name="version" type="text" class="form-control" placeholder="Patch Version...">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Date Release</label>
                  <div class="input-group">
                   <input type="text" name="date_release" id="date_release" class="form-control" data-date-format="mm/dd/yyyy">
                  </div>
                </div>
              </div>
              <div class="col-12">
                  <label for="exampleInputEmail1">Upload Patch</label>
                  <div class="input-group">
                    <input type="file" name="file_patch" class="custom-file" id="file_patch"/>
                  </div>
              </div>
              <div class="col-12">
                  <label for="exampleInputEmail1">Upload Release Notes</label>
                  <div class="input-group">
                    <input type="file" name="file_notes" class="custom-file" id="file_notes"/>
                  </div>
              </div>
            </div>
            <div>
              <div class="d-flex flex-row justify-content-between my-flex-container">
                  <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
                  <div class="p-2 my-flex-item" id="show_add"><button type="button" id="add_patch" class="btn btn-success mr-3"> <i class="fa fa-plus"></i> Add</button></div>
                  <div class="p-2 my-flex-item" id="show_edit" style="display: none;"><button type="button" id="edit_patch" class="btn btn-success mr-3"> <i class="fa fa-plus"></i> Edit</button></div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="deletePatchModal" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
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
          <h4>Are you sure to delete this Patch ?</h4>
          <p>Delete permanently!</p>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
            <div class="p-2 my-flex-item"><a href="#" id="delete_patch" data-dismiss="modal" class="btn btn-danger mr-3"> <i class="fa fa-trash"></i> Delete</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<!-- ./ Modal -->
