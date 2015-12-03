<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'product_tbl';
	protected $primaryKey = 'id';
	
	protected $fillable = ['id', 'product_info_id', 'sale_price' , 'retail_price', 'product_cost', 'quantity', 'active_price', 'product_status', 'created_at', 'updated_at', 'deleted_at'];
	
	public function product_info() {
        return $this->belongsTo('App\ProductInfo','product_info_id','id')->withTrashed();
    }
	public function combo() {
        return $this->hasMany('App\Combo','product_id','id')->with('variant')->withTrashed();
    }
	
}
