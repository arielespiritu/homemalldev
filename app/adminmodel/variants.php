<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class variants extends Model
{
    protected $table = 'variant_tbl';  
	
	protected $maps = ['id' => 'VT1', 'variant_name' => 'VN2','market_id' => 'MI1','created_at' => 'CA4','updated_at' => 'UA6','deleted_at' => 'DA5'];
	protected $appends = ['VT1','VN2','MI1','CA4','UA6','DA5'];	
	protected $hidden = ['id', 'variant_name','market_id','created_at','updated_at','deleted_at'];
	
	public function getVT1Attribute($value)
    {
        return $this->attributes['id'];
    }
	public function getVN2Attribute($value)
    {
        return $this->attributes['variant_name'];
    }
	public function getMI1Attribute($value)
    {
        return $this->attributes['market_id'];
    }
	public function getCA4Attribute($value)
    {
        return $this->attributes['created_at'];
    }
	public function getUA6Attribute($value)
    {
        return $this->attributes['updated_at'];
    }
	public function getDA5Attribute($value)
    {
        return $this->attributes['deleted_at'];
    }

	
}
