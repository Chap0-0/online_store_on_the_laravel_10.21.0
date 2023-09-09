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
        'color_id',
        'memory_id',
        'size_id',
    ];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function productColor()
    {
        return $this->belongsTo(ProductColor::class);
    }
    public function productMemory()
    {
        return $this->belongsTo(ProductMemory::class);
    }
    public function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }
}