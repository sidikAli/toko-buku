<?php

namespace App\Http\Controllers\eccomerce;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\StoreAddress;
use App\Address;
use App\Cart;
use App\Category;
use Auth;

class CartController extends Controller
{
    public function index()
    {
    	$categories = Category::all();

        $user_id = Auth::user()->id;
    	$carts   = Cart::where('users_id', $user_id)->get();
        $address = Address::where('user_id', $user_id)->first();

    	return view('eccomerce.cart', compact('carts', 'categories', 'address'));
    }

    public function create(Request $request)
    {
	    $this->validate($request, [
	        'book_id' => 'required|exists:books,id',
	        'qty' => 'required|integer' 
	    ]);

	    //cek jika buku telah ada
	    $carts = Cart::where('users_id', Auth::user()->id)->where('books_id', $request->book_id)->first();
	    if ($carts) {
	    	//update qty
	    	$qty = $request->qty + $carts->qty;
	    	Cart::where('books_id', $request->book_id)->update(['qty' => $qty]);
	    
	    } else {

	    	Cart::create([
	    		'users_id' => $request->user_id,
	    		'books_id' => $request->book_id,
	    		'qty' => $request->qty,
	    	]);

	    }


    	return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
    	$index = 0;
        foreach($request->cart_id as $id){
            $cart = Cart::findOrFail($id);
            //hapus jika qty 0
            if ($request->qty[$index] == 0) {
            	$cart->delete();
            } else{
	            $cart->qty = $request->qty[$index];
	            $cart->save();
            }
            $index++;
        }

        return redirect()->back();
    }

    public function checkout()
    {
        $categories = Category::all();

        $user_id = Auth::user()->id;
        $carts   = Cart::where('users_id', $user_id)->get();
        $address = Address::where('user_id', $user_id)->first();

        //cek total harga buku
        $sub_total = 0;
        foreach($carts as $cart){
            $sub_total += $cart->book->harga * $cart->qty;
        }

        $ongkir = $this->ongkir();
        $total_harga = $sub_total + $ongkir;
        return view('eccomerce.checkout', compact('categories', 'carts', 'ongkir', 'total_harga', 'address'));
    }

    public function ongkir()
    {
        $user_id = Auth::user()->id;
        $carts   = Cart::where('users_id', $user_id)->get();
        $address = Address::where('user_id', $user_id)->first();

        //cek berat barang
        $berat_total = 0;
        foreach($carts as $cart){
            $berat = $cart->book->berat * $cart->qty;
            $berat_total += $berat;
        }

        //cek onkir
        $url = 'https://api.rajaongkir.com/starter/cost';
        $response = Http::withHeaders([
            'key' => '14cab32f812d5497d997a3dfa775f2c0'
        ])->post($url, [
            //alamat toko (kota)
            'origin' => StoreAddress::first()->subdistrict->city->id,
            //alamat tujuan (kecamatan)
            'destination' => $address->subdistrict->id,
            'weight' => $berat_total,
            'courier' => 'jne'
        ])->json();
        
        $ongkir = $response['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        
        return $ongkir;
    }

    public function order(Request $request)
    {
        dd($request);
    }
}
