<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProductType extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_type_id',
        'in_store',
    ];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}