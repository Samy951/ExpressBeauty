<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Compter le nombre de produits par catégorie
        $hairProducts = Product::where('category', 'hair')->count();
        $stylingProducts = Product::where('category', 'styling')->count();
        $accessoryProducts = Product::where('category', 'accessories')->count();
        $skincareProducts = Product::where('category', 'skincare')->count();

        return view('pages.categories.index', [
            'hairProducts' => $hairProducts,
            'stylingProducts' => $stylingProducts,
            'accessoryProducts' => $accessoryProducts,
            'skincareProducts' => $skincareProducts
        ]);
    }

    public function show($category)
    {
        $products = Product::where('category', $category)
            ->orderBy('created_at', 'desc')
            ->paginate(20)
            ->withQueryString()
            ->through(function ($product) {
                return $product;
            });

        $categoryNames = [
            'hair' => 'Soins Capillaires',
            'styling' => 'Appareils de Coiffure',
            'accessories' => 'Accessoires',
            'skincare' => 'Soins de la Peau'
        ];

        return view('pages.categories.show', [
            'products' => $products,
            'category' => $category,
            'categoryName' => $categoryNames[$category] ?? ucfirst($category)
        ]);
    }
}
