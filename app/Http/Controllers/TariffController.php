<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use App\Models\Apartment;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::with('apartment')->get();
        return view('tariffs.index', compact('tariffs'));
    }

    public function create()
    {
        $apartments = Apartment::all();
        return view('tariffs.create', compact('apartments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'type' => 'required|in:monthly,daily',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'value' => 'required|numeric',
        ]);

        Tariff::create($request->all());
        return redirect()->route('tariffs.index');
    }
}
