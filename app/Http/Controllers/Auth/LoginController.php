<?php

namespace App\Http\Controllers\Auth;

use View;
use Auth;
use Request;
use App\User;
use App\users_table;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $username   = 'username';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function authenticate(){

	$request = Request::only('username','password');
       

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            
            return redirect('/home');
        }
        else {
            
            return redirect()->back();
        }
    }


    public function requestInfo(){

	return view('auth.login');
    }

    public function logout(){

        Auth::logout();

        return redirect('/');
    }
}
