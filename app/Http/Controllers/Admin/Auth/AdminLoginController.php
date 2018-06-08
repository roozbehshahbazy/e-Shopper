<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{


	public function __construct()
	{
		$this->middleware('guest:admin', ['except' => 'logout']);

	}


    public function showLoginForm(){

    	return view('admin/auth/admin-login');
    }


    public function login(Request $request){

        	$this->validate($request,[

        		'username' => 'required',
        		'password' => 'required'
        	]);


        	if (Auth::guard('admin')->attempt(['username' => $request->username,'password' => $request->password],$request->remember)) {
        		
        		return redirect()->intended(route('admin.dashboard'));
        	}

        	return redirect()->back()->withInput($request->only('username','remember'));
        }


    protected function guard()
    {
        return Auth::guard('admin');
    }

    
    public function logout(Request $request)
        {

           $sessionKey = $this->guard()->getName();
           $this->guard()->logout();
           $request->session()->forget($sessionKey);
           return redirect()->route('admin.login');

        }  
}
