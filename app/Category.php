<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function book()
    {
    	return $this->hasMany('App\Book');
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
