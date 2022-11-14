<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $menus = Menu::orderBy('created_at', 'desc')->get();
        // dd($menus->toArray());
        return view('admin.menus.index' , [

            'menus' => $menus,
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

        $categories = Category::all();
        return view('admin.menus.create',[
            'categories' => $categories
        ]);
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
            // 'image' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        // $image = $request->file('image')->store('public/categories');
        // dd($request->toArray());

        $menus = Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            // 'image' => $image

        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $menus->addMediaFromRequest('image')->toMediaCollection('images');
        }

        /* Remplissage de la table pivot */

        // $categories = json_decode($request->categories);
        $categories = $request->categories;

        foreach ($categories as $key => $value) {
            if ($value) {
                $menus->categories()->attach($value);
            }
        }

        // if($request->has('categories')){
        //     $menus->categories()->attach($request->catogories);
        // }


    //     if($request->menus != 'null') {
    //         $country_groups = $request->categories;
    //         $category_id = $menus->id;
    //         $menus->course_group()->attach($menus);
    //    }

    //    if($request->menus != 'null') {
    //         $menus = $request->menus_id;
    //         $category_id = $category->id;
    //         $category->categories()->attach($menus);
    //     }





        // if($request->has('categories')){
        //     $menus->categories()->attach($request->catogories);
        // }


        // foreach ($request->categories as $key => $value) {
        //     if($request->has('categories')){
        //         $menus->categories()->attach($request->catogories);
        //     }
        // }

        // for($i=0;$i<$request->count;$i++)
        // {
        //     DB::table('category_menu')->insert(
        //         array(
        //         'menu_id' =>   $menus->id,
        //         'category_id' =>   $menus->id,
        //     ));
        // }


        return redirect()->route('admin.menus.index')->with('success','Menu enregistré avec succès.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
        // dd($menu->toArray());
        $categories = Category::all();
        return view('admin.menus.edit' , [
            'menu' => $menu,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
        $request->validate([
            'name' => 'required',
            // 'image' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        // dd($request->toArray());

        $menu->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            // 'image' => $image
        ]);

        if ($menu) {
            if ($request->hasFile('image')) {
                $menu->clearMediaCollection('images');
                $menu->addMediaFromRequest('image')->toMediaCollection('images');
            }
        }

        // if($request->has('categories')){
        //     $menu->categories()->sync($request->catogories);
        // }

        $menu->categories()->detach();

        $categories = $request->categories;
        foreach ($categories as $key => $value) {
            $menu->categories()->attach($value);
        }

        return to_route('admin.menus.index')->with('danger','Menu modifié avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
        // dd($menu->toArray());
        $menu->delete();
        return to_route('admin.menus.index')->with('danger','Menu supprimé avec succès.');
    }
}
