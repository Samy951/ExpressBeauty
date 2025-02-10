<x-layouts.app>
    <div class="bg-white">
        <!-- En-tête de la page -->
        <div class="bg-[#7B1F1F] text-white py-8">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold text-center">Nos Catégories</h1>
                <p class="text-center mt-2 text-gray-200">Explorez nos différentes catégories de produits</p>
            </div>
        </div>

        <!-- Grille des catégories -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Soins Capillaires -->
                <div class="group">
                    <a href="{{ route('products.category', 'hair') }}" class="block">
                        <div class="relative overflow-hidden rounded-lg">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/categories/hair-care.jpg') }}" 
                                     alt="Soins Capillaires" 
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent">
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <h2 class="text-2xl font-bold text-white">Soins Capillaires</h2>
                                    <p class="text-gray-200 mt-2">Découvrez nos produits pour des cheveux sains et brillants</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Appareils de Coiffure -->
                <div class="group">
                    <a href="{{ route('products.category', 'styling') }}" class="block">
                        <div class="relative overflow-hidden rounded-lg">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/categories/styling-tools.jpg') }}" 
                                     alt="Appareils de Coiffure" 
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent">
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <h2 class="text-2xl font-bold text-white">Appareils de Coiffure</h2>
                                    <p class="text-gray-200 mt-2">Les meilleurs outils pour un style parfait</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Accessoires -->
                <div class="group">
                    <a href="{{ route('products.category', 'accessories') }}" class="block">
                        <div class="relative overflow-hidden rounded-lg">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/categories/accessories.jpg') }}" 
                                     alt="Accessoires" 
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent">
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <h2 class="text-2xl font-bold text-white">Accessoires</h2>
                                    <p class="text-gray-200 mt-2">Complétez votre routine beauté avec nos accessoires</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Section statistiques -->
        <div class="bg-gray-50 py-12">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div>
                        <div class="text-4xl font-bold text-[#7B1F1F]">{{ $hairProducts }}</div>
                        <div class="mt-2 text-gray-600">Produits de Soins Capillaires</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-[#7B1F1F]">{{ $stylingProducts }}</div>
                        <div class="mt-2 text-gray-600">Appareils de Coiffure</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-[#7B1F1F]">{{ $accessoryProducts }}</div>
                        <div class="mt-2 text-gray-600">Accessoires</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app> 