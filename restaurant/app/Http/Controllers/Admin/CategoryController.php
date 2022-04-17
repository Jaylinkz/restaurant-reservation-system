<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Requests;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\category;
use storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('Admin.categories.index',compact('categories'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.categories.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('public/categories');
        category::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'image'=>$image
        ]);//
        return to_route('Admin.categories.index')->with('success','category created successfully');
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
    public function edit(category $category)
    {
        return view('Admin.categories.edit',compact('category'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  category $category)
    {
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
        ]);//
        $image = $category->image;
        if($request->hasFile('image')){
            storage::delete($category->image);
            $image = $request->file('image')->store('public/categories');
        }
        $category->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $image,
        ]);
        return to_route('Admin.categories.index')->with('success','category updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {  Storage::delete($category->image);
       $category->menu->detach();
       $category->delete();
       return back()->with('danger','category deleted successfully');
    }
}
