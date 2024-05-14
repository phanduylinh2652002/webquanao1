<!DOCTYPE html>
<html lang="en">
@include('admin.element.head')
<body class="g-sidenav-show  bg-gray-200">
  @include('admin.element.slidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @yield('content')
      @include('admin.element.footer')
    </div>
  </main>
  @include('admin.element.script')
</body>

</html>