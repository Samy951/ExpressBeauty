<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsList extends Component
{
    public $featuredMakeup;
    public $featuredHair;
    public $featuredLingerie;
    public $featuredSkincare;

    public function mount()
    {
        // Récupérer un produit aléatoire pour chaque catégorie
        $this->featuredMakeup = Product::where('brand', 'Fenty Beauty')
            ->whereNotNull('image_url')
            ->inRandomOrder()
            ->first();

        // Pour la coiffure, utiliser directement une image de GHD ou Dyson
        $this->featuredHair = Product::whereIn('brand', ['GHD', 'Dyson'])
            ->whereNotNull('image_url')
            ->inRandomOrder()
            ->first();

        // Pour la lingerie, utiliser directement une image de Savage X Fenty
        $this->featuredLingerie = Product::where('brand', 'Savage X Fenty')
            ->whereNotNull('image_url')
            ->inRandomOrder()
            ->first();

        // Pour les soins de la peau, utiliser les produits de skincare
        $this->featuredSkincare = Product::where('category', 'skincare')
            ->whereNotNull('image_url')
            ->inRandomOrder()
            ->first();
    }

    public function render()
    {
        return view('livewire.products-list');
    }
}
