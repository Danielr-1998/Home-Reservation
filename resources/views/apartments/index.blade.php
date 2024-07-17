@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Editorial+New:wght@400;700&display=swap">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <style>
        .font-editorial {
            font-family: 'Editorial New', serif;
        }
    </style>
    <div class="min-h-screen" style="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20230720/pngtree-sleek-and-simple-living-room-design-in-monochromatic-3d-render-image_3710749.jpg'); background-size: cover; background-position: center; opacity: 0.75;">
        <div class="p-6 bg-white bg-opacity-75 rounded-lg shadow-md">
            <h1 class="text-5xl font-bold font-editorial">Apartamentos</h1>
<button 
    type="button" 
    class="font-editorial w-[250px] bg-black h-[50px] my-3 flex items-center justify-center rounded-xl cursor-pointer relative overflow-hidden transition-all duration-500 ease-in-out shadow-md hover:scale-105 hover:shadow-lg before:absolute before:top-0 before:-left-full before:w-full before:h-full before:bg-gradient-to-r before:from-[#fdfffe] before:to-[rgb(0,0,0)] before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-xl hover:before:left-0 text-[#fff]"
    onclick="window.location.href='{{ route('apartments.create') }}';"
>
    Agregar Apartamento
</button>
            <form id="filterForm" class="mb-4">
                <div class="flex items-center space-x-4">
                    <input type="text" name="city" id="city" placeholder="Ciudad" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
            </form>

            <div id="apartmentsGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-3">
                @foreach($apartments as $apartment)
                    <div class="bg-white rounded-lg shadow p-4 apartment-card">
                        <h2 class="text-lg font-semibold">{{ $apartment->name }}</h2>
                        <p><strong>Direccion:</strong> {{ $apartment->address }}</p>
                        <p><strong>Tipo:</strong> {{ ucfirst($apartment->type) }}</p>
                        <p><strong>Ciudad:</strong> {{ $apartment->city }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#city').on('keyup keydown change', function() {
                filterApartments();
            });

            function filterApartments() {
                var city = $('#city').val();

                $.ajax({
                    url: '{{ route('apartments.index') }}',
                    method: 'GET',
                    data: {
                        city: city
                    },
                    success: function(response) {
                        $('#apartmentsGrid').html('');
                        $.each(response.apartments, function(index, apartment) {
                            $('#apartmentsGrid').append(
                                '<div class="bg-white rounded-lg shadow p-4 apartment-card">' +
                                    '<h2 class="text-lg font-semibold">' + apartment.name + '</h2>' +
                                    '<p><strong>Direccion:</strong> ' + apartment.address + '</p>' +
                                    '<p><strong>Tipo:</strong> ' + apartment.type.charAt(0).toUpperCase() + apartment.type.slice(1) + '</p>' +
                                    '<p><strong>Ciudad:</strong> ' + apartment.city + '</p>' +
                                '</div>'
                            );
                        });
                    }
                });
            }
        });
    </script>
@endsection

