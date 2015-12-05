<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $table = 'sub_category_tbl';
	
	protected $maps = ['id' => 'SC1', 'category_id' => 'CI1','sub_category_name' => 'SCN3'];
	protected $appends = ['SC1','CI1','SCN3'];	
	protected $fillable = ['CI1','SCN3'];	
	protected $hidden = ['id', 'category_id','sub_category_name','created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];	
	
//getter
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
//setter	
	public function setCI1Attribute($value)
    {
        return $this->attributes['category_id']=$value ;
    }	
	public function setSCN3Attribute($value)
    {
        return $this->attributes['sub_category_name']=$value;
    }


	
	
}
