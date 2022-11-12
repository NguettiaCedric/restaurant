<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        // dd($categories->toArray());
        return view('admin.categories.index' , [

            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        // $image = $request->file('image')->store('public/categories');

        $categories = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            // 'image' => $image

        ]);


        if($request->hasFile('image') && $request->file('image')->isValid()){
            $categories->addMediaFromRequest('image')->toMediaCollection('images');
        }


        return redirect()->route('admin.categories.index')->with('success','Categorie enregistrer avec success.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        // $image = Image::find($id);
        // dd($Category->toArray());
        return view('admin.categories.edit' , [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        // $image = $request->file('image')->store('public/categories');

        // dd($category->toArray());



        // $categories = Category::find($request->id)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        // ]);


       $category->update([
            'name' => $request->name,
            'description' => $request->description,
            // 'image' => $image

        ]);

        // if($request->hasFile('image') && $request->file('image')->isValid()){
        //     $categories->addMediaFromRequest('image')->toMediaCollection('images');
        // }

        if ($category) {
            if ($request->hasFile('image')) {
                $category->clearMediaCollection('images');
                $category->addMediaFromRequest('image')->toMediaCollection('images');
            }
        }

        // return redirect()->route('admin.categories.index')->with('success','Categorie enregistrer avec success.');
        return to_route('admin.categories.index')->with('success','Categorie enregistrer avec success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //

        // dd($category->toArray());

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','Categorie enregistrer avec success.');



        // Avec du json

        // category::find($request->id)->delete();
        // return response()->json([
        //     'message'=>'supprime avec sucess',
        // ]);
    }
}
