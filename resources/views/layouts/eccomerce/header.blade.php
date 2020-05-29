<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('eccomerce') }}/css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="right-top-bar flex-w h-full">
						<a href="https://instagram.com/sidik_221" class="flex-c-m trans-04 p-lr-25">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="https://facebook.com/sidikali11" class="flex-c-m trans-04 p-lr-25">
							<i class="fa fa-facebook"></i>
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="{{ route('eccomerce.index') }}" class="logo text-uppercase text-dark">
						<h3><span class="font-weight-bold">Baca</span>lah</h3>
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="{{ request()->is('produk') ? "active-menu" : "" }}">
								<a href="{{ route('eccomerce.product') }}">Semua Buku</a>
							</li>
							<li class="{{ request()->is('kategori*') ? "active-menu" : "" }}">
								<a href="#">Kategori</a>
								<ul class="sub-menu">
									@foreach($categories as $category)
									<li><a href="{{ route('eccomerce.category', $category->slug) }}">{{ $category->name }}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="{{ request()->is('tentang') ? "active-menu" : "" }}">
								<a href="about.html">Tentang</a>
							</li>

						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<a href="{{ route('cart.index') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
						<li class="nav-item dropdown">
					        <a class="nav-link icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          <i class="zmdi zmdi-account"></i>
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				        	  
				        	  @auth
					          <a class="dropdown-item" href="{{ route('user.address') }}">Pengaturan</a>
					          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						        Logout
						      </a>
						      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						          @csrf
						      </form>
					          @endauth


					          @guest
					          <a class="dropdown-item" href="{{ route('login') }}">Login</a>
					          <a class="dropdown-item" href="{{ route('register') }}">Register</a>
					          @endguest
					        </div>
					    </li>

					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="{{ route('eccomerce.index') }}" class="logo text-uppercase text-dark">
					<h3><span class="font-weight-bold">Baca</span>lah</h3>
				</a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<a href="{{ route('cart.index') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
					<i class="zmdi zmdi-shopping-cart"></i>
				</a>

				<li class="nav-item dropdown">
			        <a class="nav-link icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          <i class="zmdi zmdi-account"></i>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          @if(Route::has('login'))
			          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
			          @endif
			          <a class="dropdown-item" href="{{ route('login') }}">Login</a>
			          <a class="dropdown-item" href="{{ route('register') }}">Register</a>
			        </div>
			    </li>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="https://instagram.com/sidik_221" class="flex-c-m trans-04 p-lr-25">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="https://twitter.com/alisidik221" class="flex-c-m trans-04 p-lr-25">
							<i class="fa fa-twitter"></i>
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Kategori</a>
					<ul class="sub-menu-m">
						@foreach($categories as $category)
						<li><a href="{{ route('eccomerce.category', $category->slug) }}">{{ $category->name }}</a></li>
						@endforeach
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Semua Buku</a>
				</li>

				<li>
					<a href="blog.html">Tentang</a>
				</li>

			</ul>
		</div>
	</header>
