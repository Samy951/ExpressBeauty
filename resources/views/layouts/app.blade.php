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

    <!-- Balises de langue -->
    <link rel="alternate" hreflang="fr" href="{{ url()->current() }}">
    <meta property="og:locale" content="fr_FR">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Showroom Beauty">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Showroom Beauty - Produits de Beauté')">
    <meta property="og:description" content="@yield('description', 'Showroom Beauty - Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits.')">
    <meta property="og:image" content="{{ asset('storage/og-image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@expressbeauty">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'Showroom Beauty - Produits de Beauté')">
    <meta name="twitter:description" content="@yield('description', 'Showroom Beauty - Votre destination beauté en ligne. Découvrez notre sélection de produits Dyson, GHD, Fenty Beauty et Savage X Fenty à prix réduits.')">
    <meta name="twitter:image" content="{{ asset('storage/og-image.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Preconnect pour les ressources importantes -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.bunny.net">

    <!-- Schema.org markup pour Google -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Showroom Beauty",
        "url": "{{ url('/') }}",
        "description": "Votre destination beauté en ligne pour des produits authentiques Fenty Beauty, Savage X Fenty, Dyson et GHD à prix réduits.",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "{{ url('/products') }}?search={search_term_string}",
            "query-input": "required name=search_term_string"
        },
        "sameAs": [
            "https://www.facebook.com/showroombeauty",
            "https://www.instagram.com/showroombeauty",
            "https://www.tiktok.com/@showroombeauty"
        ]
    }
    </script>

    <title>@yield('title', 'Showroom Beauty - Produits de Beauté')</title>

    <!-- Favicons avec tailles variées -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#7B1F1F">

    <!-- Scripts -->
    <!-- Protection Alpine.js à charger avant tout autre script -->
    <script>
        // Éviter les instances multiples d'Alpine
        if (typeof window._alpineDetected === 'undefined') {
            window._alpineDetected = false;

            // Observer pour détecter les scripts Alpine.js
            const observer = new MutationObserver((mutations) => {
                for (const mutation of mutations) {
                    if (mutation.type === 'childList') {
                        for (const node of mutation.addedNodes) {
                            if (node.tagName === 'SCRIPT' &&
                                (node.src && node.src.includes('alpine') ||
                                node.textContent && node.textContent.includes('Alpine'))) {

                                if (window._alpineDetected) {
                                    console.warn('Tentative de chargement multiple d\'Alpine.js détectée et bloquée');
                                    node.setAttribute('data-blocked', 'true');
                                    node.type = 'text/blocked';
                                } else {
                                    window._alpineDetected = true;
                                    console.log('Premier chargement d\'Alpine.js détecté');
                                }
                            }
                        }
                    }
                }
            });

            // Observer le document pour les nouveaux scripts
            observer.observe(document, {
                childList: true,
                subtree: true
            });

            // Protéger contre les définitions globales
            Object.defineProperty(window, 'Alpine', {
                set: function(val) {
                    if (this._Alpine && val !== this._Alpine) {
                        console.warn('Tentative de redéfinition d\'Alpine.js bloquée');
                        return this._Alpine;
                    }
                    this._Alpine = val;
                    return val;
                },
                get: function() {
                    return this._Alpine;
                },
                configurable: false
            });
        }
    </script>

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
    @livewireStyles

    <!-- TikTok Pixel Code Start -->
    <script>
    !function (w, d, t) {
      w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie","holdConsent","revokeConsent","grantConsent"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(
    var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var r="https://analytics.tiktok.com/i18n/pixel/events.js",o=n&&n.partner;ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=r,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script")
    ;n.type="text/javascript",n.async=!0,n.src=r+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};

      ttq.load('CV32CB3C77UCVDMFDKAG');
      ttq.page();
    }(window, document, 'ttq');
    </script>
    <!-- TikTok Pixel Code End -->
</head>
<body>
    @include('layouts.navigation')

    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    @include('layouts.footer')

    @livewireScripts
</body>
</html>
