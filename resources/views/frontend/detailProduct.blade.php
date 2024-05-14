@extends('frontend.index')
@section('content')
<div class="container single_product_container">
    <div class="row mt-5">
    </div>

    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="single_product_pics">
                <div class="row">
                    <div class="col-lg-9 image_col order-lg-2 order-1">
                        <div class="single_product_image">
                            <div class="single_product_image_background" style="background-image:url({{URL::to('/')}}/images/{{$products->product_image}})"></div>
                        </div>
                        <div class="product_description mt-4">
                                <h4>Mô tả</h4>
                                {!!$products->product_description!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product_details position-fixed ">
                <div class="product_details_title">
                    <h2 style="font-size: 24px">{{$products->product_name}}</h2>
                    {{-- <p>Mẫu áo khoác có màu sắc nâu nhạt, đường may tinh xảo, hài hòa. Thiết kế cổ áo chữ V cổ điển. Độ dày vừa phải giúp dễ dàng khoác ngoài, phù hợp với thời tiết thu đông...  </p> --}}
                </div>
                <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                    {{-- <span class="ti-truck"></span><span>miễn phí vận chuyển</span> --}}
                </div>
                @if($products->product_discount > 0)
                    <div class="original_price">{{number_format($products->product_price)}}</div>
                    <div class="product_price">{{number_format($products->product_discount)}}</div>
                @else
                    <div class="product_price">{{number_format($products->product_price)}}</div>
                @endif
                <div class="product_color">
                    <span>Màu sắc: {{$products->product_color}}</span>
                </div>
                <div class="product_size">
                    <label for="">Chọn Size: 
                        @foreach($quantities as $q)
                            @if($q->size_id == $size)
                                <span>{{$q->size_name}}</span>
                            @endif
                        @endforeach
                    </label>
                    <div class="d-flex">
                        @foreach($quantities as $q)
                            <form action="{{url('detailProduct', $products->product_id)}}?size={{$q->size_id}}" method="post">
                                @csrf
                                <button class="btn btn-light" value="{{$q->size_id}}">{{$q->size_name}}</button>
                            </form>
                        @endforeach
                    </div>
                </div>
                @foreach($quantities as $q)
                @if($q->size_id == $size)
                <div class="quantity">
                        @if($q->pivot->quantity > 0)
                            <span>Số lượng: {{$q->pivot->quantity}}</span>
                        </div>
                        <form action="{{url('addCart')}}?size={{$size}}" method="post">
                            @csrf
                            <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                                {{-- <span>Số lượng:</span> --}}
                                <div class="" style="margin:0 5px;">
                                    {{-- <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span> --}}
                                    <input type="hidden" name="product_id" value="{{$products->product_id}}" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    {{-- <input type="number" id="quantity_value" class="form-control" name="quantity"> --}}
                                    {{-- <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span> --}}
                                </div>
                                <input type="submit" class="btn btn-danger" value="Thêm giỏ hàng">
                                {{-- <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div> --}}
                            </div>
                        </form>
                        @else
                            <span>Số lượng: Hết hàng</span>
                        @endif
                    @endif
                    @endforeach
                    
            </div>
        </div>
    </div>
    	<!-- Tabs -->

	{{-- <div class="tabs_section_container">

		<div class="container">

					<!-- Tab Description -->

					<div id="" class="tab_container active">
								<div class=" mt-4">
									<h4>Mô tả</h4>
								</div>
								<div class="">
                                    {!!$products->product_description!!}
								</div>
					</div>

					<!-- Tab Additional Info -->

					<!-- Tab Reviews -->

		</div>

	</div> --}}

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
							<h6>thứ hai - chủ nhật</h6>
							<p>8:00 - 21:00</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection