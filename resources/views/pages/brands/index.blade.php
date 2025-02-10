<x-layouts.app>
    <div class="bg-white">
        <!-- En-tête de la page -->
        <div class="bg-[#7B1F1F] text-white py-8">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold text-center">Nos Marques</h1>
                <p class="text-center mt-2 text-gray-200">Découvrez nos marques partenaires de renom</p>
            </div>
        </div>

        <!-- Grille des marques -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($brands as $brandKey => $brand)
                <div class="group">
                    <a href="{{ route($brand['route']) }}" class="block">
                        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                            <!-- Image de la marque -->
                            <div class="aspect-w-16 aspect-h-9 relative">
                                <img src="{{ asset($brand['image']) }}" 
                                     alt="{{ $brand['name'] }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="absolute bottom-0 left-0 right-0 p-6">
                                        <p class="text-white text-lg">Voir les produits</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Informations de la marque -->
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-900">{{ $brand['name'] }}</h2>
                                <p class="text-gray-600 mt-2">{{ $brand['description'] }}</p>
                                <div class="mt-4 flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $brand['count'] }} produits</span>
                                    <span class="text-[#7B1F1F] group-hover:translate-x-2 transition-transform duration-300">
                                        →
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Section Partenariats -->
        <div class="bg-gray-50 py-12">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-8">Ils parlent de nous</h2>
                <div class="grid grid-cols-2 md:grid-cols-6 gap-8 items-center">
                    <img src="{{ asset('storage/brands/marie-claire.webp') }}" alt="Marie Claire" class="h-12 grayscale hover:grayscale-0 transition-all mx-auto">
                    <img src="{{ asset('storage/brands/cosmopolitan.webp') }}" alt="Cosmopolitan" class="h-12 grayscale hover:grayscale-0 transition-all mx-auto">
                    <img src="{{ asset('storage/brands/sephora.webp') }}" alt="Sephora" class="h-12 grayscale hover:grayscale-0 transition-all mx-auto">
                    <img src="{{ asset('storage/brands/allure.webp') }}" alt="Allure" class="h-12 grayscale hover:grayscale-0 transition-all mx-auto">
                    <img src="{{ asset('storage/brands/elle.webp') }}" alt="Elle" class="h-12 grayscale hover:grayscale-0 transition-all mx-auto">
                    <img src="{{ asset('storage/brands/fenty.png') }}" alt="Savage X Fenty" class="h-12 grayscale hover:grayscale-0 transition-all mx-auto">
                </div>
            </div>
        </div>
    </div>
</x-layouts.app> 