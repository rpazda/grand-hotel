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

	public function searchUsers(string $searchString){


		$searchStringLower = strtolower($searchString);	//set lowercase to standardize

		//look for matching first or last name
		$matchingUsers = User::where(['firstName' => strtolower($searchStringLower)])
								->orWhere(['lastName' => strtolower($searchStringLower)])
								->get();

		return $matchingUsers;
	}

    public function removeFriend(Request $remove_request){

		$user = Auth::user();
		//not sure how to get the username of the specific user request from the page
		$rejected = Friend::where(['accepted' => 1, 'init_user' => $remove_request->deleteFriend->username , 'accept_user' => $user->username])
							->orWhere(['accepted' => 1, 'init_user' => $user->username, 'accept_user' =>  $remove_request->deleteFriend->username ])
							->delete();

		return $this->showFriendsInfo();
    }

    public function confirmFriend(Request $confirm_request){
		$user = Auth::user();
		//not sure how to get the username of the specific user request from the page
		$accepted = Friend::where(['accepted' => 0, 'init_user' => $confirm_request->username , 'accept_user' => $user->username])->update(['accepted' => 1]);

        return $this->showFriendsInfo();
    }

	public function rejectFriend(Request $remove_request){

		$user = Auth::user();
		//not sure how to get the username of the specific user request from the page
		$rejected = Friend::where(['accepted' => 0, 'init_user' => $confirm_request->username , 'accept_user' => $user->username])->delete();

		return $this->showFriendsInfo();
    }
}
