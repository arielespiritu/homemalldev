<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FeaturedProducts extends Model
{
    use SoftDeletes;
	
    protected $dates = [ 'created_at', 'updated_at', 'deleted_at'];
    protected $table = 'featured_product_tbl';
	protected $primaryKey = 'id';
	
	//protected $fillable = ['id', 'product_info_id', 'status' ,  'created_at', 'updated_at', 'deleted_at'];

	public function product_info() {
        return $this->belongsTo('App\ProductInfo','product_info_id','id')->with('product')->with('store')->with('productVariantGroup')->with('productVariant');
    }
}
