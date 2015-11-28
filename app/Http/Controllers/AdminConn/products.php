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
use App\adminmodel\productinformation;
use Auth;
use Image;
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
	public function upload_file($file,$destination_logo,$file_name)
	{
		try
		{
			$extension = strtolower($file->getClientOriginalExtension());
			$dir= $destination_logo.$file_name.'.jpg';
			$dir1= $destination_logo.$file_name.'.png';
			$dir2= $destination_logo.$file_name.'.jpeg';
			list($width, $height) = getimagesize($file);
			//return json_encode($this->calculateDimensions($width,$height,'768','768'));
			//return 'Width:'.$width.'Height'.$height;
			//$dir= $destination_logo.'/'.$file_name.'png';
			if (File::exists($dir))
			{
				File::delete($dir);
			}
			if (File::exists($dir1))
			{
				File::delete($dir1);
			}
			if (File::exists($dir2))
			{
				File::delete($dir2);
			}			
			
			// $result=$file->move($destination_logo,$file_name.'.'.$extension);
			$img = Image::make($file);
			$img->resize(300,300);
			$img->insert('assets/avatar.png', 'bottom-right', 10, 10);
			$img->save($destination_logo.'/'.$file_name.'.'.$extension);			
			if(file_exists($destination_logo.'/'.$file_name.'.'.$extension))			
			{
				return '1';
			}
			else
			{
				return '0';
			}
		}
		catch(\Exception $e)
		{
			return 'err'.$e;
		}
	}
	public function getProducNames(Request $request)
	{
	//	return 'tang ina mo';
		if($request->isMethod('POST')) 
		{	
			try
			{
				$input = Input::all();	
				
				$product_information= productinformation::where('sub_category_id','=',$input['tempChild_subcat'])->select('id','product_name')->get();
				return json_encode($product_information);
			}
			catch(\Exception $e)
			{
				return '0'.$e;
			}

		}
		else
		{
				return '0';
		}				
	}
	public function checkifImagefile($photo)
	{
		
		$extension = strtolower($photo->getClientOriginalExtension()); //get extension
		//return $extension;
		if($extension =='jpeg' || $extension =='png' || $extension =='jpg')
		{
			$getsize =filesize($photo) /  pow(1024, 2);
			if(round($getsize,2) > 1)
			{
				//return $imageInfo.' image is too Large less than 1mb is accepted';
				return 'false';
			}
			else
			{
				list($width, $height) = getimagesize($photo);
				return 'true';
			}
		}
		else
		{
			//return 'Selected '.$imageInfo.' is not an image. accept only jpg and png';	
			return 'false';
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
	public function addProduct(Request $request)
	{
		// $extension = strtolower(Input::file('image-0')->getClientOriginalExtension());
		// $filename = strtolower(Input::file('image-0')->getClientOriginalName());
		$input = Input::all();
		return json_encode($input);
		$count =0;
		for($i=0;$i<$input['imagecount'];$i++)
		{
			if($this->checkifImagefile(Input::file('image-'.$i)) == 'true')
			{
				$count+=1;
			}
			else
			{
				
			}				
		}
		return $count;
		
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
				$brand->MI1 = $input['temp_mrktid'];
				$brand->BN2 = $input['brand_name'];
				$brand->BINR3 = 'STORE';
				$brand->save();
			
				return json_encode($brand);	
			}			
		}
		catch(\Exception $e)
		{
			return '0'.$e;
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
				$subcategory->CI1 = $input['temp_catid'];
				$subcategory->SCN3 = $input['sub_name'];
				$subcategory->save();
				return json_encode($subcategory);				
			}
		}
		catch(\Exception $e)
		{
			return '0'.$e;
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
								->with('market_info',$market) // ok
								->with('category_info',$category) // ok 
								->with('sub_cat',$sub_category) // ok
								->with('indicator',$indicator)
								->with('product_status',$product_status)
								->with('variants',$variants) // ok
								->with('brand_info',$brand); //ok
								//->with('product_information',$product_information);
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
