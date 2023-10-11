<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_type_id',
        'quantity',
        'price_products',
    ];
    public $timestamps = false;

    public function carts()
    {
        return $this->belongsTo(Cart::class);
    }

    public function typeProducts()
    {
        return $this->belongsTo(ProductType::class);
    }
}
