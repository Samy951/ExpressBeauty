<?php

use App\Livewire\ProductList;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductList::class)->name('home');
Route::get('/products', ProductList::class)->name('products');
