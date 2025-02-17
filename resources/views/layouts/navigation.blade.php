<nav class="bg-white shadow-lg">
    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0">
                <a href="/" class="block">
                    <img src="{{ asset('storage/showroomBeauty.svg') }}" alt="Showroom Beauty" class="h-[55px] w-[220px] md:h-[70px] md:w-[280px] mb-2">
                </a>
            </div>
            <div class="hidden space-x-6 md:flex md:items-center">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-[#7B1F1F]' : '' }}">Accueil</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('products.*') ? 'text-[#7B1F1F]' : '' }}">Produits</a>
                <div class="py-1">
                    <a href="{{ route('brands.show', 'dyson') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Dyson</a>
                    <a href="{{ route('brands.show', 'ghd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">GHD</a>
                    <a href="{{ route('brands.show', 'savage-x-fenty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Savage X Fenty</a>
                    <a href="{{ route('brands.show', 'fenty-beauty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Fenty Beauty</a>
                    <div class="my-1 border-t border-gray-100"></div>
                    <a href="{{ route('brands.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir toutes les marques</a>
                </div>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-[#7B1F1F]' : '' }}">À Propos</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('contact') ? 'text-[#7B1F1F]' : '' }}">Contact</a>
            </div>

            <!-- Menu mobile -->
            <div class="flex items-center md:hidden">
                <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 hover:text-[#7B1F1F]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu mobile (caché par défaut) -->
    <div class="md:hidden" x-show="mobileMenuOpen">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Accueil</a>
            <a href="{{ route('products.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Produits</a>
            <div class="py-1">
                <a href="{{ route('brands.show', 'dyson') }}" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Dyson</a>
                <a href="{{ route('brands.show', 'ghd') }}" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-[#7B1F1F] hover:text-white">GHD</a>
                <a href="{{ route('brands.show', 'savage-x-fenty') }}" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Savage X Fenty</a>
                <a href="{{ route('brands.show', 'fenty-beauty') }}" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Fenty Beauty</a>
                <div class="my-1 border-t border-gray-100"></div>
                <a href="{{ route('brands.index') }}" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Voir toutes les marques</a>
            </div>
            <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">À Propos</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Contact</a>
        </div>
    </div>
</nav>
