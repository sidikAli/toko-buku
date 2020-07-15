<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="{{ asset('') }}/eccomerce/images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('') }}/eccomerce/images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('') }}/eccomerce/images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('') }}/eccomerce/images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('') }}/eccomerce/images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;{{date('Y')}} All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="{{ asset('') }}/eccomerce/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('') }}/eccomerce/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('') }}/eccomerce/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('') }}/eccomerce/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('') }}/eccomerce/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('') }}/eccomerce/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('') }}/eccomerce/vendor/slick/slick.min.js"></script>
	<script src="{{ asset('') }}/eccomerce/js/slick-custom.js"></script>


<!--===============================================================================================-->
	<script src="{{ asset('') }}/eccomerce/vendor/isotope/isotope.pkgd.min.js"></script>
	
<!--===============================================================================================-->
	<script src="{{ asset('') }}/eccomerce/js/main.js"></script>
	@yield('js')
</body>
</html>