@extends('layouts.admin')

@section('title', 'Edit Buku')

@section('content')
<div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
          <input type="text" name="judul" class="form-control" id="judul" value="{{ $book->judul }}">
          @error('judul')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="penulis" class="col-sm-2 col-form-label">Nama Penulis</label>
        <div class="col-sm-10">
          <input type="text" name="penulis" class="form-control" id="penulis" value="{{ $book->penulis }}">
          @error('penulis')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
          <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ $book->penerbit }}">
          @error('penerbit')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
          <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{$book->deskripsi}}</textarea>
          @error('deskripsi')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="jumlah_halaman" class="col-sm-2 col-form-label">Jumlah Halaman</label>
        <div class="col-sm-10">
          <input type="text" name="jumlah_halaman" class="form-control" id="jumlah_halaman" value="{{ $book->jumlah_halaman }}">
          @error('jumlah_halaman')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
          <input type="number" name="harga" class="form-control" id="harga" value="{{ $book->harga }}">
          @error('harga')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>


      <div class="form-group row">
        <label for="berat" class="col-sm-2 col-form-label">Berat (gram)</label>
        <div class="col-sm-10">
          <input type="number" name="berat" class="form-control" id="berat" value="{{ $book->berat }}">
          @error('berat')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="qty" class="col-sm-2 col-form-label">Stok</label>
        <div class="col-sm-10">
          <input type="number" name="qty" class="form-control" id="qty" value="{{ $book->qty }}">
          @error('qty')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
          <select name="kategori" id="kategori" class="form-control">
            @foreach($categories as $category)
              <option value="{{ $category->id }}" @if($category->id==$book->category_id) selected @endif>{{ $category->name }}</option>
            @endforeach
          </select>
          @error('kategori')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
          <input type="file" name="gambar" class="form-control" id="gambar">
          @error('gambar')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>      
      
      <div class="d-flex justify-content-end">
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary ml-3" type="submit">Edit</button>
      </div>
    </form>
  </div>
</div>
@endsection