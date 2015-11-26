<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $table = 'sub_category_tbl';
	
	protected $maps = ['id' => 'SC1', 'category_id' => 'CI1','sub_category_name' => 'SCN3','created_at' => 'CA4','updated_at' => 'UA5','deleted_at' => 'DA6'];
	protected $appends = ['SC1','CI1','SCN3','CA4','UA5','DA6'];	
	protected $hidden = ['id', 'category_id','sub_category_name','created_at','updated_at','deleted_at'];	
	
	public function getSC1Attribute($value)
    {
        return $this->attributes['id'];
    }	
	public function getCI1Attribute($value)
    {
        return $this->attributes['category_id'];
    }	
	public function getSCN3Attribute($value)
    {
        return $this->attributes['sub_category_name'];
    }	
	public function getCA4Attribute($value)
    {
        return $this->attributes['created_at'];
    }	
	public function getUA5Attribute($value)
    {
        return $this->attributes['updated_at'];
    }	
		public function getDA6Attribute($value)
    {
        return $this->attributes['deleted_at'];
    }	
	
}
