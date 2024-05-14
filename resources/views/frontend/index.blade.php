
@include('frontend.element.head')
<body>

<div class="super_container">

	<!-- Header -->
	@include('frontend.element.header')

	@yield('content')
	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Bản tin</h4>
						<p>Hãy theo dõi trang web để nhận voucher giảm giá 20% </p>
					</div>
				</div>
				<div class="col-lg-6">
					<form action="#">
						<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Đăng ký</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	@include('frontend.element.footer')


</div>
@include('frontend.element.script')
