<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Récupérer la catégorie depuis la route ou la requête
        $category = $request->route('category') ?? $request->input('category');
        $brand = $request->route('brand') ?? $request->input('brand');

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

        $products = $query
            ->paginate(12)
            ->withQueryString()
            ->through(function ($product) {
                return $product;
            });

        // Debug information
        \Log::info('Filtering products:', [
            'category' => $category,
            'brand' => $brand,
            'count' => $products->count(),
            'sql' => $query->toSql(),
            'bindings' => $query->getBindings()
        ]);

        return view('pages.products.index', [
            'products' => $products,
            'currentCategory' => $category,
            'currentBrand' => $brand
        ]);
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
