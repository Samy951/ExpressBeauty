<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brand = fake()->randomElement(['GHD', 'Dyson']);
        
        if ($brand === 'GHD') {
            return $this->ghdProduct();
        } else {
            return $this->dysonProduct();
        }
    }

    private function ghdProduct(): array
    {
        $products = [
            'Gold Styler' => [
                'description' => 'Lisseur professionnel avec technologie dual-zone pour une température optimale de 185°C.',
                'price' => 199.99,
                'specs' => [
                    'température' => '185°C',
                    'plaques' => 'Céramique flottantes',
                    'temps_chauffe' => '25 secondes',
                    'technologie' => 'Dual-Zone',
                    'largeur_plaques' => '26mm'
                ]
            ],
            'Platinum+' => [
                'description' => 'Lisseur intelligent avec technologie Ultra-Zone pour des résultats parfaits et une protection optimale des cheveux.',
                'price' => 249.99,
                'specs' => [
                    'température' => '185°C',
                    'plaques' => 'Céramique Ultra',
                    'temps_chauffe' => '20 secondes',
                    'technologie' => 'Ultra-Zone predictive',
                    'largeur_plaques' => '28mm'
                ]
            ],
            'Creative Curl Wand' => [
                'description' => 'Fer à boucler conique pour des boucles parfaites et des ondulations naturelles.',
                'price' => 159.99,
                'specs' => [
                    'température' => '185°C',
                    'forme' => 'Conique 28-23mm',
                    'temps_chauffe' => '25 secondes',
                    'technologie' => 'Tri-Zone',
                    'revêtement' => 'Céramique'
                ]
            ]
        ];

        $productName = fake()->randomElement(array_keys($products));
        $product = $products[$productName];

        return [
            'name' => "GHD {$productName}",
            'brand' => 'GHD',
            'description' => $product['description'],
            'price' => $product['price'],
            'image_url' => fake()->imageUrl(640, 480, 'beauty'),
            'specifications' => $product['specs'],
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }

    private function dysonProduct(): array
    {
        $products = [
            'Supersonic' => [
                'description' => 'Sèche-cheveux révolutionnaire avec technologie Air Multiplier pour un séchage rapide et contrôlé.',
                'price' => 399.99,
                'specs' => [
                    'puissance' => '1600W',
                    'technologie' => 'Air Multiplier',
                    'filtration' => 'Double',
                    'vitesses' => '3',
                    'températures' => '4',
                    'embouts' => '5'
                ]
            ],
            'Airwrap' => [
                'description' => 'Styler multi-fonction utilisant l\'effet Coanda pour coiffer, boucler et lisser sans chaleur extrême.',
                'price' => 499.99,
                'specs' => [
                    'puissance' => '1300W',
                    'technologie' => 'Effet Coanda',
                    'températures' => '3',
                    'vitesses' => '3',
                    'accessoires' => '6',
                    'contrôle_chaleur' => 'Intelligent'
                ]
            ],
            'Corrale' => [
                'description' => 'Lisseur sans fil avec plaques flexibles pour un lissage optimal avec moins de chaleur.',
                'price' => 449.99,
                'specs' => [
                    'température' => '165°C-210°C',
                    'plaques' => 'Flexibles en cuivre',
                    'autonomie' => '30 minutes',
                    'temps_charge' => '70 minutes',
                    'technologie' => 'Plaques flexibles',
                    'modes' => '3'
                ]
            ]
        ];

        $productName = fake()->randomElement(array_keys($products));
        $product = $products[$productName];

        return [
            'name' => "Dyson {$productName}",
            'brand' => 'Dyson',
            'description' => $product['description'],
            'price' => $product['price'],
            'image_url' => fake()->imageUrl(640, 480, 'beauty'),
            'specifications' => $product['specs'],
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
