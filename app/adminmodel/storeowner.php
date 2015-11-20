<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class storeowner extends Model
{
     protected $table = 'store_owner_tbl';   
	 
	 
	public function showStoreInfo()
	{
		return $this->hasOne('App\adminmodel\storeinfo','id','store_id');
	}
}
