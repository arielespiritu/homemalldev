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
use Crypt;
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
		$img = Image::make($file);
		$img->resize(394,418);
		$img->insert('assets/img/watermark.png', 'bottom-right', 10, 10);
		$img->save($destination_logo.$file_name.'.'.$extension);			
		return $img;
	}
	catch(\Exception $e)
	{
		return $e;
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
	if($extension =='jpeg' || $extension =='png' || $extension =='jpg')
	{
		$getsize =filesize($photo) /  pow(1024, 2);
		if(round($getsize,2) > 1)
		{
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
		return 'false';
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
///
// END GLOBAL FUNC
///
/////////////////////////////////////////////////////////////////////
///
// addProduct
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
	{}
	return $variant['id'];
}
public function getStoreName($store_id)
{
	$storeinfo= storeinfo::where('id','=',$store_id)->get();
	foreach($storeinfo as $store)
	{}
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
public function getAllChild($product_info_id,$arrayCombo)
{
	$productinformation = productinformation::where('id','=',$product_info_id)->with('getChild')->get();
	$sample = array();
	$status ="false";
	foreach($productinformation as $product_info)
	{
		foreach($product_info['getChild'] as $product_info)
		{
			$checkifExist= $this->checkComboifExist($product_info->id);
			
			if($arrayCombo === array_intersect($arrayCombo, $checkifExist) && $checkifExist === array_intersect($checkifExist, $arrayCombo)) {
				$status = 'true';
				break;
			}
			else
			{
				$status ="false";
				continue;
			}
		}
	}
	return $status;
}
public function checkComboifExist($product_id)
{
	$productcombination = productcombination::where('product_id','=',$product_id)->get();
	$getarrayCombo= array();
	if(count($productcombination) >= 1)
	{
		foreach($productcombination as $productcombo)
		{
			array_push($getarrayCombo,$productcombo->product_variant_id);
		}
		return $getarrayCombo;
	}
}
public function insertToProductInformation($product_name,$sub_category_id,$product_info_status,$store_id,$product_description,$product_ranged)
{
	try
	{
		$product_info= new productinformation;
		$product_info->product_name= $product_name;
		$product_info->sub_category_id= $sub_category_id;
		$product_info->product_status= $product_info_status;
		$product_info->store_id= $store_id;
		$product_info->product_description= $product_description;
		$product_info->product_range= $product_ranged;
		$product_info->save();
		return $product_info->id;
	}
	catch(\Exception $e)
	{
		return '0';
	}
}
public function insertProductVariants($variant_name_value,$product_info_id,$variant_id)
{
	try
	{
		$productvariants = new productvariants;
		$productvariants->variant_name_value = $variant_name_value;
		$productvariants->product_info_id =  $product_info_id;
		$productvariants->variant_id =  $variant_id;
		$productvariants->save();	
		return $productvariants->id;	
	}
	catch(\Exception $e)
	{
		return '0';
	}
}
public function insertProductSubordinates($productinfo_id,$sale_price,$retail_price,$product_cost,$quantity,$active_price,$product_status)
{
	try
	{
		$productscombo= new productscombo;
		$productscombo->product_info_id = $productinfo_id;
		$productscombo->sale_price = $sale_price;
		$productscombo->retail_price= $retail_price;
		$productscombo->product_cost= $product_cost;
		$productscombo->quantity= $quantity;
		$productscombo->active_price= $active_price;
		$productscombo->product_status= $product_status;
		$productscombo->save();	
		return $productscombo->id;	
	}
	catch(\Exception $e)
	{
		return '0';
	}	
}
public function insertProductCombo($product_variant_id,$product_id)
{
	try
	{
		$productcombination= new productcombination;
		$productcombination->product_variant_id = $product_variant_id;
		$productcombination->product_id = $product_id;
		$productcombination->save();		
		return $productcombination->id;		
	}
	catch(\Exception $e)
	{
		return '0';
	}
}
public function addProduct(Request $request)
{
	$user=Auth::User();
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
					$product_info_id=$this->insertToProductInformation($input['product_name'],$input['product_sub_category'],$input['product_info_status'],$user->login_id,$input['product_description'],$input['product_ranged']);							
					if($product_info_id == '0' || $product_info_id== '' )
					{
						return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>array('Unable to save product Information check the fields remove unwanted special character')]));
					}
					else
					{
						//inserting variants..
						$checkifInsertedProductVariant= array();
						for($x = 0; $x < count($getChilds); $x++)
						{
							$decodeJSON=json_decode($input[$getChilds[$x]], TRUE);
								foreach($decodeJSON as $values) { 
									$checkifInsertedVariant =$this->insertProductVariants($values[$getChilds[$x]],$product_info_id,$this->getVariantID($getChilds[$x]));
									if($checkifInsertedVariant == '0' || $checkifInsertedVariant== '' )
									{
										array_push($checkifInsertedProductVariant,'Unable to insert to Product Variants '.$getChilds[$x].': '.$values[$getChilds[$x]].'you can manage to Edit Section');
									}	
									else
									{
									}
								}
						}							
						if (!empty($checkifInsertedProductVariant)) 
						{
							return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>$checkifInsertedProductVariant]));
						}
						else
						{
							$product_id= $this->insertProductSubordinates($product_info_id,$input['product_saleprice'],$input['product_retailprice'],$input['product_cost'],$input['product_quantity'],$input['combo_active_price'],$input['combo_status']);
							if($product_id == '0' || $product_id== '' )
							{
								return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>array('Unable to Insert Product Variants Please Add it in product_type CHILD')]));
							}	
							else
							{
								if($input['imagecount'] == '0')
								{	}
								else
								{
									for($i=0;$i<$input['imagecount'];$i++)
									{
										if($this->checkifImagefile(Input::file('image-'.$i)) == 'true')
										{
											$extension = strtolower(Input::file('image-'.$i)->getClientOriginalExtension());
											$dir = 'assets/img/store/'.$this->getStoreName($user->login_id).'/product/'.$product_id.'/';
											$this->upload_file(Input::file('image-'.$i),$dir,$i);
										}
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
										$product_combo_erros=array();
										$product_combo_id=$this->insertProductCombo($this->getProductVariantID($this->getVariantID($getChilds[$x1]),$input['default_'.$getChilds[$x1]]),$product_id);
										if($product_combo_id == '0' || $product_combo_id== '' )
										{
											array_push($product_combo_erros,'Unable To insert Product Combination Please re-insert.Please choose Product Type: CHILD to re-insert');
										}
									}
								}
								if(!empty($product_combo_erros))
								{
									return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>$product_combo_erros]));
								}
								else
								{
									return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '1','message' => 'Data Insert','data' => $product_info_id]));									
								}									
							}								
						}
					}
				}
				catch(\Exception $e)
				{
					 return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>array('err'.$e)]));
				}
			}	
		}
		else
		{
			$checkparentChildExist = array();
			for($x1 = 0; $x1 < count($getChilds); $x1++)
			{
				$checkCombo =$this->getProductVariantID($this->getVariantID($getChilds[$x1]),$input['default_'.$getChilds[$x1]]);
				if($checkCombo  == '' ||  $checkCombo== null )
				{
					
				}
				else
				{
					array_push($checkparentChildExist,$checkCombo);
				}
			}	
			if($this->getAllChild($input['product_combo_result'],$checkparentChildExist)=='true')
			{
				return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>array('Duplicate Combination')]));
			}
			else
			{
				$checkparentChildExist = null;
				$product_id= $this->insertProductSubordinates($input['product_combo_result'],$input['product_saleprice'],$input['product_retailprice'],$input['product_cost'],$input['product_quantity'],$input['combo_active_price'],$input['combo_status']);
				if($product_id == '0' || $product_id== '' )
				{
					return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>array('Unable to Insert Product Variants Please Add it in product_type CHILD')]));
				}	
				else
				{
					if($input['imagecount'] == '0')
					{	}
					else
					{
						for($i=0;$i<$input['imagecount'];$i++)
						{
							if($this->checkifImagefile(Input::file('image-'.$i)) == 'true')
							{
								$extension = strtolower(Input::file('image-'.$i)->getClientOriginalExtension());
								$dir = 'assets/img/store/'.$this->getStoreName($user->login_id).'/product/'.$product_id.'/';
								$this->upload_file(Input::file('image-'.$i),$dir,$i);
							}
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
							$product_combo_erros=array();
							$product_combo_id=$this->insertProductCombo($this->getProductVariantID($this->getVariantID($getChilds[$x1]),$input['default_'.$getChilds[$x1]]),$product_id);
							if($product_combo_id == '0' || $product_combo_id== '' )
							{
								array_push($product_combo_erros,'Unable To insert Product Combination Please re-insert.Please choose Product Type: CHILD to re-insert');
							}
						}
					}
					if(!empty($product_combo_erros))
					{
						return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>$product_combo_erros]));
					}
					else
					{
						return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '1','message' => 'Data Insert','data' => $input['product_combo_result']]));									
					}									
				}							
			}
		}
	}
	elseif($input['product_type'] == 'child')
	{
			$attributes = [
				'product_saleprice' => 'Sale Price',
				'product_retailprice' =>'Retail Price',
				'product_cost' => 'Product Cost',
				'product_quantity' => 'Quantity',
				'combo_active_price' => 'Active Price',
				'combo_status' => 'Product Status',
				
			];								
			$rules = [
				'product_saleprice' => 'required',
				'product_retailprice' => 'required',
				'product_cost' => 'required',
				'product_quantity' => 'required',
				'combo_active_price' => 'required',
				'combo_status' => 'required',
				
			];		
		try
		{
////////////////////////////////////////////check if duplicate combo//////////////////////////////////				
			$checkifcomboExist= array();
			for($x1 = 0; $x1 < count($getChilds); $x1++)
			{
				$idcombo = $input['default_'.$getChilds[$x1]];;
				if($idcombo  == '' ||  $idcombo== null )
				{
				}//getAllChild($product_info_id)
				else
				{
					 array_push($checkifcomboExist,$idcombo);
				}
			}
////////////////////////////////////////////end//////////////////////////////////

			$validator = Validator::make(Input::all(),$rules,[],$attributes);
			if ($validator->fails()) {
				 return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' => $validator->errors()->all()]));
			}
			else if($this->getAllChild($input['product_main_names'],$checkifcomboExist)=='true')
			{
				return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>array('Duplicate Combination')]));
			}
			else
			{
				$checkifcomboExist = null;
				$product_id= $this->insertProductSubordinates($input['product_main_names'],$input['product_saleprice'],$input['product_retailprice'],$input['product_cost'],$input['product_quantity'],$input['combo_active_price'],$input['combo_status']);
				if($product_id == '0' || $product_id== '' )
				{
					return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>array('Unable to Insert Product Variants Please Add it in product_type CHILD')]));
				}	
				else
				{
					if($input['imagecount'] == '0')
					{	}
					else
					{
						for($i=0;$i<$input['imagecount'];$i++)
						{
							if($this->checkifImagefile(Input::file('image-'.$i)) == 'true')
							{
								$extension = strtolower(Input::file('image-'.$i)->getClientOriginalExtension());
								$dir = 'assets/img/store/'.$this->getStoreName($user->login_id).'/product/'.$product_id.'/';
								$this->upload_file(Input::file('image-'.$i),$dir,$i);
							}
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
							$product_combo_erros=array();
							$product_combo_id=$this->insertProductCombo($this->getProductVariantID($this->getVariantID($getChilds[$x1]),$input['default_'.$getChilds[$x1]]),$product_id);
							if($product_combo_id == '0' || $product_combo_id== '' )
							{
								array_push($product_combo_erros,'Unable To insert Product Combination Please re-insert.Please choose Product Type: CHILD to re-insert');
							}
						}
					}
					if(!empty($product_combo_erros))
					{
						return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>$product_combo_erros]));
					}
					else
					{
						return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '1','message' => 'Data Insert','data' =>'']));									
					}									
				}
			}
		}
		catch(\Exception $e)
		{
			return json_encode(array(['key' => '12345','session' => csrf_token(),'success' => '0','message' => 'Validator failed','data' =>$e]));
		}
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
		$user=Auth::User();
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
				$subcategory->SI1 = $user->login_id;
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
	public function getAllParentProduct(Request $request)
	{
		$input= Input::all();
		$userLogin= Auth::user();
		$decrypted = Crypt::decrypt($input['gates']);
			if($decrypted == 'devANONE')
			{
				$productinformation = productinformation::with('getSubCategoryName')->with('getStatus')->where('store_id','=',$userLogin->login_id)->get();
				return json_encode($productinformation);				
			}
			else
			{
				return 'Invalid Key';
			}
		
		// $decrypted=Crypt::decrypt($input['gates']);
		// return $decrypted;

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
						$sub_category= subcategory::where('store_id','=',$userLogin->login_id)->orWhere('store_id', '=','0')->get();
						$productinformation = productinformation::where('store_id','=',$userLogin->login_id)->get();
						$brand= brand::all();
						$market= market::all();
						$variants= variants::all();
						$indicator= indicator::where('indicator_for','=','PRODUCT STATUS')->get();
						$product_status= indicator::where('indicator_for','=','PRODUCT PRICE')->get();
						//return json_encode($productinformation);
						return view('admin.products.products')
								->with('userLevel',$indicator_name)
								->with('userinfo',$storeowner)
								->with('market_info',$market) // ok
								->with('category_info',$category) // ok 
								->with('sub_cat',$sub_category) // ok
								->with('indicator',$indicator)
								->with('product_status',$product_status)
								->with('variants',$variants) // ok
								->with('brand_info',$brand) //ok
								->with('productinformation',$productinformation);
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
	public function showMainProducts(Request $request)
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
						$productinformation = productinformation::where('store_id','=',$userLogin->login_id)->get();
						$brand= brand::all();
						$market= market::all();
						$variants= variants::all();
						$indicator= indicator::where('indicator_for','=','PRODUCT STATUS')->get();
						$product_status= indicator::where('indicator_for','=','PRODUCT PRICE')->get();
						//return json_encode($productinformation);
						return view('admin.products.mainproduct')
								->with('userLevel',$indicator_name)
								->with('userinfo',$storeowner)
								->with('sub_cat',$sub_category) // ok
								->with('productinformation',$productinformation);
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
