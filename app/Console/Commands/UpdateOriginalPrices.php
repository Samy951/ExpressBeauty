<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class UpdateOriginalPrices extends Command
{
    protected $signature = 'products:update-original-prices';
    protected $description = 'Met à jour les prix originaux des produits';

    public function handle()
    {
        $this->info('Mise à jour des prix originaux...');

        $products = Product::whereNull('original_price')->get();
        $count = 0;

        foreach ($products as $product) {
            $product->original_price = $product->price;
            $product->save();
            $count++;

            $this->line("Prix original mis à jour pour : {$product->name}");
        }

        $this->info("\n{$count} produits ont été mis à jour avec succès!");
    }
}
