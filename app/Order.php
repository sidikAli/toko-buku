<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = [];

    public function details()
    {
    	return $this->hasMany('App\OrderDetail');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
