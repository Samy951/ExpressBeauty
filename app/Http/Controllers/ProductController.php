<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            Log::info('Starting products index', [
                'request_url' => $request->fullUrl(),
                'request_method' => $request->method()
            ]);

            // Vérifier si la table products existe
            if (!Schema::hasTable('products')) {
                Log::error('Products table does not exist');
                throw new \Exception('La table des produits n\'existe pas');
            }

            $query = Product::query();

            // Récupérer les paramètres de filtrage
            $category = $request->route('category') ?? $request->input('category');
            $brand = $request->route('brand') ?? $request->input('brand');
            $search = $request->input('search');
            $sort = $request->input('sort', 'created_at');

            Log::info('Filtering parameters', [
                'category' => $category,
                'brand' => $brand,
                'search' => $search,
                'sort' => $sort,
                'route_parameters' => $request->route()->parameters()
            ]);

            // Recherche textuelle
            if ($search) {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%')
                      ->orWhere('brand', 'like', '%' . $search . '%');
                });
            }

            // Filtrage par marque si spécifié
            if ($brand) {
                $query->where('brand', $brand);
            }

            // Filtrage selon la catégorie
            if ($category) {
                switch ($category) {
                    case 'makeup':
                        // Tout ce qui concerne le maquillage
                        $query->where(function($q) use ($brand) {
                            // Si une marque est spécifiée, on filtre strictement par marque
                            if (request('brand')) {
                                $q->where('brand', request('brand'));
                            } else {
                                // Si aucune marque n'est spécifiée, on privilégie Fenty Beauty et les produits coréens
                                $q->where('brand', 'Fenty Beauty')
                                  ->orWhere(function($sq) {
                                      $sq->whereJsonContains('specifications->TYPE', 'Maquillage')
                                         ->orWhereJsonContains('specifications->TYPE', 'Make-up')
                                         ->orWhereJsonContains('specifications->TYPE', 'Lip Tint')
                                         ->orWhereJsonContains('specifications->TYPE', 'Blush')
                                         ->orWhereJsonContains('specifications->TYPE', 'Concealer')
                                         ->orWhereJsonContains('specifications->TYPE', 'Correcteur')
                                         ->orWhereJsonContains('specifications->TYPE', 'Stick')
                                         ->orWhereJsonContains('specifications->TYPE', 'Parfum');
                                  });
                            }
                        });
                        break;
                    case 'hair':
                        // Tout ce qui concerne les soins capillaires
                        $query->where(function($q) use ($brand) {
                            // Si une marque est spécifiée, on filtre strictement par marque
                            if (request('brand')) {
                                $q->where('brand', request('brand'));
                            } else {
                                // Si aucune marque n'est spécifiée, on montre les produits des marques principales (Dyson, GHD)
                                // et les produits coréens de soins capillaires
                                $q->whereIn('brand', ['Dyson', 'GHD'])
                                  ->orWhere(function($sq) {
                                      $sq->whereJsonContains('specifications->TYPE', 'Soins des cheveux')
                                         ->orWhereJsonContains('specifications->TYPE', 'Hair Care')
                                         ->orWhereJsonContains('specifications->TYPE', 'Hair Mist')
                                         ->orWhereJsonContains('specifications->TYPE', 'Spray pour les cheveux')
                                         ->orWhereJsonContains('specifications->TYPE', 'Brume pour les cheveux')
                                         ->orWhereJsonContains('specifications->TYPE', 'ACV Vinegar Shampoo');
                                  });
                            }
                        });
                        break;
                    case 'lingerie':
                        // Pour les produits de lingerie
                        $query->where(function($q) use ($brand) {
                            // Si une marque est spécifiée, on filtre strictement par marque
                            if (request('brand')) {
                                $q->where('brand', request('brand'));
                            } else {
                                // Par défaut, on montre les produits Savage X Fenty
                                $q->where('brand', 'Savage X Fenty');
                            }
                        });
                        break;
                    case 'skincare':
                        // Tout ce qui concerne les soins de la peau
                        $query->where(function($q) use ($brand) {
                            // Si une marque est spécifiée, on filtre strictement par marque
                            if (request('brand')) {
                                $q->where('brand', request('brand'));
                            } else {
                                // Si aucune marque n'est spécifiée, on affiche tous les produits skincare
                                $q->where('category', 'skincare')
                                   ->orWhereJsonContains('specifications->TYPE', 'Nettoyants')
                                   ->orWhereJsonContains('specifications->TYPE', 'Cleanser')
                                   ->orWhereJsonContains('specifications->TYPE', 'Cleansers')
                                   ->orWhereJsonContains('specifications->TYPE', 'Toniques')
                                   ->orWhereJsonContains('specifications->TYPE', 'Toner')
                                   ->orWhereJsonContains('specifications->TYPE', 'Toner Pads')
                                   ->orWhereJsonContains('specifications->TYPE', 'Compresses toniques')
                                   ->orWhereJsonContains('specifications->TYPE', 'Sérums')
                                   ->orWhereJsonContains('specifications->TYPE', 'Serums')
                                   ->orWhereJsonContains('specifications->TYPE', 'Serum')
                                   ->orWhereJsonContains('specifications->TYPE', 'Crèmes hydratantes')
                                   ->orWhereJsonContains('specifications->TYPE', 'Moisturisers')
                                   ->orWhereJsonContains('specifications->TYPE', 'Essences')
                                   ->orWhereJsonContains('specifications->TYPE', 'Essence')
                                   ->orWhereJsonContains('specifications->TYPE', 'Masques visage')
                                   ->orWhereJsonContains('specifications->TYPE', 'Face Mask')
                                   ->orWhereJsonContains('specifications->TYPE', 'Eye care')
                                   ->orWhereJsonContains('specifications->TYPE', 'Eye Care')
                                   ->orWhereJsonContains('specifications->TYPE', 'Soins des yeux')
                                   ->orWhereJsonContains('specifications->TYPE', 'Eye serum')
                                   ->orWhereJsonContains('specifications->TYPE', 'Sérum pour les yeux')
                                   ->orWhereJsonContains('specifications->TYPE', 'Exfoliants')
                                   ->orWhereJsonContains('specifications->TYPE', 'Exfoliators')
                                   ->orWhereJsonContains('specifications->TYPE', 'Patches pour les boutons')
                                   ->orWhereJsonContains('specifications->TYPE', 'Spot Patches')
                                   ->orWhereJsonContains('specifications->TYPE', 'Crèmes solaires')
                                   ->orWhereJsonContains('specifications->TYPE', 'Sunscreen')
                                   ->orWhereJsonContains('specifications->TYPE', 'Skin care')
                                   ->orWhereJsonContains('specifications->TYPE', 'K-Beauty')
                                   ->orWhereJsonContains('specifications->TYPE', 'K-beauty')
                                   ->orWhereJsonContains('specifications->TYPE', 'Émulsion')
                                   ->orWhereJsonContains('specifications->TYPE', 'Soins pour le corps')
                                   ->orWhereJsonContains('specifications->TYPE', 'Body Care')
                                   ->orWhereJsonContains('specifications->TYPE', 'Brume pour le corps')
                                   ->orWhereJsonContains('specifications->TYPE', 'Soins des mains')
                                   ->orWhereJsonContains('specifications->TYPE', 'Hand Care')
                                   ->orWhereJsonContains('specifications->TYPE', 'Soins des lèvres')
                                   ->orWhereJsonContains('specifications->TYPE', 'Lip Care')
                                   ->orWhereJsonContains('specifications->TYPE', 'Set')
                                   ->orWhereJsonContains('specifications->TYPE', 'Kit de démarrage')
                                   ->orWhereJsonContains('specifications->TYPE', 'Starter Kit')
                                   ->orWhereJsonContains('specifications->TYPE', 'Kit de voyage')
                                   ->orWhereJsonContains('specifications->TYPE', 'Ampoules')
                                   ->orWhereJsonContains('specifications->TYPE', 'Baume multifonction')
                                   ->orWhereJsonContains('specifications->TYPE', 'Multi Balm')
                                   ->orWhereJsonContains('specifications->TYPE', 'Accessoires')
                                   ->orWhereJsonContains('specifications->TYPE', 'Pinceau masque en silicone')
                                   ->orWhereJsonContains('specifications->TYPE', 'Silicon Mask Brush')
                                   ->orWhereJsonContains('specifications->TYPE', 'Lampe à ongles')
                                   ->orWhereJsonContains('specifications->TYPE', 'Démaquillant')
                                   ->orWhereJsonContains('specifications->TYPE', 'Ongles gel')
                                   ->orWhereJsonContains('specifications->TYPE', 'Gel Nails')
                                   ->orWhereJsonContains('specifications->TYPE', 'Top coat');
                            }
                        });
                        break;
                }
            }

            // Tri
            $sortDirection = $request->input('direction', 'desc');

            Log::info('Sorting parameters', [
                'field' => $sort,
                'direction' => $sortDirection
            ]);

            switch ($sort) {
                case 'price-asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name-asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name-desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
            }

            // Exécuter la requête dans un try/catch séparé
            try {
                $products = $query->paginate(12)->appends($request->query());

                Log::info('Query executed successfully', [
                    'total_products' => $products->total(),
                    'current_page' => $products->currentPage(),
                    'per_page' => $products->perPage()
                ]);
            } catch (\Exception $e) {
                Log::error('Database query error', [
                    'error' => $e->getMessage(),
                    'sql' => $query->toSql(),
                    'bindings' => $query->getBindings()
                ]);
                throw $e;
            }

            return view('pages.products.index', [
                'products' => $products,
                'category' => $category,
                'brand' => $brand,
                'search' => $search,
                'sort' => $sort
            ]);

        } catch (\Exception $e) {
            Log::error('Error in products index:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_url' => $request->fullUrl(),
                'request_method' => $request->method()
            ]);

            return response()->view('errors.500', [
                'error' => app()->environment('local') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function show(Product $product)
    {
        // Assurez-vous que le produit existe
        if (!$product) {
            abort(404);
        }

        // Vous pouvez ajouter ici la logique pour récupérer les images supplémentaires,
        // les avis clients, etc.

        return view('pages.products.show', [
            'product' => $product
        ]);
    }
}
