<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }
    public function brands()
    {
        return $this->belongsToMany(Category::class, 'brand_categories');
    }
}
