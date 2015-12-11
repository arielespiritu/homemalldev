<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MarketCategorySubCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'sub_category_tbl';
	protected $primaryKey = 'id';
	
	public function category() {
        return $this->belongsTo('App\MarketCategory','category_id','id')->orderBy('sub_category_name','asc')->withTrashed();
    }
	public function productList() {
        return $this->hasMany('App\ProductInfo','sub_category_id','id')->with('store')->where('product_status','=','9')->withTrashed();
    }
	public function products() {
        return $this->hasMany('App\ProductInfo','sub_category_id','id')->with('store')->with('product')->where('product_status','=','9')->withTrashed();
    }
	public function products_random() {
        return $this->hasMany('App\ProductInfo','sub_category_id','id')->with('store')->with('product')->where('product_status','=','9')->orderByRaw("RAND()")->withTrashed();
    }
	public function productsStore() {
        return $this->hasMany('App\ProductInfo','sub_category_id','id')->with('store')->with('productVariant')->where('product_status','=','9')->withTrashed();
    }
	
	
	
}
