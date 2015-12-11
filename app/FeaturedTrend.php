<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FeaturedTrend extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'featured_trends_tbl';
	protected $primaryKey = 'id';
	
	public function product_info() {
        return $this->belongsTo('App\ProductInfo','product_id','id')->with('store')->with('product')->where('product_status','=','9')->withTrashed();
    }
}
