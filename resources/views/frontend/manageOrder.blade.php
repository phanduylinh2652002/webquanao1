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
                    @foreach($bill as $b)
                    <div class="col-md-12 col-lg-12">
                        <div class="product mt-5 h-100">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Mã đơn hàng: {{$b->bill_id}}</h4>
                                @if($b->bill_status === 'Hủy đơn')
                                    <h4 class="text-danger">{{$b->bill_status}}</h4>
                                @elseif($b->bill_status === 'Thành công')
                                    <h4 class="text-success">{{$b->bill_status}}</h4>
                                @else
                                    <h4>{{$b->bill_status}}</h4>
                                @endif
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
                                        @foreach($products[$loop->index] as $p)
                                            @if($p->bill_id === $b->bill_id)
                                                <tr class="">
                                                    <th scope="row">{{$p->product_name}}</th>
                                                    <td>{{$p->size_name}}</td>
                                                    <td>{{$p->quantity}}</td>
                                                    <td>{{number_format($p->price)}} đ</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end">
                                    <div style="margin-right: 90px;">Tổng tiền: {{number_format($b->bill_total)}} đ</div>
                                </div>
                                @if($b->bill_status === 'Chờ xác nhận')
                                <div class="text-center">
                                    <a href="{{url('cancelOrder', $b->bill_id)}}" class="btn btn-danger">Hủy đơn</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> 
            </div>
        </div> 
   </section>
</main>
@endsection