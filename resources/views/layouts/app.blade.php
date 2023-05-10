<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Venerato</title>

    <style>
        body {
            background-image: url("{{ asset('images/menu-bg3.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="{{ Request::is('home') ? 'no-background-image' : '' }}">
    @yield('content')

    <footer>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center text-white">© 2021 Venerato</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>