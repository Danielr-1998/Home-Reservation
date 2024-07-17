<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
	
	public function index(Request $request)
{
    $query = Apartment::query();

    if ($request->ajax()) {
        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        $apartments = $query->get();
        return response()->json(['apartments' => $apartments]);
    }

    $apartments = $query->get();
    return view('apartments.index', compact('apartments'));
}
	public function create()
    {
        return view('apartments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'type' => 'required|in:corporate,tourist',
            'city' => 'required',
        ]);

        Apartment::create($request->all());
        return redirect()->route('apartments.index');
    }
}
