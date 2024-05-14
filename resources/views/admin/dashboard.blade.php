@extends('admin.index')
@section('content')
    <div class="row mt-5">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa-solid fa-calendar-week"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Doanh thu trong 1 tháng</p>
                <h4 class="mb-0">{{number_format($revenueMonth)}} VNĐ</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                @if($revenueMonthPercent > 1)
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{($revenueMonthPercent-1)*100}}% </span>than last month</p>
                @elseif($revenueMonthPercent === 1)
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{$revenueMonthPercent*100}}% </span>than last month</p>
                @else
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-{{(1-$revenueMonthPercent)*100}}% </span>than last month</p>
                @endif
            </div>
          </div>
    </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="fa-solid fa-calendar-week"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Doanh thu trong 1 tuần</p>
                    <h4 class="mb-0">{{number_format($revenueWeek)}} VNĐ</h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    @if($revenueWeekPercent > 1)
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{($revenueWeekPercent-1)*100}}% </span>than last week</p>
                    @elseif($revenueWeekPercent === 1)
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{$revenueWeekPercent*100}}% </span>than last week</p>
                    @else
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-{{(1-$revenueWeekPercent)*100}}% </span>than last week</p>
                    @endif
                </div>
              </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                  <i class="fa-solid fa-calendar-week"></i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Doanh thu trong ngày</p>
                  <h4 class="mb-0">{{number_format($revenueDay)}} VNĐ</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                  @if($revenueDayPercent > 1)
                      <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{($revenueDayPercent-1)*100}}% </span>than yesterday</p>
                  @elseif($revenueDayPercent === 1)
                      <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{$revenueDayPercent*100}}% </span>than yesterday</p>
                  @else
                      <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-{{(1-$revenueDayPercent)*100}}% </span>than yesterday</p>
                  @endif
              </div>
            </div>
      </div> 
    </div>
@endsection