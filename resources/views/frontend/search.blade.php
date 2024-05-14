@extends('frontend.index')
@section('content')
<div class="fs_menu_overlay"></div>


<!-- Slider -->



<!-- Banner -->


<!-- New Arrivals -->



<!-- Deal of the week -->


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
                        @foreach ($product as $item)
                            
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
                                        <h6 class="product_name text-truncate"><a href="{{url('detailProduct', $item->product_id)}}?size=1">{{$item->product_name}}</a></h6>
                                        @if($item->product_discount > 0)
                                            <div class="product_price">{{number_format($item->product_price)}}<span>{{number_format($item->product_discount)}}</span></div>
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


<!-- Blogs -->

@endsection