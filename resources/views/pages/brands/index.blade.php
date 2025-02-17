<x-layouts.app>
    <!-- Bannière de déstockage -->
    <div class="bg-[#7B1F1F] text-white py-2 text-center">
        <p class="text-sm">
            ⚡ DÉSTOCKAGE : JUSQU'À -95% SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <div class="container px-4 py-12 mx-auto">
        <!-- En-tête -->
        <h1 class="mb-4 text-3xl font-bold text-center">Nos Marques</h1>
        <p class="mb-12 text-center text-gray-600">
            Découvrez notre sélection de marques de beauté premium, soigneusement choisies pour leur qualité et leur innovation.
        </p>

        <!-- Grille des marques -->
        <div class="grid grid-cols-2 gap-8 mx-auto max-w-7xl md:grid-cols-2 lg:grid-cols-4">
            @foreach($brands as $brand)
            <div class="group">
                <a href="{{ $brand['route'] }}" class="block">
                    <div class="relative rounded-lg shadow-lg overflow-hidden aspect-[4/3] transition-all duration-300 group-hover:shadow-xl">
                        <!-- Image Container -->
                        <div class="absolute inset-0">
                            @if($brand['name'] === 'GHD')
                            <div class="flex justify-center items-center p-8 w-full h-full bg-black">
                                <img src="{{ asset($brand['image']) }}"
                                     alt="{{ $brand['name'] }}"
                                     class="object-contain w-full h-full">
                            </div>
                            @else
                            <div class="flex justify-center items-center p-12 w-full h-full bg-white">
                                <img src="{{ asset($brand['image']) }}"
                                     alt="{{ $brand['name'] }}"
                                     class="object-contain w-full h-full">
                            </div>
                            @endif
                        </div>

                        <!-- Hover Overlay -->
                        <div class="flex absolute inset-0 justify-center items-center opacity-0 transition-opacity duration-300 bg-black/60 group-hover:opacity-100">
                            <div class="p-4 text-center text-white">
                                <h2 class="mb-2 text-xl font-bold">{{ $brand['name'] }}</h2>
                                <p class="mb-4 text-sm">{{ $brand['products_count'] }}</p>
                                <span class="inline-flex items-center px-4 py-2 border-2 border-white text-white font-medium rounded-full hover:bg-white hover:text-[#7B1F1F] transition-colors duration-300">
                                    Voir la collection →
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</x-layouts.app>
