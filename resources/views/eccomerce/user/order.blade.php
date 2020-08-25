@extends('layouts.eccomerce.app')
@section('title', 'Bacalah - Pesanan' )
@section('content')

@include('eccomerce.user.header')
				<div class="col-md-9">
				    <div class="card-header text-white bg-dark text-center">
				      Pesanan
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

						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Invoce</th>
									<th>Total</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $order)
								<tr>
									<td>1</td>
									<td>{{ $order->invoice }}</td>
									<td>{{ $order->total }}</td>
									<td>{{ $order->status }}</td>
									<td><a href="{{ route('user.order.show', $order->id) }}" class="btn btn-success btn-sm">Detail</a ></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
@include('eccomerce.user.footer')
@endsection