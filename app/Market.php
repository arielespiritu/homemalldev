<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Market extends Model
{
    protected $table = 'market_tbl';
	protected $primaryKey = 'id';
	
	//protected $hidden = ['id', 'market_name', 'market_interest_rate' ];
	
	public function category() {
        return $this->hasMany('App\MarketCategory','market_id','id')->with('subCategory')->orderBy('category_name','asc')->withTrashed();	
    }
	public function categoryStore() {
        return $this->hasMany('App\MarketCategory','market_id','id')->with('subCategoryStore')->orderByRaw("RAND()")->withTrashed();	
    }


}
