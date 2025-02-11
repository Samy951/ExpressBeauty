<?php

use App\Livewire\ProductsList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

// Page d'accueil
Route::get('/', ProductsList::class)->name('home');

// Routes pour les produits
Route::prefix('products')->group(function () {
    // Liste de tous les produits
    Route::get('/', [ProductController::class, 'index'])->name('products.index');

    // Filtrage par catégorie
    Route::get('/category/{category}', [ProductController::class, 'index'])
        ->where('category', 'makeup|hair|lingerie')
        ->name('products.category');

    // Routes nommées pour chaque catégorie
    Route::get('/category/makeup', [ProductController::class, 'index'])
        ->defaults('category', 'makeup')
        ->name('products.category.makeup');
    Route::get('/category/hair', [ProductController::class, 'index'])
        ->defaults('category', 'hair')
        ->name('products.category.hair');
    Route::get('/category/lingerie', [ProductController::class, 'index'])
        ->defaults('category', 'lingerie')
        ->name('products.category.lingerie');

    // Filtrage par marque
    Route::get('/brand/dyson', [ProductController::class, 'index'])
        ->defaults('brand', 'Dyson')
        ->name('products.brand.dyson');
    Route::get('/brand/ghd', [ProductController::class, 'index'])
        ->defaults('brand', 'GHD')
        ->name('products.brand.ghd');
    Route::get('/brand/fenty', [ProductController::class, 'index'])
        ->defaults('brand', 'Savage X Fenty')
        ->name('products.brand.fenty');
    Route::get('/brand/fenty-beauty', [ProductController::class, 'index'])
        ->defaults('brand', 'Fenty Beauty')
        ->name('products.brand.fenty-beauty');

    // Détail d'un produit
    Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
});

// Routes pour les catégories
Route::prefix('categories')->group(function () {
    // Liste de toutes les catégories
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');

    // Pages des catégories spécifiques
    Route::get('/makeup', [CategoryController::class, 'show'])
        ->defaults('category', 'makeup')
        ->name('categories.makeup');
    Route::get('/hair', [CategoryController::class, 'show'])
        ->defaults('category', 'hair')
        ->name('categories.hair');
    Route::get('/lingerie', [CategoryController::class, 'show'])
        ->defaults('category', 'lingerie')
        ->name('categories.lingerie');
});

// Routes pour les marques
Route::prefix('brands')->group(function () {
    // Liste de toutes les marques
    Route::get('/', [BrandController::class, 'index'])->name('brands.index');

    // Pages des marques spécifiques
    Route::get('/dyson', [BrandController::class, 'show'])
        ->defaults('brand', 'dyson')
        ->name('brands.dyson');
    Route::get('/ghd', [BrandController::class, 'show'])
        ->defaults('brand', 'ghd')
        ->name('brands.ghd');
    Route::get('/savage-x-fenty', [BrandController::class, 'show'])
        ->defaults('brand', 'savage-x-fenty')
        ->name('brands.fenty');
    Route::get('/fenty-beauty', [BrandController::class, 'show'])
        ->defaults('brand', 'fenty-beauty')
        ->name('brands.fenty-beauty');
});

// Pages statiques
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/order-tracking', 'pages.order-tracking')->name('order.tracking');

// Route pour le paiement
Route::get('/checkout/{product}', function(App\Models\Product $product) {
    return view('pages.checkout', ['product' => $product]);
})->name('checkout');
