<!-- Modal BUP -->
@section('modal_BUP')
<div class="modal fade" id="bupModal" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="send_request_modal">Edit BUP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa fa-window-close"></span>
        </button>
      </div>
      <br>
      <div class="modal-body">
        <div class="container">
        <form id="bup_form">
            <div class="form-group">
              <label for="exampleInputEmail1">Company Name</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Address</label>
              <textarea rows="5" class="form-control" name="address" id="address"></textarea>
            </div>

                  {{-- </div>
                  <div class="col-6"> --}}

            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Phone</label>
              <input type="text" class="form-control" name="phone" id="phone">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">NPWP</label>
              <input type="text" class="form-control" name="npwp" id="npwp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">SIUP</label>
              <input type="text" class="form-control" name="siup" id="siup">
            </div>
            {{-- <div class="form-group">
              <label for="exampleInputPassword1">Plan</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter plan">
            </div> --}}
            <div class="form-group">
                <label for="exampleInputPassword1">Plan</label><br>
                <input type="radio" name="plan" id="planCloud" value="1" >&nbsp;&nbsp;Cloud Services&nbsp;&nbsp;
                <input type="radio" name="plan" id="planPremise" value="2">&nbsp;&nbsp;On Premise    
            </div>
                    {{-- <div class="form-group">
                      <label for="exampleInputPassword1">Status</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Status">
                    </div> --}}
                  {{-- </div> --}}<br>
                  <!-- Estimation Schedule -->
            {{-- <div class="col-12"> --}}
              <p class="h3"><i class=" fa fa-clock"></i> Authentication</p>
              <hr class="mb-5">
              <!-- 1 -->
              {{-- <div class="col-6"> --}}

                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="email" width="500px" class="form-control" name="username" id="username">
                </div>
                  <label for="inlineFormInputGroup">New Password</label>
                  <div class="inner-addon right-addon">
                    {{-- <a href="#"><i id="eyeSatu" class="fa fa-eye-slash" onclick="showPasswordSatu()"></i></a> --}}
                    <input type="password" class="form-control" name="password" id="password">
                  </div>
                  {{-- <label for="inlineFormInputGroup">Re-type Password</label>
                  <div class="inner-addon right-addon">
                    <a href="#"><i id="eyeDua" class="fa fa-eye-slash" onclick="showPasswordDua()"></i></a>
                    <input type="password" class="form-control" name="repassword" id="repassword">
                  </div> --}}
              {{-- </div> --}}
            {{-- <div> --}}
              <div class="d-flex flex-row justify-content-between my-flex-container">
                  <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
                  <div class="p-2 my-flex-item" id="show_edit"><button type="button" id="edit_bup" class="btn btn-success mr-3"> <i class="fa fa-plus"></i> Edit</button></div>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Approve -->
<div class="modal fade" id="approveAccount" tabindex="-1" role="dialog" aria-labelledby="approveAccount" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete_modal">Approve</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="fa fa-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="container text-center">
          <h4><i class="fas fa-check-square fa-3x text-default"></i></h4>
          <h4>The verification message will be send to customer email. Are you sure to Approve Registration of <!--br--></h4>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
            <div class="p-2 my-flex-item"><a href="#" id="approve_account" data-dismiss="modal" class="btn btn-success mr-3"> <i class="fa fa-check"></i> Approve</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./ Modal -->

<!-- Modal Reject -->
<div class="modal fade" id="rejectAccount" tabindex="-1" role="dialog" aria-labelledby="rejectAccount" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete_modal">Reject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="fa fa-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="container text-center">
          <h4><i class="fas fa-window-close fa-3x text-default"></i></h4>
          <h4>Are you sure to Reject Registration of <!--br--></h4>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
            <div class="p-2 my-flex-item"><a href="#" id="reject_account" data-dismiss="modal" class="btn btn-danger mr-3"> <i class="fa fa-minus-square"></i> Reject</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./ Modal -->

<!-- Modal Approve -->
<div class="modal fade" id="approvePayment" tabindex="-1" role="dialog" aria-labelledby="approvePayment" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete_modal">Approve</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="fa fa-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="container text-center">
          <h4><i class="fas fa-check-square fa-3x text-default"></i></h4>
          <h4>Are you sure to Approve this Payment ? </h4>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
            <div class="p-2 my-flex-item"><a href="#" id="app_pay" data-dismiss="modal" class="btn btn-success mr-3"> <i class="fa fa-check"></i> Approve</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./ Modal -->

<!-- Modal Reject -->
<div class="modal fade" id="rejectPayment" tabindex="-1" role="dialog" aria-labelledby="rejectPayment" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete_modal">Reject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="fa fa-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="container text-center">
          <h4><i class="fas fa-window-close fa-3x text-default"></i></h4>
          <h4>Are you sure to Reject this Payment ? </h4>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
            <div class="p-2 my-flex-item"><a href="#" id="rej_pay" data-dismiss="modal" class="btn btn-danger mr-3"> <i class="fa fa-minus-square"></i> Reject</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./ Modal -->

<!-- Modal Delete Terminal-->
<div class="modal fade" id="deleteTerminal" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
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
          <h4>Are you sure to delete this terminal ?</h4>
          <p>Delete permanently!</p>
        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
            <div class="p-2 my-flex-item"><a href="#" id="delete_terminal" data-dismiss="modal" class="btn btn-danger mr-3"> <i class="fa fa-trash"></i> Delete</a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewPayment" tabindex="-1" role="dialog" aria-labelledby="add_modal" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete_modal">Billing <label for="exampleInputEmail1" id="bup_name"></label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="fa fa-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-6">
              {{-- <div class="card"> --}}
                <div class="card-table">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <p><b class="font-weight-bold"> Status : </b><label for="exampleInputEmail1" id="status"></label>
                    </li>
                    <li class="list-group-item">
                      <p><b class="font-weight-bold">Current Plan : </b><label for="exampleInputPassword1" id="current"></label>
                    </li>
                    <li class="list-group-item">
                      <p><b class="font-weight-bold">Expiration Date : </b><label for="exampleInputPassword1" id="expired"></label>
                    </li>
                  </ul>
                </div>
              {{-- </div> --}}
            </div>
            <div class="col-6">
              {{-- <div class="card"> --}}
                <div class="card-table">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <p><b class="font-weight-bold">Invoice Cycle : </b><label for="exampleInputPassword1" id="invoice"></label>
                    </li>
                    <li class="list-group-item">
                      <p><b class="font-weight-bold">Terminal / Site : </b><label for="exampleInputPassword1" id="total_site"></label>
                    </li>
                    <li class="list-group-item" id="list_terminal">
                    </li>
                    <li class="list-group-item">
                      <p><b class="font-weight-bold">Total Amount : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><label for="exampleInputPassword1" id="total_cost"></label>
                    </li>
                  </ul>
                </div>
              {{-- </div> --}}
            </div>
          </div>
        </div>
      </div>
</div>
<!-- ./ Modal -->
@endsection
<!-- ./ Modal -->
