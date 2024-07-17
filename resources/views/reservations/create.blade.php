<!-- resources/views/reservations/create.blade.php -->

@extends('layouts.app')

@section('content')
  <style>
        .font-editorial {
            font-family: 'Editorial New', serif;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.tailwindcss.com"></script>
		    <h1 ><p class="font-editorial font-medium text-5xl text-white">Agregar Reservacion</p></h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="apartment_id" class="form-label"><p class="font-medium ml-4 sm:text-lg text-emerald-600">Apartamento</p></label>
            <select class="form-select rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="apartment_id" name="apartment_id" required>
                @foreach($apartments as $apartment)
                    <option value="{{ $apartment->id }}">{{ $apartment->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="client_id" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Cliente</p></label>
            <select class="form-select rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="client_id" name="client_id" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                @endforeach
            </select>
        </div>
            <label for="start_date" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Fecha de Reserva</p></label>
<div id="date-range-picker" date-rangepicker class="flex items-center">
  <div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
         <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
        </svg>
    </div>
    <input id="start_date" name="start_date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500i rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Select date start" required>
  </div>
  <span class="mx-4 text-gray-500">A</span>
  <div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
         <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
        </svg>
    </div>
    <input id="end_date" name="end_date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Select date end" required>
</div>
</div>

        <div class="mb-3">
            <label for="status" class="form-label"><p class="font-medium sm:text-lg ml-4 text-emerald-600">Estado</p></label>
            <select class="form-select rounded-full bg-white-100 text-xl border-2 border-gray-200 p-1 placeholder-white-400 focus:text-violet-950 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="status" name="status" required>
                <option value="active">Activo</option>
                <option value="cancelled">Cancelada</option>
            </select>
	</div>
            <span id="availability-alert" class="text-red-500 font-medium sm:text-lg ml-4 text-emerald-600 hidden">El apartamento no está disponible en las fechas seleccionadas.</span>

        <button type="submit" class="w-[150px] bg-black h-[50px] my-3 flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#fdfffe] before:to-[rgb(0,0,0)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]">Agregar Reservacion</button>
    </form>
 <script>
        document.addEventListener('DOMContentLoaded', function () {
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const apartmentSelect = document.getElementById('apartment_id');
            const availabilityAlert = document.getElementById('availability-alert');
            const form = document.getElementById('create-reservation-form');

            function checkAvailability() {
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;
                const apartmentId = apartmentSelect.value;

                if (startDate && endDate && apartmentId) {
                    fetch(`/check-availability?apartment_id=${apartmentId}&start_date=${startDate}&end_date=${endDate}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.available) {
                                availabilityAlert.classList.add('hidden');
                            } else {
                                availabilityAlert.classList.remove('hidden');
                            }
                        });
                } else {
                    availabilityAlert.classList.add('hidden');
                }
            }

            startDateInput.addEventListener('change', checkAvailability);
            endDateInput.addEventListener('change', checkAvailability);
            apartmentSelect.addEventListener('change', checkAvailability);

            form.addEventListener('submit', function (e) {
                if (!availabilityAlert.classList.contains('hidden')) {
                    e.preventDefault();
                    alert('No se puede crear la reserva. El apartamento no está disponible en las fechas seleccionadas.');
                }
            });
        });
    </script>
@endsection
