<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\result;
use App\Exports\resultsExport;

class HomeController extends Controller
{
  public function index()
  {
    $users = User::all();
    $role=Auth::user()->role;
    $mat_no = Auth::user()->matric_no;
    //reditrects to admin view if login attempt is from admin
    if($role=='1'){
        return view('Admin.admin',compact('users'));
    }
    //redirects to lecturers view if login attempt is from a lecturer
    
    if($role=='2'){
        return view('Lecturer.seller',compact('users'));
    }
      //redirects to students view if login attempt is from a student
    else
    {
      try{
        $users = result::where('matric_number',$mat_no)->get();
      }catch(QueryException $e){
        dd($e->getMessage());
      }
      return view('Student.Student',compact('users'));
    }
    
  }
} 
 
