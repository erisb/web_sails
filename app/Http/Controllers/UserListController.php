<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserListController extends Controller
{
    public function index(){
    	return view ('apps.userList.User');
    }

    public function get_user(){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/getUserPortal',[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }

    public function get_userByRole($id_bup){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/getUserPortalByRole/'.$id_bup,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }

    public function add_user(Request $request){
        $client = new Client();
        $data = [
                    'fullname'     => $request->input('fullname'),
                    'username'     => $request->input('username'),
                    'password'     => $request->input('password'),
                ];

        $response = $client->post('http://127.0.0.1/addUserPortal',[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false,
                    'form_params'   => $data      
        ]);
        
        return $response->getBody()->getContents();
    }

    public function edit_user(Request $request,$id){
        $client = new Client();
        $data = [
                    'fullname'     => $request->input('fullname'),
                    'username'     => $request->input('username'),
                    'password'     => $request->input('password'),
                ];

        $response = $client->put('http://127.0.0.1/editUserPortal/'.$id,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false,
                    'form_params'   => $data
        ]);
        
        return $response->getBody()->getContents();
    }

    // public function show_user($id){
    //     $client = new Client();

    //     $response = $client->get('http://127.0.0.1/showUserPortal/'.$id,[
    //                 'headers' => ['X-CSRF-TOKEN' => csrf_token()],
    //                 'exceptions' => false
    //     ]);
        
    //     return $response->getBody()->getContents();
    // }

    public function delete_user($id){
        $client = new Client();

        $response = $client->delete('http://127.0.0.1/deleteUserPortal/'.$id,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }
}
