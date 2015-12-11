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
Route::get('/HMadmin/Main-Products','AdminConn\products@showMainProducts');
Route::get('/HMadmin/Product/{id}','AdminConn\products@showEditProduct');

//POST
Route::post('/HMadmin/loginauth','AdminConn\loginauth@validateLogin');
Route::post('/HMadmin/Store-Profile/Update','AdminConn\store@validateUpdate');
Route::post('/HMadmin/Products/addSub','AdminConn\products@addsubcat');
Route::post('/HMadmin/Products/addBrand','AdminConn\products@addBrand');
Route::post('/HMadmin/Products/addProduct','AdminConn\products@addProduct');
Route::post('/HMadmin/Products/addVariant','AdminConn\products@addVariant');
Route::post('/HMadmin/Products/viewChild','AdminConn\products@viewChild');
Route::post('/HMadmin/Products/getProducts','AdminConn\products@getProducNames');
Route::post('/HMadmin/responsedec','AdminConn\decrypter@decrypt');
Route::post('/HMadmin/Products/reload-products','AdminConn\products@getAllParentProduct');
Route::post('/HMadmin/Products/Edit-Product/{id}','AdminConn\products@updateParent');
Route::post('/HMadmin/Products/viewSubCat','AdminConn\products@getSubCategory');
Route::post('/HMadmin/Products/showSelectedVariant','AdminConn\products@getSelectedVariant');
//""















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
Route::get('/Market', 'MarketController@showMarket');
Route::get('/market', function () {
    return redirect('/Market');
});

Route::get('/Cart', 'CartController@showCart');
Route::get('/Checkout', 'CheckoutController@showCheckout');

Route::get('/home', function () {
    return redirect('market');
});

Route::get('/{id}', 'MarketController@showMarketPage'); //views
Route::get('/{id}/Stores/{id2}', 'MarketController@showMarketStores'); //views
Route::get('/{id}/Product/{id2}', 'MarketController@showMarketProducts'); //views
Route::get('/{id}/Category/All', 'MarketController@showMarketCategory'); //views
Route::get('/{id}/Category/{id2}/{id3}', 'MarketController@showMarketCategoryProduct'); //views
Route::get('/Market/Get-Featured-Products', 'MarketController@showFeaturedProducts'); //views

///// product details routes
Route::get('/Product/Details/{id}/{id2}', 'ProductDetailsController@showProductDetails'); //views

Route::post('/details/get-product-variant-combo', 'ProductDetailsController@getProductVariantCombo'); //views
Route::post('/details/get-product-variant-combo-select', 'ProductDetailsController@getProductVariantComboSelect'); //views
Route::post('/details/get-product-variant-combo-select-img', 'ProductDetailsController@getProductVariantComboSelectImg'); //views

Route::get('/My-Account/{id}', 'CustomerAccountController@showAccount'); //views
Route::get('/My-Account/{id}/{id2}', 'CustomerAccountController@showCustomerAccount'); //views


///// store routes
Route::get('/Store/{id}', 'StoreController@showStore'); //views


///// cart controller ////
Route::get('/cart/getcart', 'CartController@getCart'); 
Route::post('/cart/addcart', 'CartController@addCart'); 
Route::post('/cart/removecart', 'CartController@removeCart'); 
Route::get('/cart/getitemcount', 'CartController@getItemCartCount'); 
