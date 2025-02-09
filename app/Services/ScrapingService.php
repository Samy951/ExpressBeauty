<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Log;

class ScrapingService
{
    public function scrapeBeautyset()
    {
        try {
            // Exemple avec la page GHD
            $response = Http::get('https://beauty-set.com/products');
            $crawler = new Crawler($response->body());
            
            // Parcourir chaque produit sur la page
            $crawler->filter('.product-item')->each(function (Crawler $node) {
                try {
                    // Extraction des données
                    $productData = [
                        'name' => $node->filter('.product-name')->text(),
                        'brand' => $node->filter('.product-brand')->text(),
                        'description' => $node->filter('.product-description')->text(),
                        'price' => (float) preg_replace('/[^0-9.]/', '', $node->filter('.product-price')->text()),
                        'image_url' => $node->filter('.product-image')->attr('src'),
                        'specifications' => [
                            'temperature' => $node->filter('.spec-temperature')->text(),
                            'plaques' => $node->filter('.spec-plaques')->text(),
                            // ... autres spécifications
                        ]
                    ];

                    // Création ou mise à jour du produit
                    Product::updateOrCreate(
                        [
                            'name' => $productData['name'],
                            'brand' => $productData['brand']
                        ],
                        $productData
                    );

                } catch (\Exception $e) {
                    Log::error("Erreur lors du scraping d'un produit : " . $e->getMessage());
                }
            });

            return true;

        } catch (\Exception $e) {
            Log::error("Erreur lors du scraping : " . $e->getMessage());
            return false;
        }
    }
} 