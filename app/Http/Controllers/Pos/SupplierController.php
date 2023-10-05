<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function SupplierAll(){

        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all',compact('suppliers'));

    } // end method

    public function SupplierAdd(){

        
        return view('backend.supplier.supplier_add');

    } // end method

    public function SupplierStore(Request $request){

        Supplier::insert([

            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'บันทึกข้อมูลผู้ขายเรียบร้อยแล้ว', 
            'alert-type' => 'info'
        );

        

        return redirect()->route('supplier.all')->with($notification);

    } // end method
}
