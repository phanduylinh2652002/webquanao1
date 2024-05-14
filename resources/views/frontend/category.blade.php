<!DOCTYPE html>
<html lang="en">
<head>
<title>Tung Khanh</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/categories_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/categories_responsive.css')}}">
</head>

<body>

	<div class="super_container">

		<!-- Header -->
        @include('frontend.element.header')

	<div class="fs_menu_overlay"></div>

	<!-- Hamburger Menu -->

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
				</div>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Danh mục sản phẩm</h5>
						</div>
						<ul class="sidebar_categories">
							<li class=""><a href="{{url('category', 'betrai')}}">Nam</a></li>
							<li><a href="{{url('category', 'begai')}}">Nữ</a></li>
							<li><a href="{{url('category', 'phukien')}}">Phụ kiện</a></li>
						</ul>
					</div>

					<!-- Price Range Filtering -->
					{{-- <div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Lọc theo giá</h5>
						</div> 
						<p>
							<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
						</p>
						<div id="slider-range"></div>
						<div class="filter_button"><span>Lọc</span></div>
					</div> --}}

				</div>

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->


								<!-- Product Grid -->

								<div class="product-grid">

									<!-- Product 1 -->
									@foreach($products as $p)
									<div class="product-item men mb-5" style="height:380px;">
										<a href="{{url('detailProduct', $p->product_id)}}" class=" discount product_filter">
											<div class="product_image">
												<img src="{{URL::to('/')}}/images/{{$p->product_image}}" alt="" style="height:250px">
											</div>
											<div class="favorite favorite_left"></div>
											@if($p->product_discount > 0)
                                        		<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-{{100 - intval(round(($p->product_discount/$p->product_price)*100))}}%</span></div>
                                    		@endif
											<div class="product_info">
												<h6 class="product_name text-truncate"><a href="">{{$p->product_name}}</a></h6>
												@if($p->product_discount > 0)
                                            		<div class="product_price">{{number_format($p->product_discount)}}<span>{{number_format($p->product_price)}}</span></div>
                                        		@else
                                            		<div class="product_price">{{number_format($p->product_price)}}</div>
                                        		@endif
											</div>
										</a>
										{{-- <form action="{{url('addCart')}}" method="post">
											@csrf
											<input type="hidden" name="product_id" value="{{$p->product_id}}" />
                            				<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button class="red_button add_to_cart_button mt-2 text-white" style="border: none;">Thêm vào giỏ hàng</button>

										</form> --}}
									</div>
									@endforeach
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>miễn phí vận chuyển</h6>
							<p>Với đơn hàng trên 1.000.000</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>thanh toán khi nhận hàng</h6>
							<p>Kiểm tra trước khi thanh toán</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>đổi trả hàng</h6>
							<p>Trong vòng 7 ngày</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Thứ hai - Chủ nhật</h6>
							<p>8:00 - 21:00</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
					<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
						<input id="newsletter_email" type="email" placeholder="Email" required="required" data-error="Valid email is required.">
						<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">đăng ký</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.html">Liên hệ </a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2023 All Rights Reserverd</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

<script src="{{ asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ asset('frontend/plugins/easing/easing.')}}"></script>
<script src="{{ asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{ asset('frontend/js/categories_custom.js')}}"></script>
</body>

</html>
