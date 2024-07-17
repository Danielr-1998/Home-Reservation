<!-- resources/views/clients/index.blade.php -->

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
            <h1 class="text-5xl font-bold font-editorial text-gray-500">Clientes</h1>
<button 
    type="button"     class="font-editorial w-[250px] bg-black h-[50px] my-3 flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#fdfffe] before:to-[rgb(0,0,0)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]"
    onclick="window.location.href='{{ route('clients.create') }}';"
>
    Agregar Cliente
</button>		<div class="overflow-auto lg:overflow-visible ">
<table class="table text-gray-400 border-separate space-y-6 text-sm">
    <thead class="bg-gray-800 text-gray-500 rounded-t-lg">
        <tr>
            <th class="p-3">ID</th>
            <th class="p-3">Nombre</th>
            <th class="p-3">Apellido</th>
            <th class="p-3">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr class="bg-gray-800 rounded-lg shadow-lg">
            <td class="p-3 rounded-l-lg">
                <div class="flex align-items-center">
		    <img class="rounded-full h-12 w-12 object-cover" src="https://randomuser.me/api/portraits/men/{{$client->id}}.jpg" alt="unsplash image">
                    <div class="ml-3">
                        <div></div>
                    </div>
                </div>
            </td>
            <td class="p-3"><a href="{{ route('clients.show', $client->id) }}" class="open-client" data-id="{{ $client->id }}">Ver Detalles</a></td>
            <td class="p-3">{{ $client->last_name }}</td>
            <td class="p-3 rounded-r-lg">{{ $client->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


<script>
        document.addEventListener('DOMContentLoaded', function() {
            const clientLinks = document.querySelectorAll('.open-client');

            clientLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const clientId = this.getAttribute('data-id');
                    const url = this.href;
                    window.open(url, '_blank');
                });
            });
        });
    </script>
@endsection

