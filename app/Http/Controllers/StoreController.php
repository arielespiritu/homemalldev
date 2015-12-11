<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use App\User;
use App\Market;
use App\FeaturedProducts;
class StoreController extends Controller {

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
	public function showStore($store_id)
	{
	$market_data = Market::with('category')->get();
	$featured_products = FeaturedProducts::with('product_info')->where('store_id','=',$store_id)->get();
	$store_name = "samplestore";
	$store_market_data = Market::with(['category' => function ($query) use($store_id){
						$query->whereHas('subCategory', function ($q) use($store_id){
						  $q->where('store_id','=',$store_id)->groupBy('category_id');                         // here we filter users by the post
						});
					}])->get();
		if (Auth::check())
		{
			
			$id = Auth::user()->login_id;
			$user = User::where('id', $id )->with('member')->get();
			
			return view('template1.index')->with('user',$user)->with('market_data',$market_data)->with('store_name',$store_name);
		}else{
			
			return view('template1.index')->with('market_data',$market_data)->with('store_market_data',$store_market_data)->with('featured_products',$featured_products)->with('store_name',$store_name);
		}
	}
	
}
