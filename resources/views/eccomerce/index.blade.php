@extends('layouts.eccomerce.app')
@section('title', 'Toko Buku Bacalah')
@section('content')
<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url({{ asset('eccomerce') }}/images/banner01.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Toko Buku
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Bacalah
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="{{ route('eccomerce.product') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Belanja Sekarang
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url({{ asset('eccomerce') }}/images/banner02.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									lengkap & Terpercaya
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Belanja sekarang
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Product -->
	<section class="bg0 p-t-80 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5 mb-4 mt-2">
					Buku Terbaru
				</h3>
			</div>

			<div class="row isotope-grid">
				@foreach($books as $book)
				<div class="col-6 col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('buku/' . $book->gambar) }}" alt="IMG-PRODUCT" class="product-image">

							<a href="{{ route('eccomerce.show', $book->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Detail
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{ route('eccomerce.show', $book->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $book->judul }}
								</a>

								<span class="stext-105 cl3">
									{{-- function format rupiah di appserviceprovider --}}
									@currency($book->harga)
								</span>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="{{ route('eccomerce.product') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Selengkapnya
				</a>
			</div>
		</div>
	</section>
@endsection