<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\menu;

class MenuController extends Controller
{
 public function index()
 {
$menus = menu::all();
return view ('menus.index',compact('menus'));
 }
}
