<?php

namespace App\Services;

class PriceService
{
    private const PRICE_TIERS = [
        [
            'min' => 0,
            'max' => 30,
            'promo' => 1.95,
            'link' => 'https://www.bcdxmn8trk.com/6MW5NB/2CTPL/'
        ],
        [
            'min' => 30,
            'max' => 50,
            'promo' => 9.95,
            'link' => 'https://www.bcdxmn8trk.com/6MW5NB/3QQG7/'
        ],
        [
            'min' => 50,
            'max' => 100,
            'promo' => 13.99,
            'link' => 'https://www.bcdxmn8trk.com/6MW5NB/55M6S/'
        ],
        [
            'min' => 100,
            'max' => 200,
            'promo' => 19.99,
            'link' => 'https://www.bcdxmn8trk.com/6MW5NB/6JHXF/'
        ],
        [
            'min' => 200,
            'max' => PHP_FLOAT_MAX,
            'promo' => 29.95,
            'link' => 'https://www.bcdxmn8trk.com/6MW5NB/5T3K4H/'
        ]
    ];

    public function getPromoPrice(float $originalPrice): array
    {
        // Parcourir les paliers dans l'ordre
        foreach (self::PRICE_TIERS as $tier) {
            if ($originalPrice > $tier['min'] && $originalPrice <= $tier['max']) {
                return [
                    'promo_price' => $tier['promo'],
                    'link' => $tier['link']
                ];
            }
        }

        // Si le prix est vraiment très bas, utiliser le premier palier
        if ($originalPrice <= self::PRICE_TIERS[0]['max']) {
            return [
                'promo_price' => self::PRICE_TIERS[0]['promo'],
                'link' => self::PRICE_TIERS[0]['link']
            ];
        }

        // Pour les prix très élevés, utiliser le dernier palier
        return [
            'promo_price' => end(self::PRICE_TIERS)['promo'],
            'link' => end(self::PRICE_TIERS)['link']
        ];
    }
}
