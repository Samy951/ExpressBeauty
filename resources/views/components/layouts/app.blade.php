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
        <div class="px-4 mx-auto max-w-7xl">
            <div class="flex justify-between h-16">
                <!-- Logo et Navigation principale -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/" class="block">
                            <img src="{{ asset('storage/expressBeauty.svg') }}" alt="ExpressBeauty" class="h-[57px] w-[193px]">
                        </a>
                    </div>
                    <div class="hidden space-x-8 md:flex md:ml-10">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-[#7B1F1F]' : '' }}">Accueil</a>
                        <div class="relative group">
                            <a href="{{ route('products.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 group-hover:text-[#7B1F1F]">
                                Nos Produits
                                <svg class="w-4 h-4 ml-2 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <div class="absolute left-0 z-10 hidden w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 group-hover:block">
                                <div class="py-1">
                                    <a href="{{ route('products.category.hair') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Soins Capillaires</a>
                                    <a href="{{ route('products.category.styling') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Appareils de Coiffure</a>
                                    <a href="{{ route('products.category.accessories') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Accessoires</a>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <a href="{{ route('products.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir tous les produits</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative group">
                            <a href="{{ route('brands.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 group-hover:text-[#7B1F1F]">
                                Nos Marques
                                <svg class="w-4 h-4 ml-2 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <div class="absolute left-0 z-10 hidden w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 group-hover:block">
                                <div class="py-1">
                                    <a href="{{ route('products.brand.dyson') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Dyson</a>
                                    <a href="{{ route('products.brand.ghd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">GHD</a>
                                    <a href="{{ route('products.brand.fenty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Savage X Fenty</a>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <a href="{{ route('brands.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir toutes les marques</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-[#7B1F1F]' : '' }}">À Propos</a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('contact') ? 'text-[#7B1F1F]' : '' }}">Contact</a>
                    </div>
                </div>

                <!-- Menu mobile -->
                <div class="flex items-center md:hidden">
                    <button type="button" class="text-gray-700 hover:text-indigo-600" x-data @click="$dispatch('toggle-mobile-menu')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile (caché par défaut) -->
        <div class="hidden md:hidden" x-show="mobileMenuOpen" x-data="{ mobileMenuOpen: false, productsOpen: false, brandsOpen: false }" @toggle-mobile-menu.window="mobileMenuOpen = !mobileMenuOpen">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('home') ? 'text-[#7B1F1F]' : '' }}">Accueil</a>
                
                <!-- Menu Produits -->
                <div class="relative">
                    <button @click="productsOpen = !productsOpen" class="flex justify-between items-center w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">
                        <span>Nos Produits</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': productsOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="productsOpen" class="pl-4">
                        <a href="{{ route('products.category.hair') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Soins Capillaires</a>
                        <a href="{{ route('products.category.styling') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Appareils de Coiffure</a>
                        <a href="{{ route('products.category.accessories') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Accessoires</a>
                        <a href="{{ route('products.index') }}" class="block px-3 py-2 text-base font-medium text-[#7B1F1F] hover:text-white hover:bg-[#7B1F1F]">Voir tous les produits</a>
                    </div>
                </div>

                <!-- Menu Marques -->
                <div class="relative">
                    <button @click="brandsOpen = !brandsOpen" class="flex justify-between items-center w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">
                        <span>Nos Marques</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': brandsOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="brandsOpen" class="pl-4">
                        <a href="{{ route('products.brand.dyson') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Dyson</a>
                        <a href="{{ route('products.brand.ghd') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">GHD</a>
                        <a href="{{ route('products.brand.fenty') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Savage X Fenty</a>
                        <a href="{{ route('brands.index') }}" class="block px-3 py-2 text-base font-medium text-[#7B1F1F] hover:text-white hover:bg-[#7B1F1F]">Voir toutes les marques</a>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('about') ? 'text-[#7B1F1F]' : '' }}">À Propos</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('contact') ? 'text-[#7B1F1F]' : '' }}">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="py-6 mt-12 bg-white">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                <div>
                    <h3 class="mb-4 text-lg font-semibold text-gray-900">À Propos</h3>
                    <p class="text-gray-600">ExpressBeauty, votre destination beauté en ligne pour des produits de qualité.</p>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-semibold text-gray-900">Nos Marques</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.brand.dyson') }}" class="text-gray-600 hover:text-[#7B1F1F]">Dyson</a></li>
                        <li><a href="{{ route('products.brand.ghd') }}" class="text-gray-600 hover:text-[#7B1F1F]">GHD</a></li>
                        <li><a href="{{ route('products.brand.fenty') }}" class="text-gray-600 hover:text-[#7B1F1F]">Savage X Fenty</a></li>
                        <li><a href="{{ route('brands.index') }}" class="text-gray-600 hover:text-[#7B1F1F] font-medium">Voir toutes les marques</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-semibold text-gray-900">Catégories</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.category.hair') }}" class="text-gray-600 hover:text-[#7B1F1F]">Soins Capillaires</a></li>
                        <li><a href="{{ route('products.category.styling') }}" class="text-gray-600 hover:text-[#7B1F1F]">Appareils de Coiffure</a></li>
                        <li><a href="{{ route('products.category.accessories') }}" class="text-gray-600 hover:text-[#7B1F1F]">Accessoires</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-600 hover:text-[#7B1F1F] font-medium">Voir tous les produits</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-semibold text-gray-900">Contact</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-[#7B1F1F]">Nous Contacter</a></li>
                        <li><a href="{{ route('faq') }}" class="text-gray-600 hover:text-[#7B1F1F]">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 mt-8 border-t border-gray-200">
                <p class="text-center text-gray-500">&copy; {{ date('Y') }} ExpressBeauty. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
