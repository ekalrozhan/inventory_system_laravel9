<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function CustomerAll(){
        $customers = Customer::latest()->get();
        return view("backend.customer.customer_all", compact("customers"));
    }
    public function CustomerAdd(){
        return view('backend.customer.customer_add');
    }
}
