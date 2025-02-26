<div>
    <!-- Bannière de déstockage -->
    <div class="bg-[#7B1F1F] text-white py-2 text-center">
        <p class="text-sm">
            ⚡ DÉSTOCKAGE : JUSQU'À -95% SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <!-- Hero Section avec image de fond -->
    <div class="relative h-[600px] bg-cover bg-center" style="background-image: url('{{ asset('storage/AdobeStock_132642948.jpeg') }}')">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="container flex relative flex-col justify-center items-center px-4 mx-auto h-full text-center text-white">
            <h1 class="mb-6 text-5xl font-bold">Offres Déstockage !</h1>
            <p class="mb-8 max-w-2xl text-xl">
                Jusqu'à -95% sur des incontournables beauté, disponibles jusqu'à épuisement des stocks ! Limité à un produit par personne.
            </p>
            <a href="/products" class="bg-[#7B1F1F] text-white px-8 py-3 rounded-full text-lg font-medium hover:bg-[#6B1A1A] transition-colors">
                PROFITEZ EN MAINTENANT
            </a>
        </div>
    </div>

    <!-- Section "Ils parlent de nous" -->
    <div class="py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl">
            <h2 class="mb-16 text-3xl font-bold text-center">Ils parlent de nous</h2>

            <div class="overflow-hidden relative"
                 x-ignore
                 x-data="{
                    position: 0,
                    isMobile: window.innerWidth < 640,
                    init() {
                        this.scroll();
                        window.addEventListener('resize', () => {
                            this.isMobile = window.innerWidth < 640;
                        });
                    },
                    scroll() {
                        const speed = this.isMobile ? 0.15 : 0.1;
                        setInterval(() => {
                            if (this.position <= -100) {
                                this.position = 0;
                            } else {
                                this.position -= speed;
                            }
                        }, 20);
                    }
                }">
                <div class="flex items-center space-x-24" :style="'transform: translateX(' + position + '%)'">
                    <!-- Groupe de logos qui se répète -->
                    <style>
                        @keyframes marquee {
                            0% { transform: translateX(0); }
                            100% { transform: translateX(-100%); }
                        }
                        .animate-scroll {
                            animation: marquee 10s linear infinite;
                        }
                        @media (min-width: 640px) {
                            .animate-scroll {
                                animation: marquee 20s linear infinite;
                            }
                        }
                    </style>
                    <div class="flex items-center space-x-24 animate-scroll">
                        <img src="{{ asset('storage/brands/marie-claire.webp') }}" alt="Marie Claire" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                        <img src="{{ asset('storage/brands/cosmopolitan.webp') }}" alt="Cosmopolitan" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                        <img src="{{ asset('storage/brands/sephora.webp') }}" alt="Sephora" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                        <img src="{{ asset('storage/brands/allure.webp') }}" alt="Allure" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                        <img src="{{ asset('storage/brands/elle.webp') }}" alt="Elle" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                        <!-- Répétition des logos pour l'effet infini -->
                        <img src="{{ asset('storage/brands/marie-claire.webp') }}" alt="Marie Claire" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                        <img src="{{ asset('storage/brands/cosmopolitan.webp') }}" alt="Cosmopolitan" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                        <img src="{{ asset('storage/brands/sephora.webp') }}" alt="Sephora" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                        <img src="{{ asset('storage/brands/allure.webp') }}" alt="Allure" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                        <img src="{{ asset('storage/brands/elle.webp') }}" alt="Elle" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section "Nos Marques Phares" -->
    <div class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <h2 class="mb-12 text-3xl font-bold text-center">Nos Marques</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                <!-- Dyson -->
                <a href="{{ route('brands.dyson') }}" class="block group">
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 flex flex-col h-[350px] overflow-hidden">
                        <div class="flex items-center justify-center h-[220px] bg-white p-8">
                            <img src="{{ asset('storage/brands/dyson.webp') }}"
                                 alt="Dyson"
                                 class="object-contain w-4/5 h-4/5 mix-blend-multiply filter contrast-125">
                        </div>
                        <div class="flex flex-col justify-center h-[130px] p-6 text-center">
                            <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-[#7B1F1F] transition-colors mb-3">Dyson</h3>
                            <p class="text-sm text-gray-600">Innovation et Performance dans le domaine des appareils de coiffure</p>
                        </div>
                    </div>
                </a>

                <!-- GHD -->
                <a href="{{ route('brands.ghd') }}" class="block group">
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 flex flex-col h-[350px] overflow-hidden">
                        <div class="flex items-center justify-center h-[220px] bg-black p-8">
                            <img src="{{ asset('storage/brands/ghd.webp') }}"
                                 alt="GHD"
                                 class="object-contain w-4/5 h-4/5 brightness-150">
                        </div>
                        <div class="flex flex-col justify-center h-[130px] p-6 text-center">
                            <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-[#7B1F1F] transition-colors mb-3">GHD</h3>
                            <p class="text-sm text-gray-600">Excellence Professionnelle pour des résultats de salon à la maison</p>
                        </div>
                    </div>
                </a>

                <!-- Savage X Fenty -->
                <a href="{{ route('brands.fenty') }}" class="block group">
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 flex flex-col h-[350px] overflow-hidden">
                        <div class="flex items-center justify-center h-[220px] bg-white p-8">
                            <img src="{{ asset('storage/brands/savage-fenty.webp') }}"
                                 alt="Savage X Fenty"
                                 class="object-contain w-4/5 h-4/5 mix-blend-multiply filter contrast-125">
                        </div>
                        <div class="flex flex-col justify-center h-[130px] p-6 text-center">
                            <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-[#7B1F1F] transition-colors mb-3">Savage X Fenty</h3>
                            <p class="text-sm text-gray-600">Style et Inclusivité pour tous</p>
                        </div>
                    </div>
                </a>

                <!-- Fenty Beauty -->
                <a href="{{ route('brands.fenty-beauty') }}" class="block group">
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 flex flex-col h-[350px] overflow-hidden">
                        <div class="flex items-center justify-center h-[220px] bg-white p-8">
                            <img src="{{ asset('storage/brands/fenty-beauty.webp') }}"
                                 alt="Fenty Beauty"
                                 class="object-contain w-4/5 h-4/5 mix-blend-multiply filter contrast-125">
                        </div>
                        <div class="flex flex-col justify-center h-[130px] p-6 text-center">
                            <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-[#7B1F1F] transition-colors mb-3">Fenty Beauty</h3>
                            <p class="text-sm text-gray-600">Beauté inclusive et innovante</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Section Nos Produits -->
    <div class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <h2 class="mb-12 text-3xl font-bold text-center">Nos Produits</h2>

            <!-- Filtres et tri -->
            <div class="flex flex-col justify-between items-center mb-8 space-y-4 md:flex-row md:space-y-0">
                <!-- Filtres -->
                <div class="flex flex-col gap-4 w-full md:flex-row md:w-auto">
                    <!-- Filtre par marque -->
                    <select wire:model.live.debounce.300ms="brand" class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12">
                        <option value="">Toutes les marques</option>
                        @foreach($brands as $brandOption)
                            <option value="{{ $brandOption }}">{{ $brandOption }}</option>
                        @endforeach
                    </select>

                    <!-- Filtre par catégorie -->
                    <select wire:model.live.debounce.300ms="category" class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>

                    <!-- Barre de recherche -->
                    <input type="text"
                           wire:model.live.debounce.300ms="search"
                           placeholder="Rechercher un produit..."
                           class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200">
                </div>

                <!-- Tri -->
                <div class="flex gap-2 items-center w-full md:w-auto md:ml-4">
                    <select wire:model.live="sortField" class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12">
                        <option value="created_at">Plus récents</option>
                        <option value="price">Prix</option>
                        <option value="name">Nom</option>
                    </select>

                    <button wire:click="$set('sortDirection', '{{ $sortDirection === 'asc' ? 'desc' : 'asc' }}')"
                            class="p-2.5 transition-colors duration-200 rounded-full hover:bg-gray-100 border border-gray-300 hover:border-[#7B1F1F]">
                        @if($sortDirection === 'asc')
                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9M3 12h5M3 16h9M3 20h13"></path>
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9M3 12h5M3 16h9M3 20h13" transform="rotate(180 12 12)"></path>
                            </svg>
                        @endif
                    </button>
                </div>
            </div>

            <!-- Grille de produits -->
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-6">
                @forelse($products as $product)
                    <div class="group">
                        <div class="relative bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 h-[400px] flex flex-col">
                            <a href="{{ route('products.show', $product->id) }}"
                               onclick="ttq.track('ClickProduct', {
                                   content_type: 'product',
                                   content_id: {{ $product->id }},
                                   content_name: decodeURIComponent('{{ rawurlencode($product->name) }}'),
                                   content_category: decodeURIComponent('{{ rawurlencode($product->category) }}'),
                                   currency: 'EUR',
                                   price: {{ $product->promo_price }},
                                   value: {{ $product->promo_price }},
                                   brand: decodeURIComponent('{{ rawurlencode($product->brand) }}')
                               }); return true;"
                               class="flex flex-col h-full">
                                <!-- Image du produit avec dimensions fixes -->
                                <div class="relative w-full h-[250px]">
                                    <img src="{{ $product->image_url }}"
                                         alt="{{ $product->name }}"
                                         class="absolute inset-0 w-full h-full {{ $product->brand === 'Dyson' ? 'object-contain' : 'object-cover' }} object-center rounded-t-lg">
                                </div>
                                <!-- Badge de marque -->
                                <div class="absolute top-2 left-2">
                                    <span class="bg-[#7B1F1F] text-white px-3 py-1 text-xs font-medium rounded-full">
                                        {{ $product->brand }}
                                    </span>
                                </div>
                                <!-- Infos produit -->
                                <div class="flex flex-col flex-grow justify-between p-4">
                                    <h3 class="text-sm font-medium text-gray-900 line-clamp-2">{{ $product->name }}</h3>
                                    <div class="flex flex-col mt-2">
                                        <!-- Badge de réduction -->
                                        @php
                                            $reduction = round((($product->original_price ?? $product->price) - $product->promo_price) / ($product->original_price ?? $product->price) * 100);
                                        @endphp
                                        <div class="flex justify-between items-center">
                                            <span class="bg-[#7B1F1F] text-white px-2 py-1 text-xs font-bold rounded">-{{ $reduction }}%</span>
                                            <!-- Prix -->
                                            <div class="flex flex-col items-end">
                                                <p class="text-lg font-bold text-[#7B1F1F]">{{ number_format($product->promo_price, 2, ',', ' ') }} €</p>
                                                <p class="text-sm text-gray-500 line-through">{{ number_format($product->original_price ?? $product->price, 2, ',', ' ') }} €</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center">
                        <p class="text-gray-500">Aucun produit trouvé</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $products->onEachSide(1)->links() }}
            </div>
        </div>
    </div>

    <!-- Statistiques et Engagement -->
    <div class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <!-- Statistiques -->
            <div class="grid grid-cols-2 gap-8 mb-16 md:grid-cols-4">
                <div class="bg-gradient-to-br from-[#7B1F1F] to-[#5A1717] rounded-xl shadow-lg p-8 text-center text-white">
                    <div class="inline-flex justify-center items-center mb-6 w-16 h-16 rounded-full bg-white/10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div class="mb-2 text-3xl font-bold">10K+</div>
                    <p class="text-gray-200">Clients Satisfaits</p>
                </div>

                <div class="bg-gradient-to-br from-[#7B1F1F] to-[#5A1717] rounded-xl shadow-lg p-8 text-center text-white">
                    <div class="inline-flex justify-center items-center mb-6 w-16 h-16 rounded-full bg-white/10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div class="mb-2 text-3xl font-bold">1000+</div>
                    <p class="text-gray-200">Produits Disponibles</p>
                </div>

                <div class="bg-gradient-to-br from-[#7B1F1F] to-[#5A1717] rounded-xl shadow-lg p-8 text-center text-white">
                    <div class="inline-flex justify-center items-center mb-6 w-16 h-16 rounded-full bg-white/10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    </div>
                    <div class="mb-2 text-3xl font-bold">24/7</div>
                    <p class="text-gray-200">Service Client</p>
                </div>

                <div class="bg-gradient-to-br from-[#7B1F1F] to-[#5A1717] rounded-xl shadow-lg p-8 text-center text-white">
                    <div class="inline-flex justify-center items-center mb-6 w-16 h-16 rounded-full bg-white/10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="mb-2 text-3xl font-bold">100%</div>
                    <p class="text-gray-200">Produits Authentiques</p>
                </div>
            </div>

            <!-- Engagement qualité -->
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <div class="flex flex-col items-center text-center">
                    <div class="w-12 h-12 rounded-full bg-[#F5E6E0] flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#7B1F1F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900">Qualité Garantie</h3>
                    <p class="text-gray-600">Produits authentiques et sélectionnés avec soin</p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <div class="w-12 h-12 rounded-full bg-[#F5E6E0] flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#7B1F1F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900">Prix Attractifs</h3>
                    <p class="text-gray-600">Les meilleurs prix pour du haut de gamme</p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <div class="w-12 h-12 rounded-full bg-[#F5E6E0] flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#7B1F1F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900">Livraison Express</h3>
                    <p class="text-gray-600">Réception rapide de vos commandes</p>
                </div>

                <div class="flex flex-col items-center text-center">
                    <div class="w-12 h-12 rounded-full bg-[#F5E6E0] flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#7B1F1F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900">Support Premium</h3>
                    <p class="text-gray-600">Une équipe dédiée à votre service</p>
                </div>
            </div>
        </div>
    </div>
</div>
