<x-layouts.app>
    <!-- Bannière de déstockage -->
    <div class="bg-[#7B1F1F] text-white py-2 text-center">
        <p class="text-sm">
            ⚡ DÉSTOCKAGE : LIQUIDATION SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <div class="container px-4 py-12 mx-auto">
        <!-- En-tête -->
        <h1 class="mb-4 text-3xl font-bold text-center">Nos Marques</h1>
        <p class="mb-12 text-center text-gray-600">
            Découvrez notre sélection de marques de beauté premium, soigneusement choisies pour leur qualité et leur innovation.
        </p>

        <!-- Grille des marques -->
        <div class="grid grid-cols-2 gap-8 mx-auto max-w-7xl md:grid-cols-3 lg:grid-cols-5">
            @foreach($brands as $brand)
            <div class="brand-card h-full">
                <a href="{{ $brand['route'] }}" class="block bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 h-full flex flex-col hover:scale-[1.02]">
                    <div class="h-64 bg-gray-100 flex items-center justify-center overflow-hidden p-6">
                        <div class="w-full h-full flex items-center justify-center bg-white rounded-lg">
                            <img
                                src="{{ $brand['image'] }}"
                                alt="{{ $brand['name'] }}"
                                class="brand-image object-contain mix-blend-multiply"
                                onerror="this.onerror=null; this.src='{{ asset('storage/brands/default-brand.webp') }}';"
                            >
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-center bg-gray-50 border-t border-gray-100">
                        <h3 class="text-xl font-semibold text-gray-900 text-center">{{ $brand['name'] }}</h3>
                        <p class="mt-2 text-gray-600 text-center">{{ $brand['products_count'] }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <style>
            /* Style pour uniformiser l'apparence des images de marque */
            .brand-card img.brand-image {
                width: 200px;
                height: 200px;
                object-fit: contain;
                transition: transform 0.3s ease;
                filter: contrast(1.05);
            }
            .brand-card:hover img {
                transform: scale(1.05);
            }
        </style>
    </div>
</x-layouts.app>
