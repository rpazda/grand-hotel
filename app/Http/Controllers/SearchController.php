<?php

namespace App\Http\Controllers;

use View; // required so that we can make a view
use App\Room; // uses the Room model. rooms db table can now be queried
use App\User; // uses the User model
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class SearchController extends Controller
{
     public function showWelcome()
     {
	$rooms = Room::where(['occupied' => 0])->get();
        
	// Other queries
	// select * from rooms where occupied = 0;
	// $rooms = Room::where('occupied', '=', 0)->get();
	//
	// select room_id, room_type from rooms where occupied = 0;
	// $rooms = Room::where('occupied', '=', 0)->pluck('room_id', 'room_type')->get();
	//
        // find by primary key
	// $room = Room::find(101);
	//
	// update rooms set occupied = 0 where room_id = 101;
	// $room = Room::find(101); $room->occupied = 0; $room->save();	

	// creates the view and ties the data to it under the name 'rooms'
        return View::make('pages.search')->with('rooms', $rooms)->with('sel_date', Carbon::now()); 
     }

     public function showRoomsAvailable(string $sel_date){

	     $rooms = DB::select('select * from rooms where room_id not in (select room from reservations where reservationStartDate = ?)', [$sel_date]); 
	     // query that collects all rooms not reserved on this date
	     //$rooms = Room::select('*')->groupBy('room_id')->join('reservations', function($join){ $join->on('rooms.room_id', '!=', 'reservations.room');})
	     //	     ->where(['reservations.reservationStartDate' => $sel_date])
	     //	     ->where('rooms.room_id', '!=', 'reservations.room')
	     //	     ->get();

	     return View::make('pages.search')->with('rooms', $rooms)->with('sel_date', $sel_date);
     }

     public function showRoomInfo(string $room_id){
    
     	$room = Room::find((int)$room_id);
	return View::make('pages.room_details')->with('room', $room);	
     }     
}
