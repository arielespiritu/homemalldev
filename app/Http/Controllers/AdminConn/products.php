<?php

namespace App\Http\Controllers\AdminConn;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use File;
use App\adminmodel\storeowner;
use App\adminmodel\indicator;
use App\adminmodel\category;
use App\adminmodel\brand;
use App\adminmodel\market;
use App\adminmodel\subcategory;
use App\adminmodel\variants;
use Auth;
class products extends Controller
{
///
// GLOBAL FUNC
///
public function __construct()
{
	$this->middleware('authadmin');
}	
	public function checkUserLevel()
	{
		try
		{
			 if(Auth::user())
			 {
				$usersinfo= Auth::user();
				$getIndicatorDescription=Indicator::where('id','=',$usersinfo->indicator_id)->where('indicator_for','=','STORE')->get();
				if(count($getIndicatorDescription) <= 0)
				{
					return 'empty';
				}
				else
				{
					return $getIndicatorDescription;
				}
			 }
			 else
			 {	 
				return 'authFailed';
			 }
		}
		catch(\Exception $e)
		{
			return 'authErr';
		}
	}
///
// END GLOBAL FUNC
///
	public function checkSubcatNameExist($category_id,$sub_catname)
	{
		try
		{
			$ifExist = subcategory::where('category_id','=',$category_id)->where('sub_category_name',$sub_catname)->get();
			//$ifExist = subcategory::where('category_id','=','1')->where('sub_category_name','=','Office Partition')->get();
			// return  $ifExist;
			if(count($ifExist) <= 0)
			{
				return '0';//no data
			}
			else
			{
				return '1'; //with data
			}
			
		}
		catch(\Exception $e)
		{
			return '0';
		}
	}
	public function checkBrandnameExist($brand_name,$marketid)
	{
		try
		{
			$ifExist = brand::where('market_id','=',$marketid)->where('brand_name',$brand_name)->get();
			if(count($ifExist) <= 0)
			{
				return '0';//no data
			}
			else
			{
				return '1'; //with data
			}
			
		}
		catch(\Exception $e)
		{
			return '0';
		}
	}
	public function addBrand(Request $request)
	{
		$input= Input::all();
		try
		{
			if($this->checkBrandnameExist($input['brand_name'],$input['temp_mrktid'])=='1')
			{
				return '2';
			}
			else
			{			
				$brand = new brand;
				$brand->market_id = $input['temp_mrktid'];
				$brand->brand_name = $input['brand_name'];
				$brand->brand_indicator = 'STORE';
				$brand->save();
				return json_encode($brand);	
			}			
		}
		catch(\Exception $e)
		{
			return '0';
		}
	}
	public function addsubcat(Request $request)
	{
		try
		{
			$input= Input::all();
			if($this->checkSubcatNameExist($input['temp_catid'],$input['sub_name'])=='1')
			{
				return '2';
			}
			else
			{
				$subcategory = new subcategory;
				$subcategory->category_id = $input['temp_catid'];
				$subcategory->sub_category_name = $input['sub_name'];
				$subcategory->save();
				return json_encode($subcategory);				
			}
		}
		catch(\Exception $e)
		{
			return '0';
		}
    }
	public function showProducts(Request $request)
	{
		try
		{
			//return $this->checkUserLevel();
			if ($request->isMethod('GET')) 
			{
				 if($this->checkUserLevel() == 'authFailed' )
				 {
					return redirect('/HMadmin/login');
				 }
				 else if($this->checkUserLevel() == 'authErr' )
				 {	 
					return redirect('/HMadmin/login');
				 }
				 else if($this->checkUserLevel() == 'empty' )
				 {
					return 'no indicator';
				 }
				 else
				 {
					 foreach($this->checkUserLevel() as $indicatorInfo)
					 {
						$indicator_id=$indicatorInfo->id;
						$indicator_name=$indicatorInfo->indicator_name;
						$indicator_for=$indicatorInfo->indicator_for;
					 }				
					 if($indicator_name == 'STORE ADMIN')
					 {
						$userLogin= Auth::user();
						$storeowner = storeowner::where('store_id','=',$userLogin->login_id)->with('showStoreInfo')->get();
						$category= category::all();
						$sub_category= subcategory::all();
						$brand= brand::all();
						$market= market::all();
						$variants= variants::all();
						$indicator= indicator::where('indicator_for','=','PRODUCT STATUS')->get();
						$product_status= indicator::where('indicator_for','=','PRODUCT PRICE')->get();
						return view('admin.products.products')
								->with('userLevel',$indicator_name)
								->with('userinfo',$storeowner)
								->with('market_info',$market)
								->with('category_info',$category)
								->with('sub_cat',$sub_category)
								->with('indicator',$indicator)
								->with('product_status',$product_status)
								->with('variants',$variants)
								->with('brand_info',$brand);
					 }
					 else
					 {
						$userLogin= Auth::user();
						$storeowner = storeowner::where('store_id','=',$userLogin->login_id)->with('showStoreInfo')->get();
						return view('admin.products.products')
								->with('userLevel',$indicator_name)
								->with('userinfo',$storeowner);
					 }
				 }
			}
			else
			{
				//err method err
			}			
		}
		catch(\Exception $e)
		{
			
		}		
	}

}
