<x-layouts.app>
    <div class="bg-white">
        @php
            $sourceId = $product->name . '___' . $product->image_url;
            $iframeUrl = rtrim($product->payment_link, '/') . '?source_id=' . rawurlencode($sourceId);
        @endphp

        <!-- Iframe de paiement -->
        <iframe
            src="{{ $iframeUrl }}"
            class="w-full border-0"
            height="1000"
            scrolling="yes"
            title="Formulaire de paiement sécurisé"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
        </iframe>
    </div>
</x-layouts.app>
