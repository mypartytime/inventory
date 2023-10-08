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

    public function CustomerEdit($id){

        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit',compact('customer'));

    }// end method

    public function CustomerUpdate(Request $request){

        $customer_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('customer_image')) {

            if (!empty($old_image)) {
                unlink($old_image);
            } // delete old image before save

        $image = $request->file('customer_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);        
        
        $save_url = 'upload/customer/'.$name_gen;

        Customer::findOrFail($customer_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'ปรับปรุงข้อมูลลูกค้าเรียบร้อยแล้ว', 
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

        } else {

            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
            ]);
    
    
            $notification = array(
                'message' => 'ปรับปรุงข้อมูลลูกค้าเรียบร้อยแล้ว ใช้รูปเดิม', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('customer.all')->with($notification);

        }

        

    }// end method

    public function CustomerDelete($id){

        $customer = Customer::findOrFail($id);
        $img_link = $customer->customer_image;

        unlink($img_link);

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'ลบข้อมูลเรียบร้อยแล้ว', 
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification);

    }// end method
}
