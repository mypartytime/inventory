<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function CategoryAll(){

        $categories = Category::latest()->get();
        return view('backend.category.category_all',compact('categories'));
    } // end method

    public function CategoryAdd(){

        return view('backend.category.category_add');
    } // end method

    public function CategoryStore(Request $request){
        
        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
            
        ]);


        $notification = array(
            'message' => 'เพิ่มข้อมูลหมวดหมู่เรียบร้อยแล้ว', 
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    } // end method
}
