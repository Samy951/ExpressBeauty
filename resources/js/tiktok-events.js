// Fonction pour hasher les données PII (Personally Identifiable Information)
async function hashData(data) {
    const encoder = new TextEncoder();
    const dataBuffer = encoder.encode(data);
    const hashBuffer = await crypto.subtle.digest("SHA-256", dataBuffer);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    return hashArray.map((b) => b.toString(16).padStart(2, "0")).join("");
}

// Fonction pour identifier l'utilisateur
async function identifyUser(email = null, phone = null, externalId = null) {
    const data = {};

    if (email) {
        data.email = await hashData(email);
    }
    if (phone) {
        data.phone_number = await hashData(phone);
    }
    if (externalId) {
        data.external_id = await hashData(externalId);
    }

    ttq.identify(data);
}

// Fonction pour suivre la vue d'un produit
function trackViewContent(product) {
    ttq.track("ViewContent", {
        contents: [
            {
                content_id: product.id.toString(),
                content_type: "product",
                content_name: product.name,
                content_category: product.category,
                price: parseFloat(product.price),
                brand: product.brand,
            },
        ],
        value: parseFloat(product.price),
        currency: "EUR",
    });
}

// Fonction pour suivre l'ajout à la liste de souhaits
function trackAddToWishlist(product) {
    ttq.track("AddToWishlist", {
        contents: [
            {
                content_id: product.id.toString(),
                content_type: "product",
                content_name: product.name,
                content_category: product.category,
                price: parseFloat(product.price),
                brand: product.brand,
            },
        ],
        value: parseFloat(product.price),
        currency: "EUR",
    });
}

// Fonction pour suivre la recherche
function trackSearch(searchQuery) {
    ttq.track("Search", {
        search_string: searchQuery,
    });
}

// Fonction pour suivre l'ajout des informations de paiement
function trackAddPaymentInfo(order) {
    ttq.track("AddPaymentInfo", {
        contents: order.items.map((item) => ({
            content_id: item.id.toString(),
            content_type: "product",
            content_name: item.name,
        })),
        value: parseFloat(order.total),
        currency: "EUR",
    });
}

// Fonction pour suivre l'ajout au panier
function trackAddToCart(product) {
    ttq.track("AddToCart", {
        contents: [
            {
                content_id: product.id.toString(),
                content_type: "product",
                content_name: product.name,
            },
        ],
        value: parseFloat(product.price),
        currency: "EUR",
    });
}

// Fonction pour suivre l'initiation du checkout
function trackInitiateCheckout(cart) {
    ttq.track("InitiateCheckout", {
        contents: cart.items.map((item) => ({
            content_id: item.id.toString(),
            content_type: "product",
            content_name: item.name,
        })),
        value: parseFloat(cart.total),
        currency: "EUR",
    });
}

// Fonction pour suivre la commande
function trackPlaceAnOrder(order) {
    ttq.track("PlaceAnOrder", {
        contents: order.items.map((item) => ({
            content_id: item.id.toString(),
            content_type: "product",
            content_name: item.name,
        })),
        value: parseFloat(order.total),
        currency: "EUR",
    });
}

// Fonction pour suivre l'inscription
function trackCompleteRegistration(user) {
    ttq.track("CompleteRegistration", {
        value: 0,
        currency: "EUR",
    });
}

// Fonction pour suivre le paiement complété
function trackCompletePayment(order) {
    ttq.track("CompletePayment", {
        contents: order.items.map((item) => ({
            content_id: item.id.toString(),
            content_type: "product",
            content_name: item.name,
        })),
        value: parseFloat(order.total),
        currency: "EUR",
    });
}

// Exporter toutes les fonctions
export {
    identifyUser,
    trackAddPaymentInfo,
    trackAddToCart,
    trackAddToWishlist,
    trackCompletePayment,
    trackCompleteRegistration,
    trackInitiateCheckout,
    trackPlaceAnOrder,
    trackSearch,
    trackViewContent,
};
