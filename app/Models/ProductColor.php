<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_url',
    ];
    public $timestamps = false;

    public function productPrice()
    {
        return $this->belongsTo(ProductPrice::class);
    }
}