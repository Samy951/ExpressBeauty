<div>
    <div class="mb-8">
        <h1 class="text-2xl font-bold">Collection Rare Hair</h1>
        <div class="flex justify-between items-center mt-4">
            <p class="text-gray-600">{{ $products->total() }} Produits Trouvés</p>
            <input type="text" wire:model="filter" placeholder="Filter" class="border rounded px-4 py-2">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="aspect-w-1 aspect-h-1">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </div>
            <div class="p-4">
                <p class="text-sm text-gray-500">{{ $product->brand }}</p>
                <h3 class="font-medium text-gray-900">{{ $product->name }}</h3>
                <p class="mt-1 text-lg font-bold">{{ number_format($product->price, 2) }}€</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div> 