<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_url',
        'product_type_id',
    ];

    public function prices()
    {
        return $this->belongsTo(ProductType::class);
    }
}
