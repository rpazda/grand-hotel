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
        
	public function addFriend(string $friend){
	
             // create a new record in the friends table where friend is the 
	     // username of 'accept_user'
		$user = Auth::user();

		if($user->username == $friend){

			return $this->showFriendsInfo();
		}

		$rand_id = mt_rand(0, 100000);
		while(Friend::where('id', '=', $rand_id)->exists()){
		
			$rand_id = mt_rand(0, 100000);
		}
		$friend_request = new Friend();
		
		$friend_request->id          = $rand_id;
		$friend_request->accept_user = $friend;
		$friend_request->init_user   = $user->username;
		$friend_request->accepted    = 0;

		if(!Friend::where(['init_user' => $user->username, 'accept_user' => $friend])
			  ->orWhere(['init_user' => $friend, 'accept_user' => $user->username])->exists()){
			$friend_request->save();
		}

		return $this->showFriendsInfo();
	}

	public function searchUsers(string $searchString){


		$searchStringLower = strtolower($searchString);	//set lowercase to standardize

                // do not match the user's friends
		$matchingUsers = User::distinct()
			->where('firstName', 'like', $searchStringLower)
			->orWhere('lastName', 'like', $searchStringLower)
			->orWhere('username', '=', $searchStringLower)
			->get();

		return View::make('pages.userSearch')->with('matching_users', $matchingUsers);
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
