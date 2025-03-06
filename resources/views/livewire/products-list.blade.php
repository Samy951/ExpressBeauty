<div>
    <!-- Bannière de déstockage -->
    <div class="bg-[#7B1F1F] text-white py-2 text-center">
        <p class="text-sm">
            ⚡ DÉSTOCKAGE : LIQUIDATION SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <!-- Hero Section avec image de fond -->
    <div class="relative h-[600px] bg-cover bg-center" style="background-image: url('{{ asset('storage/AdobeStock_132642948.jpeg') }}')">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="container flex relative flex-col justify-center items-center px-4 mx-auto h-full text-center text-white">
            <h1 class="mb-6 text-5xl font-bold">Offres Déstockage !</h1>
            <p class="mb-8 max-w-2xl text-xl">
                Liquidation sur des incontournables beauté, disponibles jusqu'à épuisement des stocks ! Limité à un produit par personne.
            </p>
            <a href="/products" class="bg-[#7B1F1F] text-white px-8 py-3 rounded-full text-lg font-medium hover:bg-[#6B1A1A] transition-colors">
                PROFITEZ EN MAINTENANT !
            </a>
        </div>
    </div>

    <!-- Section "Ils parlent de nous" -->
    <div class="py-20 bg-white">
        <div class="px-4 mx-auto max-w-[1400px]">
            <h2 class="mb-16 text-4xl font-bold text-center">Ils parlent de nous</h2>

            <div class="overflow-hidden relative">
                <div class="flex logos-slide">
                    <!-- Premier groupe -->
                    <div class="flex gap-8 justify-center px-4 min-w-max">
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/marie-claire.webp') }}" alt="Marie Claire">
                        </div>
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/cosmopolitan.webp') }}" alt="Cosmopolitan">
                        </div>
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/sephora.webp') }}" alt="Sephora">
                        </div>
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/allure.webp') }}" alt="Allure">
                        </div>
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/elle.webp') }}" alt="Elle">
                        </div>
                    </div>
                    <!-- Duplication pour l'effet infini -->
                    <div class="flex gap-8 justify-center px-4 min-w-max">
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/marie-claire.webp') }}" alt="Marie Claire">
                        </div>
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/cosmopolitan.webp') }}" alt="Cosmopolitan">
                        </div>
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/sephora.webp') }}" alt="Sephora">
                        </div>
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/allure.webp') }}" alt="Allure">
                        </div>
                        <div class="logo-item">
                            <img src="{{ asset('storage/brands/elle.webp') }}" alt="Elle">
                        </div>
                    </div>
                </div>

                <style>
                    @keyframes slide {
                        0% {
                            transform: translateX(0);
                        }
                        100% {
                            transform: translateX(-100%);
                        }
                    }

                    .logos-slide {
                        animation: slide 30s linear infinite;
                    }

                    .logos-slide:hover {
                        animation-play-state: paused;
                    }

                    .logo-item {
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        width: 300px !important;
                        height: 150px !important;
                        padding: 20px;
                        transition: all 0.5s ease;
                        filter: grayscale(100%);
                        background-color: white;
                        border-radius: 12px;
                        margin: 0 20px;
                    }

                    .logo-item:hover {
                        transform: scale(1.02);
                        filter: grayscale(0%);
                        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                    }

                    .logo-item img {
                        max-width: 80%;
                        max-height: 80%;
                        width: auto;
                        height: auto;
                        object-fit: contain;
                        opacity: 1;
                        transition: all 0.5s ease;
                    }

                    @media (prefers-reduced-motion: reduce) {
                        .logos-slide {
                            animation: none;
                        }
                    }

                    /* Optimisations mobile */
                    @media (max-width: 768px) {
                        .logos-slide {
                            animation: slide 15s linear infinite; /* Animation 2x plus rapide sur mobile */
                        }

                        .logo-item {
                            width: 200px !important;
                            height: 100px !important;
                            margin: 0 10px;
                            padding: 15px;
                        }

                        .logo-item:hover {
                            transform: none; /* Désactive l'effet hover sur mobile */
                            box-shadow: none;
                        }
                    }

                    /* Optimisations tablette */
                    @media (min-width: 769px) and (max-width: 1024px) {
                        .logos-slide {
                            animation: slide 20s linear infinite; /* Animation 1.5x plus rapide sur tablette */
                        }

                        .logo-item {
                            width: 250px !important;
                            height: 125px !important;
                            margin: 0 15px;
                        }
                    }
                </style>
            </div>
        </div>
    </div>

    <!-- Section "Nos Produits" -->
    <div class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <h2 class="mb-16 text-4xl font-bold text-center">Nos Produits</h2>

            <!-- Catégories de produits -->
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Maquillage -->
                <div class="group">
                    <div class="overflow-hidden relative rounded-xl shadow-lg aspect-square">
                        <img src="{{ $featuredMakeup->image_url ?? asset('storage/categories/makeup.webp') }}"
                             alt="Maquillage - {{ $featuredMakeup->name ?? 'Catégorie' }}"
                             class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t to-transparent from-black/70"></div>
                        <div class="absolute right-0 bottom-0 left-0 p-6 text-white">
                            <h3 class="mb-2 text-2xl font-semibold">Maquillage</h3>
                            <p class="mb-4 text-sm text-gray-200">
                                @if($featuredMakeup)
                                    {{ $featuredMakeup->name }}
                                @else
                                    Les dernières tendances beauté à prix mini
                                @endif
                            </p>
                            <a href="{{ route('products.category.makeup') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-[#7B1F1F] transition-colors">
                                Découvrir
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Coiffure -->
                <div class="group">
                    <div class="overflow-hidden relative rounded-xl shadow-lg aspect-square">
                        <img src="{{ $featuredHair->image_url ?? asset('storage/categories/coiffure.webp') }}"
                             alt="Coiffure - {{ $featuredHair->name ?? 'Catégorie' }}"
                             class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t to-transparent from-black/70"></div>
                        <div class="absolute right-0 bottom-0 left-0 p-6 text-white">
                            <h3 class="mb-2 text-2xl font-semibold">Coiffure</h3>
                            <p class="mb-4 text-sm text-gray-200">
                                @if($featuredHair)
                                    {{ $featuredHair->name }}
                                @else
                                    Des produits professionnels pour des cheveux sublimes
                                @endif
                            </p>
                            <a href="{{ route('products.category.hair') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-[#7B1F1F] transition-colors">
                                Découvrir
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Lingerie -->
                <div class="group">
                    <div class="overflow-hidden relative rounded-xl shadow-lg aspect-square">
                        <img src="{{ $featuredLingerie->image_url ?? asset('storage/categories/lingerie.webp') }}"
                             alt="Lingerie - {{ $featuredLingerie->name ?? 'Catégorie' }}"
                             class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t to-transparent from-black/70"></div>
                        <div class="absolute right-0 bottom-0 left-0 p-6 text-white">
                            <h3 class="mb-2 text-2xl font-semibold">Lingerie</h3>
                            <p class="mb-4 text-sm text-gray-200">
                                @if($featuredLingerie)
                                    {{ $featuredLingerie->name }}
                                @else
                                    Les plus belles pièces de lingerie à prix mini
                                @endif
                            </p>
                            <a href="{{ route('products.category.lingerie') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-[#7B1F1F] transition-colors">
                                Découvrir
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bouton Voir tous les produits -->
            <div class="flex justify-center mt-12">
                <a href="/products" class="inline-flex items-center px-8 py-3 text-lg font-medium text-white bg-[#7B1F1F] rounded-full hover:bg-[#6B1A1A] transition-colors">
                    Voir tous nos produits
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
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
