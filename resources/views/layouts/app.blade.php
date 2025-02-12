<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ExpressBeauty | Déstockage Fenty Beauty, Savage X Fenty, Dyson, GHD jusqu'à -95%. Produits 100% authentiques, livraison express 24/48h. Meilleurs prix garantis sur vos marques préférées.">
    <meta name="keywords" content="ExpressBeauty, Fenty Beauty, Savage X Fenty, Rihanna, Dyson, GHD, beauté, cosmétiques, soins, déstockage, produits authentiques, maquillage, lingerie, lisseur, sèche-cheveux">
    <meta name="author" content="ExpressBeauty">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    
    <!-- Balises de langue -->
    <link rel="alternate" hreflang="fr" href="{{ url()->current() }}">
    <meta property="og:locale" content="fr_FR">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="ExpressBeauty">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'ExpressBeauty - Déstockage Fenty Beauty, Savage X Fenty, Dyson, GHD jusqu\'à -95%')">
    <meta property="og:description" content="Découvrez notre sélection de produits authentiques Fenty Beauty, Savage X Fenty, Dyson et GHD à prix imbattables. Livraison express 24/48h et garantie 100% satisfait ou remboursé.">
    <meta property="og:image" content="{{ asset('storage/AdobeStock_132642948.jpeg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@expressbeauty">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'ExpressBeauty - Déstockage Fenty Beauty, Savage X Fenty, Dyson, GHD jusqu\'à -95%')">
    <meta name="twitter:description" content="Découvrez notre sélection de produits authentiques Fenty Beauty, Savage X Fenty, Dyson et GHD à prix imbattables. Livraison express 24/48h.">
    <meta name="twitter:image" content="{{ asset('storage/AdobeStock_132642948.jpeg') }}">

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
        "@type": "WebSite",
        "name": "ExpressBeauty",
        "url": "{{ url('/') }}",
        "description": "Votre destination beauté en ligne pour des produits authentiques Fenty Beauty, Savage X Fenty, Dyson et GHD à prix réduits.",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "{{ url('/products') }}?search={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <title>@yield('title', 'ExpressBeauty - Déstockage Fenty Beauty, Savage X Fenty, Dyson, GHD jusqu\'à -95%')</title>

    <!-- Favicons avec tailles variées -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#7B1F1F">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head> 