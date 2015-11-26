<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category_tbl';   
	
	protected $maps = ['id' => 'CI1', 'category_name' => 'CN2','market_id' => 'MI1','created_at' => 'CA3','updated_at' => 'UA4','deleted_at' => 'DA5'];
	protected $appends = ['CI1','CN2','MI1','CA3','UA4','DA5'];	
	protected $hidden = ['category_name', 'id','market_id','created_at','updated_at','deleted_at'];
	
	
	public function getCI1Attribute($value)
    {
        return $this->attributes['id'];
    }
	public function getCN2Attribute($value)
    {
        return $this->attributes['category_name'];
    }
	public function getMI1Attribute($value)
    {
        return $this->attributes['market_id'];
    }
	public function getCA3Attribute($value)
    {
        return $this->attributes['created_at'];
    }
	public function getUA4Attribute($value)
    {
        return $this->attributes['updated_at'];
    }
	public function getDA5Attribute($value)
    {
        return $this->attributes['deleted_at'];
    }
	
}
