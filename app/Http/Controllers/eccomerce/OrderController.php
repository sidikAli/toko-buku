<?php

namespace App\Http\Controllers\eccomerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Order;
use Auth;
class OrderController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$orders = Order::where('user_id', Auth::user()->id)->get();
    	return view('eccomerce.user.order', compact('categories', 'orders'));
    }

    public function show($id)
    {
    	$categories = Category::all();
    	$order = Order::where('id', $id)->first();
    	// dd($order->details);
    	return view('eccomerce.user.order_detail', compact('categories', 'order'));
    }
}
