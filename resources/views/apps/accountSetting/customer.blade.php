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
                  <li class="breadcrumb-item"><a href="/accountSetting/customer">Acount Setting</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Customer</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
            <div class="col-12">
              <div class="navbar-wrapper">
                <h3 class="h3"><span class="tim-note">All Customer</span></h3>
                <form class="navbar-form">
                  <div class="input-group no-border">

                    <i class="pt-2 ml-5 material-icons"> search</i>
                    <input id="search_customer" type="text" value="" class="form-control" placeholder="Search...">

                  </div>
                </form>
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
        <div class="container-fluid pr-5 pl-5 mt-5">
          <!-- ./ wizard -->
          <!-- header -->
          <div class="row">
            <div class="col">
            List Customer ( 10 Customer )
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

          <!-- ./ header -->
          <!-- table -->
          <div class="card">
            <div class="card-table">
              <!-- Wizard step -->

              <div class="table-responsive">
                <table class="table display table-hover cell-border compact stripe" id="v_customer" >
                  <thead class=" text-grey text-center">
                    <th class="text-center">
                      No
                    </th>
                    <th>
                      Company Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Phone
                    </th>
                    <th>
                      Document
                    </th>
                    <th>
                      Plan
                    </th>
                    <th>
                      Status
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
                          PT. Eclipse ILCS
                      </td>
                      <td class="text-cen ter">
                        customer@ilcs.co.id
                      </td>
                      <td>
                        +62819990009988
                      </td>
                      <td>
                        Uploaded
                      </td>
                      <td>
                        On Premise
                      </td>
                      <td>
                        <a class="text-success" href="#" role="button">
                          <i class="fas fa-circle text-left pr-1"></i> <span class="text-default">Active </span>
                        </a>
                      </td>
                      <td class="text-primary table-action">
                        <a href="/accountSetting/createSite" data-toggle="tooltip"  data-html="true" data-placement="left" title="Setting Site"><i class="fas fa-cogs fa-1x pl-2 pr-2 text-info"></i></a>
                        <a href="" data-toggle="tooltip"  data-html="true" data-placement="left" title="Upload Patch" data-toggle="modal" data-target="#delete_modal"><i class="fas fa-download fa-1x pr-2 text-primary"></i></a>
                        <a href="/accountSetting/billing" data-toggle="tooltip"  data-html="true" data-placement="left" title="Check Billing" data-toggle="modal" data-target="#send_request_modal" ><i class="fas fa-credit-card  text-success"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        2
                      </td>
                      <td>
                          PT. Eclipse ILCS
                      </td>
                      <td class="text-cen ter">
                        customer@ilcs.co.id
                      </td>
                      <td>
                        +62819990009988
                      </td>
                      <td>
                        Via POS
                      </td>
                      <td>
                        Cloud Services
                      </td>
                      <td>
                        <a class="text-success" href="#" role="button">
                          <i class="fas fa-circle text-left pr-1 text-warning"></i> <span class="text-default">Waiting Approval </span>
                        </a>
                      </td>
                      <td class="text-primary table-action">
                        <a href="#" data-toggle="modal" data-target="#rejectAccount"><i class="fas fa-window-close fa-1x pl-2 pr-2 text-danger"></i></a>
                        <a href="#" data-toggle="modal" data-target="#approveAccount"><i class="fas fa-check-square fa-1x pr-2 text-success"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ./table -->

        <!--  Add Modal -->
        @extends('apps.accountSetting.modalRejectAccount')
        @extends('apps.accountSetting.modalApproveAccount')

        </div>
      </div>

    </div>

  </div>
  <script type="text/javascript">
    $(document).ready(function() {
        // Datatable_vessel
        vesCustomer_Table = $('#v_customer').DataTable({
             "searching": true,
             "paging": true,
             "info": true,
             "lengthChange":false
        });

        $('#search_customer').on('keyup change', function(){
          vesCustomer_Table.search($(this).val()).draw();
        })
      });
  </script>
  <!-- end div header -->
@endsection
