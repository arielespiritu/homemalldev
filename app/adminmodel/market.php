<?php

namespace App\adminmodel;

use Illuminate\Database\Eloquent\Model;

class market extends Model
{
    protected $table = 'market_tbl';   
	
	protected $maps = ['id' => 'MI1', 'market_name' => 'MN2','market_interest_rate' => 'MI3'];
	protected $appends = ['MI1', 'MN2','MI3'];	
	protected $hidden = ['market_name', 'id','market_interest_rate'];
	protected $fillable = ['MN2','MI3'];	
	
	public function getMI1Attribute($value)
    {
        return $this->attributes['id'];
    }
	public function getMN2Attribute($value)
    {
        return $this->attributes['market_name'];
    }
	public function getMI3Attribute($value)
    {
        return $this->attributes['market_interest_rate'];
    }
}
