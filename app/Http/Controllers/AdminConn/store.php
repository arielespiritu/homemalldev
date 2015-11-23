<?php

namespace App\Http\Controllers\AdminConn;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use File;
use App\adminmodel\storeinfo;
use App\adminmodel\storeowner;
class store extends Controller
{
	public function validateUpdate(Request $request)
	{
		$input= Input::all();
		if($input['store_logo_status'] != 'Nothing_Change' && $input['owner_image_status'] != 'Nothing_Change')
		{
			if($this->checkifImagefile(Input::file('store_logo_file'),'Store Logo') == 'true')
			{
				if($this->checkifImagefile(Input::file('owner_image_file'),'Owner Picture') == 'true')
				{
					$store_name_dir= ''.$input['store_name'].'/logo/';
					$store_file_name=''.$input['store_id'];
					$destination_store_logo ='assets/img/store/'.str_replace(' ', '', $store_name_dir);

					$ifsuccessStore ='';
					
					$checkSuccessUpdate= $this->validateStoreFields();
					if($checkSuccessUpdate=='1')
					{
						$ifsuccessStore = $this->upload_file(Input::file('store_logo_file'),$destination_store_logo,$store_file_name);
					}
					else if($checkSuccessUpdate=='0')
					{
						$ifsuccessStore = "Oopps!! something Wrong can't Update Info Please Try Again";
					}
					else
					{
						return $checkSuccessUpdate;
					}
					
					if($ifsuccessStore== '1')
					{
						$owner_name_dir= ''.$input['store_name'].'/ownerimage/';
						$owner_file_name=''.$input['store_id'];
						$destination_owner_image ='assets/img/store/'.str_replace(' ', '', $owner_name_dir);
						
						$checkSuccessUpdate= $this->validateStoreFields();
						if($checkSuccessUpdate=='1')
						{
							return $this->upload_file(Input::file('owner_image_file'),$destination_owner_image,$owner_file_name);
						}
						else if($checkSuccessUpdate=='0')
						{
							return "Oopps!! something Wrong can't Update Info Please Try Again";
						}
						else
						{
							return $checkSuccessUpdate;
						}						
					}
					else
					{
						
					}
					return $this->validateStoreFields();
				}
				else
				{
					return $this->checkifImagefile(Input::file('owner_image_file'),'Owner Picture');
				}
			}
			else
			{
				return $this->checkifImagefile(Input::file('store_logo_file'),'Store Logo');
			}
		}
		else if($input['store_logo_status'] == 'Nothing_Change' && $input['owner_image_status'] == 'Nothing_Change')
		{
			return $this->validateStoreFields();
		}		
		else if($input['store_logo_status'] == 'Nothing_Change' || $input['owner_image_status'] == 'Nothing_Change')
		{
			if($input['store_logo_status'] != 'Nothing_Change')
			{
				if($this->checkifImagefile(Input::file('store_logo_file'),'Store Logo') == 'true')
				{
					$store_name_dir= ''.$input['store_name'].'/logo/';
					$store_file_name=''.$input['store_id'];
					$destination_store_logo ='assets/img/store/'.str_replace(' ', '', $store_name_dir);
					
					$checkSuccessUpdate= $this->validateStoreFields();
					if($checkSuccessUpdate=='1')
					{
						return $this->upload_file(Input::file('store_logo_file'),$destination_store_logo,$store_file_name);
					}
					else if($checkSuccessUpdate=='0')
					{
						return "Oopps!! something Wrong can't Update Info Please Try Again";
					}
					else
					{
						return $checkSuccessUpdate;
					}
				}
				else
				{
					return $this->checkifImagefile(Input::file('store_logo_file'),'Store Logo');
				}
			}
			else
			{
				if($this->checkifImagefile(Input::file('owner_image_file'),'Owner Picture') == 'true')
				{
					$owner_name_dir= ''.$input['store_name'].'/ownerimage/';
					$owner_file_name=''.$input['store_id'];
					$destination_owner_image ='assets/img/store/'.str_replace(' ', '', $owner_name_dir);
					
					$checkSuccessUpdate= $this->validateStoreFields();
					if($checkSuccessUpdate=='1')
					{
						return $this->upload_file(Input::file('owner_image_file'),$destination_owner_image,$owner_file_name);
					}
					else if($checkSuccessUpdate=='0')
					{
						return "Oopps!! something Wrong can't Update Info Please Try Again";
					}
					else
					{
						return $checkSuccessUpdate;
					}				
				}
				else
				{
					return $this->checkifImagefile(Input::file('owner_image_file'),'Owner Picture');
				}				
			}
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
			$result=$file->move($destination_logo,$file_name.'.'.$extension);
			if(file_exists($result))			
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
			return 'err';
		}
	}
	public function validateStoreFields()
	{
		$attributes = [
			'store_logo_status' => 'Store Logo Status',
			'store_description' => 'Store Description',
			'store_mobile' => 'Store Mobile Number',
			'store_tel_num' => 'Store Tel Number',
			'store_profile_city' => 'Store City',
			'store_profile_area' => 'Store Area',
			'store_about' => 'Store About',
			'store_logo_file' => 'Store Logo',
			
			'owner_image_status' => 'Owner Picture Status',
			'owner_image_file' => 'Owner Picture',
			'owner_mobile' => 'Owner Mobile',
			'owner_tel_num' => 'Store Tel Number',
			'owner_email' => 'Store Email',
			'store_owner_gender' => 'Owner Gender',
			'store_owner_city' => 'Owner City',
			'store_owner_area' => 'Owner Area'
		];								
		$rules = [
			'store_mobile' => 'required',
			'store_tel_num' => 'required',
			'store_about' => 'required',
			'owner_mobile' => 'required',
			'owner_tel_num' => 'required',
			'owner_email' => 'required|email',
			'store_owner_gender' => 'required',					
			//'owner_image_file' => 'mimes:jpeg,png',					
		];								
	$validator = Validator::make(Input::all(),$rules,[],$attributes);
	if ($validator->fails()) {
		 return json_encode($validator->errors()->all());
	}else
	{	$input= Input::all();
		$store_info=storeinfo::find($input['store_id']);
		$store_owner=storeowner::find($input['store_id']);
		try
		{
			$store_info->store_description = $input['store_description'];
			$store_info->store_mobile = $input['store_mobile'];
			$store_info->store_tel_num = $input['store_tel_num'];
			$store_info->store_city = $input['store_profile_city'];
			$store_info->store_area = $input['store_profile_area'];
			$store_info->store_complete_address = $input['store_complete_address'];
			$store_info->store_about = $input['store_about'];
			$store_info->save();
		//	return json_encode($store_owner);
			$store_owner->owner_tel_num = $input['owner_tel_num'];
			$store_owner->owner_mobile = $input['owner_mobile'];
			$store_owner->owner_gender = $input['store_owner_gender'];
			$store_owner->owner_email= $input['owner_email'];
			$store_owner->owner_city= $input['store_owner_city'];
			$store_owner->owner_area= $input['store_owner_area'];
			$store_owner->owner_complete_address =$input['owner_complete_address'];
			$store_owner->save();
			return '1';
		}
		catch(\Exception $e)
		{
			return '0';
		}
	}
	}
	public function checkifImagefile($photo,$imageInfo)
	{
		$extension = strtolower($photo->getClientOriginalExtension()); //get extension
		if($extension =='jpeg' || $extension =='png' || $extension =='jpg')
		{
			$getsize =filesize($photo) /  pow(1024, 2);
			if(round($getsize,0) >1)
			{
				return $imageInfo.' image is too Large less than 1mb is accepted';
			}
			else
			{
				list($width, $height) = getimagesize($photo);
				return 'true';
			}
		}
		else
		{
			return 'Selected '.$imageInfo.' is not an image. accept only jpg and png';	
		}
	}
}
