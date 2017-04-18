<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use App\User;
use View;
use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use App\Http\Requests\UpdateAccountInfoRequest;

class AccountController extends Controller{ 

	use ValidatesRequests;
	
	public function showAccountInfo(){
		
		$user = Auth::user();

		return View::make('pages.account')->with('user', $user);
	}

	public function modifyAccountInfo(Request $account_form){

		$user = Auth::user();
                
		if($account_form->input('password') == 'password1A'){
		
			$password = null;
		}

		// two parts: need to validate input from the account form;
		// and need to select supplied data from the form to save it
		// to the user's database record
                // validation example:
                 $this->validate($account_form,
                [
                  	'firstName' => 'max:12',
            		'lastName'  => 'max:24',
			'email'     => 'email',
            		'password'  => ['min:7', 'confirmed', 'regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d).+$/']
		]);

		$user->firstName = $account_form->input('firstName');
		$user->lastName = $account_form->input('lastName');
		$user->email = $account_form->input('email');

		if($password != null){
			$user->password = bcrypt($account_form->input('password'));
		}
		
		$user->save();

		return View::make('pages.account')->with('user', $user);
	}
        
}
