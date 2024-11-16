<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-mdb-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" /> -->
         <!-- ##########################33 -->
          <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>
        <!-- MDB -->
        <link rel="stylesheet" href="{{ asset('mdb5/css/mdb.min.css') }}">
         <!-- ######################### -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <link rel="icon" href="{{ asset('MyLogo.png') }}" type="image/x-icon">
        <title>@yield('title', 'login cims')</title>
        <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
        <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->
        @vite(['resources/css/app.css'])
    </head>
    <body>
        <div class="min-h-screen bg-gray-100">
            <!-- include('layouts.navigation') -->
            @if (!request()->routeIs('login')) <!--Check if the current route is NOT 'login'-->
              @include('layouts.navigation') <!--Include the navigation only if not on login page -->
            @endif
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
        <!-- ################### -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script> -->
         <!-- MDB -->
        <script type="text/javascript" src="{{ asset('mdb5/js/mdb.umd.min.js') }}"></script>
        <script type="text/javascript"></script>
        <!-- ##################################### -->
        @vite(['resources/js/app.js'])
    </body>
</html>
