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
        <div class="relative container mx-auto px-4 h-full flex flex-col justify-center items-center text-white text-center">
            <h1 class="text-5xl font-bold mb-6">Offres Déstockage !</h1>
            <p class="text-xl mb-8 max-w-2xl">
                Jusqu'à -70% sur des incontournables beauté, disponibles jusqu'à épuisement des stocks ! Limité à un produit par personne.
            </p>
            <a href="/products" class="bg-[#7B1F1F] text-white px-8 py-3 rounded-full text-lg font-medium hover:bg-[#6B1A1A] transition-colors">
                PROFITEZ EN MAINTENANT
            </a>
        </div>
    </div>

    <!-- Section "Ils parlent de nous" -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Ils parlent de nous</h2>

            <div class="relative overflow-hidden" x-data="{
                activeSlide: 0,
                slides: [0, 1],
                init() {
                    setInterval(() => {
                        this.activeSlide = (this.activeSlide + 1) % 2;
                    }, 3000);
                }
            }">
                <div class="flex transition-transform duration-500 ease-in-out" :style="'transform: translateX(-' + (activeSlide * 50) + '%)'">
                    <!-- Premier groupe -->
                    <div class="flex justify-around items-center min-w-full px-4">
                        <img src="{{ asset('storage/brands/marie-claire.webp') }}" alt="Marie Claire" class="h-12">
                        <img src="{{ asset('storage/brands/cosmopolitan.webp') }}" alt="Cosmopolitan" class="h-12">
                        <img src="{{ asset('storage/brands/sephora.webp') }}" alt="Sephora" class="h-12">
                        <img src="{{ asset('storage/brands/fenty.webp') }}" alt="Fenty Beauty" class="h-12">
                    </div>
                    <!-- Deuxième groupe -->
                    <div class="flex justify-around items-center min-w-full px-4">
                        <img src="{{ asset('storage/brands/allure.webp') }}" alt="Allure" class="h-12">
                        <img src="{{ asset('storage/brands/elle.webp') }}" alt="Elle" class="h-12">
                        <img src="{{ asset('storage/brands/cosmopolitan.webp') }}" alt="Cosmopolitan" class="h-12">
                        <img src="{{ asset('storage/brands/marie-claire.webp') }}" alt="Marie Claire" class="h-12">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Nos Marques Phares -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-medium text-center mb-12">Nos Marques Phares</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Les marques seront ajoutées ici -->
            </div>
        </div>
    </div>
</div>
