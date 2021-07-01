@extends('apps.mains.header_portal')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top pr-5 pl-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="width:400px;">
                  <li class="breadcrumb-item"><a href="{{url('accountSetting')}}">Customer</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Billing</li>
                </ol>
              </nav>
            </div>

            <div class="col-12">
              <div class="navbar-wrapper" style="float:left;">
                <h3><span class="tim-note">Billing - {{$data_bup->BUP_NAME}} </span></h3>
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
          <!-- <div class="row">
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
          </div> -->
          <hr>

          <!-- ./ header -->
          <!-- table -->
          <div id="the-final-countdown" style="display:none;">
            <p></p>
          </div>
          <input type="hidden" name="id_bup" id="id_bup" value="{{$data_bup->ID_BUP}}">
          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-table">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <p> <b class="font-weight-bold">Current Plan</b> : @php echo (($data_bup->BUP_PLAN == 1) ? 'Subcribe' : (($data_bup->BUP_PLAN == 2) ? 'License' : '-')) @endphp</p>
                        <p> <b class="font-weight-bold">Last Payment </b> :  @php echo !empty($last_pay->PAYMENT_DATE_LOG) ? date('d-m-Y',strtotime("$last_pay->PAYMENT_DATE_LOG")) : '-' @endphp</p>
                      </li>
                      <li class="list-group-item">
                        <p><b class="font-weight-bold">Terminal Active : </b></p>
                        @foreach ($data_site_aktif as $value_site_aktif)
                          <p> <b class="font-weight-bold">{{$value_site_aktif->TERMINAL_NAME}}</b></p>
                        @endforeach
                        <p> <b class="font-weight-bold">Expiration Date </b> :  @php echo !empty($data_paymentH->EXPIRED_DATE) ? date('d-m-Y',strtotime("$data_paymentH->EXPIRED_DATE")) : '-' @endphp</p>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card">
                <div class="card-table">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      <p><b class="font-weight-bold">Invoice Cycle</b></p>
                      <select class="form-control" name="invo_cycle">
                        @if($data_bup->BUP_PLAN == 1)
                        <option value="1 Years">1 Years</option>
                        @else
                        <option value="OTC">OTC</option>
                        @endif
                        <!-- Jika cloud service yang muncul bulan / tahun-->
                      </select>
                    </li>
                    <li class="list-group-item">
                      <p> <b class="font-weight-bold">Terminal / Site </b> : {{$jumlah_site}}</p>
                    </li>
                    <li class="list-group-item">
                      @foreach($data_site_unpaid as $index => $value_site_unpaid)
                      <div class="d-flex flex-row justify-content-between my-flex-container">
                           <div class="p-2 my-flex-item"><i class="fas fa-ship"></i> {{$value_site_unpaid->TERMINAL_NAME}}</div>
                           <div class="p-2 my-flex-item">@php echo number_format($data_paymentD[$index]->AMOUNT,0,",",".") @endphp</div>
                      </div>
                      @endforeach

                    </li>
                    <li class="list-group-item">
                      <div class="d-flex flex-row justify-content-between my-flex-container">
                           <div class="p-2 my-flex-item "><b class="font-weight-bold">Total Ammount</b></div>
                           <div class="p-2 my-flex-item">@php echo !empty($data_paymentH->TOTAL) ? number_format($data_paymentH->TOTAL,0,",",".") : '-' @endphp</div>
                      </div>
                    </li>
                     <div class="d-flex flex-row justify-content-center my-flex-container">
                       <div class="p-2 my-flex-item">
                        @php
                        if (!empty($data_paymentH->STATUS))
                        {
                          if ($data_paymentH->STATUS == 1) {$text = "disabled='disabled'";}
                          else if ($data_paymentH->STATUS == 2) {$text = "";}
                          else if ($data_paymentH->STATUS == 3) {$text = "disabled='disabled'";}
                          else if ($data_paymentH->STATUS == 4) {$text = "";}
                          else {$text = "";}
                        }
                        else
                        {
                            $text = "disabled='disabled'";
                        }
                        @endphp
                          <!-- <a href="#" id="pay" class="btn btn-primary pl-5 pr-5"> Pay </a> --><button id="pay" class="btn btn-primary pl-5 pr-5" @php echo $text @endphp> Pay </button>
                       </div>
                     </div>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!--  Payment detail-->
          <div id="paymentDetail" style="display:none;" class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> <i class="fa fa-credit-card text-success"></i> Pay With Bank Transfer</h5>
                <div class="alert alert-success" role="alert">
                  To finalize your purchase, please Transfer
                  <div class="d-flex flex-row justify-content-between my-flex-container">
                       <div class="p-2 my-flex-item"><i class="fas fa-ship"></i> Total Ammount</div>
                       <div class="p-2 my-flex-item" id="pay_amount"></div>
                  </div>
                  <div class="d-flex flex-row justify-content-between my-flex-container">
                       <div class="p-2 my-flex-item"><i class="fas fa-ship"></i> Bank Account</div>
                       <div class="p-2 my-flex-item">Bank Mandiri - 120XXX-XXX-XX-XXX-XX  <br>An PT. ILCS </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- ./billing History -->
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Billing History</h5>
                <div class="table-responsive">
                  <table class="table display table-hover cell-border compact stripe" id="v_schedule" >
                    <thead class=" text-grey text-center">
                      <th class="text-center">No</th>
                      <th>No Invoice</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach ($data_log_paymentH as $index => $value_log)
                      <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$value_log->NO_INVOICE_LOG}}</td>
                        <td>@php echo !empty($value_log->PAYMENT_DATE_LOG) ? date('d-m-Y',strtotime("$value_log->PAYMENT_DATE_LOG")) : '' @endphp</td>
                        <td>
                          <a class="text-success" href="#" role="button">
                            <i class="fas fa-circle text-left pr-1"></i> <span class="text-default"> @php echo ($value_log->STATUS_LOG == 1) ? 'Paid' : 'Unpaid' @endphp </span>
                          </a>
                        </td>
                        <td class="text-primary table-action">
                          <a href="" data-toggle="tooltip"  data-html="true" data-placement="left" title="Download Invoice"><i class="fas fa-file-pdf pl-5 text-success"></i> Download Invoice</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>        
        </div>
      </div>

    </div>

  </div>
  @endsection
  <!--  Add Modal -->
  @include('apps.modal.modalBUP')

  @push('scriptJS')
  <style>
    #the-final-countdown {
      background: #55b559;
      font-family: 'Lato', sans-serif;
      text-align: center;
      color: #eee;
      text-shadow: 1px 1px 5px black;
      padding: 1rem 0;
      font-size: 3rem;
      /*border: 1px solid #000;*/
      border-radius: 3px;
      position: relative;
      padding: 20px 15px;
      /*line-height: 20px;*/
    }
  </style>
  <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // function hideShow() {
    // var x = document.getElementById("paymentDetail");
    //   if (x.style.display === "none") {
    //       x.style.display = "block";
    //       $('#pay').removeClass('btn-primary');
    //       $('#pay').addClass('btn-success');
    //   } else {
    //       x.style.display = "none";
    //       $('#pay').addClass('btn-primary');
    //       $('#pay').removeClass('btn-success');
    //   }
    // }

    $('#pay').on('click',function(e){
        e.preventDefault();
        var id_bup = $('#id_bup').val();
        var total = '<?php echo !empty($data_paymentH->TOTAL) ? number_format($data_paymentH->TOTAL,0,",",".") : '-';?>';
        var num_random = Math.floor((Math.random() * 1000) + 1);
        var split_total = total.split('.');
        var num_random_end = (num_random < 10) ? '00'+num_random : num_random;
        var show_total = 'Rp '+split_total[0]+'.'+split_total[1]+'.'+num_random_end+',00';
        var pay_total = split_total[0]+''+split_total[1]+''+num_random;
        console.log(show_total)
        $('#pay_amount').text(show_total);
        $("#pay").prop('disabled', true);
        var seconds = 7200;
        var interval = setInterval(function() {

        var h = Math.floor(seconds / 3600),
        m = Math.floor(seconds / 60) % 60,
        s = seconds % 60;
          if (h < 10) h = "0" + h;
          if (m < 10) m = "0" + m;
          if (s < 10) s = "0" + s;
        seconds--;
        $('#the-final-countdown p').html(h+':'+m + ':' + s);
        
        if (seconds < 0){
          clearInterval(interval);
          jQuery('#the-final-countdown p').html('Expired');
        }
        }, 1000);

        $('#the-final-countdown').attr('style','display:block;');
        $('#paymentDetail').attr('style','display:block;');
        $.ajax({
            url: '{{url("pay_billing")}}/'+id_bup,
            method: 'get',
            dataType: 'json',
            data: {total_pay : pay_total},
            success: function(data){
              // console.log(data.status);
              if (data.status == 'Success')
              {
                  $('#paymentDetail').attr('style','display:block;');
              }
              else
              {
                  alert('Data Gagal di Simpan');
              }
            },
            error: function(error){
                alert('Ada Error'+error+' nih');
            }
        });
    })
  </script>
  @endpush
