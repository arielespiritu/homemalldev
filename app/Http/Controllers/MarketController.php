<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use App\User;
use App\Market;
use App\Brands;
use App\FeaturedProducts;
use App\FeaturedStore;
use App\FeaturedCategory;
use App\FeaturedTrend;
use Anam\Phpcart\Cart;
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
	$fb_seo_meta = array();
	$fb_seo_meta['title']= 'HomemallPH';
	$fb_seo_meta['description']='HomemallPH - Convenience at your doorstep!';
	$fb_seo_meta['image']='asset/img/homemalllogo.jpg';

	$market_data = Market::with('categoryStore')->orderBy('id')->get();

	$featured_products = FeaturedProducts::with('product_info')->where('store_id','=','0')->get();
	$featured_store = FeaturedStore::with('store')->get();
	$featured_category = FeaturedCategory::with('categoryProduct')->with('category')->get();
	$featured_trend = FeaturedTrend::with('product_info')->get();
	
	
	$brands = Brands::all();
		if (Auth::check())
		{
			$id = Auth::user()->login_id;
			$user = User::where('id', $id )->with('member')->get();
			return view('client.pages.market')->with('user',$user)->with('market_data',$market_data)->with('brands_data',$brands)->with('featured_products',$featured_products)->with('featured_store',$featured_store)->with('featured_category',$featured_category)->with('featured_trend',$featured_trend)->with('fb_seo_meta',$fb_seo_meta);
		}else{		
			return view('client.pages.market')->with('market_data',$market_data)->with('brands_data',$brands)->with('featured_products',$featured_products)->with('featured_store',$featured_store)->with('featured_category',$featured_category)->with('featured_trend',$featured_trend)->with('fb_seo_meta',$fb_seo_meta);
			//return $items;
		}
	}
	public function redirectToMarket()
	{
	$fb_seo_meta = array();
	$fb_seo_meta['title']= 'HomemallPH';
	$fb_seo_meta['description']='HomemallPH - Convenience at your doorstep!';
	$fb_seo_meta['image']='asset/img/homemalllogo.jpg';
	
	$market_data = Market::with('categoryStore')->orderBy('id')->get();
		$email = Auth::user()->email;
		return view('client.pages.market')->with('email',$email)->with('market_data',$market_data)->with('fb_seo_meta',$fb_seo_meta);
	}
	public function showMarketPage($market)
	{
	$market_data = Market::with('categoryStore')->orderBy('id')->get();
		if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){
		$market_data_category = Market::with('category')->where('market_name','=',$market)->get();
		$fb_seo_meta = array();
		$fb_seo_meta['title']= 'HomemallPH - '.$market;
		$fb_seo_meta['description']='Shop your favorite product and items in our '.$market.' market!';
		$fb_seo_meta['image']='asset/img/market/'.$market.'.png';
		
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-page')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('market_data_category',$market_data_category)->with('fb_seo_meta',$fb_seo_meta);
			}else{
				return view('client.pages.market-page')->with('market',$market)->with('market_data',$market_data)->with('market_data_category',$market_data_category)->with('fb_seo_meta',$fb_seo_meta);
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
						
	$market_data = Market::with('categoryStore')->orderBy('id')->get();
		if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){
		$fb_seo_meta = array();
		$fb_seo_meta['title']= 'HomemallPH - '.$market;
		$fb_seo_meta['description']='Shop your favorite product and items in our '.$market.' market!';
		$fb_seo_meta['image']='asset/img/market/'.$market.'.png';
		
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-stores')->with('user',$user)->with('market',$market)->with('types',$type)->with('market_data',$market_data)->with('fb_seo_meta',$fb_seo_meta);
			}else{
				return view('client.pages.market-stores')->with('market',$market)->with('types',$type)->with('market_data',$market_data)->with('fb_seo_meta',$fb_seo_meta);
			}
		}else{
			return redirect(\URL::previous());
		}
	}
	public function showMarketCategory($market)
	{
	$market_data = Market::with('categoryStore')->orderBy('id')->get();
		if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){
		$fb_seo_meta = array();
		$fb_seo_meta['title']= 'HomemallPH - '.$market;
		$fb_seo_meta['description']='Shop your favorite product and items in our '.$market.' market!';
		$fb_seo_meta['image']='asset/img/market/'.$market.'.png';
		
			$market_data_category = Market::with('category')->where('market_name','=',$market)->get();

			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-category')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('market_data_category',$market_data_category)->with('fb_seo_meta',$fb_seo_meta);
			}else{
				return view('client.pages.market-category')->with('market',$market)->with('market_data',$market_data)->with('market_data_category',$market_data_category)->with('fb_seo_meta',$fb_seo_meta);
			}
		}else{
			return redirect(\URL::previous());
		}
	}
	public function showMarketProducts($market,$type)
	{
		if($type=="All"||$type=="New"||$type=="Popular"||$type=="Sale"){
			$market_data = Market::with('categoryStore')->orderBy('id')->get();
			if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){
			$fb_seo_meta = array();
			$fb_seo_meta['title']= 'HomemallPH - '.$market;
			$fb_seo_meta['description']='Shop your favorite product and items in our '.$market.' market!';
			$fb_seo_meta['image']='asset/img/market/'.$market.'.png';
			
				if (Auth::check())
				{
					$id = Auth::user()->login_id;
					$user = User::where('id', $id )->with('member')->get();
					return view('client.pages.market-product')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('type',$type)->with('fb_seo_meta',$fb_seo_meta);
				}else{
					return view('client.pages.market-product')->with('market',$market)->with('market_data',$market_data)->with('type',$type)->with('fb_seo_meta',$fb_seo_meta);
				}
			}else{
				return redirect(\URL::previous());
			}
		}else{
			return redirect(\URL::previous());
		}	
	}
	function showMarketCategoryProduct($market,$category,$type){
		$market_data = Market::with('categoryStore')->orderBy('id')->get();
		$market_data_category = Market::with('category')->where('market_name','=',$market)->get();
		$category=str_replace('-',' ',$category);
		if($market=="Grocery"||$market=="Apparel"||$market=="Gadget"||$market=="Furniture"){
		$fb_seo_meta = array();
		$fb_seo_meta['title']= 'HomemallPH - '.$market;
		$fb_seo_meta['description']='Shop your favorite product and items in our '.$market.' market!';
		$fb_seo_meta['image']='asset/img/market/'.$market.'.png';
		
			if (Auth::check())
			{
				$id = Auth::user()->login_id;
				$user = User::where('id', $id )->with('member')->get();
				return view('client.pages.market-category-product')->with('user',$user)->with('market',$market)->with('market_data',$market_data)->with('category_name',$category)->with('type',$type)->with('fb_seo_meta',$fb_seo_meta);
			}else{
				return view('client.pages.market-category-product')->with('market',$market)->with('market_data',$market_data)->with('category_name',$category)->with('type',$type)->with('fb_seo_meta',$fb_seo_meta);
			}
		}else{
			return redirect(\URL::previous());
		}
	}
	
	
}
