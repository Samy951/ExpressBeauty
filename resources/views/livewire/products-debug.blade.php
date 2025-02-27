<div class="p-6 bg-white">
    <h2 class="mb-4 text-xl font-bold">Test Filtres et Pagination</h2>

    <div class="mb-4">
        <label class="block mb-2">Recherche</label>
        <input
            type="text"
            x-data
            x-on:keydown.enter="$wire.setSearch($event.target.value)"
            value="{{ $search }}"
            class="p-2 border rounded"
            placeholder="Rechercher..."
        >
    </div>

    <div class="mb-4">
        <label class="block mb-2">Marque</label>
        <select
            wire:change="filterByBrand($event.target.value)"
            class="p-2 border rounded"
        >
            <option value="">Toutes</option>
            @foreach($brands as $b)
                <option value="{{ $b }}" {{ $brand === $b ? 'selected' : '' }}>{{ $b }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <button wire:click="resetFilters" class="px-4 py-2 bg-red-700 text-white rounded">
            Réinitialiser les filtres
        </button>
    </div>

    <div wire:loading class="mb-4 p-2 bg-yellow-100 text-yellow-700 rounded">
        Chargement en cours...
    </div>

    <div class="mb-4">
        <p class="text-gray-700">
            Filtre actuel: {{ $search ? 'Recherche: '.$search : 'Aucune recherche' }} |
            {{ $brand ? 'Marque: '.$brand : 'Toutes les marques' }}
        </p>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        @forelse($products as $product)
            <div class="p-4 border rounded">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->brand }} - {{ $product->promo_price }} €</p>
            </div>
        @empty
            <div>Aucun produit trouvé</div>
        @endforelse
    </div>

    <!-- Ajouter debug pour la pagination -->
    <div class="mb-4">
        <p class="text-sm text-gray-500">Page actuelle: {{ $products->currentPage() }} sur {{ $products->lastPage() }}</p>
    </div>

    <div>
        {{ $products->links() }}
    </div>
</div>
