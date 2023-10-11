<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPropertyValue extends Model
{
    use HasFactory;
    protected $fillable = ['property_id', 'property_value', 'product_type_id'];
    public function productTypes()
    {
        return $this->belongsTo(ProductType::class);
    }
    public function properties()
    {
        return $this->belongsTo(Property::class);
    }
}
