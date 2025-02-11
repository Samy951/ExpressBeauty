<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use App\Models\Product;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Génère le sitemap du site';

    public function handle()
    {
        $this->info('Génération du sitemap...');

        $sitemap = SitemapGenerator::create(config('app.url'))
            ->hasCrawled(function (Url $url) {
                if ($url->segment(1) === 'products') {
                    return $url->setPriority(0.9)
                              ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY);
                }

                if ($url->segment(1) === 'brands') {
                    return $url->setPriority(0.8)
                              ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);
                }

                if ($url->segment(1) === 'categories') {
                    return $url->setPriority(0.8)
                              ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);
                }

                if ($url->segment(1) === 'legal') {
                    return $url->setPriority(0.5)
                              ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY);
                }

                return $url->setPriority(0.7)
                          ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY);
            })
            ->getSitemap();

        // Ajouter manuellement les pages de produits
        Product::all()->each(function (Product $product) use ($sitemap) {
            $sitemap->add(
                Url::create("/products/{$product->id}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setLastModificationDate($product->updated_at)
            );
        });

        // Sauvegarder le sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap généré avec succès !');
    }
}
