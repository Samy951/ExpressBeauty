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
    public $category = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = [
        'search' => ['except' => ''],
        'brand' => ['except' => ''],
        'category' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc']
    ];

    public function mount($brand = null, $category = null)
    {
        if ($brand) {
            $this->brand = urldecode($brand);
        }
        if ($category) {
            $this->category = urldecode($category);
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

    public function updatingCategory()
    {
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
    }

    public function render()
    {
        $query = Product::query();

        // Filtre de recherche
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhere('brand', 'like', '%' . $this->search . '%');
            });
        }

        // Filtre par marque
        if ($this->brand) {
            $query->where('brand', $this->brand);
        }

        // Filtre par catégorie
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

        // Gestion du tri
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

        // Liste fixe des marques officielles
        $brands = ['Dyson', 'GHD', 'Savage X Fenty', 'Fenty Beauty'];

        $categories = [
            'Maquillage' => 'Maquillage',
            'Lingerie' => 'Lingerie',
            'Coiffure' => 'Coiffure'
        ];

        return view('livewire.products-list', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }
}
