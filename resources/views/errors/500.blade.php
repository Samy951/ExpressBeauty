<x-layouts.app>
    <div class="flex flex-col justify-center items-center px-4 min-h-screen bg-white">
        <div class="w-full max-w-md text-center">
            <div class="mb-8">
                <img src="{{ asset('storage/showroomBeauty.svg') }}" alt="Showroom Beauty" class="h-[70px] w-[280px] mx-auto mb-2">
            </div>

            <h1 class="mb-4 text-2xl font-bold text-gray-900">Oups ! Une erreur est survenue</h1>
            <p class="mb-8 text-gray-600">Nous rencontrons actuellement des difficultés techniques. Veuillez réessayer dans quelques instants.</p>

            <div class="flex justify-center space-x-4">
                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 border border-[#7B1F1F] text-sm font-medium rounded-md text-[#7B1F1F] hover:bg-[#7B1F1F] hover:text-white transition-colors duration-200">
                    Retour
                </a>
                <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-[#7B1F1F] hover:bg-[#6B1A1A] transition-colors duration-200">
                    Page d'accueil
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
