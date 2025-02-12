<x-layouts.app>
    <div class="bg-white">
        <!-- En-tête de la page -->
        <div class="bg-[#7B1F1F] text-white py-8">
            <div class="container px-4 mx-auto">
                <h1 class="text-4xl font-bold text-center">Nos Produits</h1>
                <p class="mt-2 text-center text-gray-200">Découvrez notre sélection de produits de beauté haut de gamme</p>
            </div>
        </div>

        <!-- Filtres et tri -->
        <form x-data="{
            brand: '{{ request('brand') }}',
            category: '{{ request('category') }}',
            sort: '{{ request('sort', 'created_at') }}',
            updateFilters() {
                const url = new URL(window.location);
                url.searchParams.set('brand', this.brand);
                url.searchParams.set('category', this.category);
                url.searchParams.set('sort', this.sort);
                window.location = url.toString();
            }
        }" method="GET" action="{{ route('products.index') }}" class="container px-4 py-6 mx-auto">
            <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0 md:items-start">
                <!-- Filtres de marque et catégorie (visibles uniquement sur la page principale des produits) -->
                @if(request()->route()->getName() === 'products.index')
                <div class="flex flex-col w-full space-y-2 md:flex-row md:space-y-0 md:space-x-4 md:w-auto">
                    <select x-model="brand" @change="updateFilters()" class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12">
                        <option value="">Toutes les marques</option>
                        <option value="Dyson">Dyson</option>
                        <option value="GHD">GHD</option>
                        <option value="Savage X Fenty">Savage X Fenty</option>
                        <option value="Fenty Beauty">Fenty Beauty</option>
                    </select>
                    <select x-model="category" @change="updateFilters()" class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12">
                        <option value="">Toutes les catégories</option>
                        <option value="makeup">Maquillage</option>
                        <option value="hair">Soins Capillaires</option>
                        <option value="lingerie">Lingerie</option>
                    </select>
                </div>
                @endif

                <!-- Tri (toujours visible) -->
                <div class="flex items-center w-full md:w-auto {{ request()->route()->getName() === 'products.index' ? '' : 'justify-end' }}">
                    <select x-model="sort" @change="updateFilters()" class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12">
                        <option value="created_at">Plus récents</option>
                        <option value="price-asc">Prix croissant</option>
                        <option value="price-desc">Prix décroissant</option>
                        <option value="name-asc">Nom A-Z</option>
                        <option value="name-desc">Nom Z-A</option>
                    </select>
                </div>
            </div>

            <!-- Champs cachés pour maintenir les filtres actifs -->
            @if($currentCategory)
                <input type="hidden" name="category" value="{{ $currentCategory }}">
            @endif
            @if($currentBrand)
                <input type="hidden" name="brand" value="{{ $currentBrand }}">
            @endif
        </form>

        <!-- Grille de produits -->
        <div class="container px-4 py-8 mx-auto">
            <div class="grid grid-cols-2 gap-4 sm:gap-6 md:grid-cols-3 lg:grid-cols-4">
                @foreach($products as $product)
                <div class="w-full group">
                    <div class="relative bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 h-[400px] flex flex-col">
                        <a href="{{ route('products.show', $product->id) }}" class="flex flex-col h-full">
                            <!-- Image du produit avec dimensions fixes -->
                            <div class="relative w-full h-[250px]">
                                <img src="{{ $product->image_url }}"
                                     alt="{{ $product->name }}"
                                     class="absolute inset-0 w-full h-full {{ $product->brand === 'Dyson' ? 'object-contain' : 'object-cover' }} object-center transition-opacity rounded-t-lg group-hover:opacity-75">
                            </div>
                            <!-- Badge de marque -->
                            <div class="absolute z-10 top-2 left-2">
                                <span class="bg-[#7B1F1F] text-white px-3 py-1 text-xs font-medium rounded-full">
                                    {{ $product->brand }}
                                </span>
                            </div>
                            <!-- Infos produit -->
                            <div class="flex flex-col justify-between flex-grow p-4">
                                <h3 class="mb-2 text-sm font-medium text-gray-900 line-clamp-2">{{ $product->name }}</h3>
                                <div class="flex items-center justify-between">
                                    <!-- Badge de réduction -->
                                    @php
                                        $reduction = round((($product->original_price ?? $product->price) - $product->promo_price) / ($product->original_price ?? $product->price) * 100);
                                    @endphp
                                    <div class="flex items-center gap-2">
                                        <span class="bg-[#7B1F1F] text-white px-2 py-1 text-xs font-bold rounded">-{{ $reduction }}%</span>
                                    </div>
                                    <!-- Prix -->
                                    <div class="flex flex-col items-end">
                                        <p class="text-lg font-bold text-[#7B1F1F]">{{ number_format($product->promo_price, 2, ',', ' ') }} €</p>
                                        <p class="text-sm text-gray-500 line-through">{{ number_format($product->original_price ?? $product->price, 2, ',', ' ') }} €</p>
                                    </div>
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
