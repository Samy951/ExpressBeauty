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

            // Récupérer la catégorie depuis la route ou la requête
            $category = $request->route('category') ?? $request->input('category');
            $brand = $request->route('brand') ?? $request->input('brand');

            Log::info('Filtering parameters', [
                'category' => $category,
                'brand' => $brand
            ]);

            // Filtrage selon la catégorie
            if ($category) {
                switch ($category) {
                    case 'makeup':
                        $query->where('brand', 'Fenty Beauty');
                        break;
                    case 'hair':
                        $query->whereIn('brand', ['Dyson', 'GHD']);
                        break;
                    case 'lingerie':
                        $query->where('brand', 'Savage X Fenty');
                        break;
                }
            }
            // Filtrage direct par marque si spécifié
            elseif ($brand) {
                $query->where('brand', $brand);
            }

            // Tri
            $sortField = $request->input('sort', 'created_at');
            $sortDirection = $request->input('direction', 'desc');

            Log::info('Sorting parameters', [
                'field' => $sortField,
                'direction' => $sortDirection
            ]);

            switch ($sortField) {
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
                'currentCategory' => $category,
                'currentBrand' => $brand
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
