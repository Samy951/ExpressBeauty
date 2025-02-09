<x-layouts.app>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Contactez-nous</h1>
        <div class="bg-white rounded-lg shadow-md p-6">
            <form class="max-w-lg mx-auto">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                    <input type="text" id="name" name="name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Sujet</label>
                    <input type="text" id="subject" name="subject" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
