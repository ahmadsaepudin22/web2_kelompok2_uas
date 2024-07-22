<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css'])

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <script src="https://unpkg.com/flowbite@1.5.0/dist/flowbite.js"></script>
</head>

<body class="bg-gray-100">
    <div id="app">
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <a class="text-lg font-semibold">
                        PEMILIHAN
                    </a>
                    <button
                        class="block lg:hidden px-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none"
                        type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="hidden lg:flex lg:items-center lg:w-auto" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="flex items-center space-x-2">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li>
                                        <a class="text-gray-700 hover:text-gray-900"
                                            href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li>
                                        <a class="text-gray-700 hover:text-gray-900"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <!-- Add any additional links if necessary -->
                                @if (auth()->user()->type == 'admin')
                                    <li class="relative">
                                        <li>
                                            <a class="block px-4 py-2 hover:bg-gray-100"
                                                href="{{ route('admin.home') }}">
                                                Dashboard
                                            </a>
                                        </li>
                                        <button class="flex items-center text-gray-700 hover:text-gray-900"
                                            id="adminDropdown" data-dropdown-toggle="adminDropdownMenu">
                                            Master Data
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <div id="adminDropdownMenu"
                                            class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow-lg">
                                            <ul class="py-1 text-sm text-gray-700" aria-labelledby="adminDropdown">
                                                <li>
                                                    <a class="block px-4 py-2 hover:bg-gray-100"
                                                        href="{{ route('admin.kandidat.index') }}">
                                                        Data Kandidat
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="block px-4 py-2 hover:bg-gray-100"
                                                        href="{{ route('admin.kategori.index') }}">
                                                        Data Kategori
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-100"
                                            href="{{ route('admin.hasil.riwayat') }}">
                                            Riwayat Pemilihan
                                        </a>
                                    </li>
                                @endif
                                @if (auth()->user()->type == 'user')
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('home') }}">
                                            Petunjuk
                                        </a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('user.index') }}">
                                            Pemilihan
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('hasil') }}">
                                        Hasil
                                    </a>
                                </li>
                                |
                                <li class="relative">
                                    <button class="flex items-center text-gray-700 hover:text-gray-900" id="navbarDropdown"
                                        data-dropdown-toggle="dropdown">
                                        {{ Auth::user()->name }}
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div id="dropdown"
                                        class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow-lg">
                                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="block px-4 py-2 hover:bg-gray-100" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Flowbite -->
    <script src="https://unpkg.com/flowbite@1.5.0/dist/flowbite.js"></script>
</body>

</html>
