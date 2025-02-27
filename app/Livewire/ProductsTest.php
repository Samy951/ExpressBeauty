<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class ProductsTest extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    protected $paginationView = 'pagination.custom';

    #[Url]
    public $search = '';

    #[Url]
    public $brand = '';

    public function filterByBrand($brand)
    {
        $this->brand = $brand;
        $this->resetPage();
    }

    public function setSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'brand']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->brand) {
            $query->where('brand', $this->brand);
        }

        return view('livewire.products-debug', [
            'products' => $query->paginate(4),
            'brands' => ['Dyson', 'GHD', 'Savage X Fenty', 'Fenty Beauty'],
        ]);
    }
}
