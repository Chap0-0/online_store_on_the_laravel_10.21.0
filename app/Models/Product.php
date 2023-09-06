<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'brand_id',
    ];
    public $timestamps = false;

    public function cart()
    {
        return $this->belongsToMany(Cart::class, 'cart_products')->withPivot('quantity');
        ;
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
    public function productTypes()
    {
        return $this->belongsToMany(ProductType::class, 'product_product_type');
    }
}