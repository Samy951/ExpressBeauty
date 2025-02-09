<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExpressBeauty - Produits de Beauté</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <!-- Logo et Navigation principale -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/" class="text-xl font-bold text-indigo-600">ExpressBeauty</a>
                    </div>
                    <div class="hidden md:flex md:ml-10 space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-indigo-600' : '' }}">Accueil</a>
                        <div class="relative group">
                            <button class="text-gray-700 group-hover:text-indigo-600 px-3 py-2 text-sm font-medium inline-flex items-center">
                                Nos Produits
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute z-10 left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block">
                                <div class="py-1">
                                    <a href="{{ route('products.category', 'hair') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Soins Capillaires</a>
                                    <a href="{{ route('products.category', 'styling') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Appareils de Coiffure</a>
                                    <a href="{{ route('products.category', 'accessories') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Accessoires</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative group">
                            <button class="text-gray-700 group-hover:text-indigo-600 px-3 py-2 text-sm font-medium inline-flex items-center">
                                Nos Marques
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div class="absolute z-10 left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden group-hover:block">
                                <div class="py-1">
                                    <a href="{{ route('products.brand', 'Dyson') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Dyson</a>
                                    <a href="{{ route('products.brand', 'Savage X Fenty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Savage X Fenty</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-indigo-600' : '' }}">À Propos</a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('contact') ? 'text-indigo-600' : '' }}">Contact</a>
                    </div>
                </div>

                <!-- Menu mobile -->
                <div class="flex items-center md:hidden">
                    <button type="button" class="text-gray-700 hover:text-indigo-600" x-data @click="$dispatch('toggle-mobile-menu')">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile (caché par défaut) -->
        <div class="hidden md:hidden" x-show="mobileMenuOpen" x-data="{ mobileMenuOpen: false }" @toggle-mobile-menu.window="mobileMenuOpen = !mobileMenuOpen">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">Accueil</a>
                <a href="/products" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">Nos Produits</a>
                <a href="/brands" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">Nos Marques</a>
                <a href="/about" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">À Propos</a>
                <a href="/contact" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12 py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">À Propos</h3>
                    <p class="text-gray-600">ExpressBeauty, votre destination beauté en ligne pour des produits de qualité.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Nos Marques</h3>
                    <ul class="space-y-2">
                        <li><a href="/products?brand=Dyson" class="text-gray-600 hover:text-indigo-600">Dyson</a></li>
                        <li><a href="/products?brand=Savage X Fenty" class="text-gray-600 hover:text-indigo-600">Savage X Fenty</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Catégories</h3>
                    <ul class="space-y-2">
                        <li><a href="/products?category=hair" class="text-gray-600 hover:text-indigo-600">Soins Capillaires</a></li>
                        <li><a href="/products?category=styling" class="text-gray-600 hover:text-indigo-600">Appareils de Coiffure</a></li>
                        <li><a href="/products?category=accessories" class="text-gray-600 hover:text-indigo-600">Accessoires</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li><a href="/contact" class="text-gray-600 hover:text-indigo-600">Nous Contacter</a></li>
                        <li><a href="/faq" class="text-gray-600 hover:text-indigo-600">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-200">
                <p class="text-center text-gray-500">&copy; {{ date('Y') }} ExpressBeauty. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
