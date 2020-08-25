<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Book;
use App\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::get()->count();
        $category = Category::get()->count();
        $book = Book::get()->count();
        $order = Order::get()->count();

        $orders = Order::paginate(10);
        return view('admin.dashboard.index', compact('user', 'category', 'book', 'order', 'orders'));
    }
}
