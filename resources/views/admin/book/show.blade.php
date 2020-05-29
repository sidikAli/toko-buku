@extends('layouts.admin')

@section('title', 'Detail Buku')

@section('content')
   <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="{{asset('buku/' . $book->gambar)}}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{ $book->judul }}</h3>
              <h5 class="text-info text-uppercase">{{ $book->penulis }} - <span class="text-warning">{{ $book->penerbit }}</span></h5>
              <hr>
              <textarea class="detail-textarea form-control" style="resize: none;" rows="10" readonly="">{{ $book->deskripsi }}</textarea>

                  <div class="btn-group mt-4 btn-group-toggle w-100" data-toggle="buttons">
                    <label class="btn btn-default text-center active">
                      <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                      Stok
                      <br>
                      <h3>{{ $book->qty }}</h3>
                    </label>
                    <label class="btn btn-default text-center active">
                      <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                      Halaman
                      <br>
                      <h3>{{ $book->jumlah_halaman }}</h3>
                    </label>
                    <label class="btn btn-default text-center active">
                      <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                      Berat
                      <br>
                      <h3>{{ $book->berat }} Gram</h3>
                    </label>
                    <label class="btn btn-default text-center active">
                      <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                      Kategori
                      <br>
                      <h3>{{ $book->category->name }}</h3>
                    </label>
                  </div>
              <div class="bg-gray py-2 px-3 mt-4">
                 <h2 class="mb-0">
                  Rp. {{ $book->harga }}
                </h2>
              </div>

              <div class="mt-4">
                <a href="{{ route('book.index') }}" class="btn btn-primary btn-lg btn-flat">
                  Kembali
                </a>
              </div>

            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection