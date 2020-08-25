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
					    <li class="list-group-item"><a href="{{ route('user.profil') }}" class="{{ Request::is('user/profil*') ? "text-primary" : "text-dark" }}">Profil</a></li>
					    <li class="list-group-item"><a href="{{ route('user.address') }}" class="{{ Request::is('user/alamat*') ? "text-primary" : "text-dark" }}">Alamat</a></li>
					    <li class="list-group-item"><a href="{{ route('user.order') }}" class="{{ Request::is('user/pesanan*') ? "text-primary" : "text-dark" }}" >Order</a></li>
					  </ul>
					</div>
				</div>