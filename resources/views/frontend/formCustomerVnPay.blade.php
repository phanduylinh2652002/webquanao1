@extends('frontend.index')
@section('content')
<div class="container" style="margin-top: 200px!important">
    <div class="container">
        <form action="{{url('vnPayment')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="exampleInput" name="customer_name">
              </div>
              @error('customer_name')
                  <div class="text-danger">{{$message}}</div>
              @enderror
              <div class="mb-3">
                <label for="exampleInput" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="exampleInput" name="customer_address">
              </div>
              @error('customer_address')
                  <div class="text-danger">{{$message}}</div>
              @enderror
              <div class="mb-3">
                <label for="exampleInput" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="exampleInput" name="customer_phone">
              </div>
              @error('customer_phone')
                  <div class="text-danger">{{$message}}</div>
              @enderror
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="customer_email">
            </div>
            @error('customer_email')
                  <div class="text-danger">{{$message}}</div>
              @enderror
            <div class="text-center">
                <button type="submit" class="btn btn-danger" name="redirect">Thanh toán VnPay</button>
              </div>
            </form>
    </div>
</div>
@endsection