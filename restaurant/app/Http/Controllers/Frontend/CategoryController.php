<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
class CategoryController extends Controller
{
    public function index()
    { 
    $categories = category::all();
   return view('Categories.index',compact('categories'));
    }

    public function show(category $category){
    
    return view('Categories.show',compact('category'));
    }
}
