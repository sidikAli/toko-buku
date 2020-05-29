<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreAddress extends Model
{
	protected $guarded = [];

    public function subdistrict()
    {
    	return $this->belongsTo('App\Subdistrict', 'subdistricts_id');
    }
}
