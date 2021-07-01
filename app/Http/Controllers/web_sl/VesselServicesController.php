<?php

namespace App\Http\Controllers\web_sl;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use App\Http\Controllers\web_sl\VesselScheduleController;

class VesselServicesController extends Controller
{
    public function index($id_sch,$id_ves){
        $port = json_decode($this->get_port());
        $customer = json_decode($this->get_cust());
        $id_user = Session::get('user');
        $id_terminal = Session::get('terminal');
        $id_customer = Session::get('customer');
        $all_sch = json_decode($this->vesSchListById($id_sch));
        $data_vessel = json_decode($this->vessel_byId($id_ves));
        $services = '';
        $services = json_decode($this->get_servicesByTarif($id_terminal));
        $data_services = json_decode($this->get_vesselService($id_sch));
        $jmlh_services = json_decode($this->count_vesselService($id_sch));
        // var_dump($services->data);die;

    	return view ('web_sl.vesschedule.addVesServices',[
                            'port'  => $port->data,
                            'customer'  => $customer->data,
                            'id_user'   => $id_user,
                            'id_terminal' => $id_terminal,
                            'id_customer' => $id_customer,
                            'all_sch'   => $all_sch,
                            'data_vessel' => $data_vessel,
                            'services' => $services->data,
                            'data_services' => $data_services->data,
                            'jmlh_services' => $jmlh_services->data
                    ]);
    }

    public function vesSchListById($id_sch){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/vesselScheduleById/'.$id_sch,[
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

    public function get_cust(){
        $client = new Client();
        $id_terminal = Session::get('terminal');

        $response = $client->get('http://127.0.0.1/mCustomer/'.$id_terminal,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function vessel_byId($id_ves){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/vesselById/'.$id_ves,[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function get_servicesByTarif($id_terminal){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/getServiceByTarif/'.$id_terminal,[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false
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

    public function add_ves_service(Request $request){
        $client = new Client();
        
        $data = [
                    'id_sch'    => $request->input('id_sch'),
                    'data_service'  => $request->input('data_service'),
                    'panjang_data'  => $request->input('panjang_data'),
                    'id_terminal'  => $request->input('id_terminal'),
                    'id_user'  => $request->input('id_user'),
                ];

        $response = $client->post('http://127.0.0.1/addVesselServiceByWeb',[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false,
                        'form_params'  => $data
        ]);

        return $response->getBody()->getContents();
    }

    public function send_ves_serv($id_sch){
        $client = new Client();
        
        $response = $client->put('http://127.0.0.1/sendReqVesselService/'.$id_sch,[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false,
        ]);

        return $response->getBody()->getContents();
    }

    public function get_vesselService($id_sch){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/getVesselServiceWeb/'.$id_sch,[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function count_vesselService($id_sch){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/countVesselServiceWeb/'.$id_sch,[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function back_ves_sch($id_sch){
        $data_services = json_decode($this->count_vesselService($id_sch));
        // echo $data_services->data;die;
        $view = new VesselScheduleController;

        return $view->index($data_services->data);
    }
}
