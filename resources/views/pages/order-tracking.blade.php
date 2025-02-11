<x-layouts.app>
    <!-- Bannière -->
    <div class="bg-[#7B1F1F] text-white py-8">
        <div class="container px-4 mx-auto">
            <h1 class="text-4xl font-bold text-center">Suivre ma commande</h1>
            <p class="mt-2 text-center text-gray-200">Entrez votre numéro de commande et votre email pour voir l'état actuel de votre commande.</p>
        </div>
    </div>

    <div class="container px-4 py-12 mx-auto">
        <div class="max-w-2xl mx-auto">
            <!-- Formulaire de suivi -->
            <div class="p-8 bg-white rounded-lg shadow-lg">
                <h2 class="mb-6 text-2xl font-bold text-gray-900">Informations de suivi</h2>
                <p class="mb-6 text-gray-600">Veuillez fournir les détails de votre commande</p>

                <form class="space-y-6">
                    <div>
                        <label for="order_number" class="block mb-2 text-sm font-medium text-gray-700">Numéro de commande</label>
                        <input type="text"
                               id="order_number"
                               name="order_number"
                               placeholder="Ex: VB12345"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7B1F1F] focus:border-transparent">
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Adresse email</label>
                        <input type="email"
                               id="email"
                               name="email"
                               placeholder="votre@email.com"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7B1F1F] focus:border-transparent">
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                                class="px-8 py-3 text-white transition-colors duration-300 rounded-lg bg-[#7B1F1F] hover:bg-[#6B1A1A] focus:outline-none focus:ring-2 focus:ring-[#7B1F1F] focus:ring-offset-2">
                            Suivre ma commande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
