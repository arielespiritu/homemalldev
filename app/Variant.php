<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Variant extends Model
{
	use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'variant_tbl';
	protected $primaryKey = 'id';
	
	//protected $hidden = ['id', 'variant_name' , 'market_id'];
}
