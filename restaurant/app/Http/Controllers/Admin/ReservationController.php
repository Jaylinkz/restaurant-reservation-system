<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use App\Enums\TableStatus;
use App\Http\Requests\ReservationStoreRequest;
use Carbon\Carbon;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $reservations = Reservation::all();
      return view("Admin.reservations.index",compact('reservations'));  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $tables = Table::where('status',TableStatus::Available)->get();
    return view("Admin.reservations.create",compact('tables'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $req)

    {
        $table = Table::findOrFail($req->table_id);
        if($req->guest_number > $table->guest_number){
            return back()->with('warning','please choose a table with as many spaces available as you need');
        }
        $request_date = Carbon::parse($req->res_date);
        foreach($table->Reservation as $res){
            if($res->res_date->format('y-m-d') == $request_date->format('y-m-d')){
                return back()->with('warning','this table is already reserved for this date');
            }
        }
    Reservation::create($req->validated());
    return back()->with('success','Reservation created successfully');
   
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
    $tables = Table::where('status',TableStatus::Available)->get();
    $reservation = Reservation::find($id);
    return view('Admin.reservations.edit',compact('reservation','tables'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationStoreRequest $req, Reservation $reservation)
    {
        $table = Table::findOrFail($req->table_id);
        if($req->guest_number > $table->guest_number){
            return back()->with('warning','please choose a table with as many spaces available as you need');
        }
        $request_date = Carbon::parse($req->res_date);
        $reservations = $table->Reservation()->where('id','!=', $reservation->id)->get();
        foreach($reservations as $res){
            if($res->res_date->format('y-m-d') == $request_date->format('y-m-d')){
                return back()->with('warning','this table is already reserved for this date');
            }
        }
        $reservation->update($req->validated());
        return back()->with('success','Reservation updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Reservation::destroy($id);
       return view("Admin.reservations.index")>with('success','Reservation deleted successfully'); 
        //
    }
}
