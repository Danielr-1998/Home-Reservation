<!-- resources/views/tariffs/index.blade.php -->

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
    <h1 class="text-5xl text-gray-500 font-bold font-editorial">Tarifas</h1>
<button 
    type="button"     class="font-editorial w-[250px] bg-black h-[50px] my-3 flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#fdfffe] before:to-[rgb(0,0,0)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]"
    onclick="window.location.href='{{ route('tariffs.create') }}';"
>
    Agregar Tarifa
</button>                 <div class="overflow-auto lg:overflow-visible ">
		
<table class="table text-gray-100 border-separate space-y-6 text-sm">
    <thead class="bg-gray-300 text-gray-500 rounded-t-lg">
        <tr>	
		<th class="p-3">ID</th>
                <th class="p-3">Apartamento</th>
                <th class="p-3">Tipo</th>
                <th class="p-3">Inicio</th>
                <th class="p-3">Fin</th>
                <th class="p-3">Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tariffs as $tariff)
		    
		<tr class="bg-gray-800 rounded-lg shadow-lg">
	            <td class="p-3 rounded-l-lg">{{ $tariff->id }}</td>
                    <td class="p-3">{{ $tariff->apartment->name }}</td>
 <td>    @if($tariff->type == 'daily')
                        <span class="bg-green-400 text-gray-50 rounded-md px-2">Diaria</span>
                    @else
                        <span class="bg-gray-400 text-gray-50 rounded-md px-2">Mensual</span>
                    @endif</td>
		    <td class="p-3">{{ $tariff->start_date }}</td>
                    <td class="p-3">{{ $tariff->end_date }}</td>
                    <td class="p-3">{{ $tariff->value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

