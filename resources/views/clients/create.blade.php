<!-- resources/views/clients/create.blade.php -->

@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
 <style>
        .font-editorial {
            font-family: 'Editorial New', serif;
        }
    </style>
    <h1><p class="font-medium font-editorial text-5xl text-white">Agregar Cliente</p></h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Nombre</p></label>
            <input type="text" class="form-control  rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="first_name" name="first_name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Apellido</p></label>
            <input type="text" class="form-control  rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="last_name" name="last_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Email</p></label>
            <input type="email" class="form-control  rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="email" name="email" required>
                <span id="email-exists-alert" class="text-red-500 font-medium sm:text-lg ml-4 text-emerald-600 hidden">Este correo ya está en uso.</span>
	</div>
        <button type="submit" class="font-editorial w-[250px] bg-black h-[50px] my-3 flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#fdfffe] before:to-[rgb(0,0,0)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]">Agregar Cliente</button>
    </form>
    @endsection


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email');
            const emailAlert = document.getElementById('email-exists-alert');
            const form = document.getElementById('create-client-form');

            emailInput.addEventListener('keyup', function () {
                const email = emailInput.value;
                if (email) {
                    fetch(`/check-email?email=${email}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.exists) {
                                emailAlert.classList.remove('hidden');
                            } else {
                                emailAlert.classList.add('hidden');
                            }
                        });
                } else {
                    emailAlert.classList.add('hidden');
                }
            });

            form.addEventListener('submit', function (e) {
                if (!emailAlert.classList.contains('hidden')) {
                    e.preventDefault();
                    alert('No se puede crear el cliente. El correo ya está en uso.');
                }
            });
        });
    </script>


