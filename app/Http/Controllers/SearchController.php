<?php 

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showWelcome()
    {
        return View::make('login'); 
    }
}