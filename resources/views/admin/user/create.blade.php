@extends('layouts.admin')

@section('title', 'Tambah User')

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
  <div class="card-body">
    <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
      @csrf

      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
          @error('name')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
          @error('email')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
          @error('password')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="role" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
          <select name="role" id="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
          @error('role')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>

      
      <div class="d-flex justify-content-end">
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
        <button class="btn btn-primary ml-3" type="submit">Tambah</button>
      </div>
    </form>
  </div>
</div>
@endsection