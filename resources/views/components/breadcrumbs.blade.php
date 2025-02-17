@if(isset($breadcrumbs) && !$breadcrumbs->isEmpty() && Route::currentRouteName() !== 'home')
    <nav aria-label="breadcrumb" class="bg-gray-100 py-2">
        <div class="container mx-auto px-4">
            <ol class="flex flex-wrap items-center space-x-2 text-sm" vocab="https://schema.org/" typeof="BreadcrumbList">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <li property="itemListElement" typeof="ListItem" class="flex items-center text-[#7B1F1F]">
                            <a href="{{ $breadcrumb->url }}" property="item" typeof="WebPage" class="hover:text-[#5A1717]">
                                <span property="name">{{ $breadcrumb->title }}</span>
                            </a>
                            <meta property="position" content="{{ $loop->iteration }}" />
                            <svg class="h-5 w-5 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </li>
                    @else
                        <li property="itemListElement" typeof="ListItem" class="flex items-center text-gray-500">
                            <span property="item" typeof="WebPage">
                                <span property="name">{{ $breadcrumb->title }}</span>
                            </span>
                            <meta property="position" content="{{ $loop->iteration }}" />
                        </li>
                    @endif
                @endforeach
            </ol>
        </div>
    </nav>
@endif
