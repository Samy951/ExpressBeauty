<x-layouts.app>
    <!-- Bannière de la marque -->
    <div class="relative h-[400px] overflow-hidden">
        <div class="absolute inset-0 bg-gray-900">
            <img src="{{ asset($brandInfo['image']) }}"
                 alt="{{ $brandInfo['name'] }}"
                 class="w-full h-full object-cover opacity-20">
        </div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-8 inline-block mb-6">
                    <img src="{{ asset($brandInfo['image']) }}"
                         alt="{{ $brandInfo['name'] }}"
                         class="h-32 object-contain">
                </div>
                <h1 class="text-5xl font-bold mb-4">{{ $brandInfo['name'] }}</h1>
                <p class="text-xl max-w-2xl mx-auto text-gray-200">{{ $brandInfo['description'] }}</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        <!-- Filtres pour Korean Beauty -->
        @if($brand === 'Korean Beauty')
        <div class="mb-8">
            <form x-data="{
                brand: '{{ request('brand') }}',
                isLoading: false,
                updateFilters() {
                    this.isLoading = true;
                    const url = new URL(window.location);

                    // Nettoyer les paramètres existants
                    url.searchParams.delete('page');

                    // Ajouter uniquement les paramètres non vides
                    if (this.brand) url.searchParams.set('brand', this.brand);
                    else url.searchParams.delete('brand');

                    // Rediriger vers la nouvelle URL
                    window.location = url.toString();
                }
            }"
            method="GET"
            class="flex justify-center"
            @submit.prevent="updateFilters()">
                <select
                    x-model="brand"
                    @change="updateFilters()"
                    class="w-full px-6 py-2.5 border rounded-full border-gray-300 focus:outline-none focus:border-[#7B1F1F] md:w-[250px] appearance-none bg-white text-gray-700 font-medium shadow-sm hover:border-[#7B1F1F] transition-colors duration-200 pr-12"
                    :disabled="isLoading">
                    <option value="">Toutes les marques</option>
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
            </form>
        </div>
        @endif

        <!-- Nombre de produits -->
        <div class="text-center mb-12">
            <p class="text-gray-600 text-lg">{{ $products->total() }} produits trouvés</p>
        </div>

        <!-- Grille de produits -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8">
            @foreach($products as $product)
            <div class="group">
                <div class="relative bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 h-[400px] flex flex-col">
                    <a href="{{ route('products.show', $product->id) }}"
                       @click="ttq.track('ClickProduct', {
                           content_type: 'product',
                           content_id: '{{ $product->id }}',
                           content_name: '{{ $product->name }}',
                           content_category: '{{ $product->category }}',
                           currency: 'EUR',
                           price: {{ $product->promo_price }},
                           value: {{ $product->promo_price }},
                           brand: '{{ $product->brand }}'
                       })"
                       class="flex flex-col h-full">
                        <!-- Image du produit -->
                        <div class="relative w-full h-[250px]">
                            <img src="{{ $product->image_url }}"
                                 alt="{{ $product->name }}"
                                 class="absolute inset-0 w-full h-full {{ $brandInfo['name'] === 'Dyson' ? 'object-contain' : 'object-cover' }} object-center rounded-t-lg">
                        </div>

                        <!-- Badge de marque -->
                        <div class="absolute top-2 left-2">
                            <a href="{{ route('brands.korean-beauty', ['brand' => $product->brand]) }}"
                               class="block hover:shadow-md transition-shadow duration-200">
                                <span class="bg-[#7B1F1F] text-white px-3 py-1 text-xs font-medium rounded-full inline-block">
                                    {{ $product->brand }}
                                </span>
                            </a>
                        </div>

                        <!-- Infos produit -->
                        <div class="p-4 flex flex-col justify-between flex-grow">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">{{ $product->name }}</h3>
                            <div class="mt-2 flex flex-col">
                                <div class="flex items-center justify-between">
                                    <!-- Prix -->
                                    <div class="flex flex-col items-end">
                                        <p class="text-lg font-bold text-[#7B1F1F]">{{ number_format($product->promo_price, 2, ',', ' ') }} €</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
    </div>
</x-layouts.app>
