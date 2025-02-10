<?php

namespace App\Models;

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
        'image_url',
        'specifications',
        'category'
    ];

    protected $casts = [
        'price' => 'float',
        'specifications' => 'array'
    ];
}
