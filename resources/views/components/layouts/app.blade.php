<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="2EN0SajTcMlpMKWh5gO_qYE9G5UxDTk0YG" />
    <meta name="description" content="@yield('description', 'Showroom Beauty - Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits. Livraison rapide en France 🇫🇷. Produits 100% authentiques garantis.')">
    <meta name="keywords" content="beauté, cosmétiques, Dyson, GHD, Fenty Beauty, Savage X Fenty, maquillage, soins capillaires, lingerie, produits de beauté, beauté en ligne, cosmétiques en ligne, beauté france, produits de luxe, marques de luxe">
    <meta name="author" content="Showroom Beauty">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="fr">
    <meta name="geo.region" content="FR">
    <meta name="geo.placename" content="France">
    <meta name="format-detection" content="telephone=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Showroom Beauty">
    <meta name="application-name" content="Showroom Beauty">
    <meta name="msapplication-TileColor" content="#7B1F1F">
    <meta name="theme-color" content="#7B1F1F">

    <!-- Security Headers -->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">

    <!-- PWA -->
    <link rel="manifest" href="{{ asset('site.webmanifest?v=5') }}">
    <meta name="theme-color" content="#7B1F1F">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Showroom Beauty">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png?v=5') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png?v=5') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png?v=5') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico?v=5') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Showroom Beauty - Votre Destination Beauté de Luxe en France')">
    <meta property="og:description" content="@yield('description', 'Showroom Beauty - Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits. Livraison rapide en France.')">
    <meta property="og:image" content="{{ asset('storage/og-image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="Showroom Beauty">
    <meta property="og:price:currency" content="EUR">
    <meta property="og:price:amount" content="@yield('product_price', '')">
    <meta property="og:availability" content="@yield('product_availability', 'instock')">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ShowroomBeauty">
    <meta name="twitter:creator" content="@ShowroomBeauty">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'Showroom Beauty - Votre Destination Beauté de Luxe en France')">
    <meta name="twitter:description" content="@yield('description', 'Showroom Beauty - Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits.')">
    <meta name="twitter:image" content="{{ asset('storage/og-image.jpg') }}">
    <meta name="twitter:image:alt" content="Showroom Beauty - Produits de beauté de luxe">
    <meta name="twitter:label1" content="Prix en EUR">
    <meta name="twitter:data1" content="@yield('product_price', 'À partir de 29€')">

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
        "image": "{{ asset('storage/og-image.jpg') }}",
        "description": "Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits.",
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "customer service",
            "availableLanguage": ["French"],
            "areaServed": "FR"
        },
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "France"
        },
        "sameAs": [
            "https://www.facebook.com/showroombeauty",
            "https://www.instagram.com/showroombeauty",
            "https://www.tiktok.com/@showroombeauty"
        ]
    }
    </script>

    <!-- Schema.org FAQ Markup -->
    @if(request()->routeIs('home'))
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "Comment sont garantis les produits Showroom Beauty ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Tous nos produits sont 100% authentiques et garantis. Nous travaillons directement avec les marques officielles comme Dyson, GHD, Fenty Beauty et Savage X Fenty."
            }
        }, {
            "@type": "Question",
            "name": "Quels sont les délais de livraison ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Nous livrons partout en France métropolitaine sous 2-3 jours ouvrés. La livraison est gratuite pour toute commande supérieure à 49€."
            }
        }, {
            "@type": "Question",
            "name": "Quelle est la politique de retour ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Vous disposez de 14 jours pour retourner votre produit dans son emballage d'origine. Les frais de retour sont gratuits."
            }
        }, {
            "@type": "Question",
            "name": "Les produits sont-ils moins chers que dans les boutiques officielles ?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Oui, nous proposons des prix réduits sur toute notre gamme de produits grâce à nos partenariats directs avec les marques."
            }
        }]
    }
    </script>
    @endif

    <!-- Schema.org markup pour la page produit -->
    @if(request()->routeIs('products.show') && isset($product))
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "{{ $product->name ?? '' }}",
        "description": "{{ $product->description ?? '' }}",
        "image": "{{ $product->image_url ?? '' }}",
        "sku": "{{ $product->sku ?? '' }}",
        "mpn": "{{ $product->reference ?? '' }}",
        "brand": {
            "@type": "Brand",
            "name": "{{ $product->brand->name ?? '' }}"
        },
        "offers": {
            "@type": "Offer",
            "priceCurrency": "EUR",
            "price": "{{ $product->price ?? '' }}",
            "priceValidUntil": "{{ now()->addMonths(1)->format('Y-m-d') }}",
            "availability": "{{ $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}",
            "seller": {
                "@type": "Organization",
                "name": "Showroom Beauty"
            },
            "shippingDetails": {
                "@type": "OfferShippingDetails",
                "shippingRate": {
                    "@type": "MonetaryAmount",
                    "value": "{{ $product->price >= 49 ? '0' : '4.90' }}",
                    "currency": "EUR"
                },
                "shippingDestination": {
                    "@type": "DefinedRegion",
                    "addressCountry": "FR"
                },
                "deliveryTime": {
                    "@type": "ShippingDeliveryTime",
                    "handlingTime": {
                        "@type": "QuantitativeValue",
                        "minValue": "1",
                        "maxValue": "2",
                        "unitCode": "DAY"
                    },
                    "transitTime": {
                        "@type": "QuantitativeValue",
                        "minValue": "1",
                        "maxValue": "3",
                        "unitCode": "DAY"
                    }
                }
            }
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "{{ $product->average_rating ?? '4.8' }}",
            "reviewCount": "{{ $product->reviews_count ?? '0' }}"
        }
    }
    </script>
    @endif

    <!-- Schema.org markup pour l'organisation -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Showroom Beauty",
        "url": "{{ config('app.url') }}",
        "logo": "{{ asset('storage/showroomBeauty.svg') }}",
        "image": "{{ asset('storage/og-image.jpg') }}",
        "description": "Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits.",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+33612345678",
            "contactType": "customer service",
            "availableLanguage": ["French"],
            "areaServed": "FR"
        },
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "France",
            "addressRegion": "Île-de-France",
            "postalCode": "75000",
            "addressLocality": "Paris"
        },
        "sameAs": [
            "https://www.facebook.com/showroombeauty",
            "https://www.instagram.com/showroombeauty",
            "https://www.tiktok.com/@showroombeauty"
        ],
        "potentialAction": {
            "@type": "SearchAction",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "{{ config('app.url') }}/search?q={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <title>@yield('title', 'Showroom Beauty - Produits de Beauté')</title>

    @livewireStyles
    <!-- Chargement conditionnel des assets Vite -->
    <script>
        // Vérifier si les assets Vite sont déjà chargés
        if (!window._viteAssetsLoaded) {
            window._viteAssetsLoaded = true;
            // Les assets seront chargés normalement
        } else {
            console.warn('Assets Vite déjà chargés. Évitement du chargement multiple.');
            // Créer un événement personnalisé pour indiquer que les assets sont déjà chargés
            document.dispatchEvent(new CustomEvent('vite-assets-already-loaded'));
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- TikTok Pixel Code Start -->
    <script>
    if (typeof window._tiktokPixelLoaded === 'undefined') {
        window._tiktokPixelLoaded = true;

        !function (w, d, t) {
          w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(
        var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script")
        ;n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};

          ttq.load('CV32CB3C77UCVDMFDKAG');
          ttq.page();

          // Helper function pour le tracking
          window.trackTikTok = function(event, data) {
              if (typeof ttq !== 'undefined' && ttq.track) {
                  console.log('TikTok tracking:', event, data);
                  ttq.track(event, data || {});
              }
          };
        }(window, document, 'ttq');
    } else {
        console.warn('TikTok Pixel déjà chargé. Évitement du chargement multiple.');
    }
    </script>
    <!-- TikTok Pixel Code End -->
</head>
<body class="bg-white" x-data="{ mobileMenuOpen: false }">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="container px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="/" class="block">
                        <img src="{{ asset('storage/showroomBeauty.svg') }}" alt="Showroom Beauty" class="h-[55px] w-[220px] md:h-[70px] md:w-[280px] mb-2">
                    </a>
                </div>
                <div class="hidden space-x-6 md:flex md:items-center">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-[#7B1F1F]' : '' }}">Accueil</a>
                    <div class="relative" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#7B1F1F]">
                            Nos Produits
                            <svg class="ml-2 w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                             class="absolute left-0 z-10 mt-2 w-48 bg-white rounded-md ring-1 ring-black ring-opacity-5 shadow-lg">
                            <div class="py-1">
                                <a href="{{ route('products.category.makeup') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Maquillage</a>
                                <a href="{{ route('products.category.hair') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Coiffure</a>
                                <a href="{{ route('products.category.lingerie') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Lingerie</a>
                                <a href="{{ route('products.category.skincare') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">SkinCare coréenne</a>
                                <div class="my-1 border-t border-gray-100"></div>
                                <a href="{{ route('products.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir tous les produits</a>
                            </div>
                        </div>
                    </div>
                    <div class="relative" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#7B1F1F]">
                            Nos Marques
                            <svg class="ml-2 w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                             class="absolute left-0 z-10 mt-2 w-48 bg-white rounded-md ring-1 ring-black ring-opacity-5 shadow-lg">
                            <div class="py-1">
                                <a href="{{ route('brands.dyson') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Dyson</a>
                                <a href="{{ route('brands.ghd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">GHD</a>
                                <a href="{{ route('brands.fenty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Savage X Fenty</a>
                                <a href="{{ route('brands.fenty-beauty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Fenty Beauty</a>
                                <a href="{{ route('brands.korean-beauty') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#7B1F1F] hover:text-white">Korean Beauty</a>
                                <div class="my-1 border-t border-gray-100"></div>
                                <a href="{{ route('brands.index') }}" class="block px-4 py-2 text-sm text-[#7B1F1F] font-medium hover:bg-[#7B1F1F] hover:text-white">Voir toutes les marques</a>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('about') ? 'text-[#7B1F1F]' : '' }}">À Propos</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('contact') ? 'text-[#7B1F1F]' : '' }}">Contact</a>
                    <a href="{{ route('order.tracking') }}" class="text-gray-700 hover:text-[#7B1F1F] px-3 py-2 text-sm font-medium {{ request()->routeIs('order.tracking') ? 'text-[#7B1F1F]' : '' }}">Suivre ma commande</a>
                </div>
                <!-- Bouton menu mobile -->
                <div class="md:hidden">
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-100">
                        <svg class="w-6 h-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="w-6 h-6" x-show="mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile -->
        <div class="md:hidden" x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
            <div class="px-2 pt-2 pb-3 space-y-1" x-data="{ productsOpen: false, brandsOpen: false }">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Accueil</a>

                <!-- Menu Produits -->
                <div>
                    <button @click="productsOpen = !productsOpen" class="flex w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">
                        <span>Nos Produits</span>
                        <svg class="ml-2 w-5 h-5" x-bind:class="{ 'transform rotate-180': productsOpen }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="pl-4" x-show="productsOpen">
                        <a href="{{ route('products.category.makeup') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Maquillage</a>
                        <a href="{{ route('products.category.hair') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Coiffure</a>
                        <a href="{{ route('products.category.lingerie') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Lingerie</a>
                        <a href="{{ route('products.category.skincare') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Skincare coréenne</a>
                    </div>
                </div>

                <!-- Menu Marques -->
                <div>
                    <button @click="brandsOpen = !brandsOpen" class="flex w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">
                        <span>Nos Marques</span>
                        <svg class="ml-2 w-5 h-5" x-bind:class="{ 'transform rotate-180': brandsOpen }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="pl-4" x-show="brandsOpen">
                        <a href="{{ route('brands.dyson') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Dyson</a>
                        <a href="{{ route('brands.ghd') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">GHD</a>
                        <a href="{{ route('brands.fenty') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Savage X Fenty</a>
                        <a href="{{ route('brands.fenty-beauty') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Fenty Beauty</a>
                        <a href="{{ route('brands.korean-beauty') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Korean Beauty</a>
                    </div>
                </div>

                <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">À Propos</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Contact</a>
                <a href="{{ route('order.tracking') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-[#7B1F1F] hover:bg-gray-50">Suivre ma commande</a>
            </div>
        </div>
    </nav>

    {{-- Breadcrumbs temporairement désactivés
    @if(Route::currentRouteName() && Route::currentRouteName() !== 'home')
        @try
            {{ Breadcrumbs::render(Route::currentRouteName()) }}
        @catch (\Throwable $e)
        @endtry
    @endif
    --}}

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
                        <li><a href="{{ route('products.category.skincare') }}" class="text-gray-200 hover:text-white">Skincare coréenne</a></li>
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

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('app', {
                init() {
                    // Initialisation globale si nécessaire
                }
            })
        })

        // Forcer le rechargement de la page lors de l'utilisation des boutons précédent/suivant du navigateur
        window.addEventListener('pageshow', function(event) {
            if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                window.location.reload();
            }
        });
    </script>
</body>
</html>
