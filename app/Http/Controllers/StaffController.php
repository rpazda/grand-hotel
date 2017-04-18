<?php

namespace App\Http\Controllers;

use View; // required so that we can make a view
use App\Room; // uses the Room model. rooms db table can now be queried
use App\User; // uses the User model
use App\Reservation;
use App\Recommendation;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class StaffController extends Controller
{

    // Get all reservation data
	public function showAllReservations(){

        //prevent non-staff from accessing
        if(Auth::user()->staff == 1){
            
           $today = Carbon::today()->toDateString();

            // find all reservations under the user's username, sorts chronologically
            $reservation_data = Reservation::orderBy('reservationStartDate', 'asc')
                            ->get();		
            
            return view('pages.viewguestbookings')->with('reservation_data', $reservation_data);

        }
        else{
            return redirect('/home');
        }

        
	}

    public function checkin(){
        return view('pages.checkin');
    }

}