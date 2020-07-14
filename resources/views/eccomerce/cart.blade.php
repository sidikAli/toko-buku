@extends('layouts.eccomerce.app')
@section('title', 'Bacalah - Keranjang' )
@section('content')
<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<form action="{{ route('cart.update') }}" method="post">
					@csrf
					@method('PATCH')
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Judul</th>
									<th class="column-2"></th>
									<th class="column-3">Harga</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
								
								@php($totals = 0)
								@foreach($carts as $cart)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{ asset('buku/'.$cart->book->gambar) }}" alt="IMG">
										</div>
									</td>
									<td class="column-2">{{ $cart->book->judul }}</td>
									<td class="column-3">@currency($cart->book->harga)</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty[]" value="{{ $cart->qty }}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
											<input type="hidden" name="cart_id[]" value="{{ $cart->id }}">
										</div>
									</td>
									@php ($total = $cart->book->harga * $cart->qty)
									@php ($totals += $total)
									<td class="column-5">@currency($total)</td>
								</tr>	
								@endforeach
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
							</div>

							<button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</button>
						</div>
					</div>
					</form>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>
						<div class="flex-w flex-t p-t-20 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									@currency($totals)
								</span>
							</div>
						</div>

						@if($address)
						<a href="{{ route('cart.checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Checkout
						</a>
						@else
						<div class="p-t-10 text-center">
							<a href="{{ route('user.address') }}" class="btn btn-success">Atur Alamat</a>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection