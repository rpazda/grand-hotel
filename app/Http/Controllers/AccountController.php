<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;
//use Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller{ 
 
	public function showAccountInfo(){
		
		$user = Auth::user();

		return View::make('pages.account')->with('user', $user);
	}

	public function modifyAccountInfo(Request $account_form){

		$user = Auth::user();

		$lastName = $account_form->input('lastName');
		$email = $account_form->input('email');
		if($account_form->input('password')){
		}

		// two parts: need to validate input from the account form;
		// and need to select supplied data from the form to save it
		// to the user's database record
                // validation example:
                // protected function validator(array $data)
                //{
                // 	return Validator::make($data, [
                //  	'firstName' => 'required|max:12',
            	//	'lastName'  => 'required|max:24',
		//	'email'     => 'required|email'
            	//	'password'  => 'min:7|confirmed', // |regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d).+$/
                //        ]);
                //}
		// how to link this with the view? return view(...)->withErrors(...)?
		// 

		$user->firstName = $firstName;
		$user->lastName = $lastName;
		$user->email = $email;
		if($account_form->input('password')){
			$user->password = bcrypt($password);
		}
		
		$user->save();

		return View::make('pages.account')->with('user', $user);
	}
        
}
