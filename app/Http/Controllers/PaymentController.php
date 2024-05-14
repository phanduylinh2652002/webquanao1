<?php

namespace App\Http\Controllers;
use App\Product;
use App\Customer;
use App\Size;
use App\Bill;
use App\Bill_detail;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    //
    function getFormCustomers(){
        return view('frontend.formCustomer');
    }
    public function payment(CustomerRequest $request)
    {  
        DB::transaction(function () use ($request) {
                $carts = Session::get('carts') ?? [];
                $customer = Customer::query()->firstOrCreate([
                    'customer_email' => $request->get('customer_email'),
                    'customer_phone' => $request->get('customer_phone'),
                ], [
                    'customer_name' => $request->get('customer_name'),
                    'customer_address' => $request->get('customer_address'),
                ]);

                $bill = new Bill;
                $bill->customer_id = $customer->customer_id;
                $bill->user_id = Session::get('user_id');
                $bill->bill_date = now();
                $bill->bill_total = Session::get('total');

                $bill->save();

                if (count($carts) > 0) {
                    foreach ($carts as $key => $item) {
                        $billDetail = new Bill_detail;
                        $billDetail->bill_id = $bill->bill_id;
                        $billDetail->product_id = $item['id'];
                        $billDetail->size_name = $item['size_name'];
                        $billDetail->quantity = $item['qty'];
                        $billDetail->price = $item['price'];
                        $billDetail->save();

                        $product = Product::query()->findOrFail($item['id']);
                        $quantity = $product->sizes()
                        ->where('product_id', $item['id'])
                        ->where('sizes.size_id', $item['size_id'])
                        ->first();
                        $product->sizes()->updateExistingPivot($item['size_id'], ['quantity' => $quantity->pivot->quantity-$item['qty']]);
                    }
                }

                // del
                Session::forget('carts');
                Session::forget('total');
            });


        return view('frontend.paySuccess');
    }
    public function paySuccess()
    {
        
        Session::forget('carts');
        Session::forget('total');
        Session::forget('redirect');
        return view('frontend.paySuccess');
    }
}
