<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" " target="_blank">
        <span class="ms-1 font-weight-bold text-white">Admin</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('dashboard')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('category.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-person-dress"></i>
            </div>
            <span class="nav-link-text ms-1">Quản lý loại sản phẩm</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('product.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-shirt"></i>
            </div>
            <span class="nav-link-text ms-1">Quản lý sản phẩm</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('size.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-maximize"></i>
            </div>
            <span class="nav-link-text ms-1">Quản lý size</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('bill.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-money-check-dollar"></i>
            </div>
            <span class="nav-link-text ms-1">Hóa đơn</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('customer.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-person-walking-luggage"></i>
            </div>
            <span class="nav-link-text ms-1">Danh sách khách hàng</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{url('logout')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-right-from-bracket"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-up.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li> --}}
      </ul>
    </div>
    {{-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-primary mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
        <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div> --}}
    
  </aside>