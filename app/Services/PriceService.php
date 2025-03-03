<?php

namespace App\Services;

class PriceService
{
    private const PRICE_TIERS = [
        [
            'min' => 0,
            'max' => 20,
            'promo' => 2.00,
            'link' => 'https://scco.simplifycashcheckout.com/aff_c?offer_id=82650&aff_id=1798'
        ],
        [
            'min' => 20,
            'max' => 35,
            'promo' => 4.95,
            'link' => 'https://scco.simplifycashcheckout.com/aff_c?offer_id=82649&aff_id=1798'
        ],
        [
            'min' => 35,
            'max' => 50,
            'promo' => 6.99,
            'link' => 'https://scco.simplifycashcheckout.com/aff_c?offer_id=82648&aff_id=1798'
        ],
        [
            'min' => 50,
            'max' => 75,
            'promo' => 9.99,
            'link' => 'https://scco.simplifycashcheckout.com/aff_c?offer_id=82644&aff_id=1798'
        ],
        [
            'min' => 75,
            'max' => 100,
            'promo' => 19.99,
            'link' => 'https://scco.simplifycashcheckout.com/aff_c?offer_id=82645&aff_id=1798'
        ],
        [
            'min' => 100,
            'max' => 150,
            'promo' => 29.99,
            'link' => 'https://scco.simplifycashcheckout.com/aff_c?offer_id=82646&aff_id=1798'
        ],
        [
            'min' => 150,
            'max' => PHP_FLOAT_MAX,
            'promo' => 39.99,
            'link' => 'https://scco.simplifycashcheckout.com/aff_c?offer_id=82647&aff_id=1798'
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
