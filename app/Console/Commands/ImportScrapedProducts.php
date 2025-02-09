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
        $dysonPath = storage_path('app/data/dysonProducts.json');
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

        // Importer les produits Savage X Fenty
        $savagePath = storage_path('app/data/savagexfentyProducts.json');
        if (file_exists($savagePath)) {
            $savageProducts = json_decode(file_get_contents($savagePath), true);
            $this->info('Traitement de ' . count($savageProducts) . ' produits Savage X Fenty...');

            foreach ($savageProducts as $product) {
                try {
                    Product::updateOrCreate(
                        ['name' => $product['title']],
                        [
                            'brand' => 'Savage X Fenty',
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
                    $this->error('Erreur lors de l\'importation du produit Savage X Fenty: ' . $product['title']);
                    $this->error($e->getMessage());
                }
            }
            $this->info('Produits Savage X Fenty importés avec succès.');
        } else {
            $this->error('Fichier Savage X Fenty non trouvé: ' . $savagePath);
        }

        $this->info('Importation terminée !');

        // Afficher les statistiques
        $totalDyson = Product::where('brand', 'Dyson')->count();
        $totalSavage = Product::where('brand', 'Savage X Fenty')->count();
        $this->info("Statistiques finales :");
        $this->info("- Produits Dyson : $totalDyson");
        $this->info("- Produits Savage X Fenty : $totalSavage");
        $this->info("- Total : " . ($totalDyson + $totalSavage));
    }
}
