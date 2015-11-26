<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class city extends Model
{
    protected $table = 'location_city'; 
	
	protected $maps = ['id' => 'CT1', 'city_name' => 'CTN2'];
	protected $appends = ['CT1','CTN2'];	
	protected $hidden = ['id', 'id','city_name'];
	
	
	public function viewAllLocations()
	{
	return $this->hasMany('App\adminmodel\location','city','CT1');
	}
	
	public function getCT1Attribute($value)
	{
		return $this->attributes['id'];
	}
	public function getCTN2Attribute($value)
	{
		return $this->attributes['city_name'];
	}	

}
