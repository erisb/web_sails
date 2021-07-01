@extends('apps.mains.header')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h3 class=""><span class="tim-note">Vessel Schedule</span></h3>
            <form class="navbar-form">
              <div class="input-group no-border">

                <i class="pt-2 ml-5 material-icons"> search</i>
                <input id="search_schedule" type="text" value="" class="form-control" placeholder="Search...">

              </div>
            </form>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <a class="btn btn-primary" href="/addVesSchedule" role="button">
              <i class="material-icons">add</i> CREATE NEW
            </a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid pr-5 pl-5 mt-5">
          <!-- ./ wizard -->
          <!-- header -->
          <div class="row">
            <div class="col">
            List Vessel Schedule ( 10 Schedule )
            <div class="pull-right form-row">Filter by :
              <select id="inputState"  class="form-filter custom -select" name="" >
                <option value="">Recently Added</option>
                <option value="">New</option>
                <option value="">Waiting Approval</option>
                <option value="">Waiting Berth</option>
                <option value="">Reject</option>
                <option value="">Berthing</option>
                <option value="">Departure</option>
              </select>

            </div>

            </div>
          </div>
          <hr>
          <div id="smartwizard" class="card fluid-container">
            <ul class="pb-3">
                <li class="done"><a href="#step-1" >Step 1<br /><small>New Schedule</small></a></li>
                <li class="done"><a href="#step-2">Step 2<br /><small>Approval Schedule</small></a></li>
                <li class="done"><a href="#step-3">Step 3<br /><small>Request Service</small></a></li>
                <li class="done "><a href="#step-4">Step 4<br /><small>Approval Service</small></a></li>
                <li class="done"><a href="#step-5">Step 5<br /><small>Ves Realization</small></a></li>
                <li class=""><a href="#step-6">Step 6<br /><small>Ves REPORT </small></a></li>
                <li class=""><a href="#step-7">Step 7<br /><small>Ves PRANOTA</small></a></li>
                <li class=""><a href="#step-8">Step 8<br /><small>Ves NOTA</small></a></li>
            </ul>
          </div>
          <!-- ./ header -->
          <!-- table -->
          <div class="card">
            <div class="card-table">
              <!-- Wizard step -->

              <div class="table-responsive">
                <table class="table display table-hover cell-border compact stripe" id="v_schedule" >
                  <thead class=" text-grey text-center">
                    <th class="text-center">
                      No
                    </th>
                    <th>
                      Vessel Name
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Origin & Destination
                    </th>
                    <th>
                      Arrival
                    </th>
                    <th>
                      Berthing
                    </th>
                    <th>
                      Departure
                    </th>
                    <th>
                      ACTION
                    </th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                        Eclipse 123/321
                      </td>
                      <td >
                        <a class="text-success" href="#" role="button">
                          <i class="fas fa-circle text-left pr-1"></i> <span class="text-default"> 01 - New </span>
                        </a>
                      </td>
                      <td class="text-cen ter">
                        MERAK - BAKAUHENI
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td class="text-primary table-action">
                        <a href="/addVesSchedule"><i class="fas fa-edit fa-1x pl-2 pr-2 text-info"></i></a>
                        <a href="" data-toggle="modal" data-target="#delete_modal"><i class="fas fa-window-close fa-1x pr-2 text-danger"></i></a>
                        <a href="" data-toggle="modal" data-target="#send_request_modal" ><i class="fas fa-share-square  text-success"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        2
                      </td>
                      <td>
                        Eclipse 123/321
                      </td>
                      <td>
                        <a class="text-warning" href="#" role="button">
                          <i class="fas fa-circle text-left pr-1"></i> <span class="text-default"> 02 - Waiting Approval </span>
                        </a>
                      </td>
                      <td>
                        MERAK - BAKAUHENI
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td class="text-primary table-action">
                        <i class="fas fa-edit fa-1x pl-2 pr-2"></i>
                        <i class="fas fa-window-close fa-1x pr-2 text-danger"></i>
                        <i class="fas fa-share-square  text-success"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        4
                      </td>
                      <td>
                        Eclipse 123/321
                      </td>
                      <td>
                        <a class="text-warning" href="#" role="button">
                          <i class="fas fa-circle text-left pr-1"></i> <span class="text-default"> 03 - Waiting Service </span>
                        </a>
                      </td>
                      <td>
                        MERAK - BAKAUHENI
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td class="text-primary table-action">
                        <i class="fas fa-edit fa-1x pl-2 pr-2"></i>
                        <i class="fas fa-window-close fa-1x pr-2 text-danger"></i>
                        <i class="fas fa-share-square  text-success"></i>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        3
                      </td>
                      <td>
                        Eclipse 123/321
                      </td>
                      <td>
                        <a class="text-warning" href="#" role="button">
                          <i class="fas fa-circle text-left pr-1"></i><span class="text-default"> 03 - Waiting Service </span>
                        </a>
                      </td>
                      <td>
                        MERAK - BAKAUHENI
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td>
                        20/11/19 10:30
                      </td>
                      <td class="text-primary table-action">
                        <i class="fas fa-edit fa-1x pl-2 pr-2"></i>
                        <i class="fas fa-window-close fa-1x pr-2 text-danger"></i>
                        <i class="fas fa-share-square  text-success"></i>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ./table -->

          <!-- Modal Send Request -->
          <div class="modal fade" id="send_request_modal" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="send_request_modal">Send Request</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="container text-center">
                    <h3>Do you want to send request ?</h3>
                    <p>you still can send request on vessel schedule list!</p>
                  </div>
                </div>
                <div>
                  <div class="d-flex flex-row justify-content-between my-flex-container">
                      <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
                      <div class="p-2 my-flex-item"><button type="submit" class="btn btn-success mr-3"> <i class="fa fa-save"></i> Save</button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ./ Modal -->
          <!-- Modal Delete -->
          <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="send_request_modal" aria-hidden="true">
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
                    <h4>Are you sure to delete this schedule ?</h4>
                    <p>Delete permanently!</p>
                  </div>
                </div>
                <div class="">
                  <div class="d-flex flex-row justify-content-between my-flex-container">
                      <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
                      <div class="p-2 my-flex-item"><button type="submit" class="btn btn-success mr-3"> <i class="fa fa-save"></i> Save</button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ./ Modal -->

        </div>
      </div>

    </div>

  </div>
  <script type="text/javascript">
    $(document).ready(function() {
        // Datatable_vessel
        vesSchedule_Table = $('#v_schedule').DataTable({
             "searching": true,
             "paging": true,
             "info": true,
             "lengthChange":false
        });

        $('#search_schedule').on('keyup change', function(){
          vesSchedule_Table.search($(this).val()).draw();
        })
      });
  </script>
  <!-- end div header -->
@endsection
