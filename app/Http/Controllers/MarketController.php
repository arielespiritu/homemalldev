<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use App\User;
class MarketController extends Controller {

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
	public function showMarket()
	{
		if (Auth::check())
		{
			$id = Auth::user()->login_id;
			$user = User::where('id', $id )->with('member')->get();
			return view('client.pages.market')->with('user',$user);
		}else{
			return view('client.pages.market');
		}
	}
	public function redirectToMarket()
	{
		$email = Auth::user()->email;
		return view('client.pages.market')->with('email',$email);
	}
	public function showMarketPage($market)
	{
		if($market=="grocery"||$market=="apparel"||$market=="gadget"||$market=="furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-page')->with('user',$user)->with('market',$market);
			}else{
				return view('client.pages.market-page')->with('market',$market);
			}
		}
	}
	public function showMarketStores($market,$type)
	{
		if($market=="grocery"||$market=="apparel"||$market=="gadget"||$market=="furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				if($type=="all"){
					return view('client.pages.market-stores')->with('user',$user)->with('market',$market)->with('type',$type);
				}else if($type=="new"){
					return view('client.pages.market-stores')->with('user',$user)->with('market',$market)->with('type',$type);
				}else if($type=="most-visited"){
					return view('client.pages.market-stores')->with('user',$user)->with('market',$market)->with('type',$type);
				}else if($type=="online"){
					return view('client.pages.market-stores')->with('user',$user)->with('market',$market)->with('type',$type);
				}
			}else{
				if($type=="all"){
					return view('client.pages.market-stores')->with('market',$market)->with('type',$type);
				}else if($type=="new"){
					return view('client.pages.market-stores')->with('market',$market)->with('type',$type);
				}else if($type=="most-visited"){
					return view('client.pages.market-stores')->with('market',$market)->with('type',$type);
				}else if($type=="online"){
					return view('client.pages.market-stores')->with('market',$market)->with('type',$type);
				}
			}
		}
	}
	public function showMarketCategory($market)
	{
		if($market=="grocery"||$market=="apparel"||$market=="gadget"||$market=="furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-category')->with('user',$user)->with('market',$market);
			}else{
				return view('client.pages.market-category')->with('market',$market);
			}
		}
	}
}
