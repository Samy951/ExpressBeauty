<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExpressBeauty</title>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white">
        <div class="container px-4 mx-auto">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="block">
                        <img src="{{ asset('storage/expressBeauty.svg') }}" alt="ExpressBeauty" class="h-[57px] w-[193px]">
                    </a>
                </div>

                <!-- Navigation principale -->
                <div class="items-center hidden space-x-8 md:flex">
                    <a href="/" class="text-gray-700 hover:text-gray-900">Accueil</a>
                    <div class="relative group">
                        <button class="flex items-center text-gray-700 hover:text-gray-900">
                            Nos Produits
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute left-0 hidden w-48 mt-2 bg-white border border-gray-100 shadow-sm group-hover:block">
                            <a href="/products?category=hair" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Soins Capillaires</a>
                            <a href="/products?category=styling" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Appareils de Coiffure</a>
                            <a href="/products?category=accessories" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Accessoires</a>
                        </div>
                    </div>
                    <div class="relative group">
                        <button class="flex items-center text-gray-700 hover:text-gray-900">
                            Nos Marques
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute left-0 hidden w-48 mt-2 bg-white border border-gray-100 shadow-sm group-hover:block">
                            <a href="/products?brand=Dyson" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Dyson</a>
                            <a href="/products?brand=GHD" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">GHD</a>
                            <a href="/products?brand=Savage%20X%20Fenty" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Savage X Fenty</a>
                        </div>
                    </div>
                    <a href="/about" class="text-gray-700 hover:text-gray-900">À propos</a>
                    <a href="/contact" class="text-gray-700 hover:text-gray-900">Contact</a>
                </div>

                <!-- Barre de recherche -->
                <div class="relative w-64">
                    <input
                        type="text"
                        placeholder="Rechercher..."
                        class="w-full px-4 py-2 pr-8 border border-gray-200 rounded-full bg-gray-50 focus:outline-none focus:border-gray-300"
                    >
                    <button class="absolute transform -translate-y-1/2 right-3 top-1/2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="pt-20">
        {{ $slot }}
    </main>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
