<?php

use App\Livewire\ProductsList;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', ProductsList::class)->name('home');

// Routes pour les produits
Route::get('/products', ProductsList::class)->name('products.index');
Route::get('/products/category/{category}', ProductsList::class)->name('products.category');
Route::get('/products/brand/{brand}', ProductsList::class)->name('products.brand');

// Pages statiques
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/faq', 'pages.faq')->name('faq');
