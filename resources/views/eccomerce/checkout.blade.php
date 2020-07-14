@extends('layouts.eccomerce.app')
@section('title', 'Bacalah - Checkout' )
@section('content')

	<div class="bg0 p-t-80 p-b-85">
		<div class="container">
			<h2 class="text-center mb-3">Checkout</h2>
			<div class="row d-flex justify-content-center">
				<div class="col-lg-8">
					<div class="card p-2">
						<table class="table table-borderless">
							<tr>
								<th>Buku</th>
								<th width="15%">Harga</th>
							</tr>
							@foreach($carts as $cart)
							<tr>
								<td>{{ $cart->book->judul }} x {{ $cart->qty }}</td>
								<td>@currency($cart->book->harga * $cart->qty)</td>
							</tr>
							@endforeach
							<tr>
								<td>Ongkir</td>
								<td>@currency($ongkir)</td>
							</tr>
							<tr>
								<td><b>Total</b></td>
								<td>@currency($total_harga)</td>
							</tr>
							<tr>
								<td colspan="2">
									Alamat Tujuan : ({{ Auth::user()->name }})
									{{ $address->subdistrict->name }},
									{{ $address->subdistrict->city->name }},
									{{ $address->subdistrict->city->province->name }}.
									{{ $address->detail }}
								</td>
							</tr>
						</table>
						<div class="mr-2 ml-2">
							<form action="{{ route('cart.order') }}" method="POST">
								@csrf
								{{-- <div class="form-group">
									<label>Nomor Handphone</label>
									<input type="number" name="hp" class="form-control">
								</div> --}}
								<div class="form-group">
									<label>Catatan</label>
									<textarea name="catatan" class="form-control" style="resize: none;"></textarea>
								</div>
								<input type="hidden" value="{{ $total_harga }}" name="total_harga">
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">Pesan Sekarang</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection