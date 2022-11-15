<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function CategoryAll(){
        $categories = Category::latest()->get();
        return view('backend.category.category_all', compact('categories'));
    }

    public function CategoryAdd(){
        return view('backend.category.category_add');
    }

    public function CategoryStore(Request $request){
        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Category  Inserted Successfully",
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }
}
