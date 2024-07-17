<!-- resources/views/reservations/index.blade.php -->

@extends('layouts.app')

@section('content')
 <style>
        .font-editorial {
            font-family: 'Editorial New', serif;
        }
    </style>
   <script src="https://cdn.tailwindcss.com"></script>
<link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="flex justify-center min-h-screen bg-gray-100">
	<div class="col-span-12">
	            <h1 class=" text-gray-500 text-5xl font-bold font-editorial">Reservacion</h1>	<div class="overflow-auto lg:overflow-visible ">
<button 
    type="button"     class="font-editorial w-[250px] bg-black h-[50px] my-3 flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#fdfffe] before:to-[rgb(0,0,0)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]"
    onclick="window.location.href='{{ route('reservations.create') }}';"
>
    Agregar Reservacion
</button>	
<table class="table text-gray-400 border-separate space-y-6 text-sm">
    <thead class="bg-gray-800 text-gray-500 rounded-t-lg">
        <tr>
           
                <th class="p-3">Codigo Reserva</th>
                <th class="p-3">Apartamento</th>
                <th class="p-3">Cliente</th>
                <th class="p-3">Inicio</th>
                <th class="p-3">Fin</th>
                <th class="p-3">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr class="bg-gray-800 rounded-lg shadow-lg">
                    <td class="p-3 rounded-l-lg">{{ $reservation->code }}</td>
                    <td>{{ $reservation->apartment->name }}</td>
                    <td>{{ $reservation->client->first_name }} {{ $reservation->client->last_name }}</td>
                    <td>{{ $reservation->start_date }}</td>
                    <td>{{ $reservation->end_date }}</td>
                    <td>    @if($reservation->status == 'active')
                        <span class="bg-green-400 text-gray-50 rounded-md px-2">Activa</span>
                    @else
                        <span class="bg-red-400 text-gray-50 rounded-md px-2">Cancelada</span>
                    @endif</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

