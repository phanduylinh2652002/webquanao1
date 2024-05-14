<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
    //
    public function index(){
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }
}
