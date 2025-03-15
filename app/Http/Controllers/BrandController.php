<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        // Marques principales avec images statiques
        $brands = [
            [
                'name' => 'Dyson',
                'image' => 'storage/brands/dyson.webp',
                'products_count' => Product::where('brand', 'Dyson')->count() . ' produits',
                'route' => route('brands.dyson')
            ],
            [
                'name' => 'GHD',
                'image' => 'storage/brands/ghd.webp',
                'products_count' => Product::where('brand', 'GHD')->count() . ' produits',
                'route' => route('brands.ghd')
            ],
            [
                'name' => 'Savage X Fenty',
                'image' => 'storage/brands/savage-fenty.webp',
                'products_count' => Product::where('brand', 'Savage X Fenty')->count() . ' produits',
                'route' => route('brands.fenty')
            ],
            [
                'name' => 'Fenty Beauty',
                'image' => 'storage/brands/fenty-beauty.webp',
                'products_count' => Product::where('brand', 'Fenty Beauty')->count() . ' produits',
                'route' => route('brands.fenty-beauty')
            ],
            [
                'name' => 'Korean Beauty',
                'image' => 'storage/brands/koreanSkincare.webp',
                'products_count' => Product::where('category', 'skincare')->count() . ' produits',
                'route' => route('brands.korean-beauty')
            ]
        ];

        return view('pages.brands.index', compact('brands'));
    }

    public function show($brand)
    {
        // Convertir le slug de la route en nom de marque
        $brandNames = [
            'dyson' => 'Dyson',
            'ghd' => 'GHD',
            'savage-x-fenty' => 'Savage X Fenty',
            'fenty-beauty' => 'Fenty Beauty',
            'korean-beauty' => 'Korean Beauty'
        ];

        $brandName = $brandNames[$brand] ?? null;

        if (!$brandName) {
            abort(404);
        }

        // Récupérer les paramètres de filtrage
        $filterBrand = request('brand');

        // Récupérer les produits avec pagination
        if ($brandName === 'Korean Beauty') {
            // Pour Korean Beauty, on filtre par catégorie 'skincare'
            $query = Product::where('category', 'skincare');

            // Si une marque spécifique est demandée, on ajoute le filtre
            if ($filterBrand) {
                $query->where('brand', $filterBrand);
            }

            $products = $query->orderBy('created_at', 'desc')
                ->paginate(12)
                ->withQueryString()
                ->through(function ($product) {
                    return $product;
                });
        } else {
            // Pour les autres marques, on filtre par nom de marque
            $products = Product::where('brand', $brandName)
                ->orderBy('created_at', 'desc')
                ->paginate(12)
                ->withQueryString()
                ->through(function ($product) {
                    return $product;
                });
        }

        // Informations sur la marque
        $brandInfo = [
            'Dyson' => [
                'name' => 'Dyson',
                'description' => 'Innovation et Performance dans le domaine des appareils de coiffure',
                'image' => 'storage/brands/dyson.webp',
                'banner_image' => 'storage/brands/banners/dyson-banner.webp'
            ],
            'GHD' => [
                'name' => 'GHD',
                'description' => 'Excellence Professionnelle pour des résultats de salon à la maison',
                'image' => 'storage/brands/ghd.webp',
                'banner_image' => 'storage/brands/banners/ghd-banner.webp'
            ],
            'Savage X Fenty' => [
                'name' => 'Savage X Fenty',
                'description' => 'Style et Inclusivité pour tous',
                'image' => 'storage/brands/savage-fenty.webp',
                'banner_image' => 'storage/brands/banners/savage-fenty-banner.webp'
            ],
            'Fenty Beauty' => [
                'name' => 'Fenty Beauty',
                'description' => 'Beauté inclusive et innovante',
                'image' => 'storage/brands/fenty-beauty.webp',
                'banner_image' => 'storage/brands/banners/fenty-beauty-banner.webp'
            ],
            'Korean Beauty' => [
                'name' => 'Korean Beauty',
                'description' => 'Produits de soin coréens de haute qualité',
                'image' => 'storage/brands/koreanSkincare.webp',
                'banner_image' => 'storage/brands/koreanSkincare.webp'
            ]
        ];

        return view('pages.brands.show', [
            'products' => $products,
            'brand' => $brandName,
            'brandInfo' => $brandInfo[$brandName]
        ]);
    }
}
