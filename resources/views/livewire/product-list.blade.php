<div>
    <!-- Bannière de déstockage -->
    <div class="bg-black text-white py-2 text-center">
        <p class="text-sm font-medium">
            ⚡ DÉSTOCKAGE : JUSQU'À -70% SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <!-- En-tête de la collection -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Collection Rare Hair</h1>
                <p class="text-gray-600 mt-2">{{ $totalProducts }} Produits Trouvés</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Rechercher..."
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>
                <button
                    type="button"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50"
                >
                    Filter
                </button>
            </div>
        </div>

        <!-- Grille de produits -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach($products as $product)
            <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200">
                    <img
                        src="{{ $product->image_url }}"
                        alt="{{ $product->name }}"
                        class="h-full w-full object-cover object-center group-hover:opacity-75"
                    >
                </div>
                <div class="mt-4 flex flex-col">
                    <p class="text-sm text-gray-500">{{ $product->brand }}</p>
                    <h3 class="text-sm text-gray-700">
                        <a href="#">
                            <span aria-hidden="true" class="absolute inset-0"></span>
                            {{ $product->name }}
                        </a>
                    </h3>
                    <p class="text-sm font-medium text-gray-900">{{ number_format($product->price, 2) }} € <span class="text-xs text-gray-500">(Prix Barrer)</span></p>
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
