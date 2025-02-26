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

    protected $queryString = [
        'search' => ['except' => ''],
        'brand' => ['except' => ''],
        'category' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'page' => ['except' => 1],
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

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedBrand()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function updatedSortField()
    {
        $this->resetPage();
    }

    public function updatedSortDirection()
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

        return view('livewire.products-list', [
            'products' => $query->paginate(12, pageName: 'page'),
            'brands' => ['Dyson', 'GHD', 'Savage X Fenty', 'Fenty Beauty'],
            'categories' => [
                'Maquillage' => 'Maquillage',
                'Lingerie' => 'Lingerie',
                'Coiffure' => 'Coiffure'
            ]
        ]);
    }
}
