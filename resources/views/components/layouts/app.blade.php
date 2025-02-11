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
<body class="bg-white" x-data="{ mobileMenuOpen: false }">
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
                                    <div class="my-1 border-t border-gray-100"></div>
                                    <a href="{{ route('products.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir tous les produits</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#7B1F1F]">
                                Nos Marques
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
                                    <a href="{{ route('brands.dyson') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Dyson</a>
                                    <a href="{{ route('brands.ghd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">GHD</a>
                                    <a href="{{ route('brands.fenty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Savage X Fenty</a>
                                    <a href="{{ route('brands.fenty-beauty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Fenty Beauty</a>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <a href="{{ route('brands.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir toutes les marques</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-[#7B1F1F]' : '' }}">À Propos</a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('contact') ? 'text-[#7B1F1F]' : '' }}">Contact</a>
                        <a href="{{ route('order.tracking') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('order.tracking') ? 'text-[#7B1F1F]' : '' }}">Suivre ma commande</a>
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
        <div class="md:hidden" x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
            <div class="px-2 pt-2 pb-3 space-y-1" x-data="{ productsOpen: false, brandsOpen: false }">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('home') ? 'text-[#7B1F1F]' : '' }}">Accueil</a>

                <!-- Menu Produits -->
                <div class="relative">
                    <button @click="productsOpen = !productsOpen" class="flex justify-between items-center w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">
                        <span>Nos Produits</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': productsOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="productsOpen"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="pl-4">
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
                    <div x-show="brandsOpen"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="pl-4">
                        <a href="{{ route('brands.dyson') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Dyson</a>
                        <a href="{{ route('brands.ghd') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">GHD</a>
                        <a href="{{ route('brands.fenty') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Savage X Fenty</a>
                        <a href="{{ route('brands.fenty-beauty') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Fenty Beauty</a>
                        <a href="{{ route('brands.index') }}" class="block px-3 py-2 text-base font-medium text-[#7B1F1F] hover:text-white hover:bg-[#7B1F1F]">Voir toutes les marques</a>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('about') ? 'text-[#7B1F1F]' : '' }}">À Propos</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('contact') ? 'text-[#7B1F1F]' : '' }}">Contact</a>
                <a href="{{ route('order.tracking') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('order.tracking') ? 'text-[#7B1F1F]' : '' }}">Suivre ma commande</a>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="py-6 bg-gradient-to-br from-[#7B1F1F] to-[#5A1717] text-white shadow-lg ">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="grid gap-8 md:grid-cols-4">
                <div>
                    <h3 class="mb-4 text-lg font-semibold">Informations légales</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('legal.mentions') }}" class="text-gray-200 hover:text-white">Mentions légales</a></li>
                        <li><a href="{{ route('legal.privacy') }}" class="text-gray-200 hover:text-white">Politique de confidentialité</a></li>
                        <li><a href="{{ route('legal.cgv') }}" class="text-gray-200 hover:text-white">Conditions générales de vente</a></li>
                        <li><a href="{{ route('legal.terms') }}" class="text-gray-200 hover:text-white">Terms & Conditions</a></li>
                        <li><a href="{{ route('legal.refund') }}" class="text-gray-200 hover:text-white">Politique de remboursement</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-semibold">Nos Marques</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.brand.dyson') }}" class="text-gray-200 hover:text-white">Dyson</a></li>
                        <li><a href="{{ route('products.brand.ghd') }}" class="text-gray-200 hover:text-white">GHD</a></li>
                        <li><a href="{{ route('products.brand.fenty') }}" class="text-gray-200 hover:text-white">Savage X Fenty</a></li>
                        <li><a href="{{ route('products.brand.fenty-beauty') }}" class="text-gray-200 hover:text-white">Fenty Beauty</a></li>
                        <li><a href="{{ route('brands.index') }}" class="text-gray-200 hover:text-white font-medium">Voir toutes les marques</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-semibold">Catégories</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.category.makeup') }}" class="text-gray-200 hover:text-white">Maquillage</a></li>
                        <li><a href="{{ route('products.category.hair') }}" class="text-gray-200 hover:text-white">Coiffure</a></li>
                        <li><a href="{{ route('products.category.lingerie') }}" class="text-gray-200 hover:text-white">Lingerie</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-200 hover:text-white font-medium">Voir tous les produits</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-semibold">Contact</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('contact') }}" class="text-gray-200 hover:text-white">Nous Contacter</a></li>
                        <li><a href="{{ route('faq') }}" class="text-gray-200 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 mt-8 border-t border-gray-100/20">
                <p class="text-center text-gray-200">&copy; {{ date('Y') }} ExpressBeauty. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Modal TikTok Challenge -->
    <div x-data="{
            showTikTokModal: false,
            checkModalStatus() {
                if (!localStorage.getItem('tiktokModalShown')) {
                    this.showTikTokModal = true;
                    localStorage.setItem('tiktokModalShown', 'true');
                }
            }
        }"
         x-init="checkModalStatus()"
         x-show="showTikTokModal"
         class="fixed inset-0 z-50 overflow-y-auto"
         aria-labelledby="modal-title"
         x-cloak>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity bg-black bg-opacity-75" aria-hidden="true"></div>

            <!-- Modal -->
            <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                 @click.away="showTikTokModal = false">

                <!-- Bouton fermer -->
                <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                    <button type="button"
                            @click="showTikTokModal = false"
                            class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none">
                        <span class="sr-only">Fermer</span>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Contenu -->
                <div class="sm:flex sm:items-start">
                    <!-- Icône TikTok -->
                    <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-black rounded-full sm:mx-0 sm:h-16 sm:w-16">
                        <svg class="w-8 h-8 text-white sm:w-12 sm:h-12" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                        </svg>
                    </div>

                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-2xl font-bold text-gray-900" id="modal-title">
                            Challenge TikTok ! 🎵
                        </h3>
                        <div class="mt-4">
                            <p class="text-lg text-gray-900 font-semibold">Gagnez un produit à 2€ ! 🎁</p>
                            <div class="mt-2 space-y-4">
                                <p class="text-gray-600">Comment participer :</p>
                                <ul class="ml-4 space-y-2 text-gray-600 list-disc">
                                    <li>Créez un TikTok mettant en avant ExpressBeauty</li>
                                    <li>Atteignez 30 likes sur votre vidéo</li>
                                    <li>Envoyez-nous le lien de votre TikTok</li>
                                    <li>Recevez votre code promo exclusif !</li>
                                </ul>
                                <p class="text-sm text-gray-500 italic">* Offre limitée à une participation par personne</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bouton d'action -->
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                    <a href="https://www.tiktok.com" target="_blank" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-[#7B1F1F] border border-transparent rounded-md shadow-sm hover:bg-[#6B1A1A] focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Participer sur TikTok
                    </a>
                    <button type="button"
                            @click="showTikTokModal = false"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                        Plus tard
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
