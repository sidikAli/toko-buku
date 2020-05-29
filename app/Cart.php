<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function book()
    {
    	return $this->belongsTo('App\Book', 'books_id');
    }
}
