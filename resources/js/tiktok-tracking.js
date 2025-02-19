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
