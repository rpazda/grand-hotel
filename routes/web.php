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

Route::get('/home', 'SearchController@showWelcome');

Route::get('login', 'Auth\LoginController@requestInfo');
Route::post('login', 'Auth\LoginController@authenticate');

Route::post('logout', 'Auth\LoginController@logout');

Route::get('register', 'Auth\RegisterController@requestInfo');
Route::post('register', 'Auth\RegisterController@register');

Route::post('updateAccount', 'AccountController@modifyAccountInfo');

Route::get('emailPassword', function(){ return view('auth.passwords.email'); });

Route::get('getUsers', 'FriendsController@SearchUsers');

Route::get('search', 'SearchController@showWelcome');
Route::get('search/room/{room_id}', 'SearchController@showRoomInfo');
Route::get('search/date/{date}', 'SearchController@showRoomsAvailable');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/friends', 'FriendsController@showFriendsInfo');
	Route::get('/friends/remove/{loser}', 'FriendsController@removeFriend');
	Route::get('/friends/reject/{loser}', 'FriendsController@rejectFriend');
	Route::get('/friends/confirm/{friend}', 'FriendsController@confirmFriend');
	Route::get('/friends/add/{friend}', 'FriendsController@addFriend');
	Route::get('/friends/query/{user}', 'FriendsController@searchUsers');	

	Route::get('/account', 'AccountController@showAccountInfo');
	Route::post('/account', 'AccountController@modifyAccountInfo');

	Route::get('reservations/reserve/room={roomm_id}&date={date}', 'ReservationsController@reserveRoom');
	Route::get('/reservations', 'ReservationsController@showReservations');
	
	Route::get('/reservations/recommendRoom/room={room_id}&date={date}', 'ReservationsController@recommendRoom');

	Route::get('/reservations/deleteReservation/res_id={res_id}', 'ReservationsController@deleteReservation');
	
	Route::get('/staff', function () {
	    return view('pages/staff');
	});
});
