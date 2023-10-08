<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function CustomerAll(){

        $customers = Customer::latest()->get();

        return view('backend.customer.customer_all',compact('customers'));

    }// end method

    public function CustomerAdd(){

        return view('backend.customer.customer_add');

    }// end method

    public function CustomerStore(Request $request){

        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);        
        
        $save_url = 'upload/customer/'.$name_gen;

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'เพิ่มข้อมูลลูกค้าเรียบร้อยแล้ว', 
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

    }// end method
}
