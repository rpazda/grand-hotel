<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/* most routes should call controller methods! */

// a route defines behavior in response to a url. This route
// calls SearchController's showWelcome method when the user
// GETs http://localhost:8000/
Route::get('/', 'SearchController@showWelcome');

//Auth::routes();

Route::get('login', 'Auth\LoginController@requestInfo');
Route::post('login', 'Auth\LoginController@authenticate');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('register', 'Auth\RegisterController@requestInfo');
Route::post('register', 'Auth\RegisterController@register');

Route::post('updateAccount', 'AccountController@modifyAccountInfo');

Route::get('emailPassword', function(){ return view('auth.passwords.email'); });

Route::get('/home', 'SearchController@showWelcome');

Route::get('search', 'SearchController@showWelcome');
Route::get('search/{room_id}', 'SearchController@showRoomInfo');
	
Route::group(['middleware' => 'auth'], function(){
	Route::get('/friends', 'FriendsController@showFriendsInfo');

	Route::get('/account', 'AccountController@showAccountInfo');
	Route::post('/account', 'AccountController@modifyAccountInfo');

	Route::get('reservations/reserve/room={roomm_id}&date={date}', 'ReservationsController@reserveRoom');
	Route::get('/reservations', 'ReservationsController@showReservations');
	
	Route::get('/staff', function () {
	    return view('pages/staff');
	});
});
