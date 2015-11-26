<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    protected $table = 'location_tbl';  
	
	protected $maps = ['id' => 'LI1','city' => 'LC2','major_area' => 'LMA3','visibility' => 'LV4'];
	protected $appends = ['LI1','LC2','LMA3','LV4'];	
	protected $hidden = ['id', 'city','major_area','visibility'];

	public function getLI1Attribute($value)
	{
		return $this->attributes['id'];
	}
	public function getLC2Attribute($value)
	{
		return $this->attributes['city'];
	}	
	public function getLMA3Attribute($value)
	{
		return $this->attributes['major_area'];
	}	
	public function getLV4Attribute($value)
	{
		return $this->attributes['visibility'];
	}	
}
