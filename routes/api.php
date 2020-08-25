<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/getcity', 'eccomerce\AddressController@getCity');
Route::get('/getsubdistrict', 'eccomerce\AddressController@getSubdistrict');
