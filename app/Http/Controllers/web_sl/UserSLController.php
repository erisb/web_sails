<?php

namespace App\Http\Controllers\web_sl;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use App\Http\Controllers\web_sl\VesselScheduleController;

class UserSLController extends Controller
{
    public function index(){
        $id_user = Session::get('user');
        $data_user = json_decode($this->get_user_sl($id_user));

    	return view ('web_sl.UserList.User_sl',[
                            'id_user'   => $id_user,
                            'data_user' => $data_user,
                    ]);
    }

    public function get_user_sl($id_user){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/getUserSL/'.$id_user,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
    }

    public function edit_user(Request $request,$id_user){
        $client = new Client();

        $data = [
                    'USERNAME' => $request->input('username'),
                    'FULLNAME' => $request->input('fullname'),
                    'PASSWORD' => $request->input('password'),
                ];
        
        $response = $client->put('http://127.0.0.1/editUserSL/'.$id_user,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false,
                    'form_params'  => $data
        ]);

        return $response->getBody()->getContents();
    }
}
