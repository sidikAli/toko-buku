@extends('layouts.eccomerce.app')
@section('title', 'Bacalah - Profil' )
@section('content')

<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('eccomerce/') }}/images/book.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Profil
		</h2>
	</section>	

<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
					  <div class="card-header text-white bg-dark ">
					    Pengaturan
					  </div>
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item"><a href="{{ route('user.index') }}">Profil</a></li>
					    <li class="list-group-item"><a href="{{ route('user.address') }}">Alamat</a></li>
					  </ul>
					</div>
				</div>
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
			</div>
		</div>
	</div>
@endsection