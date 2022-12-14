<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Carbon\Carbon;
use Enums\TableStatus;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $reservations = Reservation::all();
        // $reservations = Reservation::with([
        //   'table',
        // ])->get();

        $reservations = Reservation::with('table')
        ->orderBy('created_at' ,'desc')
        ->get();

        // dd($reservations->toArray());

        return view('admin.reservations.index', [
            'reservations' => $reservations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $tables = Table::all();
        // $tables = Table::where('status', TableStatus::Indisponible)->get();

        return view('admin.reservations.create', [
            'tables' => $tables,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $table = Table::findOrfail($request->table_id);
        // dd($request->toArray());
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Choisissez une autre table SVP');
        }

        // $request_date = Carbon::parse($request->res_date);
        // foreach ($table->reservations as $res) {
        //     if ($res->res_date == $request_date->res_date) {
        //         return back()->with('warning', 'La table est déja reservé');
        //     }
        // }

        $request->validate([
            // 'first_name' => 'required',
            'last_name' => 'required',
            'tel_number' => 'required',
            'res_date' => ['required' , 'date', new DateBetween, new TimeBetween],
            'guest_number' => 'required',
        ]);

        // $image = $request->file('image')->store('public/categories');

        // dd($request->toArray());

        Reservation::create([
            'first_name'  => $request->first_name,
            'last_name'  => $request->last_name,
            'email'  => $request->email,
            'tel_number'  => $request->tel_number,
            'res_date'  => $request->res_date,
            'table_id'  => $request->table_id,
            'guest_number'  => $request->guest_number,

        ]);


        return redirect()->route('admin.reservation.index')->with('success', 'Reservation enregistrée avec succès.');

        // return back()->with('success' , 'Votre devis a été envoyé avec succès');
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
    public function edit(Reservation $reservation)
    {
        //

        $tables = Table::all();
        return view('admin.reservations.edit', [
            'tables' => $tables,
            'reservation' => $reservation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //

        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'warning', 'Choisissez une autre table SVP');
        }

        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res) {
            if ($res->res_date == $request_date) {
                return back()->with('warning', 'Cette table est reservée pour aujourd\'hui.');
            }
        }

        $request->validate([
            'last_name' => 'required',
            'tel_number' => 'required',
            'res_date' => 'required',
            'guest_number' => 'required',
        ]);

        // $image = $request->file('image')->store('public/categories');

        // dd($request->toArray());

        $reservation->update([
            'first_name'  => $request->first_name,
            'last_name'  => $request->last_name,
            'email'  => $request->email,
            'tel_number'  => $request->tel_number,
            'res_date'  => $request->res_date,
            'table_id'  => $request->table_id,
            'guest_number'  => $request->guest_number,

        ]);


        return redirect()->route('admin.reservation.index')->with('warning', 'Reservation modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
        $reservation->delete();
        return to_route('admin.reservation.index')->with('danger', 'Reservation supprimée avec succès.');
    }
}
