<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>STARA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-[url('https://images.pexels.com/photos/7114722/pexels-photo-7114722.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')] grayscale backdrop-blur-lg selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 text-8xl">
            @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold  hover:text-gray-900  text-gray-50  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">DASHBOARD</a>
            @else
            <a href="{{ route('login') }}" class="font-semibold  hover:text-gray-900  text-gray-50   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">LOG IN</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold  hover:text-gray-900  text-gray-50   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">REGISTER</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <div class="text-white text-center">
                    <p class="font-weight-bold text-[8rem]">STARA</p>
                    <p class="font-weight-bold text-[2rem] p-6 mb-2 bg-slate-500 bg-opacity-40 rounded-lg">Best Staff Decision Support System</p>
                    <p>#STARAuntukMenyetarakan</p>
                    <p>#KamuSetaraKamuBerharga</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>