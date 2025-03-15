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
        $this->featuredMakeup = Product::where(function($q) {
                $q->where('brand', 'Fenty Beauty')
                  ->orWhere(function($sq) {
                      $sq->whereJsonContains('specifications->source', 'koreanSkincare')
                         ->where(function($typeQuery) {
                             $typeQuery->whereJsonContains('specifications->TYPE', 'Maquillage')
                                      ->orWhereJsonContains('specifications->TYPE', 'Make-up')
                                      ->orWhereJsonContains('specifications->TYPE', 'Lip Tint')
                                      ->orWhereJsonContains('specifications->TYPE', 'Blush')
                                      ->orWhereJsonContains('specifications->TYPE', 'Concealer')
                                      ->orWhereJsonContains('specifications->TYPE', 'Correcteur')
                                      ->orWhereJsonContains('specifications->TYPE', 'Stick')
                                      ->orWhereJsonContains('specifications->TYPE', 'Parfum');
                         });
                  });
            })
            ->whereNotNull('image_url')
            ->inRandomOrder()
            ->first();

        // Pour la coiffure, inclure les produits capillaires
        $this->featuredHair = Product::where(function($q) {
                $q->whereIn('brand', ['GHD', 'Dyson'])
                  ->orWhere(function($sq) {
                      $sq->whereJsonContains('specifications->source', 'koreanSkincare')
                         ->where(function($typeQuery) {
                             $typeQuery->whereJsonContains('specifications->TYPE', 'Soins des cheveux')
                                      ->orWhereJsonContains('specifications->TYPE', 'Hair Care')
                                      ->orWhereJsonContains('specifications->TYPE', 'Hair Mist')
                                      ->orWhereJsonContains('specifications->TYPE', 'Spray pour les cheveux')
                                      ->orWhereJsonContains('specifications->TYPE', 'Brume pour les cheveux');
                         });
                  });
            })
            ->whereNotNull('image_url')
            ->inRandomOrder()
            ->first();

        // Pour la lingerie, utiliser directement une image de Savage X Fenty
        $this->featuredLingerie = Product::where('brand', 'Savage X Fenty')
            ->whereNotNull('image_url')
            ->inRandomOrder()
            ->first();

        // Pour les soins de la peau, inclure tous les produits de soins
        $this->featuredSkincare = Product::where(function($q) {
                $q->where('category', 'skincare')
                  ->orWhere(function($sq) {
                      $sq->whereJsonContains('specifications->source', 'koreanSkincare')
                         ->where(function($typeQuery) {
                             $typeQuery->whereJsonContains('specifications->TYPE', 'Nettoyants')
                                      ->orWhereJsonContains('specifications->TYPE', 'Cleanser')
                                      ->orWhereJsonContains('specifications->TYPE', 'Cleansers')
                                      ->orWhereJsonContains('specifications->TYPE', 'Toniques')
                                      ->orWhereJsonContains('specifications->TYPE', 'Toner')
                                      ->orWhereJsonContains('specifications->TYPE', 'Toner Pads')
                                      ->orWhereJsonContains('specifications->TYPE', 'Sérums')
                                      ->orWhereJsonContains('specifications->TYPE', 'Crèmes hydratantes')
                                      ->orWhereJsonContains('specifications->TYPE', 'Moisturisers')
                                      ->orWhereJsonContains('specifications->TYPE', 'Essences')
                                      ->orWhereJsonContains('specifications->TYPE', 'Exfoliants')
                                      ->orWhereJsonContains('specifications->TYPE', 'Masques visage');
                         });
                  });
            })
            ->whereNotNull('image_url')
            ->inRandomOrder()
            ->first();
    }

    public function render()
    {
        return view('livewire.products-list');
    }
}
