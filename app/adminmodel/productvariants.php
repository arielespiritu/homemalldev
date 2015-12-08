<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class productvariants extends Model
{
	protected $table = 'product_variant_tbl';
    protected $guard = 'id';
    protected $hidden = ['created_at','updated_at','deleted_at'];	 
	 
	 
	 public function getVariant()
	 {
		 
		return $this->belongsTo('App\adminmodel\variants','variant_id','id');
	 }

}
