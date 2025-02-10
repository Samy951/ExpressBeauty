<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        // Récupérer les statistiques pour chaque marque
        $brands = [
            'Dyson' => [
                'name' => 'Dyson',
                'count' => Product::where('brand', 'Dyson')->count(),
                'image' => 'storage/brands/allure.webp',
                'description' => 'Innovation et Performance',
                'route' => 'brands.dyson'
            ],
            'GHD' => [
                'name' => 'GHD',
                'count' => Product::where('brand', 'GHD')->count(),
                'image' => 'storage/brands/elle.webp',
                'description' => 'Excellence Professionnelle',
                'route' => 'brands.ghd'
            ],
            'Savage X Fenty' => [
                'name' => 'Savage X Fenty',
                'count' => Product::where('brand', 'Savage X Fenty')->count(),
                'image' => 'storage/brands/fenty.png',
                'description' => 'Style et Inclusivité',
                'route' => 'brands.fenty'
            ]
        ];

        return view('pages.brands.index', [
            'brands' => $brands
        ]);
    }

    public function show($brand)
    {
        $products = Product::where('brand', $brand)
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $brandInfo = [
            'Dyson' => [
                'name' => 'Dyson',
                'description' => 'Innovation et Performance dans le domaine des appareils de coiffure',
                'image' => 'storage/brands/allure.webp'
            ],
            'GHD' => [
                'name' => 'GHD',
                'description' => 'Excellence Professionnelle pour des résultats de salon à la maison',
                'image' => 'storage/brands/elle.webp'
            ],
            'Savage X Fenty' => [
                'name' => 'Savage X Fenty',
                'description' => 'Style et Inclusivité pour tous',
                'image' => 'storage/brands/fenty.png'
            ]
        ];

        return view('pages.brands.show', [
            'products' => $products,
            'brand' => $brand,
            'brandInfo' => $brandInfo[$brand] ?? null
        ]);
    }
} 