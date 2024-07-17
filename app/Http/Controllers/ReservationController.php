<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Apartment;
use App\Models\Client;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['apartment', 'client'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $apartments = Apartment::all();
        $clients = Client::all();
        return view('reservations.create', compact('apartments', 'clients'));
    }

public function checkAvailability(Request $request)
{
    $apartmentId = $request->query('apartment_id');
    $startDate = $request->query('start_date');
    $endDate = $request->query('end_date');

    $conflictingReservations = Reservation::where('apartment_id', $apartmentId)
        ->where('status', 'active')
        ->where(function($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                  ->orWhereBetween('end_date', [$startDate, $endDate])
                  ->orWhereRaw('? BETWEEN start_date AND end_date', [$startDate])
                  ->orWhereRaw('? BETWEEN start_date AND end_date', [$endDate]);
        })->exists();

    return response()->json(['available' => !$conflictingReservations]);
}
    public function store(Request $request)
    {
        $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'client_id' => 'required|exists:clients,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:active,cancelled',
        ]);

        $apartment = Apartment::find($request->apartment_id);
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Check for availability
        $existingReservation = Reservation::where('apartment_id', $apartment->id)
            ->where('status', 'active')
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate])
                      ->orWhere(function ($query) use ($startDate, $endDate) {
                          $query->where('start_date', '<', $startDate)
                                ->where('end_date', '>', $endDate);
                      });
            })
            ->first();

        if ($existingReservation) {
            return back()->withErrors('The apartment is already reserved for the selected dates.');
        }

        // Create reservation code
        $code = strtoupper(substr(md5(time()), 0, 8));

        // Create reservation
        $reservation = Reservation::create([
            'code' => $code,
            'apartment_id' => $apartment->id,
            'client_id' => $request->client_id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => $request->status,
        ]);

        return redirect()->route('reservations.index');
    }
}
