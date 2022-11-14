<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $categories = Category::all();

        // dd($categories->toArray());
        return view('categories.index',[
            'categories' => $categories,
        ]);
    }


    public function show(Category $category)
    {
        // $category = Category::with('menus')->get();
        // dd($category->toArray());
        return view('categories.show',[
            'category' => $category,
        ]);
    }
}
