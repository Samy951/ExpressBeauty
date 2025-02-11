@section('title', 'Politique de confidentialité - ExpressBeauty')

<x-layouts.app>
    <!-- En-tête avec fond dégradé -->
    <div class="bg-gradient-to-br from-[#7B1F1F] to-[#5A1717] text-white py-16">
        <div class="container px-4 mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Politique de confidentialité</h1>
            <p class="text-lg text-gray-200 max-w-2xl mx-auto">Comment nous protégeons et utilisons vos données personnelles</p>
        </div>
    </div>

    <div class="bg-white">
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <div class="prose prose-lg max-w-none">
                    <div class="p-6 mb-8 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-gray-600">ExpressBeauty ("nous", "notre" ou "nos") exploite le site web expressbeauty.fr (le "Service"). Cette page vous informe de nos politiques concernant la collecte, l'utilisation et la divulgation des données personnelles lorsque vous utilisez notre Service.</p>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                            <h2 class="text-xl font-semibold mb-4 text-[#7B1F1F]">DÉFINITIONS</h2>
                            <ul class="pl-6 mb-6 list-disc space-y-2">
                                <li><strong>SERVICE</strong> : Le site web expressbeauty.fr exploité par ExpressBeauty.</li>
                                <li><strong>DONNÉES PERSONNELLES</strong> : Informations concernant une personne physique identifiable.</li>
                                <li><strong>DONNÉES D'UTILISATION</strong> : Données collectées automatiquement lors de l'utilisation du Service.</li>
                                <li><strong>COOKIES</strong> : Petits fichiers stockés sur votre appareil.</li>
                            </ul>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                            <h2 class="text-xl font-semibold mb-4 text-[#7B1F1F]">COOKIES QUE NOUS UTILISONS</h2>
                            <ul class="pl-6 mb-6 list-disc space-y-2">
                                <li><strong>XSRF-TOKEN</strong> : Cookie de protection CSRF pour la sécurité du site.</li>
                                <li><strong>expressbeauty_session</strong> : Identifiant unique de session.</li>
                                <li><strong>remember_web</strong> : Cookie de connexion persistante.</li>
                                <li><strong>locale</strong> : Préférences de langue.</li>
                                <li><strong>cart_items</strong> : Stockage temporaire des articles du panier.</li>
                            </ul>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                            <h2 class="text-xl font-semibold mb-4 text-[#7B1F1F]">UTILISATION DES DONNÉES</h2>
                            <p class="mb-4">ExpressBeauty utilise les données collectées pour :</p>
                            <ul class="pl-6 mb-6 list-disc space-y-2">
                                <li>Fournir et maintenir notre Service</li>
                                <li>Vous informer des changements de notre Service</li>
                                <li>Vous permettre de participer aux fonctionnalités interactives</li>
                                <li>Fournir un support client</li>
                                <li>Analyser et améliorer notre Service</li>
                                <li>Surveiller l'utilisation du Service</li>
                                <li>Détecter et prévenir les problèmes techniques</li>
                            </ul>
                        </div>

                        <div class="bg-[#7B1F1F] text-white p-6 rounded-xl shadow-sm">
                            <h2 class="text-xl font-semibold mb-4">CONTACT</h2>
                            <p class="mb-4">Pour toute question concernant cette Politique de confidentialité, veuillez nous contacter :</p>
                            <ul class="pl-6 list-disc space-y-2">
                                <li>Email : contact@expressbeauty.fr</li>
                                <li>Téléphone : +33 (0)1 XX XX XX XX</li>
                                <li>Adresse : 123 Avenue des Champs-Élysées, 75008 Paris</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
