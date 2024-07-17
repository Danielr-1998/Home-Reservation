<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:clients,email',
        ]);

        Client::create($request->all());
        return redirect()->route('clients.index');
    }

public function checkEmail(Request $request)
{
    $email = $request->query('email');
    $exists = Client::where('email', $email)->exists();

    return response()->json(['exists' => $exists]);
}
}
