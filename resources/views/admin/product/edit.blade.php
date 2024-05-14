@extends('admin.index')
@section('content')
<div style="min-height: 650px">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
        <h3 class="text-white text-capitalize ps-3">Sửa sản phẩm</h3>
        <button class="btn  ">
            <a class="text-white" href="{{route('product.index')}}">Quay lại</a>
        </button>
    </div>
    <form role="form" class="text-start" action="{{route('product.update',  $product->product_id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Tên sản phẩm</label> <br>
          <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
        </div>
        @error('product_name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div>
          <p>Loại sản phẩm</p>
          <select name="category_id" class="form-control border">
            <option value="">Chọn loại sản phẩm</option>
            @foreach($categories as $category)
                <option value="{{$category->category_id}}" @if($product->category_id === $category->category_id) selected @endif>{{$category->category_name}}</option>
            @endforeach
          </select>
        </div>
        @error('category_id')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Giá sản phẩm</label>
            <input type="text" class="form-control" name="product_price" value="{{$product->product_price}}">
        </div>
        @error('product_price')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Giá giảm</label>
            <input type="text" class="form-control" name="product_discount" value="{{$product->product_discount}}">
          </div>
        @error('product_discount')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div>
              <p >Ảnh</p>
            <input type="file" name="product_image"/>
            <img  src="{{ URL::to('/') }}/images/{{ $product->product_image }}" class="img-thumbnail" width="100" />
            <input type="hidden" name="hidden_image" value="{{ $product->product_image }}" />
          </div>
          @error('product_image')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Màu sắc</label>
            <input type="text" class="form-control" name="product_color" value="{{$product->product_color}}">
          </div>
          @error('product_color')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <h4>Số lượng</h4>
        @foreach($quantities as $key => $q)
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Size: {{$q->size_name}}</label>
          <input type="number" name="quantities[{{ $q->size_id }}]"  class="form-control" value="{{$q->pivot->quantity}}" required>
          <input type="hidden" name="sizes[]" value="{{ $q->size_id }}">
        </div>
        @error('quantities.' . $key)
          <div class="text-danger">{{ $message }}</div>
        @enderror
        @endforeach
          <div class="input-group input-group-outline my-3" style="display: inline">
            <p>Mô tả</p>
            <textarea type="text" class="form-control mt-5" name="product_description"style="width: 100%;" id="product_description">{{$product->product_description}}</textarea>
          </div>
          @error('product_description')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Sửa</button>
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