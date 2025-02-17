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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
