<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class productscombo extends Model
{
   protected $table = 'product_tbl';
   
   
   	public function getCombo()
	{
		
		return $this->hasMany('App\adminmodel\productcombination', 'product_id', 'id');
		
	}
}
