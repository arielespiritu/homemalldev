<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class inventorydetails extends Model
{
   protected $table = 'inventory_details_tbl';
   protected $hidden = ['created_at'.'updated_at','deleted_at'];
   protected $guard = 'id';
   protected $fillable = ['product_id','quantity'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
