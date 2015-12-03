<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Store extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'store_tbl';
	protected $primaryKey = 'id';
	protected $fillable = ['id', 'store_name', 'store_description' , 'store_mobile', 'store_tel_num', 'store_city', 'store_area', 'store_complete_address', 'store_about', 'created_at', 'updated_at', 'deleted_at'];
}
