<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/HMadmin', function () {
    return view('admin.main');
});

Route::get('/HMadmin/login','AdminConn\loginauth@showLogin');
Route::post('/HMadmin/loginauth','AdminConn\loginauth@validateLogin');

Route::get('/HMadmin/Store-Profile', function () {
    return view('admin.store.profile');
});

Route::get('/HMadmin/Store-Users', function () {
    return view('admin.store.storeuser');
});

Route::get('/HMadmin/Products', function () {
    return view('admin.products.products');
});




///////////////////////// Do not modify i will kill you /////////////////

Route::get('/', function () {
    return view('client.comingsoon');
});
Route::get('/home', function () {
    return view('client.home');
});




