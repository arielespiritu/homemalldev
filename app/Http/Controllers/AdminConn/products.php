<?php

namespace App\Http\Controllers\AdminConn;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use File;
use App\adminmodel\storeowner;
use App\adminmodel\storeinfo;
use App\adminmodel\indicator;
use App\adminmodel\category;
use App\adminmodel\brand;
use App\adminmodel\market;
use App\adminmodel\subcategory;
use App\adminmodel\variants;
use App\adminmodel\productvariants;
use App\adminmodel\productinformation;
use App\adminmodel\productscombo;
use App\adminmodel\productcombination;
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
	
	
	public function createDIR($dir)
	{
		if(!file_exists($dir))
		{
			mkdir($dir);
		}
	}
	public function upload_file($file,$destination_logo,$file_name)
	{
		$this->createDIR($destination_logo);
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
			$img->resize(394,418);
			$img->insert('assets/img/watermark.png', 'bottom-right', 10, 10);
			$img->save($destination_logo.$file_name.'.'.$extension);			
		}
		catch(\Exception $e)
		{
		}
	}
	public function getProducNames(Request $request)
	{
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
	public function getVariantID($variant_name)
	{	 $variant_name = str_replace('_', ' ', $variant_name);
		$variants= variants::where('variant_name','=',$variant_name)->get();
		foreach($variants as $variant)
		{
		}
		return $variant['id'];
	}
	public function getStoreName($store_id)
	{
		$storeinfo= storeinfo::where('id','=',$store_id)->get();
		foreach($storeinfo as $store)
		{
		}
		return $store['store_name'];
	}
	public function getProductVariantID($variant_id,$variant_name_value)
	{
		try{
			$productvariants = productvariants::where('variant_id','=',$variant_id)->where('variant_name_value','=',$variant_name_value)->get();
			foreach($productvariants as $productvariantID)
			{
			}
			return $productvariantID['id'];			
		}
		catch(\Exception $e)
		{
		}
	}
	public function addVariant(Request $request)
	{
		$input = Input::all();
	
		$productvariants =  new productvariants;
		$productvariants->product_info_id =$input['product_info_id'];
		$productvariants->variant_id =$this->getVariantID($input['variant_type']);
		$productvariants->variant_name_value =$input['variant_name'];
		$productvariants->save();
		return json_encode($productvariants);
	}
	public function addProduct(Request $request)
	{
		$input = Input::all();
		$getChilds =explode(",",$input['selectValues']);
		if($input['product_type'] == 'main')
		{
			$attributes = [
				'product_name' => 'Product Name',
				'product_description' => 'Product Description',
				'market_info' => 'Market Place',
				'product_category' => 'Category',
				'product_sub_category' => 'Sub Category',
				'brand_info' => 'Brand',
				'product_info_status' => 'Product information Status',
				'product_ranged' => 'Store Logo Status',
				
				'product_saleprice' => 'Sale Price',
				'product_retailprice' =>'Retail Price',
				'product_cost' => 'Product Cost',
				'product_quantity' => 'Quantity',
				'combo_active_price' => 'Active Price',
				'combo_status' => 'Product Status',
				
			];								
			$rules = [
				'product_name' => 'required',
				'product_description' => 'required',
				'market_info' => 'required',
				'product_category' => 'required',
				'product_sub_category' => 'required',
				'product_info_status' => 'required',
				
				'product_saleprice' => 'required',
				'product_retailprice' => 'required',
				'product_cost' => 'required',
				'product_quantity' => 'required',
				'combo_active_price' => 'required',
				'combo_status' => 'required',
				
			];			

				if($input['product_combo_result'] == 'NOT YET SAVE')
				{
					$validator = Validator::make(Input::all(),$rules,[],$attributes);
					if ($validator->fails()) {
						 return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' => $validator->errors()->all()]));
					}
					else
					{
						try
						{
							//inserting productinformation
								$product_info= new productinformation;
								$product_info->product_name= $input['product_name'];
								$product_info->sub_category_id= $input['product_sub_category'];
								$product_info->product_status= $input['product_info_status'];
								$product_info->store_id= $user->login_id;
								$product_info->product_description= $input['product_description'];
								$product_info->product_range= $input['product_ranged'];
								$product_info->save();						

							//inserting all variants
							
							for($x = 0; $x < count($getChilds); $x++)
							{
								$decodeJSON=json_decode($input[$getChilds[$x]], TRUE);
									foreach($decodeJSON as $values) { 
									//return $input['default_'.$getChilds[$x]];
											$productvariants = new productvariants;
											$productvariants->variant_name_value = $values[$getChilds[$x]];
											$productvariants->product_info_id = $product_info->id;
											$productvariants->variant_id = $this->getVariantID($getChilds[$x]);
											$productvariants->save();
									}
							}
							//inserting product combo
							$productscombo= new productscombo;
							$productscombo->product_info_id = $product_info->id;
							$productscombo->sale_price = $input['product_saleprice'];
							$productscombo->retail_price= $input['product_retailprice'];
							$productscombo->product_cost= $input['product_cost'];
							$productscombo->quantity= $input['product_quantity'];
							$productscombo->active_price= $input['combo_active_price'];					
							$productscombo->product_status= $input['combo_status'];
							$productscombo->save();
							//inserting images
							for($i=0;$i<$input['imagecount'];$i++)
							{
								$productID = $productscombo->id;
								if($this->checkifImagefile(Input::file('image-'.$i)) == 'true')
								{
									$extension = strtolower(Input::file('image-'.$i)->getClientOriginalExtension());
									$dir = 'assets/img/store/'.$this->getStoreName($user->login_id).'/product/'.$productID.'/';
									$this->upload_file(Input::file('image-'.$i),$dir,$i);
								}
							}
							//inserting combos
							
							for($x1 = 0; $x1 < count($getChilds); $x1++)
							{
							//	return $this->getProductVariantID($this->getVariantID($getChildsCombo[$x]),$input['default_'.$getChildsCombo[$x]]);
								$idcombo =$this->getProductVariantID($this->getVariantID($getChilds[$x1]),$input['default_'.$getChilds[$x1]]);
								if($idcombo  == '' ||  $idcombo== null )
								{
							
								}
								else
								{
									 $productcombination= new productcombination;
									 $productcombination->product_variant_id = $this->getProductVariantID($this->getVariantID($getChilds[$x1]),$input['default_'.$getChilds[$x1]]);
									 $productcombination->product_id = $productscombo->id;
									 $productcombination->save();						
									
								}

							}					
							return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '1','message' => 'Data Insert','data' => $product_info->id]));
						}
						catch(\Exception $e)
						{
							$result = '0';
						}
					}	
				}
				else
				{
					try{
						$productscombo= new productscombo;
						$productscombo->product_info_id = $input['product_combo_result'];
						$productscombo->sale_price = $input['product_saleprice'];
						$productscombo->retail_price= $input['product_retailprice'];
						$productscombo->product_cost= $input['product_cost'];
						$productscombo->quantity= $input['product_quantity'];
						$productscombo->active_price= $input['combo_active_price'];					
						$productscombo->product_status= $input['combo_status'];
						$productscombo->save();	
						for($i=0;$i<$input['imagecount'];$i++)
						{
							$productID = $productscombo->id;
							if($this->checkifImagefile(Input::file('image-'.$i)) == 'true')
							{
								$extension = strtolower(Input::file('image-'.$i)->getClientOriginalExtension());
								$dir = 'assets/img/store/'.$this->getStoreName($user->login_id).'/product/'.$productID.'/';
								$this->upload_file(Input::file('image-'.$i),$dir,$i);
							}
						}				
							for($x1 = 0; $x1 < count($getChilds); $x1++)
							{
								$idcombo =$this->getProductVariantID($this->getVariantID($getChilds[$x1]),$input['default_'.$getChilds[$x1]]);
								if($idcombo  == '' ||  $idcombo== null )
								{
								}
								else
								{
									 $productcombination= new productcombination;
									 $productcombination->product_variant_id = $this->getProductVariantID($this->getVariantID($getChilds[$x1]),$input['default_'.$getChilds[$x1]]);
									 $productcombination->product_id = $productscombo->id;
									 $productcombination->save();						
								}
							}						
						return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '1','message' => 'Data Insert','data' => $input['product_combo_result']]));
					}
					catch(\Exception $e)			
					{
						return $e;
					}
				}
		}
		elseif($input['product_type'] == 'child')
		{
			
			return json_encode($input);
		}
		else
		{
			return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Invalid Command','data' =>'']));
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
	public function viewChild()
	{
		$input = Input::all();
		$productvariants=productvariants::where('product_info_id','=', $input['product_info'])->with('getVariant')->get();
		return json_encode($productvariants);
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
