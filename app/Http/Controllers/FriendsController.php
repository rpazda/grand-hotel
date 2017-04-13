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
		$matchingUsers = User::where(['firstName' => $searchStringLower])
				->orWhere(['lastName' => $searchStringLower])
				->get();

		return $matchingUsers;
	}

	public function removeFriend(string $loser){

		$user = Auth::user();
    		//not sure how to get the username of the specific user request from the page
		$rejected = Friend::where(['init_user' => $loser , 'accept_user' => $user->username])
			->orWhere(['init_user' => $user->username, 'accept_user' => $loser])
			->first();

		if($rejected != null){
			
			$rejected->delete();
		}

		return $this->showFriendsInfo();
	}

	public function confirmFriend(string $friend){
		$user = Auth::user();
		//not sure how to get the username of the specific user request from the page
		$accepted = Friend::where(['accepted' => 0, 'init_user' => $friend , 'accept_user' => $user->username])->first();
		
		if($accepted != null){
			
			$accepted->update(['accepted' => 1]);
		}

        	return $this->showFriendsInfo();
	}

	public function rejectFriend(string $loser){

		$user = Auth::user();
		//not sure how to get the username of the specific user request from the page
		$rejected = Friend::where(['accepted' => 0, 'init_user' => $loser , 'accept_user' => $user->username])->first();
		
		if($rejected != null){
			
			$rejected->delete();
		}

		return $this->showFriendsInfo();
    }
}
