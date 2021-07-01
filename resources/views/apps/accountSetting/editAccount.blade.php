@extends('apps.mains.header')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <!-- breadcrumb -->
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/app">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Acount Setting</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Account</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
            <div class="col-12">
              <div class="navbar-wrapper">
                <h3 class="h3"><span class="tim-note">Account Setting - Username</span></h3>
              </div>
            </div>
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
                <p class="h3"><i class=" fa fa-ship"></i> General Information</p>
                <hr class="mb-5 mr-5">
                <div class="row mr-3">
                  <!--  Vessel info -->
                  <div class="col-6">

                    <form>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter vessel name" autofocus>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <textarea name="name" class="form-control" rows="8" cols="80"></textarea>
                      </div>

                  </div>
                  <div class="col-6">

                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Phone</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Plan</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter plan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Status</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Status">
                    </div>
                  </div>
                  <!-- Estimation Schedule -->
                  <div class="col-12">
                    <p class="h3"><i class=" fa fa-clock"></i> Authentication</p>
                    <hr class="mb-5">
                    <!-- 1 -->
                    <div class="col-6">

                      <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="dani.akbarr" disabled>
                      </div>
                        <label for="inlineFormInputGroup">New Password</label>
                        <div class="inner-addon right-addon">
                          <a href="#"><i id="eyeSatu" class="fa fa-eye-slash" onclick="showPasswordSatu()"></i></a>
                          <input id="passwordSatu" type="password" class="form-control form-control-lg" placeholder="New password" autofocus/>
                        </div>


                        <label for="inlineFormInputGroup">Re-type Password</label>
                        <div class="inner-addon right-addon">
                          <a href="#"><i id="eyeDua" class="fa fa-eye-slash" onclick="showPasswordDua()"></i></a>
                          <input id="passwordDua" type="password" class="form-control form-control-lg" placeholder="Re-type password" autofocus/>
                        </div>

                  </div>
                </div>
              </div>
                <div class="d-flex flex-row justify-content-between my-flex-container mb-5 mt-5">
                    <div class="p-2 my-flex-item"><button type="submit" class="btn btn-outline-danger"><i class="fa fa-window-close"></i> Cancel</button></div>
                    <div class="p-2 my-flex-item"><button type="submit" class="btn btn-success mr-3"> <i class="fa fa-save"></i> Save</button></div>
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
<script type="text/javascript">
function showPasswordSatu() {
    var x = document.getElementById("passwordSatu");
    if (x.type === "password") {
        x.type = "text";
        $('#eyeSatu').removeClass('fa fa-eye-slash');
        $('#eyeSatu').addClass('fa fa-eye');
    } else {
        x.type = "password";
        $('#eyeSatu').removeClass('fa fa-eye');
        $('#eyeSatu').addClass('fa fa-eye-slash');
    }
  }
  function showPasswordDua() {
      var x = document.getElementById("passwordDua");
      if (x.type === "password") {
          x.type = "text";
          $('#eyeDua').removeClass('fa fa-eye-slash');
          $('#eyeDua').addClass('fa fa-eye');
      } else {
          x.type = "password";
          $('#eyeDua').removeClass('fa fa-eye');
          $('#eyeDua').addClass('fa fa-eye-slash');
      }
    }
</script>
</head>
@endsection
