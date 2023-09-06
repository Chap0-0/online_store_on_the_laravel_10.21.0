<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    protected $fillable = [
        'catalog_name',
        'image_url',
    ];
    public $timestamps = false;

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}