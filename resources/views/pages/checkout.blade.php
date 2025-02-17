<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom Beauty - Paiement</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-white" x-data="{ mobileMenuOpen: false }">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="flex justify-between h-16">
                <!-- Logo et Navigation principale -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/" class="block">
                            <img src="{{ asset('storage/showroomBeauty.svg') }}" alt="Showroom Beauty" class="h-[57px] w-[193px]">
                        </a>
                    </div>
                    <div class="hidden space-x-8 md:flex md:ml-10">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-[#7B1F1F]' : '' }}">Accueil</a>
                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#7B1F1F]">
                                Nos Produits
                                <svg class="w-4 h-4 ml-2 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute left-0 z-10 w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    <a href="{{ route('products.category.makeup') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Maquillage</a>
                                    <a href="{{ route('products.category.hair') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Coiffure</a>
                                    <a href="{{ route('products.category.lingerie') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Lingerie</a>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <a href="{{ route('products.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir tous les produits</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#7B1F1F]">
                                Nos Marques
                                <svg class="w-4 h-4 ml-2 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open"
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute left-0 z-10 w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    <a href="{{ route('products.brand.dyson') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Dyson</a>
                                    <a href="{{ route('products.brand.ghd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">GHD</a>
                                    <a href="{{ route('products.brand.fenty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Savage X Fenty</a>
                                    <a href="{{ route('products.brand.fenty-beauty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Fenty Beauty</a>
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
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 hover:text-[#7B1F1F]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile (caché par défaut) -->
        <div class="md:hidden" x-show="mobileMenuOpen">
            <div class="px-2 pt-2 pb-3 space-y-1" x-data="{ productsOpen: false, brandsOpen: false }">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Accueil</a>

                <!-- Menu Produits -->
                <div class="relative">
                    <button @click="productsOpen = !productsOpen" class="flex justify-between items-center w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">
                        <span>Nos Produits</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': productsOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="productsOpen" class="pl-4">
                        <a href="{{ route('products.category.makeup') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Maquillage</a>
                        <a href="{{ route('products.category.hair') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Coiffure</a>
                        <a href="{{ route('products.category.lingerie') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Lingerie</a>
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
                        <a href="{{ route('products.brand.fenty-beauty') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Fenty Beauty</a>
                        <a href="{{ route('brands.index') }}" class="block px-3 py-2 text-base font-medium text-[#7B1F1F] hover:text-white hover:bg-[#7B1F1F]">Voir toutes les marques</a>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">À Propos</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="bg-white">
        @php
            $sourceId = $product->name . '___' . $product->image_url;
            $iframeUrl = rtrim($product->payment_link, '/') . '?source_id=' . rawurlencode($sourceId);
        @endphp

        <div class="min-h-screen flex flex-col items-center justify-center px-4 py-12">
            <img src="{{ asset('storage/showroomBeauty.svg') }}" alt="Showroom Beauty" class="h-[57px] w-[193px] mb-8">

            <div class="text-center max-w-md">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#7B1F1F] mx-auto mb-6"></div>
                <h1 class="text-xl font-semibold text-gray-900 mb-4">Redirection vers la page de paiement sécurisée</h1>
                <p class="text-gray-600 mb-8">Vous allez être redirigé vers notre partenaire de paiement sécurisé...</p>

                <!-- Informations de la commande -->
                <div class="bg-gray-50 rounded-lg p-4 mb-8">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-gray-600">Montant total :</span>
                        <span class="text-lg font-semibold text-[#7B1F1F]">{{ number_format($product->promo_price, 2, ',', ' ') }} €</span>
                    </div>
                    <div class="text-xs text-gray-500">
                        Produit : {{ $product->name }}
                    </div>
                </div>

                <!-- Badges de sécurité -->
                <div class="flex justify-center space-x-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Paiement sécurisé
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Connexion SSL
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(() => {
                    window.location.href = "{{ $iframeUrl }}";
                }, 2000);
            });
        </script>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
