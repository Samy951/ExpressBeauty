<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class UpdateProductCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Met à jour les catégories des produits';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Mise à jour des catégories des produits...');

        // Règles pour assigner les catégories
        $categoryRules = [
            'lingerie' => [
                'bra', 'panty', 'thong', 'boxer', 'brief', 'teddy', 'corset', 'bustier',
                'garter', 'bodysuit', 'slip', 'bikini', 'bralette', 'underwear', 'savage x fenty'
            ],
            'hair' => [
                'dyson', 'ghd', 'shampoo', 'conditioner', 'hair', 'brush', 'dryer', 'straightener',
                'curler', 'styler', 'airwrap', 'supersonic', 'airstrait', 'helios'
            ],
            'makeup' => [
                'lipstick', 'mascara', 'foundation', 'powder', 'blush', 'eyeshadow', 'concealer',
                'makeup', 'highlighter', 'bronzer', 'primer', 'eyeliner', 'gloss', 'fenty beauty'
            ]
        ];

        $products = Product::all();
        $updated = 0;

        foreach ($products as $product) {
            $category = null;
            $productNameLower = strtolower($product->name);
            $productDescriptionLower = strtolower($product->description ?? '');
            $productBrandLower = strtolower($product->brand ?? '');

            // Cherche dans les règles pour trouver la catégorie appropriée
            foreach ($categoryRules as $categoryName => $keywords) {
                foreach ($keywords as $keyword) {
                    if (
                        str_contains($productNameLower, $keyword) ||
                        str_contains($productDescriptionLower, $keyword) ||
                        str_contains($productBrandLower, $keyword)
                    ) {
                        $category = $categoryName;
                        break 2;
                    }
                }
            }

            // Si une catégorie a été trouvée et qu'elle est différente de la catégorie actuelle
            if ($category && $product->category !== $category) {
                $product->category = $category;
                $product->save();
                $updated++;
                $this->info("Produit '{$product->name}' mis à jour avec la catégorie : {$category}");
            }
        }

        $this->info("\n{$updated} produits ont été mis à jour avec succès!");
    }
}
