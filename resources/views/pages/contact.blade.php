<x-layouts.app>
    <!-- Bannière -->
    <div class="bg-[#7B1F1F] text-white py-8">
        <div class="container px-4 mx-auto">
            <h1 class="text-4xl font-bold text-center">Contactez-nous</h1>
            <p class="mt-2 text-center text-gray-200">Notre équipe est à votre écoute pour répondre à toutes vos questions</p>
        </div>
    </div>

    <div class="container px-4 py-12 mx-auto">
        <div class="max-w-5xl mx-auto">
            <!-- Informations de contact -->
            <div class="grid grid-cols-1 gap-4 mb-12 md:grid-cols-2 md:gap-8">
                <div class="p-6 text-center transition-shadow duration-300 rounded-lg shadow-md bg-gray-50 hover:shadow-lg">
                    <div class="inline-flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-[#7B1F1F]/10">
                        <svg class="w-6 h-6 text-[#7B1F1F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold text-gray-900">Contactez-nous par email</h3>
                    <p class="mb-4 text-gray-600">Nous vous répondrons dans les plus brefs délais</p>
                    <a href="mailto:contact@showroombeauty.fr" class="inline-block text-[#7B1F1F] hover:text-[#6B1A1A] font-medium">contact@showroombeauty.fr</a>
                </div>

                <div class="p-6 text-center transition-shadow duration-300 rounded-lg shadow-md bg-gray-50 hover:shadow-lg">
                    <div class="inline-flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-[#7B1F1F]/10">
                        <svg class="w-6 h-6 text-[#7B1F1F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold text-gray-900">Service client disponible</h3>
                    <p class="mb-4 text-gray-600">Notre équipe est à votre disposition</p>
                    <p class="font-medium text-[#7B1F1F]">24h/24, 7j/7</p>
                </div>
            </div>

            <!-- Formulaire de contact -->
            <div class="p-6 bg-white rounded-lg shadow-lg md:p-8">
                <h2 class="mb-6 text-2xl font-bold text-center text-gray-900 md:text-left">Envoyez-nous un message</h2>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nom</label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7B1F1F] focus:border-transparent">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7B1F1F] focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-700">Sujet</label>
                        <input type="text"
                               id="subject"
                               name="subject"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7B1F1F] focus:border-transparent">
                    </div>

                    <div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-700">Message</label>
                        <textarea id="message"
                                  name="message"
                                  rows="6"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7B1F1F] focus:border-transparent resize-none"></textarea>
                    </div>

                    <div class="flex justify-center md:justify-end">
                        <button type="submit"
                                class="w-full px-8 py-3 text-white transition-colors duration-300 rounded-lg md:w-auto bg-[#7B1F1F] hover:bg-[#6B1A1A] focus:outline-none focus:ring-2 focus:ring-[#7B1F1F] focus:ring-offset-2">
                            Envoyer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
