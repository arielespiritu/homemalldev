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

		if (ProductInfo::where('id', '=', $pid)->where('product_status', '=', '9')->exists()) {
		
		$ProductInfo = ProductInfo::with('product')->with('store')->with('productVariantGroup')->with('productVariant')->where('id','=',$pid)->get();
		
		$fb_seo_meta = array();
		foreach($ProductInfo as $info){
			$name=$info->product_name;
			$store_name=$info->store->store_name;
			$store_id=$info->store->id;
			$sub_category_id=$info->sub_category_id;
			$fb_seo_meta['title']= $store_name.' - '.$info->product_name;
			$fb_seo_meta['description']=$info->product_description;
			foreach($info->product as $piid){
				$product_id=$piid->id;
				break;
			}
			break;
		}
	
			if (ProductInfo::where('id', '=', $pid)->where('product_name', '=', decodeUrlRoute($product_name))->exists()) {
			   $market_data = Market::with('category')->get();
			   $listFiles=[];
			   $files = \File::files('assets/img/store/'.$store_name.'/product/'.$product_id);
			   foreach($files as $path)
				 {
					 $listFiles[] = pathinfo($path);
				 }	
				 
				$fb_seo_meta['image']='assets/img/noimage.png';
				foreach($listFiles as $seo_img)
				{
					$fb_seo_meta['image']=$seo_img['dirname'].'/'.$seo_img['basename'];
					break;
				}
				 
				$store_market_data = Market::with(['category' => function ($query)  use($store_id){
						$query->whereHas('subCategory', function ($q) use($store_id) {
						  $q->where('store_id','=',$store_id)->groupBy('category_id');             
						});
					}])->get();
					
					
					
				if (Auth::check())
				{
					$id = Auth::user()->login_id;
					$user = User::where('id', $id )->with('member')->get();
					return view('client.pages.product-details')->with('user',$user)->with('market_data',$market_data)->with('store_market_data',$store_market_data)->with('ProductInfo',$ProductInfo)->with('ImageFiles',$listFiles )->with('OtherFiles',$listFiles )->with('fb_seo_meta',$fb_seo_meta);
				}else{
					return view('client.pages.product-details')->with('market_data',$market_data)->with('store_market_data',$store_market_data)->with('ProductInfo',$ProductInfo)->with('ImageFiles',$listFiles )->with('OtherFiles',$listFiles )->with('fb_seo_meta',$fb_seo_meta);
					//return $listFiles;
				
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
		$Product = Product::where('product_info_id','=',$id)->where('product_status', '=', '9')->get();
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
		$ProductInfo = ProductInfo::where('id','=',$piid)->where('product_status', '=', '9')->get();
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
