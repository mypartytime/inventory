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
use App\Models\Supplier;

class ProductController extends Controller
{
    public function ProductAll(){

        $products = Product::latest()->get();
        return view('backend.product.product_all',compact('products'));
    } // end method

    public function ProductAdd(){

        $unit = Unit::all();
        $category = Category::all();
        $supplier = Supplier::all();
        return view('backend.product.product_add',compact('unit','category','supplier'));
    } // end method

    public function ProductStore(Request $request){

        Product::insert([

            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'เพิ่มสินค้าเรียบร้อยแล้ว', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);

    } // end method

    public function ProductEdit($id){

        $unit = Unit::all();
        $category = Category::all();
        $supplier = Supplier::all();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('unit','category','supplier','product'));
    } // end method

    public function ProductUpdate(Request $request){

        $product_id = $request->id;

         Product::findOrFail($product_id)->update([

            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id, 
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'อัพเดทสินค้าเรียบร้อยแล้ว', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification); 


    } // End Method 
}
