<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'location_tbl';
	protected $primaryKey = 'id';
	
	//protected $hidden = ['id','city','major_area'];
}
