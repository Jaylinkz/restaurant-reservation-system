<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\resultsExport;
use App\Imports\resultsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\result;

class ResultController extends Controller
{
 public function fileexport(){
     $num = Auth::user()->matric_no;
     $users = result::Where('matric_no',$num)->get();
     return view('Student.results',compact('users'));
 }   
 public function fileimport()
 {
     return view('Lecturer.results');
 }
 public function export()
 {
     return Exel::download(new resultsExport, 'results.xlsx');
 }

 public function import(Request $request)
 {
     Exel::import(new resultsImport,$request()->file('file')->store('temp'));
     return back();
 }
}
