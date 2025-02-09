<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ProductsList extends Component
{
    use WithPagination;

    public $search = '';
    public $brand = '';
    public $category = '';
    public $minPrice = '';
    public $maxPrice = '';
    public $sortBy = 'name';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'brand' => ['except' => ''],
        'category' => ['except' => ''],
        'minPrice' => ['except' => ''],
        'maxPrice' => ['except' => ''],
        'sortBy' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc']
    ];

    public function mount($category = null, $brand = null)
    {
        if ($category) {
            $this->category = $category;
        }

        if ($brand) {
            $this->brand = urldecode($brand);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $query = Product::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->brand, function ($query) {
                $query->where('brand', $this->brand);
            })
            ->when($this->category, function ($query) {
                $query->where('specifications->category', $this->category);
            })
            ->when($this->minPrice, function ($query) {
                $query->where('price', '>=', $this->minPrice);
            })
            ->when($this->maxPrice, function ($query) {
                $query->where('price', '<=', $this->maxPrice);
            })
            ->orderBy($this->sortBy, $this->sortDirection);

        $products = $query->paginate(12);
        $brands = Product::distinct('brand')->pluck('brand');
        $categories = [
            'hair' => 'Soins Capillaires',
            'styling' => 'Appareils de Coiffure',
            'accessories' => 'Accessoires'
        ];

        $title = 'Nos Produits';
        if ($this->category && isset($categories[$this->category])) {
            $title = $categories[$this->category];
        } elseif ($this->brand) {
            $title = "Produits {$this->brand}";
        }

        return view('livewire.products-list', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
            'title' => $title
        ]);
    }
}
