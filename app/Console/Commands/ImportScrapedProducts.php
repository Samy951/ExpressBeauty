<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportScrapedProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:scraped-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importe les produits depuis les fichiers JSON scrappés';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Début de l\'importation des produits...');

        // Importer les produits Dyson
        $dysonPath = storage_path('app/scraping/dysonProducts.json');
        if (file_exists($dysonPath)) {
            $dysonProducts = json_decode(file_get_contents($dysonPath), true);
            $this->info('Traitement de ' . count($dysonProducts) . ' produits Dyson...');

            foreach ($dysonProducts as $product) {
                try {
                    Product::updateOrCreate(
                        ['name' => $product['Titre']],
                        [
                            'brand' => 'Dyson',
                            'description' => $product['description_du_produit'],
                            'price' => (float) str_replace(['€', ','], ['', '.'], $product['Price']),
                            'image_url' => $product['Image_URL'],
                            'specifications' => [
                                'rating' => $product['Rating']
                            ]
                        ]
                    );
                } catch (\Exception $e) {
                    $this->error('Erreur lors de l\'importation du produit Dyson: ' . $product['Titre']);
                    $this->error($e->getMessage());
                }
            }
            $this->info('Produits Dyson importés avec succès.');
        } else {
            $this->error('Fichier Dyson non trouvé: ' . $dysonPath);
        }

        // Importer les produits GHD
        $ghdPath = storage_path('app/scraping/ghdProducts.json');
        if (file_exists($ghdPath)) {
            $ghdProducts = json_decode(file_get_contents($ghdPath), true);
            $this->info('Traitement de ' . count($ghdProducts) . ' produits GHD...');

            foreach ($ghdProducts as $product) {
                try {
                    Product::updateOrCreate(
                        ['name' => $product['title']],
                        [
                            'brand' => 'GHD',
                            'description' => $product['description'],
                            'price' => (float) str_replace(['€', ','], ['', '.'], $product['price']['current']),
                            'image_url' => $product['images'][0] ?? null,
                            'specifications' => [
                                'rating' => $product['rating'],
                                'url' => $product['url'],
                                'timestamp' => $product['timestamp']
                            ]
                        ]
                    );
                } catch (\Exception $e) {
                    $this->error('Erreur lors de l\'importation du produit GHD: ' . $product['title']);
                    $this->error($e->getMessage());
                }
            }
            $this->info('Produits GHD importés avec succès.');
        } else {
            $this->error('Fichier GHD non trouvé: ' . $ghdPath);
        }

        // Importer les produits Savage X Fenty
        $savagePath = storage_path('app/scraping/savagexfentyProducts.json');
        if (file_exists($savagePath)) {
            $savageProducts = json_decode(file_get_contents($savagePath), true);
            $this->info('Traitement de ' . count($savageProducts) . ' produits Savage X Fenty...');

            foreach ($savageProducts as $product) {
                try {
                    $color = $product['color'] ?? 'default';

                    // Amélioration de la sélection d'image
                    $image_url = null;
                    if (!empty($product['images'])) {
                        // Filtrer les images de basse qualité
                        $filtered_images = array_filter($product['images'], function($img) {
                            $low_quality_indicators = ['thumb', 'small', 'mini', 'preview', '150x', '300x'];
                            foreach ($low_quality_indicators as $indicator) {
                                if (stripos($img, $indicator) !== false) {
                                    return false;
                                }
                            }
                            return true;
                        });

                        if (!empty($filtered_images)) {
                            // Chercher d'abord les images HD ou haute qualité
                            foreach ($filtered_images as $img) {
                                if (preg_match('/(hd|HD|high|large|original|full|zoom|[0-9]{4,}x[0-9]{4,})/', $img)) {
                                    $image_url = $img;
                                    break;
                                }
                            }

                            // Si aucune image HD n'est trouvée, prendre la dernière image filtrée
                            if (!$image_url) {
                                $image_url = end($filtered_images);
                            }
                        } else {
                            // Si toutes les images ont été filtrées, prendre la dernière du tableau original
                            $image_url = end($product['images']);
                        }
                    }

                    Product::updateOrCreate(
                        [
                            'name' => $product['title'],
                            'specifications->color' => $color
                        ],
                        [
                            'brand' => 'Savage X Fenty',
                            'description' => $product['description'],
                            'price' => (float) str_replace(['€', ','], ['', '.'], $product['price']['current']),
                            'image_url' => $image_url,
                            'specifications' => [
                                'url' => $product['url'],
                                'timestamp' => $product['timestamp'],
                                'color' => $color
                            ]
                        ]
                    );
                } catch (\Exception $e) {
                    $this->error('Erreur lors de l\'importation du produit Savage X Fenty: ' . $product['title']);
                    $this->error($e->getMessage());
                }
            }
            $this->info('Produits Savage X Fenty importés avec succès.');
        } else {
            $this->error('Fichier Savage X Fenty non trouvé: ' . $savagePath);
        }

        // Importer les produits Fenty Beauty
        $fentyPath = storage_path('app/scraping/fentybeautyProducts.json');
        if (file_exists($fentyPath)) {
            $fentyProducts = json_decode(file_get_contents($fentyPath), true);
            $this->info('Traitement de ' . count($fentyProducts) . ' produits Fenty Beauty...');

            foreach ($fentyProducts as $product) {
                try {
                    Product::updateOrCreate(
                        ['name' => $product['title']],
                        [
                            'brand' => 'Fenty Beauty',
                            'description' => $product['description'],
                            'price' => (float) str_replace(['€', ','], ['', '.'], $product['price']['current']),
                            'image_url' => $product['images'][0] ?? null,
                            'specifications' => [
                                'url' => $product['url'],
                                'timestamp' => $product['timestamp']
                            ]
                        ]
                    );
                } catch (\Exception $e) {
                    $this->error('Erreur lors de l\'importation du produit Fenty Beauty: ' . $product['title']);
                    $this->error($e->getMessage());
                }
            }
            $this->info('Produits Fenty Beauty importés avec succès.');
        } else {
            $this->error('Fichier Fenty Beauty non trouvé: ' . $fentyPath);
        }

        $this->info('Importation terminée !');

        // Afficher les statistiques
        $totalDyson = Product::where('brand', 'Dyson')->count();
        $totalGhd = Product::where('brand', 'GHD')->count();
        $totalSavage = Product::where('brand', 'Savage X Fenty')->count();
        $totalFenty = Product::where('brand', 'Fenty Beauty')->count();

        $this->info("Statistiques finales :");
        $this->info("- Produits Dyson : $totalDyson");
        $this->info("- Produits GHD : $totalGhd");
        $this->info("- Produits Savage X Fenty : $totalSavage");
        $this->info("- Produits Fenty Beauty : $totalFenty");
        $this->info("- Total : " . ($totalDyson + $totalGhd + $totalSavage + $totalFenty));
    }
}
