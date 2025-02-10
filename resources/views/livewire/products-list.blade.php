<div>
    <!-- Bannière de déstockage -->
    <div class="bg-[#7B1F1F] text-white py-2 text-center">
        <p class="text-sm">
            ⚡ DÉSTOCKAGE : JUSQU'À -70% SUR TOUT ! LIMITÉ À UN PRODUIT PAR PERSONNE, FAITES VITE ! ⚡
        </p>
    </div>

    <!-- Hero Section avec image de fond -->
    <div class="relative h-[600px] bg-cover bg-center" style="background-image: url('{{ asset('storage/AdobeStock_132642948.jpeg') }}')">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="container relative flex flex-col items-center justify-center h-full px-4 mx-auto text-center text-white">
            <h1 class="mb-6 text-5xl font-bold">Offres Déstockage !</h1>
            <p class="max-w-2xl mb-8 text-xl">
                Jusqu'à -70% sur des incontournables beauté, disponibles jusqu'à épuisement des stocks ! Limité à un produit par personne.
            </p>
            <a href="/products" class="bg-[#7B1F1F] text-white px-8 py-3 rounded-full text-lg font-medium hover:bg-[#6B1A1A] transition-colors">
                PROFITEZ EN MAINTENANT
            </a>
        </div>
    </div>

    <!-- Section "Ils parlent de nous" -->
    <div class="py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl">
            <h2 class="mb-16 text-3xl font-bold text-center">Ils parlent de nous</h2>

            <div class="relative overflow-hidden" x-data="{
                position: 0,
                init() {
                    this.scroll();
                },
                scroll() {
                    setInterval(() => {
                        this.position = (this.position - 0.1) % 100;
                    }, 20);
                }
            }">
                <div class="flex items-center space-x-24 animate-scroll" :style="'transform: translateX(' + position + '%)'">
                    <!-- Groupe de logos qui se répète -->
                    <img src="{{ asset('storage/brands/marie-claire.webp') }}" alt="Marie Claire" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    <img src="{{ asset('storage/brands/cosmopolitan.webp') }}" alt="Cosmopolitan" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    <img src="{{ asset('storage/brands/sephora.webp') }}" alt="Sephora" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    <img src="{{ asset('storage/brands/allure.webp') }}" alt="Allure" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    <img src="{{ asset('storage/brands/elle.webp') }}" alt="Elle" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    <!-- Répétition des logos pour l'effet infini -->
                    <img src="{{ asset('storage/brands/marie-claire.webp') }}" alt="Marie Claire" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    <img src="{{ asset('storage/brands/cosmopolitan.webp') }}" alt="Cosmopolitan" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    <img src="{{ asset('storage/brands/sephora.webp') }}" alt="Sephora" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    <img src="{{ asset('storage/brands/allure.webp') }}" alt="Allure" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                    <img src="{{ asset('storage/brands/elle.webp') }}" alt="Elle" class="w-[160px] h-[80px] object-contain transition-all duration-300 opacity-70 hover:opacity-100">
                </div>
            </div>
        </div>
    </div>

    <!-- Section Nos Marques Phares -->
    <div class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <h2 class="mb-12 text-3xl font-bold text-center">Nos Marques Phares</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Les marques seront ajoutées ici -->
            </div>
        </div>
    </div>
</div>
