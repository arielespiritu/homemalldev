<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductInfo extends Model
{
    use SoftDeletes;
	
    protected $dates = ['deleted_at'];
    protected $table = 'product_information_tbl';
	protected $primaryKey = 'id';
	
	protected $fillable = ['id', 'product_name', 'sub_category_id' , 'product_status', 'store_id', 'product_description', 'product_range', 'created_at', 'updated_at', 'deleted_at'];
	
	public function product() {
        return $this->hasMany('App\Product','product_info_id','id')->with('combo')->withTrashed();
    }
	public function productVariantGroup() {
        return $this->hasMany('App\ProductVariant','product_info_id','id')->with('variant')->groupBy('variant_id')->withTrashed();
    }
	public function productVariant() {
        return $this->hasMany('App\ProductVariant','product_info_id','id')->with('variant')->withTrashed();
    }
	
	public function store() {
        return $this->belongsTo('App\Store','store_id','id')->withTrashed();
    }
	
	
}
