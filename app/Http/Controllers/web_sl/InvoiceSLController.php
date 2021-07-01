<?php

namespace App\Http\Controllers\web_sl;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use PDF;
use App\Http\Controllers\web_sl\VesselServicesController;

class InvoiceSLController extends Controller
{
    public function index(){
        $id_user = Session::get('user');

    	return view ('web_sl.invoice.invoiceList',[
                        'id_user' => $id_user
                    ]);
    }

    public function get_invoice($id_user){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/getInvoice/'.$id_user,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function downloadPranotaPDF($name,$id_sch){
        if ($name == 'pranota')
        {
            $list_services = json_decode($this->get_pranota($id_sch));
        }
        else
        {
            $list_services = json_decode($this->invoice($id_sch));
        }
        $all = new VesselServicesController;
        $data_sch = json_decode($all->vesSchListById($id_sch));
        // var_dump($data_sch->ves_master);die;

        $pdf = PDF::loadView('web_sl.invoice.pranotaPDF',
                    [
                        'head' => $name,
                        'list_services' => $list_services->data,
                        'sch'   => $data_sch

                    ])->setPaper('A4','portrait')->stream($name.'.pdf');
        return $pdf;
    }

    public function get_pranota($id_sch){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/getPranota/'.$id_sch,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

     public function invoice($id_sch){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/invoice/'.$id_sch,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }
}
