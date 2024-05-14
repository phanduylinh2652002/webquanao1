@extends('admin.index')
@section('content')
    <div class="row"  style="height: 650px">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                <h6 class="text-white text-capitalize ps-3">Danh sách khách hàng</h6>

              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã khách hàng</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên khách hàng</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số điện thoại</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Địa chỉ</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($customers as $b)
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm" style="padding-left: 35px">{{$b->customer_id}}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$b->customer_name}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$b->customer_phone}}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$b->customer_email}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$b->customer_address}}</p>
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