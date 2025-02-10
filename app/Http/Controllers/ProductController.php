<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtrage par marque
        if ($request->has('brand')) {
            $query->where('brand', $request->brand);
        }

        // Filtrage par catégorie
        if ($request->has('category')) {
            $query->where('category', $request->category);
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

        $products = $query->paginate(20);

        return view('pages.products.index', [
            'products' => $products
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