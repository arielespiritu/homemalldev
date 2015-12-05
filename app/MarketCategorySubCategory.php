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
	public function product() {
        return $this->hasMany('App\ProductInfo','sub_category_id','id')->withTrashed();
    }
	
}
