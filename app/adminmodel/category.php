<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category_tbl';   
	
	protected $maps = ['id' => 'CI1', 'category_name' => 'CN2','market_id' => 'MI1'];
	protected $appends = ['CI1','CN2','MI1'];	
	protected $hidden = ['category_name', 'id','market_id','created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
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

	
}
