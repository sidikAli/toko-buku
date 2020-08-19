@extends('layouts.eccomerce.app')
@section('title', 'Bacalah - Profil' )
@section('content')

@include('eccomerce.user.header')
				<div class="col-md-9">
				    <div class="card-header text-white bg-dark text-center">
				      Profil
				    </div>
					<div class="card p-5">
						@if(session('success'))
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
						  {{  session('success') }}
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						@endif
					  <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
					  	@csrf
					  	@method('PATCH')
						<div class="form-group">
							<label for="detail">Nama</label>
							<input type="text" class="form-control" name="name" value="{{ $user->name }}">
						</div>
						<div class="form-group">
							<label for="detail">Email</label>
							<input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
						</div>
						<div class="text-right">
							<button class="btn btn-dark" type="submit">Ubah</button>
						</div>
					  </form>
					</div>
				</div>
@include('eccomerce.user.footer')
@endsection