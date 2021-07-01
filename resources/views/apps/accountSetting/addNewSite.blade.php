@extends('apps.mains.header_portal')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <!-- breadcrumb -->
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="width:400px;">
                  <li class="breadcrumb-item"><a href="{{url('accountSetting')}}">Customer</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{url('set_site')}}">Create Site</a></li>
                  <li class="breadcrumb-item active" aria-current="page">New Site</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
          <div class="navbar-wrapper">
            &nbsp;&nbsp;&nbsp;&nbsp;<h3 class=""><span class="tim-note">Create New Site</span></h3>
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
                        <label for="exampleInputEmail1">Site Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter vessel name" autofocus>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Site Code</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter call sign">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">City</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter call sign">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Province</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter">
                      </div>
                      <div class="form-group mb-5 pt-4-5">
                        <label for="exampleInputPassword1">City </label>
                        <input type="text" class="form-control" id="country" />
                        <input type="hidden" id="country_code" />

                      </div>



                  </div>
                  <div class="col-6">

                    <div class="form-group">
                      <label for="exampleInputPassword1">Status</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Admin Name</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
                  </form>
                  <div class="container mb-5">
                    <div class="d-flex flex-row justify-content-between my-flex-container">
                        <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
                        <div class="p-2 my-flex-item"><button type="button" id="add-row" class="btn btn-success mr-3"> <i class="fa fa-plus"></i> Add</button></div>
                    </div>
                  </div>

                  <!--  Tabel Service | Muncul ketika schedule sudah di approve -->
                  <div class="container">
                    <div class="row">
                      <div class="col-6  justify-content-start">
                        <span class="h3"><i class=" fa fa-clipboard-list"></i> Terminal / Site</span>
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
        </div>
      </div>

    </div>

  </div>
  @endsection

  @push('scriptJS')
  <script type="text/javascript">
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
@endpush
