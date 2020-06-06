<?php

namespace App\Http\Controllers\eccomerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Category;

class EccomerceController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$books = Book::take(4)->orderBy('created_at', 'desc')->get();
    	return view('eccomerce.index', compact('books', 'categories'));
    }

    public function show($slug)
    {
    	$categories = Category::all();
    	$book = Book::where('slug', $slug)->firstOrFail();
    	return view('eccomerce.show', compact('book', 'categories'));
    }

    public function product()
    {
    	$categories = Category::all();
    	$books = Book::orderBy('judul', 'asc')->paginate(12);
    	return view('eccomerce.product', compact('books', 'categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $books = Book::where('judul', 'like', '%'.$request->search.'%')->orWhere('penulis', 'like', '%'.$request->search.'%')->orderBy('judul', 'asc')->paginate(12);
        return view('eccomerce.product', compact('books', 'categories'));
    }

    public function category(Category $category)
    {
    	$categories = Category::all();
    	$books = $category->book()->orderBy('judul', 'asc')->paginate(12);
    	return view('eccomerce.product', compact('books', 'categories'));
    }

    public function about()
    {
        $categories = Category::all();
        return view('eccomerce.about', compact('categories'));
    }
}
