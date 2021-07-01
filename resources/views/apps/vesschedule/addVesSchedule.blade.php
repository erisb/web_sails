@extends('apps.mains.header')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h3 class=""><span class="tim-note">Create Vessel Schedule</span></h3>
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
        <div class="container-fluid pr-5 pl-5">
          <!-- table -->
          <div class="card">
            <div class="card-table">
              <!-- WForm -->
              <div class="container ml-2 mr-2 pt-3 ">
                <p class="h3"><i class=" fa fa-ship"></i> Vessel Info</p>
                <hr class="mb-5 mr-5">
                <div class="row mr-3">
                  <!--  Vessel info -->
                  <div class="col-6">

                    <form>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Vessel Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter vessel name" autofocus>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Call Sign</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter call sign">
                      </div>
                      <div class="form-group mb-5 pt-4-5">
                        <label for="exampleInputPassword1">Flag </label>
                        <input type="text" class="form-control" id="country" />
                        <input type="hidden" id="country_code" />

                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Vessel Code</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter">
                      </div>

                    </form>

                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Voy In </label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Voy Out </label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Shipping Agent</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Voyage Type </label>
                      <select class="form-control" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">Ocean Going</option>
                        <option value="2">Intersullar</option>
                      </select>
                    </div>
                  </div>
                  <!-- Estimation Schedule -->
                  <div class="col-12">
                    <p class="h3"><i class=" fa fa-clock"></i> Estimation Schedule</p>
                    <hr class="mb-5">
                    <!-- 1 -->
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group date" data-provide="datepicker">
                          <label for="exampleInputEmail1">ETA</label>
                          <div class="input-group">
                            <input id="datepickereta" class="form-control" data-date-format="mm/dd/yyyy" value="{{ date('m-d-Y') }}">
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Hours </label>
                              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('H') }}">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Minutes </label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('i:s') }}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- 2 -->
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group date" data-provide="datepicker">
                          <label for="exampleInputEmail1">ETB</label>
                          <div class="input-group">
                            <input id="datepickeretb" class="form-control" data-date-format="mm/dd/yyyy" placeholder="Enter ETB mm/dd/yyyy">
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Hours </label>
                              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('H') }}">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Minutes </label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('i:s') }}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- 3 -->
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group date" data-provide="datepicker">
                          <label for="exampleInputEmail1">ETD</label>
                          <div class="input-group">
                            <input id="datepickeretd" class="form-control" data-date-format="mm/dd/yyyy" placeholder="Enter ETD mm/dd/yyyy">
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Hours </label>
                              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('H') }}">
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Minutes </label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('i:s') }}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Estimation Schedule -->
                  <div class="col-12">
                    <p class="h3"><i class=" fa fa-clock"></i> Actual Schedule</p>
                    <small class="text-danger">Muncul saat view schedule dan hanya bisa disisi dihalaman realisasi</small>
                    <hr class="mb-5">
                    <!-- 1 -->
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group date" data-provide="datepicker">
                          <label for="exampleInputEmail1">ATA</label>
                          <div class="input-group">
                            <input id="datepickereta" class="form-control" data-date-format="mm/dd/yyyy" value="{{ date('m-d-Y') }}" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Hours </label>
                              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('H') }}" disabled>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Minutes </label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('i:s') }}" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- 2 -->
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group date" data-provide="datepicker">
                          <label for="exampleInputEmail1">ATB</label>
                          <div class="input-group">
                            <input id="datepickeretb" class="form-control" data-date-format="mm/dd/yyyy" placeholder="Enter ETB mm/dd/yyyy" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Hours </label>
                              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('H') }}" disabled>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Minutes </label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('i:s') }}" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- 3 -->
                    <div class="row">
                      <div class="col-6">
                        <div class="form-group date" data-provide="datepicker">
                          <label for="exampleInputEmail1">ATD</label>
                          <div class="input-group">
                            <input id="datepickeretd" class="form-control" data-date-format="mm/dd/yyyy" placeholder="Enter ETD mm/dd/yyyy" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Hours </label>
                              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('H') }}" disabled>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Minutes </label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ date('i:s') }}" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  Port info -->
                  <!--  Vessel info -->
                  <div class="col-12">
                    <p class="h3"><i class=" fa fa-anchor"></i> Port Info</p>
                    <hr class="mb-5">
                    <div class="row">
                      <div class="col-6">

                        <form>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Origin Port</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter origin port">
                          </div>

                        </form>

                      </div>
                      <div class="col-6">

                        <div class="form-group">
                          <label for="exampleInputPassword1">Next Port</label>
                          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter next port">
                        </div>
                      </div>
                    </div>
                    <!-- ./end row -->
                  </div>

                  <!--  Tabel Service | Muncul ketika schedule sudah di approve -->
                  <div class="container">
                    <div class="row">
                      <div class="col-6  justify-content-start">
                        <span class="h3"><i class=" fa fa-clipboard-list"></i> Service</span>
                        <small class="text-danger">Tabel Service | Muncul ketika schedule sudah di approve</small>
                      </div>
                      <div class="col-6 d-flex justify-content-end">
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addService" >
                          <i class="material-icons">add</i> Add Service
                        </a>
                      </div>
                    </div>
                    <hr class="mb-5">
                  </div>


                  <div class="table-responsive">
                    <table class="table display table-hover cell-border compact stripe" id="v_schedule" >
                      <thead class=" text-grey text-center">
                        <th>
                          Select
                        </th>
                        <th>
                          Service Name
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                          Quantity
                        </th>
                        <th>
                          UOM
                        </th>
                        <th>
                          Unit Price
                        </th>
                        <th>
                          Total Price
                        </th>
                        <th>
                          ACTION
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <input type="checkbox" id="record" name="record">
                          </td>
                          <td>
                            Tambat
                          </td>
                          <td >
                            <a class="text-success" href="#" role="button">
                              <i class="fas fa-calendar-alt text-calendar-alt pr-1"></i> <span class="text-default"> 15/10/2018 - 17/10/2018 </span>
                              <br>
                              <i class="fas fa-clock text-clock pr-1"></i> <span class="text-default"> 1 minutes - 151 minutes </span>
                              <br>
                              <i class="fas fa-circle text-circle pr-1"></i> <span class="text-default"> Rampdoor </span>
                            </a>
                          </td>
                          <td class="text-cen ter">
                            11
                          </td>
                          <td>
                            Hours
                          </td>
                          <td>
                            100.000
                          </td>
                          <td>
                            1.100.000
                          </td>
                          <td class="text-primary table-action">
                            <a href="" data-toggle="modal" data-target="#addService" alt="edit ?"><i class="fas fa-edit fa-1x pr-2 pl-3 text-warning"></i></a>
                            <a href="#" id="delete-row" data-toggle="modal" data-target="#deleteService" alt="delete ?"><i class="fas fa-trash pl-3 text-danger"></i></a>
                          </td>
                        </tr>


                      </tbody>
                    </table>
                  </div>

                  <!--  Berth info -->
                  <div class="col-12">
                    <p class="h3"><i class=" fa fa-hand-lizard"></i> Berth Info</p>
                    <small class="text-danger">Tabel Service | Muncul ketika service mau di approve</small>
                    <hr class="mb-5">
                    <div class="row">
                      <div class="col-6">

                        <form>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Berth</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter origin port">
                          </div>



                      </div>
                      <div class="col-6">

                        <div class="form-group ">
                          <label for="exampleInputPassword1">Start Position (m)</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="0">
                        </div>
                      </div>
                      <div class="col-6">

                        <form>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Along Side</label>
                            <select class="form-control" name="">
                              <option value="0">Choose...</option>
                              <option value="PS">Port Side</option>
                              <option value="SB">Starboard</option>
                            </select>
                          </div>



                      </div>
                      <div class="col-6 pt-4-5">

                        <div class="form-group">
                          <label for="exampleInputPassword1">End Position (m)</label>
                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="0">
                        </div>
                      </div>
                      </form>
                    </div>
                    <!-- ./end row -->
                  </div>

                  <div class="col-12">
                    <p class="h3"><i class=" fa fa-comment-alt"></i> Remarks</p>
                    <small class="text-danger">Tabel Service | Muncul ketika service mau di approve</small>
                    <hr class="mb-5">
                    <div class="row">
                      <div class="col-12">

                        <form>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Remarks</label>
                            <textarea class="form-control" name="remarks" rows="8" cols="80" placeholder="tujuan : Remark adalah catatan untuk shipping line atau petugas pembuat schedule"></textarea>
                          </div>



                      </div>
                    <!-- ./end row -->
                  </div>


                </div>
              </div>
                <div class="d-flex flex-row justify-content-between my-flex-container mb-5 mt-5">
                    <div class="p-2 my-flex-item"><button type="submit" class="btn btn-outline-danger"><i class="fa fa-window-close"></i> Cancel</button></div>
                    <div class="p-2 my-flex-item"><button type="submit" class="btn btn-success mr-3"> <i class="fa fa-save"></i> Save</button></div>
                </div>
                <!-- nanti dihapus ya Om -->
                <small class="text-danger">Tombol ini hanya Muncul untuk user approval dan tombol cancel dan save hilang</small>
                <!-- catatan -->
                <div class="d-flex flex-row justify-content-between my-flex-container mb-5 mt-5">
                    <div class="p-2 my-flex-item">
                      <button type="submit" class="btn btn-outline-danger mr-3"> <i class="fa fa-window-close"></i> Reject</button>
                    </div>
                    <div class="p-2 my-flex-item">
                      <button type="submit" class="btn btn-success mr-3"> <i class="fa fa-check"></i> Approve</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ./table -->
          <!--  Modal/ popup add service -->
          @extends('apps.vesschedule.modalAddService')
          <!--  Modal/ popup Edit service -->
          @extends('apps.vesschedule.modalDeleteService')

        </div>
      </div>

    </div>

  </div>
  <script>
      $('#datepickereta').datepicker({
          uiLibrary: 'bootstrap4'
      });
      $('#datepickeretb').datepicker({
          uiLibrary: 'bootstrap4'
      });
      $('#datepickeretd').datepicker({
          uiLibrary: 'bootstrap4'
      });
      $('#startDate').datepicker({
          uiLibrary: 'bootstrap4'
      });
      $('#endDate').datepicker({
          uiLibrary: 'bootstrap4'
      });
  </script>
  <script type="text/javascript">
  // autofocus di modal
  $(document).ready(function() {
    $('#addService').on('shown.bs.modal', function() {
      $('#startDate').trigger('focus');
    });
    });
  </script>
  <!-- end div header -->
  <!-- tambah data saat tekan tombol add di popup -->
  <script type="text/javascript">
    $(document).ready(function(){
      // inisiasi table
        $("#add-row").click(function(){
            var serviceName = $("#serviceName").val();
            // startDate
            var startDate = $("#startDate").val();
            var hoursStart = $("#hoursStart").val();
            var minutesStart = $("#minutesStart").val();
            // alert(startDate);
            // endDate
            var endDate = $("#endDate").val();
            var hoursEnd = $("#hoursEnd").val();
            var minutesEnd = $("#minutesEnd").val();
            // meter
            var startMeter = $("#startMeter").val();
            var endMeter = $("#endMeter").val();
            // rampdoor
            var rampdoor = $("#rampdoor").val();
            var descriptionDate = "<a class='text-success' href='#'><i class='fas fa-calendar-alt text-calendar-alt pr-1'></i> <span class='text-default'>" + startDate + " - " + endDate +  "</span>";

            var descriptionHours = "<a class='text-success' href='#'><i class='fas fa-clock  pr-1'></i> <span class='text-default'>" + hoursStart + ":" + minutesStart + " - " + hoursEnd + " - " + minutesEnd + "</span>";
            var action = "<a href='#' data-toggle='modal' data-target='#addService' alt='edit ?'><i class='fas fa-edit fa-1x  pr-2 pl-3 text-warning'></i></a><a href=''  data-toggle='modal' data-target='#deleteService' alt='delete ?'><i class='fas fa-trash pl-3 text-danger'></i></a>";
            var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + serviceName + "</td><td>" + descriptionDate + "<br>" + descriptionHours +  "<br>" + "<i class='fa fa-anchor text-success pr-1'></i> Berth Info : " + startMeter + "-" + endMeter + " (m)" + "<br>" + "<i class='fa fa-circle text-success pr-1'></i> Rampdoor : " + rampdoor + " </td><td>quantity</td><td>UOM</td><td>Unit Price</td><td>Total Price</td><td class='text-primary table-action'>" + action + "</td></tr>";
            alert(markup);
            $("table tbody").append(markup);
        });

        // selects

        // Find and remove selected table rows
        $("#delete-row").click(function(){
          // $("input[name='record']").attr('checked', true);
            $("table tbody").find('input[name="record"]').each(function(){

            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });

    });
</script>
</head>
@endsection
