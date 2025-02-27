import "./bootstrap";
import "./tiktok-tracking";

// Solution pour éviter les doublons d'Alpine.js
// Vérifier immédiatement si Alpine a déjà été initialisé
if (window.Alpine) {
    console.warn(
        "Alpine.js est déjà initialisé. Évitement du chargement multiple."
    );
} else {
    // Utiliser une variable globale pour suivre l'initialisation
    window._alpineInitialized = false;

    // Importer Alpine seulement si pas déjà initialisé
    import("alpinejs")
        .then((module) => {
            if (!window._alpineInitialized) {
                window._alpineInitialized = true;
                window.Alpine = module.default;
                window.Alpine.start();
                console.log("Alpine.js initialisé correctement");
            } else {
                console.warn(
                    "Tentative d'initialisation multiple d'Alpine bloquée"
                );
            }
        })
        .catch((err) => {
            console.error("Erreur lors du chargement d'Alpine.js:", err);
        });
}
