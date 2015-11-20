<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Member extends Model
{
    use SoftDeletes;
	
    protected $dates = ['deleted_at'];
    protected $table = 'member_tbl';
	protected $primaryKey = 'id';
	
	protected $fillable = ['id', 'fname', 'lname' , 'email', 'bday', 'mobile', 'gender', 'status', 'created_at', 'updated_at', 'deleted_at'];
	
}
