<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use App\Enums\TableStatus;
use Carbon\Carbon;
use App\Models\Table;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
     $reservation = $request->session()->get('reservation');
     $min_date = Carbon::today();
     $max_date = Carbon::now()->addWeek();
        return view('reservations.step-one',compact('reservation','min_date','max_date'));
    }
    public function storeStepOne(Request $request)
    { $validate = $request->validate([
        "first_name" =>['required'],
        "last_name" =>['required'],
        "email" =>['required','email'],
        "tel_number" =>['required'],
        
          "res_date" =>['required','date', new DateBetween, new TimeBetween],
         "guest_number" =>['required']
    ]);
    if(empty($request->session()->get('reservation'))){
        $reservation = new Reservation;
        $reservation->fill($validate);
        $request->session()->put('reservation',$reservation);
    }
    else{
        $reservation = $request->session()->get('reservation');
        $reservation->fill($validate);
        $request->session()->put('reservation',$reservation);
    }
    return to_route('reservations.step.two');
}
public function stepTwo(Request $request)
{
$reservation = $request->session()->get('reservation');
$reservations = Reservation::orderBy('res_date')->get()->filter(function($value) use($reservation){
    return $value->res_date->format('Y-m-d')==$reservation->res_date->format('Y-m-d');

})->pluck('table_id');
$tables = Table::where('status',TableStatus::Available)
->where('guest_number','>=', $reservation->guest_number)
->whereNotIn('id',$reservations)->get();
return view('reservations.step-two',compact('reservation','tables'));
}

public function storeStepTwo(Request $req){
    $validated = $req->validate([
        'table_id'=> ['required']
    ]);
    $reservation = $req->session()->get('reservation');
    $reservation->fill($validated);
    $reservation->save();
    $req->session()->forget('reservation');
    return to_route('thankyou');
}
}
