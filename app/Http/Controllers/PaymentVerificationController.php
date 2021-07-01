<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PaymentVerificationController extends Controller
{
    public function index(Request $request){
        $role = $request->session()->get('role');
        $bup = $request->session()->get('bup');
    	return view ('apps.paymentVerification.paymentVerification',[
                        'role' => $role,
                        'bup'  => !empty($bup) ? $bup : 0,
                    ]);
    }

    public function get_view_payment($id_pay){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/getViewPayment/'.$id_pay,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);

        return $response->getBody()->getContents();
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

    public function get_customer_byId($id_bup){
        $client = new Client();

        $response = $client->get('http://127.0.0.1/getBUPById/'.$id_bup,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }

    public function get_pay_veri(){
    	$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/getPayVerification/',[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false
		]);
    	
    	return $response->getBody()->getContents();
    }

    public function get_pay_veri_byRole($id_bup){
        $client = new Client();
        
        $response = $client->get('http://127.0.0.1/getPayVerificationByRole/'.$id_bup,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }

    public function app_pay($id_pay,$id_bup){
        $client = new Client();
        
        $response = $client->post('http://127.0.0.1/approvePay/'.$id_pay.'/'.$id_bup,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }

    public function rej_pay($id_pay){
        $client = new Client();
        
        $response = $client->post('http://127.0.0.1/rejectPay/'.$id_pay,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false
        ]);
        
        return $response->getBody()->getContents();
    }
}
