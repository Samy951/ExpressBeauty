<div>
    <!-- Bannière de déstockage -->
    <div class="bg-[#7B1F1F] text-white py-2 text-center">
        <p class="text-sm">
            ⚡ DÉSTOCKAGE : JUSQU'À -70% SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <!-- Hero Section avec image de fond -->
    <div class="relative h-[600px] bg-cover bg-center" style="background-image: url('{{ asset('storage/AdobeStock_132642948.jpeg') }}')">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="container relative flex flex-col items-center justify-center h-full px-4 mx-auto text-center text-white">
            <h1 class="mb-6 text-5xl font-bold">Offres Déstockage !</h1>
            <p class="max-w-2xl mb-8 text-xl">
                Jusqu'à -70% sur des incontournables beauté, disponibles jusqu'à épuisement des stocks ! Limité à un produit par personne.
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

            <div class="relative overflow-hidden" x-data="{
                position: 0,
                init() {
                    this.scroll();
                },
                scroll() {
                    setInterval(() => {
                        this.position = (this.position - 0.1) % 100;
                    }, 20);
                }
            }">
                <div class="flex items-center space-x-24 animate-scroll" :style="'transform: translateX(' + position + '%)'">
                    <!-- Groupe de logos qui se répète -->
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

    <!-- Section Nos Marques Phares -->
    <div class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <h2 class="mb-12 text-3xl font-bold text-center">Nos Marques Phares</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Les marques seront ajoutées ici -->
            </div>
        </div>
    </div>

    <!-- Section Nos Produits -->
    <div class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <h2 class="mb-12 text-3xl font-bold text-center">Nos Produits</h2>

            <!-- Filtres et tri -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0 md:space-x-4">
                <!-- Filtres -->
                <div class="flex flex-wrap gap-4">
                    <!-- Filtre par marque -->
                    <select wire:model.live="brand" class="rounded-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-[#7B1F1F]">
                        <option value="">Toutes les marques</option>
                        @foreach($brands as $brandOption)
                            <option value="{{ $brandOption }}">{{ $brandOption }}</option>
                        @endforeach
                    </select>

                    <!-- Filtre par catégorie -->
                    <select wire:model.live="category" class="rounded-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-[#7B1F1F]">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>

                    <!-- Barre de recherche -->
                    <input type="text"
                           wire:model.live.debounce.300ms="search"
                           placeholder="Rechercher un produit..."
                           class="rounded-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-[#7B1F1F]">
                </div>

                <!-- Tri -->
                <select wire:model.live="sortField" class="rounded-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-[#7B1F1F]">
                    <option value="created_at">Plus récents</option>
                    <option value="price">Prix</option>
                    <option value="name">Nom</option>
                </select>

                <!-- Direction du tri -->
                <button wire:click="$set('sortDirection', '{{ $sortDirection === 'asc' ? 'desc' : 'asc' }}')"
                        class="p-2 rounded-full hover:bg-gray-100">
                    @if($sortDirection === 'asc')
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9M3 12h5M3 16h9M3 20h13"></path>
                        </svg>
                    @else
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9M3 12h5M3 16h9M3 20h13" transform="rotate(180 12 12)"></path>
                        </svg>
                    @endif
                </button>
            </div>

            <!-- Grille de produits -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <div class="group">
                        <div class="relative bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 h-[400px] flex flex-col">
                            <a href="{{ route('products.show', $product->id) }}" class="flex flex-col h-full">
                                <!-- Image du produit avec dimensions fixes -->
                                <div class="relative w-full h-[250px]">
                                    <img src="{{ $product->image_url }}"
                                         alt="{{ $product->name }}"
                                         class="absolute inset-0 w-full h-full object-cover object-center rounded-t-lg">
                                </div>
                                <!-- Badge de marque -->
                                <div class="absolute top-2 left-2">
                                    <span class="bg-[#7B1F1F] text-white px-3 py-1 text-xs font-medium rounded-full">
                                        {{ $product->brand }}
                                    </span>
                                </div>
                                <!-- Infos produit -->
                                <div class="p-4 flex flex-col justify-between flex-grow">
                                    <h3 class="text-sm font-medium text-gray-900 line-clamp-2">{{ $product->name }}</h3>
                                    <div class="mt-2 flex justify-between items-center">
                                        <p class="text-lg font-bold text-[#7B1F1F]">{{ number_format($product->price, 2) }} €</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">Aucun produit trouvé</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
