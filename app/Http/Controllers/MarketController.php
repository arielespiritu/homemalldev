<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use App\User;
use App\Market;
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
	$market_data = Market::with('category')->get();
		if (Auth::check())
		{
			$id = Auth::user()->login_id;
			$user = User::where('id', $id )->with('member')->get();
			return view('client.pages.market')->with('user',$user)->with('market_data',$market_data);
		}else{
			return view('client.pages.market')->with('market_data',$market_data);
		}
	}
	public function redirectToMarket()
	{
	$market_data = Market::with('category')->get();
		$email = Auth::user()->email;
		return view('client.pages.market')->with('email',$email)->with('market_data',$market_data);
	}
	public function showMarketPage($market)
	{
	$market_data = Market::with('category')->get();
		if($market=="grocery"||$market=="apparel"||$market=="gadget"||$market=="furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-page')->with('user',$user)->with('market',$market)->with('market_data',$market_data);
			}else{
				return view('client.pages.market-page')->with('market',$market)->with('market_data',$market_data);
			}
		}
	}
	public function showMarketStores($market,$type)
	{
	$market_data = Market::with('category')->get();
		if($market=="grocery"||$market=="apparel"||$market=="gadget"||$market=="furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-stores')->with('user',$user)->with('market',$market)->with('type',$type)->with('market_data',$market_data);
			}else{
				return view('client.pages.market-stores')->with('market',$market)->with('type',$type)->with('market_data',$market_data);
			}
		}
	}
	public function showMarketCategory($market)
	{
	$market_data = Market::with('category')->get();
		if($market=="grocery"||$market=="apparel"||$market=="gadget"||$market=="furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-category')->with('user',$user)->with('market',$market)->with('market_data',$market_data);
			}else{
				return view('client.pages.market-category')->with('market',$market)->with('market_data',$market_data);
			}
		}
	}
	public function showMarketProducts($market,$type)
	{
	$market_data = Market::with('category')->get();
		if($market=="grocery"||$market=="apparel"||$market=="gadget"||$market=="furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-product')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('type',$type);
			}else{
				return view('client.pages.market-product')->with('market',$market)->with('market_data',$market_data)->with('type',$type);
			}
		}
	}
	function showMarketCategoryProduct($market,$category){
		$market_data = Market::with('category')->get();
		$category=str_replace('-',' ',$category);
		if($market=="grocery"||$market=="apparel"||$market=="gadget"||$market=="furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-category-product')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('category_name',$category);
			}else{
				return view('client.pages.market-category-product')->with('market',$market)->with('market_data',$market_data)->with('category_name',$category);
			}
		}
	}
}
