<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $guarded = [];
	
    public function Category()
    {
    	return $this->belongsTo('App\Category');
    }
}
