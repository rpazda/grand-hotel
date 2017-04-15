<?php

namespace App\Http\Controllers;

use View;
use App\User;
use App\Room;
use App\Reservation;
use App\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationsController extends Controller
{
    
	// create the view with the user's reservation data
	public function showReservations(){
		
		// get currently logged in user as a User object
		$user = Auth::user();

		// find all reservations under the user's username, sorts chronologically
		$reservation_data = Reservation::where('username', $user->username)
										->orderBy('reservationStartDate', 'asc')
										->get();		
		
		return view('pages.reservations')->with('reservation_data', $reservation_data);
	}

	public function reserveRoom(string $room_id, string $date){

		// generate a random number that is not an id in the reservations table
		$res_id = mt_rand(0, 100000);
		while (Reservation::find($res_id) != null){

			$res_id = mt_rand(0, 100000); 
		}
		
		// send all the data needed to make a reservation except for an id and today's date
		// username, reservation start, paid (false), and room id
		if(!Reservation::where('reservationStartDate', substr($date, 0, 10))->where('room',$room_id)->exists()){
			$new_reservation = Reservation::create([
					'id'                   => $res_id,
					'username'             => Auth::user()->username,
					'reservationStartDate' => substr($date, 0, 10),
					'paid'                 => 0,
					'dateReserved'         => Carbon::now(),
					'room'                 => $room_id
				]);

			$new_reservation->save();
		}
		$reservation_data = Reservation::where('username', Auth::user()->username)->get();
		
		return View::make('pages.reservations')->with('reservation_data', $reservation_data);
	}

	public function recommendRoom(string $room, string $date){
		$rec_id = mt_rand(0, 100000);
		while(Recommendation::find($rec_id) != null){
			$rec_id = mt_rand(0, 100000);
		}

		if(!Recommendation::where('username', Auth::user()->username)
							->where('room', $room)
							->exists()){
			$new_recommendation = Recommendation::create([
				'id'			=>	$rec_id,
				'user'			=> 	Auth::user()->username,
				'room' 			=> 	$room->room_id,
				'dateReserved'	=>	$date
			]);

			$new_recommendation->save();
		}

		$reservation_data = Reservation::where('username', Auth::user()->username)->get();
		
		return View::make('pages.reservations')->with('reservation_data', $reservation_data);
	}

	public function deleteReservation(string $res_id){
		if(Reservation::where('username', Auth::user()->username)->where('id', $res_id)->exists()){
			Reservation::where('username', Auth::user()->username)->where('id', $res_id)->delete();
		}

		$reservation_data = Reservation::where('username', Auth::user()->username)->get();
		
		return View::make('pages.reservations')->with('reservation_data', $reservation_data);
	}
}
