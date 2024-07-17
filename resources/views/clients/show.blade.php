{{-- clients/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Detalles del Cliente</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $client->id }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $client->first_name }}</td>
        </tr>
        <tr>
            <th>Apellido</th>
            <td>{{ $client->last_name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $client->email }}</td>
        </tr>
        <!-- Agrega otros campos según sea necesario -->
    </table>
@endsection
