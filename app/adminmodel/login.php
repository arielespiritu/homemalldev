<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    protected $table = 'users';   
	protected $visible = ['email', 'password'];
	protected $hidden = ['password', 'remember_token'];
	
}
