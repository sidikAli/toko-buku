@extends('layouts.eccomerce.app')
@section('title', 'Bacalah - ' . ucwords(strtolower($book->judul)) )
@section('content')
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row mt-5">
				<div class="col-md-4 col-lg-5 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-pic-w pos-relative">
								<img src="{{ asset('buku/'.$book->gambar) }}" class="img-thumbnail" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-8 col-lg-7 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h3 class="mtext-105 cl2 js-name-detail p-b-14">
							{{ $book->judul }}
						</h3>
						<div class="text-warning mb-4 font-weight-bold">
							{{ strtoupper($book->penulis) }} - <span>{{ strtoupper($book->penerbit) }}</span>
						</div>

						<span class="mtext-106 cl2">
							@currency($book->harga)
						</span>
						
						<!--  -->
						<div class="p-t-30">
							<span>Stok : {{ $book->qty }}</span>
							<form action="{{ route('cart.create') }}" method="POST">
								@csrf
								@if(Route::has('login'))
				                    @auth
				                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
				                    @endauth
				                @endif
								<div class="flex-w p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" value="1" name="qty">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
										<input type="hidden" name="book_id" value="{{ $book->id }}">
										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
											Beli
										</button>
									</div>
								</div>	
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Deskripsi</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Spesifikasi</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{{ $book->deskripsi }}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Berat
											</span>

											<span class="stext-102 cl6 size-206">
												{{ $book->berat }} Gram
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Halaman
											</span>

											<span class="stext-102 cl6 size-206">
												{{ $book->jumlah_halaman }}
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Kategori
											</span>

											<span class="stext-102 cl6 size-206">
												{{ $book->category->name }}
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection