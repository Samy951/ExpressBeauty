<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Showroom Beauty - Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits.')">
    <meta name="keywords" content="beauté, cosmétiques, Dyson, GHD, Fenty Beauty, Savage X Fenty, maquillage, soins capillaires, lingerie">
    <meta name="author" content="Showroom Beauty">
    <meta name="robots" content="index, follow">

    <!-- PWA -->
    <link rel="manifest" href="{{ asset('site.webmanifest?v=4') }}">
    <meta name="theme-color" content="#7B1F1F">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Showroom Beauty">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png?v=4') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png?v=4') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png?v=4') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico?v=4') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Showroom Beauty - Produits de Beauté')">
    <meta property="og:description" content="@yield('description', 'Showroom Beauty - Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits.')">
    <meta property="og:image" content="{{ asset('storage/og-image.jpg') }}">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="Showroom Beauty">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'Showroom Beauty - Produits de Beauté')">
    <meta name="twitter:description" content="@yield('description', 'Showroom Beauty - Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits.')">
    <meta name="twitter:image" content="{{ asset('storage/og-image.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Preconnect to required origins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- DNS Prefetch -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Schema.org markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Showroom Beauty",
        "url": "{{ config('app.url') }}",
        "logo": "{{ asset('storage/showroomBeauty.svg') }}",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+33-1-XX-XX-XX-XX",
            "contactType": "customer service",
            "availableLanguage": "French"
        },
        "sameAs": [
            "https://www.facebook.com/showroombeauty",
            "https://www.instagram.com/showroombeauty",
            "https://www.tiktok.com/@showroombeauty"
        ]
    }
    </script>

    <title>@yield('title', 'Showroom Beauty - Produits de Beauté')</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- TikTok Pixel Code Start -->
    <script>
    !function (w, d, t) {
      w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script");n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};

      ttq.load('CUMBMTJC77U4QKJNCVI0');
      ttq.page();
    }(window, document, 'ttq');

    // Fonction helper sécurisée pour le tracking TikTok
    function trackTikTok(event, data) {
        if (typeof ttq !== 'undefined' && ttq.track) {
            console.log('Tracking event:', event, data);
            ttq.track(event, data);
        } else {
            console.warn('TikTok pixel not initialized');
        }
    }
    </script>
    <!-- TikTok Pixel Code End -->
</head>
<body class="bg-white" x-data="{ mobileMenuOpen: false }">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="flex justify-between h-16">
                <!-- Logo et Navigation principale -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center justify-start">
                        <a href="/" class="block">
                            <img src="{{ asset('storage/showroomBeauty.svg') }}" alt="Showroom Beauty" class="h-[45px] w-[160px] md:h-[57px] md:w-[193px]">
                        </a>
                    </div>
                    <div class="hidden space-x-8 md:flex md:ml-10">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-[#7B1F1F]' : '' }}">Accueil</a>
                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#7B1F1F]">
                                Nos Produits
                                <svg class="w-4 h-4 ml-2 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute left-0 z-10 w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    <a href="{{ route('products.category.makeup') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Maquillage</a>
                                    <a href="{{ route('products.category.hair') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Coiffure</a>
                                    <a href="{{ route('products.category.lingerie') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Lingerie</a>
                                    <div class="my-1 border-t border-gray-100"></div>
                                    <a href="{{ route('products.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir tous les produits</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#7B1F1F]">
                                Nos Marques
                                <svg class="w-4 h-4 ml-2 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute left-0 z-10 w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                <div class="py-1">
                                    <a href="{{ route('brands.dyson') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Dyson</a>
                                    <a href="{{ route('brands.ghd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">GHD</a>
                                    <a href="{{ route('brands.fenty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Savage X Fenty</a>
                                    <a href="{{ route('brands.fenty-beauty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Fenty Beauty</a>
                                    <div class="my-1 border-t border-gray-100"></div>
                                    <a href="{{ route('brands.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir toutes les marques</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-[#7B1F1F]' : '' }}">À Propos</a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('contact') ? 'text-[#7B1F1F]' : '' }}">Contact</a>
                        <a href="{{ route('order.tracking') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('order.tracking') ? 'text-[#7B1F1F]' : '' }}">Suivre ma commande</a>
                    </div>
                </div>

                <!-- Menu mobile -->
                <div class="flex items-center md:hidden">
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 hover:text-[#7B1F1F]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile (caché par défaut) -->
        <div class="md:hidden" x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
            <div class="px-2 pt-2 pb-3 space-y-1" x-data="{ productsOpen: false, brandsOpen: false }">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('home') ? 'text-[#7B1F1F]' : '' }}">Accueil</a>

                <!-- Menu Produits -->
                <div class="relative">
                    <button @click="productsOpen = !productsOpen" class="flex justify-between items-center w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">
                        <span>Nos Produits</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': productsOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="productsOpen"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="pl-4">
                        <a href="{{ route('products.category.makeup') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Maquillage</a>
                        <a href="{{ route('products.category.hair') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Coiffure</a>
                        <a href="{{ route('products.category.lingerie') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Lingerie</a>
                        <a href="{{ route('products.index') }}" class="block px-3 py-2 text-base font-medium text-[#7B1F1F] hover:text-white hover:bg-[#7B1F1F]">Voir tous les produits</a>
                    </div>
                </div>

                <!-- Menu Marques -->
                <div class="relative">
                    <button @click="brandsOpen = !brandsOpen" class="flex justify-between items-center w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">
                        <span>Nos Marques</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': brandsOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="brandsOpen"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="pl-4">
                        <a href="{{ route('brands.dyson') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Dyson</a>
                        <a href="{{ route('brands.ghd') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">GHD</a>
                        <a href="{{ route('brands.fenty') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Savage X Fenty</a>
                        <a href="{{ route('brands.fenty-beauty') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Fenty Beauty</a>
                        <a href="{{ route('brands.index') }}" class="block px-3 py-2 text-base font-medium text-[#7B1F1F] hover:text-white hover:bg-[#7B1F1F]">Voir toutes les marques</a>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('about') ? 'text-[#7B1F1F]' : '' }}">À Propos</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('contact') ? 'text-[#7B1F1F]' : '' }}">Contact</a>
                <a href="{{ route('order.tracking') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50 {{ request()->routeIs('order.tracking') ? 'text-[#7B1F1F]' : '' }}">Suivre ma commande</a>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="py-6 bg-gradient-to-br from-[#7B1F1F] to-[#5A1717] text-white shadow-lg">
        <div class="px-4 mx-auto max-w-7xl">
            <div class="grid gap-8 md:grid-cols-4">
                <div>
                    <h3 class="mb-4 text-lg font-semibold">Informations légales</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('legal.mentions') }}" class="text-gray-200 hover:text-white">Mentions légales</a></li>
                        <li><a href="{{ route('legal.privacy') }}" class="text-gray-200 hover:text-white">Politique de confidentialité</a></li>
                        <li><a href="{{ route('legal.cgv') }}" class="text-gray-200 hover:text-white">Conditions générales de vente</a></li>
                        <li><a href="{{ route('legal.terms') }}" class="text-gray-200 hover:text-white">Terms & Conditions</a></li>
                        <li><a href="{{ route('legal.refund') }}" class="text-gray-200 hover:text-white">Politique de remboursement</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-semibold">Nos Marques</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.brand.dyson') }}" class="text-gray-200 hover:text-white">Dyson</a></li>
                        <li><a href="{{ route('products.brand.ghd') }}" class="text-gray-200 hover:text-white">GHD</a></li>
                        <li><a href="{{ route('products.brand.fenty') }}" class="text-gray-200 hover:text-white">Savage X Fenty</a></li>
                        <li><a href="{{ route('products.brand.fenty-beauty') }}" class="text-gray-200 hover:text-white">Fenty Beauty</a></li>
                        <li><a href="{{ route('brands.index') }}" class="font-medium text-gray-200 hover:text-white">Voir toutes les marques</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-semibold">Catégories</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.category.makeup') }}" class="text-gray-200 hover:text-white">Maquillage</a></li>
                        <li><a href="{{ route('products.category.hair') }}" class="text-gray-200 hover:text-white">Coiffure</a></li>
                        <li><a href="{{ route('products.category.lingerie') }}" class="text-gray-200 hover:text-white">Lingerie</a></li>
                        <li><a href="{{ route('products.index') }}" class="font-medium text-gray-200 hover:text-white">Voir tous les produits</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 text-lg font-semibold">Contact</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('contact') }}" class="text-gray-200 hover:text-white">Nous Contacter</a></li>
                        <li><a href="{{ route('faq') }}" class="text-gray-200 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 mt-8 border-t border-gray-100/20">
                <p class="text-center text-gray-200">&copy; {{ date('Y') }} Showroom Beauty. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
