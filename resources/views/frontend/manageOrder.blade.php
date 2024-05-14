@extends('frontend.index')
@section('content')
<main class="page" style="margin-top: 150px">
    <section class="shopping-cart dark mt-5">
        <div class="container">
            <div class="content">
                <div class="text-center">
                    <h2 class="mt-5">Đơn hàng của bạn</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        @foreach($bill as $b)
                        <div class="product mt-5">
                            <div class="card-header text-start">
                                <h4>Mã đơn hàng: {{$b->bill_id}}</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="text-info">Thông tin người nhận hàng</h5>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Người nhận hàng</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Địa chỉ</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">{{$b->customer_name}}</th>
                                        <td>{{$b->customer_phone}}</td>
                                        <td>{{$b->customer_email}}</td>
                                        <td>{{$b->customer_address}}</td>
                                      </tr>
                                    </tbody>
                                </table>
                                <h5 class="text-info">Thông tin sản phẩm</h5>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Giá</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $key => $p)
                                        {{-- @foreach($product as $p) --}}
                                        <tr class="">
                                                <th scope="row">{{$p[$key]['product_name']}}</th>
                                                <td>{{$p[$key]['size_name']}}</td>
                                                <td>{{$p[$key]['quantity']}}</td>
                                                <td>{{$p[$key]['price']}}</td>
                                            </tr>
                                            {{-- @endforeach --}}
                                            @break
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 col-lg-12 text-center mt-3">
                        <a href="{{ url('/')}}" class="btn btn-danger mb-2 text-white">Mua tiếp</a>
                    </div>
                </div> 
                
            </div>
        </div>
   </section>
</main>
@endsection