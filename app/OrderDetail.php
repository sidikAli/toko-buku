<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = [];

    public function book()
    {
    	return $this->belongsTo('App\Book', 'product_id');
    }
}
