<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Express Beauty') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        <!-- Navigation -->
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="/" class="text-2xl font-bold text-gray-900">
                            EXPRESS BEAUTY
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <nav class="hidden md:flex space-x-8">
                        <a href="/" class="text-gray-900 hover:text-gray-700 px-3 py-2 text-sm font-medium">
                            Accueil
                        </a>
                        <a href="/products" class="text-gray-900 hover:text-gray-700 px-3 py-2 text-sm font-medium">
                            Nos produits
                        </a>
                        <a href="/brands" class="text-gray-900 hover:text-gray-700 px-3 py-2 text-sm font-medium">
                            Nos marques
                        </a>
                        <a href="/about" class="text-gray-900 hover:text-gray-700 px-3 py-2 text-sm font-medium">
                            A propos
                        </a>
                        <a href="/contact" class="text-gray-900 hover:text-gray-700 px-3 py-2 text-sm font-medium">
                            Contactez-nous
                        </a>
                        <a href="/track-order" class="text-gray-900 hover:text-gray-700 px-3 py-2 text-sm font-medium">
                            Suivre ma commande
                        </a>
                    </nav>

                    <!-- Search -->
                    <div class="flex items-center">
                        <div class="relative">
                            <input
                                type="text"
                                placeholder="Rechercher..."
                                class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            >
                            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html> 