<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Store extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'store_tbl';
	protected $primaryKey = 'id';
	//protected $hidden = ['id', 'store_name', 'store_description' , 'store_mobile', 'store_tel_num', 'store_city', 'store_area', 'store_complete_address', 'store_about'];
}
