<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Bill;
use App\Bill_detail;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\BillRequest;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    //
    public function index(){
        $bills = Bill::join('customers', 'customers.customer_id', 'bills.customer_id')
            ->select(
                'bills.bill_id',
                'customers.customer_name',
                'bills.bill_date',
                'bills.bill_total',
                'bills.bill_status'
            )
            ->paginate(5);

        return view('admin.bill.index', compact('bills'));
    }
    public function show($id)
    {
        $bill_detail = Bill::leftjoin('bill_details', 'bill_details.bill_id', 'bills.bill_id')
            ->leftjoin('products', 'bill_details.product_id', 'products.product_id')
            ->where('bills.bill_id', $id)
            ->select(
                'products.product_id',
                'products.product_name',
                'bill_details.price',
                'bill_details.quantity',
                'bill_details.size_name'
            )
            ->get();
        $bill_customer = Bill::join('customers', 'customers.customer_id', 'bills.customer_id')
            ->join('bill_details', 'bill_details.bill_id', 'bills.bill_id')
            ->where('bills.bill_id', $id)
            ->select(
                'customers.customer_name',
                'customers.customer_phone',
                'customers.customer_address',
                'customers.customer_email'
            )->firstOrFail(); 
        return view('admin.bill.detail', compact('bill_detail', 'bill_customer'));

    }
    public function edit(Bill $bill) {
        $bill_detail = Bill::leftjoin('bill_details', 'bill_details.bill_id', 'bills.bill_id')
            ->leftjoin('products', 'bill_details.product_id', 'products.product_id')
            ->where('bills.bill_id', $bill->bill_id)
            ->select(
                'products.product_id',
                'products.product_name',
                'bill_details.price',
                'bill_details.quantity',
                'bill_details.size_name'
            )
            ->get();
        $bill_customer = Bill::join('customers', 'customers.customer_id', 'bills.customer_id')
            ->join('bill_details', 'bill_details.bill_id', 'bills.bill_id')
            ->where('bills.bill_id', $bill->bill_id)
            ->select(
                'customers.customer_name',
                'customers.customer_phone',
                'customers.customer_address',
                'customers.customer_email',
                'bills.bill_status'
            )->firstOrFail(); 
        return view('admin.bill.edit', compact('bill', 'bill_detail', 'bill_customer'));
    }
    public function update($id, BillRequest $request){
        // dd($request->get('bill_status'));
        DB::transaction(function () use ($id, $request) {
            $customer = Customer::query()->firstOrCreate([
                'customer_email' => $request->get('customer_email'),
                'customer_phone' => $request->get('customer_phone'),
            ], [
                'customer_name' => $request->get('customer_name'),
                'customer_address' => $request->get('customer_address'),
            ]);

            $bill = Bill::findOrFail($id);
            $bill->bill_status = $request->get('bill_status');
            $bill->save();
        });

        return redirect()->route('bill.index');
    }
}
