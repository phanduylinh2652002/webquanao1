@extends('frontend.index')
@section('content')
<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">
            <li class="menu_item has-children">
                <a href="#">
                    usd
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#">cad</a></li>
                    <li><a href="#">aud</a></li>
                    <li><a href="#">eur</a></li>
                    <li><a href="#">gbp</a></li>
                </ul>
            </li>
            <li class="menu_item has-children">
                <a href="#">
                    English
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#">French</a></li>
                    <li><a href="#">Italian</a></li>
                    <li><a href="#">German</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </li>
            <li class="menu_item has-children">
                <a href="#">
                    Tài khoản
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
                    <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký</a></li>
                </ul>
            </li>
            <li class="menu_item"><a href="#">home</a></li>
            <li class="menu_item"><a href="#">shop</a></li>
            <li class="menu_item"><a href="#">promotion</a></li>
            <li class="menu_item"><a href="#">pages</a></li>
            <li class="menu_item"><a href="#">blog</a></li>
            <li class="menu_item"><a href="#">contact</a></li>
        </ul>
    </div>
</div>

<!-- Slider -->

<div class="main_slider" style="background-image:url({{asset('frontend/images/slider_2.webp')}}">
    {{-- <div class="container fill_height">
        <div class="row align-items-center fill_height">
            <div class="col">
                <div class="main_slider_content">
                    <h6>Bộ sưu tập thu đông 2022</h6>
                    <h1>Giảm 30% </h1>
                    <h1>cho sản phẩm mới</h1>
                    <div class="red_button shop_now_button"><a href="#">Mua ngay</a></div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<!-- Banner -->

<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="banner_item align-items-center" style="background-image:url({{asset('frontend/images/begai.webp')}}">
                    <div class="banner_category mt-5" style="border-radius: 50px; background-color: bisque">
                        <a href="{{url('category', 'begai')}}">BÉ GÁI</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner_item align-items-center" style="background-image:url({{asset('frontend/images/phukien.webp')}})">
                    <div class="banner_category mt-5" style="border-radius: 50px; background-color: bisque">
                        <a href="{{url('category', 'phukien')}}">PHỤ KIỆN</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner_item align-items-center" style="background-image:url({{asset('frontend/images/betrai.webp')}})">
                    <div class="banner_category mt-5" style="border-radius: 50px; background-color: bisque">
                        <a href="{{url('category', 'betrai')}}">BÉ TRAI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>SẢN PHẨM MỚI</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">TẤT CẢ</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">BÉ GÁI</li>
                        {{-- <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">PHỤ KIỆN</li> --}}
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">BÉ TRAI</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                    <!-- Product 1 -->
                    @foreach ($products as $p)
                    <div class="product-item mb-5 {{$p->category_gender == 'Nam' ? 'men' : 'women'}}">
                        <a class="product" href="{{url('detailProduct', $p->product_id)}}?size=1">
                            <div class="product_image">
                                <img src="{{URL::to('/')}}/images/{{$p->product_image}}" alt="" style="max-height:220px">
                            </div>
                            <div class="favorite favorite_left"></div>
                            <div class="product_info">
                                <h6 class="product_name text-truncate" style="margin-top:0"><a href="{{url('detailProduct', $p->product_id)}}?size=1">{{$p->product_name}}</a></h6>
                                @if($p->product_discount > 0)
                                <div class="product_price">{{number_format($p->product_discount)}}<span>{{number_format($p->product_price)}}</span></div>
                                @else
                                <div class="product_price">{{number_format($p->product_price)}}</div>
                                @endif
                            </div>
                        </a>
                        {{-- <form action="{{url('addCart')}}" method="post">
                            @csrf
                            <input type="submit" class="red_button add_to_cart_button cus text-white" value="Thêm giỏ hàng" style="border:none; cursor: pointer;">
                            <input type="hidden" name="product_id" value="{{$p->product_id}}" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form> --}}
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deal of the week -->

<div class="deal_ofthe_week">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="deal_ofthe_week_img">
                    <img src="{{asset('frontend/images/deal_ofthe_week.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 text-right deal_ofthe_week_col">
                <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                    <div class="section_title">
                        <h2>HẾT HẠN TRONG</h2>
                    </div>
                    <ul class="timer">
                        <li class="d-inline-flex flex-column justify-content-center align-items-center">
                            <div id="day" class="timer_num">03</div>
                            <div class="timer_unit">Ngày</div>
                        </li>
                        <li class="d-inline-flex flex-column justify-content-center align-items-center">
                            <div id="hour" class="timer_num">15</div>
                            <div class="timer_unit">Giờ</div>
                        </li>
                        <li class="d-inline-flex flex-column justify-content-center align-items-center">
                            <div id="minute" class="timer_num">45</div>
                            <div class="timer_unit">Phút</div>
                        </li>
                        <li class="d-inline-flex flex-column justify-content-center align-items-center">
                            <div id="second" class="timer_num">23</div>
                            <div class="timer_unit">Giây</div>
                        </li>
                    </ul>
                    {{-- <div class="red_button deal_ofthe_week_button"><a href="#">Mua ngay</a></div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Best Sellers -->

<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>BÁN CHẠY</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product_slider_container">
                    <div class="owl-carousel owl-theme product_slider">

                        <!-- Slide 1 -->
                        @foreach ($sellings as $item)
                            
                        <div class="owl-item product_slider_item">
                            <a class="product-item" href="{{url('detailProduct', $item->product_id)}}?size=1">
                                <div class="product discount">
                                    <div class="product_image">
                                        <img src="{{URL::to('/')}}/images/{{$item->product_image}}" alt="" style="max-height: 230px">
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                    @if($item->product_discount > 0)
                                        <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-{{100 - intval(round(($item->product_discount/$item->product_price)*100))}}%</span></div>
                                    @endif
                                    <div class="product_info">
                                        <h6 class="product_name text-truncate"><a href="">{{$item->product_name}}</a></h6>
                                        @if($item->product_discount > 0)
                                            <div class="product_price">{{number_format($item->product_discount)}}<span>{{number_format($item->product_price)}}</span></div>
                                        @else
                                            <div class="product_price">{{number_format($item->product_price)}}</div>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>

                    <!-- Slider Navigation -->

                    <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </div>
                    <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
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

<!-- Blogs -->

{{-- <div class="blogs">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title">
                    <h2>BLOGS MỚI NHẤT</h2>
                </div>
            </div>
        </div>
        <div class="row blogs_container">
            <div class="col-lg-4 blog_item_col">
                <div class="blog_item">
                    <div class="blog_background" style="background-image:url({{asset('frontend/images/blog_1.jpg')}}"></div>
                    <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                        <h4 class="blog_title">Xu hướng thu đông 2022</h4>
                        <span class="blog_meta">admin | 11/09/2022</span>
                        <a class="blog_more" href="#">Đọc thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 blog_item_col">
                <div class="blog_item">
                    <div class="blog_background" style="background-image:url({{asset('frontend/images/blog_2.jpg')}}"></div>
                    <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                        <h4 class="blog_title">Xu hướng thu đông 2022</h4>
                        <span class="blog_meta">admin | 11/09/2022</span>
                        <a class="blog_more" href="#">Đọc thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 blog_item_col">
                <div class="blog_item">
                    <div class="blog_background" style="background-image:url({{asset('frontend/images/blog_3.jpg')}}"></div>
                    <div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
                        <h4 class="blog_title">Xu hướng thu đông 2022</h4>
                        <span class="blog_meta">admin | 11/09/2022</span>
                        <a class="blog_more" href="#">Đọc thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection