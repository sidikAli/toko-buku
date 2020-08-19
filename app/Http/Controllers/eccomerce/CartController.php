<?php

namespace App\Http\Controllers\eccomerce;

use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\StoreAddress;
use App\Address;
use App\Order;
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

        $response = RajaOngkir::ongkosKirim([
                    //kota asal
                    'origin'        => StoreAddress::first()->subdistrict->city->id,
                    //kota tujuan
                    'destination'   => $address->subdistrict->city->id,
                    'weight'        => $berat_total,    // berat barang dalam gram
                    'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
                  ])->get();
        // var_dump ($response);
        // die();
        $ongkir = $response[0]['costs'][0]['cost'][0]['value'];
        
        return $ongkir;
    }

    public function order(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::where('users_id', $user->id)->get();
        // validasi catatan/note
        $request->validate(['catatan' => 'max:128']);

        //data untuk table order
        $invoice = 'INV/'.time().'/BCLH/'.rand(100, 10000);
        $user_id = $user->id;
        $subtotal = 0;
        foreach($carts as $cart){
            $subtotal += $cart->book->harga * $cart->qty;
        }
        $ongkir  = $this->ongkir();
        $total   = $subtotal + $ongkir;
        $status  = 'Menunggu Pembayaran';
        $catatan =  $request->catatan;

        //simpan order
        $order = Order::Create([
            'invoice'   => $invoice,
            'user_id'   => $user_id,
            'subtotal'  => $subtotal,
            'ongkir'    => $user_id,
            'total'     => $total,
            'status'    => $status,
            'catatan'   => $catatan,
        ]);

        //simpan order detail
        foreach ($carts as $cart) {
            
            $order_details = $order->details()->create([
                'product_id' => $cart->book->id,
                'qty' => $cart->qty,
            ]);

        }

        //delete carts
        $carts = Cart::where('users_id', $user->id)->delete();

    }
}
