<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MenuStoreRequest;
use App\Models\menu;
use App\Models\category;
use Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = menu::all();
        return view("Admin.menus.index", compact('menus'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view("Admin.menus.create",compact('categories'));//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');
        $menu = menu::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'price'=>$request->price,
        'image'=>$image
        ]);// 
        if($request->has('categories')){
            $menu->category()->attach($request->categories);
         
        };
        return to_route('Admin.menus.index')->with('success','Menu created successfully');//
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
    public function edit(menu $menu)
    {
        $categories = category::all();
        return view("Admin.menus.edit",compact('categories','menu')); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, menu $menu)
    {
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'price'=>'required',
        ]);//
        $image = $menu->image;
        if($request->hasFile('image')){
            storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');
        }
        $menu->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $image,
            'price'=> $request->price,
            
        ]);
        if($request->has('categories')){
            $menu->category()->sync($request->categories);
         
        };
        return to_route('Admin.menus.index')->with('success','Menu updated successfully');;  //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(menu $menu)
    {
       storage::delete($menu->image);
       $menu->category()->detach();
       $menu->delete();
       return to_route('Admin.menus.index')->with('danger','menu deleted successfully'); //
    }
}
