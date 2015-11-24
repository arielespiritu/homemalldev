<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MarketCategory extends Model
{
    use SoftDeletes;
    protected $table = 'category_tbl';
	protected $primaryKey = 'id';
	protected $fillable = ['id', 'category_name', 'market_id' , 'created_at', 'updated_at', 'deleted_at'];
	
}
