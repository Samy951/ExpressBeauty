<x-layouts.app>
    <div class="bg-white">
        <!-- En-tête de la page -->
        <div class="bg-[#7B1F1F] text-white py-8">
            <div class="container px-4 mx-auto">
                <h1 class="text-4xl font-bold text-center">Nos Catégories</h1>
                <p class="mt-2 text-center text-gray-200">Explorez nos différentes catégories de produits</p>
            </div>
        </div>

        <!-- Grille des catégories -->
        <div class="container px-4 py-12 mx-auto">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-3">
                <!-- Soins Capillaires -->
                <div class="group">
                    <a href="{{ route('products.category', 'hair') }}" class="block">
                        <div class="overflow-hidden relative rounded-lg">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/categories/hair-care.jpg') }}"
                                     alt="Soins Capillaires"
                                     class="object-cover w-full h-full transition-transform duration-300 transform group-hover:scale-105">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t to-transparent from-black/70">
                                <div class="absolute right-0 bottom-0 left-0 p-6">
                                    <h2 class="text-2xl font-bold text-white">Soins Capillaires</h2>
                                    <p class="mt-2 text-gray-200">Découvrez nos produits pour des cheveux sains et brillants</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Appareils de Coiffure -->
                <div class="group">
                    <a href="{{ route('products.category', 'styling') }}" class="block">
                        <div class="overflow-hidden relative rounded-lg">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/categories/styling-tools.jpg') }}"
                                     alt="Appareils de Coiffure"
                                     class="object-cover w-full h-full transition-transform duration-300 transform group-hover:scale-105">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t to-transparent from-black/70">
                                <div class="absolute right-0 bottom-0 left-0 p-6">
                                    <h2 class="text-2xl font-bold text-white">Appareils de Coiffure</h2>
                                    <p class="mt-2 text-gray-200">Les meilleurs outils pour un style parfait</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Accessoires -->
                <div class="group">
                    <a href="{{ route('products.category', 'accessories') }}" class="block">
                        <div class="overflow-hidden relative rounded-lg">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/categories/accessories.jpg') }}"
                                     alt="Accessoires"
                                     class="object-cover w-full h-full transition-transform duration-300 transform group-hover:scale-105">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t to-transparent from-black/70">
                                <div class="absolute right-0 bottom-0 left-0 p-6">
                                    <h2 class="text-2xl font-bold text-white">Accessoires</h2>
                                    <p class="mt-2 text-gray-200">Complétez votre routine beauté avec nos accessoires</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Soins de la Peau -->
                <div class="group">
                    <a href="{{ route('products.category', 'skincare') }}" class="block">
                        <div class="overflow-hidden relative rounded-lg">
                            <div class="aspect-w-16 aspect-h-9">
                                <img src="{{ asset('storage/categories/skincare.jpg') }}"
                                     alt="Soins de la Peau"
                                     class="object-cover w-full h-full transition-transform duration-300 transform group-hover:scale-105">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t to-transparent from-black/70">
                                <div class="absolute right-0 bottom-0 left-0 p-6">
                                    <h2 class="text-2xl font-bold text-white">Soins de la Peau</h2>
                                    <p class="mt-2 text-gray-200">Découvrez nos produits de soin coréens de haute qualité</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Section statistiques -->
        <div class="py-12 bg-gray-50">
            <div class="container px-4 mx-auto">
                <div class="grid grid-cols-2 gap-8 text-center md:grid-cols-4">
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
                    <div>
                        <div class="text-4xl font-bold text-[#7B1F1F]">{{ $skincareProducts }}</div>
                        <div class="mt-2 text-gray-600">Produits de Soins de la Peau</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
