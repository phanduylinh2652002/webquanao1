@extends('admin.index')
@section('content')
<div style="min-height: 650px">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
        <h3 class="text-white text-capitalize ps-3">Thêm sản phẩm mới</h3>
        <button class="btn  ">
            <a class="text-white" href="{{route('product.index')}}">Quay lại</a>
        </button>
    </div>
    <form role="form" class="text-start" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Tên sản phẩm</label> <br>
          <input type="text" class="form-control" name="product_name">
        </div>
        @error('product_name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div>
          <p>Loại sản phẩm</p>
          <select name="category_id" class="form-control border">
            <option value="">Chọn loại sản phẩm</option>
            @foreach($categories as $category)
                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
        </div>
        @error('category_id')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Giá sản phẩm</label>
            <input type="text" class="form-control" name="product_price">
        </div>
        @error('product_price')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Giá giảm</label>
            <input type="text" class="form-control" name="product_discount">
          </div>
        @error('product_discount')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div>
            <p >Ảnh</p>
            <input type="file" name="product_image">
          </div>
          @error('product_image')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Màu sắc</label>
            <input type="text" class="form-control" name="product_color">
          </div>
          @error('product_color')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        @foreach($sizes as $key => $size)
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Số lượng size: {{$size->size_name}}</label>
          <input type="number" name="quantities[{{ $size->size_id }}]"  class="form-control">
          <input type="hidden" name="sizes[]" value="{{ $size->size_id }}">
        </div>
        @error('quantities.' . $key)
          <div class="text-danger">{{ $message }}</div>
        @enderror
        @endforeach
          <div class="input-group input-group-outline my-3" style="display: inline">
            <p>Mô tả</p>
            <textarea type="text" class="form-control mt-5" name="product_description"style="width: 100%;" id="product_description"></textarea>
          </div>
          @error('product_description')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Thêm mới</button>
        </div>
    </form>
</div>
@endsection
@section('ckeditor')
    <script>
            ClassicEditor
            .create(document.getElementById('product_description'))
            .catch(error =>{
                console.error(error);
            });
    </script>
@endsection