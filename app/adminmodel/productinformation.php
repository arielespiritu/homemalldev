<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class productinformation extends Model
{
    protected $table = 'product_information_tbl';  
	protected $fillable = ['product_name','sub_category_id','product_status','store_id','product_description','product_range'];
	protected $guarded = "id";
	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	public function getChild()
	{
		return $this->hasMany('App\adminmodel\productscombo', 'product_info_id', 'id')->with('getCombo')->with('getStatus')->with('getPriceStatus')->with('getInventory');
	}
	public function getSubCategoryName()
	{
		return $this->hasOne('App\adminmodel\subcategory', 'id', 'sub_category_id')->with('getCategory');
	}
	public function getStatus()
	{
		return $this->hasOne('App\adminmodel\indicator', 'id', 'product_status');
	}
	// protected $maps = ['id' => 'PI1','product_name' => 'PIN2', 'sub_category_id' => 'SC1', 'product_status' => 'PIS3','store_id' => 'SI1','product_description' => 'PID4','product_range' => 'PIR5','updated_at' => 'UA6','created_at' => 'CA7','deleted_at' => 'DA8'];
	// protected $appends = ['PI1','PIN2','SC1','PIS3','SI1','PID4','PIR5','CA7','UA6','DA8'];	
	// protected $hidden = ['id', 'product_name','sub_category_id','product_status','store_id','product_description','product_range','created_at','updated_at','deleted_at'];
	
	// public function get PI1 Attribute($value)
	// {
		// return $this->attributes['id'];
	// }
	// public function get PIN2 Attribute($value)
	// {
		// return $this->attributes['product_name'];
	// }
	// public function get SC1 Attribute($value)
	// {
		// return $this->attributes['sub_category_id'];
	// }	
	// public function get PIS3 Attribute($value)
	// {
		// return $this->attributes['product_status'];
	// }
	// public function get SI1 Attribute($value)
	// {
		// return $this->attributes['store_id'];
	// }	
	// public function get PID4 Attribute($value)
	// {
		// return $this->attributes['product_description'];
	// }		
	// public function get PIR5 Attribute($value)
	// {
		// return $this->attributes['product_range'];
	// }
	// public function get PIR4 Attribute($value)
	// {
		// return $this->attributes['product_range'];
	// }	
}
