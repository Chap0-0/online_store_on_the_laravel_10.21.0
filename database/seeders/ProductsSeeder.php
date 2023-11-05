<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPropertyValue;
use App\Models\ProductType;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            'name' => 'Iphone 15',
            'description' => 'description Iphone 15',
        ];
        Product::create($products);
    }
}
