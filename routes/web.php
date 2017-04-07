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

Route::get('password.email', function(){ return view('auth.passwords.email'); });

Route::get('/home', 'HomeController@index');

Route::get('search', 'SearchController@showWelcome');

Route::get('/friends', function () {
    return view('pages/friends');
});

Route::get('/account', function () {
    return view('pages/account');
});

Route::get('/reservations', function () {
    return view('pages/reservations');
});

Route::get('/staff', function () {
    return view('pages/staff');
});
