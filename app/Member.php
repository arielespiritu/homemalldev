<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Member extends Model
{
    use SoftDeletes;
	
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'member_tbl';
	protected $primaryKey = 'id';
	
	protected $fillable = ['fname', 'lname' , 'email', 'bday', 'mobile', 'gender', 'status'];
	
}
