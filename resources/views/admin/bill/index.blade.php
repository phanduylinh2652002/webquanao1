@extends('admin.index')
@section('content')
    <div class="row"  style="height: 650px">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                <h6 class="text-white text-capitalize ps-3">Hóa đơn</h6>

              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã hóa đơn</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên khách hàng</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày đặt hàng</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($bills as $b)
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm" style="padding-left: 35px">{{$b->bill_id}}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$b->customer_name}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{number_format($b->bill_total)}}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$b->bill_date}}</p>
                      </td>
                      <td>
                        @if($b->bill_status == 'Chờ xác nhận' || $b->bill_status == 'Đang giao hàng')
                        <p class="text-xs font-weight-bold mb-0">
                          {{$b->bill_status}}
                        </p>
                        @elseif($b->bill_status == 'Hủy đơn')
                        <p class="text-xs font-weight-bold mb-0 text-danger">
                          {{$b->bill_status}}
                        </p>
                        @else
                        <p class="text-xs font-weight-bold mb-0 text-success">
                          {{$b->bill_status}}
                        </p>
                        @endif
                    </td>
                        <td class="align-middle text-center text-sm d-flex justify-content-center">
                          <a href="{{route('bill.edit', $b->bill_id)}}" class="btn btn-primary">Sửa</a>
                          <a href="{{route('bill.show', $b->bill_id)}}" class="btn btn-primary">Xem</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection