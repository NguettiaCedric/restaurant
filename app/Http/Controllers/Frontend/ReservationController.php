<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    //

    public function etape1(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();

        // dd($max_date);
        return view('reservations.etape-1', compact('reservation', 'min_date', 'max_date'));
    }

    public function storeEtape1(Request $request)
    {

        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'tel_number' => ['required'],
            'guest_number' => ['required'],
        ]);

        // dd($request->toArray());

        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }

        $tables = Table::all();

        return view('reservations.etape-2', compact('tables'));

    }


    public function etape2(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $res_table_ids = Reservation::orderBy('res_date')->get()->filter(function ($value) use ($reservation) {
            return $value->res_date->format('Y-m-d') == $reservation->res_date->format('Y-m-d');
        })->pluck('table_id');

        // $tables = Table::where('status', TableStatus::Avalaiable)
        //     ->where('guest_number', '>=', $reservation->guest_number)
        //     ->whereNotIn('id', $res_table_ids)->get();


        $tables = Table::all();
        // dd($tables->toArray());
        return view('reservations.etape-2', compact('reservation', 'tables'));
    }

    public function storeEtape2(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);
        $reservation = $request->session()->get('reservation');

        $table = Table::findOrfail($request->table_id);
        // dd($request->toArray());
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Choisissez une autre table SVP');
        }
        // dd($reservation->toArray());

        $reservation->fill($validated);
        $reservation->save();
        $request->session()->forget('reservation');

        return to_route('thankyou');
    }
}
