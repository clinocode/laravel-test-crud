<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'uom_id',
        'brand_id',
        'name',
        'description',
        'condition',
        'price',
        'stock',
        'is_active',
        'discount',
        'default_image',
    ];

}
