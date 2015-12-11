<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FeaturedStore extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'featured_store_tbl';
	protected $primaryKey = 'id';
	
	public function store() {
        return $this->belongsTo('App\Store','store_id','id')->where('store_status','=',"9")->withTrashed();
    }
}

	
	
