@extends('admin.index')
@section('content')
<div style="min-height: 650px">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
        <h3 class="text-white text-capitalize ps-3">Sửa đơn hàng</h3>
        <button class="btn  ">
            <a class="text-white" href="{{route('bill.index')}}">Quay lại</a>
        </button>
    </div>
    <form role="form" class="text-start" action="{{route('bill.update',  $bill->bill_id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2>Thông tin khách hàng</h2>
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Tên khách hàng</label> <br>
            <input type="text" class="form-control" name="customer_name" value="{{$bill_customer->customer_name}}">
        </div>
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Số điện thoại</label> <br>
            <input type="text" class="form-control" name="customer_phone" value="{{$bill_customer->customer_phone}}">
        </div>
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Địa chỉ</label> <br>
            <input type="text" class="form-control" name="customer_address" value="{{$bill_customer->customer_address}}">
        </div>
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Email</label> <br>
            <input type="text" class="form-control" name="customer_email" value="{{$bill_customer->customer_email}}">
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
          <h2>Trạng thái đơn hàng</h2>
          <div class="input-group input-group-static mb-4">
            <label for="exampleFormControlSelect1" class="ms-0">Trạng thái</label>
            <select class="form-control" id="exampleFormControlSelect1" name="bill_status">
              <option value="Hủy đơn" @if($bill_customer->bill_status === 'Hủy đơn') selected @endif>Hủy đơn</option>
              <option value="Chờ xác nhận" @if($bill_customer->bill_status === 'Chờ xác nhận') selected @endif>Chờ xác nhận</option>
              <option value="Đang giao hàng" @if($bill_customer->bill_status === 'Đang giao hàng') selected @endif>Đang giao hàng</option>
              <option value="Thành công" @if($bill_customer->bill_status === 'Thành công') selected @endif>Thành công</option>
            </select>
          </div>
          <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Sửa</button>
          </div>
    </form>
</div>
@endsection