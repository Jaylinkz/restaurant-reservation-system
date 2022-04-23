<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
class WelcomeController extends Controller
{
public function index()
{
    $specials = category::where('name','specials')->first();
    return view('welcome',compact('specials'));
}
public function thankyou()
{
    return view('reservations.thankyou');
}
}
