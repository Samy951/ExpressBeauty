<x-layouts.app>
    <div class="bg-white">
        <!-- En-tête de la marque -->
        <div class="relative">
            <!-- Image de fond -->
            <div class="h-[300px] relative">
                <img src="{{ asset($brandInfo['image']) }}" 
                     alt="{{ $brandInfo['name'] }}" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
            
            <!-- Contenu de l'en-tête -->
            <div class="absolute inset-0 flex items-center">
                <div class="container mx-auto px-4">
                    <h1 class="text-4xl font-bold text-white text-center">{{ $brandInfo['name'] }}</h1>
                    <p class="text-xl text-gray-200 text-center mt-4 max-w-2xl mx-auto">
                        {{ $brandInfo['description'] }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Filtres et tri -->
        <div class="container mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <!-- Filtres -->
            <div class="flex space-x-4">
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                <div class="group">
                    <div class="relative overflow-hidden rounded-lg bg-white shadow-md hover:shadow-xl transition-shadow duration-300">
                        <a href="{{ route('products.show', $product->id) }}">
                            <!-- Image du produit -->
                            <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden">
                                <img src="{{ $product->image_url }}" 
                                     alt="{{ $product->name }}" 
                                     class="h-full w-full object-cover object-center group-hover:opacity-75 transition-opacity">
                            </div>
                            <!-- Badge de catégorie -->
                            <div class="absolute top-2 left-2">
                                <span class="bg-[#7B1F1F] text-white px-2 py-1 text-xs rounded-full">
                                    {{ $product->category }}
                                </span>
                            </div>
                            <!-- Infos produit -->
                            <div class="p-4">
                                <h3 class="text-sm font-medium text-gray-900">{{ $product->name }}</h3>
                                <div class="mt-2 flex justify-between items-center">
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