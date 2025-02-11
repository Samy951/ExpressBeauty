<x-layouts.app>
    <!-- Bannière de la marque -->
    <div class="relative h-[400px] overflow-hidden">
        <div class="absolute inset-0 bg-gray-900">
            <img src="{{ asset($brandInfo['image']) }}"
                 alt="{{ $brandInfo['name'] }}"
                 class="w-full h-full object-cover opacity-20">
        </div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-8 inline-block mb-6">
                    <img src="{{ asset($brandInfo['image']) }}"
                         alt="{{ $brandInfo['name'] }}"
                         class="h-32 object-contain">
                </div>
                <h1 class="text-5xl font-bold mb-4">{{ $brandInfo['name'] }}</h1>
                <p class="text-xl max-w-2xl mx-auto text-gray-200">{{ $brandInfo['description'] }}</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        <!-- Nombre de produits -->
        <div class="text-center mb-12">
            <p class="text-gray-600 text-lg">{{ $products->total() }} produits trouvés</p>
        </div>

        <!-- Grille de produits -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="group">
                <div class="relative bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 h-[400px] flex flex-col">
                    <a href="{{ route('products.show', $product->id) }}" class="flex flex-col h-full">
                        <!-- Image du produit -->
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
                            <div class="mt-2 flex flex-col">
                                <!-- Badge de réduction -->
                                @php
                                    $reduction = round((($product->original_price ?? $product->price) - $product->promo_price) / ($product->original_price ?? $product->price) * 100);
                                @endphp
                                <div class="flex items-center justify-between">
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
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
    </div>
</x-layouts.app>
