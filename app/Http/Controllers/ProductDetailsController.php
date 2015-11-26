<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use App\User;
use App\Market;
class ProductDetailsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function showProductDetails($product_name)
	{
	$market_data = Market::with('category')->get();
		if (Auth::check())
		{
			$id = Auth::user()->login_id;
			$user = User::where('id', $id )->with('member')->get();
			return view('client.pages.product-details')->with('user',$user)->with('market_data',$market_data)->with('product_name',$product_name);
		}else{
			return view('client.pages.product-details')->with('market_data',$market_data)->with('product_name',$product_name);
		}
	}
	
}
