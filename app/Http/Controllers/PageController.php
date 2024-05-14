<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Bill;
use App\Bill_detail;
class PageController extends Controller
{
    //
    public function getProduct(){
        $products = Product::join('categories', 'categories.category_id', 'products.category_id')
        ->select(
            'products.product_id',
            'products.product_name',
            'products.product_image',
            'products.product_price',
            'products.product_discount',
            'categories.category_gender'
        )
        ->orderByRaw('RAND()')
        ->limit(10)->get();
        $sellings = Product::select(
            'products.product_id',
            'products.product_name',
            'products.product_image',
            'products.product_price',
            'products.product_discount'
        )
        ->orderByRaw('RAND()')
        ->limit(10)->get();
        return view('frontend.homepage', compact('products', 'sellings'));
    }
    public function getDetail($id_name, Request $req){
        $size = $req->get('size');
        $products = Product::where('product_id', $id_name)->first();
        $quantities = $products->sizes()->withPivot('quantity')->get();
        return view('frontend.detailProduct', compact('products', 'quantities', 'size'));
    }
    public function search(Request $req)
    {
        $product = Product::where('product_name', 'like', '%' . $req->key . '%')
            ->orwhere('product_price', $req->key)
            ->paginate(12);
        return view('frontend.search', compact('product'));
    }
    public function getAllCategories(Request $req)
    {
        if($req->key == 'begai')
            $key = 'Nữ';
        elseif($req->key == 'betrai')
            $key = 'Nam';
        else
            $key = 'Phụ kiện';
        $products = Product::join('categories', 'products.category_id', 'categories.category_id')
        ->select(
            'products.product_id',
            'products.product_name',
            'products.product_image',
            'products.product_price',
            'products.product_discount'
        )
        ->orderByRaw('RAND()')
        ->where('categories.category_gender', $key)->limit(8)->get();
        return view('frontend.category', compact('products'));
    }
    public function manageOrder(){
        $user_id = Auth::id();
        // $bill = Bill::join('customers', 'bills.customer_id', 'customers.customer_id')
        // ->join('bill_details', 'bill_details.bill_id', 'bills.bill_id')
        // ->join('products', 'products.product_id', 'bill_details.product_id')
        $bill = Bill::where('bill_id', 4)
        ->first();
        dd($bill->bill_detail);


        $products = [];
        foreach ($bill as $b){
            if($b->user_id == $user_id){
                $product = Bill::leftjoin('bill_details', 'bill_details.bill_id', 'bills.bill_id')
                ->leftjoin('products', 'bill_details.product_id', 'products.product_id')
                ->where('bills.bill_id', $b->bill_id)
                ->select(
                    'bills.bill_id',
                    'products.product_id',
                    'products.product_name',
                    'bill_details.price',
                    'bill_details.quantity',
                    'bill_details.size_name'
                )
                ->get();
            }
            if ($product) {
                $products[] = $product;
            }
        }
        // dd($products);

        return view('frontend.manageOrder', compact('bill', 'products'));
    }
}
