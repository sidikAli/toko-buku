@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $book }}</h3>

        <p>Buku</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-book"></i>
      </div>
      <a href="{{ route('book.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $category }}</h3>

        <p>Kategori</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ route('category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $user }}</h3>

        <p>User</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{ route('dashboard.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          {{-- <thead>                  
            <tr>
              <th>#</th>
              <th>Nama</th>  
              <th>Kategori</th>  
              <th>Stok</th>
              <th>harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach($books as $book)
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $book->judul }} </td>
              <td> {{ $book->category->name }} </td>
              <td> {{ $book->qty }} </td>
              <td> Rp. {{ $book->harga }} </td>
            </tr>
            @endforeach
          </tbody> --}}
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          {{-- {{ $books->links() }} --}}
        </ul>
      </div>
    </div>
@endsection
