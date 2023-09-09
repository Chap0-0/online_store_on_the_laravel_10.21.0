<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMemory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_memory',
    ];
    public $timestamps = false;

    public function productPrice()
    {
        return $this->belongsTo(ProductPrice::class);
    }
}