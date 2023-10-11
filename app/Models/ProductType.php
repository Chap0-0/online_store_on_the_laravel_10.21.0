<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price',
        'main_image',
        'name_type',
        'status',
    ];
    public $timestamps = false;

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_products');
    }
    public function properties()
    {
        return $this->belongsToMany(Property::class, "product_property_values");
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
