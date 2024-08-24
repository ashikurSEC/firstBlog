<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Apline js  --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg">
        <nav>
            <a href="{{ route('posts.index') }}" class="nav-link">
                <i class="fas fa-home-alt text-2xl"></i>
            </a>

            <div>                
                <a href="#" class="nav-link">Shop</a>
                <a href="#" class="nav-link">Blog</a>
                <a href="#" class="nav-link">About</a>
                <a href="#" class="nav-link">Contact</a>
            </div>

            @auth
            <div class="relative grid place-items-center" x-data="{ open: false }">

                {{--! Dropdown menu button --}}

                <button @click="open = !open" type="button" class="round-btn">
                    <img src="https://ashikursec.github.io/modern_tab/img/ashikur-rahman.png"  alt="">
                </button>

                {{--! Dropdown menu --}}

                <div x-show="open" @click.outside="open = false" class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light">
                    <p class="username p-3">{{ auth()->user()->username }}</p>
                        <hr>
                    <a href="{{ route('dashboard') }}" class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">Dashboard</a>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="block w-full text-left hover:bg-slate-100 pl-4 pr-8 py-2">Logout</button>
                    </form>

                </div>
                
            </div>
            @endauth

            @guest
            <div class="relative">
                <button id="dropdownButton" class="nav-link flex items-center gap-2 focus:outline-none">
                    <!-- Profile Icon using Font Awesome -->
                    <i class="fas fa-user-circle text-2xl"></i>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    </svg>
                </button>
            
                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="absolute text-center right-0 mt-2 w-48 bg-white shadow-lg rounded-lg transform scale-95 opacity-0 invisible transition-all duration-300 ease-in-out z-10">
                    <div class="py-2">
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Register</a>
                    </div>
                </div>
            </div>
            @endguest
            
        </nav>
    </header>

    <main class="py-8 px-4 mx-auto max-w-screen-lg">
        {{ $slot }}
    </main>
</body>
</html>
