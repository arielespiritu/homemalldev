<?php

namespace App\Http\Controllers\AdminConn;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
class store extends Controller
{
	public function validateUpdate(Request $request)
	{
		$input= Input::all();
	///	return $input['store_logo_status'].''.$input['owner_image_status'];
		if($input['store_logo_status'] != 'Nothing_Change' && $input['owner_image_status'] != 'Nothing_Change')
		{
			if($this->checkifImagefile(Input::file('store_logo_file'),'Store Logo') == 'true')
			{
				if($this->checkifImagefile(Input::file('owner_image_file'),'Owner Picture') == 'true')
				{
					return $this->validateFields();
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
		elseif($input['store_logo_status'] == 'Nothing_Change' || $input['owner_image_status'] == 'Nothing_Change')
		{
			if($input['store_logo_status'] != 'Nothing_Change')
			{
				
				if($this->checkifImagefile(Input::file('store_logo_file'),'Store Logo') == 'true')
				{
					return $this->validateFields();
				}
				else
				{
					return $this->checkifImagefile(Input::file('store_logo_file'),'Store Logo');
				}
			}
			else
			{
				
				if($this->checkifImagefile(Input::file('owner_image_file'),'Store Logo') == 'true')
				{
					 return $this->validateFields();
				}
				else
				{
					return $this->checkifImagefile(Input::file('owner_image_file'),'Store Logo');
				}				
			}
		}
	

	}
	
	public function validateFields()
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
	}else{
		return '1';
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
