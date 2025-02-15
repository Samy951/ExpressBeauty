<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

class ResetAndImportProducts extends Command
{
    protected $signature = 'products:reset-import';
    protected $description = 'Reset and import products data';

    public function handle()
    {
        $this->info('Starting products reset and import...');

        try {
            // Vider la table products
            Schema::disableForeignKeyConstraints();
            Product::truncate();
            Schema::enableForeignKeyConstraints();

            // Importer les produits Dyson
            $this->importDysonProducts();

            // Importer les produits GHD
            $this->importGHDProducts();

            // Importer les produits Fenty Beauty
            $this->importFentyBeautyProducts();

            // Importer les produits Savage X Fenty
            $this->importSavageXFentyProducts();

            $this->info('Products reset and import completed successfully!');

        } catch (\Exception $e) {
            $this->error('Error during import: ' . $e->getMessage());
            $this->error($e->getTraceAsString());
        }
    }

    private function importDysonProducts()
    {
        $products = [
            [
                'name' => 'Dyson Airwrap™ Multi-Styler Complete Long',
                'brand' => 'Dyson',
                'description' => 'Le Dyson Airwrap™ Multi-Styler Complete Long est conçu pour les cheveux longs.',
                'price' => 599.99,
                'original_price' => 599.99,
                'image_url' => '/storage/products/dyson-airwrap.webp',
                'category' => 'hair',
                'specifications' => json_encode([
                    'Type' => 'Styler',
                    'Longueur de cheveux' => 'Long',
                    'Technologie' => 'Effet Coanda'
                ])
            ],
            [
                'name' => 'Dyson Supersonic™',
                'brand' => 'Dyson',
                'description' => 'Sèche-cheveux professionnel avec technologie Air Multiplier™.',
                'price' => 449.99,
                'original_price' => 449.99,
                'image_url' => '/storage/products/dyson-supersonic.webp',
                'category' => 'hair',
                'specifications' => json_encode([
                    'Type' => 'Sèche-cheveux',
                    'Technologie' => 'Air Multiplier™',
                    'Puissance' => '1600W'
                ])
            ],
            [
                'name' => 'Dyson Corrale™',
                'brand' => 'Dyson',
                'description' => 'Lisseur sans fil avec plaques flexibles.',
                'price' => 499.99,
                'original_price' => 499.99,
                'image_url' => '/storage/products/dyson-corrale.webp',
                'category' => 'hair',
                'specifications' => json_encode([
                    'Type' => 'Lisseur',
                    'Technologie' => 'Plaques flexibles',
                    'Autonomie' => '30 minutes'
                ])
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }

    private function importGHDProducts()
    {
        $products = [
            [
                'name' => 'GHD Platinum+ Styler',
                'brand' => 'GHD',
                'description' => 'Le lisseur intelligent GHD Platinum+ avec technologie Ultra-Zone.',
                'price' => 269.99,
                'original_price' => 269.99,
                'image_url' => '/storage/products/ghd-platinum.webp',
                'category' => 'hair',
                'specifications' => json_encode([
                    'Type' => 'Lisseur',
                    'Technologie' => 'Ultra-Zone',
                    'Température' => '185°C'
                ])
            ],
            [
                'name' => 'GHD Gold Styler',
                'brand' => 'GHD',
                'description' => 'Lisseur professionnel avec technologie dual-zone.',
                'price' => 199.99,
                'original_price' => 199.99,
                'image_url' => '/storage/products/ghd-gold.webp',
                'category' => 'hair',
                'specifications' => json_encode([
                    'Type' => 'Lisseur',
                    'Technologie' => 'Dual-zone',
                    'Température' => '185°C'
                ])
            ],
            [
                'name' => 'GHD Helios',
                'brand' => 'GHD',
                'description' => 'Sèche-cheveux professionnel ultra-léger.',
                'price' => 179.99,
                'original_price' => 179.99,
                'image_url' => '/storage/products/ghd-helios.webp',
                'category' => 'hair',
                'specifications' => json_encode([
                    'Type' => 'Sèche-cheveux',
                    'Technologie' => 'Aéroprecis',
                    'Puissance' => '2200W'
                ])
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }

    private function importFentyBeautyProducts()
    {
        $products = [
            [
                'name' => 'Fenty Beauty Pro Filt\'r Soft Matte Longwear Foundation',
                'brand' => 'Fenty Beauty',
                'description' => 'Fond de teint longue tenue avec une finition mate naturelle.',
                'price' => 36.99,
                'original_price' => 36.99,
                'image_url' => '/storage/products/fenty-foundation.webp',
                'category' => 'makeup',
                'specifications' => json_encode([
                    'Type' => 'Fond de teint',
                    'Finish' => 'Mat',
                    'Couvrance' => 'Moyenne à complète'
                ])
            ],
            [
                'name' => 'Fenty Beauty Gloss Bomb Universal Lip Luminizer',
                'brand' => 'Fenty Beauty',
                'description' => 'Gloss brillant universel pour des lèvres lumineuses.',
                'price' => 19.99,
                'original_price' => 19.99,
                'image_url' => '/storage/products/fenty-gloss.webp',
                'category' => 'makeup',
                'specifications' => json_encode([
                    'Type' => 'Gloss',
                    'Finish' => 'Brillant',
                    'Effet' => 'Hydratant'
                ])
            ],
            [
                'name' => 'Fenty Beauty Killawatt Freestyle Highlighter',
                'brand' => 'Fenty Beauty',
                'description' => 'Highlighter crémeux pour un éclat intense.',
                'price' => 34.99,
                'original_price' => 34.99,
                'image_url' => '/storage/products/fenty-highlighter.webp',
                'category' => 'makeup',
                'specifications' => json_encode([
                    'Type' => 'Highlighter',
                    'Finish' => 'Métallique',
                    'Texture' => 'Crémeuse'
                ])
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }

    private function importSavageXFentyProducts()
    {
        $products = [
            [
                'name' => 'Savage X Fenty Satin Boxers',
                'brand' => 'Savage X Fenty',
                'description' => 'Boxers en satin luxueux avec logo brodé.',
                'price' => 29.99,
                'original_price' => 29.99,
                'image_url' => '/storage/products/savage-boxers.webp',
                'category' => 'lingerie',
                'specifications' => json_encode([
                    'Matière' => 'Satin',
                    'Tailles disponibles' => 'XS-3XL',
                    'Entretien' => 'Lavage à la main'
                ])
            ],
            [
                'name' => 'Savage X Fenty Lace Bodysuit',
                'brand' => 'Savage X Fenty',
                'description' => 'Body en dentelle avec détails raffinés.',
                'price' => 64.99,
                'original_price' => 64.99,
                'image_url' => '/storage/products/savage-bodysuit.webp',
                'category' => 'lingerie',
                'specifications' => json_encode([
                    'Matière' => 'Dentelle',
                    'Tailles disponibles' => 'XS-3XL',
                    'Style' => 'Body'
                ])
            ],
            [
                'name' => 'Savage X Fenty Silk Robe',
                'brand' => 'Savage X Fenty',
                'description' => 'Robe de chambre en soie avec ceinture assortie.',
                'price' => 89.99,
                'original_price' => 89.99,
                'image_url' => '/storage/products/savage-robe.webp',
                'category' => 'lingerie',
                'specifications' => json_encode([
                    'Matière' => 'Soie',
                    'Tailles disponibles' => 'XS-3XL',
                    'Longueur' => 'Mi-longue'
                ])
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
