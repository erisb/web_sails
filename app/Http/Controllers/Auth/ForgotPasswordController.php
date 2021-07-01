<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Mail;
use App\Mail\demoEmail;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guard');
    // }

    public function showLinkRequestForm(){

        return view('auth.forgotpassword');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        
        $client = new Client();
        $data = [
                    'email'      => $request->input('email')
                ];
        
        $response = $client->post('http://127.0.0.1/cekEmail',[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false,
                    'json'  => $data
        ]);

        $data = json_decode($response->getBody()->getContents(),true);
        $nama = $data['name'];
        $id = $data['id_user'];
        // var_dump($data);die;
        if ($data['status'] == 'Success')
        {
        
            $demoDataEmail = new \stdClass();
            $demoDataEmail->nama = $nama;
            $demoDataEmail->id = $id;
            Mail::to($data['username'])->send(new demoEmail($demoDataEmail));

            return redirect('send_email_info')->with('email',$data['username']);
        }
        else
        {
            return redirect('show_forget')->with('Failed','Email wrong!!!');
        }
    }

    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
    }

    public function email_info(){
        return view('auth.forgotinfo');
    }

    public function show_reset($id_user){

        return view('auth.resetpassword',[
                        'id_user' => $id_user
                    ]);
    }

    public function reset_password(Request $request,$id_user)
    {
        $client = new Client();
        
        $data = [
                    'password' => $request->get('password')
                ];
 
        $response = $client->put('http://127.0.0.1/resetPass/'.$id_user,[
                    'headers' => ['X-CSRF-TOKEN' => csrf_token()],
                    'exceptions' => false,
                    'form_params' => $data
        ]);
        
        return $response->getBody()->getContents();
    }
}
