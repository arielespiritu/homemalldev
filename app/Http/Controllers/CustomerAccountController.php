<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use App\User;
use App\Market;
use App\City;
class CustomerAccountController extends Controller {

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
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	public function showAccount($type)
	{
		    $id = Auth::user()->login_id;
			$market_data = Market::with('category')->get();
			$city = City::with('area')->get();
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				foreach($user as $user){
					return redirect('/My-Account/'.str_replace('-',' ',$user->member->fname).'/'.$type);	
				}
			}else{
				return redirect('/Market');
			}
	
	}
	public function showCustomerAccount($id,$type)
	{
		//if($type=="Info"||$type=="Favorites"||$type=="Wishlist"){
			$market_data = Market::with('category')->get();
			$city = City::with('area')->get();
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.account-page')->with('user',$user)->with('market_data',$market_data)->with('city',$city)->with('type',$type);
			}else{
				return redirect('/Market');
			}
	}

	
}
