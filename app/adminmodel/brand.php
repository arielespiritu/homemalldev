<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brand_tbl';  
	
	protected $maps = ['id' => 'BI1','brand_name' => 'BN2', 'brand_indicator' => 'BINR3', 'market_id' => 'MI1','created_at' => 'CA5','updated_at' => 'UA7','deleted_at' => 'DA6'];
	protected $appends = ['BI1','BN2','BINR3','MI1','CA5','UA7','DA6'];	
	protected $hidden = ['id', 'brand_name','brand_indicator','market_id','created_at','updated_at','deleted_at'];
	
	public function getBI1Attribute($value)
	{
		return $this->attributes['id'];
	}
	public function getBN2Attribute($value)
	{
		return $this->attributes['brand_name'];
	}
	public function getBINR3Attribute($value)
	{
		return $this->attributes['brand_indicator'];
	}
	public function getMI1Attribute($value)
	{
		return $this->attributes['market_id'];
	}	
	public function getUA7Attribute($value)
	{
		return $this->attributes['updated_at'];
	}	
	public function getCA5Attribute($value)
	{
		return $this->attributes['created_at'];
	}	
	public function getDA6Attribute($value)
	{
		return $this->attributes['deleted_at'];
	}	

}
