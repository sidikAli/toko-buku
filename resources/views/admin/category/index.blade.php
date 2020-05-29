@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
@if(session('success'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  {{  session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tambah Kategori</h3>
      </div>
      <div class="card-body">



        <form action="{{ route('category.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="">Kategori</label>
            <input type="text" class="form-control" name="name">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <button type="submit" class="form-control btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th>#</th>
              <th>Nama Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach($categories as $category)
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $category->name }} </td>
              <td>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Hapus</button>
                  <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          {{ $categories->links() }}
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection