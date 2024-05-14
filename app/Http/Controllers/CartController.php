<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Size;

class CartController extends Controller
{
    //
    public function index(Request $req)
    {
        // dd(Session::all());
        $carts = Session::get('carts') ?? [];
        // dd($carts);
        // Session::forget('carts');
        // Session::forget('total');
        return view('frontend.cart', compact('carts'));
    }
    public function cart(Request $request)
    {
        $carts = Session::get('carts') ?? [];
        $size_id = $request->get('size');
        $sizes = Size::query()->findOrFail($size_id);
        $product_id = $request->get('product_id');
        $product = Product::query()->findOrFail($product_id);
        $key = sprintf('product_id_%s', $product_id);
        $productKey = $key . '_size_' . $size_id;
        $quantity = $product->sizes()->pluck('quantity');
        if (!array_key_exists($productKey, $carts)) {
            $carts[$productKey] = [
                'id' => $product_id,
                'name' => $product->product_name,
                'option' => $product->product_image,
                'price' => $product->product_discount > 0 ? $product->product_discount : $product->product_price,
                'size_id' => $size_id,
                'size_name' => $sizes->size_name,
                'quantity' => $quantity[$size_id-1],
                'qty' => 1,
                'subtotal' => $product->product_discount > 0 ? $product->product_discount : $product->product_price * 1,
            ];
        } else {
            $productCart = $carts[$productKey];
            $productCart['qty'] = $productCart['qty'] + 1;
            $productCart['subtotal'] = $productCart['qty'] * $productCart['price'];
            $carts[$productKey] = $productCart;
        }
        $user_id = Auth::id();
        Session::put('user_id', $user_id);
        Session::put('carts', $carts);
        $this->totalCart();
        return Redirect(url('showCart'));
    }
    public function up(Request $request)
    {
        $carts = Session::get('carts') ?? [];
        $size_id = $request->get('size');
        $product_id = $request->get('product_id');
        Product::query()->findOrFail($product_id);
        $key = sprintf('product_id_%s', $product_id);
        $productKey = $key . '_size_' . $size_id;
        if (array_key_exists($productKey, $carts)) {
            $productCart = $carts[$productKey];
            $productCart['qty'] = $productCart['qty'] + 1;
            $productCart['subtotal'] = $productCart['qty'] * $productCart['price'];
            $carts[$productKey] = $productCart;
        }
        Session::put('carts', $carts);
        $this->totalCart();

        return Redirect(url('showCart'));
    }

    public function down(Request $request)
    {
        $size_id = $request->get('size');
        $carts = Session::get('carts') ?? [];
        $product_id = $request->get('product_id');
        Product::query()->findOrFail($product_id);
        $key = sprintf('product_id_%s', $product_id);
        $productKey = $key . '_size_' . $size_id;
        if (array_key_exists($productKey, $carts)) {
            $productCart = $carts[$productKey];
            if ($productCart['qty'] === 1) {
                unset($carts[$productKey]);
            } else {
                $productCart['qty'] = $productCart['qty'] - 1;
                $productCart['subtotal'] = $productCart['qty'] * $productCart['price'];
                $carts[$productKey] = $productCart;
            }
        }
        Session::put('carts', $carts);
        $this->totalCart();

        return Redirect(url('showCart'));
    }


    public function remove(Request $request)
    {
        $carts = Session::get('carts') ?? [];
        $product_id = $request->get('product_id');
        Product::query()->findOrFail($product_id);
        $productKey = sprintf('product_id_%s', $product_id);
        if (array_key_exists($productKey, $carts)) {
            unset($carts[$productKey]);
        }
        Session::put('carts', $carts);
        $this->totalCart();

        return Redirect(url('showcart'));
    }

    public function destroy()
    {
        Session::forget('carts');

        return Redirect(url('showcart'));
    }

    public function getCheckOut()
    {
        $carts = Session::get('carts') ?? [];
        if (empty($carts)) {
            return Redirect(url(''));
        }

        return view('fontend.checkout', compact('carts'));
    }

    /**
     * @return void
     */
    private function totalCart()
    {
        $carts = Session::get('carts') ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['subtotal'];
        }

        if (!empty($carts)) {
            Session::put('total', $total);
        }
        else{
            Session::forget('total');
        }
    }
}
