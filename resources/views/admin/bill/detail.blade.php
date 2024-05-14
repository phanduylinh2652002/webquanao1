@extends('admin.index')
@section('content')
    <div class="row" style="min-height: 650px">
        <div class="col-12">
            <div class="car my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                      <h6 class="text-white text-capitalize ps-3">Chi tiết hóa đơn</h6>
                          <button class="btn  ">
                              <a class="text-white" href="{{route('bill.index')}}">Quay lại</a>
                          </button>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <h2>Thông tin khách hàng</h2>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Tên khách hàng</h4>
                        <span>{{$bill_customer->customer_name}}</span>
                    </div>
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Số điện thoại</h4>
                        <span>{{$bill_customer->customer_phone}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Địa chỉ</h4>
                        <span>{{$bill_customer->customer_address}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Email</h4>
                        <span>{{$bill_customer->customer_email}}</span>
                    </div>
                    <h2>Thông tin sản phẩm</h2>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Size</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($bill_detail as $b)
                          <tr>
                            <th>{{$b->product_id}}</th>
                            <td>{{$b->product_name}}</td>
                            <td>{{$b->size_name}}</td>
                            <td>{{$b->quantity}}</td>
                            <td>{{number_format($b->price)}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection