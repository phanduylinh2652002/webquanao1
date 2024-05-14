
<header class="header trans_300" style="top :-10px;">
    <div class="top_nav"></div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="{{url('/')}}">TungKhanh<span>shop</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="{{url('/')}}">TRANG CHỦ</a></li>
                            @if(auth()->check())
                                <li><a href="{{url('manageOrder')}}">Đơn hàng</a></li>
                            @endif
                            {{-- <li><a href="#">BLOG</a></li>
                            <li><a href="contact.html">LIÊN HỆ</a></li> --}}
                        </ul>
                        <ul class="navbar_user">
                            <li>
                                <form action="{{url('search')}}" class="form d-flex">
                                    @csrf
                                    <input type="search" name="key" class="form-control">
                                    <button class="btn bg-white">
                                        <i class="fa fa-search mb-2" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </li>
                            <li class="checkout">
                                <a href="{{url('showCart')}}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    {{-- <span id="checkout_items" class="checkout_items">2</span> --}}
                                </a>
                            </li>
                            <li>
                                @if(!auth()->check())
                                    <a href="{{url('login')}}"><i class="fa fa-user" aria-hidden="true"></i></a>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <p class="mt-2" style="width: 100px">{{auth()->user()->name}}</p>
                                        <a href="{{url('logout')}}"><i class="fa-solid fa-right-from-bracket"></i></a>
                                    </div>
                                @endif
                            </li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>
