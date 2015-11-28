<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use App\User;
use App\Market;
use App\Brands;
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
	$brands = Brands::all();
		if (Auth::check())
		{
			$id = Auth::user()->login_id;
			$user = User::where('id', $id )->with('member')->get();
			return view('client.pages.market')->with('user',$user)->with('market_data',$market_data)->with('brands_data',$brands);
		}else{
			return view('client.pages.market')->with('market_data',$market_data)->with('brands_data',$brands);
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
		if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){
		$market_data_category = Market::with('category')->where('market_name','=',$market)->get();
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-page')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('market_data_category',$market_data_category);
			}else{
				return view('client.pages.market-page')->with('market',$market)->with('market_data',$market_data)->with('market_data_category',$market_data_category);
			}
		}else{
			return redirect(\URL::previous());
		}
	}
	public function showMarketStores($market,$type)
	{
		if($type=='Online'){
			 $types="Online"; }
		elseif($type=='Most-Visited'){
			 $types="Most Visited"; }
		elseif($type=='New') {
			$types="New"; }
		elseif($type=='All') {
		$types="All"; }
		else{
			return redirect(\URL::previous());
		}
						
	$market_data = Market::with('category')->get();
		if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-stores')->with('user',$user)->with('market',$market)->with('type',$type)->with('market_data',$market_data);
			}else{
				return view('client.pages.market-stores')->with('market',$market)->with('types',$type)->with('market_data',$market_data);
			}
		}else{
			return redirect(\URL::previous());
		}
	}
	public function showMarketCategory($market)
	{
	$market_data = Market::with('category')->get();
		if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){

			$market_data_category = Market::with('category')->where('market_name','=',$market)->get();

			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-category')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('market_data_category',$market_data_category);
			}else{
				return view('client.pages.market-category')->with('market',$market)->with('market_data',$market_data)->with('market_data_category',$market_data_category);
			}
		}else{
			return redirect(\URL::previous());
		}
	}
	public function showMarketProducts($market,$type)
	{
		if($type=="All"||$type=="New"||$type=="Popular"||$type=="Sale"){
			$market_data = Market::with('category')->get();
			if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){
				if (Auth::check())
				{
					$id = Auth::user()->login_id;
					$user = User::where('id', $id )->with('member')->get();
					return view('client.pages.market-product')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('type',$type);
				}else{
					return view('client.pages.market-product')->with('market',$market)->with('market_data',$market_data)->with('type',$type);
				}
			}else{
				return redirect(\URL::previous());
			}
		}else{
			return redirect(\URL::previous());
		}	
	}
	function showMarketCategoryProduct($market,$category,$type){
		$market_data = Market::with('category')->get();
		$category=str_replace('-',' ',$category);
		if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-category-product')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('category_name',$category)->with('type',$type);
			}else{
				return view('client.pages.market-category-product')->with('market',$market)->with('market_data',$market_data)->with('category_name',$category)->with('type',$type);
			}
		}else{
			return redirect(\URL::previous());
		}
	}
}
