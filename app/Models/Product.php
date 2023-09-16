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
        'brand_id',
    ];
    public $timestamps = false;


    public function categories()
    {
        return $this->belongsToMany(Category::class, "product_categories");
    }
    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }
}