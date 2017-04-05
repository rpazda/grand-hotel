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

Route::get('/', function () {
    return view('pages/search');
});

Route::get('/login', function () {
    return view('pages/login');
});

Route::get('/search', function () {
    return view('pages/search');
});

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


