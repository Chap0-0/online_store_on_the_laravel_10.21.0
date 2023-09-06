<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'category_id',
    ];
    public $timestamps = false;

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}