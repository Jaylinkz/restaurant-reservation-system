<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\resultsExport;
use App\Imports\resultsImport;
use App\Models\result;
use Auth;


class ResultController extends Controller
{
 public function fileexport(){
    //$num = Auth::user()->matric_no;Where('matric_no',$num)
     $users = result::get();
     return view('Student.results',compact('users'));
 }   

 public function fileimport()
 {
     return view('Lecturer.results');
 }
 //file export method that makes each students results downloadable
 public function export()
 {
     return Excel::download(new resultsExport, 'results.xlsx');
 }
 //file import method for importing results into the database
 public function import()
 {
     Excel::import(new resultsImport,request()->file('file'));
     return back()->withStatus('Exel file imported successfully');
 }
}
