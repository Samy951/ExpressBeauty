import "./bootstrap";
import "./tiktok-tracking";

// Attendre que le DOM soit chargé
document.addEventListener("DOMContentLoaded", () => {
    // Solution pour éviter les doublons d'Alpine.js
    if (window.Alpine) {
        console.warn(
            "Alpine.js est déjà initialisé. Évitement du chargement multiple."
        );
        return;
    }

    // Utiliser une variable globale pour suivre l'initialisation
    window._alpineInitialized = false;

    // Importer Alpine seulement si pas déjà initialisé
    import("alpinejs")
        .then((module) => {
            if (!window._alpineInitialized) {
                window._alpineInitialized = true;
                window.Alpine = module.default;

                // S'assurer que Livewire est chargé avant d'initialiser Alpine
                if (window.Livewire) {
                    window.Alpine.start();
                    console.log(
                        "Alpine.js initialisé correctement avec Livewire"
                    );
                } else {
                    // Attendre que Livewire soit chargé
                    document.addEventListener("livewire:load", () => {
                        window.Alpine.start();
                        console.log(
                            "Alpine.js initialisé après le chargement de Livewire"
                        );
                    });
                }
            } else {
                console.warn(
                    "Tentative d'initialisation multiple d'Alpine bloquée"
                );
            }
        })
        .catch((err) => {
            console.error("Erreur lors du chargement d'Alpine.js:", err);
        });
});

// Réinitialiser Alpine.js après les mises à jour Livewire
document.addEventListener("livewire:load", () => {
    window.Livewire.hook("message.processed", (message, component) => {
        if (window.Alpine) {
            window.Alpine.initTree(document.body);
        }
    });
});
