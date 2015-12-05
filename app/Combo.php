<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Combo extends Model
{
    use SoftDeletes;
	
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'product_combination_tbl';
	protected $primaryKey = 'id';
	
	//protected $fillable = ['id', 'product_id', 'product_variant_id'];

	public function variant() {
        return $this->belongsTo('App\ProductVariant','product_variant_id','id')->with('variant')->withTrashed();
    }
	public function product() {
        return $this->belongsTo('App\Product','product_id','id')->withTrashed();
    }


}
