@extends('frontend.index')
@section('content')
<main class="page" style="margin-top: 150px">
    <section class="shopping-cart dark mt-5">
        <div class="container">
           <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                          <!-- Product 1 -->
                            @foreach($carts as $c)
                            <div class="product">
                                <div class="row">
                                    <div class="col-md-3">
                                       <img src="{{URL::to('/')}}/images/{{$c['option']}}" width="150px" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5 product-name">
                                                    <div class="product-name">
                                                        <a href="{{url('detailProduct', $c['id'])}}">{{$c['name']}}</a>								 							                                                                                                           
                                                    </div>
                                                    <span>Size: {{$c['size_name']}}</span>
                                                </div>
                                                <div class="col-md-4 quantity">
                                                    <label for="quantity">Số lượng:</label>
                                                    <div class="d-flex">
                                                        <form method="post" style=" float: left;" action="{{url("down?product_id=" . $c['id'] . "&decrease=1&size=". $c['size_id'])}}">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $c['id'] }}">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button type="submit" class="cart_quantity_up btn" style="width: 25px; margin-right: 10px"
                                                            {{-- @if($c['qty'] == 1) disabled @endif --}}
                                                            >
                                                                -
                                                            </button>
                                                        </form>
                                                            <input id="quantity" type="number" value ="{{$c['qty']}}" class="form-control quantity-input" disabled>
                                                        <form method="post" style=" float: left; "action="{{url("up?product_id=" . $c['id'] . "&increment=1&size=". $c['size_id'])}}">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $c['id'] }}">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button type="submit" class="cart_quantity_up btn" style="width: 25px; margin-left: 10px"
                                                            @if($c['qty'] >= $c['quantity']) disabled @endif
                                                            >
                                                                + 
                                                            </button>
                                                        </form>
                                                    </div>
                                                    {{-- @dd($carts) --}}
                                                    <div class="mt-2">Số lượng còn: {{$c['quantity']}}</div>
                                                </div>
                                                
                                                <div class="col-md-3 price mt-5">
                                                    <span>{{number_format($c['price'])}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- @dd(Session::all()) --}}
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Đơn hàng</h3>
                            <div class="summary-item"><span class="text">Giá tiền</span><span class="price">{{number_format(Session::get('total'))}}</span></div>
                            
                            <div class="summary-item"><span class="text">Khuyến mãi</span><span class="price">0%</span></div>
                            
                            <div class="summary-item"><span class="text">Phí vận chuyển</span><span class="price">35.000</span></div>
                            <div class="summary-item"><span class="text">Tổng tiền</span><span class="price">{{number_format(Session::get('total') + 35000)}}</span></div>
                            @if(auth()->check())
                                @if(count($carts))
                                    <a href="{{ url('formCustomer')}}" class="btn btn-danger btn-lg btn-block mt-2">Thanh toán</a>
                                    <a href="{{ url('formCustomerVnPay')}}" class="btn btn-danger btn-lg btn-block">Thanh toán VnPay</a>
                                @else
                                    <a href="{{ url('/')}}" class="btn btn-danger btn-lg btn-block mt-2">Mua hàng</a>
                                @endif
                            @else
                                <a href="{{ url('/login')}}" class="btn btn-danger btn-lg btn-block mt-2">Đăng nhập để thanh toán</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 text-center">
                        <a href="{{ url('/')}}" class="btn btn-danger mb-2 text-white">Mua tiếp</a>

                    </div>
                </div> 
                
            </div>
        </div>
   </section>
</main>
@endsection