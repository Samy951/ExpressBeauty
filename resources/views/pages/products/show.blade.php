<x-layouts.app>
    <!-- Bannière de déstockage -->
    <div class="bg-[#7B1F1F] text-white py-2 text-center">
        <p class="text-sm">
            ⚡ DÉSTOCKAGE : JUSQU'À -70% SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <div class="container px-4 py-8 mx-auto">
        <div class="max-w-7xl mx-auto">
            <!-- Fil d'Ariane -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-[#7B1F1F]">Accueil</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-[#7B1F1F]">Produits</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500">{{ $product->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Détails du produit -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Image du produit -->
                    <div class="relative h-[500px]">
                        <img src="{{ $product->image_url }}"
                             alt="{{ $product->name }}"
                             class="absolute inset-0 w-full h-full object-cover object-center">
                    </div>

                    <!-- Informations du produit -->
                    <div class="p-8">
                        <!-- Badge de marque -->
                        <div class="mb-4">
                            <span class="bg-[#7B1F1F] text-white px-4 py-1 text-sm font-medium rounded-full">
                                {{ $product->brand }}
                            </span>
                        </div>

                        <!-- Nom du produit -->
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>

                        <!-- Prix et réduction -->
                        @php
                            $reduction = round((($product->original_price ?? $product->price) - $product->promo_price) / ($product->original_price ?? $product->price) * 100);
                        @endphp
                        <div class="flex items-center gap-4 mb-6">
                            <span class="bg-[#7B1F1F] text-white px-3 py-1 text-lg font-bold rounded">-{{ $reduction }}%</span>
                            <div class="flex items-baseline gap-4">
                                <p class="text-3xl font-bold text-[#7B1F1F]">{{ number_format($product->promo_price, 2, ',', ' ') }} €</p>
                                <p class="text-xl text-gray-500 line-through">{{ number_format($product->original_price ?? $product->price, 2, ',', ' ') }} €</p>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="prose max-w-none mb-8">
                            <p class="text-gray-600">{{ $product->description }}</p>
                        </div>

                        <!-- Spécifications -->
                        @if($product->specifications)
                        <div class="mb-8">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Caractéristiques</h2>
                            <ul class="space-y-2">
                                @foreach($product->specifications as $key => $value)
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-[#7B1F1F] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-2 text-gray-600">{{ $key }}: {{ $value }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Bouton Commander -->
                        <a href="{{ $product->payment_link }}" target="_blank"
                           class="w-full inline-flex justify-center items-center px-8 py-4 bg-[#7B1F1F] text-white text-lg font-bold rounded-full hover:bg-[#6B1A1A] transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                            Commander maintenant
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
