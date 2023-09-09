<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'catalog_id',
    ];
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
    public function brands()
    {
        return $this->belongsToMany(Category::class, 'brand_categories');
    }
}