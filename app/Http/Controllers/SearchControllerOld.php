<?php 

namespace App\Http\Controllers;

use App\Room;
use App\User;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showWelcome()
    {
	$rooms = Room::where('occupied', 0)->get(); // make unoccupied rooms available for display
        return View::make('login'); 
    }
}
