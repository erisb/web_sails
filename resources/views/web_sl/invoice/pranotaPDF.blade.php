<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ucfirst($head)}} PDF</title>
    <style type="text/css">
      .td-first{
          padding-right: 80px;
      }
      .judul-pranota{
          text-align: center;
          font-family: sans-serif;
      }
      .td-second{
          width: 13%;
          padding-left: 20px;
      }
      .td-third{
          width: 18%;
          padding-left: 10px;
      }
      .td-fourth{
          width: 13%;
          padding-left: 20px;
      }
      .td-titik{
          width: 1%;
      }
      .table-third{
          width: 100%;
          border: solid 1px;
      }
      .page-break {
          page-break-after: always;
      }
    </style>
  </head>
  <body>
    <br><br>
    <div class="page-break">
      <table width="100%">
        <tr align="right">
          <td class="td-first">No {{ucfirst($head)}} : {{(isset($list_services->NO_PRANOTA) ? $list_services->NO_PRANOTA : (isset($list_services->NO_NOTA) ? $list_services->NO_NOTA : '-'))}}</td>
        </tr>
        <tr align="right">
          <td class="td-first">{{ucfirst($head)}} Date : {{(isset($list_services->PRANOTA_DATE) ? $list_services->PRANOTA_DATE : (isset($list_services->NOTA_DATE) ? $list_services->NOTA_DATE : '-'))}}</td>
        </tr>
      </table><br><br>
      <h1 class="judul-pranota">{{strtoupper($head)}} VESSEL OPERATION</h1>
      <br><br>
      <table width="100%">
        <tr>
          <td class="td-second">Vessel Name</td><td class="td-titik">:</td><td class="td-third">{{isset($sch->ves_master->VESSEL_NAME) ? $sch->ves_master->VESSEL_NAME : '-'}}</td>
          <td class="td-fourth">Voyage Type</td><td class="td-titik">:</td><td class="td-third">{{isset($sch->JENIS_PELAYARAN) ? $sch->JENIS_PELAYARAN : '-'}}</td>
        </tr>
        <tr>
          <td class="td-second">Voy In/Out</td><td class="td-titik">:</td><td class="td-third">{{isset($sch->VOY_IN) || isset($sch->VOY_OUT) ? $sch->VOY_IN.'/'.$sch->VOY_OUT : '-'}}</td>
          <td class="td-fourth">Shipping Agent</td class="td-titik"><td>:</td><td class="td-third">{{isset($sch->ves_cust->CUSTOMERS_NAME) ? $sch->ves_cust->CUSTOMERS_NAME : '-'}}</td>
        </tr>
        <tr>
          <td class="td-second">ATA</td><td class="td-titik">:</td><td class="td-third">{{isset($sch->ATA) ? $sch->ATA : '-'}}</td>
          <td class="td-fourth">Berth</td><td class="td-titik">:</td><td class="td-third">{{isset($list_services[0]->BERTH_NAME) ? $list_services[0]->BERTH_NAME : '-'}}</td>
        </tr>
        <tr>
          <td class="td-second">ATB</td><td class="td-titik">:</td><td class="td-third">{{isset($sch->ATB) ? $sch->ATB : '-'}}</td>
        </tr>
        <tr>
          <td class="td-second">ATD</td><td class="td-titik">:</td><td class="td-third">{{isset($sch->ATD) ? $sch->ATD : '-'}}</td>
        </tr>
      </table><br><br>
      <table class="table-third">
        <thead>
          <tr>
            <td>No</td>
            <td>Service</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>UOM</td>
            <td>Unit Price</td>
            <td>Total Price</td>
          </tr>
        </thead>
        <tbody>
            @php 
              $total = 0;
            @endphp
            @foreach($list_services as $key => $value)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->SERVICE_NAME}}</td>
                <td>{{$value->SERVICE_DESCRIPTION}}</td>
                <td>{{$value->QUANTITY}}</td>
                <td>{{($value->ID_UOM == 1) ? 'Hours' : 'm3'}}</td>
                <td>{{$value->UNIT_PRICE}}</td>
                <td>{{$value->TOTAL}}</td>
              </tr>
              $total = $total + ($value->TOTAL);
            @endforeach
        </tbody>
      </table><br><br>
      <table width="100%">      
        <tr align="right">
          <td><b>Total Rp {{number_format($total,2,',','.')}}</b></td>
        </tr>
      </table>
    </div>
  </body>
</html>