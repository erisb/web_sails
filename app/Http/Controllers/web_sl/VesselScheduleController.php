<?php

namespace App\Http\Controllers\web_sl;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
class VesselScheduleController extends Controller
{
    public function index($data_services = '0'){
        $port = json_decode($this->get_port());
        // $vesType = json_decode($this->get_ves_type());
        $customer = json_decode($this->get_cust());
        $id_user = Session::get('user');
        $id_terminal = Session::get('terminal');
        $id_customer = Session::get('customer');
        // echo $id_user;die;

    	return view ('web_sl.vesschedule.vesschedule',[
                            'port'  => $port->data,
                            // 'ves_type'  => $vesType->data,
                            'customer'  => $customer->data,
                            'id_user'   => $id_user,
                            'id_terminal' => $id_terminal,
                            'id_customer' => $id_customer,
                            'data_services' => $data_services
                    ]);
    }

    public function vesSchList($id_terminal){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/getVesScheduleByWeb/'.$id_terminal,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function get_port(){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/mPort',[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function get_ves_type(){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/mVesselType',[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function get_cust(){
        $client = new Client();
        $id_terminal = Session::get('terminal');

        $response = $client->get('http://127.0.0.1/mCustomer/'.$id_terminal,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function vessel_auto(Request $request){
        $client = new Client();
        // echo $request->term;die;
        $data = [
                    'vessel' => $request->input('term')
                ];

        $response = $client->get('http://127.0.0.1/getVesselAuto',[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false,
                        'json'  => $data
        ]);

        return $response->getBody()->getContents();
    }

    public function edit_vessel_auto(Request $request){
        $client = new Client();
        // echo $request->term;die;
        $data = [
                    'vessel' => $request->input('term')
                ];

        $response = $client->get('http://127.0.0.1/editVesselAuto',[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false,
                        'json'  => $data
        ]);

        return $response->getBody()->getContents();
    }

    public function add_ves_sch(Request $request){
        $client = new Client();
        
        $data = [
                    'ID_VESSEL' => $request->input('ID_VESSEL'),
                    'VOYAGE_IN' => $request->input('VOYAGE_IN'),
                    'VOYAGE_OUT' => $request->input('VOYAGE_OUT'),
                    'JENIS_PELAYARAN' => $request->input('JENIS_PELAYARAN'),
                    'ETA'       => $request->input('ETA'),
                    'ETB'       => $request->input('ETB'),
                    'ETD'       => $request->input('ETD'),
                    'ORIGIN'    => $request->input('ORIGIN'),
                    'DESTINATION' => $request->input('DESTINATION'),
                    'ID_USER'   => $request->input('ID_USER'),
                    'ID_TERMINAL' => $request->input('ID_TERMINAL'),
                    'ID_CUSTOMER' => $request->input('ID_CUSTOMER'),
                    'STATUS'    => $request->input('STATUS'),
                ];

        $response = $client->post('http://127.0.0.1/insertVesselSchedule',[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false,
                        'form_params'  => $data
        ]);

        return $response->getBody()->getContents();
    }

    public function delete_ves_sch($id_sch){
        $client = new Client();
        
        $response = $client->delete('http://127.0.0.1/deleteVesselSchedule/'.$id_sch,[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false,
        ]);

        return $response->getBody()->getContents();
    }

    public function edit_ves_sch(Request $request,$id_sch){
        $client = new Client();
        
        $data = [
                    'ID_VESSEL' => $request->input('ID_VESSEL'),
                    'VOYAGE_IN' => $request->input('VOYAGE_IN'),
                    'VOYAGE_OUT' => $request->input('VOYAGE_OUT'),
                    'JENIS_PELAYARAN' => $request->input('JENIS_PELAYARAN'),
                    'ETA'       => $request->input('ETA'),
                    'ETB'       => $request->input('ETB'),
                    'ETD'       => $request->input('ETD'),
                    'ORIGIN'    => $request->input('ORIGIN'),
                    'DESTINATION' => $request->input('DESTINATION'),
                    'ID_USER'   => $request->input('ID_USER'),
                    'ID_TERMINAL' => $request->input('ID_TERMINAL'),
                    'ID_CUSTOMER' => $request->input('ID_CUSTOMER'),
                    'STATUS'    => $request->input('STATUS'),
                ];

        $response = $client->put('http://127.0.0.1/editVesselSchedule/'.$id_sch,[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false,
                        'form_params'  => $data
        ]);

        return $response->getBody()->getContents();
    }

    public function send_ves_sch($id_sch){
        $client = new Client();
        
        $response = $client->put('http://127.0.0.1/sendReqVesselSchedule/'.$id_sch,[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false,
        ]);

        return $response->getBody()->getContents();
    }
}
