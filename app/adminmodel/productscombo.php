<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class productscombo extends Model
{
	protected $table = 'product_tbl';
	protected $fillable = ['product_info_id','sale_price','retail_price','product_cost','active_price','product_status'];
	protected $guarded = "id";
	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	public function getCombo()
	{
		return $this->hasMany('App\adminmodel\productcombination', 'product_id', 'id')->with('getProductVariant');
	}
	public function getStatus()
	{
		return $this->hasOne('App\adminmodel\indicator', 'id', 'product_status');
	}
	public function getPriceStatus()
	{
		return $this->hasOne('App\adminmodel\indicator', 'id', 'active_price');
	}
	public function  getInventory()
	{
		return $this->hasMany('App\adminmodel\inventorydetails', 'product_id', 'id')->select('quantity')->selectRaw('product_id,sum(quantity) as total_inv')->groupBy('product_id');
	}
	public function  getParenInventory()
	{
		return $this->hasMany('App\adminmodel\inventorydetails', 'product_id', 'id');
	}
}
					