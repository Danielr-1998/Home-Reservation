<!-- resources/views/apartments/create.blade.php -->

@extends('layouts.app')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <h1><p class="font-medium text-5xl text-white">Agregar Apartamento</p></h1>
    <form action="{{ route('apartments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Nombre</p></label>
            <input type="text" class="form-control rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Direccion</p></label>
            <input type="text" class="form-control rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Tipo</p></label>
            <select class="form-select rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="type" name="type" required>
                <option value="corporate">Corporativo</option>
                <option value="tourist">Turistico</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Ciudad</p></label>
            <input type="text" class="form-control rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="city" name="city" required>
        </div>
        <button type="submit" class="font-editorial w-[250px] bg-black h-[50px] my-3 flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#fdfffe] before:to-[rgb(0,0,0)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]">Agregar Apartamento</button>
    </form>
@endsection

