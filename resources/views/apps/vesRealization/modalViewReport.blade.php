<!-- Modal Delete -->
<div class="modal fade" id="viewReport" tabindex="-1" role="dialog" aria-labelledby="viewReport" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete_modal">Preview Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="fa fa-window-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="col-12">
            <table class=" table-responsive table table-borderless">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Vessel Name</th>
                    <td>: MV IKAN PAUS</td>
                    <th scope="row">Voy In/Out</th>
                    <td>: N10/N11</td>
                  </tr>
                  <tr>
                    <th scope="row">Shipping Agent</th>
                    <td>: Jacob</td>
                    <th scope="row">Voyage Type</th>
                    <td>: Ocean Going</td>
                  </tr>
                  <tr>
                    <th scope="row">ATA</th>
                    <td >: 15/09/2019 09:00</td>
                    <th scope="row">Berth</th>
                    <td>: B01</td>
                  </tr>
                  <tr>
                    <th scope="row">ATA</th>
                    <td >: 15/09/2019 09:00</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">ATA</th>
                    <td >15/09/2019 09:00</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
          </div>

          <div class="col-12">
            <!--  Preview Report -->
            <div class="table-responsive">
              <table class="table display table-hover cell-border compact stripe" id="v_schedule" >
                <thead class=" text-grey text-center">
                  <th class="text-center">
                    No
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
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
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
                  </tr>

                </tbody>
              </table>
            </div>
            <!--  end Table -->
          </div>

        </div>
      </div>
      <div class="">
        <div class="d-flex flex-row justify-content-between my-flex-container">
            <div class="p-2 my-flex-item ml-2"><button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancel</button></div>
            <div class="p-2 my-flex-item"><a href="#" id="delete-row" data-dismiss="modal" class="btn btn-success mr-3"> <i class="fa fa-save"></i> Save</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./ Modal -->
