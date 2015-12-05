<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductVariant extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'product_variant_tbl';
	protected $primaryKey = 'id';
	
	//protected $hidden = ['id', 'product_info_id', 'variant_id' , 'variant_name_value', 'created_at', 'updated_at', 'deleted_at'];
	
	public function variant() {
        return $this->belongsTo('App\Variant','variant_id','id')->withTrashed();
    }
	public function product() {
        return $this->belongsTo('App\Combo','product_info_id','id')->withTrashed();
    }
}
