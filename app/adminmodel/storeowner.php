<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class storeowner extends Model
{
     protected $table = 'store_owner_tbl';   
	 protected $primaryKey='store_id';
	 
	public function showStoreInfo()
	{
		return $this->hasOne('App\adminmodel\storeinfo','id','store_id');
	}
}
