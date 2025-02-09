<div class="container px-4 py-8 mx-auto">
    <!-- En-tête de la page -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">{{ $title }}</h1>
        <p class="mt-2 text-gray-600">
            @if($category)
                Découvrez notre sélection de {{ strtolower($title) }} haut de gamme
            @elseif($brand)
                Découvrez tous les produits de la marque {{ $brand }}
            @else
                Découvrez notre sélection de produits de beauté haut de gamme
            @endif
        </p>
    </div>

    <!-- Filtres -->
    <div class="p-6 mb-8 bg-white rounded-lg shadow-md">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-5">
            <!-- Recherche -->
            <div class="lg:col-span-2">
                <label class="block mb-2 text-sm font-medium text-gray-700">Rechercher</label>
                <input type="text" wire:model.live="search" placeholder="Rechercher un produit..." class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <!-- Filtre par marque -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Marque</label>
                <select wire:model.live="brand" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Toutes les marques</option>
                    @foreach($brands as $brandName)
                        <option value="{{ $brandName }}">{{ $brandName }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filtre par catégorie -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Catégorie</label>
                <select wire:model.live="category" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Filtre par prix -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Prix</label>
                <div class="flex space-x-2">
                    <input type="number" wire:model.live="minPrice" placeholder="Min" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <input type="number" wire:model.live="maxPrice" placeholder="Max" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </div>
        </div>
    </div>

    <!-- Résultats de la recherche -->
    <div class="mb-4 text-sm text-gray-600">
        {{ $products->total() }} produits trouvés
    </div>

    <!-- Liste des produits -->
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse($products as $product)
            <article class="product-card fade-in">
                <div class="relative overflow-hidden aspect-square bg-gray-50">
                    <img
                        src="{{ $product->image_url }}"
                        alt="{{ $product->name }}"
                        class="absolute inset-0 object-contain w-full h-full p-4"
                        loading="lazy"
                        onerror="this.src='https://via.placeholder.com/400x400?text=Image+non+disponible'"
                    >
                    <!-- Badge de marque -->
                    <div class="absolute top-2 left-2">
                        <span class="brand-badge">
                            {{ $product->brand }}
                        </span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="mb-2 text-lg font-semibold text-gray-900 transition-colors line-clamp-2 hover:text-indigo-600">
                        {{ $product->name }}
                    </h3>
                    <p class="mb-4 text-sm text-gray-600 line-clamp-3">{{ $product->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-indigo-600">{{ number_format($product->price, 2) }} €</span>
                        @if(isset($product->specifications['rating']))
                            <div class="rating-badge">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="ml-1 text-xs font-medium text-yellow-700">{{ $product->specifications['rating'] }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </article>
        @empty
            <div class="py-12 text-center col-span-full">
                <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full">
                    <svg class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01"></path>
                    </svg>
                </div>
                <h3 class="mb-2 text-lg font-medium text-gray-900">Aucun produit trouvé</h3>
                <p class="text-gray-500">Essayez de modifier vos critères de recherche.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
