<?php

namespace App\Http\Controllers;

use View;
use App\User;
use App\Room;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

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

	public function reserveRoom(string $username, string $room_id, string $date){

		// send all the data needed to make a reservation except for an id and today's date
		// username, reservation start, paid (false), and room id
		// 'reservation/{username}?start={start}&paid={paid}&room={room}'
		$new_reservation = Reservation::create([
					'id'                   => $res_id,
					'username'             => $username,
					'reservationStartDate' => $date,
					'paid'                 => 0,
					'dateReserved'         => new DateTime(),
					'room'                 => $room_id
				]);

		$new_reservation->save();
		
		$reservation_data = Reservation::where('username', $username)->get();
		
		return View::make('pages.reservations')->with('reservation_data', $reservation_data);
	}
}
