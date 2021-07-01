<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginSLController extends Controller
{
   
   	use AuthenticatesUsers;

   	protected $redirectTo = 'web_sl/vesSchedule';

   	public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login(){
    	$terminal = json_decode($this->get_terminal());

    	return view('auth.login_sl',[
    					'terminal'	=> $terminal->data
    				]);
    }

	public function doLogin(Request $request)
	{
		$this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($request->input('username') != '' && $request->input('password') != '' && $request->input('terminal') != '')
        {
	        $client = new Client();
	    	$data = [
						'username'		=> $request->input('username'),
						'password'		=> $request->input('password'),
						'terminal'		=> $request->input('terminal')
					];
	    	
			$response = $client->post('http://127.0.0.1/loginDesktop',[
						'headers' => ['X-CSRF-TOKEN' => csrf_token()],
						'exceptions' => false,
						'json'	=> $data
			]);
		
			$data = json_decode($response->getBody()->getContents(),true);
			$data_user = $data['id_user'];
			// var_dump($data_user);die;
			
			if ($data['status'] == 'Success')
			{
				$request->session()->put('user',$data_user['ID_USER']);
				$request->session()->put('lolos',true);
				$request->session()->put('terminal',$data_user['ID_TERMINAL']);
				$request->session()->put('name',$data_user['FULLNAME']);
				$request->session()->put('customer',$data_user['ID_CUSTOMER']);
			}
			else
			{
				$this->incrementLoginAttempts($request);

        		return $this->sendFailedLoginResponse($request);
			}
			
			return $this->sendLoginResponse($request);
		}

        // if ($this->attemptLogin($request)) {
        	
        //     return $this->sendLoginResponse($request);
        // }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
		
	}

	protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'terminal' => 'required|string'
        ]);
    }

	protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password','terminal');
    }

	public function username()
    {
        return 'username';
    }

	public function logout(Request $request)
	{
	    $request->session()->flush();
	    $request->session()->regenerate();
	    return redirect('web_sl');
	}

	public function get_terminal(){
		$client = new Client();
    	
		$response = $client->get('http://127.0.0.1/getTerminal',[
					'headers' => ['X-CSRF-TOKEN' => csrf_token()],
					'exceptions' => false,
		]);
	
		return $response->getBody()->getContents();
	}
}
