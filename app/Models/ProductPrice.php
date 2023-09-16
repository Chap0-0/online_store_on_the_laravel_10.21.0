<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price',
        'main_image',
        'info',
        'status',
    ];
    public $timestamps = false;

    public function cart()
    {
        return $this->belongsToMany(Cart::class, 'cart_products');
    }
    public function parameters()
    {
        return $this->hasMany(ProductParameter::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}