<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function ProductAll(){
        $products = Product::latest()->get();
        return view("backend.product.product_all", compact("products"));
    }
}
