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
//GET
Route::get('/HMadmin','AdminConn\admincontroller@showDashboard');
Route::get('/HMadmin/login','AdminConn\loginauth@showLogin');
Route::get('/HMadmin/logout','AdminConn\loginauth@getlogOut');

Route::get('/HMadmin/Store-Banner','AdminConn\store@showStoreBanner');

Route::get('/HMadmin/Store-Users', function () {
    return view('admin.store.storeuser');
});
Route::get('/HMadmin/Store-Profile','AdminConn\admincontroller@showStoreProfile');
Route::get('/HMadmin/Products','AdminConn\products@showProducts');

//POST
Route::post('/HMadmin/loginauth','AdminConn\loginauth@validateLogin');
Route::post('/HMadmin/Store-Profile/Update','AdminConn\store@validateUpdate');
Route::post('/HMadmin/Products/addSub','AdminConn\products@addsubcat');
//

///////////////////////// Do not modify i will kill you /////////////////



// Authentication routes...
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');


// controllers
Route::get('/', function () {
    return view('seria.index');
});

//market
Route::get('/market', 'MarketController@showMarket');
Route::get('/home', function () {
    return redirect('market');
});

Route::get('/market/{id}', 'MarketController@showMarketPage'); //views
Route::get('/market/{id}/stores/{id2}', 'MarketController@showMarketStores'); //views
Route::get('/market/{id}/product/{id2}', 'MarketController@showMarketProducts'); //views
Route::get('/market/{id}/category/all', 'MarketController@showMarketCategory'); //views
Route::get('/market/{id}/category/product/{id2}', 'MarketController@showMarketCategoryProduct'); //views



