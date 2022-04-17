<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Http\Requests\TableStoreRequest;
use App\Enums\TableStatus;
use App\Enums\TableLocation;
use App\Models\Reservation;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
       return view("Admin.tables.index",compact('tables')); ;//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.tables.create"); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableStoreRequest  $request)
    {
       Table::create([
           'name'=>$request->name,
           'guest_number'=>$request->guest_number,
           'location'=>$request->location,
           'status'=>$request->status,

       ]);  
       return to_route('Admin.tables.index')->with('success','table created successfully');//
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
    public function edit($id)
    {
    $table = Table::find($id) ;
    return view('Admin.tables.edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableStoreRequest $request, $id)
    {
        $identify = Table::find($id);
        $identify->update($request->validated());
        return back()->with('success','Table updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
     $table->Reservation()->delete();
     $table->delete();
     return back()->with('danger','Table deleted successfully');   //
    }
}
