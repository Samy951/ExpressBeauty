<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

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
        $noImageProducts = Product::where('image_url', '')
            ->orWhereNull('image_url')
            ->orWhere('image_url', 'like', '%placeholder%')
            ->orWhere('image_url', 'not like', 'http%');

        $this->info("Produits sans images valides trouvés : " . $noImageProducts->count());

        if ($noImageProducts->count() > 0) {
            $this->info("Liste des produits sans images à supprimer :");
            foreach ($noImageProducts->get() as $product) {
                $this->info("- {$product->brand} : {$product->name} (URL: {$product->image_url})");
            }

            if ($this->confirm('Voulez-vous supprimer ces produits ?', true)) {
                $deletedNoImage = $noImageProducts->delete();
                $this->info("Nombre de produits sans images supprimés : $deletedNoImage");
            }
        }

        // Compter les produits après nettoyage
        $afterTotal = Product::count();
        $this->info("Nombre total de produits après nettoyage : $afterTotal");

        // Afficher les statistiques par marque
        foreach ($validBrands as $brand) {
            $count = Product::where('brand', $brand)->count();
            $this->info("- Produits $brand : $count");
        }

        $this->info('Nettoyage terminé !');
    }
}
