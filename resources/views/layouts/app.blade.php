<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Rentals</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
<a href="{{ route('task.index') }}"><img width="200" height="25" src="https://www.homeclub.com/assets/img/logo-header.svg" alt="" class="logo-header m-4">
	</a><div class="container-fluid">
            <div class="" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('apartments.index') }}">Apartamentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('clients.index') }}">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('reservations.index') }}">Reservaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tariffs.index') }}">Tarifas</a></li>
                </ul>
            </div>
        </div>
    </nav>
<section class="bg-gray-50 dark:bg-gray-900 bg-opacity-70">

    <div class="container mt-5 bg-gray-50 dark:bg-gray-900 bg-opacity-70 min-h-screen bg-cover bg-center" style="background-image: url('https://aristas.co/wp-content/uploads/2023/08/CAMA-S.jpg'">
        @yield('content')
    </div>
</section>
</body>
</html>

