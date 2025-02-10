<x-layouts.app>
    <div class="min-h-screen">
        <iframe
            src="{{ $product->payment_link }}"
            class="w-full min-h-screen border-0"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>
</x-layouts.app>
