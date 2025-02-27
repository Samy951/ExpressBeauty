@if ($paginator->hasPages())
    <nav class="flex items-center justify-between px-4">
        <!-- Mobile navigation -->
        <div class="flex flex-1 justify-between items-center sm:hidden">
            <!-- Bouton précédent -->
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-not-allowed rounded-md opacity-50">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1">Précédent</span>
                </span>
            @else
                <button wire:click="previousPage('page')"
                        dusk="previousPage.after"
                        wire:loading.attr="disabled"
                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-[#7B1F1F] hover:border-[#7B1F1F] focus:outline-none active:bg-gray-100 active:text-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1">Précédent</span>
                </button>
            @endif

            <!-- Indication de page actuelle -->
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 rounded-md">
                Page {{ $paginator->currentPage() }} sur {{ $paginator->lastPage() }}
            </span>

            <!-- Bouton suivant -->
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage('page')"
                        dusk="nextPage.after"
                        wire:loading.attr="disabled"
                        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-[#7B1F1F] hover:border-[#7B1F1F] focus:outline-none active:bg-gray-100 active:text-gray-700">
                    <span class="mr-1">Suivant</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-not-allowed rounded-md opacity-50">
                    <span class="mr-1">Suivant</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
            @endif
        </div>

        <!-- Desktop navigation -->
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <!-- Informations sur les résultats -->
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    Affichage des résultats
                    <span class="font-medium">{{ $paginator->firstItem() ?? 0 }}</span>
                    à
                    <span class="font-medium">{{ $paginator->lastItem() ?? 0 }}</span>
                    sur
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    résultats
                </p>
            </div>

            <!-- Navigation de pagination -->
            <div>
                <span class="relative z-0 inline-flex rounded-md shadow-sm">
                    <!-- Bouton précédent -->
                    @if ($paginator->onFirstPage())
                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-not-allowed rounded-l-md leading-5 opacity-50">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @else
                        <button wire:click="previousPage('page')"
                                dusk="previousPage.after"
                                wire:loading.attr="disabled"
                                rel="prev"
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-[#7B1F1F] hover:border-[#7B1F1F] focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif

                    <!-- Numéros de pages (limités à un nombre raisonnable) -->
                    @php
                        $window = 2; // Nombre de pages à afficher avant et après la page actuelle
                    @endphp

                    <!-- Pages avant la page courante -->
                    @for ($i = max(1, $paginator->currentPage() - $window); $i < $paginator->currentPage(); $i++)
                        <button wire:click="gotoPage({{ $i }}, 'page')"
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-[#7B1F1F] hover:border-[#7B1F1F] focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-700">
                            {{ $i }}
                        </button>
                    @endfor

                    <!-- Page courante -->
                    <button class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-bold text-white bg-[#7B1F1F] border border-[#7B1F1F] leading-5" aria-current="page">
                        {{ $paginator->currentPage() }}
                    </button>

                    <!-- Pages après la page courante -->
                    @for ($i = $paginator->currentPage() + 1; $i <= min($paginator->lastPage(), $paginator->currentPage() + $window); $i++)
                        <button wire:click="gotoPage({{ $i }}, 'page')"
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-[#7B1F1F] hover:border-[#7B1F1F] focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-700">
                            {{ $i }}
                        </button>
                    @endfor

                    <!-- Bouton suivant -->
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage('page')"
                                dusk="nextPage.after"
                                wire:loading.attr="disabled"
                                rel="next"
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-[#7B1F1F] hover:border-[#7B1F1F] focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @else
                        <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-not-allowed rounded-r-md leading-5 opacity-50">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
