<?php

namespace App\Models;

use App\Services\PriceService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'description',
        'price',
        'original_price',
        'image_url',
        'specifications',
        'category'
    ];

    protected $casts = [
        'price' => 'float',
        'original_price' => 'float',
        'specifications' => 'array'
    ];

    protected $appends = ['promo_price', 'payment_link'];

    public function getPromoPriceAttribute()
    {
        $priceService = new PriceService();
        $promo = $priceService->getPromoPrice($this->original_price ?? $this->price);
        return $promo['promo_price'];
    }

    public function getPaymentLinkAttribute()
    {
        $priceService = new PriceService();
        $promo = $priceService->getPromoPrice($this->original_price ?? $this->price);
        return $promo['link'];
    }
}
