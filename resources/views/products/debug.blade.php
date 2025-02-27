<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnostique de Pagination et Filtres</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-8">Page de diagnostic - Livewire Pagination et Filtres</h1>

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-lg font-semibold mb-4">Informations de débogage</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <h3 class="font-medium mb-2">Environnement</h3>
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        <li>Laravel: {{ app()->version() }}</li>
                        <li>PHP: {{ phpversion() }}</li>
                        <li>URL actuelle: {{ request()->fullUrl() }}</li>
                        <li>Route actuelle: {{ request()->route() ? request()->route()->getName() : 'N/A' }}</li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-medium mb-2">Paramètres</h3>
                    <ul class="list-disc pl-5 space-y-1 text-sm">
                        <li>GET: {{ json_encode(request()->query()) }}</li>
                        <li>Segments d'URL: {{ json_encode(request()->segments()) }}</li>
                    </ul>
                </div>
            </div>

            <div class="flex space-x-4">
                <a href="{{ route('home') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Retour à l'accueil</a>
                <a href="{{ url('products/category/lingerie') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tester lingerie</a>
                <a href="{{ url('products') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Tous les produits</a>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-4">Test de composant Livewire</h2>
                <p class="text-sm text-gray-600 mb-4">Ce test utilise le composant ProductsTest pour vérifier la pagination et les filtres avec un minimum de complexité.</p>

                @livewire('products-test')
            </div>
        </div>
    </div>

    <script>
    // Script de diagnostic pour surveiller les erreurs JavaScript
    (function() {
        const originalConsoleError = console.error;
        console.error = function() {
            // Créer une div pour afficher l'erreur
            let errorDiv = document.createElement('div');
            errorDiv.className = 'fixed bottom-0 right-0 bg-red-100 border-red-500 border p-4 m-4 rounded shadow-lg z-50 max-w-xl';

            // Ajouter les détails de l'erreur
            let errorContent = document.createElement('pre');
            errorContent.className = 'text-xs text-red-800 overflow-auto max-h-40';
            errorContent.textContent = Array.from(arguments).join('\n');

            // Créer un titre
            let errorTitle = document.createElement('h3');
            errorTitle.className = 'font-bold text-red-800 mb-2';
            errorTitle.textContent = 'Erreur JavaScript détectée:';

            // Assembler et ajouter au DOM
            errorDiv.appendChild(errorTitle);
            errorDiv.appendChild(errorContent);
            document.body.appendChild(errorDiv);

            // Appeler la fonction originale
            originalConsoleError.apply(console, arguments);

            // Supprimer après 10 secondes
            setTimeout(() => {
                if (document.body.contains(errorDiv)) {
                    document.body.removeChild(errorDiv);
                }
            }, 10000);
        };

        // Capturer les erreurs globales
        window.addEventListener('error', function(event) {
            console.error('Erreur non capturée:', event.message, 'à', event.filename, 'ligne', event.lineno);
        });

        // Journaliser les interactions Livewire
        if (window.Livewire) {
            console.log('Livewire détecté:', window.Livewire);
            window.Livewire.hook('message.sent', (message, component) => {
                console.log('Livewire message envoyé:', message);
            });
            window.Livewire.hook('message.failed', (message, component) => {
                console.error('Livewire message échoué:', message);
            });
            window.Livewire.hook('message.received', (message, component) => {
                console.log('Livewire message reçu:', message);
            });
        } else {
            console.warn('Livewire non détecté sur la page!');
            window.addEventListener('livewire:load', function() {
                console.log('Livewire chargé après la détection');
            });
        }

        // Détection d'Alpine.js
        if (window.Alpine) {
            console.log('Alpine.js détecté:', window.Alpine.version);
            if (window._alpineInitialized) {
                console.warn('Alpine.js déjà initialisé!');
            }
            window._alpineInitialized = true;
        } else {
            console.warn('Alpine.js non détecté!');
        }
    })();
    </script>

    @livewireScripts
</body>
</html>
