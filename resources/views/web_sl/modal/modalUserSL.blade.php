@section('modal_user_sl')
<!---Modal User SL--->
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
