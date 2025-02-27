<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class ProductsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    protected $paginationView = 'pagination.custom';

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $brand = '';

    #[Url(history: true)]
    public $category = '';

    #[Url(history: true)]
    public $sortField = 'created_at';

    #[Url(history: true)]
    public $sortDirection = 'desc';

    public function mount($brand = null, $category = null)
    {
        if ($brand) {
            $this->brand = urldecode($brand);
        }
        if ($category) {
            $this->category = urldecode($category);
        }
    }

    public function filterByBrand($brand)
    {
        $this->brand = $brand;
        $this->resetPage();
    }

    public function filterByCategory($category)
    {
        $this->category = $category;
        $this->resetPage();
    }

    public function setSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'brand', 'category']);
        $this->resetPage();
    }

    public function render()
    {
        usleep(100000); // 100ms delay

        $query = Product::query();

        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhere('brand', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->brand) {
            $query->where('brand', $this->brand);
        }

        if ($this->category) {
            switch ($this->category) {
                case 'Maquillage':
                    $query->where('brand', 'Fenty Beauty');
                    break;
                case 'Lingerie':
                    $query->where('brand', 'Savage X Fenty');
                    break;
                case 'Coiffure':
                    $query->whereIn('brand', ['GHD', 'Dyson']);
                    break;
            }
        }

        switch ($this->sortField) {
            case 'price':
                $query->orderBy('price', $this->sortDirection);
                break;
            case 'name':
                $query->orderBy('name', $this->sortDirection);
                break;
            default:
                $query->orderBy('created_at', $this->sortDirection);
        }

        $products = $query->paginate(12);

        return view('livewire.products-list', [
            'products' => $products,
            'brands' => ['Dyson', 'GHD', 'Savage X Fenty', 'Fenty Beauty'],
            'categories' => [
                'Maquillage' => 'Maquillage',
                'Lingerie' => 'Lingerie',
                'Coiffure' => 'Coiffure'
            ]
        ]);
    }
}
