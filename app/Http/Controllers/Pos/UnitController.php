<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;

class UnitController extends Controller
{
    public function UnitAll(){

        $units = Unit::latest()->get();
        return view('backend.unit.unit_all',compact('units'));
    } // end method

    public function UnitAdd(){

        return view('backend.unit.unit_add');
    } // end method

    public function UnitStore(Request $request){
        
        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
            
        ]);


        $notification = array(
            'message' => 'เพิ่มข้อมูลหน่วยนับเรียบร้อยแล้ว', 
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    } // end method

    public function UnitEdit($id){

        $units = Unit::findOrFail($id);
        return view('backend.unit.unit_edit',compact('units'));

    }// end method

    public function UnitUpdate(Request $request){

        $unit_id = $request->id;
        

        

        Unit::findOrFail($unit_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);


        $notification = array(
            'message' => 'ปรับปรุงข้อมูลหน่วยนับเรียบร้อยแล้ว', 
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);

      

        

        

    }// end method
}
