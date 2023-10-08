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
}
