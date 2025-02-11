<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;

class ProductList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    #[Url]
    public $search = '';

    #[Url]
    public $brand = '';

    #[Url]
    public $sortBy = 'name';

    #[Url]
    public $sortDirection = 'asc';

    public $perPage = 20;

    #[Layout('layouts.app')]
    public function render()
    {
        $products = Product::query()
            ->when($this->search, fn($query) => 
                $query->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('brand', 'like', '%'.$this->search.'%')
            )
            ->when($this->brand, fn($query) => 
                $query->where('brand', $this->brand)
            )
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.product-list', [
            'products' => $products,
            'totalProducts' => Product::count(),
            'brands' => Product::distinct()->pluck('brand'),
        ]);
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
}
