<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AccountSettingController extends Controller
{
    public function index(Request $request){
        $role = $request->session()->get('role');
        $bup = $request->session()->get('bup');
    	return view ('apps.accountSetting.customer_premise',[
                        'role' => $role,
                        'bup'  => !empty($bup) ? $bup : 0
                    ]);
    }

    public function get_customer(){
    	$client = new Client();

		$response = $client->get('http://127.0.0.1/getBup',[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function get_customer_byRole($id_bup){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/getBUPByRole/'.$id_bup,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }

    public function get_customer_byId($id_bup){
    	$client = new Client();

		$response = $client->get('http://127.0.0.1/getBUPById/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function get_download($file){
    	$client = new Client();

		$response = $client->get('http://127.0.0.1/getFileBup',[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
					'query' => ['file' => $file]
		]);
    	
    	return $response;
    }

    public function approve_account($id){
    	$client = new Client();

		$response = $client->put('http://127.0.0.1/appAccount/'.$id,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
		]);

		return $response;
    }

    public function reject_account($id){
    	$client = new Client();

		$response = $client->put('http://127.0.0.1/rejAccount/'.$id,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
		]);

		return $response;
    }

    public function setting_site($id_bup){
    	$data_site = json_decode($this->get_site_byId($id_bup));
    	// var_dump($data->data);die;
    	return view ('apps.accountSetting.createSite',['id_bup' => $id_bup, 'data_site' => $data_site->data]);
    }

    public function get_site(){
    	$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/getSite',[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function get_site_byId($id_bup){
    	$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/getSiteById/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function add_site(Request $request){
    	$client = new Client();
    	$data = [
					'id_bup'		=> $request->input('id_bup'),
					'nama_terminal'	=> $request->input('nama_site'),
					'username'		=> $request->input('username'),
					'password'		=> $request->input('password'),
                    'user'          => $request->session()->get('user')
				];
    	
		$response = $client->post('http://127.0.0.1/addSite',[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
					'form_params'	=> $data
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function edit_site(Request $request,$id){
    	$client = new Client();
    	$data = [
					// 'id_bup'		=> $request->input('id_bup'),
					'nama_terminal'	=> $request->input('nama_site'),
					'username'		=> $request->input('username'),
					'password'		=> $request->input('password'),
                    'user'          => $request->session()->get('user')
				];
    	
		$response = $client->put('http://127.0.0.1/editSite/'.$id,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
					'form_params'	=> $data
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function delete_site($id){
    	$client = new Client();
    	
		$response = $client->delete('http://127.0.0.1/deleteSite/'.$id,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function billing($id_bup){
        $client = new Client();
        
        $response = $client->post('http://127.0.0.1/updateBillUnpaid/'.$id_bup,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

    	$data_bup = json_decode($this->get_customer_byId($id_bup));
    	$data_paymentH = json_decode($this->get_paymentH_byId($id_bup));
    	$data_log_paymentH = json_decode($this->get_log_paymentH_byId($id_bup));
    	$data_paymentD = json_decode($this->get_paymentD_byId($id_bup));
    	$data_site_aktif = json_decode($this->get_site_byStatus($id_bup));
    	$data_site_unpaid = json_decode($this->get_site_unpaid($id_bup));
    	$jumlah_site = json_decode($this->count_site($id_bup));
        $last_pay = json_decode($this->get_log_paymentH_byId($id_bup));
        // var_dump($last_pay->data);die;
    	return view ('apps.accountSetting.billing',
					[
						'data_bup' => $data_bup[0],
						'data_paymentH' => $data_paymentH,
						'data_log_paymentH'	=> $data_log_paymentH->data,
						'data_paymentD'	=> $data_paymentD->data,
						'data_site_aktif'	=> $data_site_aktif->data,
						'data_site_unpaid'	=> $data_site_unpaid->data,
						'jumlah_site' => $jumlah_site->data,
                        'last_pay'  => ($last_pay->data != null) ? $last_pay->data[0] : ''
					]);
    }

    public function get_paymentH_byId($id_bup){
    	$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/getPaymentHById/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function get_paymentD_byId($id_bup){
    	$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/getPaymentDById/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function get_log_paymentH_byId($id_bup){
    	$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/getLogPaymentHById/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function get_site_byStatus($id_bup){
    	$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/getSiteByStatus/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function count_site($id_bup){
    	$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/countSite/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function get_site_unpaid($id_bup){
    	$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/getSiteUnpaid/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function pay_billing(Request $request,$id_bup){
    	$client = new Client();
    	$data = [
					'total_pay'		=> $request->input('total_pay')
				];
    	
		$response = $client->put('http://127.0.0.1/payBilling/'.$id_bup,[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
					'form_params'	=> $data
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function patch(Request $request){
        
        $role = $request->session()->get('role');
        $bup = $request->session()->get('bup');
        return view ('apps.accountSetting.patchList',[
                        'role' => $role,
                        'bup'  => !empty($bup) ? $bup : 0
                    ]);
    }

    public function get_patch(){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/getPatch',[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }

    public function upload_patch(Request $request){
        $client = new Client();
        if (!empty($request->file('file')))
        {
            $panjang = count($request->file('file'));
            $output = [];
            for($i=0;$i<$panjang;$i++)
            {
                $output [] = [
                                'name'      => "file".$i,
                                'contents'  => fopen($request->file('file')[$i]->getPathName(),'r'),
                                'filename'  => $request->file('file')[$i]->getClientOriginalName()
                            ];
            }

            $response = $client->post('http://127.0.0.1/uploadPatch',[
                        'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                        'exceptions' => false,
                        'multipart' => $output
            ]);
            $return = $response->getBody()->getContents();
        }
        else
        {
            $return = json_encode(['status' => 'Success','data' => 'Kosong']);
        }
        return $return;
    }

    public function get_download_patch($file){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/getFilePatch',[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false,
                    'query' => ['file' => $file]
        ]);
        
        return $response;
    }

    public function add_patch(Request $request){
        $client = new Client();

        $data = [
                    [
                        'name'      => 'version',
                        'contents'  => $request->get('version'),
                    ],
                    [
                        'name'      => 'date_release',
                        'contents'  => date('Y-m-d',strtotime($request->get('date_release'))),
                    ],
                    [
                        'name'      => 'file_patch',
                        'contents'  => $request->get('file_patch'),
                    ],
                    [
                        'name'      => 'file_notes',
                        'contents'  => $request->get('file_notes'),
                    ],
                    [
                        'name'      => 'user',
                        'contents'  => $request->session()->get('user'),
                    ],
                ];
 
        $response = $client->post('http://127.0.0.1/addPatch',[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false,
                    'multipart' => $data
        ]);
        
        return $response->getBody()->getContents();
    }

    public function edit_patch(Request $request,$id_patch){
        $client = new Client();

        $data = [
                    'version'       => $request->get('version'),
                    'date_release'  => date('Y-m-d',strtotime($request->get('date_release'))),
                    'file_patch'    => $request->get('file_patch'),
                    'file_notes'    => $request->get('file_notes'),
                    'user'          => $request->session()->get('user'),
                ];
        // var_dump($data);die;

        $response = $client->put('http://127.0.0.1/editPatch/'.$id_patch,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false,
                    'form_params' => $data
        ]);
        
        return $response->getBody()->getContents();
    }

    public function delete_patch($id_patch){
        $client = new Client();

        $response = $client->delete('http://127.0.0.1/deletePatch/'.$id_patch,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }
}
