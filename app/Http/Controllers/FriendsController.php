<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\User;
use App\Friend;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function showFriendsInfo(){

	$user    = Auth::user();
	$friends = Friend::where(['accepted'  => 1, 'accept_user' => $user->username])
			->orWhere(['accepted' => 1, 'init_user'   => $user->username])
			->get();

	$pending_friends = Friend::where(['accepted' => 0, 'accept_user' => $user->username])
				->get();

	return View::make('pages.friends')->with('friends', $friends)
				          ->with('pending_friends', $pending_friends)
					  ->with('user', $user);
    }

    public function removeFriend(Request $remove_request){

	//
    }

    public function confirmFriend(Request $confirm_request){

        //
    }
}
