<!-- Modal User -->
@section('modal_user')
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="send_request_modal">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa fa-window-close"></span>
        </button>
      </div>
      <br>
      <div class="modal-body">
        <div class="container">
        <form id="user_form">
            <!--  1 Start Date -->
            <div class="row">
              <div class="col-12">
                <div class="form-group date">
                  <label for="exampleInputEmail1">Full Name</label>
                  <div class="input-group">
                   <input id="fullname" name="fullname" type="text" class="form-control" placeholder="fullname">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group date">
                  <label for="exampleInputEmail1">User Name</label>
                  <div class="input-group">
                   <input id="username" name="username" type="email" class="form-control" placeholder="username">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group date">
                  <label for="exampleInputEmail1">Password</label>
                  <div class="input-group">
                   <input id="password" name="password" type="password" class="form-control" placeholder="password">
                  </div>
                </div>
              </div>
              {{-- <div class="col-12">
                <div class="form-group date" data-provide="datepicker">
                  <label for="exampleInputEmail1">Role</label>
                  <div class="input-group">
                   <input id="fullname" name="fullname" type="text" class="form-control">
                  </div>
                </div>
              </div> --}}
              
            </div>
            <div>
              <div class="d-flex flex-row justify-content-between my-flex-container">
                  <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
                  <div class="p-2 my-flex-item" id="show_add"><button type="button" id="add_user" class="btn btn-success mr-3"> <i class="fa fa-plus"></i> Add</button></div>
                  <div class="p-2 my-flex-item" id="show_edit" style="display: none;"><button type="button" id="edit_user" class="btn btn-success mr-3"> <i class="fa fa-plus"></i> Edit</button></div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
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
          <h4>Are you sure to delete this user ?</h4>
          <p>Delete permanently!</p>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
            <div class="p-2 my-flex-item"><a href="#" id="delete_user" data-dismiss="modal" class="btn btn-danger mr-3"> <i class="fa fa-trash"></i> Delete</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./ Modal -->
@endsection
<!-- ./ Modal -->
