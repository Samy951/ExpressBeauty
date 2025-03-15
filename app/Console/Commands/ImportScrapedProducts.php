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
            // Supprimer d'abord tous les produits Dyson existants
            Product::where('brand', 'Dyson')->delete();
            $this->info('Anciens produits Dyson supprimés.');

            $dysonProducts = json_decode(file_get_contents($dysonPath), true);
            $this->info('Traitement de ' . count($dysonProducts) . ' produits Dyson...');

            foreach ($dysonProducts as $product) {
                try {
                    // Vérifier et valider les images
                    $images = [];
                    if (!empty($product['Image_URL']) &&
                        filter_var($product['Image_URL'], FILTER_VALIDATE_URL)) {
                        $images[] = $product['Image_URL'];
                    }

                    // Ne pas importer si aucune image valide n'est trouvée
                    if (empty($images)) {
                        continue;
                    }

                    Product::create([
                        'name' => $product['Titre'],
                        'brand' => 'Dyson',
                        'description' => $product['description_du_produit'],
                        'price' => (float) str_replace(['€', ','], ['', '.'], $product['Price']),
                        'image_url' => $images[0],
                        'specifications' => json_encode([
                            'rating' => $product['Rating'],
                            'additional_images' => array_slice($images, 1)
                        ])
                    ]);
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
                    // Vérifier si l'image existe
                    if (empty($product['images'][0])) {
                        continue;
                    }

                    Product::updateOrCreate(
                        ['name' => $product['title']],
                        [
                            'brand' => 'GHD',
                            'description' => $product['description'],
                            'price' => (float) str_replace(['€', ','], ['', '.'], $product['price']['current']),
                            'image_url' => $product['images'][0],
                            'specifications' => json_encode([
                                'rating' => $product['rating'],
                                'url' => $product['url'],
                                'timestamp' => $product['timestamp']
                            ])
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
                        // Vérifier si les URLs sont valides
                        $filtered_images = array_filter($product['images'], function($img) {
                            return
                                filter_var($img, FILTER_VALIDATE_URL) &&
                                (
                                    str_contains($img, 'cdn.savagex.com') ||
                                    str_contains($img, 'savagex.com')
                                );
                        });

                        if (!empty($filtered_images)) {
                            // Prendre la première image comme image principale
                            $image_url = reset($filtered_images);

                            // Stocker toutes les autres images comme images additionnelles
                            $additional_images = array_slice($filtered_images, 1);
                        }
                    }

                    // Ne pas importer si aucune image valide n'est trouvée
                    if (!$image_url) {
                        continue;
                    }

                    Product::updateOrCreate(
                        [
                            'name' => $product['title'],
                            'brand' => 'Savage X Fenty',
                            'specifications->url' => $product['url']
                        ],
                        [
                            'description' => $product['description'],
                            'price' => (float) str_replace(['€', ','], ['', '.'], $product['price']['current']),
                            'image_url' => $image_url,
                            'specifications' => json_encode([
                                'url' => $product['url'],
                                'timestamp' => $product['timestamp'],
                                'color' => $color,
                                'additional_images' => $additional_images
                            ])
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

            // Supprimer d'abord tous les produits Fenty Beauty existants
            Product::where('brand', 'Fenty Beauty')->delete();
            $this->info('Anciens produits Fenty Beauty supprimés.');

            $this->info('Traitement de ' . count($fentyProducts) . ' produits Fenty Beauty...');
            $imported = 0;

            foreach ($fentyProducts as $product) {
                try {
                    // Gestion des images
                    $images = is_array($product['images']) ? $product['images'] : [$product['images']];
                    $image_url = null;
                    $additional_images = [];

                    // Aplatir le tableau d'images si nécessaire
                    $flattened_images = [];
                    array_walk_recursive($images, function($item) use (&$flattened_images) {
                        if (filter_var($item, FILTER_VALIDATE_URL)) {
                            $flattened_images[] = $item;
                        }
                    });

                    if (!empty($flattened_images)) {
                        $image_url = $flattened_images[0];
                        $additional_images = array_slice($flattened_images, 1);
                    }

                    // Ne pas importer si aucune image valide n'est trouvée
                    if (!$image_url) {
                        $this->warn("Pas d'image valide pour : " . $product['title']);
                        continue;
                    }

                    // Nettoyer le prix
                    $price = str_replace(['€', ','], ['', '.'], $product['price']['current']);
                    $price = (float) trim($price);

                    $original_price = null;
                    if (isset($product['price']['original'])) {
                        $original_price = str_replace(['€', ','], ['', '.'], $product['price']['original']);
                        $original_price = (float) trim($original_price);
                    }

                    Product::create([
                        'name' => $product['title'],
                        'brand' => 'Fenty Beauty',
                        'category' => 'makeup',
                        'description' => $product['description'],
                        'price' => $price,
                        'original_price' => $original_price ?? $price,
                        'image_url' => $image_url,
                        'specifications' => json_encode([
                            'url' => $product['url'],
                            'timestamp' => $product['timestamp'],
                            'additional_images' => $additional_images,
                            'details' => $product['details'] ?? []
                        ])
                    ]);

                    $imported++;
                } catch (\Exception $e) {
                    $this->error('Erreur lors de l\'importation du produit Fenty Beauty: ' . $product['title']);
                    $this->error($e->getMessage());
                }
            }
            $this->info("$imported produits Fenty Beauty importés avec succès.");
        } else {
            $this->error('Fichier Fenty Beauty non trouvé: ' . $fentyPath);
        }

        // Importer les produits Korean Skincare
        $koreanSkincarePath = storage_path('app/scraping/koreanSkincare.json');
        if (file_exists($koreanSkincarePath)) {
            $koreanSkincareProducts = json_decode(file_get_contents($koreanSkincarePath), true);

            // Supprimer d'abord tous les produits Korean Skincare existants
            Product::where('category', 'skincare')->delete();
            $this->info('Anciens produits de soin coréens supprimés.');

            $this->info('Traitement de ' . count($koreanSkincareProducts) . ' produits de soin coréens...');
            $imported = 0;

            foreach ($koreanSkincareProducts as $product) {
                try {
                    // Valider les données du produit
                    if (empty($product['TITRE']) || empty($product['MARQUE']) || empty($product['PRIX'])) {
                        continue;
                    }

                    // Gestion des images
                    $images = [];
                    for ($i = 1; $i <= 4; $i++) {
                        $imageKey = "IMAGE{$i}-src";
                        if (!empty($product[$imageKey])) {
                            $imageUrl = 'https://' . $product[$imageKey];
                            // Vérifier si l'URL est valide
                            if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
                                $images[] = $imageUrl;
                            }
                        }
                    }

                    // Ne pas importer si aucune image valide n'est trouvée
                    if (empty($images)) {
                        $this->warn("Pas d'image valide pour : " . $product['TITRE']);
                        continue;
                    }

                    // Nettoyer le prix
                    $price = str_replace(['€', ','], ['', '.'], $product['PRIX']);
                    $price = (float) trim($price);

                    Product::create([
                        'name' => $product['TITRE'],
                        'brand' => $product['MARQUE'],
                        'category' => 'skincare',
                        'description' => $product['DESCRIPTION'] ?? '',
                        'price' => $price,
                        'original_price' => $price,
                        'image_url' => $images[0],
                        'specifications' => json_encode([
                            'type' => $product['TYPE'] ?? '',
                            'taille' => $product['TAILLE'] ?? '',
                            'ingredients' => $product['INGREDIENTS'] ?? '',
                            'additional_images' => array_slice($images, 1)
                        ])
                    ]);

                    $imported++;
                } catch (\Exception $e) {
                    $this->error('Erreur lors de l\'importation du produit de soin coréen: ' . $product['TITRE']);
                    $this->error($e->getMessage());
                }
            }
            $this->info("$imported produits de soin coréens importés avec succès.");
        } else {
            $this->error('Fichier Korean Skincare non trouvé: ' . $koreanSkincarePath);
        }

        $this->info('Importation terminée !');

        // Afficher les statistiques
        $totalDyson = Product::where('brand', 'Dyson')->count();
        $totalGhd = Product::where('brand', 'GHD')->count();
        $totalSavage = Product::where('brand', 'Savage X Fenty')->count();
        $totalFenty = Product::where('brand', 'Fenty Beauty')->count();
        $totalSkincare = Product::where('category', 'skincare')->count();

        $this->info("Statistiques finales :");
        $this->info("- Produits Dyson : $totalDyson");
        $this->info("- Produits GHD : $totalGhd");
        $this->info("- Produits Savage X Fenty : $totalSavage");
        $this->info("- Produits Fenty Beauty : $totalFenty");
        $this->info("- Produits Skin Care : $totalSkincare");
        $this->info("- Total : " . ($totalDyson + $totalGhd + $totalSavage + $totalFenty + $totalSkincare));
    }
}
