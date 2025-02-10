<x-layouts.app>
    <div class="bg-white">
        <!-- En-tête de la page -->
        <div class="bg-[#7B1F1F] text-white py-8">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold text-center">Nos Produits</h1>
                <p class="text-center mt-2 text-gray-200">Découvrez notre sélection de produits de beauté haut de gamme</p>
            </div>
        </div>

        <!-- Filtres et tri -->
        <div class="container mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <!-- Filtres -->
            <div class="flex space-x-4">
                <select class="rounded-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-[#7B1F1F]">
                    <option value="">Marque</option>
                    <option value="Dyson">Dyson</option>
                    <option value="GHD">GHD</option>
                    <option value="Savage X Fenty">Savage X Fenty</option>
                </select>
                <select class="rounded-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-[#7B1F1F]">
                    <option value="">Catégorie</option>
                    <option value="hair">Soins Capillaires</option>
                    <option value="styling">Appareils de Coiffure</option>
                    <option value="accessories">Accessoires</option>
                </select>
            </div>
            
            <!-- Tri -->
            <select class="rounded-full px-4 py-2 border border-gray-300 focus:outline-none focus:border-[#7B1F1F]">
                <option value="newest">Plus récents</option>
                <option value="price-asc">Prix croissant</option>
                <option value="price-desc">Prix décroissant</option>
                <option value="name-asc">Nom A-Z</option>
                <option value="name-desc">Nom Z-A</option>
            </select>
        </div>

        <!-- Grille de produits -->
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                <div class="group w-full">
                    <div class="relative bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 h-[400px] flex flex-col">
                        <a href="{{ route('products.show', $product->id) }}" class="flex flex-col h-full">
                            <!-- Image du produit avec dimensions fixes -->
                            <div class="relative w-full h-[250px]">
                                <img src="{{ $product->image_url }}" 
                                     alt="{{ $product->name }}" 
                                     class="absolute inset-0 w-full h-full object-cover object-center rounded-t-lg group-hover:opacity-75 transition-opacity">
                            </div>
                            <!-- Badge de marque -->
                            <div class="absolute top-2 left-2 z-10">
                                <span class="bg-[#7B1F1F] text-white px-3 py-1 text-xs font-medium rounded-full">
                                    {{ $product->brand }}
                                </span>
                            </div>
                            <!-- Infos produit -->
                            <div class="p-4 flex flex-col justify-between flex-grow">
                                <h3 class="text-sm font-medium text-gray-900 line-clamp-2 mb-2">{{ $product->name }}</h3>
                                <div class="flex justify-between items-center">
                                    <p class="text-lg font-bold text-[#7B1F1F]">{{ number_format($product->price, 2) }} €</p>
                                    @if($product->old_price)
                                        <p class="text-sm text-gray-500 line-through">{{ number_format($product->old_price, 2) }} €</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layouts.app> 