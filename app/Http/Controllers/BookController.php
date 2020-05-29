<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Book;
use App\Category;
use File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(7);
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'             => 'required',
            'penulis'           => 'required',
            'penerbit'          => 'required',
            'deskripsi'         => 'required|min:10',
            'gambar'            => 'required|image|max:10240|mimes:jpg,jpeg,png',
            'harga'             => 'required|integer',
            'jumlah_halaman'    => 'required|integer',
            'berat'             => 'required|integer',
            'qty'               => 'required|integer',
            'kategori'          => 'required|integer'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            //buat nama baru
            $namaGambar = time() . uniqid() . "." . $gambar->getClientOriginalExtension();
            //simpan gambar ke folder
            $gambar->move('buku', $namaGambar);
            //simpan ke database
            $buku = Book::create([
                'judul'        => $request->judul,  
                'penulis'      => $request->penulis,  
                'penerbit'     => $request->penerbit,  
                'deskripsi'    => $request->deskripsi,  
                'gambar'       => $namaGambar,  
                'harga'        => $request->harga,  
                'jumlah_halaman'=> $request->jumlah_halaman,  
                'berat'        => $request->berat,  
                'qty'          => $request->qty,  
                'slug'         => Str::slug($request->judul),
                'category_id'  => $request->kategori,  
            ]);

            return redirect()->route('book.index')->with('Buku berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id); 
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.book.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'             => 'required',
            'penulis'           => 'required',
            'penerbit'          => 'required',
            'deskripsi'         => 'required|min:10',
            'harga'             => 'required|integer',
            'jumlah_halaman'    => 'required|integer',
            'berat'             => 'required|integer',
            'qty'               => 'required|integer',
            'kategori'       => 'required|integer'
        ]);

        $book = Book::findOrFail($id); 

        $data = [
            'judul'        => $request->judul,  
            'penulis'      => $request->penulis,  
            'penerbit'     => $request->penerbit,  
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,  
            'jumlah_halaman'=> $request->jumlah_halaman,  
            'berat'        => $request->berat,  
            'qty'          => $request->qty,
            'slug'         => Str::slug($request->judul),  
            'category_id'  => $request->kategori,  
        ];


        if ($request->hasFile('gambar')) {
            //validasi gambar
            $request->validate = [ 'gambar' => 'required|image|max:10240|mimes:jpg,jpeg,png'];
            //ambil gambar
            $gambar = $request->file('gambar');
            //buat nama baru
            $namaGambar = time() . uniqid() . "." . $gambar->getClientOriginalExtension();
            //simpan gambar ke folder
            $gambar->move('buku', $namaGambar);
            //hapus gambar yang ada
            File::delete('buku/'.$book->gambar);
            //tambah gambar ke array data
            $data['gambar'] = $namaGambar;
        }

        $book->update($data);
        return redirect()->route('book.index')->with('Buku berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Book::findOrFail($id);
        //hapus file
        File::delete('buku/'. $buku->gambar);
        //hapus data
        $buku->delete();

        return redirect()->route('book.index')->with('Buku berhasil dihapus');
    }
}
