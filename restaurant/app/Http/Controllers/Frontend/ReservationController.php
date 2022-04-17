<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Carbon\Carbon;

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
    { $validate - $request->validate([
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
    return to_route('resservations.step.two');
}
public function stepTwo(Request $request)
{
$reservation = $request->session()->get('reservation');
$tables = Table::where('status',TableStatus::Available)->get();
return view('reservations.step-two',compact('reservation','tables'));
}
}
