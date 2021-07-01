<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
// use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    public function index(){
    	return view ('landingpage.register.register');
    }

    public function add_BUP(Request $request){
    	$client = new Client();
    	$tipeUpload = $request->get('tipe_upload');
    	if ($tipeUpload == 1)
    	{
    		$panjang = count($request->get('filename'));
    	}

    	$data = [
					[
						'name'		=> 'bup_name',
						'contents'	=> $request->get('bup_name'),
					],
					[
						'name'		=> 'bup_address',
						'contents'	=> $request->get('bup_address'),
					],
					[
						'name'		=> 'bup_phone',
						'contents' 	=> $request->get('bup_phone'),
					],
					[
						'name'		=> 'bup_email',
						'contents'	=> $request->get('bup_email'),
					],
					[
						'name'		=> 'bup_npwp',
						'contents'	=> $request->get('bup_npwp'),
					],
					[
						'name'		=> 'bup_siup',
						'contents'	=> $request->get('bup_siup'),
					],
					[
						'name'		=> 'plan',
						'contents'	=> $request->get('plan'),
					],
					[
						'name'		=> 'username',
						'contents' 	=> $request->get('username'),
					],
					[
						'name'		=> 'password',
						'contents' 	=> $request->get('password')
					],
					[
						'name'		=> 'tipe_upload',
						'contents' 	=> $request->get('tipe_upload')
					],
					// [
					// 	'name'		=> 'user',
					// 	'contents' 	=> $request->session()->get('user')
					// ]
				];
		if ($tipeUpload == 1)
    	{
			for($i=0;$i<$panjang;$i++)
	    	{
	    		array_push($data,['name' => 'file'.$i,'contents' => $request->get('bup_name').'-'.$request->get('filename')[$i]]);
	    	}
	    }
 
		$response = $client->post('http://127.0.0.1/addBup',[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
					'multipart' => $data
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function upload_BUP(Request $request){
    	$client = new Client();

    	$panjang = count($request->file('file'));
    	$output = [];
    	for($i=0;$i<$panjang;$i++)
    	{
    		$output [] = [
    						'name'		=> "file".$i,
    						'contents'	=> fopen($request->file('file')[$i]->getPathName(),'r'),
    						'filename'	=> $request->get('bup_name').'-'.$request->file('file')[$i]->getClientOriginalName()
    					];
    	}

    	  	$response = $client->post('http://127.0.0.1/uploadBup',[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
					'multipart' => $output
		]);

    	return $response->getBody()->getContents();
    }

    public function edit_BUP(Request $request,$id_bup){
    	$client = new Client();
    	
    	// $panjang = count($request->get('filename'));
    	$data = [
			
					'bup_name'		=> $request->get('name'),
					'bup_address'	=> $request->get('address'),
					'bup_phone'		=> $request->get('phone'),
					'bup_email'		=> $request->get('email'),
					'bup_npwp'		=> $request->get('npwp'),
					'bup_siup'		=> $request->get('siup'),
					'plan'			=> $request->get('plan'),
					'username'		=> $request->get('username'),
					'password'		=> $request->get('password')
					// [
					// 	'name'		=> 'tipe_upload',
					// 	'contents' 	=> $request->get('tipe_upload')
					// ],
					// [
					// 	'name'		=> 'user',
					// 	'contents' 	=> $request->session()->get('user')
					// ]
				];

		// for($i=0;$i<$panjang;$i++)
  //   	{
  //   		array_push($data,['name' => 'file'.$i,'contents' => $request->get('bup_name').'-'.$request->get('filename')[$i]]);
  //   	}
 
		$response = $client->put('http://127.0.0.1/editBUP/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
					'form_params' => $data
		]);
    	
    	return $response->getBody()->getContents();
    }
}
