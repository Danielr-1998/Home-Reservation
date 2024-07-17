<!-- resources/views/tariffs/create.blade.php -->

@extends('layouts.app')

@section('content')
<style>
        .font-editorial {
            font-family: 'Editorial New', serif;
        }
    </style>
   <script src="https://cdn.tailwindcss.com"></script>
<h1><p class="font-medium font-editorial text-5xl text-white">Agregar Tarifa</p></h1>
    <form action="{{ route('tariffs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="apartment_id" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Apartamento</p></label>
            <select class="form-select rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="apartment_id" name="apartment_id" required>
                @foreach($apartments as $apartment)
                    <option value="{{ $apartment->id }}">{{ $apartment->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
          <label for="type" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Tipo</p></label>
            <select class="form-select rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="type" name="type" required>
                <option value="monthly">Mensual</option>
                <option value="daily">Diario</option>
            </select>
        </div>
        <div class="mb-3">
          <label for="start_date" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Fecha de Inicio</p></label>
            <input type="date" class="form-control rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
          <label for="end_date" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Fecha de Fin</p></label>
            <input type="date" class="form-control rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="end_date" name="end_date" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Precio</label>
            <input type="number" step="0.01" class="form-control rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="value" name="value" required>
        </div>
        <button type="submit" class="font-editorial w-[250px] bg-black h-[50px] my-3 flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#fdfffe] before:to-[rgb(0,0,0)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]">Agregar Tarifa</button>
    </form>
@endsection
