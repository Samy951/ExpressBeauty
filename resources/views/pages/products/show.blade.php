<x-layouts.app>
    <!-- Bannière de déstockage -->
    <div class="bg-[#F5E6E0] text-[#7B1F1F] py-2 text-center">
        <p class="text-sm font-medium">Déstockage</p>
    </div>

    <div class="container px-4 py-8 mx-auto">
        <div class="mx-auto max-w-7xl">
            <!-- Fil d'Ariane -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#7B1F1F]">Accueil</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-[#7B1F1F]">Produits</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-500">{{ $product->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <!-- Colonne gauche : Carousel d'images -->
                <div x-data="{ 
                    activeSlide: 0, 
                    slides: [
                        '{{ $product->image_url }}',
                        @if(isset($product->specifications['additional_images']))
                            @foreach($product->specifications['additional_images'] as $image)
                                '{{ $image }}',
                            @endforeach
                        @endif
                    ]
                }" class="relative bg-white rounded-xl shadow-lg p-4">
                    <!-- Image principale -->
                    <div class="relative aspect-[3/4] overflow-hidden rounded-lg bg-white">
                        <template x-for="(slide, index) in slides" :key="index">
                            <div x-show="activeSlide === index" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-95"
                                 class="absolute inset-0 flex items-center justify-center">
                                <img :src="slide" 
                                     :alt="'Image ' + (index + 1)" 
                                     class="w-full h-full object-cover transform transition-transform duration-500">
                            </div>
                        </template>
                    </div>

                    <!-- Boutons de navigation -->
                    <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length" 
                            class="absolute left-6 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:bg-white hover:shadow-xl">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button @click="activeSlide = (activeSlide + 1) % slides.length" 
                            class="absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:bg-white hover:shadow-xl">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Miniatures -->
                    <div class="mt-6 flex justify-center gap-4 px-4">
                        <template x-for="(slide, index) in slides" :key="index">
                            <button @click="activeSlide = index" 
                                    :class="{'ring-2 ring-[#7B1F1F] ring-offset-2': activeSlide === index}"
                                    class="w-20 h-24 rounded-lg overflow-hidden transition-all duration-300 hover:opacity-90 focus:outline-none">
                                <img :src="slide" 
                                     :alt="'Miniature ' + (index + 1)" 
                                     class="w-full h-full object-cover">
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Colonne droite : Informations produit -->
                <div class="flex flex-col">
                    <!-- Marque -->
                    <div class="mb-4">
                        <span class="text-sm font-medium text-gray-500">{{ $product->brand }}</span>
                    </div>

                    <!-- Nom du produit -->
                    <h1 class="mb-4 text-3xl font-bold text-gray-900">{{ $product->name }}</h1>

                    <!-- Avis clients -->
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        <span class="text-sm text-gray-600">96% de nos clients recommandent ce produit (4926 Avis Clients)</span>
                    </div>

                    <!-- Prix -->
                    <div class="mb-8">
                        <div class="flex items-baseline gap-3">
                            <span class="text-4xl font-bold text-[#7B1F1F]">{{ number_format($product->promo_price, 2, ',', ' ') }} €</span>
                            <span class="text-lg text-gray-500 line-through">{{ number_format($product->original_price ?? $product->price, 2, ',', ' ') }} €</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Plus que 2 exemplaires disponibles à ce prix</p>
                    </div>

                    <!-- Bouton Commander -->
                    <a href="{{ route('checkout', $product) }}"
                       class="w-full bg-[#7B1F1F] text-white text-center py-4 rounded-lg font-semibold mb-2 hover:bg-[#7B1F1F]/90 transition-colors">
                        Commander | {{ number_format($product->promo_price, 2, ',', ' ') }} €
                    </a>

                    <!-- Carousel Avis Clients -->
                    <div x-data="{ 
                        activeReview: 0,
                        allReviews: [
                            { name: 'Anaïs J.', text: 'Produit de très bonne qualité, la livraison a été rapide. Je recommande vivement !', rating: 5, verified: true, date: '8 Février 2025', avatar: '👩🏻' },
                            { name: 'Thomas M.', text: 'Excellent rapport qualité-prix, je suis très satisfait de mon achat.', rating: 5, verified: true, date: '5 Février 2025', avatar: '👨🏼' },
                            { name: 'Sophie D.', text: 'Exactement ce que je cherchais ! Le produit correspond parfaitement à la description.', rating: 5, verified: true, date: '2 Février 2025', avatar: '👩🏽' },
                            { name: 'Laurent P.', text: 'Très satisfait de mon achat. Le service client est également très réactif.', rating: 5, verified: true, date: '30 Janvier 2025', avatar: '👨🏻' },
                            { name: 'Emma L.', text: 'Très bonne qualité de fabrication, je suis agréablement surprise !', rating: 5, verified: true, date: '28 Janvier 2025', avatar: '👩🏼' },
                            { name: 'Marie C.', text: 'Super produit, je l\'utilise tous les jours ! La qualité est au rendez-vous.', rating: 5, verified: true, date: '25 Janvier 2025', avatar: '👩🏻' },
                            { name: 'Alexandre B.', text: 'Très bon produit, quelques petits détails pourraient être améliorés.', rating: 4, verified: true, date: '22 Janvier 2025', avatar: '👨🏽' },
                            { name: 'Sarah K.', text: 'Produit conforme à mes attentes. Emballage soigné et livraison rapide.', rating: 5, verified: true, date: '20 Janvier 2025', avatar: '👩🏽' },
                            { name: 'Nicolas R.', text: 'Très satisfait de la qualité, je recommande fortement.', rating: 5, verified: true, date: '18 Janvier 2025', avatar: '👨🏼' },
                            { name: 'Julie M.', text: 'Excellent produit, je recommande à 100% !', rating: 5, verified: true, date: '15 Janvier 2025', avatar: '👩🏻' },
                            { name: 'Camille D.', text: 'Très contente de mon achat, la qualité est vraiment au rendez-vous.', rating: 5, verified: true, date: '12 Janvier 2025', avatar: '👩🏼' },
                            { name: 'Pierre L.', text: 'Bon produit dans l\'ensemble, répond bien à mes besoins.', rating: 4, verified: true, date: '10 Janvier 2025', avatar: '👨🏻' },
                            { name: 'Léa B.', text: 'Super satisfaite de mon achat, je recommande vivement !', rating: 5, verified: true, date: '8 Janvier 2025', avatar: '👩🏽' },
                            { name: 'Marc T.', text: 'Très bonne expérience d\'achat, produit de qualité.', rating: 5, verified: true, date: '5 Janvier 2025', avatar: '👨🏼' },
                            { name: 'Chloé F.', text: 'Excellent produit, conforme à la description. Je recommande !', rating: 5, verified: true, date: '2 Janvier 2025', avatar: '👩🏻' }
                        ],
                        reviews: [],
                        init() {
                            // Utiliser l'ID du produit pour générer un seed constant
                            const productId = {{ $product->id }};
                            const numReviews = 8; // Nombre d'avis à afficher par produit
                            
                            // Fonction de mélange avec seed
                            const seededShuffle = (array, seed) => {
                                let currentIndex = array.length;
                                let temporaryValue, randomIndex;
                                
                                // Créer un générateur de nombres pseudo-aléatoires basé sur le seed
                                const random = () => {
                                    seed = (seed * 9301 + 49297) % 233280;
                                    return seed / 233280;
                                };

                                while (currentIndex !== 0) {
                                    randomIndex = Math.floor(random() * currentIndex);
                                    currentIndex -= 1;
                                    temporaryValue = array[currentIndex];
                                    array[currentIndex] = array[randomIndex];
                                    array[randomIndex] = temporaryValue;
                                }

                                return array;
                            };

                            // Copier et mélanger les avis de manière déterministe
                            const shuffledReviews = seededShuffle([...this.allReviews], productId);
                            this.reviews = shuffledReviews.slice(0, numReviews);
                        }
                    }" 
                    x-init="init()"
                    class="w-full bg-white rounded-xl shadow-lg p-6 mt-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 text-center">Avis de nos clients</h3>
                        
                        <div class="relative overflow-hidden">
                            <!-- Navigation -->
                            <button @click="activeReview = (activeReview - 1 + reviews.length) % reviews.length"
                                    class="absolute left-0 top-1/2 -translate-y-1/2 w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:bg-[#7B1F1F] hover:text-white z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>

                            <!-- Avis -->
                            <div class="relative h-[180px]">
                                <template x-for="(review, index) in reviews" :key="index">
                                    <div x-show="activeReview === index"
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0 transform translate-x-full"
                                         x-transition:enter-end="opacity-100 transform translate-x-0"
                                         x-transition:leave="transition ease-in duration-300"
                                         x-transition:leave-start="opacity-100 transform translate-x-0"
                                         x-transition:leave-end="opacity-0 transform -translate-x-full"
                                         class="absolute inset-0 flex flex-col items-center justify-center px-8">
                                        <div class="mb-2 transform transition-all duration-300">
                                            <span x-text="review.avatar" class="text-3xl"></span>
                                        </div>
                                        <p class="mb-2 text-base text-gray-800 italic text-center" x-text="review.text"></p>
                                        <div class="flex flex-col items-center">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span class="font-medium text-gray-900" x-text="review.name"></span>
                                                <span x-show="review.verified" 
                                                      class="bg-green-50 text-green-700 text-xs px-2 py-0.5 rounded-full flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Vérifié
                                                </span>
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <div class="flex">
                                                    <template x-for="star in review.rating">
                                                        <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                        </svg>
                                                    </template>
                                                    <template x-for="star in (5 - review.rating)">
                                                        <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                        </svg>
                                                    </template>
                                                </div>
                                                <span class="text-xs text-gray-500" x-text="review.date"></span>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <button @click="activeReview = (activeReview + 1) % reviews.length"
                                    class="absolute right-0 top-1/2 -translate-y-1/2 w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full shadow-lg flex items-center justify-center transition-all duration-300 hover:bg-[#7B1F1F] hover:text-white z-10">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>

                            <!-- Indicateurs -->
                            <div class="flex justify-center gap-1.5 mt-2">
                                <template x-for="(review, index) in reviews" :key="index">
                                    <button @click="activeReview = index"
                                            :class="{'bg-[#7B1F1F]': activeReview === index, 'bg-gray-300': activeReview !== index}"
                                            class="w-1.5 h-1.5 rounded-full transition-all duration-300"></button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sections dépliables -->
            <div class="mt-12 space-y-2">
                <!-- Description -->
                <div x-data="{ open: false }" class="border-t border-b border-gray-200">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-base font-medium">Description</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 pb-4">
                        <p class="text-gray-600">{{ $product->description }}</p>
                    </div>
                </div>

                <!-- Livraison & Retours -->
                <div x-data="{ open: false }" class="border-b border-gray-200">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                            </svg>
                            <span class="text-base font-medium">Livraison & Retours</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 pb-4">
                        <p class="text-gray-600">Livraison express sous 24h/48h. Retours gratuits sous 30 jours.</p>
                    </div>
                </div>

                <!-- Garantie de Qualité -->
                <div x-data="{ open: false }" class="border-b border-gray-200">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            <span class="text-base font-medium">Garantie de Qualité</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 pb-4">
                        <p class="text-gray-600">Tous nos produits sont authentiques et garantis 100% originaux.</p>
                    </div>
                </div>

                <!-- Sécurité des Paiements -->
                <div x-data="{ open: false }" class="border-b border-gray-200">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <span class="text-base font-medium">Sécurité des Paiements</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="px-4 pb-4">
                        <p class="text-gray-600">Paiement 100% sécurisé par cryptage SSL. Vos données sont protégées.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
