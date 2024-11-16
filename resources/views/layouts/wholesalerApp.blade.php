<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark-theme">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <link rel="stylesheet" href="{{ asset('mdb5/css/mdb.min.css') }}">

        <!-- Link to the favicon -->
        <link rel="icon" href="{{ asset('MyLogo.png') }}" type="image/x-icon">

        <title>@yield('title', 'Default Title')</title>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
        <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->
        <!-- Scripts -->
        @vite(['resources/css/app.css'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.wholesalerNavigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script> -->
         <!-- MDB -->
        <script type="text/javascript" src="{{ asset('mdb5/js/mdb.umd.min.js') }}"></script>
        <script type="text/javascript"></script>
        @vite(['resources/js/app.js'])
    </body>
</html>
