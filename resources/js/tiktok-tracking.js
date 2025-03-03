/**
 * Module de tracking TikTok avancé
 * Ce fichier contient les fonctions de tracking TikTok avancées
 * pour les différentes actions sur le site.
 */

// Attendre que le pixel TikTok soit chargé
document.addEventListener("DOMContentLoaded", function () {
    // Vérifier si ttq est disponible
    if (typeof window.ttq === "undefined") {
        console.warn(
            "TikTok Pixel non disponible. Le tracking avancé ne fonctionnera pas."
        );
        return;
    }

    // Fonction pour identifier l'utilisateur (à utiliser avec précaution, uniquement avec des données hachées)
    window.identifyTikTokUser = function (userData) {
        if (typeof ttq !== "undefined" && ttq.identify) {
            console.log("TikTok identify:", userData);
            ttq.identify(userData);
        }
    };

    // Fonction pour suivre la vue d'un produit
    window.trackViewContent = function (productData) {
        if (typeof ttq !== "undefined" && ttq.track) {
            console.log("TikTok ViewContent:", productData);
            ttq.track("ViewContent", productData);
        }
    };

    // Fonction pour suivre l'ajout à la liste de souhaits
    window.trackAddToWishlist = function (productData) {
        if (typeof ttq !== "undefined" && ttq.track) {
            console.log("TikTok AddToWishlist:", productData);
            ttq.track("AddToWishlist", productData);
        }
    };

    // Fonction pour suivre une recherche
    window.trackSearch = function (searchData) {
        if (typeof ttq !== "undefined" && ttq.track) {
            console.log("TikTok Search:", searchData);
            ttq.track("Search", searchData);
        }
    };

    // Fonction pour suivre l'ajout d'informations de paiement
    window.trackAddPaymentInfo = function (paymentData) {
        if (typeof ttq !== "undefined" && ttq.track) {
            console.log("TikTok AddPaymentInfo:", paymentData);
            ttq.track("AddPaymentInfo", paymentData);
        }
    };

    // Fonction pour suivre l'ajout au panier
    window.trackAddToCart = function (cartData) {
        if (typeof ttq !== "undefined" && ttq.track) {
            console.log("TikTok AddToCart:", cartData);
            ttq.track("AddToCart", cartData);
        }
    };

    // Fonction pour suivre l'initialisation du paiement
    window.trackInitiateCheckout = function (checkoutData) {
        if (typeof ttq !== "undefined" && ttq.track) {
            console.log("TikTok InitiateCheckout:", checkoutData);
            ttq.track("InitiateCheckout", checkoutData);
        }
    };

    // Fonction pour suivre une commande
    window.trackPlaceAnOrder = function (orderData) {
        if (typeof ttq !== "undefined" && ttq.track) {
            console.log("TikTok PlaceAnOrder:", orderData);
            ttq.track("PlaceAnOrder", orderData);
        }
    };

    // Fonction pour suivre l'inscription
    window.trackCompleteRegistration = function (registrationData) {
        if (typeof ttq !== "undefined" && ttq.track) {
            console.log("TikTok CompleteRegistration:", registrationData);
            ttq.track("CompleteRegistration", registrationData);
        }
    };

    // Fonction pour suivre le paiement complet
    window.trackCompletePayment = function (paymentData) {
        if (typeof ttq !== "undefined" && ttq.track) {
            console.log("TikTok CompletePayment:", paymentData);
            ttq.track("CompletePayment", paymentData);
        }
    };

    console.log("Module de tracking TikTok avancé chargé avec succès");
});

// TikTok Tracking Events
const TikTokEvents = {
    // Vue d'un produit
    viewProduct(product) {
        trackTikTok("ViewContent", {
            content_type: "product",
            content_id: product.id,
            content_name: product.name,
            currency: "EUR",
            value: product.price,
        });
    },

    // Ajout au panier
    addToCart(product, quantity = 1) {
        trackTikTok("AddToCart", {
            content_type: "product",
            content_id: product.id,
            content_name: product.name,
            quantity: quantity,
            currency: "EUR",
            value: product.price * quantity,
        });
    },

    // Début de checkout
    initiateCheckout(cart) {
        trackTikTok("InitiateCheckout", {
            contents: cart.items.map((item) => ({
                content_type: "product",
                content_id: item.id,
                quantity: item.quantity,
                price: item.price,
            })),
            currency: "EUR",
            value: cart.total,
        });
    },

    // Achat finalisé
    purchase(order) {
        trackTikTok("Purchase", {
            contents: order.items.map((item) => ({
                content_type: "product",
                content_id: item.id,
                quantity: item.quantity,
                price: item.price,
            })),
            currency: "EUR",
            value: order.total,
        });
    },

    // Inscription newsletter
    completeRegistration(data = {}) {
        trackTikTok("CompleteRegistration", {
            status: true,
            ...data,
        });
    },

    // Contact
    contact(data = {}) {
        trackTikTok("Contact", {
            ...data,
        });
    },

    // Recherche
    search(query) {
        trackTikTok("Search", {
            query: query,
        });
    },
};

// Export pour utilisation dans d'autres fichiers
window.TikTokEvents = TikTokEvents;
