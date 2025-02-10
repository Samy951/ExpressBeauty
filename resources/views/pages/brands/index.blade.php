<x-layouts.app>
    <!-- Bannière de déstockage -->
    <div class="bg-[#7B1F1F] text-white py-2 text-center">
        <p class="text-sm">
            ⚡ DÉSTOCKAGE : JUSQU'À -70% SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <div class="container mx-auto px-4 py-12">
        <!-- En-tête -->
        <h1 class="text-3xl font-bold text-center mb-4">Nos Marques</h1>
        <p class="text-gray-600 text-center mb-12">
            Découvrez notre sélection de marques de beauté premium, soigneusement choisies pour leur qualité et leur innovation.
        </p>

        <!-- Grille des marques -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
            @foreach($brands as $brand)
            <div class="group">
                <a href="{{ $brand['route'] }}" class="block">
                    <div class="relative rounded-lg shadow-lg overflow-hidden aspect-[4/3] transition-all duration-300 group-hover:shadow-xl">
                        <!-- Image Container -->
                        <div class="absolute inset-0">
                            @if($brand['name'] === 'GHD')
                            <div class="w-full h-full bg-black flex items-center justify-center p-8">
                                <img src="{{ asset($brand['image']) }}" 
                                     alt="{{ $brand['name'] }}" 
                                     class="w-full h-full object-contain">
                            </div>
                            @else
                            <div class="w-full h-full bg-white flex items-center justify-center p-12">
                                <img src="{{ asset($brand['image']) }}" 
                                     alt="{{ $brand['name'] }}" 
                                     class="w-full h-full object-contain">
                            </div>
                            @endif
                        </div>
                            
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="text-center text-white p-4">
                                <h2 class="text-xl font-bold mb-2">{{ $brand['name'] }}</h2>
                                <p class="text-sm mb-4">{{ $brand['products_count'] }}</p>
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