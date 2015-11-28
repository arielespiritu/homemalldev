<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brand_tbl';  
	
	protected $maps = ['id' => 'BI1','brand_name' => 'BN2', 'brand_indicator' => 'BINR3', 'market_id' => 'MI1'];
	protected $appends = ['BI1','BN2','BINR3','MI1'];	
	protected $hidden = ['id', 'brand_name','brand_indicator','market_id'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
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

	public function setBI1Attribute($value)
	{
		return $this->attributes['id']=$value;
	}
	public function setBN2Attribute($value)
	{
		return $this->attributes['brand_name']=$value;
	}
	public function setBINR3Attribute($value)
	{
		return $this->attributes['brand_indicator']=$value;
	}
	public function setMI1Attribute($value)
	{
		return $this->attributes['market_id']=$value;
	}		

}
