@extends('layouts.eccomerce.app')
@section('title', 'Bacalah - Pesanan' )
@section('content')

@include('eccomerce.user.header')
				<div class="col-md-9">
				    <div class="card-header text-white bg-dark text-center">
				      Detail Pesanan
				    </div>
					<div class="card p-5">
						<table class="table">
							<tr>
								<td>Invoice</td>
								<td>{{ $order->invoice }}</td>
							</tr>

							{{-- buku --}}
							@foreach($order->details as $item)
							<tr>
								<th>{{ $item->book->judul }} x{{ $item->qty }}</th>
								<td>{{ $item->book->harga * $item->qty }}</td>
							</tr>
							@endforeach

							<tr>
								<td>Subtotal</td>
								<td>{{ $order->subtotal }}</td>
							</tr>

							<tr>
								<td>Ongkir</td>
								<td>{{ $order->ongkir }}</td>
							</tr>

							<tr>
								<td>Total</td>
								<td>{{ $order->total }}</td>
							</tr>

							<tr>
								<td>Status</td>
								<td>{{ $order->status }}</td>
							</tr>
						</table>
						<div class="">
							<a href="#" class="btn btn-success w-100">
								Bayar Sekarang
							</a>
						</div>
					</div>
				</div>
@include('eccomerce.user.footer')
@endsection