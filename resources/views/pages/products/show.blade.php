<x-layouts.app>
    <!-- Bannière de déstockage -->
    <div class="bg-[#7B1F1F] text-white py-2 text-center">
        <p class="text-sm">
            ⚡ DÉSTOCKAGE : JUSQU'À -70% SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Galerie d'images -->
            <div class="relative">
                <!-- Badge Déstockage -->
                <div class="absolute top-4 left-4 z-10">
                    <span class="bg-[#D4B5B0] text-[#7B1F1F] px-4 py-1 rounded-full text-sm font-medium">
                        Déstockage
                    </span>
                </div>

                <!-- Image principale -->
                <div class="bg-[#F9F5F5] rounded-lg p-4 mb-4">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-[500px] object-contain">
                </div>

                <!-- Miniatures -->
                <div class="grid grid-cols-4 gap-4">
                    <button class="bg-[#F9F5F5] rounded-lg p-2 hover:ring-2 hover:ring-[#7B1F1F] transition-all">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-20 object-contain">
                    </button>
                    @if($product->additional_images)
                        @foreach(json_decode($product->additional_images) as $image)
                        <button class="bg-[#F9F5F5] rounded-lg p-2 hover:ring-2 hover:ring-[#7B1F1F] transition-all">
                            <img src="{{ $image }}" alt="{{ $product->name }}" class="w-full h-20 object-contain">
                        </button>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Informations produit -->
            <div class="space-y-6">
                <!-- Marque et Nom -->
                <div>
                    <h2 class="text-gray-500 text-lg">{{ $product->brand }}</h2>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                </div>

                <!-- Évaluations -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        @for($i = 0; $i < 5; $i++)
                            @if($i < floor($product->rating ?? 4))
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @else
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endif
                        @endfor
                    </div>
                    <span class="text-sm text-gray-600">
                        96% de nos clients recommandent ce produit (4926 Avis Clients)
                    </span>
                </div>

                <!-- Prix -->
                <div class="flex items-center space-x-4">
                    <span class="text-3xl font-bold text-[#7B1F1F]">{{ number_format($product->price, 2) }} €</span>
                    @if($product->old_price)
                        <span class="text-xl text-gray-500 line-through">{{ number_format($product->old_price, 2) }} €</span>
                    @endif
                </div>

                <!-- Stock -->
                <p class="text-gray-600">
                    Plus que {{ $product->stock ?? 17 }} exemplaires disponibles à ce prix
                </p>

                <!-- Bouton d'achat -->
                <div x-data="{ hover: false }">
                    <button 
                        @mouseenter="hover = true" 
                        @mouseleave="hover = false"
                        :class="hover ? 'bg-white text-[#7B1F1F] border-2 border-[#7B1F1F]' : 'bg-[#7B1F1F] text-white border-2 border-transparent'"
                        class="w-full font-bold py-3 px-6 rounded-full transition-all duration-200">
                        Commander {{ number_format($product->price, 2) }} €
                    </button>
                </div>

                <!-- Sections accordéon -->
                <div class="space-y-4">
                    <!-- Description -->
                    <div x-data="{ open: true }" class="border-b border-gray-200">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-4 text-left">
                            <span class="text-lg font-medium text-gray-900">Description</span>
                            <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" class="pb-4 prose max-w-none">
                            {!! $product->description !!}
                        </div>
                    </div>

                    <!-- Livraison & Retours -->
                    <div x-data="{ open: false }" class="border-b border-gray-200">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-4 text-left">
                            <span class="text-lg font-medium text-gray-900">Livraison & Retours</span>
                            <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" class="pb-4 prose max-w-none">
                            <ul class="list-disc pl-5 space-y-2">
                                <li>Livraison gratuite à partir de 49€</li>
                                <li>Livraison en 2-4 jours ouvrés</li>
                                <li>Retours gratuits sous 30 jours</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Garantie de Qualité -->
                    <div x-data="{ open: false }" class="border-b border-gray-200">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-4 text-left">
                            <span class="text-lg font-medium text-gray-900">Garantie de Qualité</span>
                            <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" class="pb-4 prose max-w-none">
                            <p>Tous nos produits sont authentiques et garantis 2 ans. Nous travaillons directement avec les marques pour vous assurer la meilleure qualité.</p>
                        </div>
                    </div>

                    <!-- Sécurité des Paiements -->
                    <div x-data="{ open: false }" class="border-b border-gray-200">
                        <button @click="open = !open" class="flex justify-between items-center w-full py-4 text-left">
                            <span class="text-lg font-medium text-gray-900">Sécurité des Paiements</span>
                            <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" class="pb-4 prose max-w-none">
                            <p>Paiement 100% sécurisé par carte bancaire, PayPal ou en 3x sans frais avec Klarna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app> 