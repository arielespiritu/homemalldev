<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class productcombination extends Model
{
    protected $table = 'product_combination_tbl';
    protected $guarded = 'id';
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $fillable = ['product_id','product_variant_id'];
	
	
	public function getProductVariant()
	{
			return $this->belongsTo('App\adminmodel\productvariants','product_variant_id','id')->with('getVariant');
	}
}

