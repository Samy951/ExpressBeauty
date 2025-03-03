import "./bootstrap";
import * as tiktokEvents from "./tiktok-events";
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

    // ViewContent - Sur les pages produits
    if (document.querySelector(".product-detail")) {
        const product = JSON.parse(
            document.querySelector(".product-detail").dataset.product
        );
        tiktokEvents.trackViewContent(product);
    }

    // AddToWishlist - Sur le bouton d'ajout aux favoris
    document.querySelectorAll(".add-to-wishlist").forEach((button) => {
        button.addEventListener("click", () => {
            const product = JSON.parse(button.dataset.product);
            tiktokEvents.trackAddToWishlist(product);
        });
    });

    // Search - Sur la soumission du formulaire de recherche
    const searchForm = document.querySelector(".search-form");
    if (searchForm) {
        searchForm.addEventListener("submit", (e) => {
            const searchQuery = searchForm.querySelector(
                'input[type="search"]'
            ).value;
            tiktokEvents.trackSearch(searchQuery);
        });
    }

    // AddToCart - Sur le bouton d'ajout au panier
    document.querySelectorAll(".add-to-cart").forEach((button) => {
        button.addEventListener("click", () => {
            const product = JSON.parse(button.dataset.product);
            tiktokEvents.trackAddToCart(product);
        });
    });

    // InitiateCheckout - Sur le bouton de passage à la caisse
    const checkoutButton = document.querySelector(".checkout-button");
    if (checkoutButton) {
        checkoutButton.addEventListener("click", () => {
            const cart = JSON.parse(checkoutButton.dataset.cart);
            tiktokEvents.trackInitiateCheckout(cart);
        });
    }

    // CompleteRegistration - Après l'inscription réussie
    if (document.body.dataset.registrationComplete === "true") {
        tiktokEvents.trackCompleteRegistration();
    }

    // CompletePayment - Après le paiement réussi
    if (document.body.dataset.paymentComplete === "true") {
        const order = JSON.parse(document.body.dataset.order);
        tiktokEvents.trackCompletePayment(order);
    }
});

// Réinitialiser Alpine.js après les mises à jour Livewire
document.addEventListener("livewire:load", () => {
    window.Livewire.hook("message.processed", (message, component) => {
        if (window.Alpine) {
            window.Alpine.initTree(document.body);
        }
    });
});
