<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginPortalController extends Controller
{
   
   	use AuthenticatesUsers;

   	protected $redirectTo = 'accountSetting';

   	public function __construct()
    {
        $this->middleware('guest')->except('logout');
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

        if ($request->input('username') != '' && $request->input('password') != '')
        {
	        $client = new Client();
	    	$data = [
						'username'		=> $request->input('username'),
						'password'		=> $request->input('password')
					];
	    	
			$response = $client->post('http://127.0.0.1/doLogin',[
						'headers' => ['X-CSRF-TOKEN' => csrf_token()],
						'exceptions' => false,
						'json'	=> $data
			]);
		
			$data = json_decode($response->getBody()->getContents(),true);
			
			if ($data['status'] == 'Success')
			{
				$request->session()->put('user',$data['username']);
				$request->session()->put('lolos',true);
				$request->session()->put('role',$data['id_role']);
				$request->session()->put('bup',$data['id_bup']);
				$request->session()->put('user',$data['id_user']);
				$request->session()->put('name',$data['name']);
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

	protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

	public function username()
    {
        return 'username';
    }

	public function logout(Request $request)
	{
	    $request->session()->flush();
	    $request->session()->regenerate();
	    return redirect('login');
	}

	// public function showForgot()
	// {
	// 	return view('landingpage.forgotpassword.forgotpassword');
	// }
}
