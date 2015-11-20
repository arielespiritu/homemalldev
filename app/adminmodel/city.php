<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'location_city';  
	
  public function viewAllLocations()
  {
	return $this->hasMany('App\adminmodel\location','city','city_id');
  }
}
