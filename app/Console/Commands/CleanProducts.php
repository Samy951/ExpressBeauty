<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CleanProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:clean {--lorem-only : Nettoie uniquement les produits avec Lorem ipsum} {--images-only : Nettoie uniquement les produits sans images}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nettoie la base de données des produits de test, Lorem ipsum et sans images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Début du nettoyage des produits...');

        // Liste des marques valides (celles qui viennent du scraping)
        $validBrands = ['Dyson', 'GHD', 'Savage X Fenty'];

        // Compter les produits avant nettoyage
        $beforeTotal = Product::count();
        $this->info("Nombre total de produits avant nettoyage : $beforeTotal");

        if (!$this->option('lorem-only') && !$this->option('images-only')) {
            // Supprimer les produits qui ne sont pas de nos marques scrapées
            $deletedBrands = Product::whereNotIn('brand', $validBrands)->delete();
            $this->info("Nombre de produits supprimés (marques invalides) : $deletedBrands");
        }

        if (!$this->option('images-only')) {
            // Supprimer les produits avec Lorem ipsum dans la description
            $loremProducts = Product::where('description', 'like', '%lorem ipsum%')
                ->orWhere('description', 'like', '%Lorem ipsum%')
                ->orWhere('description', '')
                ->orWhereNull('description');

            $this->info("Produits avec Lorem ipsum trouvés : " . $loremProducts->count());

            if ($loremProducts->count() > 0) {
                $this->info("Liste des produits avec Lorem ipsum à supprimer :");
                foreach ($loremProducts->get() as $product) {
                    $this->info("- {$product->brand} : {$product->name}");
                }

                if ($this->confirm('Voulez-vous supprimer ces produits ?', true)) {
                    $deletedLorem = $loremProducts->delete();
                    $this->info("Nombre de produits Lorem ipsum supprimés : $deletedLorem");
                }
            }
        }

        // Vérifier et supprimer les produits sans images valides
        $productsToDelete = Product::where(function($query) {
            $query->whereNull('image_url')
                  ->orWhere('image_url', '')
                  ->orWhere('image_url', 'like', '%placeholder%')
                  ->orWhere('image_url', 'like', '%default%')
                  ->orWhere('image_url', 'NOT LIKE', '%.jpg')
                  ->orWhere('image_url', 'NOT LIKE', '%.jpeg')
                  ->orWhere('image_url', 'NOT LIKE', '%.png')
                  ->orWhere('image_url', 'NOT LIKE', '%.webp');
        });

        $count = $productsToDelete->count();

        if ($count > 0) {
            $productsToDelete->delete();
            $this->info("$count produits sans images valides ont été supprimés.");
        } else {
            $this->info('Aucun produit à supprimer.');
        }

        // Compter les produits après nettoyage
        $afterTotal = Product::count();
        $this->info("Nombre total de produits après nettoyage : $afterTotal");

        // Afficher les statistiques par marque
        foreach ($validBrands as $brand) {
            $count = Product::where('brand', $brand)->count();
            $this->info("- Produits $brand : $count");
        }

        // Afficher les statistiques finales
        $totalDyson = Product::where('brand', 'Dyson')->count();
        $totalGhd = Product::where('brand', 'GHD')->count();
        $totalSavage = Product::where('brand', 'Savage X Fenty')->count();
        $totalFenty = Product::where('brand', 'Fenty Beauty')->count();

        $this->info("\nStatistiques finales :");
        $this->info("- Produits Dyson : $totalDyson");
        $this->info("- Produits GHD : $totalGhd");
        $this->info("- Produits Savage X Fenty : $totalSavage");
        $this->info("- Produits Fenty Beauty : $totalFenty");
        $this->info("- Total : " . ($totalDyson + $totalGhd + $totalSavage + $totalFenty));

        $this->info('Nettoyage terminé !');
    }
}
