@extends('apps.mains.header')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h3 class=""><span class="tim-note">Vessel Realization</span></h3>
            <form class="navbar-form">
              <div class="input-group no-border">

                <i class="pt-2 ml-5 material-icons"> search</i>
                <input id="search_vessel" type="text" value="" class="form-control" placeholder="Search...">

              </div>
            </form>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <!-- <div class="collapse navbar-collapse justify-content-end">
            <a class="btn btn-primary" href="/addVesRealization" role="button">
              <i class="material-icons">add</i> CREATE NEW
            </a>
          </div> -->
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid pr-5 pl-5 mt-5">
          <!-- ./ wizard -->
          <!-- header -->
          <div class="row">
            <div class="col">
            List Vessel Realization ( 10 Realization )
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
                <table class="table display table-hover cell-border compact stripe" id="v_realization" >
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
                          <i class="fas fa-circle text-left pr-1"></i> <span class="text-default"> 04 - Approved Service </span>
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
                        <a href="/addVesRealization" data-toggle="tooltip"  data-html="true" data-placement="left" title="Add Realization"><i class="fas fa-plus-square fa-1x pl-2 pr-2 text-info"></i></a>
                        <a href="" data-toggle="modal" data-target="#viewReport" data-toggle="tooltip"  data-html="true" data-placement="left" title="Generate Report"><i class="fas fa-sync fa-1x pr-2 text-danger"></i></a>

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
                          <i class="fas fa-circle text-left pr-1"></i> <span class="text-default"> 05 - Realization </span>
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
                        <i class="fas fa-plus-square fa-1x pl-2 pr-2"></i>
                        <i class="fas fa-sync fa-1x pr-2 text-warning"></i>

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
                          <i class="fas fa-circle text-left pr-1"></i> <span class="text-default"> 05 - Realization </span>
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
                        <i class="fas fa-plus-square fa-1x pl-2 pr-2"></i>
                        <i class="fas fa-sync fa-1x pr-2 text-warning"></i>
                        <a href="{{action('PdfController@downloadPDF')}}" data-toggle="tooltip"  data-html="true" data-placement="left" title="Download Report"><i class="fas fa-file-pdf  text-success"></i></a>
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
                          <i class="fas fa-circle text-left pr-1"></i><span class="text-default"> 07 - Pranota </span>
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
                        <i class="fas fa-plus-square fa-1x pl-2 pr-2"></i>
                        <i class="fas fa-sync fa-1x pr-2 text-warning"></i>
                        <a href="" data-toggle="modal" data-target="#send_request_modal" ><i class="fas fa-file-pdf  text-success"></i></a>
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
                          <i class="fas fa-circle text-left pr-1"></i><span class="text-default"> 08 - Nota </span>
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
                        <a href="" class="pl-2" data-toggle="modal" data-target="#send_request_modal" ><i class="fas fa-file-pdf  text-success"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ./table -->

          @extends('apps.vesRealization.modalViewReport')

        </div>
      </div>

    </div>

  </div>
  <!-- end div header -->
@endsection
