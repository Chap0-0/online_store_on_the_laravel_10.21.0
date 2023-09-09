<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'product_id',
    ];
    public $timestamps = false;

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}