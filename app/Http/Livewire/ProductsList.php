<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsList extends Component
{
    public $search = '';
    public $filter = '';
    
    public function render()
    {
        $products = Product::query()
            ->when($this->search, function($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
            
        return view('livewire.products-list', [
            'products' => $products
        ]);
    }
} 