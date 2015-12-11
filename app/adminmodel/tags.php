<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
	protected $table = 'product_tags_tbl';
	protected $fillable = ['product_info_id','tag_description'];
	protected $guarded = "id";
	protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
