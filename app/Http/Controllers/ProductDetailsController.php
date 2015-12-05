<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use App\User;
use App\Market;
use App\ProductInfo;
use App\Product;
use App\Combo;

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
	public function showProductDetails($pid,$product_name)
	{		
		if (ProductInfo::where('id', '=', $pid)->exists()) {
		$ProductInfo = ProductInfo::with('product')->with('store')->with('productVariantGroup')->with('productVariant')->where('id','=',$pid)->get();
		foreach($ProductInfo as $info){
			$name=$info->product_name;
			$store_name=$info->store->store_name;
			$store_id=$info->store->id;
		}
			if (ProductInfo::where('id', '=', $pid)->where('product_name', '=', decodeUrlRoute($product_name))->exists()) {
			   $market_data = Market::with('category')->get();
			   $listFiles=[];
			   $files = \File::files('assets/img/store/'.$store_name.'/product/'.$pid);
			   foreach($files as $path)
				 {
					 $listFiles[] = pathinfo($path);
				 }
				
				
				// $market = DB::table('market_tbl')
				// ->join('category_tbl', 'market_tbl.id', '=', 'category_tbl.market_id')
				// ->join('sub_category_tbl', 'category_tbl.id', '=', 'sub_category_tbl.category_id')
				// ->select('market_tbl.id','market_tbl.market_name')
				// ->where('sub_category_tbl.store_id','=',$store_id)
				// ->groupBy('market_tbl.id')
				// ->get();
				// $arrays =  array();
				// foreach ($market as $market)	{
					// array_push($arrays, $market->id);
				// }	
				
				//$bp = BusinessApplication::whereIn('id', $arrays  )->with('business_info')->with('owner')->get();		
				if (Auth::check())
				{
					$id = Auth::user()->login_id;
					$user = User::where('id', $id )->with('member')->get();
					return view('client.pages.product-details')->with('user',$user)->with('market_data',$market_data)->with('ProductInfo',$ProductInfo)->with('ImageFiles',$listFiles )->with('OtherFiles',$listFiles );
				}else{
					return view('client.pages.product-details')->with('market_data',$market_data)->with('ProductInfo',$ProductInfo)->with('ImageFiles',$listFiles )->with('OtherFiles',$listFiles );
					//return $market_data;
				
				}
				
			}else{
				return redirect('/Product/Details/'.$pid.'/'.encodeUrlRoute($name));
			}
		}else{
			return redirect('/Market');
		}
	}
	
	
	public function getProductVariantCombo(){
		$input = Input::all();
		$id=$input['a'];
		$id2=$input['b'];
		$Product = Product::where('product_info_id','=',$id)->get();
		$arrays =  array();
		foreach ($Product as $bp)	{
			array_push($arrays, $bp->id);
		}
		$Combo = Combo::whereIn('product_id', $arrays )->where('product_variant_id','=',$id2)->get();
		return json_encode($Combo);
	}
	public function getProductVariantComboSelect(){
		$input = Input::all();
		$id=$input['c'];
		$Combo = Combo::with('product')->where('product_id','=',$id)->get();
		return $Combo;
	}
	public function getProductVariantComboSelectImg(){
		$input = Input::all();
		$pid=$input['pid'];
		$piid=$input['piid'];
		$ProductInfo = ProductInfo::where('id','=',$piid)->get();
		foreach($ProductInfo as $info){
			$name=$info->product_name;
			$store_name=$info->store->store_name;
		}
		$listFiles=[];
		$files = \File::files('assets/img/store/'.$store_name.'/product/'.$pid);
		foreach($files as $path)
		{
			$listFiles[] = pathinfo($path);
		}
		return $listFiles;
	}

}
