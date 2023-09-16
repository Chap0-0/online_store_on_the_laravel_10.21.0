<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductParameter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_parameter',
        'value_parameter',
        'product_price_id',
    ];

    public function prices()
    {
        return $this->belongsTo(ProductPrice::class);
    }
}