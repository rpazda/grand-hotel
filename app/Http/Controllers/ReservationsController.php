<?php

namespace App\Http\Controllers;

use View;
use App\User;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    
	// create the view with the user's reservation data
        public function showReservations(){
		
		// get currently logged in user as a User object
		$user = Auth::user();

		// find all reservations under the user's username
		$reservation_data = Reservation::where('username', $user->username)->get();		
		
		return view('pages.reservations')->with('reservation_data', $reservation_data);
	}
}
