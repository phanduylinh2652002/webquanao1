<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Size;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::join('categories', 'products.category_id', 'categories.category_id')
        ->select(
            'products.product_id',
            'products.product_name',
            'products.product_price',
            'categories.category_name'
        )->paginate(10);
        return view('admin.product.index', compact('products'));
    }
    public function create(){
        $categories = Category::all(); 
        $products = Product::all(); 
        $sizes = Size::all(); 
        return view('admin.product.create', compact('categories', 'products', 'sizes'));
    }
    public function store(ProductRequest $request){
        // dd($request->all());
        $image = $request->file('product_image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->product_price = $request->product_price;
        $product->product_discount = $request->product_discount;
        $product->product_image = $new_name;
        $product->product_color = $request->product_color;
        $product->product_description = $request->product_description;
        $product->save();
        foreach ($request->quantities as $id => $quantity) {
            $product->sizes()->attach($id, ['quantity' => $quantity]);
        }
        return redirect()->route('product.index');
    }
    public function show($id){
        $products = Product::findOrFail($id);
        $products->get();
        $category_id = $products->category_id;
        $category = Category::findOrFail($category_id);
        $quantities = $products->sizes()->withPivot('quantity')->get();
        return view('admin.product.detail', compact('products', 'category', 'quantities'));
    }
    public function edit(Product $product){
        $categories = Category::all();
        $sizes = Size::all();
        $quantities = $product->sizes()->withPivot('quantity')->get();
        return view('admin.product.edit', compact('categories', 'product', 'sizes', 'quantities'));
    }
    public function update(Product $product, ProductRequest $request){
        // dd($request->all());
        $image_name = $request->hidden_image;
        $image = $request->file('product_image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        $form_data = array(
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_price' => $request->product_price,
            'product_discount' => $request->product_discount,
            'product_image' => $image_name,
            'product_color' => $request->product_color,
            'product_description' => $request->product_description,
        );
        $product->update($form_data);
        foreach ($request->quantities as $id => $quantity) {
            $product->sizes()->updateExistingPivot($id, ['quantity' => $quantity]);
        }
        return redirect()->route('product.index');
    }
    public function destroy(Product $product) {
        $product->delete();
        $product->sizes()->detach();
        return redirect()->route('product.index');
    }
}
