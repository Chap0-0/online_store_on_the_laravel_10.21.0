<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_url',
        'price',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_product_type');
    }
}