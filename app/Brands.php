<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brand_tbl';
	protected $primaryKey = 'id';
	
	//protected $hidden = ['id', 'brand_name', 'brand_indicator', 'market_id' ];
}
