<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    protected $table = 'location_city';
	protected $primaryKey = 'id';
	
	protected $fillable = ['id', 'city_name'];
	
	public function area() {
        return $this->hasMany('App\Area','city','id');
    }
}
