<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FeaturedCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'featured_category_tbl';
	protected $primaryKey = 'id';
	
	public function category() {
        return $this->belongsTo('App\MarketCategory','category_id','id')->withTrashed();
    }
	public function market() {
        return $this->belongsTo('App\Market','market_id','id')->withTrashed();
    }
	public function categoryProduct() {
        return $this->hasMany('App\FeaturedCategoryProduct','featured_category_id','id')->with('products')->withTrashed();
    }
}
