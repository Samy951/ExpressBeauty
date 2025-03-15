<x-layouts.app>
    <div class="bg-white">
        <!-- En-tête de la page -->
        <div class="bg-[#7B1F1F] text-white py-8">
            <div class="container px-4 mx-auto">
                <h1 class="text-4xl font-bold text-center">Nos Produits</h1>
                <p class="mt-2 text-center text-gray-200">Découvrez notre sélection de produits de beauté haut de gamme</p>
            </div>
        </div>

        <!-- Filtres et tri -->
        <form x-data="{
            brand: '{{ request('brand') }}',
            category: '{{ request('category') }}',
            sort: '{{ request('sort', 'created_at') }}',
            isLoading: false,
            updateFilters() {
                this.isLoading = true;
                const url = new URL(window.location);

                // Nettoyer les paramètres existants
                url.searchParams.delete('page');

                // Ajouter uniquement les paramètres non vides
                if (this.brand) url.searchParams.set('brand', this.brand);
                else url.searchParams.delete('brand');

                if (this.category) url.searchParams.set('category', this.category);
                else url.searchParams.delete('category');

                if (this.sort) url.searchParams.set('sort', this.sort);
                else url.searchParams.delete('sort');

                // Rediriger vers la nouvelle URL
                window.location = url.toString();
            }
        }"
        method="GET"
        action="{{ route('products.index') }}"
        class="container px-4 py-6 mx-auto"
        @submit.prevent="updateFilters()">
            <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0 md:items-start">
                <!-- Filtres de marque et catégorie -->
                <div class="flex flex-col w-full space-y-2 md:flex-row md:space-y-0 md:space-x-4 md:w-auto">
                    <select
                        x-model="brand"
                        @change="updateFilters()"
                        class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12"
                        :disabled="isLoading">
                        <option value="">Toutes les marques</option>
                        <option value="Dyson">Dyson</option>
                        <option value="GHD">GHD</option>
                        <option value="Savage X Fenty">Savage X Fenty</option>
                        <option value="Fenty Beauty">Fenty Beauty</option>
                        <option value="ACWELL">ACWELL</option>
                        <option value="ABOUT ME">ABOUT ME</option>
                        <option value="Abib">Abib</option>
                        <option value="AMUSE">AMUSE</option>
                        <option value="APLB">APLB</option>
                        <option value="Anua">Anua</option>
                        <option value="Apieu">Apieu</option>
                        <option value="Aromatica">Aromatica</option>
                        <option value="ATOPALM">ATOPALM</option>
                        <option value="Atrue">Atrue</option>
                        <option value="AXIS-Y">AXIS-Y</option>
                        <option value="B_LAB">B_LAB</option>
                        <option value="Banila co">Banila co</option>
                        <option value="Barr Cosmetics">Barr Cosmetics</option>
                        <option value="Barulab">Barulab</option>
                        <option value="Be The Skin">Be The Skin</option>
                        <option value="Beauty of Joseon">Beauty of Joseon</option>
                        <option value="BEIGIC">BEIGIC</option>
                        <option value="Belif">Belif</option>
                        <option value="Benton">Benton</option>
                        <option value="beplain">beplain</option>
                        <option value="Biodance">Biodance</option>
                        <option value="Black Rouge">Black Rouge</option>
                        <option value="Blithe">Blithe</option>
                        <option value="Bonajour">Bonajour</option>
                        <option value="By Wishtrend">By Wishtrend</option>
                        <option value="Celimax">Celimax</option>
                        <option value="COSRX">COSRX</option>
                        <option value="Coxir">Coxir</option>
                        <option value="d'Alba">d'Alba</option>
                        <option value="Dasique">Dasique</option>
                        <option value="Dewytree">Dewytree</option>
                        <option value="Dr. Althea">Dr. Althea</option>
                        <option value="Dr.Ceuracle">Dr.Ceuracle</option>
                        <option value="Dr.Jart+">Dr.Jart+</option>
                        <option value="Dr.Melaxin">Dr.Melaxin</option>
                        <option value="Elizavecca">Elizavecca</option>
                        <option value="Etude House">Etude House</option>
                        <option value="Farm Stay">Farm Stay</option>
                        <option value="G9SKIN">G9SKIN</option>
                        <option value="Goodal">Goodal</option>
                        <option value="Hamel">Hamel</option>
                        <option value="Haruharu WONDER">Haruharu WONDER</option>
                        <option value="Heimish">Heimish</option>
                        <option value="Holika Holika">Holika Holika</option>
                        <option value="House of Hur">House of Hur</option>
                        <option value="HYGGEE">HYGGEE</option>
                        <option value="I DEW CARE">I DEW CARE</option>
                        <option value="I'm From">I'm From</option>
                        <option value="Ilso">Ilso</option>
                        <option value="Innisfree">Innisfree</option>
                        <option value="Isntree">Isntree</option>
                        <option value="iSOi">iSOi</option>
                        <option value="It'S SKIN">It'S SKIN</option>
                        <option value="IUNIK">IUNIK</option>
                        <option value="Izeze">Izeze</option>
                        <option value="JAYJUN">JAYJUN</option>
                        <option value="Jumiso">Jumiso</option>
                        <option value="KAHI">KAHI</option>
                        <option value="KAINE">KAINE</option>
                        <option value="Klairs">Klairs</option>
                        <option value="Klavuu">Klavuu</option>
                        <option value="KUNDAL">KUNDAL</option>
                        <option value="Lador">Lador</option>
                        <option value="Lagom">Lagom</option>
                        <option value="Laka">Laka</option>
                        <option value="Laneige">Laneige</option>
                        <option value="Make P:rem">Make P:rem</option>
                        <option value="MARY & MAY">MARY & MAY</option>
                        <option value="Mediheal">Mediheal</option>
                        <option value="Medicube">Medicube</option>
                        <option value="Melixir">Melixir</option>
                        <option value="MIGUHARA">MIGUHARA</option>
                        <option value="Missha">Missha</option>
                        <option value="MIXSOON">MIXSOON</option>
                        <option value="Mizon">Mizon</option>
                        <option value="NACIFIC">NACIFIC</option>
                        <option value="NARD">NARD</option>
                        <option value="Nature Republic">Nature Republic</option>
                        <option value="Needly">Needly</option>
                        <option value="NEOGEN">NEOGEN</option>
                        <option value="Neos:lab">Neos:lab</option>
                        <option value="Nine Less">Nine Less</option>
                        <option value="Numbuzin">Numbuzin</option>
                        <option value="Nuse">Nuse</option>
                        <option value="Ohora">Ohora</option>
                        <option value="ONE THING">ONE THING</option>
                        <option value="Ongredients">Ongredients</option>
                        <option value="Petitfee">Petitfee</option>
                        <option value="Peripera">Peripera</option>
                        <option value="Purito SEOUL">Purito SEOUL</option>
                        <option value="Pyunkang Yul">Pyunkang Yul</option>
                        <option value="Real Barrier">Real Barrier</option>
                        <option value="RNW">RNW</option>
                        <option value="Romand">Romand</option>
                        <option value="ROUND LAB">ROUND LAB</option>
                        <option value="ROVECTIN">ROVECTIN</option>
                        <option value="S.NATURE">S.NATURE</option>
                        <option value="Secret Key">Secret Key</option>
                        <option value="SERUMKIND">SERUMKIND</option>
                        <option value="SKIN & LAB">SKIN & LAB</option>
                        <option value="SKIN1004">SKIN1004</option>
                        <option value="Skinfood">Skinfood</option>
                        <option value="SNP">SNP</option>
                        <option value="Some By Mi">Some By Mi</option>
                        <option value="Son & Park">Son & Park</option>
                        <option value="The Plant Base">The Plant Base</option>
                        <option value="The SKIN HOUSE">The SKIN HOUSE</option>
                        <option value="Thank You Farmer">Thank You Farmer</option>
                        <option value="TFIT">TFIT</option>
                        <option value="TIA'M">TIA'M</option>
                        <option value="TirTir">TirTir</option>
                        <option value="TOCOBO">TOCOBO</option>
                        <option value="Tonymoly">Tonymoly</option>
                        <option value="Torriden">Torriden</option>
                        <option value="Touch in Sol">Touch in Sol</option>
                        <option value="Ultru">Ultru</option>
                        <option value="Unleashia">Unleashia</option>
                        <option value="VT Cosmetics">VT Cosmetics</option>
                        <option value="W.DRESSROOM">W.DRESSROOM</option>
                        <option value="Yadah">Yadah</option>
                        <option value="9wishes">9wishes</option>
                    </select>
                    <select
                        x-model="category"
                        @change="updateFilters()"
                        class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12"
                        :disabled="isLoading">
                        <option value="">Toutes les catégories</option>
                        <option value="makeup">Maquillage</option>
                        <option value="hair">Soins Capillaires</option>
                        <option value="lingerie">Lingerie</option>
                        <option value="skincare">Skin Care</option>
                    </select>

                    <!-- Champ de recherche -->
                    <div class="relative w-full md:w-[250px]">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Rechercher un produit..."
                            class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200"
                            :disabled="isLoading"
                            @keydown.enter="updateFilters()">
                        @if(request('search'))
                            <a href="{{ url()->current() }}" class="absolute right-4 top-1/2 text-gray-400 transform -translate-y-1/2 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Tri -->
                <div class="flex items-center w-full md:w-auto">
                    <select
                        x-model="sort"
                        @change="updateFilters()"
                        class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12"
                        :disabled="isLoading">
                        <option value="created_at">Plus récents</option>
                        <option value="price-asc">Prix croissant</option>
                        <option value="price-desc">Prix décroissant</option>
                        <option value="name-asc">Nom A-Z</option>
                        <option value="name-desc">Nom Z-A</option>
                    </select>
                </div>
            </div>

            <!-- Indicateur de chargement -->
            <div x-show="isLoading" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-30">
                <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-xl">
                    <svg class="w-10 h-10 text-[#7B1F1F] animate-spin mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="font-medium text-gray-800">Chargement des produits...</p>
                </div>
            </div>
        </form>

        <!-- Grille de produits -->
        <div class="container px-4 py-8 mx-auto">
            <div class="grid grid-cols-2 gap-4 sm:gap-6 md:grid-cols-3 lg:grid-cols-4">
                @foreach($products as $product)
                <div class="w-full group">
                    <div class="relative bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 h-[400px] flex flex-col">
                        <a href="{{ route('products.show', $product->id) }}"
                           onclick="try { ttq.track('ClickProduct', {
                               content_type: 'product',
                               content_id: {{ $product->id }},
                               content_name: '{{ addslashes($product->name) }}',
                               content_category: '{{ addslashes($product->category) }}',
                               currency: 'EUR',
                               price: {{ $product->promo_price }},
                               value: {{ $product->promo_price }},
                               brand: '{{ addslashes($product->brand) }}'
                           }); } catch(e) { console.error('TikTok tracking error:', e); } return true;"
                           class="flex flex-col h-full">
                            <!-- Image du produit avec dimensions fixes -->
                            <div class="relative w-full h-[250px]">
                                <img src="{{ $product->image_url }}"
                                     alt="{{ $product->name }}"
                                     class="absolute inset-0 w-full h-full {{ $product->brand === 'Dyson' ? 'object-contain' : 'object-cover' }} object-center transition-opacity rounded-t-lg group-hover:opacity-75"
                                     loading="lazy">
                            </div>
                            <!-- Badge de marque -->
                            <div class="absolute z-10 top-2 left-2">
                                <span class="bg-[#7B1F1F] text-white px-3 py-1 text-xs font-medium rounded-full">
                                    {{ $product->brand }}
                                </span>
                            </div>
                            <!-- Infos produit -->
                            <div class="flex flex-col justify-between flex-grow p-4">
                                <h3 class="mb-2 text-sm font-medium text-gray-900 line-clamp-2">{{ $product->name }}</h3>
                                <div class="flex items-center justify-between">
                                    <!-- Prix -->
                                    <div class="flex flex-col items-end">
                                        <p class="text-lg font-bold text-[#7B1F1F]">{{ number_format($product->promo_price, 2, ',', ' ') }} €</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <!-- Script pour gérer la pagination -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intercepter les clics sur les liens de pagination
            document.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Afficher l'indicateur de chargement
                    const loadingIndicator = document.createElement('div');
                    loadingIndicator.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-30';
                    loadingIndicator.innerHTML = `
                        <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-xl">
                            <svg class="w-10 h-10 text-[#7B1F1F] animate-spin mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <p class="font-medium text-gray-800">Chargement de la page...</p>
                        </div>
                    `;
                    document.body.appendChild(loadingIndicator);

                    // Rediriger vers la page demandée
                    window.location.href = this.href;
                });
            });
        });
    </script>
</x-layouts.app>
