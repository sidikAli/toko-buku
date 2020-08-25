@extends('layouts.admin')

@section('title', 'Data User')

@section('content')
@if(session('success'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  {{  session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
    <div class="card">
      <div class="card-header">
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th>#</th>
              <th>Nama</th>  
              <th>Email</th>  
              <th>Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach($users as $user)
            <tr>
              <td> {{ $no++ }} </td>
              <td> {{ $user->name }} </td>
              <td> {{ $user->email }} </td>
              <td> {{ $user->role }} </td>
              <td>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                  <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
          {{ $users->links() }}
        </ul>
      </div>
    </div>
@endsection