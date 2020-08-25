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
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $order }}</h3>

        <p>Pesanan</p>
      </div>
      <div class="icon">
        <i class="ion-android-cart"></i>
      </div>
      <a href="{{ route('dashboard.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<div class="card">
      <!-- /.card-header -->
      <div class="card-header">
        <h3>Data Pesanan</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Invoice</th>  
              <th>Total</th>  
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach($orders as $order)
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $order->user->name }} </td>
              <td> {{ $order->invoice }} </td>
              <td> {{ $order->total }} </td>
              <td> {{ $order->status }} </td>
              <td>
                <a href="#" class="btn btn-success btn-sm">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
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
