<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;

    public $search = '';
    public $brand = '';
    public $sortBy = 'name';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'brand' => ['except' => ''],
        'sortBy' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc']
    ];

    public function mount($brand = null)
    {
        if ($brand) {
            $this->brand = urldecode($brand);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingBrand()
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
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%')
                      ->orWhere('brand', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->brand, function ($query) {
                $query->where('brand', $this->brand);
            })
            ->orderBy($this->sortBy, $this->sortDirection);

        $products = $query->paginate(12);
        $brands = Product::distinct('brand')->pluck('brand');

        $title = $this->brand ? "Produits {$this->brand}" : 'Nos Produits';

        return view('livewire.products-list', [
            'products' => $products,
            'brands' => $brands,
            'title' => $title
        ]);
    }
}
