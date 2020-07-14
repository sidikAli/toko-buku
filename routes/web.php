<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'eccomerce\EccomerceController@index')->name('eccomerce.index');
Route::get('/buku/{slug}', 'eccomerce\EccomerceController@show')->name('eccomerce.show');
Route::get('/produk', 'eccomerce\EccomerceController@product')->name('eccomerce.product');
Route::get('/produk/cari', 'eccomerce\EccomerceController@search')->name('eccomerce.search');
Route::get('/kategori/{category}', 'eccomerce\EccomerceController@category')->name('eccomerce.category');
Route::get('/tentang', 'eccomerce\EccomerceController@about')->name('eccomerce.about');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkRole:admin'] ], function() {
	Route::resource('/category', 'CategoryController')->except(['create', 'show']);
	Route::resource('/book', 'BookController');
	Route::get('/dashboard', 'HomeController@index')->name('dashboard.index');

	Route::get('/pengaturan/alamat', 'StoreAddressController@index')->name('store.address');
	Route::post('/pengaturan/alamat', 'StoreAddressController@add')->name('add.store.address');
	Route::get('/pengaturan/alamat/{id}/edit', 'StoreAddressController@edit')->name('store.address.edit');
	Route::patch('/pengaturan/alamat/{id}', 'StoreAddressController@update')->name('store.address.update');
});

Route::group(['middleware' => ['auth', 'checkRole:user'] ], function() {
	Route::get('/keranjang', 'eccomerce\CartController@index')->name('cart.index');
	Route::post('/keranjang', 'eccomerce\CartController@create')->name('cart.create');
	Route::patch('/keranjang', 'eccomerce\CartController@update')->name('cart.update');

	Route::get('/checkout', 'eccomerce\CartController@checkout')->name('cart.checkout');
	Route::post('/pesan', 'eccomerce\CartController@order')->name('cart.order');

	Route::resource('/user', 'eccomerce\UserController')->except(['create', 'show', 'store', 'destroy']);
	
	Route::get('/alamat', 'eccomerce\AddressController@index')->name('user.address');
	Route::post('/alamat', 'eccomerce\AddressController@store')->name('user.address.store');
	Route::get('/alamat/{id}/edit', 'eccomerce\AddressController@edit')->name('user.address.edit');
	Route::patch('/alamat/{id}', 'eccomerce\AddressController@update')->name('user.address.update');
});
