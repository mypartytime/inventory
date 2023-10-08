<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;

class ProductController extends Controller
{
    public function ProductAll(){

        $products = Product::latest()->get();
        return view('backend.product.product_all',compact('products'));
    } // end method
}
