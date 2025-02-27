<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Log;

class ProductsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    protected $paginationView = 'pagination.custom';

    // Propriété explicite pour la pagination
    public $page = 1;

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

    // Initialisation du composant
    public function boot()
    {
        // Récupérer la page depuis l'URL si elle existe
        $this->page = request()->query('page', 1);
    }

    public function mount($brand = null, $category = null)
    {
        Log::info('ProductsList::mount', [
            'brand' => $brand,
            'category' => $category,
            'url_params' => request()->all(),
            'route' => request()->route()->getName() ?? 'unknown',
            'path' => request()->path(),
            'page' => $this->page
        ]);

        // Vérifier si on vient d'une route spécifique
        $route = request()->route()->getName() ?? '';

        // Traiter les routes de catégorie
        if (str_contains($route, 'products.category')) {
            // Récupérer la catégorie directement depuis le nom de la route
            if ($route === 'products.category.lingerie') {
                $this->category = 'Lingerie';
            } elseif ($route === 'products.category.makeup') {
                $this->category = 'Maquillage';
            } elseif ($route === 'products.category.hair') {
                $this->category = 'Coiffure';
            }

            Log::info('Catégorie extraite depuis la route', ['category' => $this->category]);
        }
        // Traiter les routes de marque
        elseif (str_contains($route, 'products.brand')) {
            if ($route === 'products.brand.dyson') {
                $this->brand = 'Dyson';
            } elseif ($route === 'products.brand.ghd') {
                $this->brand = 'GHD';
            } elseif ($route === 'products.brand.fenty') {
                $this->brand = 'Savage X Fenty';
            } elseif ($route === 'products.brand.fenty-beauty') {
                $this->brand = 'Fenty Beauty';
            }

            Log::info('Marque extraite depuis la route', ['brand' => $this->brand]);
        }

        // Paramètres de l'URL
        if ($brand) {
            $this->brand = urldecode($brand);
        }

        if ($category) {
            $this->category = urldecode($category);
        }

        // Extraire la catégorie de l'URL si nécessaire
        if (request()->is('products/category/*')) {
            $urlCategory = request()->segment(3);
            if ($urlCategory) {
                // Convertir les noms de catégorie courants
                $categoryMap = [
                    'lingerie' => 'Lingerie',
                    'makeup' => 'Maquillage',
                    'hair' => 'Coiffure'
                ];

                $urlCategory = strtolower($urlCategory);
                if (isset($categoryMap[$urlCategory])) {
                    $this->category = $categoryMap[$urlCategory];
                } else {
                    $this->category = urldecode($urlCategory);
                }

                Log::info('Route category detected', ['segment' => $urlCategory, 'mapped_to' => $this->category]);
            }
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

    public function filterByBrand($brand)
    {
        Log::info('filterByBrand called', ['brand' => $brand]);
        $this->brand = $brand;
        $this->resetPage();
    }

    public function filterByCategory($category)
    {
        Log::info('filterByCategory called', ['category' => $category]);
        $this->category = $category;
        $this->resetPage();
    }

    public function setSearch($search)
    {
        Log::info('setSearch called', ['search' => $search]);
        $this->search = $search;
        $this->resetPage();
    }

    public function sortBy($field)
    {
        Log::info('sortBy called', ['field' => $field, 'current' => $this->sortField]);
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
        Log::info('resetFilters called');
        $this->reset(['search', 'brand', 'category']);
        $this->resetPage();
    }

    public function render()
    {
        Log::info('ProductsList::render', [
            'search' => $this->search,
            'brand' => $this->brand,
            'category' => $this->category,
            'sortField' => $this->sortField,
            'sortDirection' => $this->sortDirection,
            'page' => $this->page
        ]);

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
            Log::info('Applying category filter', ['category' => $this->category]);

            switch ($this->category) {
                case 'maquillage':
                case 'Maquillage':
                    $query->where('brand', 'Fenty Beauty');
                    break;
                case 'lingerie':
                case 'Lingerie':
                    $query->where('brand', 'Savage X Fenty');
                    break;
                case 'coiffure':
                case 'Coiffure':
                    $query->whereIn('brand', ['GHD', 'Dyson']);
                    break;
                default:
                    $query->where('category', 'like', '%' . $this->category . '%');
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

        Log::info('Query produced ' . $products->total() . ' results, showing page ' . $products->currentPage());

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
