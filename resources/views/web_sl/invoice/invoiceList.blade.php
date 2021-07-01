@extends('web_sl.mains.header_sl')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <!-- breadcrumb -->
          <div class="row">
            {{-- <input type="text" name="ves_name" id="ves_name"> --}}
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="width:400px;">
                  <li class="breadcrumb-item">Invoice</li>
                </ol>
              </nav>
            </div>
            <!--  ./end breadcrumb-->
            <div class="col-12">
              <div class="navbar-wrapper">
                <h3 class="h3"><span class="tim-note">All invoice</span></h3>
                <form class="navbar-form">
                  <div class="input-group no-border">

                    <i class="pt-2 ml-5 material-icons"> search</i>
                    <input id="search_ves_invoice" type="text" value="" class="form-control" placeholder="Search...">

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
            List Invoice ( 10 Invoice )
            {{-- <div class="pull-right form-row">Filter by :
              <select id="inputState"  class="form-filter custom -select" name="" >
                <option value="">Recently Added</option>
                <option value="">New</option>
                <option value="">Waiting Approval</option>
                <option value="">Waiting Berth</option>
                <option value="">Reject</option>
                <option value="">Berthing</option>
                <option value="">Departure</option>
              </select>

            </div> --}}

            </div>
          </div>
          <hr>

          <!-- ./ header -->
          <!-- table -->
          <div class="card">
            <div class="card-table">
              <!-- Wizard step -->

              <div class="table-responsive">
                <table class="table display table-hover cell-border compact stripe" id="invoice" >
                  <thead class=" text-grey text-center">
                    <th class="text-center">No</th>
                    <th>Vessel Name</th>
                    <th>Status</th>
                    <th>No Report</th>
                    <th>Report Date</th>
                    <th>No Pranota/ No Invoice</th>
                    <th>Pranota / Invoice Date</th>
                    <th>Id Schedule</th>
                    <th>Id Vessel</th>
                    <th width="15%">Action</th>
                  </thead>
                  <tbody class=" text-grey text-center">
                    {{-- <th>1.</th>
                    <th>Test PDF</th>
                    <th>Test PDF</th>
                    <th>Test PDF</th>
                    <th>Test PDF</th>
                    <th>Test PDF</th>
                    <th>Test PDF</th>
                    <th width="15%"><a href="{{url('web_sl/pranotaPDF')}}/invoice" data-placement="left" title="Edit Schedule" id="edit_sch_modal" target="_blank"><i class="fas fa-eye fa-1x pl-2 pr-2 text-success"></i></a></th> --}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- ./table -->
        </div>
      </div>

    </div>

  </div>
@endsection
<!--  Add Modal -->
{{-- @include('web_sl.modal.modalVesSchedule') --}}

@push('scriptJS')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        var invoice_Table = $('#invoice').DataTable({
            searching: true,
            paging: true,
            info: true,
            lengthChange:false,
            order: [ 0, 'asc' ],
            pageLength: 10,
            ajax: {
                url: '{{url('get_invoice')}}/{{$id_user}}',
                dataSrc: 'data'
            },
            columns:[
                { data : null,
                  render: function (data, type, row, meta) {
                          //I want to get row index here somehow
                          return  meta.row+1;
                    }
                },
                { data : 'VESSEL_NAME' },
                { data : null,
                  render: function (data, type, row, meta){
                          return '<a class="text-success" href="#" role="button"><i class="fas fa-circle text-left pr-1 text-warning"></i><span class="text-default">'+row.STATUS_NAME+'</span></a>';
                    }

                },
                { data : null,
                  render: function (data, type, row, meta) {
                    if(row.REPORT_DATE == null)
                    {
                        return '-';
                    }
                    else
                    {
                        return row.NO_REPORT;
                    }
                  }
                },
                { data : null,  
                  render: function (data, type, row, meta) {
                    if(row.REPORT_DATE == null)
                    {
                        return '-';
                    }
                    else
                    {
                        date = row.REPORT_DATE.split('-');
                        date_years = date[0];
                        date_month = date[1];
                        date_day = date[2].split(' ');
                        date_new = date_day[0]+'-'+date_month+'-'+date_years;

                        return date_new;
                    }
                  }
                },
                { data : null,
                  render: function (data, type, row, meta) {
                      if (row.STATUS == '10')
                      {
                          if (row.NO_PRANOTA == null)
                          {
                              return '-';
                          }
                          else
                          {
                              return row.NO_PRANOTA;
                          }
                      }
                      else if (row.STATUS == '11')
                      {
                           if (row.NO_NOTA == null)
                          {
                              return '-';
                          }
                          else
                          {
                              return row.NO_NOTA;
                          }
                      }
                      else
                      {
                          return '-';
                      }
                  }

                },
                { data : null,
                  render: function (data, type, row, meta) {
                       if (row.STATUS == '10')
                      {
                          if (row.PRANOTA_DATE == null)
                          {
                              return '-';
                          }
                          else
                          {
                              date = row.PRANOTA_DATE.split('-');
                              date_years = date[0];
                              date_month = date[1];
                              date_day = date[2].split(' ');
                              date_new = date_day[0]+'-'+date_month+'-'+date_years;

                              return date_new;
                          }
                      }
                      else if (row.STATUS == '11')
                      {
                          if (row.NOTA_DATE == null)
                          {
                              return '-';
                          }
                          else
                          {
                              date = row.NOTA_DATE.split('-');
                              date_years = date[0];
                              date_month = date[1];
                              date_day = date[2].split(' ');
                              date_new = date_day[0]+'-'+date_month+'-'+date_years;

                              return date_new;
                          }
                      }
                      else
                      {
                          return '-';
                      }
                  }

                },
                { data : 'ID_VES_SCHEDULE'  },
                { data : 'ID_VESSEL'  },
                { data : null,
                    render: function (data, type, row, meta) {                 
                        if(row.STATUS == '10')
                        {
                            return '<a href="{{url('web_sl/vesServices')}}/'+row.ID_VES_SCHEDULE+'/'+row.ID_VESSEL+'" data-toggle="tooltip" data-placement="left" title="View Schedule & Services" id="view_sch" target="_blank"><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>'
                              +'<a href="{{url('web_sl/pranotaPDF')}}/pranota/'+row.ID_VES_SCHEDULE+'" data-placement="left" title="View Pranota" id="edit_sch_modal" target="_blank"><i class="fas fa-eye fa-1x pl-2 pr-2 text-success"></i></a>';
                        }
                        else if(row.STATUS == '11')
                        {
                            return '<a href="{{url('web_sl/vesServices')}}/'+row.ID_VES_SCHEDULE+'/'+row.ID_VESSEL+'" data-toggle="tooltip" data-placement="left" title="View Schedule & Services" id="view_sch" target="_blank"><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>'
                              +'<a href="{{url('web_sl/pranotaPDF')}}/pranota/'+row.ID_VES_SCHEDULE+'" data-placement="left" title="View Pranota" id="edit_sch_modal" target="_blank"><i class="fas fa-eye fa-1x pl-2 pr-2 text-success"></i></a>'
                              +'<a href="{{url('web_sl/pranotaPDF')}}/invoice/'+row.ID_VES_SCHEDULE+'" data-placement="left" title="View Invoice" id="edit_sch_modal" target="_blank"><i class="fas fa-eye fa-1x pl-2 pr-2 text-success"></i></a>';
                        }
                        else
                        {
                            return '<a href="{{url('web_sl/vesServices')}}/'+row.ID_VES_SCHEDULE+'/'+row.ID_VESSEL+'" data-toggle="tooltip" data-placement="left" title="View Schedule & Services" id="view_sch" target="_blank"><i class="fas fa-eye fa-1x pl-2 pr-2 text-danger"></i></a>';
                        }
                    }
                }
            ],
            columnDefs: [
                { targets: [7,8], visible: false}
            ]
        });

        $('#search_ves_invoice').on('keyup change', function(){
          invoice_Table.search($(this).val()).draw();
        });

    });
</script>
@endpush
